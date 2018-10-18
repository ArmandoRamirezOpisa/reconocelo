//Archivo de javaScript donde tiene las funciones de reconocelo/monitor

//Funcion para controlar el div, cuando se esta navegando
/*function loadSection(controller, divSel) {
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
        type: "POST"
    });
}*/

function MonitorNav(id) {

    /*document.getElementById('participantes').setAttribute('href', '/monitorPariticipantes');*/

    var idNavMonitor = id.id;

    alert("Entro correctamente " + idNavMonitor);

    console.log(idNavMonitor);

    switch (idNavMonitor) {
        case 'participantes':
            $('#navegacionMonitor').html('<h1>Informacion de participantes</h1>');
            break;
        case 'depositosPuntos':
            $('#navegacionMonitor').html('<h1>Informacion de depositos en puntos</h1>');
            break;
        case 'canjes':
            $('#navegacionMonitor').html('<h1>Informacion de canjes</h1>');
            break;
        case 'catologoActual':
            $('#navegacionMonitor').html('<h1>Informacion del catologo actual</h1>');
            break;
        case 'monitorPrograma':
            $('#navegacionMonitor').html('<h1>Informacion del monitor de programa</h1>');

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