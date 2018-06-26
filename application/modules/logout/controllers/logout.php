<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller{
	
	public function Logout(){
		parent::__construct();
		$this->session->sess_destroy();
		redirect(base_url());
	}
	
	public function index(){
		
	}
}