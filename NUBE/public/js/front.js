
function redirigir (pag)
{   //alert('se presiono redirigir');
    location.href=pag;
}


bootbox.confirm({
    title: "<h2>CloudProp© ¡Nueva Versión! Alpha 0.185.1: </h2>",
    message: "<p>ABM de Pesonal Técnico.</p>"+
    "<p>ABM de Solicitudes de Servicio Técnico.</p>"+
    "<p>Multiples alertas mediante barra de notificaciones al usuario.</p>"+
    "<p>Funcionalidad de incluir monto de servicio tecnico dentro de la liquidacion del cliente.</p>"+
    "<p>Funcionalidad para que el técnico pueda cobrar su servicio una vez que cliente abona boleta.</p>"+
    "<p>Correcion de errores en la liquidación de boletas.</p>"+
    "<p>Mejoras multiples en el menu de cuenta de cliente.</p>"+
    "<p>Mejoras visuales en el panel de contabilidad general de la empresa.</p>"+
    "<p>[Panel de Cuentas] Se añadio grafico de movimientos.</p>"+
    "<p>[Panel de Cuentas] Se añadio grafico de ingresos mensuales para la empresa.</p>"+
    "<p>Agenda solicitudes para los técnicos.</p>"+
    "<p>Agenda solicitudes para los clientes</p>",
    buttons: {
        cancel: {
            label: '<i class="fa fa-times"></i> Cancelar'
        },
        confirm: {
            label: '<i class="fa fa-check"></i> Bien!'
        }
    },
    callback: function (result) {
        console.log('This was logged in the front.js: ' + result);
    }
});