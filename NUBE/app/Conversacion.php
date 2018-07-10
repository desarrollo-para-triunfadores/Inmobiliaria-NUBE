<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Mensaje;
use App\Conversacion;
use App\EstadoUserMensaje;
use App\UserConversacion;
use Illuminate\Support\Facades\Auth;

class Conversacion extends Model
{
    
    protected $table =  "conversaciones";

    protected $fillable = []; 

    public function mensajes(){
        return $this->hasMany('App\Mensaje');
    }

    public function usersConversacion(){
        return $this->hasMany('App\UserConversacion');
    }

    public function conversacion_valida(){
        
        /**
         * Este método verifica si la conversación posee aunque sea un mensaje que no esté marcado para la papelera. 
         * Todo esto siempre teniendo en cuenta al usuario logueado.
         */
       
        $valido = false;

        $mensajes_claves = $this->mensajes->pluck('id')->toArray();
        $cantidad_mensajes = EstadoUserMensaje::all()
        ->where('user_id', Auth::user()->id)
        ->whereIn('mensaje_id', $mensajes_claves)->count();

        if($cantidad_mensajes > 0){
            $valido = true;
        }

        return $valido;
    }

    public function obtener_usuario_restante(){
        
        /**
         * Este método verifica devuelve al otro usuario de la conversacion que no se trata del usuario logueado.
         */
       
        $user_conversacion = $this->usersConversacion->where('user_id','<>', Auth::user()->id)->first();
        return $user_conversacion;
    }

    public function cant_mensajes_sin_leer(){
        
        /**
         * Este método devuelve la cantidad de mensajes sin leer de la conversación.
         * El estado del mensaje cambia una vez se haya abierto la conversación.
         */
       
        $mensajes_claves = $this->mensajes->pluck('id')->toArray();
        $cantidad_mensajes = EstadoUserMensaje::all()
        ->where('user_id', Auth::user()->id)
        ->where('leido', '<>', true)
        ->where('enviado', '<>', true) 
        ->whereIn('mensaje_id', $mensajes_claves)->count();

        return $cantidad_mensajes;
    }
    

}
