<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengelolaanperbaikan extends CI_Controller {

    function __construct() {
        parent::__construct();
        isAuthenticated();
        $this->load->model("Model_form");
    }

	public function index()
	{
        $data['content'] = 'dma/pengelolaan/perbaikan';
        $data['menu'] = 'pengelolaan';
        $data['script'] = 'dma/pengelolaan/script/js_perbaikan';
        $data['app'] = getAppList();
        
		$data['form'] = array(
			array(
			  "type" => "input",
			  "label" => "Nama Layanan",
			  "name" => "nama_layanan"
			),
		  );
		$this->load->view('partials/wrapper_dma',$data);
    }
    
    public function datatable(){
        $appid = $this->uri->segment(4);
        $this->load->library('datatables');
        $this->datatables->select('*');
        $this->datatables->from('dma_pelaporan');
        $this->datatables->add_column('action',function($row){
            $button = "<button type='button' class='btn btn-warning btn-xs' onclick='edit(".json_encode($row).")'><i class='fa fa-edit'></i></button>|";
            $button .= "<a class='btn btn-info btn-xs' href='".base_url()."dma/pengelolaanperbaikan/detail/".$row['id']."'><i class='fa fa-search'></i></a>|";
            $button .= "<button type='button' class='btn btn-danger btn-xs' onclick='hapus(".$row['id'].")'><i class='fa fa-trash'></i></button>";
            return $button;
        });
        echo $this->datatables->generate();
    }
    
    public function detail() {
        $id = $this->uri->segment(4);
        if(!intval($id)) {
            redirect(base_url().'dma/pengelolaanperbaikan');
        }
        $header = $this->db->get_where('dma_pelaporan', array("id"=>$id))->row();
        $data['content'] = 'dma/pengelolaan/perbaikan_detail';
        $data['menu'] = 'pengelolaan';
        $data['script'] = 'dma/pengelolaan/script/js_perbaikan';
        $data['app'] = getAppList();   
        $this->load->view('partials/wrapper_dma',$data);
    }

    public function simpan() {

        $insert = array(
            "nama_layanan" => $this->input->post("nama_layanan"),
            "created_at" => date("Y-m-d H:i:s")
        );

        $fileName = "";
        $message = "Data tersimpan";

        $this->db->trans_begin();

        $simpan = $this->db->insert("dma_layanan",$insert);

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
            "nama_layanan" => $this->input->post("nama_layanan")
        );
        $message = "";
        
        $this->db->where("id",$id);
        $update = $this->db->update("dma_layanan",$update);
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
        $this->db->delete("dma_layanan");

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
