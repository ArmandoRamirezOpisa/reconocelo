        <div id="messageCanjeAlert mt-5" class="container"></div>
        <div class="container mt-5">
            <div class="row">
                <div class="col">
                    <div class="form-check form-check-inline">
                        <label class="form-check-label" for="defaultCheck1">Fecha inicio:</label>
                        <select class="form-control" id="fechaInicio" onchange="fechaInicioFinSelectCanje()">
                            <option value='selecciona'>Selecciona:</option>
                            <?php
                                if ($canje){
                                    foreach($canje as $row){
                                        echo '<option value="'.$row['Fecha'].'">'.$row['Fecha'].'</option>';
                                    }
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check form-check-inline">
                        <label class="form-check-label" for="defaultCheck1">Fecha fin:</label>
                        <select class="form-control" id="fechaFin" onchange="fechaInicioFinSelectCanje()">
                            <option value='selecciona'>Selecciona:</option>
                            <?php
                                if ($canje){
                                    foreach($canje as $row){
                                        echo '<option value="'.$row['Fecha'].'">'.$row['Fecha'].'</option>';
                                    }
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check form-check-inline">
                        <label class="form-check-label" for="inlineCheckbox2"><strong>Total de puntos: </strong><span id="totalNumPuntosCanjes"></span></label>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div id="CanjeInformacion"></div>
        </div>
        <hr>
        <div class="container">
            <div class="row">
                <div class="col-6"><h2>Cancelar Canje</h2></div>
                <div class="col-6">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cancelarCanjeData">
                    <i class="fas fa-times-circle"></i> Cancelar Canje
                    </button>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="cancelarCanjeData" tabindex="-1" role="dialog" aria-labelledby="cancelarCanjeDataLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cancelarCanjeDataLabel">Cancelar Canje</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="messageCancelarCanje"></div>
                        <form>
                            <div class="form-group">
                                <label for="codePrograma">Codigo de programa</label>
                                <input type="text" class="form-control" id="codPrograma" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="folioCanje">Folio Canje</label>
                                <input type="text" class="form-control" id="folioCanje">
                            </div>
                            <button type="button" id="btnCancelarOrden" class="btn btn-danger btn-block" onclick="cancelarCanje()"><i class="fas fa-times-circle"></i> Cancelar</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.getElementById("navegacionMonitor").innerHTML = "<h1>Información de los canjes</h1>";
            $( document ).ready(function() {
                canjes();
            });
        </script>