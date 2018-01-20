<?php

namespace App\Http\Controllers;

use App\Estado_Oportunidad;
use App\Historia_Oportunidad;
use App\Oportunidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Session;
use Laracasts\Flash\Flash;

use App\Http\Requests;
use Storage;

class Mail_Contacto_OportunidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            if($request->email_a_interesado==true){ //email desde sistama ? a interesado en inmueble
                $nombreArchivo = null;
                if ($request->file('adjunto')) {
                    $file = $request->file('adjunto');
                    $nombreArchivo = 'adjunto_' . time() . '.' . $file->getClientOriginalExtension();
                    Storage::disk('files')->put($nombreArchivo, \File::get($file));
                }

                // Se añade el email a la historia de la Oportunidad
                $historia = new Historia_Oportunidad();
                $historia->titulo = 'Envio de email desde sistema';
                $historia->detalle = 'Mensaje: '.$request->mensaje;
                $historia->oportunidad_id = $request->oportunidad_id;
                $historia->save();
                //--------------------------------------------------
                try{
                    Mail::send('emails.admin_a_interesado', $request->all(), function($msj){
                        $msj->subject('Mensaje de agente desde www.InmobiliariaNube.com');
                        $msj->attach('files/Plano.jpg'/*.$nombreArchivo*/);
                        $msj->to('jpaulnava@gmail.com');
                    });
                    return response()->json(json_encode("Se envio el email del pedido", true));
                }catch (Exception $e){
                    $respuesta = array("excepcion"=>$e);
                    return response()->json(json_encode($respuesta, true));
                }
            }
        }
    }

    public function crear()
    {
        return view("admin/oportunidades/email");
    }

    /**
     * Almacena un archivo en sistema
     * para luego ser enviado como adjunto en email
     */
    public function store(Request $request)
    {
        if($request->hasFile('file') ){

            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $nombre=$file->getClientOriginalName();
            $r= Storage::disk('files')->put($nombre,  \File::get($file));       //'files' esta configurado como carpeta en config/filesystem.php
        }
        else{
            return "no";
        }

        if($r){
            return $nombre ;
        }
        else
        {
            return "error vuelva a intentarlo";
        }
    }

    public function enviar(Request $request)
    {
        $pathToFile="";
        $containfile=false;
        if($request->hasFile('file') ){
            $containfile=true;
            $file = $request->file('file');
            $nombre=$file->getClientOriginalName();
            $pathToFile= realpath(('files') ."/".$nombre);   //en la carpeta 'files' se guardo anteriormente nuestro adjunto (func. store)
        }
        $destinatario = $request->input("destinatario");
        $asunto = $request->input("asunto");
        $mensaje = $request->input("mensaje");

        $data = array('mensaje' => $mensaje);   //texto que se pasa a ? emails/plantlla_correo.blade.php
        $r= Mail::send('emails.plantilla_correo', $data, function ($message) use ($asunto,$destinatario,  $containfile,$pathToFile) {
            $message->from('nube.gerencia@gmail.com', 'Inmobiliaria Nube');
            $message->to('jpaulnava@gmail.com')->subject('Mensaje de agente desde www.InmobiliariaNube.com');
            if($containfile){
                $message->attach($pathToFile);
            }
        });

        if($r){
            if($containfile){ Storage::disk('local')->delete($nombre); }
            return view("emails.msj_correcto")->with("msj","Correo Enviado correctamente ?");
        }
        else
        {
            return view("emails.msj_rechazado")->with("msj","hubo un error vuelva a intentarlo");
        }
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
