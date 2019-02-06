<!DOCTYPE html>
<html  ng-app="monitor" >
<?php
include 'home_monitor_view_header.php';
?>
        <div class="container">
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
            <div id="CanjeInformacion">
                <!-- Aqui va la tabla -->
            </div>

        </div>

<?php
include 'home_monitor_view_footer.php';
?>

        <script>
            document.getElementById("navegacionMonitor").innerHTML = "<h1>Información de los canjes</h1>";
            canjes();

        </script>-
</body>
</html>