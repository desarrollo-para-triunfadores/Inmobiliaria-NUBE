<legend>
    Sercvicios incluidos
</legend>
<div class="row">                                           
    <div class="col-md-12">
        <table data-toggle="tooltip" title="en esta tabla figuran los servicios que se incluirán en el contrato" class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody id="tabla_servicios">
            </tbody>
            <tfoot>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acción</th>
                </tr>
            </tfoot>
        </table>
        <hr>
     
        <input name="cantidad_servicios" class="hide" id="cantidad_servicios" type="text" >
        <input name="servicios" class="hide" id="servicios" type="array" >
        <button title="Agregar un servicio" type="button" id="boton-modal-crear" class="btn btn-success pull-right" data-toggle="modal" data-target="#modal-crear-servicios">
            <i class="fa fa-plus-circle"></i> &nbsp;agregar servicios
        </button>
    </div>  
</div>


@include('admin.contratos.formulario.agregar')
@include('admin.contratos.formulario.elemento_seleccionado')
