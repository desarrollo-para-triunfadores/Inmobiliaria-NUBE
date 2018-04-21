<?php

namespace App\Http\Controllers;

use App\Barrio;
use App\Contrato;
use App\ConceptoLiquidacion;
use App\Edificio;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Inmueble;
use App\LiquidacionMensual;
use App\Localidad;
use App\Notificacion;
use App\PeriodoContrato;
use App\Servicio;
use App\ServicioContrato;
use App\SolicitudServicio;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Session;

class ConceptosLiquidacionesController extends Controller
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
     /**
      * Esta vista se complementa con el composer: ConceptosLiquidacionesComposer
      */
        return view('admin.conceptos_liquidaciones_mensuales.main');            
    }


    public function obtener_conceptos(Request $request)
    {
        /**
         * Este método se encarga de devolver los conceptos que cumplan con 
         * los criterios solicitados con la vista correspondiente y actualizada.
         */

       $fecha_hoy = Carbon::now();
       $contratos_vigentes = Contrato::all()->where('fecha_hasta', '>', $fecha_hoy);//obtenemos todos los contratos vigentes

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

       $inmuebles_array = $inmuebles_claves->pluck('id')->toArray();//obtenemos un array de id de inmuebles

       $contratos_array = $contratos_vigentes
           ->whereIn('inmueble_id', $inmuebles_array)
           ->pluck('id')->toArray(); //obtenemos todos los contratos que sean por alguno de los inmuebles que filtramos


       if ($request->accion === "visualizar") { // se pregunta por cual vista devolver con los datos filtrados

        /**
         * Si entra acá quiere decir que es una solicitud para el submódulo de historial
         * de servicios cargados.
         */

           $conceptos_liquidaciones = ConceptoLiquidacion::all()->whereIn('contrato_id', $contratos_array);

           /**
            * Terminamos de aplicar los filtros faltantes sobre los conceptos cargados de los contratos filtrados
            */
           if ($request->servicios !== null) {
               $conceptos_liquidaciones = $conceptos_liquidaciones
                   ->whereIn('servicio_id', $request->servicios); //filtramos los inmuebles que tengan de servicio_id a cualquiera de los ids recibidos
           }               
           
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

           return response()->json(view('admin.conceptos_liquidaciones_mensuales.tablas.tabla_impuestos', compact('conceptos_liquidaciones'))->render()); //devolvemos la vista de la tabla con la coleccion de objetos filtrados.
       
       } else {

        /**
         * Si entra acá quiere decir que es una solicitud para el submódulo de carga
         * de servicios.
         */

           $servicios_contratos = ServicioContrato::all()
           ->whereIn('contrato_id', $contratos_array); //filtramos los servicios de contratos que tengan de contrato_id a cualquiera de los ids de la coleccion de contratos vigentes filtrados

           if ($request->servicios !== null) {
               $servicios_contratos = $servicios_contratos
                   ->whereIn('servicio_id', $request->servicios); //filtramos los inmuebles que tengan de servicio_id a cualquiera de los ids recibidos
           }

           return response()->json(view('admin.conceptos_liquidaciones_mensuales.tablas.tabla_cargar_impuestos', compact('servicios_contratos'))->render()); //devolvemos la vista de la tabla con la coleccion de objetos filtrados.
       }
    }


    public function registrar_conceptos(Request $request)
    {
        /**
         * Este método se encarga de registrar los conceptos recibidos y verificar, y de existir
         * esa posibilidad hacerlo, de registrar una liquidación por los conceptos para un
         * contratos cargado.
        */

        $conceptos = [];
        $ids_contratos = [];

        foreach ($request->lista_conceptos as $concepto) {
            
            /**
             * Acá recorremos la lista de conceptos recibidos y los vamos registrando
             */

            $concepto_liquidacion = new ConceptoLiquidacion($concepto);
            $servicio_contrato = ServicioContrato::find($concepto["serviciocontrato_id"]);
            $concepto_liquidacion->contrato_id = $servicio_contrato->contrato_id;
            $concepto_liquidacion->servicio_id = $servicio_contrato->servicio_id;        
            $concepto_liquidacion->servicio_abonado = ($concepto["servicio_abonado"] === 'true');
            $concepto_liquidacion->save();

            if (!array_search($servicio_contrato->contrato_id, $ids_contratos)) {
                array_push($ids_contratos, $servicio_contrato->contrato_id); //en este array todos los ids de los servicios asociados a contratos que cargó el usuario
            }
        }

        /**
         * A partir de acá comienza la verificación para saber si se puede o no registrar
         * una liquidación mensual para algún contrato. Para saber si una liquidación puede
         * ser realizada todos los servicios asociados al contratos para un periodo dado 
         * deben estar cargados
         */

        $contratos = Contrato::all()->whereIn('id', $ids_contratos); //traemos todos los contratos que se ven involucrados en la carga

        foreach ($contratos as $contrato) { //Acá arranca el control para la realización automática de la liquidación

            $servicios_contratos_array = ServicioContrato::all()  //por cada contrato identificado se hace lo de abajo...
                ->where('contrato_id', $contrato->id)->pluck('id')->toArray();

            $cantidad_servicios = count($servicios_contratos_array); //obtenemos la cantidad de servicios que tiene asociado el contrato

            $conceptos_liquidaciones = ConceptoLiquidacion::all()
                ->where('liquidacionmensual_id', null) //filtramos todos los conceptos que no hayan sido liquidados
                ->where('contrato_id', $contrato->id); //filtramos los concetos de contratos que tengan de serviciocontrato_id a cualquiera de los ids de la coleccion de servicios_contratos filtrados

            $periodos_claves = trim($conceptos_liquidaciones->implode('periodo', ',')); //obtenemos los periodos de todos los conceptos que no esten asociados a una liquidación para la comprobación para saber si se puede generar ya liquidación
            $periodos_array = array_unique(explode(",", $periodos_claves)); //convertimos en array para operar y eliminamos los duplicados


            foreach ($periodos_array as $periodo) { //por cada periodo identificado hacemos la verificación...

                $conceptos_periodo = $conceptos_liquidaciones->where('periodo', $periodo); // obtenemos de la colleción que obtuvimos más arriba los conceptos que coicidan con el periodo                  

                if ($conceptos_periodo->count() === $cantidad_servicios) { // si la cantidad de conceptos con ids de  servicioscontratos que están asociados al contrato que estamos refiriendonos en este momento es igual a la cantidad de servicios asociados al contrato quiere decir que el periodo tiene cargado todos los servicios correspondientes y está lista para liquidar.

                    $valor_total_conceptos = $conceptos_periodo->sum('monto');//esto sería la suma total de los montos de todas esos conceptos.
                    $gastos_administrativos = $contrato->monto_basico * $contrato->comision_inquilino / 100; //comisión al inquilino

                    /**
                     * Acá abajo lo que hacemos es determinar el número del mes
                     * de contrato que corresponde al periodo. El contrato se hace 
                     * por una x cantidad de meses y cada periodo liquidado corresponde 
                     * a un número de mes que cae en un rango de valor para para el alquiler.
                     */

                    $fecha_periodo = Carbon::createFromFormat('d/m/Y', "1/" . $periodo); //se setea al primero del mes del periodo de la liquidación así se puede determinar cuanto se debe pagar por el alquiler.                         
                    $diferencia = $contrato->fecha_desde->diff($fecha_periodo);
                    $mes_alquiler = ($diferencia->y * 12) + $diferencia->m + 1; //se suma 1 porque al momento de entrar (momento cero) ya está corriendo el monto para el mes 1
                                

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

                    /**
                     * Creamos la liquidación
                     */

                    $liquidacion = new LiquidacionMensual(); 
                    $liquidacion->periodo = $periodo;
                    $liquidacion->total = $total;
                    $liquidacion->alquiler = $monto_alquiler;
                    $liquidacion->subtotal = $total;
                    $liquidacion->comision_a_propietario = $comision_a_propietario;
                    $liquidacion->contrato_id = $contrato->id;
                    $liquidacion->gastos_administrativos = $gastos_administrativos;
                    $liquidacion->save();
                   
                    /**
                     * Una vez creada la liquidación creamos la notificación para el 
                     * usuario logueado de que se generó una liquidación.
                     */
                    
                    $notificacion = new Notificacion();
                    $nombre_inquilino = $liquidacion->contrato->inquilino->persona->nombre . " " . $liquidacion->contrato->inquilino->persona->apellido;
                    $notificacion->mensaje = "Se encuentra disponible la liquidación para el inquilino " . $nombre_inquilino . "por el periodo " . $liquidacion->periodo . ". Cuando se le asigne una fecha de vencimiento se informará al inquilino de su diponibilidad";
                    $notificacion->ocultar = false;
                    $notificacion->tipo = "pago";
                    $notificacion->estado_leido = false;
                    $notificacion->user_id = Auth::user()->id;
                    $notificacion->save();
                
                    /**
                     * Ahora por cada concepto que pertenece al periodo le asociamos
                     * el id de liquidación que recién creamos.
                     */

                    foreach ($conceptos_periodo as $concepto_liquidacion) {
                        $concepto_liquidacion->liquidacionmensual_id = $liquidacion->id;
                        $concepto_liquidacion->save();
                    }

                    /**
                     * Ahora lo que hacemos es verificar que un existan trabajos realizados por el servicio 
                     * técnico para el inmueble del contrato y que coincida con el periodo de la liquidación 
                     * recién generada. De ser así asociamos esos trabajos a la liquidación
                     */

                    $solicitudes_servicio = SolicitudServicio::all()
                    ->where('contrato_id', $contrato->id)
                    ->where('liquidacionmensual_id', null);

                    foreach ($solicitudes_servicio as $solicitud) {

                        $periodo_solicitud = $solicitud->created_at->format('m/Y');
                                                
                        if($periodo === $periodo_solicitud){// si los periodos son coicidentes se asocian
                            $concepto_liquidacion->liquidacionmensual_id = $liquidacion->id;
                            $concepto_liquidacion->save();
                        }                      
                    }
                }
            }
        }

        Session::flash('message', '¡Se han registrado todos los pagos de servicios con éxito!');
        return response()->json("OK, se preparo la liquidacion");

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        /**
         * Esta vista se complementa con el composer: ConceptosLiquidacionesComposer
        */
        return view('admin.conceptos_liquidaciones_mensuales.create');
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
