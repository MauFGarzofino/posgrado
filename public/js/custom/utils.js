function applyDebounce(func, delay = 300) {
    let timeout;
    return (...args) => {
        clearTimeout(timeout);
        timeout = setTimeout(() => func.apply(this, args), delay);
    };
}

function showMessage(message, type = 'success', title = '') {
    // Opciones globales para el toastr
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000", // Tiempo que aparece el toast
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    // Según el tipo, mostramos el mensaje con título
    if (type === 'success') {
        toastr.success(message, title || '¡Éxito!');
    } else if (type === 'error') {
        toastr.error(message, title || 'Error');
    } else if (type === 'info') {
        toastr.info(message, title || 'Información');
    } else if (type === 'warning') {
        toastr.warning(message, title || 'Advertencia');
    }
}

