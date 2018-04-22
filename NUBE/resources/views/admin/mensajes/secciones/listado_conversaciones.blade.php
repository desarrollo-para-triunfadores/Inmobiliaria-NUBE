@foreach($conversaciones as $conversacion)                    
    <li style="cursor: pointer" class="item li_item" onclick="obtener_mensajes({{$conversacion->id}})" id="{{$conversacion->id}}" nombre="{{$conversacion->obtener_usuario_restante()->user->name}}">
        <div class="product-img">
            <img src="{{ asset('imagenes/usuarios/'.$conversacion->obtener_usuario_restante()->user->imagen) }} " alt="Product Image">
        </div>
        <div class="product-info">
            <a href="javascript:void(0)" class="product-title">{{$conversacion->obtener_usuario_restante()->user->name}}
                
                <span class="direct-chat-timestamp pull-right">
                    {{$conversacion->mensajes->last()->created_at->format('d/m/Y h:i A')}}
                </span>                     
            </a>
            @if($conversacion->cant_mensajes_sin_leer()>0)
                <br>
                <span class="label label-warning">sin leer: {{$conversacion->cant_mensajes_sin_leer()}}</span>
            @endif
            <span class="product-description">
                {{$conversacion->mensajes->last()->mensaje}}
            </span>
        </div>
    </li>          
@endforeach