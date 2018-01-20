<?php

namespace App\Http\Controllers;

use App\Barrio;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Localidad;
use App\Provincia;
use Carbon\Carbon;
use Laracasts\Flash\Flash;
use App\Http\Requests\LocalidadRequestCreate;
use App\Http\Requests\LocalidadRequestEdit;
use Illuminate\Support\Facades\Auth;
use Session;
class LocalidadesController extends Controller
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
            $barriosDeLocalidad = Barrio::barrios($request->id);
            return response()->json($barriosDeLocalidad);
        }
        $localidades = Localidad::all();
        $provincias = Provincia::all();
        if ($localidades->count()==0){ // la funcion count te devuelve la cantidad de registros contenidos en la cadena
            return view('admin.localidades.sinRegistros')->with('provincias', $provincias); //se devuelve la vista para crear un registro
        } else {
            return view('admin.localidades.main')->with('localidades',$localidades)->with('provincias', $provincias); // se devuelven los registros
        }
    }


    public function create()
    {
        return view('admin.localidades.create');
    }


    public function store(Request $request)
    {
        $localidad = new Localidad($request->all());
        $localidad->save();
        Session::flash('message', 'Se ha registrado a una nueva localidad.');
        return redirect()->route('localidades.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $localidad = Localidad::find($id); 
        $provincias = Provincia::all()->lists('nombre','id');     
        return view('admin.localidades.show')
            ->with('localidad', $localidad)
            ->with('provincias', $provincias);       
    }


    public function update(Request $request, $id) {
        $localidad = Localidad::find($id);
        $localidad->fill($request->all());
        $localidad->save();
        Session::flash('message', 'Se ha actualizado la información');
        return redirect()->route('localidades.index');
    }


    public function destroy($id) {
        $localidad = Localidad::find($id);
        $localidad->delete();
        Session::flash('message', 'La localidad ha sido eliminada');
        return redirect()->route('localidades.index');
    }
}
