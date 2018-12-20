<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Mantenimiento Reconocelo</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="../assets/css/ReconoceloLogin_Monitor.css" rel="stylesheet">
         <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
         <link rel="shortcut icon" href="assets/images/monitorLogLink.png" type="image/x-icon" />
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">          
            <div class="row justify-content-center mb-4 mt-3">
                <div class="col-12 col-md-6 mt-4 ">
                    <div class="card-deck mt-3">
                        <div class="card bg-ligh">
                            <img src="../assets/images/reconocelo.png" class="img-fluid" alt="Responsive image">
                            <div class="card-body">
                                <form>
                                    <p class="card-title text-center mt-4 h2">Iniciar sesión</p>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="input-group  mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Usuario</span>
                                                </div>
                                                <input type="text" class="form-control" type="number" id="user" oninput="this.value = this.value.toUpperCase()" placeholder="Ejem: Usuario01">
                                            </div>
                                            <div class="input-group  mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Contraseña</span>
                                                </div>
                                                <input type="password" class="form-control" id="password" placeholder="Ejem: *****">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-end">
                                        <div class="col-12 col-md-12">
                                            <div class="form-group mb-0">
                                                <button type="submit" class="btn btn-primary btn-block font-weight-bold" onclick="loginMantenimiento()"><i class="fas fa-sign-in-alt mr-2"></i>Entrar</button>
                                            </div>
                                        </div>
                                    </div>
                                 </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <script src="../assets/js/angular.min.js" type="text/javascript"></script>
        <script src="../assets/js/functionsMantenimiento.js"></script>
        <script src="../assets/js/angular-sanitize.js" type="text/javascript"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    </body>
</html>