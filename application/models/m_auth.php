<?php

class m_auth extends CI_Model
{
    public function getPeneliti()
    {
        $this->db->select('*');
        $this->db->from('tbl_peneliti');
        $this->db->join('tbl_user', 'tbl_user.id_user = tbl_peneliti.id_user');
        $this->db->join('tbl_role', 'tbl_role.id_role = tbl_user.role');
        $this->db->where('tbl_peneliti.id_user',  $this->session->userdata('id_user'));
        $query = $this->db->get();
        return $query;
    }

    public function getPegawai()
    {
        $this->db->select('*');
        $this->db->from('tbl_pegawai');
        $this->db->where('tbl_pegawai.id_user',  $this->session->userdata('id_user'));
        $this->db->join('tbl_user', 'tbl_user.id_user = tbl_pegawai.id_user');
        $this->db->join('tbl_role', 'tbl_role.id_role = tbl_user.role');
        $query = $this->db->get();
        return $query;
    }

    public function regis()
    {
        $data1 = [
            'email' => htmlspecialchars($this->input->post('email', true)),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'role' => 4,
            'aktif' => 1
        ];

        $this->db->insert('tbl_user', $data1);

        $data = [
            'id_user' => $this->db->insert_id(),
            'nama_peneliti' => $this->input->post('nama_peneliti', true),
            'no_identitas' => $this->input->post('no_identitas', true),
            'jk' => ($this->input->post('jk', true)),
            'tgl_lahir' => $this->input->post('tgl_lahir', true),
            'no_hp' => $this->input->post('no_hp', true),
            'alamat' => $this->input->post('alamat', true)
        ];

        $this->db->insert('tbl_peneliti', $data);
    }
}
