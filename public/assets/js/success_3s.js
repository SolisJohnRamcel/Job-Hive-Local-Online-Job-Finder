document.addEventListener('DOMContentLoaded', function() {
    // Auto dismiss alerts after 3 seconds
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        }, 1000);
    });
});
