<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table =  "servicios";

    protected $fillable = ['nombre', 'servicio_compartido', 'descripcion'];

    public function edificio(){
        return $this->belongsTo('App\Edificio');
    }

    public function servicios_contrato() {
        return $this->hasMany('App\ServicioContrato');
    }

}
