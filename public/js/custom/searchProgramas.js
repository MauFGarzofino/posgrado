document.addEventListener('DOMContentLoaded', function () {
    // Función de debounce reutilizable
    function applyDebounce(func, delay = 300) {
        let timeout;
        return (...args) => {
            clearTimeout(timeout);
            timeout = setTimeout(() => func.apply(this, args), delay);
        };
    }

    // Función para realizar la búsqueda de programas
    function searchPrograms(searchTerm) {
        fetch(`/api/programas/search?query=${searchTerm}`)
            .then(response => response.json())
            .then(data => renderProgramsList(data))
            .catch(error => console.error('Error en la búsqueda de programas:', error));
    }

    // Función para realizar la búsqueda de materias
    function searchMaterias(searchTerm) {
        const activeProgramId = document.querySelector('.program-item.active')?.dataset?.programId;
        if (!activeProgramId) return;

        fetch(`/api/programas/${activeProgramId}/materias/search?query=${searchTerm}`)
            .then(response => response.json())
            .then(data => renderMateriasList(data.materias))
            .catch(error => console.error('Error en la búsqueda de materias:', error));
    }


    // Función para renderizar la lista de programas
    function renderProgramsList(programs) {
        const programasList = document.getElementById('programasList');
        programasList.innerHTML = '';  // Limpiar la lista
        programs.forEach(programa => {
            const listItem = document.createElement('li');
            listItem.classList.add('list-group-item', 'bg-light', 'rounded', 'border', 'program-item', 'mb-2');
            listItem.textContent = programa.nombre;
            listItem.dataset.programId = programa.id_posgrado_programa;
            programasList.appendChild(listItem);
        });
    }

    // Función para obtener y renderizar materias
    function loadMaterias(programId) {
        fetch(`/api/programas/${programId}/materias`)
            .then(response => response.json())
            .then(data => renderMateriasList(data.materias))
            .catch(error => console.error('Error al obtener las materias:', error));
    }

    // Función para renderizar la lista de materias
    function renderMateriasList(materias) {
        const materiasList = document.getElementById('materiasList');
        materiasList.innerHTML = '';  // Limpiar la lista de materias
        materias.forEach(materia => {
            const listItem = document.createElement('li');
            listItem.classList.add('list-group-item', 'bg-white', 'mb-2');

            // Renderizar la lista de docentes asignados
            let docentesHtml = '';
            if (materia.docentes.length > 0) {
                materia.docentes.forEach(docente => {
                    const persona = docente.persona;  // Acceder a los datos de la persona asociada al docente
                    docentesHtml += `
                        <span class="badge rounded-pill bg-light text-dark d-flex align-items-center p-2 me-2 mb-2">
                            <img src="${persona.imagen || 'https://via.placeholder.com/24'}" class="rounded-circle me-2" alt="User Image" style="width: 24px; height: 24px;">
                            ${persona.nombres} ${persona.apellidos}
                        </span>
                    `;
                });
            } else {
                docentesHtml = `<p></p>`;
            }

            listItem.innerHTML = `
    <div class="d-flex align-items-center mb-2">
        <img src="https://cdn-icons-png.flaticon.com/512/272/272412.png" alt="Icon" style="width: 32px; height: 32px;" class="me-2">
        <div>
            <h5 class="mb-0">${materia.nombre}</h5>
            <p class="mb-0 text-muted">${materia.sigla}</p>
        </div>
    </div>
    <div class="d-flex flex-wrap align-items-center mt-2">
        ${docentesHtml}
        <button type="button" class="btn btn-light rounded-circle d-flex justify-content-center align-items-center mb-2 open-assign-modal" data-materia-id="${materia.id_posgrado_materia}" style="width: 35px; height: 35px; border: 1px solid #ccc;">
            <span style="font-size: 18px; font-weight: bold;">+</span>
        </button>
    </div>
`;

            materiasList.appendChild(listItem);
        });

        // Agregar eventos de clic para los botones de asignación
        addAssignModalEvents();
    }

    // Función para agregar eventos a los botones de asignación
    function addAssignModalEvents() {
        const asignarDocenteModal = new bootstrap.Modal(document.getElementById('asignarDocenteModal'));
        const materiaIdInput = document.getElementById('materiaId');  // Campo oculto para el ID de la materia

        // Agregar eventos a los botones de asignación (+)
        document.querySelectorAll('.open-assign-modal').forEach(button => {
            button.addEventListener('click', function () {
                const materiaId = button.getAttribute('data-materia-id');  // Obtener el ID de la materia del botón
                materiaIdInput.value = materiaId;  // Establecer el ID de la materia en el campo oculto del modal
                asignarDocenteModal.show();  // Mostrar el modal
            });
        });
    }

// Aplicar debounce en los buscadores
    const debouncedSearchPrograms = applyDebounce((event) => {
        const searchTerm = event.target.value.trim();
        if (searchTerm.length > 0) {
            searchPrograms(searchTerm);
        }
    });

    const debouncedSearchMaterias = applyDebounce((event) => {
        const searchTerm = event.target.value.trim();
        if (searchTerm.length > 0) {
            searchMaterias(searchTerm);  // Usar la nueva ruta para búsqueda de materias
        } else {
            const activeProgramId = document.querySelector('.program-item.active')?.dataset?.programId;
            if (activeProgramId) loadMaterias(activeProgramId);
        }
    });

// Event listeners para los buscadores
    document.getElementById('search-programas-input').addEventListener('input', debouncedSearchPrograms);
    document.getElementById('search-materias-input').addEventListener('input', debouncedSearchMaterias);

    // Event Listener para manejar el clic en un programa
    const programasList = document.getElementById('programasList');
    programasList.addEventListener('click', function (event) {
        const clickedProgram = event.target;

        if (clickedProgram.classList.contains('program-item')) {
            document.querySelectorAll('.program-item').forEach(item => item.classList.remove('active'));
            clickedProgram.classList.add('active');
            const programId = clickedProgram.dataset.programId;
            loadMaterias(programId);  // Cargar y mostrar las materias
        }
    });
});
