<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model {

    protected $table = "personas";
    protected $fillable = [
        'nombre',
        'apellido',
        'dni',
        'sexo',
        'fecha_nac',
        'telefono',
        'telefono_contacto',
        'descripcion',
        'email',
        'localidad_id',
        'direccion',
        'pais_id',
        'foto_perfil',
        'user_id'
    ];

    protected $dates = ['fecha_nac'];

    /**
     * Mutadores
     */

    public function getNombreCompletoAttribute(){
        return $this->apellido ." ". $this->nombre;
    }

    public function getFechaNacFormateadoAttribute(){
        return $this->fecha_nac->format('d/m/Y');
    }

    public function setFechaNacAttribute($value)
    {
        if(!is_null($value)){
            $fecha = str_replace('/', '-', $value);
            $this->attributes['fecha_nac'] = date('Y-m-d', strtotime($fecha));     
        }
    }

    /**
     * Relaciones
     */  

    public function inquilino() {
        return $this->hasOne('App\Inquilino');
    }

    public function propietario() {
        return $this->hasOne('App\Propietario');
    }

    public function tecnico() {
        return $this->hasOne('App\Tecnico');
    }

    public function garante() {
        return $this->hasOne('App\Garante');
    }

    public function pais() {
        return $this->belongsTo('App\Pais');
    }

    public function localidad() {
        return $this->belongsTo('App\Localidad');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    /**
     * Métodos diversos
     */

    public function es_cliente(){
        //$persona = \App\Persona::all();
        if($this->inquilino || $this->propietario)
            return true;
    }

    public function getEdad(){
        $edad = Carbon::parse($this->fecha_nac)->age; 
        return $edad; 
    }
}
