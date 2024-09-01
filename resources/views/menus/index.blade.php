@extends('layouts.app')

@section('title', 'Menús')

@section('content')
    <div class="container">
        <div class="card mt-5">
            <h3 class="card-header p-3">Menús</h3>
            <div class="card-body">
                <div class="mb-3">
                    <button id="createNewRecord" class="btn btn-success">Añadir Menú</button>
                </div>
                <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Menú Principal</th>
                        <th>Nombre</th>
                        <th>Directorio</th>
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
                        <input type="hidden" name="id_menu" id="table_id">
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
                            <label for="nombre" class="col-sm-12 control-label">Nombre</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" maxlength="250" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="directorio" class="col-sm-12 control-label">Directorio</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="directorio" name="directorio" placeholder="Directorio" maxlength="350" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="icono" class="col-sm-12 control-label">Ícono</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="icono" name="icono" placeholder="Ícono" maxlength="70">
                            </div>
                        </div>
                        <!-- Otros campos... -->
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var URLindex = "{{ route('menus.index') }}";
        var columnas = [
            {data: 'id_menu', name: 'id_menu'},
            {data: 'menu_principal', name: 'menuPrincipal.nombre'},
            {data: 'nombre', name: 'nombre'},
            {data: 'directorio', name: 'directorio'},
            {data: 'estado', name: 'estado'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ];
        var titulo = "Menú";
    </script>

    <script src="{{ asset('js/custom/crud.js') }}"></script>
@endsection
