<?php

class m_menu extends CI_Model
{
    public function getAllMenu()
    {
        $this->db->from("tbl_user_menu");
        $query = $this->db->get();
        return $query;
    }

    public function getAllMenu1()
    {

        $this->db->select("*");
        $this->db->from("tbl_user_menu");
        $this->db->where('id_menu !=', 1);
        $query = $this->db->get();
        return $query;
    }

    public function getIdMenu($id)
    {
        $query = $this->db->get_where('tbl_user_menu', [
            'id_menu' => $id
        ]);
        return $query;
    }

    public function hapusDataMenu($id)
    {
        $this->db->from("tbl_user_menu");
        $this->db->where("id_user_menu", $id);
        $this->db->update("tbl_user_menu");
    }

    public function edit()
    {
        $id_menu = $this->input->post('id_menu');
        $nama_menu = $this->input->post('nama_menu');
        $url = $this->input->post('url');
        $icon = $this->input->post('icon');

        $data = [
            'id_menu' => $id_menu,
            'nama_menu' => $nama_menu,
            'url' => $url,
            'icon' => $icon
        ];

        $this->db->where('id_menu', $id_menu);
        $this->db->update('tbl_user_menu', $data);
    }

    public function tambah()
    {
        $data = [
            'nama_menu' => $this->input->post('nama_menu'),
            'url' => $this->input->post('url'),
            'icon' => $this->input->post('icon'),
            'is_aktif_menu' => 1
        ];

        $this->db->insert('tbl_user_menu', $data);
    }

    function jumlah_menu()
    {
        $this->db->select('*');
        $this->db->from('tbl_user_menu');
        $query = $this->db->get()->num_rows();
        return $query;
    }
}
