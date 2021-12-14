<?php
class Manage_contributor_18 extends CI_Controller
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
        $id_user = $this->session->userdata('id_user');

        if ($name_kategori != '') {
            $data = [
                'nama_kategori' => $name_kategori,
                'id_user' => $id_user
            ];

            $this->Contributor_18->tambah_kategori($data);

            redirect('zone_contributor_18');
        } else {
            redirect('manage_contributor_18/tambah_kategori');
        }
    }

    public function edit_kategori($id)
    {
        $id_encrypt = decrypt_url($id);
        $id_peran = 1;
        $querymenu = "SELECT * FROM `trx_menu` INNER JOIN `menu` ON `trx_menu`.`id_menu` = `menu`.`id_menu` WHERE `trx_menu`.`id_peran` = $id_peran";
        $menu['menus'] = $this->db->query($querymenu)->result_array();

        $row = $this->Contributor_18->ambil_id_kategori($id_encrypt);

        // var_dump($row);
        // die;
        if ($row) {
            $data = array(
                'id_kategori' => $row->id_kategori,
                'nama_kategori' => $row->nama_kategori,
            );
            $this->load->view('admin/Nav/header2');
            $this->load->view('admin/Nav/sidebar', $menu);
            $this->load->view('contributtor/main_edit_kategori', $data);
            $this->load->view('admin/Nav/footer');
        } else {
            $data = array(
                'id_kategori' => $row->id_kategori,
                'nama_kategori' => $row->nama_kategori,
            );
            $this->load->view('admin/Nav/header2');
            $this->load->view('admin/Nav/sidebar', $menu);
            $this->load->view('contributtor/main_kategori');
            $this->load->view('admin/Nav/footer');
        }
    }

    public function proses_edit_kategori()
    {
        $nama_kategori = $this->input->post('nama_kategori');

        if ($nama_kategori != '') {
            $data = [
                'nama_kategori' => $nama_kategori
            ];

            $this->Contributor_18->edit_kategori($data);
            redirect('zone_contributor_18');
        } else {
            redirect('zone_contributor_18');
        }
    }
    public function hapus_kategori($id)
    {
        $this->Contributor_18->ambil_id_kategori($id);
        $this->Contributor_18->delete_kategori($id);
        redirect('zone_contributor_18');
    }

    public function berita()
    {
        $id_peran = 2;
        $querymenu = "SELECT * FROM `trx_menu` INNER JOIN `menu` ON `trx_menu`.`id_menu` = `menu`.`id_menu` WHERE `trx_menu`.`id_peran` = $id_peran";
        $menu['menus'] = $this->db->query($querymenu)->result_array();

        // $dataKategori = $this->Contributor_18->ambil_data_kategori();

        $total_row = $this->Contributor_18->total_row();
        $config['base_url'] = base_url() . 'Manage_contributor_18/berita/';
        $config['total_rows'] = $total_row;
        $config['per_page'] = 4;
        $awal = $this->uri->segment(4);

        $this->pagination->initialize($config);
        $data_page = $this->Contributor_18->berita_page($config['per_page'], $awal);


        $data_berita_page = array(
            'beritas' => $data_page,
        );
        // var_dump($total_row);
        // die;
        // // var_dump($berita);
        // die;
        // var_dump($dataKategori);
        // die;
        // $arrayDataKategori = array(
        //     'datas' => $dataKategori
        // );

        $this->load->view('admin/Nav/header2');
        $this->load->view('admin/Nav/sidebar', $menu);
        $this->load->view('contributtor/main_berita', $data_berita_page);
        $this->load->view('admin/Nav/footer');
    }
    public function tambah_berita()
    {
        $id_peran = 2;
        $querymenu = "SELECT * FROM `trx_menu` INNER JOIN `menu` ON `trx_menu`.`id_menu` = `menu`.`id_menu` WHERE `trx_menu`.`id_peran` = $id_peran";
        $menu['menus'] = $this->db->query($querymenu)->result_array();
        $data['kategoris'] = $this->Contributor_18->get_kategori();

        $this->load->view('admin/Nav/header2');
        $this->load->view('admin/Nav/sidebar', $menu);
        $this->load->view('contributtor/main_tambah_berita', $data);
        $this->load->view('admin/Nav/footer');
    }

    public function proses_tambah_berita()
    {
        //$this->form_validation->set_rules('');

        $judul_berita = $this->input->post('judul_berita');
        $isi_berita = $this->input->post('isi_berita');
        $kategori = $this->input->post('kategori');

        $id_user = $this->session->userdata('id_user');
        if (($judul_berita != '') and ($isi_berita != '')) {
            $data = [
                'judul_berita' => $judul_berita,
                'isi_berita' => $isi_berita,
                // 'kategori' => $kategori,
                'tanggal' => time()
            ];
            $this->Contributor_18->tambah_berita($data);
            $id = $this->db->get_where('berita', ['judul_berita' =>
            $this->input->post('judul_berita')])->row_array();

            $data2 = [
                'id_kategori' => $kategori,
                'id_berita' => $id['id_berita']
            ];

            $tes = $this->Contributor_18->tambah_berita_kategori($data2);
            // var_dump($id);
            // die;

            redirect('manage_contributor_18/berita');
        } else {
            redirect('manage_contributor_18/tambah_berita');
        }
    }

    public function edit_berita($id)
    {
        $id_peran = 2;
        $querymenu = "SELECT * FROM `trx_menu` INNER JOIN `menu` ON `trx_menu`.`id_menu` = `menu`.`id_menu` WHERE `trx_menu`.`id_peran` = $id_peran";
        $menu['menus'] = $this->db->query($querymenu)->result_array();

        $row = $this->Contributor_18->ambil_id_berita($id);
        // var_dump($row);
        // die;

        if ($row) {
            $data = array(
                'id_berita' => $row->id_berita,
                'judul_berita' => $row->judul_berita,
                'isi_berita' => $row->isi_berita,
            );
        }

        $this->load->view('admin/Nav/header2');
        $this->load->view('admin/Nav/sidebar', $menu);
        $this->load->view('contributtor/main_edit_berita', $data);
        $this->load->view('admin/Nav/footer');
    }

    public function proses_edit_berita()
    {
        $judul_berita = $this->input->post('judul_berita');
        $isi_berita = $this->input->post('isi_berita');
        if ($judul_berita != '' && $isi_berita != '') {
            $data = [
                'judul_berita' => $judul_berita,
                'isi_berita' => $isi_berita,
                'tanggal' => time()
            ];
            // var_dump($data);
            // die;
            $this->Contributor_18->edit_berita($data);
            redirect('manage_contributor_18/berita');
        } else {
            $id_peran = 2;
            $querymenu = "SELECT * FROM `trx_menu` INNER JOIN `menu` ON `trx_menu`.`id_menu` = `menu`.`id_menu` WHERE `trx_menu`.`id_peran` = $id_peran";
            $menu['menus'] = $this->db->query($querymenu)->result_array();

            $this->load->view('admin/Nav/header2');
            $this->load->view('admin/Nav/sidebar', $menu);
            $this->load->view('contributtor/main_edit_berita');
            $this->load->view('admin/Nav/footer');
        }
    }
    public function hapus_berita($id)
    {
        $this->Contributor_18->ambil_id_berita($id);
        $this->Contributor_18->delete_berita($id);
        redirect('manage_contributor_18/berita');
    }
}
