
<html><head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Inmobiliaria NUBE | Ingresar</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.6 -->
<link type="text/css" rel="stylesheet" href="{{ asset('plantillas/AdminLTE/bootstrap/css/bootstrap.min.css') }}  ">
        <!-- Font Awesome -->
        <link href="{{ asset('plantillas/AdminLTE/plugins/fontawesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<!-- Theme style -->
<link type="text/css" rel="stylesheet" href="{{ asset('plantillas/AdminLTE/dist/css/AdminLTE.min.css') }}  ">
        <!-- iCheck -->
        <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css">

        <link href="{{ asset('plantillas/AdminLTE/plugins/iCheck/square/blue.css') }}" rel="stylesheet" type="text/css"/>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                 <a href="../../index2.html">Inmobiliaria<b> NUBE</b></a><br>
                   <small>sistema de gestión integral</small>
            </div>         
            <!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg">Inicie sesión para ingresar al sistema</p>

                <form method="POST" action="{{ url('/login') }}">
                    {{ csrf_field() }}
                    <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="form-group has-feedback">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        </div>
                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="form-group has-feedback">
                            <input id="password" type="password" class="form-control" name="password">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>
                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="checkbox icheck">
                                <label class="">
                                    <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Recuérdame
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
                        </div>
                    </div>
                </form>
                <a href="#">Recuperar mi contraseña</a><br>

            </div>
        </div>

        <!-- jQuery 2.2.3 -->
        <script src="{{ asset('plantillas/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="{{ asset('plantillas/AdminLTE/bootstrap/js/bootstrap.min.js') }}"></script>
        <!-- iCheck -->
        <script src="{{ asset('plantillas/AdminLTE/plugins/iCheck/icheck.min.js') }}"></script>      

        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' // optional
                });
            });
        </script>


    </body>
</html>