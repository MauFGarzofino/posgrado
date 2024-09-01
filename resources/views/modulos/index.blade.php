@extends('layouts.app')

@section('title', 'Módulos')

@section('content')
    <div class="container">
        <div class="card mt-5">
            <h3 class="card-header p-3">Módulos</h3>
            <div class="card-body">
                <div class="mb-3">
                    <button id="createNewRecord" class="btn btn-success">Añadir Módulo</button>
                </div>
                <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nombre</th>
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
                        <input type="hidden" name="id_modulo" id="table_id">
                        <div class="form-group">
                            <label for="nombre" class="col-sm-12 control-label">Nombre</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="estado" class="col-sm-12 control-label">Estado</label>
                            <div class="col-sm-12">
                                <select class="form-control" id="estado" name="estado" required="">
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

    <!-- Pasar variables a JavaScript -->
    <script type="text/javascript">
        var URLindex = "{{ route('modulos.index') }}";
        var columnas = [
            {data: 'id_modulo', name: 'id_modulo'},
            {data: 'nombre', name: 'nombre'},
            {data: 'estado', name: 'estado'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ];
        var titulo = "Módulo";
    </script>

    <!-- Incluir el archivo crud.js -->
    <script src="{{ asset('js/custom/crud.js') }}"></script>
@endsection
