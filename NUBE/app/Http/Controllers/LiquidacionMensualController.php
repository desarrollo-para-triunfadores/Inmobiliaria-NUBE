<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Contrato;
use App\PeriodoContrato;
use App\Edificio;
use App\ServicioContrato;
use App\Barrio;
use App\Localidad;
use App\Notificacion;
use App\Inquilino;
use App\Inmueble;
use App\Inquilino;
use App\Noificacion;
use App\ConceptoLiquidacion;
use App\LiquidacionMensual;
use App\Servicio;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;
use Session;

class LiquidacionMensualController extends Controller
{

    public function __construct()
    {
        Carbon::setlocale('es'); // Instancio en Español el manejador de fechas de Laravel
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $fecha_hoy = \Carbon\Carbon::now('America/Buenos_Aires');
            $contratos_vigentes = Contrato::all()->where('fecha_hasta', '<', $fecha_hoy);

            $inmuebles_claves = Inmueble::all()->where("tipo_id", 1); //obtenemos todos los objeto inmuebles disponebles para alquiler

            if ($request->lodalidades !== null) { //filtramos los inmuebles que tengan de id_localidades a cualquiera de los ids recibidos
                $inmuebles_claves = $inmuebles_claves->whereIn('localidad_id', $request->lodalidades);
            }
            if ($request->barrios !== null) { //filtramos los inmuebles que tengan de barrio_id a cualquiera de los ids recibidos
                $inmuebles_claves = $inmuebles_claves->whereIn('barrio_id', $request->barrios);
            }
            if ($request->edificios !== null) { //filtramos los inmuebles que tengan de edificio_id a cualquiera de los ids recibidos
                $inmuebles_claves = $inmuebles_claves->whereIn('edificio_id', $request->edificios);
            }
            if ($request->inmuebles !== null) { //filtramos los inmuebles que tengan de id a cualquiera de los ids recibidos
                $inmuebles_claves = $inmuebles_claves->whereIn('id', $request->inmuebles);
            }

            $inmuebles_claves = $inmuebles_claves->implode('id', ', ');   //obtenemos de la coleccion de objetos de inmuebles un string de todos los ids de inmuebles de la colección filtrada
            $inmuebles_array = array_map('intval', explode(',', $inmuebles_claves)); //convertimos el string de claves a una coleccion que es compatible para hacer concultas.

            $contratos_claves = $contratos_vigentes
                ->whereIn('inmueble_id', $inmuebles_array) //filtramos los contratos que tengan de inmueble_id a cualquiera de los ids de la coleccion de ids de inmuebles que cumplen con los requisitos solicitados
                ->implode('id', ', '); //obtenemos de la coleccion de objetos de contratos un string de todos los ids de contratos de la colección filtrada

            $contratos_array = array_map('intval', explode(',', $contratos_claves)); //convertimos el string de claves a una coleccion que es compatible para hacer concultas.

            $liquidaciones_mensuales = LiquidacionMensual::all()->whereIn('contrato_id', $contratos_array); //filtramos los servicios de contratos que tengan de contrato_id a cualquiera de los ids de la coleccion de contratos vigentes filtrados

            return response()->json(view('admin.liquidaciones_mensuales.partes_create.tabla_liquidaciones', compact('liquidaciones_mensuales'))->render()); //devolvemos la vista de la tabla con la coleccion de objetos filtrados.
        }

        $edificios = Edificio::all();
        $localidades = Localidad::all();
        $barrios = Barrio::all();
        $inmuebles = Inmueble::all();
        $servicios = Servicio::all();

        return view('admin.liquidaciones_mensuales.main')
            ->with('edificios', $edificios)
            ->with('barrios', $barrios)
            ->with('localidades', $localidades)
            ->with('inmuebles', $inmuebles)
            ->with('servicios', $servicios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->ajax()) {
            
            foreach ($request->lista_conceptos as $item) {//$request->lista_conceptos llegan todas las liquidaciones que el usuario le haya colocado fecha de vencimiento
                //Una por una las liquidaciones son actualizadas y guardadas
                $liquidacion = LiquidacionMensual::find($item["id_liquidacion"]);               
                if (!is_null($item["vencimiento"])){ //si se cargó una fecha de vencimiento se formatea para guardar en la base
                    $vencimiento = str_replace('/', '-', $item["vencimiento"]);
                    $liquidacion->vencimiento = date('Y-m-d', strtotime($vencimiento));
                }
                $liquidacion->save();

                //Se crea la notificación para el inquilino
                $notificacion = new Notificacion();
                $notificacion->mensaje = "Estimado cliente le informamos que la boleta correspondiente al periodo ".$liquidacion->periodo." ya se encuentra lista. La misma vence el ".$liquidacion->vencimiento.".";
                $notificacion->ocultar = false;
                $notificacion->tipo = "pago";
                $notificacion->estado_leido = false;
                $notificacion->user_id = $liquidacion->contrato->inquilino->persona->user->id;
                $notificacion->save();

                ##########   Una vez liquidada boleta en el sistema, notificamos por email al cliente inquilino   #########
                $conceptos = $liquidacion->detalle_conceptos();               
                $cliente = $liquidacion->contrato->inquilino->persona->nombrecompleto;
                $monto_alquiler = $liquidacion->alquiler;
                $monto_expensas = $liquidacion->calcular_total();
                $total = $liquidacion->total;
                $vencimiento = $liquidacion->vencimiento;
                try{
                    Mail::send('emails.boleta.boleta', ['cliente'=>$cliente,'vencimiento'=>$vencimiento, 'conceptos'=>$conceptos, 'monto_alquiler'=>$monto_alquiler, 'monto_expensas'=>$monto_expensas, 'total'=>$total], function($msj){
                        $msj->subject('Nube Propiedades | Boleta de Servicio');
                        $msj->to('jpcaceres.nea@gmail.com');
                    });
                    return response()->json(json_encode("Se envio el email", true));
                }catch (Exception $e){
                    $respuesta = array("excepcion"=>$e);
                    return response()->json(json_encode($respuesta, true));
                    $concepto_liquidacion->vencimiento = date('Y-m-d', strtotime($vencimiento));
                }
                #################### --FIN Email de boletas -- ####################
           
            }
            return response()->json('Se realizaron las liquidaciones y se enviaron emails a inquilino con boleta'); //devolvemos la vista de la tabla con la coleccion de objetos filtrados.
        }

        $liquidaciones = LiquidacionMensual::all()->where('vencimiento', null); //filtramos los servicios de contratos que tengan de contrato_id a cualquiera de los ids de la coleccion de contratos vigentes filtrados
        return view('admin.liquidaciones_mensuales.main')->with('liquidaciones', $liquidaciones);
    }
}