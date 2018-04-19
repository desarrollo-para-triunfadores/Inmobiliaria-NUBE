@foreach($mensajes as $mensaje) 
  @if ($mensaje->mensaje_enviado())
    <!-- Message to the right -->
    <div class="direct-chat-msg right">
      <div class="direct-chat-info clearfix">
      <span class="direct-chat-name pull-right">{{Auth::user()->name}}</span>
        <span class="direct-chat-timestamp pull-left">
          {{$mensaje->created_at->format('d/m/Y h:i A')}}          
          @if ($mensaje->mensaje_leido())
            <i class="fa fa-check-circle-o" style="color:cornflowerblue" aria-hidden="true"></i>                
          @else
            <i class="fa fa-check-circle-o" aria-hidden="true"></i>                
          @endif        
        </span>
      </div>
      <img class="direct-chat-img" src="{{ asset('imagenes/usuarios/'. Auth::user()->imagen) }} " alt="message user image">
      <div class="direct-chat-text">                
        {{$mensaje->mensaje}}
      </div>
    </div>
  @else
    <!-- Message. Default to the left -->
    <div class="direct-chat-msg">
      <div class="direct-chat-info clearfix">
        <span class="direct-chat-name pull-left">{{$conversacion_abierta->obtener_usuario_restante()->user->name}}</span>
        <span class="direct-chat-timestamp pull-right">{{$mensaje->created_at->format('d/m/Y h:i A')}}</span>
      </div>
      <img class="direct-chat-img" src="{{ asset('imagenes/usuarios/'.$conversacion_abierta->obtener_usuario_restante()->user->imagen) }} " alt="message user image">
      <div class="direct-chat-text">
        {{$mensaje->mensaje}}
      </div>
    </div>  
  @endif
@endforeach
      