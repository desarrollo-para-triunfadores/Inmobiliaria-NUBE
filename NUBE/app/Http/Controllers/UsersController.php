<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Storage;

Use Session;

class UsersController extends Controller {

    public function __construct() {
        Carbon::setlocale('es'); // Instancio en Español el manejador de fechas de Laravel
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $users = User::all();
        $roles = DB::table('roles')->get();
        return view('/admin/usuarios/main')
            ->with('usuarios', $users)
            ->with('roles', $roles);
    }

       
    public function create() {
        //
    }

    
    public function store(Request $request) {
        $nombreImagen = 'sin_imagen.png';
        if ($request->file('imagen')) {
            $file = $request->file('imagen');
            $nombreImagen = 'usuario_' . time() .'.png';
            Storage::disk('usuarios')->put($nombreImagen, \File::get($file));
        }

        $user = new User($request->all());
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->imagen = $nombreImagen;        
        $user->save();
        
        $user->assignRole($request->rol_usuario);

        Session::flash('message', '¡Se ha registrado a un nuevo usuario con éxito!');
        return response()->json('ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
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
     * Actualizar el password del usuario.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actPass(Request $request, $id) {
        $usuario = User::find($id);
        $usuario->password = bcrypt($request->password);
        $usuario->save();
        Session::flash('message', '¡Se ha actualizado el password del usuario con éxito!');
        return redirect()->route('admin.usuarios.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $usuario = User::find($id);
        $nombreImagen = "sin_imagen.png";

        if ($request->file('imagen')) {
            $file = $request->file('imagen');
            $nombreImagen = 'usuario_' . time() .'.png';                        
            if ((Storage::disk('usuarios')->exists($usuario->imagen)) && ($usuario->imagen !== "sin_imagen.png")) {
                Storage::disk('usuarios')->delete($usuario->imagen);   // Borramos la imagen anterior.      
            }                      
            Storage::disk('usuarios')->put($nombreImagen, \File::get($file));  // Movemos la imagen nueva al directorio /imagenes/usuarios              
        }
            
        $usuario->fill($request->all());    
        if($nombreImagen !== ""){
            $usuario->imagen = $nombreImagen;  // Actualizamos el nombre de la nueva imagen.       
        }       
        $usuario->save();

        DB::table('model_has_roles')->where('model_id', $usuario->id)->delete(); //eliminamos el rol que posea el usuario y le volvemos a asignar
        $usuario->assignRole($request->rol_usuario);

        Session::flash('message', '¡Se ha actualizado la información del usuario con éxito!');
        return response()->json('ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $usuario = User::find($id);
        if ($usuario->imagen != 'sin_imagen.png') {
            Storage::disk('usuarios')->delete($usuario->imagen); // Borramos la imagen asociada.
        }
        DB::table('model_has_roles')->where('model_id', $usuario->id)->delete();
        $usuario->delete();
        Session::flash('message', '¡El usuario seleccionado a sido eliminado!');
        return redirect()->route('usuarios.index');
    }

}
