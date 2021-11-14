<?php
class Zone_contributor_18 extends CI_Controller
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

        // $dataKategori = $this->Contributor_18->ambil_data_kategori();
        $id_user = $this->session->userdata('id_user');
        $query = "SELECT * FROM `kategori_berita` WHERE `id_user` = $id_user";
        $kategori['kategoris'] = $this->db->query($query)->result_array();


        //test ecryp decryp
        // $plain_text = "Bima";
        // $test_enktip = $this->encryption->encrypt($plain_text);
        // echo $test_enktip;
        // echo "<br>";

        // $hasilTest = $this->encryption->decrypt($test_enktip);
        // echo $hasilTest;
        // echo "<br>";

        

        $this->load->view('admin/Nav/header2');
        $this->load->view('admin/Nav/sidebar', $menu);
        $this->load->view('contributtor/main_kategori', $kategori);
        $this->load->view('admin/Nav/footer');
    }
}
