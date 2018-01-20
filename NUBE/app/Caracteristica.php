<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caracteristica extends Model {

    protected $table = "caracteristicas";
    
    protected $fillable = ['nombre', 'tipo_id', 'descripcion'];

    public function tipo() {
        return $this->belongsTo('App\Tipo');
    }

    public function inmuebles() {
        return $this->hasMany('App\Inmueble');
    }

    public function ambientes() {
        return $this->hasMany('App\Ambiente');
    }

}
