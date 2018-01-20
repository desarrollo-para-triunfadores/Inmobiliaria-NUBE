<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historia_Oportunidad extends Model
{
    protected $table =  "historias_oportunidades";
    protected $fillable = ['oportunidad_id', 'titulo', 'fecha', 'detalle', 'estado_previo', 'estado_actual', 'cambio_estado'];

    /**  */
    public function oportunidad()
    {
        return $this->belongsTo('App\Oportunidad');
    }

    /**  */
}
