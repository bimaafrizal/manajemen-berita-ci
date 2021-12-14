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
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link href="https://cdn.datatables.net/rowreorder/1.2.7/css/rowReorder.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.dataTables.min.css" rel="stylesheet" type="text/css" />

    <!-- Required datatable js -->
    <script src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
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
                        <h1>List User</h1>
                        <p class="lead">Ini adalah daftar user yang tersedia.</p>
                        <p>Silakan lakukan manajemen user yang ada dalam list di bawah ini</p>
                        <button type="button" class="btn btn-primary" id="tombolTambah" data-toggle="modal" data-target="#addUser">
                            <i class="fa fa-plus-circle"></i> Tambah Akun
                        </button>
                        <div class="row mb-3">
                        </div>
                        <div class="row mb-3">
                            <div class="col-2 themed-grid-col">#</div>
                            <div class="col-2 themed-grid-col">User</div>
                            <div class="col-2 themed-grid-col">Password</div>
                            <div class="col-2 themed-grid-col">Nama Pengguna</div>
                            <div class="col-2 themed-grid-col">Is Aktif</div>
                            <div class="col-2 themed-grid-col">AKSI</div>
                        </div>
                        <?php
                        foreach ($datas as $data) {
                        ?>
                            <div class="row mb-3">
                                <div class="col-2 themed-grid-col"> <?php echo $data->id_user; ?> </div>
                                <div class="col-2 themed-grid-col"> <?php echo $data->user; ?> </div>
                                <div class="col-2 themed-grid-col"> <?php echo $data->password; ?> </div>
                                <div class="col-2 themed-grid-col"> <?php echo $data->nama_pengguna; ?> </div>
                                <div class="col-2 themed-grid-col"> <?php echo $data->is_aktif; ?> </div>
                                <div class="col-2 themed-grid-col">
                                    <a class="btn btn-warning" href="<?= base_url('manage_admin_18/edit_user/' . $data->id_user) ?>" role="button">Edit</a>
                                    <a class="btn btn-danger" href="<?= base_url('manage_admin_18/hapus_user/' . $data->id_user) ?>" role="button">Hapus</a>
                                </div>
                            </div>

                        <?php } ?>
                    </div>
                </div>
            </div>
        </main>
        <div class="viewmodal" style="display: none;"></div>
</body>

</html>

<div id="addUser" class="modal fade">
    <div class="modal-dialog">
        <form action="post" id="user_form">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Pendaftaran</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <label for="email" class="col-sm-6 col-form-label">Email</label>
                    <input type="text" name="email" id="email" class="form-control">
                    <br>
                    <label for="namaPengguna" class="col-sm-6 col-form-label">Nama Pengguna</label>
                    <input type="text" name="namaPengguna" id="namaPengguna" class="form-control">
                    <br>
                    <label for="peran" class="col-sm-6 col-form-label">Peran</label>
                    <select class="form-control" id="peran" name="peran">
                        <option value="1"> Admin </option>
                        <option value="2"> Contributtor </option>
                    </select>
                    <br>
                    <label for="password" class="col-sm-6 col-form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                    <br>
                    <label for="konfirmPass" class="col-sm-6 col-form-label">Konfirm Password</label>
                    <input type="password" name="konfirmPass" id="konfirmPass" class="form-control">
                </div>
                <div class="modal-footer">
                    <input type="submit" name="daftar" class="btn btn-success" value="Add">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>

            </div>
        </form>
    </div>

</div>

<script type="text/javascript" language="javascript">
    $(document).ready(function() {
        $(document).on('submit', '#user_form', function(event) {
            event.preventDefault();
            var email = $('#email').val();
            var namaPengguna = $('#namaPengguna').val();
            var peran = $('#peran').val();
            var password = $('#password').val();
            var konfirmPass = $('#konfirmPass').val();


            if ((email != '') && (namaPengguna != '') && (password != '') && (konfirmPass != '')) {
                if (password == konfirmPass) {
                    $.ajax({
                        url: "<?php echo base_url('manage_admin_18/pendaftaran') ?>",
                        method: 'POST',
                        data: new FormData(this),
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            alert(data);
                            $('#user_form')[0].reset();
                            $('#addUser').modal('hide');
                        }
                    })
                } else {
                    alert('password dan konfirmasi password harus sama')
                }
            } else {
                alert("Semua form harus diisi");
            }
        });
    });
</script>