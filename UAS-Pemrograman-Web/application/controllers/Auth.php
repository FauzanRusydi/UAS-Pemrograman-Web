<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
    }
    
    public function login() {
        // Jika sudah login, redirect ke admin
        if ($this->session->userdata('logged_in')) {
            redirect('admin');
        }
        
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            
            $user = $this->User_model->login($username, $password);
            
            if ($user) {
                $session_data = [
                    'user_id' => $user['id'],
                    'username' => $user['username'],
                    'nama_lengkap' => $user['nama_lengkap'],
                    'logged_in' => TRUE
                ];
                $this->session->set_userdata($session_data);
                
                $this->session->set_flashdata('success', 'Selamat datang, ' . $user['nama_lengkap'] . '!');
                redirect('admin');
            } else {
                $this->session->set_flashdata('error', 'Username atau password salah!');
                redirect('auth/login');
            }
        }
    }
    
    public function logout() {
        $this->session->unset_userdata(['user_id', 'username', 'nama_lengkap', 'logged_in']);
        $this->session->set_flashdata('success', 'Anda telah logout.');
        redirect('auth/login');
    }
}
