// docentes.js

function addDesassignEvents() {
    document.querySelectorAll('.btn-close').forEach(button => {
        button.addEventListener('click', function () {
            const docenteId = button.getAttribute('data-docente-id');
            const materiaId = button.getAttribute('data-materia-id');
            const docenteNombre = button.parentElement.querySelector('img').nextSibling.textContent.trim(); // Obtener el nombre del docente
            const materiaNombre = button.closest('li').querySelector('h5').textContent.trim(); // Obtener el nombre de la materia
            const activeProgramId = document.querySelector('.program-item.active')?.dataset?.programId; // Asegurarse de usar el programa activo

            if (!activeProgramId) {
                console.error("No hay programa activo seleccionado.");
                return;
            }

            // Establecer los nombres en el modal
            document.getElementById('docenteNombre').textContent = docenteNombre;
            document.getElementById('materiaNombre').textContent = materiaNombre;

            // Mostrar el modal de confirmación
            const confirmModal = new bootstrap.Modal(document.getElementById('confirmDesasignarDocenteModal'));
            confirmModal.show();

            // Al hacer clic en el botón de desasignar en el modal
            document.getElementById('confirmDesasignarBtn').addEventListener('click', function () {
                fetch(`/api/materias/${materiaId}/docentes/${docenteId}`, {
                    method: 'DELETE',
                    headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') }
                })
                    .then(response => {
                        confirmModal.hide(); // Cerrar el modal después de la acción
                        if (response.ok) {
                            loadMaterias(activeProgramId);
                            showMessage('Docente desasignado con éxito.', 'success'); // Usando showMessage de utils.js
                        } else {
                            showMessage('Error al desasignar el docente.', 'error'); // Usando showMessage de utils.js
                        }
                    })
                    .catch(error => {
                        confirmModal.hide(); // Cerrar el modal en caso de error
                        console.error('Error al desasignar el docente:', error);
                        showMessage('Error al desasignar el docente.', 'error'); // Usando showMessage de utils.js
                    });
            }, { once: true }); // Asegurarse de que este evento se dispare solo una vez
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
    $('#asignarDocenteError').addClass('d-none').text('');

    $.ajax({
        url: asignarDocenteUrl,
        type: 'POST',
        data: $(this).serialize(),
        success: function(response) {
            if (response.success) {
                // Si la asignación fue exitosa, ocultar el modal y limpiar el formulario
                $('#asignarDocenteForm').trigger('reset');
                $('#asignarDocenteModal').modal('hide');
                loadMaterias($('.program-item.active').data('program-id'));
                showMessage('Docente asignado con éxito.', 'success'); // Mensaje de éxito
            }
        },
        error: function(xhr) {
            if (xhr.status === 400 && xhr.responseJSON) {
                $('#asignarDocenteError').removeClass('d-none').text(xhr.responseJSON.message);
            } else {
                console.log('Error:', xhr);
                $('#asignarDocenteError').removeClass('d-none').text('Hubo un error al intentar asignar el docente.');
                showMessage('Error al asignar el docente.', 'error'); // Mensaje de error
            }
        }
    });
});


