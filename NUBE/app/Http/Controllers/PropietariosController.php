<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Propietario;
use App\LiquidacionMensual;
use App\Contrato;
use App\Localidad;
use App\Inmueble;
use App\Auditoria;
use App\Persona;
use App\Pais;
use App\User;
use Carbon\Carbon;
use Storage;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use App\Http\Requests\PropietarioRequestCreate;
use App\Http\Requests\PropietarioRequestEdit;
use Illuminate\Http\Request;
use Mail;
use Session;

class PropietariosController extends Controller
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

        $propietarios = Propietario::all();
        $paises = Pais::all();
        $localidades = Localidad::all();
        $personas = Persona::all()->whereNotIn('id', $propietarios->pluck('id')->toArray());
        return view('admin.propietarios.main')
            ->with('propietarios', $propietarios)
            ->with('personas', $personas)
            ->with('paises', $paises)
            ->with('localidades', $localidades); // se devuelven los registros
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $persona_id = $request->persona_id;

        if (is_null($request->persona_id)) {    
            
            /**
             * Si no llega un id de persona se crea un usuario, un persona y se notifica
             */               
            
             $nombreImagen = 'sin_imagen.png';
            if ($request->file('imagen')) {
                $file = $request->file('imagen');
                $nombreImagen = 'persona_' . time() . '.png';
                Storage::disk('personas')->put($nombreImagen, \File::get($file));
            }

            /**
             * datos del usuario
             */
            $user_nuevo = new User();
            $user_nuevo->name = $request->nombre . " " . $request->apellido;
            $user_nuevo->email = $request->email;
            $user_nuevo->password = bcrypt(rand());
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
            $persona_id = $persona->id;
                
        }  

        /**
         * datos del propietario
         */

        $propietario = new Propietario($request->all());
        $propietario->persona_id = $persona_id;
        $propietario->save();
        Session::flash('message', 'Se ha registrado un nuevo propietario.');
        return redirect()->route('propietarios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $propietarios = Propietario::all();
        $propietario = Propietario::find($id);
        $paises = Pais::all();
        $localidades = Localidad::all();
        $personas = Persona::all()->whereNotIn('id', $propietarios->pluck('id')->toArray());
        return view('admin.propietarios.show')
            ->with('propietario', $propietario)
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $propietario = Propietario::find($id);
        $persona = Persona::find($propietario->persona_id);
        $nombreImagen = "sin_imagen.png";

        if ($request->file('imagen')) {
            $file = $request->file('imagen');
            $nombreImagen = 'persona_' . time() . '.png';
            if ((Storage::disk('personas')->exists($persona->foto_perfil)) && ($persona->foto_perfil !== "sin_imagen.png")) {
                Storage::disk('personas')->delete($persona->foto_perfil);   // Borramos la imagen anterior.      
            }
            $persona->fill($request->all());
            $persona->foto_perfil = $nombreImagen;  // Actualizamos el nombre de la nueva imagen.
            Storage::disk('personas')->put($nombreImagen, \File::get($file)); // Movemos la imagen nueva al directorio /imagenes/personas           
            $persona->save();
            $propietario->fill($request->all());
            $propietario->save();
            Session::flash('message', '¡Se ha actualizado la información del paciente con éxito!');
            return redirect()->route('propietarios.index');
        }
        $persona->fill($request->all());
        $persona->save();
        $propietario->fill($request->all());
        $propietario->save();
        Session::flash('message', '¡Se ha actualizado la información del propietario con éxito!');
        return redirect()->route('propietarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $propietario = Propietario::find($id);
        $persona = Persona::find($propietario->persona_id);
        if ($persona->foto_perfil != 'sin_imagen.png') {
            Storage::disk('personas')->delete($persona->foto_perfil); // Borramos la imagen asociada.
        }
        $propietario->delete();
        $persona->delete();
        Session::flash('message', 'La información asociada al propietario ha sido eliminada del sistema');
        return redirect()->route('propietarios.index');
    }

}
