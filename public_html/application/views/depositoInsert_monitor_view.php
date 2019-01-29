<!DOCTYPE html>
<html  ng-app="monitor" >
<?php
include 'home_monitor_view_header.php';
?>

        <div class="container">

            <div id="MessageInsertarDepositos"></div>

            <div class="alert alert-warning" role="alert">
                <h4 class="alert-heading">Advertencia!</h4>
                <p>Para subir el archivo es necesario que tenga la extensión CSV</p>
            </div>

            <form>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Sube tu archivo CSV</label>
                    <input type="file" class="form-control-file" id="file-CSV" accept=".csv" required>
                </div>
                <div class="form-group">
				    <button type="button" id="subirArchivoDepositos" class="btn btn-primary"><i class="fas fa-upload"></i> Subir archivo</button>
			    </div>
            </form>

            <div id="parsed_csv_list"></div>

        </div>

<?php
include 'home_monitor_view_footer.php';
?>

        <script>
            //titulo
            document.getElementById("navegacionMonitor").innerHTML = "<h1>Insertar depósitos</h1>";

            $(document).ready(function () {
                activarDepositosSubidos();
            });

            //boton para leer un archivo csv
            $('#subirArchivoDepositos').on("click",function(e){
				e.preventDefault();
				$('#file-CSV').parse({
					config: {
						delimiter: "auto",
						complete: ProcesarInfoDepositos,
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
			function ProcesarInfoDepositos(results){

                var data = results.data;
                console.log(data);

                $.ajax({
                    url: '/monitor/uploadDepositosNews',
                    async: 'true',
                    cache: false,
                    contentType: "application/x-www-form-urlencoded",
                    global: true,
                    ifModified: false,
                    processData: true,
                    data: { "infoNewsDepositos": data },
                    beforeSend: function() {
                        console.log('Procesando, espere por favor...');
                    },
                    success: function(result) {
                        if (result == "0") {
                            console.log("Expiro");
                            $('#MessageInsertarDepositos').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error!</strong> Error al cargar el archivo.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
						    console.log("ERROR:", err, file);
                        } else {
                            console.log('Correcto');
                            $('#MessageInsertarDepositos').html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Exito!</strong>El archivo se cargo, exitosamente, se ha enviado una notificación al tu corrreo electrónico.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                            console.log("Se cargo exitosamente");
                            $("#file-CSV").val("");
                            activarDepositosSubidos();
                        }
                    },
                    error: function(object, error, anotherObject) {
                        console.log('Mensaje: ' + object.statusText + 'Status: ' + object.status);
                    },
                    timeout: 30000,
                    type: "POST"
                });
                
            }

            function activarDepositosSubidos(){
                $.ajax({
                    url: '/monitor/depositosSubidos',
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
                        }
                    },
                    timeout: 30000,
                    type: "GET"
                });
            }
        </script>
</body>
</html>