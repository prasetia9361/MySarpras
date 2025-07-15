<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acc extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Accmodel');
        $this->load->model('Sarprasmodel');
    }

    public function index()
    {
        $data['title'] = 'Persetujuan Peminjaman';
        $data['acc'] = $this->Accmodel->get_pengajuan()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('acc', $data);
        $this->load->view('templates/footer');
    }

    public function setujui($id, $id_barang)
    {
        $this->Accmodel->update_aksi($id, 1); // 1 = diizinkan
        $this->Sarprasmodel->update_status($id_barang, 1);
        redirect('acc');
    }

    public function tolak($id, $id_barang)
    {
        $this->Accmodel->update_aksi($id, 0); // 0 = ditolak
        $this->Sarprasmodel->update_status($id_barang, 0);
        redirect('acc');
    }

    public function hapus($id, $id_barang)
    {
        $this->Accmodel->hapus_pengajuan($id);
        redirect('acc');
    }
    
    
}