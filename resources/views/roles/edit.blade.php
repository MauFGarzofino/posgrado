<div>
    <h1>Editar Rol</h1>
    <form method="POST" action="{{ route('roles.update', $rol->id_rol) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" value="{{ $rol->nombre }}" required>
        </div>

        <div>
            <label for="descripcion">Descripción</label>
            <input type="text" id="descripcion" name="descripcion" value="{{ $rol->descripcion }}">
        </div>

        <div>
            <label for="estado">Estado</label>
            <input type="text" id="estado" name="estado" value="{{ $rol->estado }}" required>
        </div>

        <button type="submit">Actualizar</button>
    </form>
</div>
