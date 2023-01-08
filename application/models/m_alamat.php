<?php

class m_alamat extends CI_Model
{
    public function getAllProvinsi()
    {
        $this->db->from("tbl_provinsi");
        $query = $this->db->get();
        return $query;
    }
    public function getAllKabupaten()
    {
        $this->db->from("tbl_kabupaten");
        $query = $this->db->get();
        return $query;
    }

    public function get_kabupaten($id_provinsi)
    {
        $query = $this->db->get_where('tbl_kabupaten', array('id_provinsi' => $id_provinsi));
        return $query;
    }

    public function get_kecamatan($id_kabupaten)
    {
        $query = $this->db->get_where('tbl_kecamatan', array('id_kabupaten' => $id_kabupaten));
        return $query;
    }
    public function get_kelurahan($id_kecamatan)
    {
        $query = $this->db->get_where('tbl_kelurahan', array('id_kecamatan' => $id_kecamatan));
        return $query;
    }
    public function getAllKecamatan()
    {
        $this->db->from("tbl_kecamatan");
        $query = $this->db->get();
        return $query;
    }
}
