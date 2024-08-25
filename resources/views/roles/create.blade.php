<div>
    <h1>Crear Rol</h1>
    <form method="POST" action="{{ route('roles.store') }}">
        @csrf
        <div>
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" required>
        </div>

        <div>
            <label for="descripcion">Descripción</label>
            <input type="text" id="descripcion" name="descripcion">
        </div>

        <div>
            <label for="estado">Estado</label>
            <input type="text" id="estado" name="estado" value="S" required>
        </div>

        <button type="submit">Crear</button>
    </form>
</div>
