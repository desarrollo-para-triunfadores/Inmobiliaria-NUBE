<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;

class ServicioContrato extends Model
{
    protected $table = "contratos_servicios";

    protected $fillable = ['id', 'contrato_id', 'servicio_id'];

    public function contrato() {
        return $this->belongsTo('App\Contrato');
    }

    public function servicio() {
        return $this->belongsTo('App\Servicio');
    }

    public function conceptosliquidacion(){
        return $this->hasMany('App\ConceptoLiquidacion');
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

    public function periodos_validos() //este método se encarga de devolver los periodos que pueden ser utilizados en la carga de impuestos
    {
        
        $año_inicio = $this->contrato->fecha_desde->format('Y'); //se usa para control
        $mes_inicio = $this->contrato->fecha_desde->format('m'); //se usa para control
        $año_inicio_loop = $this->contrato->fecha_desde->format('Y'); //se usa para el loop
        $año_actual = Carbon::now()->format('Y'); //se usa para control
        $mes_actual = Carbon::now()->format('m'); //se usa para control
        $periodos = [];

        while ($año_inicio_loop <= $año_actual) { //obtenemos todos los periodos posibles en el rango que comprende desde el inicio del contrato hasta la fecha de hoy         
            for ($x = 1; $x <= 12; $x++) {
                if($año_inicio===$año_actual){                
                    if(($mes_inicio<=$x)&&($mes_actual>=$x)){
                        array_push($periodos, $x."/".$año_inicio_loop);
                    }                    
                }else{
                    if ($año_inicio_loop===$año_inicio){
                        if($mes_inicio<=$x){
                            array_push($periodos, $x."/".$año_inicio_loop);
                        }
                    }
                    if ($año_inicio_loop===$año_actual){
                        if($mes_actual>=$x){
                            array_push($periodos, $x."/".$año_inicio_loop);
                        }
                    }
                }                              
            } 
            $año_inicio_loop++;
        }

        $periodos_liquidaciones_claves = DB::table('conceptos_liquidaciones_mensuales')
        ->where('contrato_id', $this['attributes']['contrato_id'])
        ->where('servicio_id', $this['attributes']['servicio_id'])
        ->pluck('periodo')
        ->toArray(); //obtenemos un array con todos los periodos para el servicio
        
        $resultado = array_diff($periodos , $periodos_liquidaciones_claves); //combinamos y eliminamos los duplicados. Los duplicados representan los meses que ya fueron pagados para el concepto.

        return $resultado;
    }
}
