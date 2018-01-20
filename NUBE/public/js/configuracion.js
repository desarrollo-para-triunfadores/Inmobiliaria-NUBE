
function cambiar_info(tab) {
    if (tab === "#tab_2") {
        $("#info").html("<strong>Información:</strong> haga click sobre el esquema de color que le guste, el mismo quedará asociado únicamente al usuario logueado.");
    } else {
        $("#info").html("<strong>Información:</strong> los datos que aquí se muestran son los que se mostrarán en todos los lugares que se haga referencia a la empresa.");
    }
}