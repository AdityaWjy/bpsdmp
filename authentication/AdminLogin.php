<!-- Login logic -->
<?php

require_once("../configAdmin.php");


if (isset($_POST['login'])) {

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $sql = "SELECT * FROM users WHERE username=:username OR email=:email";
    $stmt = $db->prepare($sql);

    // bind parameter

    $params = array(
        ":username" => $username,
        ":email" => $username
    );

    $stmt->execute($params);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // jika user terdaftar
    if ($user) {
        // verif password
        if (password_verify($password, $user["password"])) {
            // buat session
            session_start();
            $_SESSION["user"] = $user;
            // login sukses, alihkan halaman
            header("Location: ../crud/AdminIndex.php");
        }
    } else {

        echo '<script type ="text/JavaScript">';
        echo 'alert(" Silahkan Register ")';
        echo '</script>';
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/assets/logo BPSDMP.png" />
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.css" />
    <title>BPSDMP | Jawa Timur</title>
</head>

<body style="padding-bottom:100px;">
    <!-- navbar start -->
    <nav class="navbar navbar-expand-lg p-4 mx-4 fixed">
        <div class="container-fluid">
            <a class="navbar-brand fw-bolder" href="Index.php">
                <img src="/assets/logo BPSDMP.png" width="35px" height="auto" class="me-2" />
                BPSDMP</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 fs-5 fw-bolder">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../Index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/About.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Social</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- navbar end -->

    <!-- hero login start -->
    <div class="container px-5">
        <div class="row d-flex align-self-center align-items-center justify-content-center">
            <div class="col me-5">
                <form action="" method="POST">
                    <div class="text-center">
                        <img src="/assets/components/profile.png" alt="profile img" width="150px" height="auto">
                    </div>

                    <!-- Email input -->
                    <label class="form-label" for="username">Admin Username</label>
                    <div class="form-outline mb-4">
                        <input type="text" name="username" class="form-control form-control-lg" />

                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="password">Admin Password</label>
                        <input type="password" name="password" class="form-control form-control-lg" />
                    </div>

                    <div class="d-flex justify-content-around align-items-center mb-4">
                        <!-- Checkbox -->
                        <div class="form-check me-auto">
                            <input class="form-check-input" type="checkbox" value="" checked />
                            <label class="form-check-label" for="remember">
                                Remember me
                            </label>
                        </div>
                    </div>

                    <!-- Submit button -->
                    <input type="submit" class="btn btn-primary btn-lg btn-block w-100 mb-3 fw-bolder" name="login" value="Sign In">
                    </input>
                    <span>Don't have an account?</span>
                    <a href="AdminRegister.php" class="btn btn-danger btn-lg btn-block w-100 mt-3 fw-bolder">
                        Sign Up
                    </a>
                </form>
            </div>
            <div class="col">
                <img src="/assets/components/81153-admin.gif" alt="admin people gif" width="500px">
            </div>
        </div>
    </div>
    <!-- hero login end -->

    <script src="/bootstrap/js/bootstrap.js"></script>
</body>

<style>
    * {
        font-family: "Lato", sans-serif;
    }
</style>

</html>