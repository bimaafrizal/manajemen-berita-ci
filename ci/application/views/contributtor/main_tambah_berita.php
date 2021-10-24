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
                <form class="needs-validation" novalidate method="POST" action="<?= base_url('manage_contributor_18/proses_tambah_berita') ?>">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Judul Berita</label>
                            <input type="text" class="form-control" id="judul_berita" name="judul_berita" placeholder="Judul Berita">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Isi berita</label>
                            <input type="text" class="form-control" id="isi_berita" name="isi_berita" placeholder="Isi berita">
                        </div>
                        <div class="form-group">
                            <label for="peran">Kategori : </label>
                            <select class="form-control" id="kategori" name="kategori">
                                <?php

                                foreach ($kategoris as $kategori) :
                                    // var_dump($perans);
                                ?>
                                    <option value="<?php echo $kategori->id_kategori ?>"><?php echo $kategori->nama_kategori ?></option>
                                <?php endforeach; ?>
                            </select>
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