function applyDebounce(func, delay = 300) {
    let timeout;
    return (...args) => {
        clearTimeout(timeout);
        timeout = setTimeout(() => func.apply(this, args), delay);
    };
}

function showMessage(message, type = 'success') {
    const messageContainer = document.getElementById('messageContainer');
    const alertType = type === 'success' ? 'alert-success' : 'alert-danger';

    const messageElement = document.createElement('div');
    messageElement.classList.add('alert', alertType, 'alert-dismissible', 'fade', 'show');
    messageElement.setAttribute('role', 'alert');
    messageElement.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    `;

    messageContainer.appendChild(messageElement);

    setTimeout(() => {
        const alert = bootstrap.Alert.getOrCreateInstance(messageElement);
        alert.close();
    }, 3000); // Desaparece en 3 segundos
}
