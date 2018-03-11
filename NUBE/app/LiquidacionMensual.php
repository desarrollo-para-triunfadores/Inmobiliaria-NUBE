<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;

class LiquidacionMensual extends Model
{
    protected $table = "liquidaciones_mensuales";

    protected $fillable = [
        'contrato_id',
        'alquiler',
        'gastos_administrativos',
        'comision_a_propietario',
        'periodo',
        'fecha_cobro_inquilino',
        'fecha_pago_propietario',
        'fecha_cobro_propietario',
        'vencimiento',
        'sub_total',
        'total',
        'abonado',
        'saldo_periodo'
    ];

    protected $dates = ['vencimiento',
        'fecha_cobro_inquilino',
        'fecha_pago_propietario',
        'fecha_cobro_propietario'];

    ############ -- MUTADORES-- #########    
    public function getVencimientoFormateadoAttribute(){
        return $this->vencimiento->format('d/m/Y');
    }

    public function getFechaCobroInquilinoFormateadoAttribute(){
        return $this->fecha_cobro_inquilino->format('d/m/Y');
    }

    public function getFechaPagoPropietarioFormateadoAttribute(){
        return $this->fecha_pago_propietario->format('d/m/Y');
    }

    public function getFechaCobroPropietarioVencimientoFormateadoAttribute(){
        return $this->fecha_cobro_propietario->format('d/m/Y');
    }
    public function getComisionAPropietarioFormateadoAttribute(){
        return number_format($this->comision_a_propietario,2);
    }
     ########## --/ MUTADORES-- ##########    

    public function comprobar_vencimiento() {
        $fecha_hoy = Carbon::now();
        if($this->vencimiento < $fecha_hoy){
            return true;
        }
    }

    public function calcular_mora() {
        $fecha_hoy = Carbon::now();
        if($this->vencimiento > $fecha_hoy){
            return 0;
        }else{
            $cantidad_dias = $fecha_hoy->diffInDays($this->vencimiento);
            return ($this->contrato->monto_basico * 2 /100) * $cantidad_dias;
        }
    }

    public function movimientos(){
        return $this->hasMany('App\Movimiento');
    }

    public function contrato() {
        return $this->belongsTo('App\Contrato');
    }

    public function conceptos(){
        $conceptos= ConceptoLiquidacion::all()->where('liquidacionmensual_id', $this->id);
        return $conceptos;
    }

    public function calcular_total(){ // este método calcula el valor total por los servicios asociados (por ahora no cuenta las expensas del edificio)
        $total = DB::table('conceptos_liquidaciones_mensuales')
            ->where('liquidacionmensual_id', $this->id)
            ->sum('monto');
        return $total;
    }

    public function detalle_conceptos(){//este método devuelve un detalle indicando concepto y monto de todos los conceptos de la liquidación. Se utiliza en la generación de la boleta   
        $conceptos_liquidaciones= ConceptoLiquidacion::all()->where('liquidacionmensual_id', $this->id); 
        $conceptos_para_factura = [];
        foreach ($conceptos_liquidaciones as $valor) {
            $dato =[
                "concepto" => $valor->serviciocontrato->servicio->nombre,
                "monto" => $valor->monto,
                "concepto_compartido" => $valor->serviciocontrato->servicio->servicio_compartido,
            ];
            array_push($conceptos_para_factura, $dato);           
        }
        return $conceptos_para_factura;
    } 
}
