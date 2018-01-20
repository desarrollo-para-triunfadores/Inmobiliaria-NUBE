<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Inquilino;
use App\LiquidacionMensual;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\InquilinoRequestCreate;
use App\Http\Requests\InquilinoRequestEdit;
use Session;


class CobrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {    
        $inquilino = Inquilino::find($request->inquilino);    
        $contrato_id = $inquilino->ultimo_contrato()->id;        

        $liquidaciones = LiquidacionMensual::all()->where("fecha_pago", null)->where("alquiler", "<>", null)->where("contrato_id", $contrato_id);
        return response()->json(view('admin.cobros.tabla_liquidaciones', compact('liquidaciones'))->render());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inquilinos = Inquilino::all();       
        return view('admin.cobros.create')->with('inquilinos', $inquilinos);
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
