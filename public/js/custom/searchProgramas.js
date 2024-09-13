document.addEventListener('DOMContentLoaded', function () {
    // Mostrar el modal para añadir un programa
    $('.btn-light').on('click', function () {
        $('#addProgramModal').modal('show');
    });

    // Manejar el envío del formulario para añadir un programa
    $('#addProgramForm').off('submit').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: crearProgramaUrl,
            type: 'POST',
            data: $(this).serialize(), // Serializar correctamente los datos
            success: function(response) {
                if (response.success) {
                    // Limpia el formulario y cierra el modal
                    $('#addProgramForm').trigger('reset');
                    $('#addProgramModal').modal('hide');

                    // Recargar la lista de programas
                    loadPrograms();
                    alert('Programa creado con éxito.');
                }
            },
            error: function(error) {
                console.error('Error al crear el programa:', error);
                alert('Error al crear el programa.');
            }
        });
    });

    // Función para recargar la lista de programas
    function loadPrograms() {
        $.get("/api/programas", function(data) {
            renderProgramsList(data.programas);
        });
    }

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

    function loadMaterias(programId) {
        $.get(`/api/programas/${programId}/materias`, function(data) {
            renderMateriasList(data.materias); // Llamada a la función que renderiza la lista de materias
        });
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
                            <button type="button" class="btn-close ms-2" aria-label="Close" data-docente-id="${docente.id_persona_docente}" data-materia-id="${materia.id_posgrado_materia}"></button>
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
                            <button type="button" class="btn btn-light rounded-circle d-flex justify-content-center align-items-center mb-2 open-assign-modal" data-materia-id="${materia.id_posgrado_materia}" style="width: 25px; height: 25px; border: 1px solid #ccc;">
                                <span style="font-size: 18px; font-weight: bold;">+</span>
                            </button>
                        </div>
                `;
            materiasList.appendChild(listItem);
        });

        // Agregar eventos de asignación y desasignación después de renderizar
        addAssignModalEvents();
        addDesassignEvents();
    }

    function addDesassignEvents() {
        document.querySelectorAll('.btn-close').forEach(button => {
            button.addEventListener('click', function () {
                const docenteId = button.getAttribute('data-docente-id');
                const materiaId = button.getAttribute('data-materia-id');

                if (confirm("¿Estás seguro de que quieres desasignar este docente de la materia?")) {
                    // Realizar la solicitud para desasignar el docente
                    fetch(`/api/materias/${materiaId}/docentes/${docenteId}`, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')  // Token CSRF para Laravel
                        }
                    })
                        .then(response => {
                            if (response.ok) {
                                alert('Docente desasignado correctamente');
                                // Recargar la lista de materias o remover el docente del DOM
                                loadMaterias(materiaId);  // Recargar la lista de materias
                            } else {
                                alert('Error al desasignar el docente');
                            }
                        })
                        .catch(error => {
                            console.error('Error al desasignar el docente:', error);
                            alert('Error al desasignar el docente');
                        });
                }
            });
        });
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
    $('#asignarDocenteForm').off('submit').on('submit', function(e) {
        e.preventDefault(); // Evita el envío estándar del formulario

        $.ajax({
            url: asignarDocenteUrl, // Usar la variable que contiene la URL de la ruta
            type: 'POST',
            data: $(this).serialize(), // Serializa los datos del formulario
            success: function(response) {
                if (response.success) {
                    // Limpia el formulario y cierra el modal
                    $('#asignarDocenteForm').trigger('reset');
                    $('#asignarDocenteModal').modal('hide');

                    // Actualiza las materias sin refrescar la página
                    const activeProgramId = $('.program-item.active').data('program-id');
                    if (activeProgramId) {
                        loadMaterias(activeProgramId); // Llama a una función para recargar las materias
                    }

                    alert('Docente asignado con éxito.');
                }
            },
            error: function(error) {
                console.log('Error:', error);
            }
        });
    });

});


