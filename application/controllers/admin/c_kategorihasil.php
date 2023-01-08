<?php
defined('BASEPATH') or exit('No direct script access allowed');

class c_kategorihasil extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('m_kategorihasil');
        $this->load->model('m_pegawai');
        $this->load->model('m_penelitian');
    }

    public function index()
    {
        $data['title'] = 'Kategori Hasil Penelitian';
        $data['judul'] = 'Kategori Hasil Penelitian';
        $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['getpegawai'] = $this->m_pegawai->getPegawai()->row_array();
        $data['kategorihasil'] = $this->m_kategorihasil->getAllKategoriHasilAdmin()->result_array();
        $data['listnotifikasiverifikator'] = $this->m_penelitian->list_notifikasi_verifikator()->result_array();
        $data['listnotifikasipeneliti'] = $this->m_penelitian->list_notifikasi_peneliti()->result_array();
        $data['jumlahnotifikasi'] = $this->m_penelitian->jumlah_notifikasi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/manajemendata/kategorihasil/v_index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Kategori Hasil';
        $data['judul'] = 'Tambah Kategori Hasil';
        $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['getpegawai'] = $this->m_pegawai->getPegawai()->row_array();
        $data['listnotifikasiverifikator'] = $this->m_penelitian->list_notifikasi_verifikator()->result_array();
        $data['listnotifikasipeneliti'] = $this->m_penelitian->list_notifikasi_peneliti()->result_array();
        $data['jumlahnotifikasi'] = $this->m_penelitian->jumlah_notifikasi();

        $this->form_validation->set_rules('nama_kategori_hasil', 'Nama Kategori Hasil', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/manajemendata/kategorihasil/v_tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->m_kategorihasil->tambah();
            $this->session->set_flashdata('pesan', 'Kategori hasil berhasil ditambah !');
            redirect('admin/c_kategorihasil');
        }
    }

    public function edit($id)
    {

        $this->form_validation->set_rules('nama_kategori_hasil', 'Nama Kategori Hasil', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Kategori Hasil';
            $data['judul'] = 'Edit Kategori Hasil';
            $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
            $data['getpegawai'] = $this->m_pegawai->getPegawai()->row_array();
            $data['kategorihasil'] = $this->m_kategorihasil->getIdKategoriHasil($id)->row_array();
            $data['listnotifikasiverifikator'] = $this->m_penelitian->list_notifikasi_verifikator()->result_array();
            $data['listnotifikasipeneliti'] = $this->m_penelitian->list_notifikasi_peneliti()->result_array();
            $data['jumlahnotifikasi'] = $this->m_penelitian->jumlah_notifikasi();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/manajemendata/kategorihasil/v_edit', $data);
            $this->load->view('templates/footer');
        } else {

            $this->m_kategorihasil->edit();
            $this->session->set_flashdata('pesan', 'Kategori hasil berhasil diubah !');
            redirect('admin/c_kategorihasil');
        }
    }

    public function hapus($id)
    {
        $this->m_kategorihasil->hapusDataKategoriHasil($id);
        redirect('admin/c_kategorihasil');
    }
}
