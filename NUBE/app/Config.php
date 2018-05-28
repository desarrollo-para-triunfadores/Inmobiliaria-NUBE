<?php

namespace App;

use App\LiquidacionMensual;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $table =  "configs";

    protected $fillable = ['nombre', 'cuit', 'telefono', 'email', 'direccion', 'imagen', 'responiva_id', 'localidad_id'];

    public function localidad() 
    {
    	return $this->belongsTo('App\Localidad');
    }
    public function responiva()
    {
        return $this->belongsTo('App\Responiva');
    }

    static function getIngresosXmes(){
        $año = Carbon::now()->format('Y');  #año para el que se van a consultar los ingresos por meses → 2018
        #se define el array con los meses como key, y cada mes se setea a $0 
        $ingresos_mensuales = array('01' => 0, '02' => 0, '03' => 0, '04' => 0, '05' => 0, '06' => 0, '07' => 0, '08' => 0, '09' => 0, '10' => 0, '11' => 0, '12' => 0);    
        #conseguir liquidaciones que ya fueron cobradas o a 'inquilino' o a 'propietario'
        $liquidaciones = LiquidacionMensual::whereNotNull('fecha_cobro_propietario')->whereYear('fecha_cobro_propietario', '=', $año)
                                        ->orWhereNotNull('fecha_cobro_inquilino')->whereYear('fecha_cobro_inquilino', '=', $año)->get();  
        if($liquidaciones){
            foreach ($liquidaciones as $liquidacion){       
                if($liquidacion->fecha_cobro_propietario){     
                    $mes_cobro_propietario = $liquidacion->fecha_cobro_propietario->format('m');
                    $ingreso_cobro_P = $liquidacion->comision_a_propietario;
                }
                if($liquidacion->fecha_cobro_inquilino){
                    $ingreso_cobro_I = $liquidacion->total;
                    $mes_cobro_inquilino = $liquidacion->fecha_cobro_inquilino->format('m');
                }                            
                $ingresos_mensuales[$mes_cobro_propietario]+= $ingreso_cobro_P;
                $ingresos_mensuales[$mes_cobro_inquilino]+= $ingreso_cobro_I;
            }
        }
        return $ingresos_mensuales;     
    } 
    
}

