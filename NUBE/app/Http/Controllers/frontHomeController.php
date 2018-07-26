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
        return view('front.inicio.main')->with('inmuebles', $inmuebles)
                                        ->with('proyectos', $proyectos)
                                        ->with('imagenesInmuebles', $imagenesInmuebles);
    }


    public function comoFunciona()
    {
//       // return view('front.comofunciona.index');
        return view('front.comofunciona.main');
    }
}
