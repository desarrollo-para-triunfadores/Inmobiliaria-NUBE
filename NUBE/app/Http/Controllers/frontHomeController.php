<?php

namespace App\Http\Controllers;

use App\ImagenInmueble;
use App\Inmueble;
use App\Provincia;
use App\Localidad;
use App\Proyecto;
use App\Tipo;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class frontHomeController extends Controller {

    public function index() {

 

        $proyectos = Proyecto::all();
        $imagenesInmuebles = ImagenInmueble::all();



        return view('front.inicio.main')
           
                        ->with('proyectos', $proyectos)
                        ->with('imagenesInmuebles', $imagenesInmuebles);
    }

    public function comoFunciona() {
//       // return view('front.comofunciona.index');
        return view('front.comofunciona.main');
    }

}
