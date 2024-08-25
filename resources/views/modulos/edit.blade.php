<div>
    <h1>Editar Módulo</h1>
    <form method="POST" action="{{ route('modulos.update', $modulo->id_modulo) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" value="{{ $modulo->nombre }}" required>
        </div>
        <div>
            <label for="estado">Estado</label>
            <select id="estado" name="estado" required>
                <option value="S" @if($modulo->estado == 'S') selected @endif>Activo</option>
                <option value="N" @if($modulo->estado == 'N') selected @endif>Inactivo</option>
            </select>
        </div>
        <button type="submit">Actualizar</button>
    </form>
</div>
