<x-navigation-menu />
<div>
    <h1>Facultades</h1>
    <a href="{{ route('facultades.create') }}">Crear Facultad</a>

    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Área</th>
            <th>Nombre</th>
            <th>Nombre Abreviado</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($facultades as $facultad)
            <tr>
                <td>{{ $facultad->id_facultad }}</td>
                <td>{{ $facultad->area->nombre }}</td>
                <td>{{ $facultad->nombre }}</td>
                <td>{{ $facultad->nombre_abreviado }}</td>
                <td>{{ $facultad->estado }}</td>
                <td>
                    <a href="{{ route('facultades.edit', $facultad->id_facultad) }}">Editar</a>
                    <form method="POST" action="{{ route('facultades.destroy', $facultad->id_facultad) }}" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar esta facultad?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
