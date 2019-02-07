                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Advertencia!</strong> Tienes que subir un archivo csv.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
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
                    <button type="button" class="btn btn-primary" onclick="subirVariosParticipantes()"><i class="fas fa-upload"></i> Subir</button>
                </form>