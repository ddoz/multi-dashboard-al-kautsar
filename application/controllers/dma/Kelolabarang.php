<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelolabarang extends CI_Controller {

    function __construct() {
        parent::__construct();
        isAuthenticated();
        $this->load->model("Model_form");
    }

	public function index()
	{
        $data['content'] = 'dma/pengelolaan/barang_index';
        $data['menu'] = 'pengelolaan';
        $data['script'] = 'dma/pengelolaan/script/js_barang_index';
        $data['app'] = getAppList();
        
		$data['form'] = array(
			array(
			  "type" => "input",
			  "label" => "Nama Barang",
			  "name" => "nama_barang"
			),
			array(
			  "type" => "input",
			  "label" => "Merk Barang (isi dengan - jika tidak ada)",
			  "name" => "merk_barang"
			),
			array(
			  "type" => "input",
			  "label" => "Satuan Barang (isi dengan - jika tidak ada)",
			  "name" => "satuan"
			),
			array(
			  "type" => "input",
			  "label" => "Nomor Barang (isi dengan - jika tidak ada)",
			  "name" => "nomor_barang"
			),
			array(
			  "type" => "input",
			  "label" => "Stok Barang",
			  "name" => "stok_barang"
			),
		  );
          $data['breadcumb'] = buildBreadcumb(array('App','SIDMA','Pengelolaan Barang'));
		// $this->load->view('partials/wrapper_dma',$data);
        buildPage($data);
    }
    
    public function datatableBarang(){
        $appid = $this->uri->segment(4);
        $this->load->library('datatables');
        $this->datatables->select('*');
        $this->datatables->from('dma_barang');

        $this->datatables->add_column('barang_masuk',function($row) {
            $d = $this->db->order_by('id','desc')->limit(1)->get_where('dma_barang_masuk',array('id_barang'=>$row['id']));
            if($d->num_rows() > 0) {
                return $d->row()->jumlah_masuk . " ". $row['satuan'];
            }else {
                return $row['stok_barang']. " ". $row['satuan'];
            }
        });

        $this->datatables->add_column('stok_barang',function($row) {
            
                return $row['stok_barang']. " ". $row['satuan'];
        });

        $this->datatables->add_column('barang_keluar',function($row) {
            $d = $this->db->order_by('id','desc')->limit(1)->get_where('dma_perbaikan_barang',array('id_barang'=>$row['id']));
            if($d->num_rows() > 0) {
                return $d->row()->jumlah. " ". $row['satuan'];
            }else {
                return "0". " ". $row['satuan'];
            }
        });

        $this->datatables->add_column('action',function($row){
                if(isSuper()) {
                $button = "<button type='button' class='btn btn-warning btn-sm' onclick='edit(".json_encode($row).")'><i class='fa fa-edit'></i> Ubah</button>";
                $button .= "<button type='button' class='btn btn-info btn-sm' onclick='transaksimasuk(".$row['id'].")'><i class='fa fa-chevron-down'></i> Transaksi Masuk</button>";
                $button .= "<button type='button' class='btn btn-danger btn-sm btnHapus' onclick='hapus(".$row['id'].")'><i class='fa fa-trash'></i> Hapus</button>";
                return $button;
                }
            });
        echo $this->datatables->generate();
	}

    public function simpan() {

        $insert = array(
            "nama_barang" => $this->input->post("nama_barang"),
            "merk_barang" => $this->input->post("merk_barang"),
            "nomor_barang" => $this->input->post("nomor_barang"),
            "stok_barang"	 => $this->input->post("stok_barang"),
            "created_at" => date("Y-m-d H:i:s")
        );

        $fileName = "";
        $message = "Data tersimpan";

        $this->db->trans_begin();

        $simpan = $this->db->insert("dma_barang",$insert);

        if($this->db->trans_status()!==FALSE) {
            $this->db->trans_commit();
            echo json_encode(array("msg"=>$message));
            exit();
        }
        $this->db->trans_rollback();
        echo json_encode(array("msg"=>"Gagal Simpan Data"));
        exit();
    }

    public function updatestok() {

        $insert = array(
            "id_barang" => $this->input->post("id"),
            "jumlah_masuk" => $this->input->post("jumlah_masuk")
        );

        $message = "Data tersimpan";

        $this->db->trans_begin();

        $barang = $this->db->get_where('dma_barang',array('id'=>$this->input->post('id')))->row();

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('dma_barang',array('stok_barang'=>$barang->stok_barang + $this->input->post('jumlah_masuk')));

        $simpan = $this->db->insert("dma_barang_masuk",$insert);

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
            "nama_barang" => $this->input->post("nama_barang"),
            "merk_barang" => $this->input->post("merk_barang"),
            "nomor_barang" => $this->input->post("nomor_barang"),
            "satuan" => $this->input->post("satuan"),
            "stok_barang"	 => $this->input->post("stok_barang")
        );
        $message = "";
        
        $this->db->where("id",$id);
        $update = $this->db->update("dma_barang",$update);
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
        $this->db->delete("dma_barang");

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
