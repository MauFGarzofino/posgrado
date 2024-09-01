@extends('layouts.app')

@section('title', 'Personas')

@section('content')
    <div class="container">
        <div class="card mt-5">
            <h3 class="card-header p-3">Personas</h3>
            <div class="card-body">
                <div class="mb-3">
                    <button id="createNewRecord" class="btn btn-success">Añadir Persona</button>
                </div>
                <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Imagen</th>
                        <th>CI</th>
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
                        <input type="hidden" name="id_persona" id="table_id">
                        <div class="form-group">
                            <label for="nombres" class="col-sm-12 control-label">Nombres</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres" value="" maxlength="150" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="apellidos" class="col-sm-12 control-label">Apellidos</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" value="" maxlength="150" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="imagen" class="col-sm-12 control-label">URL de Imagen</label>
                            <div class="col-sm-12">
                                <input type="url" class="form-control" id="imagen" name="imagen" placeholder="https://example.com/imagen.jpg" maxlength="255">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ci" class="col-sm-12 control-label">CI</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="ci" name="ci" placeholder="CI" value="" maxlength="20" required="">
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
        var URLindex = "{{ route('personas.index') }}";
        var columnas = [
            {data: 'id_persona', name: 'id_persona'},
            {data: 'nombres', name: 'nombres'},
            {data: 'apellidos', name: 'apellidos'},
            {data: 'imagen', name: 'imagen', render: function(data, type, full, meta) {
                    return '<img src="'+data+'" alt="Imagen" height="50"/>';
                }},
            {data: 'ci', name: 'ci'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ];
        var titulo = "Persona";
    </script>

    <script src="{{ asset('js/custom/crud.js') }}"></script>
@endsection
