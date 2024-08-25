<div>
    <h1>Crear Menú Principal</h1>
    <form method="POST" action="{{ route('menus-principales.store') }}">
        @csrf
        <div>
            <label for="id_modulo">Módulo</label>
            <select name="id_modulo" id="id_modulo" required>
                @foreach($modulos as $modulo)
                    <option value="{{ $modulo->id_modulo }}">{{ $modulo->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" required>
        </div>
        <div>
            <label for="icono">Icono</label>
            <input type="text" id="icono" name="icono">
        </div>
        <div>
            <label for="orden">Orden</label>
            <input type="number" id="orden" name="orden">
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
