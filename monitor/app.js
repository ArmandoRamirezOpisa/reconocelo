'use strict';

// Declare app level module which depends on views, and components
angular.module('myApp', [
  'ngRoute',
  'myApp.view1',
  'myApp.view2',
  'myApp.version',
  'ngStorage'
]).
config(['$locationProvider', '$routeProvider', function($locationProvider, $routeProvider,$localStorage) {
  $locationProvider.hashPrefix('!');

  $routeProvider.otherwise({redirectTo: '/view1'});
}]).run(function ($rootScope) {
        $rootScope.session;
        
    });
