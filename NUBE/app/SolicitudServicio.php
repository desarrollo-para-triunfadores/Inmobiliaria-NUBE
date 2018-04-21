<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolicitudServicio extends Model
{
    protected $table = "solicitudesServicio";
    
    protected $fillable =  [
        'tecnico_id', 
        'contrato_id',
        'responsable', 
        'rubrotecnico_id',
        'liquidacionmensual_id',
        'motivo',
        'estado',
        'monto_final',
        'fecha_cierre'
    ]; 

    protected $dates = ['fecha_cierre'];

    /**
     * Mutadores
     */

    public function getFechaCierreFormateadoAttribute(){
        $fecha = "-";
        if(!is_null($this->fecha_cierre)){           
            $fecha = $this->fecha_cierre->format('d/m/Y');
        }  
        return $fecha;
    }

    public function setFechaCierreAttribute($value){
        if(!is_null($value)){
            $fecha= str_replace('/', '-', $value);
            $this->attributes['fecha_cierre'] = date('Y-m-d', strtotime($fecha));
        }       
    }

    /**
     * Relaciones
     */

    public function tecnico(){
        return $this->belongsTo('App\Tecnico');
    }  

    public function contrato(){
        return $this->belongsTo('App\Contrato');
    }  

    public function rubro(){
        return $this->belongsTo('App\RubroTecnico');
    }  

    public function liquidacionmensual(){
        return $this->belongsTo('App\LiquidacionMensual');
    }

    /**
     * Métodos diversos
     */

    public function solicitante(){ 
        /**
         * Devuelve el el obj propietario o inquilino segun la marca de quién
         * solicitó el servicio tecnico (responsable)
         */
                      
        if($this->responsable == 'propietario'){
            return $this->contrato->inmueble->propietario;
        }else{
            return $this->contrato->inquilino;
        }

    }
}
