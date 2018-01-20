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
        'usuario_id'
    ];

    protected $dates = ['fecha_nac'];

    public function inquilino() {
        return $this->hasOne('App\Inquilino');
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

    public function usuario(){
        return $this->belongsTo('App\User');
    }

    public function getNombreCompletoAttribute(){
        return $this->apellido ." ". $this->nombre;
    }

    public function getFechaNacFormateadoAttribute(){
        return $this->fecha_nac->format('d/m/Y');
    }
}
