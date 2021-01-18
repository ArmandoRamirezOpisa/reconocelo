<?php
    echo '<div id="mensaje" style="display:none;"></div>';
    echo '<div id="ticketAnswer" style="display:none;"></div>';
    if ($ticketHistory){
        $id = "";
        foreach ($ticketHistory as $row){
            echo '<div class="card">
                <div class="card-header text-center">
                    <strong>Ticket: '.$row['IdTicket'].'</strong>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Fecha de creacion: '.$row['fecha'].'</h5>
                    <p class="card-text">'.$row['mensaje'].'.</p>';
                    if ($status){
                        if ($status['status'] == 1){
                            echo '<button id='.$row['IdTicket'].' class="btn btn-primary" onclick="answerTicket(this)"><i class="fas fa-edit"></i>  Responder</button>';
                        }
                    }
                echo '</div>
            </div>
            </br>';
        }
    }else{
        echo '<div class="card">
            <div class="card-header text-center"></div>
            <div class="card-body">
                <h5 class="card-title">No hay historial</h5>
                <p class="card-text">En estos momentos no hay ningun historial de tickets.</p>
            </div>
        </div>
        </br>';
    }
?>