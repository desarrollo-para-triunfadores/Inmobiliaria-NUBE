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
                bootbox.confirm({
                    title: "<h2>Su mensaje fue enviado 👌🏻 a CloudProp© </h2>",
                    message: "<p>Un agente de ventas contestara su mensaje a la brevedad, recuerde que puede ver éste y cualquier inmueble cuando lo desee.</p>",
                    buttons: {
                        cancel: {
                            label: '<i class="fa fa-times"></i> Cancelar'
                        },
                        confirm: {
                            label: '<i class="fa fa-check"></i> Bien!'
                        }
                    },
                    callback: function (result) {
                        window.location.reload();
                    }
                });
            }
        });
    }

}