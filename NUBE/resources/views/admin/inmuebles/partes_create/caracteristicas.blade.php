<legend>
    Características del inmueble
</legend>
<div class="row">                                           
    <div class="col-md-12">
        <table data-toggle="tooltip" title="aqui se añaden algunas caracteristicas propieas de la ubicacion o arquitectura del inmueble" id="tblListaCaracteristicas" class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody id="tabla_caracteristicas">
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
     
        <input name="cantidad_caracteristicas" class="hide" id="cantidad_caracteristicas" type="text" >
        <input name="caracteristicas" class="hide" id="caracteristicas" type="array" >
        <button title="Agregar una característica" type="button" id="boton-modal-crear" class="btn btn-success pull-right" data-toggle="modal" data-target="#modal-crear-caracteristicas">
            <i class="fa fa-plus-circle"></i> &nbsp;agregar característica
        </button>
    </div>  
</div>


@include('admin.inmuebles.formulario.agregar')
@include('admin.inmuebles.formulario.elemento_seleccionado')
