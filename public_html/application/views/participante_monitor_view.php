<!DOCTYPE html>
<html  ng-app="monitor" >
<?php
include 'home_monitor_view_header.php';
?>

        <div class="container">

            <div class="row justify-content-center mb-4 mt-3">

                    <div class="col">
                        <span class="card-text">Con saldo</span><input type="radio" name="conSaldo" value="saldo">
                        <span class="card-text">Sin saldo</span><input type="radio" name="sinSaldo" value="sinSaldo">
                    </div>
                    <div class="col">
                        <span class="card-text">Activo</span><input type="radio" name="activo" value="activo">
                        <span class="card-text">Inactivo</span><input type="radio" name="inactivo" value="inactivo">
                    </div>
                    <div class="col">
                        <span class="card-text">Estado</span><input type="checkbox" name="estado" value="estado">
                        <select>
                            <option value="0">0</option>
                            <option value="1">1</option>
                        </select>
                    </div>

            </div>

        </div>

        <div class="container">

            <!--<div class="card text-center">
                <div class="card-header">
                    Participantes
                </div>
                <div class="card-body">-->
                    


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
                            <tr>
                                <td>0</td>
                                <td>lorem</td>
                                <td>ipsum</td>
                                <td>ip</td>
                                <td>5555</td>
                                <td>alguien@example.com</td>
                                <td>500</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>lorem</td>
                                <td>ipsum</td>
                                <td>ipp</td>
                                <td>5445</td>
                                <td>alguien2@example.com</td>
                                <td>550</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>lorem</td>
                                <td>ipsum</td>
                                <td>i99p</td>
                                <td>59875</td>
                                <td>alguien3@example.com</td>
                                <td>700</td>
                            </tr>
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






                <!--</div>-->
                <!--<div class="card-footer text-muted">
                    Información
                </div>-->
            <!--</div>-->

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