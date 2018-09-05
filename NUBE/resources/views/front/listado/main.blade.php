@extends('front.partes.index') 

@section('title') CloudProp | Propiedades
@endsection 

@section('estilos') 

<link type="text/css" rel="stylesheet" href="{{ asset('css/front/lista-propiedades.css') }}">

@endsection 

@section('content')
<div id="page-content">

<div class="container">
    <div class="row" style="margin-top: 3%;">
        <!-- Results -->
        <div class="col-md-9 col-sm-9">
        @include('front.listado.contenido') 
      
        </div><!-- /.col-md-9 -->
        <!-- end Results -->

        <!-- sidebar -->
        <div class="col-md-3 col-sm-3">
          
        @include('front.listado.panel_busqueda')   


        </div><!-- /.col-md-3 -->
        <!-- end Sidebar -->
    </div><!-- /.row -->
</div>

     
</div>
@endsection

@section('script')


@section('script')
<script src="{{ asset('js/front/lista-propiedades.js') }}"></script>
<script>
    $("#nav-listapropiedades").addClass("active");
    instanciar_slider_precio($("#precio_range").val());
</script>
@endsection