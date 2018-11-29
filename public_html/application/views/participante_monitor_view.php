<!DOCTYPE html>
<html  ng-app="monitor" >
<?php
include 'home_monitor_view_header.php';
?>
        
        <div class="container">

            <div class="row">

                <div class="col">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="TodosSaldo" onchange= "filtroParticipantes(this)" value="Todos" checked="checked">
                        <label class="form-check-label" for="inlineRadio1">Todos</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Saldo" onchange= "filtroParticipantes(this)"  value="conSaldo">
                        <label class="form-check-label" for="inlineRadio1">Con saldo</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="sinSaldo" onchange= "filtroParticipantes(this)" value="sinSaldo">
                        <label class="form-check-label" for="inlineRadio2">Sin saldo</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Todos" value="Todos" checked="checked">
                        <label class="form-check-label" for="inlineRadio1">Todos</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Activo" value="Activo">
                        <label class="form-check-label" for="inlineRadio1">Con saldo</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Inactivo" value="Inactivo">
                        <label class="form-check-label" for="inlineRadio2">Sin saldo</label>
                    </div>


                    <!--<div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" value="estadoPariticipante" id="estadoPariticipante" onclick="estadoParticipante(this)">
                        <label class="form-check-label" for="defaultCheck1">
                            Estado
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <select class="form-control" id="selectEstadoParticipante"  onchange="estadoParticipanteSelect()" style="display:none;">
                            <option value='selecciona'>Selecciona:</option>
                            <option value="activo">Activo</option>
                            <option value="inactivo">Inactivo</option>
                        </select>
                    </div>-->
                </div>
            </div>

        </div>

        <div class="container">
            <div id="ParticipanteSaldo" class="table-responsive-sm">
                <!-- Aqui va la tabla --->
            </div>

        </div>

<?php
include 'home_monitor_view_footer.php';
?>

        <script>
            document.getElementById("navegacionMonitor").innerHTML = "<h1>Información de participantes</h1>";

            $(document).ready(function() {
                $('#infoParticipante').DataTable();
            } );

            participantes();

        </script>
</body>
</html>