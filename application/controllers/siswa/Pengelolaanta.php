<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengelolaanta extends CI_Controller {

    function __construct() {
        parent::__construct();
        isAuthenticated();
    }

	public function index()
	{
        $data['content'] = 'siswa/pengelolaan/ta';
        $data['menu'] = 'pengelolaan';
        $data['script'] = 'siswa/pengelolaan/script/js_ta';
        $data['app'] = getAppList();
		$this->load->view('partials/wrapper_siswa',$data);
    }
    
    public function datatableTa(){
        $appid = $this->uri->segment(4);
        $this->load->library('datatables');
        $this->datatables->select('*');
        $this->datatables->from('tahun_akademik');
        $this->datatables->where('tahun_akademik.app_id',$appid);
        $this->datatables->add_column('action',function($row){
            return "<a class='text text-warning' href='".base_url()."siswa/pengelolaanta/edit/".$row['id']."'><i class='fa fa-edit'></i></a>";
        });
        echo $this->datatables->generate();
	}



}
