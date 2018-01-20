<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Garante;
use App\Localidad;
use App\Auditoria;
use App\Persona;
use App\Inmueble;
use App\Pais;
use Carbon\Carbon;
use Storage;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use App\Http\Requests\GaranteRequestCreate;
use App\Http\Requests\GaranteRequestEdit;
use Illuminate\Http\Request;
use Session;

class GarantesController extends Controller {

    public function __construct() {
        Carbon::setlocale('es'); // Instancio en Español el manejador de fechas de Laravel
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $garantes = Garante::all();
        $paises = Pais::all();
        $inmuebles = Inmueble::all();
        $localidades = Localidad::all();
//        if ($garantes->count() == 0) { // la funcion count te devuelve la cantidad de registros contenidos en la cadena
//            return view('admin.garantes.sinRegistros')->with('localidades', $localidades); //se devuelve la vista para crear un registro
//        } else {
        return view('admin.garantes.main')
                        ->with('garantes', $garantes)
                        ->with('paises', $paises)
                        ->with('localidades', $localidades); // se devuelven los registros
//        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
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
        /* datos de garante */
        $garante = new Garante($request->all());
        $garante->persona_id = $persona->id;
        $garante->save();
        Session::flash('message', 'Se ha registrado un nuevo garante.');
        return redirect()->route('garantes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $garante = Garante::find($id);
        $paises = Pais::all();
        $localidades = Localidad::all();
        return view('admin.garantes.show')
                        ->with('garante', $garante)
                        ->with('paises', $paises)
                        ->with('localidades', $localidades);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $garante = Garante::find($id);
        $persona = Persona::find($garante->persona_id);
        if ($request->file('imagen')) {
            $file = $request->file('imagen');
            $nombreImagen = 'persona_' . time() . '.' . $file->getClientOriginalExtension();
            if (Storage::disk('personas')->exists($persona->foto_perfil)) {
                Storage::disk('personas')->delete($persona->foto_perfil);   // Borramos la imagen anterior.      
            }
            $persona->fill($request->all());
            $persona->foto_perfil = $nombreImagen;  // Actualizamos el nombre de la nueva imagen.
            Storage::disk('personas')->put($nombreImagen, \File::get($file)); // Movemos la imagen nueva al directorio /imagenes/personas           
            $persona->save();
            $garante->fill($request->all());
            $garante->save();
            Session::flash('message', '¡Se ha actualizado la información del paciente con éxito!');
            return redirect()->route('garantes.index');
        }
        $persona->fill($request->all());
        $persona->save();
        $garante->fill($request->all());
        $garante->save();
        Session::flash('message', '¡Se ha actualizado la información del garante con éxito!');
        return redirect()->route('garantes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $garante = Inquilino::find($id);
        $persona = Persona::find($garante->persona_id);
        if ($persona->foto_perfil != 'sin imagen') {
            Storage::disk('personas')->delete($persona->foto_perfil); // Borramos la imagen asociada.
        }
        $garante->delete();
        $persona->delete();
        Session::flash('message', 'La información asociada al garante ha sido eliminada del sistema');
        return redirect()->route('pacientes.index');
    }
}
