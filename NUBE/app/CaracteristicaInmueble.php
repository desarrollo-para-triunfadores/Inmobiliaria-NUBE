<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CaracteristicaInmueble extends Model
{
     protected $table = "inmuebles_caracteristicas";

    protected $fillable = ['inmueble_id', 'caracteristica_id'];

    public function inmuebles() {
        return $this->hasMany('App\Inmueble');
    }

    public function caracteristica() {
        return $this->belongsTo('App\Caracteristica');
    }
}
