<?php include("config.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="./assets/logo BPSDMP.png" />
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.css" />
    <title>BPSDMP | Jawa Timur</title>
</head>

<body>
    <!-- navbar start -->
    <nav class="navbar navbar-expand-lg p-4 mx-4 fixed">
        <div class="container-fluid">
            <a class="navbar-brand fw-bolder" href="Index.php">
                <img src="./assets/logo BPSDMP.png" width="35px" height="auto" class="me-2" />
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
                        <a class="nav-link" href="About.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Social</a>
                    </li>
                    <li class="nav-item pt-1">
                        <a href="./authentication/AdminLogin.php" class="btn btn-outline-primary me-2 fw-bolder">Login here</a>
                    </li>
                    <li class="nav-item pt-1">
                        <a href="./authentication/AdminRegister.php" class="btn btn-success fw-bolder">Register here</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- navbar end -->

    <!-- hero start -->
    <div class="container">
        <div class="row d-flex">
            <div class="col-lg-6 align-self-center align-items-center justify-content-center">
                <h1 class="fw-bolder"><span style="color: #DF2E38;">BPSDMP </span>Provinsi Jawa Timur</h1>
                <h2 class="fw-semibold" style="color:#191825;">Lorem ipsum dolor sit amet consectetur adipisicing elit.</h2>
                <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi
                    accusantium hic corrupti nisi vitae adipisci incidunt, voluptas
                    beatae, maiores autem facilis repellendus eaque odit perferendis,
                    iste nobis nesciunt fuga? Similique.</span>
                <a href="About.php" class="btn btn-primary fw-bolder mt-4">Read more</a>
                <a href="About.php" class="btn btn-danger fw-bolder mt-4">Watch Articles</a>
            </div>
            <div class="col-lg-6">
                <img src="./assets/components/103206-people.gif" alt="People gif" width="500px" height="auto" />
            </div>
        </div>
    </div>
    <!-- hero end -->

    <!-- blockqoute start -->

    <div class="container">
        <figure class="text-start">
            <blockquote class="blockquote">
                <p class="fw-bolder" style="color:#191825">Rekap kegiatan BPSDMP Provinsi Jawa Timur.</p>
            </blockquote>
            <figcaption class="blockquote-footer">
                Someone famous in <cite title="Source Title">Source Title</cite>
            </figcaption>
        </figure>
    </div>

    <!-- blockqoute end -->

    <!-- rekap kegiatan -->
    <div class="container mt-4">
        <div class="row d-flex align-self-center align-items-center justify-content-center">
            <div class="col-md">
                <!-- card start -->
                <div class="card" style="width: 22rem;">
                    <img src="/assets/tambahan 2.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <button class="w-100 btn btn-primary">Read more</button>
                    </div>
                </div>
                <!-- card end -->
            </div>
            <div class="col-md">
                <!-- card start -->
                <div class="card" style="width: 22rem;">
                    <img src="/assets/tambahan.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <button class="w-100 btn btn-primary">Read more</button>
                    </div>
                </div>
                <!-- card end -->
            </div>
            <div class="col-md">
                <!-- card start -->
                <div class="card" style="width: 22rem;">
                    <img src="/assets/tambahan 3.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <button class="w-100 btn btn-primary">Read more</button>
                    </div>
                </div>
                <!-- card end -->
            </div>
        </div>
    </div>
    <!-- rekap kegiatan -->

    <!-- blockqoute start -->

    <div class="container mt-5">
        <figure class="text-start">
            <blockquote class="blockquote">
                <p class="fw-bolder" style="color:#191825">Article kegiatan BPSDMP Provinsi Jawa Timur.</p>
            </blockquote>
            <figcaption class="blockquote-footer">
                Someone famous in <cite title="Source Title">Source Title</cite>
            </figcaption>
        </figure>
    </div>

    <!-- blockqoute end -->


    <!-- article start -->
    <div class="container w-content">
        <div class="row align-items-center ">
            <div class="col align-self-center justify-content-start">
                <!-- card 1 -->
                <?php
                $sql = "SELECT * FROM articles";
                $query = mysqli_query($db, $sql);

                while ($article = mysqli_fetch_array($query)) {
                    echo "<div class='card card-article'>";
                    echo "<img class='card-img-top img-article' src='/assets/$article[gambar]'";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title overflow'>$article[judul] </h5>";
                    echo "<p class='card-text overflow pt-2'>$article[konten]</p>";
                    echo "<br />";
                    echo "<ahref='/About.php?id=" . $article['id'] . "' class='btn btn-primary btn-article'>Read more</a>";
                    echo "</div>";
                    echo "</div>";
                }

                ?>
            </div>

        </div>
    </div>
    <!-- article end -->

    <div class="border"></div>
    <!-- footer start -->
    <footer class="bg-light text-center text-lg-start">
        <!-- Grid container -->
        <div class="container p-4">
            <!--Grid row-->
            <div class="row">
                <!--Grid column-->
                <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase">BPSDMP Jawa Timur</h5>

                    <p>
                        Balai Pengembangan Sumber Daya Manusia dan Penelitian Komunikasi dan Informatika Surabaya
                        Badan Penelitian dan Pengembangan Sumber Daya Manusia - Kementerian Komunikasi dan Informatika Republik Indonesia
                    </p>
                    <p>
                        Alamat: Jl. Raya Ketajen No.36, Ketajen, Kec. Gedangan, Kabupaten Sidoarjo, Jawa Timur 61254
                        Telepon: (031) 8011944
                        Provinsi: Jawa Timur
                    </p>
                </div>
                <!--Grid column-->

                <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Contact</h5>

                    <p>Whatsapp : -</p>
                    <p>Facebook : -</p>

                    <p>Twitter : -</p>
                    <p>Another Contact : -</p>
                </div>

            </div>
            <!--Grid row-->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3 bg-primary fw-bolder">
            © 2020 Copyright:
            <a class="text-light" href="https://mdbootstrap.com/">MDBootstrap.com</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- footer end -->



    <script src="./bootstrap/js/bootstrap.js"></script>
</body>

<style>
    .card-article {
        max-width: 30rem;
        max-height: auto;
        padding-bottom: 20px;
        margin-bottom: 50px;
    }

    .card-title {
        margin-top: 20px;
        padding: 6px 20px;
        font-size: 23px;
        font-weight: 700;
    }

    .card-text {
        padding: 6px 20px;
        font-size: 20px;
        color: grey;
        font-weight: lighter;
    }

    .img-article {
        max-width: 100%;
        width: cover;
        height: auto;
    }

    .btn-article {
        margin: auto;
        max-width: 300px;
        font-size: 20px;
        font-weight: 700;
        width: 100%;
    }

    .overflow {
        overflow: hidden;
        text-overflow: ellipsis;
        -webkit-line-clamp: 4;
        -webkit-box-orient: vertical;
        display: -webkit-box;
        word-break: break-word;
    }

    .border {
        color: black;
    }

    * {
        font-family: "Lato", sans-serif;
    }
</style>

</html>