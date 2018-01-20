<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactoFrontController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('front.contacto.index');
    }

    public function store(Request $request)     /**Para email de contacto desde el Front**/
    {
        dd($request);
        Mail::send('emails.contact', $request->all(), function($msj){
            $msj->subject('Correo de contacto');
            $msj->to('jpcaceres.nea@gmail.com');
        });

        Flash::overlay('Bien! su mensaje se envio correctamente');

        return Redirect::to('/');
    }
}
