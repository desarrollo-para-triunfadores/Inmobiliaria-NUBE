@extends('front.partes.index') 

@section('title')
    CloudProp | ¿Cómo funciona?
@endsection 

@section('estilos')
    <link type="text/css" rel="stylesheet" href="{{ asset('css/front/como-funciona.css') }}">
    <link rel="stylesheet" href="{{asset('node_modules/swiper/dist/css/swiper.min.css')}}"> <!-- para toush slider smartphones-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/css/swiper.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/css/swiper.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:800" rel="stylesheet">

@endsection 

@section('content')
    <div id="page-content">
        @include('front.comofunciona.contenido')
    </div>
@endsection


@section('script')
<script>
    $("#nav-comofunciona").addClass("active");
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/js/swiper.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/js/swiper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/js/swiper.esm.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/js/swiper.esm.bundle.js"></script>
<script rel="stylesheet" href="{{asset('node_modules/swiper/dist/js/swiper.min.js')}}"></script> <!-- para toush slider smartphones-->
<script src="{{ asset('js/front/como-funciona.js') }}"></script>
@endsection