
    <br>
    @if ($errors->any())
    <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-exclamation-circle"></i><strong>¡Atención!</strong></h4>
        Se encontraron incovenientes al registrar los datos ingresados. Puedes verificarlos intentando registrar otra vez el elemento.                                                           
    </div>
    @endif


    @if(Session::has('message'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check-circle"></i> ¡Exito!</h4> {{Session::get('message')}}    
    </div>
    @endif
   
