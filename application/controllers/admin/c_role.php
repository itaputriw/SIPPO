<?php
defined('BASEPATH') or exit('No direct script access allowed');

class c_role extends CI_Controller
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
        $this->load->model('m_pengaduan');
        $this->load->model('m_role');
        $this->load->model('m_menu');
    }

    public function index()
    {
        $data = array();
        $data['title'] = 'Role Akses';
        $data['judul'] = 'Role Akses';
        $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['getpegawai'] = $this->m_pegawai->getPegawai()->row_array();
        $data['listnotifikasiverifikator'] = $this->m_penelitian->list_notifikasi_verifikator()->result_array();
        $data['listnotifikasipeneliti'] = $this->m_penelitian->list_notifikasi_peneliti()->result_array();
        $data['jumlahnotifikasi'] = $this->m_penelitian->jumlah_notifikasi();
        $data['role'] = $this->m_role->getAllrole()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/manajemendata/role/v_index', $data);
        $this->load->view('templates/footer');
    }

    public function roleakses($id)
    {
        $data = array();
        $data['title'] = 'Role';
        $data['judul'] = 'Role Akses';
        $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['getpegawai'] = $this->m_pegawai->getPegawai()->row_array();
        $data['listnotifikasiverifikator'] = $this->m_penelitian->list_notifikasi_verifikator()->result_array();
        $data['listnotifikasipeneliti'] = $this->m_penelitian->list_notifikasi_peneliti()->result_array();
        $data['jumlahnotifikasi'] = $this->m_penelitian->jumlah_notifikasi();
        $data['role'] = $this->m_role->getIdRole($id)->row_array();
        $data['menu'] = $this->m_menu->getAllMenu1()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/manajemendata/role/v_roleakses', $data);
        $this->load->view('templates/footer');
    }

    public function ubahakses()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'id_role' => $role_id,
            'id_menu' => $menu_id
        ];

        $this->m_role->akses_menu($data);
        $this->session->set_flashdata('pesan', 'Akses diubah !');
    }
}
