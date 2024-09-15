@extends('layouts.app')

@section('title', 'Personas')

@section('content')
    <div class="container">
        <div class="card mt-5">
            <h3 class="card-header p-3">Personas</h3>
            <div class="card-body">
                <div class="mb-3 mt-2">
                    <button id="createNewRecord" class="btn btn-success">Añadir Persona</button>
                </div>
                <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombres</th>
                        <th>Materno</th>
                        <th>Paterno</th>
                        <th>Imagen</th>
                        <th>Número de Identificación</th>
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

                        <!-- Nombres -->
                        <div class="form-group">
                            <label for="nombres" class="col-sm-12 control-label">Nombres</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres" maxlength="65" required="">
                            </div>
                        </div>

                        <!-- Apellido Paterno -->
                        <div class="form-group">
                            <label for="paterno" class="col-sm-12 control-label">Apellido Paterno</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="paterno" name="paterno" placeholder="Apellido Paterno" maxlength="20" required="">
                            </div>
                        </div>

                        <!-- Apellido Materno -->
                        <div class="form-group">
                            <label for="materno" class="col-sm-12 control-label">Apellido Materno</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="materno" name="materno" placeholder="Apellido Materno" maxlength="20">
                            </div>
                        </div>

                        <!-- Número de Identificación -->
                        <div class="form-group">
                            <label for="numero_identificacion_personal" class="col-sm-12 control-label">Número de Identificación</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="numero_identificacion_personal" name="numero_identificacion_personal" maxlength="15" required="">
                            </div>
                        </div>

                        <!-- Localidad (-->
                        <div class="form-group">
                            <label for="id_localidad" class="col-sm-12 control-label">Localidad</label>
                            <div class="col-sm-12">
                                <select class="form-control" id="id_localidad" name="id_localidad" required="">
                                    @foreach($localidades as $localidad)
                                        <option value="{{ $localidad->id_localidad }}">
                                            {{ $localidad->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Emisión de Cédula -->
                        <div class="form-group">
                            <label for="id_emision_cedula" class="col-sm-12 control-label">Emisión de Cédula</label>
                            <div class="col-sm-12">
                                <select class="form-control" id="id_emision_cedula" name="id_emision_cedula" required="">
                                    @foreach($emisionCedulas as $cedulas)
                                        <option value="{{ $cedulas->id_emision_cedula }}">
                                            {{ $cedulas->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Sexo -->
                        <div class="form-group">
                            <label for="id_sexo" class="col-sm-12 control-label">Sexo</label>
                            <div class="col-sm-12">
                                <select class="form-control" id="id_sexo" name="id_sexo" required="">
                                    @foreach($sexos as $sexo)
                                        <option value="{{ $sexo->id_sexo }}">
                                            {{ $sexo->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Grupo Sanguíneo -->
                        <div class="form-group">
                            <label for="id_grupo_sanguineo" class="col-sm-12 control-label">Grupo Sanguíneo</label>
                            <div class="col-sm-12">
                                <select class="form-control" id="id_grupo_sanguineo" name="id_grupo_sanguineo" required="">
                                    @foreach($gruposSanguineos as $grupoSanguineo)
                                        <option value="{{ $grupoSanguineo->id_grupo_sanguineo }}">
                                            {{ $grupoSanguineo->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Fecha de Nacimiento -->
                        <div class="form-group">
                            <label for="fecha_nacimiento" class="col-sm-12 control-label">Fecha de Nacimiento</label>
                            <div class="col-sm-12">
                                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento">
                            </div>
                        </div>

                        <!-- Teléfonos -->
                        <div class="form-group">
                            <label for="telefono_celular" class="col-sm-12 control-label">Teléfono Celular</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="telefono_celular" name="telefono_celular" maxlength="12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="telefono_fijo" class="col-sm-12 control-label">Teléfono Fijo</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="telefono_fijo" name="telefono_fijo" maxlength="12">
                            </div>
                        </div>

                        <!-- Dirección y otros campos -->
                        <div class="form-group">
                            <label for="direccion" class="col-sm-12 control-label">Dirección</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="direccion" name="direccion" maxlength="60">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="latitud" class="col-sm-12 control-label">Latitud</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="latitud" name="latitud" maxlength="30">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="longitud" class="col-sm-12 control-label">Longitud</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="longitud" name="longitud" maxlength="30">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="zona" class="col-sm-12 control-label">Zona</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="zona" name="zona" maxlength="50">
                            </div>
                        </div>

                        <!-- Estado Civil -->
                        <div class="form-group">
                            <label for="id_estado_civil" class="col-sm-12 control-label">Estado Civil</label>
                            <div class="col-sm-12">
                                <select class="form-control" id="id_estado_civil" name="id_estado_civil" required="">
                                    @foreach($estadosCiviles as $estadoCivil)
                                        <option value="{{ $estadoCivil->id_estado_civil }}">
                                            {{ $estadoCivil->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label for="email" class="col-sm-12 control-label">Email</label>
                            <div class="col-sm-12">
                                <input type="email" class="form-control" id="email" name="email" maxlength="50">
                            </div>
                        </div>

                        <!-- Subir Imagen -->
                        <div class="form-group">
                            <label for="imagen" class="col-sm-12 control-label">Subir Imagen</label>
                            <div class="col-sm-12">
                                <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
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
            {data: 'materno', name: 'materno'},
            {data: 'paterno', name: 'paterno'},
            {data: 'fotografia', name: 'fotografia', render: function(data, type, full, meta) {
                    return '<img src="{{ asset("fotografias") }}/'+data+'" alt="Imagen" height="50"/>';
                }},
            {data: 'numero_identificacion_personal', name: 'numero_identificacion_personal'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ];
        var titulo = "Persona";
    </script>

    <script src="{{ asset('js/custom/crud.js') }}"></script>
@endsection
