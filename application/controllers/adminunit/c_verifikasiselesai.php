<?php
defined('BASEPATH') or exit('No direct script access allowed');

class c_verifikasiselesai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('m_penelitian');
        $this->load->model('m_hasilpenelitian');
        $this->load->model('m_peneliti');
        $this->load->model('m_verifikator');
        $this->load->model('m_pegawai');
        $this->load->model('m_adminunit');
    }

    public function index()
    {
        $data['title'] = 'Verif Data dan Informasi';
        $data['judul'] = 'Verif Data dan Informasi';
        $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['hasilpenelitian'] = $this->m_hasilpenelitian->getJoinAll()->result_array();
        $data['penelitian'] = $this->m_penelitian->getJoinAll()->result_array();
        $data['getpegawai'] = $this->m_pegawai->getPegawai()->row_array();
        $data['listnotifikasiverifikator'] = $this->m_penelitian->list_notifikasi_verifikator()->result_array();
        $data['listnotifikasipeneliti'] = $this->m_penelitian->list_notifikasi_peneliti()->result_array();
        $data['jumlahnotifikasi'] = $this->m_penelitian->jumlah_notifikasi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('adminunit/verifdata/v_index', $data);
        $this->load->view('templates/footer');
    }

    public function disetujui($id)
    {
        $this->m_adminunit->Setujui($id);
        redirect('adminunit/c_verifikasiselesai');
    }
}
