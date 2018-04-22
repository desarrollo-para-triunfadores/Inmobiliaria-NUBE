<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Inquilino;
use App\Localidad;
use App\Persona;
use App\Propietario;
use App\SolicitudServicio;
use App\Tecnico;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use Session;
use Storage;


class SolicitudesServicioController extends Controller
{
    public function __construct()
    {
        Carbon::setlocale('es'); // Instancio en Español el manejador de fechas de Laravel
    }


    public function index()
    {     
        $solicitudes_servicio = SolicitudServicio::all();
        $tecnicos = Tecnico::all();
        $inquilinos = Inquilino::all();
        $propietarios = Propietario::all();
        return view('admin.solicitudes_servicio.main')
            ->with('tecnicos',$tecnicos)
            ->with('propietarios',$propietarios)
            ->with('inquilinos',$inquilinos)
            ->with('solicitudes_servicio',$solicitudes_servicio);

        
    }


    public function create()
    {
     

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $solicitud = new SolicitudServicio();
        $solicitud->tecnico_id = $request->tecnico_id;
        $solicitud->rubrotecnico_id = $request->rubrotecnico_id;
        $solicitud->contrato_id = $request->contrato_id;         #resta mandarlo en la vista
        $solicitud->motivo = $request->titulo;
        $solicitud->estado = "inicial";

        $solicitud->save();
        return json("Se proceso su solicitud correctamente.");

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
