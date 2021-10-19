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
