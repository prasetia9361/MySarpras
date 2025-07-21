<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {
  public function __construct() {
    parent::__construct();
    // $this->load->model('User_model');
    $this->load->model('Usermodel');
  }

  public function login() {
    // Jika sudah login, langsung ke dashboard
    if ($this->session->userdata('logged_in')) {
      redirect('dashboard');
    }

    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->form_validation->set_rules('username','Username','required');
    $this->form_validation->set_rules('password','Password','required');

    if ($this->form_validation->run() === FALSE) {
      // Tampilkan view login Anda (dengan design AdminLTE)
      $this->load->view('auth/login');
    } else {
      $u = $this->input->post('username');
      $p = $this->input->post('password');
      $user = $this->Usermodel->get_by_username($u);
      if ($user && password_verify($p, $user->password)) {
        // Set session
        $sess = [
          'id_user'   => $user->id,
          'username'  => $user->username,
          'nama'      => $user->nama,
          'akses'     => $user->akses,
          'logged_in' => TRUE
        ];
        $this->session->set_userdata($sess);
        redirect('dashboard');
      } else {
        $this->session->set_flashdata('error','Username atau password salah');
        redirect('auth/login');
      }
    }
  }

  public function logout() {
    $this->session->sess_destroy();
    redirect('auth/login');
  }

  public function register()
  {
      // Jika sudah login, kirim ke dashboard
      if ($this->session->userdata('logged_in')) {
          redirect('dashboard');
      }
  
      $this->load->helper('form');
      $this->load->library('form_validation');
  
      // Aturan validasi
      $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[tb_user.username]', [
          'is_unique' => 'Username sudah digunakan'
      ]);
      $this->form_validation->set_rules('nama',     'Nama lengkap', 'required|trim');
      $this->form_validation->set_rules('gender',   'Gender', 'required');
      $this->form_validation->set_rules('no_hp',    'Nomor HP', 'required|trim');
      $this->form_validation->set_rules('alamat',   'Alamat', 'required|trim');
      $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
      $this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'required|matches[password]');
  
      if ($this->form_validation->run() === FALSE) {
          // Tampilkan form register
          $this->load->view('auth/register');
      } else {
          // Siapkan data untuk disimpan
          $data = [
              'username' => $this->input->post('username', TRUE),
              'nama'     => $this->input->post('nama', TRUE),
              'gender'   => $this->input->post('gender', TRUE),
              'no_hp'    => $this->input->post('no_hp', TRUE),
              'alamat'   => $this->input->post('alamat', TRUE),
              'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
              'akses'    => 0,  // 0 = user
          ];
          // $this->db->insert('tb_user', $data);
          $this->Usermodel->insert_user($data);
          $this->session->set_flashdata('success', 'Registrasi berhasil. Silakan login.');
          redirect('login');
      }
  }
  

}
