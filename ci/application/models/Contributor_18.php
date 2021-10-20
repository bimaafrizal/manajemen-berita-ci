<?php
class Contributor_18 extends CI_Model
{
    public $table_user = 'user';
    public $id_user = 'id_user';
    public $table_peran = 'peran';
    public $id_peran = 'id_peran';
    public $table_trx_peran = 'trx_peran';
    public $table_trx_menu = 'trx_menu';
    public $table_menu = 'menu';
    public $table_kategori = 'kategori_berita';
    public $id_kategori = 'id_kategori';

    //crud kategori
    public function ambil_data_kategori()
    {
        return $this->db->get($this->table_kategori)->result();
    }
    function ambil_id_kategori($id)
    {
        $this->db->where($this->id_kategori, $id);
        return $this->db->get($this->table_kategori)->row();
    }
    
    function edit_kategori($data)
    {
        $id = array('id_kategori' => $this->input->post('id_kategori'));
        return $this->db->update($this->table_kategori, $data, $id);
    }
    function tambah_kategori($data)
    {
        return $this->db->insert($this->table_kategori, $data);
    }
    function get_perans()
    {
        return $this->db->get($this->table_peran)->result();
    }
    function delete_user($id)
    {
        return $this->db->delete($this->table_user, array('id_user' => $id));
    }
}
