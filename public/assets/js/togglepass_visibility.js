document.addEventListener('DOMContentLoaded', () => {
    function togglePasswordVisibility(iconId, inputId) {
        const icon = document.getElementById(iconId);
        const input = document.getElementById(inputId);

        if (icon && input) {
            // Hide toggle icon if input has error class
            const updateToggleVisibility = () => {
                icon.style.display = input.classList.contains('is-invalid') ? 'none' : 'block';
            };

            // Initial visibility check
            updateToggleVisibility();

            // Update visibility when input changes
            input.addEventListener('input', updateToggleVisibility);

            // Toggle password visibility on click
            icon.addEventListener('click', () => {
                const isPassword = input.type === 'password';
                input.type = isPassword ? 'text' : 'password';
                icon.classList.toggle('bi-eye-slash', !isPassword);
                icon.classList.toggle('bi-eye', isPassword);
            });
        }
    }

    togglePasswordVisibility('toggleSigninPasswordIcon', 'formSigninPassword');
    togglePasswordVisibility('toggleSignupPasswordIcon', 'formSignupPassword');
    togglePasswordVisibility('toggleConfirmPasswordIcon', 'formConfirmSignupPassword');
});
