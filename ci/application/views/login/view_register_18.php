<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in (v2)</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/dist/plugins/fontawesome-free/css/all.min.css') ?> ">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/dist/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>  ">
    <!-- Theme style -->
    <link rel="stylesheet" href=" <?php echo base_url('assets/admin/dist/css/adminlte.min.css'); ?> ">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="../../index2.html" class="h1"><b>Register</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Register Your Account</p>
                <?php
                if (isset($pesan)) { ?>
                    <p style="color:red"> <?php echo $pesan ?></p>
                <?php } ?>

                <form action="<?= base_url('register_18/proses_register') ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="email" id='email' placeholder="Email">
                        <?php echo form_error('email', '<p>', '</p>') ?>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="namaPengguna" placeholder="Nama Pengguna">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <label for="peran">Peran : </label>
                        <select class="form-control" id="peran" name="peran">
                            <?php

                            foreach ($perans as $peran) :
                                // var_dump($perans);
                            ?>
                                <option value="<?php echo $peran->id_peran ?>"><?php echo $peran->nama_peran ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="konfirmPassword" placeholder="Konfirmasi Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <p class="mb-0">
                    <a href="<?php echo base_url('login_18') ?>" class="text-center">Sudah Punya Akun? Login di sini!</a>
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src=" <?= base_url('assets/admin/plugins/jquery/jquery.min.js') ?> "></script>
    <!-- Bootstrap 4 -->
    <script src=" <?= base_url('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') ?> "></script>
    <!-- AdminLTE App -->
    <script src=" <?= base_url('assets/admin/dist/js/adminlte.min.js') ?> "></script>
</body>

</html>