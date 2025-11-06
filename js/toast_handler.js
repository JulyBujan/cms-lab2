document.addEventListener('DOMContentLoaded', () => {
    const toastLiveExample = document.getElementById('liveToast');
    if (!toastLiveExample) return;

    // --- Configuración Central de Mensajes ---
    // Mapea los parámetros de la URL a los mensajes y estilos del toast.
    const toastMessages = {
        // Mensajes de error
        'error': {
            'unauthorized': { message: 'No tienes permiso para acceder a esa página o realizar esa acción.', class: 'text-bg-danger' },
            'credentials': { message: 'Correo o contraseña incorrectos.', class: 'text-bg-danger' },
            'pending': { message: '<strong>Cuenta pendiente:</strong> Tu cuenta está pendiente de validación por un administrador.', class: 'text-bg-warning' },
            'self': { message: 'No puedes modificar tu propio rol o estado.', class: 'text-bg-danger' },
            'update_failed': { message: 'Ocurrió un error al actualizar el usuario.', class: 'text-bg-danger' },
            'db_error': { message: 'Ocurrió un error inesperado. Por favor, intente de nuevo más tarde.', class: 'text-bg-danger' }
        },
        // Mensajes de éxito
        'success': {
            'true': { message: 'Usuario actualizado correctamente.', class: 'text-bg-success' },
            'updated': { message: 'Publicación actualizada correctamente.', class: 'text-bg-success' }
        },
        // Mensajes de registro
        'registro': {
            'ok': { message: '¡Registro exitoso! 🎉 Tu cuenta fue creada correctamente. Ya podés iniciar sesión.', class: 'text-bg-success' }
        }
    };

    const urlParams = new URLSearchParams(window.location.search);
    const toast = new bootstrap.Toast(toastLiveExample);
    const toastBody = toastLiveExample.querySelector('.toast-body');
    const toastHeader = toastLiveExample.querySelector('.toast-header');

    let notification = null;

    // Itera sobre los parámetros de la URL y busca una coincidencia en nuestra configuración
    for (const [key, value] of urlParams.entries()) {
        if (toastMessages[key] && toastMessages[key][value]) {
            notification = toastMessages[key][value];
            break; // Encontramos una, salimos del bucle
        }
    }

    // Si se encontró una notificación, la muestra
    if (notification) {
        // Usamos innerHTML para permitir etiquetas como <strong>
        toastBody.innerHTML = notification.message; 
        
        // Limpiamos clases anteriores y añadimos la nueva
        toastHeader.className = 'toast-header'; // Resetea a la clase base
        toastHeader.classList.add(notification.class);
        toast.show();
    }
});