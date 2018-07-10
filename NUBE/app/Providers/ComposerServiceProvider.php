<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composers
        ([
            'App\Http\ViewComposers\NotificacionesComposer' => 'admin.partes.navtop.main',
            'App\Http\ViewComposers\MensajesComposer' => 'admin.partes.navtop.mensajes',   
            'App\Http\ViewComposers\ConceptosLiquidacionesComposer' => ['admin.conceptos_liquidaciones_mensuales.create', 'admin.conceptos_liquidaciones_mensuales.main']
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
