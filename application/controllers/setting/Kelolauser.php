<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelolauser extends CI_Controller {

    function __construct() {
        parent::__construct();
        isAuthenticated();
        $this->load->model("Model_form");
    }

	public function index()
	{
        $data['content'] = 'setting/user_index';
        $data['menu'] = 'pengelolaan';
        $data['script'] = 'setting/script/js_user_index';
        $data['app'] = getAppList();

        $data['level'] = $this->db->get('level')->result();
        $data['role'] = $this->db->get('role')->result();
        
		$data['form'] = array(
			array(
			  "type" => "input",
			  "label" => "Nama",
			  "name" => "nama"
			),
            array(
                "type" => "input",
                "label" => "Username",
                "name" => "username"
            ),
            array(
                "type" => "input",
                "label" => "Password",
                "name" => "password"
            ),
            array(
                "type" => "select",
                "label" => "Level",
                "name" => "level_id",
                "option" => $this->Model_form->optionLevel()
            ),
            array(
                "type" => "select",
                "label" => "Role",
                "name" => "role_id",
                "option" => $this->Model_form->optionRole()
            ),
		  );
          $data['breadcumb'] = buildBreadcumb(array('App','Setting','Pengelolaan User'));
          // $this->load->view('partials/wrapper_dma',$data);
          buildPage($data);
    }
    
    public function datatable(){
        $appid = $this->uri->segment(4);
        $this->load->library('datatables');
        $this->datatables->select('*');
        $this->datatables->from('users');
        $this->datatables->join('level','level.id=users.level_id');
        $this->datatables->join('role','role.id=users.role_id');
        $this->datatables->add_column('action',function($row){
            if(isSuper()) {
                // $button = "<a href='".base_url()."setting/kelolauser/permission/".$row['id']."' class='btn btn-warning btn-sm'><i class='fa fa-cog'></i></a>";
                $button = "<a onclick='return confirm(\"Reset Password default (12345678)\")' href='".base_url()."setting/kelolauser/resetpassword/".$row['id']."' class='btn btn-info btn-sm btnHapus' onclick='hapus(".$row['id'].")'>reset password</a>";
                $button .= "<button type='button' class='btn btn-danger btn-sm btnHapus' onclick='hapus(".$row['id'].")'><i class='fa fa-trash'></i></button>";
                return $button;
            }
        });
        echo $this->datatables->generate();
	}

    public function resetpassword() {
        $id = $this->uri->segment(4);
        if(!intval($id)) {
            redirect(base_url()."setting/kelolauser");
        }
        $this->db->where('id',$id);
        $this->db->update('users',array('password'=>password_hash("12345678",PASSWORD_BCRYPT)));
        redirect(base_url()."setting/kelolauser");
    }

    public function simpan() {

        $insert = array(
            "nama" => $this->input->post("nama"),
            "username" => $this->input->post("username"),
            "password" => password_hash($this->input->post("password"),PASSWORD_BCRYPT),
            "level_id" => $this->input->post("level_id"),
            "role_id" => $this->input->post("role_id"),
        );

        $fileName = "";
        $message = "Data tersimpan";

        $this->db->trans_begin();

        $simpan = $this->db->insert("users",$insert);

        if($this->db->trans_status()!==FALSE) {
            $this->db->trans_commit();
            echo json_encode(array("msg"=>$message));
            exit();
        }
        $this->db->trans_rollback();
        echo json_encode(array("msg"=>"Gagal Simpan Data"));
        exit();
    }

    public function ubah() {
        $id = $this->input->post("id");
        $update = array(
            "nama_unit" => $this->input->post("nama_unit")
        );
        $message = "";
        
        $this->db->where("id",$id);
        $update = $this->db->update("unit",$update);
        if($update) {
            echo json_encode(array("msg"=>"Data berhasil diubah"));
            exit();
        }
        echo json_encode(array("msg"=>"Data gagal diubah"));
        exit();
    }

    public function hapus() {
        //butuh helper untuk cek apakah ta digunakan atau tidak
        
        $this->db->trans_begin();

        $this->db->where("id",$this->input->post("id",true));
        $this->db->delete("users");

        if($this->db->trans_status()!==FALSE) {
            $this->db->trans_commit();
            echo json_encode(array("msg"=>"ok"));
            exit();
        }else {
            $this->db->trans_rollback();
        }
        echo json_encode(array("msg"=>"no"));
        exit();
    }

}
