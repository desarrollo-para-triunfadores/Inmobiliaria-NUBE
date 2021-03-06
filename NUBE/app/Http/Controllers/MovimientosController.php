<?php

namespace App\Http\Controllers;

use App\Movimiento;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MovimientosController extends Controller
{
    public function index()
    {
        //
    }


    public function store(Request $request) //agregar movimiento a CC y/o a Caja
    {
        //dd($request);
        $movimiento = new Movimiento($request->all());
        $movimiento->monto = $request->monto_mov;
        $movimiento->fecha_hora = \Carbon\Carbon::now('America/Buenos_Aires');
        $movimiento->user_id = Auth::user()->id;        
        $movimiento->tipo_mov_id = $request->tipo_mov_id;
        if($request->descripcion != ''){                # hardcodeado | 0="Otro"
            $movimiento->descripcion = $request->descripcion;   #si tiene descripcion → no es un movimiento predefinido (tiene descripcion personalizada)
        }else{
            $movimiento->descripcion = $request->concepto_mov;  
        }
        $movimiento->save();
        Session::flash('message', 'Se ha registrado un movimiento exitosamente.');
        return redirect()->route('contabilidad.index');

    }

}
