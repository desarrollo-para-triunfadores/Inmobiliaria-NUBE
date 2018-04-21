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

    protected $dates = [
        'vencimiento',
        'fecha_cobro_inquilino',
        'fecha_pago_propietario',
        'fecha_cobro_propietario'
    ];

    /**
     * Mutadores
     */

    public function getVencimientoFormateadoAttribute(){
        return $this->vencimiento->format('d/m/Y');
    }

    public function setVencimientoAttribute($value){
        if(!is_null($value)){
            $fecha= str_replace('/', '-', $value);
            $this->attributes['vencimiento'] = date('Y-m-d', strtotime($fecha));
        }       
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
        return number_format($this->comision_a_propietario, 2);
    }
    
     /**
     * Relaciones
     */  

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

    public function solicitudes_servicios(){
        return $this->hasMany('App\SolicitudServicio');
    }

    /**
     * Métodos diversos
     */

    public function calcular_total(){ 

        /**
         * Este método calcula el valor total por los servicios asociados.
         */

        $total = DB::table('conceptos_liquidaciones_mensuales')
            ->where('liquidacionmensual_id', $this->id)
            ->sum('monto');
        return $total;
    }

    public function calcular_total_a_propietario(){ 

        /**
         * Este método calcula el monto a pagar por el propietario por los servicios prestados.
         */

        $total = $this->comision_a_propietario + $this->obtener_monto_por_repararaciones("propietario");
        return $total;
    }

    public function detalle_conceptos(){ 
        
        /**
         * Este método devuelve un detalle indicando concepto y monto de todos los conceptos 
         * de la liquidación. Se utiliza en la generación de la boleta.  
         */
    
        $conceptos_liquidaciones= ConceptoLiquidacion::all()->where('liquidacionmensual_id', $this->id); 
        $conceptos_para_factura = [];
        foreach ($conceptos_liquidaciones as $valor) {
            $dato =[
                "concepto" => $valor->servicio->nombre,
                "monto" => $valor->monto,
                "concepto_compartido" => $valor->servicio->servicio_compartido,
            ];
            array_push($conceptos_para_factura, $dato);           
        }
        return $conceptos_para_factura;
    } 

    public function obtener_monto_por_repararaciones($responsable){
        
        /**
         * Este método calcula el monto total por todas las reparaciones que se hicieron
         * en el periodo de acuerdo a lo solicitado (inquilino o propietario).
         */


        $total = DB::table('solicitudesServicio')->where('liquidacionmensual_id', $this->id)->where('responsable', $responsable)->sum('monto_final');
        return $total;
    }

    public function comprobar_vencimiento() {
        $fecha_hoy = Carbon::now();
        if($this->vencimiento < $fecha_hoy){
            return true;
        }
    }

    public function calcular_mora() {
        
        /**
         * Este método calcula y devuelve el monto total por mora por todos los días
         * que se haya pasado de la fecha de vencimiento.
         */
        
        $fecha_hoy = Carbon::now();
        if($this->vencimiento > $fecha_hoy){
            return 0;
        }else{
            $cantidad_dias = $fecha_hoy->diffInDays($this->vencimiento);
            return ($this->contrato->monto_basico * 2 /100) * $cantidad_dias;
        }
    }

}
