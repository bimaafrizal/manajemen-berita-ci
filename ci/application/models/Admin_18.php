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

    //crud peran
    public function ambil_data_peran()
    {
        return $this->db->get($this->table_peran)->result();
    }

    //crud menu
    public function ambil_semua_menu()
    {
        return $this->db->get($this->table_menu)->result();
    }

    //crud trx menu
    public function ambil_semua_trx_menu()
    {
        return $this->db->get($this->table_trx_menu)->result();
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

    public function ambil_data_menu($data)
    {
        $this->db->where('id_menu', $data);
        return $this->db->get($this->table_menu)->row();
    }
}
