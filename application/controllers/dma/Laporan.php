<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    function __construct() {
        parent::__construct();
        isAuthenticated();
    }

    public function index() {
        $this->barang();
    }

	public function barang()
	{
        $data['content'] = 'dma/laporan/barang';
        $data['menu'] = 'laporan';
        $data['script'] = 'dma/laporan/script/js_barang';
        $appList = getAppList();
        $ta = [];
        $kelas = [];
        
		$this->load->view('partials/wrapper_dma',$data);
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
