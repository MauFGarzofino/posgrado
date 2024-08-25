<div>
    <h1>Crear Menú</h1>
    <form method="POST" action="{{ route('menus.store') }}">
        @csrf
        <div>
            <label for="id_menu_principal">Menú Principal</label>
            <select name="id_menu_principal" id="id_menu_principal" required>
                @foreach($menusPrincipales as $menuPrincipal)
                    <option value="{{ $menuPrincipal->id_menu_principal }}">{{ $menuPrincipal->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" required>
        </div>

        <div>
            <label for="directorio">Directorio</label>
            <input type="text" id="directorio" name="directorio" required>
        </div>

        <div>
            <label for="icono">Icono</label>
            <input type="text" id="icono" name="icono">
        </div>

        <div>
            <label for="imagen">Imagen</label>
            <input type="text" id="imagen" name="imagen">
        </div>

        <div>
            <label for="color">Color</label>
            <input type="text" id="color" name="color">
        </div>

        <div>
            <label for="orden">Orden</label>
            <input type="number" id="orden" name="orden">
        </div>

        <div>
            <label for="estado">Estado</label>
            <input type="text" id="estado" name="estado" value="S" required>
        </div>

        <button type="submit">Crear</button>
    </form>
</div>
