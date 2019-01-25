                <div class="modal-body">
                    <?php
                        echo '<img class="card-img-top" src="http://www.opisa.com/incentivos/'.$codPremio['codPremio'].'.jpg" alt="Imagen premio '.$codPremio['codPremio'].'">';
                    ?>
                </div>
                <div class="modal-footer">
                    <?php
                        if($descripcion){
                            echo $descripcion[0]['Caracts_Esp'];
                        }
                    ?>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin-left: 50px;">Cerrar</button>
                </div>