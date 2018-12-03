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
                        <input class="form-check-input" type="checkbox" id="estadoActivo" value="option1" checked onchange="estadoParticipante()">
                        <label class="form-check-label" for="inlineCheckbox1">Activo</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="estadoInactivo" value="option2" checked onchange="estadoParticipante()">
                        <label class="form-check-label" for="inlineCheckbox2">Inactivo</label>
                    </div>
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

            Todosparticipantes();

        </script>
</body>
</html>