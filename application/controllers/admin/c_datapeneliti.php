<?php
defined('BASEPATH') or exit('No direct script access allowed');

class c_datapeneliti extends CI_Controller
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
        $this->load->model('m_verifikator');
        $this->load->model('m_kategorihasil');
        $this->load->model('m_unit');
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('id_peneliti', 'ID Peneliti', 'required|trim');
        $this->form_validation->set_rules('id_user', 'ID User', 'required|trim');
        $this->form_validation->set_rules('nama_peneliti', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('no_identitas', 'Nomor Identitas', 'required|trim');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim');
        $this->form_validation->set_rules('no_hp', 'Nomor HP', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Data Peneliti';
            $data['judul'] = 'Data Peneliti';
            $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
            $data['getpegawai'] = $this->m_pegawai->getPegawai()->row_array();
            $data['peneliti'] = $this->m_peneliti->getIdPeneliti($id)->row_array();
            $data['listnotifikasiverifikator'] = $this->m_penelitian->list_notifikasi_verifikator()->result_array();
            $data['listnotifikasipeneliti'] = $this->m_penelitian->list_notifikasi_peneliti()->result_array();
            $data['jumlahnotifikasi'] = $this->m_penelitian->jumlah_notifikasi();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/datapeneliti/v_edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->m_peneliti->editProfil();
            $this->session->set_flashdata('pesan', 'Profil berhasil diubah !');
            redirect('admin/c_admin/datapeneliti');
        }
    }

    public function hapus($id)
    {
        $this->m_peneliti->hapusDataPeneliti($id);
        redirect('admin/c_admin/datapeneliti');
    }
}
