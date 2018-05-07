<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Notificacion;
use App\Visita;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;


class NotificacionesController extends Controller
{
    public function __construct()
    {
        Carbon::setlocale('es');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notificaciones = Notificacion::where('user_id', Auth::user()->id)
        ->where('ocultar', '<>', true)->latest()->paginate(5);
        return view('/admin/notificaciones/main', compact('notificaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $notificaciones = Notificacion::all()->where('estado_leido', '<>', true);

        foreach ($notificaciones as $notificacion) {
            if (!is_null($notificacion->visita)) {
                if (!is_null($notificacion->visita->confirmada)) {
                    $notificacion->estado_leido = true;
                }
            } else {
                $notificacion->estado_leido = true;
            }
            $notificacion->save();
        }
        return response()->json($notificaciones->count());
    }

    public function confirmar_visita(Request $request)
    {
        /**
         * Este método confirma o rechaza una vista a través de la notificación
         * y avisa al personal técnico de ello.
         */

        $notificacion_visita = Notificacion::find($request->id);
        $visita = Visita::find($notificacion_visita->visita_id);
        $confirmacion_texto = "confirmó";

        if ($request->confirmacion === '1') {
            /**
             * La visita fue confirmada por el cliente
             */
            $visita->backgroundColor = '#5DADE2';   //celeste para visita confirmada
            $visita->confirmada = true;

        } elseif ($request->confirmacion === '0') {
            /**
             * La visita fue rechazada por el cliente
             */
            $confirmacion_texto = "rechazó";
            $visita->backgroundColor = '#FF5733';   //rojo para visita rechazada
            $visita->confirmada = false;

        }
        /**
         * Actualizamos la visita y damos por leida la notificación
         */
        $visita->save();
        $notificacion_visita->estado_leido = true;
        $notificacion_visita->save();

        /**
         * Ahora creamos una notificación para el técnico
         */

        $notificacion = new Notificacion();
        $notificacion->mensaje = "Estimado le informamos que el cliente " . $confirmacion_texto . " la visita del" . $request->start . ". Ante cualquier duda puede revisar su agenda o contactarse con él por medio del chat.";
        $notificacion->ocultar = false;
        $notificacion->tipo = "visita";
        $notificacion->estado_leido = false;
        $notificacion->visita_id = $visita->id;
        $notificacion->user_id = $visita->solicitudservicio->tecnico->persona->user_id;
        $notificacion->save();

        /**
         * Retornamos los datos de salida
         */

         if($request->seccion === 'navtop'){
            $notificaciones = Auth::user()->notificaciones->where('estado_leido', '<>', true);
            return response()->json(view('admin.partes.navtop.contenido_notificacion', compact('notificaciones'))->render()); //devolvemos la vista con la información actualizada.
         }        

        Session::flash('message', 'Se ha actualizado la visita');
        return response()->json("ok");
    }

    public function ocultar_notificaciones(Request $request)
    {
        if ($request->tipo === "todo") {
            $notificaciones = Notificacion::all()->where('ocultar', '<>', true);
        } else {
            $notificaciones = Notificacion::all()->whereIn('id', $request->lista);
        }
        foreach ($notificaciones as $notificacion) {
            $notificacion->ocultar = true;
            $notificacion->save();
        }
        return response()->json($notificaciones->count());
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
