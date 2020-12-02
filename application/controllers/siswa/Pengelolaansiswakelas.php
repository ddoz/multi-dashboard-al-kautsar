<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengelolaansiswakelas extends CI_Controller {

    function __construct() {
        parent::__construct();
        isAuthenticated();
    }

	public function index()
	{
        $data['content'] = 'siswa/pengelolaan/siswakelas';
        $data['menu'] = 'pengelolaan';
        $data['script'] = 'siswa/pengelolaan/script/js_siswakelas';
        $data['app'] = getAppList();
		$this->load->view('partials/wrapper_siswa',$data);
    }
    
    public function datatableSiswaKelas(){
        $appid = $this->uri->segment(4);
        $this->load->library('datatables');
        $this->datatables->select('siswa.*,siswa_kelas.status,kelas.nama_kelas');
        $this->datatables->from('siswa');
        $this->datatables->join('siswa_app','siswa_app.siswa_id=siswa.id');
        $this->datatables->join('siswa_kelas','siswa_kelas.siswa_id=siswa.id');
        $this->datatables->join('kelas','kelas.id=siswa_kelas.kelas_id');
        $this->datatables->where('siswa_app.app_id',$appid);
        $this->datatables->add_column('action',function($row){
            return "<a class='text text-warning' href='".base_url()."siswa/pengelolaansiswa/edit/".$row['id']."'><i class='fa fa-edit'></i></a>";
        });
        echo $this->datatables->generate();
	}



}