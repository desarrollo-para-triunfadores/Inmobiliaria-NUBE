<?php 


namespace App\Http\ViewComposers;

use App\Barrio;
use App\Contrato;
use App\Edificio;
use App\Inmueble;
use App\Localidad;
use App\Servicio;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;


class ConceptosLiquidacionesComposer {
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */

    public function compose(View $view)
    {        
        
        $fecha_hoy = Carbon::now();
        /**
         * Con este pedacito de código de abajo se obtienen todos los inmuebles actualmente ocupados
         */
        $inmuebles_ocupados = Contrato::all()->where('fecha_hasta', '>', $fecha_hoy)->pluck('inmueble_id')->toArray(); //listado de ids de inmuebles sacados de los contratos que están vigentes
        $inmuebles = Inmueble::all()->whereIn('id', $inmuebles_ocupados);

        $edificios = Edificio::all();
        $localidades = Localidad::all();
        $barrios = Barrio::all();
        $servicios = Servicio::all();

        $view->with('edificios', $edificios)
        ->with('barrios', $barrios)
        ->with('localidades', $localidades)
        ->with('inmuebles', $inmuebles)
        ->with('servicios', $servicios);

    }
}