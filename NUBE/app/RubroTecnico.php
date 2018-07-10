<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RubroTecnico extends Model
{
    protected $table = "rubrosTecnicos";
    protected $fillable = ['nombre', 'descripcion'];

    public function tecnicos(){
        return $this->hasMany('App\Tecnico');
    }
}
