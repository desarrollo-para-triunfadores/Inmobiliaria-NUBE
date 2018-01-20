/**
 * Created by Juampy on 23/07/2017.
 */
function mensaje_desde_front(){
    if($('#telefono').val() == ""){
        alert('El campo de teléfono es obligarorio.')
    }
    else{
        $.ajax({
            dataType: 'json',
            url: "/enviar_consulta/create",         //ruta que contendra el metodo para obtener lo que necesitamos, dentro del contolador
            data: {
                nombre: $('#nombre').val(),
                email: $('#email').val(),
                telefono: $('#telefono').val(),
                mensaje: $('#mensaje').val(),
                inmueble_id: $('#inmueble_id').val(),
            },
            success: function (data) {
                console.log(data);
                $("#modal-mensaje-exitoso").modal();
                window.location.reload();
            }
        });
    }

}