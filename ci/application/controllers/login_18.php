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

    public function proses_login()
    {
        $user = $this->input->post('user');
        $password = $this->input->post('password');

        if ($user != '' && $password != '') {
            $row = $this->Cek_login->cek_user($user, $password);

            if ($row) {
                $data = array(
                    'user' => $row->user,
                    'level' => $row->level,
                );

                $this->session->set_userdata($data);
                // echo $_SESSION('user');
                if ($row->level == 'Admin') {
                    redirect('zone_admin');
                } elseif ($row->level == 'Editor') {
                    redirect('zone_editor');
                }
            } else {
                $data['pesan'] = 'user atau password yang anda masukan salah';
                $this->load->view('loginAdmin/login', $data);
            }
        }
    }

    private function _login()
    {
        $userlog = $this->input->post('user');
        $password = $this->input->post('password');

        $login = $this->db->get_where('user', ['user' => $userlog])->row_array();
        if ($login) {
            if ($login['is_aktif'] == 1) {
                if (password_verify($password, $login['password'])) {
                    $data = [
                        'user' => $login['user'],
                        'nama_pengguna' => $login['nama_pengguna'],
                    ];
                    $this->session->set_userdata($data);
                    redirect('admin');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password salah!
                  </div>');
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            User belum diaktifkan oleh admin! Hubungi admin untuk melakukan aktifasi.
          </div>');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            User belum pernah terdaftar!
          </div>');
            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login_18');
    }
}
