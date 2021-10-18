<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Latihan CRUD with CI3</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/checkout/">



    <!-- Bootstrap core CSS -->
    <link href="<?= base_url(" /assets/dist/css/bootstrap.min.css") ?>" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container">
        <main>
            <div class="py-5 text-center">
                <img class="d-block mx-auto mb-4" src="<?= base_url("/assets/brand/bootstrap-logo.svg") ?>" alt="" width="72" height="57">
                <h2>Tambah Berita</h2>
                <p class="lead">Silahkan melakukan penambahan data berita</p>
            </div>

            <div class="row g-5">
                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3">Tambah Berita</h4>
                    <form class="needs-validation" novalidate method="POST" action="<?= base_url('admin_18/proses_edit') ?>">
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="email" class="form-label">Judul Berita<span class="text-muted"></span></label>
                                <input type="text" class="form-control" id="judul_berita" name="judul_berita" placeholder="" value="<?php echo $title; ?>">
                            </div>

                            <div class="col-12">
                                <label for="address" class="form-label">isi berita</label>
                                <input type="text" class="form-control" id="isi_berita" name="isi_berita" placeholder="" value="<?php echo $text; ?>" required>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                        </div>
                        <button class="w-100 btn btn-primary btn-lg" type="submit">Edit data</button>
                    </form>
                </div>
            </div>
        </main>

        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">&copy; 2017–2021 Company Name</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Privacy</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Support</a></li>
            </ul>
        </footer>
    </div>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="form-validation.js"></script>
</body>

</html>