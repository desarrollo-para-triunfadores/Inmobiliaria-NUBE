@extends('admin.partes.index')
@section('title') CloudProp | Contabilidad 
@endsection
@section('content')
    @include('admin.solicitudes_servicio.create')
    <div class="content-wrapper" style="min-height: 916px;">
        <section class="content-header">
            <h1>
                Estado de tu Cuenta | CloudProp
            </h1>
            
            <ol class="breadcrumb">
                <li>                 
                @if(Auth::user()->obtener_rol() == 'Propietario')
                    @if(Auth::user()->persona->propietario->contratos_vigentes())          
                        <button type="button" class="btn btn-bitbucket" onclick="" data-toggle="modal" data-placement="bottom" data-target="#modal-nueva-peticion-servicio" title="Llamar a personal de servicio técnico"  >Solicitar Servicio Técnico</button>
                    @endif
                @elseif(Auth::user()->obtener_rol() == 'Inquilino')
                    @if(Auth::user()->persona->inquilino->ultimo_contrato())  
                        <button type="button" class="btn btn-bitbucket" onclick="" data-toggle="modal" data-placement="bottom" data-target="#modal-nueva-peticion-servicio" title="Llamar a personal de servicio técnico"  >Solicitar Servicio Técnico</button>
                    @endif     
                @endif   

                </li>
            </ol>            
        </section>

        <section class="content animated fadeIn">
            @include('admin.contabilidad.cuentas.boleta')  
            @if(Auth::user()->obtener_rol() == 'Administrador')
                <h2>Usted es administrador</h2>
            @elseif(Auth::user()->persona->propietario)
                @include('admin.contabilidad.cuentas.tabla_propietario')   <!-- vista exclisuva para Propietarios -->
            @elseif(Auth::user()->persona->inquilino)
                @include('admin.contabilidad.cuentas.tabla_inquilino')     <!-- vista exclisuva para Inquilinos -->                
            @endif                       
        </section>
    </div>


@endsection 
@section('script')
    //<script src="{{ asset('js/contabilidad.js') }}"></script>
    <script>
        /**** Cuando se selecciona un rubro de tecnico, desplegar los tecnicos que corresponden al rubro ****/
          $('select#rubrotecnico_id').on('change',function () {
              $('select#tecnico_id').empty();                
              $.ajax({
                  dataType: 'JSON',
                  url: "/admin/tecnicos/tecnicosxrubro",      
                  data: {
                      id: $('#rubrotecnico_id').val()
                  },
                  success: function (data) {                      
                      data = JSON.parse(data);
                      //factura.tipo_cbre = data.tipo_cbre;
                      $('select#tecnico_id').append("<option value=>*Nunguno en particular*</option>");
                      for(i=0; i<data.length; i++){
                          $('select#tecnico_id').append("<option value='"+data[i].tecnico.id+"'> "+data[i].persona.nombre+" "+data[i].persona.apellido+"</option>");
                      }
                  }
              });             
          });

        //Bootstrap Material Date picker
        $('.datepicker').bootstrapMaterialDatePicker ({
            format: 'DD/MM/YYYY',
            lang: 'es',
            weekStart: 1, 			
            switchOnClick : true,
            cancelText: 'Cerrar',
            okText: 'Seleccionar',
            minDate : moment().add(-100, 'year'),
            maxDate : moment(),
            time: false 
        });
    </script>
@endsection