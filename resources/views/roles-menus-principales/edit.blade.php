<div>
    <h1>Editar Asociación de Rol y Menú Principal</h1>
    <form method="POST" action="{{ route('roles-menus-principales.update', $rolMenuPrincipal->id_rol_menu_principal) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="id_rol">Rol</label>
            <select name="id_rol" id="id_rol" required>
                @foreach($roles as $rol)
                    <option value="{{ $rol->id_rol }}" @if($rolMenuPrincipal->id_rol == $rol->id_rol) selected @endif>{{ $rol->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="id_menu_principal">Menú Principal</label>
            <select name="id_menu_principal" id="id_menu_principal" required>
                @foreach($menusPrincipales as $menuPrincipal)
                    <option value="{{ $menuPrincipal->id_menu_principal }}" @if($rolMenuPrincipal->id_menu_principal == $menuPrincipal->id_menu_principal) selected @endif>{{ $menuPrincipal->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="estado">Estado</label>
            <input type="text" id="estado" name="estado" value="{{ $rolMenuPrincipal->estado }}" required>
        </div>

        <button type="submit">Actualizar</button>
    </form>
</div>
