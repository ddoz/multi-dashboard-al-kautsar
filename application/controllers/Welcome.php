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
	}
}
