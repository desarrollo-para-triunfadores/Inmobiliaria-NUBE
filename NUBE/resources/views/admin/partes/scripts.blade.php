
<!-- jQuery 2.2.3 -->
<script src="{{ asset('plantillas/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>

<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('plantillas/AdminLTE/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{ asset('plantillas/AdminLTE/plugins/chartjs/Chart.min.js') }}"></script>
<script src="{{ asset('plantillas/AdminLTE/plugins/morris/morris.min.js') }}"></script>


<!-- Sparkline -->
<script src="{{ asset('plantillas/AdminLTE/plugins/sparkline/jquery.sparkline.min.js') }}"></script>

<!-- jvectormap -->
<script src="{{ asset('plantillas/AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('plantillas/AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>

<!-- jQuery Knob Chart -->
<script src="{{ asset('plantillas/AdminLTE/plugins/knob/jquery.knob.js') }}"></script>

<!-- bootstrap time picker -->
<script src="{{ asset('plantillas/AdminLTE/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>

<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{ asset('plantillas/AdminLTE/plugins/daterangepicker/daterangepicker.js') }}"></script>

<!-- datepicker -->
<script src="{{ asset('plantillas/AdminLTE/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('plantillas/AdminLTE/plugins/datepicker/locales/bootstrap-datepicker.es.js') }}"></script>

<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('plantillas/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>

<!-- Slimscroll -->
<script src="{{ asset('plantillas/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>

<!-- FastClick -->
<script src="{{ asset('plantillas/AdminLTE/plugins/fastclick/fastclick.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('plantillas/AdminLTE/dist/js/app.min.js') }}"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="{{ asset('plantillas/AdminLTE/dist/js/pages/dashboard.js') }}"></script>-->

<!-- AdminLTE for demo purposes -->
<script src="{{ asset('plantillas/AdminLTE/dist/js/demo.js') }}"></script>

<!-- DataTables -->
<script src="{{ asset('plantillas/AdminLTE/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plantillas/AdminLTE/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>

<!-- bootstrap color picker -->
<script src="{{ asset('plantillas/AdminLTE/plugins/colorpicker/bootstrap-colorpicker.min.js') }}"></script>

<!-- Select2 -->
<script src="{{ asset('plantillas/AdminLTE/plugins/select2/select2.full.min.js') }}"></script>

<!-- Croppie -->
<script src="{{ asset('plantillas/AdminLTE/plugins/croppie/js/deploy.js') }}"></script>
<script src="{{ asset('plantillas/AdminLTE/plugins/croppie/js/croppie.min.js') }}"></script>

<!--jquery-steps-master-->
<script src="{{ asset('plantillas/AdminLTE/plugins/jquery-steps-master/build/jquery.steps.js') }}"></script>


<!--bootbox-->
<script src="{{ asset('plantillas/AdminLTE/plugins/bootbox/bootbox.min.js') }}"></script>

<!-- InputMask -->
<script src="{{ asset('plantillas/AdminLTE/plugins/input-mask/jquery.inputmask.js') }}"></script>
<script src="{{ asset('plantillas/AdminLTE/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
<script src="{{ asset('plantillas/AdminLTE/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>

<!--jquery-steps-master-->
<script src="{{ asset('plantillas/AdminLTE/plugins/bootstrap_datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>





<!-- fullCalendar 2.2.5 -->
<!--<script src="{{ asset('plantillas/AdminLTE/plugins/fullcalendar/moment.min.js') }}"></script>
<script src="{{ asset('plantillas/AdminLTE/plugins/fullcalendar/fullcalendar.min.js') }}"></script>-->
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
<script type='text/javascript' src="{{ asset('plantillas/AdminLTE/plugins/fullcalendar-3.4.0/gcal.js') }}"></script>



<!-- wizard-bootstrap -->
<script src="{{ asset('plantillas/AdminLTE/plugins/twitter-bootstrap-wizard-master/jquery.bootstrap.wizard.min.js') }}"></script>
<script src="{{ asset('plantillas/AdminLTE/plugins/twitter-bootstrap-wizard-master/prettify.js') }}"></script>
<!--<script src="http://code.jquery.com/jquery-latest.js"></script>-->
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>





<!-- fullCalendar 3.4.0 -->
{{--
 <script type='text/javascript' src="{{ asset('plantillas/AdminLTE/plugins/fullcalendar-3.4.0/lib/jquery.min.js') }}"></script>
<script type='text/javascript' src="{{ asset('plantillas/AdminLTE/plugins/fullcalendar-3.4.0/lib/moment.min.js') }}"></script>
<script type='text/javascript' src="{{ asset('plantillas/AdminLTE/plugins/fullcalendar-3.4.0/gcal.js') }}"></script>
<script type='text/javascript' src="{{ asset('plantillas/AdminLTE/plugins/fullcalendar-3.4.0/fullcalendar.js') }}"></script>
--}}
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyANzTkkt93m5CSxz1H5fZy18uN_sEERiu4&callback=initMap"></script>



<script>
$(".select2").select2({
    placeholder: "seleccione una opción"
});


//esta variable se usa para traducir todas las tablas del sistema. Por alguna razón hay incompatibilidad entre el cambio del lenguaje y los filtros individaules en las columnas. Por eso se recurre a esto.
var tabla_traducida = {
    "sProcessing": "Procesando...",
    "sLengthMenu": "Mostrar _MENU_ registros",
    "sZeroRecords": "No se encontraron resultados",
    "sEmptyTable": "Ningún dato disponible en esta tabla",
    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix": "",
    "sSearch": "Buscar:",
    "sUrl": "",
    "sInfoThousands": ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst": "Primero",
        "sLast": "Último",
        "sNext": "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
};

//Colorpicker
$(".my-colorpicker1").colorpicker({
    colorSelectors: {
        '#000000': '#000000',
        '#ffffff': '#ffffff',
        '#FF0000': '#FF0000',
        '#777777': '#777777',
        '#337ab7': '#337ab7',
        '#5cb85c': '#5cb85c',
        '#5bc0de': '#5bc0de',
        '#f0ad4e': '#f0ad4e',
        '#d9534f': '#d9534f'
    }
});
//color picker with addon
$(".my-colorpicker2").colorpicker({
    colorSelectors: {
        '#000000': '#000000',
        '#ffffff': '#ffffff',
        '#FF0000': '#FF0000',
        '#777777': '#777777',
        '#337ab7': '#337ab7',
        '#5cb85c': '#5cb85c',
        '#5bc0de': '#5bc0de',
        '#f0ad4e': '#f0ad4e',
        '#d9534f': '#d9534f'
    }
});
</script>


<!-- Para el Toggle Button en Roles -->
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<!-- Mascara para manejo de dinero (MaskMoney) -->
<script src="{{ asset('plantillas/ADMINLTE/maskmoney/src/jquery.maskMoney.js') }}" type="text/javascript"></script>



