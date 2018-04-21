<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ConceptoLiquidacion;
use App\Contrato;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\InquilinoRequestCreate;
use App\Http\Requests\InquilinoRequestEdit;
use App\Inmueble;
use App\Inquilino;
use App\LiquidacionMensual;
use App\Movimiento;
use App\Notificacion;
use App\Propietario;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use Session;


class CobrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->tipo_cliente==="I"){
            $inquilino = Inquilino::find($request->id_cliente);
            $contrato_id = $inquilino->ultimo_contrato()->id;
            $saldo_cuenta = 0;

            $liquidaciones = LiquidacionMensual::all()->where("fecha_pago", null)->where("abonado", null)->where("vencimiento", "<>", null)->where("contrato_id", $contrato_id);
            $liquidacion_posterior = LiquidacionMensual::all() //este se utiliza para comprobar que el saldo diponible no hay asido utilizado.
            ->where("contrato_id",$contrato_id)
                ->where("abonado",'<>', null)
                ->sortBy('id')->first();

            if(!is_null($liquidacion_posterior) && !is_null($liquidacion_posterior->saldo_periodo)){
                $saldo_cuenta = $liquidacion_posterior->saldo_periodo;
            }
            return response()->json(view('admin.cobros.detalle_inquilinos', compact('liquidaciones', 'saldo_cuenta'))->render());
        }else{

            //Esto de abajo es para obtener los conceptos para las diferentes pantallas
            $fecha_hoy = Carbon::now();
            
            $inmuebles_claves = Inmueble::all()->where("propietario_id", $request->id_cliente); //obtenemos todos los objeto inmuebles marcados para alquiler
            $inmuebles_claves = $inmuebles_claves->implode('id', ', ');   //obtenemos de la coleccion de objetos de inmuebles un string de todos los ids de inmuebles de la colección filtrada
            $inmuebles_array = array_map('intval', explode(',', $inmuebles_claves)); //convertimos el string de claves a una coleccion que es compatible para hacer concultas.

           
            $contratos_claves = Contrato::all()
                ->where('fecha_hasta', '>', $fecha_hoy)
                ->whereIn('inmueble_id', $inmuebles_array) //filtramos los contratos que tengan de inmueble_id a cualquiera de los ids de la coleccion de ids de inmuebles que cumplen con los requisitos solicitados
                ->implode('id', ', '); //obtenemos de la coleccion de objetos de contratos un string de todos los ids de contratos de la colección filtrada

            $contratos_array = array_map('intval', explode(',', $contratos_claves)); //convertimos el string de claves a una coleccion que es compatible para hacer concultas.
                        
            $liquidaciones = LiquidacionMensual::all()
            ->where("abonado", "<>",null)
            ->where("fecha_pago_propietario", "<>", null)
            ->where("fecha_cobro_propietario", null)
            ->whereIn('contrato_id', $contratos_array);

            return response()->json(view('admin.cobros.detalle_propietario', compact('liquidaciones'))->render());
        }       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inquilinos = Inquilino::all();
        $propietarios = Propietario::all();
        return view('admin.cobros.main')
        ->with('inquilinos', $inquilinos)
        ->with('propietarios', $propietarios);
    }

    
    public function update(Request $request, $id)
    {
        $liquidacion = LiquidacionMensual::find($id);

        if($request->cobro_propietario){ //Se verifica a quien se le cobró en la vista, si a un inquilino o un propietario
            $liquidacion->fecha_cobro_propietario = Carbon::now();     
            $liquidacion->save();
           
            //Movimiento para el propietario por comision empresa
            $movimiento = new Movimiento();
            $movimiento->user_id = Auth::user()->id;  
            $movimiento->fecha_hora = Carbon::now();          
            $movimiento->monto = $liquidacion->abonado;          
            $movimiento->tipo_movimiento = "salida";
            $movimiento->propietario_id = $liquidacion->contrato->inmueble->propietario->id;
            $movimiento->monto = $liquidacion->comision_a_propietario;
            $movimiento->descripcion = "Se realiza un pago por $".$liquidacion->comision_a_propietario.". Correspondiente a la comisión por la liquidación del periodo ".$liquidacion->periodo.".";
            $movimiento->liquidacion_id = $liquidacion->id;
            $movimiento->save();
            
            //Movimiento de la empresa
            $movimiento = new Movimiento();
            $movimiento->user_id = Auth::user()->id;  
            $movimiento->fecha_hora = Carbon::now();          
            $movimiento->user_id = Auth::user()->id;     
            $movimiento->monto = $liquidacion->obtener_monto_por_repararaciones("propietario");       
            $movimiento->tipo_movimiento = "entrada";
            $movimiento->monto = $liquidacion->comision_a_propietario;
            $movimiento->descripcion = "Se recibe un pago por $".$liquidacion->comision_a_propietario.". Correspondiente a la comisión al propietario por la liquidación del periodo ".$liquidacion->periodo.".";
            $movimiento->liquidacion_id = $liquidacion->id;
            $movimiento->save();

            if($liquidacion->obtener_monto_por_repararaciones("propietario") > 0){                                        
                foreach ($liquidacion->solicitudes_servicios as $solicitud) {
                    //Se crea la notificación para el técnico
                    $notificacion = new Notificacion();
                    $notificacion->mensaje = "Estimado: le informamos que se encuentra disponible el pago por los trabajos realizados en el inmueble de  ".$liquidacion->inmueble->direccion." por el monto de $: ".$solicitud->monto_final.". Le invitamos a acercarse a nuestras instalaciones para poder retirar el saldo correspondiente.";
                    $notificacion->ocultar = false;
                    $notificacion->tipo = "pago";
                    $notificacion->estado_leido = false;
                    $notificacion->user_id = $solicitud->tecnico->persona->user->id;
                    $notificacion->save();
                }
            }
      
        }else{

            $liquidacion->fill($request->all()); 
            $liquidacion->fecha_cobro_inquilino = Carbon::now();     
            $liquidacion->save();

            //Movimiento de la empresa
            $movimiento = new Movimiento();
            $movimiento->user_id = Auth::user()->id;     
            $movimiento->fecha_hora = Carbon::now();        
            $movimiento->user_id = Auth::user()->id;
            $movimiento->fecha_hora = Carbon::now();            
            $movimiento->tipo_movimiento = "entrada";
            $movimiento->monto = $liquidacion->abonado;
            $movimiento->descripcion = "Se recibe un pago por $".$liquidacion->abonado.". Correspondiente a la liquidación del periodo ".$liquidacion->periodo.".";
            $movimiento->liquidacion_id = $liquidacion->id;
            $movimiento->save();

            //Se crea la notificación para el propietario
            $notificacion = new Notificacion();
            $notificacion->mensaje = "Estimado cliente le informamos que se encuentra disponible el pago de la mensualidad correspondiente al periodo ".$liquidacion->periodo.". Le invitamos a acercarse a nuestras instalaciones para poder retirar el saldo correspondiente.";
            $notificacion->ocultar = false;
            $notificacion->tipo = "pago";
            $notificacion->estado_leido = false;
            $notificacion->user_id = $liquidacion->contrato->inmueble->propietario->persona->user->id;
            $notificacion->save();

            if($liquidacion->obtener_monto_por_repararaciones("inquilino") > 0){                                          
                foreach ($liquidacion->solicitudes_servicios as $solicitud) {
                    //Se crea la notificación para el técnico
                    $notificacion = new Notificacion();
                    $notificacion->mensaje = "Estimado: le informamos que se encuentra disponible el pago por los trabajos realizados en el inmueble de  ".$liquidacion->inmueble->direccion." por el monto de $: ".$solicitud->monto_final.". Le invitamos a acercarse a nuestras instalaciones para poder retirar el saldo correspondiente.";
                    $notificacion->ocultar = false;
                    $notificacion->tipo = "pago";
                    $notificacion->estado_leido = false;
                    $notificacion->user_id = $solicitud->tecnico->persona->user->id;
                    $notificacion->save();
                }
            }            
        }

        Session::flash('message', 'Se ha actualizado la información');
        return redirect()->route('cobros.create');
    }
}
