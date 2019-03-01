<!DOCTYPE html>
<html  ng-app="monitor" >
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Expires" content="0">
        <meta http-equiv="Last-Modified" content="0">
        <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
        <meta http-equiv="Pragma" content="no-cache">
        <title>Monitor Reconocelo</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="shortcut icon" href="../../assets/images/reconocelo.ico" type="image/x-icon" />  
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script> 
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css">
        <link href="../../assets/css/2018ReconoceloMonitor.css?ab" rel="stylesheet" type="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="../../assets/js/papaparse.min.js"></script>
    </head>
    <body ng-controller="monitor_controller" onLoad="if ('Navigator' == navigator.appName)document.forms[0].reset();">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg">
            <a id="inicioMonitor" class="navbar-brand" href="https://www.reconocelo.com.mx/monitor/">
                <img src="../../assets/images/monitorLog.png" width="150" height="30" alt="">
            </a>
        </nav>
        <!-- Navigation --> 
        <div class="container">
            <div class="row justify-content-center mb-4 mt-3">
                <div id="navegacionMonitor" class="card-deck mt-3">
                    <img src="../../assets/images/reconocelo.png" class="img-fluid" alt="Responsive image">
                </div>
            </div>
        </div>

        <div class="container">
            <div id="MessageRecuperar"></div>
            <form>
                <div class="form-group">
                    <label for="exampleFormControlSelect1"><strong>Contraseña*</strong></label>
                    <input type="password" class="form-control" id="passwordNew">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1"><Strong>Confirmar contraseña*</strong></label>
                    <input type="password" class="form-control" id="passwordConfirmNew">
                </div>
                <button type="button" id="<?php echo $user.'-'.$cod;?>" class="btn btn-primary" onClick = "configNew(this)"><i class="fas fa-save"></i> Cambiar contraseña</button>
            </form>
        </div>



        <script src="../../assets/js/notify.js?ab"></script>
        <script src="../../assets/js/angular.min.js" type="text/javascript"></script>
        <script src="../../assets/js/angular-sanitize.js" type="text/javascript"></script>
        <script src="../../assets/js/angular-route.min.js" type="text/javascript"></script>
        <script src="../../assets/js/_01_Controller_Routing.js" type="text/javascript"></script>
        <script src="../../assets/js/functionsMonitor.js?ab"></script>
        <!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="../../assets/js/papaparse.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <!--<script src="https://code.jquery.com/jquery-3.3.1.js"></script>-->
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
        <script src="../../assets/js/controller.js?ab"></script> 
        <script>
            //loadSection("nav_monitor_controller/getNavegacionParticipante", "navegacion");
        </script>

        <script>
            document.getElementById("navegacionMonitor").innerHTML = "<h1>Recuperar contraseña</h1>";
        </script>
    </body>
</html>