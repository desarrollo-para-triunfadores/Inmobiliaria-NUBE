<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tipo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
Use Session;

class TiposController extends Controller {

    public function __construct() {
        Carbon::setlocale('es'); // Instancio en Español el manejador de fechas de Laravel
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $tipos = Tipo::all();
//        if ($tiposes->count()==0){ // la funcion count te devuelve la cantidad de registros contenidos en la cadena
//            return view('admin.tiposes.sinRegistros'); //se devuelve la vista para crear un registro
//        } else {
        return view('admin.tipocaracteristica.main')->with('tipos', $tipos); // se devuelven los registros
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
        $tipos = new Tipo($request->all());
        $tipos->save();
        Session::flash('message', '¡Se ha registrado a un nuevo tipo de característica!');
        return redirect()->route('tipos_caracteristicas.index');
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $tipos = Tipo::find($id);
        $tipos->fill($request->all());
        $tipos->save();
        Session::flash('message', '¡Se ha actualizado la información del tipo de característica con éxito!');
        return redirect()->route('tipos_caracteristicas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $tipos = Tipo::find($id);
        $tipos->delete();
        Session::flash('message', '¡El tipo de característica seleccionado a sido eliminado!');
        return redirect()->route('tipos_caracteristicas.index');
    }

}
