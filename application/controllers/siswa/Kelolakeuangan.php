<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelolakeuangan extends CI_Controller {

    function __construct() {
        parent::__construct();
        isAuthenticated();
        $this->load->model("Model_form");
    }

	public function index()
	{   
        $data = array(
            'script' => 'siswa/pengelolaan/script/js_keuangan',
            'app' => getAppList(),
            'content' => 'siswa/pengelolaan/keuangan_index',
            'breadcumb' => buildBreadcumb(array('App','SIMSIAK','Pengelolaan Siswa'))
        );
        buildPage($data);
    }
    
    public function datatable(){
        $appid = $this->uri->segment(4);
        $num = 1;
        $this->load->library('datatables');
        $this->datatables->select('*');
        $this->datatables->from('keuangan_siswa');
        $this->datatables->where('tahun_akademik.app_id',$appid);
        $this->datatables->add_column('status',function($row){
            $st = "Tidak Aktif";
            if($row['status']) {
                $st = "Aktif";
            }
            return $st;
        });
        $this->datatables->add_column('action',function($row){
            $button = "<button type='button' class='btn btn-warning btn-xs' onclick='edit(".json_encode($row).")'>ubah</button>";
            $button .= "<button type='button' class='btn btn-danger btn-xs btnHapus' onclick='hapus(".$row['id'].",".$row['app_id'].")'>hapus</button>";
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

    public function ubah() {
        $id = $this->input->post("id");
        $update = array(
            "tahun_akademik" => $this->input->post("tahun_akademik"),
            "status" => $this->input->post('status')
        );
        $this->db->where("id",$id);
        $update = $this->db->update("tahun_akademik",$update);
        if($update) {
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

    public function optiondata() {
        $output = array();
        $id = $this->input->post('id');
        $data = $this->db->get_where('tahun_akademik',array('app_id'=>$id))->result();
        if(!empty($data)) {
            $output = $data;
        }
        echo json_encode($output);
        exit();
    }

}
