<?php

class m_pegawai extends CI_Model
{
    public function getPegawai1()
    {
        $this->db->select('*');
        $this->db->from('tbl_pegawai');
        $this->db->join('tbl_user', 'tbl_user.id_user = tbl_pegawai.id_user');
        $this->db->join('tbl_role', 'tbl_role.id_role = tbl_user.role');
        $this->db->order_by('id_pegawai', 'ASC');
        $query = $this->db->get();
        if ($query->num_rows() != 0) {
            return $query->result_array();
        } else {
            return false;
        }
        return $query;
    }

    public function getPegawai()
    {
        $this->db->select('*, tbl_pegawai.id_unit as unit_pegawai');
        $this->db->from('tbl_pegawai');
        $this->db->join('tbl_user', 'tbl_user.id_user = tbl_pegawai.id_user');
        $this->db->join('tbl_role', 'tbl_role.id_role = tbl_user.role');
        $this->db->join('tbl_unit', 'tbl_unit.id_unit = tbl_pegawai.id_unit');
        $this->db->where('tbl_pegawai.id_user',  $this->session->userdata('id_user'));
        $query = $this->db->get();
        return $query;
    }

    public function getAllPegawai()
    {
        $this->db->from("tbl_pegawai");
        $this->db->order_by('id_pegawai', 'ASC');
        $query = $this->db->get();
        return $query;
    }

    public function getJoinId($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_pegawai');
        $this->db->where('tbl_pegawai.id_pegawai', $id);
        $this->db->join('tbl_user', 'tbl_user.id_user=tbl_pegawai.id_user');
        $this->db->join('tbl_unit', 'tbl_unit.id_unit = tbl_pegawai.id_unit');

        $query = $this->db->get();
        return $query;
    }

    public function tambah()
    {
        $data1 = [
            'email' => htmlspecialchars($this->input->post('email', true)),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'role' => $this->input->post('role', true),
            'aktif' => 1
        ];

        $this->db->insert('tbl_user', $data1);

        $data = [
            'id_user' => $this->db->insert_id(),
            'id_unit' => $this->input->post('unit'),
            'nama_pegawai' => $this->input->post('nama_pegawai', true),
            'nip' => $this->input->post('nip', true),
            'jk' => $this->input->post('jk', true),
            'tgl_lahir' => $this->input->post('tgl_lahir', true),
            'no_hp' => $this->input->post('no_hp', true),
            'alamat_pegawai' => $this->input->post('alamat_pegawai', true),
            'is_aktif' => 1
        ];

        $this->db->insert('tbl_pegawai', $data);
    }

    public function edit()
    {
        $id = $this->input->post('id_pegawai');
        $id_user = $this->input->post('id_user');
        $nama_pegawai = $this->input->post('nama_pegawai');
        $nip = $this->input->post('nip');
        $jk = $this->input->post('jk');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $no_hp = $this->input->post('no_hp');
        $alamat_pegawai = $this->input->post('alamat_pegawai');

        $data = [
            'id_pegawai' => $id,
            'id_user' => $id_user,
            'nama_pegawai' => $nama_pegawai,
            'nip'  => $nip,
            'jk' => $jk,
            'tgl_lahir' => $tgl_lahir,
            'no_hp' => $no_hp,
            'alamat_pegawai' => $alamat_pegawai
        ];

        $this->db->where('id_pegawai', $id);
        $this->db->update('tbl_pegawai', $data);
    }

    public function hapusDataPegawai($id)
    {
        $this->db->from("tbl_pegawai");
        $this->db->set('delete_at', date('Y-m-d'));
        $this->db->set('is_aktif', 0);
        $this->db->where("tbl_pegawai.id_user", $id);
        $this->db->update("tbl_pegawai");

        $this->db->set('aktif', '0');
        $this->db->where("id_user", $id);
        $this->db->update('tbl_user');
    }


    function jumlah_pegawai()
    {
        $this->db->select('*');
        $this->db->from('tbl_pegawai');
        $query = $this->db->get()->num_rows();
        return $query;
    }

    function getrole()
    {
        $this->db->select('*');
        $this->db->from('tbl_role');
        $this->db->where_not_in('nama_role', 'Peneliti');
        $query = $this->db->get();
        return $query;
    }
}
