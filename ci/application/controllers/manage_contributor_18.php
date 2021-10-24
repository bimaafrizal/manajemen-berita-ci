<?php
class manage_contributor_18 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Contributor_18');
    }
    public function tambah_kategori()
    {
        $id_peran = 2;
        $querymenu = "SELECT * FROM `trx_menu` INNER JOIN `menu` ON `trx_menu`.`id_menu` = `menu`.`id_menu` WHERE `trx_menu`.`id_peran` = $id_peran";
        $menu['menus'] = $this->db->query($querymenu)->result_array();
        


        $this->load->view('admin/Nav/header2');
        $this->load->view('admin/Nav/sidebar', $menu);
        $this->load->view('contributtor/main_tambah_kategori');
        $this->load->view('admin/Nav/footer');
    }
    public function proses_tambah_kategori()
    {
        $name_kategori = $this->input->post('name_kategori');

        if ($name_kategori != '') {
            $data = [
                'nama_kategori' => $name_kategori
            ];

            $this->Contributor_18->tambah_kategori($data);
            
            redirect('zone_contributor_18');
        } else {
            redirect('manage_contributor_18/tambah_kategori');
        }
    }

    public function edit_kategori($id)
    {
        $row = $this->Contributor_18->ambil_id_kategori($id);

        if ($row) {
            $data = array(
                'id_kategori' => $row->id_kategori,
                'nama_kategori' => $row->nama_kategori,
            );
        }
        $this->load->view('admin/header2');
        $this->load->view('admin/sidebar');
        $this->load->view('crudBerita/editBerita', $data);
        $this->load->view('admin/footer');
    }

    public function proses_edit()
    {
        $judul_berita = $this->input->post('judul_berita');
        $isi_berita = $this->input->post('isi_berita');

        if (($judul_berita != '') and ($isi_berita != '')) {
            $data = [
                'title' => $judul_berita,
                'text' => $isi_berita,
            ];

            $this->Berita_model->edit_berita($data);
            redirect('admin_18');
        } else {
            redirect('admin_18');
        }
    }
}
