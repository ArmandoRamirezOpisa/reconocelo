                <table id="infoCanje" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="th-sm">Codigo canje OPI
                                <i class="fa fa-sort float-right" aria-hidden="true"></i>
                            </th>
                            <th class="th-sm">Id participante OPI
                                <i class="fa fa-sort float-right" aria-hidden="true"></i>
                            </th>
                            <th class="th-sm">Nombre
                                <i class="fa fa-sort float-right" aria-hidden="true"></i>
                            </th>
                            <th class="th-sm">Fecha Solicitud
                                <i class="fa fa-sort float-right" aria-hidden="true"></i>
                            </th>
                            <th class="th-sm">Fecha expiracion
                                <i class="fa fa-sort float-right" aria-hidden="true"></i>
                            </th>
                            <th class="th-sm">Puntos
                                <i class="fa fa-sort float-right" aria-hidden="true"></i>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        if ($canje){
                            $totalPuntos = 0;
                            foreach($canje as $row){

                                echo '<tr>
                                    <td>'.$row['idCanje'].'</td>
                                    <td>'.$row['idParticipante'].'</td>
                                    <td>'.$row['Nombre'].'</td>
                                    <td>'.$row['feSolicitud'].'</td>
                                    <td>'.$row['fhExp'].'</td>
                                    <td>'.number_format($row['PuntosXUnidad']).'</td>
                                </tr>';
                                $totalPuntos = $totalPuntos + $row['PuntosXUnidad'];
                            }

                        }else{
                            echo '<tr>
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
                            <th>Codigo canje OPI</th>
                            <th>Id participante OPI</th>
                            <th>Nombre</th>
                            <th>Fecha Solicitud</th>
                            <th>Fecha expiracion</th>
                            <th>Puntos</th>
                        </tr>
                    </tfoot>
                </table>

                <script>
                    $(document).ready(function() {
                        $('#infoCanje').DataTable();
                    } );

                    var puntosTotalNumero = '<?php echo number_format($totalPuntos); ?>';

                    $('#totalNumPuntosCanjes').html(puntosTotalNumero);

                </script>