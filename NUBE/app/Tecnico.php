<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tecnico extends Model {

    protected $table = "tecnicos";

    protected $fillable = ['persona_id', 'rubroTecnico_id'];

    /**
     * Relaciones
     */

    public function persona() {
        return $this->belongsTo('App\Persona');
    }

    public function rubrotecnico() {
        return $this->belongsTo('App\RubroTecnico');
    }

    public function solicitudes_servicio(){
        return $this->hasMany('App\SolicitudServicio');
    }

    /**
     * Métodos diversos
     */

    public function ultimo_contrato(){
        return $this->contratos()->get()->sortByDesc('id')->first(); 
    }

    public function ultimo_contrato_vigente(){
        $this->contratos()->get()->sortByDesc('id')->first(); 
    }

    public function movimientos(){
        return $this->hasMany('App\Movimientos');
    }


}
