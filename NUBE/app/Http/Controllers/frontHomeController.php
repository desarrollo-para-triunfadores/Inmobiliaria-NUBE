<?php

namespace App\Http\Controllers;

use App\ImagenInmueble;
use App\Inmueble;
use App\Proyecto;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class frontHomeController extends Controller
{
    public function index()
    {
        //$inmuebles = Inmueble::all();
        $inmuebles = Inmueble::where('disponible','1')->get();
        $proyectos = Proyecto::all();
        $imagenesInmuebles = ImagenInmueble::all();
        return view('front.partes.index')->with('inmuebles', $inmuebles)
                                         ->with('proyectos', $proyectos)
                                         ->with('imagenesInmuebles', $imagenesInmuebles);
    }

    /*
    public function mantenimiento()
    {
        Flash::overlay('Bien! su mensaje se envio correctamente');
        return Redirect::to('/');
    }
    */
}
