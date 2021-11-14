<?php
class Loginregister_18 extends CI_Model
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

    function cek_peran($id_user, $id_peran)
    {
        $this->db->where('id_user', $id_user);
        $this->db->where('id_peran', $id_peran);
        return $this->db->get($this->table_trx_peran)->row();
    }

    //registrasi
    //input table user
    function tambah_user($data)
    {
        return $this->db->insert($this->table_user, $data);
    }


    //ambil id user
    function ambil_data_id_user($user)
    {
        $this->db->where('user', $user);
        return $this->db->get($this->table_user)->row();
    }

    //ambil id peran
    function ambil_id_peran_trx($user)
    {
        $this->db->where('id_user', $user);
        return $this->db->get($this->table_trx_peran)->row();
    }

    //ambil url
    function ambil_url_peran($role)
    {
        $this->db->where('id_peran', $role);
        return $this->db->get($this->table_peran)->row();
    }

    //input trx peran
    function tambah_trx_peran($data)
    {
        return $this->db->insert($this->table_trx_peran, $data);
    }

    //ambil id peran
    function get_perans()
    {
        return $this->db->get($this->table_peran)->result();
    }
}
