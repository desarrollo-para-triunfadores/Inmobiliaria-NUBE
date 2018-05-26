<?php

namespace App;

use App\Visita;
use App\Conversacion;
use App\UserConversacion;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SolicitudServicio extends Model {

    protected $table = "solicitudesServicio";
    protected $fillable = [
        'tecnico_id',
        'contrato_id',
        'responsable',
        'rubrotecnico_id',
        'liquidacionmensual_id',
        'motivo',
        'estado',
        'monto_final',
        'fecha_cierre'
    ];
    protected $dates = ['fecha_cierre'];

    /**
     * Mutadores
     */
    public function getFechaCierreFormateadoAttribute() {
        $fecha = "-";
        if (!is_null($this->fecha_cierre)) {
            $fecha = $this->fecha_cierre->format('d/m/Y');
        }
        return $fecha;
    }

    public function setFechaCierreAttribute($value) {
        if (!is_null($value)) {
            $fecha = str_replace('/', '-', $value);
            $this->attributes['fecha_cierre'] = date('Y-m-d', strtotime($fecha));
        }
    }

    /**
     * Relaciones
     */
    public function tecnico() {
        return $this->belongsTo('App\Tecnico');
    }

    public function contrato() {
        return $this->belongsTo('App\Contrato');
    }

    public function rubro() {
        return $this->belongsTo('App\RubroTecnico');
    }

    public function liquidacionmensual() {
        return $this->belongsTo('App\LiquidacionMensual');
    }

    public function visitas() {
        return $this->hasMany('App\Visita');
    }

    /**
     * Métodos diversos
     */
    public function iniciar_conversación() {
        /*
         * Este método lo que hace es verificar si existe o no ya una conversación creada 
         * entre el usuario logueado y el usuario solicitante de un servicio.
         */
        $id_user_solicitud = "";
        $id_user_tecnico = $this->tecnico->persona->user->id;
        /*
         * Determinamos quien es el responsable
         */

        if ($this->responsable === 'inquilino') {
            $id_user_solicitud = $this->contrato->inquilino->persona->user_id;
        } else {
            $id_user_solicitud = $this->contrato->inmueble->propietario->persona->user_id;
        }


        $conversaciones_tecnico = UserConversacion::all()
                        ->where('user_id', $id_user_tecnico)
                        ->pluck('conversacion_id')->toArray();


        $conversaciones_cliente = UserConversacion::all()
                        ->where('user_id', $id_user_solicitud)
                        ->pluck('conversacion_id')->toArray();


        $id_conversacion = collect($conversaciones_tecnico)->intersect(collect($conversaciones_cliente))->last();


        if (is_null($id_conversacion)) {

            /*
             * Si no existe una conversación entre los usuarios se crea la misma
             */
            $conversacion = new Conversacion();
            $conversacion->save();

            $user_1 = new UserConversacion();
            $user_1->conversacion_id = $conversacion->id;
            $user_1->user_id = $id_user_tecnico;
            $user_1->save();

            $user_2 = new UserConversacion();
            $user_2->conversacion_id = $conversacion->id;
            $user_2->user_id = $id_user_solicitud;
            $user_2->save();
            
            dd($conversacion->id);
        }
    }

    public function visitas_del_dia() {

        /**
         * Este método devuelve las visitas para el día asociados a la solicitud
         * 
         */
        $fecha_hoy = Carbon::now();
        $fecha_control = Carbon::now()->addDay(); //sumamos un día 
        $visitas_hoy = Visita::all()->where('solicitudservicio_id', $this->id)
                ->where('confirmada', 1)
                ->where('realizada', "<>", 1)
                ->where('start', '>', $fecha_hoy->toDateString())
                ->where('start', '<', $fecha_control->toDateString());

        return $visitas_hoy;
    }

    public function solicitante() {
        /**
         * Devuelve el el obj propietario o inquilino segun la marca de quién
         * solicitó el servicio tecnico (responsable)
         */
        if ($this->responsable === 'propietario') {
            return $this->contrato->inmueble->propietario;
        } else {
            return $this->contrato->inquilino;
        }
    }

}
