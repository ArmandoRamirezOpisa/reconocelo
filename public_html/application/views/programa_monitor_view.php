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

                    $puntosCirculantes = "0";

                    $fecha05 = "2018 05";//
                    $fecha06 = "2018 06";
                    $fecha07 = "2018 07";
                    $fecha08 = "2018 08";
                    $fecha09 = "2018 09";
                    $fecha10 = "2018 10";

                    $canje1 = "38170590";//
                    $canje2 = "21719269";
                    $canje3 = "11616206";
                    $canje4 = "48736764";
                    $canje5 = "14769473";
                    $canje6 = "13839401";

                    $deposito = "0";
                    $deposito1 = "15525000";//
                    $deposito2 = "18975000";
                    $deposito3 = "8625000";
                    $deposito4 = "31050000";
                    $deposito5 = "10350000";

                    echo '<tr>';
                        echo '<td>'.$fecha05.'</td>';
                        echo '<td>'.$deposito1.'</td>';
                        echo '<td>'.$canje1.'</td>';
                        $puntosCirculantes = $puntosCirculantes + ($deposito1 - $canje1);
                        echo '<td>'.$puntosCirculantes.'</td>';
                    echo '</tr>';

                    echo '<tr>';
                        echo '<td>'.$fecha06.'</td>';
                        echo '<td>'.$deposito2.'</td>';
                        echo '<td>'.$canje2.'</td>';
                        $puntosCirculantes = $puntosCirculantes + ($deposito2 - $canje2);
                        echo '<td>'.$puntosCirculantes.'</td>';
                    echo '</tr>';

                    echo '<tr>';
                        echo '<td>'.$fecha07.'</td>';
                        echo '<td>'.$deposito3.'</td>';
                        echo '<td>'.$canje3.'</td>';
                        $puntosCirculantes = $puntosCirculantes + ($deposito3 - $canje3);
                        echo '<td>'.$puntosCirculantes.'</td>';
                    echo '</tr>';

                    echo '<tr>';
                        echo '<td>'.$fecha08.'</td>';
                        echo '<td>'.$deposito4.'</td>';
                        echo '<td>'.$canje4.'</td>';
                        $puntosCirculantes = $puntosCirculantes + ($deposito4 - $canje4);
                        echo '<td>'.$puntosCirculantes.'</td>';
                    echo '</tr>';

                    echo '<tr>';
                        echo '<td>'.$fecha09.'</td>';
                        echo '<td>'.$deposito5.'</td>';
                        echo '<td>'.$canje5.'</td>';
                        $puntosCirculantes = $puntosCirculantes + ($deposito5 - $canje5);
                        echo '<td>'.$puntosCirculantes.'</td>';
                    echo '</tr>';

                    echo '<tr>';
                        echo '<td>'.$fecha10.'</td>';
                        echo '<td>'.$deposito.'</td>';
                        echo '<td>'.$canje6.'</td>';
                        $puntosCirculantes = $puntosCirculantes + ($deposito - $canje6);
                        echo '<td>'.$puntosCirculantes.'</td>';
                    echo '</tr>';

                    /*if ($programa){

                        $puntosCirculantes = 0;
                        $canjes = 0;
                        foreach ($programa as $row){
                                
                                echo '<tr>';
                                    echo '<td>'.$row['Fecha'].'</td>';
                                    echo '<td>'.$row['Depositos'].'</td>';
                                    echo '<td>'.$canjes.'</td>';
                                    $puntosCirculantes = $puntosCirculantes + ($row['Depositos'] - $canjes);
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
                    }*/
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