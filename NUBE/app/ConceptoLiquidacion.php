<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ConceptoLiquidacion extends Model
{
    protected $table = "conceptos_liquidaciones_mensuales";
    
    protected $fillable = [       
        'monto', 
        'periodo', 
        'primer_vencimiento', 
        'segundo_vencimiento',
        'servicio_abonado',
        'liquidacionmensual_id',
        'contrato_id', 
        'servicio_id', 
    ];
    
    protected $dates = ['primer_vencimiento', 'segundo_vencimiento'];
    
    public function getPrimerVencimientoFormateadoAttribute(){
        $fecha = "-";
        if(!is_null($this->segundo_vencimiento)){           
            $fecha = $this->segundo_vencimiento->format('d/m/Y');
        }  
        return $fecha;       
    }

    public function getSegundoVencimientoFormateadoAttribute(){
        $fecha = "-";
        if(!is_null($this->segundo_vencimiento)){           
            $fecha = $this->segundo_vencimiento->format('d/m/Y');
        }  
        return $fecha;
    }

    public function setPrimerVencimientoAttribute($value){
        if(!is_null($value)){
            $fecha= str_replace('/', '-', $value);
            $this->attributes['primer_vencimiento'] = date('Y-m-d', strtotime($fecha));
        }       
    }

    public function setSegundoVencimientoAttribute($value){
        if(!is_null($value)){
            $fecha= str_replace('/', '-', $value);
            $this->attributes['segundo_vencimiento'] = date('Y-m-d', strtotime($fecha));
        }        
    }


    public function liquidacionmensual()
    {
        return $this->belongsTo('App\LiquidacionMensual');
    }

    public function contrato()
    {
        return $this->belongsTo('App\Contrato');
    }

    public function servicio()
    {
        return $this->belongsTo('App\Servicio');
    }


}
