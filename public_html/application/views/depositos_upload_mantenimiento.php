<html>
    <head>
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Expires" content="0">
        <meta http-equiv="Last-Modified" content="0">
        <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
        <meta http-equiv="Pragma" content="no-cache">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="../assets/css/ReconoceloLogin_Monitor.css?ab" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="shortcut icon" href="../../assets/images/monitorLogLink.png" type="image/x-icon" />
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script>
        <script src="../assets/js/papaparse.min.js"></script>
        <title>Mantenimiento Reconocelo</title>
    </head>
    <body onLoad="if ('Navigator' == navigator.appName)document.forms[0].reset();" class="animated apareciendo">

        <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light">

            <!-- Image and text -->
            <nav class="navbar navbar-light bg-light animated apareciendo">
                <a class="navbar-brand" href="/mantenimiento/home">
                    <img src="../../assets/images/reconocelo.png" width="30" height="30" class="d-inline-block align-top" alt="">
                    Reconocelo
                </a>
            </nav>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse animated apareciendo" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/mantenimiento/home">Inicio <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/mantenimiento/participantes">Participantes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/mantenimiento/premios">Premios</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/mantenimiento/uploadDepositos">Depositos</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <div class="btn-group dropleft">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php
                                if ($PrimerNombre){

                                    echo '<i class="fas fa-user"></i> '.$PrimerNombre;

                                }else{

                                    echo '<i class="fas fa-user"></i> Usuario Mantenimiento';

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
        
        <div id="MessageDepositoMantenimiento" class="container animated apareciendo margin-botton:150px;" style="display:none;" style="margin-top: 50px;"></div>

        <div class="container animated apareciendo" style="margin-top: 100px;">

            <div class="row animated apareciendo">
                <div class="col-md-12">
                    <h1>Subir depositos</h1>
                </div>
            </div>

            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Advertencia!</strong> 
                <p>Debes de subir un archivo con la extencion csv.</p>
                <p>Descarga el siguiente formato para que subas los depositos <a href="https://www.reconocelo.com.mx/assets/images/SubirDepositosMantenimiento.csv" class="text-info">Descargar</a> </p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Sube tu archivo CSV</label>
                    <input type="file" class="form-control-file" id="file-CSV-mantenimiento" accept=".csv" required>
                </div>
                <div class="form-group">
				    <button type="button" id="subirArchivoDepositosMantenimiento" class="btn btn-primary"><i class="fas fa-upload"></i> Subir archivo</button>
			    </div>
            </form>

            <div id="parsed_csv_list"></div>

        </div>

        <!-- Modal Salir -->
        <div class="modal fade animated apareciendo" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

        <script src="../assets/js/functionsMantenimiento.js?ab"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.js" integrity="sha256-fNXJFIlca05BIO2Y5zh1xrShK3ME+/lYZ0j+ChxX2DA=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="../assets/js/papaparse.min.js"></script>

        <script>

            $(document).ready(function () {
                activarDepositosSubidosMantenimiento();
            });

            //boton para leer un archivo csv
            $('#subirArchivoDepositosMantenimiento').on("click",function(e){
				e.preventDefault();
				$('#file-CSV-mantenimiento').parse({
					config: {
						delimiter: "auto",
						complete: ProcesarInfoDepositosMantenimiento,
					},
					before: function(file, inputElem)
					{
						console.log("Cargando archivo...", file);
					},
					error: function(err, file)
					{
                        //
					},
					complete: function()
					{
                        console.log("Todo salio de maravill");
					}
				});
			});
            
            //funcion que pasa a la base de datos
			function ProcesarInfoDepositosMantenimiento(results){

                var data = results.data;

                $.ajax({
                    url: '/mantenimiento/uploadDepositosNewsMantenimiento',
                    async: 'true',
                    cache: false,
                    contentType: "application/x-www-form-urlencoded",
                    global: true,
                    ifModified: false,
                    processData: true,
                    data: { "infoNewsDepositosMantenimiento": data },
                    beforeSend: function() {
                        console.log('Procesando, espere por favor...');
                    },
                    success: function(result) {
                        if (result == "0") {
                            $('#MessageDepositoMantenimiento').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error!</strong> Error al cargar el archivo.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                            $('#MessageDepositoMantenimiento').show();
                        } else {
                            $('#MessageDepositoMantenimiento').html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Exito!</strong>El archivo se cargo, exitosamente, se ha enviado una notificación al tu corrreo electrónico.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                            $('#MessageDepositoMantenimiento').show();
                            $("#file-CSV-mantenimiento").val("");
                            activarDepositosSubidosMantenimiento();
                        }
                    },
                    error: function(object, error, anotherObject) {
                        $('#MessageDepositoMantenimiento').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error!</strong>Error: ' + object.statusText + 'Status: ' + object.status + '.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    },
                    timeout: 30000,
                    type: "POST"
                });
                
            }

            function activarDepositosSubidosMantenimiento(){
                $.ajax({
                    url: '/mantenimiento/depositosSubidosMantenimiento',
                    async: 'true',
                    cache: false,
                    contentType: "application/x-www-form-urlencoded",
                    dataType: "html",
                    error: function(object, error, anotherObject) {
                    console.log('Mensaje: ' + object.statusText + 'Status: ' + object.status);
                    },
                    global: true,
                    ifModified: false,
                    processData: true,
                    success: function(result) {
                        if (result == "0") {
                            console.log("Expiro");
                        } else {
                            $('#parsed_csv_list').html(result);
                            $('#parsed_csv_list').show();
                        }
                    },
                    timeout: 30000,
                    type: "GET"
                });
            }
        </script>

    </body>
</html>