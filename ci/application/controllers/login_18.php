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
                    'user' => $login['user'],
                    'nama_pengguna' => $login['nama_pengguna']
                );
                $this->session->set_userdata($data);
                $id_user = $this->session->userdata('id_user');
                $dataPeran = $this->loginRegister_18->ambil_id_peran_trx($id_user);
                $arrayDataUser = array(
                    'id_peran' => $dataPeran->id_peran
                );

                //pindah role
                if ($dataPeran) {
                    //role admin
                    if ($arrayDataUser['id_peran'] == "1") {
                        $ambilUrl = $this->loginRegister_18->ambil_url_peran($arrayDataUser['id_peran']);
                        $arrayUrl = array(
                            'url' => $ambilUrl->url
                        );
                        redirect($arrayUrl['url']);

                        //role contributtor
                    } elseif ($arrayDataUser['id_peran'] == "2") {
                        $ambilUrl = $this->loginRegister_18->ambil_url_peran($arrayDataUser['id_peran']);
                        $arrayUrl = array(
                            'url' => $ambilUrl->url
                        );
                        redirect($arrayUrl['url']);
                    }
                }
                //jika error
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
