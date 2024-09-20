document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('addProgramButton').addEventListener('click', function () {
        $('#addProgramModal').modal('show');
    });

    // Cargar la lista de programas
    function loadPrograms() {
        $.get("/api/programas", function(data) {
            renderProgramsList(data.programas);
        });
    }

    // Buscar programas según el término de búsqueda
    function searchPrograms(searchTerm) {
        fetch(`/api/programas/search?query=${searchTerm}`)
            .then(response => response.json())
            .then(data => renderProgramsList(data))
            .catch(error => console.error('Error en la búsqueda de programas:', error));
    }

    // Renderizar la lista de programas
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

    // Función para crear un nuevo programa
    function createProgram() {
        $('#addProgramForm').off('submit').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: crearProgramaUrl,
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    if (response.success) {
                        $('#addProgramForm').trigger('reset');
                        $('#addProgramModal').modal('hide');
                        loadPrograms();
                        showMessage('Programa creado con éxito.', 'success', 'Creación Exitosa');
                    }
                },
                error: function(error) {
                    console.error('Error al crear el programa:', error);
                    showMessage('Error al crear el programa.', 'error', 'Error de Creación');
                }
            });
        });
    }

    // Event listeners para el buscador de programas
    document.getElementById('search-programas-input').addEventListener('input', applyDebounce((event) => {
        const searchTerm = event.target.value.trim();
        if (searchTerm.length > 0) {
            searchPrograms(searchTerm);
        } else {
            loadPrograms();
        }
    }));

    // Event listener para manejar clics en los programas
    const programasList = document.getElementById('programasList');
    programasList.addEventListener('click', function (event) {
        const clickedProgram = event.target;
        if (clickedProgram.classList.contains('program-item')) {
            document.querySelectorAll('.program-item').forEach(item => item.classList.remove('active'));
            clickedProgram.classList.add('active');
            loadMaterias(clickedProgram.dataset.programId);
        }
    });

    createProgram();

    loadPrograms();
});
