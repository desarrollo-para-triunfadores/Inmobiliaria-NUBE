<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Ambiente;
use App\Localidad;
use App\Pais;
use App\Auditoria;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use Carbon\Carbon;
use App\Http\Requests\ambienteRequestCreate;
use App\Http\Requests\ambienteRequestEdit;

class AmbientesController extends Controller
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
        $ambientes = Ambiente::all();
        if ($ambientes->count()==0){ // la funcion count te devuelve la cantidad de registros contenidos en la cadena
            return view('admin.ambientes.sinRegistros')->with('ambientes', $ambientes); //se devuelve la vista para crear un registro
        } else {
            return view('admin.ambientes.tabla')->with('ambientes', $ambientes)->with('ambientes', $ambientes); // se devuelven los registros
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        return view('admin.ambientes.create');
    }


    public function store(ambienteRequestCreate $request)
    {   
        $ambiente = new ambiente($request->all());
        $ambiente->save();
        Flash::success('La ambiente "'. $ambiente->nombre.'" ha sido registrada de forma existosa.');
        /** Auditoria almacena creacion */
        $auditoria = new Auditoria();
        $auditoria->tabla = "ambientes";
        $auditoria->elemento_id = $ambiente->id;
        $autor = new Auth();
        $autor->id = Auth::user()->id;          //Conseguimos el id del usuario actualmente logueado
        $auditoria->usuario_id = $autor->id;    //lo asignamos a la auditorias
        $auditoria->accion = "alta";
        $auditoria->dato_nuevo = "nombre: ".$ambiente->nombre."|| pais_id: ".$ambiente->pais_id;
        $auditoria->dato_anterior = null;
        $auditoria->save();
        return redirect()->route('admin.ambientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $paises = Pais::all()->lists('nombre','id'); 
        $ambiente = ambiente::find($id);
        return view('admin.ambientes.show')
            ->with('ambiente', $ambiente)
            ->with('paises', $paises);
    }


    public function update(AmbienteRequestEdit $request, $id)
    {
        $ambiente = ambiente::find($id);
        $dato_anterior = "nombre: ".$ambiente->nombre."|| pais_id: ".$ambiente->pais_id;        //obtenemos el 'nombre' del registro antes de sobreescribirlo
        $ambiente->fill($request->all());
        $ambiente->save();

        /** Auditoria actualizacion */
        $auditoria = new Auditoria();
        $auditoria->tabla = "ambientes";
        $auditoria->elemento_id = $ambiente->id;
        $autor = new Auth();
        $autor->id = Auth::user()->id;          //Conseguimos el id del usuario actualmente logueado
        $auditoria->usuario_id = $autor->id;    //lo asignamos a la auditorias
        $auditoria->accion = "modificacion";
        $auditoria->dato_nuevo = "nombre: ".$ambiente->nombre."|| pais_id: ".$ambiente->pais_id;
        $auditoria->dato_anterior = $dato_anterior;
        $auditoria->save();

        Flash::success("Se ha realizado la actualización del registro: ".$ambiente->nombre.".");
        return redirect()->route('admin.ambientes.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ambiente = Ambiente::find($id);
        $dato_anterior ="nombre: ".$ambiente->nombre." || pais_id: ".$ambiente->pais_id;

        /** Auditoria eliminación */
        $auditoria = new Auditoria();
        $auditoria->tabla = "ambientes";
        $auditoria->elemento_id = $ambiente->id;
        $autor = new Auth();
        $autor->id = Auth::user()->id;          //Conseguimos el id del usuario actualmente logueado
        $auditoria->usuario_id = $autor->id;    //lo asignamos a la auditorias
        $auditoria->accion = "eliminacion";

        $auditoria->dato_anterior = $dato_anterior;
        $auditoria->save();

        $ambiente->delete();
        Flash::error("Se ha realizado la eliminación del registro: ".$ambiente->nombre.".");
        return redirect()->route('admin.ambientes.index');
    }

    /** Esta funcion llama al metodo del modelo que obtiene las localidades ingresando id ambiente */
    public function getLocalidades(Request $request, $id){
        if($request->ajax()){
            $localidadesDeambiente = Localidad::localidades($id);
            return response()->json($localidadesDeambiente);
        }
    }
}
