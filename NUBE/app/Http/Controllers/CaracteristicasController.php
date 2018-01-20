<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tipo;
use App\Caracteristica;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
Use Session;

class CaracteristicasController extends Controller {

    public function __construct() {
        Carbon::setlocale('es'); // Instancio en Español el manejador de fechas de Laravel
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $caracteristicas = Caracteristica::all();
        $tipos = Tipo::all();
//        if ($tiposes->count()==0){ // la funcion count te devuelve la cantidad de registros contenidos en la cadena
//            return view('admin.tiposes.sinRegistros'); //se devuelve la vista para crear un registro
//        } else {
        return view('admin.caracteristica.main')
                ->with('tipos', $tipos)
                ->with('caracteristicas', $caracteristicas); // se devuelven los registros
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
        $caracteristica = new Caracteristica($request->all());
        $caracteristica->save();
        Session::flash('message', '¡Se ha registrado a una característica de inmueble!');
        return redirect()->route('caracteristicas.index');
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
        $caracteristica = Caracteristica::find($id);
        $caracteristica->fill($request->all());
        $caracteristica->save();
        Session::flash('message', '¡Se ha actualizado la información de una característica con éxito!');
        return redirect()->route('caracteristicas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $caracteristica = Caracteristica::find($id);
        $caracteristica->delete();
        Session::flash('message', '¡La característica seleccionada a sido eliminada!');
        return redirect()->route('caracteristicas.index');
    }

}
