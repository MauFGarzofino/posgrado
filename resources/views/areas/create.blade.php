<div>
    <h1>Crear Área</h1>
    <form method="POST" action="{{ route('areas.store') }}">
        @csrf
        <div>
            <label for="id_universidad">Universidad</label>
            <select name="id_universidad" id="id_universidad" required>
                @foreach($universidades as $universidad)
                    <option value="{{ $universidad->id_universidad }}">{{ $universidad->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" required>
        </div>

        <div>
            <label for="nombre_abreviado">Nombre Abreviado</label>
            <input type="text" id="nombre_abreviado" name="nombre_abreviado" required>
        </div>

        <div>
            <label for="estado">Estado</label>
            <input type="text" id="estado" name="estado" value="S" maxlength="1" pattern="[SN]" title="Debe ser S o N" required>
        </div>

        <button type="submit">Crear</button>
    </form>
</div>
