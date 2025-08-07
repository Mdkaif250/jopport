<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Improved Job Portal Login</title>
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
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

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
            max-width: 950px;
            min-height: 650px;
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

        .logo-img {
            max-width: 200px; /* Adjust size as needed */
            margin-bottom: 40px;
        }

        .illustration-svg {
            width: 100%;
            max-width: 400px;
            height: auto;
        }

        /* --- Right Panel: Login Form --- */
        .login-panel {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px;
        }

        .login-form {
            width: 100%;
            max-width: 380px;
        }

        .login-form h2 {
            font-size: 2.2rem;
            font-weight: 600;
            margin-bottom: 25px;
            color: var(--dark-text);
        }
        
        /* Input Fields & Labels */
        .input-group {
            position: relative;
            margin-bottom: 25px;
        }

        .input-group .input-label {
            position: absolute;
            top: 15px;
            left: 45px;
            color: var(--light-text);
            font-size: 1rem;
            pointer-events: none;
            transition: all 0.2s ease-in-out;
        }
        
        .input-group input {
            border: 1px solid var(--input-border);
            border-radius: 10px;
            padding: 15px 15px 15px 45px;
            background-color: #FAFCFF;
            width: 100%;
            font-size: 1rem;
            color: var(--dark-text);
            outline: none;
            transition: border-color 0.2s;
        }

        .input-group i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--light-text);
            transition: color 0.2s;
        }
        
        /* Floating label and focus effect */
        .input-group input:focus {
            border-color: var(--primary-blue);
        }
        .input-group input:focus ~ .input-label,
        .input-group input:not(:placeholder-shown) ~ .input-label {
            top: -10px;
            left: 15px;
            font-size: 0.8rem;
            background-color: var(--white);
            padding: 0 5px;
            color: var(--primary-blue);
        }
        .input-group input:focus ~ i {
            color: var(--primary-blue);
        }

        /* Error state */
        .input-group.error input {
            border-color: var(--error-red);
        }
        .error-message {
            color: var(--error-red);
            font-size: 0.8rem;
            margin-top: -15px;
            margin-bottom: 15px;
            display: none; /* Hidden by default */
        }
        .error-message.visible {
            display: block; /* Shown via JS */
        }
        
        #togglePassword {
            cursor: pointer;
            right: 15px;
            left: auto;
        }

        /* Options below password */
        .login-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            font-size: 0.9rem;
        }

        .remember-me {
            display: flex;
            align-items: center;
            color: var(--light-text);
        }
        .remember-me input {
            margin-right: 8px;
        }

        .forgot-password {
            color: var(--light-text);
            text-decoration: none;
        }
        .forgot-password:hover {
            text-decoration: underline;
            color: var(--primary-blue);
        }
        
        /* Buttons and Links */
        .login-button {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 10px;
            background-color: var(--primary-blue);
            color: var(--white);
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s, box-shadow 0.2s;
        }

        .login-button:hover {
            background-color: var(--primary-blue-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(74, 123, 255, 0.4);
        }

        .divider {
            text-align: center;
            margin: 25px 0;
            color: var(--light-text);
            font-size: 0.9rem;
            display: flex;
            align-items: center;
        }
        .divider::before, .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid var(--input-border);
        }
        .divider:not(:empty)::before { margin-right: .5em; }
        .divider:not(:empty)::after { margin-left: .5em; }

        .social-login {
            display: flex;
            justify-content: space-between;
            gap: 15px;
        }

        .social-button {
            flex: 1;
            padding: 12px;
            border-radius: 10px;
            border: 1px solid var(--input-border);
            background-color: var(--white);
            color: var(--dark-text);
            font-size: 0.9rem;
            font-weight: 500;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
        }
        .social-button i {
            margin-right: 10px;
            font-size: 1.2rem;
        }
        .social-button:hover {
            border-color: var(--primary-blue);
            color: var(--primary-blue);
        }

        .signup-link {
            text-align: center;
            margin-top: 30px;
            font-size: 0.9rem;
            color: var(--light-text);
        }

        .signup-link a {
            color: var(--primary-blue);
            font-weight: 600;
            text-decoration: none;
        }

        .signup-link a:hover {
            text-decoration: underline;
        }

        /* --- Responsive Design for Smaller Screens --- */
        /* --- Improved Responsive Design for Smaller Screens --- */
@media (max-width: 920px) {
    .container {
        /* Switch to a vertical layout */
        flex-direction: column;
        width: 100%;
        min-height: 100vh; /* Ensure it takes full screen height */
        height: auto;
        border-radius: 0;
        box-shadow: none;
    }

    body {
        padding: 0;
    }

    /* Keep the illustration panel but restyle it as a header */
    .illustration-panel {
        flex: 0; /* Don't allow it to grow */
        padding: 40px 20px;
        min-height: auto;
    }

    /* HIDE the large SVG illustration, but NOT the logo inside the panel */
    .illustration-panel .illustration-svg {
        display: none;
    }
    
    /* Make sure the logo is centered and has space */
    .illustration-panel .logo-img {
        margin-bottom: 0; /* Remove bottom margin as the illustration is gone */
    }

    /* Center the login form and give it proper padding */
    .login-panel {
        flex: 1; /* Allow the form panel to grow and fill the space */
        padding: 30px;
        display: flex;
        align-items: flex-start; /* Align form to the top on mobile */
        justify-content: center;
    }
    
    .login-form {
        width: 100%;
        max-width: 400px; /* Give it a max-width on larger mobile screens */
    }
}

    </style>
</head>
<body>
    <div class="container">
        <!-- Left Panel: Illustration and Title -->
        <div class="illustration-panel">
            <!-- LOGO ADDED HERE -->
            <img src="logo.jpg" alt="Job Portal Logo" class="logo-img">
            
            <svg class="illustration-svg" viewBox="0 0 459 340" fill="none" xmlns="http://www.w3.org/2000/svg">
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

        <!-- Right Panel: Login Form -->
        <div class="login-panel">
            <div class="login-form">
                <h2>Log in</h2>
                <form id="loginForm" novalidate>
                    <!-- Email Input -->
                    <div class="input-group" id="emailGroup">
                        <i class="fas fa-envelope"></i>
                        <input type="email" id="email" placeholder=" " required>
                        <label for="email" class="input-label">Email address</label>
                    </div>
                    <div class="error-message" id="emailError">Please enter a valid email address.</div>
                    
                    <!-- Password Input -->
                    <div class="input-group" id="passwordGroup">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password" placeholder=" " required>
                        <label for="password" class="input-label">Password</label>
                        <i class="fas fa-eye-slash" id="togglePassword"></i>
                    </div>
                    <div class="error-message" id="passwordError">Password cannot be empty.</div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="login-options">
                        <label class="remember-me">
                            <input type="checkbox" name="remember"> Remember me
                        </label>
                        <a href="forgot-password.php" class="forgot-password">Forgot password?</a>
                    </div>
                    
                    <button type="submit" class="login-button">Log in</button>
    </form>

                <p class="signup-link">
                    Don't have an account? <a href="register.php">Sign up</a>
                </p>
            </div>
        </div>
    </div>

    <!-- JavaScript for functionality -->
    <script>
        const loginForm = document.getElementById('loginForm');
        const email = document.getElementById('email');
        const password = document.getElementById('password');
        const togglePassword = document.getElementById('togglePassword');
        
        const emailGroup = document.getElementById('emailGroup');
        const passwordGroup = document.getElementById('passwordGroup');
        const emailError = document.getElementById('emailError');
        const passwordError = document.getElementById('passwordError');

        // 1. Show/Hide Password Toggle
        togglePassword.addEventListener('click', function () {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });

        // 2. Form Validation
        loginForm.addEventListener('submit', function (e) {
            e.preventDefault(); // Prevent actual form submission
            let isValid = true;
            
            // Reset errors
            emailError.classList.remove('visible');
            emailGroup.classList.remove('error');
            passwordError.classList.remove('visible');
            passwordGroup.classList.remove('error');

            // Validate Email
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (email.value.trim() === '' || !emailRegex.test(email.value)) {
                emailError.classList.add('visible');
                emailGroup.classList.add('error');
                isValid = false;
            }
            
            // Validate Password
            if (password.value.trim() === '') {
                passwordError.classList.add('visible');
                passwordGroup.classList.add('error');
                isValid = false;
            }

            if (isValid) {
                // If form is valid, you can proceed with submission (e.g., to a server)
                console.log('Form is valid. Submitting...');
                alert('Login successful!');
                // loginForm.submit(); // Uncomment for actual submission
            }
        });
    </script>
</body>
</html>
