<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserConversacion extends Model
{
    protected $table =  "users_conversaciones";

    protected $fillable = ['conversacion_id', 'user_id']; 

    public function conversacion(){
        return $this->belongsTo('App\Conversacion');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
    
}
