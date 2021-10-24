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
                    'nama_pengguna' => $login['nama_pengguna'],
                    'password' => $login['password']
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
                $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                Username dan Password Salah
              </div>');
                redirect('login_18');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert
            alert-danger" role="alert">
            Username dan Password Wajib diisi
         </div>');
            redirect('login_18');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login_18');
    }
}
