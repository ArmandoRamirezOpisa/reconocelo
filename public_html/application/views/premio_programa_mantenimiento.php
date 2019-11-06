<div class="container" style="margin-top:100px;">
    <h2>Insertar o Actualizar, Premio Programa</h2>
    <div id="MessagePremioPrograma" class="container animated apareciendo" style="display: block;"></div>
    <hr>
    <div class="alert alert-warning" role="alert">
        <h4 class="alert-heading">Importante!</h4>
        <p>Es importante subir el arhivo correctamente, para que se pueda hacer correctamente</p>
        <hr>
        <!--<p class="mb-0">En caso de que no tengas el archivo ve a siguiente link, para descargar <a href="#">Descargar archivo</a></p>-->
    </div>
    <form>
        <div class="form-group">
            <label for="exampleFormControlFile1">Sube tu archivo CSV</label>
            <input type="file" class="form-control-file" id="file-CSV-premioPrograma" accept=".csv" required>
        </div>
        <div class="form-group">
            <button type="button" id="subirArchivoPremioPrograma" class="btn btn-primary"><i class="fas fa-upload"></i> Subir archivo</button>
        </div>
    </form>
    <div id="resultado"></div>
</div>
<script>
    const message = document.getElementById('MessagePremioPrograma');
    $('#subirArchivoPremioPrograma').on("click",function(e){
        e.preventDefault();
        $('#file-CSV-premioPrograma').parse({
            config: {
                delimiter: "auto",
                complete: ProcesarInfoPremioPrograma,
            },
            before: function(file, inputElem){
                message.style = 'display:block';
                message.innerHTML = "<i class='fas fa-sync fa-spin icon-load' style='font-size: 60px;position: relative;left: 50%;'></i>";
            },
            error: function(err, file){},
            complete: function(){}
        });
    });
    function ProcesarInfoPremioPrograma(results){
        var data = results.data;
        $.ajax({
            url: '/Mantenimiento/uploadPremioPrograma',
            async: 'true',
            cache: false,
            contentType: "application/x-www-form-urlencoded",
            global: true,
            ifModified: false,
            processData: true,
            data: { "infoPremioPrograma": data },
            beforeSend: function() {},
            success: function(result) {
                if (result == "0") {
                    $('#MessagePremioPrograma').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error!</strong> Error al cargar el archivo.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    $('#MessagePremioPrograma').show();
                    $("#file-CSV-premioPrograma").val("");
                } else {
                    $('#MessagePremioPrograma').html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Exito!</strong>El archivo se cargo, exitosamente<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    $('#MessagePremioPrograma').show();
                    $("#file-CSV-premioPrograma").val("");
                    $('#resultado').html(result);
                    $('#resultado').show();
                }
            },
            error: function(object, error, anotherObject) {
                $('#MessagePremioPrograma').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error!</strong>Error: ' + object.statusText + 'Status: ' + object.status + '.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            },
            type: "POST"
        });
    }
</script>