<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {
    
    public function get_all() {
        return $this->db->get('kategori')->result_array();
    }
    
    public function get_by_id($id) {
        return $this->db->get_where('kategori', ['id' => $id])->row_array();
    }
    
    public function get_by_slug($slug) {
        return $this->db->get_where('kategori', ['slug' => $slug])->row_array();
    }
    
    public function simpan($data) {
        return $this->db->insert('kategori', $data);
    }
    
    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('kategori', $data);
    }
    
    public function hapus($id) {
        $this->db->where('id', $id);
        return $this->db->delete('kategori');
    }
}
