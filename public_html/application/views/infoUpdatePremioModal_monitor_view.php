                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="NombreCategoria">Nombre Categoria</label>
                            <?php
                                echo '<input type="text" class="form-control" id="categoria" aria-describedby="emailHelp" value="'.$descripcion[0]['nbCategoria'].'">';
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="nombrePremio">Nombre Premio</label>
                            <?php
                                echo '<input type="text" class="form-control" id="nombrePremio" value="'.$descripcion[0]['Nombre_Esp'].'">';
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="marcaPremio">Marca Premio</label>
                            <?php
                                echo '<input type="text" class="form-control" id="marcaPremio" value="'.$descripcion[0]['Marca'].'">';
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="modeloPremio">Modelo Premio</label>
                            <?php
                                echo '<input type="text" class="form-control" id="modeloPremio" value="'.$descripcion[0]['Modelo'].'">';
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="CaractsPremio">Caractetisticas Premio</label>
                            <?php
                                echo '<input type="text" class="form-control" id="caractsPremio" value="'.$descripcion[0]['Caracts_Esp'].'">';
                            ?>
                        </div>
                        <button type="button" class="btn btn-primary" id="actualizarPremio"><i class="fas fa-sync-alt"></i> Actualizar premio</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin-left: 50px;">Cerrar</button>
                </div>