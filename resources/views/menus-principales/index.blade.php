<x-navigation-menu-roles />
<div>
    <h1>Lista de Menús Principales</h1>
    <a href="{{ route('menus-principales.create') }}">Crear Nuevo Menú Principal</a>

    <table class="table table-striped table-hover">
        <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Módulo</th>
            <th>Nombre</th>
            <th>Icono</th>
            <th>Orden</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($menus_principales as $menu_principal)
            <tr>
                <td>{{ $menu_principal->id_menu_principal }}</td>
                <td>{{ $menu_principal->modulo->nombre }}</td>
                <td>{{ $menu_principal->nombre }}</td>
                <td>{{ $menu_principal->icono }}</td>
                <td>{{ $menu_principal->orden }}</td>
                <td>{{ $menu_principal->estado }}</td>
                <td>
                    <a href="{{ route('menus-principales.edit', $menu_principal->id_menu_principal) }}" class="btn btn-sm btn-primary">Editar</a>
                    <form action="{{ route('menus-principales.destroy', $menu_principal->id_menu_principal) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este menú principal?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
