<?php

namespace App\Http\Controllers;

use App\Movimiento;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MovimientosController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //agregar movimiento a CC y/o a Caja
    {
        $movimiento = new Movimiento($request->all());
        $movimiento->fecha_hora = \Carbon\Carbon::now('America/Buenos_Aires');
        $movimiento->usuario_id = Auth::user()->id;

        $movimiento->save();
        Session::flash('message', 'Se ha registrado un movimiento exitosamente.');
        return redirect()->route('contabilidad.index');

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
