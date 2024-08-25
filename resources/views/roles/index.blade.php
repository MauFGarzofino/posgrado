<x-navigation-menu-roles />
<div>
    <h1>Lista de Roles</h1>
    <a href="{{ route('roles.create') }}">Crear Nuevo Rol</a>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($roles as $role)
            <tr>
                <td>{{ $role->id_rol }}</td>
                <td>{{ $role->nombre }}</td>
                <td>{{ $role->descripcion }}</td>
                <td>{{ $role->estado }}</td>
                <td>
                    <a href="{{ route('roles.edit', $role->id_rol) }}">Editar</a>
                    <form method="POST" action="{{ route('roles.destroy', $role->id_rol) }}" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar este rol?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
