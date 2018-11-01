angular.module('login', ['ngSanitize'])
    .controller('controller_login', function($scope, $http) {
        $scope.mensaje = "<b>El usuario o contrasena es incorrecto</b>";
        $scope.usuario = null;
        $scope.password = null;
        $scope.loading = false;
        $scope.error = false;
        $scope.validateUserIndb = function() {
            if ($scope.usuario == "" || $scope.usuario == null || $scope.password == null || $scope.password == "") {
                $scope.mensaje = "<b>El usuario o contrasena es incorrecto</b>";
                $scope.loading = false;
                $scope.error = true;
                return false;
            } else {
                $scope.error = false;
                $scope.loading = true;
                $.ajax({
                    url: 'login_controller_dev/login',
                    type: 'POST',
                    dataType: 'json',
                    async: 'true',
                    data: { "usuario": $scope.usuario, "password": $scope.password },
                    success: function(result) {
                        if (result) {

                            //window.location.reload();
                            location.href = "https://" + location.hostname + "/devHome/";
                        } else {
                            $scope.$apply(function() {
                                $scope.loading = false;
                                $scope.error = true;
                            });


                        }

                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        $scope.$apply(function() {
                            $scope.loading = false;
                            $scope.error = true;
                        });
                    }
                });
            }
        }

    });