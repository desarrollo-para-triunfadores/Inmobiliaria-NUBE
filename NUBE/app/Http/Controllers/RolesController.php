<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
Use Session;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller {

    public function __construct() {
        Carbon::setlocale('es');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {


        //si la peticion se realiza por ajax, es para solicitar el rol de usuario para un determinado usuario.
        if($request->ajax()){            
            $id_rol = DB::table('model_has_roles')->where('model_id', $request->id)->pluck('role_id')->first();
            $nombre_rol = DB::table('roles')->where('id', $id_rol)->pluck('name')->first();
            return response()->json($nombre_rol);
        }
        $roles = DB::table('roles')->get();      
        return view('admin/roles/main')->with('roles', $roles); // se devuelven los registros
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {     
        $permisos = DB::table('permissions')->get();    
        return view('admin/roles/formulario/create')->with('permisos', $permisos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {      
        $role = Role::create(['name' => $request->nombre]);
        foreach ($request->request as $clave => $valor) {           
            if ($clave !== "_token" && $clave !== "nombre"){
                $role->givePermissionTo($valor);
            }
        }
        Session::flash('message', '¡Se ha registrado a un nuevo rol de acceso');
        return redirect()->route('roles.index');
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
        $rol = DB::table('roles')->where('name', $id)->first();  
        $permisos = DB::table('permissions')->get();    
        return view('admin/roles/formulario/editar')
            ->with('rol', $rol)
            ->with('permisos', $permisos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {    
        $rol = DB::table('roles')->where('id', $id)->first();//obtengo por bd el nombre del rol asociado al id            
        $role = Role::findByName($rol->name); //instancio el objeto rol a partir del nombre        
        DB::table('role_has_permissions')->where('role_id', $id)->delete(); //eliminamos todos los permisos que tiene para volver a asignar
        foreach ($request->request as $clave => $valor) {  //asignamos otra vez los permisos al rol         
            if ($clave !== "_token" && $clave !== "nombre" && $clave !=="_method"){                            
                $role->givePermissionTo($valor);
            }
        }
        DB::table('roles')->where('id', $id)->update(['name' => $request->nombre]); //actualizamos el nombre del rol 
        Session::flash('message', '¡Se ha actualizado la información del rol con éxito!');
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $rol = DB::table('roles')->where('id', $id)->first();//obtengo por bd el nombre del rol asociado al id            
        $role = Role::findByName($rol->name); //instancio el objeto rol a partir del nombre        
        DB::table('role_has_permissions')->where('role_id', $id)->delete(); //eliminamos todos los permisos que tiene para volver a asignar        
        DB::table('model_has_roles')->where('role_id', $id)->delete();
        DB::table('roles')->where('id', $id)->delete();
        Session::flash('message', '¡El rol seleccionado a sido eliminado!');
        return redirect()->route('roles.index');
    }

}
