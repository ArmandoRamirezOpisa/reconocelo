<?php
    if ($idTicketHistory){
        echo '<form id="formAnswer">
            <div class="form-group">
                <label for="ticketAnswer">Respuesta del ticket</label>
                <textarea class="form-control" id="ticketAnswer" rows="3"></textarea>
            </div>
            <div class="form-group">
                <button id='.$idTicketHistory.' class="btn btn-primary"><i class="fas fa-paper-plane"></i>  Enviar</button>
            </div>
        </form>';
    }
?>