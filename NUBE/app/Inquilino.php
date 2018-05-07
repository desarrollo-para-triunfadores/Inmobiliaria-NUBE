<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inquilino extends Model {

    protected $table = "inquilinos";

    protected $fillable = ['persona_id', 'descripcion'];


    public function persona() {
        return $this->belongsTo('App\Persona');
    }

    public function contratos(){
        return $this->hasMany('App\Contrato');
    }

    public function movimientos(){
        return $this->hasMany('App\Movimientos');
    }


    /**
     * Métodos diversos
     */

    public function ultimo_contrato(){
        return $this->contratos->last(); 
    }


    
    public function ultimo_contrato_vigente(){

    /**
     * Este método hay que reveerlo porque hace no hace lo que dice su nombre
     * 
     */

        $this->contratos()->get()->sortByDesc('id')->first(); 
    }


}
