<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Artikel_model');
		$this->load->model('Kategori_model');
		$this->load->helper('text');
	}

	public function index()
	{
		$data['page_title'] = 'Home';
		$data['artikel'] = $this->Artikel_model->get_published(10);
		$data['kategori'] = $this->Kategori_model->get_all();
		
		$this->load->view('layout/header', $data);
		$this->load->view('home', $data);
		$this->load->view('layout/footer', $data);
	}
	
	public function artikel($slug)
	{
		$data['artikel'] = $this->Artikel_model->get_by_slug($slug);
		if (!$data['artikel']) {
			show_404();
		}
		$data['page_title'] = $data['artikel']['judul'];
		$data['kategori'] = $this->Kategori_model->get_all();
		
		$this->load->view('layout/header', $data);
		$this->load->view('artikel_detail', $data);
		$this->load->view('layout/footer', $data);
	}
	
	public function kategori($slug)
	{
		$kategori = $this->Kategori_model->get_by_slug($slug);
		if (!$kategori) {
			show_404();
		}
		
		// Get artikel by kategori
		$this->db->select('artikel.*');
		$this->db->from('artikel');
		$this->db->join('artikel_kategori', 'artikel.id = artikel_kategori.artikel_id');
		$this->db->where('artikel_kategori.kategori_id', $kategori['id']);
		$this->db->where('artikel.status', 'published');
		$this->db->order_by('artikel.tanggal_dibuat', 'DESC');
		
		$data['kategori_info'] = $kategori;
		$data['artikel'] = $this->db->get()->result_array();
		$data['kategori'] = $this->Kategori_model->get_all();
		$data['page_title'] = 'Kategori: ' . $kategori['nama'];
		
		$this->load->view('layout/header', $data);
		$this->load->view('kategori_view', $data);
		$this->load->view('layout/footer', $data);
	}
	
	public function search()
	{
		$keyword = $this->input->get('q');
		$data['keyword'] = $keyword;
		$data['artikel'] = $this->Artikel_model->search($keyword);
		$data['kategori'] = $this->Kategori_model->get_all();
		$data['page_title'] = 'Cari: ' . $keyword;
		
		$this->load->view('layout/header', $data);
		$this->load->view('search_results', $data);
		$this->load->view('layout/footer', $data);
	}
}
