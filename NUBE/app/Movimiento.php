<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    protected $table =  "movimientos";
    protected $fillable = ['tipo_movimiento', 'fecha_hora', 'monto', 'descripcion', 'usuario_id', 'inquilino_id', 'propietario_id', 'liquidacion_id'];

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

    public function liquidacion(){
    	return $this->belongsTo('App\LiquidacionMensual');
    }

   /* public static function totalSalida()
    {
        $total = 0;

        foreach ($this as $movimiento) {
            if ($movimiento->tipo == 'salida'){
                $total = $total + $movimiento->monto;
            }
        }
        return $total;
    }*/
    public static function totalEntrada(){
        $total = 0;
        $movimientos = Movimiento::all();
        foreach ($movimientos as $movimiento) {
            if ($movimiento->tipo_movimiento == 'entrada'){
                $total = $total + $movimiento->monto;
            }
        }
        return $total;
    }

    public static function totalSalida(){
        $total = 0;
        $movimientos = Movimiento::all();
        foreach ($movimientos as $movimiento) {
            if ($movimiento->tipo_movimiento == 'salida'){
                $total = $total + $movimiento->monto;
            }
        }
        return $total;
    }

}
