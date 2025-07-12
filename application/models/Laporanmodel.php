<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporanmodel extends CI_Model {

    public function get_laporan($table) 
    {
        return $this->db->get($table);
    }
}
