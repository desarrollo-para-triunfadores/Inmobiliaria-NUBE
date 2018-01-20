<?php

namespace App\Http\Controllers;

use App\Barrio;
use App\Edificio;
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


class EdificiosController extends Controller
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
        if($request->ajax()){
            $edificio = Edificio::find($request->id);
            return response()->json(json_encode($edificio, true));
        }
        else{
            $edificios = Edificio::all();
            $localidades = Localidad::all();
            $barrios = Barrio::all();
            /* if ($edificios->count()==0){ // la funcion count te devuelve la cantidad de registros contenidos en la cadena
                 return view('admin.edificios.sinRegistros')
                     ->with('barrios', $barrios)
                     ->with('localidades', $localidades); //se devuelve la vista para crear un registro
             } else {*/
            return view('admin.edificios.main')
                ->with('edificios',$edificios)
                ->with('localidades', $localidades)
                ->with('barrios', $barrios); // se devuelven los registros
            // }
        }
    }


    public function create()
    {
        return view('admin.edificios.create');
    }

    public function store(Request $request)
    {
        $edificio = new edificio($request->all());

        $nombreImagen = 'sin imagen';
        if ($request->file('imagen')) {
            $file = $request->file('imagen');
            $nombreImagen = 'edificio_' . time() . '.jpg'/* . $file->getClientOriginalExtension()*/;
            Storage::disk('edificios')->put($nombreImagen, \File::get($file));
        }
        $edificio->foto_perfil = $nombreImagen;
        $edificio->save();
        Session::flash('message', 'Se ha registrado un nuevo edificio en la localidad de '.$edificio->localidad.'.');
        return redirect()->route('edificios.index');
    }


    public function show($id)
    {
        $edificio = Edificio::find($id);
        $localidades = Localidad::all();
        return view('admin.edificios.show')
            ->with('edificio', $edificio)
            ->with('localidades', $localidades);
    }


    public function edit($id)
    {
    }


    public function update(Request $request, $id)
    {
        $edificio = edificio::find($id);
        $edificio->fill($request->all());
        $edificio->save();
        Session::flash('message', 'Se ha actualizado la información del edificio.');
        return redirect()->route('edificios.index');
    }


    public function destroy($id)
    {
        $edificio = edificio::find($id);
        $edificio->delete();
        Session::flash('message', 'El edificio ha sido eliminado del sistema');
        return redirect()->route('admin.edificios.index');
    }
}
