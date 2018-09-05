/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function instanciar_slider_precio(rango_busqueda) {
    
    console.log(rango_busqueda);
    var combo = document.getElementById("condicion"),
            rango = combo.options[combo.selectedIndex].getAttribute("rango"),
            rango_split = rango.split(";");

    if (!rango_busqueda) {
        rango_busqueda = rango;
    }

    $(".price-range").html('<input id="precio_range" type="text" name="rango_precio" value="' + rango_busqueda + '">');

    $("#precio_range").slider({
        from: parseFloat(rango_split[0]),
        to: parseFloat(rango_split[1]),
        step: 100,
        round: 1,
        format: {format: '$ ###,###', locale: 'es'}
    });

}


$("#condicion").change(function () {
    /*
     * Este evento se encarga de reescribir el inmput range con la nueva configuración y lo instancia
     */
    instanciar_slider_precio();
});


$("#select_order").change(function () {
    /*
     * Este evento se encarga de reescribir el inmput range con la nueva configuración y lo instancia
     */
    $("#orden").val(this.value);
    $("#form-sidebar").submit();
});



function cargar_localidades(localidades) { //este método carga el select de barrios con los barrios de la localidad seleccionada

    var options_select_localidades = [], localidades_prov = localidades;

    if ($('#provincia_id').val() !== "") {
        var combo = document.getElementById("provincia_id");
        localidades_prov = JSON.parse(combo.options[combo.selectedIndex].getAttribute("localidades"));
    }

    options_select_localidades.push('<option value="">Cualquier Localidad</option>');
    localidades_prov.forEach(function (element) {
        options_select_localidades.push('<option value="' + element.id + '">' + element.nombre + '</option>');
    });

    $("#localidad_id").html(options_select_localidades);
    $('#localidad_id').selectpicker('refresh');
}
