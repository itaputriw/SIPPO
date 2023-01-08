<?php
defined('BASEPATH') or exit('No direct script access allowed');

class c_admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->library('form_validation');
        $this->load->library('pagination');
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
        $this->load->model('m_menu');
    }

    public function index()
    {
        $data = array();
        $data['title'] = 'Dashboard Admin';
        $data['judul'] = 'Dashboard Admin';
        $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['getpegawai'] = $this->m_pegawai->getPegawai()->row_array();
        $data['JPegawai'] = $this->m_pegawai->jumlah_pegawai();
        $data['JKategorihasil'] = $this->m_kategorihasil->jumlah_kategori_hasil();
        $data['JUnit'] = $this->m_unit->jumlah_unit();
        $data['JMenu'] = $this->m_menu->jumlah_menu();
        $data['JPenelitian'] = $this->m_penelitian->jumlah_penelitian();
        $data['JPeneliti'] = $this->m_peneliti->jumlah_peneliti();
        $data['JHasilpenelitian'] = $this->m_hasilpenelitian->jumlah_hasilpenelitian();
        $data['JPengaduan'] = $this->m_pengaduan->jumlah_pengaduan();
        $data['listnotifikasiverifikator'] = $this->m_penelitian->list_notifikasi_verifikator()->result_array();
        $data['listnotifikasipeneliti'] = $this->m_penelitian->list_notifikasi_peneliti()->result_array();
        $data['jumlahnotifikasi'] = $this->m_penelitian->jumlah_notifikasi();
        $data['fetchyear'] = $this->m_verifikator->fetch_year();
        $data['fetchyear1'] = $this->m_penelitian->fetch_year();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/v_index', $data);
        $this->load->view('templates/footer');
    }


    function fetch_data()
    {
        $this->m_admin->fetchdata_grafik_peneliti();
    }

    function fetch_data_grafik()
    {
        $this->m_admin->fetchdata_grafik_penelitian();
    }


    public function profil()
    {
        $data['title'] = 'Profil Admin';
        $data['judul'] = 'Profil Admin';
        $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['getpegawai'] = $this->m_pegawai->getPegawai()->row_array();
        $data['listnotifikasiverifikator'] = $this->m_penelitian->list_notifikasi_verifikator()->result_array();
        $data['listnotifikasipeneliti'] = $this->m_penelitian->list_notifikasi_peneliti()->result_array();
        $data['jumlahnotifikasi'] = $this->m_penelitian->jumlah_notifikasi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/profil/v_index', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $this->form_validation->set_rules('id_pegawai', 'ID Pegawai', 'required|trim');
        $this->form_validation->set_rules('id_user', 'ID User', 'required|trim');
        $this->form_validation->set_rules('nama_pegawai', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('nip', 'NIP', 'required|trim');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim');
        $this->form_validation->set_rules('no_hp', 'Nomor HP', 'required|trim');
        $this->form_validation->set_rules('alamat_pegawai', 'Alamat Pegawai', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Profile Admin';
            $data['judul'] = 'Profil Admin';
            $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
            $data['getpegawai'] = $this->m_pegawai->getPegawai()->row_array();
            $data['listnotifikasiverifikator'] = $this->m_penelitian->list_notifikasi_verifikator()->result_array();
            $data['listnotifikasipeneliti'] = $this->m_penelitian->list_notifikasi_peneliti()->result_array();
            $data['jumlahnotifikasi'] = $this->m_penelitian->jumlah_notifikasi();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/profil/v_edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->m_admin->edit();
            $this->session->set_flashdata('pesan', 'Profil berhasil diubah !');
            redirect('admin/c_admin/profil');
        }
    }

    public function datapenelitian()
    {
        $data['title'] = 'Data Penelitian';
        $data['judul'] = 'Data Penelitian';
        $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['penelitian'] = $this->m_penelitian->getJoinAll()->result_array();
        $data['getpegawai'] = $this->m_pegawai->getPegawai()->row_array();
        $data['listnotifikasiverifikator'] = $this->m_penelitian->list_notifikasi_verifikator()->result_array();
        $data['listnotifikasipeneliti'] = $this->m_penelitian->list_notifikasi_peneliti()->result_array();
        $data['jumlahnotifikasi'] = $this->m_penelitian->jumlah_notifikasi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datapenelitian/v_index', $data);
        $this->load->view('templates/footer');
    }

    public function datahasilpenelitian()
    {
        $data['title'] = 'Data Hasil Penelitian';
        $data['judul'] = 'Data Hasil Penelitian';
        $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['hasilpenelitian'] = $this->m_hasilpenelitian->getJoinAll()->result_array();
        $data['penelitian'] = $this->m_penelitian->getJoinAll()->result_array();
        $data['getpegawai'] = $this->m_pegawai->getPegawai()->row_array();
        $data['listnotifikasiverifikator'] = $this->m_penelitian->list_notifikasi_verifikator()->result_array();
        $data['listnotifikasipeneliti'] = $this->m_penelitian->list_notifikasi_peneliti()->result_array();
        $data['jumlahnotifikasi'] = $this->m_penelitian->jumlah_notifikasi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datahasilpenelitian/v_index', $data);
        $this->load->view('templates/footer');
    }

    public function ubahpassword()
    {
        $data['title'] = 'Ubah Password';
        $data['judul'] = 'Profil Admin';
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
            $this->load->view('admin/profil/v_ubahpassword', $data);
            $this->load->view('templates/footer');
        } else {
            $password_lama = $this->input->post('password_lama');
            $password_baru = $this->input->post('password_baru1');
            if (!password_verify($password_lama, $data['user']['password'])) {
                $this->session->set_flashdata('pesan1', 'Password lama salah !');
                redirect('admin/c_admin/ubahpassword');
            } else {
                if ($password_lama == $password_baru) {
                    $this->session->set_flashdata('pesan1', 'Password baru tidak boleh sama dengan password lama !');
                    redirect('admin/c_admin/ubahpassword');
                } else {
                    $email = $this->session->userdata('email');
                    $password_baru = $this->input->post('password_baru1');

                    $array_data = [
                        'from' => 'Admin <higun@itaputri.me>',
                        'to' => $email,
                        'subject' => 'DINAS KESEHATAN SURAKARTA (PEMBERITAHUAN UBAH PASSWORD)',
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

                    $this->m_admin->ubahpassword();
                    $this->session->set_flashdata('pesan', 'Password berhasil diubah !');
                    redirect('admin/c_admin/profil');
                }
            }
        }
    }

    public function datapeneliti()
    {
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        $this->db->like('nama_peneliti', $data['keyword']);
        $this->db->or_like('no_identitas', $data['keyword']);
        $this->db->from('tbl_peneliti');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 6;
        $this->pagination->initialize($config);



        $data['title'] = 'Data Peneliti';
        $data['judul'] = 'Data Peneliti';
        $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['start'] = $this->uri->segment(4);
        $data['peneliti'] = $this->m_peneliti->getAllPenelitiLimit($config['per_page'], $data['start'], $data['keyword']);
        $data['getpegawai'] = $this->m_pegawai->getPegawai()->row_array();
        $data['listnotifikasiverifikator'] = $this->m_penelitian->list_notifikasi_verifikator()->result_array();
        $data['listnotifikasipeneliti'] = $this->m_penelitian->list_notifikasi_peneliti()->result_array();
        $data['jumlahnotifikasi'] = $this->m_penelitian->jumlah_notifikasi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datapeneliti/v_index', $data);
        $this->load->view('templates/footer');
    }

    public function datahasil($id)
    {
        $data['title'] = 'Data Hasil Penelitian';
        $data['judul'] = 'Data Hasil Penelitian';
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
        $this->load->view('admin/datahasilpenelitian/v_datahasil', $data);
        $this->load->view('templates/footer');
    }
}
