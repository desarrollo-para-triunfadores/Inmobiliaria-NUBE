<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    protected $table =  "notificaciones";

    protected $fillable = [
        'mensaje',
        'ocultar',
        'tipo',
        'estado_leido',
        'user_id',
        'visita_id'
    ];

    /**
     * Relaciones
     */
    
    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function visita(){
    	return $this->belongsTo('App\Visita');
    }
    
}
