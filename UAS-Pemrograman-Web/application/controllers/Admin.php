<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct() {
        parent::__construct();
        
        // Check if user is logged in
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('error', 'Silakan login terlebih dahulu!');
            redirect('auth/login');
        }
        
        $this->load->model('Artikel_model');
        $this->load->model('Kategori_model');
    }

    private function render($view, $data = []) {
        $this->load->view('layout/admin_header', $data);
        $this->load->view($view, $data);
        $this->load->view('layout/admin_footer', $data);
    }

    public function index() {
        $data['page_title'] = 'Dashboard';
        $data['user'] = $this->session->userdata();
        $data['artikel'] = $this->Artikel_model->get_semua();
        $data['total_artikel'] = count($data['artikel']);
        $data['total_views'] = array_sum(array_column($data['artikel'], 'views'));
        
        $this->render('admin/dashboard', $data);
    }

    public function tambah() {
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('konten', 'Konten', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required|in_list[draft,published]');

        if ($this->form_validation->run() === FALSE) {
            $data['page_title'] = 'Tambah Artikel';
            $data['kategori'] = $this->Kategori_model->get_all();
            $this->render('admin/tambah_artikel', $data);
        } else {
            $data = [
                'judul' => $this->input->post('judul'),
                'slug'  => url_title($this->input->post('judul'), 'dash', TRUE) . '-' . time(), // unique slug
                'konten'=> $this->input->post('konten'),
                'penulis' => $this->session->userdata('nama_lengkap'),
                'status' => $this->input->post('status')
            ];
            $artikel_id = $this->Artikel_model->simpan($data);
            
            // Simpan kategori artikel
            $kategori_ids = $this->input->post('kategori_id');
            if ($kategori_ids) {
                $this->Artikel_model->simpan_kategori($artikel_id, $kategori_ids);
            }
            
            $this->session->set_flashdata('success', 'Artikel berhasil ditambahkan!');
            redirect('admin');
        }
    }
    
    public function edit($id) {
        $data['artikel'] = $this->Artikel_model->get_by_id($id);
        
        if (!$data['artikel']) {
            show_404();
        }

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('konten', 'Konten', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required|in_list[draft,published]');
        
        if ($this->form_validation->run() === FALSE) {
            $data['page_title'] = 'Edit Artikel';
            $data['kategori'] = $this->Kategori_model->get_all();
            $data['artikel_kategori'] = $this->Artikel_model->get_kategori($id); // Returns [id1, id2]
            
            $this->render('admin/edit_artikel', $data);
        } else {
            $update_data = [
                'judul' => $this->input->post('judul'),
                'slug'  => url_title($this->input->post('judul'), 'dash', TRUE), // Update slug? Risk of breaking links but maybe desired.
                'konten'=> $this->input->post('konten'),
                'status'=> $this->input->post('status'),
                'tanggal_diupdate' => date('Y-m-d H:i:s')
            ];
            
            $this->Artikel_model->update($id, $update_data);
            
            // Update kategori (delete old, insert new)
            $this->Artikel_model->hapus_kategori($id);
            $kategori_ids = $this->input->post('kategori_id');
            if ($kategori_ids) {
                $this->Artikel_model->simpan_kategori($id, $kategori_ids);
            }
            
            $this->session->set_flashdata('success', 'Artikel berhasil diperbarui!');
            redirect('admin');
        }
    }

    public function hapus($id) {
        $this->Artikel_model->hapus($id);
        $this->session->set_flashdata('success', 'Artikel berhasil dihapus!');
        redirect('admin');
    }
    
    public function kategori() {
        $this->form_validation->set_rules('nama', 'Nama Kategori', 'required');
        
        if ($this->form_validation->run() === FALSE) {
            $data['page_title'] = 'Kelola Kategori';
            $data['user'] = $this->session->userdata();
            $data['kategori'] = $this->Kategori_model->get_all();
            $this->render('admin/kategori', $data);
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'slug' => url_title($this->input->post('nama'), 'dash', TRUE),
                'deskripsi' => $this->input->post('deskripsi')
            ];
            $this->Kategori_model->simpan($data);
            $this->session->set_flashdata('success', 'Kategori berhasil ditambahkan!');
            redirect('admin/kategori');
        }
    }
    
    public function hapus_kategori($id) {
        $this->Kategori_model->hapus($id);
        $this->session->set_flashdata('success', 'Kategori berhasil dihapus!');
        redirect('admin/kategori');
    }
}
