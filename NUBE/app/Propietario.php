<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Propietario extends Model {

    protected $table = "propietarios";
    protected $fillable = ['persona_id', 'descripcion'];

    public function persona() {
        return $this->belongsTo('App\Persona');
    }

    public function usuario(){
        return $this->belongsTo('App\User');
    }
    
    public function movimientos(){
        return $this->hasMany('App\Movimientos');
    }

    public function inmuebles(){
        return $this->hasMany('App\Inmueble');
    }

    public function liquidaciones(){ #Obtiene las liquidaciones de todos sus inmuebles con contrato
        $liquidaciones_de_propietario= [];
        foreach($this->inmuebles as $inmueble){ #Obtener todos los inmuebles de este propietario
            if($inmueble->ultimo_contrato() && $inmueble->ultimo_contrato()->vigente() ){
                //$respuesta->put('contrato',$inmueble->ultimo_contrato()); 
                foreach($inmueble->ultimo_contrato()->liquidaciones() as $liquidacion){
                    $liquidaciones_de_propietario->push('$liquidaciones',$inmueble->ultimo_contrato()->liquidaciones());
                }
            }    
        }
        return $liquidaciones_de_propietario;
    }
    # Este metodo devuelve TODOS los contratos que involucran inmuebles del Propietario que llama al metodo (no revisa vigencia  del contrato)
    public function contratos(){
        $respuesta = null;
        foreach($this->inmuebles as $inmueble){
            if($inmueble->ultimo_contrato()){
                $respuesta= $inmueble->ultimo_contrato(); 
                //$respuesta = true; 
            }    
        }
        return $respuesta;
    }

    
    public function contratos_vigentes(){   #Solo devuelve los contratos que involucran al Propietario en la actualidad
        $respuesta = [];
        foreach($this->inmuebles as $inmueble){ #Obtener todos los inmuebles de este propietario
            if($inmueble->ultimo_contrato() /* && $inmueble->ultimo_contrato()->vigente()*/ ){
                array_push($respuesta, $inmueble->ultimo_contrato()); 
            }    
        }
        return $respuesta;
    }

    public function total_comisiones_pendientes_pago(){      #Dinero que el propietario adeuda a la inmobiliaria en concepto de servicio por uso del sistema
        $contratos_vigentes[] = $this->contratos_vigentes();          #Obtener todos los contratos vigentes que tienen relacion con este propietario
        $total_x_pagar = 0;
        foreach($contratos_vigentes as $contrato_vigente){   
            //$liquidaciones = $contrato_vigente->liquidaciones;
            dd($contrato_vigente->liquidaciones);
            //$liquidaciones= LiquidacionMensual::where('contrato_id',$contrato_vigente->id)/*->where('fecha_pago_propietario',null)*/->get();            
            foreach($liquidaciones as $liquidacion){
                $total_x_pagar = $total_x_pagar + $liquidacion->comision_propietario;
            }            
        } 
        return number_format($total_x_pagar , 2);
    }

    public function cobros_alquiler_pendientes(){      #Dinero que el propietario tiene disponible en concepto de recaudacion de sus alquileres que el sistema administra
        $contratos_vigentes[] = $this->contratos_vigentes();          #Obtener todos los contratos vigentes que tienen relacion con este propietario
        $alquileres_x_cobrar = 0;    #alquileres
        foreach($contratos_vigentes as $contrato_vigente){        
            $liquidaciones= \App\LiquidacionMensual::where('contrato_id',$contrato_vigente->id)->where('fecha_cobro_inquilino',!null)->where('fecha_pago_propietario',null)->get();            
            foreach($liquidaciones as $liquidacion){
                $alquileres_x_cobrar = $liquidacion->gastos_administrativos;
            }            
        } 
        return number_format($alquileres_x_cobrar , 2);
    }


    public function saldo(){
        return number_format($this->total_comisiones_pendientes_pago() - $this->cobros_alquiler_pendientes() , 2);
    }


}
