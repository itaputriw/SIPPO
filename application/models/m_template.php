<?php

class m_template extends CI_Model
{
    public function getTemplate()
    {
        $this->db->from("tbl_template");
        $query = $this->db->get();
        return $query;
    }

    public function getIdTemplate($id)
    {
        $query = $this->db->get_where('tbl_template', [
            'id_template' => $id
        ]);
        return $query;
    }

    public function edit($id, $data)
    {
        $this->db->where('id_template', $id);
        $this->db->update('tbl_template', $data);
    }
}
