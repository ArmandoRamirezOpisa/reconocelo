            <div class="row">
                <div class="col-sm"></div>
                <div class="col-sm">
                    <h3>Actualizar un premio</h3>
                </div>
                <div class="col-sm"></div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Premios</label>
                <select class="form-control" id="exampleFormControlSelect1">
                    <option value="selecciona">Selecciona un premio:</option>
                    <?php
                        if($PremioData){
                            foreach($PremioData as $row){
                                echo '<option value='.$row['codPremio'].'>'.$row['Nombre_Esp'].'</option>';
                            }
                        }
                    ?>
                </select>
            </div>