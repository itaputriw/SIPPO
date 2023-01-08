<?php

class m_kategorihasil extends CI_Model
{
    public function getAllKategoriHasil()
    {
        $this->db->from("tbl_kategori_hasil");
        $this->db->where("is_aktif_hasil", '1');
        $query = $this->db->get();
        return $query;
    }
    public function getAllKategoriHasilAdmin()
    {
        $this->db->from("tbl_kategori_hasil");
        $this->db->order_by('id_kategori_hasil', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function getIdKategoriHasil($id)
    {
        $query = $this->db->get_where('tbl_kategori_hasil', [
            'id_kategori_hasil' => $id
        ]);
        return $query;
    }

    public function hapusDataKategoriHasil($id)
    {
        $this->db->from("tbl_kategori_hasil");
        $this->db->set('delete_at', date('Y-m-d'));
        $this->db->set('is_aktif_hasil', 0);
        $this->db->where("id_kategori_hasil", $id);
        $this->db->update("tbl_kategori_hasil");
    }

    public function edit()
    {
        $id_kategori_hasil = $this->input->post('id_kategori_hasil');
        $nama_kategori_hasil = $this->input->post('nama_kategori_hasil');
        $keterangan = $this->input->post('keterangan');

        $data = [
            'id_kategori_hasil' => $id_kategori_hasil,
            'nama_kategori_hasil' => $nama_kategori_hasil,
            'keterangan' => $keterangan
        ];

        $this->db->where('id_kategori_hasil', $id_kategori_hasil);
        $this->db->update('tbl_kategori_hasil', $data);
    }

    public function tambah()
    {
        $data = [
            'nama_kategori_hasil' => $this->input->post('nama_kategori_hasil'),
            'keterangan' => $this->input->post('keterangan'),
            'is_aktif_hasil' => '1'
        ];

        $this->db->insert('tbl_kategori_hasil', $data);
    }

    function jumlah_kategori_hasil()
    {
        $this->db->select('*');
        $this->db->from('tbl_kategori_hasil');
        $query = $this->db->get()->num_rows();
        return $query;
    }
}
