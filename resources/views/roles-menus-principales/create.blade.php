<div>
    <h1>Asignar Rol a Menú Principal</h1>
    <form method="POST" action="{{ route('roles-menus-principales.store') }}">
        @csrf
        <div>
            <label for="id_rol">Rol</label>
            <select name="id_rol" id="id_rol" required>
                @foreach($roles as $rol)
                    <option value="{{ $rol->id_rol }}">{{ $rol->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="id_menu_principal">Menú Principal</label>
            <select name="id_menu_principal" id="id_menu_principal" required>
                @foreach($menusPrincipales as $menuPrincipal)
                    <option value="{{ $menuPrincipal->id_menu_principal }}">{{ $menuPrincipal->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="estado">Estado</label>
            <input type="text" id="estado" name="estado" value="S" required>
        </div>

        <button type="submit">Asignar</button>
    </form>
</div>
