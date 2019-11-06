                <table id="infoDeposito" class="table table-bordered table-sm table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="th-sm">Codigo depósito OPI
                                <i class="fa fa-sort float-right" aria-hidden="true"></i>
                            </th>
                            <th class="th-sm">Id participante OPI
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
                        $totalPuntos = 0;
                        if ($deposito){
                            foreach($deposito as $row){
                                echo '<tr>
                                    <td scope="row">'.$row['noFolio'].'</td>
                                    <td>'.$row['idParticipante'].'</td>
                                    <td>'.$row['Nombre'].'</td>
                                    <td>'.$row['Fecha'].'</td>
                                    <td>'.$row['Descripcion'].'</td>
                                    <td>'.number_format($row['Puntos']).'</td>
                                </tr>';
                                $totalPuntos = $totalPuntos + $row['Puntos'];
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
                            <th>Codigo depósito OPI</th>
                            <th>Id participante OPI</th>
                            <th>Nombre</th>
                            <th>Fecha</th>
                            <th>Descripción</th>
                            <th>Puntos</th>
                        </tr>
                    </tfoot>
                </table>
                <script>
                    $(document).ready(function() {
                        $('#infoDeposito').DataTable();
                    });
                    var puntosTotalNumero = '<?php echo number_format($totalPuntos); ?>';
                    $('#totalNumPuntos').html(puntosTotalNumero);
                </script>