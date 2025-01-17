var app = angular.module('mainApp', ['mainRoutes', 'todoService', 'ngAnimate', 'toastr', 'ui.bootstrap']);


app.controller('mainController', ['$scope', '$http', 'toastr', 'TodoService', function($scope, $http, toastr, TodoService) {
	$scope.lists = [];
	$scope.completedTodos = [];
	$scope.acceptedTodos = [];
	$scope.allTodos = [];

	var initializeTodos = function() {	
		TodoService.getActiveTodos().success(function (data) {
			$scope.lists = data;
			$scope.anyActiveTodos = $scope.lists.length;
			console.log($scope.lists);
		});
		TodoService.get().success(function (data) {
			$scope.allTodos = data;
		});
		TodoService.getAllCompletedTodos().success(function (data) {
			$scope.completedTodos = data;
			console.log('completed todos');
			console.log($scope.completedTodos);
		});
		TodoService.getAllAcceptedTodos().success(function (data) {
			$scope.acceptedTodos = data;
			console.log('accepted todos');
			console.log($scope.acceptedTodos);
		});
		TodoService.getAllNonAcceptedTodos().success(function (data) {
			$scope.nonAcceptedTodos = data;
			console.log('Non accepted todos');
			console.log($scope.nonAcceptedTodos);
		});

		$scope.call = function(a){
    
        if (a.Accepted)
            return false;
        else
            return true; };


		

	}

	initializeTodos();

	$scope.addTodos = function () {
		var input = $scope.myinput;

		TodoService.add(input).success(function (data) {
			$scope.myinput = "";
			toastr.success('Image ajoutée en attente!', 'Success');
			$scope.anyActiveTodos = true;
			
			initializeTodos();
			$scope.lists.push({
				id: data.id,
				TodoName: input,
				IsDone: false
			});		
		}).error(function () {
			toastr.error('Something went off. Please try again', 'Fail');
		});
	}
	$scope.done = function (list) {
		console.log('task done!');
		console.log(list);

		if (list.IsDone) {
			var todoIndex = $scope.lists.indexOf(list);

			TodoService.update(list.id, list.IsDone, list.TodoName).success(function() {
				$scope.anyActiveTodos = $scope.lists.length;

				initializeTodos();
				toastr.success('Done a task!', 'Success');
			});

		
		}
	}

}]);