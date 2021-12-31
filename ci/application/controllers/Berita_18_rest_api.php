<?php
class Berita_18_rest_api extends CI_Controller
{
    var $API = "";

    function __construct()
    {
        parent::__construct();
        $this->API = "http://localhost/BackEnd/SistemAdminBerita/ci/REST_API/";
        $this->load->library('curl');
    }

    function index()
    {
        $data['databerita'] = json_decode($this->curl->simple_get($this->API . '/berita'), TRUE);
        $id_peran = 2;
        $querymenu = "SELECT * FROM `trx_menu` INNER JOIN `menu` ON `trx_menu`.`id_menu` = `menu`.`id_menu` WHERE `trx_menu`.`id_peran` = $id_peran";
        $menu['menus'] = $this->db->query($querymenu)->result_array();

        $this->load->view('admin/Nav/header2');
        $this->load->view('admin/Nav/sidebar', $menu);
        $this->load->view('berita_18_rest_api/list_data', $data);
        $this->load->view('admin/Nav/footer');
    }

    function tambah_berita()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'judul_berita'      =>  $this->input->post('judul_berita'),
                'isi_berita' =>  $this->input->post('isi_berita')
            );
            $insert =  $this->curl->simple_post($this->API . '/berita', $data, array(CURLOPT_BUFFERSIZE => 10));

            if ($insert) {
                $this->session->set_flashdata('hasil', 'Insert Data Berhasil');
            } else {
                $this->session->set_flashdata('hasil', 'Insert Data Gagal');
            }
            redirect('Berita_18_rest_api');
        } else {
            $id_peran = 2;
            $querymenu = "SELECT * FROM `trx_menu` INNER JOIN `menu` ON `trx_menu`.`id_menu` = `menu`.`id_menu` WHERE `trx_menu`.`id_peran` = $id_peran";
            $menu['menus'] = $this->db->query($querymenu)->result_array();

            $this->load->view('admin/Nav/header2');
            $this->load->view('admin/Nav/sidebar', $menu);
            $this->load->view('berita_18_rest_api/tambah_berita');
            $this->load->view('admin/Nav/footer');
        }
    }

    function edit_berita()
    {
        if (isset($_POST['id_berita'])) {
            $data = array(
                'id_berita'      =>  $this->input->post('id_berita'),
                'judul_berita'      =>  $this->input->post('judul_berita'),
                'isi_berita' =>  $this->input->post('isi_berita')
            );
            $update =  $this->curl->simple_put($this->API . '/berita', $data, array(CURLOPT_BUFFERSIZE => 10));

            if ($update) {
                $this->session->set_flashdata('hasil', 'Update Data Berhasil');
            } else {
                $this->session->set_flashdata('hasil', 'Update Data Gagal');
            }
            redirect('Berita_18_rest_api');
        } else {
            $parameter  = array('id_berita' => $this->uri->segment(3));
            $data['databerita'] = json_decode($this->curl->simple_get($this->API . '/berita', $parameter));
            $id_peran = 2;
            $querymenu = "SELECT * FROM `trx_menu` INNER JOIN `menu` ON `trx_menu`.`id_menu` = `menu`.`id_menu` WHERE `trx_menu`.`id_peran` = $id_peran";
            $menu['menus'] = $this->db->query($querymenu)->result_array();

            $this->load->view('admin/Nav/header2');
            $this->load->view('admin/Nav/sidebar', $menu);
            $this->load->view('berita_18_rest_api/edit_berita', $data);
            $this->load->view('admin/Nav/footer');
        }
    }

    //hapus data
    function hapus($id_berita)
    {
        if (isset($id_berita)) {
            $hapus =  $this->curl->simple_delete($this->API . '/berita', array('id_berita' => $id_berita), array(CURLOPT_BUFFERSIZE => 10));
            if ($hapus) {
                $this->session->set_flashdata('hasil', 'Delete Data Berhasil');
            } else {
                $this->session->set_flashdata('hasil', 'Delete Data Gagal');
            }
            redirect('berita_18_rest_api');
        }
    }
}
