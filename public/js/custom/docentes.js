function addDesassignEvents() {
    document.querySelectorAll('.btn-close').forEach(button => {
        button.addEventListener('click', function () {
            const docenteId = button.getAttribute('data-docente-id');
            const materiaId = button.getAttribute('data-materia-id');
            const activeProgramId = document.querySelector('.program-item.active')?.dataset?.programId;  // Asegurarse de usar el programa activo

            if (!activeProgramId) {
                console.error("No hay programa activo seleccionado.");
                return;
            }

            if (confirm("¿Desasignar este docente?")) {
                fetch(`/api/materias/${materiaId}/docentes/${docenteId}`, {
                    method: 'DELETE',
                    headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') }
                })
                    .then(response => {
                        if (response.ok) {
                            console.log("Docente desasignado, recargando materias del programa:", activeProgramId);
                            loadMaterias(activeProgramId);  // Asegurarse de recargar las materias del programa activo
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

function addAssignModalEvents() {
    document.querySelectorAll('.open-assign-modal').forEach(button => {
        button.addEventListener('click', function () {
            const materiaId = button.getAttribute('data-materia-id');
            document.getElementById('materiaId').value = materiaId;
            new bootstrap.Modal(document.getElementById('asignarDocenteModal')).show();
        });
    });
}

$('#asignarDocenteForm').off('submit').on('submit', function(e) {
    e.preventDefault();
    $.ajax({
        url: asignarDocenteUrl,
        type: 'POST',
        data: $(this).serialize(),
        success: function(response) {
            if (response.success) {
                $('#asignarDocenteForm').trigger('reset');
                $('#asignarDocenteModal').modal('hide');
                loadMaterias($('.program-item.active').data('program-id'));
                alert('Docente asignado.');
            }
        }
    });
});
