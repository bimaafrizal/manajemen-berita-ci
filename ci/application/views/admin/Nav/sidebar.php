<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src=" <?= base_url('assets/admin/dist/img/AdminLTELogo.png') ?> " alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src=" <?= base_url('assets/admin/dist/img/user2-160x160.jpg') ?> " class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"> <?= $_SESSION['nama_pengguna'] ?> </a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header"> Dashboard </li>
                <li class="nav-item">

                    <?php $id_user = $this->session->userdata('id_user');
                    $queryNamaMenu = "SELECT `id_peran` FROM `trx_peran` WHERE `id_user` = $id_user ";
                    $menuMain = $this->db->query($queryNamaMenu)->row_array();
                    $peran = $menuMain['id_peran'];
                    if ($peran == 1) {
                    ?>
                        <select class="form-control" name="jenis_menu" onchange="jenisMenu(this)" id="jenis_menu" placeholder="">
                            <option>Pilih Jenis Menu</option>
                            <option value="KELOLA_USER">Kelola User</option>
                            <option value="KELOLA_MENU">Kelola Menu</option>>
                        </select>
                        <?php foreach ($menus as $menu) { ?>

                            <div id="<?php echo $menu['kelompok_menu'] ?>" style="display:none">
                                <a href="<?= base_url($menu['url']) ?>" class="nav-link">
                                    <i class="<?= $menu['icon'] ?>"></i>
                                    <p class="text"><?= $menu['nama_menu'] ?></p>
                                </a>
                            </div>
                        <?php } ?>

                    <?php } else { ?>
                        <?php foreach ($menus as $menu) { ?>
                            <div id="<?php echo $menu['kelompok_menu'] ?>">
                                <a href="<?= base_url($menu['url']) ?>" class="nav-link">
                                    <i class="<?= $menu['icon'] ?>"></i>
                                    <p class="text"><?= $menu['nama_menu'] ?></p>
                                </a>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('login_18/logout') ?>" class="nav-link">
                        <i class="fas fa-sign-in-alt"></i>
                        <p class="text">Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<script>
    function jenisMenu(that) {
        if (that.value == "KELOLA_USER") {
            document.getElementById("1").style.display = "block";
            document.getElementById("2").style.display = "block";
            document.getElementById("3").style.display = "block";
            document.getElementById("4").style.display = "none";
            document.getElementById("5").style.display = "none";
        } else if (that.value == "KELOLA_MENU") {
            document.getElementById("1").style.display = "none";
            document.getElementById("2").style.display = "none";
            document.getElementById("3").style.display = "none";
            document.getElementById("4").style.display = "block";
            document.getElementById("5").style.display = "block";
        } else {
            document.getElementById("1").style.display = "none";
            document.getElementById("2").style.display = "none";
            document.getElementById("3").style.display = "none";
            document.getElementById("4").style.display = "none";
            document.getElementById("5").style.display = "none";
        }
    }
</script>