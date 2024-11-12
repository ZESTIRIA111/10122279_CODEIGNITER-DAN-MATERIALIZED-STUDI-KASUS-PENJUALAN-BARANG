// Login.php
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index() {
        if ($this->session->userdata('is_logged_in')) {
            redirect('product'); 
        }
        $this->load->view('login');
    }

    public function authenticate() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if ($username === 'admin' && $password === 'password') {
            $this->session->set_userdata('is_logged_in', TRUE);
            $this->session->set_userdata('username', $username);
            redirect('product'); 
        } else {
            $this->session->set_flashdata('error', 'Username atau Password salah');
            redirect('login');  
        }
    }

    public function logout() {
        $this->session->sess_destroy();  
        redirect('login');
    }
}