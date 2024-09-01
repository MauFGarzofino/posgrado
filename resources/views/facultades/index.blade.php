@extends('layouts.app')

@section('title', 'Facultades')

@section('content')
    <div class="container">
        <div class="card mt-5">
            <h3 class="card-header p-3">Facultades</h3>
            <div class="card-body">
                <div class="mb-3">
                    <button id="createNewRecord" class="btn btn-success">Añadir Facultad</button>
                </div>
                <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nombre</th>
                        <th>Nombre Abreviado</th>
                        <th>Área</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
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
                        <input type="hidden" name="id_facultad" id="table_id">
                        <div class="form-group">
                            <label for="id_area" class="col-sm-12 control-label">Área</label>
                            <div class="col-sm-12">
                                <select class="form-control" id="id_area" name="id_area" required="">
                                    @foreach($areas as $area)
                                        <option value="{{ $area->id_area }}">{{ $area->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nombre" class="col-sm-12 control-label">Nombre</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" maxlength="100" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nombre_abreviado" class="col-sm-12 control-label">Nombre Abreviado</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="nombre_abreviado" name="nombre_abreviado" placeholder="Nombre Abreviado" maxlength="50">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="direccion" class="col-sm-12 control-label">Dirección</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" maxlength="100">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="telefono" class="col-sm-12 control-label">Teléfono</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" maxlength="100">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="telefono_interno" class="col-sm-12 control-label">Teléfono Interno</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="telefono_interno" name="telefono_interno" placeholder="Teléfono Interno" maxlength="100">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="fax" class="col-sm-12 control-label">Fax</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="fax" name="fax" placeholder="Fax" maxlength="20">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-12 control-label">Email</label>
                            <div class="col-sm-12">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" maxlength="30">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="latitud" class="col-sm-12 control-label">Latitud</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="latitud" name="latitud" placeholder="Latitud" maxlength="25">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="longitud" class="col-sm-12 control-label">Longitud</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="longitud" name="longitud" placeholder="Longitud" maxlength="25">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="fecha_creacion" class="col-sm-12 control-label">Fecha de Creación</label>
                            <div class="col-sm-12">
                                <input type="date" class="form-control" id="fecha_creacion" name="fecha_creacion">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="escudo" class="col-sm-12 control-label">Escudo</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="escudo" name="escudo" placeholder="Escudo" maxlength="60">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="imagen" class="col-sm-12 control-label">Imagen</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="imagen" name="imagen" placeholder="Imagen" maxlength="60">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="estado_virtual" class="col-sm-12 control-label">Estado Virtual</label>
                            <div class="col-sm-12">
                                <select class="form-control" id="estado_virtual" name="estado_virtual">
                                    <option value="S">Activo</option>
                                    <option value="N">Inactivo</option>
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

    <!-- Pasar variables a JavaScript -->
    <script type="text/javascript">
        var URLindex = "{{ route('facultades.index') }}";
        var columnas = [
            {data: 'id_facultad', name: 'id_facultad'},
            {data: 'nombre', name: 'nombre'},
            {data: 'nombre_abreviado', name: 'nombre_abreviado'},
            {data: 'area', name: 'area.nombre'},
            {data: 'direccion', name: 'direccion'},
            {data: 'telefono', name: 'telefono'},
            {data: 'estado', name: 'estado'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ];
        var titulo = "Facultad";
    </script>

    <!-- Incluir el archivo crud.js -->
    <script src="{{ asset('js/custom/crud.js') }}"></script>
@endsection
