            <div class="modal-header">
                <h5 class="modal-title">Cerrar ticket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Estas seguro finalizar el ticket.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <?php
                    echo '<button type="button" class="btn btn-primary" id="'.$idTicket.'" onclick="closeTicket(this)">Cerrar</button>';
                ?>
            </div>