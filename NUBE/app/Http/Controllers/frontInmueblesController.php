<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inmueble;
use App\Provincia;
use App\Localidad;
use App\Http\Controllers\Controller;

class frontInmueblesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {

        /*
         * Obtenemos todos los inmuebles disponibles y aplicamos los filtros
         */
        $inmuebles = Inmueble::where('disponible', '1');
        $parametros = array("orden" => $request->orden, "provincia_seleccionada" => "", "provincia_id" => $request->provincia_id, "tipo_id" => $request->tipo_id, "localidad_id" => $request->localidad_id, "condicion" => $request->condicion, "rango_precio" => $request->rango_precio);


        if ($request->provincia_id) {
            $parametros["provincia_seleccionada"] = Provincia::find($request->provincia_id);
            $localidades_array = Localidad::all()
                            ->where('provincia_id', $request->provincia_id)->pluck('id')->toArray();
            $inmuebles = $inmuebles->whereIn('localidad_id', $localidades_array);
        }

        if ($request->tipo_id) {
            $inmuebles = $inmuebles->where('tipo_id', $request->tipo_id);
        }

        if ($request->localidad_id) {
            $inmuebles = $inmuebles->where('localidad_id', $request->localidad_id);
        }

        if ($request->condicion) {

            $precio = explode(";", $request->rango_precio);
            $variable_para_el_orden = 'valorVenta';

            switch ($request->condicion) {
                case "alquiler":
                    $inmuebles = $inmuebles->where('condicion', $request->condicion)->where('valorAlquiler', '>=', $precio[0])->where('valorAlquiler', '<=', $precio[1]);
                    $variable_para_el_orden = 'valorAlquiler';
                    break;
                case "alquiler/venta":
                    $inmuebles = $inmuebles->where('valorAlquiler', '=>', $precio[0])->where('valorVenta', '<=', $precio[1]);
                    break;
                case "venta":
                    $inmuebles = $inmuebles->where('condicion', $request->condicion)->where('valorVenta', '>=', $precio[0])->where('valorVenta', '<=', $precio[1]);
                    break;
            }
            /*
             * Determinamos el orden de los a devolver
             */
            switch ($request->orden) {
                case "mb":
                    $inmuebles = $inmuebles->orderBy($variable_para_el_orden, 'ASC');
                    break;
                case "mc":
                    $inmuebles = $inmuebles->orderBy($variable_para_el_orden, 'DESC');
                    break;
                case "mr":
                    $inmuebles = $inmuebles->orderBy('id', 'DESC');
                    break;
            }
        } else {
            $inmuebles = $inmuebles->orderBy('id', 'DESC');
        }

        /*
         * Aplicamos la paginación
         */
        $inmuebles = $inmuebles->paginate(9);

        return view('front.listado.main')
                        ->with('inmuebles', $inmuebles)
                        ->with('parametros', $parametros);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $inmueble = Inmueble::find($id);                
        $inmuebles_similares = Inmueble::all()->where('localidad_id', $inmueble->localidad_id)->where('condicion', $inmueble->condicion)->take(3);                        
        return view('front.listado.show')->with('inmueble', $inmueble)->with('inmuebles_similares', $inmuebles_similares);
    }

}
