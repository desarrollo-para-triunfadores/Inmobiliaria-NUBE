<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visita extends Model {

    protected $table = "visitas";
    protected $fillable = [
        'titulo',
        'inicio',
        'fin',
        'allDay',
        'color',
        'oportunidad_id'
    ];

    public function oportunidad() {
        return $this->belongsTo('App\Oportunidad');
    }

}
