        <div id="MessageDepositoMantenimiento" class="container animated apareciendo" style="display:none; margin-top: 50px; margin-botton:150px;"></div>
        <div class="container animated apareciendo" style="margin-top: 100px;">
            <div class="row animated apareciendo">
                <div class="col-md-12">
                    <h1>Subir depositos</h1>
                </div>
            </div>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Advertencia!</strong> 
                <p>Debes de subir un archivo con la extencion csv.</p>
                <p>Descarga el siguiente formato para que subas los depositos <a href="http://35.236.41.75/reconocelo/assets/images/SubirDepositosMantenimiento.csv" class="text-info">Descargar</a> </p>
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
        <script>
            $(document).ready(function () {
                activarDepositosSubidosMantenimiento();
            });
            $('#subirArchivoDepositosMantenimiento').on("click",function(e){
				e.preventDefault();
				$('#file-CSV-mantenimiento').parse({
					config: {
						delimiter: "auto",
						complete: ProcesarInfoDepositosMantenimiento,
					},
					before: function(file, inputElem){},
					error: function(err, file){},
					complete: function(){}
				});
			});
			function ProcesarInfoDepositosMantenimiento(results){
                var data = results.data;
                $.ajax({
                    url: '/Mantenimiento/uploadDepositosNewsMantenimiento',
                    async: 'true',
                    cache: false,
                    contentType: "application/x-www-form-urlencoded",
                    global: true,
                    ifModified: false,
                    processData: true,
                    data: { "infoNewsDepositosMantenimiento": data },
                    beforeSend: function() {},
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
                    url: '/Mantenimiento/depositosSubidosMantenimiento',
                    async: 'true',
                    cache: false,
                    contentType: "application/x-www-form-urlencoded",
                    dataType: "html",
                    error: function(object, error, anotherObject) {},
                    global: true,
                    ifModified: false,
                    processData: true,
                    success: function(result) {
                        if (result == "0") {} else {
                            $('#parsed_csv_list').html(result);
                            $('#parsed_csv_list').show();
                        }
                    },
                    timeout: 30000,
                    type: "GET"
                });
            }
        </script>