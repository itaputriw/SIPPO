<?php

class m_hasilpenelitian extends CI_Model
{

    public function getAllHasil()
    {
        $query = $this->db->get('tbl_hasil_penelitian');
        return $query;
    }

    public function getJoinId($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_hasil_penelitian');
        $this->db->join('tbl_peneliti', 'tbl_peneliti.id_peneliti=tbl_hasil_penelitian.id_peneliti');
        $this->db->join('tbl_kategori_hasil', 'tbl_kategori_hasil.id_kategori_hasil=tbl_hasil_penelitian.id_kategori_hasil', 'left');
        $this->db->join('tbl_penelitian', 'tbl_penelitian.id_penelitian=tbl_hasil_penelitian.id_penelitian');
        $this->db->join('tbl_pegawai', 'tbl_pegawai.id_pegawai=tbl_hasil_penelitian.id_pegawai', 'left');
        $this->db->where('tbl_hasil_penelitian.id_hasil_penelitian', $id);
        $query = $this->db->get();
        return $query;
    }

    public function getJoinIdHasilPenelitian($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_hasil_penelitian');
        $this->db->join('tbl_peneliti', 'tbl_peneliti.id_peneliti=tbl_hasil_penelitian.id_peneliti');
        $this->db->join('tbl_kategori_hasil', 'tbl_kategori_hasil.id_kategori_hasil=tbl_hasil_penelitian.id_kategori_hasil', 'left');
        $this->db->join('tbl_penelitian', 'tbl_penelitian.id_penelitian=tbl_hasil_penelitian.id_penelitian');
        $this->db->join('tbl_pegawai', 'tbl_pegawai.id_pegawai=tbl_hasil_penelitian.id_pegawai', 'left');
        $this->db->where('tbl_hasil_penelitian.id_penelitian', $id);
        $query = $this->db->get();
        return $query;
    }

    public function getJoin()
    {
        $this->db->select('*');
        $this->db->from('tbl_hasil_penelitian');
        $this->db->join('tbl_peneliti', 'tbl_peneliti.id_peneliti=tbl_hasil_penelitian.id_peneliti');
        $this->db->join('tbl_kategori_hasil', 'tbl_kategori_hasil.id_kategori_hasil=tbl_hasil_penelitian.id_kategori_hasil', 'left');
        $this->db->join('tbl_penelitian', 'tbl_penelitian.id_penelitian=tbl_hasil_penelitian.id_penelitian');
        $this->db->join('tbl_pegawai', 'tbl_pegawai.id_pegawai=tbl_hasil_penelitian.id_pegawai', 'left');
        $this->db->where('tbl_peneliti.id_user',  $this->session->userdata('id_user'));
        $query_gabungan = $this->db->get();
        return $query_gabungan;
    }

    public function getJoinAll()
    {
        $this->db->select('*');
        $this->db->from('tbl_hasil_penelitian');
        $this->db->join('tbl_peneliti', 'tbl_peneliti.id_peneliti=tbl_hasil_penelitian.id_peneliti');
        $this->db->join('tbl_kategori_hasil', 'tbl_kategori_hasil.id_kategori_hasil=tbl_hasil_penelitian.id_kategori_hasil', 'left');
        $this->db->join('tbl_penelitian', 'tbl_penelitian.id_penelitian=tbl_hasil_penelitian.id_penelitian');
        $this->db->join('tbl_pegawai', 'tbl_pegawai.id_pegawai=tbl_hasil_penelitian.id_pegawai', 'left');
        $query_gabungan = $this->db->get();
        return $query_gabungan;
    }

    public function edit($id, $data)
    {
        $this->db->where('id_hasil_penelitian', $id);
        $this->db->update('tbl_hasil_penelitian', $data);
    }

    public function tambahhasil($data)
    {
        $this->db->insert('tbl_hasil_penelitian', $data);
        return $this->db->insert_id('id_penelitian');
    }

    public function hapusDataHasilPenelitian($id)
    {
        $this->db->from("tbl_hasil_penelitian");
        $this->db->where("id_hasil_penelitian", $id);
        $this->db->delete("tbl_hasil_penelitian");
    }

    public function getIdPenelitian($id)
    {
        $query = $this->db->get_where('tbl_hasil_penelitian', [
            'id_hasil_penelitian' => $id
        ]);
        return $query;
    }

    function jumlah_hasilpenelitian()
    {
        $this->db->select('*');
        $this->db->from('tbl_hasil_penelitian');
        $query = $this->db->get()->num_rows();
        return $query;
    }
}
