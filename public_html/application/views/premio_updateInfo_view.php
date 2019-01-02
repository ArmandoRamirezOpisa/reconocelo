            <form>
                <div class="form-group">
                    <label for="codPremio">Codigo de premio</label>
                    <input type="text" class="form-control" id="codPremio" value=<?php echo $PremioDataInfo['codPremio'] ?>>
                </div>
                <div class="form-group">
                    <label for="codCategoria">Codigo categoria</label>
                    <input type="text" class="form-control" id="codCategoria" value=<?php echo $PremioDataInfo['CodCategoria'] ?>>
                </div>
                <div class="form-group">
                    <label for="codProveedor">Codigo proveedor</label>
                    <input type="text" class="form-control" id="codProveedor" value=<?php echo $PremioDataInfo['codProveedor'] ?>>
                </div>
                <div class="form-group">
                    <label for="marca">Marca</label>
                    <input type="text" class="form-control" id="marca" value=<?php echo $PremioDataInfo['Marca'] ?>>
                </div>
                <div class="form-group">
                    <label for="modelo">Modelo</label>
                    <input type="text" class="form-control" id="modelo" value=<?php echo $PremioDataInfo['Modelo'] ?>>
                </div>
                <div class="form-group">
                    <label for="nomESP">Nombre Espanol</label>
                    <input type="text" class="form-control" id="nomESP" value=<?php echo $PremioDataInfo['Nombre_Esp'] ?>>
                </div>
                <div class="form-group">
                    <label for="nomING">Nombre Ingles</label>
                    <input type="text" class="form-control" id="nomING" value=<?php echo $PremioDataInfo['Nombre_Ing'] ?>>
                </div>
                <div class="form-group">
                    <label for="caracESP">Caracteristicas espanol</label>
                    <input type="text" class="form-control" id="caracESP" value=<?php echo $PremioDataInfo['Caracts_Esp'] ?>>
                </div>
                <div class="form-group">
                    <label for="caracING">Caracteristicas ingles</label>
                    <input type="text" class="form-control" id="caracING" value=<?php echo $PremioDataInfo['Caracts_Ing'] ?>>
                </div>
                <div class="form-group">
                    <label for="codPrograma">Codigo de programa</label>
                    <input type="text" class="form-control" id="codPrograma">
                </div>
                <div class="form-group">
                    <label for="codEmpresa">Codigo de empresa</label>
                    <input type="text" class="form-control" id="codEmpresa">
                </div>
                <div class="form-group">
                    <label for="valorPuntos">Valor en puntos</label>
                    <input type="text" class="form-control" id="valorPuntos">
                </div>
                <button type="button" class="btn btn-primary" onclick="altaPremio()"><i class="fas fa-save"></i>  Guardar</button>
            </form>