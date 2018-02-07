$("#side-liquidaciones-li").addClass("active");
$("#side-liquidaciones-ul").addClass("menu-open");
$("#side-ele-cobros").addClass("active");



function calcular_cambio(){
    $("#leyenda_vuelto").addClass("hide");

    var cliente = $('#cliente_id').val();
    cliente = cliente.replace(/^\[\'|\'\]$/g,'').split("', '");

    if(cliente[1]==="I"){
        if($("#abonado").val() !== ""){
            var saldo_periodo = 0,
                abonado = parseFloat($("#abonado").val()),
                total = parseFloat($("#total").val());
            if(abonado >= total){
                saldo_periodo = abonado - total;
                $("#saldo_periodo").val(saldo_periodo.toFixed(2));
                $("#leyenda_vuelto").html("Diferencia: $"+saldo_periodo.toFixed(2));
                $("#leyenda_vuelto").removeClass("hide");
            }
        }
    }else{
        if($("#abonado").val() !== ""){
            var abonado = parseFloat($("#abonado").val()),
                total = parseFloat($("#total").val());
            if(abonado >= total){
                cambio = abonado - total;              
                $("#leyenda_vuelto").html("Cambio: $"+cambio.toFixed(2));
                $("#leyenda_vuelto").removeClass("hide");
            }
        }
    }

   
    
}

function traer_resumen(){

    var cliente = $('#cliente_id').val();
    cliente = cliente.replace(/^\[\'|\'\]$/g,'').split("', '");

    $.ajax({
        url: '/admin/cobros',
        data: {
            id_cliente: cliente[0],
            tipo_cliente: cliente[1] // El tipo de cliente puede ser I: inquilino o P:propietario
        },
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            $('#tabla_deudas').html(data);
        }
    })
}