<div class="col-md-12 animated apareciendo">
    <div class="table-responsive animated apareciendo">
        <table class="table ">
            <thead class="thead navcolor text-white">
                <th class="thTP">Folio</th>
                <th class="thTP">Fecha</th>
                <th class="thTP">Cantidad</th>
                <th class="thTP">Descripci&oacute;n</th>
                <th class="thTP">Estatus</th>
                <th class="thTP">Mensajer&iacute;a</th>
                <th class="thTP">Gu&iacute;a</th>
                <th class="thTP">Puntos</th>
            </thead>
            <tbody>
                <?PHP
                    if ($precanjes){
                        $st = "tdTP";
                        foreach($precanjes as $row){
                            echo "<tr>
                                <td class='".$st."' style='color:#000;'>".$row["idCanje"]."</td>
                                <td class='".$st."' style='color:#000;'>".substr($row["feSolicitud"],0,10)."</td>
                                <td class='".$st."' style='color:#000;'>".number_format($row["Cantidad"])."</td>
                                <td class='".$st."' style='color:#000;'>".$row["Nombre_Esp"]."</td>
                                <td class='".$st."' style='color:#000;'>".$row["Status"]."</td>
                                <td class='".$st."' style='color:#000;'>".$row["Mensajeria"]."</td>
                                <td class='".$st."' style='color:#000;'>".$row["NumeroGuia"]."</td>
                                <td class='".$st."' style='color:#000;'>".number_format($row["puntos"])."</td>
                            </tr>";
                        }
                    }
                    if (!$precanjes){
                        echo "<tr>
                                <td class='tdTP' style='color:#000;'>-</td>
                                <td class='tdTP' style='color:#000;'>-</td>
                                <td class='tdTP' style='color:#000;'>-</td>
                                <td class='tdTP' style='color:#000;'>-</td>
                                <td class='tdTP' style='color:#000;'>-</td>
                                <td class='tdTP' style='color:#000;'>-</td>
                                <td class='tdTP' style='color:#000;'>-</td>
                                <td class='tdTP' style='color:#000;'>-</td>
                        </tr>";
                    }
                ?>
            </tbody>
        </table>
        <?php
            if (!$precanjes){
                echo '<div class="alert alert-warning" role="alert">
                    <div class="row">
                        <div class="col-5"></div>
                        <div class="col"><strong>No hay canjes registrados</strong></div>
                        <div class="col"></div>
                    </div>
                </div>';
            }
        ?>
    </div>
</div>