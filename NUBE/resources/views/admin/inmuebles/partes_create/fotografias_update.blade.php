<legend>Fotografías</legend>
<br>
<h3>Fotografía de presentación</h3>
<br>
<div class="row">                                           



    <div class="col-md-12">
        <div class="control-group">
            <label>Foto de presentación:</label>
            <div class="controls">
                <img id="main-cropper-foto_presentacion" src="{{ asset('imagenes/inmuebles/' . $imagen_portada->nombre) }}">
            </div>
            <div class="controls">                
                <a class="button actionUpload-fotografias-nuevo">                   
                    <input type="file" id="foto_presentacion" value="Escoja una imagen" accept="image/*">
                </a>                       
                <small class="form-text text-muted"><strong>Información:</strong> si no escoge una imagen nueva se utilizará una imagen prestablecida.</small>
            </div>
        </div> 
    </div> 

</div>
<br>
<br>
<hr/>  
<br>
<h3>Fotografías de carrusel</h3>
<br>
<div class="row">  

    @foreach($imagenes_carrusel as $imagen)

    <div class="col-md-6">
        <div class="control-group">
            <br>
            <label>Foto de carrusel {{$imagen["indice"]}}:</label>
            <div class="controls">
                <img id="main-cropper-foto-carrusel-{{$imagen["indice"]}}" src="{{ asset('imagenes/inmuebles/' . $imagen["imagen"]["nombre"]) }}">
            </div>
            <div class="controls">
                <a class="button actionUpload-fotografias-nuevo">                   
                    <input type="file" id="foto-carrusel-{{$imagen["indice"]}}" value="Escoja una imagen" accept="image/*">
                </a>                       
                <small class="form-text text-muted"><strong>Información:</strong> si no escoge una imagen nueva se utilizará una imagen prestablecida.</small>
            </div>
        </div> 
    </div> 

    @endforeach



</div>
<br>
<br>
<hr/>  
<br>
<h3>Fotografías de detalle</h3>
<br>
<div class="row">      


    @foreach($imagenes_detalle as $imagen)
    <div class="col-md-6">
        <div class="control-group">
            <label>Ambiente {{$imagen["indice"]}}:</label>
            <div class="controls">
                <select style="width: 100%"  name="ambiente{{$imagen["indice"]}}" onchange="habilitar_foto('foto-detalle-1');" title="ambiente al que corresponde la fotografía" class="select2 form-control">
                    <option value=""></option>
                    @foreach($espacios as $espacio)
                    @if ($espacio->id == $imagen["imagen"]["espacio_id"])
                    <option selected value="{{$espacio->id}}">{{$espacio->nombre}}</option>
                    @else
                    <option value="{{$espacio->id}}">{{$espacio->nombre}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
        </div>         
        <div class="control-group">
            <br>
            <label>Foto de detalle {{$imagen["indice"]}}:</label>
            <div class="controls">
                <img id="main-cropper-foto-detalle-{{$imagen["indice"]}}" src="{{ asset('imagenes/inmuebles/' . $imagen["imagen"]["nombre"]) }}">
            </div>
            <div class="controls">
                <a class="button actionUpload-fotografias-nuevo">                   
                    <input type="file" id="foto-detalle-{{$imagen["indice"]}}" value="Escoja una imagen" accept="image/*">
                </a>                       
                <small class="form-text text-muted"><strong>Información:</strong> si no escoge una imagen nueva se utilizará una imagen prestablecida.</small>
            </div>
        </div> 
        <br><br>
    </div> 
    @endforeach

</div> 

<hr/>  
<br>
<h3>Fotografías de planos</h3>
<br>
<div class="row">                                           

    @foreach($imagenes_planos as $imagen)

    <div class="col-md-6">
        <div class="control-group">
            <label>Plano {{$imagen["indice"]}}:</label>
            <div class="controls">
                <img id="main-cropper-foto-plano-{{$imagen["indice"]}}" src="{{ asset('imagenes/inmuebles/' . $imagen["imagen"]["nombre"]) }}">
            </div>
            <div class="controls">                
                <a class="button actionUpload-fotografias-nuevo">                   
                    <input type="file" id="foto-plano-{{$imagen["indice"]}}" value="Escoja una imagen" accept="image/*">
                </a>                       
                <small class="form-text text-muted"><strong>Información:</strong> si no escoge una imagen nueva se utilizará una imagen prestablecida.</small>
            </div>
        </div> 
    </div>  

    @endforeach




</div>
<br>
<br>
<hr/>  
<br>
<h3>Otros</h3>
<br>
<div class="row">                                           
    <div class="col-md-12">
        <div class="control-group">
            <label>Link del video:</label>
            <div class="controls">
                <div class="input-group">
                    <input name="linkVideo" type="url" class="form-control" placeholder="campo requerido"> 
                    <span class="input-group-addon"><i class="fa fa-youtube-play" aria-hidden="true"></i></span>                                                                                                 
                </div>               
            </div>
        </div>
    </div>  
</div>
<br>