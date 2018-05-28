<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    protected $table =  "movimientos";

    protected $fillable = [
        'tipo_movimiento',
        'fecha_hora',
        'monto',
        'descripcion',
        'user_id',
        'inquilino_id',
        'tecnico_id',
        'propietario_id',
        'liquidacion_id',
        'tipo_mov_id'       #Nuevo, tipo de movimiento
    ];

    protected $dates = ['fecha_hora'];

    /**
     * Mutadores
     */

    public function getFechaHoraFormateadoAttribute(){
        return $this->fecha_hora->format('d/m/Y');
    }

    public function setFechaHoraAttribute($value){
        if(!is_null($value)){
            $fecha= str_replace('/', '-', $value);
            $this->attributes['fecha_hora'] = date('Y-m-d', strtotime($fecha));
        }       
    }

    /**
     * Relaciones
     */

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function inquilino(){
    	return $this->belongsTo('App\Inquilino');
    }

    public function tecnico(){
    	return $this->belongsTo('App\Tecnico');
    }

    public function propietario(){
    	return $this->belongsTo('App\Propietario');
    }

    public function liquidacion(){
    	return $this->belongsTo('App\LiquidacionMensual');
    }

    public function tipo_categoria(){
    	return $this->belongsTo('App\TipoMovimiento');
    }


    /**
     * Métodos diversos
     */

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

    public static function getGastosCategorizados(){
        $movimientos_salida = Movimiento::where('tipo_movimiento','salida')->whereNotNull('tipo_mov_id')->get();
        if($movimientos_salida){
            $array_gastos = ['Marketing'=>0,'Impuestos'=>0, 'Seguro Inmobiliario'=>0 , 'Mto y Reparaciones'=>0, 'Otros'=>0];
            foreach($movimientos_salida as $ms){               
                $categoria = TipoMovimiento::find($ms->tipo_mov_id)->nombre;                  
                $array_gastos[$categoria]+= $ms->monto;
            }
            return $array_gastos;
        }        
    }
}
