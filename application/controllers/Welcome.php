<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct() {
		parent::__construct();
		isAuthenticated();
	}

	public function index()
	{
		$data['content'] = 'welcome_message';
		$this->load->view('partials/wrapper',$data);
	}

	public function app() {
		$this->load->view('app');
	}
}
