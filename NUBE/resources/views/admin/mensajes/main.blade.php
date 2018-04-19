@extends('admin.partes.index')

@section('title')
  Mensajes
@endsection

@section('content')
  <div class="content-wrapper" >
    <section class="content-header">
        <h1> Mensajes </h1>
    </section>
    <section class="content" >
      <div class="row">      
        <div class="col-md-12">
          <div class="box box-solid">
            <div class="box-body">              
              <div class="row">                                      
                <div class="col-md-4">
                  <div class="pad box-pane-right bg-green-gradient">                                                  
                      <div class="box" style="height: 555px">
                          <div class="box-body">  
                              <ul class="products-list product-list-in-box">
                                <!-- Inicio búsqueda -->
                                <li class="item">
                                    <div class="input-group">                        
                                        <input id="input_busqueda" type="text" class="form-control" placeholder="buscar chat...">
                                        <span class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></span>
                                    </div>
                                </li>
                                <!-- Fin búsqueda -->                                
                              </ul>      
                            <ul class="products-list product-list-in-box" id="seccion_lista_conversaciones">                                
                                <!-- Inicio bucle -->                               
                                  @include('admin.mensajes.secciones.listado_conversaciones')                              
                                <!-- Fin bucle -->
                            </ul>
                          </div>
                      </div>
                  </div>                  
                </div>
                <div class="col-md-8" id="seccion_conversacion">
                  @include('admin.mensajes.secciones.conversacion')              
                </div>
              </div>
            </div>
          </div>  
        </div>
      </div>                  
    </section>
  </div>
@endsection
@section('script') 
  <script src="{{ asset('js/mensaje.js') }}"></script>
@endsection