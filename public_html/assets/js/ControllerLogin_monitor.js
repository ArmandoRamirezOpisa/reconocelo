angular.module('login', []).controller('validarLogin', function($scope, $http) {
    $scope.usuario;
    $scope.message;
    $scope.password;
    $http.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded; charset=UTF-8';
    $scope.validarUsuario = function() {

        if ($scope.usuario == null || $scope.usuario == "" || $scope.password == null || $scope.password == "") {
            $scope.mensaje = "<b>El usuario o contrasena es incorrecto</b>";
            $scope.loading = false;
            $scope.error = true;
            return false;
        } else {
            $scope.error = false;
            $scope.loading = true;
            $.ajax({
                url: 'monitor/login',
                type: 'POST',
                dataType: 'json',
                async: 'true',
                data: { "usuario": $scope.usuario, "password": $scope.password },
                success: function(result) {
                    if (result) {

                        window.location.reload();

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


        /*if ($scope.usuario == null || $scope.usuario == "" || $scope.password == null || $scope.password == "") {
            $scope.message = "Verifica que los campos esten llenados correctamente";
        } else {

            $http.post("login", { 'usuario': $scope.usuario, 'password': $scope.password })
                .then(function(response) {

                    if (response.data == 0) {
                        $scope.message = "Ingresar un usuario o password validos";

                    }
                    if (response.data == 1) {

                        $.ajax({
                            url: 'monitor/index',
                            type: 'POST',
                            dataType: 'json',
                            async: 'true',
                            data: {},
                            success: function(result) {
                                if (result) {

                                    window.location.reload();
                                }

                            },
                            error: function(xhr, ajaxOptions, thrownError) {}
                        });

                    }
                }, function(response) {
                    //   console.log(response);
                    $scope.message = "Verifique su informacion";
                });
        }*/
    }
});




/*      $http.post({
 url: 'http://localhost:120/CursoCodeIgniter3/index.php/login/ObtenerUsuario',
 data:$scope.postData,
 headers : {'Content-Type': 'application/x-www-form-urlencoded'}  
 })
 .then(function (response) {
 console.log(response);
 $scope.InformacionUsuario = response;
 console.log( $scope.InformacionUsuario);
 
 }, function (response) {
 
 console.log(response);
 //  alert("error");
 });*/






/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */