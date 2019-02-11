<?php 
    if($infoNewsParticipantes){
        foreach($infoNewsParticipantes as $row){
            foreach($row as $row1){
                $valoresDefinidosParticipantes = explode(",",$row1);
                if(! isset($valoresDefinidosParticipantes[0]) || ! isset($valoresDefinidosParticipantes[1]) || ! isset($valoresDefinidosParticipantes[2]) || ! isset($valoresDefinidosParticipantes[3]) || ! isset($valoresDefinidosParticipantes[4]) || ! isset($valoresDefinidosParticipantes[5]) || ! isset($valoresDefinidosParticipantes[6]) || ! isset($valoresDefinidosParticipantes[7]) || ! isset($valoresDefinidosParticipantes[8]) || ! isset($valoresDefinidosParticipantes[9]) || ! isset($valoresDefinidosParticipantes[10]) || ! isset($valoresDefinidosParticipantes[11]) || ! isset($valoresDefinidosParticipantes[12]) || ! isset($valoresDefinidosParticipantes[13]) || ! isset($valoresDefinidosParticipantes[14]) || ! isset($valoresDefinidosParticipantes[15]) ){
                    $valoresDefinidosParticipantes[0] = null;
                    $valoresDefinidosParticipantes[1] = null;
                    $valoresDefinidosParticipantes[2] = null;
                    $valoresDefinidosParticipantes[3] = null;
                    $valoresDefinidosParticipantes[4] = null;
                    $valoresDefinidosParticipantes[5] = null;
                    $valoresDefinidosParticipantes[6] = null;
                    $valoresDefinidosParticipantes[7] = null;
                    $valoresDefinidosParticipantes[8] = null;
                    $valoresDefinidosParticipantes[9] = null;
                    $valoresDefinidosParticipantes[10] = null;
                    $valoresDefinidosParticipantes[11] = null;
                    $valoresDefinidosParticipantes[12] = null;
                    $valoresDefinidosParticipantes[13] = null;
                    $valoresDefinidosParticipantes[14] = null;
                    $valoresDefinidosParticipantes[15] = null;
                }else{
                    if($valoresDefinidosParticipantes[0] == "idParticipante" || $valoresDefinidosParticipantes[1] == "codPrograma" || $valoresDefinidosParticipantes[2] == "codEmpresa" || $valoresDefinidosParticipantes[3] == "codParticipante" || $valoresDefinidosParticipantes[4] == "cargo" || $valoresDefinidosParticipantes[5] == "nombreCompleto" || $valoresDefinidosParticipantes[6] == "calleNumero" || $valoresDefinidosParticipantes[7] == "colonia" || $valoresDefinidosParticipantes[8] == "cp" || $valoresDefinidosParticipantes[9] == "ciudad" || $valoresDefinidosParticipantes[10] == "estado" || $valoresDefinidosParticipantes[11] == "pais" || $valoresDefinidosParticipantes[12] == "telefono" || $valoresDefinidosParticipantes[13] == "pwd" || $valoresDefinidosParticipantes[14] == "eMail" || $valoresDefinidosParticipantes[15] == "loginWeb" ){}
                    else{
                        echo'
                            INSERT INTO `opisa_opisa`.`ZParticipante-desarrollo`(`Id participante`, 
                            `Cod programa`, `Cod empresa`, `Cod participante`, `Cargo`, `Nombre completo`, 
                            `Calle y numero`, `Colonia`, `Codigo postal`, `Cuidad`, `Estado`, `Pais`, 
                            `Telefono`, `Contraseña`, `Correo electronico`, `Login web`) 
                            VALUES ('.$valoresDefinidosParticipantes[0].','.$valoresDefinidosParticipantes[1].',
                            '.$valoresDefinidosParticipantes[2].','.$valoresDefinidosParticipantes[3].',
                            '.$valoresDefinidosParticipantes[4].','.$valoresDefinidosParticipantes[5].',
                            '.$valoresDefinidosParticipantes[6].','.$valoresDefinidosParticipantes[7].',
                            '.$valoresDefinidosParticipantes[8].','.$valoresDefinidosParticipantes[9].',
                            '.$valoresDefinidosParticipantes[10].','.$valoresDefinidosParticipantes[11].',
                            '.$valoresDefinidosParticipantes[12].','.$valoresDefinidosParticipantes[13].',
                            '.$valoresDefinidosParticipantes[14].','.$valoresDefinidosParticipantes[15].')
                        ';
                        echo '<br>';
                    }                                           
                }
            }
        }
    }
?>