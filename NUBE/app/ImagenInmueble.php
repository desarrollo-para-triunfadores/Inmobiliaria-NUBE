<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagenInmueble extends Model
{
    protected $table = "inmuebles_imagenes";
    
    protected $fillable = [
        'nombre', 
        'inmueble_id',
        'seccion_imagen', 
        'espacio_id',
        'proyecto_id'
    ];

    public function inmueble() {
        return $this->belongsTo('App\Inmueble');
    }

    public function espacio() {
        return $this->belongsTo('App\Espacio');
    }

    public function proyecto() {
        return $this->belongsTo('App\Proyecto');
    }

}
