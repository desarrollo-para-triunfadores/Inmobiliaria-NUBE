/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;

window.URL = window.URL || window.webkitURL || window.mozURL || window.msURL;


function isInPage(node) {
    return (node === document.body) ? false : document.body.contains(node);
}


console.log(isInPage(document.querySelector('#canvas_nuevo')));
console.log(isInPage(document.querySelector('#canvas_update')));



// Cámara | formulario de nuevo registro

if (isInPage(document.querySelector('#canvas_nuevo'))) { //compruebo si el elemento está siendo utilizado en la vista

    var canvas_nuevo = document.querySelector('#canvas_nuevo'),
            ctx_nuevo = canvas_nuevo.getContext('2d'),
            video_nuevo = document.querySelector('#video_nuevo'),
            start_nuevo = document.querySelector('#start_nuevo'),
            capture_nuevo = document.querySelector('#capture_nuevo'),
            nuevo = 0,
            MediaStream_nuevo = "",
            contenido_nuevo = "",
            basic_nuevo_cam = "";

    start_nuevo.addEventListener('click', function (e) {
        e.preventDefault();
        basic_nuevo_cam = "";
        $('#imagen-nuevo').val("");
        $('#main-cropper-imagen-nuevo').addClass("hide");
        contenido_nuevo = '<div id="photo_nuevo' + nuevo + '"></div>';
        $('#contenido_foto_nuevo').html(contenido_nuevo);
        $("#video_nuevo").removeClass("hide");
        $("#start_nuevo").addClass("hide");
        $("#capture_nuevo").removeClass("hide");
        navigator.getUserMedia({
            video: true
        }, function (stream) {
            var src = window.URL.createObjectURL(stream);
            video_nuevo.src = src;
            MediaStream_nuevo = stream.getTracks()[0];
        }, function (e) {
            console.log(e);
        });

        capture_nuevo.addEventListener('click', function (e) {
            e.preventDefault();
            ctx_nuevo.drawImage(video_nuevo, 0, 0, canvas_nuevo.width, canvas_nuevo.height);
            var data_nuevo = canvas_nuevo.toDataURL('image/png');
            basic_nuevo_cam = $('#photo_nuevo' + nuevo).croppie({
                enableExif: true,
                url: data_nuevo,
                viewport: {
                    width: 275,
                    height: 275,
                    type: 'circle'
                },
                boundary: {
                    width: 275,
                    height: 275
                }
            });

            MediaStream_nuevo.stop();
            $("#contenido_foto_nuevo").removeClass("hide");
            $("#video_nuevo").addClass("hide");
            $("#capture_nuevo").addClass("hide");
            $("#start_nuevo").removeClass("hide");
            nuevo = nuevo + 1;
        }, false);
    });

}






// Cámara | formulario de actualización

if (isInPage(document.querySelector('#canvas_update'))) { //compruebo si el elemento está siendo utilizado en la vista

    var start_update = document.querySelector('#start_update'),
            capture_update = document.querySelector('#capture_update'),
            update = 0,
            MediaStream_update = "",
            contenido_update = "",
            basic_update_cam = "",
            canvas_update = document.querySelector('#canvas_update'),
            ctx_update = canvas_update.getContext('2d'),
            video_update = document.querySelector('#video_update');


    start_update.addEventListener('click', function (e) {
        e.preventDefault();
        basic_update_cam = "";
        $('#imagen-update').val("");
        $('#main-cropper_update').addClass("hide");
        contenido_update = '<div id="photo_update' + update + '"></div>';
        $('#contenido_foto_update').html(contenido_update);
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
            basic_update_cam = $('#photo_update' + update).croppie({
                enableExif: true,
                url: data_update,
                viewport: {
                    width: 275,
                    height: 275,
                    type: 'circle'
                },
                boundary: {
                    width: 275,
                    height: 275
                }
            });

            MediaStream_update.stop();
            $("#contenido_foto_update").removeClass("hide");
            $("#video_update").addClass("hide");
            $("#capture_update").addClass("hide");
            $("#start_update").removeClass("hide");
            update = update + 1;
        }, false);
    });

}

