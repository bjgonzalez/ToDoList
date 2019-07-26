var app = angular.module('myapp', []);

app.controller('mainController', function ($scope, $http) {
    $scope.initList = function () {
        $scope.base_url = base_url;
        $scope.ToDoList = [];
        $scope.getListToDo();
    }
    $scope.getListToDo = function () {
        let controlador = $scope.base_url + "Home/getListTodo"
        let data = { 'end': 0, 'removed': 0 }
        $.ajax({
            type: "POST",
            url: controlador,
            data: data,
            dataType: "json",
            success: function (response) {
                if (response.continuar = 1) {
                    $scope.ToDoList = response.data;
                    $scope.$digest();
                } else {
                    $scope.ToDoList = [];

                }
            }
        });
    }
    $scope.saveTodo = function () {
        if (typeof $scope.titleToDo == 'undefined' || $scope.titleToDo.trim() == "") {
            swal('Ups!', 'Por favor agregue un titulo', 'warning');
        } else if (typeof $scope.descriptionToDo == 'undefined' || $scope.descriptionToDo.trim() == "") {
            swal('Ups!', 'Por favor agregue una descripción', 'warning');
        } else {
            let data = { 'title': $scope.titleToDo, 'description': $scope.descriptionToDo };
            let controlador = $scope.base_url + "Home/addListToDo";
            $.ajax({
                type: "POST",
                url: controlador,
                data: data,
                dataType: "json",
                success: function (response) {
                    if (response.continuar == 1) {
                        swal('Ok', response.mensaje, 'success');
                        $scope.titleToDo = "";
                        $scope.descriptionToDo = "";
                    } else {
                        swal('Error', response.mensaje, 'error');
                    }
                }
            });
        }
    }
    $scope.finishToDo = function (id) {
        let controlador = $scope.base_url + "Home/finishToDo";
        let data = { 'id': id };
        $.ajax({
            type: "POST",
            url: controlador,
            data: data,
            dataType: "json",
            success: function (response) {
                if (response.continuar == 1) {
                    swal("Ok", response.mensaje, 'success');
                    $scope.getListToDo();
                } else {
                    swal("Error", response.mensaje, 'error');

                }
            }
        });
    }
    $scope.deleteToDo = function (id) {
        let controlador = $scope.base_url + "Home/deleteToDo";
        let data = { 'id': id };
        $.ajax({
            type: "POST",
            url: controlador,
            data: data,
            dataType: "json",
            success: function (response) {
                if (response.continuar == 1) {
                    swal("Ok", response.mensaje, 'success');
                    $scope.getListToDo();
                } else {
                    swal("Error", response.mensaje, 'error');

                }
            }
        });
    }
    $scope.modalEditToDo = function (a) {
        $scope.titleModal = a.title;
        $scope.descriptionModal = a.description;
        $scope.idModal = a.id;
        $("#exampleModal").modal("show");
    }
    $scope.updateToDo = function () {
        let controlador = $scope.base_url + "Home/updateToDo";
        let data = { 'id': $scope.idModal,'title':$scope.titleModal,'description':$scope.descriptionModal};
        $.ajax({
            type: "POST",
            url: controlador,
            data: data,
            dataType: "json",
            success: function (response) {
                if (response.continuar == 1) {
                    swal("Ok", response.mensaje, 'success');
                    $scope.getListToDo();
                    $("#exampleModal").modal("hide");
                } else {
                    swal("Error", response.mensaje, 'error');

                }
            }
        });
    }
});