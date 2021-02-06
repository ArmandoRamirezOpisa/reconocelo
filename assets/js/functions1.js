var click = 0;
var contOrder = new Array();

function loginReconocelo() {
    $('#loading').show();
    var usuarioReconocelo = $('#usuarioReconocelo').val();
    var passwordReconocelo = $('#passwordReconocelo').val();
    $.ajax({
        url: location.href + 'Home/loginReconocelo',
        async: 'true',
        cache: false,
        contentType: "application/x-www-form-urlencoded",
        global: true,
        ifModified: false,
        processData: true,
        data: { "usuarioReconocelo": usuarioReconocelo, "passwordReconocelo": passwordReconocelo },
        beforeSend: function() {},
        success: function(result) {
            if (result == "0") {
                $('#error').show();
                $('#mensajeErrorReconocelo').html('<i class="fas fa-exclamation-circle fa-lg mr-2"></i> Usuario o contraseña incorrecto');
            } else {
                location.href = location.hostname + "/reconocelo/home";
            }
        },
        error: function(object, error, anotherObject) {},
        timeout: 30000,
        type: "POST"
    });
}

function loadSection(controller, divSel) {
    $.ajax({
        url: location.href + controller,
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
                window.location.reload();
            } else {
                $('#' + divSel).html(result);
            }
        },
        timeout: 30000,
        type: "GET"
    });
}

var formatNumber = {
    separador: ",",
    sepDecimal: '.',
    formatear: function(num) {
        num += '';
        var splitStr = num.split('.');
        var splitLeft = splitStr[0];
        var splitRight = splitStr.length > 1 ? this.sepDecimal + splitStr[1] : '';
        var regx = /(\d+)(\d{3})/;
        while (regx.test(splitLeft)) {
            splitLeft = splitLeft.replace(regx, '$1' + this.separador + '$2');
        }
        return this.simbol + splitLeft + splitRight;
    },
    new: function(num, simbol) {
        this.simbol = simbol || '';
        return this.formatear(num);
    }
}

function addItemOrder(idProduct, name, puntos) {
    var exist = 0;
    numE = contOrder.length;
    if (numE == 0) {
        contOrder = [{
            "id": idProduct,
            "cantidad": "1",
            "nombre": name,
            "puntos": puntos
        }];
    } else {
        $.each(contOrder, function(k, v) {
            if (v.id == idProduct) {
                v.cantidad = parseInt(v.cantidad) + 1;
                v.puntos = parseInt(v.puntos) + puntos;
                exist = 1;
            }
        });
        if (exist == 0) {
            contOrder.push({
                "id": idProduct,
                "cantidad": "1",
                "nombre": name,
                "puntos": puntos
            });
        }
    }
    loadSection("Home/showContentCart/", "dvContAw");
}

function refreshCar() {
    $.each(contOrder, function(k, v) {
        if ($("#in" + v.id).val() == 0) {
            alert("La cantidad indicada debe ser mayor a cero");
        } else {
            v.cantidad = $("#in" + v.id).val();
        }
    });
    showOrderContent(0);
}

function deleteItem(item) {
    swal({
        title: "Eliminara el producto seleccionado ¿Desae continuar?",
        text: "",
        icon: "warning",
        buttons: [
            'No, Cancelar!',
            'Si, Estoy seguro!'
        ],
        dangerMode: true,
    }).then(function(isConfirm) {
        if (isConfirm) {
            $.each(contOrder, function(k, v) {
                if (item == v.id) {
                    contOrder.splice(k, 1);
                    loadSection("Home/showContentCart/", "dvContAw");
                    $.notify("Se ha eliminado el producto de su orden", "success");
                    return false;
                }
            });
            if (contOrder.length == 0) {
                $('#dvContOrder').modal('hide')
                $("#dvCar").html('');
                bloqueaCombos(0);
            } else {
                showOrderContent(0);
            }
        } else {}
    });
}

function delArray() {
    $.each(contOrder, function(k, v) {
        contOrder.splice(k, 1);
    });
}

function showDet(id) {
    loadSection("Home/showItem/" + id, "dvContAw");
}

function sendDataAjaxDuda(idCanjeArticulo, NombreCanjeArticulo, mensaje, tipo) {
    $.ajax({
        type: 'POST',
        url: location.href + 'Ayuda_Controller/crearComentario',
        dataType: "json",
        data: { "idcanje": idCanjeArticulo, "nombre": NombreCanjeArticulo, "mensaje": mensaje, "tipo": tipo },
        beforeSend: function() {},
        success: function(response) {
            if (response) {
                swal("Mensaje enviado", "Envio de tu mensaje finalizado correctamente.", "success");
                document.getElementById("mensaje").value = "";
            } else {
                swal("Envio de Mensaje", "Ha ocurrido un error al enviar tu mensaje.", "warning");
            }
        },
        error: function(x, e) {
            swal("Envio de Mensaje", "Ocurrio un error al enviar su mensaje", "warning");
        }
    });
}

function enviarPregunta(idCanjeArticulo, NombreCanjeArticulo, mensaje, tipo) {
    switch (tipo) {
        case 1:
            sendDataAjaxDuda(idCanjeArticulo, NombreCanjeArticulo, mensaje, tipo);
            break;
        case 2:
            sendDataAjaxDuda(idCanjeArticulo, NombreCanjeArticulo, mensaje, tipo);
            break;
        case 3:
            sendDataAjaxDuda(idCanjeArticulo, NombreCanjeArticulo, mensaje, tipo);
            break;
    }
}

function enviar_pregunta() {
    if ($('#mensaje').val().trim() == "") {
        $.notify("Debe de agregar una descripcion para poder enviar su duda", "error");
    } else {
        var pregunta = $('select[name=preguntas]').val();
        var orden = $('select[name=orden]').val();
        var mensaje = $('#mensaje').val();
        var articulo = $('select[name=articulo]').val();
        var temaOrden = $('#mensajeOtro').val();
        if (pregunta == "Articulo de mi orden") {
            if (orden == "Selecciona" || articulo == "Selecciona") {
                $.notify("Debe de seleccionar una orden o artículo", "error");
            } else {
                var fields = articulo.split('-');
                var idCanjeArticulo = fields[0];
                var NombreCanjeArticulo = fields[1];
                enviarPregunta1(idCanjeArticulo, NombreCanjeArticulo, mensaje, 1);
            }
        } else if (pregunta == "Sobre mi orden") {
            if (orden == "Selecciona" || temaOrden == "") {
                $.notify("Debe de seleccionar una orden o escribir el tema", "error");
            } else {
                enviarPregunta1(orden, temaOrden, mensaje, 2);
            }
        } else if (pregunta == "otro") {
            if (temaOrden == "") {
                $.notify("Debe de escribir el tema", "error");
            } else {
                orden = 0;
                enviarPregunta1(orden, temaOrden, mensaje, 3);
            }
        }
    }
}

function enviarPregunta1(idCanjeArticulo, NombreCanjeArticulo, mensaje, tipo) {
    $.ajax({
        type: 'POST',
        url: location.href + 'Home/crearTicketReconocelo',
        dataType: "json",
        data: { "idcanje": idCanjeArticulo, "nombre": NombreCanjeArticulo, "mensaje": mensaje, "tipo": tipo },
        beforeSend: function() {},
        success: function(response) {
            if (response) {
                swal("Mensaje enviado", "Envio de tu mensaje finalizado correctamente.", "success");
                document.getElementById("mensaje").value = "";
            } else {
                swal("Envio de Mensaje", "Ha ocurrido un error al enviar tu mensaje.", "warning");
            }
        },
        error: function(response) {
            swal("Envio de Mensaje", "Ocurrio un error al enviar su mensaje", "warning");
        }
    });
}

function selectOptionTicket(id) {
    var idSelectPregunta = id.id;
    var x = document.getElementById(idSelectPregunta).value;
    if (x == "Articulo de mi orden") {
        document.getElementById("articulo").style = "display:block";
        document.getElementById("temaOtro").style = "display:none";
        document.getElementById("exampleFormControlSelect3").disabled = false;
    } else if (x == "Sobre mi orden") {
        document.getElementById("articulo").style = "display:none";
        document.getElementById("temaOtro").style = "display:block";
        document.getElementById("exampleFormControlSelect3").disabled = false;
    } else if (x == "otro") {
        document.getElementById("articulo").style = "display:none";
        document.getElementById("temaOtro").style = "display:block";
        document.getElementById("exampleFormControlSelect3").disabled = true;
    } else if (x == "Selecciona") {
        document.getElementById("orden").style = "display:none";
        document.getElementById("articulo").style = "display:none";
        document.getElementById("temaOtro").style = "display:none";
    }
}

function historiaTicket(id) {
    var id = id.id;
    var tickeyArray = id.split("-");
    var idTicket = tickeyArray[0];
    var status = tickeyArray[1];
    $.ajax({
        url: location.href + 'Home/historiaTicket',
        async: 'true',
        cache: false,
        contentType: "application/x-www-form-urlencoded",
        global: true,
        ifModified: false,
        processData: true,
        data: { "idTicket": idTicket, "status": status },
        beforeSend: function() {},
        success: function(result) {
            if (result == "0") {
                window.location.reload();
            } else {
                $('#historialTicket').html(result);
            }
        },
        error: function(object, error, anotherObject) {},
        timeout: 30000,
        type: "POST"
    });
}

function answerTicket(id) {
    var idTicketHistory = id.id;
    $.ajax({
        url: location.href + 'Home/historiaTicketAnswer',
        async: 'true',
        cache: false,
        contentType: "application/x-www-form-urlencoded",
        global: true,
        ifModified: false,
        processData: true,
        data: { "idTicketHistory": idTicketHistory },
        beforeSend: function() {},
        success: function(result) {
            if (result == "0") {
                window.location.reload();
            } else {
                $('#ticketAnswer').html(result);
            }
        },
        error: function(object, error, anotherObject) {},
        timeout: 30000,
        type: "POST"
    });
    $('#ticketAnswer').show();
}

function sendTicket(id) {
    var ticketId = id.id;
    var respuestaTicket = $('#ticketRespuesta').val();
    if (respuestaTicket == "") {
        $('#mensaje').html('<div class = "alert alert-warning alert-dismissible fade show" role = "alert"><strong> Atencion! </strong> Debes escribir algo en la caja de texto.<button type = "button" class = "close" data-dismiss = "alert" aria-label = "Close"><span aria-hidden = "true"> &times; </span></button></div>');
        $('#mensaje').show();
        throw new Error("Respuesta Tickets vacio");
    } else {
        $.ajax({
            url: location.href + 'TicketsAdmin/sendTicketAnswer',
            async: 'true',
            cache: false,
            contentType: "application/x-www-form-urlencoded",
            global: true,
            ifModified: false,
            processData: true,
            data: { "ticketId": ticketId, "respuestaTicket": respuestaTicket },
            beforeSend: function() {},
            success: function(result) {
                if (result == "0") {
                    $('#mensaje').html('<div class = "alert alert-danger alert-dismissible fade show" role = "alert"><strong> Atencion! </strong> No se puedo enviar la respuesta, intentalo mas tarde.<button type = "button" class = "close" data-dismiss = "alert" aria-label = "Close"><span aria-hidden = "true"> &times; </span></button></div>');
                    $('#mensaje').show();
                    $('#ticketAnswer').hide();
                } else {
                    $('#mensaje').html('<div class = "alert alert-success alert-dismissible fade show" role = "alert"><strong> Atencion! </strong> Se envio la respuesta correctamente.<button type = "button" class = "close" data-dismiss = "alert" aria-label = "Close"><span aria-hidden = "true"> &times; </span></button></div>');
                    $('#mensaje').show();
                    $('#ticketAnswer').hide();
                }
            },
            error: function(object, error, anotherObject) {
                $('#mensaje').html('<div class = "alert alert-danger alert-dismissible fade show" role = "alert"><strong> Atencion! </strong> No se puedo enviar la respuesta, intentalo mas tarde.<button type = "button" class = "close" data-dismiss = "alert" aria-label = "Close"><span aria-hidden = "true"> &times; </span></button></div>');
                $('#mensaje').show();
                $('#ticketAnswer').hide();
            },
            timeout: 30000,
            type: "POST"
        });
    }
}

function closeTicket(id) {
    var ticketId = id.id;
    $.ajax({
        url: location.href + 'Home/closeTicket',
        async: 'true',
        cache: false,
        contentType: "application/x-www-form-urlencoded",
        global: true,
        ifModified: false,
        processData: true,
        data: { "ticketId": ticketId },
        beforeSend: function() {},
        success: function(result) {
            if (result == "0") {} else {
                window.location.reload();
            }
        },
        error: function(object, error, anotherObject) {},
        timeout: 30000,
        type: "POST"
    });
}

function confirmCloseTicket(id) {
    var idTicket = id.id;
    $.ajax({
        url: location.href + 'Home/closeConfirmTicket',
        async: 'true',
        cache: false,
        contentType: "application/x-www-form-urlencoded",
        global: true,
        ifModified: false,
        processData: true,
        data: { "idTicket": idTicket },
        beforeSend: function() {},
        success: function(result) {
            if (result == "0") {
                window.location.reload();
            } else {
                $('#closeTicketConfirm').html(result);
            }
        },
        error: function(object, error, anotherObject) {},
        timeout: 30000,
        type: "POST"
    });
}

function sendCanje($ptsUser, $ptsCanje) {
    periodoCanjes = 1;
    if (validaCampos()) {
        if (periodoCanjes == 1) {
            if ($ptsUser >= $ptsCanje) {
                click++;
                if (click == 1) {
                    document.getElementById('btnGenCanje').style.display = "none";
                    if (contOrder.length > 0) {
                        var jsonString = JSON.stringify(contOrder);
                        var address = $("#frmCanjeDir").serializeArray();
                        $.ajax({
                            type: 'POST',
                            url: location.href + 'Home/addCanje',
                            dataType: "json",
                            data: { "data": jsonString, "ptsCanje": $ptsCanje, "address": address },
                            beforeSend: function() {},
                            success: function(response) {
                                if (response) {
                                    swal("Solicitud de canje", "Tu orden ha sido realizada correctamente", "success");
                                    sleep(2000);
                                    location.reload();
                                } else {
                                    swal("Error de comunicación", "Ha ocurrido un error de comunicación. Intente nuevamente", "warning");
                                    $("#btnGenCanje").show();
                                    $("#lblProc").hide();
                                }
                            },
                            error: function(x, e) {
                                swal("Error al realizar el canje", "Ocurrio un error al realizar el canje", "warning");
                                $("#btnGenCanje").show();
                                $("#lblProc").hide();
                            }
                        });
                    } else {
                        swal("Operacion no permitida", "No tienes ningun articulo en tu carrito", "warning");
                    }
                } else {
                    swal("Solo debes de realizar un click para poder relizar tu canje", "Warning");
                    location.reload();
                }
            } else {
                swal("Operacion no permitida", "Su saldo es insuficiente para realizar este canje.", "warning");
            }
        } else {
            swal("Operacion no permitida", "No es posible realizar el proceso de canje.", "warning");
        }
    } else {
        swal("Operacion no permitida", "Todos los campos son obligatorios.", "warning");
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
            location.href = location.hostname + "/reconocelo/Home/salirReconocelo";
        } else {}
    });
}

function validaCampos() {
    var datosForm = $("#frmCanjeDir").serializeArray();
    var vc = 0;
    $.each(datosForm, function(k, v) {
        if (v.value == "") {
            $("#g" + v.name).addClass("has-error");
            vc = 1;
        } else {
            $("#g" + v.name).removeClass("has-error");
        }
    });
    if (vc == 1) {
        return false;
    } else {
        return true;
    }
}

function up() {
    $('body,html').animate({
        scrollTop: 0
    }, 800);
    return false;
}

function CambiarCorreo() {
    var correo = document.getElementsByName("nuevoCorreo")[0].value;
    if (validateEmailLogIn(correo)) {
        $.ajax({
            type: 'POST',
            url: location.href + 'CofInfo_controller/cambiarCorreo',
            dataType: "json",
            data: { "correo": correo },
            beforeSend: function() {},
            success: function(response) {
                if (response) {
                    swal("Cambio de email", "Cambio de correo exitosamente", "success");
                } else {
                    swal("Cambio de email", "Ha ocurrido un error al cambiar el email.", "warning");
                }
            },
            error: function(x, e) {
                swal("Cambio de email", "Ha ocurrido un error al cambiar el email." + e + x, "warning");
            }
        });
    } else {
        swal("Correo invalido", "Ingresa un correo valido", "warning");
    }
    return true;
}

function validateEmailLogIn(correo) {
    var pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    return pattern.test(correo);
}

function loginTicketAdmin() {
    $('#MessageError').hide();
    var usuario = $('#user').val();
    var password = $('#password').val();
    if (usuario == "" || password == "") {
        $('#MessageError').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Advertencia!</strong> Hay campos vacios.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        $('#MessageError').show();
        throw new Error("Campos vacios");
    } else {
        $.ajax({
            url: location.href + 'TicketsAdmin/login',
            async: 'true',
            cache: false,
            contentType: "application/x-www-form-urlencoded",
            global: true,
            ifModified: false,
            processData: true,
            data: { "usuario": usuario, "password": password },
            beforeSend: function() {},
            success: function(result) {
                if (result == "false") {
                    $('#MessageError').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Advertencia!</strong> Usuario o contraseña incorrectos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    $('#MessageError').show();
                    $('#user').val("");
                    $('#password').val("");
                } else {
                    location.href = location.hostname + "/reconocelo/TicketsAdmin/home";
                }
            },
            error: function(object, error, anotherObject) {},
            timeout: 30000,
            type: "POST"
        });
    }
}

function salirTicket() {
    location.href = location.hostname + "/reconocelo/TicketsAdmin/exit_ticket";
}

function sendRecuperaPasswordReconocelo() {
    var usuarioEmailReconocelo = $('#usuarioEmailReconocelo').val();
    if (usuarioEmailReconocelo == "") {
        $('#MessageRecuperaReconocelo').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Advertencia!</strong> debes de escribir un correo.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        $('#MessageRecuperaReconocelo').show();
        throw new Error("Correo imcompleto");
    } else {
        $.ajax({
            url: location.href + 'Recuperar_usuario/sendMailRecuperaReconocelo',
            async: 'true',
            cache: false,
            contentType: "application/x-www-form-urlencoded",
            global: true,
            ifModified: false,
            processData: true,
            data: { "usuarioEmailReconocelo": usuarioEmailReconocelo },
            beforeSend: function() {},
            success: function(result) {
                if (result == "0") {
                    $('#MessageRecuperaReconocelo').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Advertencia!</strong> Algo salio mal al mandar el correo, o intentalo mas tarde.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    $('#MessageRecuperaReconocelo').show();
                } else {
                    $('#MessageRecuperaReconocelo').html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Exito!</strong> Se mando a tu correo, para que puedas recuperar tu cuenta.En caso de no aparecer, favor de revisar la carpeta de spam.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    $('#MessageRecuperaReconocelo').show();
                }
            },
            error: function(object, error, anotherObject) {},
            timeout: 30000,
            type: "POST"
        });
    }
}

function configNewPasswordReconocelo(id) {
    var passwordNewReconocelo = $('#passwordNewReconocelo').val();
    var passwordConfirmNewReconocelo = $('#passwordConfirmNewReconocelo').val();
    if (passwordNewReconocelo == "" || passwordConfirmNewReconocelo == "") {
        $('#MessageRecuperarReconocelo').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Advertencia!</strong> Algun campo se encuentra vacio.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>')
        $('#MessageRecuperarReconocelo').show();
        throw new Error("Campo vacio");
    } else if (passwordNewReconocelo != passwordConfirmNewReconocelo) {
        $('#MessageRecuperarReconocelo').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Advertencia!</strong> Las contraseñas no coindicen.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>')
        $('#MessageRecuperarReconocelo').show();
        throw new Error("Campo vacio");
    } else {
        var idReconoceloUser = id.id;
        var userConfigToal = idReconoceloUser.split("-");
        var loginWeb = userConfigToal[0];
        var idParticipante = userConfigToal[1];
        $.ajax({
            url: location.href + 'Recuperar_usuario/cambiarUserPasswordNewReconocelo',
            async: 'true',
            cache: false,
            contentType: "application/x-www-form-urlencoded",
            global: true,
            ifModified: false,
            processData: true,
            data: {
                "loginWeb": loginWeb,
                "idParticipante": idParticipante,
                "passwordNewReconocelo": passwordNewReconocelo
            },
            beforeSend: function() {},
            success: function(result) {
                if (result == "0") {
                    $('#MessageRecuperarReconocelo').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Advertencia!</strong> No se cambio la contraseña correctamente.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    $('#MessageRecuperarReconocelo').show();
                } else {
                    $('#MessageRecuperarReconocelo').html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Exito!</strong> Se cambio la contraseña correctamente.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    $('#MessageRecuperarReconocelo').show();
                    $('#IniciarSesionReconocelo').show();
                    $('#PAsswordNewReconocelo1').hide();
                }
            },
            error: function(object, error, anotherObject) {},
            timeout: 30000,
            type: "POST"
        });
    }
}

function CambiarContraseña() {
    var passwordOld = $('#passwordOld').val();
    var passwordNew = $('#passwordNew').val();
    var passwordNewConfirmar = $('#passwordNewConfirmar').val();
    if (passwordOld == "" || passwordNew == "" || passwordNewConfirmar == "") {
        $('#messageUpdatePasswordReconocelo').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Advertencia!</strong> Alguno de los campos se encuentran vacios.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        throw new Error("Campos vacio");
    } else if (passwordNew != passwordNewConfirmar) {
        $('#messageUpdatePasswordReconocelo').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Advertencia!</strong> Las contraseñas no coinciden.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        throw new Error("Password no match");
    } else {
        $.ajax({
            url: location.href + 'CofInfo_controller/updatePasswordReconocelo',
            async: 'true',
            cache: false,
            contentType: "application/x-www-form-urlencoded",
            global: true,
            ifModified: false,
            processData: true,
            data: {
                "passwordOld": passwordOld,
                "passwordNew": passwordNew
            },
            beforeSend: function() {},
            success: function(result) {
                if (result == "0") {
                    $('#messageUpdatePasswordReconocelo').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Advertencia!</strong> No se cambio la contraseña correctamente.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    $('#messageUpdatePasswordReconocelo').show();
                } else {
                    $('#messageUpdatePasswordReconocelo').html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Exito!</strong> Se cambio la contraseña correctamente.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    $('#messageUpdatePasswordReconocelo').show();
                    $('#passwordOld').val('');
                    $('#passwordNew').val('');
                    $('#passwordNewConfirmar').val('');
                }
            },
            error: function(object, error, anotherObject) {},
            timeout: 30000,
            type: "POST"
        });
    }
}