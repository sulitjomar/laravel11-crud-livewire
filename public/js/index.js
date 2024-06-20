// Add Confirmation
Livewire.on('employeeAdded', (message) => {
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: message,
        timer: 3000,
        showConfirmButton: false
    });
});

// Update Confirmation
Livewire.on('employeeUpdated', (message) => {
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: message,
        timer: 3000,
        showConfirmButton: false
    });
});

// Delete Confirmation
window.addEventListener('openDeleteModal', event => {
    const itemId = event.detail.itemId;

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            Livewire.emit('delete', itemId);
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'Employee deleted successfully.',
                timer: 3000,
                showConfirmButton: false
            });
        }
    });
});

// Open Edit Modal
window.addEventListener('openEditModal', event => {
    $('#employeeEditModal').modal('show');
});

// Close Add Modal
window.addEventListener('closeModal', event => {
    $('#employeeModal').modal('hide')
    $('.modal-backdrop').remove();
});

// Close Edit Modal
window.addEventListener('closeEditModal', event => {
    $('#employeeEditModal').modal('hide')
    $('.modal-backdrop').remove();
});