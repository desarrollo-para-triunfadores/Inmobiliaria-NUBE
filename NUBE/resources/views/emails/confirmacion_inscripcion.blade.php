{{-- EMAIL de NOTIFICACION a interesado cuando el inmueble por el que habia pregintado ya se alquilo por otro --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>correo</title>
    <style>

        .titulo {
            color: #1e80b6;
            padding-top: 20px;
            padding-bottom: 10px;
            padding-left: 20px;
            padding-right: 20px;
        }

        .body{
            background-color: #ECECEC;
        }

        .div_contenido{
            color: #1e80b6;
            padding-top: 20px;
            padding-bottom: 10px;
            padding-left: 20px;
            padding-right: 20px;
            background-color: #ffffff !important;
        }

    </style>
</head>

<body class="body">
<div class="titulo" > <h1>Inmobiliaria Nube</h1></div>
<hr>
<p class=".div_contenido" > Estimado cliente este correo tiene el fin de informale
     que fue creado un usuario para usted en el sistema <em><b>NUBE</b></em>.
      Con ello usted podrá acceder a toda la información sobre sus pagos, boletas 
      y solicitudes de servicio técnico. Le pedimos encarecidamente que al ingresar cambie su contraseña
      autogenerada por otra para así mantener segura su cuenta.
</p>
<ul>
    <li>Usuario: {{$user_nuevo->email}}</li>
    <li>Contraseña: {{$user_nuevo->password}}</li>
  </ul>

<div class=".div_contenido" > Saludos cordiales. <br/> Este mensaje fue autogenerado por: <b>www.InmobiliariaNube.com</b> </div>

</body>
</html>