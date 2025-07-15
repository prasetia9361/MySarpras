<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accmodel extends CI_Model {

    public function get_pengajuan() {
        $this->db->select('acc.*, acc.id as id_pengajuan, s.nama_barang, s.id_barang as id_barang_sarpras');
        $this->db->from('tb_pengajuan as acc');
        $this->db->join('tb_sarpras as s', 's.id_barang=acc.id_barang');
        return $this->db->get();
    }

    public function update_aksi($id, $aksi)
    {
        $this->db->where('id', $id); // pastikan kolom primary key benar, misal 'id' atau 'id_pengajuan'
        $this->db->update('tb_pengajuan', ['aksi' => $aksi]);
    }

    public function hapus_pengajuan($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_pengajuan');
    }

    public function get_laporan($mulai = null, $sampai = null) {
        $this->db->select('*');
        $this->db->from('tb_pengajuan as p');
        $this->db->join('tb_sarpras as s', 's.id_barang=p.id_barang');
        if ($mulai && $sampai) {
            $this->db->where('tanggal >=', $mulai);
            $this->db->where('tanggal <=', $sampai);
        }
        $this->db->where('aksi <=', 1);
        return $this->db->get();
    }


    public function insert_pengajuan($data)
    {
        $this->db->insert('tb_pengajuan', $data);
    }
}