<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporanstaff extends CI_Controller {

    function __construct() {
        parent::__construct();
        isAuthenticated();
        $this->load->model("Model_form");
    }

	public function index()
	{   
        $data = array(
            'staff' => $this->db->get('staff_data')->result(),
            'script' => 'staff/laporan/script/js_pegawai_index',
            'app' => getAppList(),
            'content' => 'staff/laporan/index',
            'breadcumb' => buildBreadcumb(array('App','SINAI','Laporan Staff'))
        );
        buildPage($data);
    }


    public function detailpegawai($id)
	{
        $data['content'] = 'staff/laporan/index_detail';
        $data['menu'] = 'laporan';
        $data['script'] = 'staff/laporan/script/js_pegawai_index';
        $data['riwayat_pendidikan'] = $this->db->get_where('staff_pendidikan',array('staff_id'=>$id))->result();
        $data['riwayat_pelatihan'] = $this->db->get_where('staff_pelatihan',array('staff_id'=>$id))->result();
        $data['riwayat_jabatan'] = $this->db->get_where('staff_jabatan',array('staff_id'=>$id))->result();
        $data['riwayat_tugas'] = $this->db->get_where('staff_tugas_tambahan',array('staff_id'=>$id))->result();
        $data['riwayat_kepangkatan'] = $this->db->get_where('staff_kepangkatan',array('staff_id'=>$id))->result();
        $data['keluarga'] = $this->db->get_where('staff_pasangan',array('staff_id'=>$id))->result();
        $data['anak'] = $this->db->get_where('staff_anak',array('staff_id'=>$id))->result();
        $data['ortu'] = $this->db->get_where('staff_ortu',array('staff_id'=>$id))->result();
        $data['dpt'] = $this->db->get_where('staff_dpt',array('staff_id'=>$id))->result();
        $appList = getAppList();
        $data['staff'] = $this->db->get('staff_data',array('id'=>$id))->row();
        $data['riwayat'] = $this->db->get('staff_kenaikan_jabatan',array('staff_id'=>$id))->result();
        $data['breadcumb'] = buildBreadcumb(array('App','SINAI','Detail Laporan Staff'));
		// $this->load->view('partials/wrapper_staff',$data);
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
            // $button = "<button type='button' class='btn btn-warning btn-xs' onclick='edit(".json_encode($row).")'><i class='fa fa-edit'></i></button>|";
            $button = "<a href='".base_url()."staff/laporanstaff/detailpegawai/".$row['id']."' class='btn btn-info btn-xs' ><i class='fa fa-search'></i> </a>";
            // $button .= "<button type='button' class='btn btn-danger btn-xs btnHapus' onclick='hapus(".$row['id'].",".$row['app_id'].")'><i class='fa fa-trash'></i></button>";
            return $button;
        });
        echo $this->datatables->generate();
	}

    public function downloaddetail() {

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

        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "cetak-staff.pdf";
        $this->pdf->load_view('staff/laporan/pdfbiodata', $data);
    }

}
