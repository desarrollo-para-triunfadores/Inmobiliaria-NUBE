<legend>Fotografías</legend>
<br>
<h3>Fotografías de presentación y carrusel</h3>
<br>
<div class="row">                                           
    <div class="col-md-12">
        <div class="control-group">
            <label>Foto de presentación:</label>
            <div class="controls">
                <img id="main-cropper-foto_presentacion">
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
<div class="row">     
    <div class="col-md-6">
        <div class="control-group">
            <br>
            <label>Foto de carrusel:</label>
            <div class="controls">
                <img id="main-cropper-foto-carrusel-1">
            </div>
            <div class="controls">
                <a class="button actionUpload-fotografias-nuevo">                   
                    <input type="file" id="foto-carrusel-1" value="Escoja una imagen" accept="image/*">
                </a>                       
                <small class="form-text text-muted"><strong>Información:</strong> si no escoge una imagen nueva se utilizará una imagen prestablecida.</small>
            </div>
        </div> 
    </div>
    {{--
    <div class="col-md-6">
        <div class="control-group">
            <br>
            <label>Foto de carrusel 2:</label>
            <div class="controls">
                <img id="main-cropper-foto-carrusel-2">
            </div>
            <div class="controls">
                <a class="button actionUpload-fotografias-nuevo">                   
                    <input type="file" id="foto-carrusel-2" value="Escoja una imagen" accept="image/*">
                </a>                       
                <small class="form-text text-muted"><strong>Información:</strong> si no escoge una imagen nueva se utilizará una imagen prestablecida.</small>
            </div>
        </div> 
    </div>  
    <div class="col-md-6">
        <div class="control-group">
            <br>
            <label>Foto de carrusel 3:</label>
            <div class="controls">
                <img id="main-cropper-foto-carrusel-3">
            </div>
            <div class="controls">
                <a class="button actionUpload-fotografias-nuevo">                   
                    <input type="file" id="foto-carrusel-3" value="Escoja una imagen" accept="image/*">
                </a>                       
                <small class="form-text text-muted"><strong>Información:</strong> si no escoge una imagen nueva se utilizará una imagen prestablecida.</small>
            </div>
        </div> 
    </div> 
    <div class="col-md-6">
        <div class="control-group">
            <br>
            <label>Foto de carrusel 4:</label>
            <div class="controls">
                <img id="main-cropper-foto-carrusel-4">
            </div>
            <div class="controls">
                <a class="button actionUpload-fotografias-nuevo">                   
                    <input type="file" id="foto-carrusel-4" value="Escoja una imagen" accept="image/*">
                </a>                       
                <small class="form-text text-muted"><strong>Información:</strong> si no escoge una imagen nueva se utilizará una imagen prestablecida.</small>
            </div>
        </div> 
    </div>  
    <div class="col-md-6">
        <div class="control-group">
            <br>
            <label>Foto de carrusel 5:</label>
            <div class="controls">
                <img id="main-cropper-foto-carrusel-5">
            </div>
            <div class="controls">                
                <a class="button actionUpload-fotografias-nuevo">                   
                    <input type="file" id="foto-carrusel-5" value="Escoja una imagen" accept="image/*">
                </a>                       
                <small class="form-text text-muted"><strong>Información:</strong> si no escoge una imagen nueva se utilizará una imagen prestablecida.</small>
            </div>
        </div> 
    </div>
    --}}
</div>
<br>
<br>
<hr/>  
<br>
<h3>Fotografías de detalle</h3>
<br>
<div class="row">                                          
    <div class="col-md-6">
        <div class="control-group">
            <label>Ambiente 1:</label>
            <div class="controls">
                <select style="width: 100%"  name="ambiente1" onchange="habilitar_foto('foto-detalle-1');" title="ambiente al que corresponde la fotografía" class="select2 form-control">
                    <option value=""></option>
                    @foreach($espacios as $espacio)
                    <option value="{{$espacio->id}}">{{$espacio->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div> 
    </div>  
    <div class="col-md-6">
        <div class="control-group">
            <label>Ambiente 2:</label>
            <div class="controls">
                <select style="width: 100%"  name="ambiente2" onchange="habilitar_foto('foto-detalle-2');" title="ambiente al que corresponde la fotografía" class="select2 form-control">
                    <option value=""></option>
                    @foreach($espacios as $espacio)
                    <option value="{{$espacio->id}}">{{$espacio->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div> 
    </div> 
</div> 
<br>
<div class="row">    
    <div class="col-md-6">
        <div class="control-group">
            <label>Foto de detalle del ambiente 1:</label>
            <div class="controls">
                <img id="main-cropper-foto-detalle-1">
            </div>
            <div class="controls">                
                <a class="button actionUpload-fotografias-nuevo">                   
                    <input type="file" id="foto-detalle-1" value="Escoja una imagen" disabled accept="image/*">
                </a>                       
                <small class="form-text text-muted"><strong>Información:</strong> si no escoge una imagen nueva se utilizará una imagen prestablecida.</small>
            </div>
        </div> 
    </div>  
    <div class="col-md-6">
        <div class="control-group">
            <label>Foto de detalle del ambiente 2:</label>
            <div class="controls">
                <img id="main-cropper-foto-detalle-2">
            </div>
            <div class="controls">                
                <a class="button actionUpload-fotografias-nuevo">                   
                    <input type="file" id="foto-detalle-2" value="Escoja una imagen" disabled accept="image/*">
                </a>                       
                <small class="form-text text-muted"><strong>Información:</strong> si no escoge una imagen nueva se utilizará una imagen prestablecida.</small>
            </div>
        </div> 

    </div> 
</div>
<br>
<div class="row">                                           
    <div class="col-md-6">
        <hr> 
    </div>
    <div class="col-md-6">
        <hr> 
    </div>
</div>
<br>
<div class="row">                                          

    <div class="col-md-6">
        <div class="control-group">
            <label>Ambiente 3:</label>
            <div class="controls">
                <select style="width: 100%"  name="ambiente3" onchange="habilitar_foto('foto-detalle-3');" title="ambiente al que corresponde la fotografía" class="select2 form-control">
                    <option value=""></option>
                    @foreach($espacios as $espacio)
                    <option value="{{$espacio->id}}">{{$espacio->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div> 

    </div>  
    <div class="col-md-6">
        <div class="control-group">
            <label>Ambiente 4:</label>
            <div class="controls">
                <select style="width: 100%"  name="ambiente4" onchange="habilitar_foto('foto-detalle-4');" title="ambiente al que corresponde la fotografía" class="select2 form-control">
                    <option value=""></option>
                    @foreach($espacios as $espacio)
                    <option value="{{$espacio->id}}">{{$espacio->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div> 

    </div> 
</div> 
<br>
<div class="row">                                           
    <div class="col-md-6">
        <div class="control-group">
            <label>Foto de detalle del ambiente 3:</label>
            <div class="controls">
                <img id="main-cropper-foto-detalle-3">
            </div>
            <div class="controls">                
                <a class="button actionUpload-fotografias-nuevo">                   
                    <input type="file" id="foto-detalle-3" disabled value="Escoja una imagen" accept="image/*">
                </a>                       
                <small class="form-text text-muted"><strong>Información:</strong> si no escoge una imagen nueva se utilizará una imagen prestablecida.</small>
            </div>
        </div> 
    </div>  
    <div class="col-md-6">
        <div class="control-group">
            <label>Foto de detalle del ambiente 4:</label>
            <div class="controls">
                <img id="main-cropper-foto-detalle-4">
            </div>
            <div class="controls">                
                <a class="button actionUpload-fotografias-nuevo">                   
                    <input type="file" id="foto-detalle-4" disabled value="Escoja una imagen" accept="image/*">
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
<h3>Fotografías de planos</h3>
<br>
<div class="row">                                           

    <div class="col-md-6">
        <div class="control-group">
            <label>Plano 1:</label>
            <div class="controls">
                <img id="main-cropper-foto-plano-1">
            </div>
            <div class="controls">                
                <a class="button actionUpload-fotografias-nuevo">                   
                    <input type="file" id="foto-plano-1" value="Escoja una imagen" accept="image/*">
                </a>                       
                <small class="form-text text-muted"><strong>Información:</strong> si no escoge una imagen nueva se utilizará una imagen prestablecida.</small>
            </div>
        </div> 
    </div>  
    <div class="col-md-6">
        <div class="control-group">
            <label>Plano 2:</label>
            <div class="controls">
                <img id="main-cropper-foto-plano-2">
            </div>
            <div class="controls">                
                <a class="button actionUpload-fotografias-nuevo">                   
                    <input type="file" id="foto-plano-2" value="Escoja una imagen" accept="image/*">
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