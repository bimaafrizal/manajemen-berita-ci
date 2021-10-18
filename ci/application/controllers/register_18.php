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
        $this->load->view('login/view_register_18', $data);
    }

    public function proses_register()
    {
        //ambil form
        $email = $this->input->post('email');
        $namaPengguna =  $this->input->post('namaPengguna');
        $password =  $this->input->post('password');
        $konfirmpassword =  $this->input->post('konfirmPassword');
        $peran = $this->input->post('peran');

        if (($email != '') and ($namaPengguna != '') and ($password != '') and ($konfirmpassword != '')) {
            $sql = $this->db->query("SELECT user FROM user where user='$email'");
            $tes_duplikat = $sql->num_rows();
            if ($tes_duplikat > 0) {
                $this->session->set_flashdata('message', 'Nomor KTP Sudah digunakan sebelumnya');
                $data['perans'] = $this->loginRegister_18->get_perans();
                redirect('register_18');
            } else {
                if ($password == $konfirmpassword) {
                    $data = [
                        'user' => $email,
                        'password' => $password,
                        'nama_pengguna' => $namaPengguna
                    ];
                    //tambah ke database user
                    $this->loginRegister_18->tambah_user($data);

                    //ambil data id user dan id peran
                    $dataUser = $this->loginRegister_18->ambil_data_id_user($email);
                    $arrayData = [
                        'id_user' => $dataUser->id_user,
                        'id_peran' => $peran
                    ];

                    //tambah data ke trx peran
                    $this->loginRegister_18->tambah_trx_peran($arrayData);
                    redirect('login_18');
                } else {
                    $data['pesan'] = 'password yang anda masukan harus sama';
                    $this->load->view('login/view_register_18');
                }
            }
        }
    }
}
