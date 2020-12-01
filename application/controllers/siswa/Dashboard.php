<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct() {
        parent::__construct();
        isAuthenticated();
    }

	public function index()
	{
        $data['content'] = 'siswa/home/dashboard';
        $data['menu'] = 'home';
        $data['script'] = 'siswa/home/script/js_dashboard';
		$this->load->view('partials/wrapper_siswa',$data);
	}



}
