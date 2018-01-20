<?php

namespace App\Http\Controllers;

use App\Oportunidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;

class OportunidadesFrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->ajax()){
            $oportunidad = new Oportunidad();

            $validator = Validator::make($request->all(), [
                'nombre_interesado' => 'required|max:50|unique:oportunidades',
                'email' => 'required|email|unique:oportunidades,email',
                'telefono' => 'unique:oportunidades',
            ]);
            if ($validator->fails()) {  //si falla la validación de datos ?
                Session::flash('message', 'Verifica tus datos, el mensaje no se envio.');
            }
            $oportunidad->inmueble_id = $request->inmueble_id;
            $oportunidad->mensaje = $request->mensaje;
            $oportunidad->nombre_interesado = $request->nombre;
            $oportunidad->email = $request->email;
            $oportunidad->telefono = $request->telefono;
            $oportunidad->estado_id = 1;
            $oportunidad->save();
            Session::flash('message', 'Tu mensaje fue enviado satisfactoriamente  ??');
            //return redirect()->route('paises.index');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
