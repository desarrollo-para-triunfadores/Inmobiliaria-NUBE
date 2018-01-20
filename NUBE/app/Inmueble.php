<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inmueble extends Model {

    protected $table = "inmuebles";
    protected $fillable = [
        'condicion',
        'valorVenta', 
        'valorAlquiler',
        'valorReal',
        'superficie',
        'direccion',
        'piso',
        'numDepto',
        'fechaHabilitacion',
        'linkVideo',
        'longitud',
        'latitud',
        'cantidadAmbientes', 
        'cantidadBaños', 
        'cantidadGarages', 
        'cantidadDormitorios',
        'disponible',
        'descripcion',
        'tipo_id',
        'propietario_id',
        'localidad_id',
        'barrio_id',
        'edificio_id'
    ];

    protected $dates = ['fechaHabilitacion'];

    public function getFechaHabilitacionFormateadoAttribute(){
        return $this->fechaHabilitacion->format('d/m/Y');
    }

    public function garante() {
        return $this->belongsTo('App\Garante');
    }

    public function contratos(){        #devuelve el historial de contratos de un inmueble
        return $this->hasMany('App\Contrato');
    }




    public function contrato_vigente(){// este método queda obsoleto si se usa las relaciones
        if($this->contratos()){         #si el inmueble tuvo alguna vez algun contrato (historicamente)
            $fecha_hoy = \Carbon\Carbon::now('America/Buenos_Aires');
            $historico_contratos_inmueble = Contrato::where('inmueble_id',$this->id)->get();
            foreach ($historico_contratos_inmueble as $contrato){
                $fecha_hasta = \Carbon\Carbon::createFromFormat('d/m/Y', $contrato->fecha_hasta);
                if($fecha_hasta > $fecha_hoy){      #verificamos, si el contrato esta en vigencia, es porque es el actual contrato sobre el inmueble (le faltaria verificar si se cancelo, pero de momento no se puede cancelar un contrato)
                    $contrato_vigente = $contrato;
                    return $contrato_vigente;
                }
            }
        }
    }



    public function ultimo_contrato(){
        return $this->contratos()->get()->sortByDesc('id')->first();              
    }



    public function fecha_fin_contrato_actual(){
        if($this->contratos()){         #si el inmueble tuvo alguna vez algun contrato (historicamente)
            $fecha_hoy = \Carbon\Carbon::now('America/Buenos_Aires');
            $historico_contratos_inmueble = Contrato::where('inmueble_id',$this->id)->get();
            foreach ($historico_contratos_inmueble as $contrato){
                $fecha_hasta = \Carbon\Carbon::createFromFormat('d/m/Y', $contrato->fecha_hasta);
                if($fecha_hasta > $fecha_hoy){      #verificamos, si el contrato esta en vigencia, es porque es el actual contrato sobre el inmueble (le faltaria verificar si se cancelo, pero de momento no se puede cancelar un contrato)
                    return $fecha_hasta;
                }
            }
        }
    }

    public function tipo() {
        return $this->belongsTo('App\Tipo');
    }


    public function localidad() {
        return $this->belongsTo('App\Localidad');
    }

    public function barrio() {
        return $this->belongsTo('App\Barrio');
    }

    public function propietario() {
        return $this->belongsTo('App\Propietario');
    }
    
      public function edificio() {
        return $this->belongsTo('App\Edificio');
    }

    public function fotos() {
        return $this->hasMany('App\ImagenInmueble');
    }

    public function foto_slider(){           
        return $this->fotos()->where('seccion_imagen','slider')->get()->first();
    }

     public function caracteristicas() {
        return $this->hasMany('App\CaracteristicaInmueble');
    }

    public function oportunidades(){
        return $this->hasMany('App\Oportunidad');
    }

}
