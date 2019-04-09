//Funcion login mantenimiento
function loginMantenimiento() {

    $('#MessageError').hide();
    var usuario = $('#user').val();
    var password = $('#password').val();

    if (usuario == "" || password == "") {
        $('#MessageError').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Advertencia!</strong> Hay campos vacios.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        $('#MessageError').show();
        throw new Error("Datos de formulario incompleto");
    } else {

        $.ajax({
            url: '/mantenimiento/login',
            async: 'true',
            cache: false,
            contentType: "application/x-www-form-urlencoded",
            global: true,
            ifModified: false,
            processData: true,
            data: { "usuario": usuario, "password": password },
            beforeSend: function() {
                console.log('Procesando, espere por favor...');
            },
            success: function(result) {

                if (result) {
                    location.href = "https://" + location.hostname + "/mantenimiento/home";
                } else {
                    $('#MessageError').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Advertencia!</strong> Usuario o contraseña incorrectos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    $('#MessageError').show();
                    $('#user').val("");
                    $('#password').val("");
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

/* Funcion participantes */
function optionsParticipante(id) {

    $('#opcionesParticipantes').hide();
    var idOptionParticipante = id.id;
    var optionParticipante = document.getElementById(idOptionParticipante).value;
    if (optionParticipante == "oneParticipantes") {
        changeOptionParticipante('/mantenimiento/unParticipante');
    } else if (optionParticipante == "moreParticipantes") {
        changeOptionParticipante('/mantenimiento/variosParticipantes');
    } else if (optionParticipante == "selecciona") {
        console.log("no hace ninguna accion");
    }

}

function changeOptionParticipante(rutaParticipante) {
    $.ajax({
        url: rutaParticipante,
        async: 'true',
        cache: false,
        contentType: "application/x-www-form-urlencoded",
        global: true,
        ifModified: false,
        processData: true,
        data: {},
        beforeSend: function() {
            console.log('Cargando seccion, espere por favor...');
        },
        success: function(result) {
            if (result) {
                $('#opcionesParticipantes').html(result);
                $('#opcionesParticipantes').show();
            } else {
                console.log("Expiro");
            }
        },
        error: function(object, error, anotherObject) {
            console.log('Mensaje: ' + object.statusText + 'Status: ' + object.status);
        },
        timeout: 30000,
        type: "POST"
    });
}

function saveParticipante() {

    $('#alertMessage').hide();
    var idParticipanteMantenimiento = $('#idParticipante').val();
    var codProgramaMantenimiento = $('#codPrograma').val();
    var codEmpresaMantenimiento = $('#codEmpresa').val();
    var codParticipanteMantenimiento = $('#codParticipante').val();
    var cargoMantenimiento = $('#cargo').val();
    var nombreCompletoMantenimiento = $('#nombreCompleto').val();
    var calleNumeroMantenimiento = $('#calleNumero').val();
    var coloniaMantenimiento = $('#colonia').val();
    var cpMantenimiento = $('#cp').val();
    var ciudadMantenimiento = $('#ciudad').val();
    var estadoMantenimiento = $('#estado').val();
    var paisMantenimiento = $('#pais').val();
    var telefonoMantenimiento = $('#telefono').val();
    var passwordMantenimiento = $('#password').val();
    var emailMantenimiento = $('#email').val();
    var loginwebMantenimiento = $('#loginweb').val();

    var saveParticipantes = $('#participanteBtn');
    saveParticipantes.html('Guardando...');

    var btnIcon = $('#btnIcon');
    $('#btnIcon').removeClass('fas fa-save');
    $(this).addClass('fas fa-cog fa-spin');

    if (idParticipanteMantenimiento == "" || codProgramaMantenimiento == "" || codEmpresaMantenimiento == "" || codParticipanteMantenimiento == "" || cargoMantenimiento == "" || nombreCompletoMantenimiento == "" || calleNumeroMantenimiento == "" || coloniaMantenimiento == "" || cpMantenimiento == "" || ciudadMantenimiento == "" || estadoMantenimiento == "" || paisMantenimiento == "" || passwordMantenimiento == "" || emailMantenimiento == "" || loginwebMantenimiento == "") {

        $('#alertMessage').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Advertencia!</strong> Hay algunos campos vacios.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        $('#alertMessage').show();
        throw new Error("Datos de formulario incompleto");

    } else {

        if (telefonoMantenimiento == "") {
            telefonoMantenimiento = 0;
        }

        $.ajax({
            url: '/mantenimiento/participanteSave',
            async: 'true',
            cache: false,
            contentType: "application/x-www-form-urlencoded",
            global: true,
            ifModified: false,
            processData: true,
            data: {
                "idParticipanteMantenimiento": idParticipanteMantenimiento,
                "codProgramaMantenimiento": codProgramaMantenimiento,
                "codEmpresaMantenimiento": codEmpresaMantenimiento,
                "codParticipanteMantenimiento": codParticipanteMantenimiento,
                "cargoMantenimiento": cargoMantenimiento,
                "nombreCompletoMantenimiento": nombreCompletoMantenimiento,
                "calleNumeroMantenimiento": calleNumeroMantenimiento,
                "coloniaMantenimiento": coloniaMantenimiento,
                "cpMantenimiento": cpMantenimiento,
                "ciudadMantenimiento": ciudadMantenimiento,
                "estadoMantenimiento": estadoMantenimiento,
                "paisMantenimiento": paisMantenimiento,
                "telefonoMantenimiento": telefonoMantenimiento,
                "passwordMantenimiento": passwordMantenimiento,
                "emailMantenimiento": emailMantenimiento,
                "loginwebMantenimiento": loginwebMantenimiento
            },
            beforeSend: function() {
                console.log('Procesando, espere por favor...');
            },
            success: function(result) {

                if (result) {
                    var saveParticipantes = $('#participanteBtn');
                    saveParticipantes.html('Guardar');

                    var btnIcon = $('#btnIcon');
                    $('#btnIcon').removeClass('fas fa-cog fa-spin');
                    $(this).addClass('fas fa-save');

                    $('#alertMessage').html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Exito!</strong> Datos guardados correctamente.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    $('#alertMessage').show();

                    $('#idParticipante').val("");
                    $('#codPrograma').val("");
                    $('#codEmpresa').val("");
                    $('#codParticipante').val("");
                    $('#cargo').val("");
                    $('#nombreCompleto').val("");
                    $('#calleNumero').val("");
                    $('#colonia').val("");
                    $('#cp').val("");
                    $('#ciudad').val("");
                    $('#estado').val("");
                    $('#pais').val("");
                    $('#telefono').val("");
                    $('#password').val("");
                    $('#email').val("");
                    $('#loginweb').val("");

                } else {
                    $('#alertMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error!</strong> No se guardo correctamente, intentalo mas tarde.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    $('#alertMessage').show();
                }

            },
            error: function(object, error, anotherObject) {
                console.log('Mensaje: ' + object.statusText + 'Status: ' + object.status);
                $('#alertMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error!</strong> No se guardo correctamente, intentalo mas tarde.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            },
            timeout: 30000,
            type: "POST"
        });

    }

}
/* Fin funcion participantes */

/*Premios funcion */
function optionsPremio(id) {

    $('#premioFunctions').hide();
    var idOptionPremio = id.id;
    var optionPremio = document.getElementById(idOptionPremio).value;
    if (optionPremio == "A") {

        chanceOpcionPremio('/mantenimiento/altaPremio');

    } else if (optionPremio == "B") {

        chanceOpcionPremio('/mantenimiento/bajaPremio');

    } else if (optionPremio == "U") {

        chanceOpcionPremio('/mantenimiento/updatePremio');

    } else if (optionPremio == "T") {
        chanceOpcionPremio('/mantenimiento/transferenciaPremio');
    }

}

//Ajax funcion
function chanceOpcionPremio(ruta) {
    $.ajax({
        url: ruta,
        async: 'true',
        cache: false,
        contentType: "application/x-www-form-urlencoded",
        global: true,
        ifModified: false,
        processData: true,
        data: {},
        beforeSend: function() {
            console.log('Cargando seccion, espere por favor...');
        },
        success: function(result) {
            if (result) {
                $('#premioFunctions').html(result);
                $('#premioFunctions').show();
            } else {
                console.log("Expiro");
            }
        },
        error: function(object, error, anotherObject) {
            console.log('Mensaje: ' + object.statusText + 'Status: ' + object.status);
        },
        timeout: 30000,
        type: "POST"
    });
}

//Alta premios
function altaPremio() {

    var codPremio = $('#codPremio').val();
    var codCategoria = $('#codCategoria').val();
    var codProveedor = $('#codProveedor').val();
    var marca = $('#marca').val();
    var modelo = $('#modelo').val();
    var nomESP = $('#nomESP').val();
    var nomING = $('#nomING').val();
    var caracESP = $('#caracESP').val();
    var caracING = $('#caracING').val();
    var codPrograma = $('#codPrograma').val();
    var codEmpresa = $('#codEmpresa').val();
    var valorPuntos = $('#valorPuntos').val();

    if (codPremio == "" || codCategoria == "" || codProveedor == "" || marca == "" || modelo == "" || nomESP == "" || nomING == "" || caracESP == "" || caracING == "" || codPrograma == "" || codEmpresa == "" || valorPuntos == "") {
        $('#MessagePremio').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Advertencia!</strong> Algunos campos estan vacios.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button</div>');
        $('#MessagePremio').show();
        throw new Error("Datos de formulario incompleto");
    } else {
        $.ajax({
            url: '/mantenimiento/premiosAlta',
            async: 'true',
            cache: false,
            contentType: "application/x-www-form-urlencoded",
            global: true,
            ifModified: false,
            processData: true,
            data: {
                "codPremio": codPremio,
                "codCategoria": codCategoria,
                "codProveedor": codProveedor,
                "marca": marca,
                "modelo": modelo,
                "nomESP": nomESP,
                "nomING": nomING,
                "caracESP": caracESP,
                "caracING": caracING,
                "codPrograma": codPrograma,
                "codEmpresa": codEmpresa,
                "valorPuntos": valorPuntos
            },
            beforeSend: function() {
                console.log('Procesando, espere por favor...');
            },
            success: function(result) {

                if (result) {
                    $('#MessagePremio').html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Exito!</strong> Datos guardados correctamente.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    $('#MessagePremio').show();

                    $('#codPremio').val("");
                    $('#codCategoria').val("");
                    $('#codProveedor').val("");
                    $('#marca').val("");
                    $('#modelo').val("");
                    $('#nomESP').val("");
                    $('#nomING').val("");
                    $('#caracESP').val("");
                    $('#caracING').val("");
                    $('#codPrograma').val("");
                    $('#codEmpresa').val("");
                    $('#valorPuntos').val("");

                } else {
                    $('#MessagePremio').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error!</strong> No se guardo correctamente, intentalo mas tarde.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    $('#MessagePremio').show();
                }

            },
            error: function(object, error, anotherObject) {
                console.log('Mensaje: ' + object.statusText + 'Status: ' + object.status);
                $('#MessagePremio').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error!</strong> No se guardo correctamente, intentalo mas tarde.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                $('#MessagePremio').show();
            },
            timeout: 30000,
            type: "POST"
        });
    }

}
//Fin alta premios

//Baja premios
function premioBaja() {

    var codPremioBaja = $('#codPremioBaja').val();

    if (codPremioBaja == "") {

        $('#MessagePremio').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Advertencia!</strong> El campo se encuentra vacio.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button</div>')
        $('#MessagePremio').show();

    } else {

        $('#MessagePremio').hide();
        document.getElementById("BajaPremioConfirmacion").style.display = "block";
        document.getElementById("PremioBaja").disabled = true;

    }

}

function bajaPremio() {

    if ($("#noBaja").is(':checked')) {

        document.getElementById("BajaPremioConfirmacion").style.display = "none";
        document.getElementById("PremioBaja").disabled = false;
        document.getElementById("deletePremio").disabled = true;

    } else if ($("#siBaja").is(':checked')) {

        document.getElementById("deletePremio").disabled = false;

    }

}

function premioBajaOk() {

    var codPremioBaja = $('#codPremioBaja').val();

    $.ajax({
        url: '/mantenimiento/premiosBaja',
        async: 'true',
        cache: false,
        contentType: "application/x-www-form-urlencoded",
        global: true,
        ifModified: false,
        processData: true,
        data: {
            "codPremio": codPremioBaja
        },
        beforeSend: function() {
            console.log('Procesando, espere por favor...');
        },
        success: function(result) {

            if (result == "Bien") {
                $('#MessagePremio').html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Exito!</strong> Premio eliminado correctamente.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                $('#MessagePremio').show();

                $('#codPremioBaja').val("");

            } else {
                $('#MessagePremio').html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Exito!</strong> Premio eliminado correctamente.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                $('#MessagePremio').show();
            }

        },
        error: function(object, error, anotherObject) {
            console.log('Mensaje: ' + object.statusText + 'Status: ' + object.status);
            $('#MessagePremio').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error!</strong> No se elimino correctamente, intentalo mas tarde.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            $('#MessagePremio').show();
        },
        timeout: 30000,
        type: "POST"
    });

}
//Fin baja premios

/* Update premios */
function UpdatePremio(id) {

    var codPremios = id.id;
    var premio = $('#listPremios').val();

    if (premio != "") {

        $.ajax({
            url: '/mantenimiento/premiosUpdateInfo',
            async: 'true',
            cache: false,
            contentType: "application/x-www-form-urlencoded",
            global: true,
            ifModified: false,
            processData: true,
            data: {
                "codPremio": premio
            },
            beforeSend: function() {
                console.log('Procesando, espere por favor...');
            },
            success: function(result) {

                $('#InfoPremioUpdate').html(result);

            },
            error: function(object, error, anotherObject) {
                console.log('Mensaje: ' + object.statusText + 'Status: ' + object.status);
            },
            timeout: 30000,
            type: "POST"
        });

    } else {
        $('#MessagePremio').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Advertencia!</strong> Campo vacio.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        $('#MessagePremio').show();
    }

}

function premioUpdate() {

    var codPremioUpdate = $('#codPremioUpdate').val();
    var codCategoriaUpdate = $('#codCategoriaUpdate').val();
    var codProveedorUpdate = $('#codProveedorUpdate').val();
    var marcaUpdate = $('#marcaUpdate').val();
    var modeloUpdate = $('#modeloUpdate').val();
    var nomESPUpdate = $('#nomESPUpdate').val();
    var nomINGUpdate = $('#nomINGUpdate').val();
    var caracESPUpdate = $('#caracESPUpdate').val();
    var caracINGUpdate = $('#caracINGUpdate').val();
    var codProgramaUpdate = $('#codProgramaUpdate').val();
    var codEmpresaUpdate = $('#codEmpresaUpdate').val();
    var valorPuntosUpdate = $('#valorPuntosUpdate').val();

    if (codPremioUpdate == "" || codCategoriaUpdate == "" || codProveedorUpdate == "" || marcaUpdate == "" || modeloUpdate == "" || nomESPUpdate == "" || nomINGUpdate == "" || caracESPUpdate == "" || caracINGUpdate == "" || codProgramaUpdate == "" || codEmpresaUpdate == "" || valorPuntosUpdate == "") {
        $('#MessagePremio').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Advertencia!</strong> El campo se encuentra vacio.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button</div>')
        $('#MessagePremio').show();
    } else {
        $.ajax({
            url: '/mantenimiento/premiosUpdateInfoData',
            async: 'true',
            cache: false,
            contentType: "application/x-www-form-urlencoded",
            global: true,
            ifModified: false,
            processData: true,
            data: {
                "codPremioUpdate": codPremioUpdate,
                "codCategoriaUpdate": codCategoriaUpdate,
                "codProveedorUpdate": codProveedorUpdate,
                "marcaUpdate": marcaUpdate,
                "modeloUpdate": modeloUpdate,
                "nomESPUpdate": nomESPUpdate,
                "nomINGUpdate": nomINGUpdate,
                "caracESPUpdate": caracESPUpdate,
                "caracINGUpdate": caracINGUpdate,
                "codProgramaUpdate": codProgramaUpdate,
                "codEmpresaUpdate": codEmpresaUpdate,
                "valorPuntosUpdate": valorPuntosUpdate
            },
            beforeSend: function() {
                console.log('Procesando, espere por favor...');
            },
            success: function(result) {

                if (result == "Bien") {
                    $('#MessagePremio').html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Exito!</strong> Premio eliminado correctamente.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    $('#MessagePremio').show();
                    document.getElementById("premioFunctions").style.display = "none";
                } else {
                    $('#MessagePremio').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error!</strong> No se elimino correctamente, intentalo mas tarde.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    $('#MessagePremio').show();
                }

            },
            error: function(object, error, anotherObject) {
                console.log('Mensaje: ' + object.statusText + 'Status: ' + object.status);
                $('#MessagePremio').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error!</strong> No se elimino correctamente, intentalo mas tarde.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                $('#MessagePremio').show();
            },
            timeout: 30000,
            type: "POST"
        });
    }

}
/* Fin update premios */

/*Fin premios funcion */

/* Funcion insertar puntos */
function uploadPuntosDepoMantenimiento() {
    var numTransaccionMantenimiento = $('#numTransaccionMantenimiento').val()

    if (numTransaccionMantenimiento != "Selecciona") {
        $.ajax({
            url: '/mantenimiento/uploadPuntosDepositoMantenimiento',
            async: 'true',
            cache: false,
            contentType: "application/x-www-form-urlencoded",
            global: true,
            ifModified: false,
            processData: true,
            data: { "numTransaccionMantenimiento": numTransaccionMantenimiento },
            beforeSend: function() {},
            success: function(result) {

                if (result == "0") {
                    $('#MessageDepositoMantenimiento').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Advertencia!</strong> No se activaron todos los puntos correctamente.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                } else {
                    $('#parsed_csv_list').hide();
                    $('#MessageDepositoMantenimiento').html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Exito!</strong> Se activaron los puntos correctamente.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

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
/* Fin funcion insertar puntos */

//Exit mantenimiento
function salirMantenimiento() {
    location.href = "https://" + location.hostname + "/mantenimiento/exit_mantenimiento";
}