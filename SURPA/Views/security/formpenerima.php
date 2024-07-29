<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("location: index.php?page=login");
    exit;
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="Views/css/login.css">

<body>

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row border rounded-5 p-3 bg-light shadow box-area">
            <div class="col-md-6 d-flex justify-content-center align-items-center flex-column left-box">
                <div class="featured-image mb-3">
                    <img src="Views/assets/tofi.png" class="img-fluid" style="width: 180px;">
                </div>
            </div>
            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-4">
                        <h2> SELAMAT DATANG</h2>
                        <p>silahkan masukkan username dan password anda</p>
                    </div>
                    <!-- LOGIN BOSQ -->
                    <form action="Controllers/login.php" method="POST">
                        <div class="input-group mb-3">
                            <input type="text" name="username" class="form-control form-control-lg bg-light fs-6" placeholder="Username">
                        </div>
                        <div class="input-group mb-1">
                            <input type="password" name="password" class="form-control form-control-lg bg-light fs-6" placeholder="Password">
                        </div>
                        <div class="input-group mb-5 d-flex justify-content-between">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="remember" id="remember">
                                <label for="remember" class="form-check-label text-secondary"><small>Remember Me</small></label>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <button type="submit" name="login" class="btn btn-lg btn-primary w-100 fs-6">Login</button>
                        </div>

                        <?php if (isset($error)) : ?>
                            <p style="color: red; font-style: italic;">username / password salah</p>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>