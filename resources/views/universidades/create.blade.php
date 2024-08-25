<div>
    <form method="POST" action="{{ route('universidades.store') }}">
        @csrf
        <div>
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" required>
        </div>

        <div>
            <label for="nombre_abreviado">Nombre Abreviado</label>
            <input type="text" id="nombre_abreviado" name="nombre_abreviado" required>
        </div>

        <div>
            <label for="inicial">Inicial</label>
            <input type="text" id="inicial" name="inicial" required>
        </div>

        <div>
            <label for="estado">Estado</label>
            <input type="text" id="estado" name="estado" required>
        </div>

        <button type="submit">
            Crear
        </button>
    </form>
</div>
