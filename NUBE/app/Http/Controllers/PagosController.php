<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Movimiento;
use App\Notificacion;
use App\LiquidacionMensual;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\InquilinoRequestCreate;
use App\Http\Requests\InquilinoRequestEdit;
use Session;

class PagosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $liquidaciones = LiquidacionMensual::all()->where("abonado", "<>",null)->where("fecha_pago_propietario", null);
        return view('admin.pagos.main')->with('liquidaciones', $liquidaciones);
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
        $liquidacion = LiquidacionMensual::find($id);
        $liquidacion->fecha_pago_propietario = Carbon::now();      
        $liquidacion->save();

        //Movimiento de la empresa
        $movimiento = new Movimiento();
        $movimiento->usuario_id = Auth::user()->id;        
        $movimiento->tipo_movimiento = "salida";
        $movimiento->monto = $liquidacion->abonado;
        $movimiento->descripcion = "Se realiza un pago por $".$liquidacion->abonado." al propietario. Correspondiente a la liquidación del periodo ".$liquidacion->periodo.".";
        $movimiento->liquidacion_id = $liquidacion->id;
        $movimiento->save();

        //Movimiento para el propietario
        $movimiento = new Movimiento();
        $movimiento->usuario_id = Auth::user()->id;        
        $movimiento->tipo_movimiento = "entrada";
        $movimiento->propietario_id = $liquidacion->contrato->inmueble->propietario->id;
        $movimiento->monto = $liquidacion->comision_a_propietario;
        $movimiento->descripcion = "Se recibe un pago por $".$liquidacion->comision_a_propietario.". Correspondiente a la comisión al propietario por la liquidación del periodo ".$liquidacion->periodo.".";
        $movimiento->liquidacion_id = $liquidacion->id;
        $movimiento->save();

        Session::flash('message', '¡Se ha registrado el pago al cliente con éxito!');
        return redirect()->route('pagos.index');

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
