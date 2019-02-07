                <div class="row">
                    <div class="col-sm">
                        <h1 class="text-center">Registra un participante</h1>
                    </div>
                    <div class="col-sm"></div>
                </div>

                <form>
                    <div class="form-group">
                        <label for="idParticipante">Id participante</label>
                        <input type="number" class="form-control" id="idParticipante">
                    </div>
                    <div class="form-group">
                        <label for="codPrograma">Codigo de programa</label>
                        <input type="number" class="form-control" id="codPrograma">
                    </div>
                    <div class="form-group">
                        <label for="codEmpresa">Codigo empresa</label>
                        <input type="number" class="form-control" id="codEmpresa">
                    </div>
                    <div class="form-group">
                        <label for="codParticipante">Codigo participante</label>
                        <input type="number" class="form-control" id="codParticipante">
                    </div>
                    <div class="form-group">
                        <label for="cargo">Cargo</label>
                        <input type="text" class="form-control" id="cargo">
                    </div>
                    <div class="form-group">
                        <label for="nombreCompleto">Nombre completo</label>
                        <input type="text" class="form-control" id="nombreCompleto">
                    </div>
                    <div class="form-group">
                        <label for="calleNumero">Calle y numero</label>
                        <input type="text" class="form-control" id="calleNumero">
                    </div>
                    <div class="form-group">
                        <label for="colonia">Colonia</label>
                        <input type="text" class="form-control" id="colonia">
                    </div>
                    <div class="form-group">
                        <label for="cp">Codigo postal</label>
                        <input type="number" class="form-control" id="cp">
                    </div>
                    <div class="form-group">
                        <label for="ciudad">Ciudad</label>
                        <input type="text" class="form-control" id="ciudad">
                    </div>
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <input type="text" class="form-control" id="estado">
                    </div>
                    <div class="form-group">
                        <label for="pais">Pais</label>
                        <input type="text" class="form-control" id="pais">
                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input type="tel" class="form-control" id="telefono">
                    </div>
                    <div class="form-group">
                        <label for="password">Contrasena</label>
                        <input type="password" class="form-control" id="password">
                    </div>
                    <div class="form-group">
                        <label for="email">Correo electronico</label>
                        <input type="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="loginweb">Login web</label>
                        <input type="number" class="form-control" id="loginweb">
                    </div>
                    <button id="participanteBtn" type="button" class="btn btn-primary btn-lg btn-block" onclick="saveParticipante()"><i id="btnIcon" class="fas fa-save"></i> Guardar</button>
                </form>