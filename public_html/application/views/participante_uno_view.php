                <div class="row">
                    <div class="col-sm">
                        <h1 class="text-center">Registra un participante</h1>
                    </div>
                    <div class="col-sm"></div>
                </div>

                <form>
                    <div class="form-group">
                        <label for="idParticipante">Id participante</label>
                        <input type="number" class="form-control" id="idParticipante" required>
                    </div>
                    <div class="form-group">
                        <label for="codPrograma">Codigo de programa</label>
                        <input type="number" class="form-control" id="codPrograma" required>
                    </div>
                    <div class="form-group">
                        <label for="codEmpresa">Codigo empresa</label>
                        <input type="number" class="form-control" id="codEmpresa" required>
                    </div>
                    <div class="form-group">
                        <label for="codParticipante">Codigo participante</label>
                        <input type="number" class="form-control" id="codParticipante" required>
                    </div>
                    <div class="form-group">
                        <label for="cargo">Cargo</label>
                        <input type="text" class="form-control" id="cargo" required>
                    </div>
                    <div class="form-group">
                        <label for="nombreCompleto">Nombre completo</label>
                        <input type="text" class="form-control" id="nombreCompleto" required>
                    </div>
                    <div class="form-group">
                        <label for="calleNumero">Calle y numero</label>
                        <input type="text" class="form-control" id="calleNumero" required>
                    </div>
                    <div class="form-group">
                        <label for="colonia">Colonia</label>
                        <input type="text" class="form-control" id="colonia" required>
                    </div>
                    <div class="form-group">
                        <label for="cp">Codigo postal</label>
                        <input type="number" class="form-control" id="cp" required>
                    </div>
                    <div class="form-group">
                        <label for="ciudad">Ciudad</label>
                        <input type="text" class="form-control" id="ciudad" required>
                    </div>
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <input type="text" class="form-control" id="estado" required>
                    </div>
                    <div class="form-group">
                        <label for="pais">Pais</label>
                        <input type="text" class="form-control" id="pais" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input type="tel" class="form-control" id="telefono" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" id="password" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Correo electronico</label>
                        <input type="email" class="form-control" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="loginweb">Login web</label>
                        <input type="number" class="form-control" id="loginweb" required>
                    </div>
                    <button id="participanteBtn" type="button" class="btn btn-primary btn-lg btn-block" onclick="saveParticipante()"><i id="btnIcon" class="fas fa-save"></i> Guardar</button>
                </form>