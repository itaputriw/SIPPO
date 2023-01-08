<?php

class m_notifikasi extends CI_Model
{

    public function update_is_read($id)
    {
        $this->db->set('is_read', 1);
        $this->db->set('read_at', date("Y-m-d H:i:s"));
        $this->db->where("id_notifikasi", $id);
        $this->db->update('tbl_notifikasi');
    }

    function notif()
    {
        $this->db->select('*');
        $this->db->from('tbl_notifikasi');
        $query = $this->db->get();
        return $query;
    }
}
