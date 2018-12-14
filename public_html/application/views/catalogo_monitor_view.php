<!DOCTYPE html>
<html  ng-app="monitor" >
<?php
include 'home_monitor_view_header.php';
?>

        <div class="container">

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
                    if ($catalogo){

                        foreach($catalogo as $row){

                            echo '<tr>
                                <td>'.$row["categoria"].'</td>
                                <td>'.$row["codPremio"].'</td>
                                <td>'.$row["nombrePremio"].'</td>
                                <td>'.$row["Marca"].'</td>
                                <td>'.$row["Modelo"].'</td>
                                <td>'.$row["Puntos"].'</td>
                                <td>
                                    <button id='.$row["codPremio"].' type="button" class="btn btn-link" data-toggle="modal" data-target="#catalogoImgModal" onclick="catalogoIMG(this)">
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

    <!-- Modal -->
    <div class="modal fade" id="catalogoImgModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Imagen del premio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="imgCatalogo"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>


<?php
include 'home_monitor_view_footer.php';
?>

        <script>
            document.getElementById("navegacionMonitor").innerHTML = "<h1>Informacion del catologo actual</h1>";

            $(document).ready(function() {
                $('#infoCatologoActual').DataTable();
            } );

        </script>-
</body>
</html>