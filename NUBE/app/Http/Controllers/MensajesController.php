<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Mensaje;
use App\Conversacion;
use App\EstadoUserMensaje;
use App\UserConversacion;
use Carbon\Carbon;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;
use Session;

class MensajesController extends Controller
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
    public function index()
    {
        $conversaciones_claves = UserConversacion::where('user_id', Auth::user()->id)->pluck('conversacion_id')->toArray();
        $conversaciones = Conversacion::all()->whereIn('id', $conversaciones_claves);
        return view('admin.mensajes.main')->with('conversaciones', $conversaciones);
    }


    public function obtener_mensajes_conversacion(Request $request)
    {
        /**
         * Este método se encarga de devolver la conversación con la vista actualizada solicitada a 
         * fin de disponer del objeto de conversación y todos sus métodos desde blade.
         */

        $conversacion_abierta = Conversacion::find($request->conversacion_id);
        $mensajes = $conversacion_abierta->mensajes->sortByDesc('created_at');

        if ($request->div === "div_chat") {
            return response()->json(view('admin.mensajes.secciones.mensajes', compact('conversacion_abierta', 'mensajes'))->render()); //devolvemos la vista con la información actualizada.
        } else {
            return response()->json(view('admin.mensajes.secciones.conversacion', compact('conversacion_abierta', 'mensajes'))->render()); //devolvemos la vista con la información actualizada.
        }
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function obtener_listado_conversaciones()
    {
        /**
         * Este método se encarga de devolver las conversaciones para el usuario logueado junto a la vista correspondiente
         * fin de disponer del objeto de conversación y todos sus métodos desde blade. Se utiliza para el refresco de la pantalla sobretodo.
         */

        $conversaciones_claves = UserConversacion::where('user_id', Auth::user()->id)->pluck('conversacion_id')->toArray();
        $conversaciones = Conversacion::all()->whereIn('id', $conversaciones_claves);
        return response()->json(view('admin.mensajes.secciones.listado_conversaciones', compact('conversaciones'))->render()); //devolvemos la vista con la información actualizada.
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function enviar_mensaje(Request $request)
    {
        /**
         * Este método se encarga de registrar una mensaje nuevo en una conversación.
         */

        $conversacion_abierta = Conversacion::find($request->conversacion_id);

        $mensaje = new Mensaje($request->all());
        $mensaje->save();

        //Detalle para el emisor
        $estado_emisor_mensaje = new EstadoUserMensaje();
        $estado_emisor_mensaje->mensaje_id = $mensaje->id;
        $estado_emisor_mensaje->user_id = Auth::user()->id;
        $estado_emisor_mensaje->enviado = true;
        $estado_emisor_mensaje->save();

        //Detalle para el receptor
        $estado_receptor_mensaje = new EstadoUserMensaje();
        $estado_receptor_mensaje->mensaje_id = $mensaje->id;
        $estado_receptor_mensaje->user_id = $conversacion_abierta->obtener_usuario_restante()->user->id;
        $estado_receptor_mensaje->save();


        $conversacion_abierta = Conversacion::find($request->conversacion_id);
        $mensajes = $conversacion_abierta->mensajes->sortByDesc('created_at');
        return response()->json(view('admin.mensajes.secciones.mensajes', compact('conversacion_abierta', 'mensajes'))->render()); //devolvemos la vista con la información actualizada.
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function borrar_conversacion(Request $request)
    {
        /**
         * Este método se encarga de eliminar una conversación para un usuario.
         */

        $conversacion = Conversacion::find($request->conversacion_id);
        $mensajes_claves = $conversacion->mensajes->pluck('id')->toArray();
        $estados_mensajes = EstadoUserMensaje::all()
            ->where('user_id', Auth::user()->id)
            ->whereIn('mensaje_id', $mensajes_claves);

        foreach ($estados_mensajes as $estado_mensaje) {
            $estado_mensaje->papelera = true;
            $estado_mensaje->save();
        }

        Session::flash('message', 'La conversación ha sido eliminada');
        return redirect()->route('mensajes.index');

    }


    public function cambiar_bandera_escritura(Request $request)
    {
        /**
         * Este método se encarga de eliminar una conversación para un usuario.
         */

        $conversacion = Conversacion::find($request->conversacion_id);
        $user_conversacion = $conversacion->usersConversacion->where('user_id', Auth::user()->id)->first();                    
        $user_conversacion->bandera_escritura = ($request->bandera === 'true');      
        $user_conversacion->save();
        return response()->json($user_conversacion->bandera_escritura); //devolvemos la vista con la información actualizada.

    }


    public function obtener_cabecera(Request $request)
    {
        /**
         * Este método se encarga de devolver la vista de la cabecera con la información actualizada.
         */

        $conversacion = Conversacion::find($request->conversacion_id);
        $bandera_escritura = $conversacion->obtener_usuario_restante()->bandera_escritura;
        return response()->json(view('admin.mensajes.secciones.cabecera_conversacion', compact('bandera_escritura'))->render()); //devolvemos la vista con la información actualizada.

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
