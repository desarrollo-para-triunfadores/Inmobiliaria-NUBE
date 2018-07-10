<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoUserMensaje extends Model
{
 
    protected $table =  "estado_users_mensajes";

    protected $fillable = ['mensaje_id', 'user_id', 'leido', 'enviado', 'destacado', 'papelera']; 

    public function mensaje(){
        return $this->belongsTo('App\Mensaje');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

}
