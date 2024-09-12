@extends('layouts.app')

@section('title', 'Programas de Posgrado')

@section('content')
    <div class="container-lg mt-5">
        <div class="row">
            <!-- Left column: Postgrado -->
            <div class="col-lg-6">
                <h2 class="text-dark">Postgrado</h2>
                <input type="text" id="search-programas-input" placeholder="Search" class="form-control mb-3">
                <div>
                    <ul id="programasList" class="list-group">
                        @foreach($programas as $programa)
                            <li class="list-group-item bg-light rounded border program-item mb-2"
                                data-program-id="{{ $programa->id_posgrado_programa }}">
                                {{ $programa->nombre }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Right column: Materias -->
            <div class="col-lg-6">
                <h2 class="text-dark">Materias</h2>
                <input type="text" id="search-materias-input" placeholder="Search" class="form-control mb-3">
                    <ul id="materiasList" class="list-group">
                        <!-- Materias -->
                    </ul>
            </div>
        </div>
    </div>

    <!-- Modal para asignar docente -->
    <div class="modal fade" id="asignarDocenteModal" tabindex="-1" aria-labelledby="asignarDocenteLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="asignarDocenteForm" method="POST" action="{{ route('asignar.docente') }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="asignarDocenteLabel">Asignar Docente</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="materiaId" name="materia_id">
                        <div class="mb-3">
                            <label for="docenteSelect" class="form-label">Seleccione un Docente</label>
                            <select class="form-control" id="docenteSelect" name="docente_id">
                                @foreach($docentes as $docente)
                                    <option value="{{ $docente->id_persona_docente }}">
                                        {{ $docente->persona->nombres }} {{ $docente->persona->apellidos }}
                                    </option>
                                @endforeach
                            </select>
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


    <script src="{{ asset('js/custom/searchProgramas.js') }}"></script>
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
