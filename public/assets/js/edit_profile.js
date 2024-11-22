document.addEventListener('DOMContentLoaded', function() {
    const editProfileModal = new bootstrap.Modal(document.getElementById('editProfileModal'));
    
    // Optional: Show modal if there are validation errors
    if (typeof errors !== 'undefined' && errors.any()) {
        editProfileModal.show();
    }
});