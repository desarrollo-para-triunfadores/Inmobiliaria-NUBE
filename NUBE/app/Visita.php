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

    protected $dates = ['inicio', 'fin'];

    public function getInicioFormateadoAttribute(){
        return $this->inicio->format('d/m/Y');
    }

    public function getFinFormateadoAttribute(){
        return $this->fin->format('d/m/Y');
    }

}
