<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class filmblog extends CI_Controller{
	function filmblog(){
		parent::__construct();
	}

	function index(){
		$data["content"] = "filmblog/filmblog";

		$this->db->select('*');
		$this->db->from('film_blog');
		$this->db->where('status', 'Active');
		$this->db->order_by('created_at', 'DESC');
		$this->db->limit(5,0);
		$data['film_blog'] = $this->db->get();

		getSkin($data);
	}
}
