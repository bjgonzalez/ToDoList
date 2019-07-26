<div class="container-fluid" ng-controller="mainController" ng-init="initList()">
    <div class="row">
        <div class="col col-lg-4 col-md-12 col-sm-12">
            <div class="form-group">
                <label for="title">Titulo</label>
                <input type="text" class="form-control" id="title" ng-model="titleToDo">
            </div>
        </div>
        <div class="col col-lg-4 col-md-12 col-sm-12">
            <div class="form-group">
                <label for="description">Descripción</label>
                <input type="text" class="form-control" id="description" ng-model="descriptionToDo">
            </div>
        </div>
        <div class="col col-lg-4 col-md-12 col-sm-12">
            <div class="form-group">
                <br>
                <button type="button" class="btn btn-success" ng-click="saveTodo()">Agregar</button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col col-lg-12 col-md-12 col-sm-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Titulo</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Fecha Creación</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="a in ToDoList">
                        <td>{{a.title}}</td>
                        <td>{{a.description}}</td>
                        <td>{{a.creation_date}}</td>
                        <td>
                            <div class="row">
                                <div class="col col-lg-12 col-md-12 col-sm-12">
                                    <button class="btn btn-success" title="Finalizar {{a.title}}" ng-click="finishToDo(a.id)"><i class="far fa-thumbs-up fa-lg"></i></button>
                                    <button class="btn btn-primary" title="Editar {{a.title}}" data-info="{{a}}" ng-click="modalEditToDo(a)"><i class="far fa-edit fa-lg"></i></button>
                                    <button class="btn btn-danger" title="Eliminar {{a.title}}" ng-click="deleteToDo(a.id)"><i class="far fa-trash-alt fa-lg"></i></button>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" modal="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar {{titleModal}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="title">Titulo</label>
                                <input type="text" class="form-control" id="title" ng-model="titleModal">
                            </div>
                        </div>
                        <div class="col col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="description">Descripción</label>
                                <input type="text" class="form-control" id="description" ng-model="descriptionModal">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" ng-modal="idToDo" value="{{idModal}}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" ng-click="updateToDo()">Actualizar</button>
                </div>
            </div>
        </div>
    </div>
</div>