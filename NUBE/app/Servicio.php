<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table =  "servicios";
    
    protected $fillable = ['nombre', 'descripcion'];

    public function edificio()
    {
        return $this->belongsTo('App\Edificio');
    }
}
