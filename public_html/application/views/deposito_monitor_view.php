<!DOCTYPE html>
<html  ng-app="monitor" >
<?php
include 'home_monitor_view_header.php';
?>

        <div class="container">

            <div class="row">

                <div class="col">
                    <div class="form-check form-check-inline">
                        <label class="form-check-label" for="inlineRadio1">Fecha de movimientos</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <select class="form-control" id="estadoSelectDeposito">
                            <option>1</option>
                            <option>2</option>
                        </select>
                    </div>
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
                                <th class="th-sm">Descripción
                                    <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                </th>
                                <th class="th-sm">Puntos
                                    <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            if ($deposito){
                                foreach($deposito as $row){

                                    echo '<tr>
                                        <td>'.$row['noFolio'].'</td>
                                        <td>'.$row['Nombre'].'</td>
                                        <td>'.$row['Fecha'].'</td>
                                        <td>'.$row['Descripcion'].'</td>
                                        <td>'.$row['Puntos'].'</td>
                                    </tr>';

                                }

                            }else{
                                echo '<tr>
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
                                <th>Codigo deposito</th>
                                <th>Nombre</th>
                                <th>Fecha</th>
                                <th>Descripción</th>
                                <th>Puntos</th>
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