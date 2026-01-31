<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel_model extends CI_Model {
    
    public function get_semua($limit = null, $offset = 0) {
        $this->db->select('artikel.*');
        $this->db->from('artikel');
        $this->db->order_by('tanggal_dibuat', 'DESC');
        if ($limit) {
            $this->db->limit($limit, $offset);
        }
        return $this->db->get()->result_array();
    }
    
    public function get_published($limit = null, $offset = 0) {
        $this->db->select('artikel.*');
        $this->db->from('artikel');
        $this->db->where('status', 'published');
        $this->db->order_by('tanggal_dibuat', 'DESC');
        if ($limit) {
            $this->db->limit($limit, $offset);
        }
        return $this->db->get()->result_array();
    }

    public function get_by_id($id) {
        return $this->db->get_where('artikel', ['id' => $id])->row_array();
    }
    
    public function get_by_slug($slug) {
        $artikel = $this->db->get_where('artikel', ['slug' => $slug])->row_array();
        if ($artikel) {
            // Increment views
            $this->db->where('id', $artikel['id']);
            $this->db->set('views', 'views+1', FALSE);
            $this->db->update('artikel');
        }
        return $artikel;
    }

    public function simpan($data) {
        $this->db->insert('artikel', $data);
        return $this->db->insert_id();
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('artikel', $data);
    }

    public function hapus($id) {
        $this->db->where('id', $id);
        return $this->db->delete('artikel');
    }
    
    public function get_kategori($artikel_id) {
        $this->db->select('kategori_id');
        $this->db->from('artikel_kategori');
        $this->db->where('artikel_id', $artikel_id);
        $result = $this->db->get()->result_array();
        return array_column($result, 'kategori_id');
    }
    
    public function simpan_kategori($artikel_id, $kategori_ids) {
        foreach ($kategori_ids as $kategori_id) {
            $this->db->insert('artikel_kategori', [
                'artikel_id' => $artikel_id,
                'kategori_id' => $kategori_id
            ]);
        }
    }
    
    public function hapus_kategori($artikel_id) {
        $this->db->where('artikel_id', $artikel_id);
        return $this->db->delete('artikel_kategori');
    }
    
    public function count_all() {
        return $this->db->count_all('artikel');
    }
    
    public function count_published() {
        return $this->db->where('status', 'published')->count_all_results('artikel');
    }
    
    public function search($keyword) {
        $this->db->like('judul', $keyword);
        $this->db->or_like('konten', $keyword);
        $this->db->where('status', 'published');
        return $this->db->get('artikel')->result_array();
    }
}
