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

    public function servicioscontrato() {
        return $this->hasMany('App\ServicioContrato');
    }

    public function conceptosliquidacion(){
        return $this->hasMany('App\ConceptoLiquidacion');
    }

}
