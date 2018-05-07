<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estado_Oportunidad;
use App\Historia_Oportunidad;
use App\Http\Requests\LocalidadRequestCreate;
use App\Http\Requests\LocalidadRequestEdit;
use App\Notificacion;
use App\Oportunidad;
use App\Contrato;
use App\SolicitudServicio;
use App\Visita;
use Carbon\Carbon;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;
use Session;

class AgendaUsuariosController extends Controller
{
    public function __construct()
    {
        /**
         * Instancio en Español el manejador de fechas de Laravel
         */
        Carbon::setlocale('es');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexoportunidades()
    {
        $oportunidades = Oportunidad::all()->where('estado_id', 1);
        return view('admin.agenda_oportunidades.main')->with('oportunidades', $oportunidades);
    }

    public function indexusurios()
    {
        $solicitudes = "";
        if (!is_null(Auth::user()->persona->tecnico)) {
            $solicitudes = SolicitudServicio::all()
                ->where('tecnico_id', Auth::user()->persona->tecnico->id)
                ->where('estado', 'tomada');
        }
        return view('admin.agenda_usuarios.main')->with('solicitudes', $solicitudes);
    }

    public function obtener_visitas_oportunidades()
    {
        /**
         * Este método devuelve las visitas asociadas a oportunidades
         */

        $visitas = Visita::all()->where('oportunidad_id', '<>', null);

        $array_soporte = [];
        /**
         * No sé porque las consultas me devuelven el array con la estructura: {{},{}} en vez
         * de [{},{}] y bueno e tema es que el plugin de calendario requiere la segunda. Probé con toArray()
         * pero lo mismo.
         */
        foreach ($visitas as $visita) {
            array_push($array_soporte, $visita);
        }

        $visitas = $array_soporte;

        return response()->json(json_encode($visitas, true));




        return response()->json(json_encode($visitas, true));
    }


    public function obtener_visitas_usuarios()
    {
        /**
         * Este método devuelve las visitas dependiendo si el usuario logueado es cliente o empleado
         */

        $visitas = collect();
       /// dd(Auth::user()->persona->tecnico);
        if (!is_null(Auth::user()->persona->tecnico)) {

            /**El usuario logueado es personal técnico */
            $solicitudes_array = SolicitudServicio::all()->where("tecnico_id", Auth::user()->persona->tecnico->id)->pluck('id')->toArray();//obtenemos un array de id de solicitudes
            $visitas = Visita::all()->whereIn('solicitudservicio_id', $solicitudes_array);


        } else {
            /**Se interpreta al usuario logueado como cliente */

            $visitas_inquilino = collect();

            if (!is_null(Auth::user()->persona->propietario)) {

                $inmuebles_array = Auth::user()->persona->propietario->inmuebles->pluck('id')->toArray();//obtenemos un array de id de inmuebles
                $contratos_array = Contrato::all()->whereIn('inmueble_id', $inmuebles_array)->pluck('id')->toArray(); //obtenemos todos los contratos que sean por alguno de los inmuebles que filtramos
                $solicitudes_array = SolicitudServicio::all()
                    ->where('responsable', 'propietario')
                    ->whereIn('contrato_id', $contratos_array)
                    ->pluck('id')->toArray();//obtenemos un array de id de solicitudes                    
                $visitas = Visita::all()->whereIn('solicitudservicio_id', $solicitudes_array);

            }
            if (!is_null(Auth::user()->persona->inquilino)) {

                $solicitudes_array = SolicitudServicio::all()
                    ->where('responsable', 'inquilino')
                    ->where('contrato_id', Auth::user()->persona->inquilino->ultimo_contrato()->id)
                    ->pluck('id')->toArray();//obtenemos un array de id de solicitudes                    


                if (count($visitas) < 1) { //Esto se hace para incorporar las visitas a las de propietario
                    $visitas = Visita::all()->whereIn('solicitudservicio_id', $solicitudes_array);
                } else {
                    $visitas = $visitas->combine(Visita::all()->whereIn('solicitudservicio_id', $solicitudes_array))->toArray();
                }

            }
        }

        $array_soporte = [];
        /**
         * No sé porque las consultas me devuelven el array con la estructura: {{},{}} en vez
         * de [{},{}] y bueno e tema es que el plugin de calendario requiere la segunda. Probé con toArray()
         * pero lo mismo.
         */
        foreach ($visitas as $visita) {
            array_push($array_soporte, $visita);
        }

        $visitas = $array_soporte;

        return response()->json(json_encode($visitas, true));
    }



    public function obtener_datos_visita(Request $request)
    {
        /**
         * Esta función devuelve los datos de la visita solicitada.
         */

        $visita = Visita::find($request->id);
        $dato = array();

        if (!is_null($visita->oportunidad_id)) {
            $dato["visita"] = $visita;
            $dato["inicio"] = $visita->startformateado;
            $dato["fin"] = $visita->endformateado;
            $dato["realizada"] = $visita->realizadaformateado;
            $dato["oportunidad"] = $visita->oportunidad;
            $dato["inmueble"] = $visita->oportunidad->inmueble->direccion . ' (' . $visita->oportunidad->inmueble->localidad->nombre . ')';
        } else {
            $dato["visita"] = $visita;
            $dato["inicio"] = $visita->startformateado;
            $dato["fin"] = $visita->endformateado;
            $dato["estado"] = $visita->estadofinal;
            $dato["solicitud"] = $visita->solicitudservicio;
            $dato["realizada"] = $visita->realizadaformateado;
            $dato["tecnico"] = $visita->solicitudservicio->tecnico->persona->nombrecompleto;
            $dato["inmueble"] = $visita->solicitudservicio->contrato->inmueble->direccion . ' (' . $visita->solicitudservicio->contrato->inmueble->localidad->nombre . ')';
            $dato["solicitante"] = $visita->solicitudservicio->solicitante()->persona->nombrecompleto;
        }

        return response()->json(json_encode($dato, true));
    }


    public function actualizar_visita(Request $request)
    {
        /**
         * Este método se utiliza sobretodo para actualizar de actualizar las fechas
         * de inicio y fin del evento. El método "update()" en cambio se encarga 
         * de los estados de la visita. Este método devuelve la llamada en formato JSON.
         */
        $fecha_hoy = Carbon::now();
        $fecha_inicio_formateado = new Carbon($request->start);


        /**Obtenemos y actualizamos la visita */
        $visita = Visita::find($request->id);
        $visita->fill($request->all());
        $visita->save();

        if (!is_null($visita->oportunidad_id)) {

            /**Creamos la historia para la auditoria de la oportunidad */
            $historia = new Historia_Oportunidad();
            $historia->titulo = 'Visita agendada';
            $historia->fecha = $fecha_hoy;
            $historia->detalle = "Interesado: " . $visita->title . " el " . $fecha_inicio_formateado->format('d/m/Y H:m');
            $historia->oportunidad_id = $visita->oportunidad_id;

            $oportunidad = Oportunidad::find($visita->oportunidad_id);
            $historia->estado_previo = $oportunidad->estado->nombre;


            if ($oportunidad->estado->nombre == 'Inicial') {
                $oportunidad->estado_id = 2;  //Cambia el estado a → 'En Negociación'
                $oportunidad->save();
                $historia->estado_actual = $oportunidad->estado->nombre;
                $historia->cambio_estado = true;
            } else {
                $historia->cambio_estado = false;
            }

            $historia->save();
        }
        return response()->json(json_encode("ok", true));
    }

    public function eliminar_visita(Request $request)
    {
        /**
         * Este método se encarga de eliminar las visitas.
         */

        /** Obtenemos y elinamos la visita*/
        $visita = Visita::find($request->id);

        if (!is_null($visita->oportunidad_id)) {
            $oportunidad = Oportunidad::find($visita->oportunidad_id);

            /**Creamos la historia para indicar este evento */
            $fecha_hoy = Carbon::now();
            $historia = new Historia_Oportunidad();
            $historia->titulo = 'Visita cancelada';
            $historia->fecha = $fecha_hoy;
            $historia->detalle = $oportunidad->nombre_interesado . " ha cancelado la visita de " . $visita->startformateado;
            $historia->oportunidad_id = $oportunidad->id;
            $historia->estado_previo = $oportunidad->estado->nombre;
            $historia->save();

        } elseif ($visita->confirmada && !$visita->realizada) {

            /**
             * Si la visita a eliminar fue confirmada pero no realizada se notifica de ello al usuario solicitante
             */

            $id_user_solicitud = "";

            if ($visita->solicitudservicio->responsable === 'inquilino') {
                $id_user_solicitud = $visita->solicitudservicio->contrato->inquilino->persona->user_id;
            } else {
                $id_user_solicitud = $visita->solicitudservicio->contrato->inmueble->propietario->persona->user_id;
            }

            $notificacion = new Notificacion();
            $notificacion->mensaje = "Estimado cliente le informamos que la visita que tenía agendada para el " . $visita->startformateado . " fue cancelada por el técnico. Ante cualquier duda comuníquese con el mismo.";
            $notificacion->ocultar = false;
            $notificacion->tipo = "visita";
            $notificacion->estado_leido = false;
            $notificacion->user_id = $id_user_solicitud;
            $notificacion->save();

        }

        $visita->delete();

        return response()->json(json_encode("ok", true));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $visita = new Visita($request->all()); //creamos la instancia de la visita
        $visita->backgroundColor = "#DA8F1F";

        /**
         * Verificamos la existencia de un título para el evento de la agenda
         */

        if (!$request->title && $request->solicitudservicio_id) {

            /**
             * En el caso de que se trate una visita asociada a una solicitud de servicio
             * creamos un asunto
             */

            $solicitud = SolicitudServicio::find($request->solicitudservicio_id);
            $id_user_solicitud = "";
            $visita->title = $solicitud->contrato->inmueble->direccion . ". ";

            if ($solicitud->responsable === 'inquilino') {
                $visita->title = $visita->title . $solicitud->contrato->inquilino->persona->nombrecompleto . ". ";
                $id_user_solicitud = $solicitud->contrato->inquilino->persona->user_id;
            } else {
                $visita->title = $visita->title . $solicitud->contrato->inmueble->propietario->persona->nombrecompleto . ". ";
                $id_user_solicitud = $solicitud->contrato->inmueble->propietario->persona->user_id;
            }


        } elseif (!$request->title && $request->oportunidad_id) {

            /**
             * En el caso de que se trate una visita asociada a una opotunidad creamos un asunto
             */

            $oportunidad = Oportunidad::find($request->oportunidad_id);

            $visita->title = $oportunidad->inmueble->direccion . ". ";

            if ($oportunidad->inmueble->piso) {
                $visita->title = $visita->title . "Piso: " . $oportunidad->inmueble->piso . ". ";
            }
            if ($oportunidad->inmueble->numDepto) {
                $visita->title = $visita->title . "Número: " . $oportunidad->inmueble->numDepto . ". ";
            }
            $visita->title = $visita->title . "Interesado: " . $oportunidad->nombre_interesado . ". ";
        }

        $visita->save(); // guardamos la visita

        if ($request->oportunidad_id) {

            /**
             * Si se trata de una vista asociada a una oportunidad hay que realizar una 
             * serie de pasos más iniciando el seguimiento para la oportunidad
             */

            $oportunidad = Oportunidad::find($request->oportunidad_id);
            $oportunidad->solicitud_atendida = true;

            /**
             * Creamos la historia de seguimiento de oportunidad
             */

            $historia = new Historia_Oportunidad();
            $historia->titulo = 'Visita agendada';
            $historia->detalle = $visita->title . " el " . $request->start;
            $historia->oportunidad_id = $request->oportunidad_id;
            $historia->estado_previo = "Inicial";
            $historia->fecha = Carbon::now();

            if ($oportunidad->estado_id === 1) {
                $oportunidad->estado_id = 2; //Cambia el estado a: 'En Negociación'            
                $historia->estado_actual = "En Negociación";
                $historia->cambio_estado = true;
            } else {
                $historia->cambio_estado = false;
            }

            $oportunidad->save();//grabamos la oportunidad
            $historia->save();//grabamos la historia

        }

        if (!$request->title && $request->solicitudservicio_id) {
            /**
             * Se crea la notificación de confirmación para el cliente
             */

            $notificacion = new Notificacion();
            $notificacion->mensaje = "Estimado cliente le informamos que se agendó una visita a su inmueble para atender la solicitud que usted realizó para " . $request->start . ". Le solicitamos que confirme la visita para que el profesional proceda.";
            $notificacion->ocultar = false;
            $notificacion->tipo = "confirmacion_visita";
            $notificacion->estado_leido = false;
            $notificacion->visita_id = $visita->id;
            $notificacion->user_id = $id_user_solicitud;
            $notificacion->save();
        }

        Session::flash('message', 'Se ha registrado a una nueva visita.');
        if (!is_null($visita->oportunidad_id)) {
            return redirect()->route('indexoportunidades');
        }


        return redirect()->route('indexusurios');
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
        /**
         * Este método se utiliza sobretodo para actualizar los estados sobre la visita. 
         * El método "actualizar_visita()" en cambio se encarga de actualizar las fechas
         * de inicio y fin del evento. Este método se redirecciona luego de su ejecución.
         */

        $visita = Visita::find($id);
        $visita->fill($request->all());

        if (!is_null($visita->oportunidad_id)) {

            /**
             * En caso de ser una visita de oportunidades les damos el siguiente 
             * tratamiento.
             */

            $oportunidad = Oportunidad::find($visita->oportunidad_id);     //para ccambiar el estado de la oportunidad si interesado asiste a visita
            $fecha_hoy = Carbon::now();
            $historia = new Historia_Oportunidad();     //para ir seteando una nueva historia a la oportunidad

            if ($request->realizada === "1") {
                /**
                 * La visita se concretó exitosamente
                 */
                $visita->backgroundColor = '#1E8449';   //verde para visita realizada
                $historia->titulo = 'Reunión concretada';
                $historia->detalle = 'El interesado ' . $visita->oportunidad->nombre_interesado . ' asistió a la visita del ' . $visita->startformateado . '';

                if ($oportunidad->estado_id === 1) {
                    $historia->estado_previo = $oportunidad->estado->nombre;
                    $oportunidad->estado_id = 3;    //Cambia el estado a → 'Prospecto'
                    $oportunidad->save();
                    $historia->estado_actual = $oportunidad->estado->nombre;
                    $historia->cambio_estado = true;       //True (hubo cambio de estado
                }

            } elseif ($request->realizada === "0") {
                /**
                 * La visita no se realizó
                 */
                $visita->backgroundColor = '#FF5733';     //rojo para visita inconclusa
                $historia->titulo = 'Reunión no concretada';
                $historia->detalle = 'El interesado ' . $visita->oportunidad->nombre_interesado . ' falto a la visita del ' . $visita->startformateado;
            }
         //   dd($visita);
            $visita->save();//Actualizamos la visita

            /**
             * Actualizamos la historia
             */
            $historia->fecha = $fecha_hoy;
            $historia->oportunidad_id = $visita->oportunidad_id;
            $historia->save();

        } else {

            /**
             * En caso de ser una visita de solicitud de servicio les damos el siguiente 
             * tratamiento.
             */

            if ($request->confirmada === '1') {
                /**
                 * La visita fue confirmada por el cliente
                 */
                $visita->backgroundColor = '#5DADE2';   //celeste para visita confirmada
                $visita->confirmada = true;

            } elseif ($request->confirmada === '0') {
                /**
                 * La visita fue rechazada por el cliente
                 */
                $visita->backgroundColor = '#FF5733';   //rojo para visita rechazada
                $visita->confirmada = false;

            } elseif ($request->realizada === '1') {
                /**
                 * La visita no se realizó
                 */
                $visita->backgroundColor = '#1E8449';     //verde para visita realizada             

            } elseif ($request->realizada === '0') {
                /**
                 * La visita no se realizó
                 */
                $visita->backgroundColor = '#8E44AD';     //rojo para visita inconclusa                
            }

            $visita->save();//Actualizamos la visita
        }

        Session::flash('message', 'Se ha actualizado la visita');

        if (!is_null($visita->oportunidad_id)) {
            return redirect()->route('indexoportunidades');
        }
        return redirect()->route('indexusurios');
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
