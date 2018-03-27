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


@endsection @section('script')
    <script src="{{ asset('js/camara.js') }}"></script>
    <script src="{{ asset('js/contabilidad.js') }}"></script>
@endsection