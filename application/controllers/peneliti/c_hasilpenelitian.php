<?php
defined('BASEPATH') or exit('No direct script access allowed');

class c_hasilpenelitian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->library('form_validation');
        $this->load->model('m_peneliti');
        $this->load->model('m_penelitian');
        $this->load->model('m_hasilpenelitian');
        $this->load->model('m_kategorihasil');
        $this->load->model('m_anggota');
        $this->load->model('m_pejabat');
        $this->load->model('m_template');
    }

    public function index()
    {
        $data['title'] = 'Hasil Penelitian';
        $data['judul'] = 'Hasil Penelitian';
        $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['hasilpenelitian'] = $this->m_hasilpenelitian->getJoin()->result_array();
        $data['penelitian'] = $this->m_penelitian->getJoin1()->result_array();
        $data['anggotapenelitian'] = $this->m_penelitian->getJoinAnggota()->result_array();
        $data['nomorsurat'] = $this->m_penelitian->kode_surat();
        $data['peneliti'] = $this->m_peneliti->getPeneliti()->row_array();
        $data['getpeneliti'] = $this->m_peneliti->getPeneliti()->row_array();
        $data['listnotifikasiverifikator'] = $this->m_penelitian->list_notifikasi_verifikator()->result_array();
        $data['listnotifikasipeneliti'] = $this->m_penelitian->list_notifikasi_peneliti()->result_array();
        $data['jumlahnotifikasi'] = $this->m_penelitian->jumlah_notifikasi();
        $data['riwayat'] = $this->m_penelitian->riwayat()->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('peneliti/hasilpenelitian/v_index', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id)
    {

        $data['title'] = 'Edit Hasil Penelitian';
        $data['judul'] = 'Hasil Penelitian';
        $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['hasilpenelitian'] = $this->m_hasilpenelitian->getJoinId($id)->row_array();
        $data['kategorihasil'] = $this->m_kategorihasil->getAllKategoriHasil()->result_array();
        $data['peneliti'] = $this->m_peneliti->getPeneliti()->row_array();
        $data['getpeneliti'] = $this->m_peneliti->getPeneliti()->row_array();
        $data['listnotifikasiverifikator'] = $this->m_penelitian->list_notifikasi_verifikator()->result_array();
        $data['listnotifikasipeneliti'] = $this->m_penelitian->list_notifikasi_peneliti()->result_array();
        $data['jumlahnotifikasi'] = $this->m_penelitian->jumlah_notifikasi();

        $this->form_validation->set_rules('kategori_hasil', 'Kategori Hasil', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('peneliti/hasilpenelitian/v_edit', $data);
            $this->load->view('templates/footer');
        } else {

            $config['upload_path'] = './uploads/file_hasil/';
            $config['allowed_types'] = 'pdf';

            $this->upload->initialize($config);

            $id = $this->input->post('id_hasil_penelitian');
            $id_kategori_hasil = $this->input->post('kategori_hasil');
            $nama_file = $this->input->post('nm_file_hasil');
            $link = $this->input->post('link');
            $upload_file_hasil = $_FILES['file_hasil']['name'];

            if ($upload_file_hasil) {
                $config['upload_path'] = './uploads/file_hasil/';
                $config['allowed_types'] = 'pdf';
                $this->upload->initialize($config);
                if ($this->upload->do_upload('file_hasil')) {
                    $file = $this->upload->data();
                    $nama_file = $file['file_name'];
                } else {
                    $error = array('error' => $this->upload->display_errors());
                    $nama_file = '';
                }
            }

            $data = array(
                'id_hasil_penelitian' => $id,
                'file_hasil' => $nama_file,
                'id_kategori_hasil' =>  $id_kategori_hasil,
                'link' => $link
            );
            $getid = $this->m_hasilpenelitian->getJoinId($id)->row_array();
            $this->m_hasilpenelitian->edit($id, $data);
            $this->session->set_flashdata('pesan', 'Hasil Penelitian diberhasil diubah !');
            redirect('peneliti/c_hasilpenelitian/datahasil/' . $getid['id_penelitian']);
        }
    }

    public function buktiselesai($id)
    {
        $this->load->library('dompdf_gen');
        $data['penelitian'] = $this->m_penelitian->getJoinId1($id)->result_array();
        $data['anggotapenelitian'] = $this->m_anggota->getJoin($id)->result_array();
        $data['listnotifikasiverifikator'] = $this->m_penelitian->list_notifikasi_verifikator()->result_array();
        $data['listnotifikasipeneliti'] = $this->m_penelitian->list_notifikasi_peneliti()->result_array();
        $data['jumlahnotifikasi'] = $this->m_penelitian->jumlah_notifikasi();
        $data['pejabat'] = $this->m_pejabat->getPejabat()->row_array();
        $data['template'] = $this->m_template->getTemplate()->row_array();


        $this->load->view('peneliti/hasilpenelitian/buktiselesai_pdf', $data);

        $paper_size = 'A4';
        $orientation = 'potrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("buktiselesai.pdf", array('Attachment' => 0));
    }

    public function datahasil($id)
    {
        $data['title'] = 'Data Hasil Penelitian';
        $data['judul'] = 'Hasil Penelitian';
        $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['hasilpenelitian'] = $this->m_hasilpenelitian->getJoinIdHasilPenelitian($id)->result_array();
        $data['id'] = $id;
        $data['penelitian'] = $this->m_penelitian->getJoin()->row_array();
        $data['penelitian1'] = $this->m_penelitian->getJoin1()->result_array();
        $data['nomorsurat'] = $this->m_penelitian->kode_surat();
        $data['peneliti'] = $this->m_peneliti->getPeneliti()->row_array();
        $data['getpeneliti'] = $this->m_peneliti->getPeneliti()->row_array();
        $data['listnotifikasiverifikator'] = $this->m_penelitian->list_notifikasi_verifikator()->result_array();
        $data['listnotifikasipeneliti'] = $this->m_penelitian->list_notifikasi_peneliti()->result_array();
        $data['jumlahnotifikasi'] = $this->m_penelitian->jumlah_notifikasi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('peneliti/hasilpenelitian/v_datahasil', $data);
        $this->load->view('templates/footer');
    }

    public function tambahhasil($id)
    {

        $this->form_validation->set_rules('kategori_hasil', 'Kategori Hasil', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Upload Hasil Penelitian';
            $data['judul'] = 'Hasil Penelitian';
            $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
            $data['kategorihasil'] = $this->m_kategorihasil->getAllKategoriHasil()->result_array();
            $data['penelitian'] = $this->m_penelitian->getJoin()->row_array();
            $data['peneliti'] = $this->m_peneliti->getPeneliti()->row_array();
            $data['getpeneliti'] = $this->m_peneliti->getPeneliti()->row_array();
            $data['listnotifikasiverifikator'] = $this->m_penelitian->list_notifikasi_verifikator()->result_array();
            $data['listnotifikasipeneliti'] = $this->m_penelitian->list_notifikasi_peneliti()->result_array();
            $data['jumlahnotifikasi'] = $this->m_penelitian->jumlah_notifikasi();

            $data['id'] = $id;
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('peneliti/hasilpenelitian/v_tambahhasil', $data);
            $this->load->view('templates/footer');
        } else {

            $config['upload_path'] = './uploads/file_hasil/';
            $config['allowed_types'] = 'pdf';
            $config['file_name']    = 'File hasil-' .  time();

            $this->upload->initialize($config);

            if ($this->upload->do_upload('file_hasil')) {
                $file = $this->upload->data();
                $nama_file = $file['file_name'];
            } else {
                $error = array('error' => $this->upload->display_errors());
                $nama_file = '';
            }

            $penelitian = $this->m_penelitian->getIdPenelitian($id)->row_array();
            $id_kategori_hasil = $this->input->post('kategori_hasil');
            $link = $this->input->post('link');

            $data = array(
                'id_peneliti' => $penelitian['id_peneliti'],
                'id_kategori_hasil' =>  $id_kategori_hasil,
                'id_penelitian' =>  $penelitian['id_penelitian'],
                'tgl_input' => date('Y-m-d'),
                'id_pegawai' => null,
                'file_hasil' => $nama_file,
                'link' => $link
            );
            $this->m_hasilpenelitian->tambahhasil($data);
            $this->session->set_flashdata('pesan', 'Hasil Penelitian diberhasil di upload !');
            redirect('peneliti/c_hasilpenelitian/datahasil/' . $id);
        }
    }

    public function hapus($id)
    {
        $getid = $this->m_hasilpenelitian->getJoinAll()->row_array();
        $this->m_hasilpenelitian->hapusDataHasilPenelitian($id);
        redirect('peneliti/c_hasilpenelitian/datahasil/' . $getid['id_penelitian']);
    }
}
