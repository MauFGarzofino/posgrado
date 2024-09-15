@extends('layouts.app')

@section('title', 'Configuraciones')

@section('content')
    <div class="container">
        <div class="card mt-5">
            <h3 class="card-header p-3">Configuraciones</h3>
            <div class="card-body">
                <div class="mb-3 mt-2">
                    <button id="createNewRecord" class="btn btn-success">Añadir Configuración</button>
                </div>
                <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Tipo</th>
                        <th>Descripción</th>
                        <th>Universidad</th>
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
                        <input type="hidden" name="id_configuracion" id="table_id">
                        <div class="form-group">
                            <label for="tipo" class="col-sm-12 control-label">Tipo</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="tipo" name="tipo" placeholder="Tipo" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="descripcion" class="col-sm-12 control-label">Descripción</label>
                            <div class="col-sm-12">
                                <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripción" maxlength="255" required=""></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="id_universidad" class="col-sm-12 control-label">Universidad</label>
                            <div class="col-sm-12">
                                <select class="form-control" id="id_universidad" name="id_universidad" required="">
                                    @foreach($universidades as $universidad)
                                        <option value="{{ $universidad->id_universidad }}">{{ $universidad->nombre }}</option>
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
        var URLindex = "{{ route('configuraciones.index') }}";
        var columnas = [
            {data: 'id_configuracion', name: 'id_configuracion'},
            {data: 'tipo', name: 'tipo'},
            {data: 'descripcion', name: 'descripcion'},
            {data: 'universidad', name: 'universidad.nombre'},
            {data: 'estado', name: 'estado'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ];
        var titulo = "Configuración";
    </script>

    <script src="{{ asset('js/custom/crud.js') }}"></script>
@endsection
