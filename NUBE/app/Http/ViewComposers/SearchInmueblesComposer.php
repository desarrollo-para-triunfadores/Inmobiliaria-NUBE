<?php

namespace App\Http\ViewComposers;

use App\Inmueble;
use App\Provincia;
use App\Localidad;
use App\Tipo;
use Illuminate\Contracts\View\View;

class SearchInmueblesComposer {

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view) {

        /*
         * Solicitamos las variables para trabajar
         */
        $tipos_inmuebles = Tipo::all();
        $provincias = Provincia::all();
        $localidades = Localidad::all();
        
        /*
         * Determinamos el rango de precios para la venta
         */        
        $valor_más_alto_venta = Inmueble::all()->where('disponible', '1')->sortByDesc('valorVenta')->first()->valorVenta;
        $valor_más_bajo_venta = Inmueble::all()->where('disponible', '1')->sortBy('valorVenta')->first()->valorVenta;
        $rango_venta = $valor_más_bajo_venta . "; " . $valor_más_alto_venta;
        
        /*
         * Determinamos el rango de precios para el alquiler
         */        
        $valor_más_alto_alquiler = Inmueble::all()->where('disponible', '1')->sortByDesc('valorAlquiler')->first()->valorAlquiler;
        $valor_más_bajo_alquiler = Inmueble::all()->where('disponible', '1')->sortBy('valorAlquiler')->first()->valorAlquiler;
        $rango_alquiler = $valor_más_bajo_alquiler . "; " . $valor_más_alto_alquiler;
        
        /*
         * Determinamos el rango de precios para el alquiler/venta
         */
        $rango_alquiler_venta = $valor_más_bajo_alquiler . "; " . $valor_más_alto_venta;
        
        $view->with('tipos_inmuebles', $tipos_inmuebles)
                ->with('rango_venta', $rango_venta)
                ->with('rango_alquiler', $rango_alquiler)
                ->with('rango_alquiler_venta', $rango_alquiler_venta)
                ->with('provincias', $provincias)
                ->with('localidades', $localidades);
    }

}
