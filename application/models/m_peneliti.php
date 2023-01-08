<?php

class m_peneliti extends CI_Model
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

    public function getAllPeneliti()
    {
        $this->db->select('*');
        $this->db->order_by('create_date', 'ASC');
        $query = $this->db->get('tbl_peneliti');
        return $query;
    }

    public function getAllPenelitiLimit($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('nama_peneliti', $keyword);
            $this->db->or_like('no_identitas', $keyword);
        }
        return $this->db->get('tbl_peneliti', $limit, $start)->result_array();
    }

    public function countPeneliti()
    {
        return $this->db->get('tbl_peneliti')->num_rows();
    }

    public function getAllPeneliti1()
    {
        $this->db->select('*');
        $this->db->from('tbl_peneliti');
        $this->db->join('tbl_user', 'tbl_user.id_user = tbl_peneliti.id_user');
        $this->db->where_not_in('tbl_peneliti.id_user',  $this->session->userdata('id_user'));
        $query = $this->db->get();
        return $query;
    }

    public function getIdPeneliti($id)
    {
        $query = $this->db->get_where('tbl_peneliti', [
            'id_peneliti' => $id
        ]);
        return $query;
    }

    public function getJoinId($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_peneliti');
        $this->db->join('tbl_user', 'tbl_user.id_user=tbl_peneliti.id_user');
        $this->db->where('tbl_peneliti.id_peneliti', $id);
        $query = $this->db->get();
        return $query;
    }

    public function editProfil()
    {
        $id_peneliti = $this->input->post('id_peneliti');
        $id_user = $this->input->post('id_user');
        $nama_peneliti = $this->input->post('nama_peneliti');
        $no_identitas = $this->input->post('no_identitas');
        $jk = $this->input->post('jk');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $no_hp = $this->input->post('no_hp');
        $alamat = $this->input->post('alamat');

        $data = [
            'id_peneliti' => $id_peneliti,
            'id_user' => $id_user,
            'nama_peneliti' => $nama_peneliti,
            'no_identitas'  => $no_identitas,
            'jk' => $jk,
            'tgl_lahir' => $tgl_lahir,
            'no_hp' => $no_hp,
            'alamat' => $alamat
        ];

        $this->db->where('id_peneliti', $id_peneliti);
        $this->db->update('tbl_peneliti', $data);
    }

    function ubahpassword()
    {
        $password_baru = $this->input->post('password_baru1');
        $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);

        $this->db->set('password', $password_hash);
        $this->db->where('email', $this->session->userdata('email'));
        $this->db->update('tbl_user');
    }

    function hitpenelitian_user()
    {
        $this->db->select('*');
        $this->db->from('tbl_penelitian');
        $this->db->join('tbl_peneliti', 'tbl_peneliti.id_peneliti=tbl_penelitian.id_peneliti');
        $this->db->join('tbl_status', 'tbl_status.id_status=tbl_penelitian.id_status');
        $this->db->where('tbl_peneliti.id_user',  $this->session->userdata('id_user'));
        $this->db->where_not_in('nama_status',  'Selesai');
        $hasil = $this->db->get();
        $data = $hasil->num_rows();
        return $data;
    }

    function hitpenelitian_selesai()
    {
        $this->db->select('*');
        $this->db->from('tbl_penelitian');
        $this->db->join('tbl_peneliti', 'tbl_peneliti.id_peneliti=tbl_penelitian.id_peneliti');
        $this->db->join('tbl_status', 'tbl_status.id_status=tbl_penelitian.id_status');
        $this->db->where('nama_status', 'Selesai');
        $this->db->where('tbl_peneliti.id_user',  $this->session->userdata('id_user'));
        $hasil = $this->db->get();
        $data = $hasil->num_rows();
        return $data;
    }

    public function hapusDataPeneliti($id)
    {
        $this->db->where("tbl_peneliti.id_user", $id);
        $this->db->delete("tbl_peneliti");
        $this->db->where("tbl_user.id_user", $id);
        $this->db->delete("tbl_user");
    }

    function jumlah_peneliti()
    {
        $this->db->select('*');
        $this->db->from('tbl_peneliti');
        $query = $this->db->get()->num_rows();
        return $query;
    }
}
