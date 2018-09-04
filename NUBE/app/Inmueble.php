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

    /**
     * Mutadores
     */
    public function getFechaHabilitacionFormateadoAttribute() {
        return $this->fechaHabilitacion->format('d/m/Y');
    }

    public function setFechaHabilitacionAttribute($value) {
        if (!is_null($value)) {
            $fecha = str_replace('/', '-', $value);
            $this->attributes['fechaHabilitacion'] = date('Y-m-d', strtotime($fecha));
        }
    }

    /**
     * Relaciones
     */
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

    public function contratos() {
        return $this->hasMany('App\Contrato');
    }

    public function fotos() {
        return $this->hasMany('App\ImagenInmueble');
    }

    public function caracteristicas() {
        return $this->hasMany('App\CaracteristicaInmueble');
    }

    public function oportunidades() {
        return $this->hasMany('App\Oportunidad');
    }

    /**
     * Métodos diversos
     */
    public function ultimo_contrato() {
        return $this->contratos->last();
    }

    public function disponible_eliminacion() {
        /*
         * Para saber si se puede borrar o no un inmueble se verifica unicamente 
         * que no tenga un contrato vigente.
         */

        $respuesta = true;

        if ($this->contratos->count() > 0) {
            $respuesta = !$this->contratos->last()->vigente();
        }

        return $respuesta;
    }

    public function foto_portada() {
        $nombre_foto = $this->fotos->where('seccion_imagen', 'portada')->last();

        if ($nombre_foto) {
            $nombre_foto = $nombre_foto->nombre;
        } else {
            $nombre_foto = false;
        }


        return $nombre_foto;
    }

    public function fotos_planos() {
        $nombres_fotos = $this->fotos->where('seccion_imagen', 'planoMin')->pluck('nombre')->toArray();
        if (count($nombres_fotos) < 1) {
            $nombres_fotos = false;
        }
        return $nombres_fotos;
    }

    public function fotos_detalle() {
        $nombres_fotos = $this->fotos->where('seccion_imagen', '<>','planoMin')->pluck('nombre')->toArray();
        if (count($nombres_fotos) < 1) {
            $nombres_fotos = false;
        }
        return $nombres_fotos;
    }

    public function mostrar_condicion() {

        /*
         * Este método devuelve la condición formateado para mostrar en el sitio público
         */

        switch ($this->condicion) {
            case "alquiler":
                $condicion = "Alquiler";
                break;
            case "alquiler/venta":
                $condicion = "Alquiler o Venta";
                break;
            case "venta":
                $condicion = "Venta";
                break;
        }
        return $condicion;
    }

}
