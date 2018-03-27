<?php

namespace App\Http\Controllers;

use App\SolicitudServicio;
use App\Tecnico;
use App\Propietario;
use App\Inquilino;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Localidad;
use App\Persona;

use Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

use Illuminate\Http\Request;
use Session;


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

    public function store(Request $request)
    {
        
    
        $edificio->save();
        return response()->json('ok');
    }


    public function show($id)
    {
  
    }


    public function edit($id)
    {
     

    }


    public function update(Request $request, $id)
    {
      
    }


    public function destroy($id)
    {
      
    }
}
