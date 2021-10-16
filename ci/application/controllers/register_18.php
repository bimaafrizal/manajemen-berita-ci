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
        $this->load->view('login/view_register_18');
    }

    public function proses_register()
    {
        $email = $this->input->post('email');
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

                if ($peran == "Admin") {
                    $url = "zone_admin_18";
                    $data = [
                        'nama_peran' => $peran,
                        'url' => $url
                    ];
                    $this->loginRegister_18->tambah_peran($data);
                    redirect('login_18');
                } else if ($peran = "Kontributtor") {
                    $url = "zone_kontributor_18";
                    $data = [
                        'nama_peran' => $peran,
                        'url' => $url
                    ];
                    $this->loginRegister_18->tambah_peran($data);
                    redirect('login_18');
                } else {
                }

                $id = $this->loginRegister_18->ambil_data_id_user();
                $id2 = $this->loginRegister_18->ambil_data_id_peran();
                $data2 = [
                    'id_user' => $id,
                    'id_peran' => $id2
                ];
                $this->loginRegister_18->tambah_trx_peran($data2);
                redirect('login_18');
            } else {
                $data['pesan'] = 'password yang anda masukan harus sama';
                $this->load->view('view_register_18');
            }
        }
    }
}
