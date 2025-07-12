<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataSarpras extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Data Sarpras';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('dataSarpras');
        $this->load->view('templates/footer');
    }
    
}