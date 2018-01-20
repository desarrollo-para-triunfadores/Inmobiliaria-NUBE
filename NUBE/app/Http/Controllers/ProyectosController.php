<?php

namespace App\Http\Controllers;

use App\CaracteristicaInmueble;
use App\Espacio;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ImagenInmueble;
use App\Inmueble;
use App\Pais;
use App\Persona;
use App\Propietario;
use App\Provincia;
use App\Proyecto;
use App\Tipo;
use App\Barrio;
use App\Edificio;
use App\Localidad;
use App\Caracteristica;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Mockery\CountValidator\Exception;
use Session;

class ProyectosController extends Controller {

    public function __construct() {
        Carbon::setlocale('es'); // Instancio en Español el manejador de fechas de Laravel
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $proyectos = Proyecto::all();
        $localidades = Localidad::all();
        $barrios = Barrio::all();
        $tipos = Tipo::all();

        return view('admin.proyectos.main')
            ->with('proyectos', $proyectos)
            ->with('tipos', $tipos)
            ->with('localidades', $localidades)
            ->with('barrios', $barrios);
    }

    public function create() {
        $localidades = Localidad::all();
        $barrios = Barrio::all();
        $tipos = Tipo::all();
        return view('admin.proyectos.formulario.create')
            ->with('tipos', $tipos)
            ->with('localidades', $localidades)
            ->with('barrios', $barrios);
        //return view('admin.proyectos.formulario.create');
    }

    /*'condicion','valorVenta','valorAlquiler', 'superficie', 'direccion', 'piso', 'numDepto', 'fechaHabilitacion', 'fechaFinContrato',
        'linkVideo','expensaValor', 'expensaDescripcion', 'longitud', 'latitud', 'cantidadAmbientes', 'disponible',
        'descripcion', 'tipo_id', 'garante_id', 'inquilino_id', 'propietario_id', 'barrio_id','edificio_id' */
    public function store(Request $request) {
        $proyecto = new Proyecto();
        $proyecto->tipo_id = $request->tipo_id;     //ok

        $proyecto->descripcion1 = $request->descripcion1;
        $proyecto->descripcion2 = $request->descripcion2;
        /**** Ubicación del Proyecto ***/
        $proyecto->localidad_id = $request->localidad_id;
        $proyecto->direccion = $request->direccion;

        if (!is_null($request->fechaHabilitacion)){ //si se cargó una fecha de Habilitacion se formatea para guardar en la base
            $fechaHabilitacion = str_replace('/', '-', $request->fechaHabilitacion);
            $inmueble->fechaHabilitacion = date('Y-m-d', strtotime($fechaHabilitacion));                
        }


        try {
            $proyecto->save();

            /**** Imagenes de Proyecto ***/
            //dd($request);
            $file = $request->file('foto_presentacion');
            $nombreImagen = 'INube_' . time() . '.jpg' /*. $file->getClientOriginalExtension()*/; // Le damos un nombre por defecto: la primera parte es IN + momento + "."extensión
            Storage::disk('proyectos')->put($nombreImagen, File::get($file));
            //Creación y asociación del registro de Logo con su respectiva Marca.
            $imagen = new ImagenInmueble();
            $imagen->nombre = $nombreImagen;
            $imagen->proyecto_id = $proyecto->id;
            $imagen->seccion_imagen = 'portada';
            $imagen->espacio_id = null;//associate($marca);
            $imagen->save();


            Session::flash('message', 'Se ha registrado un nuevo proyecto satisfactoriamente.');
            return redirect()->route('proyectos.index');
        } catch (Exception $excepcion) {
            return response()->json(json_encode($excepcion, true));
        }
    }

    public function show($id) {
        $proyecto = Inmueble::find($id);
        return view('admin.proyectos.formulario.show')->with('proyecto',$proyecto);
    }


    public function edit($id) {
        //
    }


    public function update(Request $request) {

    }

    public function destroy($id) {
        $proyecto = Proyecto::find($id);
        $proyecto->delete();
        Session::flash('message', 'El proyecto ha sido eliminado del sistema');
        return redirect()->route('proyecto.index');
    }

}

