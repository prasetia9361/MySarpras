<?php
defined('BASEPATH') OR exit('No direct script access allowed');


use Dompdf\Dompdf;
use Dompdf\Options;

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

        if ($this->form_validation->run() == false) {
            $this->tambah();
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'id_barang' => $this->input->post('id_barang'),
                'nama_barang' => $this->input->post('nama_barang'),
                'tanggal' => $this->input->post('tanggal'),
                'jenis_pengajuan' => $this->input->post('jenis_pengajuan'),
                'keterangan' => $this->input->post('keterangan'),
                'aksi' => 2,
            ];

            $this->Accmodel->insert_pengajuan($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pengajuan berhasil disimpan</div>');
            redirect('pengajuan/tambah');
        }
    }
}