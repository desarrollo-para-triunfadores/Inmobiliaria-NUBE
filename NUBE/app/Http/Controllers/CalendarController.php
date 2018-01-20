<?php
namespace App\Http\Controllers;
use App\Visita;
use Illuminate\Http\Request;
use App\Http\Requests;
class CalendarController extends Controller
{
    public function index(Request $request) {
        /**sacado de video de YouTube*/
        $data = array(); //declaramos un array principal que va contener los datos
        $id = Visita::all()->pluck('id'); //listamos todos los id de los eventos
        $titulo = Visita::all()->pluck('titulo'); //lo mismo para lugar y fecha
        $fechaIni = Visita::all()->pluck('inicio');
        $fechaFin = Visita::all()->pluck('fin');
        $allDay = Visita::all()->pluck('allDay');
        $background = Visita::all()->pluck('color');
        $borde = null;
        $count = count($id); //contamos los ids obtenidos para saber el numero exacto de eventos

        //hacemos un ciclo para anidar los valores obtenidos a nuestro array principal $data
        for($i=0; $i<$count; $i++){
            $data[$i] = array(
                "title"=>$titulo[$i], //obligatoriamente "title", "start" y "url" son campos requeridos
                "start"=>$fechaIni[$i], //por el plugin asi que asignamos a cada uno el valor correspondiente
                "end"=>$fechaFin[$i],
                "allDay"=>$allDay[$i],
                "backgroundColor"=>$background[$i],
                "borderColor"=>$borde[$i],
                "id"=>$id[$i],
                //"url"=>"cargaEventos".$id[$i]
                //en el campo "url" concatenamos el el URL con el id del evento para luego
                //en el evento onclick de JS hacer referencia a este y usar el método show
                //para mostrar los datos completos de un evento
            );
        }
        json_encode($data); //convertimos el array principal $data a un objeto Json
        return $data; //para luego retornarlo y estar listo para consumirlo
    }



    public function create(){
        //Valores recibidos via ajax
        $title = $_POST['title'];
        $start = $_POST['start'];
        $back = $_POST['background'];
        //Insertando evento a base de datos
        $evento=new Visita();
        $evento->fechaIni=$start;
        //$evento->fechaFin=$end;
        $evento->todoeldia=true;
        $evento->color=$back;
        $evento->titulo=$title;
        $evento->save();
    }
    public function update(){
        //Valores recibidos via ajax
        $id = $_POST['id'];
        $title = $_POST['title'];
        $start = $_POST['start'];
        $end = $_POST['end'];
        $allDay = $_POST['allday'];
        $back = $_POST['background'];
        $evento=Visita::find($id);
        if($end=='NULL'){
            $evento->fechaFin=NULL;
        }else{
            $evento->fechaFin=$end;
        }
        $evento->fechaIni=$start;
        $evento->todoeldia=$allDay;
        $evento->color=$back;
        $evento->titulo=$title;
        //$evento->fechaFin=$end;
        $evento->save();
    }
    public function delete(){
        //Valor id recibidos via ajax
        $id = $_POST['id'];
        Visita::destroy($id);
    }
}