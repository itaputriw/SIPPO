<?php
defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class c_laporan extends CI_Controller
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
    }

    public function index()
    {
        $data['title'] = 'Laporan Admin';
        $data['judul'] = 'Laporan Admin';
        $tgl_diajukan = $this->input->post('tgl_diajukan');
        $kategori_penelitian = $this->input->post('kategori_penelitian');
        $status = $this->input->post('status');
        $bulan = $this->input->post('bulan');
        $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['penelitian'] = $this->m_penelitian->getJoinAll()->result_array();
        $data['getpegawai'] = $this->m_pegawai->getPegawai()->row_array();
        $data['hitpenelitian'] = $this->m_penelitian->hitpenelitian();
        $data['datapen'] = $this->m_penelitian->datapen($tgl_diajukan, $kategori_penelitian, $status, $bulan);
        $data['listnotifikasiverifikator'] = $this->m_penelitian->list_notifikasi_verifikator()->result_array();
        $data['listnotifikasipeneliti'] = $this->m_penelitian->list_notifikasi_peneliti()->result_array();
        $data['jumlahnotifikasi'] = $this->m_penelitian->jumlah_notifikasi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/laporan/v_index', $data);
        $this->load->view('templates/footer');
    }

    public function cetaklaporan()
    {
        $tgl_diajukan = $this->input->post('tgl_diajukan');
        $kategori_penelitian = $this->input->post('kategori_penelitian');
        $status = $this->input->post('status');
        $bulan = $this->input->post('bulan');
        $data = array();
        $data['tgl_diajukan'] = $this->input->post('tgl_diajukan');
        $data['id_kategori_hasil'] = $this->input->post('id_kategori_hasil');
        $data['status'] = $this->input->post('status');
        $data['bulan'] = $this->input->post('bulan');
        $data['datapen'] = $this->m_penelitian->laporan($tgl_diajukan, $kategori_penelitian, $status, $bulan)->result();
        $data['listnotifikasiverifikator'] = $this->m_penelitian->list_notifikasi_verifikator()->result_array();
        $data['listnotifikasipeneliti'] = $this->m_penelitian->list_notifikasi_peneliti()->result_array();
        $data['jumlahnotifikasi'] = $this->m_penelitian->jumlah_notifikasi();

        $this->load->view('admin/laporan/laporan_pdf', $data);
    }

    public function cetaklaporan_excel()
    {
        $tgl_diajukan = $this->input->post('tgl_diajukan');
        $kategori_penelitian = $this->input->post('kategori_penelitian');
        $status = $this->input->post('status');
        $bulan = $this->input->post('bulan');
        $data['datapen'] = $this->m_penelitian->laporan($tgl_diajukan, $kategori_penelitian, $status, $bulan)->result();

        $object = new Spreadsheet();
        $object->setActiveSheetIndex(0);
        $object->getActiveSheet()->setCellValue('A1', 'Nomor');
        $object->getActiveSheet()->setCellValue('B1', 'Nomor Pengajuan');
        $object->getActiveSheet()->setCellValue('C1', 'Tanggal Diajukan');
        $object->getActiveSheet()->setCellValue('D1', 'Nama Peneliti');
        $object->getActiveSheet()->setCellValue('E1', 'Judul');
        $object->getActiveSheet()->setCellValue('F1', 'Status');


        $baris = 2;
        $no = 1;

        foreach ($data['datapen'] as $dp) {
            $object->getActiveSheet()->setCellValue('A' . $baris, $no++);
            $object->getActiveSheet()->setCellValue('B' . $baris, $dp->nomor_surat);
            $object->getActiveSheet()->setCellValue('C' . $baris, $dp->tgl_diajukan);
            $object->getActiveSheet()->setCellValue('D' . $baris, $dp->nama_peneliti);
            $object->getActiveSheet()->setCellValue('E' . $baris, $dp->judul);
            $object->getActiveSheet()->setCellValue('F' . $baris, $dp->status);

            $baris++;
        }

        $writer = new Xlsx($object);
        $file = 'laporan_data_penelitian.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $file);
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function cetaklaporan_pdf()
    {
        $this->load->library('dompdf_gen');

        $tgl_diajukan = $this->input->post('tgl_diajukan');
        $kategori_penelitian = $this->input->post('kategori_penelitian');
        $status = $this->input->post('status');
        $bulan = $this->input->post('bulan');
        $data = array();
        $data['tgl_diajukan'] = $this->input->post('tgl_diajukan');
        $data['id_kategori_hasil'] = $this->input->post('id_kategori_hasil');
        $data['status'] = $this->input->post('status');
        $data['bulan'] = $this->input->post('bulan');
        $data['hitpenelitian'] = $this->m_penelitian->hitpenelitian();
        $data['datapen'] = $this->m_penelitian->laporan($tgl_diajukan, $kategori_penelitian, $status, $bulan)->result();
        $data['listnotifikasiverifikator'] = $this->m_penelitian->list_notifikasi_verifikator()->result_array();
        $data['listnotifikasipeneliti'] = $this->m_penelitian->list_notifikasi_peneliti()->result_array();
        $data['jumlahnotifikasi'] = $this->m_penelitian->jumlah_notifikasi();

        $this->load->view('admin/laporan/laporan_pdf1', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_data_penelitian.pdf", array('Attachment' => 0));
    }
}
