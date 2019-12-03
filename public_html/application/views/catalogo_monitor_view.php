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
                        <th class="th-sm">Borrar
                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    if ($catalogo){
                        foreach($catalogo as $row){
                            $codPremio = $row["Premio"];
                            echo '<tr>
                                <td>'.$row["Categoria"].'</td>
                                <td>'.$row["codPremio"].'</td>
                                <td>'.$row["Premio"].'</td>
                                <td>'.$row["Marca"].'</td>
                                <td>'.$row["Modelo"].'</td>
                                <td>'.number_format($row["ValorPuntos"]).'</td>
                                <td>
                                    <button id='.$row["codPremio"].' type="button" class="btn btn-link" data-toggle="modal" data-target="#catalogoImgModal" onclick="catalogoIMG(this)">
                                        Premio
                                    </button>
                                </td>
                                <td><a data-toggle="modal" data-target="#catalogoBorrar" id='.$row["codPremio"].' class="borrarCatalogo" onclick="borrarCatalogoPremio(this)"><i class="fas fa-trash"></i></a></td>
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
    <div class="modal fade animated apareciendo" id="catalogoImgModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Imagen del premio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="imgCatalogo"></div>
            </div>
        </div>
    </div>

    <div class="modal fade animated apareciendo" id="catalogoBorrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Borrar catalogo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Estas seguro que deseas borrar este premio?.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
                    <button type="button" id="borrarPremio" onclick="borrarPremioCatalogo()" class="btn btn-primary"><i class="fas fa-trash-alt"></i> Borrar</button>
                </div>
            </div>
        </div>
    </div>
        <script>
            document.getElementById("navegacionMonitor").innerHTML = "<h1>Información del catalogo actual</h1>";
            $(document).ready(function() {
                $('#infoCatologoActual').DataTable();
            });
        </script>