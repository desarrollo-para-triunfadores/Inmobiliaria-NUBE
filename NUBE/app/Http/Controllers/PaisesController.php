<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pais;
use App\Provincia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
Use Session;

class PaisesController extends Controller {

    public function __construct() {
        Carbon::setlocale('es');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        //si la peticion se realiza por ajax, quiere decir que estamos en vista clientes.createForm intentando encontrar provincias desde pais en un select.
        if($request->ajax()){
            $provinciasDePais = Provincia::provincias($request->id);
            return response()->json($provinciasDePais);
        }
        $paises = Pais::all();
//        if ($paises->count()==0){ // la funcion count te devuelve la cantidad de registros contenidos en la cadena
//            return view('admin.paises.sinRegistros'); //se devuelve la vista para crear un registro
//        } else {
        return view('/admin/paises/main')->with('paises', $paises); // se devuelven los registros
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
        $pais = new Pais($request->all());
        $pais->save();
        Session::flash('message', '¡Se ha registrado a un nuevo país!');
        return redirect()->route('paises.index');
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
        $pais = Pais::find($id);
        $pais->fill($request->all());
        $pais->save();
        Session::flash('message', '¡Se ha actualizado la información del país con éxito!');
        return redirect()->route('paises.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $pais = Pais::find($id);
        $pais->delete();
        Session::flash('message', '¡El país seleccionado a sido eliminado!');
        return redirect()->route('paises.index');
    }

}
