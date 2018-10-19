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