        <div class="container animated apareciendo" style="margin-top: 100px;">            
            <div id="alertMessage" class="container mt-5 animated apareciendo" style="display:none;"></div>
            <div class="row animated apareciendo">
                <div class="col-sm"></div>
                <div class="col-sm">
                    <h1>Participantes</h1>
                </div>
                <div class="col-sm"></div>
            </div>
            <div class="form-group animated apareciendo">
                    <label for="functionsPremio">Selecciona alguna opcion:</label>
                    <select class="form-control" id="functionsPremio" onchange="optionsParticipante(this)">
                        <option value="selecciona">Selecciona</option>
                        <option value="oneParticipantes">Dar de alta un participante</option>
                        <option value="moreParticipantes">Dar de alta varios participantes</option>
                    </select>
                </div>
            <div id="opcionesParticipantes" class="animated apareciendo"></div>
        </div>