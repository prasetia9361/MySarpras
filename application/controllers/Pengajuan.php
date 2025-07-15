<?php
defined('BASEPATH') OR exit('No direct script access allowed');


// use Dompdf\Dompdf;
// use Dompdf\Options;

class Pengajuan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Accmodel');
        // $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Pengajuan Sarpras';
        $data['rekap'] = $this->Accmodel->get_pengajuan()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pengajuan/pengajuan', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $this->load->model('Sarprasmodel');
        $data['options_barang'] = $this->Sarprasmodel->get_nama_barang()->result();

        $data['title'] = 'Tambah Pengajuan';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pengajuan/tambah', $data);
        $this->load->view('templates/footer');
    }

    public function simpan()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('id_barang', 'ID Barang', 'required');
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('jenis_pengajuan', 'Jenis Pengajuan', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        $nama = $this->input->post('nama');
        $nama_barang = $this->input->post('nama_barang');
        $id_barang = $this->input->post('id_barang');
        $tanggal = $this->input->post('tanggal');
        $jenis_pengajuan = $this->input->post('jenis_pengajuan');
        $keterangan = $this->input->post('keterangan');

        if ($this->form_validation->run() == false) {
            // Jika validasi gagal, kembalikan response error
            echo json_encode([
                'status' => 'error',
                'message' => 'Data tidak boleh kosong',
                'errors' => $this->form_validation->error_array()
            ]);
            return;
        } else {
            $data = [
                'nama' => $nama,
                'id_barang' => $id_barang,
                'nama_barang' => $nama_barang,
                'tanggal' => $tanggal,
                'jenis_pengajuan' => $jenis_pengajuan,
                'keterangan' => $keterangan,
                'aksi' => 2,
            ];

            $this->Accmodel->insert_pengajuan($data);
            // Kembalikan response success
            echo 'success';
            return;
        }
    }

    public function get_id_barang_by_nama()
    {
        $nama_barang = $this->input->post('nama_barang');
        $this->load->model('Sarprasmodel');
        $result = $this->Sarprasmodel->get_id_barang($nama_barang)->result();

        $data = [];
        foreach ($result as $row) {
            $data[] = $row->id_barang;
        }
        echo json_encode($data);
    }
}