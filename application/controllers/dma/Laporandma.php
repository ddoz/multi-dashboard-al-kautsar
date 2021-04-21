<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporandma extends CI_Controller {

    function __construct() {
        parent::__construct();
        isAuthenticated();
    }

    public function index() {
        $this->laporan();
    }

	public function laporan()
	{
        $data['content'] = 'dma/laporan/laporan_index';
        $data['menu'] = 'laporan';
        $data['script'] = 'dma/laporan/script/js_laporan_index';
        $appList = getAppList();
		$data['breadcumb'] = buildBreadcumb(array('App','SIDMA','Laporan'));
          // $this->load->view('partials/wrapper_dma',$data);
        buildPage($data);
    }

    public function perbaikan()
	{
        $data['content'] = 'dma/laporan/perbaikan';
        $data['menu'] = 'laporan';
        $data['script'] = 'dma/laporan/script/js_perbaikan';
        $appList = getAppList();
        $ta = [];
        $kelas = [];
        
		$this->load->view('partials/wrapper_dma',$data);
    }
    
}
