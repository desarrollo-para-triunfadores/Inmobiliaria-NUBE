<?php 


namespace App\Http\ViewComposers;
use Illuminate\Contracts\View\View;
use App\Mensaje;
use App\Conversacion;
use App\EstadoUserMensaje;
use App\UserConversacion;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class MensajesComposer {
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */

    public function compose(View $view)
    {        
        
        $conversaciones_claves = UserConversacion::where('user_id', Auth::user()->id)->pluck('conversacion_id')->toArray();
        $conversaciones_nav_top = Conversacion::all()->whereIn('id', $conversaciones_claves);
        
        $cantidad_mensajes_sin_leer = 0;

        foreach ($conversaciones_nav_top as $item) {
            $cantidad_mensajes_sin_leer += $item->cant_mensajes_sin_leer();
        }
        
        $view->with('conversaciones_nav_top', $conversaciones_nav_top)
        ->with('cantidad_mensajes_sin_leer',$cantidad_mensajes_sin_leer);




    }
}