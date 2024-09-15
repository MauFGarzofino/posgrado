document.getElementById('addSubjectButton').addEventListener('click', function () {
    const selectPrograma = document.getElementById('programaMateria');
    const activeProgramId = document.querySelector('.program-item.active')?.dataset?.programId;

    // Limpiar las opciones del select de programas
    selectPrograma.innerHTML = '';

    // Si hay un programa activo, cargarlo como opción preseleccionada
    if (activeProgramId) {
        const activeProgramName = document.querySelector('.program-item.active').textContent;
        const option = document.createElement('option');
        option.value = activeProgramId;
        option.textContent = activeProgramName;
        option.selected = true;
        selectPrograma.appendChild(option);
    }

    // Cargar todos los programas si no hay ninguno activo o como opciones adicionales
    fetch('/api/programas')
        .then(response => response.json())
        .then(data => {
            data.programas.forEach(programa => {
                const option = document.createElement('option');
                option.value = programa.id_posgrado_programa;
                option.textContent = programa.nombre;

                // Si no hay programa activo, seleccionar el primero
                if (!activeProgramId && selectPrograma.options.length === 0) {
                    option.selected = true;
                }

                // No duplicar la opción si ya está el programa activo cargado
                if (!activeProgramId || programa.id_posgrado_programa !== activeProgramId) {
                    selectPrograma.appendChild(option);
                }
            });
        })
        .catch(error => console.error('Error al cargar los programas:', error));

    $('#addMateriaModal').modal('show');
});

// Función para enviar el formulario de creación de materia
// Función para enviar el formulario de creación de materia
document.getElementById('addMateriaForm').addEventListener('submit', function (e) {
    e.preventDefault();

    // Crear el objeto FormData para manejar el archivo
    const formData = new FormData();
    formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
    formData.append('id_posgrado_programa', document.getElementById('programaMateria').value);
    formData.append('id_posgrado_nivel', document.getElementById('nivelMateria').value);
    formData.append('nombre', document.getElementById('nombreMateria').value);
    formData.append('sigla', document.getElementById('siglaMateria').value);
    formData.append('estado', document.getElementById('estadoMateria').value);

    // Añadir la imagen al FormData si se ha seleccionado
    const imagenInput = document.getElementById('imagenMateria');
    if (imagenInput.files.length > 0) {
        formData.append('imagen', imagenInput.files[0]); // Agregar la imagen
    }

    $.ajax({
        url: '/api/materias',
        type: 'POST',
        data: formData, // Enviar FormData
        contentType: false, // Evitar que jQuery procese los datos
        processData: false, // Evitar que jQuery los transforme en una cadena de consulta
        success: function(response) {
            $('#addMateriaModal').modal('hide');
            loadMaterias(formData.get('id_posgrado_programa')); // Cargar las materias del programa
            showMessage('Materia creada con éxito.', 'success');
        },
        error: function(xhr) {
            console.error('Error al crear la materia:', xhr);
            showMessage('Error al crear la materia.', 'error');
        }
    });
});

function loadMaterias(programId) {
    $.get(`/api/programas/${programId}/materias`, function(data) {
        renderMateriasList(data.materias);
    });
}

function searchMaterias(searchTerm) {
    const activeProgramId = document.querySelector('.program-item.active')?.dataset?.programId;
    if (!activeProgramId) return;

    fetch(`/api/programas/${activeProgramId}/materias/search?query=${searchTerm}`)
        .then(response => response.json())
        .then(data => renderMateriasList(data.materias))
        .catch(error => console.error('Error en la búsqueda de materias:', error));
}


// Función para renderizar la lista de materias
function renderMateriasList(materias) {
    const materiasList = document.getElementById('materiasList');
    materiasList.innerHTML = '';

    materias.forEach(materia => {
        const listItem = document.createElement('li');
        listItem.classList.add('list-group-item', 'bg-white', 'mb-2');

        let docentesHtml = '';
        if (materia.docentes.length > 0) {
            materia.docentes.forEach(docente => {
                const persona = docente.persona;

                const imageUrl = persona.fotografia ? `${baseImageUrl}/${persona.fotografia}` : defaultImageUrl;
                docentesHtml += `
                    <span class="badge rounded-pill bg-light text-dark d-flex align-items-center p-2 me-2 mb-2">
                        <img src="${imageUrl}" class="rounded-circle me-2" alt="User Image" style="width: 24px; height: 24px;">
                        ${persona.nombres} ${persona.materno}
                        <button type="button" class="btn-close ms-2" aria-label="Close" data-docente-id="${docente.id_persona_docente}" data-materia-id="${materia.id_posgrado_materia}"></button>
                    </span>
                `;
            });
        }

        const subjectImageUrl = materia.imagen ? `${baseSubjectImageUrl}/${materia.imagen}` : defaultSubjectImageUrl;
        listItem.innerHTML = `
            <div class="d-flex align-items-center mb-2">
                <img src="${subjectImageUrl}" alt="Materia icon" width="50" height="50" style="margin-right: 7px">
                <div>
                    <h5 class="mb-0">${materia.nombre}</h5>
                    <p class="mb-0 text-muted">${materia.sigla}</p>
                </div>
            </div>
            <div class="d-flex flex-wrap align-items-center mt-2">
                ${docentesHtml}
                <button type="button" class="btn btn-light rounded-circle d-flex justify-content-center align-items-center mb-2 ml-1 open-assign-modal" data-materia-id="${materia.id_posgrado_materia}" style="width: 26px; height: 26px">
                    <span style="font-size: 15px; font-weight: bold;">+</span>
                </button>
            </div>
        `;

        materiasList.appendChild(listItem);
    });

    // Agregar eventos a los botones de asignación y desasignación
    addAssignModalEvents();
    addDesassignEvents();
}

document.getElementById('search-materias-input').addEventListener('input', applyDebounce((event) => {
    const searchTerm = event.target.value.trim();
    if (searchTerm.length > 0) searchMaterias(searchTerm);
    else {
        const activeProgramId = document.querySelector('.program-item.active')?.dataset?.programId;
        if (activeProgramId) loadMaterias(activeProgramId);
    }
}));
