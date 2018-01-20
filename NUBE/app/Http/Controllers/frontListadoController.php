<?php

namespace App\Http\Controllers;

use App\ImagenInmueble;
use App\Inmueble;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class frontListadoController extends Controller
{
    public function index()
    {
        $inmuebles = Inmueble::all();
        $imagenesInmuebles = ImagenInmueble::all();
        return view('front.listado.index')
            ->with('inmuebles', $inmuebles)
            ->with('imagenesInmuebles', $imagenesInmuebles);
    }



    public function show($id)
    {

    }
}
