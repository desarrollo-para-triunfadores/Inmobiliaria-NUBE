<?php

namespace App\Http\Controllers;

use App\Inmueble;
use App\Persona;
use App\Inquilino;
use App\Propietario;
use App\Contrato;
use App\LiquidacionMensual;
use App\ConceptoLiquidacion;
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
        //dd(Auth::user()->obtener_rol());
        if((Auth::user()->obtener_rol() == 'Administrador' )){   #Si el usuario es un administrador CloudProp
            $inquilinos = Inquilino::all();
            $propietarios = Propietario::all();
            $clientes = Persona::all();
            $inmuebles = Inmueble::all();
            $paises = Pais::all();
            $localidades = Localidad::all();
            $servicios = Servicio::all();
            $movimientos = Movimiento::all();
            if($request->ajax()){           #si la peticion es ajax, quiere decir que se consulto la contabilidad en un intervalo de fechas
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
        else{   #--Si el usuario NO ES ADMINISTRADOR CloudProp (podria ser INQUILINO o PROPIETARIO)      
            if(Auth::user()->obtener_rol() == 'Inquilino'){    ########### si nuestro user es INQUILINO ############
                $inquilino = Auth::user()->persona->inquilino;                
                /* 
                ##Lineas comentadas --> Por ahora un inquilino solo podra tener un contrato vigente a la vez
                $contratos = $inquilino->ultimo_contrato();
                if($contratos!=null){
                    $liquidaciones= [];
                    foreach($contratos as $contrato){
                        $liquidacion_de_contrato = LiquidacionMensual::where('contrato_id',$contrato->id)->get();
                        array_push($liquidaciones , $liquidacion_de_contrato);
                    }
                }
                */
                $contrato = $inquilino->ultimo_contrato()/*contratos()->id()->last()*/;
                if($contrato->vigente()){
                    $liquidaciones= $contrato->liquidaciones;
                }
                return view('admin.contabilidad.cuentas.main')
                    ->with('contrato',$contrato)
                    ->with('liquidaciones',$liquidaciones)
                    ->with('inquilino',$inquilino);           
            }
            ########### si nustro user vera la vista como --PROPIETARIO #############
            if(Auth::user()->persona->propietario){
                $propietario = Auth::user()->persona->propietario;
                $contratos = $propietario->contratos_vigentes();
                $liquidaciones= [];
                if($contratos!=null){                    
                    foreach($contratos as $contrato){
                        $liquidacion_de_contrato = LiquidacionMensual::where('contrato_id',$contrato->id)->get();
                        array_push($liquidaciones , $liquidacion_de_contrato);
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
       
        
        ######################################################################################################### ##########
    }


    public function store(Request $request){
        //
    }

    

    public function show($id, Request $request){        
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
    
    public function verBoleta($liquidacion_id){
        $liquidacion = LiquidacionMensual::find($liquidacion_id);
        $conceptos = $liquidacion->detalle_conceptos();          
        return view('emails.boleta.boleta')
            ->with('liquidacion',$liquidacion)
            ->with('conceptos',$conceptos);
    }
}
