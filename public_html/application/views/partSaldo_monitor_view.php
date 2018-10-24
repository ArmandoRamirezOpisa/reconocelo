                <table id="infoParticipante" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="th-sm">Codigo participante
                                <i class="fa fa-sort float-right" aria-hidden="true"></i>
                            </th>
                            <th class="th-sm">Nombre
                                <i class="fa fa-sort float-right" aria-hidden="true"></i>
                            </th>
                            <th class="th-sm">Apellido paterno
                                <i class="fa fa-sort float-right" aria-hidden="true"></i>
                            </th>
                            <th class="th-sm">Apellido materno
                                <i class="fa fa-sort float-right" aria-hidden="true"></i>
                            </th>
                            <th class="th-sm">Telefono
                                <i class="fa fa-sort float-right" aria-hidden="true"></i>
                            </th>
                            <th class="th-sm">Correo electrónico
                                <i class="fa fa-sort float-right" aria-hidden="true"></i>
                            </th>
                            <th class="th-sm">Saldo
                                <i class="fa fa-sort float right" aria-hidden="true"></i>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    if($participante){
                        foreach($participante as $row){
                            echo '<tr>
                                <td>'.$row["codParticipante"].'</td>
                                <td>'.$row["PrimerNombre"]." ".$row["SegundoNombre"].'</td>
                                <td>'.$row["ApellidoPaterno"].'</td>
                                <td>'.$row["ApellidoMaterno"].'</td>
                                <td>'.$row["Telefono"].'</td>
                                <td>'.$row["eMail"].'</td>
                                <td>'.$row["SaldoActual"].'</td>
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
                            <th>Codigo participante</th>
                            <th>Nombre</th>
                            <th>Apellido paterno</th>
                            <th>Apellido materno</th>
                            <th>Telefono</th>
                            <th>Correo electrónico</th>
                            <th>Saldo</th>
                        </tr>
                    </tfoot>
                </table>