<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Peran</h1>
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
                <form class="needs-validation" novalidate method="POST" action="<?= base_url('manage_admin_18/proses_edit_userDalamPeran') ?>">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama User</label>
                            <input type="text" class="form-control" id="user" name="user" placeholder="user" value="<?= $user ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="peran">Peran : </label>
                            <select class="form-control" id="peran" name="peran">
                                <option value="1">Admin</option>
                                <option value="2">Contrbutor</option>
                            </select>
                        </div>
                        <input type="hidden" name="id_trx_peran" value="<?php echo $id_trx_peran; ?>" />
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