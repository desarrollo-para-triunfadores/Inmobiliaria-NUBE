<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SolicitudServicio;

class Tecnico extends Model {

    protected $table = "tecnicos";

    protected $fillable = ['persona_id', 'rubroTecnico_id'];

    /**
     * Relaciones
     */

    public function persona() {
        return $this->belongsTo('App\Persona');
    }

    public function rubro() {
        return $this->belongsTo('App\RubroTecnico');
    }

    public function solicitudes_servicio(){
        return $this->hasMany('App\SolicitudServicio');
    }

    /******************************** Métodos ************************************/

    public function movimientos(){
        return $this->hasMany('App\Movimientos');
    }

    public function ocupado(){  #Devuelve true si el tecnico esta con alguna Solicitud de Servicio sin cerrar 
        $solicitudesDelTecnico = SolicitudServicio::where('tecnico_id', $this->id)->whereNull('fecha_cierre')->get();
        foreach ($solicitudesDelTecnico as $ss){
            if($solicitudesDelTecnico){
                return true;
            }
        }        
        return false;        
    }
    
    public function get_total_recaudado(){
        $total = 0;
        $solicitudesDelTecnico = SolicitudServicio::where('tecnico_id', $this->id)->where('fecha_cierre')->get();
        foreach($solicitudesDelTecnico as $ss){
            $total+= $ss->monto_final;
        }
        return $total;
    }

    public function cantidad_solicitudes_por_cobrar(){
        $solicitudesDelTecnico = SolicitudServicio::where('tecnico_id', $this->id)->where('estado','<>','finalizada')->get();
        return $solicitudesDelTecnico->count();
    }

    public function dinero_por_cobrar(){
        return $solicitudesDelTecnico = SolicitudServicio::where('tecnico_id', $this->id)->where('estado','concluido')->sum('monto_final');
    }


}
