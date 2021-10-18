<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Grid Template · Bootstrap v5.1</title>

    <link rel="canonical" href=" <?= base_url('https://getbootstrap.com/docs/5.1/examples/grid/')  ?>">



    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('assets/dist/css/bootstrap.min.css') ?>" rel="stylesheet">

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
    <link href="<?= base_url('assets/css/grid.css') ?>" rel="stylesheet">
</head>

<body class="py-4">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <main>
            <div class="container">

                <h1>List Berita Terkini</h1>
                <p class="lead">Ini merupakan data berita yang ada dalam sistem ini.</p>
                <p>Silakan lakukan manajemen berita yang ada dalam list di bawah ini</p>

                <div class="card-footer clearfix">
                    <a href="<?= base_url('admin_18/tambah_berita') ?>" role="button" class="btn btn-sm btn-info float-left">Tambah Berita</a>
                </div>

                <div class="row mb-3">
                    <div class="col-3 themed-grid-col">ID BERITA</div>
                    <div class="col-3 themed-grid-col">JUDUL BERITA</div>
                    <div class="col-3 themed-grid-col">ISI BERITA</div>
                    <div class="col-3 themed-grid-col">AKSI</div>
                </div>
                <?php
                foreach ($isi_berita as $news) {
                ?>

                    <div class="row mb-3">
                        <div class="col-3 themed-grid-col"> <?php echo $news->id; ?> </div>
                        <div class="col-3 themed-grid-col"> <?php echo $news->title; ?> </div>
                        <div class="col-3 themed-grid-col"> <?php echo $news->text; ?> </div>
                        <div class="col-3 themed-grid-col">
                            <a class="btn btn-warning" href="<?= base_url('admin_18/edit_berita/' . $news->id) ?>" role="button">Edit</a>
                            <a class="btn btn-danger" href="<?= base_url('admin_18/hapus_berita/' . $news->id) ?>" role="button">Hapus</a>
                        </div>
                    </div>

                <?php } ?>
            </div>
        </main>



</body>

</html>