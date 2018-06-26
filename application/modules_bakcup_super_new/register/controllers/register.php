<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class register extends CI_Controller{
	function register(){
		parent::__construct();
	}

	function index(){
		$data["content"] = "register/register";

		getSkin($data);
	}

	function informasi($id_tmp=""){
		$data["content"] = "register/informasi";

		$this->db->where('id', trim($id_tmp));
		$query = $this->db->get('film_member_tmp');
		foreach ($query->result() as $row){
			$data["email"] = $row->email;
			$data["nama"] = $row->nama;
			$data["password"] = $row->password;
			$data["id_tmp"] = $row->id;
		}

		getSkin($data);
	}

	function konfirmasi(){
		$data["content"] = "register/konfirmasi";

		$this->db->where('id', trim($_POST['id_tmp']));
		$query = $this->db->get('film_member_tmp');
		foreach ($query->result() as $row){
			$data["email"] = $row->email;
			$data["nama"] = $row->nama;
			$data["password"] = $row->password;
			$data["id_tmp"] = $row->id;
			$data["kode_verifikasi"] = $row->kode_verifikasi;
		}

		getSkin($data);
	}

	function validasi($id_tmp=""){
		$data["content"] = "register/validasi";

		$this->db->where('id', trim($id_tmp));
		$query = $this->db->get('film_member_tmp');
		foreach ($query->result() as $row){
			$data_member = array(
			 'email' => $row->email,
			 'nama' => $row->nama,
			 'password' => md5($row->password),
			 'picture' => 'images/user.jpg',
			 'status' => 'Active',
			 'created_at' => $row->register_at
			);

			$insert = $this->db->insert('film_member', $data_member);

			$this->db->delete('film_member_tmp', array('id' => $id_tmp));
		}

		getSkin($data);
	}

	function submit($step=""){
		if ($step=="1") {
			//REGISTRASI
			$email = $_POST['email'];
			$nama = $_POST['nama'];
			$password = $_POST['password1'];

			$angka = range(0,9);
			shuffle($angka);
			$ambilangka = array_rand($angka, 6);
			$code = implode("", $ambilangka);

			$subject = "Konfirmasi Pendaftaran Akun";
			$email_from = "info@idfilmcenter.com";

			$email_message = "Dear, ".$nama." <br><br>";
			$email_message .= "Terima kasih anda telah mendaftar di IdFilmCenter, berikut informasi data akun anda : <br>";
			$email_message .= "Name : ".stripslashes($nama)."<br>";
			$email_message .= "Email : ".$email."<br>";
			$email_message .= "Password : ".stripslashes($password)."<br><br>";
			$email_message .= "Kode Verifikasi Anda <br><font style='font-size: 25px;'>".$code."</font><br><br>";
			$email_message .= "Masukkan kode Verifikasi diatas pada form yang telah disediakan di website.<br><br>";
			$email_message .= "Salam Hangat,<br>IdFilmCenter.com";

			$this->load->library('email');

			$config['protocol'] = 'mail';
			$config['mailtype'] = 'html';
			$config['charset'] = 'utf-8';
			$config['wordwrap'] = TRUE;

			$this->email->initialize($config);

			$this->email->from($email_from, 'IdFilmCenter');
			$this->email->to($email);
			$this->email->subject($subject);
			$this->email->message($email_message);
			$this->email->send();

			$data_member = array(
			 'email' => $email,
			 'nama' => $nama,
			 'password' => $password,
			 'kode_verifikasi' => $code,
			 'register_at' => mysqldatetime()
			);

			$insert = $this->db->insert('film_member_tmp', $data_member);
			$id_tmp = $this->db->insert_id();

			if($insert){
				echo json_encode(array("success"=>"true","id_tmp"=>$id_tmp));
			}else{
				echo json_encode(array("success"=>"false"));
			}
		}else if ($step=="2") {
			//KONFIRMASI
			$id_tmp = $_POST['id_tmp'];

			$this->db->where('id', trim($id_tmp));
			$query = $this->db->get('film_member_tmp');
			foreach ($query->result() as $row){
				$kode_verifikasi = $row->kode_verifikasi;
			}

			if($kode_verifikasi == $_POST['kode_verifikasi']){
				echo json_encode(array("success"=>"true","id_tmp"=>$id_tmp));
			}else{
				echo json_encode(array("success"=>"false"));
			}
		}
	}
}
