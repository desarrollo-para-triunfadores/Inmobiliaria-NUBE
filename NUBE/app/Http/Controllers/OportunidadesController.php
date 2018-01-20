<?php

namespace App\Http\Controllers;

use App\Estado_Oportunidad;
use App\Historia_Oportunidad;
use App\Oportunidad;
use App\Visita;
use Illuminate\Http\Request;
use Session;
use Laracasts\Flash\Flash;

class OportunidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->traer_data_historias){
            $historias_oportunidad = Historia_Oportunidad::where('oportunidad_id',$request->oportunidad_id)->get();
            return response()->json(json_encode($historias_oportunidad, true));
        }
        else if($request->traer_data_oportunidad){
            $oportunidad = Oportunidad::find($request->oportunidad_id);
            $visitas = Visita::where('oportunidad_id',$request->oportunidad_id);
            $cantidad_visitas = $visitas->count();
            $datos_oportunidad = array("nombre_interesado" => $oportunidad->nombre_interesado, "email" => $oportunidad->email,
                "cantidad_visitas" => $cantidad_visitas);
            return response()->json(json_encode($datos_oportunidad, true));
        }
        else{
        //Para abrir vista oportunidades
            $oportunidades = Oportunidad::all();
            $estados_oportunidades = Estado_Oportunidad::all();
            return view('admin.oportunidades.main')
                ->with('estados_oportunidades', $estados_oportunidades)
                ->with('oportunidades', $oportunidades);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->ajax()){
            $oportunidad = new Oportunidad();
            $oportunidad->inmueble_id = $request->inmueble_id;
            $oportunidad->mensaje = $request->mensaje;
            $oportunidad->nombre_interesado = $request->nombre;
            $oportunidad->email = $request->email;
            $oportunidad->estado_id = 1;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $oportunidad = Oportunidad::find($id);
        $oportunidad->fill($request->all());
        $oportunidad->save();
        //añadir historia (si se actualizo)
        if(($request->tipo_historia_oportunidad) && ($request->detalle_historia_oportunidad) /*&& ($request->fecha_historia_oportunidad)*/){
            $historia = new Historia_Oportunidad();
            $historia->oportunidad_id = $id;
            $historia->fecha = $request->fecha;
            $historia->titulo = $request->tipo_historia_oportunidad;
            $historia->detalle = $request->detalle_historia_oportunidad;

            //$historia->fecha = $request->fecha_historia_oportunidad;
            $historia->save();
        }
        Session::flash('message', '¡Se ha actualizado la información de la oportunidad');
        return redirect()->route('oportunidades.index');
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
