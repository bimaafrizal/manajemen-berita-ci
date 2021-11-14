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
                <div class="row justify-content-center">
                    <div class="col-md">
                        <h1>Manajemen Hak Akses Peran</h1>
                        <p class="lead">Ini adalah daftar user dan peran yang tersedia.</p>
                        <p>Silakan lakukan manajemen user dan peran yang ada dalam list di bawah ini</p>

                        <div class="row mb-3">
                            <div class="col-2 themed-grid-col">#</div>
                            <div class="col-2 themed-grid-col">ID User</div>
                            <div class="col-2 themed-grid-col">Nama User</div>
                            <div class="col-2 themed-grid-col">ID Peran</div>
                            <div class="col-2 themed-grid-col">Nama Peran</div>
                            <div class="col-2 themed-grid-col">Aksi</div>
                        </div>
                        <?php
                        foreach ($users as $user) {
                        ?>
                            <div class="row mb-3">
                                <div class="col-2 themed-grid-col"> <?php echo $user['id_trx_peran']; ?> </div>
                                <div class="col-2 themed-grid-col"> <?php echo $user['id_user']; ?> </div>
                                <div class="col-2 themed-grid-col"> <?php echo $user['user']; ?> </div>
                                <div class="col-2 themed-grid-col"> <?php echo $user['id_peran']; ?> </div>
                                <div class="col-2 themed-grid-col"> <?php echo $user['nama_peran']; ?> </div>
                                <div class="col-2 themed-grid-col">
                                    <a class="btn btn-warning" href="<?= base_url('manage_admin_18/edit_userDalamPeran/' . $user['id_user']) ?>" role="button"> Edit </a>
                                </div>
                            </div>

                        <?php } ?>
                    </div>
                </div>
            </div>
        </main>
</body>