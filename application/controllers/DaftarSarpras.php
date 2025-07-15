<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DaftarSarpras extends CI_Controller
{

    public function __construct(){
        parent::__construct();
        $this->load->model('Sarprasmodel');
    }

    public function index()
    {
        $data['title'] = 'Daftar Sarpras';
        $data['sarpras'] = $this->Sarprasmodel->get_sarpras()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('daftarSarpras');
        $this->load->view('templates/footer');
    }
    
}