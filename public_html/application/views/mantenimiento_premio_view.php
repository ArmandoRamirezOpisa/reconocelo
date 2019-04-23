        <div id="MessagePremio" class="container animated apareciendo" style="display:none;" style="margin-top: 50px;"></div>
        <div class="container animated apareciendo" style="margin-top: 100px;">
            <div class="row animated apareciendo">
                <div class="col-sm"></div>
                <div class="col-sm">
                    <h1>Premios</h1>
                </div>
                <div class="col-sm"></div>
            </div>

            <div class="form-group animated apareciendo">
                <label for="functionsPremio">Selecciona alguna opcion:</label>
                <select class="form-control" id="functionsPremio" onchange="optionsPremio(this)">
                    <option value="selecciona">Selecciona</option>
                    <option value="A">Alta</option>
                    <option value="B">Baja</option>
                    <option value="U">Actualizar</option>
                </select>
            </div>

            <div id="premioFunctions" class="animated apareciendo" style="display:none;"></div>
        </div>