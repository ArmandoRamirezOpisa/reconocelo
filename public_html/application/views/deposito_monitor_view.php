        <div class="container mt-5" id="alertFiltroDeposito"></div>

        <div class="container mt-5">
            <div class="row">
                <div class="col">
                    <div class="form-check form-check-inline">
                        <label class="form-check-label" for="defaultCheck1"><strong>Fecha inicio:</strong></label>
                        <select class="form-control" id="fechaInicio" onchange="fechaInicioFinSelect()">
                            <option value='selecciona'>Selecciona:</option>
                            <?php
                                if ($deposito){
                                    foreach($deposito as $row){
                                        echo '<option value="'.$row['Fecha'].'">'.$row['Fecha'].'</option>';
                                    }
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check form-check-inline">
                        <label class="form-check-label" for="defaultCheck1"><strong>Fecha fin:</strong></label>
                        <select class="form-control" id="fechaFin" onchange="fechaInicioFinSelect()">
                            <option value='selecciona'>Selecciona:</option>
                            <?php
                                if ($deposito){
                                    foreach($deposito as $row){
                                        echo '<option value="'.$row['Fecha'].'">'.$row['Fecha'].'</option>';
                                    }
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check form-check-inline">
                        <label class="form-check-label" for="inlineCheckbox2"><strong>Total de puntos: </strong><span id="totalNumPuntos"></span></label>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div id="depositoInformacion"></div>
        </div>

        <script>
            document.getElementById("navegacionMonitor").innerHTML = "<h1>Información de los depósitos</h1>";
            $( document ).ready(function() {
                depositos();
            });
        </script>