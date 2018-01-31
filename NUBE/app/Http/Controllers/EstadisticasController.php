<?php

namespace App\Http\Controllers;

use App\Inmueble;
use App\Inquilino;
use App\LiquidacionMensual;
use App\Localidad;
use App\Movimiento;
use App\Pais;
use App\Servicio;
use Illuminate\Http\Request;

class EstadisticasController extends Controller
{

    public function index(Request $request)
    {
        $inquilinos = Inquilino::all();
        $inmuebles = Inmueble::all();
        $paises = Pais::all();
        $localidades = Localidad::all();
        $servicios = Servicio::all();
        $movimientos = Movimiento::all();

        if($request->ajax()){
            $fecha1= "";
            $fecha2= "";
            $movimientos_entre_fechas = [];
            if(!is_null($request->fechaInicio)){
                $fecha1= $request->fechaInicio;
                $fecha2= $request->fechaFin;
            }else{
                $fechahoy =  \Carbon\Carbon::now('America/Buenos_Aires');
                $fechaManana =  \Carbon\Carbon::now('America/Buenos_Aires');
                $fecha1= $fechahoy->format('d/m/Y');
                $fecha2= $fechahoy->format('d/m/Y');
            }
            #################################
            foreach ($movimientos as $movimiento) {
                $fechaMovimiento = $movimiento->fecha_hora; //\Carbon\Carbon::createFromFormat('d/m/Y', $movimiento->fecha_hora);
                if ( ( $fechaMovimiento >= date_create($fecha1))&&($fechaMovimiento<= date_create($fecha2))){
                    array_push($movimientos_entre_fechas, $movimiento);
                }
            }

            $datos_para_contabilidad_entre_fechas = array("movimientos"=>$movimientos_entre_fechas, "iquilinos"=>$inquilinos, "servicios"=>$servicios);
            return response()->json(json_encode($datos_para_contabilidad_entre_fechas, true));




        }else {
            #################################
            $fecha1 = "";
            $fecha2 = "";
            $movimientos_entre_fechas = [];
            if (!is_null($request->fechaInicio)) {
                $fecha1 = $request->fechaInicio;
                $fecha2 = $request->fechaFin;
            } else {
                $fechahoy = \Carbon\Carbon::now('America/Buenos_Aires');
                $fechaManana = \Carbon\Carbon::now('America/Buenos_Aires');
                $fecha1 = $fechahoy->format('d/m/Y');
                $fecha2 = $fechahoy->format('d/m/Y');
            }
            #################################
            foreach ($movimientos as $movimiento) {
                $fechaMovimiento = $movimiento->fecha_hora; //\Carbon\Carbon::createFromFormat('d/m/Y', $movimiento->fecha_hora);
                if (($fechaMovimiento >= date_create($fecha1)) && ($fechaMovimiento <= date_create($fecha2))) {
                    array_push($movimientos_entre_fechas, $movimiento);
                }
            }

            return view('admin.contabilidad.main')
                ->with('servicios', $servicios)
                ->with('movimientos', $movimientos_entre_fechas)
                ->with('inquilinos', $inquilinos)
                ->with('paises', $paises)
                ->with('inmuebles', $inmuebles)
                ->with('localidades', $localidades); // se devuelven los registros;
        }
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $inquilino = Inquilino::find($id);
        $movimientos = Movimiento::where('inquilino_id' , $id)->get();
        $servicios = Servicio::all();
        $liquidaciones = LiquidacionMensual::all();

        return view('admin.contabilidad.cuentas.main')
            ->with('inquilino',$inquilino)
            ->with('servicios',$servicios)
            ->with('movimientos', $movimientos)
            ->with('liquidaciones',$liquidaciones);
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
