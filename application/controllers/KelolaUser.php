<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaUser extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Kelola Data User';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('kelolaUser');
        $this->load->view('templates/footer');
    }
    
}