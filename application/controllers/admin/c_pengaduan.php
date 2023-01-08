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
        $data['title'] = 'Aduan';
        $data['judul'] = 'Aduan';
        $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['getpegawai'] = $this->m_pegawai->getPegawai()->row_array();
        $data['getpeneliti'] = $this->m_auth->getPeneliti()->row_array();
        $data['pengaduan'] = $this->m_pengaduan->getAllPengaduanJoin()->result_array();
        $data['peneliti'] = $this->m_peneliti->getPeneliti()->row_array();
        $data['listnotifikasiverifikator'] = $this->m_penelitian->list_notifikasi_verifikator()->result_array();
        $data['listnotifikasipeneliti'] = $this->m_penelitian->list_notifikasi_peneliti()->result_array();
        $data['jumlahnotifikasi'] = $this->m_penelitian->jumlah_notifikasi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/pengaduan/v_index', $data);
        $this->load->view('templates/footer');
    }

    public function detailpengaduan($id)
    {
        $data['title'] = 'Tanggapan';
        $data['judul'] = 'Aduan';
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
        $this->load->view('admin/pengaduan/v_detail', $data);
        $this->load->view('templates/footer');
    }

    public function tambahkomen()
    {
        $data['title'] = 'Tambah Komentar';
        $data['judul'] = 'Aduan';
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
            redirect(base_url() . "admin/c_pengaduan/detailpengaduan/" . $id);
        } else {
            $this->m_pengaduan->tambahkomenadmin();
            redirect(base_url() . "admin/c_pengaduan/detailpengaduan/" . $id);
        }
    }

    public function selesai($id)
    {
        $this->m_pengaduan->Selesai($id);
        redirect('admin/c_pengaduan');
    }
}
