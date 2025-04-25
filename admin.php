<?php
session_start();

// ========== SECURITY CHECK ========== //
// Add this at the VERY TOP of your file (before any HTML output)

// 1. Hardcoded admin credentials (CHANGE THESE!)
$admin_username = "admin";  // Change to your username
$admin_password = "admin123";  // Change to your password

// 2. Check if login form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    if ($_POST['username'] === $admin_username && $_POST['password'] === $admin_password) {
        $_SESSION['admin_logged_in'] = true;
    } else {
        $login_error = "Invalid credentials";
    }
}

// 3. Redirect to login if not authenticated
if (!isset($_SESSION['admin_logged_in'])) {
    // Show login form instead of admin panel
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Admin Login - NBA</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
      <style>
        body {
          background-color: #f4f6f9;
          font-family: 'Segoe UI', sans-serif;
        }
        .login-container {
          max-width: 400px;
          margin: 100px auto;
          padding: 30px;
          background: white;
          border-radius: 12px;
          box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }
      </style>
    </head>
    <body>
      <div class="login-container">
        <h2 class="text-center mb-4">NBA Admin Login</h2>
        <?php if (isset($login_error)): ?>
          <div class="alert alert-danger"><?= $login_error ?></div>
        <?php endif; ?>
        <form method="POST">
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" required>
          </div>
          <input type="hidden" name="login" value="1">
          <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
    <?php
    exit(); // Stop execution here if not logged in
}

// ========== YOUR EXISTING ADMIN PANEL ========== //
// Everything below this line remains EXACTLY as you had it
// Only the PHP opening tag was moved up to the top
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Panel - NBA</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background-color: #f4f6f9;
      font-family: 'Segoe UI', sans-serif;
    }

    .preview-img {
      max-height: 200px;
      margin-top: 10px;
      display: none;
      border-radius: 8px;
      box-shadow: 0 0 5px rgba(0,0,0,0.1);
    }

    .container {
      background-color: #fff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }

    h1 {
      font-weight: 600;
      color: #333;
    }

    .nav-tabs .nav-link.active {
      font-weight: 500;
    }
  </style>
</head>
<body>
  <!-- Add logout button at the top -->
  <div class="text-end mt-3 me-3">
    <a href="logout.php" class="btn btn-outline-danger btn-sm">Logout</a>
  </div>

  <div class="container mt-3">
    <h1 class="mb-4 text-center">NBA Admin Panel</h1>

    <?php if (isset($_GET['success'])): ?>
      <div class="alert alert-success text-center">Action completed successfully!</div>
    <?php endif; ?>
    <div id="success-message" class="alert alert-success d-none text-center">Action completed successfully!</div>

    <!-- Rest of your existing HTML remains exactly the same -->
    <ul class="nav nav-tabs mb-4" id="adminTab" role="tablist">
      <li class="nav-item">
        <button class="nav-link active" id="news-tab" data-bs-toggle="tab" data-bs-target="#news" type="button" role="tab">Add News</button>
      </li>
      <li class="nav-item">
        <button class="nav-link" id="member-tab" data-bs-toggle="tab" data-bs-target="#member" type="button" role="tab">Add Member</button>
      </li>
    </ul>

    <div class="tab-content" id="adminTabContent">
      <!-- Add News -->
      <div class="tab-pane fade show active" id="news" role="tabpanel" aria-labelledby="news-tab">
        <form action="add_news.php" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
          <div class="mb-3">
            <label for="title" class="form-label">News Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
            <div class="invalid-feedback">Please provide a news title.</div>
          </div>
          <div class="mb-3">
            <label for="content" class="form-label">News Content</label>
            <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
            <div class="invalid-feedback">Please provide content.</div>
          </div>
          <div class="mb-3">
            <label for="news-image" class="form-label">Upload Image</label>
            <input type="file" class="form-control" id="news-image" name="image" accept="image/*" required>
            <div class="invalid-feedback">Please upload an image.</div>
            <img id="news-preview" class="preview-img" alt="News Image Preview">
          </div>
          <button type="submit" class="btn btn-primary w-100">Post News</button>
        </form>
      </div>

      <!-- Add Member -->
      <div class="tab-pane fade" id="member" role="tabpanel" aria-labelledby="member-tab">
        <form action="add_member.php" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
          <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" class="form-control" name="name" required>
            <div class="invalid-feedback">Please enter the full name.</div>
          </div>
          <div class="mb-3">
            <label for="designation" class="form-label">Designation</label>
            <input type="text" class="form-control" name="designation" required>
            <div class="invalid-feedback">Please enter a designation.</div>
          </div>
          <div class="mb-3">
            <label for="bio" class="form-label">Short Bio</label>
            <textarea class="form-control" name="bio" rows="3" required></textarea>
            <div class="invalid-feedback">Please provide a short bio.</div>
          </div>
          <div class="mb-3">
            <label for="member-image" class="form-label">Upload Image</label>
            <input type="file" class="form-control" id="member-image" name="image" accept="image/*" required>
            <div class="invalid-feedback">Please upload a profile image.</div>
            <img id="member-preview" class="preview-img" alt="Member Image Preview">
          </div>
          <button type="submit" class="btn btn-success w-100">Add Member</button>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    (() => {
      'use strict';
      const forms = document.querySelectorAll('.needs-validation');
      Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
          if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        });
      });
    })();

    function previewImage(inputId, previewId) {
      const input = document.getElementById(inputId);
      const preview = document.getElementById(previewId);
      input.addEventListener('change', () => {
        if (input.files && input.files[0]) {
          preview.src = URL.createObjectURL(input.files[0]);
          preview.style.display = 'block';
        } else {
          preview.style.display = 'none';
          preview.src = '';
        }
      });
    }

    previewImage('news-image', 'news-preview');
    previewImage('member-image', 'member-preview');
  </script>
</body>
</html>