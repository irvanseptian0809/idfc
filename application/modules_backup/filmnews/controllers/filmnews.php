<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class filmnews extends CI_Controller{
	function filmnews(){
		parent::__construct();
	}

	function index(){
		$data["content"] = "filmnews/filmnews";

		$this->db->select('*');
		$this->db->from('film_news');
		$this->db->where('status', 'Active');
		$this->db->order_by('news_date', 'DESC');
		$this->db->limit(10,0);
		$data['film_news'] = $this->db->get();

		$this->db->select('*');
		$this->db->from('film_event');
		$this->db->where('status', 'Active');
		$this->db->order_by('created_at', 'DESC');
		$this->db->limit(10,0);
		$data['film_event'] = $this->db->get();

		getSkin($data);
	}
}
