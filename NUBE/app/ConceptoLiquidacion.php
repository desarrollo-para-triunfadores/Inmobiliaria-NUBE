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
        'serviciocontrato_id', 
    ];
    
    public function liquidacionmensual()
    {
        return $this->belongsTo('App\LiquidacionMensual');
    }

    public function serviciocontrato()
    {
        return $this->belongsTo('App\ServicioContrato');
    }



}
