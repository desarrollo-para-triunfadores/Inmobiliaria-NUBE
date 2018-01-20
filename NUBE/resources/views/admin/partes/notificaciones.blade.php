{{--
<li class="dropdown notifications-menu">

    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-bell-o"></i>
        <span class="label label-warning">{{ $oportunidades->count() }}</span>
    </a>
    <ul class="menu">
        <li class="header">Tenés {{ $oportunidades->count() }} nuevas oportunidades</li>
        <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">
                {{--
                <li>
                    <a href="#">
                        <i class="fa fa-warning text-yellow"></i> 0 Oportunidades sin cerrar hace demasiado tiempo
                    </a>
                </li>
                --}}
                {{--}}
                <li>
                    <a href="#">
                        <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                </li>

            </ul>
        </li>
        <li class="footer"><a href="#">Ver todas</a></li>
    </ul>
</li>
--}}

<!-- PRUEBA********************************************************************** -->
<li role="presentation" class="dropdown animated bounce">
    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
        <i class="fa fa-bell-o"></i>
        <span class="label label-success">{{ $oportunidades->count() }}</span>
    </a>
    <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
        <span>
            <span><h4 class="text-facebook">Hay clientes que podrian retirar sus pedidos</h4></span>
        </span>
        <li>
            <a href="">
                <i class="fa fa-users text-aqua"></i> Existen un TOTAL de {{ $oportunidades->count() }} Oportunidades sin cerrar. Con  <b>{{ $oportunidades->where('estado_id',1)->count() }}</b> en estado Inicial
            </a>
        </li>
        @foreach($oportunidades->where('estado_id',1) as $oportunidad)
                    <li>
                        <a>
                            <a data-toggle="tooltip" data-placement="top" title="Visualizar registro. Al visualizar este registro podrá señar la totalidad del pedido o realizar la entrega del pedido" onclick="completar_campos({{$oportunidad}})" class="btn btn-info">
                            <span class="message">
                                <h5 class="text-filter-box"><b>{{$oportunidad->nombre_interesado}}</b> se encuentra interesado en el inmueble de <b>{{$oportunidad->inmueble->direccion}}</b> ({{$oportunidad->inmueble->localidad->nombre}}) </h5>
                            </span>
                            </a>
                        </a>
                    </li>
            @endforeach
                            <!--
            <li>
            <div class="text-center">
                <a href="inbox.html">
                    <strong>Ver todas</strong>
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </li>
        -->
    </ul>
</li>