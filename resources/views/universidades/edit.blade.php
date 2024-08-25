<div>
    <form method="POST" action="{{ route('universidades.update', $universidad->id_universidad) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" value="{{ $universidad->nombre }}" required>
        </div>

        <div>
            <label for="nombre_abreviado">Nombre Abreviado</label>
            <input type="text" id="nombre_abreviado" name="nombre_abreviado" value="{{ $universidad->nombre_abreviado }}" required>
        </div>

        <div>
            <label for="inicial">Inicial</label>
            <input type="text" id="inicial" name="inicial" value="{{ $universidad->inicial }}" required>
        </div>

        <div>
            <label for="estado">Estado</label>
            <input type="text" id="estado" name="estado" value="{{ $universidad->estado }}" required>
        </div>

        <button type="submit">
            Confirmar
        </button>
    </form>
</div>
