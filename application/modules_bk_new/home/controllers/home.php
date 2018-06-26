<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller{
	function Home(){
		parent::__construct();
		$this->load->model('getdata');
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
}
