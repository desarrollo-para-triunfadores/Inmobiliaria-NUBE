<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LiquidacionMensual extends Model
{
    protected $table = "liquidaciones_mensuales";

    protected $fillable = [
        'contrato_id',
        'alquiler',
        'vencimiento',
        'fecha_pago',
        'sub_total',
        'total',
        'abono',
        'saldo_periodo'
    ];

    protected $dates = ['vencimiento', 'fecha_pago'];

    public function getVencimientoFormateadoAttribute(){
        return $this->vencimiento->format('d/m/Y');
    }

    public function getFechaPagoFormateadoAttribute(){
        return $this->fecha_pago->format('d/m/Y');
    }

    public function contrato() {
        return $this->belongsTo('App\Contrato');
    }

    public function conceptos(){
        return $this->hasMany('App\ConceptoLiquidacion');
    }

    public function calcular_total(){ // este método calcula el valor total por los servicios asociados (por ahora no cuenta las expensas del edificio)
        $total = 0;
        foreach ($this->conceptos() as $concepto) {
            $total = $total + $concepto->monto;
        }
        return $total;
    }

    public function calcular_valor_expensas(){ //este método es previsional hasta que aclaremos el tema de los gastos compartidos del edificio
        $total_conceptos = $this->calcular_total();
        return $this->total - $total_conceptos - $this->alquiler;
    }
}
