                <div class="modal-body">
                    <div id="MessageModalPremio"></div>
                    <form>
                        <div class="form-group">
                            <label for="NombreCategoria">Nombre Categoria</label>
                            <select class="form-control" id="categoriaPremio">
                                <?php
                                    foreach ($categorias as $row){
                                        if($row['CodCategoria'] == $descripcion[0]['CodCategoria']){
                                            echo '<option value="'.$row['CodCategoria'].'" selected>'.$row['nbCategoria'].'</option>';    
                                        }else{
                                            echo '<option value="'.$row['CodCategoria'].'">'.$row['nbCategoria'].'</option>';
                                        }
                                    }
                                ?>
                            </select>
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
                        <button type="button" class="btn btn-primary btn-block" id="<?php echo $descripcion[0]['codPremio']; ?>" onclick="actualizarPremioCatalogo(this)"><i class="fas fa-sync-alt"></i> Actualizar premio</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin-left: 50px;">Cerrar</button>
                </div>