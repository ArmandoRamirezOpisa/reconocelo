        <div class="container">
            <div class="row">
                <div class="col-4">
                    <div class="list-group" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-action active" id="list-usuario-list" data-toggle="list" href="#list-usuario" role="tab" aria-controls="usuario"><strong>Usuario</strong></a>
                        <a class="list-group-item list-group-item-action" id="list-password-list" data-toggle="list" href="#list-password" role="tab" aria-controls="password"><strong>Contraseña</strong></a>
                    </div>
                </div>
                <div class="col-8">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="list-usuario" role="tabpanel" aria-labelledby="list-usuario-list">
                            <div id="messageUser"></div>
                            <form>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1"><strong>Nombre usuario</strong></label>
                                    <input type="text" class="form-control" id="userReconoceloMonitor" placeholder="Escribe tu nombre de usuario.">
                                </div>
                                <button type="button" id="changeUser" class="btn btn-primary btn-block" onClick = "config(this)"><i class="fas fa-save"></i> Cambiar nombre</button>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="list-password" role="tabpanel" aria-labelledby="list-password-list">
                            <div id="messagePassword"></div>
                            <form>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1"><strong>Contraseña*</strong></label>
                                    <input type="password" class="form-control" id="password" placeholder="Escribe tu contraseña">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1"><Strong>Confirmar contraseña*</strong></label>
                                    <input type="password" class="form-control" id="passwordConfirm" placeholder="Confirma tu contraseña">
                                </div>
                                <button type="button" id="changePassword" class="btn btn-primary btn-block" onClick = "config(this)"><i class="fas fa-save"></i> Cambiar contraseña</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.getElementById("navegacionMonitor").innerHTML = "<h1>Restablecer contraseña</h1>";
        </script>