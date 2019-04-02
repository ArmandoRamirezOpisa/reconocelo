<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Reconócelo</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="../assets/css/ReconoceloStyles.css?a" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
        <link rel="shortcut icon" href="assets/images/reconocelo.ico" type="image/x-icon" />  
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script>
    </head>
    <body class="animated apareciendo">
        <div class="container-fluid  pxy-0 mxy-0 animated apareciendo" >
            <div class="row justify-content-center mt-2 mb-4">
                <div class="col align-self-start">
                    <div class="row  justify-content-start animated apareciendo">
                        <div class="col-10 col-md-7">
                            <img class="card-img-top px-4 py-4" src="../assets/images/reconocelo.png" alt="Card image cap">
                        </div>          
                    </div>
                    <div class="row animated apareciendo">
                        <div class="col">
                            <div class="jumbotron animated apareciendo">
                                <h3 class="lead mt-4 mb-3 titleReconocelo font-weight-bold"><i class="far fa-question-circle mr-1"></i> ¿Qué es Reconócelo.com.mx?</h3>
                                <ul class="lead">
                                    <li>Es un portal mexicano dedicado a programas de reconocimiento a empleados así como de lealtad a empresas distribuidoras por parte de nuestros clientes.</li>
                                    <li>Si usted planea reconocer la antigüedad y el desempeño de sus empleados, Reconócelo es una gran herramienta para hacerlo. </li>
                                    <li>Reconozca la preferencia de sus distribuidores a través de nuestra plataforma de lealtad.</li>
                                    <li>En Reconócelo nuestros usuarios pueden redimir los puntos que obtienen por una amplia variedad de premios en nuestro catálogo.</li>
                                    <li>Reconócelo es un portal mexicano operado por OPISA, empresa líder en la industria de la motivación en México por más de 20 años.</li>
                                </ul>
                                <hr class="my-4">
                                <span class="text-center">
                                    <h2 >Contacte a info@opisa.com para conocer más acerca de nuestro portal.</h2> 
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mt-6 mb-4  align-self-end animated apareciendo">
                    <div class="card mb-3 animated apareciendo">
                        <div class="card-header text-center"><h5 class="text-muted"> Iniciar sesión</h5></div>
                        <p class="text-center pb-4 pt-4 iconoColorSession"> <i class="fas fa-user fa-10x"></i></p>
                        <div class="card-body pxy-4">
                            <div class="row mt-4 mb-4">
                                <div class="col ">
                                    <form class="form-signin" role="form">
                                        <div class="form-group">
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fas fa-user"></i></div>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Usuario (Ingrese sin el guion (-))" name="usuario" id="usuarioReconocelo">
                                            </div>                                      
                                        </div>
                                        <div class="form-group mb-4">
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fas fa-key"></i></div>
                                                </div>
                                                <input type="password" class="form-control" placeholder="Contrase&ntilde;a" name="password" id="passwordReconocelo">
                                            </div>
                                        </div>
                                        <a href="javascript:void(0)" class="btn btn-primary text-center btn-block" onclick="loginReconocelo()">Entrar</a>
                                        <span id="error" display="style:none;">
                                            <p id="mensajeErrorReconocelo" class="mt-4 text-center errorMessage"></p>
                                        </span>
                                        <span id="loading" style="display:none;">
                                            <div class="fa-3x text-center">
                                                <i class="fas fa-spinner fa-pulse"></i>
                                            </div>
                                        </span>
                                        <small class="form-text text-muted text-center">  
                                            Para una correcta visualizaci&ograve;n del sitio se recomienda el uso de
                                            Chrome, Firefox, Internet Explorer 11 o superio
                                        </small>
                                        <small class="form-text text-muted text-center">  
                                            <a href="<?php echo site_url('recuperar_usuario') ?>"><h5>Olvidaste tu contraseña?</h5></a>
                                        </small>
                                    </form> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center footer animated apareciendo">
                <div class="col-auto align-self-center">
                    <span> &#174; Derechos reservados. Reconócelo 2018</span>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="../../assets/js/functions.js?a"></script>
    </body>
</html>