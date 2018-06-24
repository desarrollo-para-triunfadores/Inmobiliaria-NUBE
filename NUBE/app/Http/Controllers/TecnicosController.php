<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tecnico;
use App\User;
use App\RubroTecnico;
use App\Persona;
use App\Pais;
use App\Localidad;
use Storage;
use Illuminate\Support\Facades\Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
Use Session;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class TecnicosController extends Controller
{
    public function index(){
        $tecnicos = Tecnico::all();
        $paises = Pais::all();
        $localidades = Localidad::all();
        $rubrosTecnicos = RubroTecnico::all();

        return view('admin.tecnicos.main')
            ->with('tecnicos',$tecnicos)
            ->with('rubrostecnicos',$rubrosTecnicos)
            ->with('paises',$paises)
            ->with('localidades',$localidades); 
    }

    public function tecnicosxrubro(Request $request){    
        //dd($request);
        $tecnicos = Tecnico::where('rubroTecnico_id',$request->id)->get();
        foreach($tecnicos as $tecnico){
            $persona = $tecnico->persona;
            $listado_tecnicos[] = array("tecnico"=>$tecnico,  "persona"=>$persona);
        }
        return response()->json(json_encode($listado_tecnicos, true));    
    }
   
    public function create() {
        //
    }

    public function store(Request $request) {
       
        $persona_id = $request->persona_id;

        if (is_null($request->persona_id)) {    
            /**
             * Si no llega un id de persona se crea un usuario, un persona y se notifica
             */            
            $nombreImagen = 'sin imagen';
            if ($request->file('imagen')) {
                $file = $request->file('imagen');
                $nombreImagen = 'persona_' . time() .'.png';
                Storage::disk('personas')->put($nombreImagen, \File::get($file));
            }    
            /*** datos del usuario */
            $user_nuevo = new User();
            $user_nuevo->name = $request->nombre . " " . $request->apellido;
            $user_nuevo->email = $request->email;
            $user_nuevo->password = bcrypt(rand());
            $user_nuevo->imagen = $nombreImagen;
            $user_nuevo->save();
            $user_nuevo->assignRole('Personal');
    
            //Envío de correo para notificar la creación del nuevo usuario
          
            Mail::send('emails.confirmacion_inscripcion', ['user_nuevo' => $user_nuevo], function ($m) use ($user_nuevo) {
                $m->from('sistemanube@gmail.com', 'Nube Propiedades | Notificación de creación de usuario');
                $m->to($user_nuevo->email, $user_nuevo->name)->subject('No conteste este correo.');
            });
    
            /*** datos de persona */
            $persona = new Persona($request->all());
            $persona->foto_perfil = $nombreImagen;
            $persona->user_id = $user_nuevo->id;
            $persona->save();
            $persona_id = $persona->id;             
        } 
        /*** datos del técnico*/
        $tecnico = new Tecnico($request->all());
        $tecnico->persona_id = $persona_id;
        $tecnico->rubroTecnico_id = $request->rubrotecnico_id;
        $tecnico->save();        

        Session::flash('message', 'Se ha registrado al nuevo personal de servicio técnico.');
        return redirect()->route('tecnicos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $tecnicos = Tecnico::all();
        $tecnico = Tecnico::find($id);
        $rubrosTecnicos = RubroTecnico::all();
        $paises = Pais::all();
        $localidades = Localidad::all();
        $personas = Persona::all()->whereNotIn('id', $tecnicos->pluck('id')->toArray());
        return view('admin.tecnicos.show')
                        ->with('tecnico', $tecnico)
                        ->with('rubrostecnicos', $rubrosTecnicos)
                        ->with('paises', $paises)
                        ->with('personas', $personas)
                        ->with('localidades', $localidades);
    }

    public function edit($id) {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $tecnico = Tecnico::find($id);
        $persona = Persona::find($tecnico->persona_id);
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
            $tecnico->fill($request->all());
            $tecnico->save();
            Session::flash('message', '¡Se ha actualizado la información del técmocp con éxito!');
            return redirect()->route('tecnicos.index');
        }
        $persona->fill($request->all());
        $persona->save();
        $tecnico->fill($request->all());
        $tecnico->save();
        Session::flash('message', '¡Se ha actualizado la información del técmoco con éxito!');
        return redirect()->route('tecnicos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
      
    }

}
