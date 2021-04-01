<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct() {
        parent::__construct();
        isAuthenticated();
    }

	public function index()
	{
        $data['content'] = 'staff/home/dashboard';
        $data['menu'] = 'home';
        $data['script'] = 'staff/home/script/js_dashboard';
        $appList = getAppList();;
		$this->load->view('partials/wrapper_staff',$data);
	}

    public function cari() {
        $key = $this->input->get('key');
        $data['content'] = 'staff/home/dashboard_cari';
        $data['menu'] = 'home';
        $data['script'] = 'staff/home/script/js_dashboard';
        $this->db->select('staff_data.*');
        $this->db->from('staff_data');
        $this->db->like('nama', $key);
        $qdata = $this->db->get()->result();
        $data['staff'] = $qdata;
        $this->load->view('partials/wrapper_staff',$data);
    }

    public function detail() {
        $key = $this->uri->segment(4);
        $data['content'] = 'staff/home/dashboard_detail';
        $data['menu'] = 'home';
        $data['script'] = 'staff/home/script/js_dashboard';
        $this->db->select('staff_data.*');
        $this->db->from('staff_data');
        $this->db->where('staff_data.id', $key);
        $qdata = $this->db->get()->row();
        $data['staff'] = $qdata;
        $this->load->view('partials/wrapper_staff',$data);
    }

}
