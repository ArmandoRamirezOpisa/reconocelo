<!DOCTYPE html>
<html  ng-app="monitor" >
<?php
include 'home_monitor_view_header.php';
?>

        <div class="container">

            <table id="infoMonitorPrograma" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm">Mes/Año
                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                        <th class="th-sm">Depositos
                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                        <th class="th-sm">Canjes
                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                        <th class="th-sm">Puntos circulantes
                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                    </tr>
                </thead>
                <tbody>
                <?php

                    if ($programa){

                        /*foreach($programa as $row => $info){
                            echo '<h1>'.$row.'</h1>'.'<br>';
                            foreach($info as $datos){
                                if ($datos != 'depositos' or $datos != 'Canjes'){
                                    echo '<h1>'.$datos.'</h1>'.'<br>';
                                }
                            }
                        }*/

                        $puntosCirculantes = 0;
                        foreach ($programa as $row){

                            echo '<tr>';
                                echo '<td>'.$row['Fecha'].'</td>';
                                if ($row['Depositos'] != 'depositos'){
                                    echo '<td>'.$row['Depositos'].'</td>';
                                }else{
                                    echo '<td>--</td>';
                                }
                                if ($row['Canjes'] != 'Canjes'){
                                    echo '<td>'.$row['Canjes'].'</td>';
                                }else{
                                    echo '<td>--</td>';
                                }
                                $puntosCirculantes = $puntosCirculantes + ($row['Depositos'] - $row['Canjes']);
                                echo '<td>'.$puntosCirculantes.'</td>';
                            echo '</tr>';

                        }
                        
                    }else{
                        echo '<tr>
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
                        <th>Mes/Año</th>
                        <th>Depositos</th>
                        <th>Canjes</th>
                        <th>Puntos circulantes</th>
                    </tr>
                </tfoot>
            </table>

        </div>

<?php
include 'home_monitor_view_footer.php';
?>

        <script>
            document.getElementById("navegacionMonitor").innerHTML = "<h1>Informacion del monitor programa</h1>";
        </script>-
</body>
</html>