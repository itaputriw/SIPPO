<?php
defined('BASEPATH') or exit('No direct script access allowed');

class c_notifikasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('m_penelitian');
        $this->load->model('m_peneliti');
        $this->load->model('m_pegawai');
        $this->load->model('m_verifikator');
        $this->load->model('m_notifikasi');
    }

    public function list_notifikasi()
    {
        $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['listnotifikasiverifikator'] = $this->m_penelitian->list_notifikasi_verifikator()->result_array();
        $data['listnotifikasipeneliti'] = $this->m_penelitian->list_notifikasi_peneliti()->result_array();
        $data['jumlahnotifikasi'] = $this->m_penelitian->jumlah_notifikasi();

        $this->load->view('v_list_notifikasi', $data);
    }

    public function update_is_read($id)
    {
        $this->m_notifikasi->update_is_read($id);
        redirect('verifikator/c_verifikasipenelitian');
    }

    public function update_is_read_peneliti($id)
    {
        $this->m_notifikasi->update_is_read($id);
        redirect('peneliti/c_penelitian/statuspenelitian');
    }

    public function update_is_read_peneliti2($id)
    {
        $this->m_notifikasi->update_is_read($id);
        redirect('peneliti/c_hasilpenelitian');
    }
}
