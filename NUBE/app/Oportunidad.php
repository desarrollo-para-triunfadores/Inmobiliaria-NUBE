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
            'inmueble_id'
            ];

    /**  */
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
    /**  */
}
