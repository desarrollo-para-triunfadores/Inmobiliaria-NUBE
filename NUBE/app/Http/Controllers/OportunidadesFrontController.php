<?php

namespace App\Http\Controllers;

use App\Oportunidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;

class OportunidadesFrontController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $oportunidad = new Oportunidad($request->all());
        $oportunidad->estado_id = 1;
        $oportunidad->save();
        Session::flash('message', '<strong>¡Hola ' . $oportunidad->nombre_interesado . '!</strong>. Prontamente nos pondremos en contacto contigo por inmueble que te interesó. <strong>¡Hasta pronto!</strong>');
        return redirect()->route('propiedades.show', $request->inmueble_id);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
