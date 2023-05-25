<!-- logic register -->

<?php

require_once("../configAdmin.php");

if (isset($_POST['register'])) {

    // filter data yang diinputkan
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    // enkripsi password
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // menyiapkan query
    $sql = "INSERT INTO users (username, email, password ) 
            VALUES (:username, :email, :password)";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        ":username" => $username,
        ":email" => $email,
        ":password" => $password,
    );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman login
    if ($saved) header("Location: AdminLogin.php");
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

<body style="padding-bottom:100px">
    <!-- navbar start -->
    <nav class="navbar navbar-expand-lg p-4 mx-4 mb-2 fixed">
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
                        <a class="nav-link active" aria-current="page" href="Index.php">Home</a>
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

    <!-- hero register -->
    <div class="container">
        <div class="row">
            <div class="col">
                <img src="/assets/components/124648-administracao.gif" alt="register" width="600px">
            </div>
            <div class="col">
                <form action="" method="POST">
                    <div class="text-center mb-3">
                        <span class="fs-2">Admin Registration</span>
                    </div>

                    <!-- Username Input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="username">Username</label>
                        <input type="text" name="username" placeholder="admin username" class="form-control form-control-lg" required />

                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="email">Email address</label>
                        <input type="email" name="email" placeholder="example@gmail.com" class="form-control form-control-lg" required />

                    </div>

                    <!-- Password input -->
                    <label class="form-label" for="password">Password</label>
                    <div class="form-outline mb-4">
                        <input type="password" name="password" id="password" class="form-control form-control-lg" required />

                    </div>

                    <div class="d-flex justify-content-around align-items-center mb-4">
                        <!-- Checkbox -->
                        <div class="form-check me-auto">
                            <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                            <label class="form-check-label" for="form1Example3">
                                Saya bertanggung jawab penuh.
                            </label>
                        </div>

                    </div>

                    <!-- Submit button -->
                    <input type="submit" class="btn btn-primary btn-lg btn-block w-100 mb-3 fw-bolder" value="Sign Up" name="register">
                    </input>
                    <span class="">have an account?</span>
                    <a href="AdminLogin.php" class="btn btn-danger btn-lg btn-block w-100 mt-3 fw-bolder">
                        Sign In
                    </a>
                </form>
            </div>
        </div>
    </div>
    <!-- hero register -->
</body>

</html>