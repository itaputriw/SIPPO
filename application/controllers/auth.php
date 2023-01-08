<?php
defined('BASEPATH') or exit('No direct script access allowed');

class auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_auth');
        $this->load->model('m_penelitian');
        $this->load->model('m_pegawai');
        $this->load->model('m_peneliti');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Halaman Login';
            $data['judul'] = 'Halaman Login';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/v_login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->login();
        }
    }

    public function login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->db->get_where('tbl_user', ['email' => $email])->row_array();

        //jika usernya ada
        if ($user) {
            if ($user['aktif'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'id_user' => $user['id_user'],
                        'email' => $user['email'],
                        'role' => $user['role'],
                        'aktif' => $user['aktif']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role'] == 1) {
                        $this->session->set_flashdata('pesan', 'Login berhasil !');
                        redirect('admin/c_admin');
                    } elseif ($user['role'] == 2) {
                        $this->session->set_flashdata('pesan', 'Login berhasil !');
                        redirect('adminunit/c_adminunit');
                    } elseif ($user['role'] == 3) {
                        $this->session->set_flashdata('pesan', 'Login berhasil !');
                        redirect('verifikator/c_verifikator');
                    } elseif ($user['role'] == 4) {
                        $this->session->set_flashdata('pesan', 'Login berhasil !');
                        redirect('peneliti/c_peneliti');
                    }
                } else {
                    $this->session->set_flashdata('pesan1', 'Password salah !');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('pesan1', 'Email belum diaktivasi !');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('pesan1', 'Email belum teregistrasi !');
            redirect('auth');
        }
    }


    public function registration()
    {
        $this->form_validation->set_rules('nama_peneliti', 'Nama', 'required|trim');
        $this->form_validation->set_rules('no_identitas', 'Nomor Identitas', 'required|trim|is_unique[tbl_peneliti.no_identitas]|min_length[16]|max_length[16]');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim');
        $this->form_validation->set_rules('no_hp', 'Nomor HP', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tbl_user.email]', [
            'is_unique' => 'Email sudah teregistrasi!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registration';
            $data['judul'] = 'Registration';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/v_registration');
            $this->load->view('templates/auth_footer');
        } else {
            $email = $this->input->post('email');

            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];

            $this->db->insert('tbl_user_token', $user_token);

            $array_data = [
                'from' => 'Admin <higun@itaputri.me>',
                'to' => $email,
                'subject' => 'DINAS KESEHATAN SURAKARTA (VERIFIKASI AKUN)',
                'html' => 'Click this link to verify your account : <a href ="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>',
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

            $this->m_auth->regis();
            $this->session->set_flashdata('pesan', 'Registrasi berhasil ! Silahkan aktivasi akun !');
            redirect('auth');
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('tbl_user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('tbl_user_token', ['token' => $token])->row_array();

            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) { //24 jam
                    $this->db->set('aktif', '1');
                    $this->db->where('email', $email);
                    $this->db->update('tbl_user');

                    $this->db->delete('tbl_user_token', ['email' => $email]);

                    $this->session->set_flashdata('pesan', 'Email telah teregistrasi ! Silahkan Login');
                    redirect('auth');
                } else {

                    $this->db->delete('tbl_user', ['email' => $email]);
                    $this->db->delete('tbl_user_token', ['email' => $email]);

                    $this->session->set_flashdata('pesan1', 'token kadaluarsa! ');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('pesan1', 'Token salah !');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('pesan1', 'Aktivasi gagal! Email salah');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        session_destroy();
        $this->session->set_flashdata('pesan', '<div class="alert 
        alert-success" role="alert"> Berhasil logout !</div>');
        redirect('auth');
    }

    public function blocked()
    {
        $data['title'] = 'Blocked';
        $data['judul'] = 'Blocked';
        $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['penelitian'] = $this->m_penelitian->getJoinAll()->result_array();
        $data['getpegawai'] = $this->m_pegawai->getPegawai()->row_array();
        $data['getpeneliti'] = $this->m_auth->getPeneliti()->row_array();
        $data['hitpenelitian'] = $this->m_penelitian->hitpenelitian();
        $data['listnotifikasiverifikator'] = $this->m_penelitian->list_notifikasi_verifikator()->result_array();
        $data['listnotifikasipeneliti'] = $this->m_penelitian->list_notifikasi_peneliti()->result_array();
        $data['jumlahnotifikasi'] = $this->m_penelitian->jumlah_notifikasi();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('blocked', $data);
        $this->load->view('templates/footer', $data);
    }
}
