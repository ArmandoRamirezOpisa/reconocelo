<?php

    if ($idTicketHistory){
        echo '<div class="form-group">
                <label for="ticketAnswer">Respuesta del ticket</label>
                <textarea class="form-control" id="ticketRespuesta" rows="3" placeholder="Escribe la respuesta del ticket..."></textarea>
            </div>
            <div class="form-group">
                <button id='.$idTicketHistory.' class="btn btn-primary" onclick="sendTicket(this)"><i class="fas fa-paper-plane"></i>  Enviar</button>
            </div>';
    }
?>