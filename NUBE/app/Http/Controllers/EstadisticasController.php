<?php

namespace App\Http\Controllers;

use App\Inmueble;
use App\Inquilino;
use App\Localidad;
use App\Movimiento;
use App\Pais;
use App\Servicio;
use Illuminate\Http\Request;

class EstadisticasController extends Controller
{

    public function index()
    {
        $inquilinos = Inquilino::all();
        $inmuebles = Inmueble::all();
        $paises = Pais::all();
        $localidades = Localidad::all();
        $servicios = Servicio::all();
        $movimientos = Movimiento::all();


        return view('admin.contabilidad.main')
            ->with('servicios', $servicios)
            ->with('movimientos', $movimientos)
            ->with('inquilinos', $inquilinos)
            ->with('paises', $paises)
            ->with('inmuebles', $inmuebles)
            ->with('localidades', $localidades); // se devuelven los registros;
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $inquilino = Inquilino::find($id);
        $movimientos = Movimiento::where('inquilino_id' , $id)->get();
        $servicios = Servicio::all();

        return view('admin.contabilidad.cuentas.main')
            ->with('inquilino',$inquilino)
            ->with('servicios',$servicios)
            ->with('movimientos', $movimientos);
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
