@extends('layouts.app')

@section('title', 'Universidades')

@section('content')
    <div class="container">
        <div class="card mt-5">
            <h3 class="card-header p-3">Universidades</h3>
            <div class="card-body">
                <div class="mb-3">
                    <button id="createNewRecord" class="btn btn-success">Añadir Universidad</button>
                </div>
                <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Nombre Abreviado</th>
                        <th>Inicial</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="ajaxModel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading"></h4>
                </div>
                <div class="modal-body">
                    <form id="form" name="form" class="form-horizontal">
                        @csrf
                        <input type="hidden" name="id_universidad" id="table_id">
                        <div class="form-group">
                            <label for="nombre" class="col-sm-12 control-label">Nombre</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nombre_abreviado" class="col-sm-12 control-label">Nombre Abreviado</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="nombre_abreviado" name="nombre_abreviado" placeholder="Nombre Abreviado" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inicial" class="col-sm-12 control-label">Inicial</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="inicial" name="inicial" placeholder="Inicial" value="" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="estado" class="col-sm-12 control-label">Estado</label>
                            <div class="col-sm-12">
                                <select class="form-control" id="estado" name="estado">
                                    <option value="S">Activo</option>
                                    <option value="N">Inactivo</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var URLindex = "{{ route('universidades.index') }}";
        var columnas = [
            {data: 'id_universidad', name: 'id_universidad'},
            {data: 'nombre', name: 'nombre'},
            {data: 'nombre_abreviado', name: 'nombre_abreviado'},
            {data: 'inicial', name: 'inicial'},
            {data: 'estado', name: 'estado'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ];
        var titulo = "Universidad";
    </script>

    <script src="{{ asset('js/custom/crud.js') }}"></script>
@endsection
