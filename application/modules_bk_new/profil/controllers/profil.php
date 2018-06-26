<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class profil extends CI_Controller{
	function profil(){
		parent::__construct();
	}

	function index($type="",$id=""){
		$data["content"] = "profil/profil";

		$data["id"] = $id;
		$data["type"] = $type;

		$this->db->select('*');
		$this->db->from('film_'.$type);
		$this->db->where('id', $id);
		$data['userdata'] = $this->db->get();

		$this->db->select('*');
		$this->db->from('film_list');
		$this->db->where($type.'_id', $id);
		$data['filmdata'] = $this->db->get();

		getSkin($data);
	}
}
