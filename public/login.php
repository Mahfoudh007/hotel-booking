<?php
session_start();


include '../includes/functions.php';
include '../config/config.php';

// Handle form submissions
$message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['register'])) {
        $message = registerUser(
            $conn,
            htmlspecialchars(trim($_POST['username'])),
            htmlspecialchars(trim($_POST['pwd'])),
            htmlspecialchars(trim($_POST['confirm_password']))
        );
    } elseif (isset($_POST['login'])) {
        $message = loginUser(
            $conn,
            htmlspecialchars(trim($_POST['username'])),
            htmlspecialchars(trim($_POST['pwd']))
        );
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <!-- Bootstrap CSS  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- main CSS  -->
    <link rel="stylesheet" href="../assets/css/login.css" />
</head>

<body>

    <!-- the message  -->
    <?php if ($message != ""): ?>
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <?php echo $message; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['message']); // Clear the message after displaying it 
        ?>
    <?php endif; ?>

    <section class="vh-100 bg-light">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-center">
                <!-- Left Section: Form -->
                <div class="col-sm-6 text-black">

                    <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" style="width: 35rem">
                            <!-- Return to Home Button -->
                            <div class="m-5">
                                <a href="./home.php" class="btn"><i class="fa-solid fa-arrow-left"></i></a>
                            </div>
                            <h3 class="fw-normal mb-3 pb-3 text-center" style="letter-spacing: 1px; color: #2d3e50;">
                                Log in
                            </h3>

                            <div class="form-outline mb-4">
                                <input type="text" id="username" class="form-control form-control-lg" name="username" required />
                                <label class="form-label" for="username">Username</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="password" id="password" class="form-control form-control-lg" name="pwd" required />
                                <label class="form-label" for="password">Password</label>
                            </div>

                            <div class="pt-1 mb-4">
                                <button class="btn btn-primary btn-lg btn-block w-100" type="submit" name="login">
                                    Log in
                                </button>
                            </div>

                            <p class="small mb-5 pb-lg-2 text-center">
                                <a class="text-muted" href="#!">Forgot password?</a>
                            </p>
                            <p class="text-center">
                                Don't have an account?
                                <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#myModal">Register here</a>
                            </p>
                        </form>
                    </div>

                </div>

                <!-- Right Section: Image -->
                <div class="col-sm-6 px-0 d-none d-lg-block">
                    <img src="../assets/images/banner-login.jpg" alt="Login image" class="w-100 vh-100"
                        style="object-fit: cover; object-position: center;" />
                </div>
            </div>

            <!-- The Modal for Registration -->
            <div class="modal fade" id="myModal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Create an Account</h4>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                                <div class="form-group mb-4">
                                    <input type="text" id="register-username" class="form-control form-control-lg" name="username" required />
                                    <label class="form-label" for="register-username">Username</label>
                                </div>

                                <div class="form-group mb-4">
                                    <input type="password" id="register-password" class="form-control form-control-lg" name="pwd" required />
                                    <label class="form-label" for="register-password">Password</label>
                                </div>

                                <div class="form-group mb-4">
                                    <input type="password" id="confirm-password" class="form-control form-control-lg" name="confirm_password" required />
                                    <label class="form-label" for="confirm-password">Confirm Password</label>
                                </div>

                                <div class="pt-1 mb-4">
                                    <button class="btn btn-primary btn-lg btn-block w-100" type="submit" name="register">
                                        Register
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>


</html>