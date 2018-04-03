var imagen_cropie = { //Esta variable es necesaria porque en ella se guardan las imégenes resultantes de la interacción con cropie.js
    inquilino : "",
    garante : ""
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
 * INICIO Croppie.js | create inquilino------------------------------------------------------------------------------------------------------------------
 */

function instanciar_croppie_inquilino(){

    console.log("instanciado inquilino");

    //se instancia el plugin para cuando se sube una imagen 

    var basic_create_inquilino = $('#main_cropper_create_inquilino').croppie({
        enableExif: true,
        viewport: {width: 275, height: 275, type: 'circle'},
        boundary: {width: 275, height: 275},
        update: function (data) {
        basic_create_inquilino.croppie('result', 'blob').then(function (html) {
            imagen_cropie.create = html
        })
        }
    })


    //evento sobre el botón subir una imagen

    $('.action_upload_create_inquilino input').on('change', function () {
        
        $('#main_cropper_create_inquilino').removeClass('hide');
        $("#video_create_inquilino").addClass("hide");
        $("#capture_create_inquilino").addClass("hide");
        $("#start_create_inquilino").removeClass("hide");

        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#main_cropper_create_inquilino').croppie('bind', {
                    url: e.target.result
                });
            };
            reader.readAsDataURL(this.files[0]);
        }
    });


    // Este método que se encarga del manejo de la cámara para imágenes nuevas y de su posterior tratamiento mediante croppie 

    if (isInPage(document.querySelector('#canvas_create_inquilino'))) { //compruebo si el elemento está siendo utilizado en la vista

        var canvas_create_inquilino = document.querySelector('#canvas_create_inquilino'),
            ctx_create_inquilino = canvas_create_inquilino.getContext('2d'),
            video_create_inquilino = document.querySelector('#video_create_inquilino'),
            start_create_inquilino = document.querySelector('#start_create_inquilino'),
            capture_create_inquilino = document.querySelector('#capture_create_inquilino'),
            MediaStream_create_inquilino = "";
    

        start_create_inquilino.addEventListener('click', function (e) {
            e.preventDefault();
            $('#imagen_create_inquilino').val("");
            $('#main_cropper_create_inquilino').addClass("hide");
            $("#video_create_inquilino").removeClass("hide");
            $("#start_create_inquilino").addClass("hide");
            $("#capture_create_inquilino").removeClass("hide");
            
            navigator.getUserMedia({
                video: true
            }, function (stream) {
                var src = window.URL.createObjectURL(stream);
                video_create_inquilino.src = src;
                MediaStream_create_inquilino = stream.getTracks()[0];
            }, function (e) {
                console.log(e);
            });

            capture_create_inquilino.addEventListener('click', function (e) {           
                e.preventDefault();
                ctx_create_inquilino.drawImage(video_create_inquilino, 0, 0, canvas_create_inquilino.width, canvas_create_inquilino.height);
                var data_create_inquilino = canvas_create_inquilino.toDataURL('image/png');
            
                $('#main_cropper_create_inquilino').croppie('bind', {
                    url: data_create_inquilino
                });             

                MediaStream_create_inquilino.stop();
                video_create_inquilino.src  = null;

                $('#main_cropper_create_inquilino').removeClass("hide");
                $("#video_create_inquilino").addClass("hide");
                $("#capture_create_inquilino").addClass("hide");
                $("#start_create_inquilino").removeClass("hide");
            

            }, false);

        });
    }
}

/**
 * FIN Croppie.js | create inquilino------------------------------------------------------------------------------------------------------------------
 */


/**
 * INICIO Croppie.js | create garante------------------------------------------------------------------------------------------------------------------
 */

function instanciar_croppie_garante(){

    console.log("instanciado garante");
    //se instancia el plugin para cuando se sube una imagen 

    var basic_create_garante = $('#main_cropper_create_garante').croppie({
        enableExif: true,
        viewport: {width: 275, height: 275, type: 'circle'},
        boundary: {width: 275, height: 275},
        update: function (data) {
        basic_create_garante.croppie('result', 'blob').then(function (html) {
            imagen_cropie.create = html
        })
        }
    })


    //evento sobre el botón subir una imagen

    $('.action_upload_create_garante input').on('change', function () {
        
        $('#main_cropper_create_garante').removeClass('hide');
        $("#video_create_garante").addClass("hide");
        $("#capture_create_garante").addClass("hide");
        $("#start_create_garante").removeClass("hide");

        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#main_cropper_create_garante').croppie('bind', {
                    url: e.target.result
                });
            };
            reader.readAsDataURL(this.files[0]);
        }
    });


    // Este método que se encarga del manejo de la cámara para imágenes nuevas y de su posterior tratamiento mediante croppie 

    if (isInPage(document.querySelector('#canvas_create_garante'))) { //compruebo si el elemento está siendo utilizado en la vista

        var canvas_create_garante = document.querySelector('#canvas_create_garante'),
            ctx_create_garante = canvas_create_garante.getContext('2d'),
            video_create_garante = document.querySelector('#video_create_garante'),
            start_create_garante = document.querySelector('#start_create_garante'),
            capture_create_garante = document.querySelector('#capture_create_garante'),
            MediaStream_create_garante = "";
    

        start_create_garante.addEventListener('click', function (e) {
            e.preventDefault();
            $('#imagen_create_garante').val("");
            $('#main_cropper_create_garante').addClass("hide");
            $("#video_create_garante").removeClass("hide");
            $("#start_create_garante").addClass("hide");
            $("#capture_create_garante").removeClass("hide");
            
            navigator.getUserMedia({
                video: true
            }, function (stream) {
                var src = window.URL.createObjectURL(stream);
                video_create_garante.src = src;
                MediaStream_create_garante = stream.getTracks()[0];
            }, function (e) {
                console.log(e);
            });

            capture_create_garante.addEventListener('click', function (e) {           
                e.preventDefault();
                ctx_create_garante.drawImage(video_create_garante, 0, 0, canvas_create_garante.width, canvas_create_garante.height);
                var data_create_garante = canvas_create_garante.toDataURL('image/png');
            
                $('#main_cropper_create_garante').croppie('bind', {
                    url: data_create_garante
                });             

                MediaStream_create_garante.stop();
                video_create_garante.src  = null;

                $('#main_cropper_create_garante').removeClass("hide");
                $("#video_create_garante").addClass("hide");
                $("#capture_create_garante").addClass("hide");
                $("#start_create_garante").removeClass("hide");
            

            }, false);

        });

    }
}
/**
 * FIN Croppie.js | create garante------------------------------------------------------------------------------------------------------------------
 */
