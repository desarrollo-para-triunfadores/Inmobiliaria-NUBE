$("#side-inmueble").addClass("active");
$("#side-inmueble-ul").addClass("menu-open");
$("#side-ele-inmuebles").addClass("active");

function completar_campos(inmueble) {
    $('#valorVenta').val(inmueble.valorVenta);   $('#valorAlquiler').val(inmueble.valorAlquiler);   $('#valorExpensa').val(inmueble.valorExpensa);
    $('#inquilino_id').val(inmueble.inquilino_id); $('#garante_id').val(inmueble.garante_id);     $('#propietario_id').val(inmueble.propietario_id);
    $('#condicion').val(inmueble.condicion);

    $('#form-update').attr('action', '/admin/proyectos/' + inmueble.id);
    $('#boton-modal-update').click();
}

function abrir_modal_borrar(id) {
    $('#form-borrar').attr('action', '/admin/proyectos/' + id);
    $('#boton-modal-borrar').click();
}

