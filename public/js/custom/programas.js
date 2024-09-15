document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('.btn-light').addEventListener('click', function () {
        $('#addProgramModal').modal('show');
    });

    // Función para cargar la lista de programas
    function loadPrograms() {
        $.get("/api/programas", function(data) {
            renderProgramsList(data.programas);
        });
    }

    // Función para buscar programas según el término de búsqueda
    function searchPrograms(searchTerm) {
        fetch(`/api/programas/search?query=${searchTerm}`)
            .then(response => response.json())
            .then(data => renderProgramsList(data))
            .catch(error => console.error('Error en la búsqueda de programas:', error));
    }

    // Función para renderizar la lista de programas
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
                        alert('Programa creado con éxito.');
                    }
                },
                error: function(error) {
                    console.error('Error al crear el programa:', error);
                    alert('Error al crear el programa.');
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
            loadMaterias(clickedProgram.dataset.programId);  // Cargar y mostrar las materias
        }
    });

    // Inicializar la creación de programas
    createProgram();

    // Cargar todos los programas inicialmente
    loadPrograms();
});
