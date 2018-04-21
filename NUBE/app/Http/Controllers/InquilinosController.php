<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Inquilino;
use App\Localidad;
use App\Inmueble;
use App\Auditoria;
use App\Persona;
use App\Pais;
use Carbon\Carbon;
use Storage;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use App\Http\Requests\InquilinoRequestCreate;
use App\Http\Requests\InquilinoRequestEdit;
use Illuminate\Http\Request;
use Session;

class InquilinosController extends Controller {

    public function __construct() {
        Carbon::setlocale('es'); // Instancio en Español el manejador de fechas de Laravel
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $inquilinos = Inquilino::all();
        $inmuebles = Inmueble::all();
        $paises = Pais::all();
        $localidades = Localidad::all();
        $personas = Persona::all()->whereNotIn('id', $inquilinos->pluck('id')->toArray());
        return view('admin.inquilinos.main')
                        ->with('inquilinos', $inquilinos)
                        ->with('personas', $personas)
                        ->with('paises', $paises)
                        ->with('inmuebles', $inmuebles)
                        ->with('localidades', $localidades); // se devuelven los registros
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
        $nombreImagen = 'sin_imagen.png';
        if ($request->file('imagen')) {
            $file = $request->file('imagen');
            $nombreImagen = 'persona_' . time() .'.png';
            Storage::disk('personas')->put($nombreImagen, \File::get($file));
        }
        
             /**
         * datos del usuario
         */
        $user_nuevo = new User();
        $user_nuevo->name = $request->nombre . " " . $request->apellido;
        $user_nuevo->email = $request->email;
        $user_nuevo->password = rand();
        $user_nuevo->imagen = $nombreImagen;
        $user_nuevo->save();
        $user_nuevo->assignRole('Cliente');

        //Envío de correo para notificar la creación del nuevo usuario
      
        Mail::send('emails.confirmacion_inscripcion', ['user_nuevo' => $user_nuevo], function ($m) use ($user_nuevo) {
            $m->from('sistemanube@gmail.com', 'Nube Propiedades | Notificación de creación de usuario');
            $m->to($user_nuevo->email, $user_nuevo->name)->subject('No conteste este correo.');
        });

        /**
         * datos de persona
         */
        $persona = new Persona($request->all());
        $persona->foto_perfil = $nombreImagen;
        $persona->user_id = $user_nuevo->id;
        $persona->save();

        /**
         * datos del inquilino
         */

        $inquilino = new Inquilino($request->all());
        $inquilino->persona_id = $persona->id;
        $inquilino->save();
        Session::flash('message', 'Se ha registrado un nuevo inquilino.');
        return redirect()->route('inquilinos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $inquilinos = Inquilino::all();
        $inquilino = Inquilino::find($id);
        $paises = Pais::all();
        $localidades = Localidad::all();
        $personas = Persona::all()->whereNotIn('id', $inquilinos->pluck('id')->toArray());
        return view('admin.inquilinos.show')
                        ->with('inquilino', $inquilino)
                        ->with('paises', $paises)
                        ->with('personas', $personas)
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
        $inquilino = Inquilino::find($id);
        $persona = Persona::find($inquilino->persona_id);
        $nombreImagen = "sin_imagen.png";
        
        if ($request->file('imagen')) {
            $file = $request->file('imagen');
            $nombreImagen = 'persona_' . time() .'.png';
            if ((Storage::disk('personas')->exists($persona->foto_perfil)) && ($persona->foto_perfil !== "sin_imagen.png")) {
                Storage::disk('personas')->delete($persona->foto_perfil);   // Borramos la imagen anterior.      
            }
            $persona->fill($request->all());
            $persona->foto_perfil = $nombreImagen;  // Actualizamos el nombre de la nueva imagen.
            Storage::disk('personas')->put($nombreImagen, \File::get($file)); // Movemos la imagen nueva al directorio /imagenes/personas           
            $persona->save();
            $inquilino->fill($request->all());
            $inquilino->save();
            Session::flash('message', '¡Se ha actualizado la información del paciente con éxito!');
            return redirect()->route('inquilinos.index');
        }
        $persona->fill($request->all());
        $persona->save();
        $inquilino->fill($request->all());
        $inquilino->save();
        Session::flash('message', '¡Se ha actualizado la información del inquilino con éxito!');
        return redirect()->route('inquilinos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $inquilino = Inquilino::find($id);
        $persona = Persona::find($inquilino->persona_id);
        if ($persona->foto_perfil != 'sin_imagen.png') {
            Storage::disk('personas')->delete($persona->foto_perfil); // Borramos la imagen asociada.
        }
        $inquilino->delete();
        $persona->delete();
        Session::flash('message', 'La información asociada al inquilino ha sido eliminada del sistema');
        return redirect()->route('inquilinos.index');
    }

}
