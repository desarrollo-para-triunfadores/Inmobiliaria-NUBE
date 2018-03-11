<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Contrato;
use App\Edificio;
use App\ServicioContrato;
use App\Barrio;
use App\Localidad;
use App\Notificacion;
use App\Inmueble;
use App\Notificacion;
use App\LiquidacionMensual;
use App\ConceptoLiquidacion;
use App\PeriodoContrato;
use App\Servicio;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Session;

class ConceptosLiquidacionesController extends Controller
{

    public function __construct(){
        Carbon::setlocale('es'); // Instancio en Español el manejador de fechas de Laravel
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        if ($request->ajax()) {

            //Este es el control para periodo en la carga de impuestos
            if(!is_null($request->serviciocontrato_id)&&(!is_null($request->periodo))){
                $concepto= ConceptoLiquidacion::all()
                    ->where('serviciocontrato_id', $request->serviciocontrato_id)
                    ->where('periodo', $request->periodo)
                    ->count();
                return response()->json($concepto);
            }

            //Esto de abajo es para obtener los conceptos para las diferentes pantallas
            $fecha_hoy = Carbon::now();
            $contratos_vigentes = Contrato::all()->where('fecha_hasta', '>', $fecha_hoy);

            $inmuebles_claves = Inmueble::all()->where("tipo_id", 1); //obtenemos todos los objeto inmuebles marcados para alquiler

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

            $inmuebles_array = $inmuebles_claves->pluck('id')->toArray();
        
            $contratos_array = $contratos_vigentes
                ->whereIn('inmueble_id', $inmuebles_array)
                ->pluck('id')->toArray();

            $servicios_contratos = ServicioContrato::all()
                ->whereIn('contrato_id', $contratos_array); //filtramos los servicios de contratos que tengan de contrato_id a cualquiera de los ids de la coleccion de contratos vigentes filtrados

            if($request->servicios !== null){
                $servicios_contratos = $servicios_contratos
                    ->whereIn('servicio_id', $request->servicios); //filtramos los inmuebles que tengan de servicio_id a cualquiera de los ids recibidos
            }


            if ($request->accion === "visualizar") {
           
                $servicios_contratos_array = $servicios_contratos->pluck('id')->toArray();

                $conceptos_liquidaciones = ConceptoLiquidacion::all()->whereIn('serviciocontrato_id', $servicios_contratos_array);

                if ($request->desde !== null) {
                    $fecha = str_replace('/', '-', $request->desde);
                    $fecha_desde = date('Y-m-d', strtotime($fecha));
                    $conceptos_liquidaciones = $conceptos_liquidaciones->where('created_at', '>', $fecha_desde);
                }
                if ($request->hasta !== null) {
                    $fecha = str_replace('/', '-', $request->hasta);
                    $fecha_hasta = date('Y-m-d', strtotime($fecha));
                    $conceptos_liquidaciones = $conceptos_liquidaciones->where('created_at', '<', $fecha_hasta);
                }
                return response()->json(view('admin.conceptos_liquidaciones_mensuales.partes_create.tabla_impuestos', compact('conceptos_liquidaciones'))->render()); //devolvemos la vista de la tabla con la coleccion de objetos filtrados.
            } else {
                return response()->json(view('admin.conceptos_liquidaciones_mensuales.partes_create.tabla_cargar_impuestos', compact('servicios_contratos'))->render()); //devolvemos la vista de la tabla con la coleccion de objetos filtrados.
            }
        }

        $edificios = Edificio::all();
        $localidades = Localidad::all();
        $barrios = Barrio::all();

        $fecha_hoy = Carbon::now();
        $contratos_vigentes = Contrato::all()->where('fecha_hasta', '>', $fecha_hoy);

        $servicios = Servicio::all();

        return view('admin.conceptos_liquidaciones_mensuales.main')
            ->with('edificios', $edificios)
            ->with('barrios', $barrios)
            ->with('localidades', $localidades)
            ->with('contratos', $contratos_vigentes)
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

            foreach ($request->lista_conceptos as $concepto) {
                $concepto_liquidacion = new ConceptoLiquidacion($concepto);

                if ($concepto["servicio_abonado"] === "true") {
                    $concepto_liquidacion->servicio_abonado = true;
                } else {
                    $concepto_liquidacion->servicio_abonado = false;
                }
                if (!is_null($concepto["primer_vencimiento"])){ //si se cargó una fecha de vencimiento se formatea para guardar en la base
                    $vencimiento = str_replace('/', '-', $concepto["primer_vencimiento"]);
                    $concepto_liquidacion->primer_vencimiento = date('Y-m-d', strtotime($vencimiento));
                }
                if (!is_null($concepto["segundo_vencimiento"])){ //si se cargó una fecha de vencimiento se formatea para guardar en la base
                    $vencimiento = str_replace('/', '-', $concepto["segundo_vencimiento"]);
                    $concepto_liquidacion->segundo_vencimiento = date('Y-m-d', strtotime($vencimiento));
                }
                $concepto_liquidacion->save();
                array_push($ids_servicios_contratos, $concepto_liquidacion->serviciocontrato_id); //en este array todos los ids de los servicios asociados a contratos que cargó el usuario
            }

         /*   $contratos_array = ServicioContrato::all()
                ->whereIn('id', $ids_servicios_contratos)
                ->pluck('contrato_id')->toArray(); //convertimos el string de claves a una coleccion que es compatible para hacer concultas.
            
            $ids_contratos = array_unique($contratos_array); //acá lo que se hace es eliminar los duplicados
*/

            $ids_contratos = ServicioContrato::all()
            ->whereIn('id', $ids_servicios_contratos)->unique('contrato_id')
            ->pluck('contrato_id')->toArray();

            $contratos= Contrato::all()->whereIn('id', $ids_contratos); //traemos todos los contratos que se ven involucrados en la carga
           
            foreach ($contratos as $contrato) { //Acá arranca el control para la realización automática de la liquidación
               
                $servicios_contratos = ServicioContrato::all()  //por cada contrato identificado se hace lo de abajo...
                ->where('contrato_id', $contrato->id);
                $servicios_contratos_array = $servicios_contratos->pluck('id')->toArray();

                $cantidad_servicios = count($servicios_contratos_array); //obtenemos la cantidad de servicios que tiene asociado el contrato

                $conceptos_liquidaciones = ConceptoLiquidacion::all()
                    ->where('liquidacionmensual_id', null) //filtramos todos los conceptos que no hayan sido liquidados
                    ->whereIn('serviciocontrato_id', $servicios_contratos_array); //filtramos los concetos de contratos que tengan de serviciocontrato_id a cualquiera de los ids de la coleccion de servicios_contratos filtrados

                $periodos_claves = trim($conceptos_liquidaciones->implode('periodo', ',')); //obtenemos los periodos de todos los conceptos que no esten asociados a una liquidación para la comprobación para saber si se puede generar ya liquidación
                $periodos_array =  array_unique(explode(",", $periodos_claves)); //convertimos en array para operar y eliminamos los duplicados

                
                foreach ($periodos_array as $periodo) { //por cada periodo identificado hacemos la verificación...

                   $conceptos_periodo = $conceptos_liquidaciones->where('periodo', $periodo); // obtenemos de la colleción que obtuvimos más arriba los conceptos que coicidan con el periodo
                   $valor= $conceptos_periodo->count() - $cantidad_servicios;
                                      
                    if($conceptos_periodo->count() === $cantidad_servicios){ // si la cantidad de conceptos con ids de  servicioscontratos que están asociados al contrato que estamos refiriendonos en este momento es igual a la cantidad de servicios asociados al contrato quiere decir que el periodo tiene cargado todos los servicios correspondientes y está lista para liquidar.
                                               
                        $valor_total_conceptos = $conceptos_periodo->sum('monto');//esto sería la suma total de los montos de todas esos conceptos.
                        $gastos_administrativos = $contrato->monto_basico * $contrato->comision_inquilino / 100; //comisión al inquilino
                        
                        $fecha_periodo = Carbon::createFromFormat('d/m/Y',"1/".$periodo); //se setea al primero del mes del periodo de la liquidación así se puede determinar cuanto se debe pagar por el alquiler.                         
                        $diferencia = $contrato->fecha_desde->diff($fecha_periodo);
                        $mes_alquiler =  ( $diferencia->y * 12 ) + $diferencia->m + 1; //se suma 1 porque al momento de entrar (momento cero) ya está corriendo el monto para el mes 1
              
                        /*
                         Acá arriba lo que hicimos es determinar el número del mes
                         de contrato que corresponde al periodo. El contrato se hace 
                         por una x cantidad de meses y cada periodo liquidado corresponde 
                         a un número de mes que cae en un rango de valor para para el alquiler.
                        */

                        $periodo_contrato = PeriodoContrato::all()
                              ->where('contrato_id', $contrato->id)
                              ->where('inicio_periodo', '<=', $mes_alquiler)
                              ->where('fin_periodo', '>=', $mes_alquiler)
                              ->first(); //obtenemos de la tabla de periodos los montos para el periodo que estamos liquidando
              
                        if ($contrato->tipo_renta === 'fija') {//determinamos el tipo de renta
                            $monto_alquiler = $periodo_contrato->monto_fijo;
                        } else {
                            $monto_alquiler = $periodo_contrato->monto_incremental;
                        }
                        $total = $monto_alquiler + $valor_total_conceptos + $gastos_administrativos;

                        $comision_a_propietario = ($monto_alquiler * $contrato->comision_propietario) / 100;//calculamos la comisión al propietario
                       
                        $liquidacion = new LiquidacionMensual(); //creamos la liquidación
                        $liquidacion->periodo = $periodo;
                        $liquidacion->total = $total;
                        $liquidacion->alquiler = $monto_alquiler;
                        $liquidacion->subtotal = $total;   
                        $liquidacion->comision_a_propietario = $comision_a_propietario;
                        $liquidacion->contrato_id = $contrato->id;
                        $liquidacion->gastos_administrativos = $gastos_administrativos;
                        $liquidacion->save();
                        #Una vez creada la liquidacion, creamos la notificación de una nueva liquidacion imprimible
                        $notificacion = new Notificacion();
                        $nombre_inquilino = $liquidacion->contrato->inquilino->persona->nombre." ".$liquidacion->contrato->inquilino->persona->apellido;
                        $notificacion->mensaje = "Se encuentra disponible la generación de boleta al inquilino ".$nombre_inquilino."por el periodo ".$liquidacion->periodo.".";
                        $notificacion->ocultar = false;
                        $notificacion->tipo = "pago";
                        $notificacion->estado_leido = false;
                        $notificacion->user_id = Auth::user()->id;
                        $notificacion->save();
                        #########-- Notificacion ##################
                        foreach ($conceptos_periodo as $concepto_liquidacion) { //por cada concepto que pertenece al periodo le asociamos el id de liquidacion que recién creamos
                            $concepto_liquidacion->liquidacionmensual_id = $liquidacion->id;
                            $concepto_liquidacion->save();
                        }
                    }
                }
            }
            return response()->json("OK, se preparo la liquidacion");
        }

        $edificios = Edificio::all();
        $localidades = Localidad::all();
        $barrios = Barrio::all();
        $contratos = Contrato::all();
        $servicios = Servicio::all();

        return view('admin.conceptos_liquidaciones_mensuales.formulario.create')
            ->with('edificios', $edificios)
            ->with('barrios', $barrios)
            ->with('localidades', $localidades)
            ->with('contratos', $contratos)
            ->with('servicios', $servicios);
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
