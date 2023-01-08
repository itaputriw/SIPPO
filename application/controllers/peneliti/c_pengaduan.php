<?php
defined('BASEPATH') or exit('No direct script access allowed');

class c_pengaduan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->library('form_validation');
        $this->load->model('m_pengaduan');
        $this->load->model('m_pegawai');
        $this->load->model('m_penelitian');
        $this->load->model('m_peneliti');
        $this->load->model('m_auth');
    }

    public function index()
    {
        $data['title'] = 'Pengaduan';
        $data['judul'] = 'Pengaduan';
        $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['getpeneliti'] = $this->m_auth->getPeneliti()->row_array();
        $data['peneliti'] = $this->m_peneliti->getPeneliti()->row_array();
        $data['pengaduan'] = $this->m_pengaduan->getPengaduan()->result_array();
        $data['listnotifikasiverifikator'] = $this->m_penelitian->list_notifikasi_verifikator()->result_array();
        $data['listnotifikasipeneliti'] = $this->m_penelitian->list_notifikasi_peneliti()->result_array();
        $data['jumlahnotifikasi'] = $this->m_penelitian->jumlah_notifikasi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('peneliti/pengaduan/v_index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Pengaduan';
        $data['judul'] = 'Pengaduan';
        $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['getpeneliti'] = $this->m_auth->getPeneliti()->row_array();
        $data['peneliti'] = $this->m_peneliti->getPeneliti()->row_array();
        $data['pengaduan'] = $this->m_pengaduan->getAllPengaduan()->result_array();
        $data['listnotifikasiverifikator'] = $this->m_penelitian->list_notifikasi_verifikator()->result_array();
        $data['listnotifikasipeneliti'] = $this->m_penelitian->list_notifikasi_peneliti()->result_array();
        $data['jumlahnotifikasi'] = $this->m_penelitian->jumlah_notifikasi();
        $data['error'] = ' ';

        $this->form_validation->set_rules('judul', 'Judul Pengaduan', 'required');
        $this->form_validation->set_rules('komen', 'Komen', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('peneliti/pengaduan/v_tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->m_pengaduan->tambah();
            $this->session->set_flashdata('pesan', 'Pengaduan berhasil ditambah !');
            redirect('peneliti/c_pengaduan');
        }
    }

    public function lihattanggapan($id)
    {
        $data['title'] = 'Tanggapan';
        $data['judul'] = 'Pengaduan';
        $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['getpeneliti'] = $this->m_auth->getPeneliti()->row_array();
        $data['getpegawai'] = $this->m_pegawai->getPegawai()->row_array();
        $data['tanggapan'] = $this->m_tanggapan->getAllTanggapanJoin($id)->row_array();
        $data['listnotifikasiverifikator'] = $this->m_penelitian->list_notifikasi_verifikator()->result_array();
        $data['listnotifikasipeneliti'] = $this->m_penelitian->list_notifikasi_peneliti()->result_array();
        $data['jumlahnotifikasi'] = $this->m_penelitian->jumlah_notifikasi();
        $data['id'] = $id;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('peneliti/pengaduan/v_lihattanggapan', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id)
    {
        $data['title'] = 'Tanggapan';
        $data['judul'] = 'Pengaduan';
        $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['getpeneliti'] = $this->m_auth->getPeneliti()->row_array();
        $data['getpegawai'] = $this->m_pegawai->getPegawai()->row_array();
        $data['pengaduan'] = $this->m_pengaduan->Join($id)->result_array();
        $data['listnotifikasiverifikator'] = $this->m_penelitian->list_notifikasi_verifikator()->result_array();
        $data['listnotifikasipeneliti'] = $this->m_penelitian->list_notifikasi_peneliti()->result_array();
        $data['jumlahnotifikasi'] = $this->m_penelitian->jumlah_notifikasi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('peneliti/pengaduan/v_detail', $data);
        $this->load->view('templates/footer');
    }

    public function tambahkomen()
    {
        $data['title'] = 'Tambah Komentar';
        $data['judul'] = 'Pengaduan';
        $id =  $this->input->post('id_pengaduan');
        $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['getpeneliti'] = $this->m_auth->getPeneliti()->row_array();
        $data['peneliti'] = $this->m_peneliti->getPeneliti()->row_array();
        $data['listnotifikasiverifikator'] = $this->m_penelitian->list_notifikasi_verifikator()->result_array();
        $data['listnotifikasipeneliti'] = $this->m_penelitian->list_notifikasi_peneliti()->result_array();
        $data['jumlahnotifikasi'] = $this->m_penelitian->jumlah_notifikasi();
        $data['error'] = ' ';

        $this->form_validation->set_rules('komen', 'Komen', 'required');

        if ($this->form_validation->run() == false) {
            redirect(base_url() . "peneliti/c_pengaduan/detail/" . $id);
        } else {
            $this->m_pengaduan->tambahkomen();
            redirect(base_url() . "peneliti/c_pengaduan/detail/" . $id);
        }
    }
}
