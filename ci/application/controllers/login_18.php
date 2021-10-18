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
        // $data['email'] = $this->db->get_whare();
        $this->load->view('login/view_login_18');
    }

    public function proses_login()
    {
        $user = $this->input->post('user');
        $password = $this->input->post('password');
        $login = $this->db->get_where('user', ['user' => $user])->row_array();
        
        if ($user != '' && $password != '') {
            $row = $this->loginRegister_18->cek_user($user, $password);

            //buat session
            if ($row) {
                $data = array(
                    'id_user' => $login['id_user'],
                    'user' => $login['user']
                );
                $this->session->set_userdata($data);
                $id_user = $this->session->userdata('id_user');
                $dataPeran = $this->loginRegister_18->ambil_id_peran_trx($id_user);
                $arrayDataUser = array(
                    'id_peran' => $dataPeran->id_peran
                );

                //pindah role
                if ($dataPeran) {
                    if ($arrayDataUser['id_peran'] == "1") {
                        redirect('zone_admin_18');
                    } elseif ($arrayDataUser['id_peran'] == "2") {
                        redirect('zone_contributor_18');
                    }
                }
            } else {
                $data['pesan'] = 'user atau password yang anda masukan salah';
                $this->load->view('loginAdmin/login', $data);
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login_18');
    }
}
