<?php

class Sarprasmodel extends CI_Model
{
    public function get_sarpras()
    {
        return $this->db->get('tb_sarpras');
    }

    public function get_id_barang()
    {
        $this->db->select('tb_sarpras.id_barang');
        $this->db->from('tb_sarpras as s');
        $this->db->where('s.aksi', 0);
        return $this->db->get();
    }

    public function insert_sarpras($data){
        $this->db->insert('tb_sarpras', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan</div>');
        redirect('sarpras');
    }


}