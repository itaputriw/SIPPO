<?php

class m_penelitian extends CI_Model
{
    public function getPeneliti()
    {
        $this->db->select('*');
        $this->db->from('tbl_peneliti,id_peneliti');
        $this->db->where('tbl_peneliti.id_user',  $this->session->userdata('id_user'));
        $this->db->join('tbl_user', 'tbl_user.id_user = tbl_peneliti.id_user');
        $this->db->join('tbl_role', 'tbl_role.id_role = tbl_user.role');
        $query = $this->db->get();
        return $query;
    }

    public function kode_surat()
    {
        $this->db->select('RIGHT(tbl_penelitian.nomor_surat,3) as kode', FALSE);
        $this->db->order_by('nomor_surat', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tbl_penelitian');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $kodejadi = str_pad($kode, 4, "0", STR_PAD_LEFT);
        return $kodejadi;
    }


    public function getIdPenelitian($id)
    {
        $query = $this->db->get_where('tbl_penelitian', [
            'id_penelitian' => $id
        ]);
        return $query;
    }

    public function getJoinId($id)
    {
        $this->db->select('*,tbl_peneliti.alamat as alamat_peneliti');
        $this->db->from('tbl_penelitian');
        $this->db->join('tbl_peneliti', 'tbl_peneliti.id_peneliti=tbl_penelitian.id_peneliti');
        $this->db->join('tbl_pegawai', 'tbl_pegawai.id_pegawai=tbl_penelitian.id_pegawai', 'left');
        $this->db->join('tbl_unit', 'tbl_unit.id_unit=tbl_penelitian.id_unit', 'left');
        $this->db->where('tbl_penelitian.id_penelitian', $id);
        $this->db->where('tbl_peneliti.id_user',  $this->session->userdata('id_user'));
        $query = $this->db->get();

        $this->db->select('*,tbl_peneliti.alamat as alamat_peneliti');
        $this->db->from('tbl_anggota_penelitian');
        $this->db->join('tbl_penelitian', 'tbl_penelitian.id_penelitian=tbl_anggota_penelitian.id_penelitian');
        $this->db->join('tbl_peneliti', 'tbl_peneliti.id_peneliti=tbl_anggota_penelitian.id_peneliti');
        $this->db->join('tbl_unit', 'tbl_penelitian.id_unit = tbl_unit.id_unit', 'left');
        $this->db->where('id_user=' .  $this->session->userdata('id_user'));
        $query_gabungan1 = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query;
        } else if (($query->num_rows() > 0) && ($query_gabungan1->num_rows() > 0)) {
            return $query;
            return $query_gabungan1;
        } else {
            $this->db->select('*,tbl_peneliti.alamat as alamat_peneliti');
            $this->db->from('tbl_anggota_penelitian');
            $this->db->join('tbl_penelitian', 'tbl_penelitian.id_penelitian=tbl_anggota_penelitian.id_penelitian');
            $this->db->join('tbl_peneliti', 'tbl_peneliti.id_peneliti=tbl_anggota_penelitian.id_peneliti');
            $this->db->join('tbl_unit', 'tbl_penelitian.id_unit = tbl_unit.id_unit', 'left');
            $this->db->where('id_user=' .  $this->session->userdata('id_user'));
            $this->db->where('tbl_penelitian.id_penelitian', $id);
            $query_gabungan1 = $this->db->get();
            return $query_gabungan1;
        }
    }

    public function getJoinId1($id)
    {
        $this->db->select('*,tbl_peneliti.alamat as alamat_peneliti');
        $this->db->from('tbl_penelitian');
        $this->db->join('tbl_peneliti', 'tbl_peneliti.id_peneliti=tbl_penelitian.id_peneliti');
        $this->db->join('tbl_pegawai', 'tbl_pegawai.id_pegawai=tbl_penelitian.id_pegawai', 'left');
        $this->db->join('tbl_unit', 'tbl_unit.id_unit=tbl_penelitian.id_unit', 'left');
        $this->db->where('tbl_penelitian.id_penelitian', $id);
        $query = $this->db->get();
        return $query;
    }

    public function getJoinAll()
    {
        $this->db->select('*,tbl_penelitian.id_unit as unit');
        $this->db->from('tbl_penelitian');
        $this->db->join('tbl_peneliti', 'tbl_peneliti.id_peneliti=tbl_penelitian.id_peneliti');
        $this->db->join('tbl_unit', 'tbl_unit.id_unit=tbl_penelitian.id_unit', 'left');
        $this->db->join('tbl_status', 'tbl_status.id_status=tbl_penelitian.id_status');
        $this->db->join('tbl_pegawai', 'tbl_pegawai.id_pegawai=tbl_penelitian.id_pegawai', 'left');
        $this->db->order_by('nomor_surat', 'ASC');
        $query_gabungan = $this->db->get();
        return $query_gabungan;
    }

    public function getJoin1()
    {
        $this->db->select('*');
        $this->db->from('tbl_penelitian');
        $this->db->join('tbl_peneliti', 'tbl_peneliti.id_peneliti=tbl_penelitian.id_peneliti');
        $this->db->join('tbl_pegawai', 'tbl_pegawai.id_pegawai=tbl_penelitian.id_pegawai', 'left');
        $this->db->join('tbl_status', 'tbl_status.id_status=tbl_penelitian.id_status', 'left');
        $this->db->join('tbl_unit', 'tbl_unit.id_unit=tbl_penelitian.id_unit', 'left');
        $this->db->where('tbl_peneliti.id_user',  $this->session->userdata('id_user'));
        $this->db->order_by('nomor_surat', 'ASC');
        $query_gabungan = $this->db->get();
        return $query_gabungan;
    }


    public function getJoinriwayat()
    {
        $this->db->select('*');
        $this->db->from('tbl_riwayat_status');
        $this->db->join('tbl_penelitian', 'tbl_penelitian.id_penelitian=tbl_riwayat_status.id_penelitian AND tbl_penelitian.id_status=tbl_riwayat_status.id_status', 'left');
        $this->db->join('tbl_peneliti', 'tbl_peneliti.id_peneliti=tbl_penelitian.id_peneliti', 'left');
        $this->db->join('tbl_pegawai', 'tbl_pegawai.id_pegawai=tbl_penelitian.id_pegawai', 'left');
        $this->db->join('tbl_status', 'tbl_status.id_status=tbl_riwayat_status.id_status', 'left');
        $this->db->join('tbl_unit', 'tbl_unit.id_unit=tbl_penelitian.id_unit', 'left');
        $this->db->order_by('tbl_riwayat_status.id_riwayat_status', 'desc');
        $this->db->where('tbl_peneliti.id_user',  $this->session->userdata('id_user'));
        $this->db->order_by('nomor_surat', 'ASC');

        $query_gabungan = $this->db->get();
        return $query_gabungan;
    }

    public function riwayat()
    {
        $this->db->select('*');
        $this->db->from('tbl_riwayat_status');
        $this->db->join('tbl_status', 'tbl_status.id_status=tbl_riwayat_status.id_status', 'left');
        $this->db->join('tbl_penelitian', 'tbl_penelitian.id_penelitian=tbl_riwayat_status.id_penelitian');
        $this->db->where('tbl_penelitian.id_status', '5');

        $query_gabungan = $this->db->get();
        return $query_gabungan;
    }

    public function getJoin2()
    {
        $this->db->select('*');
        $this->db->from('tbl_penelitian');
        $this->db->join('tbl_peneliti', 'tbl_peneliti.id_peneliti=tbl_penelitian.id_peneliti');
        $this->db->join('tbl_pegawai', 'tbl_pegawai.id_pegawai=tbl_penelitian.id_pegawai', 'left');
        $this->db->join('tbl_unit', 'tbl_unit.id_unit=tbl_penelitian.id_unit', 'left');
        $this->db->join('tbl_anggota_penelitian', 'tbl_penelitian.id_penelitian = tbl_anggota_penelitian.id_penelitian', 'inner');
        $query_gabungan = $this->db->get();
        return $query_gabungan;
    }


    public function getJoin()
    {
        $this->db->select('*');
        $this->db->from('tbl_penelitian');
        $this->db->join('tbl_peneliti', 'tbl_peneliti.id_peneliti=tbl_penelitian.id_peneliti');
        $this->db->join('tbl_pegawai', 'tbl_pegawai.id_pegawai=tbl_penelitian.id_pegawai', 'left');
        $this->db->join('tbl_unit', 'tbl_unit.id_unit=tbl_penelitian.id_unit', 'left');
        $this->db->where('tbl_peneliti.id_user',  $this->session->userdata('id_user'));
        $query_gabungan = $this->db->get();

        $this->db->select('*');
        $this->db->from('tbl_anggota_penelitian');
        $this->db->join('tbl_penelitian', 'tbl_penelitian.id_penelitian=tbl_anggota_penelitian.id_penelitian');
        $this->db->join('tbl_peneliti', 'tbl_peneliti.id_peneliti=tbl_anggota_penelitian.id_peneliti');
        $this->db->where('id_user=' .  $this->session->userdata('id_user'));
        $query_gabungan1 = $this->db->get();


        if (($query_gabungan->num_rows() > 0) && ($query_gabungan1->num_rows() > 0)) {
            return $query_gabungan;
        } else if ($query_gabungan->num_rows() > 0) {
            return $query_gabungan;
        } else {
            return $query_gabungan1;
        }
    }

    public function getJoinAnggota()
    {
        $this->db->select('*');
        $this->db->from('tbl_anggota_penelitian');
        $this->db->join('tbl_penelitian', 'tbl_penelitian.id_penelitian=tbl_anggota_penelitian.id_penelitian');
        $this->db->join('tbl_status', 'tbl_status.id_status=tbl_penelitian.id_status', 'left');
        $this->db->join('tbl_peneliti', 'tbl_peneliti.id_peneliti=tbl_anggota_penelitian.id_peneliti');
        $this->db->where('id_user=' .  $this->session->userdata('id_user'));
        $query_gabungan = $this->db->get();
        return $query_gabungan;
    }

    public function tambahpenelitian($data)
    {

        $this->db->insert('tbl_penelitian', $data);
        return $this->db->insert_id();
    }

    public function hapusDataPenelitian($id)
    {
        $this->db->from("tbl_penelitian");
        $this->db->where("id_penelitian", $id);
        $this->db->delete("tbl_penelitian");
    }

    public function edit($id, $data)
    {
        $this->db->where('id_penelitian', $id);
        $this->db->update('tbl_penelitian', $data);
    }


    public function JDisetujui()
    {
        $this->db->select('*');
        $this->db->from('tbl_penelitian');
        $this->db->where('status', 'Disetujui');
        $query = $this->db->get()->num_rows();
        return $query;
    }

    public function JDitolak()
    {
        $this->db->select('*');
        $this->db->from('tbl_penelitian');
        $this->db->where('status', 'Ditolak');
        $query = $this->db->get()->num_rows();
        return $query;
    }

    public function JMenunggu()
    {
        $this->db->select('*');
        $this->db->from('tbl_penelitian');
        $this->db->where('status', 'Menunggu');
        $query = $this->db->get()->num_rows();
        return $query;
    }

    public function JSelesai()
    {
        $this->db->select('*');
        $this->db->from('tbl_penelitian');
        $this->db->where('status', 'Selesai');
        $query = $this->db->get()->num_rows();
        return $query;
    }

    public function get_to_id()
    {
        $this->db->select('id_user');
        $this->db->from('tbl_user');
        $this->db->where('role',  3);
        $to_id = $this->db->get();
        return $to_id;
    }

    public function tambahanggota($id)
    {
        $penelitian = $this->m_penelitian->getIdPenelitian($id)->row_array();
        $id_peneliti = $this->input->post('peneliti[]');
        foreach ($id_peneliti as $h) {
            $this->db->set('id_penelitian', $penelitian['id_penelitian']);
            $this->db->set('id_peneliti', $h);
            $this->db->insert('tbl_anggota_penelitian');
        }

        $this->db->set('id_penelitian', $penelitian['id_penelitian']);
        $this->db->set('id_status', 1);
        $this->db->insert('tbl_riwayat_status');

        $to_id = $this->m_penelitian->get_to_id()->row();
        $data = [
            'from_id_user' => $this->session->userdata('id_user'),
            'to_id_user' => $to_id->id_user,
            'pesan' => 'data penelitian baru',
            'type' => 3,
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

    function list_notifikasi_peneliti()
    {
        $this->db->select('*');
        $this->db->from('tbl_notifikasi');
        $this->db->join('tbl_pegawai', 'tbl_pegawai.id_user=tbl_notifikasi.from_id_user');
        $this->db->where('to_id_user',  $this->session->userdata('id_user'));
        $this->db->where('is_read', 0);
        $query = $this->db->get();
        return $query;
    }

    function list_notifikasi_verifikator()
    {
        $this->db->select('*');
        $this->db->from('tbl_notifikasi');
        $this->db->join('tbl_peneliti', 'tbl_peneliti.id_user=tbl_notifikasi.from_id_user');
        $this->db->where('to_id_user',  $this->session->userdata('id_user'));
        $this->db->where('is_read', 0);
        $query = $this->db->get();
        return $query;
    }

    function jumlah_notifikasi()
    {
        $this->db->select('*');
        $this->db->from('tbl_notifikasi');
        $this->db->where('to_id_user',  $this->session->userdata('id_user'));
        $this->db->where('is_read', 0);
        $query = $this->db->get()->num_rows();
        return $query;
    }

    function datapen($tgl_diajukan, $kategori_penelitian, $id_status, $bulan)
    {
        $data = array();
        $this->db->select('*, tbl_penelitian.id_unit as unit');
        $this->db->from('tbl_penelitian');
        $this->db->join('tbl_peneliti', 'tbl_peneliti.id_peneliti=tbl_penelitian.id_peneliti');
        $this->db->join('tbl_pegawai', 'tbl_pegawai.id_pegawai=tbl_penelitian.id_pegawai', 'left');
        $this->db->join('tbl_unit', 'tbl_unit.id_unit=tbl_penelitian.id_unit', 'left');
        $this->db->join('tbl_status', 'tbl_status.id_status=tbl_penelitian.id_status');
        $this->db->like('tgl_diajukan', $tgl_diajukan, 'both');
        $this->db->like('kategori_penelitian', $kategori_penelitian, 'both');
        $this->db->like('nama_status', $id_status, 'both');
        $this->db->like('MONTH(tgl_diajukan)', $bulan);
        $this->db->order_by('tgl_diajukan', 'ASC');
        $hasil = $this->db->get();

        if ($hasil->num_rows() > 0) {
            $data = $hasil->result();
        }
        return $data;
    }

    function hitpenelitian()
    {
        $this->db->select('*');
        $this->db->from('tbl_penelitian');
        $hasil = $this->db->get();
        $data = $hasil->num_rows();
        return $data;
    }

    function laporan($tgl_diajukan, $id_kategori_penelitian, $status, $bulan)
    {
        $data = array();
        $this->db->select('*');
        $this->db->from('tbl_penelitian');
        $this->db->join('tbl_peneliti', 'tbl_peneliti.id_peneliti=tbl_penelitian.id_peneliti');
        $this->db->join('tbl_pegawai', 'tbl_pegawai.id_pegawai=tbl_penelitian.id_pegawai', 'left');
        $this->db->join('tbl_status', 'tbl_status.id_status=tbl_penelitian.id_status');
        $this->db->join('tbl_unit', 'tbl_unit.id_unit=tbl_penelitian.id_unit');
        $this->db->like('tgl_diajukan', $tgl_diajukan, 'both');
        $this->db->like('kategori_penelitian', $id_kategori_penelitian, 'both');
        $this->db->like('nama_status', $status, 'both');
        $this->db->like('MONTH(tgl_diajukan)', $bulan);
        $hasil = $this->db->get();
        return $hasil;
    }

    function jumlah_penelitian()
    {
        $this->db->select('*');
        $this->db->from('tbl_penelitian');
        $query = $this->db->get()->num_rows();
        return $query;
    }

    function fetch_year()
    {
        $this->db->select("year(tgl_diajukan)");
        $this->db->from('tbl_penelitian');
        $this->db->where('EXTRACT(YEAR FROM tgl_diajukan)');
        $this->db->group_by('year(tgl_diajukan)');
        $this->db->order_by('year(tgl_diajukan)', 'DESC');
        return $this->db->get()->result_array();
    }

    public function riwayatstatus($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_riwayat_status');
        $this->db->join('tbl_penelitian', 'tbl_penelitian.id_penelitian=tbl_riwayat_status.id_penelitian');
        $this->db->join('tbl_status', 'tbl_status.id_status=tbl_riwayat_status.id_status');
        $this->db->where('tbl_penelitian.id_penelitian', $id);
        $query_gabungan = $this->db->get();
        return $query_gabungan;
    }
}
