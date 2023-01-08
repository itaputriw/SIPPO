<?php
defined('BASEPATH') or exit('No direct script access allowed');

class c_unit extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->library('form_validation');
        $this->load->model('m_unit');
        $this->load->model('m_pegawai');
        $this->load->model('m_penelitian');
        $this->load->model('m_alamat');
    }

    public function index()
    {
        $data['title'] = 'Data Unit';
        $data['judul'] = 'Data Unit';
        $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['getpegawai'] = $this->m_pegawai->getPegawai()->row_array();
        $data['unit'] = $this->m_unit->getAllUnitAdmin()->result_array();
        $data['provinsi'] = $this->m_alamat->getAllProvinsi()->result_array();
        $data['kabupaten'] = $this->m_alamat->getAllKabupaten()->result_array();
        $data['kecamatan'] = $this->m_alamat->getAllKecamatan()->result_array();
        $data['listnotifikasiverifikator'] = $this->m_penelitian->list_notifikasi_verifikator()->result_array();
        $data['listnotifikasipeneliti'] = $this->m_penelitian->list_notifikasi_peneliti()->result_array();
        $data['jumlahnotifikasi'] = $this->m_penelitian->jumlah_notifikasi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/manajemendata/unit/v_index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Lokasi';
        $data['judul'] = 'Data Unit';
        $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['getpegawai'] = $this->m_pegawai->getPegawai()->row_array();
        $data['listnotifikasiverifikator'] = $this->m_penelitian->list_notifikasi_verifikator()->result_array();
        $data['listnotifikasipeneliti'] = $this->m_penelitian->list_notifikasi_peneliti()->result_array();
        $data['jumlahnotifikasi'] = $this->m_penelitian->jumlah_notifikasi();

        $this->form_validation->set_rules('nama_unit', 'Nama Lokasi', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/manajemendata/unit/v_tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->m_unit->tambah();
            $this->session->set_flashdata('pesan', 'Unit berhasil ditambah !');
            redirect('admin/c_unit');
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Lokasi';
        $data['judul'] = 'Data Unit';
        $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['getpegawai'] = $this->m_pegawai->getPegawai()->row_array();
        $data['unit'] = $this->m_unit->getIdUnit($id)->row_array();
        $data['listnotifikasiverifikator'] = $this->m_penelitian->list_notifikasi_verifikator()->result_array();
        $data['listnotifikasipeneliti'] = $this->m_penelitian->list_notifikasi_peneliti()->result_array();
        $data['jumlahnotifikasi'] = $this->m_penelitian->jumlah_notifikasi();

        $this->form_validation->set_rules('nama_unit', 'Nama Lokasi', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/manajemendata/unit/v_edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->m_unit->edit();
            $this->session->set_flashdata('pesan', 'Unit berhasil diubah !');
            redirect('admin/c_unit');
        }
    }

    public function hapus($id)
    {
        $this->m_unit->hapusDataUnit($id);
        redirect('admin/c_unit');
    }

    public function get_kabupaten()
    {
        $id_provinsi = $this->input->post('id', TRUE);
        $data = $this->m_alamat->get_kabupaten($id_provinsi)->result();
        echo json_encode($data);
    }

    public function get_kecamatan()
    {
        $id_kabupaten = $this->input->post('id', TRUE);
        $data = $this->m_alamat->get_kecamatan($id_kabupaten)->result();
        echo json_encode($data);
    }
    public function get_kelurahan()
    {
        $id_kecamatan = $this->input->post('id', TRUE);
        $data = $this->m_alamat->get_kelurahan($id_kecamatan)->result();
        echo json_encode($data);
    }
}
