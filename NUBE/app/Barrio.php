<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barrio extends Model
{
    protected $table =  "barrios";

    protected $fillable = ['nombre', 'localidad_id', 'privado'];

    public function localidad()
    {
        return $this->belongsTo('App\Localidad');
    }

    public function inmuebles()
    {
        return $this->hasMany('App\Inmueble');
    }

    public function edificios()
    {
        return $this->hasMany('App\Edificio');
    }

}
