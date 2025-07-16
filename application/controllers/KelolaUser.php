<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaUser extends CI_Controller
{

    public function __construct(){
        parent::__construct();
        $this->load->model('Usermodel');
    }

    public function index()
    {
        $data['title'] = 'Kelola Data User';
        $data['user'] = $this->Usermodel->get_user()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('kelolaUser/kelolaUser', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah User';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('kelolaUser/tambah', $data);
        $this->load->view('templates/footer');
    }
    
}