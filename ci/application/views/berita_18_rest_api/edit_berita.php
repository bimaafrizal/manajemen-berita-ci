<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Checkout example · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/checkout/">



    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('/assets/dist/css/bootstrap.min.css') ?>" rel="stylesheet">

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
                <img class="d-block mx-auto mb-4" src="<?= base_url('/assets/brand/bootstrap-logo.svg') ?>" alt="" width="72" height="57">
                <h2>Tambah Berita</h2>
                <p class="lead">Silahkan melakukan penambahan berita sesuai dengan kebutuhan berita.</p>
            </div>

            <div class="row g-5">
                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3">Tambah Berita</h4>
                    <form class="needs-validation" novalidate method="post" action="<?= base_url('Berita_18_rest_api/edit_berita') ?>">
                        <div class="row g-3">
                            <div class="col-sm-12">
                                <label for="firstName" class="form-label">Judul Berita</label>
                                <input type="text" class="form-control" id="judul_berita" name="judul_berita" placeholder="" value="<?php echo $databerita[$this->uri->segment(3) - 1]->judul_berita; ?>" required>
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <label for="firstName" class="form-label">Isi Berita</label>
                                <textarea type="text" class="form-control" id="isi_berita" name="isi_berita" placeholder="" required><?php echo $databerita[$this->uri->segment(3) - 1]->isi_berita; ?></textarea>
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                            <input type="hidden" name="id_berita" value="<?php echo $databerita[$this->uri->segment(3) - 1]->id_berita; ?>" />


                            <button class="w-100 btn btn-primary btn-lg" type="submit">Edit Berita</button>
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


    <script src="<?= base_url('/assets/dist/js/bootstrap.bundle.min.js') ?>"></script>

    <script src="form-validation.js"></script>
</body>

</html>