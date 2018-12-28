//Funcion login mantenimiento
function loginMantenimiento() {

    $('#MessageError').hide();
    var usuario = $('#user').val();
    var password = $('#password').val();

    if (usuario == "" || password == "") {
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
                    console.log('Correcto');
                    location.href = "https://" + location.hostname + "/mantenimiento/home";
                } else {
                    console.log("Expiro");
                    console.log(result);
                    window.location.reload();
                    $('#MessageError').show();
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
                    console.log('Correcto');
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
                    console.log("Expiro");
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

        chanceOpcionPremio('/mantenimiento/altaParticipante');

    } else if (optionPremio == "B") {

        $('#premioFunctions').html('Baja');
        $('#premioFunctions').show();

    } else if (optionPremio == "U") {

        $('#premioFunctions').html('Update');
        $('#premioFunctions').show();

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
                console.log('Correcto');
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
    }

}
//Fin alta premios
/*Fin premios funcion */

//Exit mantenimiento
function salirMantenimiento() {
    location.href = "https://" + location.hostname + "/mantenimiento/exit_mantenimiento";
}