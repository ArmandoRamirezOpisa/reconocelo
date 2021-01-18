<!DOCTYPE html>
<html>
<?php
include 'home_monitor_view_header.php';
?>
        <div class="container mt-5">
            <table id="infoCatologoActual" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm">Categoría
                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                        <th class="th-sm">Código de premio
                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                        <th class="th-sm">Nombre de premio
                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                        <th class="th-sm">Marca
                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                        <th class="th-sm">Modelo
                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                        <th class="th-sm">Puntos
                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                        <th class="th-sm">Premio
                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    if ($catalogoActual){
                        foreach($catalogoActual as $row){
                            echo '<tr>
                                <td>'.$row["categoria"].'</td>
                                <td>'.$row["codPremio"].'</td>
                                <td>'.$row[" nombrePremio"].'</td>
                                <td>'.$row["Marca"].'</td>
                                <td>'.$row["Modelo"].'</td>
                                <td>'.$row["Puntos"].'</td>
                                <td>
                                    <button id='.$row["codPremio"].' type="button" class="btn btn-link">
                                        Premio
                                    </button>
                                </td>
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
                        <th>Categoría</th>
                        <th>Código de premio</th>
                        <th>Nombre de premio</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Puntos</th>
                        <th>Premio</th>
                    </tr>
                </tfoot>
            </table>
        </div>
<?php
include 'home_monitor_view_footer.php';
?>
        <script>
            document.getElementById("navegacionMonitor").innerHTML = "<h1>Información del catalogo actual</h1>";
            $(document).ready(function() {
                $('#infoDeposito').DataTable();
            });
        </script>
</body>
</html>