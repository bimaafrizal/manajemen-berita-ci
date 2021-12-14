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
        // var_dump($data);
        // die;
        $this->load->view('berita_18_rest_api/list_data', $data);
    }
}
