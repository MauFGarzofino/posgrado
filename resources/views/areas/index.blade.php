<x-navigation-menu />
<div>
    <h1>Áreas</h1>
    <a href="{{ route('areas.create') }}">Crear Área</a>

    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Universidad</th>
            <th>Nombre</th>
            <th>Nombre Abreviado</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($areas as $area)
            <tr>
                <td>{{ $area->id_area }}</td>
                <td>{{ $area->universidad->nombre }}</td>
                <td>{{ $area->nombre }}</td>
                <td>{{ $area->nombre_abreviado }}</td>
                <td>{{ $area->estado }}</td>
                <td>
                    <a href="{{ route('areas.edit', $area->id_area) }}">Editar</a>
                    <form method="POST" action="{{ route('areas.destroy', $area->id_area) }}" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar esta área?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
