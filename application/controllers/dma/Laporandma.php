<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporandma extends CI_Controller {

    function __construct() {
        parent::__construct();
        isAuthenticated();
    }

    public function index() {
        $this->laporan();
    }

	public function laporan()
	{
        $data['content'] = 'dma/laporan/laporan_index';
        $data['menu'] = 'laporan';
        $data['script'] = 'dma/laporan/script/js_laporan_index';
        $appList = getAppList();
		$data['breadcumb'] = buildBreadcumb(array('App','SIDMA','Laporan'));
          // $this->load->view('partials/wrapper_dma',$data);
        buildPage($data);
    }

    public function lihat() {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $this->db->select("dma_pelaporan.id,dma_perbaikan.id as id_perbaikan,dma_pelaporan.start_at,dma_pelaporan.done_at,dma_perbaikan.keterangan_hasil,dma_perbaikan.keterangan_proses,dma_pelaporan.created_at,users.nama,dma_gedung.nama_gedung,dma_ruangan.nama_ruangan");
        $this->db->from('dma_pelaporan');
        $this->db->join('dma_gedung','dma_gedung.id=dma_pelaporan.id_gedung');
        $this->db->join('dma_ruangan','dma_ruangan.id_gedung=dma_gedung.id');
        $this->db->join('dma_perbaikan','dma_perbaikan.id_laporan=dma_pelaporan.id');
        $this->db->join('users','users.id=dma_pelaporan.user_lapor');
        $this->db->where('MONTH(dma_pelaporan.created_at)',$bulan);
        $this->db->where('YEAR(dma_pelaporan.created_at)',$tahun);
        $hasil = $this->db->get()->result();
        $arr_bulan = array(
            "1" => "Januari",
            "2" => "Februari",
            "3" => "Maret",
            "4" => "April",
            "5" => "Mei",
            "6" => "Juni",
            "7" => "Juli",
            "8" => "Agustus",
            "9" => "September",
            "10" => "Oktober",
            "11" => "November",
            "12" => "Desember",
        );
        $data['tabel'] = $hasil;
        $data['bulan'] = $arr_bulan[$bulan];
        $data['tahun'] = $tahun;
        $this->load->view('dma/laporan/lihat',$data);

    }

    public function perbaikan()
	{
        $data['content'] = 'dma/laporan/perbaikan';
        $data['menu'] = 'laporan';
        $data['script'] = 'dma/laporan/script/js_perbaikan';
        $appList = getAppList();
        $ta = [];
        $kelas = [];
        
		$this->load->view('partials/wrapper_dma',$data);
    }
    
}
