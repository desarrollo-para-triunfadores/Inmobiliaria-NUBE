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
            ->with('localidades',$localidades); 
    }

    public function tecnicosxrubro(Request $request){    
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
        $nombreImagen = 'sin imagen';
        if ($request->file('imagen')) {
            $file = $request->file('imagen');
            $nombreImagen = 'persona_' . time() .'.png';
            Storage::disk('personas')->put($nombreImagen, \File::get($file));
        }
        /* datos de persona */
        $persona = new Persona($request->all());
        $persona->foto_perfil = $nombreImagen;

        $persona->save();
        /* datos de tecnico */
        $tecnico = new Tecnico($request->all());
        $tecnico->persona_id = $persona->id;
        $tecnico->save();
        
        $user = new User();
        $user->name= $request->nombre." ".$reuest->apellido;                        
        $password_sin_hash = str_random(6);
        $user->password = Hash::make($password_sin_hash);
        $user->email = $request->email;
        $user->rol_id = 2;  //TECNICO

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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