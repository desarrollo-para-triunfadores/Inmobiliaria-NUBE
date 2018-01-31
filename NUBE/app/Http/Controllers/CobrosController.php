<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Inquilino;
use App\Movimiento;
use App\Notificacion;
use App\LiquidacionMensual;
use App\ConceptoLiquidacion;
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
        $saldo_cuenta = 0;

        $liquidaciones = LiquidacionMensual::all()->where("fecha_pago", null)->where("alquiler", "<>", null)->where("contrato_id", $contrato_id);

        $liquidacion_posterior = LiquidacionMensual::all() //este se utiliza para comprobar que el saldo diponible no hay asido utilizado.
        ->where("contrato_id",$contrato_id)
            ->where("abono",'<>', null)
            ->sortBy('id')->first();



        if(!is_null($liquidacion_posterior) && !is_null($liquidacion_posterior->saldo_periodo)){
            $saldo_cuenta = $liquidacion_con_saldo->saldo_periodo;
        }

        return response()->json(view('admin.cobros.tabla_liquidaciones', compact('liquidaciones', 'saldo_cuenta'))->render());
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


        $liquidacion = LiquidacionMensual::find($id);
        $liquidacion->fill($request->all());
        $liquidacion->save();

        /*      $idusuario = Auth::user()->id;
                $movimiento = new Movimiento();

                $movimiento->usuario_id = $idusuario;
                $movimiento->fecha_hora = Carbon::now();
                $movimiento->tipo_movimiento = "entrada";
                $movimiento->monto = $liquidacion->abono;
                $movimiento->descripcion = "Se recibe pago por $".$liquidacion->abono.". Correspondiente a la liquidación del periodo ".$liquidacion->periodo.".";
                $movimiento->inquilino_id = $liquidacion->contrato->inquilino->id;

                $movimiento->usuario_id = $idusuario;
                $movimiento->fecha_hora = Carbon::now();
                $movimiento->tipo_movimiento = "salida";

                $liquidacion->contrato->

                $movimiento->monto = $liquidacion->abono;
                $movimiento->descripcion = "Se recibibe pago por $".$liquidacion->abono.". Correspondiente a la liquidación del periodo ".$liquidacion->periodo.".";
                $movimiento->inquilino_id = $liquidacion->contrato->inquilino->id;
        */


        Session::flash('message', 'Se ha actualizado la información');
        return redirect()->route('cobros.create');
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
