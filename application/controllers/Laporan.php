<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Laporanmodel');
        // $this->load->library('form_validation');
    }
    public function index()
    {
        $data['title'] = 'Rekap Laporan';

        $data['title'] = 'Rekap Laporan';

        $mulai = $this->input->get('mulai_tanggal');
        $sampai = $this->input->get('sampai_tanggal');
    
        if (!empty($mulai) && !empty($sampai)) {
            $this->db->where('tanggal >=', $mulai);
            $this->db->where('tanggal <=', $sampai);
        }

        $data['rekap'] = $this->Laporanmodel->get_laporan('tb_laporan')->result();
    
        $data['mulai'] = $mulai;
        $data['sampai'] = $sampai;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('laporan', $data);
        $this->load->view('templates/footer');
    }
    
}