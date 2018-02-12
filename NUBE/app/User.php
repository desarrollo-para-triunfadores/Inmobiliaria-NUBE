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

    public function notificaciones() {
        return $this->hasMany('App\Notificacion');
    }
    
    public function cantidad_notificaciones_nuevas() {
        return $this->notificaciones()->where("tipo", "<>", true)->where("estado_leido", "<>", true)->count();
    }


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

}
