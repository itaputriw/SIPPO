<?php
defined('BASEPATH') or exit('No direct script access allowed');

class c_peneliti extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->library('form_validation');
        $this->load->model('m_peneliti');
        $this->load->model('m_auth');
        $this->load->model('m_penelitian');
        $this->load->model('m_notifikasi');
    }

    public function index()
    {
        $data['title'] = 'Dashboard Peneliti';
        $data['judul'] = 'Dashboard Peneliti';
        $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['peneliti'] = $this->m_peneliti->getAllPeneliti()->result_array();
        $data['getpeneliti'] = $this->m_auth->getPeneliti()->row_array();
        $data['listnotifikasiverifikator'] = $this->m_penelitian->list_notifikasi_verifikator()->result_array();
        $data['listnotifikasipeneliti'] = $this->m_penelitian->list_notifikasi_peneliti()->result_array();
        $data['jumlahnotifikasi'] = $this->m_penelitian->jumlah_notifikasi();
        $data['notif'] = $this->m_notifikasi->notif()->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('peneliti/v_index', $data);
        $this->load->view('templates/footer');
    }

    public function profil()
    {
        $data['title'] = 'Profil';
        $data['judul'] = 'Profil Peneliti';
        $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['getpeneliti'] = $this->m_peneliti->getPeneliti()->row_array();
        $data['hitpenelitianuser'] = $this->m_peneliti->hitpenelitian_user();
        $data['hitpenelitianselesai'] = $this->m_peneliti->hitpenelitian_selesai();
        $data['listnotifikasiverifikator'] = $this->m_penelitian->list_notifikasi_verifikator()->result_array();
        $data['listnotifikasipeneliti'] = $this->m_penelitian->list_notifikasi_peneliti()->result_array();
        $data['jumlahnotifikasi'] = $this->m_penelitian->jumlah_notifikasi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('peneliti/profil/v_index', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['judul'] = 'Profil Peneliti';
        $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['getpeneliti'] = $this->m_peneliti->getPeneliti()->row_array();
        $data['listnotifikasiverifikator'] = $this->m_penelitian->list_notifikasi_verifikator()->result_array();
        $data['listnotifikasipeneliti'] = $this->m_penelitian->list_notifikasi_peneliti()->result_array();
        $data['jumlahnotifikasi'] = $this->m_penelitian->jumlah_notifikasi();

        $this->form_validation->set_rules('id_peneliti', 'ID Peneliti', 'required|trim');
        $this->form_validation->set_rules('id_user', 'ID User', 'required|trim');
        $this->form_validation->set_rules('nama_peneliti', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('no_identitas', 'Nomor Identitas', 'required|trim');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim');
        $this->form_validation->set_rules('no_hp', 'Nomor HP', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('peneliti/profil/v_edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->m_peneliti->editProfil();
            $this->session->set_flashdata('pesan', 'Profil berhasil diubah !');
            redirect('peneliti/c_peneliti/profil');
        }
    }

    public function ubahpassword()
    {
        $data['title'] = 'Ubah Password';
        $data['judul'] = 'Profil Peneliti';
        $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['getpeneliti'] = $this->m_peneliti->getPeneliti()->row_array();
        $data['listnotifikasiverifikator'] = $this->m_penelitian->list_notifikasi_verifikator()->result_array();
        $data['listnotifikasipeneliti'] = $this->m_penelitian->list_notifikasi_peneliti()->result_array();
        $data['jumlahnotifikasi'] = $this->m_penelitian->jumlah_notifikasi();

        $this->form_validation->set_rules('password_lama', 'Password Lama', 'required|trim');
        $this->form_validation->set_rules('password_baru1', 'Password Baru', 'required|trim|min_length[3]|matches[password_baru2]');
        $this->form_validation->set_rules('password_baru2', 'Konfirmasi Password Baru', 'required|trim|min_length[3]|matches[password_baru1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('peneliti/profil/v_ubahpassword', $data);
            $this->load->view('templates/footer');
        } else {
            $password_lama = $this->input->post('password_lama');
            $password_baru = $this->input->post('password_baru1');
            if (!password_verify($password_lama, $data['user']['password'])) {
                $this->session->set_flashdata('pesan1', 'Password lama salah !');
                redirect('peneliti/c_peneliti/ubahpassword');
            } else {
                if ($password_lama == $password_baru) {
                    $this->session->set_flashdata('pesan1', 'Password baru tidak boleh sama dengan password lama !');
                    redirect('peneliti/c_peneliti/ubahpassword');
                } else {
                    $email = $this->session->userdata('email');
                    $password_baru = $this->input->post('password_baru1');

                    $array_data = [
                        'from' => 'Admin <higun@itaputri.me>',
                        'to' => $email,
                        'subject' => 'DINAS KESEHATAN SURAKARTA (PEMBERTAHUAN UBAH PASSWORD)',
                        'html' => 'Email ini bersifat RAHASIA, Jangan memberikan password anda kepada siapapun
                        Email/username anda : ' . $email . ' Password baru anda : ' . $password_baru,
                        'o:tracking' => 'yes',
                        'o:tracking-clicks' => 'yes',
                        'o:tracking-opens' => 'yes',
                    ];

                    $session = curl_init('https://api.eu.mailgun.net/v3/itaputri.me/messages');
                    curl_setopt($session, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
                    curl_setopt($session, CURLOPT_USERPWD, 'api:d28b3b3df8045fae279885db2db3c7be-2a9a428a-23406d93');
                    curl_setopt($session, CURLOPT_POST, true);
                    curl_setopt($session, CURLOPT_POSTFIELDS, $array_data);
                    curl_setopt($session, CURLOPT_HEADER, false);
                    curl_setopt($session, CURLOPT_ENCODING, 'UTF-8');
                    curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($session, CURLOPT_SSL_VERIFYPEER, false);
                    $response = curl_exec($session);
                    curl_close($session);

                    $this->m_peneliti->ubahpassword();
                    $this->session->set_flashdata('pesan', 'Password berhasil diubah !');
                    redirect('peneliti/c_peneliti/profil');
                }
            }
        }
    }
}
