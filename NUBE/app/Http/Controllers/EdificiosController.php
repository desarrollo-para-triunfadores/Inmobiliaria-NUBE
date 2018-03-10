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
use Storage;
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

            return view('admin.edificios2.main')
                ->with('edificios',$edificios)
                ->with('localidades', $localidades)
                ->with('barrios', $barrios); // se devuelven los registros

        }
    }


    public function create()
    {
        $edificios = Edificio::all();
        $localidades = Localidad::all();
        $barrios = Barrio::all();
        return view('admin.edificios2.formulario.create') ->with('edificios',$edificios)
        ->with('localidades', $localidades)
        ->with('barrios', $barrios); // se devuelven los registros

    }

    public function store(Request $request)
    {
        $edificio = new edificio($request->all());
        $nombreImagen = 'sin imagen';
        if ($request->file('imagen')) {
            $file = $request->file('imagen');
            $nombreImagen = 'edificio_' . time() . $file->getClientOriginalExtension();
            Storage::disk('edificios')->put($nombreImagen, \File::get($file));
        }

        $edificio->foto_perfil = $nombreImagen;
        $edificio->costo_sueldos_personal = 0;
        $edificio->cant_ascensores = 0;
        $edificio->valor_ascensores = 0;
        $edificio->costo_mant_ascensores = 0;
        $edificio->costo_limpieza = 0;
        $edificio->costo_seguro = 0;

        if ($request->costo_sueldos_personal) {
            $edificio->costo_sueldos_personal =$request->costo_sueldos_personal;
        }
        if ($request->cant_ascensores) {
            $edificio->cant_ascensores = $request->cant_ascensores;
        }
        if ($request->valor_ascensores) {
            $edificio->valor_ascensores =$request->valor_ascensores;
        }
        if ($request->costo_mant_ascensores) {
            $edificio->costo_mant_ascensores =$request->costo_mant_ascensores;
        }
        if ($request->costo_limpieza) {
            $edificio->costo_limpieza = $request->costo_limpieza;
        }
        if ($request->costo_seguro) {
            $edificio->costo_seguro = $request->costo_seguro;
        }

        $edificio->save();
        return response()->json('ok');
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
        $edificio = Edificio::find($id);
        $localidades = Localidad::all();
        return view('admin.edificios.show')
            ->with('edificio', $edificio)
            ->with('localidades', $localidades);

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
