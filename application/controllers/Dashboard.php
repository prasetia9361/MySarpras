<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {
  public function __construct() {
    parent::__construct();
    // Pastikan user sudah login
    if (!$this->session->userdata('logged_in')) {
      redirect('auth/login');
    }
  }

  public function index() {
    $data['title'] = 'Dashboard';
    $data['akses'] = $this->session->userdata('akses');
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('dashboard');
    $this->load->view('templates/footer');
  }
}
