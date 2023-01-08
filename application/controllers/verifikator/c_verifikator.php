<?php
defined('BASEPATH') or exit('No direct script access allowed');

class c_verifikator extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('m_pegawai');
        $this->load->model('m_verifikator');
        $this->load->model('m_penelitian');
    }

    public function index()
    {
        $data = array();
        $data['title'] = 'Dashboard Verifikator';
        $data['judul'] = 'Dashboard Verifikator';
        $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['getpegawai'] = $this->m_pegawai->getPegawai()->row_array();
        $data['listnotifikasiverifikator'] = $this->m_penelitian->list_notifikasi_verifikator()->result_array();
        $data['listnotifikasipeneliti'] = $this->m_penelitian->list_notifikasi_peneliti()->result_array();
        $data['fetchyear1'] = $this->m_penelitian->fetch_year();
        $data['jumlahnotifikasi'] = $this->m_penelitian->jumlah_notifikasi();
        $data['Disetujui'] = $this->m_verifikator->JDisetujui();
        $data['Ditolak'] = $this->m_verifikator->JDitolak();
        $data['Menunggu'] = $this->m_verifikator->JMenunggu();
        $data['Selesai'] = $this->m_verifikator->JSelesai();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('verifikator/v_index', $data);
        $this->load->view('templates/footer');
    }

    function fetch_data_grafik2()
    {
        $this->m_verifikator->fetchdata_grafik_penelitian2();
    }

    public function profil()
    {
        $data['title'] = 'Profil Verifikator';
        $data['judul'] = 'Profil Verifikator';
        $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['getpegawai'] = $this->m_pegawai->getPegawai()->row_array();
        $data['listnotifikasiverifikator'] = $this->m_penelitian->list_notifikasi_verifikator()->result_array();
        $data['listnotifikasipeneliti'] = $this->m_penelitian->list_notifikasi_peneliti()->result_array();
        $data['jumlahnotifikasi'] = $this->m_penelitian->jumlah_notifikasi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('verifikator/profil/v_index', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['judul'] = 'Profil Verifikator';
        $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['getpegawai'] = $this->m_pegawai->getPegawai()->row_array();
        $data['listnotifikasiverifikator'] = $this->m_penelitian->list_notifikasi_verifikator()->result_array();
        $data['listnotifikasipeneliti'] = $this->m_penelitian->list_notifikasi_peneliti()->result_array();
        $data['jumlahnotifikasi'] = $this->m_penelitian->jumlah_notifikasi();
        $this->form_validation->set_rules('id_pegawai', 'ID Pegawai', 'required|trim');
        $this->form_validation->set_rules('id_user', 'ID User', 'required|trim');
        $this->form_validation->set_rules('nama_pegawai', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('nip', 'NIP', 'required|trim');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim');
        $this->form_validation->set_rules('no_hp', 'Nomor HP', 'required|trim');
        $this->form_validation->set_rules('alamat_pegawai', 'Alamat Pegawai', 'required|trim');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('verifikator/profil/v_edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->m_verifikator->edit();
            $this->session->set_flashdata('pesan', 'Profil telah diubah !');
            redirect('verifikator/c_verifikator/profil');
        }
    }

    public function ubahpassword()
    {
        $data['title'] = 'Ubah Password';
        $data['judul'] = 'Profil Verifikator';
        $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['getpegawai'] = $this->m_pegawai->getPegawai()->row_array();
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
            $this->load->view('verifikator/profil/v_ubahpassword', $data);
            $this->load->view('templates/footer');
        } else {
            $password_lama = $this->input->post('password_lama');
            $password_baru = $this->input->post('password_baru1');
            if (!password_verify($password_lama, $data['user']['password'])) {
                $this->session->set_flashdata('pesan1', 'Password lama salah !');
                redirect('verifikator/c_verifikator/ubahpassword');
            } else {
                if ($password_lama == $password_baru) {
                    $this->session->set_flashdata('pesan1', 'Password baru tidak boleh sama dengan password lama !');
                    redirect('verifikator/c_verifikator/ubahpassword');
                } else {
                    $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);
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

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('tbl_user');

                    $this->session->set_flashdata('pesan', 'Password berhasil diubah !');
                    redirect('verifikator/c_verifikator/profil');
                }
            }
        }
    }
}
