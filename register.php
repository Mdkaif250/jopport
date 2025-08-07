<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Portal Registration - Fixed</title>
    <!-- External assets for fonts and icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        /* --- General Styling & CSS Variables --- */
        :root {
            --primary-blue: #4A7BFF;
            --primary-blue-dark: #3a6bdd;
            --light-blue-bg: #F0F6FF;
            --dark-text: #0D224E;
            --light-text: #7B8AAB;
            --white: #FFFFFF;
            --input-border: #E0E8F8;
            --error-red: #D93025;
            --strength-weak: #EA4335;
            --strength-medium: #FBBC05;
            --strength-strong: #34A853;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light-blue-bg);
            color: var(--dark-text);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        /* --- Main Container --- */
        .container {
            display: flex;
            width: 100%;
            max-width: 1000px;
            background-color: var(--white);
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        /* --- Left Panel: Illustration & Branding --- */
        .illustration-panel {
            flex: 1;
            background-color: var(--light-blue-bg);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 40px;
            text-align: center;
        }

        .logo-img { max-width: 200px; margin-bottom: 40px; }
        .illustration-svg { width: 100%; max-width: 400px; height: auto; }

        /* --- Right Panel: Registration Form --- */
        .register-panel {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px;
        }

        .register-form-container { width: 100%; max-width: 400px; }
        .register-form h2 { font-size: 2rem; font-weight: 600; margin-bottom: 20px; color: var(--dark-text); }
        
        /* Input Fields & Labels */
        .input-group { position: relative; margin-bottom: 22px; }
        .input-group .input-label {
            position: absolute; top: 15px; left: 45px; color: var(--light-text); font-size: 1rem;
            pointer-events: none; transition: all 0.2s ease-in-out;
        }
        .input-group input {
            border: 1px solid var(--input-border); border-radius: 10px; padding: 15px 45px;
            background-color: #FAFCFF; width: 100%; font-size: 1rem; color: var(--dark-text);
            outline: none; transition: border-color 0.2s;
        }
        .input-group i {
            position: absolute; left: 15px; top: 50%; transform: translateY(-50%);
            color: var(--light-text); transition: color 0.2s;
        }
        .input-group input:focus { border-color: var(--primary-blue); }
        .input-group input:focus ~ .input-label,
        .input-group input:not(:placeholder-shown) ~ .input-label {
            top: -10px; left: 15px; font-size: 0.8rem; background-color: var(--white);
            padding: 0 5px; color: var(--primary-blue);
        }
        .input-group input:focus ~ i { color: var(--primary-blue); }

        /* Error state */
        .input-group.error input { border-color: var(--error-red); }
        .error-message {
            color: var(--error-red); font-size: 0.8rem; margin-top: -15px;
            margin-bottom: 15px; min-height: 1.2em; display: none;
        }
        .error-message.visible { display: block; }
        
        /********** THIS IS THE FIX **********/
         #togglePassword {
            cursor: pointer;
            right: 15px;
            left: auto;
        }
         #toggleConfirmPassword {
            cursor: pointer;
            right: 15px;
            left: auto;
        }

        /* Password Strength Indicator */
        .password-strength { display: flex; align-items: center; margin-top: -15px; margin-bottom: 15px; height: 20px; }
        .strength-meter { height: 6px; width: 100%; background-color: #E0E8F8; border-radius: 6px; overflow: hidden; }
        .strength-bar { height: 100%; background-color: transparent; width: 0%; transition: width 0.3s, background-color 0.3s; }
        .strength-text { margin-left: 10px; font-size: 0.8rem; color: var(--light-text); white-space: nowrap; }

        /* Terms of Service */
        .terms-service { display: flex; align-items: center; margin-bottom: 20px; font-size: 0.8rem; color: var(--light-text); }
        .terms-service input { margin-right: 8px; }
        .terms-service a { color: var(--primary-blue); text-decoration: none; }
        .terms-service a:hover { text-decoration: underline; }
        
        /* Buttons and Links */
        .register-button {
            width: 100%; padding: 15px; border: none; border-radius: 10px;
            background-color: var(--primary-blue); color: var(--white); font-size: 1rem;
            font-weight: 600; cursor: pointer; transition: all 0.3s;
        }
        .register-button:hover { background-color: var(--primary-blue-dark); transform: translateY(-2px); box-shadow: 0 4px 10px rgba(74, 123, 255, 0.4); }

        /* Social Login Section */
        .divider { text-align: center; margin: 20px 0; color: var(--light-text); font-size: 0.9rem; display: flex; align-items: center; }
        .divider::before, .divider::after { content: ''; flex: 1; border-bottom: 1px solid var(--input-border); }
        .divider:not(:empty)::before { margin-right: .5em; }
        .divider:not(:empty)::after { margin-left: .5em; }
        .social-login { display: flex; justify-content: space-between; gap: 15px; }
        .social-button {
            flex: 1; padding: 12px; border-radius: 10px; border: 1px solid var(--input-border);
            background-color: var(--white); color: var(--dark-text); font-size: 0.9rem;
            font-weight: 500; cursor: pointer; display: flex; align-items: center;
            justify-content: center; transition: all 0.3s;
        }
        .social-button i { margin-right: 10px; font-size: 1.2rem; }
        .social-button:hover { border-color: var(--primary-blue); color: var(--primary-blue); }

        .login-link { text-align: center; margin-top: 20px; font-size: 0.9rem; color: var(--light-text); }
        .login-link a { color: var(--primary-blue); font-weight: 600; text-decoration: none; }
        .login-link a:hover { text-decoration: underline; }

        /* Success Message */
        .success-message { text-align: center; padding: 40px; display: none; }
        .success-message i { font-size: 4rem; color: var(--strength-strong); margin-bottom: 20px; }
        .success-message h3 { font-size: 1.5rem; margin-bottom: 10px; }
        .success-message p { margin-bottom: 25px; color: var(--light-text); }
        .success-message .login-button { width: auto; padding: 10px 30px; }

        /* --- Responsive Design --- */
        /* --- Improved Responsive Design for Smaller Screens --- */
@media (max-width: 920px) {
    .container {
        /* Use a vertical layout and fill the screen */
        flex-direction: column;
        width: 100%;
        min-height: 100vh;
        height: auto;
        border-radius: 0;
        box-shadow: none;
    }

    body {
        padding: 0;
    }

    /* Restyle the illustration panel to act as a mobile header */
    .illustration-panel {
        flex: 0; /* Prevent it from growing */
        padding: 40px 20px;
        min-height: auto;
    }

    /* Hide the large SVG illustration, but NOT the logo */
    .illustration-panel .illustration-svg {
        display: none;
    }
    
    /* Ensure the logo is centered and has no extra space below it */
    .illustration-panel .logo-img {
        margin-bottom: 0;
    }

    /* Center the registration form and give it proper padding */
    .register-panel {
        flex: 1; /* Allow the form to fill the remaining space */
        padding: 30px;
        display: flex;
        align-items: flex-start; /* Align form to the top for better flow */
        justify-content: center;
    }
    
    .register-form-container {
        width: 100%;
        max-width: 420px; /* Give a max-width for readability on large phones */
    }
}

    </style>
</head>
<body>
    <div class="container">
        <!-- Left Panel: Illustration and Title -->
        <div class="illustration-panel">
            <img src="logo.jpg" alt="Job Portal Logo" class="logo-img">
            <svg class="illustration-svg" viewBox="0 0 459 340" fill="none" xmlns="http://www.w3.org/2000/svg">
                <!-- SVG from previous step -->
                <path d="M63.5 298C63.5 298 103 248.5 139.5 248.5C176 248.5 186 298 186 298" stroke="#B3D4FF" stroke-width="8" stroke-linecap="round"/>
                <rect x="25.5" y="103.5" width="408" height="66" rx="33" fill="white" stroke="#A9CFFF" stroke-width="3"/>
                <circle cx="68.5" cy="136.5" r="15" stroke="#A9CFFF" stroke-width="3"/>
                <path d="M86.5 152.5L100 166" stroke="#A9CFFF" stroke-width="3" stroke-linecap="round"/>
                <path d="M226.936 298.667C224.052 298.452 221.583 296.353 221.115 293.475L211.539 230.142C210.329 222.563 216.035 215.667 223.684 215.667H269.316C276.965 215.667 282.671 222.563 281.461 230.142L271.885 293.475C271.417 296.353 268.948 298.452 266.064 298.667L246.5 300L226.936 298.667Z" fill="#3A53A0"/>
                <ellipse cx="246.5" cy="189.5" rx="20" ry="22.5" fill="#3A53A0"/>
                <path d="M246.5 241C235.454 241 226.5 249.954 226.5 261V299H266.5V261C266.5 249.954 257.546 241 246.5 241Z" fill="#4C70D1"/>
                <path d="M260.5 230C260.5 230 278.1 216.2 291 207" stroke="#4C70D1" stroke-width="8" stroke-linecap="round"/>
            </svg>
        </div>

        <!-- Right Panel: Registration Form -->
        <div class="register-panel">
            <div class="register-form-container">
                <!-- The Form -->
                <form id="registerForm" novalidate>
                    <h2>Create Account</h2>
                    
                    <div class="input-group" id="nameGroup">
                        <i class="fas fa-user"></i>
                        <input type="text" id="fullName" placeholder=" " required>
                        <label for="fullName" class="input-label">Full Name</label>
                    </div>
                    <div class="error-message" id="nameError"></div>
                    
                    <div class="input-group" id="emailGroup">
                        <i class="fas fa-envelope"></i>
                        <input type="email" id="email" placeholder=" " required>
                        <label for="email" class="input-label">Email address</label>
                    </div>
                    <div class="error-message" id="emailError"></div>
                    
                    <div class="input-group" id="passwordGroup">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password" placeholder=" " required>
                        <label for="password" class="input-label">Password</label>
                        <i class="fas fa-eye-slash password-toggle" id="togglePassword"></i>
                    </div>
                    <!-- Password Strength Indicator -->
                    <div class="password-strength">
                        <div class="strength-meter"><div class="strength-bar" id="strengthBar"></div></div>
                        <span class="strength-text" id="strengthText"></span>
                    </div>
                    <div class="error-message" id="passwordError"></div>

                    <div class="input-group" id="confirmPasswordGroup">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="confirmPassword" placeholder=" " required>
                        <label for="confirmPassword" class="input-label">Confirm Password</label>
                        <i class="fas fa-eye-slash password-toggle" id="toggleConfirmPassword"></i>
                    </div>
                    <div class="error-message" id="confirmPasswordError"></div>

                    <div class="terms-service" id="termsGroup">
                        <input type="checkbox" id="terms" required>
                        <label for="terms">I agree to the <a href="#">Terms of Service</a></label>
                    </div>
                    <div class="error-message" id="termsError"></div>
                    
                    <button type="submit" class="register-button">Create Account</button>

                    <p class="login-link">
                        Already have an account? <a href="login.php">Log in</a>
                    </p>
                </form>

                <!-- Success Message (Hidden by default) -->
                <div class="success-message" id="successMessage">
                    <i class="fas fa-check-circle"></i>
                    <h3>Account Created!</h3>
                    <p>Please check your email to verify your account.</p>
                    <a href="#" class="login-button">Go to Login</a>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for functionality -->
    <script>
        // All JavaScript from the previous step remains the same.
        const registerForm = document.getElementById('registerForm');
        const successMessage = document.getElementById('successMessage');

        const fields = {
            fullName: { input: document.getElementById('fullName'), group: document.getElementById('nameGroup'), error: document.getElementById('nameError') },
            email: { input: document.getElementById('email'), group: document.getElementById('emailGroup'), error: document.getElementById('emailError') },
            password: { input: document.getElementById('password'), group: document.getElementById('passwordGroup'), error: document.getElementById('passwordError') },
            confirmPassword: { input: document.getElementById('confirmPassword'), group: document.getElementById('confirmPasswordGroup'), error: document.getElementById('confirmPasswordError') },
            terms: { input: document.getElementById('terms'), group: document.getElementById('termsGroup'), error: document.getElementById('termsError') }
        };
        
        const togglePassword = document.getElementById('togglePassword');
        const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
        const strengthBar = document.getElementById('strengthBar');
        const strengthText = document.getElementById('strengthText');

        const showError = (field, message) => {
            field.group.classList.add('error');
            field.error.textContent = message;
            field.error.classList.add('visible');
        };
        const hideError = (field) => {
            field.group.classList.remove('error');
            field.error.classList.remove('visible');
        };
        const togglePasswordVisibility = (field, toggleIcon) => {
            const type = field.getAttribute('type') === 'password' ? 'text' : 'password';
            field.setAttribute('type', type);
            toggleIcon.classList.toggle('fa-eye');
            toggleIcon.classList.toggle('fa-eye-slash');
        };

        togglePassword.addEventListener('click', () => togglePasswordVisibility(fields.password.input, togglePassword));
        toggleConfirmPassword.addEventListener('click', () => togglePasswordVisibility(fields.confirmPassword.input, toggleConfirmPassword));

        fields.email.input.addEventListener('blur', () => validateEmail(true));
        fields.password.input.addEventListener('input', () => { // Changed to 'input' for better responsiveness
            validatePassword(true);
            checkPasswordStrength();
        });
        fields.confirmPassword.input.addEventListener('input', () => validateConfirmPassword(true)); // Changed to 'input'

        const validateFullName = () => {
            if (fields.fullName.input.value.trim() === '') {
                showError(fields.fullName, 'Full Name cannot be empty.'); return false;
            } hideError(fields.fullName); return true;
        };
        const validateEmail = (isRealTime = false) => {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(fields.email.input.value)) {
                if(fields.email.input.value || !isRealTime) showError(fields.email, 'Please enter a valid email.'); return false;
            } hideError(fields.email); return true;
        };
        const validatePassword = (isRealTime = false) => {
            if (fields.password.input.value.length < 8) {
                if(fields.password.input.value || !isRealTime) showError(fields.password, 'Password must be at least 8 characters.'); return false;
            } hideError(fields.password); return true;
        };
        const validateConfirmPassword = (isRealTime = false) => {
            if (fields.password.input.value !== fields.confirmPassword.input.value) {
                if(fields.confirmPassword.input.value || !isRealTime) showError(fields.confirmPassword, 'Passwords do not match.'); return false;
            } hideError(fields.confirmPassword); return true;
        };
        const validateTerms = () => {
            if (!fields.terms.input.checked) {
                showError(fields.terms, 'You must agree to the terms of service.'); return false;
            } hideError(fields.terms); return true;
        };

        const checkPasswordStrength = () => {
            const password = fields.password.input.value;
            let score = 0;
            if (password.length >= 8) score++;
            if (/\d/.test(password)) score++;
            if (/[a-z]/.test(password) && /[A-Z]/.test(password)) score++;
            if (/[^A-Za-z0-9]/.test(password)) score++;

            strengthText.style.display = password.length > 0 ? 'block' : 'none';
            if(password.length === 0) { strengthBar.style.width = '0%'; return; }

            switch (score) {
                case 1: strengthBar.style.width = '25%'; strengthBar.style.backgroundColor = 'var(--strength-weak)'; strengthText.textContent = 'Weak'; break;
                case 2: strengthBar.style.width = '50%'; strengthBar.style.backgroundColor = 'var(--strength-medium)'; strengthText.textContent = 'Medium'; break;
                case 3: strengthBar.style.width = '75%'; strengthBar.style.backgroundColor = 'var(--strength-strong)'; strengthText.textContent = 'Strong'; break;
                case 4: strengthBar.style.width = '100%'; strengthBar.style.backgroundColor = 'var(--strength-strong)'; strengthText.textContent = 'Very Strong'; break;
                default: strengthBar.style.width = '10%'; strengthBar.style.backgroundColor = 'var(--strength-weak)'; strengthText.textContent = 'Very Weak';
            }
        };

        registerForm.addEventListener('submit', function (e) {
            e.preventDefault();
            const isFullNameValid = validateFullName();
            const isEmailValid = validateEmail();
            const isPasswordValid = validatePassword();
            const isConfirmPasswordValid = validateConfirmPassword();
            const areTermsChecked = validateTerms();
            
            if (isFullNameValid && isEmailValid && isPasswordValid && isConfirmPasswordValid && areTermsChecked) {
                console.log('Form is valid. Submitting to server...');
                registerForm.style.display = 'none';
                successMessage.style.display = 'block';
            }
        });
    </script>
</body>
</html>
