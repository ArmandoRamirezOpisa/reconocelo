<table id="infoParticipante" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%" style="margin-bottom: 50px;">
    <thead>
        <tr>
            <th class="th-sm">Canje
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">Fecha Solicitud
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">Cantidad
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">Nombre
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">Status
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">Mensajeria
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">Numero de guia
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
                        <td>'.$row["idCanje"].'</td>
                        <td>'.$row["feSolicitud"].'</td>
                        <td>'.$row["Cantidad"].'</td>
                        <td>'.$row["Nombre_Esp"].'</td>
                        <td>'.$row["Status"].'</td>
                        <td>'.$row["Mensajeria"].'</td>
                        <td>'.$row["NumeroGuia"].'</td>
                        <td>'.$row["puntos"].'</td>
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
                    <td>--</td>
                </tr>';
            }
        ?>
    </tbody>
    <tfoot>
        <tr>
            <th class="th-sm">Canje
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">Fecha Solicitud
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">Cantidad
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">Nombre
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">Status
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">Mensajeria
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">Numero de guia
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">Puntos
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
        </tr>
    </tfoot>
</table>