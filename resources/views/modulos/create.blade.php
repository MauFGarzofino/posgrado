<div>
    <h1>Crear Módulo</h1>
    <form method="POST" action="{{ route('modulos.store') }}">
        @csrf
        <div>
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" required>
        </div>
        <div>
            <label for="estado">Estado</label>
            <select id="estado" name="estado" required>
                <option value="S">Activo</option>
                <option value="N">Inactivo</option>
            </select>
        </div>
        <button type="submit">Crear</button>
    </form>
</div>
