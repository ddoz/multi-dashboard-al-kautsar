<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homedma extends CI_Controller {

    function __construct() {
        parent::__construct();
        isAuthenticated();
    }

	public function index()
	{
        $data['content'] = 'dma/home/dashboard_index';
        $data['menu'] = 'home';
        $data['script'] = 'dma/home/script/js_dashboard';
        
		$data['breadcumb'] = buildBreadcumb(array('App','SIDMA','Dashboard'));
        $data['laporan'] = $this->db->get('dma_pelaporan')->num_rows();
        $data['layanan'] = $this->db->get('dma_layanan')->num_rows();
        $data['barang'] = $this->db->get('dma_barang')->num_rows();
        $data['teknisi'] = $this->db->get('dma_teknisi')->num_rows();
		// $this->load->view('partials/wrapper_dma',$data);
        buildPage($data);
	}

    public function cari() {
        $key = $this->input->get('key');
        $data['content'] = 'siswa/home/dashboard_cari';
        $data['menu'] = 'home';
        $data['script'] = 'siswa/home/script/js_dashboard';
        $this->db->select('siswa.*,kelas.nama_kelas,siswa_kelas.status as status_kelas');
        $this->db->from('siswa');
        $this->db->join('siswa_kelas','siswa_kelas.siswa_id=siswa.id');
        $this->db->join('kelas','kelas.id=siswa_kelas.kelas_id');
        $this->db->like('nama', $key);
        $this->db->or_like('nisn', $key);
        $qdata = $this->db->get()->result();
        $data['siswa'] = $qdata;
        $this->load->view('partials/wrapper_siswa',$data);
    }

    public function carispesifik() {
        $key = $this->input->get('kelas');
        $data['content'] = 'siswa/home/dashboard_cari';
        $data['menu'] = 'home';
        $data['script'] = 'siswa/home/script/js_dashboard';
        $this->db->select('siswa.*,kelas.nama_kelas,siswa_kelas.status as status_kelas');
        $this->db->from('siswa');
        $this->db->join('siswa_kelas','siswa_kelas.siswa_id=siswa.id');
        $this->db->join('kelas','kelas.id=siswa_kelas.kelas_id');
        $this->db->where('kelas.id', $key);
        $qdata = $this->db->get()->result();
        $data['siswa'] = $qdata;
        $this->load->view('partials/wrapper_siswa',$data);
    }

    public function detail() {
        $key = $this->uri->segment(4);
        $data['content'] = 'siswa/home/dashboard_detail';
        $data['menu'] = 'home';
        $data['script'] = 'siswa/home/script/js_dashboard';
        $this->db->select('siswa.*,kelas.nama_kelas,siswa_kelas.status as status_kelas');
        $this->db->from('siswa');
        $this->db->join('siswa_kelas','siswa_kelas.siswa_id=siswa.id');
        $this->db->join('kelas','kelas.id=siswa_kelas.kelas_id');
        $this->db->where('siswa.id', $key);
        $this->db->where('siswa_kelas.status','1');
        $qdata = $this->db->get()->row();
        $data['siswa'] = $qdata;
        $this->load->view('partials/wrapper_siswa',$data);
    }

}
