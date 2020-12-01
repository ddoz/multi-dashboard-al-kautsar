<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengelolaankelas extends CI_Controller {

    function __construct() {
        parent::__construct();
        isAuthenticated();
    }

	public function index()
	{
        $data['content'] = 'siswa/pengelolaan/kelas';
        $data['menu'] = 'pengelolaan';
        $data['script'] = 'siswa/pengelolaan/script/js_kelas';
        $data['app'] = getAppList();
		$this->load->view('partials/wrapper_siswa',$data);
    }
    
    public function datatableKelas(){
        $appid = $this->uri->segment(4);
        $this->load->library('datatables');
        $this->datatables->select('*');
        $this->datatables->from('kelas');
        $this->datatables->where('kelas.app_id',$appid);
        $this->datatables->add_column('action',function($row){
            return "<a class='text text-warning' href='".base_url()."siswa/pengelolaankelas/edit/".$row['id']."'><i class='fa fa-edit'></i></a>";
        });
        echo $this->datatables->generate();
	}



}
