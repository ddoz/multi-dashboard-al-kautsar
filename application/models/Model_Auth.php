<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Auth extends CI_Model { 

    function __construct() {
        parent::__construct();
        $this->load->database('default',TRUE);
    }

    function getLogin($user,$pass) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username',$user);
        $user = $this->db->get();
        if($user->num_rows()>0) {
            if(password_verify($pass,$user->row()->password)) {
                $arrayToSesi = array(
                    'id' => $user->row()->id,
                    'nama' => $user->row()->nama,
                    'username' => $user->row()->username,
                    'level' => $user->row()->level_id,
                    'role' => $user->row()->role_id,
                    'is_login' => true
                );
                $this->session->set_userdata($arrayToSesi);
                return true;
            }
        }
        return false;
    }
}