<?php
defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';

class c_datapenelitian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->library('form_validation');
        $this->load->model('m_peneliti');
        $this->load->model('m_auth');
        $this->load->model('m_pegawai');
        $this->load->model('m_admin');
        $this->load->model('m_penelitian');
        $this->load->model('m_hasilpenelitian');
    }
    public function index()
    {
        $tgl_diajukan = $this->input->post('tgl_diajukan');
        $id_kategori_penelitian = $this->input->post('id_kategori_penelitian');
        $status = $this->input->post('status');
        $bulan = $this->input->post('bulan');

        $data['title'] = 'Data Penelitian Unit';
        $data['judul'] = 'Data Penelitian Unit';
        $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['penelitian'] = $this->m_penelitian->getJoinAll()->result_array();
        $data['getpegawai'] = $this->m_pegawai->getPegawai()->row_array();
        $data['datapen'] = $this->m_penelitian->datapen($tgl_diajukan, $id_kategori_penelitian, $status, $bulan);
        $data['hitpenelitian'] = $this->m_penelitian->hitpenelitian();
        $data['listnotifikasiverifikator'] = $this->m_penelitian->list_notifikasi_verifikator()->result_array();
        $data['listnotifikasipeneliti'] = $this->m_penelitian->list_notifikasi_peneliti()->result_array();
        $data['jumlahnotifikasi'] = $this->m_penelitian->jumlah_notifikasi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('adminunit/datapenelitian/v_index', $data);
        $this->load->view('templates/footer');
    }

    public function datahasil($id)
    {
        $data['title'] = 'Data Hasil Penelitian';
        $data['judul'] = 'Data Penelitian Unit';
        $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['hasilpenelitian'] = $this->m_hasilpenelitian->getJoinIdHasilPenelitian($id)->result_array();
        $data['id'] = $id;
        $data['penelitian'] = $this->m_penelitian->getJoin()->result_array();
        $data['nomorsurat'] = $this->m_penelitian->kode_surat();
        $data['peneliti'] = $this->m_peneliti->getPeneliti()->row_array();
        $data['getpegawai'] = $this->m_pegawai->getPegawai()->row_array();
        $data['listnotifikasiverifikator'] = $this->m_penelitian->list_notifikasi_verifikator()->result_array();
        $data['listnotifikasipeneliti'] = $this->m_penelitian->list_notifikasi_peneliti()->result_array();
        $data['jumlahnotifikasi'] = $this->m_penelitian->jumlah_notifikasi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('adminunit/datapenelitian/v_datahasil', $data);
        $this->load->view('templates/footer');
    }
}
