<?php
defined('BASEPATH') or exit('No direct script access allowed');

class c_penelitian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->library('form_validation');
        $this->load->model('m_penelitian');
        $this->load->model('m_peneliti');
        $this->load->model('m_pegawai');
        $this->load->model('m_unit');
        $this->load->model('m_anggota');
        $this->load->model('m_pejabat');
        $this->load->model('m_template');
    }

    public function index()
    {
        $data['title'] = "Penelitian Baru";
        $data['judul'] = "Penelitian Baru";
        $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['nomorsurat'] = $this->m_penelitian->kode_surat();
        $data['peneliti'] = $this->m_peneliti->getPeneliti()->row_array();
        $data['pegawai'] = $this->m_pegawai->getAllPegawai()->result_array();
        $data['unit'] = $this->m_unit->getAllUnit()->result_array();
        $data['penelitian'] = $this->m_penelitian->getJoin()->result_array();
        $data['penelitian1'] = $this->m_penelitian->getJoin()->row_array();
        $data['getpeneliti'] = $this->m_peneliti->getPeneliti()->row_array();
        $data['error'] = ' ';
        $data['listnotifikasiverifikator'] = $this->m_penelitian->list_notifikasi_verifikator()->result_array();
        $data['listnotifikasipeneliti'] = $this->m_penelitian->list_notifikasi_peneliti()->result_array();
        $data['jumlahnotifikasi'] = $this->m_penelitian->jumlah_notifikasi();

        $this->form_validation->set_rules('keperluan', 'Keperluan', 'trim');
        $this->form_validation->set_rules('lembaga', 'Lembaga', 'trim');
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'trim');
        $this->form_validation->set_rules('alamat_lembaga', 'Alamat Lembaga', 'trim');
        $this->form_validation->set_rules('judul', 'Judul', 'trim');
        $this->form_validation->set_rules('tujuan', 'Tujuan', 'trim');
        $this->form_validation->set_rules('kategori_penelitian', 'Kategori Penelitian', 'trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('peneliti/penelitian/v_index', $data);
            $this->load->view('templates/footer');
        } else {
            $config['upload_path'] = './uploads/file_penelitian/';
            $config['allowed_types'] = 'pdf';

            $this->upload->initialize($config);

            if ($this->upload->do_upload('file_lembaga')) {
                $file = $this->upload->data();
                $nama_file = $file['file_name'];
            } else {
                $error = array('error' => $this->upload->display_errors());
                $nama_file = '';
            }

            if ($this->upload->do_upload('file_bapeda')) {
                $file2 = $this->upload->data();
                $nama_file2 = $file2['file_name'];
            } else {
                echo $this->upload->display_errors();
                $nama_file2 = '';
            }

            $id_peneliti =  $this->input->post('id_peneliti');
            $id_unit = $this->input->post('unit');
            $kategori_penelitian = $this->input->post('kategori_penelitian');
            $nomor_surat = $this->input->post('nomor_surat');
            $keperluan = $this->input->post('keperluan');
            $lokasi_lain = $this->input->post('lokasi_lain');
            $lembaga = $this->input->post('lembaga');
            $jurusan = $this->input->post('jurusan');
            $alamat_lembaga = $this->input->post('alamat_lembaga');
            $judul = $this->input->post('judul');
            $tujuan = $this->input->post('tujuan');
            $data_primer = $this->input->post('data_primer');
            $data_sekunder = $this->input->post('data_sekunder');
            $waktu_mulai = $this->input->post('waktu_mulai');
            $waktu_selesai = $this->input->post('waktu_selesai');

            $data = array(
                'id_peneliti' => $id_peneliti,
                'id_pegawai' => null,
                'id_unit' => $id_unit,
                'id_status' => 1,
                'kategori_penelitian' => $kategori_penelitian,
                'nomor_surat' => $nomor_surat,
                'keperluan' => $keperluan,
                'lokasi_lain' => $lokasi_lain,
                'lembaga' => $lembaga,
                'jurusan' => $jurusan,
                'alamat_lembaga' => $alamat_lembaga,
                'judul' => $judul,
                'tujuan' => $tujuan,
                'data_primer' => $data_primer,
                'data_sekunder' => $data_sekunder,
                'waktu_mulai' => $waktu_mulai,
                'waktu_selesai' => $waktu_selesai,
                'file_bapeda' => $nama_file2,
                'file_lembaga' => $nama_file,
                'tgl_diajukan' => date('ymd')
            );

            $last_id = $this->m_penelitian->tambahpenelitian($data);
            redirect('peneliti/c_penelitian/tambahanggota/' . $last_id);
        }
    }

    public function tambah()
    {
        $data['title'] = "Tambah Penelitian Baru";
        $data['title1'] = "Tambah Penelitian Baru";
        $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['nomorsurat'] = $this->m_penelitian->kode_surat();
        $data['peneliti'] = $this->m_peneliti->getPeneliti()->row_array();
        $data['pegawai'] = $this->m_pegawai->getAllPegawai()->result_array();
        $data['unit'] = $this->m_unit->getAllUnit()->result_array();
        $data['penelitian'] = $this->m_penelitian->getJoin()->result_array();
        $data['penelitian1'] = $this->m_penelitian->getJoin()->row_array();
        $data['getpeneliti'] = $this->m_peneliti->getPeneliti()->row_array();
        $data['error'] = ' ';
        $data['listnotifikasiverifikator'] = $this->m_penelitian->list_notifikasi_verifikator()->result_array();
        $data['listnotifikasipeneliti'] = $this->m_penelitian->list_notifikasi_peneliti()->result_array();
        $data['jumlahnotifikasi'] = $this->m_penelitian->jumlah_notifikasi();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('peneliti/penelitian/v_index', $data);
        $this->load->view('templates/footer');
    }


    public function datapenelitian()
    {
        $data['title'] = 'Penelitian';
        $data['judul'] = 'Penelitian';
        $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['penelitian'] = $this->m_penelitian->getJoin1()->result_array();
        $data['anggotapenelitian'] = $this->m_penelitian->getJoinAnggota()->result_array();
        $data['nomorsurat'] = $this->m_penelitian->kode_surat();
        $data['peneliti'] = $this->m_peneliti->getPeneliti()->row_array();
        $data['getpeneliti'] = $this->m_peneliti->getPeneliti()->row_array();
        $data['listnotifikasiverifikator'] = $this->m_penelitian->list_notifikasi_verifikator()->result_array();
        $data['listnotifikasipeneliti'] = $this->m_penelitian->list_notifikasi_peneliti()->result_array();
        $data['jumlahnotifikasi'] = $this->m_penelitian->jumlah_notifikasi();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('peneliti/penelitian/v_datapenelitian', $data);
        $this->load->view('templates/footer', $data);
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Penelitian';
        $data['judul'] = 'Penelitian';
        $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['penelitian'] = $this->m_penelitian->getJoinId($id)->row_array();
        $data['kpenelitian'] = $this->m_penelitian->getJoinId1($id)->row_array();
        $data['nomorsurat'] = $this->m_penelitian->kode_surat();
        $data['getpeneliti'] = $this->m_peneliti->getPeneliti()->row_array();
        $data['anggotapenelitian'] = $this->m_anggota->getJoin($id)->result_array();
        $data['riwayatstatus'] = $this->m_penelitian->riwayatstatus($id)->result_array();
        $data['listnotifikasiverifikator'] = $this->m_penelitian->list_notifikasi_verifikator()->result_array();
        $data['listnotifikasipeneliti'] = $this->m_penelitian->list_notifikasi_peneliti()->result_array();
        $data['jumlahnotifikasi'] = $this->m_penelitian->jumlah_notifikasi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('peneliti/penelitian/v_detail', $data);
        $this->load->view('templates/footer', $data);
    }

    public function riwayat($id)
    {
        $data['title'] = 'Riwayat Penelitian';
        $data['judul'] = 'Status Penelitian';
        $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['penelitian'] = $this->m_penelitian->getJoinId($id)->row_array();
        $data['kpenelitian'] = $this->m_penelitian->getJoinId1($id)->row_array();
        $data['nomorsurat'] = $this->m_penelitian->kode_surat();
        $data['getpeneliti'] = $this->m_peneliti->getPeneliti()->row_array();
        $data['anggotapenelitian'] = $this->m_anggota->getJoin($id)->result_array();
        $data['riwayatstatus'] = $this->m_penelitian->riwayatstatus($id)->result_array();
        $data['listnotifikasiverifikator'] = $this->m_penelitian->list_notifikasi_verifikator()->result_array();
        $data['listnotifikasipeneliti'] = $this->m_penelitian->list_notifikasi_peneliti()->result_array();
        $data['jumlahnotifikasi'] = $this->m_penelitian->jumlah_notifikasi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('peneliti/penelitian/v_riwayat', $data);
        $this->load->view('templates/footer', $data);
    }


    public function edit($id)
    {
        $this->form_validation->set_rules('keperluan', 'Keperluan', 'trim');
        $this->form_validation->set_rules('lembaga', 'Lembaga', 'trim');
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'trim');
        $this->form_validation->set_rules('alamat_lembaga', 'Alamat Lembaga', 'trim');
        $this->form_validation->set_rules('judul', 'Judul', 'trim');
        $this->form_validation->set_rules('tujuan', 'Tujuan', 'trim');

        if ($this->form_validation->run() == FALSE) {

            $data['title'] = "Edit Penelitian";
            $data['judul'] = "Penelitian";
            $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
            $data['nomorsurat'] = $this->m_penelitian->kode_surat();
            $data['peneliti'] = $this->m_peneliti->getPeneliti()->row_array();
            $data['pegawai'] = $this->m_pegawai->getAllPegawai()->result_array();
            $data['unit'] = $this->m_unit->getAllUnit()->result_array();
            $data['penelitian'] = $this->m_penelitian->getJoinId($id)->row_array();
            $data['getpeneliti'] = $this->m_peneliti->getPeneliti()->row_array();
            $data['listnotifikasiverifikator'] = $this->m_penelitian->list_notifikasi_verifikator()->result_array();
            $data['listnotifikasipeneliti'] = $this->m_penelitian->list_notifikasi_peneliti()->result_array();
            $data['jumlahnotifikasi'] = $this->m_penelitian->jumlah_notifikasi();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('peneliti/penelitian/v_edit', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $id = $this->input->post('id_penelitian');
            $id_unit = $this->input->post('unit');
            $kategori_penelitian = $this->input->post('kategori_penelitian');
            $nomor_surat = $this->input->post('nomor_surat');
            $keperluan = $this->input->post('keperluan');
            $lokasi_lain = $this->input->post('lokasi_lain');
            $lembaga = $this->input->post('lembaga');
            $jurusan = $this->input->post('jurusan');
            $alamat_lembaga = $this->input->post('alamat_lembaga');
            $judul = $this->input->post('judul');
            $tujuan = $this->input->post('tujuan');
            $data_primer = $this->input->post('data_primer');
            $data_sekunder = $this->input->post('data_sekunder');
            $waktu_mulai = $this->input->post('waktu_mulai');
            $waktu_selesai = $this->input->post('waktu_selesai');
            $nama_file = $this->input->post('nm_file_lembaga');
            $nama_file2 = $this->input->post('nm_file_bapeda');


            $upload_file_lembaga = $_FILES['file_lembaga']['name'];
            $upload_file_bapeda = $_FILES['file_bapeda']['name'];

            if ($upload_file_lembaga) {
                $config['upload_path'] = './uploads/file_penelitian/';
                $config['allowed_types'] = 'pdf';

                $this->upload->initialize($config);
                if ($this->upload->do_upload('file_lembaga')) {
                    $file = $this->upload->data();
                    $nama_file = $file['file_name'];
                } else {
                    $error = array('error' => $this->upload->display_errors());
                    $nama_file = '';
                }
            }


            if ($upload_file_bapeda) {
                $config['upload_path'] = './uploads/file_penelitian/';
                $config['allowed_types'] = 'pdf';
                $this->upload->initialize($config);
                if ($this->upload->do_upload('file_bapeda')) {
                    $file2 = $this->upload->data();
                    $nama_file2 = $file2['file_name'];
                } else {
                    echo $this->upload->display_errors();
                    $nama_file2 = '';
                }
            }

            $data = [
                'id_penelitian' => $id,
                'id_pegawai' => null,
                'id_unit' => $id_unit,
                'kategori_penelitian' => $kategori_penelitian,
                'nomor_surat' => $nomor_surat,
                'lokasi_lain' => $lokasi_lain,
                'keperluan' => $keperluan,
                'lembaga' => $lembaga,
                'jurusan' => $jurusan,
                'alamat_lembaga' => $alamat_lembaga,
                'judul' => $judul,
                'tujuan' => $tujuan,
                'data_primer' => $data_primer,
                'data_sekunder' => $data_sekunder,
                'waktu_mulai' => $waktu_mulai,
                'waktu_selesai' => $waktu_selesai,
                'file_lembaga' => $nama_file,
                'file_bapeda' => $nama_file2,
            ];

            $this->m_penelitian->edit($id, $data);
            $this->session->set_flashdata('pesan', 'Penelitian berhasil diubah !');
            redirect('peneliti/c_penelitian/datapenelitian');
        }
    }

    public function hapus($id)
    {
        $this->m_penelitian->hapusDataPenelitian($id);
        redirect('peneliti/c_penelitian/datapenelitian');
    }

    public function statuspenelitian()
    {
        $data['title'] = 'Status Penelitian';
        $data['judul'] = 'Status Penelitian';
        $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['penelitian'] = $this->m_penelitian->getJoinriwayat()->result_array();
        $data['riwayat'] = $this->m_penelitian->riwayat()->row_array();
        $data['anggotapenelitian'] = $this->m_penelitian->getJoinAnggota()->result_array();
        $data['nomorsurat'] = $this->m_penelitian->kode_surat();
        $data['peneliti'] = $this->m_peneliti->getPeneliti()->row_array();
        $data['getpeneliti'] = $this->m_peneliti->getPeneliti()->row_array();
        $data['listnotifikasiverifikator'] = $this->m_penelitian->list_notifikasi_verifikator()->result_array();
        $data['listnotifikasipeneliti'] = $this->m_penelitian->list_notifikasi_peneliti()->result_array();
        $data['jumlahnotifikasi'] = $this->m_penelitian->jumlah_notifikasi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('peneliti/penelitian/v_statuspenelitian', $data);
        $this->load->view('templates/footer', $data);
    }

    public function suratrekomendasi($id)
    {
        $this->load->library('dompdf_gen');

        $data['anggotapenelitian'] = $this->m_anggota->getJoin($id)->result_array();
        $data['penelitian'] = $this->m_penelitian->getJoinId($id)->row_array();
        $data['kpenelitian'] = $this->m_penelitian->getJoinId1($id)->row_array();
        $data['listnotifikasiverifikator'] = $this->m_penelitian->list_notifikasi_verifikator()->result_array();
        $data['listnotifikasipeneliti'] = $this->m_penelitian->list_notifikasi_peneliti()->result_array();
        $data['jumlahnotifikasi'] = $this->m_penelitian->jumlah_notifikasi();
        $data['pejabat'] = $this->m_pejabat->getPejabat()->row_array();
        $data['template'] = $this->m_template->getTemplate()->row_array();


        $this->load->view('peneliti/penelitian/suratrekomendasi_pdf', $data);

        $paper_size = 'A4';
        $orientation = 'potrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("surat_rekomendasi.pdf", array('Attachment' => 0));
    }

    public function tambahanggota($id)
    {
        $this->form_validation->set_rules('peneliti[]', 'Peneliti', 'trim');
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Tambah Anggota';
            $data['judul'] = 'Penelitian Baru';
            $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
            $data['penelitian'] = $this->m_penelitian->getJoin()->row_array();
            $data['peneliti'] = $this->m_peneliti->getAllPeneliti1()->result_array();
            $data['getpeneliti'] = $this->m_peneliti->getPeneliti()->row_array();
            $data['id'] = $id;
            $data['listnotifikasiverifikator'] = $this->m_penelitian->list_notifikasi_verifikator()->result_array();
            $data['listnotifikasipeneliti'] = $this->m_penelitian->list_notifikasi_peneliti()->result_array();
            $data['jumlahnotifikasi'] = $this->m_penelitian->jumlah_notifikasi();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('peneliti/penelitian/v_tambahanggota', $data);
            $this->load->view('templates/footer');
        } else {
            $this->m_penelitian->tambahanggota($id);
            $this->session->set_flashdata('pesan',  'Data penelitian berhasil ditambah !');
            redirect('peneliti/c_penelitian/datapenelitian');
        }
    }
}
