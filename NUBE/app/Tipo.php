<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Tipo extends Model
{
    protected $table =  "tipos";
    protected $fillable = ['nombre','descripcion'];


    public function caracteristicas()
    {
        return $this->hasMany('App\Caracteristica');
    }




}
