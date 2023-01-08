<?php

class m_unit extends CI_Model
{
    public function getAllUnit()
    {
        $this->db->from("tbl_unit");
        $this->db->join('tbl_provinsi', 'tbl_provinsi.id_provinsi=tbl_unit.id_provinsi', 'left');
        $this->db->where("is_aktif_unit", '1');
        $query = $this->db->get();
        return $query;
    }

    public function getAllUnitAdmin()
    {
        $this->db->from("tbl_unit");
        $this->db->join('tbl_provinsi', 'tbl_provinsi.id_provinsi=tbl_unit.id_provinsi', 'left');
        $this->db->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten=tbl_unit.id_kabupaten', 'left');
        $this->db->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan=tbl_unit.id_kecamatan', 'left');
        $query = $this->db->get();
        return $query;
    }

    public function getIdUnit($id)
    {
        $query = $this->db->get_where('tbl_unit', [
            'id_unit' => $id
        ]);
        return $query;
    }

    public function hapusDataUnit($id)
    {
        $this->db->from("tbl_unit");
        $this->db->set('delete_at', date('Y-m-d'));
        $this->db->set('is_aktif_unit', 0);
        $this->db->where("id_unit", $id);
        $this->db->update("tbl_unit");
    }

    public function edit()
    {
        $id_lokasi = $this->input->post('id_unit');
        $id_provinsi = $this->input->post('provinsi');
        $id_kabupaten = $this->input->post('kabupaten');
        $id_kecamatan = $this->input->post('kecamatan');
        $nama_lokasi = $this->input->post('nama_unit');
        $alamat = $this->input->post('alamat');

        $data = [
            'id_unit' => $id_lokasi,
            'id_provinsi' => $id_provinsi,
            'id_kabupaten' => $id_kabupaten,
            'id_kecamatan' => $id_kecamatan,
            'nama_unit' => $nama_lokasi,
            'alamat' => $alamat
        ];

        $this->db->where('id_unit', $id_lokasi);
        $this->db->update('tbl_unit', $data);
    }

    public function tambah()
    {
        $data = [
            'nama_unit' => $this->input->post('nama_unit'),
            'id_provinsi' => $this->input->post('provinsi'),
            'id_kabupaten' => $this->input->post('kabupaten'),
            'id_kecamatan' => $this->input->post('kecamatan'),
            'id_kelurahan' => $this->input->post('kelurahan'),
            'alamat' => $this->input->post('alamat'),
            'is_aktif_unit' => '1'
        ];

        $this->db->insert('tbl_unit', $data);
    }

    function jumlah_unit()
    {
        $this->db->select('*');
        $this->db->from('tbl_unit');
        $query = $this->db->get()->num_rows();
        return $query;
    }
}
