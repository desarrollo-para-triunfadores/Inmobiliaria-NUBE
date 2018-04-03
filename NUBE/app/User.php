<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
    
    public function movimientos() {
        return $this->hasMany('App\Movimiento');
    }

    public function cantidad_notificaciones_nuevas() {
        return $this->notificaciones()->where("tipo", "<>", true)->where("estado_leido", "<>", true)->count();
    }

    public function obtener_rol(){
        $id_rol = DB::table('model_has_roles')->where('model_id', $this->id)->pluck('role_id')->first();
        $nombre_rol = DB::table('roles')->where('id', $id_rol)->pluck('name')->first();
        return $nombre_rol;
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
