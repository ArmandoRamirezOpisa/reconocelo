<?php
    if($infoNewsDepositos){
        foreach($infoNewsDepositos as $row){
            //$table = '<table class="table">';
            foreach($row as $row1){
                $valoresDefinidosDepositos = explode(",",$row1);
                //print_r ($valoresDefinidosDepositos);
                //echo '<br>';
                //$table .= '<tr>';
                //forearch para poder realizar la insercion
                if(! isset($valoresDefinidosDepositos[0]) || ! isset($valoresDefinidosDepositos[1]) || ! isset($valoresDefinidosDepositos[2]) ){
                    $valoresDefinidosDepositos[0] = null;
                    $valoresDefinidosDepositos[1] = null;
                    $valoresDefinidosDepositos[2] = null;
                }else{
                    if($valoresDefinidosDepositos[0] == "idParticipanteCliente" || $valoresDefinidosDepositos[1] == "Puntos" || $valoresDefinidosDepositos[2] == "Concepto"){}
                    else{
                        echo 'INSERT_INTO depositos (idParticipanteCliente,Puntos,Concepto,FechaRegistro) values ('.$valoresDefinidosDepositos[0].','.$valoresDefinidosDepositos[1].','.$valoresDefinidosDepositos[2].','.date("d/m/Y").')';
                        //echo 'Valor 1: '.$valoresDefinidosDepositos[0].'Valor 2: '.$valoresDefinidosDepositos[1].'Valor 3: '.$valoresDefinidosDepositos[2];
                    }
                }
                echo '<br>';
                /*foreach($valoresDefinidosDepositos as $row2){
                    //Dentro de este se va a realizar la insercion
                    //Ejemplo $row2[0], $row2[1], $row2[2]
                    if ($row2 == "idParticipanteCliente" || $row2 == "Puntos" || $row2 == "Concepto"){
                    }else{
                        //$table .= '<td>';
                        //$table .= $row2;
                        //$table .= '</td>';
                        echo 'Valor 1: '.$row2[0].'Valor 2: '.$row2[1].'Valor 3: '.$row2[2];
                    }
                }*/
                // fin forearch para poder realizar la insercion
                //$table .= '</tr>';
            }
            //$table .= '</table>';
            //echo $table;
        }
    }
?>