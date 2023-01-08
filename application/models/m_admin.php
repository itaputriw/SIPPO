<?php

class m_admin extends CI_Model
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

    public function Pdisetujui($id)
    {
        $getpegawai = $this->m_pegawai->getPegawai()->row_array();
        $this->db->set('id_pegawai', $getpegawai['id_pegawai']);
        $this->db->set('status', 'Disetujui');
        $this->db->set('tgl_verifikasi_pengajuan', date('Y-m-d'));
        $this->db->where("id_penelitian", $id);
        $this->db->update('tbl_penelitian');
    }

    public function fetchdata_grafik_peneliti()
    {
        $query = $this->db->query("SELECT COUNT(id_peneliti) as count,MONTHNAME(create_date) as month_name FROM tbl_peneliti WHERE YEAR(create_date) = '" . $this->input->post('year') . "'
        GROUP BY YEAR(create_date),MONTH(create_date)");
        $chart_data = $query->result();
        foreach ($chart_data as $row) {
            $output[] = array(
                'month_name'   => $row->month_name,
                'count'  => floatval($row->count),
            );
        }
        echo json_encode($output);
    }

    public function Pditolak($id)
    {
        $getpegawai = $this->m_pegawai->getPegawai()->row_array();
        $this->db->set('id_pegawai', $getpegawai['id_pegawai']);
        $this->db->set('status', 'Ditolak');
        $this->db->set('tgl_ditolak', date('Y-m-d'));
        $this->db->where("id_penelitian", $id);
        $this->db->update('tbl_penelitian');
    }


    public function fetchdata_grafik_penelitian()
    {
        $query = $this->db->query("SELECT COUNT(id_penelitian) as count,nama_status as stat FROM tbl_penelitian Join tbl_status ON `tbl_status`.`id_status` = `tbl_penelitian`.`id_status` WHERE YEAR(tgl_diajukan) = '" . $this->input->post('year') . "'
        GROUP BY nama_status");
        $chart_data = $query->result();
        foreach ($chart_data as $row) {
            $output[] = array(
                'status'   => $row->stat,
                'count'  => floatval($row->count),
            );
        }
        echo json_encode($output);
    }

    public function Hdisetujui($id)
    {

        $this->db->set('status', 'Selesai');
        $this->db->set('tgl_verifikasi_hasil', date('Y-m-d'));
        $this->db->where("id_penelitian", $id);
        $this->db->update('tbl_penelitian');
        $getpegawai = $this->m_pegawai->getPegawai()->row_array();
        $this->db->set('id_pegawai', $getpegawai['id_pegawai']);
        $this->db->update('tbl_hasil_penelitian');
    }

    public function Hperbaikan($id)
    {
        $this->db->set('status', 'Perbaikan');
        $this->db->set('tgl_perbaikan', date('Y-m-d'));
        $this->db->where("id_penelitian", $id);
        $this->db->update('tbl_penelitian');
    }
}
