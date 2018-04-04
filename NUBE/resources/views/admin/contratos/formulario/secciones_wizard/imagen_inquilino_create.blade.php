<h3>Imagen de perfil</h3>
<br>
<div class="form-group">
    <label>Subir imagen de perfil:</label>
    <div id="main_cropper_create_inquilino" class="hide"></div>
    <a class="button action_upload_create_inquilino">                   
        <input type="file" id="imagen_create_inquilino" value="Escoja una imagen" accept="image/*">
    </a>                       
    <small class="form-text text-muted"><strong>Información:</strong> si no escoge una imagen nueva se utilizará una imagen prestablecida.</small>
</div> 
<div class="form-group">
    <label>Tomar imagen de perfil desde la cámara:</label><br>
    <button id="start_create_inquilino"><i class="fa fa-camera-retro" aria-hidden="true"></i>&nbsp; Iniciar cámara</button>   
    <video id="video_create_inquilino" width="275" height="275" autoplay="true" class="hide"></video>
    <canvas id="canvas_create_inquilino" name="imagen2" type="file" width="1280" height="720" class="hide"></canvas>  
    <button id="capture_create_inquilino" class="hide"><i class="fa fa-picture-o" aria-hidden="true"></i> &nbsp;Capturar imagen</button>
</div>         