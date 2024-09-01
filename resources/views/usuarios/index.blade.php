@extends('layouts.app')

@section('title', 'Usuarios')

@section('content')
    <div class="container">
        <div class="card mt-5">
            <h3 class="card-header p-3">Usuarios</h3>
            <div class="card-body">
                <div class="mb-3">
                    <button id="createNewRecord" class="btn btn-success">Añadir Usuario</button>
                </div>
                <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Persona</th>
                        <th>Rol</th>
                        <th>Username</th>
                        <th>Email</th>
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
                        <input type="hidden" name="id_usuario" id="table_id">
                        <div class="form-group">
                            <label for="id_persona" class="col-sm-12 control-label">Persona</label>
                            <div class="col-sm-12">
                                <select class="form-control" id="id_persona" name="id_persona" required="">
                                    @foreach($personas as $persona)
                                        <option value="{{ $persona->id_persona }}">{{ $persona->nombres }} {{ $persona->apellidos }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
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
                            <label for="username" class="col-sm-12 control-label">Username</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username" maxlength="100" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-12 control-label">Email</label> <!-- Add Email Input -->
                            <div class="col-sm-12">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" maxlength="150" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-sm-12 control-label">Password</label>
                            <div class="col-sm-12">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" minlength="6">
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
        var URLindex = "{{ route('usuarios.index') }}";
        var columnas = [
            {data: 'id_usuario', name: 'id_usuario'},
            {data: 'persona', name: 'persona.nombres'},
            {data: 'rol', name: 'rol.nombre'},
            {data: 'username', name: 'username'},
            {data: 'email', name: 'email'},
            {data: 'estado', name: 'estado'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ];
        var titulo = "Usuario";
    </script>

    <script src="{{ asset('js/custom/crud.js') }}"></script>
@endsection
