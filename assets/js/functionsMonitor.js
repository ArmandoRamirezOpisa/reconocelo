const user = document.getElementById('user');
user.addEventListener('keyup', loginBtn);

const password = document.getElementById('password');
password.addEventListener('keyup', loginBtn);

function loginBtn(event) {
    if (event.keyCode == 13) {
        loginMonitorReconocelo();
    }
}

function loginMonitorReconocelo() {
    var user = $('#user').val();
    var password = $('#password').val();
    if (user == "" || password == "") {
        $('#errorMessage').html('Verifica que los campos esten llenados correctamente');
        $('#errorMessage').show();
    } else {
        $.ajax({
            url: location.href + '/login',
            async: 'true',
            cache: false,
            contentType: "application/x-www-form-urlencoded",
            global: true,
            ifModified: false,
            processData: true,
            data: { "user": user, "password": password },
            beforeSend: function() {},
            success: function(result) {
                if (result != 0) {
                    location.href = location.hostname + "/reconocelo/Monitor/home";
                } else {
                    $('#MessageError').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Advertencia!</strong> Usuario o contraseña incorrectos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    $('#MessageError').show();
                    $('#user').val("");
                    $('#password').val("");
                }
            },
            error: function(object, error, anotherObject) {},
            timeout: 30000,
            type: "POST"
        });
    }
}

function MonitorNav(id) {
    var idNavMonitor = id.id;
    switch (idNavMonitor) {
        case 'inicioMonitor':
            location.href = location.hostname + "/reconocelo/Monitor/home";
            break;
        case 'participantes':
            location.href = location.hostname + "/reconocelo/Monitor/participantes";
            break;
        case 'depositosPuntos':
            location.href = location.hostname + "/reconocelo/Monitor/depositos";
            break;
        case 'catologoActual':
            location.href = location.hostname + "/reconocelo/Monitor/catalogo";
            break;
        case 'SubirCatologoActual':
            location.href = location.hostname + "/reconocelo/Monitor/SubirCatologoActual";
            break;
        case 'monitorPrograma':
            location.href = location.hostname + "/reconocelo/Monitor/programa";
            break;
        case 'canjesPuntos':
            location.href = location.hostname + "/reconocelo/Monitor/canjes";
            break;
        case 'depositosPuntosInsertar':
            location.href = location.hostname + "/reconocelo/Monitor/insertarDepositos";
            break;
        case 'configuracionUsuarioMonitor':
            location.href = location.hostname + "/reconocelo/Monitor/configuracion";
            break;
        case 'olvidoPassword':
            location.href = location.hostname + "/reconocelo/Monitor/recuperarPassword";
            break;
        case 'reglasMonitor':
            location.href = location.hostname + "/reconocelo/Monitor/reglasMonitor";
            break;
    }
}

function Todosparticipantes() {
    $.ajax({
        url: '/Monitor/ParticipantesTodos',
        async: 'true',
        cache: false,
        contentType: "application/x-www-form-urlencoded",
        dataType: "html",
        error: function(object, error, anotherObject) {},
        global: true,
        ifModified: false,
        processData: true,
        success: function(result) {
            if (result == "0") {
                window.location.reload();
            } else {
                $('#ParticipanteSaldo').html(result);
            }
        },
        timeout: 30000,
        type: "GET"
    });
}

function participantesSaldo() {
    $.ajax({
        url: '/Monitor/conSaldoParticipantes',
        async: 'true',
        cache: false,
        contentType: "application/x-www-form-urlencoded",
        dataType: "html",
        error: function(object, error, anotherObject) {},
        global: true,
        ifModified: false,
        processData: true,
        success: function(result) {
            if (result == "0") {
                window.location.reload();
            } else {
                $('#ParticipanteSaldo').html(result);
            }
        },
        timeout: 30000,
        type: "GET"
    });
}

function filtroParticipantes(id) {
    var idSaldo = id.id;
    if (idSaldo == 'TodosSaldo') {
        Todosparticipantes();
    } else if (idSaldo == 'Saldo') {
        participantesSaldo();
    } else if (idSaldo == 'sinSaldo') {
        $.ajax({
            url: '/Monitor/sinSaldoParticipantes',
            async: 'true',
            cache: false,
            contentType: "application/x-www-form-urlencoded",
            dataType: "html",
            error: function(object, error, anotherObject) {},
            global: true,
            ifModified: false,
            processData: true,
            success: function(result) {
                if (result == "0") {
                    window.location.reload();
                } else {
                    $('#ParticipanteSaldo').html(result);
                }
            },
            timeout: 30000,
            type: "GET"
        });
    }
}

function estadoParticipante() {
    var radioTodosParticipantes = document.getElementById("TodosSaldo");
    var radioParticipantesSaldo = document.getElementById("Saldo");
    var radioParticipantesSinSaldo = document.getElementById("sinSaldo");
    var EstadoActivo = document.getElementById('estadoActivo').checked;
    var EstadoInactivo = document.getElementById('estadoInactivo').checked;
    if (radioTodosParticipantes.checked == true && EstadoActivo && EstadoInactivo) {
        Todosparticipantes();
        document.getElementById("alertFiltro").style.display = "none";
    } else if (radioTodosParticipantes.checked == true && EstadoActivo) {
        estadoParticipantes('/Monitor/saldoTodoActivo');
        document.getElementById("alertFiltro").style.display = "none";
    } else if (radioTodosParticipantes.checked == true && EstadoInactivo) {
        estadoParticipantes('/Monitor/saldoTodoInactivo');
        document.getElementById("alertFiltro").style.display = "none";
    } else if (radioParticipantesSaldo.checked == true && EstadoActivo && EstadoInactivo) {
        estadoParticipantes('/Monitor/conSaldoParticipantes');
        document.getElementById("alertFiltro").style.display = "none";
    } else if (radioParticipantesSaldo.checked == true && EstadoActivo) {
        estadoParticipantes('/Monitor/saldoActivo');
        document.getElementById("alertFiltro").style.display = "none";
    } else if (radioParticipantesSaldo.checked == true && EstadoInactivo) {
        estadoParticipantes('/Monitor/saldoInactivo');
        document.getElementById("alertFiltro").style.display = "none";
    } else if (radioParticipantesSinSaldo.checked == true && EstadoActivo && EstadoInactivo) {
        estadoParticipantes('/Monitor/sinSaldoParticipantes');
        document.getElementById("alertFiltro").style.display = "none";
    } else if (radioParticipantesSinSaldo.checked == true && EstadoActivo) {
        estadoParticipantes('/Monitor/sinSaldoActivo');
        document.getElementById("alertFiltro").style.display = "none";
    } else if (radioParticipantesSinSaldo.checked == true && EstadoInactivo) {
        estadoParticipantes('/Monitor/sinSaldoInactivo');
        document.getElementById("alertFiltro").style.display = "none";
    } else {
        document.getElementById("alertFiltro").style.display = "block";
    }
}

function estadoParticipantes(estadoFiltro) {
    $.ajax({
        url: estadoFiltro,
        async: 'true',
        cache: false,
        contentType: "application/x-www-form-urlencoded",
        dataType: "html",
        error: function(object, error, anotherObject) {},
        global: true,
        ifModified: false,
        processData: true,
        success: function(result) {
            if (result == "0") {
                window.location.reload();
            } else {
                $('#ParticipanteSaldo').html(result);
            }
        },
        timeout: 30000,
        type: "GET"
    });
}

function infoParticipante(id) {
    var codParticipante = id.id;
    $.ajax({
        url: '/Monitor/participanteInfo',
        async: 'true',
        cache: false,
        contentType: "application/x-www-form-urlencoded",
        global: true,
        ifModified: false,
        processData: true,
        data: { "codParticipante": codParticipante },
        beforeSend: function() {},
        success: function(result) {
            if (result == "0") {
                window.location.reload();
            } else {
                $('#participanteInfoBody').html(result);
            }
        },
        error: function(object, error, anotherObject) {},
        timeout: 30000,
        type: "POST"
    });
}

function catalogoIMG(id) {
    var codPremio = id.id;
    var longitudPremio = codPremio.length;
    if (longitudPremio == 1) {
        var codPremi = "0000".concat(codPremio);
    } else if (longitudPremio == 2) {
        codPremi = "000".concat(codPremio);
    } else if (longitudPremio == 3) {
        codPremi = "00".concat(codPremio);
    } else if (longitudPremio == 4) {
        codPremi = "0".concat(codPremio);
    } else if (longitudPremio == 5) {
        codPremi = codPremio;
    }
    $.ajax({
        url: '/Monitor/catalogoImg',
        async: 'true',
        cache: false,
        contentType: "application/x-www-form-urlencoded",
        global: true,
        ifModified: false,
        processData: true,
        data: { "codPremio": codPremi },
        beforeSend: function() {},
        success: function(result) {
            if (result == "0") {
                window.location.reload();
            } else {
                $('#imgCatalogo').html(result);
            }
        },
        error: function(object, error, anotherObject) {},
        timeout: 30000,
        type: "POST"
    });
}


function editarPremio(idPremio) {

    let codPremio = idPremio.id;
    let longitudPremio = codPremio.length;
    $.ajax({
        url: '/Monitor/updatePremio',
        async: 'true',
        cache: false,
        contentType: "application/x-www-form-urlencoded",
        global: true,
        ifModified: false,
        processData: true,
        data: { "codPremio": codPremio },
        beforeSend: function() {},
        success: function(result) {
            if (result == "0") {
                window.location.reload();
            } else {
                $('#EditandoPremio').html(result);
            }
        },
        error: function(object, error, anotherObject) {},
        timeout: 30000,
        type: "POST"
    });

}

function actualizarPremioCatalogo(CodPremioId) {
    let CodPremio = CodPremioId.id;
    let categoria = document.getElementById('categoriaPremio');
    let nombrePremio = document.getElementById('nombrePremio');
    let marcaPremio = document.getElementById('marcaPremio');
    let modeloPremio = document.getElementById('modeloPremio');
    let caractsPremio = document.getElementById('caractsPremio');
    $.ajax({
        url: '/Monitor/updateDataPremio',
        async: 'true',
        cache: false,
        contentType: "application/x-www-form-urlencoded",
        global: true,
        ifModified: false,
        processData: true,
        data: {
            "CodPremio": CodPremio,
            "categoria": categoria.value,
            "nombrePremio": nombrePremio.value,
            "marcaPremio": marcaPremio.value,
            "modeloPremio": modeloPremio.value,
            "caractsPremio": caractsPremio.value
        },
        beforeSend: function() {},
        success: function(result) {
            if (result == "0") {
                $('#MessageModalPremio').html(`El codigo de premio ${ CodPremio } no se actualizo correctamente`);
            } else {
                setTimeout(window.location.reload(), 3000);
            }
        },
        error: function(object, error, anotherObject) {},
        timeout: 30000,
        type: "POST"
    });
}

var idPremioCatalogo = 0;

function borrarCatalogoPremio(id) {
    idPremioCatalogo = id.id;
}

function borrarPremioCatalogo() {
    var codPremioCatalogo = idPremioCatalogo;
    console.log(`Entro bien ${codPremioCatalogo}`);
    $.ajax({
        url: '/Monitor/borrarCatalogo',
        async: 'true',
        cache: false,
        contentType: "application/x-www-form-urlencoded",
        global: true,
        ifModified: false,
        processData: true,
        data: { "idPremioCatalogo": codPremioCatalogo },
        beforeSend: function() {},
        success: function(result) {
            if (result == "0") {
                console.log(result);
                $('#messageCatalogoActual').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Advertencia!</strong> No se pudo borrar el PermissionRequest, espera un momento para volverlo a intentar.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>')
            } else {
                console.log(result);
                setTimeout(window.location.reload(), 3000);
                $('#messageCatalogoActual').html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Excelente!</strong> El premio se borro exitosamente.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            }
        },
        error: function(object, error, anotherObject) {},
        timeout: 30000,
        type: "POST"
    });
}

function depositos() {
    $.ajax({
        url: '/Monitor/depositosInfo',
        async: 'true',
        cache: false,
        contentType: "application/x-www-form-urlencoded",
        dataType: "html",
        error: function(object, error, anotherObject) {},
        global: true,
        ifModified: false,
        processData: true,
        success: function(result) {
            if (result == "0") {
                window.location.reload();
            } else {
                $('#depositoInformacion').html(result);
            }
        },
        timeout: 30000,
        type: "GET"
    });
}

function fechaInicioFinSelect() {
    var fechaInicio = document.getElementById("fechaInicio").value;
    var fechaFin = document.getElementById("fechaFin").value;
    if (fechaInicio == 'selecciona' && fechaFin == 'selecciona') {
        $('#alertFiltroDeposito').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Atención!</strong> Debes tener seleccionar una fecha.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        throw new Error("Seleccionaste selecciona");
    } else if (fechaInicio != 'selecciona' || fechaFin != 'selecciona') {
        if (fechaInicio == fechaFin) {
            $('#alertFiltroDeposito').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Atención!</strong> Las fechas que seleccionaste son iguales, selecciona diferentes.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            throw new Error("Fechas iguales");
        } else if (fechaInicio >= fechaFin) {
            $('#alertFiltroDeposito').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Atención!</strong> La primer fecha que seleccionastes es mayor.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            throw new Error("La fecha de inicio es mayor");
        } else if (fechaInicio <= fechaFin) {
            $.ajax({
                url: '/Monitor/depositosInforma',
                async: 'true',
                cache: false,
                contentType: "application/x-www-form-urlencoded",
                global: true,
                ifModified: false,
                processData: true,
                data: { "fechaInicio": fechaInicio, "fechaFin": fechaFin },
                beforeSend: function() {},
                success: function(result) {
                    if (result == "0") {
                        $('#alertFiltroDeposito').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Atención!</strong> No se encontraron datos con las fechas seleccionadas.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    } else {
                        $('#depositoInformacion').html(result);
                    }
                },
                error: function(object, error, anotherObject) {
                    $('#alertFiltroDeposito').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Atención!</strong> Ocurrio un error intentalo mas tarde.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                },
                timeout: 30000,
                type: "POST"
            });
        }
    }
}

function uploadPuntosDepo() {
    var numTransaccion = $('#numTransaccion').val()
    if (numTransaccion != "Selecciona") {
        $.ajax({
            url: '/Monitor/uploadPuntosDeposito',
            async: 'true',
            cache: false,
            contentType: "application/x-www-form-urlencoded",
            global: true,
            ifModified: false,
            processData: true,
            data: { "numTransaccion": numTransaccion },
            beforeSend: function() {},
            success: function(result) {
                if (result == "0") {
                    $('#MessageInsertarDepositos').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Advertencia!</strong> No se activaron todos los puntos correctamente.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                } else {
                    $('#parsed_csv_list').hide();
                    $('#MessageInsertarDepositos').html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Exito!</strong> Se activaron los puntos correctamente.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                }
            },
            error: function(object, error, anotherObject) {},
            timeout: 30000,
            type: "POST"
        });
    }
}

function canjes() {
    $.ajax({
        url: '/Monitor/canjesInfo',
        async: 'true',
        cache: false,
        contentType: "application/x-www-form-urlencoded",
        dataType: "html",
        error: function(object, error, anotherObject) {},
        global: true,
        ifModified: false,
        processData: true,
        success: function(result) {
            if (result == "0") {
                window.location.reload();
            } else {
                $('#CanjeInformacion').html(result);
            }
        },
        timeout: 30000,
        type: "GET"
    });
}

function fechaInicioFinSelectCanje() {
    var fechaInicio = document.getElementById("fechaInicio").value;
    var fechaFin = document.getElementById("fechaFin").value;
    if (fechaInicio == 'selecciona' && fechaFin == 'selecciona') {
        $('#messageCanjeAlert').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Advertencia!</strong> Debes de seleccionar alguna fecha.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        throw new Error("Seleccionaste Selecciona");
    } else if (fechaInicio != 'selecciona' || fechaFin != 'selecciona') {
        if (fechaInicio == fechaFin) {
            $('#messageCanjeAlert').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Advertencia!</strong> Seleccionaste fechas iguales.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            throw new Error("Fechas iguales");
        } else if (fechaInicio >= fechaFin) {
            $('#messageCanjeAlert').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Advertencia!</strong> La fecha de inicio, tiene que ser menor.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            throw new Error("Fecha de inicio menor");
        } else if (fechaInicio <= fechaFin) {
            $.ajax({
                url: '/Monitor/canjesInforma',
                async: 'true',
                cache: false,
                contentType: "application/x-www-form-urlencoded",
                global: true,
                ifModified: false,
                processData: true,
                data: { "fechaInicio": fechaInicio, "fechaFin": fechaFin },
                beforeSend: function() {},
                success: function(result) {
                    if (result == "0") {
                        $('#messageCanjeAlert').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Advertencia!</strong> Algo salio mal, intentalo mas tarde.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    } else {
                        $('#depositoInformacion').html(result);
                    }
                },
                error: function(object, error, anotherObject) {},
                timeout: 30000,
                type: "POST"
            });
        }
    }
}

function cancelarCanje() {
    var codPrograma = document.getElementById('codPrograma').value;
    var folioCanje = document.getElementById('folioCanje').value;

    if (codPrograma == '' || folioCanje == '') {
        $('#messageCancelarCanje').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Advertencia!</strong> Algo campo esta vacio, verifica que ningun campo este vacio.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    } else if (codPrograma != '' && folioCanje != '') {
        $.ajax({
            url: '/Monitor/cancelarOrden',
            async: 'true',
            cache: false,
            contentType: "application/x-www-form-urlencoded",
            global: true,
            ifModified: false,
            processData: true,
            data: { "codPrograma": codPrograma, "folioCanje": folioCanje },
            beforeSend: function() {},
            success: function(result) {
                if (result == "0") {
                    $('#messageCancelarCanje').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error!</strong> No se pudo cancelar la orden.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                } else {
                    $('#messageCancelarCanje').html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Exito!</strong> Se cancelo la orden exitosamente.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    document.getElementById("btnCancelarOrden").disabled = true;
                }
            },
            error: function(object, error, anotherObject) {},
            timeout: 30000,
            type: "POST"
        });
    }
}

function config(id) {
    var id = id.id;
    if (id == "changeUser") {
        var usuario = $('#userReconoceloMonitor').val();
        if (usuario == "") {
            $('#messageUser').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Advertencia!</strong> Debes de escribir un nombre, para poder cambiar el nombre.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            throw new Error("Datos de formulario incompleto");
        } else {
            $.ajax({
                url: '/Monitor/cambiarUserName',
                async: 'true',
                cache: false,
                contentType: "application/x-www-form-urlencoded",
                global: true,
                ifModified: false,
                processData: true,
                data: { "usuario": usuario },
                beforeSend: function() {},
                success: function(result) {
                    if (result == "0") {
                        $('#messageUser').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Advertencia!</strong> No se cambio el nombre correctamente.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    } else {
                        $('#messageUser').html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Exito!</strong> Se cambio el nombre correctamente.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    }
                },
                error: function(object, error, anotherObject) {},
                timeout: 30000,
                type: "POST"
            });
        }
    } else if (id == "changePassword") {
        var password = $('#password').val();
        var passwordConfirm = $('#passwordConfirm').val();
        if (password == "" || passwordConfirm == "") {
            $('#messagePassword').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Advertencia!</strong> Debes de escribir una contraseña, para poder cambiarla.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            throw new Error("Datos de formulario incompleto");
        } else if (password != passwordConfirm) {
            $('#messagePassword').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Advertencia!</strong> Las contraseñas, no coinciden.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            throw new Error("Datos de formulario incompleto");
        } else if (password == passwordConfirm) {
            $.ajax({
                url: '/Monitor/cambiarUserPassword',
                async: 'true',
                cache: false,
                contentType: "application/x-www-form-urlencoded",
                global: true,
                ifModified: false,
                processData: true,
                data: { "password": password },
                beforeSend: function() {},
                success: function(result) {
                    if (result == "0") {
                        $('#messagePassword').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Advertencia!</strong> No se cambio la contraseña correctamente.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    } else {
                        $('#messagePassword').html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Exito!</strong> Se cambio la contraseña correctamente.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    }
                },
                error: function(object, error, anotherObject) {},
                timeout: 30000,
                type: "POST"
            });
        }
    }
}

const mailRecuperar = document.getElementById('mailRecuperar');
mailRecuperar.addEventListener('keyup', enviarCorreo);

function enviarCorreo(event) {
    if (event.keyCode == 13) {
        sendRecuperaPassword();
    }
}

function sendRecuperaPassword() {
    var email = $('#mailRecuperar').val();
    if (email == "") {
        $('#MessageRecupera').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Advertencia!</strong> debes de escribir un correo.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        throw new Error("Datos de formulario incompleto");
    } else {
        $.ajax({
            url: '/Monitor/sendMailRecupera',
            async: 'true',
            cache: false,
            contentType: "application/x-www-form-urlencoded",
            global: true,
            ifModified: false,
            processData: true,
            data: { "email": email },
            beforeSend: function() {},
            success: function(result) {
                if (result == "0") {
                    $('#MessageRecupera').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Advertencia!</strong> Algo salio mal al mandar el correo, verifica si lo escribiste correctamente.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                } else {
                    $('#MessageRecupera').html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Exito!</strong> Se mando a tu correo, para que puedas recuperar tu cuenta.En caso de no aparecer, favor de revisar la carpeta de spam.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                }
            },
            error: function(object, error, anotherObject) {},
            timeout: 30000,
            type: "POST"
        });
    }
}

function configNew(id) {
    var userConfig = id.id;
    var userConfigToal = userConfig.split("-");
    var usuario = userConfigToal[0];
    var codEmpresa = userConfigToal[1];
    var password = $('#passwordNew').val();
    var passwordConfirm = $('#passwordConfirmNew').val();
    if (password == "" || passwordConfirm == "") {
        $('#MessageRecuperar').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Advertencia!</strong> Campos vacios, debes escribir.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        throw new Error("Datos de formulario incompleto");
    } else {
        if (password != passwordConfirm) {
            $('#MessageRecuperar').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Advertencia!</strong> No coinciden.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            throw new Error("Datos de formulario incompleto");
        } else {
            $.ajax({
                url: '/Monitor/cambiarUserPasswordNew',
                async: 'true',
                cache: false,
                contentType: "application/x-www-form-urlencoded",
                global: true,
                ifModified: false,
                processData: true,
                data: { "password": password, "usuario": usuario, "codEmpresa": codEmpresa },
                beforeSend: function() {},
                success: function(result) {
                    if (result == "0") {
                        $('#MessageRecuperar').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Advertencia!</strong> No se cambio la contraseña correctamente.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    } else {
                        $('#MessageRecuperar').html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Exito!</strong> Se cambio la contraseña correctamente.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                        $('#PasswordMonitor').hide();
                        $('#sesionMonitor').show();
                    }
                },
                error: function(object, error, anotherObject) {},
                timeout: 30000,
                type: "POST"
            });
        }
    }
}

function cambiarRegla(id) {
    var idReglaNombre = id.id;
    var textoRegla = $('#regla-' + idReglaNombre).val();
    if (textoRegla == "") {
        throw new Error("Rule void");
    } else {
        $.ajax({
            url: '/Monitor/cambiarReglaReconocelo',
            async: 'true',
            cache: false,
            contentType: "application/x-www-form-urlencoded",
            global: true,
            ifModified: false,
            processData: true,
            data: { "idReglaNombre": idReglaNombre, "textoRegla": textoRegla },
            beforeSend: function() {},
            success: function(result) {
                if (result == "0") {} else {
                    location.reload();
                }
            },
            error: function(object, error, anotherObject) {},
            timeout: 30000,
            type: "POST"
        });
    }
}

function cambiarNombreRegla(id) {
    var idBtn = id.id
    var idBtnArray = idBtn.split("-");
    var activeInput = "nombre-" + idBtnArray[1];
    $('#' + activeInput).show();
}

function cambiarNombreReglaBtn(id) {
    var idBtnCambiar = id.id;
    var idBtnCambiarArray = idBtnCambiar.split("-");
    var idReglaNombre = idBtnCambiarArray[1];
    var textCambiar = $('#text-' + idReglaNombre).val();
    if (textCambiar == "") {
        throw new Error("Caja de texto vacio");
    } else {
        $.ajax({
            url: '/Monitor/cambiarNombreReglaReconocelo',
            async: 'true',
            cache: false,
            contentType: "application/x-www-form-urlencoded",
            global: true,
            ifModified: false,
            processData: true,
            data: { "idReglaNombre": idReglaNombre, "textCambiar": textCambiar },
            beforeSend: function() {},
            success: function(result) {
                if (result == "0") {} else {
                    location.reload();
                }
            },
            error: function(object, error, anotherObject) {},
            timeout: 30000,
            type: "POST"
        });
    }
}

function addNuevaRegla(id) {
    var idRegla = id.id;
    if (idRegla == "agregarNuevaRegla") {
        $('#ocultarNuevaRegla').show();
        $('#agregarNuevaRegla').hide();
        $('#nuevaReglaData').show();
    } else if (idRegla == "ocultarNuevaRegla") {
        $('#nuevaReglaData').hide();
        $('#ocultarNuevaRegla').hide();
        $('#agregarNuevaRegla').show();
    }
}

function addNuevaReglaData() {
    var textoRegla = $('#nuevoNombreRegla').val();
    var descripcionRegla = $('#DecripcionNuevaRegla').val();
    if (textoRegla == "" || descripcionRegla == "") {
        $('#MessageNuevaRegla').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Advertencia!</strong> Algunos de los campos se encuentran vacios.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button</div>');
        $('#MessageNuevaRegla').show();
        throw new Error("Cajas de texto vacio");
    } else {
        $.ajax({
            url: '/Monitor/addNuevaRegla',
            async: 'true',
            cache: false,
            contentType: "application/x-www-form-urlencoded",
            global: true,
            ifModified: false,
            processData: true,
            data: { "regla": textoRegla, "descripcionRegla": descripcionRegla },
            beforeSend: function() {},
            success: function(result) {
                if (result == "0") {} else {
                    $('#nuevoNombreRegla').val("");
                    $('#DecripcionNuevaRegla').val("");
                    $('#nuevaReglaData').hide();
                    $('#ocultarNuevaRegla').hide();
                    $('#agregarNuevaRegla').show();
                    $('#MessageNuevaRegla').html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Exito!</strong> Se ha creado una nueva regla.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button</div>');
                    $('#MessageNuevaRegla').show();
                }
            },
            error: function(object, error, anotherObject) {
                $('#nuevoNombreRegla').val("");
                $('#DecripcionNuevaRegla').val("");
                $('#nuevaReglaData').hide();
                $('#ocultarNuevaRegla').hide();
                $('#agregarNuevaRegla').show();
                $('#MessageNuevaRegla').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error!</strong> Algo ocurrio mal intentalo mas tarde.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button</div>');
                $('#MessageNuevaRegla').show();
            },
            timeout: 30000,
            type: "POST"
        });
    }
}

function exit() {
    swal({
        title: "¿Esta seguro de cerrar sesion?",
        text: "",
        icon: "warning",
        buttons: [
            'No, Cancelar!',
            'Si, Estoy seguro!'
        ],
        dangerMode: true,
    }).then(function(isConfirm) {
        if (isConfirm) {
            location.href = location.hostname + "/reconocelo/Monitor/salirMonitor";
        } else {}
    });
}