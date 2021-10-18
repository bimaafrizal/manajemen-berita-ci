<?php
class zone_admin_18 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('loginRegister_18');
    }
    public function index()
    {
        // $data['email'] = $this->db->get_whare();
        $session['a'] = $this->session->userdata();
        // $data['user'] = $this->db->get_where('user', ['email' =>
        // $this->session->userdata('email')])->row_array();

        $this->load->view('login/view_admin_18', $session);
        // var_dump($session['a']);
        // die;
    }
}
