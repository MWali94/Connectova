<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connectova - Create Account</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        .options {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            font-size: 14px;
            margin-bottom: 24px;
        }
        .options label {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--text-muted);
            cursor: pointer;
            font-weight: 500;
        }
        .footer-text {
            text-align: center;
            margin-top: 24px;
            font-size: 15px;
            color: var(--text-muted);
            font-weight: 500;
        }
        .form-group {
            margin-bottom: 16px;
        }
        .auth-card form {
            margin-bottom: 0;
        }
    </style>
</head>
<body>

    <div class="auth-layout">
        <!-- Floating Background Orbs -->
        <div class="auth-orb-1"></div>
        <div class="auth-orb-2"></div>

        <div class="auth-card" data-aos="zoom-in" data-aos-duration="800">
            <div class="auth-header">
                <a href="index.html" class="logo">
                    <i class="fa-solid fa-bolt"></i> Connectova
                </a>
                <h2 class="auth-title">Create Account</h2>
                <p class="text-muted">Join our global community today</p>
            </div>

            <form action="add-role.html">
                <div class="form-group input-with-icon">
                    <i class="fa-regular fa-user"></i>
                    <input type="text" class="form-control" placeholder="Full Name" required>
                </div>
                <div class="form-group input-with-icon">
                    <i class="fa-solid fa-at"></i>
                    <input type="text" class="form-control" placeholder="Username" required>
                </div>
                <div class="form-group input-with-icon">
                    <i class="fa-regular fa-envelope"></i>
                    <input type="email" class="form-control" placeholder="Email Address" required>
                </div>
                <div class="form-group input-with-icon">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="form-group input-with-icon">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" class="form-control" placeholder="Confirm Password" required>
                </div>
                
                <div class="options">
                    <label>
                        <input type="checkbox" required> I agree to the <a href="privacy-policy.html" style="font-weight: 600;">Terms & Conditions</a>
                    </label>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Sign Up Now</button>
            </form>

            <div class="footer-text">
                Already have an account? <a href="login.html" style="font-weight: 700;">Log in</a>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>
