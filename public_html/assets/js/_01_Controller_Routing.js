angular.module('monitor', [])
        .controller('monitor_controller', function ($scope) {
           $scope.hola="hola de controller";
                    
            $scope.loadSection = function (controller, divSel)//Controlador,Div en el que se despliega la vista
            {
                $.ajax({
                    url: controller,
                    async: 'true',
                    cache: false,
                    contentType: "application/x-www-form-urlencoded",
                    dataType: "html",
                    error: function (object, error, anotherObject) {
                        alert('Mensaje: ' + object.statusText + 'Status: ' + object.status);
                    },
                    global: true,
                    ifModified: false,
                    processData: true,
                    success: function (result) {
                        //console.log(result);
                        if (result == "0")
                        {
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

        });
             
        