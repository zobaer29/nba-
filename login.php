<?php
session_start();

// Hardcoded admin credentials (change these!)
$admin_username = "admin";
$admin_password = "admin123"; 

// Check if already logged in
if(isset($_SESSION['admin_logged_in'])) {
    header("Location: admin.php");
    exit;
}

// Handle form submission
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
    if($username === $admin_username && $password === $admin_password) {
        $_SESSION['admin_logged_in'] = true;
        header("Location: admin.php");
        exit;
    } else {
        $error = "Invalid username or password";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>NBA Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: rgb(161, 250, 134);
            background-image: url("nba picture/logo.jpg");
            background-size: contain;       /* Changed to contain for perfect fit */
            background-position: center;    /* Center the image */
            background-repeat: no-repeat;   /* Prevent repeating */
            background-attachment: fixed;   /* Fixed position */
            min-height: 100vh;             /* Full viewport height */
            display: flex;
            align-items: center;
            justify-content: center;       /* Center horizontally */
            position: relative;            /* For overlay positioning */
        }
        
        /* Add a semi-transparent overlay */
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(255, 255, 255, 0.85); /* White with 85% opacity */
            z-index: -1;                   /* Behind the content */
        }
        
        .login-container {
            max-width: 450px;
            width: 100%;
            margin: 0 auto;
            animation: fadeIn 0.5s ease-out;
        }
        
        .login-card {
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border: none;
            overflow: hidden;
            background-color: white;       /* Solid white background for the card */
        }
        
        .login-header {
            background-color: #1d428a; /* NBA blue */
            color: white;
            padding: 1.5rem;
            text-align: center;
        }
        
        .nba-logo {
            width: 80px;
            height: 80px;
            object-fit: contain;
            margin-bottom: 1rem;
        }
        
        .login-body {
            padding: 2rem;
        }
        
        .btn-nba {
            background-color: #1d428a;
            border: none;
            padding: 10px;
            font-weight: 500;
            transition: all 0.3s;
        }
        
        .btn-nba:hover {
            background-color: #17408b;
            transform: translateY(-2px);
        }
        
        .form-control:focus {
            border-color: #1d428a;
            box-shadow: 0 0 0 0.25rem rgba(29, 66, 138, 0.25);
        }
        
        @media (max-width: 576px) {
            .login-container {
                padding: 0 15px;
            }
            .login-body {
                padding: 1.5rem;
            }
            body {
                background-size: 80%;    /* Smaller logo on mobile */
            }
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <img src="nba picture/logo2.jpg" alt="NBA Logo" class="nba-logo rounded-circle">
                <h4>National Brighteen Association</h4>
                <p class="mb-0">Admin Portal</p>
            </div>
            <div class="login-body">
                <h3 class="text-center mb-4">Admin Login</h3>
                <?php if(isset($error)): ?>
                    <div class="alert alert-danger alert-dismissible fade show">
                        <?= $error ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>
                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" name="username" class="form-control" placeholder="Enter username" required>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-nba btn-primary w-100 py-2">
                        <i class="fas fa-sign-in-alt me-2"></i> Login
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>