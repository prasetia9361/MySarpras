<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_model extends CI_Model {
  public function get_by_username($username) {
    return $this->db
                ->where('username', $username)
                ->limit(1)
                ->get('tb_user')
                ->row();
  }
}
