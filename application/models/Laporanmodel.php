<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporanmodel extends CI_Model {

    public function get_laporan($mulai = null, $sampai = null) {
        if ($mulai && $sampai) {
            $this->db->where('tanggal >=', $mulai);
            $this->db->where('tanggal <=', $sampai);
        }
        return $this->db->get('tb_laporan')->result();
    }
}
