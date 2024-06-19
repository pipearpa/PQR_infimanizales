    // users.js

document.addEventListener('DOMContentLoaded', function() {
    window.confirmDelete = function(userId) {
        var form = document.getElementById('deleteForm');
        form.action = 'http://localhost/pqr_infi_mzls/public/users/' + userId; // Establecer la ruta adecuada
        $('#confirmDeleteModal').modal('show');
    }

    // Agregar un evento al botón de confirmación dentro del modal
    $('#confirmDeleteButton').off('click').on('click', function() {
        var form = document.getElementById('deleteForm');
        form.submit(); // Enviar el formulario cuando se confirme la eliminación
    });
});

document.addEventListener('DOMContentLoaded', function () {
    // Seleccionar todos los botones de edición
    const editButtons = document.querySelectorAll('.edit-user-btn');

    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            // Obtener los datos del usuario del botón
            const userId = this.dataset.id;
            const userName = this.dataset.name;
            const userEmail = this.dataset.email;

            // Establecer los valores del formulario en el modal
            document.getElementById('userName').value = userName;
            document.getElementById('userEmail').value = userEmail;

            // Actualizar la acción del formulario con el ID del usuario
            const form = document.getElementById('editUserForm');
            //form.action = `/users/${userId}`;
            form.action = 'http://localhost/pqr_infi_mzls/public/users/' + userId;
        });
    });
});



document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.toggle-activation-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', function () {
            const form = this.closest('form');
            const isActive = this.checked ? 'activate' : 'deactivate';
            const formData = new FormData(form);
            formData.set('activation_status', isActive);

            fetch(form.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json'
                },
                body: formData
            })
            /* .then(response => {
                if (!response.ok) {
                    throw new Error('Error al cambiar el estado de activación del usuario');
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    console.log('User activation status updated successfully');
                } else {
                    console.error('Error al cambiar el estado de activación del usuario');
                }
            })
            .catch(error => console.error('Error:', error)); */
        });
    });
});


document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('searchUser');
    searchInput.addEventListener('keyup', function () {
        const searchText = searchInput.value.toLowerCase();
        const userRows = document.querySelectorAll('#userTableBody tr');

        userRows.forEach(row => {
            const userName = row.querySelector('td[data-label="Nombre"]').textContent.toLowerCase();
            const userEmail = row.querySelector('td[data-label="Email"]').textContent.toLowerCase();
            if (userName.includes(searchText) || userEmail.includes(searchText)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
});



