<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password','imagen'];

    public function persona() {
        return $this->hasOne('App\Persona');
    }

<<<<<<< HEAD
    public function es_propietario() {
        return $this->hasOne('App\Persona');
    }

    public function movimientos() {
        return $this->hasMany('App\Movimiento');
    }

=======
    public function notificaciones() {
        return $this->hasMany('App\Notificacion');
    }
    
    public function cantidad_notificaciones_nuevas() {
        return $this->notificaciones()->where("tipo", "<>", true)->where("estado_leido", "<>", true)->count();
    }


>>>>>>> 8b3f3010002e892b1001d1a0a8ad04539bd57e58
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

}
