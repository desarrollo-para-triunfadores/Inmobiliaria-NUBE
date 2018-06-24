<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Movimiento;
use App\Notificacion;
use App\SolicitudServicio;
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
        $liquidaciones_abonadas = LiquidacionMensual::all()->where("abonado", "<>",null);
        $liquidaciones_no_pagadas_propietarios = $liquidaciones_abonadas->where("fecha_pago_propietario", null);
        
        $solicitudes = SolicitudServicio::all()->whereIn("liquidacionmensual_id", $liquidaciones_abonadas->pluck('id')->toArray())->where("estado", "concluida");
       
        return view('admin.pagos.main')
            ->with('liquidaciones', $liquidaciones_no_pagadas_propietarios)
            ->with('solicitudes', $solicitudes);
    }

    public function registrar_pago(Request $request){

        /**
         * Este método registra como pagado a un cliente una liquidación o un trabajo
         * a un empleado de servicio técnico
         */

        if($request->tipo === "cliente"){
          
            $liquidacion = LiquidacionMensual::find($request->id);
            $liquidacion->fecha_pago_propietario = Carbon::now();      
            $liquidacion->save();
    
            //Movimiento de la empresa
            $movimiento = new Movimiento();
            $movimiento->user_id = Auth::user()->id;  
            $movimiento->fecha_hora = Carbon::now();      
            $movimiento->tipo_movimiento = "salida";
            $movimiento->monto = $liquidacion->abonado - $liquidacion->gastos_administrativos;
            $movimiento->descripcion = "Se realiza un pago por $".$liquidacion->abonado - $liquidacion->gastos_administrativos." al propietario. Correspondiente a la liquidación del periodo ".$liquidacion->periodo.".";
            $movimiento->liquidacion_id = $liquidacion->id;
            $movimiento->save();
    
            //Movimiento para el propietario
            $movimiento = new Movimiento();
            $movimiento->user_id = Auth::user()->id;  
            $movimiento->fecha_hora = Carbon::now();      
            $movimiento->tipo_movimiento = "entrada";
            $movimiento->propietario_id = $liquidacion->contrato->inmueble->propietario->id;
            $movimiento->monto = $liquidacion->comision_a_propietario;
            $movimiento->descripcion = "Se recibe un pago por $".$liquidacion->comision_a_propietario.". Correspondiente a la comisión al propietario por la liquidación del periodo ".$liquidacion->periodo.".";
            $movimiento->liquidacion_id = $liquidacion->id;
            $movimiento->save();
        }else{

            $solicitud = SolicitudServicio::find($request->id);
            $solicitud->estado = "finalizada";      
            $solicitud->save();
    
            //Movimiento de la empresa
            $movimiento = new Movimiento();
            $movimiento->user_id = Auth::user()->id;  
            $movimiento->fecha_hora = Carbon::now();      
            $movimiento->tipo_movimiento = "salida";
            $movimiento->monto = $solicitud->monto_total;
            $movimiento->descripcion = "Se realiza un pago por $".$solicitud->monto_total." al personal. Correspondiente al arreglo concluido el ".$solicitud->FechaCierreFormateado.".";
            $movimiento->liquidacion_id = $liquidacion->id;
            $movimiento->save();
    
            //Movimiento para el propietario
            $movimiento = new Movimiento();
            $movimiento->user_id = Auth::user()->id;  
            $movimiento->fecha_hora = Carbon::now();      
            $movimiento->tipo_movimiento = "entrada";
            $movimiento->tecnico_id = $solicitud->tecnico_id;
            $movimiento->monto = $solicitud->monto_total;
            $movimiento->descripcion = "Se recibe un pago por $".$solicitud->monto_total.". Correspondiente a la comisión al propietario por la liquidación del periodo ".$liquidacion->periodo.".";
            $movimiento->liquidacion_id = $solicitud->liquidacionmensual_id;
            $movimiento->save();

        }
        
        Session::flash('message', '¡Se ha registrado el pago con éxito!');
        return response()->json('ok');
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
