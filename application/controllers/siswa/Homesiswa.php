<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homesiswa extends CI_Controller {

    function __construct() {
        parent::__construct();
        isAuthenticated();
    }

	public function index()
	{
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
        $data = array(
            'ta' => $ta,
            'kelas' => $kelas,
            'app' => $appList,
            'content' => 'siswa/home/index',
            'breadcumb' => buildBreadcumb(array('App','SIMSIAK','Home'))
        );
        buildPage($data);
	}

    public function cari() {
        $key = $this->input->get('key');
        $data['script'] = 'siswa/home/script/js_dashboard';
        $this->db->select('siswa.*,kelas.nama_kelas,siswa_kelas.status as status_kelas');
        $this->db->from('siswa');
        $this->db->join('siswa_kelas','siswa_kelas.siswa_id=siswa.id');
        $this->db->join('kelas','kelas.id=siswa_kelas.kelas_id');
        $this->db->where('siswa_kelas.status','1');
        $this->db->like('nama', $key);
        $this->db->or_like('nisn', $key);
        $qdata = $this->db->get()->result();
        $data['siswa'] = $qdata;
        $data = array(
            'content' => 'siswa/home/index_cari',
            'siswa' => $qdata,
            'breadcumb' => buildBreadcumb(array('App','SIMSIAK','Home','Hasil Pencarian'))
        );
        buildPage($data);
    }

    public function carispesifik() {
        $key = $this->input->get('kelas');
        $data['script'] = 'siswa/home/script/js_dashboard';
        $this->db->select('siswa.*,kelas.nama_kelas,siswa_kelas.status as status_kelas');
        $this->db->from('siswa');
        $this->db->join('siswa_kelas','siswa_kelas.siswa_id=siswa.id');
        $this->db->join('kelas','kelas.id=siswa_kelas.kelas_id');
        $this->db->where('kelas.id', $key);
        $qdata = $this->db->get()->result();
        
        $data = array(
            'content' => 'siswa/home/index_detail',
            'siswa' => $qdata,
            'breadcumb' => buildBreadcumb(array('App','SIMSIAK','Home','Hasil Pencarian'))
        );
        buildPage($data);
    }

    public function detail() {
        $key = $this->uri->segment(4);
        $data['script'] = 'siswa/home/script/js_dashboard';
        $this->db->select('siswa.*,kelas.nama_kelas,siswa_kelas.status as status_kelas');
        $this->db->from('siswa');
        $this->db->join('siswa_kelas','siswa_kelas.siswa_id=siswa.id');
        $this->db->join('kelas','kelas.id=siswa_kelas.kelas_id');
        $this->db->where('siswa.id', $key);
        $this->db->where('siswa_kelas.status','1');
        $qdata = $this->db->get()->row();
         
        $data = array(
            'content' => 'siswa/home/index_detail',
            'siswa' => $qdata,
            'breadcumb' => buildBreadcumb(array('App','SIMSIAK','Home','Hasil Pencarian','Detail Siswa'))
        );
        buildPage($data);
    }

}
