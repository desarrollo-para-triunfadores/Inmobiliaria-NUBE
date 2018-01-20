<?php

namespace App\Http\Controllers;

use App\Barrio;
use App\Servicio;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Localidad;
use App\Persona;
use App\Provincia;
use App\Auditoria;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

use Illuminate\Http\Request;
use Session;


class ServiciosController extends Controller
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
        $edificios = Servicio::all();
        $servicios = Servicio::all();
        if ($servicios->count()==0){ // la funcion count te devuelve la cantidad de registros contenidos en la cadena
            return view('admin.servicios.sinRegistros')
                ->with('servicios', $servicios);
        } else {
            return view('admin.servicios.main')
                ->with('edificios',$edificios)
                ->with('servicios', $servicios); // se devuelven los registros
        }
    }


    public function create()
    {
        return view('admin.servicios.create');
    }


    public function store(Request $request)
    {
        $servicio = new Servicio($request->all());
        $servicio->save();
        Session::flash('message', '¡Se ha registrado a un nuevo servicio!');
        return redirect()->route('servicios.index');
    }


    public function show($id)
    {

    }


    public function edit($id)
    {
    }


    public function update(Request $request, $id)
    {
        $servicio = Servicio::find($id);
        $servicio->fill($request->all());
        $servicio->save();
        Session::flash('message', 'Se ha actualizado la información del servicio');
        return redirect()->route('servicios.index');
    }


    public function destroy($id)
    {
        $servicio = Servicio::find($id);
        $servicio->delete();
        Session::flash('message', 'El servicio ha sido eliminado del sistema');
        return redirect()->route('servicios.index');
    }
}
