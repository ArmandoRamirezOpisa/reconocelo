<!DOCTYPE html>
<html  ng-app="monitor" >
<?php
include 'home_monitor_view_header.php';
?>

        <div class="container">

            <div id="Depositos">
                <table id="infoMonitorPrograma" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="th-sm">Mes/Año
                                <i class="fa fa-sort float-right" aria-hidden="true"></i>
                            </th>
                            <th class="th-sm">Depositos
                                <i class="fa fa-sort float-right" aria-hidden="true"></i>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                <?php

                        if ($programa){

                            $puntosCirculantes = 0;
                            $canjes = 0;
                            foreach ($programa as $row){
                                    
                                    echo '<tr>';
                                        echo '<td>'.$row['Fecha'].'</td>';
                                        echo '<td>'.$row['Depositos'].'</td>';
                                    echo '</tr>';

                            }
                            
                        }else{
                            echo '<tr>
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
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div id="Canjes">
                <table id="infoMonitorPrograma" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="th-sm">Canjes
                                    <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php

                            if ($programaCanje){

                                $puntosCirculantes = 0;
                                $canjes = 0;
                                foreach ($programaCanje as $row){
                                        
                                        echo '<tr>';
                                            echo '<td>'.$row['Canjes'].'</td>';
                                        echo '</tr>';

                                }
                                
                            }else{
                                echo '<tr>
                                    <td>--</td>
                                    <td>--</td>
                                </tr>';
                            }

                        ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Canjes</th>
                            </tr>
                        </tfoot>
                    </table>
            </div>

        </div>

<?php
include 'home_monitor_view_footer.php';
?>

        <script>
            document.getElementById("navegacionMonitor").innerHTML = "<h1>información del monitor programa</h1>";
        </script>-
</body>
</html>