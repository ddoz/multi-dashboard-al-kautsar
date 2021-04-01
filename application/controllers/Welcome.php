<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct() {
		parent::__construct();
		isAuthenticated();
	}

	public function index()
	{
		redirect(base_url().'login');
	}

	public function app() {
		$this->load->view('app');
		// $data = array(
		// 	'content' => 'dashboard',
		// 	'breadcumb' => buildBreadcumb(array('App','Dashboard'))
		// );
		// buildPage($data);
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
