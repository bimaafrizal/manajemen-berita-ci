<?php
class loginRegister_18 extends CI_Model
{
    public $table_user = 'user';
    public $id_user = 'id_user';
    public $table_peran = 'peran';
    public $id_peran = 'id_peran';
    public $table_trx_peran = 'trx_peran';

    function cek_user($email, $password)
    {
        $this->db->where('user', $email);
        $this->db->where('password', $password);
        return $this->db->get($this->table_user)->row();
    }

    //registrasi
    //input table user
    function tambah_user($data)
    {
        return $this->db->insert($this->table_user, $data);
    }
    //input tabel peran
    function tambah_peran($data)
    {
        return $this->db->insert($this->table_peran, $data);
    }
    //ambil data tabel user
    // function amnbil_data_user()
    // {
    //     return $this->db->get($this->table_user)->result();
    // }

    //ambil data tabel peran
    // function amnbil_data_peran()
    // {
    //     return $this->db->get($this->table_peran)->result();
    // }

    //ambil id user
    function ambil_data_id_user($user)
    {
        // $this->db->where($this->id_user, $id);
        // return $this->db->get($this->table_user)->row();
        // $this->db->where('user', $user);
        // return $this->db->get($this->table_user)->row();
        $this->db->where('user', $user);
        return $this->db->get($this->table_user)->row();
    }
    //ambil id peran
    function ambil_data_id_peran($nama_peran)
    {
        // $this->db->where($this->id_peran, $id);
        // return $this->db->get($this->table_peran)->row();
        // $hasil = $this->db->query('SELECT id_peran FROM peran');
        // return $hasil->row();
        $q = "SELECT id_peran FROM peran WHERE nama_peran = ?";
        return $this->db->query($q,[$nama_peran]);
    }

    //input trx peran
    function tambah_trx_peran($data)
    {
        return $this->db->insert($this->table_trx_peran, $data);
    }

    function get_perans(){
        return $this->db->get($this->table_peran)->result();
    }
}
