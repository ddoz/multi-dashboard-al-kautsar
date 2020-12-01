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