/*
$("#side-general-li").addClass("active");
$("#side-general-ul").addClass("menu-open");
$("#side-ele-lugares-ul").addClass("menu-open");
$("#side-ele-lugares-li").addClass("active");
$("#side-ele-lugares-paises").addClass("active");
*/
<!--porcion JS para rellenar la oportunidad -->
/*
var datas =
{
"5":{"id_operator":"5","id_city":"1","operator_code":"HAL","operator_name":"Hallo","operator_balance":"2.00","operator_address":"Adresa","operator_provision":"5.2000","operator_active":"1","operator_balance_sum_id":"0"},
"2":{"id_operator":"2","id_city":"2","operator_code":"HPY","operator_name":"Happy (BH Telecom dd)","operator_balance":"115.00","operator_address":"Obala Kulina bana br. 8","operator_provision":"7.0000","operator_active":"1","operator_balance_sum_id":"4"},"1":{"id_operator":"1","id_city":"1","operator_code":"ERO","operator_name":"HT Eronet","operator_balance":"1046104.00","operator_address":"Ulica Kneza Branimira bb","operator_provision":"6.0000","operator_active":"1","operator_balance_sum_id":"0"},"6":{"id_operator":"6","id_city":"1","operator_code":"IZI","operator_name":"izi mobil","operator_balance":"95.00","operator_address":"Adresa","operator_provision":"6.0000","operator_active":"1","operator_balance_sum_id":"0"},"3":{"id_operator":"3","id_city":"4","operator_code":"MTL","operator_name":"M:tel","operator_balance":"84982.50","operator_address":"Vuka Karad\u017ei\u0107a br. 6","operator_provision":"6.5000","operator_active":"1","operator_balance_sum_id":"0"},"4":{"id_operator":"4","id_city":"1","operator_code":"ULT","operator_name":"Ultra( BH Telecom dd)","operator_balance":"398.00","operator_address":"Adresa","operator_provision":"6.5000","operator_active":"1","operator_balance_sum_id":"2"}};
var data_obj = {};

var data = [];
$.each(datas, function(key, val) {
    var link = '<a href="admin/oportunidades/'+val.id_operator+'">'+val.operator_name+'</a>';
    data.push( {link : link,
        balance: val.operator_balance,
        provision: val.operator_provision
    });
});
data_obj = data;
console.log(data_obj);

$(document).ready(function() {
    $('#historial_oportunidad').dataTable({
        "aaData" : data_obj,
        "aoColumns": [
            { "mDataProp": "link" },
            { "mDataProp": "balance" },
            { "mDataProp": "provision" }
        ]
    });
});
*/


/** Completar formulario con datos actuales al seleccionar 'editar oportunidad' **/
function completar_campos(oportunidad) {
    $('#estado_id').val(oportunidad.estado_id).trigger("change");
    $('#nombre_interesado').val(oportunidad.nombre_interesado);
    $('#inmueble').val(oportunidad.inmueble.direccion +" ("+oportunidad.inmueble.localidad.nombre+")");
    $('#telefono').val(oportunidad.telefono);
    $('#email').val(oportunidad.email);
    /** Obtener cantidad de visitas */
    $.ajax({
        url: "/admin/oportunidades",
        data: {
            traer_data_oportunidad: true,
            oportunidad_id: oportunidad.id,
        },
        dataType: 'json',
        success: function (data_cruda) {
            var respuesta = JSON.parse(data_cruda);
            $('#visitas').val(respuesta.cantidad_visitas);
        }
    });
    /** Rellenamos tabla de historia de la oportunidad seleccionada **/
    $.ajax({
        url: "/admin/oportunidades",
        data: {
            traer_data_historias: true,
            oportunidad_id: oportunidad.id,
        },
        dataType: 'json',
        success: function (data_cruda) {
            var respuesta = JSON.parse(data_cruda);
            var datas = data_cruda;
            console.log(datas);
            tabla_historias_oportunidad = $('#historial_oportunidad').DataTable({
                "language": tabla_traducida,
            });
            tabla_historias_oportunidad.clear().draw(); //impiamos la tabla
            tabla_historias_oportunidad.destroy();
            for(var i=0 ; i < respuesta.length ; i++){
                tabla_historias_oportunidad.row.add([
                    //this.cells[1].style.textAlign = 'center',
                    "<td class='text-center'>"+respuesta[i].titulo+"</td>",
                    "<td class='text-center'>"+respuesta[i].detalle+"</td>",
                    "<td class='text-center'>"+respuesta[i].fecha+"</td>",
                ]).draw();
            }
        }
    });
    /** /--Rellenamos tabla de historia de la oportunidad seleccionada **/

    $('#form-update').attr('action', '/admin/oportunidades/' + oportunidad.id);
    $('#boton-modal-update').click();
}

function abrir_modal_borrar(id) {
    $('#form-borrar').attr('action', '/admin/oportunidades/' + id);
    $('#boton-modal-borrar').click();
}


/** Envia el email de interesado en un inmueble (Modulo 'Oportunidad') **/
//nuevo
$(document).on("change",".email_archivo",function(e){

    var miurl="/admin/cargar_archivo_correo";  //ok ?
    // var fileup=$("#file").val();
    var divresul="texto_notificacion";

    var data = new FormData();
    data.append('file', $('#file')[0].files[0] );
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('#_token').val()
        }
    });
    $.ajax({
        url: miurl,
        type: 'POST',
        data: data,
        //necesario para subir archivos via ajax
        cache: false,
        contentType: false,
        processData: false,
        //mientras enviamos el archivo
        beforeSend: function(){
            $("#"+divresul+"").html($("#cargador_empresa").html());
        },
        //una vez finalizado correctamente
        success: function(data){
            /*
            var codigo='<div class="mailbox-attachment-info"><a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>'+ data +'</a><span class="mailbox-attachment-size"> </span></div>';
            $("#"+divresul+"").html(codigo);
            alert('se cargo el archivo');
            */
            /*prueba*/
            var formData = new FormData($("#f_enviar_correo")[0]);
            $.ajax({
                url: "/admin/enviar_correo",
                type: 'POST',
                // Form data datos del formulario
                data: formData,
                //necesario para subir archivos via ajax
                cache: false,
                contentType: false,
                processData: false,
                //mientras enviamos el archivo
                beforeSend: function(){
                    $("#"+divresul+"").html($("#cargador_empresa").html());
                },
                //una vez finalizado correctamente
                success: function(data){
                    $("#"+divresul+"").html(data);
                },
                //si ha ocurrido un error
                error: function(data){
                    alert("ha ocurrido un error") ;

                }
            });
            /* */
        },
        //si ha ocurrido un error
        error: function(data){
            $("#"+divresul+"").html(data);

        }
    });

})
/** Enviar (2) */
$(document).on("submit",".formarchivo",function(e){
    alert('algo cambio en formarchivo');
    e.preventDefault();
    var formu=$(this);
    var nombreform=$(this).attr("id");
    var rs=false; //leccion 10
    if(nombreform=="f_enviar_correo" ){ var miurl="/admin/enviar_correo";  var divresul="contenido_principal";   }
    //informaci�n del formulario
    var formData = new FormData($("#"+nombreform+"")[0]);
    $.ajax({
        url: miurl,
        type: 'POST',
        // Form data
        //datos del formulario
        data: formData,
        //necesario para subir archivos via ajax
        cache: false,
        contentType: false,
        processData: false,
        //mientras enviamos el archivo
        beforeSend: function(){
            $("#"+divresul+"").html($("#cargador_empresa").html());
        },
        //una vez finalizado correctamente
        success: function(data){
            $("#"+divresul+"").html(data);
        },
        //si ha ocurrido un error
        error: function(data){
            alert("ha ocurrido un error") ;

        }
    });
});




//viejito (esta funcion no se va a usar mas, porque no sirve para adjuntar archivos dinamicamente)
function email_a_interesado(oportunidad){
    //var formData = new FormData(document.getElementById("form-" + tipo_form));
    //alert('Se esta enviando el email, aguarde un instante por favor ');
    var firma = $('#firma').val();
    var mensaje = $('#mensaje').val();
    var email_a_interesado = true;
    var oportunidad_id = oportunidad.id;
    $.ajax({
        url: "/admin/mail_oportunidad",
        data: {
            oportunidad_id: oportunidad_id,
            firma:firma,
            mensaje:mensaje,
            email_a_interesado:email_a_interesado,
        },
        dataType: 'json',
        success: function (data) {
            var respuesta = JSON.parse(data);
            var i = 1;
            console.log(respuesta);
            $("#email-cerrar").click();
            alert('Tu mensaje se envio correctamente ??');
        }
    });
}
/** Datepicker de fecha de edición de oportunidad*/
$('.datetimepicker').datetimepicker({
    format: 'DD/MM/YYYY HH:mm'
});
/******************************************/
/** Email */
function cargarformulario(arg){
//funcion que carga todos los formularios del sistema
    if(arg==3){ var url = "/admin/form_enviar_correo";  }
    $("#contenido_principal").html($("#cargador_empresa").html());
    $.get(url,function(resul){
        $("#contenido_principal").html(resul);
    })


}