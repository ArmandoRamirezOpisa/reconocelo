//Archivo de javaScript donde tiene las funciones de reconocelo/monitor

//Funcion para controlar el div, cuando se esta navegando
function MonitorNav(id) {

    var idNavMonitor = id.id;

    switch (idNavMonitor) {
        case 'inicioMonitor':
            location.href = "https://" + location.hostname + "/monitor/home";
            break;
        case 'participantes':
            location.href = "https://" + location.hostname + "/monitor/participantes";
            break;
        case 'depositosPuntos':
            location.href = "https://" + location.hostname + "/monitor/depositos";
            break;
        case 'catologoActual':
            location.href = "https://" + location.hostname + "/monitor/catalogo";
            break;
        case 'monitorPrograma':
            location.href = "https://" + location.hostname + "/monitor/programa";
            break;
        case 'canjesPuntos':
            location.href = "https://" + location.hostname + "/monitor/canjes";
            break;
        case 'depositosPuntosInsertar':
            location.href = "https://" + location.hostname + "/monitor/insertarDepositos";
            break;
        case 'configuracionUsuarioMonitor':
            location.href = "https://" + location.hostname + "/monitor/configuracion";
            break;
        case 'olvidoPassword':
            location.href = "https://" + location.hostname + "/monitor/recuperarPassword";
            break;
    }

}
/* Inicio participantes */

//Todos los participantes
function Todosparticipantes() {

    $.ajax({
        url: '/monitor/ParticipantesTodos',
        async: 'true',
        cache: false,
        contentType: "application/x-www-form-urlencoded",
        dataType: "html",
        error: function(object, error, anotherObject) {
            alert('Mensaje: ' + object.statusText + 'Status: ' + object.status);
        },
        global: true,
        ifModified: false,
        processData: true,
        success: function(result) {

            if (result == "0") {
                console.log("Expiro");
                window.location.reload();
            } else {
                //console.log(result);
                $('#ParticipanteSaldo').html(result);
            }

        },
        timeout: 30000,
        type: "GET"
    });

}

//Participantes con saldo
function participantesSaldo() {

    $.ajax({
        url: '/monitor/conSaldoParticipantes',
        async: 'true',
        cache: false,
        contentType: "application/x-www-form-urlencoded",
        dataType: "html",
        error: function(object, error, anotherObject) {
            alert('Mensaje: ' + object.statusText + 'Status: ' + object.status);
        },
        global: true,
        ifModified: false,
        processData: true,
        success: function(result) {

            if (result == "0") {
                console.log("Expiro");
                window.location.reload();
            } else {
                //console.log(result);
                $('#ParticipanteSaldo').html(result);
            }

        },
        timeout: 30000,
        type: "GET"
    });

}

//Filtro participantes
function filtroParticipantes(id) {
    var idSaldo = id.id;
    if (idSaldo == 'TodosSaldo') {
        Todosparticipantes();
    } else if (idSaldo == 'Saldo') {
        participantesSaldo();
    } else if (idSaldo == 'sinSaldo') {
        $.ajax({
            url: '/monitor/sinSaldoParticipantes',
            async: 'true',
            cache: false,
            contentType: "application/x-www-form-urlencoded",
            dataType: "html",
            error: function(object, error, anotherObject) {
                alert('Mensaje: ' + object.statusText + 'Status: ' + object.status);
            },
            global: true,
            ifModified: false,
            processData: true,
            success: function(result) {

                if (result == "0") {
                    console.log("Expiro");
                    window.location.reload();
                } else {
                    //console.log(result);
                    $('#ParticipanteSaldo').html(result);
                }

            },
            timeout: 30000,
            type: "GET"
        });

    }
}

//Estado Activo e Inactivo, participantes
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
        estadoParticipantes('/monitor/saldoTodoActivo');
        document.getElementById("alertFiltro").style.display = "none";
    } else if (radioTodosParticipantes.checked == true && EstadoInactivo) {
        estadoParticipantes('/monitor/saldoTodoInactivo');
        document.getElementById("alertFiltro").style.display = "none";
    } else if (radioParticipantesSaldo.checked == true && EstadoActivo && EstadoInactivo) {
        estadoParticipantes('/monitor/conSaldoParticipantes');
        document.getElementById("alertFiltro").style.display = "none";
    } else if (radioParticipantesSaldo.checked == true && EstadoActivo) {
        estadoParticipantes('/monitor/saldoActivo');
        document.getElementById("alertFiltro").style.display = "none";
    } else if (radioParticipantesSaldo.checked == true && EstadoInactivo) {
        estadoParticipantes('/monitor/saldoInactivo');
        document.getElementById("alertFiltro").style.display = "none";
    } else if (radioParticipantesSinSaldo.checked == true && EstadoActivo && EstadoInactivo) {
        estadoParticipantes('/monitor/sinSaldoParticipantes');
        document.getElementById("alertFiltro").style.display = "none";
    } else if (radioParticipantesSinSaldo.checked == true && EstadoActivo) {
        estadoParticipantes('/monitor/sinSaldoActivo');
        document.getElementById("alertFiltro").style.display = "none";
    } else if (radioParticipantesSinSaldo.checked == true && EstadoInactivo) {
        estadoParticipantes('/monitor/sinSaldoInactivo');
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
        error: function(object, error, anotherObject) {
            alert('Mensaje: ' + object.statusText + 'Status: ' + object.status);
        },
        global: true,
        ifModified: false,
        processData: true,
        success: function(result) {

            if (result == "0") {
                console.log("Expiro");
                window.location.reload();
            } else {
                //console.log(result);
                $('#ParticipanteSaldo').html(result);
            }

        },
        timeout: 30000,
        type: "GET"
    });

}

//Info participantes modal
function infoParticipante(id) {

    var codParticipante = id.id;
    $.ajax({
        url: '/monitor/participanteInfo',
        async: 'true',
        cache: false,
        contentType: "application/x-www-form-urlencoded",
        global: true,
        ifModified: false,
        processData: true,
        data: { "codParticipante": codParticipante },
        beforeSend: function() {
            console.log('Procesando, espere por favor...');
        },
        success: function(result) {

            if (result == "0") {
                console.log("Expiro");
                window.location.reload();
            } else {
                console.log('Correcto');
                console.log(result);
                $('#participanteInfoBody').html(result);
            }

        },
        error: function(object, error, anotherObject) {
            console.log('Mensaje: ' + object.statusText + 'Status: ' + object.status);
        },
        timeout: 30000,
        type: "POST"
    });

}

/* Fin Participantes */

/* Inicio Catologo */
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
    /* foto catologo */
    $.ajax({
        url: '/monitor/catalogoImg',
        async: 'true',
        cache: false,
        contentType: "application/x-www-form-urlencoded",
        global: true,
        ifModified: false,
        processData: true,
        data: { "codPremio": codPremi },
        beforeSend: function() {
            console.log('Procesando, espere por favor...');
        },
        success: function(result) {

            if (result == "0") {
                console.log("Expiro");
                window.location.reload();
            } else {
                console.log('Correcto');
                console.log(result);
                $('#imgCatalogo').html(result);
            }

        },
        error: function(object, error, anotherObject) {
            console.log('Mensaje: ' + object.statusText + 'Status: ' + object.status);
        },
        timeout: 30000,
        type: "POST"
    });
    /* fin foto catalogo */

}
/* Fin Catalogo */

/* Inicio depositos */
function depositos() {

    $.ajax({
        url: '/monitor/depositosInfo',
        async: 'true',
        cache: false,
        contentType: "application/x-www-form-urlencoded",
        dataType: "html",
        error: function(object, error, anotherObject) {
            alert('Mensaje: ' + object.statusText + 'Status: ' + object.status);
        },
        global: true,
        ifModified: false,
        processData: true,
        success: function(result) {

            if (result == "0") {
                console.log("Expiro");
                window.location.reload();
            } else {
                //console.log(result);
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

            console.log('fechaInicio ' + fechaInicio);
            console.log('fechaFin ' + fechaFin);
            $.ajax({
                url: '/monitor/depositosInforma',
                async: 'true',
                cache: false,
                contentType: "application/x-www-form-urlencoded",
                global: true,
                ifModified: false,
                processData: true,
                data: { "fechaInicio": fechaInicio, "fechaFin": fechaFin },
                beforeSend: function() {
                    console.log('Procesando, espere por favor...');
                },
                success: function(result) {

                    if (result == "0") {
                        $('#alertFiltroDeposito').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Atención!</strong> No se encontraron datos con las fechas seleccionadas.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    } else {
                        console.log('Correcto');
                        console.log(result);
                        $('#depositoInformacion').html(result);
                    }

                },
                error: function(object, error, anotherObject) {
                    $('#alertFiltroDeposito').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Atención!</strong> Ocurrio un error intentalo mas tarde.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    console.log('Mensaje: ' + object.statusText + 'Status: ' + object.status);
                },
                timeout: 30000,
                type: "POST"
            });

        }

    }

}
/* fin depositos*/

/* Inicio canjes */
function canjes() {
    $.ajax({
        url: '/monitor/canjesInfo',
        async: 'true',
        cache: false,
        contentType: "application/x-www-form-urlencoded",
        dataType: "html",
        error: function(object, error, anotherObject) {
            alert('Mensaje: ' + object.statusText + 'Status: ' + object.status);
        },
        global: true,
        ifModified: false,
        processData: true,
        success: function(result) {

            if (result == "0") {
                console.log("Expiro");
                window.location.reload();
            } else {
                //console.log(result);
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

    if (fechaInicio == 'selecciona' || fechaFin == 'selecciona') {
        throw new Error("Datos de formulario incompleto");
    } else if (fechaInicio != 'selecciona' || fechaFin != 'selecciona') {

        if (fechaInicio == fechaFin) {
            throw new Error("Datos de formulario incompleto");
        } else if (fechaInicio >= fechaFin) {
            throw new Error("Datos de formulario incompleto");
        } else if (fechaInicio <= fechaFin) {

            console.log('fechaInicio ' + fechaInicio);
            console.log('fechaFin ' + fechaFin);
            $.ajax({
                url: '/monitor/canjesInforma',
                async: 'true',
                cache: false,
                contentType: "application/x-www-form-urlencoded",
                global: true,
                ifModified: false,
                processData: true,
                data: { "fechaInicio": fechaInicio, "fechaFin": fechaFin },
                beforeSend: function() {
                    console.log('Procesando, espere por favor...');
                },
                success: function(result) {

                    if (result == "0") {
                        console.log("Expiro");
                        window.location.reload();
                    } else {
                        console.log('Correcto');
                        console.log(result);
                        $('#depositoInformacion').html(result);
                    }

                },
                error: function(object, error, anotherObject) {
                    console.log('Mensaje: ' + object.statusText + 'Status: ' + object.status);
                },
                timeout: 30000,
                type: "POST"
            });

        }

    }
}
/* Fin canjes */

/* Funcion configuracion */
function config(id) {
    var id = id.id;
    if (id == "changeUser") {

        var usuario = $('#userReconoceloMonitor').val();
        if (usuario == "") {
            $('#messageUser').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Advertencia!</strong> Debes de escribir un nombre, para poder cambiar el nombre.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            throw new Error("Datos de formulario incompleto");
        } else {
            console.log("Cambiar nombre de usuario");
            $.ajax({
                url: '/monitor/cambiarUserName',
                async: 'true',
                cache: false,
                contentType: "application/x-www-form-urlencoded",
                global: true,
                ifModified: false,
                processData: true,
                data: { "usuario": usuario },
                beforeSend: function() {
                    console.log('Procesando, espere por favor...');
                },
                success: function(result) {

                    if (result == "0") {
                        console.log("Expiro");
                        $('#messageUser').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Advertencia!</strong> No se cambio el nombre correctamente.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    } else {
                        console.log('Correcto');
                        console.log(result);
                        $('#messageUser').html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Exito!</strong> Se cambio el nombre correctamente.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    }

                },
                error: function(object, error, anotherObject) {
                    console.log('Mensaje: ' + object.statusText + 'Status: ' + object.status);
                },
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
            console.log("cambiar contrasenas");
            $.ajax({
                url: '/monitor/cambiarUserPassword',
                async: 'true',
                cache: false,
                contentType: "application/x-www-form-urlencoded",
                global: true,
                ifModified: false,
                processData: true,
                data: { "password": password },
                beforeSend: function() {
                    console.log('Procesando, espere por favor...');
                },
                success: function(result) {

                    if (result == "0") {
                        console.log("Expiro");
                        $('#messagePassword').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Advertencia!</strong> No se cambio la contraseña correctamente.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    } else {
                        console.log('Correcto');
                        console.log(result);
                        $('#messagePassword').html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Exito!</strong> Se cambio la contraseña correctamente.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    }

                },
                error: function(object, error, anotherObject) {
                    console.log('Mensaje: ' + object.statusText + 'Status: ' + object.status);
                },
                timeout: 30000,
                type: "POST"
            });
        }

    }
}
/* Fin funcion configuracion */

/* Funcion recuperar password */
function sendRecuperaPassword() {
    var email = $('#mailRecuperar').val();
    if (email == "") {
        $('#MessageRecupera').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Advertencia!</strong> debes de escribir un correo.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        throw new Error("Datos de formulario incompleto");
    } else {
        $.ajax({
            url: '/monitor/sendMailRecupera',
            async: 'true',
            cache: false,
            contentType: "application/x-www-form-urlencoded",
            global: true,
            ifModified: false,
            processData: true,
            data: { "email": email },
            beforeSend: function() {
                console.log('Procesando, espere por favor...');
            },
            success: function(result) {

                if (result == "0") {
                    console.log("Expiro");
                    $('#MessageRecupera').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Advertencia!</strong> Algo salio mal al mandar el correo, verifica si lo escribiste correctamente.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                } else {
                    console.log('Correcto');
                    console.log(result);
                    $('#MessageRecupera').html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Exito!</strong> Se mando a tu correo, para que puedas recuperar tu cuenta.En caso de no aparecer, favor de revisar la carpeta de spam.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                }

            },
            error: function(object, error, anotherObject) {
                console.log('Mensaje: ' + object.statusText + 'Status: ' + object.status);
            },
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
    console.log(usuario);
    console.log(codEmpresa);
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
                url: '/monitor/cambiarUserPasswordNew',
                async: 'true',
                cache: false,
                contentType: "application/x-www-form-urlencoded",
                global: true,
                ifModified: false,
                processData: true,
                data: { "password": password, "usuario": usuario, "codEmpresa": codEmpresa },
                beforeSend: function() {
                    console.log('Procesando, espere por favor...');
                },
                success: function(result) {

                    if (result == "0") {
                        console.log("Expiro");
                        $('#MessageRecuperar').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Advertencia!</strong> No se cambio la contraseña correctamente.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    } else {
                        console.log('Correcto');
                        console.log(result);
                        $('#MessageRecuperar').html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Exito!</strong> Se cambio la contraseña correctamente.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    }

                },
                error: function(object, error, anotherObject) {
                    console.log('Mensaje: ' + object.statusText + 'Status: ' + object.status);
                },
                timeout: 30000,
                type: "POST"
            });
        }
    }
}
/* Fin funcion recuperar password */

//Funcion salir de reconocelo monitor
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
            location.href = "https://" + location.hostname + "/exit_controller_monitor";
        } else {
            //  swal("Cancelled", "Your imaginary file is safe :)", "error");
        }
    });

}