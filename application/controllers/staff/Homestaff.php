<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homestaff extends CI_Controller {

    function __construct() {
        parent::__construct();
        isAuthenticated();
    }

	public function index()
	{
        $appList = getAppList();
        
        $data = array(
            'total' => $this->db->get('staff_data')->num_rows(),
            'content' => 'staff/home/index',
            'breadcumb' => buildBreadcumb(array('App','SINAI','Home'))
        );
        buildPage($data);
	}

    public function cari() {
        $key = $this->input->get('key');
        $data['script'] = 'staff/home/script/js_dashboard';
        $this->db->select('staff_data.*');
        $this->db->from('staff_data');
        $this->db->like('nama', $key);
        $qdata = $this->db->get()->result();
        $data['staff'] = $qdata;
        $data = array(
            'content' => 'staff/home/index_cari',
            'staff' => $qdata,
            'breadcumb' => buildBreadcumb(array('App','SIMSIAK','Home','Hasil Pencarian'))
        );
        buildPage($data);
    }

    public function detail() {
        $key = $this->uri->segment(4);
        $data['script'] = 'staff/home/script/js_dashboard';
        $this->db->select('staff_data.*');
        $this->db->from('staff_data');
        $this->db->where('staff_data.id', $key);
        $qdata = $this->db->get()->row();

        $riwayat_pendidikan = $this->db->get_where('staff_pendidikan',array('staff_id'=>$key))->result();
        $riwayat_pelatihan = $this->db->get_where('staff_pelatihan',array('staff_id'=>$key))->result();

        $this->db->from('staff_jabatan');
        $this->db->join('unit','unit.id=staff_jabatan.unit_kerja');
        $riwayat_jabatan = $this->db->where(array('staff_id'=>$key))->get()->result();
        $riwayat_tambahan = $this->db->get_where('staff_jabatan',array('staff_id'=>$key))->result();

        $this->db->from('staff_tugas_tambahan');
        $this->db->join('unit','unit.id=staff_tugas_tambahan.unit_kerja_id');
        $riwayat_tugas = $this->db->where(array('staff_id'=>$key))->get()->result();

        $riwayat_kepangkatan = $this->db->get_where('staff_kepangkatan',array('staff_id'=>$key))->result();
        $keluarga = $this->db->get_where('staff_pasangan',array('staff_id'=>$key))->result();
        $anak = $this->db->get_where('staff_anak',array('staff_id'=>$key))->result();
        $ortu = $this->db->get_where('staff_ortu',array('staff_id'=>$key))->result();
        $dpt = $this->db->get_where('staff_dpt',array('staff_id'=>$key))->result();
         
        $data = array(
            'riwayat_pelatihan' => $riwayat_pelatihan,
            'riwayat_pendidikan' => $riwayat_pendidikan,
            'riwayat_jabatan' => $riwayat_jabatan,
            'riwayat_tugas' => $riwayat_tugas,
            'riwayat_kepangkatan' => $riwayat_kepangkatan,
            'keluarga' => $keluarga,
            'anak' => $anak,
            'ortu' => $ortu,
            'dpt' => $dpt,
            'content' => 'staff/home/index_detail',
            'staff' => $qdata,
            'breadcumb' => buildBreadcumb(array('App','SINAI','Home','Hasil Pencarian','Detail Staff'))
        );
        buildPage($data);
    }

}
