<?php
class M_Konten extends CI_Model
{
    //for article
    public function lihat_artikel()
    {
        return $this->db->query("SELECT * FROM article");
    }

    public function tampil()
    {
        $query = $this->db->query("SELECT * FROM article WHERE status = 'DITERBITKAN' ORDER BY id DESC LIMIT 6");
        return $query;
    }

    public function semua_artikel($limit, $start)
    {
        $this->db->from('article');
        $this->db->where(array('status' => 'DITERBITKAN'));
        $this->db->order_by('id', 'DESC');
        $this->db->limit($limit, $start);
        return $this->db->get();
    }

    public function pilihan_artikel($id_artikel)
    {
        return $this->db->query("SELECT * FROM article WHERE id = '$id_artikel'");
    }

    public function pilih_tipe_artikel($limit, $start)
    {
        $this->db->from('article');
        $this->db->where(array('status' => 'DITERBITKAN'));
        $this->db->order_by('id', 'DESC');
        $this->db->limit($limit, $start);
        return $this->db->get();
    }

    // public function cek_pdf($id_artikel)
    // {
    //     return $this->db->query("SELECT isi, file FROM artikel WHERE id_artikel = '$id_artikel'");
    // }

    public function insert_record($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function update_record($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function delete_record($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
