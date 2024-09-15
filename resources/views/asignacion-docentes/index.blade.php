@extends('layouts.app')

@section('title', 'Programas de Posgrado')

@section('content')
    <div class="container-lg mt-5">
        <div class="row">
            <!-- Columna Izquierda: Postgrado -->
            <div class="col-lg-6">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="text-dark">Postgrado</h2>
                </div>
                <div class="input-group mb-3">
                    <!-- Search -->
                    <input type="text" id="search-programas-input" placeholder="Search" class="form-control mr-1">
                    <!-- Add Program button -->
                    <button id="addProgramButton" class="btn btn-light d-flex align-items-center">
                        <span>+</span> Add Program
                    </button>
                </div>
                <ul id="programasList" class="list-group">
                    @foreach($programas as $programa)
                        <li class="list-group-item bg-light rounded border program-item mb-2"
                            data-program-id="{{ $programa->id_posgrado_programa }}">
                            {{ $programa->nombre }}
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Columna Derecha: Materias -->
            <div class="col-lg-6">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="text-dark">Materias</h2>
                </div>
                <div class="input-group mb-3">
                    <!-- Search-->
                    <input type="text" id="search-materias-input" placeholder="Search" class="form-control mr-1">
                    <!-- Add Subject Button -->
                    <button id="addSubjectButton" class="btn btn-light d-flex align-items-center">
                        <span>+</span> Add Subject
                    </button>
                </div>
                <ul id="materiasList" class="list-group">
                    <!-- Materias -->
                </ul>
            </div>
        </div>
        <div id="messageContainer" class="position-fixed top-0 end-0 p-3" style="z-index: 1100;"></div>
    </div>

    <!-- Modal para asignar docente -->
    <div class="modal fade" id="asignarDocenteModal" tabindex="-1" aria-labelledby="asignarDocenteLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="asignarDocenteForm" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="asignarDocenteLabel">Asignar Docente</h5>
                    </div>
                    <div class="modal-body">
                        <!-- Mensaje de error -->
                        <div id="asignarDocenteError" class="alert alert-danger d-none" role="alert"></div>

                        <input type="hidden" id="materiaId" name="materia_id">

                        <!-- Campo para seleccionar el docente -->
                        <div class="mb-3">
                            <label for="docenteSelect" class="form-label">Seleccione un Docente</label>
                            <select class="form-control" id="docenteSelect" name="docente_id" required>
                                @foreach($docentes as $docente)
                                    <option value="{{ $docente->id_persona_docente }}">
                                        {{ $docente->persona->nombres }} {{ $docente->persona->paterno }} {{ $docente->persona->materno }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Campo para seleccionar la gestión -->
                        <div class="mb-3">
                            <label for="gestionSelect" class="form-label">Seleccione la Gestión</label>
                            <select class="form-control" id="gestionPeriodoSelect" name="id_gestion_periodo">
                                @foreach($gestionesPeriodos as $gestion)
                                    <option value="{{ $gestion->id_gestion_periodo }}">
                                        {{ $gestion->gestion }} - {{ $gestion->periodo }} ({{ $gestion->tipo === 'A' ? 'Anual' : 'Semestral' }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Campo para seleccionar el tipo de evaluación -->
                        <div class="mb-3">
                            <label for="tipoEvaluacionSelect" class="form-label">Seleccione Tipo de Evaluación</label>
                            <select class="form-control" id="tipoEvaluacionSelect" name="id_posgrado_tipo_evaluacion_nota" required>
                                @foreach($tiposEvaluacion as $tipo)
                                    <option value="{{ $tipo->id_posgrado_tipo_evaluacion_nota }}">
                                        {{ $tipo->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Campo para grupo -->
                        <div class="mb-3">
                            <label for="grupoInput" class="form-label">Grupo</label>
                            <input type="text" class="form-control" id="grupoInput" name="grupo" required>
                        </div>

                        <!-- Campo para cupo máximo de estudiantes -->
                        <div class="mb-3">
                            <label for="cupoMaximoInput" class="form-label">Cupo Máximo de Estudiantes</label>
                            <input type="number" class="form-control" id="cupoMaximoInput" name="cupo_maximo_estudiante" required min="1">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Asignar Docente</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal para añadir un nuevo programa -->
    <div class="modal fade" id="addProgramModal" tabindex="-1" aria-labelledby="addProgramLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="addProgramForm">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addProgramLabel">Añadir Nuevo Programa</h5>
                    </div>
                    <div class="modal-body">
                        <!-- Nombre del programa -->
                        <div class="mb-3">
                            <label for="nombrePrograma" class="form-label">Nombre del Programa</label>
                            <input type="text" class="form-control" id="nombrePrograma" name="nombre" required>
                        </div>

                        <!-- Nivel Académico -->
                        <div class="mb-3">
                            <label for="nivelAcademicoSelect" class="form-label">Nivel Académico</label>
                            <select class="form-control" id="nivelAcademicoSelect" name="id_nivel_academico" required>
                                @foreach($nivelesAcademicos as $nivel)
                                    <option value="{{ $nivel->id_nivel_academico }}">{{ $nivel->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Carrera -->
                        <div class="mb-3">
                            <label for="carreraSelect" class="form-label">Carrera</label>
                            <select class="form-control" id="carreraSelect" name="id_carrera" required>
                                @foreach($carreras as $carrera)
                                    <option value="{{ $carrera->id_carrera }}">{{ $carrera->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Modalidad -->
                        <div class="mb-3">
                            <label for="modalidadSelect" class="form-label">Modalidad</label>
                            <select class="form-control" id="modalidadSelect" name="id_modalidad" required>
                                @foreach($modalidades as $modalidad)
                                    <option value="{{ $modalidad->id_modalidad }}">{{ $modalidad->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Gestión -->
                        <div class="mb-3">
                            <label for="gestionInput" class="form-label">Gestión</label>
                            <input type="number" class="form-control" id="gestionInput" name="gestion" value="{{ date('Y') }}" required>
                        </div>

                        <!-- Fechas -->
                        <div class="mb-3">
                            <label for="fechaInicio" class="form-label">Fecha de Inicio</label>
                            <input type="date" class="form-control" id="fechaInicio" name="fecha_inicio" value="{{ date('Y-m-d') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="fechaFin" class="form-label">Fecha de Fin</label>
                            <input type="date" class="form-control" id="fechaFin" name="fecha_fin" value="{{ date('Y-m-d', strtotime('+1 year')) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="fechaInicioInscripcion" class="form-label">Fecha de Inicio de Inscripción</label>
                            <input type="date" class="form-control" id="fechaInicioInscripcion" name="fecha_inicio_inscrito" value="{{ date('Y-m-d') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="fechaFinInscripcion" class="form-label">Fecha de Fin de Inscripción</label>
                            <input type="date" class="form-control" id="fechaFinInscripcion" name="fecha_fin_inscrito" value="{{ date('Y-m-d', strtotime('+3 months')) }}" required>
                        </div>

                        <!-- Otros campos -->
                        <div class="mb-3">
                            <label for="numeroCuotas" class="form-label">Número máximo de cuotas</label>
                            <input type="number" class="form-control" id="numeroCuotas" name="numero_max_cuotas" value="12" required>
                        </div>

                        <div class="mb-3">
                            <label for="costoTotal" class="form-label">Costo Total</label>
                            <input type="number" class="form-control" id="costoTotal" name="costo_total" value="5000" required>
                        </div>

                        <div class="mb-3">
                            <label for="estadoPrograma" class="form-label">Estado</label>
                            <select class="form-control" id="estadoPrograma" name="estado" required>
                                <option value="A">Activo</option>
                                <option value="I">Inactivo</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar Programa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal para crear una nueva materia -->
    <div class="modal fade" id="addMateriaModal" tabindex="-1" aria-labelledby="addMateriaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addMateriaModalLabel">Añadir Materia</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addMateriaForm">
                        <div class="form-group mb-3">
                            <label for="programaMateria" class="form-label">Programa</label>
                            <select class="form-select" id="programaMateria" name="id_posgrado_programa" required>
                                <!-- Las opciones de programas se cargarán dinámicamente -->
                            </select>
                        </div>
                        <!-- Nombre -->
                        <div class="form-group mb-3">
                            <label for="nombreMateria" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombreMateria" name="nombre" required>
                        </div>

                        <!-- Sigla -->
                        <div class="form-group mb-3">
                            <label for="siglaMateria" class="form-label">Sigla</label>
                            <input type="text" class="form-control" id="siglaMateria" name="sigla" required>
                        </div>

                        <!-- Nivel -->
                        <div class="form-group mb-3">
                            <label for="nivelMateria" class="form-label">Nivel</label>
                            <select class="form-select" id="nivelMateria" name="id_posgrado_nivel" required>
                                @foreach($niveles as $nivel)
                                    <option value="{{ $nivel->id_posgrado_nivel }}">{{ $nivel->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Horas Teóricas -->
                        <div class="form-group mb-3">
                            <label for="cantidadHoraTeorica" class="form-label">Horas Teóricas</label>
                            <input type="number" class="form-control" id="cantidadHoraTeorica" name="cantidad_hora_teorica" value="0">
                        </div>

                        <!-- Horas Prácticas -->
                        <div class="form-group mb-3">
                            <label for="cantidadHoraPractica" class="form-label">Horas Prácticas</label>
                            <input type="number" class="form-control" id="cantidadHoraPractica" name="cantidad_hora_practica" value="0">
                        </div>

                        <div class="form-group mb-3">
                            <label for="imagenMateria" class="form-label">Imagen</label>
                            <input type="file" class="form-control" id="imagenMateria" name="imagen" accept="image/*">
                        </div>

                        <!-- Estado -->
                        <div class="form-group mb-3">
                            <label for="estadoMateria" class="form-label">Estado</label>
                            <select class="form-select" id="estadoMateria" name="estado" required>
                                <option value="S">Activo</option>
                                <option value="N">Inactivo</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Crear Materia</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal de confirmación -->
    <div class="modal fade" id="confirmDesasignarDocenteModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Confirmar desasignación</h5>
                </div>
                <div class="modal-body">
                    <!-- Docente y Materia -->
                    ¿Estás seguro de que deseas desasignar a <strong id="docenteNombre"></strong> de la materia <strong id="materiaNombre"></strong>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" id="confirmDesasignarBtn">Desasignar</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        var asignarDocenteUrl = "{{ route('asignar.docente') }}";
        var crearProgramaUrl = "{{ route('posgrado.programas.store') }}";
        var defaultImageUrl = "{{ asset('fotografias/default.jpg') }}";
        var baseImageUrl = "{{ asset('fotografias') }}";
        var baseSubjectImageUrl = "{{ asset('materias_imagenes') }}";
        var defaultSubjectImageUrl = "{{ asset('materias_imagenes/default.png') }}";
    </script>
    <script src="{{ asset('js/custom/utils.js') }}"></script>
    <script src="{{ asset('js/custom/programas.js') }}"></script>
    <script src="{{ asset('js/custom/materias.js') }}"></script>
    <script src="{{ asset('js/custom/docentes.js') }}"></script>
@endsection

<style>
    .program-item {
        transition: all 0.1s ease-in-out;
    }

    .program-item:hover {
        background-color: #f0f0f0 !important;
        transform: scale(1.02);
        cursor: pointer;
    }

    .program-item.active, .program-item:active {
        background-color: #000 !important;
        color: #fff !important;
    }
</style>
