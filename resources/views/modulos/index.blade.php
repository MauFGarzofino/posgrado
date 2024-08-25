<x-navigation-menu-roles />
<div>
    <h1>Lista de Módulos</h1>
    <a href="{{ route('modulos.create') }}">Crear Nuevo Módulo</a>

    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($modulos as $modulo)
            <tr>
                <td>{{ $modulo->id_modulo }}</td>
                <td>{{ $modulo->nombre }}</td>
                <td>{{ $modulo->estado }}</td>
                <td>
                    <a href="{{ route('modulos.edit', $modulo->id_modulo) }}">Editar</a>
                    <form action="{{ route('modulos.destroy', $modulo->id_modulo) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar este módulo?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
