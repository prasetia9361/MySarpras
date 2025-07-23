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

    public function setujui($id, $id_barang, $jenis_pengajuan)
    {
        // Pastikan parameter jenis_pengajuan bertipe integer
        $jenis_pengajuan = (int) $jenis_pengajuan;

        // Setujui pengajuan
        $this->Accmodel->update_aksi($id, 1); // 1 = disetujui

        // Update status sarpras sesuai jenis pengajuan
        if ($jenis_pengajuan == 0) {
            // Peminjaman: status barang menjadi dipakai (1)
            $this->Sarprasmodel->update_status($id_barang, 1);
        } elseif ($jenis_pengajuan == 1) {
            // Pengembalian: status barang menjadi tidak dipakai (0)
            $this->Sarprasmodel->update_status($id_barang, 0);
        }

        redirect('acc');
    }

    public function tolak($id, $id_barang, $jenis_pengajuan)
    {
        // Pastikan parameter jenis_pengajuan bertipe integer
        $jenis_pengajuan = (int) $jenis_pengajuan;

        // Tolak pengajuan
        $this->Accmodel->update_aksi($id, 0); // 0 = ditolak

        // Update status sarpras sesuai jenis pengajuan
        if ($jenis_pengajuan == 0) {
            // Peminjaman: status barang tetap tidak dipakai (0)
            $this->Sarprasmodel->update_status($id_barang, 0);
        } elseif ($jenis_pengajuan == 1) {
            // Pengembalian: status barang tetap dipakai (1)
            $this->Sarprasmodel->update_status($id_barang, 1);
        }

        redirect('acc');
    }

    public function hapus($id, $id_barang)
    {
        $this->Accmodel->hapus_pengajuan($id);
        redirect('acc');
    }
    
    
}