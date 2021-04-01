<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelolasiswa extends CI_Controller {

    function __construct() {
        parent::__construct();
        isAuthenticated();
        $this->load->model("Model_form");
    }

	public function index()
	{   
		$form = array(
            array(
                "type" => "select",
                "label" => "Tahun Akademik",
                "name" => "tahun_akademik",
                "option" => $this->Model_form->optionTahunAkademik()
              ),
            array(
                "type" => "select",
                "label" => "Kelas",
                "name" => "kelas",
                "option" => $this->Model_form->optionKelas()
              ),
            array(
                "type" => "input",
                "label" => "Tahun Masuk",
                "name" => "tahun_masuk",
              ),

            array(
                "type" => "input",
                "label" => "NIS",
                "name" => "nis",
              ),

            array(
                "type" => "input",
                "label" => "Nomor VA",
                "name" => "nomor_va",
              ),
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
			  "type" => "textarea",
			  "label" => "Alamat Tempat Tinggal Sekolah",
			  "name" => "alamat_tempat_tinggal"
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
        $data = array(
            'script' => 'siswa/pengelolaan/script/js_siswa',
            'app' => getAppList(),
            'form' => $form,
            'content' => 'siswa/pengelolaan/index',
            'breadcumb' => buildBreadcumb(array('App','SIMSIAK','Pengelolaan Siswa'))
        );
        buildPage($data);
    }

    public function kenaikankelas() {
        $data['content'] = 'siswa/pengelolaan/siswa_kenaikankelas';
        $data['script'] = 'siswa/pengelolaan/script/js_siswakelas';
        $data['breadcumb'] = buildBreadcumb(array('App','SIMSIAK','Pengelolaan Siswa','Kenaikan Kelas'));
        $data['app'] = getAppList();
        buildPage($data);
    }
    
    public function datatableSiswa(){
        $appid = $this->uri->segment(4);
        $this->load->library('datatables');
        $this->datatables->select('siswa.*,siswa_app.status,siswa_app.app_id');
        $this->datatables->from('siswa');
        $this->datatables->join('siswa_app','siswa_app.siswa_id=siswa.id');
        $this->datatables->where('siswa_app.app_id',$appid);
        $this->datatables->add_column('image',function($row){
            if($row['avatar']!="") {
                return "<img src='".base_url()."uploads/".$row['avatar']."' style='width:100px;height:100px'>";
            }return 'Belum diupload';
        });
        $this->datatables->add_column('action',function($row){
            $button = "<button type='button' class='btn btn-warning btn-xs' onclick='edit(".json_encode($row).")'>Ubah</button>";
            $button .= "<button type='button' class='btn btn-danger btn-xs btnHapus' onclick='hapus(".$row['id'].",".$row['app_id'].")'>Hapus</button>";
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
            "alamat_tempat_tinggal" => $this->input->post("alamat_tempat_tinggal"),
            "nis" => $this->input->post("nis"),
            "tahun_masuk" => $this->input->post("tahun_masuk"),
            "nomor_va" => $this->input->post("nomor_va"),
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
            "created_at" => date("Y-m-d H:i:s"),
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

        $insertSiswaKelas = array(
            "siswa_id" => $dataInsertSiswaApp['siswa_id'],
            "kelas_id" => $this->input->post('kelas'),
            "tahun_akademik_id" => $this->input->post('tahun_akademik'),
            "app_id" => $this->input->post("app_id",true),
            "status" => "1",
            "created_at" => date("Y-m-d H:i:s"),
            "created_by" => $this->session->userdata("id")
        );

        $this->db->insert("siswa_kelas",$insertSiswaKelas);

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

                    "alamat_tempat_tinggal" => @$val->alamat_tempat_tinggal,
                    "nis" => @$val->nis,
                    "tahun_masuk" => @$val->tahun_masuk,
                    "nomor_va" => @$val->nomor_va,

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

                $qtahun_akademik = $this->db->get_where('tahun_akademik',array("tahun_akademik"=>trim(@$val->tahun_akademik)));
                $tahun_akademik = 0;
                if($qtahun_akademik->num_rows() > 0) {
                    $tahun_akademik = $qtahun_akademik->row()->id;
                }

                $qkelas = $this->db->get_where('kelas',array("nama_kelas"=>trim(@$val->kelas)));
                $kelas = 0;
                if($qkelas->num_rows() > 0) {
                    $kelas = $qkelas->row()->id;
                }

                if($kelas != 0 && $tahun_akademik != 0) {
                    $insertSiswaKelas = array(
                        "siswa_id" => $dataInsertSiswaApp['siswa_id'],
                        "kelas_id" => $kelas,
                        "tahun_akademik_id" => $tahun_akademik,
                        "app_id" => $this->input->post("app_id",true),
                        "status" => "1",
                        "created_at" => date("Y-m-d H:i:s"),
                        "created_by" => $this->session->userdata("id")
                    );
                    $this->db->insert("siswa_kelas",$insertSiswaKelas);
                }
        
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
            "alamat_tempat_tinggal" => $this->input->post("alamat_tempat_tinggal"),
            "nis" => $this->input->post("nis"),
            "tahun_masuk" => $this->input->post("tahun_masuk"),
            "nomor_va" => $this->input->post("nomor_va"),
            "created_at" => date("Y-m-d H:i:s"),
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

    public function submitnaikkelas() {
        // echo "<pre>";
        // print_r($this->input->post());

        $this->db->trans_begin();
        foreach ($this->input->post('siswa') as $siswa) {
            //update last kelas jadi 0
            $this->db->where('siswa_id',$siswa);
            $this->db->update('siswa_kelas',array('status'=>'0'));
            //update last siswa app kalau beda app jadi 0
            $siswaapp = $this->db->get_where('siswa_app',array('siswa_id'=>$siswa,'status'=>'1'))->row();
            if(!empty($siswaapp)) {
                if($siswaapp->app_id!=$this->input->post('app_id_konfirmasi')) {
                    //update dan insert siswa_app
                    $this->db->where('siswa_id',$siswa);
                    $this->db->update('siswa_app',array('status'=>'0'));

                    $this->db->insert('siswa_app',array(
                        "app_id" => $this->input->post('app_id_konfirmasi'),
                        "siswa_id" => $siswa,
                        "status" => "1",
                        "created_at" => date("Y-m-d H:i:s"),
                        "created_by" => $this->session->userdata("id")
                    ));
                }
            }
            //insert new kelas
            $this->db->insert('siswa_kelas',array(
                'siswa_id'=>$siswa,
                "app_id" => $this->input->post('app_id_konfirmasi'),
                'kelas_id'=>$this->input->post('kelas_konfirmasi'),
                'tahun_akademik_id'=>$this->input->post('tahun_akademik_konfirmasi'),
                "status" => "1",
                "created_at" => date("Y-m-d H:i:s"),
                "created_by" => $this->session->userdata("id")
            ));
        }

        if($this->db->trans_status!==FALSE) {
            $this->db->trans_commit();
            $this->session->set_flashdata('status',"<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Proses kenaikan kelas berhasil</div>");
        }else {
            $this->db->trans_rollback();
            $this->session->set_flashdata('status',"<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Proses kenaikan kelas gagal</div>");
        }
        redirect(base_url().'siswa/kelolasiswa');
    }

    public function kenaikankelas_konfirmasisiswa() {
        $idkelas = $this->input->post('kelas');
        $this->db->select('siswa.*,kelas.nama_kelas');
        $this->db->from('siswa');
        $this->db->join('siswa_kelas','siswa_kelas.siswa_id=siswa.id');
        $this->db->join('kelas','kelas.id=siswa_kelas.kelas_id');
        $this->db->where('kelas.id',$idkelas);
        $this->db->where('siswa_kelas.status','1');
        $data = $this->db->get()->result();

        $app = $this->db->get('app')->result();
        $ta = $this->db->get('tahun_akademik')->result();
        $kelas = $this->db->get('kelas')->result();

        //build table
        $output = "<form action='".base_url()."siswa/kelolasiswa/submitnaikkelas' method='post'><div class='table-reponsive'><table class='table table-bordered'>";
        $output .= "<thead><tr><td></td><td>No</td><td>Nama Siswa</td><td>Nama Kelas</td></tr></thead><tbody>";
        foreach ($data as $key => $row) {
            $num = $key+1;
            $output .= "<tr><td><input value='".$row->id."' name='siswa[]' type='checkbox'></td><td>".$num.".</td><td>".$row->nama."</td><td>".$row->nama_kelas."</td></tr>";
        }
        $output .= "</tbody></table></div>";
        
        //build form
        $output .= "<div class='row'>
            <div class='col-md-3'>
                <div class='form-group'>
                    <label>Pilih Jenjang</label>
                    <select required class='form-control' id='app_id_konfirmasi' name='app_id_konfirmasi'>
                        <option value=''>Pilih Data</option>";
        foreach ($app as $list) {
            $output .= "<option value='".$list->id."'>".$list->app."</option>";
        }
        $output .= "</select>
                </div>
            </div>";
        $output .= "<div class='col-md-3'>
                <div class='form-group'>
                <label>Pilih Tahun Akademik</label>
                <select class='form-control' required id='tahun_akademik_konfirmasi' name='tahun_akademik_konfirmasi'><option value=''>Pilih Data</option>";
        foreach ($ta as $list) {
            $output .= "<option value='".$list->id."'>".$list->tahun_akademik."</option>";
        }
        $output .= "</select>
                </div>
        </div>";
        $output .= "<div class='col-md-3'>
                <div class='form-group'>
                <label>Pilih Kelas</label>
                <select required class='form-control' id='kelas_konfirmasi' name='kelas_konfirmasi'><option value=''>Pilih Data</option>";
        foreach ($kelas as $list) {
            $output .= "<option value='".$list->id."'>".$list->nama_kelas."</option>";
        }
        $output .= "</select>
                </div>
        </div>";

        $output .= "</div>";

        //button
        $output .= "<div class='btn-group'><button type='button' class='btn btn-warning' onclick='backToPilihKelas()'><i class='notika-icon notika-left-arrow'></i> Sebelumnya</button><button type='submit' class='btn btn-success'>Simpan <i class='notika-icon notika-checked'></i></button></div></form>";

        echo $output;
        exit();
    }

}
