<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_form extends CI_Model { 

    function __construct() {
        parent::__construct();
        $this->load->database('default',TRUE);
    }

    function optionTahunAkademik() {
        $this->db->select("tahun_akademik.*,app.app");
        $this->db->from('tahun_akademik');
        $this->db->join("app","app.id=tahun_akademik.app_id");
        $result = $this->db->get()->result();
        $output = array();
        foreach($result as $r) {
            $output[$r->id] = $r->tahun_akademik.' ('.$r->app.')';
        }
        return $output;
    }

    function optionTahunAkademikPerApp($id) {
        $this->db->select("tahun_akademik.*,app.app");
        $this->db->from('tahun_akademik');
        $this->db->join("app","app.id=tahun_akademik.app_id");
        $this->db->where("app.id",$id);
        $result = $this->db->get()->result();
        $output = array();
        foreach($result as $r) {
            $output[$r->id] = $r->tahun_akademik.' ('.$r->app.')';
        }
        return $output;
    }

    function optionKelas() {
        $this->db->select("kelas.*,app.app");
        $this->db->from('kelas');
        $this->db->join("app","app.id=kelas.app_id");
        $result = $this->db->get()->result();
        $output = array();
        foreach($result as $r) {
            $output[$r->id] = $r->nama_kelas.' ('.$r->app.')';
        }
        return $output;
    }

    function optionUnit() {
        $this->db->select("unit.*");
        $this->db->from('unit');
        $result = $this->db->get()->result();
        $output = array();
        foreach($result as $r) {
            $output[$r->id] = $r->nama_unit;
        }
        return $output;
    }

    function optionLevel() {
        $this->db->select("level.*");
        $this->db->from('level');
        $result = $this->db->get()->result();
        $output = array();
        foreach($result as $r) {
            $output[$r->id] = $r->level;
        }
        return $output;
    }

    function optionRole() {
        $this->db->select("role.*");
        $this->db->from('role');
        $result = $this->db->get()->result();
        $output = array();
        foreach($result as $r) {
            $output[$r->id] = $r->role;
        }
        return $output;
    }
}