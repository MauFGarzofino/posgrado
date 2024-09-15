@extends('layouts.app')

@section('title', 'Menús Principales')

@section('content')
    <div class="container">
        <div class="card mt-5">
            <h3 class="card-header p-3">Menús Principales</h3>
            <div class="card-body">
                <div class="mb-3 mt-2">
                    <button id="createNewRecord" class="btn btn-success">Añadir Menú Principal</button>
                </div>
                <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Módulo</th>
                        <th>Nombre</th>
                        <th>Icono</th>
                        <th>Orden</th>
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
                        <input type="hidden" name="id_menu_principal" id="table_id">
                        <div class="form-group">
                            <label for="id_modulo" class="col-sm-12 control-label">Módulo</label>
                            <div class="col-sm-12">
                                <select class="form-control" id="id_modulo" name="id_modulo" required="">
                                    @foreach($modulos as $modulo)
                                        <option value="{{ $modulo->id_modulo }}">{{ $modulo->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nombre" class="col-sm-12 control-label">Nombre</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" maxlength="250" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="icono" class="col-sm-12 control-label">Ícono</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="icono" name="icono" placeholder="Ícono" maxlength="70">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="orden" class="col-sm-12 control-label">Orden</label>
                            <div class="col-sm-12">
                                <input type="number" class="form-control" id="orden" name="orden" placeholder="Orden" maxlength="11">
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

    <script type="text/javascript">
        var URLindex = "{{ route('menus-principales.index') }}";
        var columnas = [
            {data: 'id_menu_principal', name: 'id_menu_principal'},
            {data: 'modulo', name: 'modulo.nombre'},
            {data: 'nombre', name: 'nombre'},
            {data: 'icono', name: 'icono'},
            {data: 'orden', name: 'orden'},
            {data: 'estado', name: 'estado'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ];
        var titulo = "Menú Principal";
    </script>

    <!-- Incluir el archivo crud.js -->
    <script src="{{ asset('js/custom/crud.js') }}"></script>
@endsection
