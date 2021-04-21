<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelolaperbaikan extends CI_Controller {

    function __construct() {
        parent::__construct();
        isAuthenticated();
        $this->load->model("Model_form");
    }

	public function index()
	{
        $data['content'] = 'dma/pengelolaan/perbaikan_index';
        $data['menu'] = 'pengelolaan';
        $data['script'] = 'dma/pengelolaan/script/js_perbaikan_index';
        $data['app'] = getAppList();
        
        $data['gedung'] = $this->db->get('dma_gedung')->result();
        $data['layanan'] = $this->db->get('dma_layanan')->result();
		$data['breadcumb'] = buildBreadcumb(array('App','SIDMA','Pengelolaan Perbaikan'));
        buildPage($data);
    }
    
    public function datatable(){
        $appid = $this->uri->segment(4);
        $this->load->library('datatables');
        $this->datatables->select('dma_pelaporan.*,dma_layanan.nama_layanan,dma_gedung.nama_gedung,users.nama');
        $this->datatables->from('dma_pelaporan');
        $this->datatables->join('dma_layanan','dma_layanan.id=dma_pelaporan.id_layanan');
        $this->datatables->join('dma_gedung','dma_gedung.id=dma_pelaporan.id_gedung');
        $this->datatables->join('users','users.id=dma_pelaporan.user_lapor');
        if(!isSuper()) {
            $this->datatables->where('dma_pelaporan.user_lapor',$this->session->userdata('id'));
        }
        $this->datatables->add_column('created_at',function($row){
            return date("d M Y H:i:s",strtotime($row['created_at']));
        });
        $this->datatables->add_column('start_at',function($row){
            return ($row['start_at']!=null)?date("d M Y H:i:s",strtotime($row['start_at'])):"-";
        });
        $this->datatables->add_column('done_at',function($row){
            return ($row['done_at']!=null)?date("d M Y H:i:s",strtotime($row['done_at'])):"-";
        });
        $this->datatables->add_column('action',function($row){
            $button = "<a class='btn btn-info btn-xs' href='".base_url()."dma/kelolaperbaikan/detail/".$row['id']."'><i class='fa fa-search'></i></a>";
            if(isSuper()) {
                $button .= "<button type='button' class='btn btn-danger btn-xs' onclick='hapus(".$row['id'].")'><i class='fa fa-trash'></i></button>";
            }
            return $button;
        });
        echo $this->datatables->generate();
    }
    
    public function detail() {
        $id = $this->uri->segment(4);
        if(!intval($id)) {
            redirect(base_url().'dma/kelolaperbaikan');
        }
        $this->db->select('dma_pelaporan.*,dma_layanan.nama_layanan,dma_gedung.nama_gedung,users.nama');
        $this->db->from('dma_pelaporan');
        $this->db->join('dma_layanan','dma_layanan.id=dma_pelaporan.id_layanan');
        $this->db->join('dma_gedung','dma_gedung.id=dma_pelaporan.id_gedung');
        $this->db->join('users','users.id=dma_pelaporan.user_lapor');
        $this->db->where('dma_pelaporan.id',$id);
        $header = $this->db->get()->row();
        $data['content'] = 'dma/pengelolaan/perbaikan_detail_index';
        $data['menu'] = 'pengelolaan';
        $data['script'] = 'dma/pengelolaan/script/js_perbaikan_index';
        $data['app'] = getAppList();   
        $data['header'] = $header;
        $this->db->select("dma_perbaikan.*");
        $this->db->from('dma_perbaikan');
        $this->db->where('id_laporan',$id);
        $item = $this->db->get()->row();
        $data['item'] = $item;

        $data['teknisi'] = $this->db->get("dma_teknisi")->result();
        
        $barangPerbaikan = array();
        if($item != null) {
            $this->db->select('dma_teknisi.*,dma_teknisi.nama_teknisi');
            $this->db->from('dma_teknisi');
            $this->db->join('dma_perbaikan_teknisi','dma_perbaikan_teknisi.user_teknisi=dma_teknisi.id');
            $this->db->where('id_perbaikan',$item->id);
            $data['list_teknisi'] = $this->db->get()->result();
            $data['teknisi'] = $this->db->get('dma_teknisi')->result();
            $data['barang'] = $this->db->get('dma_barang')->result();

            $this->db->from('dma_perbaikan_barang');
            $this->db->where('id_perbaikan',$item->id);
            $this->db->join('dma_barang',"dma_barang.id=dma_perbaikan_barang.id_barang");
            $barangPerbaikan = $this->db->get()->result();
        }
        $data['perbaikan_barang'] = $barangPerbaikan;
        $data['breadcumb'] = buildBreadcumb(array('App','SIDMA','Pengelolaan Perbaikan',"Detail Perbaikan"));
        buildPage($data);
    }

    public function selesai() {

        $explodId = explode(",",$this->input->post("id"));
        $update = array(
            "done_at" => date("Y-m-d H:i:s"),
            "status_laporan" => 2,
        );

        $this->db->trans_begin();

        $this->db->where('id',$explodId[0]);
        $this->db->update('dma_pelaporan',$update);

        $updatePerbaikan = array(
            "keterangan_proses" => $this->input->post('keterangan_proses')
        );

        if(isset($_FILES['file'])) {
            $config['upload_path']          = './uploads/dma/';
            $config['allowed_types']        = 'jpg|png';
            $config['max_size']             = 1024;
            $config['file_name']            = $this->input->post('id')."_selesai_".date("Ymdhis");

            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('file'))
            {
                $message = "Data tersimpan tanpa gambar, silahkan gunakan menu edit. eror : " .$this->upload->display_errors();
            }
            else
            {
                $data = $this->upload->data();
                $fileName = $data['file_name'];
                $updatePerbaikan["hasil_foto"] = $fileName;
            }
        }

        $this->db->where('id',$explodId[1]);
        $this->db->update('dma_perbaikan',$updatePerbaikan);

        if($this->input->post('id_barang')!=null) {
            $idBarang = $this->input->post('id_barang');
            $jumlah = $this->input->post('jumlah');
            foreach($idBarang as $key => $val) {
                $insert = array(
                    "id_perbaikan" => $explodId[1],
                    "id_barang" => $val,
                    "jumlah" => $jumlah[$key],
                    "created_at" => date("Y-m-d H:i:s"),
                );
                $this->db->insert("dma_perbaikan_barang",$insert);

                $barang = $this->db->get_where('dma_barang',array('id'=>$val))->row();
                $stokAkhir = (int)$barang->stok_barang - (int)$jumlah[$key];
                $this->db->where('id',$val);
                $this->db->update('dma_barang',array("stok_barang"=>$stokAkhir));
            }
        }

        if($this->db->trans_status()!==FALSE) {
            $this->db->trans_commit();
            echo json_encode(array("msg"=>"Berhasil selesaikan data"));
            exit();
        }
        $this->db->trans_rollback();
        echo json_encode(array("msg"=>"Gagal selesaikan Data"));
        exit();
    }

    public function simpan() {

        $insert = array(
            "user_lapor" => $this->session->userdata("id"),
            "status_laporan" => "0",
            "keterangan_laporan" => $this->input->post("keterangan_laporan"),
            "id_layanan" => $this->input->post('id_layanan'),
            "id_gedung" => $this->input->post('id_gedung'),
            "created_at" => date("Y-m-d H:i:s")
        );

        $fileName = "";
        $message = "Data tersimpan";

        $this->db->trans_begin();

        if(isset($_FILES['gambar_laporan'])) {
            $config['upload_path']          = './uploads/dma/';
            $config['allowed_types']        = 'jpg|png';
            $config['max_size']             = 1024;
            $config['file_name']            = $this->input->post('id')."_laporan_".date("Ymdhis");

            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('gambar_laporan'))
            {
                $message = "Data tersimpan tanpa gambar, eror : " .$this->upload->display_errors();
            }
            else
            {
                $data = $this->upload->data();
                $fileName = $data['file_name'];
                $insert["gambar_laporan"] = $fileName;
            }
        }

        $simpan = $this->db->insert("dma_pelaporan",$insert);

        if($this->db->trans_status()!==FALSE) {
            $this->db->trans_commit();
            echo json_encode(array("msg"=>"Berhasil simpan data"));
            exit();
        }
        $this->db->trans_rollback();
        echo json_encode(array("msg"=>"Gagal Simpan Data"));
        exit();
    }

    public function proses_perbaikan() {
        $insert = array(
            "id_laporan" => $this->input->post('id'),
            "keterangan_proses" => $this->input->post('keterangan_proses'),
            "user_admin" => $this->session->userdata('id'),
            "created_at" => date("Y-m-d H:i:s")
        );
        $this->db->trans_begin();
        $update = array(
            "status_laporan" => 1,
            "start_at" => date("Y-m-d H:i:s")
        );
        $this->db->where('id',$this->input->post('id'));
        $this->db->update('dma_pelaporan',$update);
        
        $simpan = $this->db->insert("dma_perbaikan",$insert);
        $idperbaikan = $this->db->insert_id();

        if($this->input->post('user_teknisi')!=null) {
            $userteknisi = $this->input->post('user_teknisi');
            $jumlah = $this->input->post('jumlah');
            foreach($userteknisi as $key => $val) {
                $insert = array(
                    "id_perbaikan" => $idperbaikan,
                    "user_teknisi" => $val
                );
                $this->db->insert("dma_perbaikan_teknisi",$insert);
            }
        }

        if($this->db->trans_status()!==FALSE) {
            $this->db->trans_commit();
            echo json_encode(array("msg"=>"Berhasil simpan data"));
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
        $this->db->delete("dma_pelaporan");

        $this->db->where("id_laporan",$this->input->post("id",true));
        $this->db->delete("dma_perbaikan");

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
