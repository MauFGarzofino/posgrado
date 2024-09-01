@extends('layouts.app')

@section('title', 'Roles Menús Principales')

@section('content')
    <div class="container">
        <div class="card mt-5">
            <h3 class="card-header p-3">Roles Menús Principales</h3>
            <div class="card-body">
                <div class="mb-3">
                    <button id="createNewRecord" class="btn btn-success">Añadir Asociación</button>
                </div>
                <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Rol</th>
                        <th>Menú Principal</th>
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
                        <input type="hidden" name="id_rol_menu_principal" id="table_id">
                        <div class="form-group">
                            <label for="id_rol" class="col-sm-12 control-label">Rol</label>
                            <div class="col-sm-12">
                                <select class="form-control" id="id_rol" name="id_rol" required="">
                                    @foreach($roles as $rol)
                                        <option value="{{ $rol->id_rol }}">{{ $rol->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="id_menu_principal" class="col-sm-12 control-label">Menú Principal</label>
                            <div class="col-sm-12">
                                <select class="form-control" id="id_menu_principal" name="id_menu_principal" required="">
                                    @foreach($menusPrincipales as $menuPrincipal)
                                        <option value="{{ $menuPrincipal->id_menu_principal }}">{{ $menuPrincipal->nombre }}</option>
                                    @endforeach
                                </select>
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
        var URLindex = "{{ route('roles-menus-principales.index') }}";
        var columnas = [
            {data: 'id_rol_menu_principal', name: 'id_rol_menu_principal'},
            {data: 'rol', name: 'rol.nombre'},
            {data: 'menu_principal', name: 'menuPrincipal.nombre'},
            {data: 'estado', name: 'estado'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ];
        var titulo = "Rol Menú Principal";
    </script>

    <script src="{{ asset('js/custom/crud.js') }}"></script>
@endsection
