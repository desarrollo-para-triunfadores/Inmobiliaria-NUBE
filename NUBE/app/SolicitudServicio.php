<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolicitudServicio extends Model
{
    protected $table = "solicitudesServicio";
    protected $fillable =  ['inmueble_id','tecnico_id', 'inquilino_id', 'propietario_id', 
                            'estado', 'fecha_inicio', 'fecha_fin', 'cobrado']; 

    public function tecnico(){
        return $this->belongsTo('App\Tecnico');
    }  
    public function inmueble(){
        return $this->belongsTo('App\Inmueble');
    }  
    public function inquilino(){
        return $this->belongsTo('App\Inquilino');
    }  
    public function propietario(){
        return $this->belongsTo('App\Propietario');
    }                        
}
