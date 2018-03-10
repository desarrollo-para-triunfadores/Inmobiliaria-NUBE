<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Notificacion;
Use Session;
use Illuminate\Http\Request;
use App\Http\Requests;

class NotificacionesController extends Controller
{
    public function __construct() {
        Carbon::setlocale('es');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notificaciones = Notificacion::where('ocultar','<>',true)->latest()->paginate(5);
        return view('/admin/notificaciones/main', compact('notificaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->tipo === "notificaciones"){
            $notificaciones = Notificacion::all()->where('estado_leido','<>',true)->whereNotIn('tipo', ['oportunidad','agenda']);            
        }else{
            $notificaciones = Notificacion::all()->where('estado_leido','<>',true)->whereIn('tipo', ['oportunidad','agenda']);
        }
        foreach ($notificaciones as $notificacion) {
            $notificacion->estado_leido = true;
            $notificacion->save();
        }
        return response()->json($notificaciones->count());
    }

    public function ocultar_notificaciones(Request $request)
    {
        if($request->tipo === "todo"){
            $notificaciones = Notificacion::all()->where('ocultar','<>',true);            
        }else{
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
