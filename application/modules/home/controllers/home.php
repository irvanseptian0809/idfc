<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller{
	function Home(){
		parent::__construct();
		$this->load->model('getdata');
		$this->load->library('session');
	}

	function index(){
		if(!isLogin()){
			goLogin();
		}else{
			$data["content"] = "home/home";
			$data["title"] = "Home";

			getSkin($data);
		}
	}

	function language($data){
		$language = array('lang'=>$data);
		if($data == "id") {
			$hasil = $this->db->select("*")->from("language")->get()->result();
			foreach($hasil as $row){
				$language[$row->content] = $row->ind;
			}
		}elseif($data == "en"){
			$hasil = $this->db->select("*")->from("language")->get()->result();
			foreach($hasil as $row){
				$language[$row->content] = $row->eng;
			}
		}
	        $this->session->set_userdata($language);
		redirect($_SERVER['HTTP_REFERER']);
	}
}
