<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado_Oportunidad extends Model
{
    protected $table =  "estados_oportunidades";
    protected $fillable = ['nombre'];

    public function estados_oportunidades()
    {
        return $this->hasMany('App\Oportunidad');
    }
}
