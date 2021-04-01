<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengelolaankeuangan extends CI_Controller {

    function __construct() {
        parent::__construct();
        isAuthenticated();
    }

	public function index()
	{
        $data['content'] = 'siswa/pengelolaan/keuangan';
        $data['menu'] = 'pengelolaan';
        $data['script'] = 'siswa/pengelolaan/script/js_keuangan';
        $data['app'] = getAppList();
        $data['keuangan'] = $this->db->get('keuangan')->result();
        $ta = [];
        $siswa = [];
        foreach(getAppList() as $lit) {
            //get tahun akademik
            $this->db->select('tahun_akademik.*,app.app');
            $this->db->from('tahun_akademik');
            $this->db->join('app','app.id=tahun_akademik.app_id');
            $this->db->where('tahun_akademik.app_id',$lit->app_id);
            $getTa = $this->db->get();
            if($getTa->num_rows() > 0) {
                array_push($ta,$getTa->result());
            }

            $this->db->select('siswa.*,kelas.nama_kelas,siswa_kelas.status as status_kelas');
            $this->db->from('siswa');
            $this->db->join('siswa_kelas','siswa_kelas.siswa_id=siswa.id');
            $this->db->join('kelas','kelas.id=siswa_kelas.kelas_id');
            $this->db->where('siswa_kelas.status','1');
            $this->db->where('siswa_kelas.app_id',$lit->app_id);
            $getSiswa = $this->db->get();
            if($getSiswa->num_rows() > 0) {
                array_push($siswa,$getSiswa->result());
            }
        }
        
        $data['siswa'] = $siswa;
        $data['ta'] = $ta;
		$this->load->view('partials/wrapper_siswa',$data);
    }
    
    public function datatable(){
        $appid = $this->uri->segment(4);
        $num = 1;
        $this->load->library('datatables');
        $this->datatables->select('keuangan_siswa.*,siswa.nama,tahun_akademik.tahun_akademik,keuangan.jenis_keuangan');
        $this->datatables->from('keuangan_siswa');
        $this->datatables->join('keuangan','keuangan.id=keuangan_siswa.keuangan_id');
        $this->datatables->join('siswa','siswa.id=keuangan_siswa.siswa_id');
        $this->datatables->join('tahun_akademik','tahun_akademik.id=keuangan_siswa.tahun_akademik_id');
        $this->datatables->where('keuangan_siswa.app_id',$appid);
        $this->datatables->add_column('jumlah_bayar',function($row){
            return number_format($row['jumlah_bayar']);
        });
        $this->datatables->add_column('action',function($row){
            $button = "<button type='button' class='btn btn-danger btn-xs btnHapus' onclick='hapus(".$row['id'].",".$row['app_id'].")'><i class='fa fa-trash'></i></button>";
            return $button;
        });
        echo $this->datatables->generate();
    }
    
    public function simpan() {
        $dataInsert = array(
            "app_id" => $this->input->post("app_id",true),
            "tahun_akademik_id" => $this->input->post("tahun_akademik_id",true),
            "siswa_id" => $this->input->post("siswa_id",true),
            "keuangan_id" => $this->input->post("keuangan_id",true),
            "jumlah_bayar" => $this->input->post("jumlah_bayar",true),
            "tanggal_bayar" => date('Y-m-d')
        );
        $simpan = $this->db->insert("keuangan_siswa",$dataInsert);
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
