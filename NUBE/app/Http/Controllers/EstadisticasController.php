<?php

namespace App\Http\Controllers;

use App\Inmueble;
use App\Persona;
use App\Inquilino;
use App\Propietario;
use App\Contrato;
use App\LiquidacionMensual;
use App\Localidad;
use App\Movimiento;
use App\Pais;
use App\Servicio;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EstadisticasController extends Controller
{

    public function index(Request $request)
    {
        if(is_null(Auth::user()->persona)){   #Si el usuario es un administrador CloudProp
            $inquilinos = Inquilino::all();
            $propietarios = Propietario::all();

            $clientes = Persona::all();

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
            }
            else {            
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
            }
                $movimientos_entre_fechas = $movimientos;
    
                return view('admin.contabilidad.main')
                    ->with('servicios', $servicios)
                    ->with('movimientos', $movimientos_entre_fechas)
                    ->with('clientes', $clientes)
                    ->with('paises', $paises)
                    ->with('inmuebles', $inmuebles)
                    ->with('localidades', $localidades); // se devuelven los registros;
        }
        if(Auth::user()->persona){
            #### si nuestro vera la vista como INQUILINO
            if(Auth::user()->persona->inquilino){
                $inquilino = Auth::user()->persona->inquilino;
                return view('admin.contabilidad.cuentas.main')
                    ->with('inquilino',$inquilino);           
            }
            #### si nuestro vera la vista como PROPIETARIO
            if(Auth::user()->persona->propietario){
                $propietario = Auth::user()->persona->propietario;
                
                $contratos = $propietario->contratos_vigentes();
                if($contratos!=null){
                    foreach($contratos as $contrato){
                        $liquidacion_de_contrato = LiquidacionMensual::where('contrato_id',$contrato->id)->get();
                        $liquidaciones->put('liquidaciones',$liquidacion_de_contrato);
                    }
                }
                
                

                return view('admin.contabilidad.cuentas.main')
                    ->with('contratos',$contratos)
                    ->with('liquidaciones',$liquidaciones)
                    ->with('propietario',$propietario);
            }
            ##---------------------------------------------
            //$liquidaciones = LiquidacionMensual::where
        }
        else{
         #############  No mostrar vista global de la contabilidad de la empresa, solo detalle del usuario (cliente) ######
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
        ######################################################################################################### ##########
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
        $liquidaciones = $inquilino->ultimo_contrato()->liquidaciones;

        return view('admin.contabilidad.cuentas.main')
            ->with('inquilino',$inquilino)
            ->with('servicios',$servicios)
            ->with('movimientos', $movimientos)
            ->with('liquidaciones',$liquidaciones);
    }

}
