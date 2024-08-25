<div>
    <h1>Editar Menú</h1>
    <form method="POST" action="{{ route('menus.update', $menu->id_menu) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="id_menu_principal">Menú Principal</label>
            <select name="id_menu_principal" id="id_menu_principal" required>
                @foreach($menusPrincipales as $menuPrincipal)
                    <option value="{{ $menuPrincipal->id_menu_principal }}" @if($menu->id_menu_principal == $menuPrincipal->id_menu_principal) selected @endif>{{ $menuPrincipal->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" value="{{ $menu->nombre }}" required>
        </div>

        <div>
            <label for="directorio">Directorio</label>
            <input type="text" id="directorio" name="directorio" value="{{ $menu->directorio }}" required>
        </div>

        <div>
            <label for="icono">Icono</label>
            <input type="text" id="icono" name="icono" value="{{ $menu->icono }}">
        </div>

        <div>
            <label for="imagen">Imagen</label>
            <input type="text" id="imagen" name="imagen" value="{{ $menu->imagen }}">
        </div>

        <div>
            <label for="color">Color</label>
            <input type="text" id="color" name="color" value="{{ $menu->color }}">
        </div>

        <div>
            <label for="orden">Orden</label>
            <input type="number" id="orden" name="orden" value="{{ $menu->orden }}">
        </div>

        <div>
            <label for="estado">Estado</label>
            <input type="text" id="estado" name="estado" value="{{ $menu->estado }}" required>
        </div>

        <button type="submit">Actualizar</button>
    </form>
</div>
