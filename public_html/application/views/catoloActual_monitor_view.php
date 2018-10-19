<!DOCTYPE html>
<html  ng-app="monitor" >
<?php
include 'home_monitor_view_header.php';
?>

        <div class="container">

            <div class="row justify-content-center mb-4 mt-3">

                <div class="col">
                    <span class="card-text">Fecha de movimientos</span>
                </div>
                <div class="col">
                    <span class="card-text">Inicio</span>
                    <select>
                        <option name="fechaInicioMovimiento" value="2010-10">2010-10</option>
                    </select>
                    <span class="card-text">Fin</span>
                    <select>
                        <option name="fechaFinMovimiento" value="2018-10">2018-10</option>
                    </select>
                </div>

            </div>

        </div>

        <div class="container">

            <table id="infoDeposito" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="th-sm">Codigo deposito
                                    <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                </th>
                                <th class="th-sm">Nombre
                                    <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                </th>
                                <th class="th-sm">Fecha
                                    <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                </th>
                                <th class="th-sm"># Transacción
                                    <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                </th>
                                <th class="th-sm">Descripción
                                    <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>00</td>
                                <td>qwer</td>
                                <td>2010-10-9</td>
                                <td>500</td>
                                <td>probando</td>
                            </tr>
                            <tr>
                                <td>11</td>
                                <td>ttyui</td>
                                <td>2011-10-9</td>
                                <td>600</td>
                                <td>probando</td>
                            </tr>
                            <tr>
                                <td>22</td>
                                <td>opasd</td>
                                <td>2012-10-9</td>
                                <td>700</td>
                                <td>probando</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Codigo deposito</th>
                                <th>Nombre</th>
                                <th>Fecha</th>
                                <th>Transacción</th>
                                <th>Descripción</th>
                            </tr>
                        </tfoot>
                    </table>

        </div>

<?php
include 'home_monitor_view_footer.php';
?>

        <script>
            document.getElementById("navegacionMonitor").innerHTML = "<h1>Informacion de los depositos</h1>";

            $(document).ready(function() {
                $('#infoDeposito').DataTable();
            } );

        </script>-
</body>
</html>