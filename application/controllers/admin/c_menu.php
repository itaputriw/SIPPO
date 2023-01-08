<?php
defined('BASEPATH') or exit('No direct script access allowed');

class c_menu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->library('form_validation');
        $this->load->model('m_menu');
        $this->load->model('m_pegawai');
        $this->load->model('m_penelitian');
    }

    public function index()
    {
        $data['title'] = 'Menu';
        $data['judul'] = 'Menu';
        $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['getpegawai'] = $this->m_pegawai->getPegawai()->row_array();
        $data['menu'] = $this->m_menu->getAllMenu()->result_array();
        $data['listnotifikasiverifikator'] = $this->m_penelitian->list_notifikasi_verifikator()->result_array();
        $data['listnotifikasipeneliti'] = $this->m_penelitian->list_notifikasi_peneliti()->result_array();
        $data['jumlahnotifikasi'] = $this->m_penelitian->jumlah_notifikasi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/manajemendata/menu/v_index', $data);
        $this->load->view('templates/footer');
    }
}
