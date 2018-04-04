var imagen_cropie = { //Esta variable es necesaria porque en ella se guardan las imégenes resultantes de la interacción con cropie.js
    create : "",
    update : ""
};


/**
 * INICIO funciones generales para la cámara------------------------------------------------------------------------------------------------------------------
 */

// Utilizamos la funcion getUserMedia para obtener la salida de la webcam
navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;
window.URL = window.URL || window.webkitURL || window.mozURL || window.msURL;


function isInPage(node) {
    return (node === document.body) ? false : document.body.contains(node);
}

/**
 * FIN funciones generales para la cámara------------------------------------------------------------------------------------------------------------------
 */

/**
 * INICIO Croppie.js | create------------------------------------------------------------------------------------------------------------------
 */

//se instancia el plugin para cuando se sube una imagen 

var basic_create = $('#main_cropper_create').croppie({
    enableExif: true,
    viewport: {width: 275, height: 275, type: 'circle'},
    boundary: {width: 275, height: 275},
    update: function (data) {
      basic_create.croppie('result', 'blob').then(function (html) {
        imagen_cropie.create = html
      })
    }
})


//evento sobre el botón subir una imagen

$('.action_upload_create input').on('change', function () {
     
    $('#main_cropper_create').removeClass('hide');
    $("#video_create").addClass("hide");
    $("#capture_create").addClass("hide");
    $("#start_create").removeClass("hide");

    if (this.files && this.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#main_cropper_create').croppie('bind', {
                url: e.target.result
            });
        };
        reader.readAsDataURL(this.files[0]);
    }
});


// Este método que se encarga del manejo de la cámara para imágenes nuevas y de su posterior tratamiento mediante croppie 

if (isInPage(document.querySelector('#canvas_create'))) { //compruebo si el elemento está siendo utilizado en la vista

    var canvas_create = document.querySelector('#canvas_create'),
        ctx_create = canvas_create.getContext('2d'),
        video_create = document.querySelector('#video_create'),
        start_create = document.querySelector('#start_create'),
        capture_create = document.querySelector('#capture_create'),
        MediaStream_create = "";
 

    start_create.addEventListener('click', function (e) {
        e.preventDefault();
        $('#imagen_create').val("");
        $('#main_cropper_create').addClass("hide");
        $("#video_create").removeClass("hide");
        $("#start_create").addClass("hide");
        $("#capture_create").removeClass("hide");
        
        navigator.getUserMedia({
            video: true
        }, function (stream) {
            var src = window.URL.createObjectURL(stream);
            video_create.src = src;
            MediaStream_create = stream.getTracks()[0];
        }, function (e) {
            console.log(e);
        });

        capture_create.addEventListener('click', function (e) {           
            e.preventDefault();
            ctx_create.drawImage(video_create, 0, 0, canvas_create.width, canvas_create.height);
            var data_create = canvas_create.toDataURL('image/png');
           
            $('#main_cropper_create').croppie('bind', {
                url: data_create
            });             

            MediaStream_create.stop();
            video_create.src  = null;

            $('#main_cropper_create').removeClass("hide");
            $("#video_create").addClass("hide");
            $("#capture_create").addClass("hide");
            $("#start_create").removeClass("hide");
           

        }, false);

    });

}

/**
 * FIN Croppie.js | create------------------------------------------------------------------------------------------------------------------
 */

/**
 * INICIO Croppie.js | update------------------------------------------------------------------------------------------------------------------
 */

//se instancia el plugin para cuando se sube una imagen 

function instanciar_croppie_update(url_imagen){ 

    console.log(url_imagen);
    /**
     * El plugin para el update a diferencia del create es necesario reinstanciarlo cada vez que se abre 
     * el modal de update ya que sino no se refresca el cuadro de la imagen y por enede no aparece la imagen.
     */

    if(imagen_cropie.update !== ""){     
        /**
         * Acá actualizo dos veces (una en blanco y otra con la imagen)
         * ya que me da problemas con el zoom y de esta manera muestra bien.
         */
        $('#main_cropper_update').croppie('bind', {
            url: ''
        });
        $('#main_cropper_update').croppie('bind', {
            url: url_imagen
        });
    }else{ 
        var basic_update = $('#main_cropper_update').croppie({
            url: url_imagen,  
            enableExif: true,
            viewport: {width: 275, height: 275, type: 'circle'},
            boundary: {width: 275, height: 275},
            update: function (data) {
            basic_update.croppie('result', 'blob').then(function (html) {
                imagen_cropie.update = html
            })
            }
        });

        //evento sobre el botón subir una imagen
        $('.action_upload_update input').on('change', function () {
                       
            $('#main_cropper_update').removeClass('hide');
            $("#video_update").addClass("hide");
            $("#capture_update").addClass("hide");
            $("#start_update").removeClass("hide");
            
            if (this.files && this.files[0]) {
                var reader_update= new FileReader();
                reader_update.onload = function (e) {
                    $('#main_cropper_update').croppie('bind', {
                        url: e.target.result
                    });
                };        
                reader_update.readAsDataURL(this.files[0]);
            }

        });
    }
}




// Este método que se encarga del manejo de la cámara para imágenes nuevas en el formulario de update y de su posterior tratamiento mediante croppie 

if (isInPage(document.querySelector('#canvas_update'))) { //compruebo si el elemento está siendo utilizado en la vista

    var start_update = document.querySelector('#start_update'),
        capture_update = document.querySelector('#capture_update'),       
        canvas_update = document.querySelector('#canvas_update'),
        ctx_update = canvas_update.getContext('2d'),
        video_update = document.querySelector('#video_update');


    start_update.addEventListener('click', function (e) {
        e.preventDefault();
        $('#imagen_update').val("");
        $('#main_cropper_update').addClass("hide");
        $("#video_update").removeClass("hide");
        $("#start_update").addClass("hide");
        $("#capture_update").removeClass("hide");
        
        navigator.getUserMedia({
            video: true
        }, function (stream) {
            var src = window.URL.createObjectURL(stream);
            video_update.src = src;
            MediaStream_update = stream.getTracks()[0];
        }, function (e) {
            console.log(e);
        });

        capture_update.addEventListener('click', function (e) {
            e.preventDefault();
            ctx_update.drawImage(video_update, 0, 0, canvas_update.width, canvas_update.height);
            var data_update = canvas_update.toDataURL('image/png');
           
            $('#main_cropper_update').croppie('bind', {
                url: data_update
            });

            MediaStream_update.stop();
            video_update.src  = null;

            $('#main_cropper_update').removeClass("hide");
            $("#video_update").addClass("hide");
            $("#capture_update").addClass("hide");
            $("#start_update").removeClass("hide");
        
        }, false);
    });

}
/**
 * FIN Croppie.js | update------------------------------------------------------------------------------------------------------------------
 */