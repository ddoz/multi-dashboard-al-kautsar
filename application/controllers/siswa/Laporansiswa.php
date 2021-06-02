<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Laporansiswa extends CI_Controller {

    function __construct() {
        parent::__construct();
        isAuthenticated();
        $this->load->model("Model_form");
    }

    public function index() {
        $siswa_grouping = [];
        $no_kk = $this->db->query("SELECT no_kk FROM siswa GROUP BY no_kk")->result();
        foreach($no_kk as $kk) {
            $this->db->select('siswa.*,siswa_kelas.id as siswa_kelas_id,siswa_kelas.status,kelas.nama_kelas');
            $this->db->from('siswa');
            $this->db->join('siswa_app','siswa_app.siswa_id=siswa.id');
            $this->db->join('siswa_kelas','siswa_kelas.siswa_id=siswa.id');
            $this->db->join('kelas','kelas.id=siswa_kelas.kelas_id');
            $this->db->where('siswa.no_kk',$kk->no_kk);
            $this->db->where('siswa_app.status','1');
            $this->db->where('siswa_kelas.status','1');
            $this->db->group_by('siswa.id');
            $a = $this->db->get();
            if($a->num_rows()>1) {
                $siswa_grouping[$kk->no_kk] = $a->result();
            }
        }
        $ta = [];
        $kelas = [];
        $appList = getAppList();
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
            'script' => 'siswa/home/script/js_dashboard',
            'app' => getAppList(),
            'content' => 'siswa/laporan/keluargasiswa',
            'breadcumb' => buildBreadcumb(array('App','SIMSIAK','Laporan Siswa'))
        );
        buildPage($data);
    }

    public function export() {

        // print_r($this->input->post());

        $kelas = $this->db->get_where('kelas',array('id' => $this->input->post('kelas')))->row();
        $ta = $this->db->get_where('tahun_akademik',array('id' => $this->input->post('ta')))->row();
        $unit = "";
        if($kelas != null) {
            $unit = $this->db->get_where('app',array('id' => $kelas->app_id))->row()->app;
        }

        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->join('siswa_kelas','siswa_kelas.siswa_id=siswa.id');
        $this->db->join('kelas','kelas.id=siswa_kelas.kelas_id');
        $this->db->where('kelas.id',$this->input->post('kelas'));
        $this->db->where('siswa_kelas.tahun_akademik_id',$this->input->post('ta'));
        $data = $this->db->get()->result();

        $spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
        
        $style = array(
            'alignment' => array(
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            )
        );
    
        $spreadsheet->getActiveSheet()->mergeCells('A1:AE1');
        $spreadsheet->getActiveSheet()->getStyle('A1:AE1')
                ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        $spreadsheet->getActiveSheet()->mergeCells('A2:AE2');
        $spreadsheet->getActiveSheet()->getStyle('A2:AE2')
                ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        
        $spreadsheet->getActiveSheet()->mergeCells('A3:AE3');
        $spreadsheet->getActiveSheet()->getStyle('A3:AE3')
                ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);


        $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\HeaderFooterDrawing();
        $drawing->setWorksheet($spreadsheet->getActiveSheet());
        $drawing->setName('Logo');
        $drawing->setDescription('Logo');
        $drawing->setPath('./assets/img/alkautsar.png');
        $drawing->setCoordinates('K1');
        $drawing->setHeight(80);
        $drawing->getShadow()->setVisible(true);

        $tahun_akademik = $ta->tahun_akademik;
        $sheet->setCellValue('A1', 'REKAPITULASI BIODATA SISWA');
        $sheet->setCellValue('A2', "UNIT $unit TP. $tahun_akademik");
        $sheet->setCellValue('A3', 'JL. Soekarno Hatta Rajabasa Bandar Lampung Telp. 0721-788410');

        $kelas_nama = $kelas->nama_kelas;
        $sheet->setCellValue('A5', 'Kelas');
        $sheet->setCellValue('B5', "$kelas_nama");

        $spreadsheet->getActiveSheet()->mergeCells('A6:A7');
        $spreadsheet->getActiveSheet()->getStyle('A6:A7')
                ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $sheet->setCellValue('A6', 'NO');
        $spreadsheet->getActiveSheet()->mergeCells('B6:B7');
        $spreadsheet->getActiveSheet()->getStyle('B6:B7')
                ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $sheet->setCellValue('B6', 'Nama Lengkap');
        $spreadsheet->getActiveSheet()->mergeCells('C6:C7');
        $spreadsheet->getActiveSheet()->getStyle('C6:C7')
                ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $sheet->setCellValue('C6', 'JK');
        $spreadsheet->getActiveSheet()->mergeCells('D6:D7');
        $spreadsheet->getActiveSheet()->getStyle('D6:D7')
                ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $sheet->setCellValue('D6', 'NIS');
        $spreadsheet->getActiveSheet()->mergeCells('E6:E7');
        $spreadsheet->getActiveSheet()->getStyle('E6:E7')
                ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $sheet->setCellValue('E6', 'NISN');
        $spreadsheet->getActiveSheet()->mergeCells('F6:F7');
        $spreadsheet->getActiveSheet()->getStyle('F6:F7')
                ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $sheet->setCellValue('F6', 'Tempat Lahir');
        $spreadsheet->getActiveSheet()->mergeCells('G6:G7');
        $spreadsheet->getActiveSheet()->getStyle('G6:G7')
                ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $sheet->setCellValue('G6', 'Tanggal Lahir');
        $spreadsheet->getActiveSheet()->mergeCells('H6:H7');
        $spreadsheet->getActiveSheet()->getStyle('H6:H7')
                ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $sheet->setCellValue('H6', 'NIK');
        $spreadsheet->getActiveSheet()->mergeCells('I6:I7');
        $spreadsheet->getActiveSheet()->getStyle('I6:I7')
                ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $sheet->setCellValue('I6', 'Agama');

        $spreadsheet->getActiveSheet()->mergeCells('J6:Q6');
        $spreadsheet->getActiveSheet()->getStyle('J6:Q7')
                ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('J6', 'Alamat Tempat Tinggal Siswa');
        $sheet->setCellValue('J7', 'Alamat');
        $sheet->setCellValue('K7', 'RT');
        $sheet->setCellValue('L7', 'RW');
        $sheet->setCellValue('M7', 'Dusun');
        $sheet->setCellValue('N7', 'Kelurahan');
        $sheet->setCellValue('O7', 'Kecamatan');
        $sheet->setCellValue('P7', 'Kode Pos');
        $sheet->setCellValue('Q7', 'Telpon');

        $spreadsheet->getActiveSheet()->mergeCells('R6:R7');
        $spreadsheet->getActiveSheet()->getStyle('R6:R7')
                ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $sheet->setCellValue('R6', 'No HP Siswa');

        $spreadsheet->getActiveSheet()->mergeCells('S6:S7');
        $spreadsheet->getActiveSheet()->getStyle('S6:S7')
                ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $sheet->setCellValue('S6', 'SKHUN');

        $spreadsheet->getActiveSheet()->mergeCells('T6:W6');
        $spreadsheet->getActiveSheet()->getStyle('T6:W6')
                ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('T6', 'Data Ayah');
        $sheet->setCellValue('T7', 'Nama');
        $sheet->setCellValue('U7', 'Pekerjaan');
        $sheet->setCellValue('V7', 'Penghasilan');
        $sheet->setCellValue('W7', 'No. HP');

        $spreadsheet->getActiveSheet()->mergeCells('X6:AA6');
        $spreadsheet->getActiveSheet()->getStyle('X6:AA6')
                ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('X6', 'Data Ibu');
        $sheet->setCellValue('X7', 'Nama');
        $sheet->setCellValue('Y7', 'Pekerjaan');
        $sheet->setCellValue('Z7', 'Penghasilan');
        $sheet->setCellValue('AA7', 'No. HP');

        $spreadsheet->getActiveSheet()->mergeCells('AB6:AB7');
        $spreadsheet->getActiveSheet()->getStyle('AB6:AB7')
                ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $sheet->setCellValue('AB6', 'Sekolah Asal');

        $spreadsheet->getActiveSheet()->mergeCells('AC6:AC7');
        $spreadsheet->getActiveSheet()->getStyle('AC6:AC7')
                ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
                ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $sheet->setCellValue('AC6', 'Alamat Tempat Tinggal');

        $spreadsheet->getActiveSheet()->mergeCells('AD6:AD7');
        $spreadsheet->getActiveSheet()->getStyle('AD6:AD7')
                ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $sheet->setCellValue('AD6', 'Tahun Masuk');

        $spreadsheet->getActiveSheet()->mergeCells('AE6:AE7');
        $spreadsheet->getActiveSheet()->getStyle('AE6:AE7')
                ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $sheet->setCellValue('AE6', 'No. VA');

        $inc = 8;
        foreach ($data as $key => $val) {
            
            $sheet->setCellValue("A$inc", $key+1);
            
            $sheet->setCellValue("B$inc", $val->nama);
            
            $sheet->setCellValue("C$inc", $val->jenis_kelamin);

            $sheet->setCellValue("D$inc", $val->nis);

            $sheet->setCellValue("E$inc", $val->nisn);

            $sheet->setCellValue("F$inc", $val->tempat_lahir);

            $sheet->setCellValue("G$inc", $val->tanggal_lahir);

            $sheet->setCellValue("H$inc", $val->nik);

            $sheet->setCellValue("I$inc", $val->agama);

            // $sheet->setCellValue("J$inc", 'Alamat Tempat Tinggal Siswa');
            $sheet->setCellValue("J$inc", $val->alamat_tempat_tinggal);
            $sheet->setCellValue("K$inc", $val->rt);
            $sheet->setCellValue("L$inc", $val->rw);
            $sheet->setCellValue("M$inc", $val->dusun);
            $sheet->setCellValue("N$inc", $val->kelurahan);
            $sheet->setCellValue("O$inc", $val->kecamatan);
            $sheet->setCellValue("P$inc", $val->kode_pos);
            $sheet->setCellValue("Q$inc", $val->telepon);

            $sheet->setCellValue("R$inc", $val->no_hp);

            $sheet->setCellValue("S$inc", $val->skhun);

            // $sheet->setCellValue("T$inc", 'Data Ayah');
            $sheet->setCellValue("T$inc", $val->ayah_nama);
            $sheet->setCellValue("U$inc", $val->ayah_pekerjaan);
            $sheet->setCellValue("V$inc", $val->ayah_penghasilan);
            $sheet->setCellValue("W$inc", $val->ayah_hp);

            // $sheet->setCellValue('X6', 'Data Ibu');
            $sheet->setCellValue("X$inc", $val->ibu_nama);
            $sheet->setCellValue("Y$inc", $val->ibu_pekerjaan);
            $sheet->setCellValue("Z$inc", $val->ibu_penghasilan);
            $sheet->setCellValue("AA$inc", $val->ibu_hp);

            $sheet->setCellValue("AB$inc", $val->sekolah_asal);
            $sheet->setCellValue("AC$inc", $val->alamat_tempat_tinggal);
            $sheet->setCellValue("AD$inc", $val->tahun_masuk);
            $sheet->setCellValue("AE$inc", $val->nomor_va);

            $inc++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'rekapitulasi-siswa';
        
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
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
    
    public function keluargasekolah()
	{
        $data['content'] = 'siswa/laporan/keluargasekolah';
        $data['menu'] = 'laporan';
        $data['script'] = 'siswa/home/script/js_dashboard';
        $appList = getAppList();
        
        $siswa_grouping = [];
        $no_kk = $this->db->query("SELECT no_kk FROM siswa GROUP BY no_kk")->result();
        foreach($no_kk as $kk) {
            $this->db->select('siswa.*,siswa_kelas.id as siswa_kelas_id,siswa_kelas.status,kelas.nama_kelas');
            $this->db->from('siswa');
            $this->db->join('siswa_app','siswa_app.siswa_id=siswa.id');
            $this->db->join('siswa_kelas','siswa_kelas.siswa_id=siswa.id');
            $this->db->join('kelas','kelas.id=siswa_kelas.kelas_id');
            $this->db->where('siswa.no_kk',$kk->no_kk);
            $a = $this->db->get();
            if($a->num_rows()>1) {
                $siswa_grouping[$kk->no_kk] = $a->result();
            }
        }
        $data['app'] = $appList;
        $data['siswa'] = $siswa_grouping;
		$this->load->view('partials/wrapper_siswa',$data);
    }
    
    public function grafik()
	{
        $data['content'] = 'siswa/laporan/grafik';
        $data['menu'] = 'laporan';
        $data['script'] = 'siswa/laporan/script/js_grafik';
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
