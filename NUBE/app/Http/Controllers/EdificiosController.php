<?php

namespace App\Http\Controllers;

use App\Barrio;
use App\Edificio;
use App\Inmueble;
use App\Contrato;
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

            return view('admin.edificios.main')
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
        return view('admin.edificios.formulario.create') ->with('edificios',$edificios)
        ->with('localidades', $localidades)
        ->with('barrios', $barrios); // se devuelven los registros

    }

    public function store(Request $request)
    {                
        $nombreImagen = "sin_imagen.png";

        if ($request->file('imagen')) {
            $file = $request->file('imagen');
            $nombreImagen = 'edificio_' . time() .'.png';
            Storage::disk('edificios')->put($nombreImagen, \File::get($file));
        }

        $edificio = new edificio($request->all());
        $edificio->imagen = $nombreImagen;
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
        Session::flash('message', '¡Se ha registrado a un nuevo edificio con éxito!');
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
        $barrios = Barrio::all();
        return view('admin.edificios.formulario.update')
            ->with('edificio', $edificio)
            ->with('barrios', $barrios)
            ->with('localidades', $localidades);

    }


    public function update(Request $request, $id)
    {
        $edificio = edificio::find($id);
        $nombreImagen = "sin_imagen.png";

        if ($request->file('imagen')) {
            $file = $request->file('imagen');
            $nombreImagen = 'edificio_' . time() .'.png';
            if ((Storage::disk('edificios')->exists($edificio->imagen)) && ($edificio->imagen !== "sin_imagen.png")) {
                Storage::disk('edificios')->delete($edificio->imagen);   // Borramos la imagen anterior.      
            } 
            Storage::disk('edificios')->put($nombreImagen, \File::get($file));
        }

        $edificio->fill($request->all());
        $edificio->imagen = $nombreImagen;
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
        Session::flash('message', 'Se ha actualizado la información del edificio.');
        return response()->json('ok');
    }


    public function destroy($id)
    {
        $edificio = edificio::find($id);
        if (Storage::disk('edificios')->exists($edificio->imagen)) {
            Storage::disk('edificios')->delete($edificio->imagen);   // Borramos la imagen anterior.      
        } 
        $edificio->delete();
        Session::flash('message', 'El edificio ha sido eliminado del sistema');
        return redirect()->route('edificios.index');
    }


    public function obtener_inmuebles(Request $request) 
    {        
        /**
         * Este método recibe un array de ids de edificios y devuelve un array
         * con todos los inmuebles que pertenescan a esos edificios.   
         */
        
        $listado = [];
        if(count($request->lista_ids)>0){
            foreach ($request->lista_ids as $id_edficio) {            
                $edificio = Edificio::find($id_edficio);                 
                $inmuebles_ocupados = Contrato::all()->where('fecha_hasta', '>', Carbon::now())->pluck('inmueble_id')->toArray(); //listado de ids de inmuebles sacados de los contratos que están vigentes
                $inmuebles = $edificio->inmuebles->whereIn('id', $inmuebles_ocupados);                
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
}
