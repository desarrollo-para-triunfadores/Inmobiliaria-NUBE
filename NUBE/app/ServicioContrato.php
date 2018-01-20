<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicioContrato extends Model
{
    protected $table = "contratos_servicios";

    protected $fillable = ['contrato_id', 'servicio_id'];

    public function contrato() {
        return $this->belongsTo('App\Contrato');
    }

    public function servicio() {
        return $this->belongsTo('App\Servicio');
    }

}
