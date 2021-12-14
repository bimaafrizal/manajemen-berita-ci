<?php
class Contributor_18 extends CI_Model
{
    public $table_kategori = 'kategori_berita';
    public $table_peran = 'peran';
    public $id_kategori = 'id_kategori';
    public $id_berita = 'id_berita';
    public $table_berita = 'berita';
    public $table_berita_kategori = 'trx_berita_kategori';
    public $table_trx_peran = 'trx_peran';

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


    function total_row()
    {
        return $this->db->get($this->table_berita)->num_rows();
    }
    function berita_page($per_page, $awal)
    {
        if ($awal == '') {
            $awal_page = '0';
        } else {

            $awal_page = $awal;
        }
        return $this->db->query("SELECT * FROM `berita` INNER JOIN `trx_berita_kategori` ON `trx_berita_kategori`.`id_berita` = `berita`.`id_berita` JOIN `kategori_berita` ON `kategori_berita`.`id_kategori` = `trx_berita_kategori`.`id_kategori` limit $per_page offset $awal_page")->result_array();
    }

    function ambil_id_berita($id)
    {
        $this->db->where($this->id_berita, $id);
        return $this->db->get($this->table_berita)->row();
    }
    function edit_berita($data)
    {
        $id = array('id_berita' => $this->input->post('id_berita'));
        return $this->db->update($this->table_berita, $data, $id);
    }
    function delete_berita($id)
    {
        return $this->db->delete($this->table_berita, array('id_berita' => $id));
    }

    function ambil_id_peran_trx($user)
    {
        $this->db->where('id_user', $user);
        return $this->db->get($this->table_trx_peran)->row();
    }
}
