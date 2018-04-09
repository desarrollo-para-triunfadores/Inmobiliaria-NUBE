<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Barrio;
use App\Edificio;
use App\Inmueble;
use App\Contrato;
use App\Localidad;
use Carbon\Carbon;
use Laracasts\Flash\Flash;
use App\Http\Requests\BarrioRequestCreate;
use App\Http\Requests\BarrioRequestEdit;
use Session;
use Illuminate\Support\Facades\Auth;

class BarriosController extends Controller
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
        $barrios = Barrio::all();
        $localidades = Localidad::all();
        if ($barrios->count()==0){ // la funcion count te devuelve la cantidad de registros contenidos en la cadena
            return view('admin.barrios.sinRegistros')->with('localidades', $localidades); //se devuelve la vista para crear un registro
        } else {
            return view('admin.barrios.main')->with('barrios',$barrios)->with('localidades', $localidades); // se devuelven los registros
        }
    }

    
    public function create()
    {
        return view('admin.barrios.create');
    }


    public function store(Request $request)
    {
        $barrio = new Barrio($request->all());
        $barrio->save();
        Session::flash('message', 'Se ha registrado un nuevo barrio en la localidad de '.$barrio->localidad.'.');
        return redirect()->route('barrios.index');
    }

    public function show($id)
    {
        $barrio = Barrio::find($id);
        $localidades = Localidad::all();
        return view('admin.barrios.show')
            ->with('barrio', $barrio)
            ->with('localidades', $localidades);
    }


    public function update(Request $request, $id)
    {
        $barrio = Barrio::find($id);
        $barrio->fill($request->all());
        $barrio->save();
        Session::flash('message', 'Se ha actualizado la información');
        return redirect()->route('barrios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $barrio = Barrio::find($id);
        $barrio->delete();
        Session::flash('message', 'El barrio ha sido eliminado del sistema');
        return redirect()->route('barrios.index');
    }


    public function obtener_inmuebles(Request $request) 
    {        
        /**
         * Este método recibe un array de ids de localidades y devuelve un array
         * con todos los inmuebles que pertenescan a esas localidades.   
         */
        
        $listado = [];
        if(count($request->lista_ids)>0){
            foreach ($request->lista_ids as $id_localidad) {            
                $barrio = Barrio::find($id_barrio);                        
                $inmuebles_ocupados = Contrato::all()->where('fecha_hasta', '>', Carbon::now())->pluck('inmueble_id')->toArray(); //listado de ids de inmuebles sacados de los contratos que están vigentes
                $inmuebles = $barrio->inmuebles->whereIn('id', $inmuebles_ocupados);                
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
        if(count($request->lista_ids)>0){
            foreach ($request->lista_ids as $id_barrio) {            
                $barrio = Barrio::find($id_barrio);                   
                foreach ($barrio->edificios as $edificio) {
                    array_push($listado, $edificio);
                }                                 
            }
        }else{
            $listado = Edificio::all();
        }
        return response()->json($listado);
    }

}
