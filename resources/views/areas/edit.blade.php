<div>
    <h1>Editar Área</h1>
    <form method="POST" action="{{ route('areas.update', $area->id_area) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="id_universidad">Universidad</label>
            <select name="id_universidad" id="id_universidad" required>
                @foreach($universidades as $universidad)
                    <option value="{{ $universidad->id_universidad }}" @if($area->id_universidad == $universidad->id_universidad) selected @endif>{{ $universidad->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" value="{{ $area->nombre }}" required>
        </div>

        <div>
            <label for="nombre_abreviado">Nombre Abreviado</label>
            <input type="text" id="nombre_abreviado" name="nombre_abreviado" value="{{ $area->nombre_abreviado }}" required>
        </div>

        <div>
            <label for="estado">Estado</label>
            <input type="text" id="estado" name="estado" value="{{ $arae->estado }}" maxlength="1" pattern="[SN]" title="Debe ser S o N" required>
        </div>

        <button type="submit">Actualizar</button>
    </form>
</div>
