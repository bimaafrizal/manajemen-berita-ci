<?php
class manage_admin_18 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_18');
    }
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

        if (($user != '') and ($password != '') and ($namaPengguna != '') and ($is_aktif != '')) {
            $data = [
                'user' => $user,
                'password' => $password,
                'nama_pengguna' => $namaPengguna,
                'is_aktif' => $is_aktif
            ];
            // var_dump($data);
            // die;
            $this->Admin_18->edit_user($data);
            redirect('zone_admin_18');
        } else {
            redirect('zone_admin_18');
        }
    }

    public function hapus_user($id)
    {
        $this->Admin_18->ambil_data_user($id);
        $this->Admin_18->delete_peran($id);

        redirect('admin_18');
    }

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
    public function menuDalamPeran_18()
    {
        //$session['a'] = $this->session->userdata();
        $id_peran = 1;
        $querymenu = "SELECT * FROM `trx_menu` INNER JOIN `menu` ON `trx_menu`.`id_menu` = `menu`.`id_menu` WHERE `trx_menu`.`id_peran` = $id_peran";
        $menu['menus'] = $this->db->query($querymenu)->result_array();

        $dataTrxPeran = $this->Admin_18->ambil_semua_trx_menu();
        $arrayDataTrxPeran = array(
            'datas' => $dataTrxPeran
        );

        $this->load->view('admin/Nav/header2');
        $this->load->view('admin/Nav/sidebar', $menu);
        $this->load->view('admin/Main/main_menuDalamPeran', $arrayDataTrxPeran);
        $this->load->view('admin/Nav/footer');
    }
    public function userDalamPeran_18()
    {
        //$session['a'] = $this->session->userdata();
        $id_peran = 1;
        $querymenu = "SELECT * FROM `trx_menu` INNER JOIN `menu` ON `trx_menu`.`id_menu` = `menu`.`id_menu` WHERE `trx_menu`.`id_peran` = $id_peran";
        $menu['menus'] = $this->db->query($querymenu)->result_array();

        $dataTrxMenu = $this->Admin_18->ambil_semua_trx_peran();
        $arrayDataTrxMenu = array(
            'datas' => $dataTrxMenu
        );

        $this->load->view('admin/Nav/header2');
        $this->load->view('admin/Nav/sidebar', $menu);
        $this->load->view('admin/Main/main_userDalamPeran', $arrayDataTrxMenu);
        $this->load->view('admin/Nav/footer');
    }
}
