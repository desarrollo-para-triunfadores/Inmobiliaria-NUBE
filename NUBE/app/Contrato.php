<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model {

    protected $table = "contratos";

    protected $fillable = [
        'inmueble_id',
        'inquilino_id',
        'garante_id',
        'tipo_renta', #fija/creciente
        'incremento',
        'periodos', #(periodos de incremento, para 'creciente')
        'monto_basico', #minimo de alquiler mensual        
        'fecha_hasta',
        'fecha_desde',
        'descripcion',
        'sujeto_a_gastos_compartidos', //indica si el contrato está sujeto a compartir gastos con los otros inquilinos del edificio
        'comision_propietario',
        'comision_inquilino'
    ];

    protected $dates = ['fecha_desde', 'fecha_hasta'];

    public function getFechaDesdeFormateadoAttribute(){
        return $this->fecha_desde->format('d/m/Y');
    }

    public function getFechaHastaFormateadoAttribute(){
        return $this->fecha_hasta->format('d/m/Y');
    }

    public function garante() {
        return $this->belongsTo('App\Garante');
    }

    public function vigente(){
        $fecha_hoy = Carbon::now();
        if($this->fecha_hasta > $fecha_hoy){
            return true;
        }
    }

    public function inquilino() {
        return $this->belongsTo('App\Inquilino');
    }
    public function inmueble() {
        return $this->belongsTo('App\Inmueble');
    }
  
    public function fotos() {
        return $this->hasMany('App\ImagenInmueble');
    }

    public function oportunidades() {
        return $this->hasMany('App\Oportunidad');
    }

    public function servicios_contrato() {
        return $this->hasMany('App\ServicioContrato');
    }

    public function liquidaciones() {
        return $this->hasMany('App\LiquidacionMensual');
    }

    public function ultima_liquidacion() {
        return $this->liquidaciones->last();
    }
    
    public function periodos_contrato() {
        return $this->hasMany('App\PeriodoContrato');
    }

    ### -- METODOS -- ###
    public function total_boletas_impagas(){
        $liquidaciones = $this->hasMany('App\LiquidacionMensual')->where('abonado', null)->get();
        $deuda = 0;
        foreach($liquidaciones as $liquidacion){
            $deuda = $deuda + $liquidacion->total;
        }
        return number_format($deuda , 2);
    }

    public function no_tiene_liquidaciones(){
        $liquidaciones = $this->liquidaciones();
    }
    ### --/- METODOS 

    #### MUTADORES ####
    public function setMontoBasicoAttribute($value)
    {
        $this->attributes['monto_basico'] = ($value);
    }
    public function setIncrementoAttribute($value)
    {
        $this->attributes['incremento'] = number_format($value , 2);
    }
    

}
