<div class="form-group">
    <label>Subir imagen de perfil:</label>
    <div id="main_cropper_update" class=""></div>
    <a class="button action_upload_update">                   
        <input type="file" id="imagen_update" value="Escoja una imagen" accept="image/*">
    </a>                       
    <small class="form-text text-muted"><strong>Información:</strong> si no escoge una imagen nueva se utilizará una imagen prestablecida.</small>
</div>                     
<div class="form-group">
    <label>Tomar imagen de perfil desde la cámara:</label><br>
    <button id="start_update"><i class="fa fa-camera-retro" aria-hidden="true"></i>&nbsp; Iniciar cámara</button> 
    <video id="video_update" width="565" height="360" autoplay="true" class="hide"></video>
    <canvas id="canvas_update" type="file" width="1280" height="720" class="hide"></canvas>  
    <button id="capture_update" class="hide"><i class="fa fa-picture-o" aria-hidden="true"></i> &nbsp;Capturar imagen</button>
</div>