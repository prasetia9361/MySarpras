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
        $this->load->model('Usermodel');
        $data['title'] = 'Tambah User';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('kelolaUser/tambah', $data);
        $this->load->view('templates/footer');
    }

    public function simpan(){
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('no_hp', 'No. HP', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('akses', 'Akses', 'required');

        $username = $this->input->post('username');
        $nama = $this->input->post('nama');
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        // $password = $this->input->post('password');
        $gender = $this->input->post('gender');
        $no_hp = $this->input->post('no_hp');
        $alamat = $this->input->post('alamat');
        $akses = $this->input->post('akses');

        if ($this->form_validation->run() == false) {
            // Jika validasi gagal, kembalikan response error
            echo json_encode([
                'status' => 'error',
                'message' => 'Data tidak boleh kosong',
                'errors' => $this->form_validation->error_array()
            ]);
            return;
        } else {
            $data = [
                'username' => $username,
                'nama' => $nama,
                'password' => $password,
                'gender' => $gender,
                'no_hp' => $no_hp,
                'alamat' => $alamat,
                'akses' => $akses,
            ];

            $this->Usermodel->insert_user($data);
            // Kembalikan response success
            echo 'success';
            return;
        }
    }

    public function form_edit()
    {
        $this->load->model('Usermodel');
        $data['title'] = 'Edit Data User';
        $id = $this->input->post('id');
        $user = $this->Usermodel->get_user_by_id($id)->row();

        // Masukkan nilai kolom ke dalam variabel sesuai dengan tb_user
        $data['id_kolom'] = $user->id;
        $data['username'] = $user->username;
        $data['nama'] = $user->nama;
        $data['password'] = $user->password;
        $data['gender'] = $user->gender;
        $data['no_hp'] = $user->no_hp;
        $data['alamat'] = $user->alamat;
        $data['akses'] = $user->akses;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('kelolaUser/form_edit', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        // Password boleh kosong jika tidak ingin diubah
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('no_hp', 'No. HP', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('akses', 'Akses', 'required');

        $id = $this->input->post('id');
        $username = $this->input->post('username');
        $nama = $this->input->post('nama');
        $password = $this->input->post('password');
        $gender = $this->input->post('gender');
        $no_hp = $this->input->post('no_hp');
        $alamat = $this->input->post('alamat');
        $akses = $this->input->post('akses');

        if ($this->form_validation->run() == false) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Data tidak boleh kosong',
                'errors' => $this->form_validation->error_array()
            ]);
            return;
        } else {
            $data = [
                'username' => $username,
                'nama' => $nama,
                'gender' => $gender,
                'no_hp' => $no_hp,
                'alamat' => $alamat,
                'akses' => $akses,
            ];

            // Jika password diisi, update password
            if (!empty($password)) {
                $data['password'] = password_hash($password, PASSWORD_DEFAULT);
            }

            $this->Usermodel->update_data($id, $data);
            echo 'success';
            return;
        }
    }

    public function hapus_data($id)
    {
        $this->load->model('Usermodel');
        $this->Usermodel->hapus_data($id);
        // Redirect kembali ke halaman data sarpras setelah hapus
        redirect('kelolaUser');
    }
    
}