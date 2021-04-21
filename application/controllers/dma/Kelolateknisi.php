<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelolateknisi extends CI_Controller {

    function __construct() {
        parent::__construct();
        isAuthenticated();
        $this->load->model("Model_form");
    }

	public function index()
	{
        $data['content'] = 'dma/pengelolaan/teknisi_index';
        $data['menu'] = 'pengelolaan';
        $data['script'] = 'dma/pengelolaan/script/js_teknisi_index';
        $data['app'] = getAppList();
        
		$data['form'] = array(
			array(
			  "type" => "input",
			  "label" => "Nama Teknisi",
			  "name" => "nama_teknisi"
			),
		  );
          $data['breadcumb'] = buildBreadcumb(array('App','SIDMA','Pengelolaan Teknisi'));
          // $this->load->view('partials/wrapper_dma',$data);
          buildPage($data);
    }
    
    public function datatable(){
        $appid = $this->uri->segment(4);
        $this->load->library('datatables');
        $this->datatables->select('*');
        $this->datatables->from('dma_teknisi');
        $this->datatables->add_column('action',function($row){
            if(isSuper()) {
                $button = "<button type='button' class='btn btn-warning btn-sm' onclick='edit(".json_encode($row).")'><i class='fa fa-edit'></i></button>";
                $button .= "<button type='button' class='btn btn-danger btn-sm btnHapus' onclick='hapus(".$row['id'].")'><i class='fa fa-trash'></i></button>";
                return $button;
            }
        });
        echo $this->datatables->generate();
	}

    public function simpan() {

        $insert = array(
            "nama_teknisi" => $this->input->post("nama_teknisi")
        );

        $fileName = "";
        $message = "Data tersimpan";

        $this->db->trans_begin();

        $simpan = $this->db->insert("dma_teknisi",$insert);

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
            "nama_teknisi" => $this->input->post("nama_teknisi")
        );
        $message = "";
        
        $this->db->where("id",$id);
        $update = $this->db->update("dma_teknisi",$update);
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
        $this->db->delete("dma_teknisi");

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
