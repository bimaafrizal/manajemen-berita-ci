<?php

require APPPATH . 'libraries/REST_Controller.php';
class Berita extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function index_get($id = 0)
    {
        if (!empty($id)) {
            $data = $this->db->get_where("berita", ['id_berita' => $id])->row_array();
        } else {
            $data = $this->db->get_where("berita")->result_array();
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }
    public function index_post()
    {
        //test insert
        $data = $this->input->post();
        $this->db->insert('berita', $data);
        $this->response(['Berita sukses di insert'], REST_Controller::HTTP_OK);

        //ambil data
        // $id = $this->input->post('id_berita');
        // if (!empty($id)) {
        //     $data = $this->db->get_where("berita", ['id_berita' => $id])->row_array();
        // } else {
        //     $data = $this->db->get_where("berita")->result_array();
        // }
        // $this->response($data, REST_Controller::HTTP_OK);
    }


    //update data
    public function index_put()
    {
        $id_berita = $this->put('id_berita');
        $data = array(
            'judul_berita' => $this->put('judul_berita'),
            'isi_berita' => $this->put('isi_berita'),
        );

        $this->db->where('id_berita', $id_berita);
        $update = $this->db->update('berita', $data);
        if ($update) {
            $this->response(['Berita telah diupdate'], REST_Controller::HTTP_OK);
        } else {
            $this->response(array('status' => 'Gagal', 502));
        }
    }

    //hapus data
    public function index_delete()
    {
        $id_berita = $this->delete('id_berita');

        $this->db->where('id_berita', $id_berita);
        $delete = $this->db->delete('berita');

        if ($delete) {
            $this->response(['Berita sukses dihapus'], REST_Controller::HTTP_OK);
        } else {
            $this->response(array('status' => 'Gagal', 502));
        }
    }
}
