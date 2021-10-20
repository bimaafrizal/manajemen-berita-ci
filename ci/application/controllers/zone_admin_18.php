<?php
class zone_admin_18 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_18');
    }
    public function index()
    {
        //$session['a'] = $this->session->userdata();
        $id_peran = 1;
        $querymenu = "SELECT * FROM `trx_menu` INNER JOIN `menu` ON `trx_menu`.`id_menu` = `menu`.`id_menu` WHERE `trx_menu`.`id_peran` = $id_peran";
        $menu['menus'] = $this->db->query($querymenu)->result_array();

        $dataUser = $this->Admin_18->ambil_data_user();
        $arrayDataUser = array(
            'datas' => $dataUser
        );

        $this->load->view('admin/Nav/header2');
        $this->load->view('admin/Nav/sidebar', $menu);
        $this->load->view('admin/Main/main_user', $arrayDataUser);
        $this->load->view('admin/Nav/footer');
    }
}
