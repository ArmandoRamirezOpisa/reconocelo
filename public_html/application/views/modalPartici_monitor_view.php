<table id="infoParticipante" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%" style="margin-bottom: 50px;">
    <thead>
        <tr>
            <th class="th-sm">Folio
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">Fecha
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">Cantidad
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">Codigo de premio
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">Descripcion
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">Puntos
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
            if($participanteData){
                foreach($participanteData as $row){
                    echo '<tr>
                        <td>'.$row["Folio"].'</td>
                        <td>'.$row["Fecha"].'</td>
                        <td>'.$row["cantidad"].'</td>
                        <td>'.$row["codPremio"].'</td>
                        <td>'.$row["Descripcion"].'</td>
                        <td>'.$row["Puntos"].'</td>
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
            <th class="th-sm">Folio
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">Fecha
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">Cantidad
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">Codigo de premio
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">Descripcion
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">Puntos
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
        </tr>
    </tfoot>
</table>