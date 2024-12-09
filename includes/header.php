<?php
session_start();
include_once 'functions.php'; // تضمين ملف الفنكشنات
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <!-- Bootstrap Icons CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

    <!-- Main CSS -->
    <link rel="stylesheet" href="../assets/css/mainstyle.css" />
</head>

<body>
    <!-- Navbar Section -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand fw-bold" href="#">HotelBooking</a>
            <!-- Toggle Button for Mobile View -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navbar Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                </ul>
                <!-- Login, Sign Up, and Logout Buttons -->
                <div class="d-flex ms-lg-3">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <!-- User is logged in -->
                        <a href="javascript:void(0);" onclick="logoutUser()" class="btn btn-outline-light me-2">Logout</a>
                        <?php if ($_SESSION['role'] === 'admin'): ?>
                            <!-- User is admin -->
                            <a href="../admin/admin_panel.php" class="btn btn-success">Admin Panel</a>
                        <?php endif; ?>
                    <?php else: ?>
                        <!-- User is not logged in -->
                        <a href="login.php" class="btn btn-outline-light me-2">Login</a>
                        <a href="signup.php" class="btn btn-primary">Sign Up</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <!-- Logout Function -->
    <script type="text/javascript">
        function logoutUser() {
            window.location.href = 'functions.php?logout=true'; 
        }
    </script>
</body>

</html>