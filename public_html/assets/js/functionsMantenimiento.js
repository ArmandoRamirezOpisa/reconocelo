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

function saveParticipante(){

    var idParticipanteMantenimiento = $('#idParticipante').val();
    var codProgramaMantenimiento = $('#codPrograma').val();
    var codEmpresaMantenimiento = $('#codEmpresa').val();
    var codParticipanteMantenimiento = $('#codParticipante').val();
    var cargoMantenimiento = $('#cargo').val();
    var primerNombreMantenimiento = $('#primerNombre').val();
    var segundoNombreMantenimiento = $('#segundoNombre').val();
    var apellidoPaternoMantenimiento = $('#apellidoPaterno').val();
    var apellidoMaternoMantenimiento = $('#apellidoMaterno').val();
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

    if(idParticipanteMantenimiento == "" || codProgramaMantenimiento == "" || codEmpresaMantenimiento == "" || codParticipanteMantenimiento == "" || cargoMantenimiento == "" || primerNombreMantenimiento == "" || segundoNombreMantenimiento == "" || apellidoPaternoMantenimiento == "" || apellidoMaternoMantenimiento == "" || calleNumeroMantenimiento == "" || coloniaMantenimiento == "" || cpMantenimiento == "" || ciudadMantenimiento == "" || estadoMantenimiento == "" || paisMantenimiento == "" || telefonoMantenimiento == "" || passwordMantenimiento == "" || emailMantenimiento == "" || loginwebMantenimiento == ""){

        document.getElementById("alertMessage").style.display = "block";
        throw new Error("Datos de formulario incompleto");

    }

}

//Exit mantenimiento
function salirMantenimiento() {
    location.href = "https://" + location.hostname + "/mantenimiento/exit_mantenimiento";
}