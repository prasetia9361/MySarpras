<?php

class Usermodel extends CI_Model
{
    public function get_user()
    {
        return $this->db->get('tb_user');
    }
}