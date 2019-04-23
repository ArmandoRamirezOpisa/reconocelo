<div class="row animated apareciendo">
    <div class="col-12">
        <h1 class="text-center"><i class="far fa-life-ring  mr-2"></i>Bienvenido al Centro de Respuestas Reconócelo</h1>
        <p class="text-center lead">Aqui podras visualizar las respuestas a tus preguntas realizadas</p>
    </div>
</div>

<div class="row justify-content-center mt-4 animated apareciendo">
    <div class="col-8">
        <?php
            if ($ticketHistory){
                foreach ($ticketHistory as $row){
                    echo '
                    <div class="card text-center animated">
                        <div class="card-header">
                            <strong class="space-ticket"><i class="fas fa-ticket-alt"></i> Ticket: '.$row['IdTicket'].'</strong>';
                            if ($row['idCanje'] == 0){
                                echo '<strong class="space-ticket"><i class="fas fa-exchange-alt"></i> Canje: Otro</strong>';
                            }else{
                                echo '<strong class="space-ticket"><i class="fas fa-exchange-alt"></i> Canje: '.$row['idCanje'].'</strong>';
                            }
                            echo '<strong class="space-ticket"><i class="fas fa-calendar"></i> Fecha de Creacion: '.$row['FechaCreacion'].'</strong>';
                             if ( $row['status'] == 1){
                                 echo '<strong class="badge badge-success"><i class="fas fa-unlock"></i> Abierto</strong>';
                             }else {
                                 echo '<strong class="badge badge-danger"><i class="fas fa-lock"></i> Cerrado</strong>';
                             }                          
                        echo '</div>
                        <div class="card-body">
                            <h5 class="card-title">Descripción del ticket:</h5>
                            <p class="card-text">';
                            if ($row['Subject'] != ""){
                                echo ''.$row['Subject'].'';
                            }else{
                                echo 'Otro';
                            }
                            echo '</p>
                        </div>
                        <div class="card-footer text-muted">
                            <strong>
                                <i class="fas fa-calendar"></i>';
                                if ( $row['status'] == 1){
                                    echo 'Fecha de solución: ';
                                }else{
                                    echo 'Fecha de solución: '.$row['FechaCreacion'];
                                }
                            echo '</strong>
                            <div class="float-right">
                                <button id="'.$row['IdTicket'].'-'.$row['status'].'" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTicketHistorial" onclick="historiaTicket(this)"><i class="fas fa-history"></i>  Historial del ticket '.$row['IdTicket'].'</button>
                            </div>
                        </div>
                    </div>
                    </br>
                    ';
                }  
            }else{
                echo "<h1 class=\"text-center\">NO EXISTEN TICKETS</h1>";
            }
        ?>
    </div>  
</div>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg animated apareciendo" id="modalTicketHistorial" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Historial del ticket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="historialTicket"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script>
up();
</script>