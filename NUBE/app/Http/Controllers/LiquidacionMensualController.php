<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Contrato;
use App\Inquilino;
use App\Persona;
use App\PeriodoContrato;
use App\Edificio;
use App\ServicioContrato;
use App\Barrio;
use App\Localidad;
use App\Inmueble;
use App\ConceptoLiquidacion;
use App\LiquidacionMensual;
use App\Servicio;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
            $conceptos = [];
            $ids_servicios_contratos = [];
            foreach ($request->lista_conceptos as $liquidacion) {           #cada 'lista_conceptos' es una boleta de servicio

                $concepto_liquidacion = LiquidacionMensual::find($liquidacion["id_liquidacion"]);
                $concepto_liquidacion->alquiler = $liquidacion["monto_alquiler"];
                $concepto_liquidacion->total = $liquidacion["total"];
                $concepto_liquidacion->subtotal = $liquidacion["subtotal"];

                if (!is_null($liquidacion["vencimiento"])){ //si se cargó una fecha de vencimiento se formatea para guardar en la base
                    $vencimiento = str_replace('/', '-', $liquidacion["vencimiento"]);
                    $concepto_liquidacion->vencimiento = date('Y-m-d', strtotime($vencimiento));                  
                }
                $concepto_liquidacion->save();

                #Una vez liquidada boleta en el sistema, notificamos por email al cliente inquilino
                $conceptos = $liquidacion["conceptos"];
                $inquilino = Inquilino::find($concepto_liquidacion->contrato->inquilino_id);
                $cliente = $inquilino->persona->apellido.", ".$inquilino->persona->nombre;
                $monto_alquiler = $liquidacion["monto_alquiler"];
                $expensas = $liquidacion["expensas"];
                $monto_expensas = $liquidacion["monto_expensas"];
                $total = $liquidacion["total"];
                $vencimiento = $liquidacion["vencimiento"];

                try{
                    Mail::send('emails.boleta.boleta', ['cliente'=>$cliente,'vencimiento'=>$vencimiento, 'conceptos'=>$conceptos, 'expensas'=>$expensas, 'monto_alquiler'=>$monto_alquiler, 'monto_expensas'=>$monto_expensas, 'total'=>$total], function($msj){
                        $msj->subject('Nube Propiedades | Boleta de Servicio');
                        $msj->to('jpcaceres.nea@gmail.com');
                    });
                    return response()->json(json_encode("Se envio el email", true));
                }catch (Exception $e){
                    $respuesta = array("excepcion"=>$e);
                    return response()->json(json_encode($respuesta, true));
                }


            }
            return response()->json('ok'); //devolvemos la vista de la tabla con la coleccion de objetos filtrados.
        }

        $liquidaciones = [];
        $liquidaciones_mensuales = LiquidacionMensual::all()->where('vencimiento', null); //filtramos los servicios de contratos que tengan de contrato_id a cualquiera de los ids de la coleccion de contratos vigentes filtrados
       
        foreach ($liquidaciones_mensuales as $liquidacion) {
            $cantidad_conceptos_cargados =  ConceptoLiquidacion::all()
            ->where('liquidacionmensual_id', $liquidacion->id)
            ->count();
            //Calculo valor de impuestos y servicios

            $servicios_contratos_claves = ServicioContrato::all()
            ->where('contrato_id', $liquidacion->contrato_id) //filtramos los servicios de contratos que tengan de contrato_id a cualquiera de los ids de la coleccion de filtrados
            ->implode('id', ', '); //obtenemos de la coleccion de objetos de contratos un string de todos los ids de servicios_contratos de la colección filtrada
            
            $servicios_contratos_array = array_map('intval', explode(',', $servicios_contratos_claves));
            
            $conceptos_liquidaciones = ConceptoLiquidacion::all()
            ->where('liquidacionmensual_id', $liquidacion->id) //filtramos todos los conceptos que no hayan sido liquidados
            ->whereIn('serviciocontrato_id', $servicios_contratos_array); //filtramos los concetos de contratos que tengan de serviciocontrato_id a cualquiera de los ids de la coleccion de servicios_contratos filtrados

            $conceptos_para_factura = [];
            $valor_total_conceptos = 0;

            foreach ($conceptos_liquidaciones as $valor) {
                $dato =[
                    "concepto" => $valor->serviciocontrato->servicio->nombre,
                    "monto" => $valor->monto,
                ];
                array_push($conceptos_para_factura, $dato);
                $valor_total_conceptos =  $valor_total_conceptos +  $valor->monto;
            }            

            //Calculo valor de expensas
            $fecha_hoy = Carbon::now();
            $contratos_vigentes = Contrato::all()->where('fecha_hasta', '>', $fecha_hoy);

            $inmuebles_claves = Inmueble::all()
            ->where("edificio_id", $liquidacion->contrato->inmueble->edificio->id)    //obtenemos todos los objeto inmuebles disponebles para alquiler
            ->implode('id', ', ');   //obtenemos de la coleccion de objetos de inmuebles un string de todos los ids de inmuebles de la colección filtrada
                
            $inmuebles_array = array_map('intval', explode(',', $inmuebles_claves)); //convertimos el string de claves a una coleccion que es compatible para hacer concultas.
            
            $cantidad_inquilinos_edificio = $contratos_vigentes
            ->whereIn('inmueble_id', $inmuebles_array) //filtramos los contratos que tengan de inmueble_id a cualquiera de los ids de la coleccion de ids de inmuebles que cumplen con los requisitos solicitados
            ->count();
            $costos_expensas = $liquidacion->contrato->inmueble->edificio->obtener_cantidad_departamentos_alquilados($cantidad_inquilinos_edificio);                
            $gastos_administrativos = $liquidacion->contrato->monto_basico * $liquidacion->contrato->comision_inquilino;                
                                            
            $total_costo_expensa = $costos_expensas["total"] + $gastos_administrativos;

            //Calculo de valor del mes de alquiler

            $diferencia = $liquidacion->contrato->fecha_desde->diff($fecha_hoy);
            $mes_alquiler =  ( $diferencia->y * 12 ) + $diferencia->m + 1; //se suma 1 porque al momento de entrar (momento cero) ya está corriendo el monto para el mes 1
                                        
            $periodo_contrato = PeriodoContrato::all()
            ->where('contrato_id', $liquidacion->contrato_id)
            ->where('inicio_periodo', '<=', $mes_alquiler)
            ->where('fin_periodo', '>=', $mes_alquiler)
            ->first();
        
            if ($liquidacion->contrato->tipo_renta === 'fija') {
                $monto_alquiler = $periodo_contrato->monto_fijo;
            } else {
                $monto_alquiler = $periodo_contrato->monto_incremental;
            }
            //dd($costos_expensas);
            $total = $monto_alquiler + $valor_total_conceptos + $total_costo_expensa;

            $datos = [
                "conceptos" => json_encode($conceptos_para_factura), // este dato solo se usa para la genración de la boleta.
                "id_liquidacion" => $liquidacion->id,
                "inquilino" => $liquidacion->contrato->inquilino->persona->apellido ." ".$liquidacion->contrato->inquilino->persona->nombre,
                "monto_alquiler" => $monto_alquiler,
                "valor_total_conceptos" => $valor_total_conceptos,
                "costos_expensas" => $total_costo_expensa,      #solo total de monto expensas
                "expensas" => json_encode($costos_expensas),             #especificaciones de las expensas
                "gastos_administrativos" => $gastos_administrativos,    #especificaciones de gastos administrativos
                "total" =>  $total,
                "subtotal" =>  $total
            ];

            array_push($liquidaciones, $datos);
        }
        return view('admin.liquidaciones_mensuales.main')
        ->with('liquidaciones', $liquidaciones);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
