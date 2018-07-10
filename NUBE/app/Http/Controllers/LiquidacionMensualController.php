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

    public function index(Request $request){
        $liquidaciones = LiquidacionMensual::all()->where('vencimiento', null); //filtramos los servicios de contratos que tengan de contrato_id a cualquiera de los ids de la coleccion de contratos vigentes filtrados
        return view('admin.liquidaciones_mensuales.main')->with('liquidaciones', $liquidaciones);
    }

  
    public function create(Request $request) {
       
        foreach ($request->lista_conceptos as $item) {//$request->lista_conceptos llegan todas las liquidaciones que el usuario le haya colocado fecha de vencimiento
            
            /**
             * Una por una las liquidaciones son actualizadas y guardadas
             */
            
            $liquidacion = LiquidacionMensual::find($item["id_liquidacion"]);               
            $liquidacion->vencimiento = $item["vencimiento"];
            $liquidacion->save();

            /**
             * Se crea la notificación para el inquilino
             */

            $notificacion = new Notificacion();
            $notificacion->mensaje = "Estimado cliente le informamos que la boleta correspondiente al periodo ".$liquidacion->periodo." ya se encuentra lista. La misma vence el ".$liquidacion->vencimiento.".";
            $notificacion->ocultar = false;
            $notificacion->tipo = "pago";
            $notificacion->estado_leido = false;
            $notificacion->user_id = $liquidacion->contrato->inquilino->persona->user->id;
            $notificacion->save();

            /**
             * Notificamos por email al inquilino también
             */
           
            $conceptos = $liquidacion->detalle_conceptos();               
            $cliente = $liquidacion->contrato->inquilino->persona->nombrecompleto;
            $monto_alquiler = $liquidacion->alquiler;
            $monto_expensas = $liquidacion->calcular_total();
            $total = $liquidacion->total;
            $periodo = $liquidacion->periodo;
            $vencimiento = $liquidacion->vencimiento;
            try{
                Mail::send('emails.boleta.boleta', ['liquidacion'=>$liquidacion, 'cliente'=>$cliente, 'periodo'=>$periodo, 'vencimiento'=>$vencimiento, 'conceptos'=>$conceptos, 'monto_alquiler'=>$monto_alquiler, 'monto_expensas'=>$monto_expensas, 'total'=>$total], function($msj){
                    $msj->subject('Cloudprop | Boleta de Servicio');
                    $msj->to('jpcaceres.nea@gmail.com');
                });
                return response()->json(json_encode("Se envio el email", true));
            }catch (Exception $e){
                $respuesta = array("excepcion"=>$e);
                return response()->json(json_encode($respuesta, true));                    
            }                
        }
        return response()->json('Se realizaron las liquidaciones y se enviaron emails a inquilino con boleta'); //devolvemos la vista de la tabla con la coleccion de objetos filtrados.
    }

       
    
}