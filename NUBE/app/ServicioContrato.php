<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ServicioContrato extends Model
{
    protected $table = "contratos_servicios";

    protected $fillable = ['contrato_id', 'servicio_id'];

    public function contrato() {
        return $this->belongsTo('App\Contrato');
    }

    public function servicio() {
        return $this->belongsTo('App\Servicio');
    }


    public function determinar_valor() {
        $fecha_hoy = Carbon::now();
        $contratos_vigentes = Contrato::all()->where('fecha_hasta', '>', $fecha_hoy);

        $inmuebles_claves = Inmueble::all()
            ->where("edificio_id", $this->contrato->inmueble->edificio->id)    //obtenemos todos los objeto inmuebles disponebles para alquiler
            ->implode('id', ', ');   //obtenemos de la coleccion de objetos de inmuebles un string de todos los ids de inmuebles de la colección filtrada

        $inmuebles_array = array_map('intval', explode(',', $inmuebles_claves)); //convertimos el string de claves a una coleccion que es compatible para hacer concultas.

        $cantidad_inquilinos_edificio = $contratos_vigentes
            ->whereIn('inmueble_id', $inmuebles_array) //filtramos los contratos que tengan de inmueble_id a cualquiera de los ids de la coleccion de ids de inmuebles que cumplen con los requisitos solicitados
            ->count();

        $costos_expensas = $this->contrato->inmueble->edificio->obtener_cantidad_departamentos_alquilados($cantidad_inquilinos_edificio);

        return $costos_expensas[$this->servicio->nombre];
    }
}
