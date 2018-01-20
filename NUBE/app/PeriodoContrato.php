<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeriodoContrato extends Model
{
    protected $table =  "contratos_periodos";
    
    protected $fillable = [
        'contrato_id', 
        'inicio_periodo', 
        'fin_periodo',
        'monto_fijo', 
        'monto_incremental'
    ];
    
    public function contrato()
    {
        return $this->belongsTo('App\Contrato');
    }
}
