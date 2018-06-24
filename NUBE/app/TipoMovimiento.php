<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoMovimiento extends Model
{
    protected $table =  "tipos_movimiento";

    protected $fillable = [
        'nombre',        
    ];

  
    public function movimientos(){
        return $this->hasMany('App\Movimiento');
    }

}
