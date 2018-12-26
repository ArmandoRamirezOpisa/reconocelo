<html>
    <head>
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="shortcut icon" href="../../assets/images/monitorLogLink.png" type="image/x-icon" />
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script>
        <title>Mantenimiento Reconocelo</title>
    </head>
    <body>

        <nav id="menu-mantenimiento" class="navbar navbar-expand-lg navbar-light bg-light">

            <!-- Image and text -->
            <nav class="navbar navbar-light bg-light">
                <a class="navbar-brand" href="/mantenimiento/home">
                    <img src="../../assets/images/reconocelo.png" width="30" height="30" class="d-inline-block align-top" alt="">
                    Reconocelo
                </a>
            </nav>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/mantenimiento/home">Inicio <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/mantenimiento/participantes">Participantes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/mantenimiento/premios">Premios</a>
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

        <div id="alertMessage" class="container" style="display:none;">

            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Advertencia!</strong> Hay algunos campos vacios.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        </div>

        <div class="container" style="margin-top: 100px;">
            
            <div class="row">
                <div class="col-sm"></div>
                <div class="col-sm">
                    <h1>Participantes</h1>
                </div>
                <div class="col-sm"></div>
            </div>

            <form>
                <div class="form-group">
                    <label for="idParticipante">Id participante</label>
                    <input type="number" class="form-control" id="idParticipante">
                </div>
                <div class="form-group">
                    <label for="codPrograma">Codigo de programa</label>
                    <input type="number" class="form-control" id="codPrograma">
                </div>
                <div class="form-group">
                    <label for="codEmpresa">Codigo empresa</label>
                    <input type="number" class="form-control" id="codEmpresa">
                </div>
                <div class="form-group">
                    <label for="codParticipante">Codigo participante</label>
                    <input type="number" class="form-control" id="codParticipante">
                </div>
                <div class="form-group">
                    <label for="cargo">Cargo</label>
                    <input type="text" class="form-control" id="cargo">
                </div>
                <div class="form-group">
                    <label for="primerNombre">Primer nombre</label>
                    <input type="text" class="form-control" id="primerNombre">
                </div>
                <div class="form-group">
                    <label for="segundoNombre">Segundo nombre</label>
                    <input type="text" class="form-control" id="segundoNombre">
                </div>
                <div class="form-group">
                    <label for="apellidoPaterno">Apellido paterno</label>
                    <input type="text" class="form-control" id="apellidoPaterno">
                </div>
                <div class="form-group">
                    <label for="apellidoMaterno">Apellido materno</label>
                    <input type="text" class="form-control" id="apellidoMaterno">
                </div>
                <div class="form-group">
                    <label for="calleNumero">Calle y numero</label>
                    <input type="text" class="form-control" id="calleNumero">
                </div>
                <div class="form-group">
                    <label for="colonia">Colonia</label>
                    <input type="text" class="form-control" id="colonia">
                </div>
                <div class="form-group">
                    <label for="cp">Codigo postal</label>
                    <input type="number" class="form-control" id="cp">
                </div>
                <div class="form-group">
                    <label for="ciudad">Ciudad</label>
                    <input type="text" class="form-control" id="ciudad">
                </div>
                <div class="form-group">
                    <label for="estado">Estado</label>
                    <input type="text" class="form-control" id="estado">
                </div>
                <div class="form-group">
                    <label for="pais">Pais</label>
                    <input type="text" class="form-control" id="pais">
                </div>
                <div class="form-group">
                    <label for="telefono">Telefono</label>
                    <input type="tel" class="form-control" id="telefono">
                </div>
                <div class="form-group">
                    <label for="password">Contrasena</label>
                    <input type="password" class="form-control" id="password">
                </div>
                <div class="form-group">
                    <label for="email">Correo electronico</label>
                    <input type="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <label for="loginweb">Login web</label>
                    <input type="number" class="form-control" id="loginweb">
                </div>
                <button id="participanteBtn" type="button" class="btn btn-primary btn-lg btn-block" onclick="saveParticipante()"><i id="btnIcon" class="fas fa-save"></i> Guardar</button>
            </form>

        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cerrar sesion</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Estas seguro de salir?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" onclick="salirMantenimiento()">Salir</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="../assets/js/functionsMantenimiento.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    </body>
</html>