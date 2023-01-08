<?php

class m_verifikator extends CI_Model
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


    public function get_to_id($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_penelitian');
        $this->db->join('tbl_peneliti', 'tbl_peneliti.id_peneliti=tbl_penelitian.id_peneliti');
        $this->db->join('tbl_user', 'tbl_peneliti.id_user=tbl_user.id_user');
        $this->db->where('tbl_penelitian.id_penelitian', $id);
        $query = $this->db->get();
        return $query;
    }

    public function Pdisetujui($id)
    {
        $penelitian = $this->m_penelitian->getIdPenelitian($id)->row_array();
        $this->db->set('id_penelitian', $penelitian['id_penelitian']);
        $this->db->set('id_status', 2);
        $this->db->insert('tbl_riwayat_status');


        $this->db->set('id_status', 2);
        $this->db->where("id_penelitian", $id);
        $this->db->update('tbl_penelitian');

        $to_id = $this->m_verifikator->get_to_id($id)->row();
        $data = [
            'from_id_user' => $this->session->userdata('id_user'),
            'to_id_user' => $to_id->id_user,
            'pesan' => 'surat rekomendasi siap dicetak',
            'type' => 1,
            'is_read' => 0,
            'read_at' => null
        ];

        $this->db->insert('tbl_notifikasi', $data);

        require APPPATH . 'views/vendor/autoload.php';

        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );
        $pusher = new Pusher\Pusher(
            '89ef41ddad13dfe8a398',
            '9d9a38ba883ed173d740',
            '1210960',
            $options
        );

        $data['message'] = 'hello world';
        $pusher->trigger('my-channel', 'my-event', $data);
    }

    public function Pditolak($id)
    {

        $penelitian = $this->m_penelitian->getIdPenelitian($id)->row_array();
        $alasan = $this->input->post('alasan');
        $this->db->set('id_penelitian', $penelitian['id_penelitian']);
        $this->db->set('id_status', 5);
        $this->db->set('alasan', $alasan);
        $this->db->insert('tbl_riwayat_status');


        $this->db->set('id_status', 5);
        $this->db->where("id_penelitian", $id);
        $this->db->update('tbl_penelitian');
    }

    public function JDisetujui()
    {
        $this->db->select('*');
        $this->db->from('tbl_penelitian');
        $this->db->join('tbl_status', 'tbl_status.id_status=tbl_penelitian.id_status');
        $this->db->where('nama_status', 'Disetujui');
        $hasil1 = $this->db->get()->num_rows();
        return $hasil1;
    }

    public function JDitolak()
    {
        $this->db->select('*');
        $this->db->from('tbl_penelitian');
        $this->db->join('tbl_status', 'tbl_status.id_status=tbl_penelitian.id_status');
        $this->db->where('nama_status', 'Ditolak');
        $hasil2 = $this->db->get()->num_rows();
        return $hasil2;
    }

    public function JMenunggu()
    {
        $this->db->select('*');
        $this->db->from('tbl_penelitian');
        $this->db->join('tbl_status', 'tbl_status.id_status=tbl_penelitian.id_status');
        $this->db->where('nama_status', 'Menunggu');
        $hasil3 = $this->db->get()->num_rows();
        return $hasil3;
    }

    public function JSelesai()
    {
        $this->db->select('*');
        $this->db->from('tbl_penelitian');
        $this->db->join('tbl_status', 'tbl_status.id_status=tbl_penelitian.id_status');
        $this->db->where('nama_status', 'Selesai');
        $hasil4 = $this->db->get()->num_rows();
        return $hasil4;
    }


    public function Hdisetujui($id)
    {

        $penelitian = $this->m_penelitian->getIdPenelitian($id)->row_array();
        $this->db->set('id_penelitian', $penelitian['id_penelitian']);
        $this->db->set('id_status', 3);
        $this->db->insert('tbl_riwayat_status');


        $this->db->set('id_status', 3);
        $this->db->where("id_penelitian", $id);
        $this->db->update('tbl_penelitian');


        $to_id = $this->m_verifikator->get_to_id($id)->row();
        $data = [
            'from_id_user' => $this->session->userdata('id_user'),
            'to_id_user' => $to_id->id_user, //joinan dg penelitian
            'pesan' => 'bukti selesai siap dicetak',
            'type' => 2,
            'is_read' => 0,
            'read_at' => null
        ];


        $this->db->insert('tbl_notifikasi', $data);

        require APPPATH . 'views/vendor/autoload.php';

        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );
        $pusher = new Pusher\Pusher(
            '89ef41ddad13dfe8a398',
            '9d9a38ba883ed173d740',
            '1210960',
            $options
        );

        $data['message'] = 'hello world';
        $pusher->trigger('my-channel', 'my-event', $data);
    }

    public function Hperbaikan($id)
    {
        $penelitian = $this->m_penelitian->getIdPenelitian($id)->row_array();
        $this->db->set('id_penelitian', $penelitian['id_penelitian']);
        $this->db->set('id_status', 4);
        $this->db->insert('tbl_riwayat_status');


        $this->db->set('id_status', 4);
        $this->db->where("id_penelitian", $id);
        $this->db->update('tbl_penelitian');
    }

    function grafik($status)
    {
        $this->db->select('*');
        $this->db->from('tbl_penelitian');
        $this->db->where($status);
        $hasil = $this->db->get()->num_rows();
        return $hasil;
    }

    function grafik1($bulan)
    {
        $this->db->select('*');
        $this->db->from('tbl_peneliti');
        $this->db->where($bulan);
        $hasil1 = $this->db->get()->num_rows();
        return $hasil1;
    }

    function fetch_year() //AMBIL TAHUN
    {
        $this->db->select("year(create_date)");
        $this->db->from('tbl_peneliti');
        $this->db->where('EXTRACT(YEAR FROM create_date)');
        $this->db->group_by('year(create_date)');
        $this->db->order_by('year(create_date)', 'DESC');
        return $this->db->get()->result_array();
    }

    public function fetchdata_grafik_penelitian2()
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

    public function Selesai($id)
    {
        $getpegawai = $this->m_pegawai->getPegawai()->row_array();
        $this->db->set('id_pegawai', $getpegawai['id_pegawai']);
        $this->db->set('status', 'Selesai');
        $this->db->set('tgl_verifikasi_pengajuan', date('Y-m-d'));
        $this->db->where("id_penelitian", $id);
        $this->db->update('tbl_penelitian');
    }
}
