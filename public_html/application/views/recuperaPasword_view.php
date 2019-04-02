<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <title>Reconocelo</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--<link href="assets/css/bootstrap.min.css" rel="stylesheet">-->
    <link href="assets/css/2018Reconocelo.css?a" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="https://www.reconocelo.com.mx/assets/images/reconocelo.ico" type="image/x-icon" />
  </head>
  <body onLoad="if ('Navigator' == navigator.appName)document.forms[0].reset();" class="animated apareciendo">
    <div class="container animated apareciendo">
      <div id="MessageRecuperaReconocelo mt-5"></div>
      <div class="row justify-content-center mt-4 mb-4">
        <div class="col-12 col-md-4 mt-4">
          <img src="https://www.reconocelo.com.mx/assets/images/reconocelo.png" class="img-fluid mt-4" alt="Responsive image">
        </div>
      </div>
      <div class="row justify-content-center animated apareciendo">
        <div class="col-12 col-md-4">    
          <form class="form-signin" role="form">
            <div class="form-group">
              <label class="lblText mt-4" for="usuario"><b>Ingresa tu correo electr&ograve;nico</b></label>
              <input class="form-control" placeholder="Ingresa tu correo electr&ograve;nico de registro" required="" autofocus="" type="email" name="usuario" id="usuarioEmailReconocelo">
            </div>
          </form>
          <a href="javascript:void(0)" onClick="sendRecuperaPasswordReconocelo()" class="btn btn-primary text-center btn-block">Enviar correo</a>
          <small class="form-text text-muted text-center">  
            Para una correcta visualizaci&ograve;n del sitio se recomienda el uso de
            Chrome, Firefox
          </small>
          <small class="form-text text-muted text-center">  
            <a href="https://www.reconocelo.com.mx"><h5>Iniciar sesion</h5></a> 
          </small>
        </form>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="assets/js/notify.js?ab"></script>
    <script src="assets/js/functions.js?ab"></script>
    <script src="assets/js/login.js?ab"></script>
  </body>
</html>