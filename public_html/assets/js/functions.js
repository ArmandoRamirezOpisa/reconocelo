/* Funcion login Reconocelo */
function loginReconocelo() {

    $('#loading').show();
    var usuarioReconocelo = $('#usuarioReconocelo').val();
    var passwordReconocelo = $('#passwordReconocelo').val();
    if (usuarioReconocelo == "" || passwordReconocelo == "") {
        $('#error').show();
        $('#mensajeErrorReconocelo').html('<i class="fas fa-exclamation-circle fa-lg mr-2"></i> Algun campo se encuentra vacio');
    } else {
        $.ajax({
            url: '/home/loginReconocelo',
            async: 'true',
            cache: false,
            contentType: "application/x-www-form-urlencoded",
            global: true,
            ifModified: false,
            processData: true,
            data: { "usuarioReconocelo": usuarioReconocelo, "passwordReconocelo": passwordReconocelo },
            beforeSend: function() {
                console.log('Procesando, espere por favor...');
            },
            success: function(result) {

                if (result == "0") {
                    console.log("Expiro");
                    $('#error').show();
                    $('#mensajeErrorReconocelo').html('<i class="fas fa-exclamation-circle fa-lg mr-2"></i> Usuario o contraseña incorrecto');
                } else {
                    location.href = "https://" + location.hostname + "/home";
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
/* Fin funcion login reconocelo*/


//Globales
var contOrder = new Array();

function loadSection(controller, divSel) //Controlador,Div en el que se despliega la vista
{
    $.ajax({
        url: controller,
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
                $('#' + divSel).html(result);
            }
        },
        timeout: 30000,
        type: "GET"
    });
}

var formatNumber = {
    separador: ",", // separador para los miles
    sepDecimal: '.', // separador para los decimales
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
    //Arma array de productos seleccionados, 
    //si el id seleccionado ya se encuentra en el array lo elimina del mismo.
    numE = contOrder.length;

    if (numE == 0) {
        //Si el array esta vacío agrega el id en la posicion 0
        contOrder = [{
            "id": idProduct,
            "cantidad": "1",
            "nombre": name,
            "puntos": puntos
        }];

    } else {
        //A partir del segundo elemento se verifica si existe en el array, si existe se le suma 1 a la cantidad.
        $.each(contOrder, function(k, v) {
            if (v.id == idProduct) {
                v.cantidad = parseInt(v.cantidad) + 1;
                v.puntos = parseInt(v.puntos) + puntos;
                exist = 1;
            }
        });

        //Si no existe en el array se agrega un nuevo elemento con cantidad 1
        if (exist == 0) {
            contOrder.push({
                "id": idProduct,
                "cantidad": "1",
                "nombre": name,
                "puntos": puntos
            });
        }
    }
    loadSection("cart_controller/showContentCart/", "dvContAw");
    $.notify("Se ha agregado el producto a su orden", "success");
}

function refreshCar() {
    //Actualiza las cantidades de los productos en el array
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
                    loadSection("cart_controller/showContentCart/", "dvContAw");
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
        } else {
            //  swal("Cancelled", "Your imaginary file is safe :)", "error");
        }
    });
}

function delArray() {
    //Elimina todo el contenido del carrito//
    $.each(contOrder, function(k, v) {
        contOrder.splice(k, 1);
    });
}

function showDet(id) {
    loadSection("cart_controller/showItem/" + id, "dvContAw");
}

function sendDataAjaxDuda(idCanjeArticulo, NombreCanjeArticulo, mensaje, tipo) {

    $.ajax({
        type: 'POST',
        url: "ayuda_Controller/crearComentario",
        dataType: "json",
        data: { "idcanje": idCanjeArticulo, "nombre": NombreCanjeArticulo, "mensaje": mensaje, "tipo": tipo },
        beforeSend: function() {
            console.log('Procesando, espere por favor...');
        },
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

/* Funcion para guardar tickets */
/* */
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
                console.log('orden vacio');
                console.log(temaOrden);
                console.log(mensaje);
                orden = 0;
                enviarPregunta1(orden, temaOrden, mensaje, 3);
            }
        }
    }
}
/* */
function enviarPregunta1(idCanjeArticulo, NombreCanjeArticulo, mensaje, tipo) {

    $.ajax({
        type: 'POST',
        url: "/ayuda_Controller/crearTicketReconocelo",
        dataType: "json",
        data: { "idcanje": idCanjeArticulo, "nombre": NombreCanjeArticulo, "mensaje": mensaje, "tipo": tipo },
        beforeSend: function() {
            console.log('Procesando, espere por favor...');
        },
        success: function(response) {
            if (response) {
                swal("Mensaje enviado", "Envio de tu mensaje finalizado correctamente.", "success");
                document.getElementById("mensaje").value = "";
                console.log(response);
            } else {
                swal("Envio de Mensaje", "Ha ocurrido un error al enviar tu mensaje.", "warning");
            }
        },
        error: function(response) {
            swal("Envio de Mensaje", "Ocurrio un error al enviar su mensaje", "warning");
            console.log(response);
        }
    });



}
/* Fin funcion de prueba */

/* Funcion aparecer opciones select*/
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
/* Fin funcion aparecer opciones select*/

/* Funcion del historial del ticket */
function historiaTicket(id) {
    var id = id.id;
    var tickeyArray = id.split("-");
    var idTicket = tickeyArray[0];
    var status = tickeyArray[1];

    $.ajax({
        url: '/home/historiaTicket',
        async: 'true',
        cache: false,
        contentType: "application/x-www-form-urlencoded",
        global: true,
        ifModified: false,
        processData: true,
        data: { "idTicket": idTicket, "status": status },
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
                $('#historialTicket').html(result);
            }

        },
        error: function(object, error, anotherObject) {
            console.log('Mensaje: ' + object.statusText + 'Status: ' + object.status);
        },
        timeout: 30000,
        type: "POST"
    });

}

function answerTicket(id) {

    var idTicketHistory = id.id;

    $.ajax({
        url: '/home/historiaTicketAnswer',
        async: 'true',
        cache: false,
        contentType: "application/x-www-form-urlencoded",
        global: true,
        ifModified: false,
        processData: true,
        data: { "idTicketHistory": idTicketHistory },
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
                $('#ticketAnswer').html(result);
            }

        },
        error: function(object, error, anotherObject) {
            console.log('Mensaje: ' + object.statusText + 'Status: ' + object.status);
        },
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
            url: '/ticketsAdmin/sendTicketAnswer',
            async: 'true',
            cache: false,
            contentType: "application/x-www-form-urlencoded",
            global: true,
            ifModified: false,
            processData: true,
            data: { "ticketId": ticketId, "respuestaTicket": respuestaTicket },
            beforeSend: function() {
                console.log('Procesando, espere por favor...');
            },
            success: function(result) {

                if (result == "0") {
                    console.log("Expiro");
                    $('#mensaje').html('<div class = "alert alert-danger alert-dismissible fade show" role = "alert"><strong> Atencion! </strong> No se puedo enviar la respuesta, intentalo mas tarde.<button type = "button" class = "close" data-dismiss = "alert" aria-label = "Close"><span aria-hidden = "true"> &times; </span></button></div>');
                    $('#mensaje').show();
                    $('#ticketAnswer').hide();
                } else {
                    console.log('Correcto');
                    console.log(result);
                    $('#mensaje').html('<div class = "alert alert-success alert-dismissible fade show" role = "alert"><strong> Atencion! </strong> Se envio la respuesta correctamente.<button type = "button" class = "close" data-dismiss = "alert" aria-label = "Close"><span aria-hidden = "true"> &times; </span></button></div>');
                    $('#mensaje').show();
                    $('#ticketAnswer').hide();
                }

            },
            error: function(object, error, anotherObject) {
                $('#mensaje').html('<div class = "alert alert-danger alert-dismissible fade show" role = "alert"><strong> Atencion! </strong> No se puedo enviar la respuesta, intentalo mas tarde.<button type = "button" class = "close" data-dismiss = "alert" aria-label = "Close"><span aria-hidden = "true"> &times; </span></button></div>');
                $('#mensaje').show();
                $('#ticketAnswer').hide();
                console.log('Mensaje: ' + object.statusText + 'Status: ' + object.status);
            },
            timeout: 30000,
            type: "POST"
        });

    }

}

function closeTicket(id) {

    var ticketId = id.id;

    $.ajax({
        url: '/home/closeTicket',
        async: 'true',
        cache: false,
        contentType: "application/x-www-form-urlencoded",
        global: true,
        ifModified: false,
        processData: true,
        data: { "ticketId": ticketId },
        beforeSend: function() {
            console.log('Procesando, espere por favor...');
        },
        success: function(result) {

            if (result == "0") {
                console.log("Expiro");
            } else {
                console.log('Correcto');
                console.log(result);
                window.location.reload();
            }

        },
        error: function(object, error, anotherObject) {
            console.log('Mensaje: ' + object.statusText + 'Status: ' + object.status);
        },
        timeout: 30000,
        type: "POST"
    });

}

/* */
function confirmCloseTicket(id) {
    var idTicket = id.id;

    $.ajax({
        url: '/home/closeConfirmTicket',
        async: 'true',
        cache: false,
        contentType: "application/x-www-form-urlencoded",
        global: true,
        ifModified: false,
        processData: true,
        data: { "idTicket": idTicket },
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
                $('#closeTicketConfirm').html(result);
            }

        },
        error: function(object, error, anotherObject) {
            console.log('Mensaje: ' + object.statusText + 'Status: ' + object.status);
        },
        timeout: 30000,
        type: "POST"
    });

}
/* */
/* Fin funcion prueba del historial del ticket */

function sendCanje($ptsUser, $ptsCanje) {
    periodoCanjes = 1;
    if (validaCampos()) {
        if (periodoCanjes == 1) {

            if ($ptsUser >= $ptsCanje) {
                document.getElementById('btnGenCanje').style.display = "none";
                if (contOrder.length > 0) {

                    var jsonString = JSON.stringify(contOrder); //Pasa array a formato JSON
                    var address = $("#frmCanjeDir").serializeArray();
                    $.ajax({
                        type: 'POST',
                        url: "canje_controller/addCanje",
                        dataType: "json",
                        data: { "data": jsonString, "ptsCanje": $ptsCanje, "address": address },
                        beforeSend: function() {
                            console.log('Procesando, espere por favor...');
                        },
                        success: function(response) {
                            if (response) {
                                swal("Solicitud de canje", "Tu orden ha sido realizada correctamente", "success");
                                //setTimeout(function() { location.href = "https://www.reconocelo.com.mx"; }, 3000);
                            } else {
                                swal("Error de comunicación", "Ha ocurrido un error de comunicación. Intente nuevamente", "warning");
                                $("#btnGenCanje").show();
                                $("#lblProc").hide();
                            }
                        },
                        error: function(x, e) {
                            swal("Error al realizar el canje", "Ocurrio un error al realizar el canje:" + e.messager, "warning");
                            $("#btnGenCanje").show();
                            $("#lblProc").hide();
                        }
                    });

                } else {
                    swal("Operacion no permitida", "No tienes ningun articulo en tu carrito", "warning");
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
            location.href = "https://" + location.hostname + "/exit_controller";
        } else {
            //  swal("Cancelled", "Your imaginary file is safe :)", "error");
        }
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
            url: "cofInfo_controller/cambiarCorreo",
            dataType: "json",
            data: { "correo": correo },
            beforeSend: function() {
                console.log('Procesando, espere por favor...');
            },
            success: function(response) {
                if (response) {
                    swal("Cambio de email", "Cambio de correo exitosamente", "success");
                    //  setTimeout(function(){location.href="https://www.reconocelo.com.mx";}, 3000);
                } else {

                    swal("Cambio de email", "Ha ocurrido un error al cambiar el email.", "warning");
                    // $.notify("Ha ocurrido un error al enviar tu mensaje.", "error");
                }
            },
            error: function(x, e) {
                swal("Cambio de email", "Ha ocurrido un error al cambiar el email." + e + x, "warning");
                // alert("Ocurrio un error al enviar su duda" + e.messager);
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

/* Ticket administrador */
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
            url: '/ticketsAdmin/login',
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

                console.log(result);
                if (result == "false") {
                    $('#MessageError').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Advertencia!</strong> Usuario o contraseña incorrectos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    $('#MessageError').show();
                    $('#user').val("");
                    $('#password').val("");
                } else {
                    location.href = "https://" + location.hostname + "/ticketsAdmin/home";
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

function salirTicket() {
    location.href = "https://" + location.hostname + "/ticketsAdmin/exit_ticket";
}
/* Fin ticket administrador */

/* Recuperar password Reconocelo */
function sendRecuperaPasswordReconocelo() {
    var usuarioEmailReconocelo = $('#usuarioEmailReconocelo').val();
    if (usuarioEmailReconocelo == "") {
        $('#MessageRecuperaReconocelo').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Advertencia!</strong> debes de escribir un correo.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        $('#MessageRecuperaReconocelo').show();
        throw new Error("Correo imcompleto");
    } else {
        $.ajax({
            url: '/recuperar_usuario/sendMailRecuperaReconocelo',
            async: 'true',
            cache: false,
            contentType: "application/x-www-form-urlencoded",
            global: true,
            ifModified: false,
            processData: true,
            data: { "usuarioEmailReconocelo": usuarioEmailReconocelo },
            beforeSend: function() {
                console.log('Procesando, espere por favor...');
            },
            success: function(result) {

                if (result == "0") {
                    console.log("Expiro");
                    $('#MessageRecuperaReconocelo').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Advertencia!</strong> Algo salio mal al mandar el correo, o intentalo mas tarde.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    $('#MessageRecuperaReconocelo').show();
                } else {
                    console.log('Correcto');
                    console.log(result);
                    $('#MessageRecuperaReconocelo').html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Exito!</strong> Se mando a tu correo, para que puedas recuperar tu cuenta.En caso de no aparecer, favor de revisar la carpeta de spam.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    $('#MessageRecuperaReconocelo').show();
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
            url: '/recuperar_usuario/cambiarUserPasswordNewReconocelo',
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
            beforeSend: function() {
                console.log('Procesando, espere por favor...');
            },
            success: function(result) {

                if (result == "0") {
                    console.log("Expiro");
                    $('#MessageRecuperarReconocelo').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Advertencia!</strong> No se cambio la contraseña correctamente.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    $('#MessageRecuperarReconocelo').show();
                } else {
                    console.log('Correcto');
                    console.log(result);
                    $('#MessageRecuperarReconocelo').html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Exito!</strong> Se cambio la contraseña correctamente.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    $('#MessageRecuperarReconocelo').show();
                    $('#IniciarSesionReconocelo').show();
                    $('#PAsswordNewReconocelo1').hide();
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
/* Fin recuperar password Reconocelo */

/* funcion cambiar password */
function CambiarContraseña() {
    $('#messageUpdatePasswordReconocelo').html('<i class="fas fa-sync fa-spin"></i>');
    $('#messageUpdatePasswordReconocelo').show();
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
            url: '/cofInfo_controller/updatePasswordReconocelo',
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
            beforeSend: function() {
                console.log('Procesando, espere por favor...');
            },
            success: function(result) {

                if (result == "0") {
                    $('#messageUpdatePasswordReconocelo').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Advertencia!</strong> No se cambio la contraseña correctamente <a href="https://www.reconocelo.com.mx/recuperar_usuario" class="alert-link">si no la recuerdas da click para resstablecerla</a>.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    $('#messageUpdatePasswordReconocelo').show();
                } else {
                    $('#messageUpdatePasswordReconocelo').html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Exito!</strong> Se cambio la contraseña correctamente.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    $('#messageUpdatePasswordReconocelo').show();
                    $('#passwordOld').val('');
                    $('#passwordNew').val('');
                    $('#passwordNewConfirmar').val('');
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
/* fin funcion cambiar password */