<?php
class register_18 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('loginRegister_18');
    }

    public function index()
    {
        $data['perans'] = $this->loginRegister_18->get_perans();
        // var_dump($perans);die();
        $this->load->view('login/view_register_18', $data);
    }

    public function proses_register()
    {
        $email = $this->input->post('user');
        $namaPengguna =  $this->input->post('namaPengguna');
        $password =  $this->input->post('password');
        $konfirmpassword =  $this->input->post('konfirmPassword');
        $peran = $this->input->post('peran');

        if (($email != '') and ($namaPengguna != '') and ($password != '') and ($konfirmpassword != '')) {
            if ($password == $konfirmpassword) {
                $data = [
                    'user' => $email,
                    'password' => $password,
                    'nama_pengguna' => $namaPengguna
                ];
                $this->loginRegister_18->tambah_user($data);
                $dataUser = $this->loginRegister_18->ambil_data_id_user($email);
                $arrayData = [
                    'id_user' => $dataUser->id_user,
                    'id_peran' => $peran
                ];

                $this->loginRegister_18->tambah_trx_peran($arrayData);
                redirect('login_18');
            } else {
                $data['pesan'] = 'password yang anda masukan harus sama';
                $this->load->view('view_register_18');
            }
        }
    }
}
