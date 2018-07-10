<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Propietario extends Model
{

    protected $table = "propietarios";

    protected $fillable = ['persona_id', 'descripcion'];

    /**
     * Relaciones
     */

    public function persona()
    {
        return $this->belongsTo('App\Persona');
    }

    public function usuario()
    {
        return $this->belongsTo('App\User');
    }

    public function movimientos()
    {
        return $this->hasMany('App\Movimientos');
    }

    public function inmuebles()
    {
        return $this->hasMany('App\Inmueble');
    }

    /**
     * Métodos diversos
     */

    public function ultimos_contratos()
    {
        /**
         * Este método devulve los últimos contratos para cada inmueble que posee el propietario.
         */
        $contratos = [];
        foreach ($this->inmuebles as $inmueble) {
            if ($inmueble->ultimo_contrato()) {
                array_push($contratos, $inmueble->ultimo_contrato());
            }
        }
        return $contratos;

    }

    public function liquidaciones()
    { #Obtiene las liquidaciones de todos sus inmuebles con contrato
        $liquidaciones_de_propietario = [];
        foreach ($this->inmuebles as $inmueble) { #Obtener todos los inmuebles de este propietario
            if ($inmueble->ultimo_contrato() && $inmueble->ultimo_contrato()->vigente()) {
                //$respuesta->put('contrato',$inmueble->ultimo_contrato()); 
                foreach ($inmueble->ultimo_contrato()->liquidaciones() as $liquidacion) {
                    $liquidaciones_de_propietario->push('$liquidaciones', $inmueble->ultimo_contrato()->liquidaciones());
                }
            }
        }
        return $liquidaciones_de_propietario;
    }

    /**
     * Acá hay que aclara exactamente que onda los métodos contratos() y 
     * contratos_vigentes() porque no hacen exactamente lo que hacen los
     * títulos de dichos métodos ni tampoco sus comentarios.
     * 
     */

    # Este metodo devuelve TODOS los contratos que involucran inmuebles del Propietario que llama al metodo (no revisa vigencia  del contrato)
    public function contratos()
    {
        $respuesta = null;
        foreach ($this->inmuebles as $inmueble) {
            if ($inmueble->ultimo_contrato()) {
                $respuesta = $inmueble->ultimo_contrato(); 
                //$respuesta = true; 
            }
        }
        return $respuesta;
    }

    public function contratos_vigentes()
    {   #Devuelve los contratos que involucran al Propietario en la actualidad
        $respuesta = [];
        foreach ($this->inmuebles as $inmueble) { #Obtener todos los inmuebles de este propietario
            if ($inmueble->ultimo_contrato() /* && $inmueble->ultimo_contrato()->vigente()*/ ) {
                array_push($respuesta, $inmueble->ultimo_contrato());
            }
        }
        return $respuesta;
    }

    public function solicitudes_servicio(){
        $ids_inmuebles_de_propietario = $this->inmuebles->pluck('id')->toArray();
        $id_contratos = Contrato::all()->whereIn('inmueble_id',$ids_inmuebles_de_propietario)->pluck('id')->toArray();
        return $solicitudes = SolicitudServicio::all()->whereIn('contrato_id',$id_contratos)/*->where('responsable','propietario')*/;     
    }

    public function total_comisiones_pendientes_pago()
    {      #Dinero que el propietario adeuda a la inmobiliaria en concepto de servicio por uso del sistema
        $contratos_vigentes = $this->contratos_vigentes();
        $total_x_pagar = 0;
        foreach ($contratos_vigentes as $contrato_vigente) {
            $liquidaciones = LiquidacionMensual::where('contrato_id', $contrato_vigente->id)->where('fecha_cobro_propietario', null)->get();
            foreach ($liquidaciones as $liquidacion) {
                $total_x_pagar = $total_x_pagar + $liquidacion->comision_a_propietario;
            }
        }
        return $total_x_pagar;//number_format($total_x_pagar , 2);
    }

    public function cobros_alquiler_pendientes()
    {      #Dinero que el propietario tiene disponible en concepto de 'recaudacion de sus alquileres' que el sistema administra
        $contratos_vigentes = $this->contratos_vigentes();
        $alquileres_x_cobrar = 0;    #alquileres
        foreach ($contratos_vigentes as $contrato_vigente) {
            $liquidaciones = LiquidacionMensual::where('contrato_id', $contrato_vigente->id)->whereNotNull('fecha_cobro_inquilino')->where('fecha_pago_propietario', null)->get();
            foreach ($liquidaciones as $liquidacion) {
                $alquileres_x_cobrar = $liquidacion->alquiler;
            }
        }
        return $alquileres_x_cobrar;
    }

    public function saldo()
    {
        $saldo = $this->total_comisiones_pendientes_pago() - $this->cobros_alquiler_pendientes();
        return $saldo;
    }


}
