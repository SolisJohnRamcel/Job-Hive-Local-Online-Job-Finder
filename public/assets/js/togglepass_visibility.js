document.addEventListener('DOMContentLoaded', () => {
    function togglePasswordVisibility(iconId, inputId) {
        const icon = document.getElementById(iconId);
        const input = document.getElementById(inputId);

        if (icon && input) {
            console.log(`Setting up toggle for ${iconId} and ${inputId}`);

            icon.addEventListener('click', () => {
                console.log(`Icon clicked: ${iconId}`);
                const isPassword = input.type === 'password';
                input.type = isPassword ? 'text' : 'password';
                icon.classList.toggle('bi-eye-slash', !isPassword);
                icon.classList.toggle('bi-eye', isPassword);
            });
        } else {
            console.warn(`Elements not found: ${iconId}, ${inputId}`);
        }
    }

    togglePasswordVisibility('toggleSigninPasswordIcon', 'formSigninPassword');
    togglePasswordVisibility('toggleSignupPasswordIcon', 'formSignupPassword');
    togglePasswordVisibility('toggleConfirmPasswordIcon', 'formConfirmSignupPassword');
});
