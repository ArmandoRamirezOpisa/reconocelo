<!DOCTYPE html>
<html>
<?php
include 'home_monitor_view_header.php';
?>
        
        <div class="container mt-5">
            <div id="alertFiltro" class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;">
                <strong>Atención!</strong> Debes tener seleccionado uno.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>

        <div class="container">
            <div class="row justify-content-center mb-4 mt-3">
                <div id="contentido" class="card-deck mt-3"></div>
            </div>
        </div>

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
                <div class="col">
                    <div class="form-check form-check-inline">
                        <label class="form-check-label" for="inlineCheckbox1"><strong>Total participantes: </strong><span id="totalParticipantesNum"></span></label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label" for="inlineCheckbox2"><strong>Saldo total: </strong><span id="saldoTotalNum"></span></label>
                    </div>
                </div>
            </div>

        </div>

        <div class="container">
            <div id="ParticipanteSaldo" class="table-responsive-sm"></div>

        </div>

<?php
include 'home_monitor_view_footer.php';
?>

        <script>
            document.getElementById("navegacionMonitor").innerHTML = "<h1>Información de participantes</h1>";
            Todosparticipantes();

        </script>
</body>
</html>