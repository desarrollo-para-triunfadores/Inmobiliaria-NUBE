<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visita extends Model {

    protected $table = "visitas";
    protected $fillable = [
        /**Variables ajustadas para su uso con el plugin calendar */
        'title',
        'start',
        'end',
        'allDay',
        'backgroundColor',
        'borderColor',
        /**Resto de variables */
        'confirmada',
        'realizada', 
        'solicitudservicio_id',
        'oportunidad_id'
    ];

    protected $dates = ['start', 'end'];


    /**
     * Mutadores
     */

    public function getStartFormateadoAttribute(){
        $fecha = "No fue definido";
        if(!is_null($this->start)){
            $fecha= $this->start->format('d/m/Y H:m');            
        }  
        return $fecha;
    }

    public function getEndFormateadoAttribute(){
        $fecha = "No fue definido";
        if(!is_null($this->end)){
            $fecha= $this->end->format('d/m/Y - H:m');            
        }  
        return $fecha;
    }

    public function getRealizadaFormateadoAttribute(){
        $dato = "No fue concretada";
        if($this->realizada){
            $dato = "Fue concretada";         
        }  
        return $dato;
    }

    public function getConfirmadaFormateadoAttribute(){
        $dato = "Fue rechazada";
        if($this->confirmada){
            $dato = "Fue confirmada";         
        }  
        return $dato;
    }

    public function getEstadoFinalAttribute(){
        $dato = "Fue rechazada";
        if(($this->confirmada)&&($this->realizada)){
            $dato = "Fue confirmada y concretada";         
        }elseif($this->confirmada){
            $dato = "Fue confirmada";         
        } elseif($this->realizada){
            $dato = "Fue concretada";   
        } 
        return $dato;
    }

    public function setStartAttribute($value){
        if(!is_null($value)){
            $fecha= str_replace('/', '-', $value);
            $this->attributes['start'] = date('Y-m-d H:m', strtotime($fecha));
        }       
    }

    public function setEndAttribute($value){
        if(!is_null($value)){
            $fecha= str_replace('/', '-', $value);
            $this->attributes['end'] = date('Y-m-d H:m', strtotime($fecha));
        }       
    }

    public function setbackgroundColorAttribute($value){
        /**
         * Se setea el mismo color seleccionado para el fondo 
         * para el color del borde.
         */
        if(!is_null($value)){
            $this->attributes['backgroundColor'] = $value;
            $this->attributes['borderColor'] = $value;
        }else{ 
            /**
             * Si no se escoge un color se setea en color rojo.
             */
            $this->attributes['backgroundColor'] = "#DA8F1F";
            $this->attributes['borderColor'] = "#DA8F1F";
        }       
    }


    /**
     * Relaciones
     */

    public function oportunidad() {
        return $this->belongsTo('App\Oportunidad');
    }

    public function solicitudservicio() {
        return $this->belongsTo('App\SolicitudServicio');
    }

    public function notificaciones() {
        return $this->hasMany('App\Notificacion');
    }

}
