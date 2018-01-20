<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class imagenAmbiente extends Model {

    protected $table = "imagen_inmuebles";
    protected $fillable = ['nombre', 'inmueble_id'];

    public function inmueble() {
        return $this->belongsTo('App\Inmueble');
    }

}
