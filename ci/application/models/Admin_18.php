<?php
class Admin_18 extends CI_Model
{
    public $table_user = 'user';
    public $id_user = 'id_user';
    public $table_peran = 'peran';
    public $id_peran = 'id_peran';
    public $table_trx_peran = 'trx_peran';
    public $table_trx_menu = 'trx_menu';
    public $table_menu = 'menu';
    public $id_menu = 'id_menu';

    //crud user
    public function ambil_data_user()
    {
        return $this->db->get($this->table_user)->result();
    }

    function ambil_id_user($id)
    {
        $this->db->where($this->id_user, $id);
        return $this->db->get($this->table_user)->row();
    }
    function edit_user($data)
    {
        $id = array('id_user' => $this->input->post('id_user'));
        return $this->db->update($this->table_user, $data, $id);
    }
    function get_perans()
    {
        return $this->db->get($this->table_peran)->result();
    }
    function delete_user($id)
    {
        return $this->db->delete($this->table_user, array('id_user' => $id));
    }
    public function ambil_data_id_peran($id)
    {
        $this->db->where($this->id_peran, $id);
        return $this->db->get($this->table_peran)->row();
    }

    //crud peran
    public function ambil_data_peran()
    {
        return $this->db->get($this->table_peran)->result();
    }
    function edit_peran($data)
    {
        $id = array('id_peran' => $this->input->post('id_peran'));
        return $this->db->update($this->table_peran, $data, $id);
    }


    //crud menu
    public function ambil_semua_menu()
    {
        return $this->db->get($this->table_menu)->result();
    }
    public function ambil_data_id_menu($id)
    {
        $this->db->where($this->id_menu, $id);
        return $this->db->get($this->table_menu)->row();
    }
    function edit_menu($data)
    {
        $id = array('id_menu' => $this->input->post('id_menu'));
        return $this->db->update($this->table_menu, $data, $id);
    }
    function delete_menu($id)
    {
        return $this->db->delete($this->table_menu, array('id_menu' => $id));
    }



    //crud trx menu
    public function ambil_semua_trx_menu()
    {
        return $this->db->get($this->table_trx_menu)->result();
    }
    function ambil_menu($id)
    {
        $this->db->where($this->id_peran, $id);
        return $this->db->get($this->table_trx_menu)->row();
    }
    function ambil_peran($id)
    {
        $this->db->where($this->id_peran, $id);
        return $this->db->get($this->table_peran)->row();
    }


    //trx_peran
    public function ambil_semua_trx_peran()
    {
        return $this->db->get($this->table_trx_peran)->result();
    }


    //side bar
    public function ambil_id_menu($data)
    {
        $this->db->where('id_peran', $data);
        return $this->db->get($this->table_trx_menu)->row();
    }
    public function ambil_id_peran($data)
    {
        $this->db->where('id_peran', $data);
        return $this->db->get($this->table_trx_menu)->row();
    }

    public function ambil_data_menu($data)
    {
        $this->db->where('id_menu', $data);
        return $this->db->get($this->table_menu)->row();
    }
    function ambil_id_peran_trx($user)
    {
        $this->db->where('id_user', $user);
        return $this->db->get($this->table_trx_peran)->row();
    }



    //modal Registrasi USer

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
}
