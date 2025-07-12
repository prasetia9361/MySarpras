<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acc extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Persetujuan Peminjaman';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('acc');
        $this->load->view('templates/footer');
    }
    
}