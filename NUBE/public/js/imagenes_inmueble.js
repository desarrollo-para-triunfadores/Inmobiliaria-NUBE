var nombre_input;


var fotos = {
    foto_presentacion_nuevo: "",
    foto_carrusel_1: "",   
    foto_detalle_1: "",
    foto_detalle_2: "",
    foto_detalle_3: "",
    foto_detalle_4: "",
    foto_plano_1: "",
    foto_plano_2: ""
};


function instanciar_cropie() {

    var cropie_foto_presentacion_nuevo = $('#main-cropper-foto_presentacion').croppie({
        enableExif: true,
        viewport: {width: 500, height: 300},
        boundary: {width: 900, height: 400},
        update: function (data) {
            cropie_foto_presentacion_nuevo.croppie('result', 'blob').then(function (html) {
                fotos.foto_presentacion_nuevo = html;
            });
        }
    });

    var cropie_foto_carrusel_1_nuevo = $('#main-cropper-foto-carrusel-1').croppie({
        enableExif: true,
        viewport: {width: 500, height: 300},
        boundary: {width: 900, height: 400},
        update: function (data) {
            cropie_foto_carrusel_1_nuevo.croppie('result', 'blob').then(function (html) {
                fotos.foto_carrusel_1 = html;
            });
        }
    });

    var cropie_foto_detalle_1_nuevo = $('#main-cropper-foto-detalle-1').croppie({
        enableExif: true,
        viewport: {width: 500, height: 250},
        boundary: {width: 600, height: 300},
        update: function (data) {
            cropie_foto_detalle_1_nuevo.croppie('result', 'blob').then(function (html) {
                fotos.foto_detalle_1 = html;
            });
        }
    });


    var cropie_foto_detalle_2_nuevo = $('#main-cropper-foto-detalle-2').croppie({
        enableExif: true,
        viewport: {width: 500, height: 250},
        boundary: {width: 600, height: 300},
        update: function (data) {
            cropie_foto_detalle_2_nuevo.croppie('result', 'blob').then(function (html) {
                fotos.foto_detalle_2 = html;
            });
        }
    });

    var cropie_foto_detalle_3_nuevo = $('#main-cropper-foto-detalle-3').croppie({
        enableExif: true,
        viewport: {width: 500, height: 250},
        boundary: {width: 600, height: 300},
        update: function (data) {
            cropie_foto_detalle_3_nuevo.croppie('result', 'blob').then(function (html) {
                fotos.foto_detalle_3 = html;
            });
        }
    });

    var cropie_foto_detalle_4_nuevo = $('#main-cropper-foto-detalle-4').croppie({
        enableExif: true,
        viewport: {width: 500, height: 250},
        boundary: {width: 600, height: 300},
        update: function (data) {
            cropie_foto_detalle_4_nuevo.croppie('result', 'blob').then(function (html) {
                fotos.foto_detalle_4 = html;
            });
        }
    });

    var cropie_foto_plano_1_nuevo = $('#main-cropper-foto-plano-1').croppie({
        enableExif: true,
        viewport: {width: 500, height: 250},
        boundary: {width: 600, height: 300},
        update: function (data) {
            cropie_foto_plano_1_nuevo.croppie('result', 'blob').then(function (html) {
                fotos.foto_plano_1 = html;
            });
        }
    });

    var cropie_foto_plano_2_nuevo = $('#main-cropper-foto-plano-2').croppie({
        enableExif: true,
        viewport: {width: 500, height: 250},
        boundary: {width: 600, height: 300},
        update: function (data) {
            cropie_foto_plano_2_nuevo.croppie('result', 'blob').then(function (html) {
                fotos.foto_plano_2 = html;
            });
        }
    });

}


//carga imagen al plugin
function readFile(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#main-cropper-' + input["id"]).croppie('bind', {
                url: e.target.result
            });
        };
        reader.readAsDataURL(input.files[0]);
    }
}

//evento sobre el botón subir fotografía de propiedades 
$('.actionUpload-fotografias-nuevo input').on('change', function () {
    readFile(this);
});

function habilitar_foto(id) {
    $("#" + id).attr('disabled', false);
}