'use strict';

angular.module('myApp.view1', ['ngRoute', 'ngJsonExportExcel'])

        .config(['$routeProvider', function ($routeProvider) {
                $routeProvider.when('/view1', {
                    templateUrl: 'view1/view1.html',
                    controller: 'View1Ctrl'
                });

            }])

        .controller('View1Ctrl', function ($scope, $rootScope, $http) {
            $scope.usuario;
            $scope.password;
            $scope.validate = function () {
                if ($scope.usuario == null || $scope.usuario == '' || $scope.password == null || $scope.password == '') {
                    $.notify("Ingresa informacion en el formulario", "error");
                } else {
                    var direccion = "http://www.reconocelo.com.mx/monitor/ValidateLogin/";
                    $.ajax({
                        url: direccion + $scope.usuario + '/' + $scope.password,
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        type: "POST", /* or type:"GET" or type:"PUT" */
                        dataType: "json",
                        data: {
                        },
                        success: function (result) {
                        
                            $rootScope.session = result;
                            console.log( $rootScope.session);
                        },
                        error: function () {
                            console.log("error", url);
                        }
                    });
                }
            };

        });