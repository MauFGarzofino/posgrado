<x-navigation-menu />
<div>
    <h1>Configuraciones</h1>
    <a href="{{ route('configuraciones.create') }}">Crear Configuración</a>

    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Universidad</th>
            <th>Tipo</th>
            <th>Descripción</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($configuraciones as $configuracion)
            <tr>
                <td>{{ $configuracion->id_configuracion }}</td>
                <td>{{ $configuracion->universidad->nombre }}</td>
                <td>{{ $configuracion->tipo }}</td>
                <td>{{ $configuracion->descripcion }}</td>
                <td>{{ $configuracion->estado }}</td>
                <td>
                    <a href="{{ route('configuraciones.edit', $configuracion->id_configuracion) }}">Editar</a>
                    <form method="POST" action="{{ route('configuraciones.destroy', $configuracion->id_configuracion) }}" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar esta configuración?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
