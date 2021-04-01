<?php
defined('BASEPATH') OR exit('No direct script access allowed');


if(!function_exists('isAuthenticated')) {
    function isAuthenticated() {
        $ci =& get_instance();
        $sesi = $ci->session->userdata('is_login');
        if(!$sesi) redirect(base_url().'login');

    }
}

if(!function_exists('response')) {
    function response($msg,$status='OK') {
        echo json_encode(array('status'=>$status,'message'=>$msg));
        exit();
    }
}

if(!function_exists('getAppList')) {
    function getAppList() {
        $ci =& get_instance();
        $id = $ci->session->userdata('role');
        $ci->db->from('role_app');
        $ci->db->join('app','app.id=role_app.app_id');
        $ci->db->where('role_id',$id);
        return $ci->db->get()->result();
    }
}

if(!function_exists('returnLaporanPerbaikan')) {
    function returnLaporanPerbaikan($status) {
        $arrayData = array(
            "0" => "BELUM DIKERJAKAN",
            "1" => "SEDANG DIPROSES",
            "2" => "SELESAI"
        );
        if($status!="") {
            return $arrayData[$status];
        }
    }
}

if(!function_exists('showStatusMessage')) {
    function showStatusMessage() {
        $ci =& get_instance();
        if($ci->session->flashdata('status')!=null) {
            return $ci->session->flashdata('status');
        }
    }
}

if(!function_exists('isSuper')) {
    function isSuper() {
        $ci =& get_instance();
        if(!in_array($ci->session->userdata('level'),array(5,6))){
            return true;
        }
    }
}


if(!function_exists('buildForm')) {
    function buildForm($data = array()) {
        $buildTag = "";
        if(count($data) > 0) {
    
            foreach($data as $val) {
                $buildTag .= "<div class='form-group'>";
                $buildTag .= "<label>".$val['label']."</label>";
                if($val['type'] == "input") {
                    $buildTag .= "<input class='form-control' id='".$val['name']."_input' type='text' name='".$val['name']."' required>";
                }
                if($val['type'] == "textarea") {
                    $buildTag .= "<textarea class='form-control' id='".$val['name']."_input' name='".$val['name']."' required></textarea>";
                }
                if($val['type'] == "datepicker") {
                    $buildTag .= "<input class='form-control datepicker' id='".$val['name']."_input' type='text' name='".$val['name']."' required>";
                }
                if($val['type'] == "timepicker") {
                    $buildTag .= "<input class='form-control timepicker' id='".$val['name']."_input' type='text' name='".$val['name']."' required>";
                }
                if($val['type'] == "select") {
                    $select = "<select class='form-control' id='".$val['name']."_input' name='".$val['name']."'>";
                    if(array_key_exists('option',$val)) {
                        $select .= "<option value=''>Pilih</option>";
                        foreach($val['option'] as $key => $item) {
                            $select .= "<option value='".$key."'>".$item."</option>";
                        }
                    }
                    $select .= "</select>";
                    $buildTag .= $select;
                }
                $buildTag .= "</div>";
    
            }
    
        }
        echo $buildTag;
    }
}



if(!function_exists('template')) {
    function template($asset) {
        if($asset == 'default') {
            echo base_url()."assets/theme/layout/dist/";
        }else if($asset == 'node') {
            echo base_url()."assets/theme/layout/node_modules/";
        }
    }
}

if(!function_exists('buildPage')) {
    function buildPage($data) {
        $ci =& get_instance();
        $ci->load->view('layout/coreui/header',$data);
        $ci->load->view('layout/coreui/footer');
    }
}

if(!function_exists('getRiwayat')) {
    function getRiwayat($id) {
        $ci =& get_instance();
        $ci->db->select('*');
        $ci->db->from('siswa_kelas');
        $ci->db->join('kelas','kelas.id=siswa_kelas.kelas_id');
        $ci->db->where('siswa_kelas.siswa_id',$id);
        return $ci->db->get();
    }
}

if(!function_exists('getRiwayatKeuangan')) {
    function getRiwayatKeuangan($id) {
        $ci =& get_instance();
        $ci->db->select('keuangan_siswa.*,siswa.nama,tahun_akademik.tahun_akademik,keuangan.jenis_keuangan');
        $ci->db->from('keuangan_siswa');
        $ci->db->join('keuangan','keuangan.id=keuangan_siswa.keuangan_id');
        $ci->db->join('siswa','siswa.id=keuangan_siswa.siswa_id');
        $ci->db->join('tahun_akademik','tahun_akademik.id=keuangan_siswa.tahun_akademik_id');
        $ci->db->where('keuangan_siswa.siswa_id',$id);
        return $ci->db->get();
    }
}

if(!function_exists('buildBreadcumb')) {
    function buildBreadcumb($data = []) {
        $ci =& get_instance();
        $bc = '<ol class="breadcrumb border-0 m-0">';
        foreach($data as $key => $d) {
            $active = '';
            if($key == count($data) - 1) {
                $active = 'active';
            }
            $bc .= '<li class="breadcrumb-item '.$active.'">'.$d.'</li>';
        }
        $bc .= '</ol>';
        return $bc;
    }
}