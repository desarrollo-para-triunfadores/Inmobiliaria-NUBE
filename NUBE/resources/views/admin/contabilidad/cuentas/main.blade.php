@extends('admin.partes.index')
@section('title') Contabilidad
@endsection
@section('content')
    @include('admin.solicitudes_servicio.create')
    {{--
    @include('admin.movimientos.create')
    --}}
    <div class="content-wrapper" style="min-height: 916px;">
        <section class="content-header">
            <h1>
                Estado de Cuenta Actual
            </h1>
            
            <ol class="breadcrumb">
                <li>
                {{--
                    <a href="#">
                        <i class="fa fa-suitcase"></i> Resumen de Cuenta
                    </a>
                --}}   
                     <button type="button" class="btn btn-bitbucket" onclick="" data-toggle="modal" data-placement="bottom" data-target="#modal-nueva-peticion-servicio" title="Llamar a personal de servicio técnico"  >Solicitar Servicio Técnico</button>
                </li>
            </ol>            
        </section>

        <section class="content animated fadeIn">
            @include('admin.contabilidad.cuentas.boleta')  
            @if(Auth::user()->persona->propietario)
                @include('admin.contabilidad.cuentas.tabla_propietario')   <!-- vista exclisuva para Propietarios -->
            @else
                @include('admin.contabilidad.cuentas.tabla_inquilino')     <!-- vista exclisuva para Inquilinos -->
            @endif
            {{--
            @include('admin.contabilidad.cuentas.tabla_pagos')
            --}}            
        </section>
    </div>


@endsection 
@section('script')
    <script src="{{ asset('js/contabilidad.js') }}"></script>
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
                      console.log(data);
                      data = JSON.parse(data);
                      //factura.tipo_cbre = data.tipo_cbre;
                      for(i=0; i<data.length; i++){
                          $('select#tecnico_id').append("<option value='"+data[i].tecnico.id+"'> "+data[i].persona.nombre+" "+data[i].persona.apellido+"</option>");
                      }
                  }
              });
             
          });
    </script>
@endsection