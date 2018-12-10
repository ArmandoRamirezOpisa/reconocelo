<?php

echo '<div id="mensaje" style="display:none;"></div>';

echo '<div id="ticketAnswer" style="display:none;"></div>';

    if ($ticketHistory){

        $id = "";

        foreach ($ticketHistory as $row){

            $id = $row['IdTicket'];

            echo '<div class="card">
                <div class="card-header">
                    Ticket: '.$row['IdTicket'].'
                </div>
                <div class="card-body">
                    <h5 class="card-title">Fecha de creacion: '.$row['fecha'].'</h5>
                    <p class="card-text">'.$row['mensaje'].'.</p>
                    <button id='.$row['IdTicket'].' class="btn btn-primary" onclick="answerTicket(this)"><i class="fas fa-edit"></i>  Responder</button>
                </div>
            </div>
            </br>';

        }

        echo '<div class="card text-center" style="width: 29rem;">
            <div class="card-body">
                <button id='.$id.' class="btn btn-primary" onclick="closeTicket(this)"><i class="fas fa-times-circle"></i>  Cerrar ticket</button>
            </div>
        </div>';

    }else{
        echo '<h1>Este ticket no tiene historial</h1>';
    }
?>