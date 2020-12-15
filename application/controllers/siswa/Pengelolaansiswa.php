<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengelolaansiswa extends CI_Controller {

    function __construct() {
        parent::__construct();
        isAuthenticated();
    }

	public function index()
	{
        $data['content'] = 'siswa/pengelolaan/siswa';
        $data['menu'] = 'pengelolaan';
        $data['script'] = 'siswa/pengelolaan/script/js_siswa';
        $data['app'] = getAppList();

		$data['form'] = array(
			array(
			  "type" => "input",
			  "label" => "Nama Lengkap",
			  "name" => "nama"
			),
			array(
			  "type" => "select",
			  "label" => "Jenis Kelamin",
              "name" => "jenis_kelamin",
              "option" => array("L"=>"Laki-Laki","P"=>"Perempuan")
			),
			array(
			  "type" => "input",
			  "label" => "NISN",
			  "name" => "nisn"
			),
			array(
			  "type" => "input",
			  "label" => "Tempat Lahir",
			  "name" => "tempat_lahir"
			),
			array(
			  "type" => "datepicker",
			  "label" => "Tanggal Lahir",
			  "name" => "tanggal_lahir"
			),
			array(
			  "type" => "input",
			  "label" => "NIK",
			  "name" => "nik"
			),
			array(
			  "type" => "input",
			  "label" => "No Kartu Keluarga",
			  "name" => "no_kk"
			),
			array(
			  "type" => "select",
			  "label" => "Agama",
              "name" => "agama",
              "option" => array("Islam"=>"Islam")
			),
			array(
			  "type" => "textarea",
			  "label" => "Alamat",
			  "name" => "alamat"
            ),
			array(
			  "type" => "input",
			  "label" => "RT",
              "name" => "rt",
            ),
            array(
			  "type" => "input",
			  "label" => "RW",
              "name" => "rw",
			),
            array(
			  "type" => "input",
			  "label" => "Dusun",
              "name" => "dusun",
			),
            array(
			  "type" => "input",
			  "label" => "Kelurahan",
              "name" => "kelurahan",
			),
            array(
			  "type" => "input",
			  "label" => "Kecamatan",
              "name" => "kecamatan",
			),
            array(
			  "type" => "input",
			  "label" => "Kode Pos",
              "name" => "kode_pos",
			),
            array(
			  "type" => "input",
			  "label" => "Telepon",
              "name" => "telepon",
			),
            array(
			  "type" => "input",
			  "label" => "No HP",
              "name" => "no_hp",
			),
            array(
			  "type" => "input",
			  "label" => "SKHUN",
              "name" => "skhun",
			),
            array(
			  "type" => "input",
			  "label" => "Nama Ayah",
              "name" => "ayah_nama",
			),
            array(
			  "type" => "input",
			  "label" => "Pekerjaan Ayah",
              "name" => "ayah_pekerjaan",
			),
            array(
			  "type" => "input",
			  "label" => "Penghasilan Ayah",
              "name" => "ayah_penghasilan",
			),
            array(
			  "type" => "input",
			  "label" => "No HP Ayah",
              "name" => "ayah_hp",
			),
            array(
			  "type" => "input",
			  "label" => "Nama Ibu",
              "name" => "ibu_nama",
			),
            array(
			  "type" => "input",
			  "label" => "Pekerjaan Ibu",
              "name" => "ibu_pekerjaan",
			),
            array(
			  "type" => "input",
			  "label" => "Penghasilan Ibu",
              "name" => "ibu_penghasilan",
			),
            array(
			  "type" => "input",
			  "label" => "No HP Ibu",
              "name" => "ibu_hp",
			),
            array(
			  "type" => "input",
			  "label" => "Asal Sekolah",
              "name" => "sekolah_asal",
			),
		  );
		$this->load->view('partials/wrapper_siswa',$data);
    }
    
    public function datatableSiswa(){
        $appid = $this->uri->segment(4);
        $this->load->library('datatables');
        $this->datatables->select('siswa.*,siswa_app.status,siswa_app.app_id');
        $this->datatables->from('siswa');
        $this->datatables->join('siswa_app','siswa_app.siswa_id=siswa.id');
        $this->datatables->where('siswa_app.app_id',$appid);
        $this->datatables->add_column('image',function($row){
            return "<img src='".base_url()."uploads/".$row['avatar']."' style='width:100px;height:100px'>";
        });
        $this->datatables->add_column('action',function($row){
            $button = "<button type='button' class='btn btn-warning btn-xs' onclick='edit(".json_encode($row).")'><i class='fa fa-edit'></i></button>|";
            $button .= "<button type='button' class='btn btn-danger btn-xs btnHapus' onclick='hapus(".$row['id'].",".$row['app_id'].")'><i class='fa fa-trash'></i></button>";
            return $button;
        });
        echo $this->datatables->generate();
	}

    public function simpan() {

        $insert = array(
            "nama" => $this->input->post("nama"),
            "jenis_kelamin" => $this->input->post("jenis_kelamin"),
            "nisn" => $this->input->post("nisn"),
            "tempat_lahir"	 => $this->input->post("tempat_lahir"),
            "tanggal_lahir" => date("Y-m-d", strtotime($this->input->post("tanggal_lahir"))),
            "nik"	 => $this->input->post("nik"),
            "no_kk"	 => $this->input->post("no_kk"),
            "agama"	 => $this->input->post("agama"),
            "alamat" => $this->input->post("alamat"),
            "rt" => $this->input->post("rt"),
            "rw" => $this->input->post("rw"),
            "dusun"	 => $this->input->post("dusun"),
            "kelurahan"	 => $this->input->post("kelurahan"),
            "kecamatan"	 => $this->input->post("kecamatan"),
            "kode_pos"	 => $this->input->post("kode_pos"),
            "telepon" => $this->input->post("telepon"),	
            "no_hp"	 => $this->input->post("no_hp"),
            "skhun"	 => $this->input->post("skhun"),
            "ayah_nama"	 => $this->input->post("ayah_nama"),
            "ayah_pekerjaan" => $this->input->post("ayah_pekerjaan"),	
            "ayah_penghasilan"	 => $this->input->post("ayah_penghasilan"),
            "ayah_hp"	 => $this->input->post("ayah_hp"),
            "ibu_nama" => $this->input->post("ibu_nama"),	
            "ibu_pekerjaan"	 => $this->input->post("ibu_pekerjaan"),
            "ibu_penghasilan"	 => $this->input->post("ibu_penghasilan"),
            "ibu_hp"	 => $this->input->post("ibu_hp"),
            "sekolah_asal" => $this->input->post("sekolah_asal"),
            "created_at" => date("H:i:s"),
            "created_by" => $this->session->userdata("id"),
        );

        $fileName = "";
        $message = "Data tersimpan";
        if(isset($_FILES['avatar'])) {
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'jpg|png';
            $config['max_size']             = 1024;
            $config['file_name']            = $insert['nisn']."_avatar_".date("Ymdhis");

            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('avatar'))
            {
                $message = "Data tersimpan tanpa gambar, silahkan gunakan menu edit. eror : " .$this->upload->display_errors();
            }
            else
            {
                $data = $this->upload->data();
                $fileName = $data['file_name'];
                $insert["avatar"] = $fileName;
            }
        }

        $this->db->trans_begin();

        $simpansiswa = $this->db->insert("siswa",$insert);

        $dataInsertSiswaApp = array(
            "app_id" => $this->input->post("app_id",true),
            "siswa_id" => $this->db->insert_id(),
            "status" => "1",
            "created_at" => date("Y-m-d H:i:s"),
            "created_by" => $this->session->userdata("id"),
        );
        $simpan = $this->db->insert("siswa_app",$dataInsertSiswaApp);
        if($this->db->trans_status()!==FALSE) {
            $this->db->trans_commit();
            echo json_encode(array("msg"=>$message));
            exit();
        }
        $this->db->trans_rollback();
        echo json_encode(array("msg"=>"Gagal Simpan Data"));
        exit();
    }

    public function simpanimport() {

        $data = json_decode($this->input->post('data'));
        
        if(!empty($data)) {
            $this->db->trans_begin();
            foreach($data as $val) {
                $insert = array(
                    "nama" => @$val->nama,
                    "jenis_kelamin" => @$val->jenis_kelamin,
                    "nisn" => @$val->nisn,
                    "tempat_lahir"	 => @$val->tempat_lahir,
                    "tanggal_lahir" => (@$val->tanggal_lahir!="")?date("Y-m-d", strtotime(@$val->tanggal_lahir)):null,
                    "nik"	 => @$val->nik,
                    "no_kk"	 => @$val->no_kk,
                    "agama"	 => @$val->agama,
                    "alamat" => @$val->alamat,
                    "rt" => @$val->rt,
                    "rw" => @$val->rw,
                    "dusun"	 => @$val->dusun,
                    "kelurahan"	 => @$val->kelurahan,
                    "kecamatan"	 => @$val->kecamatan,
                    "kode_pos"	 => @$val->kode_pos,
                    "telepon" => @$val->telepon,	
                    "no_hp"	 => @$val->no_hp,
                    "skhun"	 => @$val->skhun,
                    "ayah_nama"	 => @$val->ayah_nama,
                    "ayah_pekerjaan" => @$val->ayah_pekerjaan,	
                    "ayah_penghasilan"	 => @$val->ayah_penghasilan,
                    "ayah_hp"	 => @$val->ayah_hp,
                    "ibu_nama" => @$val->ibu_nama,	
                    "ibu_pekerjaan"	 => @$val->ibu_pekerjaan,
                    "ibu_penghasilan"	 => @$val->ibu_penghasilan,
                    "ibu_hp"	 => @$val->ibu_hp,
                    "sekolah_asal" => @$val->sekolah_asal,
                    "created_at" => date("Y-m-d H:i:s"),
                    "created_by" => $this->session->userdata("id"),
                );

                $this->db->insert('siswa',$insert);
                $dataInsertSiswaApp = array(
                    "app_id" => $this->input->post("app_id",true),
                    "siswa_id" => $this->db->insert_id(),
                    "status" => "1",
                    "created_at" => date("Y-m-d H:i:s"),
                    "created_by" => $this->session->userdata("id"),
                );
                $this->db->insert("siswa_app",$dataInsertSiswaApp);
            }
        }else {
            echo json_encode(array("msg"=>"Data Kosong"));
            exit();
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
            "nama" => $this->input->post("nama"),
            "jenis_kelamin" => $this->input->post("jenis_kelamin"),
            "nisn" => $this->input->post("nisn"),
            "tempat_lahir"	 => $this->input->post("tempat_lahir"),
            "tanggal_lahir" => date("Y-m-d", strtotime($this->input->post("tanggal_lahir"))),
            "nik"	 => $this->input->post("nik"),
            "no_kk"	 => $this->input->post("no_kk"),
            "agama"	 => $this->input->post("agama"),
            "alamat" => $this->input->post("alamat"),
            "rt" => $this->input->post("rt"),
            "rw" => $this->input->post("rw"),
            "dusun"	 => $this->input->post("dusun"),
            "kelurahan"	 => $this->input->post("kelurahan"),
            "kecamatan"	 => $this->input->post("kecamatan"),
            "kode_pos"	 => $this->input->post("kode_pos"),
            "telepon" => $this->input->post("telepon"),	
            "no_hp"	 => $this->input->post("no_hp"),
            "skhun"	 => $this->input->post("skhun"),
            "ayah_nama"	 => $this->input->post("ayah_nama"),
            "ayah_pekerjaan" => $this->input->post("ayah_pekerjaan"),	
            "ayah_penghasilan"	 => $this->input->post("ayah_penghasilan"),
            "ayah_hp"	 => $this->input->post("ayah_hp"),
            "ibu_nama" => $this->input->post("ibu_nama"),	
            "ibu_pekerjaan"	 => $this->input->post("ibu_pekerjaan"),
            "ibu_penghasilan"	 => $this->input->post("ibu_penghasilan"),
            "ibu_hp"	 => $this->input->post("ibu_hp"),
            "sekolah_asal" => $this->input->post("sekolah_asal"),
            "created_at" => date("H:i:s"),
            "created_by" => $this->session->userdata("id"),
        );
        $message = "";
        if(isset($_FILES['avatar'])) {
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'jpg|png';
            $config['max_size']             = 1024;
            $config['file_name']            = $update['nisn']."_avatar_".date("Ymdhis");

            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('avatar'))
            {
                $message = "Data tersimpan tanpa gambar, silahkan gunakan menu edit. eror : " .$this->upload->display_errors();
            }
            else
            {
                $data = $this->upload->data();
                $fileName = $data['file_name'];
                $update["avatar"] = $fileName;
            }
        }

        $this->db->where("id",$id);
        $update = $this->db->update("siswa",$update);
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

        $data = $this->db->get_where('siswa',array('id'=>$this->input->post('id')));
        $avatar = "";
        if($data->num_rows()>0) {
            $avatar = $data->row()->avatar;
        }
        $this->db->where("id",$this->input->post("id",true));
        $this->db->delete("siswa");

        $this->db->where('siswa_id',$this->input->post('id'));
        $this->db->delete("siswa_app");

        if($this->db->trans_status()!==FALSE) {
            $this->db->trans_commit();
            @unlink("./uploads/".$avatar);
            echo json_encode(array("msg"=>"ok"));
            exit();
        }else {
            $this->db->trans_rollback();
        }
        echo json_encode(array("msg"=>"no"));
        exit();
    }

}
