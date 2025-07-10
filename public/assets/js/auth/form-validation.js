/**
 * Valida��o para formul�rios de autentica��o
 * Suporta tanto o formul�rio de login quanto o de registro
 */
document.addEventListener('DOMContentLoaded', function() {
    // Constantes compartilhadas
    const EMAIL_REGEX = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    const PASSWORD_REGEX = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;
    
    // Detectar elementos do formul�rio (podem existir ou n�o, dependendo da p�gina)
    const nameInput = document.getElementById('name');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    const passwordConfirmInput = document.getElementById('password_confirmation');
    
    // Detectar �cones
    const emailIcon = document.getElementById('emailIcon');
    const passwordIcon = document.getElementById('passwordIcon');
    const confirmIcon = document.getElementById('confirmIcon');
    
    // Detectar feedbacks
    const nameFeedback = document.getElementById('nameFeedback');
    const emailFeedback = document.getElementById('emailFeedback');
    const passwordFeedback = document.getElementById('passwordFeedback');
    const passwordConfirmFeedback = document.getElementById('passwordConfirmFeedback');
    
    // Determinar qual formul�rio est� sendo usado
    const isLoginForm = !nameInput && emailInput && passwordInput && !passwordConfirmInput;
    const isRegisterForm = nameInput && emailInput && passwordInput && passwordConfirmInput;
    
    // ===== Fun��es auxiliares para manipula��o de estados =====
    
    // Fun��o para mostrar feedback de valida��o
    function showValidationFeedback(input, isValid, feedbackElement) {
        if (isValid) {
            input.classList.remove('is-invalid');
            input.classList.add('is-valid');
            if (feedbackElement) feedbackElement.style.display = 'none';
        } else {
            input.classList.remove('is-valid');
            
            if (input.value) {
                input.classList.add('is-invalid');
                if (feedbackElement) feedbackElement.style.display = 'block';
            } else {
                input.classList.remove('is-invalid');
                if (feedbackElement) feedbackElement.style.display = 'none';
            }
        }
    }
    
    // Fun��o para habilitar/desabilitar campo e �cone
    function toggleFieldState(input, icon, enabled) {
        if (input) {
            input.disabled = !enabled;
        }
        
        if (icon) {
            if (enabled) {
                icon.classList.remove('disabled');
            } else {
                icon.classList.add('disabled');
            }
        }
    }
    
    // ===== Valida��o do campo de nome (apenas para o registro) =====
    if (isRegisterForm && nameInput) {
        nameInput.addEventListener('input', function() {
            const isValid = this.value.trim().length >= 8;
            showValidationFeedback(this, isValid, nameFeedback);
            
            // Habilitar/desabilitar campo de email
            toggleFieldState(emailInput, emailIcon, isValid);
            
            // Se o nome for inv�lido, desabilitar os campos seguintes tamb�m
            if (!isValid) {
                toggleFieldState(passwordInput, passwordIcon, false);
                toggleFieldState(passwordConfirmInput, confirmIcon, false);
            }
        });
    }
    
    // ===== Valida��o do campo de email =====
    if (emailInput) {
        emailInput.addEventListener('input', function() {
            const isValid = EMAIL_REGEX.test(this.value);
            showValidationFeedback(this, isValid, emailFeedback);
            
            // Habilitar/desabilitar campo de senha
            toggleFieldState(passwordInput, passwordIcon, isValid);
            
            // Se o email for inv�lido e estivermos no formul�rio de registro, 
            // desabilitar o campo de confirma��o de senha tamb�m
            if (!isValid && isRegisterForm) {
                toggleFieldState(passwordConfirmInput, confirmIcon, false);
            }
        });
    }
    
    // ===== Valida��o do campo de senha =====
    if (passwordInput) {
        passwordInput.addEventListener('input', function() {
            // No formul�rio de login, n�o precisamos validar a complexidade da senha
            const isValid = isLoginForm ? true : PASSWORD_REGEX.test(this.value);
            
            if (isRegisterForm) {
                showValidationFeedback(this, isValid, passwordFeedback);
                
                // Habilitar/desabilitar campo de confirma��o de senha
                toggleFieldState(passwordConfirmInput, confirmIcon, isValid);
                
                // Se o campo de confirma��o j� tiver valor, verificar correspond�ncia
                if (passwordConfirmInput && passwordConfirmInput.value) {
                    const passwordsMatch = this.value === passwordConfirmInput.value;
                    showValidationFeedback(passwordConfirmInput, passwordsMatch, passwordConfirmFeedback);
                }
            }
        });
    }
    
    // ===== Valida��o do campo de confirma��o de senha (apenas para o registro) =====
    if (isRegisterForm && passwordConfirmInput) {
        passwordConfirmInput.addEventListener('input', function() {
            const passwordsMatch = this.value && passwordInput.value === this.value;
            showValidationFeedback(this, passwordsMatch, passwordConfirmFeedback);
        });
    }
    
    // ===== Verificar valores iniciais =====
    
    // Para o formul�rio de registro
    if (isRegisterForm && nameInput) {
        if (nameInput.value.trim().length >= 8) {
            nameInput.classList.add('is-valid');
            toggleFieldState(emailInput, emailIcon, true);
            
            if (EMAIL_REGEX.test(emailInput.value)) {
                emailInput.classList.add('is-valid');
                toggleFieldState(passwordInput, passwordIcon, true);
                
                if (PASSWORD_REGEX.test(passwordInput.value)) {
                    passwordInput.classList.add('is-valid');
                    toggleFieldState(passwordConfirmInput, confirmIcon, true);
                    
                    if (passwordConfirmInput.value && passwordInput.value === passwordConfirmInput.value) {
                        passwordConfirmInput.classList.add('is-valid');
                    }
                }
            }
        }
    }
    
    // Para o formul�rio de login
    if (isLoginForm && emailInput) {
        if (EMAIL_REGEX.test(emailInput.value)) {
            emailInput.classList.add('is-valid');
            toggleFieldState(passwordInput, passwordIcon, true);
        }
    }
});