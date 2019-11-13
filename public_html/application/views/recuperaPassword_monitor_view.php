<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Monitor Reconocelo</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="shortcut icon" href="../assets/images/reconocelo.ico" type="image/x-icon" />  
        <script src="https://kit.fontawesome.com/4d404e5112.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css">
        <link href="../assets/css/ReconoceloMonitor.css" rel="stylesheet" type="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="../assets/js/papaparse.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg">
            <a id="inicioMonitor" class="navbar-brand" href="https://www.reconocelo.com.mx/monitor/">
                <img src="../assets/images/monitorLog.png" width="150" height="30" alt="">
            </a>
        </nav>
        <div class="container">
            <div class="row justify-content-center mb-4 mt-3">
                <div id="navegacionMonitor" class="card-deck mt-3">
                    <img src="../assets/images/reconocelo.png" class="img-fluid" alt="Responsive image">
                </div>
            </div>
        </div>
        <div class="container">
            <div id="MessageRecupera"></div>
            <h2>Escribe tu correo electrónico </h1>
            <form>
                <div class="form-group">
                    <input type="email" class="form-control" id="mailRecuperar" aria-describedby="emailHelp" placeholder="Aqui escribe tu correo electrónico">
                </div>
                <button type="button" class="btn btn-primary btn-block" onClick = "sendRecuperaPassword()"><i class="fas fa-envelope"></i> Enviar Correo</button>
            </form>
        </div>
        <script>
            document.getElementById("navegacionMonitor").innerHTML = "<h1>Recuperar contraseña</h1>";
        </script>