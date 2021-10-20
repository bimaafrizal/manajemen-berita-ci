<?php
class zone_contributor_18 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Contributor_18');
    }
    public function index()
    {
        // $this->load->view('login/view_contributor_18');
        $id_peran = 2;
        $querymenu = "SELECT * FROM `trx_menu` INNER JOIN `menu` ON `trx_menu`.`id_menu` = `menu`.`id_menu` WHERE `trx_menu`.`id_peran` = $id_peran";
        $menu['menus'] = $this->db->query($querymenu)->result_array();

        $dataKategori = $this->Contributor_18->ambil_data_kategori();
        // var_dump($dataKategori);
        // die;
        $arrayDataKategori = array(
            'datas' => $dataKategori
        );

        $this->load->view('admin/Nav/header2');
        $this->load->view('admin/Nav/sidebar', $menu);
        $this->load->view('contributtor/main_kategori', $arrayDataKategori);
        $this->load->view('admin/Nav/footer');
    }
}
