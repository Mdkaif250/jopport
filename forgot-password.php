<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - Job Portal</title>
    <!-- External assets for fonts and icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        /* --- General Styling & CSS Variables (Same as previous pages) --- */
        :root {
            --primary-blue: #4A7BFF;
            --primary-blue-dark: #3a6bdd;
            --light-blue-bg: #F0F6FF;
            --dark-text: #0D224E;
            --light-text: #7B8AAB;
            --white: #FFFFFF;
            --input-border: #E0E8F8;
            --error-red: #D93025;
            --success-green: #34A853;
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

        .logo-img { max-width: 200px; margin-bottom: 40px; }
        .illustration-svg { width: 100%; max-width: 400px; height: auto; }

        /* --- Right Panel: Forgot Password Form --- */
        .form-panel {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px;
        }

        .form-container { width: 100%; max-width: 380px; }
        .form-container h2 { font-size: 2.2rem; font-weight: 600; margin-bottom: 15px; color: var(--dark-text); }
        .form-container p.info-text { font-size: 0.95rem; color: var(--light-text); margin-bottom: 30px; line-height: 1.5; }
        
        /* Input Fields & Labels */
        .input-group { position: relative; margin-bottom: 25px; }
        .input-group .input-label {
            position: absolute; top: 15px; left: 45px; color: var(--light-text); font-size: 1rem;
            pointer-events: none; transition: all 0.2s ease-in-out;
        }
        .input-group input {
            border: 1px solid var(--input-border); border-radius: 10px; padding: 15px 15px 15px 45px;
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
            margin-bottom: 15px; display: none;
        }
        .error-message.visible { display: block; }
        
        /* Buttons and Links */
        .action-button {
            width: 100%; padding: 15px; border: none; border-radius: 10px;
            background-color: var(--primary-blue); color: var(--white); font-size: 1rem;
            font-weight: 600; cursor: pointer; transition: all 0.3s;
        }
        .action-button:hover { background-color: var(--primary-blue-dark); transform: translateY(-2px); box-shadow: 0 4px 10px rgba(74, 123, 255, 0.4); }

        .back-to-login { text-align: center; margin-top: 30px; }
        .back-to-login a {
            color: var(--light-text);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
        }
        .back-to-login a:hover { color: var(--primary-blue); text-decoration: underline; }
        .back-to-login i { margin-right: 5px; }
        
        /* Success Message */
        .success-message { text-align: center; padding: 40px; display: none; }
        .success-message i { font-size: 4rem; color: var(--success-green); margin-bottom: 20px; }
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

    /* Hide the large SVG illustration, but keep the logo visible */
    .illustration-panel .illustration-svg {
        display: none;
    }
    
    /* Ensure the logo is centered and has no extra space below it */
    .illustration-panel .logo-img {
        margin-bottom: 0;
    }

    /* Center the form and give it proper padding */
    .form-panel {
        flex: 1; /* Allow the form to fill the remaining space */
        padding: 30px;
        display: flex;
        align-items: flex-start; /* Align form to the top, which is better for mobile */
        justify-content: center;
    }
    
    .form-container {
        width: 100%;
        max-width: 420px; /* Set a max-width for readability */
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
                <!-- SVG from previous steps -->
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

        <!-- Right Panel: Forgot Password Form -->
        <div class="form-panel">
            <div class="form-container">
                <!-- The Form -->
                <form id="forgotPasswordForm" novalidate>
                    <h2>Forgot Password</h2>
                    <p class="info-text">Enter the email address associated with your account and we'll send you a link to reset your password.</p>
                    
                    <div class="input-group" id="emailGroup">
                        <i class="fas fa-envelope"></i>
                        <input type="email" id="email" placeholder=" " required>
                        <label for="email" class="input-label">Email address</label>
                    </div>
                    <div class="error-message" id="emailError">Please enter a valid email address.</div>
                    
                    <button type="submit" class="action-button">Send Reset Link</button>
                    
                    <div class="back-to-login">
                        <a href="#"><i class="fas fa-arrow-left"></i> Back to Log in</a>
                    </div>
                </form>

                <!-- Success Message (Hidden by default) -->
                <div class="success-message" id="successMessage">
                    <i class="fas fa-paper-plane"></i>
                    <h3>Check Your Email</h3>
                    <p>We've sent a password reset link to the email address you provided.</p>
                    <a href="#" class="action-button login-button">Back to Login</a>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for functionality -->
    <script>
        const forgotPasswordForm = document.getElementById('forgotPasswordForm');
        const successMessage = document.getElementById('successMessage');
        const emailInput = document.getElementById('email');
        const emailGroup = document.getElementById('emailGroup');
        const emailError = document.getElementById('emailError');

        // Validation and Form Submission
        forgotPasswordForm.addEventListener('submit', function (e) {
            e.preventDefault();
            
            // Reset previous error state
            emailGroup.classList.remove('error');
            emailError.classList.remove('visible');
            
            // Validate Email
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (emailInput.value.trim() === '' || !emailRegex.test(emailInput.value)) {
                emailGroup.classList.add('error');
                emailError.classList.add('visible');
            } else {
                // If email is valid, show success message
                console.log('Form is valid. Sending reset link...');
                // IMPORTANT: In a real application, you would make an API call to your server here.
                
                forgotPasswordForm.style.display = 'none';
                successMessage.style.display = 'block';
            }
        });
    </script>
</body>
</html>
