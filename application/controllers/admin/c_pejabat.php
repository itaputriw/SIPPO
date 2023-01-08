<?php
defined('BASEPATH') or exit('No direct script access allowed');

class c_pejabat extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('m_pejabat');
        $this->load->model('m_pegawai');
        $this->load->model('m_penelitian');
    }

    public function index()
    {
        $data['title'] = 'Data Pejabat';
        $data['judul'] = 'Data Pejabat';
        $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['getpegawai'] = $this->m_pegawai->getPegawai()->row_array();
        $data['pejabat'] = $this->m_pejabat->getPejabat()->result_array();
        $data['listnotifikasiverifikator'] = $this->m_penelitian->list_notifikasi_verifikator()->result_array();
        $data['listnotifikasipeneliti'] = $this->m_penelitian->list_notifikasi_peneliti()->result_array();
        $data['jumlahnotifikasi'] = $this->m_penelitian->jumlah_notifikasi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/manajemendata/pejabat/v_index', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Data Pejabat';
        $data['judul'] = 'Data Pejabat';
        $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['getpegawai'] = $this->m_pegawai->getPegawai()->row_array();
        $data['pejabat'] = $this->m_pejabat->getIdPejabat($id)->row_array();
        $data['listnotifikasiverifikator'] = $this->m_penelitian->list_notifikasi_verifikator()->result_array();
        $data['listnotifikasipeneliti'] = $this->m_penelitian->list_notifikasi_peneliti()->result_array();
        $data['jumlahnotifikasi'] = $this->m_penelitian->jumlah_notifikasi();

        $this->form_validation->set_rules('nama_pejabat', 'Nama Pejabat', 'required');
        $this->form_validation->set_rules('NIP', 'NIP', 'required');
        $this->form_validation->set_rules('pangkat', 'Pangkat', 'required');
        $this->form_validation->set_rules('golongan', 'Golongan', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatam', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/manajemendata/pejabat/v_index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->m_pejabat->edit();
            $this->session->set_flashdata('pesan', 'Data Pejabat berhasil diubah !');
            redirect('admin/c_pejabat');
        }
    }
}
