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
                                    <td>'.number_format($row['Puntos']).'</td>
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

                <script>
                    $(document).ready(function() {
                        $('#infoDeposito').DataTable();
                    } );
                </script>