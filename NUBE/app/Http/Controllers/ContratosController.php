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
        $garantes = Persona::all();

        /*Obtenemos los contratos vigentes para obtener el listado de inquilinos activos y excluirlos de la lista de candidatos a inquilino*/
        $fecha_hoy = Carbon::now();
        $contratos_vigentes = Contrato::all()->where('fecha_hasta', '>', $fecha_hoy);
        $inquilinos_activos = $contratos_vigentes->pluck('inquilino_id')->toArray();
        $inquilinos_potenciales = Persona::all()->whereNotIn('id', $inquilinos_activos);

        $inmuebles_disponibles = Inmueble::all()->where('condicion', '<>', 'venta')->where('disponible', '1');
        $departamentos = $inmuebles_disponibles->where('tipo_id', '1');
        $casas = $inmuebles_disponibles->where('tipo_id', '2');
        
        $paises = Pais::all();
        $localidades = Localidad::all();
        $servicios = Servicio::all();



        return view('admin.contratos.formulario.create')
            ->with('paises', $paises)
            ->with('localidades', $localidades)
            ->with('garantes', $garantes)
            ->with('personas', $inquilinos_potenciales)
            ->with('servicios', $servicios)
            ->with('departamentos', $departamentos)
            ->with('casas', $casas);
    }


    public function store(Request $request)
    {

        $contrato = new Contrato($request->all());
      
        /*---------------------INICIO DATOS INQUILINO-------------------*/
        if (is_null($request->inquilino_id)) {     //*si no se recibe un inquilino, crear uno

            $nombreImagen = 'sin imagen';
            if ($request->file('imagen')) {
                $file = $request->file('imagen');
                $nombreImagen = 'persona_' . time() . '.png';
                Storage::disk('personas')->put($nombreImagen, \File::get($file));
            }

            $persona = new Persona($request->all());
            $persona->foto_perfil = $nombreImagen;
            $persona->save();
            $inquilino = new Inquilino();
            $inquilino->persona_id = $persona->id;
            $inquilino->save();
            $contrato->inquilino_id = $inquilino->id;
        } else {
            $persona = Persona::find($request->inquilino_id);


            if (isset($persona->inquilino->id)) {
                $contrato->inquilino_id = $persona->inquilino->id;
            } else {
                $inquilino = new Inquilino();
                $inquilino->persona_id = $persona->id;
                $inquilino->save();
                $contrato->inquilino_id = $inquilino->id;
            }         
        }  
        /*---------------------FIN DATOS INQUILINO-------------------*/    
        /*---------------------INICIO DATOS GARANTE-------------------*/
        if (is_null($request->garante_id)) {     //*si no se recibe una persona asignada como garante, crear una

            $nombreImagen = 'sin imagen';
            if ($request->file('imagen2')) {
                $file = $request->file('imagen2');
                $nombreImagen = 'persona_' . time() . '.png';
                Storage::disk('personas')->put($nombreImagen, \File::get($file));
            }

            $persona = new Persona();
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

            $garante = new Garante();
            $garante->persona_id = $persona->id;
            $garante->save();
            $contrato->garante_id = $garante->id;
        } else {
            $persona = Persona::find($request->garante_id);


            if (isset($persona->garante->id)) {
                $contrato->garante_id = $persona->garante->id;            
            } else {
                $garante = new Garante();
                $garante->persona_id = $persona->id;
                $garante->save();
                $contrato->garante_id = $garante->id;
            }
        }                
        /*---------------------FIN DATOS GARANTE-------------------*/

        $contrato->save();
        
        /*---------------------INICIO DATOS PERIODOS-------------------*/

        $periodos = json_decode($request->periodos_pagos, true);

        foreach ($periodos as $dato) {
            $periodo = new PeriodoContrato();
            $periodo->contrato_id = $contrato->id;
            $periodo->inicio_periodo = $dato["inicio_periodo"];
            $periodo->fin_periodo = $dato["fin_periodo"];
            $periodo->monto_fijo = $dato["monto_fijo"];
            $periodo->monto_incremental = $dato["monto_incremental"];
            $periodo->save();
        }
        /*---------------------FIN DATOS PERIODOS-------------------*/
        /*---------------------INICIO DATOS SERVICIOS-------------------*/

        if ($request->servicios) {
            foreach ($request->servicios as $servicio) {
                $servicio_contrato = new ServicioContrato();
                $servicio_contrato->servicio_id = $servicio;
                $servicio_contrato->contrato_id = $contrato->id;
                $servicio_contrato->save();
            }

        }
        /*---------------------FIN DATOS SERVICIOS-------------------*/
        /*---------------------INICIO DATOS INMUEBLE-------------------*/

        $inmueble = Inmueble::find($request->inmueble_id);
        $inmueble->disponible = 0;
        $inmueble->save();

        /*---------------------INICIO ENVIO EMAIL-------------------*/

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

        /*---------------------FIN ENVIO EMAIL-------------------*/
        /*---------------------INICIO OPORTUNIDADES------------------*/
        /*    $oportunidades = Oportunidad::where('inmueble_id', $request->inmueble_id)->orderBy('id', 'desc')->get();

            foreach ($oportunidades as $oportunidad) {
                $oportunidad->estado_id = null; //este valor hay que cambiarlo por otro después. Según la lógica debería existir en la base de datos un valor que simbolice a las oportunidades que fueron desafectadas.
                $oportunidad->save();
            }*/
        /*---------------------FIN OPORTUNIDADES------------------*/
        return response()->json('ok');
    }

    public function show($id)
    {
        $contrato = Contrato::find($id);
        return view('admin.contratos.show')->with('contrato', $contrato);
    }

    public function edit($id)
    {
        $contrato = Contrato::find($id);
        $garantes = Persona::all()->where('id', '<>', $contrato->inquilino->persona->id);

        /*Obtenemos los contratos vigentes para obtener el listado de inquilinos activos y excluirlos de la lista de candidatos a inquilino*/
        $fecha_hoy = Carbon::now();
        $contratos_vigentes = Contrato::all()->where('id', '<>', $contrato->id)->where('fecha_hasta', '>', $fecha_hoy);
        $inquilinos_activos = $contratos_vigentes->pluck('inquilino_id')->toArray();
        $inquilinos_potenciales = Persona::all()->whereNotIn('id', $inquilinos_activos);

        $inmuebles_disponibles = $contratos_vigentes->pluck('inmueble_id')->toArray();
        $inmuebles_disponibles = Inmueble::all()->where('condicion', '<>', 'venta')->whereNotIn('id', $inmuebles_disponibles);
        $departamentos = $inmuebles_disponibles->where('tipo_id', '1');
        $casas = $inmuebles_disponibles->where('tipo_id', '2');
                
        
        $paises = Pais::all();
        $localidades = Localidad::all();
        $servicios = Servicio::all();

        return view('admin.contratos.formulario.edit')
            ->with('contrato', $contrato)
            ->with('paises', $paises)
            ->with('localidades', $localidades)
            ->with('garantes', $garantes)
            ->with('personas', $inquilinos_potenciales)
            ->with('servicios', $servicios)
            ->with('departamentos', $departamentos)
            ->with('casas', $casas);
    }

    public function update(Request $request, $id)
    {




        $contrato = Contrato::find($id);
        $contrato->fill($request->all());



        
          /*---------------------INICIO DATOS INQUILINO-------------------*/
          if (is_null($request->inquilino_id)) {     //*si no se recibe un inquilino, crear uno
  
              $nombreImagen = 'sin imagen';
              if ($request->file('imagen')) {
                  $file = $request->file('imagen');
                  $nombreImagen = 'persona_' . time() . '.png';
                  Storage::disk('personas')->put($nombreImagen, \File::get($file));
              }
  
              $persona = new Persona($request->all());
              $persona->foto_perfil = $nombreImagen;
              $persona->save();
              $inquilino = new Inquilino();
              $inquilino->persona_id = $persona->id;
              $inquilino->save();
              $contrato->inquilino_id = $inquilino->id;
          } else {
              $persona = Persona::find($request->inquilino_id);
              if (is_null($persona->inquilino())) {
                  $inquilino = new Inquilino();
                  $inquilino->persona_id = $persona->id;
                  $inquilino->save();
                  $contrato->inquilino_id = $inquilino->id;
              } else {
                  $contrato->inquilino_id = $persona->inquilino->id;
              }
          }  
          /*---------------------FIN DATOS INQUILINO-------------------*/    
          /*---------------------INICIO DATOS GARANTE-------------------*/
          if (is_null($request->garante_id)) {     //*si no se recibe una persona asignada como garante, crear una
  
              $nombreImagen = 'sin imagen';
              if ($request->file('imagen2')) {
                  $file = $request->file('imagen2');
                  $nombreImagen = 'persona_' . time() . '.png';
                  Storage::disk('personas')->put($nombreImagen, \File::get($file));
              }
  
              $persona = new Persona();
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
  
              $garante = new Garante();
              $garante->persona_id = $persona->id;
              $garante->save();
              $contrato->garante_id = $garante->id;
          } else {
              $persona = Persona::find($request->garante_id);
              if (is_null($persona->garante())) {
                  $garante = new Garante();
                  $garante->persona_id = $persona->id;
                  $garante->save();
                  $contrato->garante_id = $garante->id;
              } else {
                  $contrato->garante_id = $persona->garante->id;
              }
          }                
          /*---------------------FIN DATOS GARANTE-------------------*/
  
          $contrato->save();
          
          /*---------------------INICIO DATOS PERIODOS-------------------*/
  
          $periodos = json_decode($request->periodos_pagos, true);
          $contrato->eliminar_periodos();

          foreach ($periodos as $dato) {
              $periodo = new PeriodoContrato();
              $periodo->contrato_id = $contrato->id;
              $periodo->inicio_periodo = $dato["inicio_periodo"];
              $periodo->fin_periodo = $dato["fin_periodo"];
              $periodo->monto_fijo = $dato["monto_fijo"];
              $periodo->monto_incremental = $dato["monto_incremental"];
              $periodo->save();
          }
          /*---------------------FIN DATOS PERIODOS-------------------*/
          /*---------------------INICIO DATOS SERVICIOS-------------------*/
          $contrato->eliminar_servicios_contratos();

          if ($request->servicios) {
              foreach ($request->servicios as $servicio) {
                  $servicio_contrato = new ServicioContrato();
                  $servicio_contrato->servicio_id = $servicio;
                  $servicio_contrato->contrato_id = $contrato->id;
                  $servicio_contrato->save();
              }
  
          }
          /*---------------------FIN DATOS SERVICIOS-------------------*/
          /*---------------------INICIO DATOS INMUEBLE-------------------*/
  
          $inmueble = Inmueble::find($contrato->inmueble_id);
          $inmueble->disponible = 1;
          $inmueble->save();

          $inmueble = Inmueble::find($request->inmueble_id);
          $inmueble->disponible = 0;
          $inmueble->save();

          /*---------------------FIN DATOS INMUEBLE-------------------*/

          return response()->json('ok');
    }


    public function destroy($id)
    {
        $contrato = Contrato::find($id);
        $contrato->delete();
        Session::flash('message', 'El contrato ha sido eliminado del sistema');
        return redirect()->route('contratos.index');
    }
}
