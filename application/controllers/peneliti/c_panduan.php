<?php
defined('BASEPATH') or exit('No direct script access allowed');

class c_panduan extends CI_Controller
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
        $data['title'] = 'Panduan';
        $data['judul'] = 'Panduan';
        $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['getpeneliti'] = $this->m_auth->getPeneliti()->row_array();
        $data['peneliti'] = $this->m_peneliti->getPeneliti()->row_array();
        $data['listnotifikasiverifikator'] = $this->m_penelitian->list_notifikasi_verifikator()->result_array();
        $data['listnotifikasipeneliti'] = $this->m_penelitian->list_notifikasi_peneliti()->result_array();
        $data['jumlahnotifikasi'] = $this->m_penelitian->jumlah_notifikasi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('peneliti/panduan/v_index', $data);
        $this->load->view('templates/footer');
    }
}
