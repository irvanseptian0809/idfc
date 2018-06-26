<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class profile extends CI_Controller{
	function profile(){
		parent::__construct();
	}

	function cover_kosong(){
		$get = $this->db->select("*")->from("film_list")->where("category_id",2)->get()->result();
		foreach ($get as $row) {
			$url = "http://116.206.196.146/".$row->cover;
			if($this->is_url_exist($url)){
				echo ""$url."<br>";
			}else{
				echo $url."<br>";
			}
		}
		// $url = "http://116.206.196.146/uploads/2018-04/sunset-di-pantai-losari.jpg";
		// if($this->is_url_exist($url)){
		// 	echo "ada";
		// }else{
		// 	echo "gask ada";
		// }
	}

	function is_url_exist($url){
	    $ch = curl_init($url);
	    curl_setopt($ch, CURLOPT_NOBODY, true);
	    curl_exec($ch);
	    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

	    if($code == 200){
	       $status = true;
	    }else{
	      $status = false;
	    }
	    curl_close($ch);
	   return $status;
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
