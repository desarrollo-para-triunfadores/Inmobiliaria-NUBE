@if ($errors->any())
<div class="alert alert-warning alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-exclamation-circle"></i> ¡Atención!</h4> {{Session::get('message')}}    
    <ul>
        @foreach($errors->all() as $error)
        <li>
            {{ $error }}
        </li>
        @endforeach
    </ul> 
</div>
@endif