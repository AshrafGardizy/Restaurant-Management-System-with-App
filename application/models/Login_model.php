<?php
/**
* Login Model
*/
class Login_model extends CI_Model
{
    public function login($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('admins');
        if (empty($query->num_rows())) {
            return false;
        }
        return $query->row();
    }
}