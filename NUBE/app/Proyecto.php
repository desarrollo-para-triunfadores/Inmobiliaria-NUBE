<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model {

    protected $table = "proyectos";
    protected $fillable = [
        'condicion',
        'valorVenta',  
        'valorAlquiler',
        'superficie',
        'direccion',
        'piso',
        'numDepto',
        'fechaHabilitacion',
        'linkVideo',       
        'longitud',
        'latitud',
        'cantidadAmbientes', 
        'cantidadDormitorios',
        'cantidadBaños',
        'cantidadGarages',
        'descripcion1',
        'descripcion2',
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

}
