<?php
    sleep(1);
?>
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
        </tr>
    </thead>
    <tbody>
        <?php
            if($participante){
                foreach($participante as $row){
        ?>
        <tr>
            <td><?php echo $row["codParticipante"]; ?></td>
            <td><?php echo $row["PrimerNombre"]; ?></td>
            <td><?php echo $row["Telefono"]; ?></td>
            <td><?php echo $row["eMail"]; ?></td>
            <td><?php echo $row["SaldoActual"]; ?></td>
        </tr>
        <?php
            }    }
        ?>
    </tbody>
</table>

<?php
    sleep(1);
    $filename = "Participantes.xls"; // File Name
    header("Content-Type: application/xls");    
    //header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"$filename\"");
    header("Pragma: no-cache"); 
    header("Expires: 0");
?>

<?php echo 'Excel generado exitosamente!';  ?>
