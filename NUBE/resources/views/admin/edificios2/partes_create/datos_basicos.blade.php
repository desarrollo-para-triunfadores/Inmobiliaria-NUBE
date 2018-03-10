<legend>Datos básicos</legend>
<br>
<div class="row">
    <div class="col-md-6">
        <div class="row">          
            <div class="col-md-12">
                <div class="control-group">
                    <label>Nombre del complejo:</label>
                    <div class="controls">
                        <input name="nombre" type="text" maxlength="50" class="form-control" placeholder="campo requerido" required>
                    </div>
                </div>
            </div>            
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="control-group">
                    <label>Inauguración:</label>
                    <div class="controls">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>                                                                                                              
                            <input name="fecha_inauguracion" type="text" placeholder="campo opcional" class="form-control pull-right datepicker">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="control-group">
                    <label>Cant. departamentos:</label>
                    <div class="controls">                                                                  
                        <input name="cant_deptos" type="number" maxlength="50" class="form-control" data-toggle="tooltip" data-placement="bottom" title="cantidad de departamentos en total que posee el edificio" placeholder="campo requerido" required>
                    </div>
                </div>
            </div>            
        </div>       
        <br>
        <div class="row">    
              
        </div>  
        <br>             
    </div>
    <div class="col-md-6">
        <div class="row">          
            <div class="col-md-12">
                <div class="control-group">
                    <label>Subir imagen de perfil:</label>
                    <div class="controls">
                        <div id="main-cropper_nuevo" class="hide"></div>
                        <a class="button actionUpload-nuevo">                   
                            <input type="file" id="imagen-nuevo" value="Escoja una imagen" accept="image/*">
                        </a>                       
                        <small class="form-text text-muted"><strong>Información:</strong> si no escoge una imagen nueva se utilizará una imagen prestablecida.</small>
                    </div>
                </div>
            </div>            
        </div>
        <br>                          
    </div>
</div>