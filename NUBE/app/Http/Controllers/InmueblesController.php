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

class InmueblesController extends Controller {

    public function __construct() {
        Carbon::setlocale('es'); // Instancio en Español el manejador de fechas de Laravel
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $inmuebles = Inmueble::all();
        $caracteristicas = Caracteristica::all();
        $edificios = Edificio::all();
        $paises = Pais::all();
        $provincias = Provincia::all();
        $localidades = Localidad::all();
        $barrios = Barrio::all();
        $tipos = Tipo::all();
        $espacios = Espacio::all();
        $personas = Persona::all();
        $propietarios = Propietario::all();
        return view('admin.inmuebles.main')
                        ->with('inmuebles', $inmuebles)
                        ->with('tipos', $tipos)
                        ->with('edificios', $edificios)
                        ->with('paises', $paises)
                        ->with('provincias', $provincias)
                        ->with('localidades', $localidades)
                        ->with('barrios', $barrios)
                        ->with('espacios', $espacios)
                        ->with('personas', $personas)
                        ->with('propietarios', $propietarios)
                        ->with('caracteristicas', $caracteristicas);
    }

    public function create() {
        $caracteristicas = Caracteristica::all();
        $edificios = Edificio::all();
      
        $paises = Pais::all();
        $provincias = Provincia::all();
        $localidades = Localidad::all();
        $barrios = Barrio::all();
        $tipos = Tipo::all();
        $espacios = Espacio::all();
        $personas = Persona::all();
        $propietarios = Propietario::all();
        return view('admin.inmuebles.formulario.create')
                       
                        ->with('tipos', $tipos)
                        ->with('edificios', $edificios)
                        ->with('paises', $paises)
                        ->with('provincias', $provincias)
                        ->with('localidades', $localidades)
                        ->with('barrios', $barrios)
                        ->with('espacios', $espacios)
                        ->with('personas', $personas)
                        ->with('propietarios', $propietarios)
                        ->with('caracteristicas', $caracteristicas);
    }

    /* 'condicion','valorVenta','valorAlquiler', 'superficie', 'direccion', 'piso', 'numDepto', 'fechaHabilitacion', 'fechaFinContrato',
      'linkVideo','expensaValor', 'expensaDescripcion', 'longitud', 'latitud', 'cantidadAmbientes', 'disponible',
      'descripcion', 'tipo_id', 'garante_id', 'inquilino_id', 'propietario_id', 'barrio_id','edificio_id' */

    public function store(Request $request) {

        $inmueble = new Inmueble($request->all());
        $inmueble->localidad_id = $request->ubicacion_localidad_id;
        $inmueble->direccion = $request->ubicacion_direccion;
        $inmueble->disponible = 'si';


        if (!is_null($request->fechaHabilitacion)){ //si se cargó una fecha de Habilitacion se formatea para guardar en la base
            $fechaHabilitacion = str_replace('/', '-', $request->fechaHabilitacion);
            $inmueble->fechaHabilitacion = date('Y-m-d', strtotime($fechaHabilitacion));                
        }


        /*         * * Datos de Propietario ** */
        if (!is_null($request->propietario_nuevo)) {     //*si no se recibe una persona asignada como propietario, crear una
            $nombreImagen = 'sin imagen';
            if ($request->file('imagen')) {
                $file = $request->file('imagen');
                $nombreImagen = 'persona_' . time() . '.' . $file->getClientOriginalExtension();
                Storage::disk('personas')->put($nombreImagen, \File::get($file));
            }
            /* datos de persona */
            $persona = new Persona($request->all());
            $persona->foto_perfil = $nombreImagen;
            $persona->save();
            /* datos de propietario */
            $propietario = new Propietario($request->all());
            $propietario->persona_id = $persona->id;
            $propietario->save();
            $inmueble->propietario_id = $propietario->id;
        }

        $inmueble->save();

        /*         * ** Caracteristicas del Inmueble ** */
        $cantidad_caracteristicas = (int) $request->cantidad_caracteristicas;
        for ($i = 1; $i <= $cantidad_caracteristicas; $i++) {
            $caracteristica = new CaracteristicaInmueble();
            $caracteristica->caracteristica_id = $request["caracteristica" . $i];
            $caracteristica->inmueble_id = $inmueble->id;
            $caracteristica->save();
        }

        /*         * ** Imagenes de Inmueble ** */
        if ($request->file('foto_presentacion_nuevo')) {
            $file = $request->file('foto_presentacion_nuevo');
            $nombreImagen = 'INube_' . time() . '.jpg'; // Le damos un nombre por defecto: la primera parte es IN + momento + "."extensión
            Storage::disk('inmuebles')->put($nombreImagen, File::get($file));
            //Creación y asociación del registro de Logo con su respectiva Marca.
            $imagen = new ImagenInmueble();
            $imagen->nombre = $nombreImagen;
            $imagen->inmueble_id = $inmueble->id;
            $imagen->seccion_imagen = 'portada';
            $imagen->espacio_id = null; //associate($marca);
            $imagen->save();
        }

        if ($request->file('foto_carrusel_1')) {
            $file = $request->file('foto_carrusel_1');
            $nombreImagen = 'INube_slide1_' . time() . '.jpg'; // Le damos un nombre por defecto: la primera parte es IN + momento + "."extensión
            Storage::disk('inmuebles')->put($nombreImagen, File::get($file));
            $imagen = new ImagenInmueble();
            $imagen->nombre = $nombreImagen;
            $imagen->inmueble_id = $inmueble->id;
            $imagen->seccion_imagen = 'slider';
            $imagen->espacio_id = null; //associate($marca);
            $imagen->save();
        }
        if ($request->file('foto_carrusel_2')) {
            $file = $request->file('foto_carrusel_2');
            $nombreImagen = 'INube_slide2_' . time() . '.jpg'; // Le damos un nombre por defecto: la primera parte es IN + momento + "."extensión
            Storage::disk('inmuebles')->put($nombreImagen, File::get($file));
            $imagen = new ImagenInmueble();
            $imagen->nombre = $nombreImagen;
            $imagen->inmueble_id = $inmueble->id;
            $imagen->seccion_imagen = 'slider';
            $imagen->espacio_id = null; //associate($marca);
            $imagen->save();
        }
        if ($request->file('foto_carrusel_3')) {
            $file = $request->file('foto_carrusel_3');
            $nombreImagen = 'INube_slide3_' . time() . '.jpg'; // Le damos un nombre por defecto: la primera parte es IN + momento + "."extensión
            Storage::disk('inmuebles')->put($nombreImagen, File::get($file));
            $imagen = new ImagenInmueble();
            $imagen->nombre = $nombreImagen;
            $imagen->inmueble_id = $inmueble->id;
            $imagen->seccion_imagen = 'slider';
            $imagen->espacio_id = null; //associate($marca);
            $imagen->save();
        }
        if ($request->file('foto_carrusel_4')) {
            $file = $request->file('foto_carrusel_4');
            $nombreImagen = 'INube_slide4_' . time() . '.jpg'; // Le damos un nombre por defecto: la primera parte es IN + momento + "."extensión
            Storage::disk('inmuebles')->put($nombreImagen, File::get($file));
            $imagen = new ImagenInmueble();
            $imagen->nombre = $nombreImagen;
            $imagen->inmueble_id = $inmueble->id;
            $imagen->seccion_imagen = 'slider';
            $imagen->espacio_id = null; //associate($marca);
            $imagen->save();
        }
        if ($request->file('foto_carrusel_5')) {
            $file = $request->file('foto_carrusel_5');
            $nombreImagen = 'INube_slide5_' . time() . '.jpg'; // Le damos un nombre por defecto: la primera parte es IN + momento + "."extensión
            Storage::disk('inmuebles')->put($nombreImagen, File::get($file));
            $imagen = new ImagenInmueble();
            $imagen->nombre = $nombreImagen;
            $imagen->inmueble_id = $inmueble->id;
            $imagen->seccion_imagen = 'slider';
            $imagen->espacio_id = null; //associate($marca);
            $imagen->save();
        }
        if ($request->file('foto_detalle_1')) {     //←1° imagen de detalle
            $file = $request->file('foto_detalle_1');
            $nombreImagen = 'INube_detalle1_' . time() . '.jpg'; // Le damos un nombre por defecto: la primera parte es IN + momento + "."extensión
            Storage::disk('inmuebles')->put($nombreImagen, File::get($file));
            $imagen = new ImagenInmueble();
            $imagen->nombre = $nombreImagen;
            $imagen->inmueble_id = $inmueble->id;
            $imagen->seccion_imagen = 'detalle';
            $imagen->espacio_id = $request->ambiente1; //associate($marca);
            $imagen->save();
        }
        if ($request->file('foto_detalle_2')) {     //←2° imagen de detalle
            $file = $request->file('foto_detalle_2');
            $nombreImagen = 'INube_detalle2_' . time() . '.jpg'; // Le damos un nombre por defecto: la primera parte es IN + momento + "."extensión
            Storage::disk('inmuebles')->put($nombreImagen, File::get($file));
            $imagen = new ImagenInmueble();
            $imagen->nombre = $nombreImagen;
            $imagen->inmueble_id = $inmueble->id;
            $imagen->seccion_imagen = 'detalle';
            $imagen->espacio_id = $request->ambiente2;
            $imagen->save();
        }
        if ($request->file('foto_detalle_3')) {     //←3° imagen de detalle
            $file = $request->file('foto_detalle_3');
            $nombreImagen = 'INube_detalle3_' . time() . '.jpg'; // Le damos un nombre por defecto: la primera parte es IN + momento + "."extensión
            Storage::disk('inmuebles')->put($nombreImagen, File::get($file));
            $imagen = new ImagenInmueble();
            $imagen->nombre = $nombreImagen;
            $imagen->inmueble_id = $inmueble->id;
            $imagen->seccion_imagen = 'detalle';
            $imagen->espacio_id = $request->ambiente3;
            $imagen->save();
        }
        if ($request->file('foto_detalle_4')) {     //←4° imagen de detalle
            $file = $request->file('foto_detalle_4');
            $nombreImagen = 'INube_detalle4_' . time() . '.jpg'; // Le damos un nombre por defecto: la primera parte es IN + momento + "."extensión
            Storage::disk('inmuebles')->put($nombreImagen, File::get($file));
            $imagen = new ImagenInmueble();
            $imagen->nombre = $nombreImagen;
            $imagen->inmueble_id = $inmueble->id;
            $imagen->seccion_imagen = 'detalle';
            $imagen->espacio_id = $request->ambiente4;
            $imagen->save();
        }
        if ($request->file('foto_plano_1')) {     //←1° Plano de casa
            $file = $request->file('foto_plano_1');
            $nombreImagen = 'INube_plano1_' . time() . '.jpg'; // Le damos un nombre por defecto: la primera parte es IN + momento + "."extensión
            Storage::disk('inmuebles')->put($nombreImagen, File::get($file));
            $imagen = new ImagenInmueble();
            $imagen->nombre = $nombreImagen;
            $imagen->inmueble_id = $inmueble->id;
            $imagen->seccion_imagen = 'planoMin';
            $imagen->espacio_id = null;
            $imagen->save();
        }
        if ($request->file('foto_plano_2')) {     //←2° Plano de casa
            $file = $request->file('foto_plano_2');
            $nombreImagen = 'INube_plano2_' . time() . '.jpg'; // Le damos un nombre por defecto: la primera parte es IN + momento + "."extensión
            Storage::disk('inmuebles')->put($nombreImagen, File::get($file));
            $imagen = new ImagenInmueble();
            $imagen->nombre = $nombreImagen;
            $imagen->inmueble_id = $inmueble->id;
            $imagen->seccion_imagen = 'planoMin';
            $imagen->espacio_id = null;
            $imagen->save();
        }

        return response()->json('ok');
    }

    public function show($id) {
        $inmueble = Inmueble::find($id);
        $imagenesInmueble = ImagenInmueble::where('inmueble_id', $id)->orderBy('id', 'desc')->get();

        $imagenes_detalle = [];
        $imagen_portada;
        $imagenes_planos = [];
        $imagenes_carrusel = [];

        $index_detalle = 0;
        $index_planos = 0;
        $index_carrusel = 0;

        foreach ($imagenesInmueble as $imagen) {
            if ($imagen->seccion_imagen == 'portada') {
                $imagen_portada = $imagen;
            }
            if ($imagen->seccion_imagen == 'slider') {
                $index_carrusel++;
                $dato = array(
                    "indice" => $index_carrusel,
                    "imagen" => $imagen
                );
                array_push($imagenes_carrusel, $dato);
            }
            if ($imagen->seccion_imagen == 'detalle') {
                $index_detalle++;
                $dato = array(
                    "indice" => $index_detalle,
                    "imagen" => $imagen
                );
                array_push($imagenes_detalle, $dato);
            }
            if ($imagen->seccion_imagen == 'planoMin') {
                $index_planos++;
                $dato = array(
                    "indice" => $index_planos,
                    "imagen" => $imagen
                );
                array_push($imagenes_planos, $dato);
            }
        }

        return view('admin.inmuebles.formulario.show')
                        ->with('inmueble', $inmueble)
                        ->with('imagenes_detalle', $imagenes_detalle)
                        ->with('imagen_portada', $imagen_portada)
                        ->with('imagenes_planos', $imagenes_planos)
                        ->with('imagenes_carrusel', $imagenes_carrusel);
    }

    public function edit($id) {

        $caracteristicas = Caracteristica::all();
        $edificios = Edificio::all();
        $paises = Pais::all();
        $provincias = Provincia::all();
        $localidades = Localidad::all();
        $barrios = Barrio::all();
        $tipos = Tipo::all();
        $espacios = Espacio::all();
        $personas = Persona::all();
        $propietarios = Propietario::all();

        $inmueble = Inmueble::find($id);
        $imagenesInmueble = ImagenInmueble::where('inmueble_id', $id)->orderBy('id', 'desc')->get();
        $imagenes_detalle = [];
        $imagen_portada;
        $imagenes_planos = [];
        $imagenes_carrusel = [];
        $index_detalle = 0;
        $index_planos = 0;
        $index_carrusel = 0;

        foreach ($imagenesInmueble as $imagen) {
            if ($imagen->seccion_imagen == 'portada') {
                $imagen_portada = $imagen;
            }
            if ($imagen->seccion_imagen == 'slider') {
                $index_carrusel++;
                $dato = array(
                    "indice" => $index_carrusel,
                    "imagen" => $imagen
                );
                array_push($imagenes_carrusel, $dato);
            }
            if ($imagen->seccion_imagen == 'detalle') {
                $index_detalle++;
                $dato = array(
                    "indice" => $index_detalle,
                    "imagen" => $imagen
                );
                array_push($imagenes_detalle, $dato);
            }
            if ($imagen->seccion_imagen == 'planoMin') {
                $index_planos++;
                $dato = array(
                    "indice" => $index_planos,
                    "imagen" => $imagen
                );
                array_push($imagenes_planos, $dato);
            }
        }

        return view('admin.inmuebles.formulario.editar')
                        ->with('inmueble', $inmueble)
                        ->with('imagenes_detalle', $imagenes_detalle)
                        ->with('imagen_portada', $imagen_portada)
                        ->with('imagenes_planos', $imagenes_planos)
                        ->with('imagenes_carrusel', $imagenes_carrusel)
                        ->with('tipos', $tipos)
                        ->with('edificios', $edificios)
                        ->with('paises', $paises)
                        ->with('provincias', $provincias)
                        ->with('localidades', $localidades)
                        ->with('barrios', $barrios)
                        ->with('espacios', $espacios)
                        ->with('personas', $personas)
                        ->with('propietarios', $propietarios)
                        ->with('caracteristicas', $caracteristicas);
    }

    public function update(Request $request, $id) {

        $inmueble = Inmueble::find($id);
        $inmueble->fill($request->all());

        if (!is_null($request->fechaHabilitacion)){ //si se cargó una fecha de Habilitacion se formatea para guardar en la base
            $fechaHabilitacion = str_replace('/', '-', $request->fechaHabilitacion);
            $inmueble->fechaHabilitacion = date('Y-m-d', strtotime($fechaHabilitacion));                
        }

        $inmueble->localidad_id = $request->ubicacion_localidad_id;
        $inmueble->direccion = $request->ubicacion_direccion;
        $inmueble->save();

        $imagenesInmueble = ImagenInmueble::where('inmueble_id', $id)->orderBy('id', 'desc')->get();

        foreach ($imagenesInmueble as $imagen) {
            Storage::disk('usuarios')->delete($imagen->nombre); // Borramos la imagen asociada.
            $imagen->delete();
        }

        /*         * ** Imagenes de Inmueble ** */
        if ($request->file('foto_presentacion_nuevo')) {
            $file = $request->file('foto_presentacion_nuevo');
            $nombreImagen = 'INube_' . time() . '.jpg'; // Le damos un nombre por defecto: la primera parte es IN + momento + "."extensión
            Storage::disk('inmuebles')->put($nombreImagen, File::get($file));
            //Creación y asociación del registro de Logo con su respectiva Marca.
            $imagen = new ImagenInmueble();
            $imagen->nombre = $nombreImagen;
            $imagen->inmueble_id = $inmueble->id;
            $imagen->seccion_imagen = 'portada';
            $imagen->espacio_id = null; //associate($marca);
            $imagen->save();
        }

        if ($request->file('foto_carrusel_1')) {
            $file = $request->file('foto_carrusel_1');
            $nombreImagen = 'INube_slide1_' . time() . '.jpg'; // Le damos un nombre por defecto: la primera parte es IN + momento + "."extensión
            Storage::disk('inmuebles')->put($nombreImagen, File::get($file));
            $imagen = new ImagenInmueble();
            $imagen->nombre = $nombreImagen;
            $imagen->inmueble_id = $inmueble->id;
            $imagen->seccion_imagen = 'slider';
            $imagen->espacio_id = null; //associate($marca);
            $imagen->save();
        }
        if ($request->file('foto_carrusel_2')) {
            $file = $request->file('foto_carrusel_2');
            $nombreImagen = 'INube_slide2_' . time() . '.jpg'; // Le damos un nombre por defecto: la primera parte es IN + momento + "."extensión
            Storage::disk('inmuebles')->put($nombreImagen, File::get($file));
            $imagen = new ImagenInmueble();
            $imagen->nombre = $nombreImagen;
            $imagen->inmueble_id = $inmueble->id;
            $imagen->seccion_imagen = 'slider';
            $imagen->espacio_id = null; //associate($marca);
            $imagen->save();
        }
        if ($request->file('foto_carrusel_3')) {
            $file = $request->file('foto_carrusel_3');
            $nombreImagen = 'INube_slide3_' . time() . '.jpg'; // Le damos un nombre por defecto: la primera parte es IN + momento + "."extensión
            Storage::disk('inmuebles')->put($nombreImagen, File::get($file));
            $imagen = new ImagenInmueble();
            $imagen->nombre = $nombreImagen;
            $imagen->inmueble_id = $inmueble->id;
            $imagen->seccion_imagen = 'slider';
            $imagen->espacio_id = null; //associate($marca);
            $imagen->save();
        }
        if ($request->file('foto_carrusel_4')) {
            $file = $request->file('foto_carrusel_4');
            $nombreImagen = 'INube_slide4_' . time() . '.jpg'; // Le damos un nombre por defecto: la primera parte es IN + momento + "."extensión
            Storage::disk('inmuebles')->put($nombreImagen, File::get($file));
            $imagen = new ImagenInmueble();
            $imagen->nombre = $nombreImagen;
            $imagen->inmueble_id = $inmueble->id;
            $imagen->seccion_imagen = 'slider';
            $imagen->espacio_id = null; //associate($marca);
            $imagen->save();
        }
        if ($request->file('foto_carrusel_5')) {
            $file = $request->file('foto_carrusel_5');
            $nombreImagen = 'INube_slide5_' . time() . '.jpg'; // Le damos un nombre por defecto: la primera parte es IN + momento + "."extensión
            Storage::disk('inmuebles')->put($nombreImagen, File::get($file));
            $imagen = new ImagenInmueble();
            $imagen->nombre = $nombreImagen;
            $imagen->inmueble_id = $inmueble->id;
            $imagen->seccion_imagen = 'slider';
            $imagen->espacio_id = null; //associate($marca);
            $imagen->save();
        }
        if ($request->file('foto_detalle_1')) {     //←1° imagen de detalle
            $file = $request->file('foto_detalle_1');
            $nombreImagen = 'INube_detalle1_' . time() . '.jpg'; // Le damos un nombre por defecto: la primera parte es IN + momento + "."extensión
            Storage::disk('inmuebles')->put($nombreImagen, File::get($file));
            $imagen = new ImagenInmueble();
            $imagen->nombre = $nombreImagen;
            $imagen->inmueble_id = $inmueble->id;
            $imagen->seccion_imagen = 'detalle';
            $imagen->espacio_id = $request->ambiente1; //associate($marca);
            $imagen->save();
        }
        if ($request->file('foto_detalle_2')) {     //←2° imagen de detalle
            $file = $request->file('foto_detalle_2');
            $nombreImagen = 'INube_detalle2_' . time() . '.jpg'; // Le damos un nombre por defecto: la primera parte es IN + momento + "."extensión
            Storage::disk('inmuebles')->put($nombreImagen, File::get($file));
            $imagen = new ImagenInmueble();
            $imagen->nombre = $nombreImagen;
            $imagen->inmueble_id = $inmueble->id;
            $imagen->seccion_imagen = 'detalle';
            $imagen->espacio_id = $request->ambiente2;
            $imagen->save();
        }
        if ($request->file('foto_detalle_3')) {     //←3° imagen de detalle
            $file = $request->file('foto_detalle_3');
            $nombreImagen = 'INube_detalle3_' . time() . '.jpg'; // Le damos un nombre por defecto: la primera parte es IN + momento + "."extensión
            Storage::disk('inmuebles')->put($nombreImagen, File::get($file));
            $imagen = new ImagenInmueble();
            $imagen->nombre = $nombreImagen;
            $imagen->inmueble_id = $inmueble->id;
            $imagen->seccion_imagen = 'detalle';
            $imagen->espacio_id = $request->ambiente3;
            $imagen->save();
        }
        if ($request->file('foto_detalle_4')) {     //←4° imagen de detalle
            $file = $request->file('foto_detalle_4');
            $nombreImagen = 'INube_detalle4_' . time() . '.jpg'; // Le damos un nombre por defecto: la primera parte es IN + momento + "."extensión
            Storage::disk('inmuebles')->put($nombreImagen, File::get($file));
            $imagen = new ImagenInmueble();
            $imagen->nombre = $nombreImagen;
            $imagen->inmueble_id = $inmueble->id;
            $imagen->seccion_imagen = 'detalle';
            $imagen->espacio_id = $request->ambiente4;
            $imagen->save();
        }
        if ($request->file('foto_plano_1')) {     //←1° Plano de casa
            $file = $request->file('foto_plano_1');
            $nombreImagen = 'INube_plano1_' . time() . '.jpg'; // Le damos un nombre por defecto: la primera parte es IN + momento + "."extensión
            Storage::disk('inmuebles')->put($nombreImagen, File::get($file));
            $imagen = new ImagenInmueble();
            $imagen->nombre = $nombreImagen;
            $imagen->inmueble_id = $inmueble->id;
            $imagen->seccion_imagen = 'planoMin';
            $imagen->espacio_id = null;
            $imagen->save();
        }
        if ($request->file('foto_plano_2')) {     //←2° Plano de casa
            $file = $request->file('foto_plano_2');
            $nombreImagen = 'INube_plano2_' . time() . '.jpg'; // Le damos un nombre por defecto: la primera parte es IN + momento + "."extensión
            Storage::disk('inmuebles')->put($nombreImagen, File::get($file));
            $imagen = new ImagenInmueble();
            $imagen->nombre = $nombreImagen;
            $imagen->inmueble_id = $inmueble->id;
            $imagen->seccion_imagen = 'planoMin';
            $imagen->espacio_id = null;
            $imagen->save();
        }

        return response()->json('ok');
    }

    public function destroy($id) {

        $inmueble = Inmueble::find($id);

        $imagenesInmueble = ImagenInmueble::where('inmueble_id', $id)->orderBy('id', 'desc')->get();

        foreach ($imagenesInmueble as $imagen) {
            Storage::disk('usuarios')->delete($imagen->nombre); // Borramos la imagen asociada.
            $imagen->delete();
        }


        $inmueble->delete();
        Session::flash('message', 'El inmueble ha sido eliminado del sistema');
        return redirect()->route('inmueble.index');
    }

}
