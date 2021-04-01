<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelolakelas extends CI_Controller {

    function __construct() {
        parent::__construct();
        isAuthenticated();
        $this->load->model("Model_form");
    }

	public function index()
	{   
        $data = array(
            'script' => 'siswa/pengelolaan/script/js_kelas',
            'app' => getAppList(),
            'content' => 'siswa/pengelolaan/kelas_index',
            'breadcumb' => buildBreadcumb(array('App','SIMSIAK','Pengelolaan Siswa','Kelas'))
        );
        buildPage($data);
    }
    
    
    public function datatableKelas(){
        $appid = $this->uri->segment(4);
        $this->load->library('datatables');
        $this->datatables->select('*');
        $this->datatables->from('kelas');
        $this->datatables->where('kelas.app_id',$appid);
        $this->datatables->add_column('action',function($row){
            $button = "<button type='button' class='btn btn-warning btn-sm' onclick='edit(".json_encode($row).")'>ubah</button>";
            $button .= "<a href='".base_url()."siswa/kelolakelas/siswa/".$row['id']."' class='btn btn-info btn-sm'>siswa</a>";
            $button .= "<button type='button' class='btn btn-danger btn-sm btnHapus' onclick='hapus(".$row['id'].",".$row['app_id'].")'>hapus</button>";
            return $button;
        });
        echo $this->datatables->generate();
	}

    public function siswa() {
        $id = $this->uri->segment(4);
        $appList = getAppList();
        $ta = [];
        foreach($appList as $lit) {
            //get tahun akademik
            $this->db->select('tahun_akademik.*,app.app');
            $this->db->from('tahun_akademik');
            $this->db->join('app','app.id=tahun_akademik.app_id');
            $this->db->where('tahun_akademik.app_id',$lit->app_id);
            $getTa = $this->db->get();
            if($getTa->num_rows() > 0) {
                array_push($ta,$getTa->result());
            }
        }

        $kelas = $this->db->get_where('kelas',array('id'=>$id))->row();

        $data = array(
            'kelas' => $kelas,
            'ta' => $ta,
            'script' => 'siswa/pengelolaan/script/js_kelas',
            'app' => getAppList(),
            'content' => 'siswa/pengelolaan/kelas_siswa',
            'breadcumb' => buildBreadcumb(array('App','SIMSIAK','Pengelolaan Siswa','Kelas','Siswa'))
        );
        buildPage($data);
    }

    public function datatableSiswaKelasId() {
        $appid = $this->uri->segment(4);
        $this->load->library('datatables');
        $this->datatables->select('siswa.*,siswa_kelas.id as siswa_kelas_id,siswa_kelas.status,kelas.nama_kelas,siswa_app.app_id');
        $this->datatables->from('siswa');
        $this->datatables->join('siswa_app','siswa_app.siswa_id=siswa.id');
        $this->datatables->join('siswa_kelas','siswa_kelas.siswa_id=siswa.id');
        $this->datatables->join('kelas','kelas.id=siswa_kelas.kelas_id');
        $this->datatables->where('kelas.id',$appid);
        $this->datatables->add_column('status',function($row){
            $st = "Tidak Aktif";
            if($row['status']) {
                $st = 'Aktif';
            }
            return $st;
        });
        $this->datatables->add_column('action',function($row){
            $button = "<button type='button' class='btn btn-danger btn-xs btnHapus' onclick='hapusSiswaKelas(".$row['id'].",".$row['app_id'].")'>hapus</button>";
            return $button;
        });
        echo $this->datatables->generate();
    }


    public function simpan() {
        $dataInsert = array(
            "app_id" => $this->input->post("app_id",true),
            "nama_kelas" => $this->input->post("nama_kelas",true)
        );
        $simpan = $this->db->insert("kelas",$dataInsert);
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
            "nama_kelas" => $this->input->post("nama_kelas")
        );
        $this->db->where("id",$id);
        $update = $this->db->update("kelas",$update);
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
        $hapus = $this->db->delete("kelas");
        if($hapus) {
            echo json_encode(array("msg"=>"ok"));
            exit();
        }
        echo json_encode(array("msg"=>"no"));
        exit();
    }

    public function hapussiswakelas() {
        //butuh helper untuk cek apakah ta digunakan atau tidak
        $this->db->where("siswa_id",$this->input->post("id",true));
        $hapus = $this->db->delete("siswa_app");

        $this->db->where("siswa_id",$this->input->post("id",true));
        $hapus = $this->db->delete("siswa_kelas");
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
        $data = $this->db->get_where('kelas',array('app_id'=>$id))->result();
        if(!empty($data)) {
            $output = $data;
        }
        echo json_encode($output);
        exit();
    }

}
