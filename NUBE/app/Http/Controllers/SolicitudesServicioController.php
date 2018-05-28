<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Inquilino;
use App\Localidad;
use App\Persona;
use App\Propietario;
use App\SolicitudServicio;
use App\Tecnico;
use App\Conversacion;
use App\UserConversacion;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use Session;
use Storage;


class SolicitudesServicioController extends Controller
{
    public function __construct()
    {
        Carbon::setlocale('es'); // Instancio en Español el manejador de fechas de Laravel
    }

    public function index(){
        #si es un admin, mostrar todas las solicitudes    
        if(Auth::user()->obtener_rol() == 'Administrador'){
            $solicitudes_servicio = SolicitudServicio::all();
            $tecnicos = Tecnico::all();
            $inquilinos = Inquilino::all();
            $propietarios = Propietario::all();
            return view('admin.solicitudes_servicio.main')
                ->with('tecnicos',$tecnicos)
                ->with('propietarios',$propietarios)
                ->with('inquilinos',$inquilinos)
                ->with('solicitudes_servicio',$solicitudes_servicio);    
        }
        #--si es Tecnico → mostrar unicamente las solicitudes de ese tecnico 
        if(Auth::user()->obtener_rol() == 'Personal'){
            $tecnico = Tecnico::find(Auth::user()->persona->tecnico->id);
            $ss = SolicitudServicio::where('tecnico_id', $tecnico->id)->get();
            $inquilinos = Inquilino::all();
            $propietarios = Propietario::all();
            return view('admin.solicitudes_servicio.main')
                ->with('tecnico',$tecnico)
                ->with('propietarios',$propietarios)
                ->with('inquilinos',$inquilinos)
                ->with('solicitudes_servicio',$ss);
        }
        #--si es algun solicitante de servicio (Propietario o Inquilino)
        if((Auth::user()->obtener_rol() == 'Propietario') || (Auth::user()->obtener_rol() == 'Inquilino')){
            $solicitudes_servicio = SolicitudServicio::all();
            $tecnicos = Tecnico::all();
            $inquilinos = Inquilino::all();
            $propietarios = Propietario::all();
            return view('admin.solicitudes_servicio.main')
                ->with('tecnicos',$tecnicos)
                ->with('propietarios',$propietarios)
                ->with('inquilinos',$inquilinos)
                ->with('solicitudes_servicio',$solicitudes_servicio);    
        }
                
    }

    public function bolsa_solicitudes(){
        #si no es un solicitante, redirigir a "Bolsa de Trabajo"   --este control podria n estar
        if((Auth::user()->obtener_rol() != 'Propietario') && (Auth::user()->obtener_rol() != 'Inquilino')){
            $solicitudes_servicio = SolicitudServicio::all();
            $tecnicos = Tecnico::all();
            $inquilinos = Inquilino::all();
            $propietarios = Propietario::all();
            return view('admin.solicitudes_servicio.bolsa')
                ->with('tecnicos',$tecnicos)
                ->with('propietarios',$propietarios)
                ->with('inquilinos',$inquilinos)
                ->with('solicitudes_servicio',$solicitudes_servicio);    
        }
    }


    public function create()
    {
     
    }
    
    public function tecnico_reserva(Request $request){
        $ss = SolicitudServicio::find($request->ss_id);
        $ss->estado = 'tomada';
        $ss->save();
        #Abrir canal comunicacion
        $conversacion = new Conversacion();
        $conversacion->save();
        #Ahora se crean "lineas" de conversacion individuales por cada interlocutor ↓
        $conversacion_x_usuario = new UserConversacion(); #mensajes de Tecnico
        $conversacion_x_usuario->conversacion_id = $conversacion->id;
        $conversacion_x_usuario->user_id = Auth::user()->id;
        $conversacion_x_usuario->save();
        $conversacion_x_usuario = new UserConversacion(); #mensajes de Solicitantes
        $conversacion_x_usuario->conversacion_id = $conversacion->id;
        $conversacion_x_usuario->user_id = $ss->solicitante()->persona->user->id;
        $conversacion_x_usuario->save();

        return response()->json(json_encode($request));
    }


    public function store(Request $request)
    {
        $solicitud = new SolicitudServicio();
        if(Auth::user()->persona->inquilino){   #--si usuario que crea solicitur es Inquilino
            $solicitud->responsable = 'inquilino';
            $solicitud->contrato_id = Auth::user()->persona->inquilino->ultimo_contrato_vigente()->id;
        }elseif(Auth::user()->persona->propietario){ #--si usuario que crea solicitur es Propietario
            $solicitud->responsable = 'propietario';
            $solicitud->contrato_id = $request->contrato_id;
        }
        $solicitud->tecnico_id = $request->tecnico_id;
        $solicitud->rubrotecnico_id = $request->rubrotecnico_id;
        //$solicitud->contrato_id = $request->contrato_id;         #resta mandarlo en la vista
        $solicitud->motivo = $request->titulo;
        $solicitud->fecha_inicio = $request->fecha_inicio;
        $solicitud->estado = "inicial";

        $solicitud->save();
        return view('admin.solicitudes_servicio.main');
    }

    public function marcar_ss_concluida(Request $request){
        $ss = SolicitudServicio::find($request->ss_id);
        $ss->estado = 'concluida';
        $ss->monto_final = $request->monto_total_solicitud;
        $ss->fecha_cierre = \Carbon\Carbon::now('America/Buenos_Aires');
        $ss->save();
        return response()->json("Se registro estado concluido satisfactoriamente.-");
    }
    public function calificar(Request $request){
        $ss = SolicitudServicio::find($request->ss_id);
        $ss->calificacion = $request->calificacion;
        $ss->save();
        return response()->json("Se registro estado concluido satisfactoriamente.-");
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
