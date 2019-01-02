        <?php
            echo '<form>
                <div class="form-group">
                    <label for="codPremio">Codigo de premio</label>
                    <input type="text" class="form-control" id="codPremio" value="'.$PremioDataInfo[0]['codPremio'].'">
                </div>
                <div class="form-group">
                    <label for="codCategoria">Codigo categoria</label>
                    <input type="text" class="form-control" id="codCategoria" value="'.$PremioDataInfo[0]['CodCategoria'].'">
                </div>
                <div class="form-group">
                    <label for="codProveedor">Codigo proveedor</label>
                    <input type="text" class="form-control" id="codProveedor" value="'.$PremioDataInfo[0]['codProveedor'].'">
                </div>
                <div class="form-group">
                    <label for="marca">Marca</label>
                    <input type="text" class="form-control" id="marca" value="'.$PremioDataInfo[0]['Marca'].'">
                </div>
                <div class="form-group">
                    <label for="modelo">Modelo</label>
                    <input type="text" class="form-control" id="modelo" value="'.$PremioDataInfo[0]['Modelo'].'">
                </div>
                <div class="form-group">
                    <label for="nomESP">Nombre Espanol</label>
                    <input type="text" class="form-control" id="nomESP" value="'.$PremioDataInfo[0]['Nombre_Esp'].'">
                </div>
                <div class="form-group">
                    <label for="nomING">Nombre Ingles</label>
                    <input type="text" class="form-control" id="nomING" value="'.$PremioDataInfo[0]['Nombre_Ing'].'">
                </div>
                <div class="form-group">
                    <label for="caracESP">Caracteristicas espanol</label>
                    <input type="text" class="form-control" id="caracESP" value="'.$PremioDataInfo[0]['Caracts_Esp'].'">
                </div>
                <div class="form-group">
                    <label for="caracING">Caracteristicas ingles</label>
                    <input type="text" class="form-control" id="caracING" value="'.$PremioDataInfo[0]['Caracts_Ing'].'">
                </div>
                <div class="form-group">
                    <label for="codPrograma">Codigo de programa</label>
                    <input type="text" class="form-control" id="codPrograma" value="'.$PremioProgramaDataInfo[0]['codPrograma'].'">
                </div>
                <div class="form-group">
                    <label for="codEmpresa">Codigo de empresa</label>
                    <input type="text" class="form-control" id="codEmpresa" value="'.$PremioProgramaDataInfo[0]['codEmpresa'].'">
                </div>
                <div class="form-group">
                    <label for="valorPuntos">Valor en puntos</label>
                    <input type="text" class="form-control" id="valorPuntos" value="'.$PremioProgramaDataInfo[0]['ValorPuntos'].'">
                </div>
                <button type="button" class="btn btn-primary"><i class="fas fa-save"></i>  Guardar</button>
            </form>';
        ?>