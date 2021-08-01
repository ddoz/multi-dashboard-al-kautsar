<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelolastaff extends CI_Controller {

    function __construct() {
        parent::__construct();
        isAuthenticated();
        $this->load->model("Model_form");
    }

	public function index()
	{   
		$form = array(
			array(
			  "type" => "input",
			  "label" => "Nama Lengkap",
			  "name" => "nama"
			),
            array(
                "type" => "input",
                "label" => "NIK",
                "name" => "nik"
              ),
            array(
                "type" => "input",
                "label" => "NPY/NIP",
                "name" => "nip_npy"
              ),
            array(
                "type" => "select",
                "label" => "Agama",
                "name" => "agama",
                "option" => array("Islam"=>"Islam")
              ),
			array(
			  "type" => "select",
			  "label" => "Jenis Kelamin",
              "name" => "jenis_kelamin",
              "option" => array("L"=>"Laki-Laki","P"=>"Perempuan")
			),
            array(
                "type" => "input",
                "label" => "Email",
                "name" => "email",
              ),
            array(
                "type" => "textarea",
                "label" => "Alamat",
                "name" => "alamat"
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
			  "label" => "No HP",
              "name" => "no_hp",
			),
            array(
			  "type" => "select",
			  "label" => "Jenjang Pendidikan",
              "name" => "jenjang_pendidikan",
              "option" => array("D1"=>"D1","D2"=>"D2","D3"=>"D3","D4"=>"D4","S1"=>"S1","S2"=>"S2","S3"=>"S3")
			),
            array(
			  "type" => "select",
			  "label" => "Unit",
              "name" => "unit",
              "option" => $this->Model_form->optionUnit()
			),
            array(
			  "type" => "input",
			  "label" => "Masa Kerja",
              "required" => false,
              "name" => "masa_kerja",
			),
			array(
			  "type" => "datepicker",
			  "label" => "Mulai Bekerja Tanggal",
			  "name" => "tanggal_masuk_kerja"
			),
			array(
			  "type" => "datepicker",
			  "label" => "Berhenti Tanggal",
              "required" => false,
			  "name" => "berhenti_tanggal"
			),
			array(
			  "type" => "datepicker",
			  "label" => "Pensiun Tanggal",
              "required" => false,
			  "name" => "tanggal_lahir"
			),
            array(
			  "type" => "input",
			  "label" => "Golongan Darah",
              "name" => "golongan_darah",
			),
            array(
			  "type" => "input",
			  "label" => "Gelar Depan",
              "name" => "gelar_depan",
			),
            array(
			  "type" => "input",
			  "label" => "Gelar Belakang",
              "name" => "gelar_belakang",
			),
            array(
			  "type" => "input",
			  "label" => "Pangkat Lama",
              "name" => "pangkat_lama",
			),
            array(
			  "type" => "input",
			  "label" => "Pangkat Baru",
              "name" => "pangkat_baru",
			),
            array(
			  "type" => "select",
			  "label" => "Status Kepegawaian",
              "name" => "status_staff",
              "option" => array("Honor"=>"Honor","PYPK"=>"PYPK","CGTY"=>"CGTY","CPTY"=>"CPTY","GTY"=>"GTY","PTY"=>"PTY")
			),
		  );
        $data = array(
            'script' => 'staff/pengelolaan/script/js_staff_index',
            'app' => getAppList(),
            'form' => $form,
            'content' => 'staff/pengelolaan/index',
            'breadcumb' => buildBreadcumb(array('App','SINAI','Pengelolaan Staff'))
        );
        buildPage($data);
    }

    public function datatableStaff(){
        $appid = $this->uri->segment(4);
        $this->load->library('datatables');
        $this->datatables->select('*');
        $this->datatables->from('staff_data');
        $this->datatables->add_column('foto',function($row){
            if($row['foto']!=null) {
                return "<img src='".base_url()."uploads/".$row['foto']."' style='width:100px;height:100px'>";
            }
            return 'Belum diupload';
        });
        $this->datatables->add_column('lama_bekerja',function($row){
            $date1 = new DateTime($row['tanggal_masuk_kerja']);
            $date2 = $date1->diff(new DateTime(date("Y-m-d")));
            $string = $date2->y.' tahun'."\n";
            $string .= $date2->m.' bulan'."\n";
            $string .= $date2->d.' hari'."\n";
            return $string;
        });
        $this->datatables->add_column('action',function($row){
            $button = "<a href='".base_url()."staff/kelolastaff/detail/".$row['id']."' class='btn btn-info btn-xs'>detail</a>";
            $button .= "<button type='button' class='btn btn-danger btn-xs btnHapus' onclick='hapus(".$row['id'].")'>hapus</button>";
            return $button;
        });
        echo $this->datatables->generate();
    }

    public function detail() {
        $id = $this->uri->segment(4);
        $data['unit'] = $this->Model_form->optionUnit();
        $data['staff'] = $this->db->get_where('staff_data',array('id'=>$id))->row();
        $data['riwayat_pendidikan'] = $this->db->get_where('staff_pendidikan',array('staff_id'=>$id))->result();
        $data['riwayat_pelatihan'] = $this->db->get_where('staff_pelatihan',array('staff_id'=>$id))->result();
        $data['riwayat_jabatan'] = $this->db->get_where('staff_jabatan',array('staff_id'=>$id))->result();
        $data['riwayat_tugas'] = $this->db->get_where('staff_tugas_tambahan',array('staff_id'=>$id))->result();
        $data['riwayat_kepangkatan'] = $this->db->get_where('staff_kepangkatan',array('staff_id'=>$id))->result();
        $data['keluarga'] = $this->db->get_where('staff_pasangan',array('staff_id'=>$id))->result();
        $data['anak'] = $this->db->get_where('staff_anak',array('staff_id'=>$id))->result();
        $data['ortu'] = $this->db->get_where('staff_ortu',array('staff_id'=>$id))->result();
        $data['dpt'] = $this->db->get_where('staff_dpt',array('staff_id'=>$id))->result();
        $data['content'] = 'staff/pengelolaan/index_detail';
        $data['menu'] = 'pengelolaan';
        $data['script'] = 'staff/pengelolaan/script/js_staff_index';
        $data['breadcumb'] = buildBreadcumb(array('App','SINAI','Pengelolaan Staff', 'Detail Staff'));
        // $this->load->view('partials/wrapper_staff',$data);
        // $data = array(
        //     'script' => 'staff/pengelolaan/script/js_staff_index',
        //     'app' => getAppList(),
        //     'form' => $form,
        //     'content' => 'staff/pengelolaan/index',
        //     'breadcumb' => buildBreadcumb(array('App','SINAI','Pengelolaan Staff'))
        // );
        buildPage($data);
    }

    public function simpan() {

        $insert = array(
            "nama" => $this->input->post("nama"),
            "nik"=>	$this->input->post("nik"),
            "nip_npy"=>	$this->input->post("nip_npy"),	
            "agama"=>	$this->input->post("agama"),
            "jenis_kelamin" =>	$this->input->post("jenis_kelamin"),
            "email" =>	$this->input->post("email"),
            "alamat"  =>	$this->input->post("alamat"),	
            "tempat_lahir"	 =>	$this->input->post("tempat_lahir"),	
            "tanggal_lahir"	 =>	date('Y-m-d',strtotime($this->input->post("tanggal_lahir"))),	
            "no_hp" =>	$this->input->post("no_hp"),	
            "jenjang_pendidikan"=>	$this->input->post("jenjang_pendidikan"),	
            "tanggal_masuk_kerja" =>	date('Y-m-d',strtotime($this->input->post("tanggal_masuk_kerja"))),	
            "unit"	=>	$this->input->post("unit"),	
            "masa_kerja" =>	$this->input->post("masa_kerja"),	
            "berhenti_tanggal"	=>	($this->input->post("berhenti_tanggal")!="")?date('Y-m-d',strtotime($this->input->post("berhenti_tanggal"))):"",	
            "pensiun_tanggal"	=>	($this->input->post("pensiun_tanggal")!="")?date('Y-m-d',strtotime($this->input->post("pensiun_tanggal"))):"",
            "golongan_darah"=>	$this->input->post("golongan_darah"),	
            "gelar_depan"=>	$this->input->post("gelar_depan"),	
            "gelar_belakang"=>	$this->input->post("gelar_belakang"),	
            "pangkat_lama"=>	$this->input->post("pangkat_lama"),	
            "pangkat_baru"=>	$this->input->post("pangkat_baru"),	
            "status_staff"	=>	$this->input->post("status_staff"),	
        );

        $fileName = "";
        $message = "Data tersimpan";
        if(isset($_FILES['avatar'])) {
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'jpg|png';
            $config['max_size']             = 1024;
            $config['file_name']            = $insert['nik']."_avatar_".date("Ymdhis");

            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('avatar'))
            {
                $message = "Data tersimpan tanpa gambar, silahkan gunakan menu edit. eror : " .$this->upload->display_errors();
            }
            else
            {
                $data = $this->upload->data();
                $fileName = $data['file_name'];
                $insert["foto"] = $fileName;
            }
        }

        $this->db->trans_begin();

        $this->db->insert("staff_data",$insert);

        if($this->db->trans_status()!==FALSE) {
            $this->db->trans_commit();
            echo json_encode(array("msg"=>$message));
            exit();
        }
        $this->db->trans_rollback();
        $this->session->set_flashdata("status",$message);
        echo json_encode(array("msg"=>"Gagal Simpan Data"));
        exit();
    }


    public function ubah() {
        $id = $this->input->post("id");
        $update = array(
            "nama" => $this->input->post("nama"),
            "nik"=>	$this->input->post("nik"),
            "nip_npy"=>	$this->input->post("nip_npy"),	
            "agama"=>	$this->input->post("agama"),
            "jenis_kelamin" =>	$this->input->post("jenis_kelamin"),
            "email" =>	$this->input->post("email"),
            "alamat"  =>	$this->input->post("alamat"),	
            "tempat_lahir"	 =>	$this->input->post("tempat_lahir"),	
            "tanggal_lahir"	 =>	date('Y-m-d',strtotime($this->input->post("tanggal_lahir"))),	
            "no_hp" =>	$this->input->post("no_hp"),	
            "jenjang_pendidikan"=>	$this->input->post("jenjang_pendidikan"),	
            "tanggal_masuk_kerja" =>	date('Y-m-d',strtotime($this->input->post("tanggal_masuk_kerja"))),	
            "unit"	=>	$this->input->post("unit"),	
            "masa_kerja" =>	$this->input->post("masa_kerja"),	
            "berhenti_tanggal"	=>	date('Y-m-d',strtotime($this->input->post("berhenti_tanggal"))),	
            "pensiun_tanggal"	=>	date('Y-m-d',strtotime($this->input->post("pensiun_tanggal"))),
            "golongan_darah"=>	$this->input->post("golongan_darah"),	
            "gelar_depan"=>	$this->input->post("gelar_depan"),	
            "gelar_belakang"=>	$this->input->post("gelar_belakang"),	
            "pangkat_lama"=>	$this->input->post("pangkat_lama"),	
            "pangkat_baru"=>	$this->input->post("pangkat_baru"),	
            "status_staff"	=>	$this->input->post("status_staff"),	
        );
        $message = "";
        $fileName = "";
        if(isset($_FILES['avatar'])) {
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'jpg|png';
            $config['max_size']             = 1024;
            $config['file_name']            = $update['nik']."_avatar_".date("Ymdhis");

            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('avatar'))
            {
                $message = "Gambar gagal diupload. eror : " .$this->upload->display_errors();
            }
            else
            {
                $data = $this->upload->data();
                $fileName = $data['file_name'];
                $update["foto"] = $fileName;
            }
        }
        $message = "Data berhasil diubah";

        $this->db->where("id",$id);
        $this->db->update("staff_data",$update);

        $this->session->set_flashdata("status",$message);
        redirect(base_url()."staff/kelolastaff/detail/".$id);
    }

    public function simpanriwayatpendidikan() {
        $update = array(
            "staff_id" => $this->input->post("staff_id"),
            "tingkat_pendidikan" => $this->input->post("tingkat_pendidikan"),
            "nama_sekolah" => $this->input->post("nama_sekolah"),
            "jurusan" => $this->input->post("jurusan"),
            "tahun_masuk" => $this->input->post("tahun_masuk"),
            "tahun_lulus" => $this->input->post("tahun_lulus"),
        );
        $this->db->insert("staff_pendidikan",$update);
        $this->session->set_flashdata("status","Berhasil memproses data.");
        redirect(base_url()."staff/kelolastaff/detail/".$this->input->post('staff_id'));
    }

    public function hapusriwayatpendidikan() {
        $idstaff = $this->uri->segment(4);
        $idriwayat = $this->uri->segment(5);
        $this->db->where('id',$idriwayat);
        $this->db->delete('staff_pendidikan');
        $this->session->set_flashdata("status","Berhasil memproses data.");
        redirect(base_url()."staff/kelolastaff/detail/".$idstaff);
    }

    public function simpanriwayatpelatihan() {
        $update = array(
            "staff_id" => $this->input->post("staff_id"),
            "nama_riwayat" => $this->input->post("nama_riwayat"),
            "tempat" => $this->input->post("tempat"),
            "penyelenggara" => $this->input->post("penyelenggara"),
            "no_sttp" => $this->input->post("no_sttp"),
            "tanggal_sttp" => date('Y-m-d',strtotime($this->input->post("tanggal_sttp"))),
            "tanggal_mulai" => date('Y-m-d',strtotime($this->input->post("tanggal_mulai"))),
            "tanggal_selesai" => date('Y-m-d',strtotime($this->input->post("tanggal_selesai"))),
            "jumlah_jam" => $this->input->post("jumlah_jam")
        );
        $this->db->insert("staff_pelatihan",$update);
        $this->session->set_flashdata("status","Berhasil memproses data.");
        redirect(base_url()."staff/kelolastaff/detail/".$this->input->post('staff_id'));
    }

    public function hapusriwayatpelatihan() {
        $idstaff = $this->uri->segment(4);
        $idriwayat = $this->uri->segment(5);
        $this->db->where('id',$idriwayat);
        $this->db->delete('staff_pelatihan');
        $this->session->set_flashdata("status","Berhasil memproses data.");
        redirect(base_url()."staff/kelolastaff/detail/".$idstaff);
    }

    public function simpanriwayatjabatan() {
        $update = array(
            "staff_id" => $this->input->post("staff_id"),
            "jenis_jabatan" => $this->input->post("jenis_jabatan"),
            "nama_jabatan" => $this->input->post("nama_jabatan"),
            "unit_kerja" => $this->input->post("unit_kerja"),
            "nomor_sk" => $this->input->post("nomor_sk"),
            "tmt" => date('Y-m-d',strtotime($this->input->post("tmt"))),
            "tanggal_sk" => date('Y-m-d',strtotime($this->input->post("tanggal_sk"))),
            "pejabat_pengesah" => $this->input->post("pejabat_pengesah")
        );
        $this->db->insert("staff_jabatan",$update);
        $this->session->set_flashdata("status","Berhasil memproses data.");
        redirect(base_url()."staff/kelolastaff/detail/".$this->input->post('staff_id'));
    }

    public function hapusriwayatjabatan() {
        $idstaff = $this->uri->segment(4);
        $idriwayat = $this->uri->segment(5);
        $this->db->where('id',$idriwayat);
        $this->db->delete('staff_jabatan');
        $this->session->set_flashdata("status","Berhasil memproses data.");
        redirect(base_url()."staff/kelolastaff/detail/".$idstaff);
    }

    public function simpanriwayattugastambahan() {
        $update = array(
            "staff_id" => $this->input->post("staff_id"),
            "unit_kerja_id" => $this->input->post("unit_kerja_id"),
            "nama_tugas" => $this->input->post("nama_tugas"),
            "nomor_sk" => $this->input->post("nomor_sk"),
            "tmt" => date('Y-m-d',strtotime($this->input->post("tmt"))),
            "tanggal_sk" => date('Y-m-d',strtotime($this->input->post("tanggal_sk"))),
            "pejabat_pengesah" => $this->input->post("pejabat_pengesah")
        );
        $this->db->insert("staff_tugas_tambahan",$update);
        $this->session->set_flashdata("status","Berhasil memproses data.");
        redirect(base_url()."staff/kelolastaff/detail/".$this->input->post('staff_id'));
    }

    public function hapusriwayattugastambahan() {
        $idstaff = $this->uri->segment(4);
        $idriwayat = $this->uri->segment(5);
        $this->db->where('id',$idriwayat);
        $this->db->delete('staff_tugas_tambahan');
        $this->session->set_flashdata("status","Berhasil memproses data.");
        redirect(base_url()."staff/kelolastaff/detail/".$idstaff);
    }

    public function simpanriwayatkepangkatan() {
        $update = array(
            "staff_id" => $this->input->post("staff_id"),
            "pangkat_golongan" => $this->input->post("pangkat_golongan"),
            "regular_pilihan" => $this->input->post("regular_pilihan"),
            "nomor_sk" => $this->input->post("nomor_sk"),
            "tmt_pangkat" => date('Y-m-d',strtotime($this->input->post("tmt_pangkat"))),
            "tanggal_sk" => date('Y-m-d',strtotime($this->input->post("tanggal_sk"))),
            "pejabat_pengesah" => $this->input->post("pejabat_pengesah")
        );
        $this->db->insert("staff_kepangkatan",$update);
        $this->session->set_flashdata("status","Berhasil memproses data.");
        redirect(base_url()."staff/kelolastaff/detail/".$this->input->post('staff_id'));
    }

    public function hapusriwayatkepangkatan() {
        $idstaff = $this->uri->segment(4);
        $idriwayat = $this->uri->segment(5);
        $this->db->where('id',$idriwayat);
        $this->db->delete('staff_kepangkatan');
        $this->session->set_flashdata("status","Berhasil memproses data.");
        redirect(base_url()."staff/kelolastaff/detail/".$idstaff);
    }

    public function simpankeluarga() {
        $update = array(
            "staff_id" => $this->input->post("staff_id"),
            "nama_pasangan" => $this->input->post("nama_pasangan"),
            "tempat_lahir" => $this->input->post("tempat_lahir"),
            "tunjangan" => $this->input->post("tunjangan"),
            "tanggal_lahir" => date('Y-m-d',strtotime($this->input->post("tanggal_lahir"))),
            "tanggal_menikah" => date('Y-m-d',strtotime($this->input->post("tanggal_menikah"))),
            "pekerjaan" => $this->input->post("pekerjaan")
        );
        $this->db->insert("staff_pasangan",$update);
        $this->session->set_flashdata("status","Berhasil memproses data.");
        redirect(base_url()."staff/kelolastaff/detail/".$this->input->post('staff_id'));
    }

    public function hapuskeluarga() {
        $idstaff = $this->uri->segment(4);
        $idriwayat = $this->uri->segment(5);
        $this->db->where('id',$idriwayat);
        $this->db->delete('staff_pasangan');
        $this->session->set_flashdata("status","Berhasil memproses data.");
        redirect(base_url()."staff/kelolastaff/detail/".$idstaff);
    }

    public function simpananak() {
        $update = array(
            "staff_id" => $this->input->post("staff_id"),
            "nama_anak" => $this->input->post("nama_anak"),
            "tempat_lahir" => $this->input->post("tempat_lahir"),
            "status_anak" => $this->input->post("status_anak"),
            "tanggal_lahir" => date('Y-m-d',strtotime($this->input->post("tanggal_lahir"))),
            "jenis_kelamin" => $this->input->post("jenis_kelamin"),
            "pendidikan_terakhir" => $this->input->post("pendidikan_terakhir"),
            "anak_ke" => $this->input->post("anak_ke")
        );
        $this->db->insert("staff_anak",$update);
        $this->session->set_flashdata("status","Berhasil memproses data.");
        redirect(base_url()."staff/kelolastaff/detail/".$this->input->post('staff_id'));
    }

    public function hapusanak() {
        $idstaff = $this->uri->segment(4);
        $idriwayat = $this->uri->segment(5);
        $this->db->where('id',$idriwayat);
        $this->db->delete('staff_anak');
        $this->session->set_flashdata("status","Berhasil memproses data.");
        redirect(base_url()."staff/kelolastaff/detail/".$idstaff);
    }

    public function simpanortu() {
        $update = array(
            "staff_id" => $this->input->post("staff_id"),
            "nama" => $this->input->post("nama"),
            "tempat_lahir" => $this->input->post("tempat_lahir"),
            "tanggal_lahir" => date('Y-m-d',strtotime($this->input->post("tanggal_lahir"))),
            "jenis_kelamin" => $this->input->post("jenis_kelamin"),
            "alamat" => $this->input->post("alamat"),
            "pendidikan_terakhir" => $this->input->post("pendidikan_terakhir")
        );
        $this->db->insert("staff_ortu",$update);
        $this->session->set_flashdata("status","Berhasil memproses data.");
        redirect(base_url()."staff/kelolastaff/detail/".$this->input->post('staff_id'));
    }

    public function hapusortu() {
        $idstaff = $this->uri->segment(4);
        $idriwayat = $this->uri->segment(5);
        $this->db->where('id',$idriwayat);
        $this->db->delete('staff_ortu');
        $this->session->set_flashdata("status","Berhasil memproses data.");
        redirect(base_url()."staff/kelolastaff/detail/".$idstaff);
    }

    public function simpannilai() {
        $update = array(
            "staff_id" => $this->input->post("staff_id"),
            "tahun" => $this->input->post("tahun"),
            "nilai" => $this->input->post("nilai")
        );
        $this->db->insert("staff_dpt",$update);
        $this->session->set_flashdata("status","Berhasil memproses data.");
        redirect(base_url()."staff/kelolastaff/detail/".$this->input->post('staff_id'));
    }

    public function hapusnilai() {
        $idstaff = $this->uri->segment(4);
        $idriwayat = $this->uri->segment(5);
        $this->db->where('id',$idriwayat);
        $this->db->delete('staff_dpt');
        $this->session->set_flashdata("status","Berhasil memproses data.");
        redirect(base_url()."staff/kelolastaff/detail/".$idstaff);
    }

    public function hapus() {
        //butuh helper untuk cek apakah ta digunakan atau tidak
        
        $this->db->trans_begin();

        $this->db->where('id',$this->input->post('id'));
        $this->db->delete("staff_data");

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
