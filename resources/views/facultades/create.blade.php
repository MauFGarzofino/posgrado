<div>
    <h1>Crear Facultad</h1>
    <form method="POST" action="{{ route('facultades.store') }}">
        @csrf
        <div>
            <label for="id_area">Área</label>
            <select name="id_area" id="id_area" required>
                @foreach($areas as $area)
                    <option value="{{ $area->id_area }}">{{ $area->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" required>
        </div>

        <div>
            <label for="nombre_abreviado">Nombre Abreviado</label>
            <input type="text" id="nombre_abreviado" name="nombre_abreviado">
        </div>

        <div>
            <label for="direccion">Dirección</label>
            <input type="text" id="direccion" name="direccion">
        </div>

        <div>
            <label for="telefono">Teléfono</label>
            <input type="text" id="telefono" name="telefono">
        </div>

        <div>
            <label for="telefono_interno">Teléfono Interno</label>
            <input type="text" id="telefono_interno" name="telefono_interno">
        </div>

        <div>
            <label for="fax">Fax</label>
            <input type="text" id="fax" name="fax">
        </div>

        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email">
        </div>

        <div>
            <label for="latitud">Latitud</label>
            <input type="text" id="latitud" name="latitud">
        </div>

        <div>
            <label for="longitud">Longitud</label>
            <input type="text" id="longitud" name="longitud">
        </div>

        <div>
            <label for="fecha_creacion">Fecha de Creación</label>
            <input type="date" id="fecha_creacion" name="fecha_creacion">
        </div>

        <div>
            <label for="escudo">Escudo</label>
            <input type="text" id="escudo" name="escudo">
        </div>

        <div>
            <label for="imagen">Imagen</label>
            <input type="text" id="imagen" name="imagen">
        </div>

        <div>
            <label for="estado_virtual">Estado Virtual</label>
            <input type="text" id="estado_virtual" name="estado_virtual" maxlength="1" pattern="[SN]" title="Debe ser S o N" required>
        </div>

        <div>
            <label for="estado">Estado</label>
            <input type="text" id="estado" name="estado" value="S" maxlength="1" pattern="[SN]" title="Debe ser S o N" required>
        </div>

        <button type="submit">Crear</button>
    </form>
</div>
