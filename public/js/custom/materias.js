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
