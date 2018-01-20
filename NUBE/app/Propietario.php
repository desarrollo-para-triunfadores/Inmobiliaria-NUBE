<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Propietario extends Model {

    protected $table = "propietarios";
    protected $fillable = ['persona_id', 'descripcion'];

    public function persona() {
        return $this->belongsTo('App\Persona');
    }
    
    public function movimientos(){
        return $this->hasMany('App\Movimientos');
    }

}
