<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Localidad;
use App\Provincia;
use App\Barrio;
use App\Edificio;
use App\Inmueble;
use App\Contrato;
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


    public function obtener_inmuebles(Request $request) 
    {        
        /**
         * Este método recibe un array de ids de localidades y devuelve un array
         * con todos los inmuebles que pertenescan a esas localidades.   
         */
        
        $listado = [];
        if(!is_null($request->lista_ids)){
            foreach ($request->lista_ids as $id_localidad) {            
                $localidad = Localidad::find($id_localidad);                    
                $inmuebles_ocupados = Contrato::all()->where('fecha_hasta', '>', Carbon::now())->pluck('inmueble_id')->toArray(); //listado de ids de inmuebles sacados de los contratos que están vigentes
                $inmuebles = $localidad->inmuebles->whereIn('id', $inmuebles_ocupados);                
                foreach ($inmuebles as $inmueble) {
                    array_push($listado, $inmueble);
                }                                       
            }
        }else{
            $inmuebles_ocupados = Contrato::all()->where('fecha_hasta', '>', Carbon::now())->pluck('inmueble_id')->toArray(); //listado de ids de inmuebles sacados de los contratos que están vigentes
            $listado = Inmueble::all()->whereIn('id', $inmuebles_ocupados);
        }
        return response()->json($listado);
    }

    public function obtener_edificios(Request $request) 
    {        
        /**
         * Este método recibe un array de ids de localidades y devuelve un array
         * con todos los edificios que pertenescan a esas localidades.   
         */
        
        $listado = [];
        if(!is_null($request->lista_ids)){
            foreach ($request->lista_ids as $id_localidad) {            
                $localidad = Localidad::find($id_localidad);                   
                foreach ($localidad->edificios as $edificio) {
                    array_push($listado, $edificio);
                }                                  
            }
        }else{
            $listado = Edificio::all();
        }
        return response()->json($listado);
    }


    public function obtener_barrios(Request $request) 
    {        
        /**
         * Este método recibe un array de ids de localidades y devuelve un array
         * con todos los barrios que pertenescan a esas localidades.   
         */
        
        $listado = [];
        if(!is_null($request->lista_ids)){
            foreach ($request->lista_ids as $id_localidad) {            
                $localidad = Localidad::find($id_localidad);                   
                foreach ($localidad->barrios as $barrio) {
                    array_push($listado, $barrio);
                }                                  
            }
        }else{
            $listado = Barrio::all();
        }
        return response()->json($listado);
    }
}
