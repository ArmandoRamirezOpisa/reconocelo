                <div class="alert alert-warning" role="alert">
                    <h4 class="alert-heading">Advertencia!</h4>
                    <p>Para subir el archivo es necesario que tenga la extensión CSV</p>
                </div>
                
                <div class="row">
                    <div class="col-sm">
                        <h1>Registra varios participantes</h1>
                    </div>
                    <div class="col-sm"></div>
                </div>

                <form>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Selecciona un archivo csv, para subir los participantes</label>
                        <input id="archivoParticipantes" type="file" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                    <button id="subirArchivoParticipantesMantenimiento" type="button" class="btn btn-primary"><i class="fas fa-upload"></i> Subir</button>
                </form>

                <script>
                    //boton para leer un archivo csv
                    $('#subirArchivoParticipantesMantenimiento').on("click",function(e){
				        e.preventDefault();
				        $('#archivoParticipantes').parse({
					        config: {
    						    delimiter: "auto",
						        complete: ProcesarInfoParticipantes,
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
			        function ProcesarInfoParticipantes(results){
                        var data = results.data;
                        console.log(data);

                        /*$.ajax({
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
                        });*/

}
                </script>