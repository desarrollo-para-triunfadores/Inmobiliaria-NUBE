<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Mensaje;
use App\Conversacion;
use App\UserConversacion;
use Illuminate\Support\Facades\Auth;

class Mensaje extends Model
{
    protected $table = "mensajes";

    protected $fillable = ['conversacion_id', 'mensaje'];

    public function conversacion()
    {
        return $this->belongsTo('App\Conversacion');
    }

    public function estadosusersmensajes()
    {
        return $this->hasMany('App\EstadoUserMensaje');
    }

    public function mensaje_enviado()
    {

        /**
         * Este método indica si el mensaje fue o no enviado por el usuario logueado. En el caso de que
         * no haya sido enviado por el usuario logueado lo marca al mensaje como leido.
         */

        $usuario_emisor = false;

        $estado_user_mensaje = $this->estadosusersmensajes->where('user_id', Auth::user()->id)->first();

        if ($estado_user_mensaje->enviado) {
            $usuario_emisor = true;
        }else{
            $estado_user_mensaje->leido = true;
            $estado_user_mensaje->save();
        }
        
        return $usuario_emisor;

    }

    public function mensaje_leido()
    {

        /**
         * Este método indica si el mensaje fue o no leido por el usuario receptor.
         */

        $mensaje_leido = false;
       
        $estado_user_mensaje = $this->estadosusersmensajes->where('user_id','<>', Auth::user()->id)->first();

        if ($estado_user_mensaje->leido) {
            $mensaje_leido = true;
        }

        return $mensaje_leido;

    }

}
