<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengelolaansiswakelas extends CI_Controller {

    function __construct() {
        parent::__construct();
        isAuthenticated();
    }

	public function index()
	{
        $data['content'] = 'siswa/pengelolaan/siswakelas';
        $data['menu'] = 'pengelolaan';
        $data['script'] = 'siswa/pengelolaan/script/js_siswakelas';
        $data['app'] = getAppList();
		$this->load->view('partials/wrapper_siswa',$data);
    }

    public function kenaikankelas()
	{
        $data['content'] = 'siswa/pengelolaan/siswakelas_kenaikankelas';
        $data['menu'] = 'pengelolaan';
        $data['script'] = 'siswa/pengelolaan/script/js_siswakelas';
        $data['app'] = getAppList();
		$this->load->view('partials/wrapper_siswa',$data);
    }

    public function submitnaikkelas() {
        echo "<pre>";
        print_r($this->input->post());

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
        redirect(base_url().'siswa/pengelolaansiswakelas/kenaikankelas');
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
        $output = "<form action='".base_url()."siswa/pengelolaansiswakelas/submitnaikkelas' method='post'><div class='table-reponsive'><table class='table table-bordered'>";
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
    
    public function datatableSiswaKelas(){
        $appid = $this->uri->segment(4);
        $this->load->library('datatables');
        $this->datatables->select('siswa.*,siswa_kelas.id as siswa_kelas_id,siswa_kelas.status,kelas.nama_kelas,siswa_app.app_id');
        $this->datatables->from('siswa');
        $this->datatables->join('siswa_app','siswa_app.siswa_id=siswa.id');
        $this->datatables->join('siswa_kelas','siswa_kelas.siswa_id=siswa.id');
        $this->datatables->join('kelas','kelas.id=siswa_kelas.kelas_id');
        $this->datatables->where('siswa_app.app_id',$appid);
        $this->datatables->add_column('action',function($row){
            $button = "<button type='button' class='btn btn-warning btn-xs' onclick='edit(".json_encode($row).")'><i class='fa fa-edit'></i></button>|";
            $button .= "<button type='button' class='btn btn-danger btn-xs btnHapus' onclick='hapus(".$row['siswa_kelas_id'].",".$row['app_id'].")'><i class='fa fa-trash'></i></button>";
            return $button;
        });
        echo $this->datatables->generate();
	}



}
