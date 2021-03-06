<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="reconocelo, incentivos, premios, opisa">
        <title>Reconócelo</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link href="assets/css/ReconoceloStyles.css?a" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
        <link rel="shortcut icon" href="assets/images/reconocelo.ico" type="image/x-icon" />  
        <script src="https://kit.fontawesome.com/4d404e5112.js" crossorigin="anonymous"></script>
    </head>
    <body class="animated apareciendo">
        <div class="container-fluid  pxy-0 mxy-0 animated apareciendo" >
            <div class="row justify-content-center mt-2 mb-4">
                <div class="col align-self-start">
                    <div class="row  justify-content-start animated apareciendo">
                        <div class="col-10 col-md-7">
                            <img class="card-img-top px-4 py-4" src="assets/images/reconocelo.png" alt="Card image cap">
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
                        <div id="messageIniciar"></div>
                        <div class="card-header text-center"><h5 class="text-muted"> Iniciar sesión</h5></div>
                        <p class="text-center pb-4 pt-4 iconoColorSession"> <i class="fas fa-user fa-10x"></i></p>
                        <div class="card-body pxy-4">
                            <div class="row mt-4 mb-4">
                                <div class="col ">
                                    <!-- <form class="form-signin" role="form"> -->
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
                                        <button class="btn btn-primary text-center btn-block" onclick="loginReconocelo()"><i class="fas fa-sign-in-alt"></i> Entrar</button>
                                        <span id="loading" style="display:none;">
                                            <div class="fa-3x text-center">
                                                <i class="fas fa-spinner fa-pulse"></i>
                                            </div>
                                        </span>
                                        <small class="form-text text-muted text-center">  
                                            Para una correcta visualizaci&ograve;n del sitio se recomienda el uso de
                                            Chrome, Firefox
                                        </small>
                                        <small class="form-text text-muted text-center">  
                                            <a href="<?php echo site_url('Recuperar_usuario') ?>" target="_blank"><h5>Olvidaste tu contraseña?</h5></a>
                                        </small>
                                    <!-- </form>  -->
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="assets/js/functions.js"></script>
        <!-- Linea de codigo, del chatBot-->
        <!--<script src="https://account.snatchbot.me/script.js"></script><script>window.sntchChat.Init(67708)</script> -->
        <!-- fin Linea de codigo, del chatBot-->
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-167543925-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'UA-167543925-1');
        </script>
    </body>
</html>
