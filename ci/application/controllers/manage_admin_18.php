<?php
class Manage_admin_18 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_18');
    }

    //crud peran
    public function edit_user($id)
    {
        $data_perans['perans'] = $this->Admin_18->get_perans();

        $id_peran = 1;
        $querymenu = "SELECT * FROM `trx_menu` INNER JOIN `menu` ON `trx_menu`.`id_menu` = `menu`.`id_menu` WHERE `trx_menu`.`id_peran` = $id_peran";
        $menu['menus'] = $this->db->query($querymenu)->result_array();

        $row = $this->Admin_18->ambil_id_user($id);
        // var_dump($row);
        // die;

        if ($row) {
            $data = array(
                'id_user' => $row->id_user,
                'user' => $row->user,
                'password' => $row->password,
                'nama_pengguna' => $row->nama_pengguna,
                'is_aktif' => $row->is_aktif
            );
        }
        $this->load->view('admin/Nav/header2');
        $this->load->view('admin/Nav/sidebar', $menu);
        $this->load->view('admin/Main/main_user_edit', $data, $data_perans);
        $this->load->view('admin/Nav/footer');
    }
    public function proses_edit_user()
    {
        $user = $this->input->post('user');
        $password = $this->input->post('password');
        $namaPengguna = $this->input->post('namaPengguna');
        $is_aktif = $this->input->post('is_aktif');
        $password2 = $this->session->userdata('password');

        if (($user != '') and ($namaPengguna != '') and ($is_aktif != '')) {
            if ($password == '') {
                $data = [
                    'user' => $user,
                    'password' => $password2,
                    'nama_pengguna' => $namaPengguna,
                    'is_aktif' => $is_aktif
                ];

                $this->Admin_18->edit_user($data);
                // var_dump($data);
                // die;
                redirect('zone_admin_18');
            } else {
                $data = [
                    'user' => $user,
                    'password' => $password,
                    'nama_pengguna' => $namaPengguna,
                    'is_aktif' => $is_aktif
                ];

                $this->Admin_18->edit_user($data);
                // var_dump($data);
                // die;
                redirect('zone_admin_18');
            }
        } else {
            redirect('zone_admin_18');
        }
    }
    public function hapus_user($id)
    {
        $this->Admin_18->ambil_id_user($id);
        $this->Admin_18->delete_user($id);

        redirect('zone_admin_18');
    }

    //crud peran
    public function peran_18()
    {
        //$session['a'] = $this->session->userdata();
        $id_peran = 1;
        $querymenu = "SELECT * FROM `trx_menu` INNER JOIN `menu` ON `trx_menu`.`id_menu` = `menu`.`id_menu` WHERE `trx_menu`.`id_peran` = $id_peran";
        $menu['menus'] = $this->db->query($querymenu)->result_array();

        $dataPeran = $this->Admin_18->ambil_data_peran();
        $arrayDataPeran = array(
            'datas' => $dataPeran
        );

        $this->load->view('admin/Nav/header2');
        $this->load->view('admin/Nav/sidebar', $menu);
        $this->load->view('admin/Main/main_peran', $arrayDataPeran);
        $this->load->view('admin/Nav/footer');
    }
    public function edit_peran($id)
    {
        $id_peran = 1;
        $querymenu = "SELECT * FROM `trx_menu` INNER JOIN `menu` ON `trx_menu`.`id_menu` = `menu`.`id_menu` WHERE `trx_menu`.`id_peran` = $id_peran";
        $menu['menus'] = $this->db->query($querymenu)->result_array();

        $row = $this->Admin_18->ambil_data_id_peran($id);
        // var_dump($row);
        // die;

        if ($row) {
            $data = array(
                'id_peran' => $row->id_peran,
                'nama_peran' => $row->nama_peran,
                'url' => $row->url
            );
        }

        $this->load->view('admin/Nav/header2');
        $this->load->view('admin/Nav/sidebar', $menu);
        $this->load->view('admin/Main/main_peran_edit', $data);
        $this->load->view('admin/Nav/footer');
    }
    public function proses_edit_peran()
    {
        $url = $this->input->post('url');

        if ($url != '') {

            $data = [
                'url' => $url,
            ];

            $this->Admin_18->edit_peran($data);
            // var_dump($data);
            // die;
            redirect('zone_admin_18');
        } else {
            redirect('zone_admin_18');
        }
    }

    //crud menu
    public function menu_18()
    {
        //$session['a'] = $this->session->userdata();
        $id_peran = 1;
        $querymenu = "SELECT * FROM `trx_menu` INNER JOIN `menu` ON `trx_menu`.`id_menu` = `menu`.`id_menu` WHERE `trx_menu`.`id_peran` = $id_peran";
        $menu['menus'] = $this->db->query($querymenu)->result_array();

        $dataMenu = $this->Admin_18->ambil_semua_menu();
        $arrayDataMenu = array(
            'datas' => $dataMenu
        );

        $this->load->view('admin/Nav/header2');
        $this->load->view('admin/Nav/sidebar', $menu);
        $this->load->view('admin/Main/main_menu', $arrayDataMenu);
        $this->load->view('admin/Nav/footer');
    }
    public function edit_menu($id)
    {
        $id_peran = 1;
        $querymenu = "SELECT * FROM `trx_menu` INNER JOIN `menu` ON `trx_menu`.`id_menu` = `menu`.`id_menu` WHERE `trx_menu`.`id_peran` = $id_peran";
        $menu['menus'] = $this->db->query($querymenu)->result_array();

        $row = $this->Admin_18->ambil_data_id_menu($id);
        // var_dump($row);
        // die;

        if ($row) {
            $data = array(
                'id_menu' => $row->id_menu,
                'nama_menu' => $row->nama_menu,
                'url' => $row->url,
                'nomor_urut' => $row->nomor_urut,
                'icon' => $row->icon
            );
        }

        $this->load->view('admin/Nav/header2');
        $this->load->view('admin/Nav/sidebar', $menu);
        $this->load->view('admin/Main/main_menu_edit', $data);
        $this->load->view('admin/Nav/footer');
    }
    public function proses_edit_menu()
    {

        $nama_menu = $this->input->post('nama_menu');
        $url = $this->input->post('url');
        $nomor_urut = $this->input->post('nomor_urut');
        $icon = $this->input->post('icon');

        if (($nama_menu != '') and ($url != '') and ($nomor_urut != '') and ($icon != '')) {
            $data = [
                'nama_menu' => $nama_menu,
                'url' => $url,
                'nomor_urut' => $nomor_urut,
                'icon' => $icon
            ];

            // var_dump($data);
            // die;
            $this->Admin_18->edit_menu($data);

            redirect('manage_admin_18/menu_18');
        } else {
            redirect('manage_admin_18');
        }
    }
    public function tambah_menu()
    {
    }
    public function hapus_menu($id)
    {
        $this->Admin_18->ambil_data_id_menu($id);
        $this->Admin_18->delete_menu($id);

        redirect('zone_admin_18');
    }


    public function menuDalamPeran_18()
    {
        //$session['a'] = $this->session->userdata();
        $id_peran = 1;
        $querymenu = "SELECT * FROM `trx_menu` INNER JOIN `menu` ON `trx_menu`.`id_menu` = `menu`.`id_menu` WHERE `trx_menu`.`id_peran` = $id_peran";
        $menu['menus'] = $this->db->query($querymenu)->result_array();

        $queryNamaMenu = "SELECT * FROM `peran` INNER JOIN `trx_menu` ON `trx_menu`.`id_peran` = `peran`.`id_peran`
        INNER JOIN `menu` ON `menu`.`id_menu` = `trx_menu`.`id_menu`";
        $menuMain['menus2'] = $this->db->query($queryNamaMenu)->result_array();

        // $arrayDataTrxPeran = array(
        //     'datas' => $
        // );

        $this->load->view('admin/Nav/header2');
        $this->load->view('admin/Nav/sidebar', $menu);
        $this->load->view('admin/Main/main_menuDalamPeran', $menuMain);
        $this->load->view('admin/Nav/footer');
    }
    public function userDalamPeran_18()
    {
        //$session['a'] = $this->session->userdata();
        $id_peran = 1;
        $querymenu = "SELECT * FROM `trx_menu` INNER JOIN `menu` ON `trx_menu`.`id_menu` = `menu`.`id_menu` WHERE `trx_menu`.`id_peran` = $id_peran";
        $menu['menus'] = $this->db->query($querymenu)->result_array();

        // $dataTrxMenu = $this->Admin_18->ambil_semua_trx_peran();
        // $arrayDataTrxMenu = array(
        //     'datas' => $dataTrxMenu
        // );

        $queryNamaUser = "SELECT * 
        FROM `peran` 
        INNER JOIN `trx_peran` ON `trx_peran`.`id_peran` = `peran`.`id_peran`
        INNER JOIN `user` ON `user`.`id_user` = `trx_peran`.`id_user`";
        $menuUser['users'] = $this->db->query($queryNamaUser)->result_array();

        $this->load->view('admin/Nav/header2');
        $this->load->view('admin/Nav/sidebar', $menu);
        $this->load->view('admin/Main/main_userDalamPeran', $menuUser);
        $this->load->view('admin/Nav/footer');
    }

    public function edit_userDalamPeran($id)
    {
        $id_peran = 1;
        $querymenu = "SELECT * FROM `trx_menu` INNER JOIN `menu` ON `trx_menu`.`id_menu` = `menu`.`id_menu` WHERE `trx_menu`.`id_peran` = $id_peran";
        $menu['menus'] = $this->db->query($querymenu)->result_array();

        $queryMenuPeran = "SELECT * 
        FROM `peran` 
        INNER JOIN `trx_peran` ON `trx_peran`.`id_peran` = `peran`.`id_peran`
        INNER JOIN `user` ON `user`.`id_user` = `trx_peran`.`id_user` WHERE";
        $menuPeran['perans'] = $this->db->query($queryMenuPeran)->result_array();

        // $row = $this->Admin_18->ambil_data_id_trx_menu($id);
        // // var_dump($row);
        // // die;

        // if ($row) {
        //     $data = array(
        //         'id_trx_peran' => $row->id_trx_peran,
        //         'user' => $row->user
        //     );
        // }

        $this->load->view('admin/Nav/header2');
        $this->load->view('admin/Nav/sidebar', $menu);
        $this->load->view('admin/Main/edit_userDalamPeran', $menuPeran);
        $this->load->view('admin/Nav/footer');
    }
}
