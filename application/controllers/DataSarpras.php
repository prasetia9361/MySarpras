<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataSarpras extends CI_Controller
{

    public function __construct(){
        parent::__construct();
        $this->load->model('Sarprasmodel');
    }

    public function index()
    {
        $data['title'] = 'Data Sarpras';
        $data['sarpras'] = $this->Sarprasmodel->get_sarpras()->result();

        // Hardcode pilihan jenis_barang
        $data['jenis_barang_list'] = ['ruangan', 'alat'];

        // Default: kosongkan $barang
        $data['barang'] = '';

        // Jika ada POST jenis_barang, generate kode
        if ($this->input->post('jenis_barang')) {
            $data['barang'] = $this->Sarprasmodel->buat_kode($this->input->post('jenis_barang'));
            $data['selected_jenis_barang'] = $this->input->post('jenis_barang');
        } else {
            $data['selected_jenis_barang'] = '';
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('dataSarpras/dataSarpras', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $this->load->model('Sarprasmodel');
        $data['title'] = 'Tambah Sarpras';
        // Hardcode pilihan jenis_barang
        $data['jenis_barang_list'] = ['ruangan', 'alat'];

        // Default: kosongkan $barang
        $data['barang'] = '';

        // Jika ada POST jenis_barang, generate kode
        if ($this->input->post('jenis_barang')) {
            $data['barang'] = $this->Sarprasmodel->buat_kode($this->input->post('jenis_barang'));
            $data['selected_jenis_barang'] = $this->input->post('jenis_barang');
        } else {
            $data['selected_jenis_barang'] = '';
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('dataSarpras/tambah', $data);
        $this->load->view('templates/footer');
    }

    public function simpan(){
        $this->form_validation->set_rules('jenis_barang', 'Jenis Barang', 'required');
        $this->form_validation->set_rules('id_barang', 'ID Barang', 'required');
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');

        $jenis_barang = $this->input->post('jenis_barang');
        // if ($jenis_barang != '') {
        //     $barang = $this->Sarprasmodel->buat_kode($jenis_barang);
        // }
        
        $id_barang = $this->input->post('id_barang');
        $nama_barang = $this->input->post('nama_barang');

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
                'id_barang' => $id_barang,
                'nama_barang' => $nama_barang,
                'jenis_barang' => $jenis_barang,
                'status' => 0,
            ];

            $this->Sarprasmodel->insert_sarpras($data);
            // Kembalikan response success
            echo 'success';
            return;
        }
    }

    public function form_edit()
    {
        $this->load->model('Sarprasmodel');
        $data['title'] = 'Edit Sarpras';
        $id = $this->input->post('id');
        // Ambil data sarpras berdasarkan id
        $sarpras = $this->Sarprasmodel->get_sarpras_by_id($id)->row();

        // Masukkan nilai kolom ke dalam variabel
        $data['id_kolom'] = $sarpras->id;
        $data['jenis_barang'] = $sarpras->jenis_barang;
        $data['id_barang'] = $sarpras->id_barang;
        $data['nama_barang'] = $sarpras->nama_barang;

        // Hardcode pilihan jenis_barang
        $data['jenis_barang_list'] = ['ruangan', 'alat'];

        // Default: kosongkan $barang
        $data['barang'] = $data['id_barang'];

        // Jika ada POST jenis_barang, generate kode
        if ($this->input->post('jenis_barang')) {
            $data['barang'] = $this->Sarprasmodel->buat_kode($this->input->post('jenis_barang'));
            $data['selected_jenis_barang'] = $this->input->post('jenis_barang');
        } else {
            $data['selected_jenis_barang'] = $data['jenis_barang'];
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('dataSarpras/form_edit', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $this->form_validation->set_rules('jenis_barang', 'Jenis Barang', 'required');
        $this->form_validation->set_rules('id_barang', 'ID Barang', 'required');
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');

        $id = $this->input->post('id');
        $jenis_barang = $this->input->post('jenis_barang');
        // if ($jenis_barang != '') {
        //     $barang = $this->Sarprasmodel->buat_kode($jenis_barang);
        // }
        
        $id_barang = $this->input->post('id_barang');
        $nama_barang = $this->input->post('nama_barang');

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
                'id_barang' => $id_barang,
                'nama_barang' => $nama_barang,
                'jenis_barang' => $jenis_barang,
                'status' => 0,
            ];

            $this->Sarprasmodel->update_data($id, $data);
            // Kembalikan response success
            echo 'success';
            return;
        }

    }

    public function hapus_data($id)
    {
        $this->load->model('Sarprasmodel');
        $this->Sarprasmodel->hapus_data($id);
        // Redirect kembali ke halaman data sarpras setelah hapus
        redirect('dataSarpras');
    }

    // public function make_id(){
    //     $jenis_barang = $this->input->post('jenis_barang');
    //     if ($jenis_barang != '') {
    //         $barang = $this->Sarprasmodel->buat_kode($jenis_barang);
    //     }
        
    //     echo json_encode($data);
    // }
    
}