<?php

class Sarprasmodel extends CI_Model
{
    public function get_sarpras()
    {
        return $this->db->get('tb_sarpras');
    }

    public function get_nama_barang()
    {
        $this->db->select('nama_barang');
        $this->db->from('tb_sarpras');
        $this->db->where('status', 0);
        return $this->db->get();
    }

    public function get_id_barang($nama_barang)
    {
        $this->db->select('id_barang');
        $this->db->from('tb_sarpras');
        $this->db->where('nama_barang', $nama_barang);
        return $this->db->get();
    }

    public function insert_sarpras($data){
        $this->db->insert('tb_sarpras', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan</div>');
        redirect('sarpras');
    }

    public function update_status($id_barang, $status){
        $this->db->where('id_barang', $id_barang);
        $this->db->update('tb_sarpras', ['status' => $status]);
    }


}