<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    protected $table =  "movimientos";
    protected $fillable = ['fecha_hora', 'tipo_movimiento', 'monto', 'descripcion', 'usuario_id', 'inquilino_id', 'propietario_id'];

    protected $dates = ['fecha_hora'];

    public function usuario(){
    	return $this->belongsTo('App\User');
    }

    public function inquilino(){
    	return $this->belongsTo('App\Inquilino');
    }

    public function propietario(){
    	return $this->belongsTo('App\Propietario');
    }

}
