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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="../assets/css/ReconoceloLogin_Monitor.css?ab" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="shortcut icon" href="assets/images/monitorLogLink.png" type="image/x-icon" />
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="../assets/js/papaparse.min.js"></script>
        <title>Mantenimiento Reconocelo</title>
    </head>
    <body onLoad="if ('Navigator' == navigator.appName)document.forms[0].reset();" class="animated apareciendo">

        <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light animated apareciendo">
            <nav class="navbar navbar-light bg-light">
                <a class="navbar-brand" href="/mantenimiento/home">
                    <img src="../assets/images/reconocelo.png" width="30" height="30" class="d-inline-block align-top" alt="">
                    Reconocelo
                </a>
            </nav>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/Mantenimiento/home">Inicio <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Mantenimiento/participantes">Participantes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Mantenimiento/premios">Premios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Mantenimiento/uploadDepositos">Depositos</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <div class="btn-group dropleft">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php
                                if ($PrimerNombre){

                                    echo '<i class="fas fa-user"></i> '.$PrimerNombre;

                                }else{

                                    echo '<i class="fas fa-user"></i> Usuario';

                                }
                            ?>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModal">Cerrar sesion</a>
                        </div>
                    </div>
                </form>
            </div>
        </nav>