document.addEventListener('DOMContentLoaded', function () {
    function loadPrograms() {
        $.get("/api/programas", function(data) {
            renderProgramsList(data.programas);
        });
    }

    function searchPrograms(searchTerm) {
        fetch(`/api/programas/search?query=${searchTerm}`)
    .then(response => response.json())
            .then(data => renderProgramsList(data))
            .catch(error => console.error('Error en la búsqueda de programas:', error));
    }

    function renderProgramsList(programs) {
        const programasList = document.getElementById('programasList');
        programasList.innerHTML = '';
        programs.forEach(programa => {
            const listItem = document.createElement('li');
            listItem.classList.add('list-group-item', 'bg-light', 'rounded', 'border', 'program-item', 'mb-2');
            listItem.textContent = programa.nombre;
            listItem.dataset.programId = programa.id_posgrado_programa;
            programasList.appendChild(listItem);
        });
    }

    // Event listeners para el buscador
    document.getElementById('search-programas-input').addEventListener('input', applyDebounce((event) => {
        const searchTerm = event.target.value.trim();
        if (searchTerm.length > 0) {
            console.log(searchTerm.length)
            searchPrograms(searchTerm);
        }
        else{
            loadPrograms();
        }
    }));

    const programasList = document.getElementById('programasList');
    programasList.addEventListener('click', function (event) {
        const clickedProgram = event.target;
        if (clickedProgram.classList.contains('program-item')) {
            document.querySelectorAll('.program-item').forEach(item => item.classList.remove('active'));
            clickedProgram.classList.add('active');
            loadMaterias(clickedProgram.dataset.programId);  // Cargar y mostrar las materias
        }
    });

    loadPrograms();  // Cargar todos los programas inicialmente
});
