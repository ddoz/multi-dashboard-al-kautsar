<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengelolaangedung extends CI_Controller {

    function __construct() {
        parent::__construct();
        isAuthenticated();
        $this->load->model("Model_form");
    }

	public function index()
	{
        $data['content'] = 'dma/pengelolaan/gedung';
        $data['menu'] = 'pengelolaan';
        $data['script'] = 'dma/pengelolaan/script/js_gedung';
        $data['app'] = getAppList();
        
		$data['form'] = array(
			array(
			  "type" => "input",
			  "label" => "Nama Gedung",
			  "name" => "nama_gedung"
			),
		  );
		$this->load->view('partials/wrapper_dma',$data);
    }
    
    public function datatableGedung(){
        $this->load->library('datatables');
        $this->datatables->select('*');
        $this->datatables->from('dma_gedung');
        $this->datatables->add_column('action',function($row){
            if(isSuper()) {
                $button = "<button type='button' class='btn btn-warning btn-xs' onclick='edit(".json_encode($row).")'><i class='fa fa-edit'></i></button>";
                $button .= "<a href='".base_url()."dma/pengelolaangedung/ruangan/".$row['id']."' class='btn btn-info btn-xs'>Ruangan</a>";
                $button .= "<button type='button' class='btn btn-danger btn-xs btnHapus' onclick='hapus(".$row['id'].")'><i class='fa fa-trash'></i></button>";
                return $button;
            }
        });
        echo $this->datatables->generate();
	}

    public function datatableRuangan(){
        $id = $this->uri->segment(4);
        $this->load->library('datatables');
        $this->datatables->select('*');
        $this->datatables->from('dma_ruangan');
        $this->datatables->where('dma_ruangan.id_gedung',$id);
        $this->datatables->add_column('action',function($row){
            if(isSuper()) {
                $button = "<button type='button' class='btn btn-warning btn-xs' onclick='edit(".json_encode($row).")'><i class='fa fa-edit'></i></button>";
                $button .= "<button type='button' class='btn btn-danger btn-xs btnHapus' onclick='hapus(".$row['id'].")'><i class='fa fa-trash'></i></button>";
                return $button;
            }
        });
        echo $this->datatables->generate();
	}

    public function ruangan() {
        $idgedung = $this->uri->segment(4);
        $data['content'] = 'dma/pengelolaan/ruangan';
        $data['menu'] = 'pengelolaan';
        $data['script'] = 'dma/pengelolaan/script/js_ruangan';
        $data['gedung'] = $this->db->get_where('dma_gedung',array('id'=>$idgedung))->row();
		$data['form'] = array(
			array(
			  "type" => "input",
			  "label" => "Nama Ruangan",
			  "name" => "nama_ruangan"
			),
		  );
		$this->load->view('partials/wrapper_dma',$data);
    }

    public function simpan() {

        $insert = array(
            "nama_gedung" => $this->input->post("nama_gedung"),
            "created_at" => date("Y-m-d H:i:s")
        );

        $fileName = "";
        $message = "Data tersimpan";

        $this->db->trans_begin();

        $simpan = $this->db->insert("dma_gedung",$insert);

        if($this->db->trans_status()!==FALSE) {
            $this->db->trans_commit();
            echo json_encode(array("msg"=>$message));
            exit();
        }
        $this->db->trans_rollback();
        echo json_encode(array("msg"=>"Gagal Simpan Data"));
        exit();
    }

    public function simpanruangan() {

        $insert = array(
            "nama_ruangan" => $this->input->post("nama_ruangan"),
            "id_gedung" => $this->input->post("id_gedung")
        );

        $fileName = "";
        $message = "Data tersimpan";

        $this->db->trans_begin();

        $simpan = $this->db->insert("dma_ruangan",$insert);

        if($this->db->trans_status()!==FALSE) {
            $this->db->trans_commit();
            echo json_encode(array("msg"=>$message));
            exit();
        }
        $this->db->trans_rollback();
        echo json_encode(array("msg"=>"Gagal Simpan Data"));
        exit();
    }

    public function ubah() {
        $id = $this->input->post("id");
        $update = array(
            "nama_gedung" => $this->input->post("nama_gedung")
        );
        $message = "";
        
        $this->db->where("id",$id);
        $update = $this->db->update("dma_gedung",$update);
        if($update) {
            echo json_encode(array("msg"=>"Data berhasil diubah"));
            exit();
        }
        echo json_encode(array("msg"=>"Data gagal diubah"));
        exit();
    }

    public function ubahruangan() {
        $id = $this->input->post("id");
        $update = array(
            "nama_ruangan" => $this->input->post("nama_ruangan")
        );
        $message = "";
        
        $this->db->where("id",$id);
        $update = $this->db->update("dma_ruangan",$update);
        if($update) {
            echo json_encode(array("msg"=>"Data berhasil diubah"));
            exit();
        }
        echo json_encode(array("msg"=>"Data gagal diubah"));
        exit();
    }

    public function hapus() {
        //butuh helper untuk cek apakah ta digunakan atau tidak
        
        $this->db->trans_begin();

        $this->db->where("id",$this->input->post("id",true));
        $this->db->delete("dma_gedung");

        if($this->db->trans_status()!==FALSE) {
            $this->db->trans_commit();
            echo json_encode(array("msg"=>"ok"));
            exit();
        }else {
            $this->db->trans_rollback();
        }
        echo json_encode(array("msg"=>"no"));
        exit();
    }

    public function hapusruangan() {
        //butuh helper untuk cek apakah ta digunakan atau tidak
        
        $this->db->trans_begin();

        $this->db->where("id",$this->input->post("id",true));
        $this->db->delete("dma_ruangan");

        if($this->db->trans_status()!==FALSE) {
            $this->db->trans_commit();
            echo json_encode(array("msg"=>"ok"));
            exit();
        }else {
            $this->db->trans_rollback();
        }
        echo json_encode(array("msg"=>"no"));
        exit();
    }

}
