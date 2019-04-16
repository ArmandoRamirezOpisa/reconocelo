            <div class="row">
                <div class="col-sm"></div>
                <div class="col-sm">
                    <h3>Dar de baja un premio</h3>
                </div>
                <div class="col-sm"></div>
            </div>

            <form>
                <div class="form-group">
                    <label for="codPremio">Codigo de premio</label>
                    <input type="number" class="form-control" id="codPremioBaja" required>
                </div>
                <button id="PremioBaja" type="button" class="btn btn-primary" onclick="premioBaja()"><i class="fas fa-trash"></i>  Eliminar</button>
            </form>

            <div id="BajaPremioConfirmacion" style="display:none;">

                <div class="row">
                    <div class="col-sm">
                        <h3>Seguro que quieres darlo de baja?</h3>
                    </div>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="siBaja" value="si" onclick="bajaPremio()">
                    <label class="form-check-label" for="inlineRadio1">Darlo de baja</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="noBaja" value="no" onclick="bajaPremio()">
                    <label class="form-check-label" for="inlineRadio2">No darlo de baja</label>
                </div>
                <button id="deletePremio" type="button" class="btn btn-primary mb-2" onclick="premioBajaOk()" disabled>Eliminar premio</button>

            </div>