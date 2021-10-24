<?php
class Contributor_18 extends CI_Model
{
    public $table_kategori = 'kategori_berita';
    public $table_peran = 'peran';
    public $id_kategori = 'id_kategori';
    public $table_berita = 'berita';
    public $table_berita_kategori = 'trx_berita_kategori';

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
    function delete_kategori($id)
    {
        return $this->db->delete($this->table_kategori, array('id_kategori' => $id));
    }
    function tambah_kategori($data)
    {
        return $this->db->insert($this->table_kategori, $data);
    }

    //crud berita
    function ambil_data_berita()
    {
        return $this->db->get($this->table_berita)->result();
    }
    function tambah_berita($data)
    {
        return $this->db->insert($this->table_berita, $data);
    }
    function tambah_berita_kategori($data)
    {
        return $this->db->insert($this->table_berita_kategori, $data);
    }
    function get_kategori()
    {
        return $this->db->get($this->table_kategori)->result();
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
