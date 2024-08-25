<div>
    <h1>Crear Configuración</h1>
    <form method="POST" action="{{ route('configuraciones.store') }}">
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
            <label for="tipo">Tipo</label>
            <input type="text" id="tipo" name="tipo" required>
        </div>

        <div>
            <label for="descripcion">Descripción</label>
            <textarea id="descripcion" name="descripcion"></textarea>
        </div>

        <div>
            <label for="estado">Estado</label>
            <input type="text" id="estado" name="estado" value="S" maxlength="1" pattern="[SN]" title="Debe ser S o N" required>
        </div>

        <button type="submit">Crear</button>
    </form>
</div>
