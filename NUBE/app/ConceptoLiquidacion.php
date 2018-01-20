<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConceptoLiquidacion extends Model
{
    protected $table = "conceptos_liquidaciones_mensuales";
    
    protected $fillable = [
        'liquidacionmensual_id',
        'serviciocontrato_id', 
        'monto', 
        'periodo', 
        'primer_vencimiento', 
        'segundo_vencimiento',
        'servicio_abonado'
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
