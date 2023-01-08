<?php

class m_pejabat extends CI_Model
{
    public function getPejabat()
    {
        $this->db->from("tbl_pejabat");
        $query = $this->db->get();
        return $query;
    }

    public function getIdPejabat($id)
    {
        $query = $this->db->get_where('tbl_pejabat', [
            'id_pejabat' => $id
        ]);
        return $query;
    }

    public function edit()
    {
        $id_pejabat = $this->input->post('id_pejabat');
        $nama_pejabat = $this->input->post('nama_pejabat');
        $NIP = $this->input->post('NIP');
        $pangkat = $this->input->post('pangkat');
        $golongan = $this->input->post('golongan');
        $jabatan = $this->input->post('jabatan');

        $data = [
            'id_pejabat' => $id_pejabat,
            'nama_pejabat' => $nama_pejabat,
            'NIP' => $NIP,
            'pangkat' => $pangkat,
            'golongan' => $golongan,
            'jabatan' => $jabatan
        ];

        $this->db->where('id_pejabat', $id_pejabat);
        $this->db->update('tbl_pejabat', $data);
    }
}
