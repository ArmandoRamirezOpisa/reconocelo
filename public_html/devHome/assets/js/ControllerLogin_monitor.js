angular.module('login', []).controller('validarLogin', function($scope, $http) {
    $scope.usuario;
    $scope.message;
    $scope.password;
    $http.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded; charset=UTF-8';
    $scope.validarUsuario = function() {
        if ($scope.usuario == null || $scope.usuario == "" || $scope.password == null || $scope.password == "") {
            $scope.message = "Verifica que los campos esten llenados correctamente";
        } else {

            $http.post("login", { 'usuario': $scope.usuario, 'password': $scope.password })
                .then(function(response) {

                    if (response.data == 0) {

                        $scope.message = "Usuario o password incorrectos";

                    }
                    if (response.data == 1) {

                        location.reload();

                    }

                }, function(response) {

                    $scope.message = "Verifique su informacion";

                });

        }
    }

});

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */