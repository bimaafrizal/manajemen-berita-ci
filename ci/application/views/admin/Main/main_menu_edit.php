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
                <form class="needs-validation" novalidate method="POST" action="<?= base_url('manage_admin_18/proses_edit_menu') ?>">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama Menu</label>
                            <input type="text" class="form-control" id="nama_menu" name="nama_menu" placeholder="Nama Menu" value="<?= $nama_menu ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Url</label>
                            <input type="text" class="form-control" id="url" name="url" placeholder="url menu" value="<?= $url ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Icon</label>
                            <input type="text" class="form-control" id="icon" name="icon" placeholder="Your Icon" value="<?= $icon ?>">
                        </div>
                        <input type="hidden" name="id_menu" value="<?php echo $id_menu; ?>" />
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