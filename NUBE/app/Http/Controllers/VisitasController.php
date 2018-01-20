<?php

namespace App\Http\Controllers;

use App\Historia_Oportunidad;
use Illuminate\Http\Request;
use App\Oportunidad;
use App\Visita;
use App\Estado_Oportunidad;
use Carbon\Carbon;
use Laracasts\Flash\Flash;
use App\Http\Requests\LocalidadRequestCreate;
use App\Http\Requests\LocalidadRequestEdit;
use Illuminate\Support\Facades\Auth;
use Session;

class VisitasController extends Controller {

    public function __construct() {
        Carbon::setlocale('es'); // Instancio en Español el manejador de fechas de Laravel    
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        if ($request->ajax()) {
            if ($request->traer_visita) {
                $visita = Visita::find($request->id);
                $dato_completo = array();
                $dato_completo["visita"] = $visita;
                $dato_completo["oportunidad"] = $visita->oportunidad;
                $dato_completo["inmueble"] = $visita->oportunidad->inmueble;
                $dato_completo["localidad"] = $visita->oportunidad->inmueble->localidad;
                return response()->json(json_encode($dato_completo, true));
            }
        }

        $oportunidades = Oportunidad::all();
        $visitas = Visita::all();
        return view('/admin/agenda/main')
                        ->with('visitas', response()->json(json_encode($visitas, true)))
                        ->with('oportunidades', $oportunidades);
    }

    /**
     *
     * Esta funcion es llamada por ajax desde 'public/ agenda.js/ actualizar_visita'
     */
    public function actualizar(Request $request) {
        if($request->editar_visita_desde_show){     //si se llamo por ajax desde show visita → edicion de 'Asistio' (Si/No) a la visita, "cambiar estado y color de la visita"
            $visita = Visita::find($request->visita_id);
            $visita->asistio = $request->asistio;
            /*-- la vamos a usar mas abajo*/
            $historia = new Historia_Oportunidad();     //para ir seteando una nueva historia a la oportunidad
            $oportunidad = Oportunidad::find($visita->oportunidad_id);     //para ccambiar el estado de la oportunidad si interesado asiste a visita
            //-------------------------------------------------------
            if($request->asistio == 1){
                $visita->color = 'green';   //verde para visita realizada
                $historia->titulo = 'Reunion concretada';
                $historia->detalle = 'El interesado '.$visita->oportunidad->nombre_interesado.' asistió a la visita del '.$visita->inicio/*->format('d/m/Y')*/.'';
                if( $oportunidad->estado->nombre == 'Inicial' ){
                    $historia->estado_previo = $oportunidad->estado->nombre;
                    $oportunidad->estado_id = 3;    //Cambia el estado a → 'Prospecto'
                    $oportunidad->save();
                    $historia->estado_actual = $oportunidad->estado->nombre;
                    $historia->cambio_estado = 1;       //True (hubo cambio de estado
                }
            }
            if(($request->asistio != 1) && ($visita->fin < Carbon::now('America/Buenos_Aires'))){
                $visita->color = 'red';     //rojo para visita inconclusa
                $historia->titulo = 'Reunion Fallida';
                $historia->detalle = 'El interesado '.$visita->oportunidad->nombre_interesado.' falto a visita del '.$visita->inicio/*->format('d/m/Y')*/;
            }
            $visita->save();
            //--Guardamos la asistencia o falta a la visita en el historial de oportunidad ↓
            $fecha = \Carbon\Carbon::now('America/Buenos_Aires') ;
            $historia->fecha = $fecha->format('d/m/Y');
            $historia->oportunidad_id = $visita->oportunidad_id;
            $historia->save();
            //------------------------------------------------------------------------------------------
            return response()->json(json_encode("Todo ok, se cambio la asistencia de visita", true));
        }else{
            $visita = Visita::find($request->id);
            $visita->fill($request->all());
            $visita->save();
            $historia = new Historia_Oportunidad();
            $historia->titulo = 'Visita agendada';
            $fecha = \Carbon\Carbon::now('America/Buenos_Aires') ;
            $historia->fecha = $fecha->format('d/m/Y');
            $historia->detalle = "Interesado: ".$visita->titulo." el ". $visita->inicio;
            $historia->oportunidad_id = $request->oportunidad_id;
            $oportunidad = Oportunidad::find($request->oportunidad_id);
            $historia->estado_previo = $oportunidad->estado->nombre;
            if($oportunidad->estado->nombre == 'Inicial'){
                $oportunidad->estado_id = 2;    //Cambia el estado a → 'En Negociación'
                $oportunidad->save();
                $historia->estado_actual = $oportunidad->estado->nombre;
                $historia->cambio_estado = 1;       //True
            }
            else{
                $historia->cambio_estado = 0;       //False
            }
            $historia->save();
            Session::flash('message', 'Se ha registrado a una nueva visita.');
            return response()->json(json_encode("ok", true));
        }
    }

    public function eliminar(Request $request) {
        $visita = Visita::find($request->id);
        $oportunidad = Oportunidad::find($visita->oportunidad_id);
        $visita->delete();

        $historia = new Historia_Oportunidad();
        $historia->titulo = 'Visita cancelada';
        $fecha = \Carbon\Carbon::now('America/Buenos_Aires') ;
        $historia->fecha = $fecha->format('d/m/Y');
        $historia->detalle = $oportunidad->nombre_interesado." ha cancelado la visita de ". $visita->inicio;
        $historia->oportunidad_id = $oportunidad->id;
        $historia->estado_previo = $oportunidad->estado->nombre;
        $historia->save();
        return response()->json(json_encode("ok", true));
    }

    public function create($request) {
        
    }


    public function store(Request $request) {
        $visita = new Visita($request->all());
        $inicio = str_replace('/', '-', $request->inicio);          //COMENTA ESTO HORACIO, sacando me di cuenta de por que lo pusiste :/
        $inicio_formateado = date('Y-m-d H:m', strtotime($inicio));
        $visita->inicio = $inicio_formateado;
        if ($request->fin) {
            $fin = str_replace('/', '-', $request->fin);
            $fin_formateado = date('Y-m-d H:m', strtotime($fin));
            $visita->fin = $fin_formateado;
        } else {
            $visita->fin = $inicio_formateado;
        }

        if (!$request->titulo && $request->oportunidad_id) {
            $oportunidad = Oportunidad::find($request->oportunidad_id);
            $visita->titulo = $visita->titulo . $oportunidad->inmueble->direccion . ". ";
            if ($oportunidad->inmueble->piso) {
                $visita->titulo = $visita->titulo . "Piso: " . $oportunidad->inmueble->piso . ". ";
            }
            if ($oportunidad->inmueble->numDepto) {
                $visita->titulo = $visita->titulo . "Número: " . $oportunidad->inmueble->numDepto . ". ";
            }
            $visita->titulo = $visita->titulo . "Interesado: " . $oportunidad->nombre_interesado . ". ";
        }

        $visita->save();
        $historia = new Historia_Oportunidad();
        $historia->titulo = 'Visita agendada';
        $fecha = $visita->inicio;
        //$fecha = \Carbon\Carbon::createFromFormat('d/m/Y', $visita->inicio);    //createFromFormat('formatoDelDatetime_salida' , $tuString);
        //$hora = \Carbon\Carbon::createFromFormat('H:i', $visita->inicio);
        $historia->detalle = $visita->titulo." el ".$fecha/*. "a las ".$hora*/;
        #######################################################################
        $historia->oportunidad_id = $request->oportunidad_id;
        //$historia->fecha = \Carbon\Carbon::createFromFormat('d/m/Y', $inicio_formateado);
        $oportunidad = Oportunidad::find($request->oportunidad_id);
        $historia->estado_previo = $oportunidad->estado->nombre;
        if($oportunidad->estado->nombre == 'Inicial'){
            $oportunidad->estado_id = 2;    //Cambia el estado a → 'En Negociación'
            $oportunidad->save();
            $historia->estado_actual = $oportunidad->estado->nombre;
            $historia->cambio_estado = 1;       //--True
        }
        else{
            $historia->cambio_estado = 0;       //--False
        }
        $historia->fecha = \Carbon\Carbon::now('America/Buenos_Aires')->format('d/m/Y');
        $historia->save();

        Session::flash('message', 'Se ha registrado a una nueva visita.');
        return redirect()->route('agenda.index');
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        //
    }

    public function update(Request $request, $id) {
        dd("eee");
    }

    public function destroy($id) {
        //
    }

}
