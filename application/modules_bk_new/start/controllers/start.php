<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Start extends CI_Controller{
	function Start(){
		parent::__construct();
	}

	function index(){
		$data["content"] = "home/home";

		$this->db->select('film_list.*,film_shop_movie.video fullmovie');
		$this->db->from('film_list');
		$this->db->join('film_shop_movie', 'film_shop_movie.film_id = film_list.id');
		$this->db->where('film_list.category_id', '2');
		$this->db->where('film_list.cover <>', '');
		$this->db->where('film_list.status', 'Active');
		$this->db->where('film_list.deleted_at', NULL, FALSE);
		$this->db->order_by('film_list.tahun', 'desc');
		$this->db->order_by('film_list.created_at', 'desc');
		$this->db->limit(10,0);
		$data['latest_feature'] = $this->db->get();

		$this->db->where('category_id', '1');
		$this->db->where('status', 'Active');
		$this->db->where('deleted_at', NULL, FALSE);
		$this->db->or_where('category_id', '5');
		$this->db->or_where('category_id', '6');
		$this->db->or_where('category_id', '7');
		$this->db->or_where('category_id', '8');
		$this->db->or_where('category_id', '10');
		$this->db->order_by('created_at', 'desc');
		$this->db->order_by('tahun', 'desc');
		$data['latest_video'] = $this->db->get('film_list', 10, 0);

		$this->db->select('film_list.*');
		$this->db->from('film_list_stillincinema');
		$this->db->join('film_list', 'film_list_stillincinema.film_list_id = film_list.id');
		$this->db->where('film_list.status', 'Active');
		$this->db->where('film_list.deleted_at', NULL, FALSE);
		$data['still_in_cinema'] = $this->db->get();

		$this->db->where('category_id', '4');
		$this->db->where('status', 'Active');
		$this->db->where('deleted_at', NULL, FALSE);
		$this->db->order_by('tahun', 'desc');
		$data['film_archive'] = $this->db->get('film_list', 10, 0);

		$this->db->select('*');
		$this->db->from('film_news');
		$this->db->where('status', 'Active');
		$this->db->where('deleted_at', NULL, FALSE);
		$this->db->order_by('news_date', 'DESC');
		$this->db->limit(10,0);
		$data['film_news'] = $this->db->get();

		$this->db->select('*');
		$this->db->from('film_blog');
		$this->db->where('status', 'Active');
		$this->db->where('deleted_at', NULL, FALSE);
		$this->db->order_by('created_at', 'DESC');
		$this->db->limit(2,0);
		$data['film_blog'] = $this->db->get();

		getSkin($data);
	}

	function pagenotfound(){
		$data["content"] = "home/pagenotfound";
		getSkin($data);
	}
}
