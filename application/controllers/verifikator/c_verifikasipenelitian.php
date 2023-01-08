<?php
defined('BASEPATH') or exit('No direct script access allowed');

class c_verifikasipenelitian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('m_penelitian');
        $this->load->model('m_peneliti');
        $this->load->model('m_pegawai');
        $this->load->model('m_verifikator');
    }

    public function index()
    {
        $data['title'] = 'Verif Penelitian';
        $data['judul'] = 'Verif Penelitian';
        $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['penelitian'] = $this->m_penelitian->getJoinAll()->result_array();
        $data['getpegawai'] = $this->m_pegawai->getPegawai()->row_array();
        $data['listnotifikasiverifikator'] = $this->m_penelitian->list_notifikasi_verifikator()->result_array();
        $data['listnotifikasipeneliti'] = $this->m_penelitian->list_notifikasi_peneliti()->result_array();
        $data['jumlahnotifikasi'] = $this->m_penelitian->jumlah_notifikasi();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('verifikator/verifikasipenelitian/v_index', $data);
        $this->load->view('templates/footer');
    }


    public function disetujui($id)
    {
        $to_id = $this->m_verifikator->get_to_id($id)->row();
        $email = $to_id->email;

        $array_data = [
            'from' => 'Admin <higun@itaputri.me>',
            'to' => $email,
            'subject' => 'DINAS KESEHATAN SURAKARTA (PEMBERITAHUAN)',
            'html' => 'Pengajuan Izin penelitian dengan email : ' . $email . ' DISETUJUI, silahkan login ke website
            Sistem Perizinan Penelitian Online untuk mengunduh Surat Rekomendasi ',
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

        $this->m_verifikator->Pdisetujui($id);
        redirect('verifikator/c_verifikasipenelitian');
    }


    public function ditolak($id)
    {

        $to_id = $this->m_verifikator->get_to_id($id)->row();
        $email = $to_id->email;


        $array_data = [
            'from' => 'Admin <higun@itaputri.me>',
            'to' => $email,
            'subject' => 'DINAS KESEHATAN SURAKARTA (PEMBERITAHUAN)',
            'html' => 'Pengajuan Izin penelitian dengan email : ' . $email . ' DITOLAK ',
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

        $this->m_verifikator->Pditolak($id);
        redirect('verifikator/c_verifikasipenelitian');
    }

    public function selesai($id)
    {
        $this->m_verifikator->Selesai($id);
        redirect('verifikator/c_verifikasipenelitian');
    }
}
