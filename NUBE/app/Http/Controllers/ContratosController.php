<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ImagenInmueble;
use App\Inmueble;
use App\Garante;
use App\Persona;
use App\Contrato;
use App\Inquilino;
use App\PeriodoContrato;
use App\Pais;
use App\Localidad;
use App\Servicio;
use App\ServicioContrato;
use App\Oportunidad;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Mockery\CountValidator\Exception;
use Session;

class ContratosController extends Controller
{

    public function __construct()
    {
        Carbon::setlocale('es'); // Instancio en Español el manejador de fechas de Laravel
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contratos = Contrato::all();
        return view('admin.contratos.main')->with('contratos', $contratos);
    }

    public function create()
    {
        $garantes = Garante::all();
        $inquilinos = Inquilino::all();
        $inmuebles = Inmueble::where('disponible', 'si')->get();
        $paises = Pais::all();
        $localidades = Localidad::all();
        $servicios = Servicio::all();

        return view('admin.contratos.formulario.create')
            ->with('paises', $paises)
            ->with('localidades', $localidades)
            ->with('garantes', $garantes)
            ->with('inquilinos', $inquilinos)
            ->with('servicios', $servicios)
            ->with('inmuebles', $inmuebles);
    }


    public function store(Request $request)
    {
        $contrato = new Contrato($request->all());
        /*** Datos del Inquilino ** */
        if (!is_null($request->inquilino_nuevo)) {     //*si no se recibe una persona asignada como propietario, crear una
            $nombreImagen = 'sin imagen';
            if ($request->file('imagen')) {
                $file = $request->file('imagen');
                $nombreImagen = 'persona_' . time() . '.' . $file->getClientOriginalExtension();
                Storage::disk('personas')->put($nombreImagen, \File::get($file));
            }
            /* datos de persona */
            $persona = new Persona($request->all());
            $persona->foto_perfil = $nombreImagen;
            $persona->save();
            /* datos de propietario */
            $inquilino = new Inquilino($request->all());
            $inquilino->persona_id = $persona->id;
            $inquilino->save();
            $contrato->inquilino_id = $inquilino->id;
        }
        /*         * * Datos del Garante ** */
        if (!is_null($request->inquilino_nuevo)) {     //*si no se recibe una persona asignada como propietario, crear una
            $nombreImagen = 'sin imagen';
            if ($request->file('imagen2')) {
                $file = $request->file('imagen2');
                $nombreImagen = 'persona_' . time() . '.' . $file->getClientOriginalExtension();
                Storage::disk('personas')->put($nombreImagen, \File::get($file));
            }
            /* datos de persona */
            $persona = new Persona($request->all());
            $persona->nombre = $request->garante_nombre;
            $persona->apellido = $request->garante_apellido;
            $persona->dni = $request->garante_dni;
            $persona->sexo = $request->garante_sexo;
            $persona->fecha_nac = $request->garante_fecha_nac;
            $persona->telefono = $request->garante_telefono;
            $persona->telefono_contacto = $request->garante_telefono_contacto;
            $persona->descripcion = $request->garante_descripcion;
            $persona->email = $request->garante_email;
            $persona->localidad_id = $request->garante_localidad_id;
            $persona->direccion = $request->garante_direccion;
            $persona->pais_id = $request->garante_pais_id;
            $persona->foto_perfil = $nombreImagen;
            $persona->save();
            /* datos de garante */
            $garante = new Garante($request->all());
            $garante->persona_id = $persona->id;
            $garante->save();
            $contrato->garante_id = $garante->id;
        }


        //si se cargó una fecha de vencimiento se formatea para guardar en la base
        $fecha_desde = str_replace('/', '-', $request->fecha_desde);
        $contrato->fecha_desde = date('Y-m-d', strtotime($fecha_desde));

        $fecha_hasta = str_replace('/', '-', $request->fecha_hasta);
        $contrato->fecha_hasta = date('Y-m-d', strtotime($fecha_hasta));


        $contrato->save();

        /*** Periodos pagos contrato ** */

        $periodos = json_decode($request->periodos_pagos, true);

        foreach ($periodos as $dato) {
            $periodo = new PeriodoContrato();
            $periodo->contrato_id = $contrato->id;
            $periodo->inicio_periodo = $dato["inicio_periodo"];
            $periodo->fin_periodo =$dato["fin_periodo"];
            $periodo->monto_fijo =$dato["monto_fijo"];
            $periodo->monto_incremental = $dato["monto_incremental"];
            $periodo->save();
        }


        /*** Servicios del Inmueble ** */
        $cantidad_servicios = (int) $request->cantidad_servicios;
        for ($i = 1; $i <= $cantidad_servicios; $i++) {
            $servicio = new ServicioContrato();
            $servicio->servicio_id = $request["servicio" . $i];
            $servicio->contrato_id = $contrato->id;
            $servicio->save();
        }

        $inmueble = Inmueble::find($request->inmueble_id);
        $inmueble->disponible = null;
        $inmueble->save();

        /*** Envio de EMAIL a interesados en el inmueble, notificacion de que inmueble se alquilo (capturados desde la Oportunidad) **/
        /*  $oportunidades = Oportunidad::where('inmueble_id', $contrato->inmueble_id)->get();
          if ($oportunidades != null) {
              foreach ($oportunidades as $oportunidad) {
                  try {
                      Mail::send('emails.email_inmuebleYaNoDisponible', $request->all(), function ($msj) {
                          $msj->subject('Mensaje de agente desde www.InmobiliariaNube.com'); # por inmueble de '.$oportunidad->inmueble->direccion);
                          $msj->to('jpaulnava@gmail.com'); #reemplazar por →→→   $msj->to('$oportunidad->email');
                      });
                      return response()->json(json_encode("Se envio email para notificar a cliente que inmueble ya no esta disponible", true));
                  } catch (Exception $e) {
                      $respuesta = array("excepcion" => $e);
                      return response()->json(json_encode($respuesta, true));
                  }
              }
          }*/

        /* *********************************** -Email************************************ */

        /*    $oportunidades = Oportunidad::where('inmueble_id', $request->inmueble_id)->orderBy('id', 'desc')->get();

            foreach ($oportunidades as $oportunidad) {
                $oportunidad->estado_id = null; //este valor hay que cambiarlo por otro después. Según la lógica debería existir en la base de datos un valor que simbolice a las oportunidades que fueron desafectadas.
                $oportunidad->save();
            }*/

        return response()->json('ok');
    }

    public function show($id)
    {
        $contrato= Contrato::find($id);
        $garante = $contrato->garante;
        $inquilino = $contrato->inquilino;
        $inmuebles = $contrato->inmueble;

        return view('admin.contratos.formulario.show')
            ->with('inquilinos', $inquilino)
            ->with('inmuebles', $inmuebles)
            ->with('garantes', $garante)
            ->with('contrato', $contrato);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
    }

    public function destroy($id)
    {
        $inmueble = Inmueble::find($id);
        $inmueble->delete();
        Session::flash('message $persona->El inmueble ha sido eliminado del sistema');
        return redirect()->route('inmueble.index');
    }
}
