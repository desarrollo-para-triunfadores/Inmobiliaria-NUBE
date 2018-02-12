<?php 

namespace App\Http\ViewComposers;
use Illuminate\Contracts\View\View;
use App\Notificacion;
use App\Visita;
use App\LiquidacionMensual;
use App\Oportunidad;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NotificacionesComposer {
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {        
        $fecha_hoy = Carbon::now(); 
        $fecha_control = Carbon::now(); //esta fecha se utiliza como para determinar un límite de rangos con la fecha de hoy. La fecha sería la siguiente a la de hoy. Se hace así porque la variable create_at es timestamp y maneja hora y acá intereza todo lo que sea de la fecha de hoy
        $fecha_control->addDay(); //sumamos un día 
     
        //Notificaciones de vencimientos de Liquidaciones 
        if(Auth::user()->persona){            
            if(Auth::user()->persona->inquilino){//Se comprueba que la persona es inquilino
                $ultimo_contrato = Auth::user()->persona->inquilino->ultimo_contrato();//Obtenemos el último contrato 
                if($ultimo_contrato && $ultimo_contrato->vigente()){//Si el contrato se encuentra en vigencia realizamos verificaciones para generar notificaciones
                    $ultima_liquidacion = $ultimo_contrato->ultima_liquidacion();//obtenemos la última liquidación
                   
                    if($ultima_liquidacion->vencimiento && is_null($ultima_liquidacion->fecha_cobro_inquilino)){//si la liquidación tiene fecha de vencimiento y aún no fue cobrada se lanza el control. Que tenga fecha de vencimiento quiere decir que está lista para cobrarse.
                
                        $fecha_hoy = Carbon::now();                             
                        $diferencia = $fecha_hoy->diff($ultima_liquidacion->vencimiento);                        
                        
                        if($ultima_liquidacion->comprobar_vencimiento()){//Se verifica si la liquidación se encuentra vencida y generando mora
                            $notificacion = new Notificacion();
                            $notificacion->mensaje = "Estimado cliente le recordamos que adeuda el pago de la mensualidad correspondiente al periodo ".$ultima_liquidacion->periodo.". Le invitamos a contactarse con nosotros para regularizar su situación y así evitar más cargos por mora.";
                            $notificacion->ocultar = false;
                            $notificacion->tipo = "vencimiento";
                            $notificacion->estado_leido = false;
                            $notificacion->user_id = Auth::user()->id;
                            $notificacion->save();
                        }else if ($diferencia <= 5){ //Se verifica que falten 5 o menos días para informar mediante notificación el vencimiento
                            $notificacion = new Notificacion();
                            $notificacion->mensaje = "Estimado cliente le recordamos que su boleta correspondiente a la mensualidad del periodo ".$ultima_liquidacion->periodo.". A fin de evitar cargos por mora le invitamos a que abone el monto. El vencimiento es el ".$ultima_liquidacion->vencimiento;
                            $notificacion->ocultar = false;
                            $notificacion->tipo = "vencimiento";
                            $notificacion->estado_leido = false;
                            $notificacion->user_id = Auth::user()->id;
                            $notificacion->save();
                        }
                    }
                }                
            }
        }


        $notificacion_del_dia = Notificacion::all() //Se obtienen la notificaciones que se hayan creado el dia de la fecha. Esto se usa para controlar y no crear notificaciones repetidas
            ->where('created_at', '>', $fecha_hoy->toDateString())
            ->where('created_at', '<', $fecha_control->toDateString());

        //Notificaciones de visitas del día
        if(Auth::user()->can('acceso a agenda')){
            
                $notificacion_del_dia_de_agenda = $notificacion_del_dia->where('tipo', 'agenda')->last(); //Verificamos la existencia de notitificaciones de agenda para control
                $cant_visitas = 0;

                if(!is_null($notificacion_del_dia_de_agenda)){//Si existe una notificación de este tipo se controla que hayan nuevas visitas posteriores a la notificación
                    $cant_visitas = Visita::all() //Se obtiene la cantidad de visitas que tengan se hayan pactado para después de la hora del momento de creación de la última notificación
                    ->where('created_at', '>', $notificacion_del_dia_de_agenda->create_at->toDateTimeString())                
                    ->count();
                }else{
                    $cant_visitas = Visita::all() //Se obtiene la cantidad de visitas que tengan la fecha de inicio el día de hoy
                    ->where('created_at', '>', $fecha_hoy->toDateString())
                    ->where('created_at', '<', $fecha_control->toDateString())
                    ->count();
                }  
            
                if($cant_visitas>0){            
                    //Se crea la notificación para indicar la cantidad de visitas
                    $notificacion = new Notificacion();
                    $notificacion->mensaje = "Recuerda que para hoy tienes programada ".$cant_visitas." visita/s. Ingresa a la agenda para conocer más detalles.";
                    $notificacion->ocultar = false;
                    $notificacion->tipo = "agenda";
                    $notificacion->estado_leido = false;
                    $notificacion->user_id = Auth::user()->id;
                    $notificacion->save();
                }
        }

        //Notificaciones de oportunidades nuevas
        if(Auth::user()->can('acceso a oportunidades')){
           
            $notificacion_del_dia_de_oportunidad = $notificacion_del_dia->where('tipo', 'oportunidad')->last(); //Verificamos la existencia de notitificaciones de oportunidad para control
            $cant_oportunidades_nuevas = 0;

            $oportunidades_no_atendidas = Oportunidad::all() //Se obtiene la cantidad de oportunidades que no posean visita programada aún
                ->where('solicitud_atendida', '<>', true);
           
            if($notificacion_del_dia_de_oportunidad){//Si existe una notificación de este tipo se controla que hayan nuevas visitas posteriores a la notificación
                $cant_oportunidades_nuevas = $oportunidades_no_atendidas //Se obtiene la cantidad de oportunidades que tengan se hayan solicitado para después de la hora del momento de creación de la última notificación
                    ->where('created_at', '>', $notificacion_del_dia_de_oportunidad->created_at->toDateTimeString())                
                    ->count();
            }else{
                $cant_oportunidades_nuevas = $oportunidades_no_atendidas->count(); //Se obtiene la cantidad de oportunidades que no posean visita programada aún     
            }  
           
           
            if($cant_oportunidades_nuevas > 0){             
                //Se crea la notificación para indicar la cantidad de oportunidades sin atender
                $notificacion = new Notificacion();
                $notificacion->mensaje = "Existen ".$cant_oportunidades_nuevas." solicitudes de visitas a inmuebles. Ingresa a la sección oportunidades para darle tratamiento.";
                $notificacion->ocultar = false;
                $notificacion->tipo = "oportunidad";
                $notificacion->estado_leido = false;
                $notificacion->user_id = Auth::user()->id;
                $notificacion->save();
            }
        }

        //Devolvemos las notificaciones del usuario
        $notificaciones = Auth::user()->notificaciones;
        $view->with('notificaciones', $notificaciones);
    }
}