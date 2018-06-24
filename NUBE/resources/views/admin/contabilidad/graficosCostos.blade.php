<!------- variables que vienen de EstadisticasController (se usan en grefico contabilidad.js) ----->
<input class="hide" id="ingresos_enero" value={{$array_ingresos_mensuales["01"]}} /> 
<input class="hide" id="ingresos_febrero" value={{$array_ingresos_mensuales["02"]}} /> 
<input class="hide" id="ingresos_marzo" value={{$array_ingresos_mensuales["03"]}} /> 
<input class="hide" id="ingresos_abril" value={{$array_ingresos_mensuales["04"]}} /> 
<input class="hide" id="ingresos_mayo" value={{$array_ingresos_mensuales["05"]}} /> 
<input class="hide" id="ingresos_junio" value={{$array_ingresos_mensuales["06"]}} /> 
<input class="hide" id="ingresos_julio" value={{$array_ingresos_mensuales["07"]}} /> 
<input class="hide" id="ingresos_agosto" value={{$array_ingresos_mensuales["08"]}} /> 
<input class="hide" id="ingresos_septiembre" value={{$array_ingresos_mensuales["09"]}} /> 
<input class="hide" id="ingresos_octubre" value={{$array_ingresos_mensuales["10"]}} /> 
<input class="hide" id="ingresos_noviembre" value={{$array_ingresos_mensuales["11"]}} /> 
<input class="hide" id="ingresos_diciembre" value={{$array_ingresos_mensuales["12"]}} /> 
<div class="row">
<!--------------------------------------------------------------------------------------------------->
    <div class="col-md-12">
        <!-- GRAFICO INGRESOS MENSUALES -->
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Ingresos Mensuales</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="chart">
                        <canvas id="grafico_ingresos" width="400" height="200"></canvas>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>

        <!-- GRRAFICO COSTOS -->
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Costos</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="chart">
                        <canvas id="grafico_costos" width="400" height="200"></canvas>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('plantillas/AdminLTE/plugins/chartjs2/dist/Chart.js') }}"></script>
<script>
        var gastos_marketing = {{ $array_grafico_gastos['Marketing'] }};
        var gastos_impuestos = {{ $array_grafico_gastos['Impuestos'] }};
        var gastos_seguros = {{ $array_grafico_gastos['Seguro Inmobiliario'] }};
        var gastos_mto_y_reparaciones = {{ $array_grafico_gastos['Mto y Reparaciones']}};
        var gastos_otros = {{ $array_grafico_gastos['Otros']}};
        
//-// And for a doughnut chart

var grafico_costos = document.getElementById("grafico_costos");
//console.log(array_gastos);
//Chart.defaults.global.defaultFontFamily = "Lato";
//Chart.defaults.global.defaultFontSize = 15;
var data_grafico = {
    labels: [
        "Mto y Reparaciones",
        "Seguro Inmobiliario",
        "Marketing",
        "Impuestos",
        "Otros"
    ],
    datasets: [
        {
            data: [gastos_mto_y_reparaciones, gastos_seguros, gastos_marketing, gastos_impuestos, gastos_otros],
            backgroundColor: [
                "#FF6384",
                "green",
                "orange",
                "#8463FF",
                "#6384FF",
            ]
        }]
};

var Dona = new Chart(grafico_costos, {
  type: 'doughnut',
  data: data_grafico
});

    
</script>

