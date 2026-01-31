<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    
    public function login($username, $password) {
        $this->db->where('username', $username);
        $user = $this->db->get('users')->row_array();
        
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
    
    public function get_by_id($id) {
        return $this->db->get_where('users', ['id' => $id])->row_array();
    }
    
    public function register($data) {
        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        return $this->db->insert('users', $data);
    }
    
    public function update($id, $data) {
        if (isset($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        }
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }
}
