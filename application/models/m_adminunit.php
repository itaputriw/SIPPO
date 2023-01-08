<?php

class m_adminunit extends CI_Model
{
    public function edit()
    {
        $id_pegawai = $this->input->post('id_pegawai');
        $id_user = $this->input->post('id_user');
        $nama_pegawai = $this->input->post('nama_pegawai');
        $nip = $this->input->post('nip');
        $jk = $this->input->post('jk');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $no_hp = $this->input->post('no_hp');
        $alamat_pegawai = $this->input->post('alamat_pegawai');

        $data = [
            'id_pegawai' => $id_pegawai,
            'id_user' => $id_user,
            'nama_pegawai' => $nama_pegawai,
            'nip'  => $nip,
            'jk' => $jk,
            'tgl_lahir' => $tgl_lahir,
            'no_hp' => $no_hp,
            'alamat_pegawai' => $alamat_pegawai
        ];

        $this->db->where('id_pegawai', $id_pegawai);
        $this->db->update('tbl_pegawai', $data);
    }

    public function ubahpassword()
    {
        $password_baru = $this->input->post('password_baru1');
        $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);

        $this->db->set('password', $password_hash);
        $this->db->where('email', $this->session->userdata('email'));
        $this->db->update('tbl_user');
    }


    public function Setujui($id)
    {
        $getpegawai = $this->m_pegawai->getPegawai()->row_array();
        $this->db->set('id_pegawai', $getpegawai['id_pegawai']);
        $this->db->set('id_status', 3);
        $this->db->where("id_penelitian", $id);
        $this->db->update('tbl_penelitian');

        $penelitian = $this->m_penelitian->getIdPenelitian($id)->row_array();
        $this->db->set('id_penelitian', $penelitian['id_penelitian']);
        $this->db->set('id_status', 3);
        $this->db->insert('tbl_riwayat_status');
    }
}
