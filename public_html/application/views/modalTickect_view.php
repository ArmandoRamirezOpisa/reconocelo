<?php

echo '<div id="ticketAnswer" style="display:none;"></div>';

    if ($ticketHistory){

        foreach ($ticketHistory as $row){

            echo '<div class="card">
                <div class="card-header">
                    Ticket: '.$row['IdTicket'].'
                </div>
                <div class="card-body">
                    <h5 class="card-title">Fecha de creacion: '.$row['fecha'].'</h5>
                    <p class="card-text">'.$row['mensaje'].'.</p>
                    <button id='.$row['IdTicket'].' class="btn btn-primary" onclick="answerTicket(this)">Responder</button>
                </div>
            </div>
            </br>';

        }

    }else{
        echo '<h1>Este ticket no tiene historial</h1>';
    }
?>