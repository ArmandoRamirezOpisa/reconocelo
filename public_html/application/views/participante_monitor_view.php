<!DOCTYPE html>
<html  ng-app="monitor" >
<?php
include 'home_monitor_view_header.php';
?>
        
        <div class="container">

            <div class="row">

                <div class="col">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="conSaldo" checked>
                        <label class="form-check-label" for="inlineRadio1">Con saldo</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="sinSaldo">
                        <label class="form-check-label" for="inlineRadio2">Sin saldo</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" value="" id="estadoPariticipante">
                        <label class="form-check-label" for="defaultCheck1">
                            Estado
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <select class="form-control" id="selectEstadoParticipante">
                            <option>1</option>
                            <option>2</option>
                        </select>
                    </div>
                </div>
            </div>

        </div>

        <div class="container">
            
            <table id="infoParticipante" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm">Codigo participante
                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                        <th class="th-sm">Nombre
                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                        <th class="th-sm">Apellido paterno
                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                        <th class="th-sm">Apellido materno
                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                        <th class="th-sm">Telefono
                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                        <th class="th-sm">Correo electrónico
                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                        <th class="th-sm">Saldo
                            <i class="fa fa-sort float right" aria-hidden="true"></i>
                        </th>
                    </tr>
                </thead>
                <tbody>
                <?php
                if($participante){
                    foreach($participante as $row){
                        echo '<tr>
                            <td>'.$row["codParticipante"].'</td>
                            <td>'.$row["PrimerNombre"]." ".$row["SegundoNombre"].'</td>
                            <td>'.$row["ApellidoPaterno"].'</td>
                            <td>'.$row["ApellidoMaterno"].'</td>
                            <td>'.$row["Telefono"].'</td>
                            <td>'.$row["eMail"].'</td>
                            <td>'.$row["SaldoActual"].'</td>
                        </tr>';
                    }
                }else{
                    echo '<tr>
                        <td>--</td>
                        <td>--</td>
                        <td>--</td>
                        <td>--</td>
                        <td>--</td>
                        <td>--</td>
                        <td>--</td>
                        </tr>';
                }
                ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Codigo participante</th>
                        <th>Nombre</th>
                        <th>Apellido paterno</th>
                        <th>Apellido materno</th>
                        <th>Telefono</th>
                        <th>Correo electrónico</th>
                        <th>Saldo</th>
                    </tr>
                </tfoot>
            </table>
            
        </div>

<?php
include 'home_monitor_view_footer.php';
?>

        <script>
            document.getElementById("navegacionMonitor").innerHTML = "<h1>Información de participantes</h1>";

            $(document).ready(function() {
                $('#infoParticipante').DataTable();
            } );

        </script>
</body>
</html>