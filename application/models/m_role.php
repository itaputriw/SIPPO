<?php

class m_role extends CI_Model
{

    public function getIdRole($id)
    {
        $query = $this->db->get_where('tbl_role', [
            'id_role' => $id
        ]);
        return $query;
    }

    public function getAllRole()
    {
        $this->db->select("*");
        $this->db->from("tbl_role");
        $query = $this->db->get();
        return $query;
    }

    public function akses_menu($data)
    {
        $result = $this->db->get_where('tbl_user_akses_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('tbl_user_akses_menu', $data);
        } else {
            $this->db->delete('tbl_user_akses_menu', $data);
        }
    }
}
