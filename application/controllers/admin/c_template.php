<?php
defined('BASEPATH') or exit('No direct script access allowed');

class c_template extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('m_template');
        $this->load->model('m_pegawai');
        $this->load->model('m_penelitian');
    }

    public function index()
    {
        $data['title'] = 'Data Template';
        $data['judul'] = 'Data Template';
        $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['getpegawai'] = $this->m_pegawai->getPegawai()->row_array();
        $data['template'] = $this->m_template->getTemplate()->result_array();
        $data['listnotifikasiverifikator'] = $this->m_penelitian->list_notifikasi_verifikator()->result_array();
        $data['listnotifikasipeneliti'] = $this->m_penelitian->list_notifikasi_peneliti()->result_array();
        $data['jumlahnotifikasi'] = $this->m_penelitian->jumlah_notifikasi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/manajemendata/template/v_index', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Template';
        $data['judul'] = 'Data Template';
        $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['getpegawai'] = $this->m_pegawai->getPegawai()->row_array();
        $data['template'] = $this->m_template->getIdTemplate($id)->row_array();
        $data['listnotifikasiverifikator'] = $this->m_penelitian->list_notifikasi_verifikator()->result_array();
        $data['listnotifikasipeneliti'] = $this->m_penelitian->list_notifikasi_peneliti()->result_array();
        $data['jumlahnotifikasi'] = $this->m_penelitian->jumlah_notifikasi();

        $this->form_validation->set_rules('judul', 'Judul Kop', 'required');
        $this->form_validation->set_rules('instansi', 'instansi', 'required');
        $this->form_validation->set_rules('alamat_instansi', 'Alamat Instansi', 'required');
        $this->form_validation->set_rules('email_instansi', 'Email Instansi', 'required');
        $this->form_validation->set_rules('telp', 'Telepon', 'required');
        $this->form_validation->set_rules('fax', 'Fax', 'required');
        $this->form_validation->set_rules('kodepos', 'Kodepos', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/manajemendata/template/v_edit', $data);
            $this->load->view('templates/footer');
        } else {
            $config['upload_path'] = './assets/img/';
            $config['allowed_types'] = 'png';

            $this->upload->initialize($config);

            $id = $this->input->post('id_template');
            $judul = $this->input->post('judul');
            $instansi = $this->input->post('instansi');
            $alamat_instansi = $this->input->post('alamat_instansi');
            $email_instansi = $this->input->post('email_instansi');
            $telp = $this->input->post('telp');
            $fax = $this->input->post('fax');
            $nama_file = $this->input->post('nm_logo');
            $kodepos = $this->input->post('kodepos');
            $upload_logo = $_FILES['logo']['name'];

            if ($upload_logo) {
                $config['upload_path'] = './assets/img/';
                $config['allowed_types'] = 'png';
                $this->upload->initialize($config);
                if ($this->upload->do_upload('logo')) {
                    $file = $this->upload->data();
                    $nama_file = $file['file_name'];
                } else {
                    $error = array('error' => $this->upload->display_errors());
                    $nama_file = '';
                }
            }

            $data = [
                'id_template' => $id,
                'judul' => $judul,
                'instansi' => $instansi,
                'alamat_instansi' => $alamat_instansi,
                'email_instansi' => $email_instansi,
                'telp' => $telp,
                'fax' => $fax,
                'kodepos' => $kodepos,
                'logo' => $nama_file
            ];
            $this->m_template->edit($id, $data);
            $this->session->set_flashdata('pesan', 'Data Template berhasil diubah !');
            redirect('admin/c_template');
        }
    }
}
