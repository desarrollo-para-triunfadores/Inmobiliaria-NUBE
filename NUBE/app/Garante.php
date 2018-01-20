<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Garante extends Model {

    protected $table = "garantes";
    protected $fillable = ['persona_id', 'descripcion'];

    public function persona() {
        return $this->belongsTo('App\Persona');
    }

    public function contratos() {
        return $this->hasMany('App\Contrato');
    }

}
