<!DOCTYPE html >
<html ng-app="ControllerWorks">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Reconocelo</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="../../assets/css/2018Reconocelo.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <script src="https://use.fontawesome.com/1f2183b84e.js"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--     WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
        <link rel="shortcut icon" href="../../assets/images/reconocelo.ico" type="image/x-icon" />
    </head>
    <body ng-controller="Reconocelo" data-ng-init="init()">
        <div id="navbar"></div>
        <div class="row justify-content-center mt-4 mb-4">
            <div class="col-12 col-md-4 mt-4">
                <img src="../../assets/images/reconocelo.png" class="img-fluid mt-4" alt="Responsive image">
            </div>
        </div>









<div class="row">
    <div class="col-12">
        <h1 class="text-center"><i class="far fa-life-ring  mr-2"></i>Bienvenido al Centro de Respuestas Reconócelo</h1>
        <p class="text-center lead">Aqui podras visualizar las respuestas a tus preguntas realizadas</p>
    </div>
</div>

<div class="row justify-content-center mt-4">
    
    <div class="col-8">  

        <?php
            if ($tickets){
                echo '
                    <div class="card text-center">
                        <div class="card-header">
                            Featured
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Special title treatment</h5>
                            <p class="card-text">
                                With supporting text below as a natural lead-in to additional content.
                            </p>
                            <a href="#" class="btn btn-primary">
                                Go somewhere
                            </a>
                        </div>
                        <div class="card-footer text-muted">
                            2 days ago
                        </div>
                    </div>
                ';
            }else{
                echo '<h1>No hay tickets</h1>';
            }
        ?>

    </div>  
</div>
<script>
up();
</script>















        <div class="row mt-5 fixed-bottom justify-content-center" style="background: #034889;color: #F25917;">
            <div class="col-auto " id="footer">
                <a href="javascript:void(0)" onclick="loadSection('aviso_controller', 'dvSecc')" class="linkPrivacy">Aviso de privacidad</a>
            </div>
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="../../assets/js/notify.js"></script>
        <script src="../../assets/js/functions.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="../../assets/js/controller.js"></script>
        <script>
                            loadSection("cart_controller/getCategory", "dvSecc");
                            // loadSection("login_controller/getSaldoUser","dvSecc");
                            loadSection("cart_controller/getCategoryNavbar", "navbar");
        </script>
        <!--<script>
                    swal("¡Bienvenido a Reconócelo!", "Esperamos que disfrutes tu estancia en nuestro programa de incentivos.");
        </script> -->
    </body>
</html>