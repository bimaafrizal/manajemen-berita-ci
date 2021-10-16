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

    //ambil id user
    function ambil_data_id_user($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table_user)->row();
    }
    //ambil id peran
    function ambil_data_id_peran($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table_peran)->row();
    }

    //input trx peran
    function tambah_trx_peran($data)
    {
        return $this->db->insert($this->table_trx_peran, $data);
    }
}
