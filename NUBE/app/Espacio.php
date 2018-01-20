<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Espacio extends Model
{
    protected $table =  "espacios";
    
    protected $fillable = ['nombre'];

    public function imagenesInmueble()
    {
        return $this->hasMany('App\ImagenInmueble');
    }
}
