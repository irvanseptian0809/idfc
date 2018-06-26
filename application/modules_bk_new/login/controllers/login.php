<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller{
	function Login(){
		parent::__construct();
	}

	function member(){
		$this->db->where('email', trim($_POST['email']));
		$this->db->where('password', md5(trim($_POST['password'])));
		$this->db->where('status', 'Active');
		$query = $this->db->get('film_member');
		if($query->num_rows() > 0){
			foreach ($query->result() as $row){
				$name = explode(" ",$row->nama);
				$firstname = $name[0];
				$data_member = array(
					'id' => $row->id,
				 	'email' => $row->email,
				 	'nama' => $firstname,
				 	'picture' => 'http://116.206.196.146/'.str_replace('uploads','filmdata',$row->picture),
				 	'alamat' => $row->alamat,
				 	'telepon' => $row->telepon
				);

				setSession($data_member);
			}

			echo json_encode(array("success"=>"true","redirect_url"=>str_replace('#', '', $_POST['redirect'])));
		}else{
			echo json_encode(array("success"=>"false"));
		}
	}
}
