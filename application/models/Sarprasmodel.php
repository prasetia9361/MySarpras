<?php

class Sarprasmodel extends CI_Model
{
    public function get_sarpras()
    {
        return $this->db->get('tb_sarpras');
    }

    // Tambahkan fungsi untuk mendapatkan data sarpras berdasarkan $id
    public function get_sarpras_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('tb_sarpras');
    }

    public function buat_kode($jenis_barang){
        // Tentukan prefix dan panjang prefix
        if (strtolower($jenis_barang) == 'ruangan') {
            $prefix = "RKB-";
        } elseif (strtolower($jenis_barang) == 'alat') {
            $prefix = "ALT-";
        } else {
            $prefix = "BRG-";
        }
        $prefix_length = strlen($prefix);

        $this->db->select('RIGHT(tb_sarpras.id_barang,4) as kode', FALSE);
        $this->db->where('LEFT(tb_sarpras.id_barang, '.$prefix_length.') = "'.$prefix.'"', null, false);
        $this->db->order_by('tb_sarpras.id_barang','DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_sarpras');
        if($query->num_rows() <> 0){
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        }
        else {
            $kode = 1;
        }
        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);

        $kodejadi = $prefix . $kodemax;
        return $kodejadi;
    }

    public function update_data($id, $data)
    {
        $this->db->where('id', $id); // pastikan kolom primary key benar, misal 'id' atau 'id_pengajuan'
        $this->db->update('tb_sarpras', $data);
    }

    public function get_jenis_barang(){
        $this->db->select('jenis_barang');
        $this->db->from('tb_sarpras');
        return $this->db->get();
    }

    public function get_nama_barang($status)
    {
        $this->db->select('nama_barang');
        $this->db->from('tb_sarpras');
        $this->db->where('status', $status);
        return $this->db->get();
    }

    public function get_nama_barang_kembali()
    {
        $this->db->select('nama_barang');
        $this->db->from('tb_sarpras');
        $this->db->where('status', 1);
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
        // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan</div>');
        // redirect('sarpras');
    }

    public function update_status($id_barang, $status){
        $this->db->where('id_barang', $id_barang);
        $this->db->update('tb_sarpras', ['status' => $status]);
    }

    public function hapus_data($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_sarpras');
    }


}