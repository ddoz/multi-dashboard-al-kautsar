<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

	public function index()
	{
        if($this->session->userdata('is_login')) {
            redirect(base_url().'welcome/app');
        }
		$data['content'] = 'welcome_message';
		$this->load->view('login');
    }
    
    public function auth() {
        $this->load->model('Model_Auth');
        $user = $this->input->post('username');
        $pass = $this->input->post('password');
        if($this->Model_Auth->getLogin($user,$pass)) {
            $nama = $this->session->userdata('nama');
            response('Selamat datang, '.$nama);
        }
        response('Silahkan periksa username dan password anda','NO');
    }
}
