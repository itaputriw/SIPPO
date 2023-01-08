<?php

class m_anggota extends CI_Model
{
    public function getJoin($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_anggota_penelitian');
        $this->db->join('tbl_penelitian', 'tbl_penelitian.id_penelitian=tbl_anggota_penelitian.id_penelitian');
        $this->db->join('tbl_peneliti', 'tbl_peneliti.id_peneliti=tbl_anggota_penelitian.id_peneliti');
        $this->db->where('tbl_penelitian.id_penelitian', $id);
        $query_gabungan = $this->db->get();
        return $query_gabungan;
    }
}
