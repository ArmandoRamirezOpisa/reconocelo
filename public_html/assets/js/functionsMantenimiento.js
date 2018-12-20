function loginMantenimiento() {

    alert("Entrando...");
    var usuario = $('#user').val();
    var password = $('#password').val();

    if (usuario == "" || password == "") {
        $('#MessageError').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Advertencia!</strong> Usuario o contraseña incorrectos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        throw new Error("Datos de formulario incompleto");
    }

}