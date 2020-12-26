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

if(!function_exists('showStatusMessage')) {
    function showStatusMessage() {
        $ci =& get_instance();
        if($ci->session->flashdata('status')!=null) {
            return $ci->session->flashdata('status');
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
