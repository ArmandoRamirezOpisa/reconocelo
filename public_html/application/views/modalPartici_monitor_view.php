<table id="infoParticipante" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%" style="margin-bottom: 50px;">
    <thead>
        <tr>
            <th class="th-sm">Fecha
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">Depositos
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
            if($participanteData){
                foreach($participanteData as $row){
                    echo '<tr>
                        <td>'.$row["Fecha"].'</td>
                        <td>'.$row["Depositos"].'</td>
                    </tr>';
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
            <th class="th-sm">Fecha</th>
            <th class="th-sm">Depositos</th>
        </tr>
    </tfoot>
</table>

<!-- -->
<table id="infoParticipante" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%" style="margin-bottom: 50px;">
    <thead>
        <tr>
            <th class="th-sm">Fecha
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">Canjes
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
            if($participanteDataCanje){
                foreach($participanteDataCanje as $row){
                    echo '<tr>
                        <td>'.$row["Fecha"].'</td>
                        <td>'.$row["Canjes"].'</td>
                    </tr>';
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
            <th class="th-sm">Fecha</th>
            <th class="th-sm">Canjes</th>
        </tr>
    </tfoot>
</table>