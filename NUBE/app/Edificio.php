<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Edificio extends Model
{
    protected $table = "edificios";

    protected $fillable = [
        'barrio_id',
        'localidad_id',
        'direccion',
        'nombre',
        'cant_deptos',
        'costo_sueldos_personal',
        'cant_ascensores',
        'valor_ascensores',
        'costo_mant_ascensores',
        'costo_limpieza',
        'costo_seguro',
        'cochera',
        'longitud',
        'latitud',
        'administrado_por_sistema', //esta variable puede indica si el edificio es administrado en su totalidad por el sistema
        'foto_perfil',
        'fecha_habilitacion',
        'descripcion'
    ];

    protected $dates = ['fecha_habilitacion'];

    public function getFechaHabilitacionFormateadoAttribute(){
        return $this->fecha_habilitacion->format('d/m/Y');
    }

    public function inmuebles()
    {
        return $this->hasMany('App\Inmueble');
    }

    public function localidad()
    {
        return $this->belongsTo('App\Localidad');
    }

    public function barrio()
    {
        return $this->belongsTo('App\Barrio');
    }
    public function servicios()
    {
        return $this->hasMany('App\Servicio');
    }

    public function setFechaHabilitacionAttribute($value)
    {
        $fecha= str_replace('/', '-', $value);
        $this->attributes['fecha_habilitacion'] = date('Y-m-d', strtotime($fecha));
    }


    public function obtener_cantidad_departamentos_alquilados($cant_alquileres)
    {

        $mant_ascensores = $this->costo_mant_ascensores/$cant_alquileres;
        $sueldo_personal =  $this->costo_sueldos_personal/$cant_alquileres;
        $ascensores =  (($this->valor_ascensores*10)/100)/$cant_alquileres;
        $seguro =  $this->costo_seguro/$cant_alquileres;
        $limpieza =  $this->costo_limpieza/$cant_alquileres;
        $total = $mant_ascensores + $sueldo_personal + $ascensores + $seguro + $limpieza;


        return $array = [
            "Mantenimiento infraestructura" => $mant_ascensores,
            "Sueldo personal" =>  $sueldo_personal,
            "Valor ascensores" =>  $ascensores,
            "Seguro" =>  $seguro,
            "Limpieza lugares comunes" =>  $limpieza,
            "total" => $total
        ];
    }
}
