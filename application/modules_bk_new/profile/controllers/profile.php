<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class profile extends CI_Controller{
	function profile(){
		parent::__construct();
	}

	function index(){
		$data["content"] = "profile/profile";

		$this->db->select('*');
		$this->db->from('film_member');
		$this->db->where('id', sessionValue("id"));
		$data['member'] = $this->db->get();

		getSkin($data);
	}

	function submitprofile(){
		$fileName = $_FILES['picture']['name'];
		if($fileName <> ''){
	    $config['upload_path'] = 'images/profile/'; //buat folder dengan nama assets di root folder
	    $config['file_name'] = $fileName;
	    $config['allowed_types'] = 'jpg|jpeg|png';
	    $config['max_size'] = 100000;

	    $this->load->library('upload');
	    $this->upload->initialize($config);

	    if(! $this->upload->do_upload('picture') )
	    $this->upload->display_errors();

	    $media = $this->upload->data('picture');
	    $inputFileName = 'images/profile/'.$media['file_name'];
		}

		if (isset($inputFileName)) {
			if($_POST['password']<>''){
				$data_member = array(
					'nama' => $_POST['nama'],
				 	'password' => md5($_POST['password']),
				 	'alamat' => $_POST['alamat'],
				 	'picture' => $inputFileName,
				 	'telepon' => $_POST['telepon'],
					'updated_at' => mysqldatetime()
				);
			}else{
				$data_member = array(
					'nama' => $_POST['nama'],
				 	'alamat' => $_POST['alamat'],
				 	'picture' => $inputFileName,
				 	'telepon' => $_POST['telepon'],
					'updated_at' => mysqldatetime()
				);
			}
		}else{
			if($_POST['password']<>''){
				$data_member = array(
					'nama' => $_POST['nama'],
				 	'password' => md5($_POST['password']),
				 	'alamat' => $_POST['alamat'],
				 	'telepon' => $_POST['telepon'],
					'updated_at' => mysqldatetime()
				);
			}else{
				$data_member = array(
					'nama' => $_POST['nama'],
				 	'alamat' => $_POST['alamat'],
				 	'telepon' => $_POST['telepon'],
					'updated_at' => mysqldatetime()
				);
			}
		}

		$this->db->where('id', $_POST['idmember']);
		$update = $this->db->update('film_member', $data_member);

		if($update){
			echo json_encode(array("success"=>"true"));
		}else{
			echo json_encode(array("success"=>"false"));
		}
	}
}
