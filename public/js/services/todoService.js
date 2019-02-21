var app = angular.module('todoService', []);

app.factory('TodoService', ['$http', function($http) {
	var api_v1 = 'api/v1/';
	return {
		add: function (todoName) {
			var model = {
				TodoName: todoName
			}
			return $http.post(api_v1+'todos', model);
		},
		getAllCompletedTodos: function() {
			return $http.get(api_v1+'todos/completed');
		},
		getActiveTodos: function () {
			return $http.get(api_v1+'todos/active');
		},
		getAllAcceptedTodos: function () {
			return $http.get(api_v1+'todos/accepted');
		},
		getAllNonAcceptedTodos: function () {
			return $http.get(api_v1+'todos/nonaccepted');
		},
		get: function () {
			return $http.get(api_v1+'todos');
		},
		update: function(id, isDone, todoName, accepted) {
			var model = {
				TodoName: todoName,
				IsDone: isDone,
				Accepted: accepted,
			}
			return $http.put(api_v1+'todos/'+id, model);
		}
	};
}]);