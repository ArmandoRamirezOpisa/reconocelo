                <table id="infoParticipante" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%" style="margin-bottom: 50px;">
                    <thead>
                        <tr>
                            <th class="th-sm">Codigo participante
                                <i class="fa fa-sort float-right" aria-hidden="true"></i>
                            </th>
                            <th class="th-sm">Nombre
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
                            <th class="th-sm">Información
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
                                <td>'.$row["PrimerNombre"].'</td>
                                <td>'.$row["Telefono"].'</td>
                                <td>'.$row["eMail"].'</td>
                                <td>'.$row["SaldoActual"].'</td>
                                <td>
                                    <button id='.$row["codParticipante"].' type="button" class="btn btn-link" data-toggle="modal" data-target="#modalParticipante" onclick="infoParticipante(this)">
                                        Información
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
                            </tr>';
                    }
                    ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="th-sm">Codigo participante</th>
                            <th class="th-sm">Nombre</th>
                            <th class="th-sm">Telefono</th>
                            <th class="th-sm">Correo electrónico</th>
                            <th class="th-sm">Saldo</th>
                            <th class="th-sm">Información</th>
                        </tr>
                    </tfoot>
                </table>

                <!-- Modal -->
                <div class="modal fade bd-example-modal-lg" id="modalParticipante" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Información participante</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div id="participanteInfo">

                                    <?php
                                                if($infoParticipa){
                                                    print_r ($infoParticipa);
                                                }else{
                                                    echo 'mal echo';
                                                }
                                            ?>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>