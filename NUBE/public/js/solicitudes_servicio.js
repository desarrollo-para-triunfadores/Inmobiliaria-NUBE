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




