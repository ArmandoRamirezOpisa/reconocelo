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
                    window.location.reload();
                } else {
                    console.log("Expiro");
                    console.log(result);
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