@extends('admin.partes.index')

@section('title')
Agenda
@endsection

@section('content')
<div class="content-wrapper" style="min-height: 916px;">
    <section class="content-header">
        <h1>
            Agenda
            <small>visitas pactadas</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-suitcase"></i> Oportunidades</a></li>
            <li class="active">Agenda</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                 @include('admin.partes.msj_acciones')
                <div class="box box-primary">
                    <div class="box-body no-padding">
                        <div id='calendar'></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@if(!is_null(Auth::user()->persona->tecnico) )
@include('admin.agenda_usuarios.formulario.create')
@endif
@include('admin.agenda_usuarios.formulario.show')


@endsection
@section('script')
    <script>
        var bandera_usuario_tecnico = "{{ !is_null(Auth::user()->persona->tecnico) }}";
    </script>
    <script src="{{ asset('js/agenda_usuarios.js') }}"></script>
@endsection
