<div>
    <h1>Editar Menú Principal</h1>
    <form method="POST" action="{{ route('menus-principales.update', $menu_principal->id_menu_principal) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="id_modulo">Módulo</label>
            <select name="id_modulo" id="id_modulo" required>
                @foreach($modulos as $modulo)
                    <option value="{{ $modulo->id_modulo }}" @if($menu_principal->id_modulo == $modulo->id_modulo) selected @endif>{{ $modulo->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" value="{{ $menu_principal->nombre }}" required>
        </div>
        <div>
            <label for="icono">Icono</label>
            <input type="text" id="icono" name="icono" value="{{ $menu_principal->icono }}">
        </div>
        <div>
            <label for="orden">Orden</label>
            <input type="number" id="orden" name="orden" value="{{ $menu_principal->orden }}">
        </div>
        <div>
            <label for="estado">Estado</label>
            <select id="estado" name="estado" required>
                <option value="S" @if($menu_principal->estado == 'S') selected @endif>Activo</option>
                <option value="N" @if($menu_principal->estado == 'N') selected @endif>Inactivo</option>
            </select>
        </div>
        <button type="submit">Actualizar</button>
    </form>
</div>
