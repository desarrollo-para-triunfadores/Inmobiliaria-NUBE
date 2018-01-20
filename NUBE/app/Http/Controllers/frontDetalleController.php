<?php

namespace App\Http\Controllers;

use App\ImagenInmueble;
use App\Inmueble;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class frontDetalleController extends Controller
{
    public function index()
    {
    }

    public function show($id)
    {
        $inmueble = Inmueble::find($id);
        $imagenesInmueble = ImagenInmueble::where('inmueble_id',$id)->get();
        return view('front.detalle.index')
            ->with('inmueble', $inmueble)
            ->with('imagenesInmueble', $imagenesInmueble);
    }
}
