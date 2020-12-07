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
        $num = 1;
        $this->load->library('datatables');
        $this->datatables->select('*');
        $this->datatables->from('tahun_akademik');
        $this->datatables->where('tahun_akademik.app_id',$appid);
        $this->datatables->add_column('action',function($row){
            $button = "<button type='button' class='btn btn-warning btn-xs btnEdit' tahun-akademik='".$row['tahun_akademik']."' status='".$row['status']."' app-id='".$row['app_id']."'><i class='fa fa-edit'></i></button>|";
            $button .= "<button type='button' class='btn btn-danger btn-xs btnHapus' onclick='hapus(".$row['id'].",".$row['app_id'].")'><i class='fa fa-trash'></i></button>";
            return $button;
        });
        echo $this->datatables->generate();
    }
    
    public function simpan() {
        $dataInsert = array(
            "app_id" => $this->input->post("app_id",true),
            "tahun_akademik" => $this->input->post("tahun_akademik",true),
            "status" => $this->input->post("status",true)
        );
        $simpan = $this->db->insert("tahun_akademik",$dataInsert);
        if($simpan) {
            echo json_encode(array("msg"=>"ok"));
            exit();
        }
        echo json_encode(array("msg"=>"no"));
        exit();
    }

    public function hapus() {
        //butuh helper untuk cek apakah ta digunakan atau tidak
        $this->db->where("id",$this->input->post("id",true));
        $hapus = $this->db->delete("tahun_akademik");
        if($hapus) {
            echo json_encode(array("msg"=>"ok"));
            exit();
        }
        echo json_encode(array("msg"=>"no"));
        exit();
    }


}
