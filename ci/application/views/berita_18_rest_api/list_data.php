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
                        <h1>List Berita</h1>
                        <p class="lead">Ini adalah daftar Berita yang tersedia.</p>
                        <p>Silakan lakukan manajemen Berita yang ada dalam list di bawah ini</p>

                        <div class="row mb-3">
                            <div class="card-footer clearfix">
                                <a href="<?= base_url('Berita_18_rest_api/tambah_berita') ?>" role="button" class="btn btn-sm btn-info float-left">Tambah Berita</a>
                            </div>
                            <div class="col-2">
                                <input type="text" name="kategori" autofocus placeholder="cari kategori" autocomplete="off" id="kategori">
                            </div>
                            <div class="col-2">
                                <input type="text" name="judul" autofocus placeholder="cari judul" autocomplete="off" id="judul">

                            </div>
                            <col-2>
                            </col-2>
                            <col-2>
                            </col-2>
                            <div class="col-2 themed-grid-col">#</div>
                            <div class="col-2 themed-grid-col">Judul Berita</div>
                            <div class="col-2 themed-grid-col">Isi Berita</div>
                            <div class="col-2 themed-grid-col">Tanggal</div>
                            <div class="col-2 themed-grid-col">AKSI</div>
                        </div>
                        <?php
                        $i = 1;
                        foreach ($databerita as $berita) {

                            // var_dump($beritas);
                            // die;
                        ?>
                            <div class="row mb-3">
                                <div class="col-2 themed-grid-col"> <?php echo $i; ?> </div>
                                <div class="col-2 themed-grid-col"> <?php echo $berita['judul_berita']; ?> </div>
                                <div class="col-2 themed-grid-col"> <?php echo $berita['isi_berita']; ?> </div>
                                <div class="col-2 themed-grid-col"> <?= date('d F Y', $berita['tanggal']); ?> </div>
                                <div class="col-2 themed-grid-col">
                                    <a class="btn btn-warning" href="<?= base_url('Berita_18_rest_api/edit_berita/' . $i); ?>" role="button">Edit</a>
                                    <a class="btn btn-danger" href="<?= base_url('Berita_18_rest_api/hapus/' . $berita['id_berita']); ?>" role="button">Hapus</a>
                                </div>
                            </div>

                        <?php $i++;
                        } ?>
                        <ul>
                            <?php echo $this->pagination->create_links(); ?>
                        </ul>
                    </div>
                </div>
            </div>
        </main>
</body>

</html>

<script>
    var kategori = document.getElementById('kategori');
    var judul = document.getElementById('judul');

    [kategori, judul].forEach((element) => {
        element.addEventListener('keyup', function() {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    container.innerHTML = xhr.responseText;
                }
            }
            xhr.open('GET', 'newindex.php?kategori=' + element.value, true);
            xhr.send();
        });
    });
</script>