//Archivo de javaScript donde tiene las funciones de reconocelo/monitor

//Funcion para controlar el div, cuando se esta navegando
function MonitorNav(id) {

    var idNavMonitor = id.id;

    switch (idNavMonitor) {
        case 'inicioMonitor':
            location.href = "http://" + location.hostname + "/monitor";
            break;
        case 'participantes':
            location.href = "http://" + location.hostname + "/monitor/participantes";
            break;
        case 'depositosPuntos':
            location.href = "http://" + location.hostname + "/monitor/depositos";
            break;
        case 'catologoActual':
            location.href = "http://" + location.hostname + "/monitor/catalogo";
            break;
        case 'monitorPrograma':
            location.href = "http://" + location.hostname + "/monitor/programa";

    }

}
/* Inicio participantes */
function participantes() {

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

function filtroParticipantes(id) {
    var idSaldo = id.id;
    if (idSaldo == 'Saldo') {
        //Necesario hacerlo con ajax
        console.log('Tiene saldo');
        participantes();
    } else if (idSaldo == 'sinSaldo') {
        console.log('No tiene saldo');

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

function estadoParticipante(id) {

    var idEstado = id.id;
    if (document.getElementById(idEstado).checked) {
        document.getElementById("selectEstadoParticipante").style.display = "block";
    } else {
        document.getElementById("selectEstadoParticipante").style.display = "none";
    }
}

function estadoParticipanteSelect() {

    var estado = document.getElementById("selectEstadoParticipante").value;
    var radioSaldo = document.getElementById("Saldo");
    var radioSinSaldo = document.getElementById("sinSaldo");

    if (estado == 'activo' && radioSaldo.checked == true) {

        estadoParticipanteSelectFiltro('/monitor/saldoActivo');
        $("#selectEstadoParticipante").val('selecciona');

    } else if (estado == 'activo' && radioSinSaldo.checked == true) {

        estadoParticipanteSelectFiltro('/monitor/sinSaldoActivo');
        $("#selectEstadoParticipante").val('selecciona');

    } else if (estado == 'inactivo' && radioSaldo.checked == true) {

        estadoParticipanteSelectFiltro('/monitor/saldoInactivo');
        $("#selectEstadoParticipante").val('selecciona');

    } else if (estado == 'inactivo' && radioSinSaldo.checked == true) {

        estadoParticipanteSelectFiltro('/monitor/sinSaldoInactivo');
        $("#selectEstadoParticipante").val('selecciona');
    }

}

function estadoParticipanteSelectFiltro(estadoFiltro) {

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
/* Fin Participantes */
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
/* fin depositos*/

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
            location.href = "http://" + location.hostname + "/exit_controller_monitor";
        } else {
            //  swal("Cancelled", "Your imaginary file is safe :)", "error");
        }
    });

}