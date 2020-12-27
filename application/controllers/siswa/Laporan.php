<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    function __construct() {
        parent::__construct();
        isAuthenticated();
    }

    public function index() {
        $this->aktif();
    }

	public function aktif()
	{
        $data['content'] = 'siswa/laporan/aktif';
        $data['menu'] = 'laporan';
        $data['script'] = 'siswa/home/script/js_dashboard';
        $appList = getAppList();
        $ta = [];
        $kelas = [];
        foreach($appList as $lit) {
            //get tahun akademik
            $this->db->select('tahun_akademik.*,app.app');
            $this->db->from('tahun_akademik');
            $this->db->join('app','app.id=tahun_akademik.app_id');
            $this->db->where('tahun_akademik.app_id',$lit->app_id);
            $getTa = $this->db->get();
            if($getTa->num_rows() > 0) {
                array_push($ta,$getTa->result());
            }

            //get kelas
            $this->db->select('kelas.*,app.app');
            $this->db->from('kelas');
            $this->db->join('app','app.id=kelas.app_id');
            $this->db->where('kelas.app_id',$lit->app_id);
            $getKelas = $this->db->get();
            if($getKelas->num_rows() > 0) {
                array_push($kelas,$getKelas->result());
            }
        }
        $data['ta'] = $ta;
        $data['kelas'] = $kelas;
        $data['app'] = $appList;
        $this->db->select('siswa.*,kelas.nama_kelas,siswa_kelas.status as status_kelas');
        $this->db->from('siswa');
        $this->db->join('siswa_kelas','siswa_kelas.siswa_id=siswa.id');
        $this->db->join('kelas','kelas.id=siswa_kelas.kelas_id');
        $this->db->where('siswa_kelas.status', '1');
        $qdata = $this->db->get()->result();
        $data['siswa'] = $qdata;
        // echo "<pre>";
        // print_r($kelas);die();
		$this->load->view('partials/wrapper_siswa',$data);
    }
    
    public function alumni()
	{
        $data['content'] = 'siswa/laporan/alumni';
        $data['menu'] = 'laporan';
        $data['script'] = 'siswa/home/script/js_dashboard';
        $appList = getAppList();
        $ta = [];
        $kelas = [];
        foreach($appList as $lit) {
            //get tahun akademik
            $this->db->select('tahun_akademik.*,app.app');
            $this->db->from('tahun_akademik');
            $this->db->join('app','app.id=tahun_akademik.app_id');
            $this->db->where('tahun_akademik.app_id',$lit->app_id);
            $getTa = $this->db->get();
            if($getTa->num_rows() > 0) {
                array_push($ta,$getTa->result());
            }

            //get kelas
            $this->db->select('kelas.*,app.app');
            $this->db->from('kelas');
            $this->db->join('app','app.id=kelas.app_id');
            $this->db->where('kelas.app_id',$lit->app_id);
            $getKelas = $this->db->get();
            if($getKelas->num_rows() > 0) {
                array_push($kelas,$getKelas->result());
            }
        }
        $data['ta'] = $ta;
        $data['kelas'] = $kelas;
        $data['app'] = $appList;
        // echo "<pre>";
        // print_r($kelas);die();
		$this->load->view('partials/wrapper_siswa',$data);
    }
    
    public function grafik()
	{
        $data['content'] = 'siswa/laporan/grafik';
        $data['menu'] = 'laporan';
        $data['script'] = 'siswa/home/script/js_dashboard';
        $appList = getAppList();
        $ta = [];
        $kelas = [];
        foreach($appList as $lit) {
            //get tahun akademik
            $this->db->select('tahun_akademik.*,app.app');
            $this->db->from('tahun_akademik');
            $this->db->join('app','app.id=tahun_akademik.app_id');
            $this->db->where('tahun_akademik.app_id',$lit->app_id);
            $getTa = $this->db->get();
            if($getTa->num_rows() > 0) {
                array_push($ta,$getTa->result());
            }

            //get kelas
            $this->db->select('kelas.*,app.app');
            $this->db->from('kelas');
            $this->db->join('app','app.id=kelas.app_id');
            $this->db->where('kelas.app_id',$lit->app_id);
            $getKelas = $this->db->get();
            if($getKelas->num_rows() > 0) {
                array_push($kelas,$getKelas->result());
            }
        }
        $data['ta'] = $ta;
        $data['kelas'] = $kelas;
        $data['app'] = $appList;
        // echo "<pre>";
        // print_r($kelas);die();
		$this->load->view('partials/wrapper_siswa',$data);
	}
}
