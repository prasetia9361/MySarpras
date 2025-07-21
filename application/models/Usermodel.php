<?php

class Usermodel extends CI_Model
{
    public function get_user()
    {
        return $this->db->get('tb_user');
    }

    public function get_by_username($username) {
        return $this->db
                    ->where('username', $username)
                    ->limit(1)
                    ->get('tb_user')
                    ->row();
    }

    public function get_user_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('tb_user');
    }

    public function insert_user($data){
        $this->db->insert('tb_user', $data);
    }

    public function update_data($id, $data)
    {
        $this->db->where('id', $id); // pastikan kolom primary key benar, misal 'id' atau 'id_pengajuan'
        $this->db->update('tb_user', $data);
    }

    public function hapus_data($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_user');
    }

}