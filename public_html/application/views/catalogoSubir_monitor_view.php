        <div class="container mt-5">
            <div id="MessageSubeCatalogo"></div>
            <div class="alert alert-warning" role="alert">
                <h4 class="alert-heading">Advertencia!</h4>
                <p>Para subir el archivo es necesario que tenga la extensión CSV</p>
            </div>
            <form id="frmCatalogo" role="form">
                <div class="form-group">
                    <label for="exampleFormControlFile1">Sube tu archivo CSV</label>
                    <input type="file" class="form-control-file" id="file-CSV" accept=".csv" required>
                </div>
                <div class="form-group">
				    <button type="button" id="subirCatalogo" class="btn btn-primary"><i class="fas fa-upload"></i> Subir archivo</button>
			    </div>
            </form>
            <div id="parsed_csv_list"></div>
        </div>
        <script>
            document.getElementById("navegacionMonitor").innerHTML = "<h1>Subir catalogo Reconocelo</h1>";
            $('#subirCatalogo').on("click",function(e){
				e.preventDefault();
                const input = document.querySelector('input[type="file"]');
                const reader = new FileReader();
                reader.onload = function(){
                    const lines =  reader.result.split('\n').map(function(line){
                        return line.split(';');
                    });
                    $.ajax({
                        url: '/Monitor/uploadCatalogoNews',
                        async: 'true',
                        cache: false,
                        contentType: "application/x-www-form-urlencoded",
                        global: true,
                        ifModified: false,
                        processData: true,
                        dataType: 'json',
                        data: { "infoNewCatalogo": lines },
                        beforeSend: function() {
                            $('#MessageSubeCatalogo').html('<i class="fas fa-sync-alt fa-spin upload-catalogo"></i>');
                        },
                        success: function(result) {
                            if (result == false) {
                                $('#MessageSubeCatalogo').html('<i class="fas fa-sync-alt fa-spin upload-catalogo"></i>');
                            } else {
                                $('#MessageSubeCatalogo').html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Exito!</strong>El archivo se cargo, exitosamente.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                                $("#file-CSV").val("");
                            }
                        },
                        error: function(object, error, anotherObject) {},
                        /*timeout: 30000,*/
                        type: "POST"
                    });
                }
                reader.readAsText(input.files[0]);
			});
        </script>