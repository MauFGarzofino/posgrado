<div>
    <h1>Editar Configuración</h1>
    <form method="POST" action="{{ route('configuraciones.update', $configuracion->id_configuracion) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="id_universidad">Universidad</label>
            <select name="id_universidad" id="id_universidad" required>
                @foreach($universidades as $universidad)
                    <option value="{{ $universidad->id_universidad }}" @if($configuracion->id_universidad == $universidad->id_universidad) selected @endif>{{ $universidad->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="tipo">Tipo</label>
            <input type="text" id="tipo" name="tipo" value="{{ $configuracion->tipo }}" required>
        </div>

        <div>
            <label for="descripcion">Descripción</label>
            <textarea id="descripcion" name="descripcion">{{ $configuracion->descripcion }}</textarea>
        </div>

        <div>
            <label for="estado">Estado</label>
            <input type="text" id="estado" name="estado" value="{{ $configuracion->estado }}" required>
        </div>

        <button type="submit">Actualizar</button>
    </form>
</div>
