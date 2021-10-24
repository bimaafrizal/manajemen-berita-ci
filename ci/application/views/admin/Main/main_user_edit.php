<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- general form elements -->
            <div class="card card-primary">
                <!-- /.card-header -->
                <!-- form start -->
                <form class="needs-validation" novalidate method="POST" action="<?= base_url('manage_admin_18/proses_edit_user') ?>">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Username</label>
                            <input type="text" class="form-control" id="user" name="user" placeholder="username(email anada)" value="<?= $user ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="keep your password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama Pengguna</label>
                            <input type="text" class="form-control" id="namaPengguna" name="namaPengguna" placeholder="Nama Anda" value="<?= $nama_pengguna ?>">
                        </div>
                        <!-- <div class="form-group">
                            <label for="exampleInputPassword1">Peran</label>
                            <select class="form-control" id="peran" name="peran">
                                <?php

                                //foreach ($perans as $peran) :
                                // var_dump($perans);
                                // die;
                                ?>
                                    <option value="<?php //echo $peran->id_peran 
                                                    ?>"><?php //echo $peran->nama_peran 
                                                        ?></option>
                                <?php //endforeach; 
                                ?>
                            </select>
                        </div> -->
                        <div class="form-group">
                            <label for="exampleInputPassword1">Is Aktif</label>
                            <input type="text" class="form-control" id="is_aktif" name="is_aktif" placeholder="IS Aktif" value="<?= $is_aktif ?>">
                        </div>
                        <input type="hidden" name="id_user" value="<?php echo $id_user; ?>" />
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
    </section>
    <!-- /.content -->
</div>
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->