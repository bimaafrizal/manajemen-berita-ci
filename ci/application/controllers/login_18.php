<?php
class login_18 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('loginRegister_18');
    }

    public function index()
    {
        $this->load->view('login/view_login_18');
    }
}
