var app = angular.module('machineApp', [], function($interpolateProvider) {
	$interpolateProvider.startSymbol('<%');
	$interpolateProvider.endSymbol('%>');
});
 
app.controller('machineController', function($scope, $http, $interval) {
 
          $scope.reload = function () {
            $http.get('/dashboard').
                success(function (data) {
                  $scope.todos = data.todos;
              });
          };
          $scope.reload();
          $interval($scope.reload, 5000);
});
 
 
