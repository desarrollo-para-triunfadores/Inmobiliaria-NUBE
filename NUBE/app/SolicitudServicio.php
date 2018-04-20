<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolicitudServicio extends Model
{
    protected $table = "solicitudesServicio";
    protected $fillable =  ['tecnico_id', 'contrato_id', 'responsable', 
                            'rubrotecnico_id', 'liquidacionmensual_id', 'motivo', 'estado', 'monto_final', 'fecha_cierre']; 

    public function tecnico(){
        return $this->belongsTo('App\Tecnico');
    }  
    public function contrato(){
        return $this->belongsTo('App\Contrato');
    }  
    public function rubro(){
        return $this->belongsTo('App\RubroTecnico');
    }  

    public function liquidacionmensual()
    {
        return $this->belongsTo('App\LiquidacionMensual');
    }

    
    #########################################
    public function solicitante(){              #devuelve el el obj propietario o inquilino segun la marca de quien solicito el servicio tecnico (responsable)
        if($this->responsable == 'propietario'){
            return $this->contrato->inmueble->propietario;
        }else{
            return $this->contrato->inquilino;
        }

    }
}
