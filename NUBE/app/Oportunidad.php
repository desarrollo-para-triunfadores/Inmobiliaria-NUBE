<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oportunidad extends Model
{
    protected $table =  "oportunidades";
    
    protected $fillable = [
        'estado_id',
        'nombre_interesado',
        'telefono',
        'fecha_comienzo',
        'email',
        'mensaje',
        'inmueble_id',
        'solicitud_atendida'
    ];

    protected $dates = ['fecha_comienzo'];

    /**
     * Mutadores
     */

    public function getFechaComienzoFormateadoAttribute(){
        return $this->fecha_comienzo->format('d/m/Y');
    }

    public function setFechaComienzoAttribute($value){
        if(!is_null($value)){
            $fecha= str_replace('/', '-', $value);
            $this->attributes['fecha_comienzo'] = date('Y-m-d', strtotime($fecha));
        }       
    }

    /**
     * Relaciones
     */

    public function inmueble()
    {
        return $this->belongsTo('App\Inmueble');
    }

    public function estado()
    {
        return $this->belongsTo('App\Estado_Oportunidad');
    }

    public function visitas(){
        return $this->hasMany('App\Visita');
    }

    public function historias_oportunidad(){
        return $this->hasMany('App\Historia_Oportunidad');
    }

}
