<x-navigation-menu-roles />
<div>
    <h1>Lista de Roles y Menús Principales</h1>
    <a href="{{ route('roles-menus-principales.create') }}">Asignar Rol a Menú Principal</a>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Rol</th>
            <th>Menú Principal</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($rolesMenusPrincipales as $rolMenuPrincipal)
            <tr>
                <td>{{ $rolMenuPrincipal->id_rol_menu_principal }}</td>
                <td>{{ $rolMenuPrincipal->rol->nombre }}</td>
                <td>{{ $rolMenuPrincipal->menuPrincipal->nombre }}</td>
                <td>{{ $rolMenuPrincipal->estado }}</td>
                <td>
                    <a href="{{ route('roles-menus-principales.edit', $rolMenuPrincipal->id_rol_menu_principal) }}">Editar</a>
                    <form method="POST" action="{{ route('roles-menus-principales.destroy', $rolMenuPrincipal->id_rol_menu_principal) }}" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar esta asociación?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
