<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class filminfo extends CI_Controller{
	function filminfo(){
		parent::__construct();
	}

	function index($text="0",$paid="P",$length="L",$genre="G"){
		$data["content"] = "filminfo/filminfo";

		$data["text"] = str_replace('%20', ' ', $text);
		$data["paid"] = $paid;
		$data["length"] = $length;
		$data["genre"] = $genre;

		$where = "AND film_list.status='Active' ";
		if($text<>'0'){
			$where .= "AND film_list.title LIKE '%$text%' ";
		}

		if ($paid<>'P') {
			$pos = strpos($paid, 'all');
			if($pos === false){
				$paids = explode('-',$paid);
				foreach ($paids as $paid_data) {
					if($paid_data == 'free'){
						$where .= "AND film_list.harga_streaming = 0 ";
					}
					if($paid_data == 'paid'){
						$where .= "AND film_list.harga_streaming > 0 ";
					}
					if($paid_data == '0.15'){
						$where .= "AND film_list.harga_streaming BETWEEN 0 AND 15000 ";
					}
					if($paid_data == '15.50'){
						$where .= "AND film_list.harga_streaming BETWEEN 15000 AND 50000 ";
					}
					if($paid_data == '50.100'){
						$where .= "AND film_list.harga_streaming BETWEEN 50000 AND 100000 ";
					}
				}
			}
		}

		if ($length<>'L') {
			$pos = strpos($length, 'all');
			if($pos === false){
				$lengths = explode('-',$length);
				foreach ($lengths as $length_data) {
					if($length_data == '0.35'){
						$where .= "AND film_list.durasi BETWEEN 0 AND 35 ";
					}
					if($length_data == '35.45'){
						$where .= "AND film_list.durasi BETWEEN 35 AND 45 ";
					}
					if($length_data == '45.60'){
						$where .= "AND film_list.durasi BETWEEN 45 AND 60 ";
					}
					if($length_data == '60'){
						$where .= "AND film_list.durasi > 60 ";
					}
				}
			}
		}

		if($genre<>'G'){
			$pos = strpos($genre, 'all');
			if($pos === false){
				$genre = str_replace('G-','',$genre);
				$genre = str_replace('all-','',$genre);
				$genre = str_replace('-',',',$genre);
				$where .= "AND film_list.genre_id IN ($genre) ";
			}
		}

		$data['still_in_cinema'] = $this->db->query('SELECT film_list.*,film_list_stillincinema.new new FROM film_list_stillincinema INNER JOIN film_list ON film_list_stillincinema.film_list_id = film_list.id '.$where);
		$director_terkait = "";
		$id_not_in = "";
		foreach ($data['still_in_cinema']->result() as $row){
			$director_terkait = $director_terkait.$row->director_id.",";
			$id_not_in = $id_not_in.$row->id.",";
		}
		$director_terkait = substr($director_terkait, 0, -1);
		$id_not_in = substr($id_not_in, 0, -1);

		$data['coming_soon'] = $this->db->query('SELECT film_list.* FROM film_list_comingsoon INNER JOIN film_list ON film_list_comingsoon.film_list_id = film_list.id '.$where);

		$this->db->where('category_id', '2');
		$this->db->where('film_pilihan', 'YES');
		$this->db->order_by('tahun', 'desc');
		$data['film_pilihan'] = $this->db->get('film_list', 5, 0);

		$names = array($director_terkait);
		$ids = array($id_not_in);
		$this->db->where('category_id', '2');
		$this->db->where_in('director_id', $names);
		$this->db->where_not_in('id', $ids);
		$this->db->order_by('tahun', 'desc');
		$data['film_terkait'] = $this->db->get('film_list', 5, 0);

		$this->db->having('status', 'Active');
		$this->db->order_by('title', 'ASC');
		$data['category_less'] = $this->db->get('film_category', 5, 0);

		$this->db->having('status', 'Active');
		$this->db->order_by('title', 'ASC');
		$data['category_more'] = $this->db->get('film_category');

		$this->db->having('status', 'Active');
		$this->db->order_by('title', 'ASC');
		$data['genre_less'] = $this->db->get('film_genre', 7, 0);

		$this->db->having('status', 'Active');
		$this->db->order_by('title', 'ASC');
		$data['genre_more'] = $this->db->get('film_genre');

		$query = $this->db->query('select count(*) total from film_list where status="Active"');
		foreach ($query->result() as $row){
		  $data['film_total'] = $row->total;
		}

		$query = $this->db->query('select count(*) total from film_list where harga_streaming="0" and status="Active"');
		foreach ($query->result() as $row){
		  $data['film_free'] = $row->total;
		}

		$query = $this->db->query('select count(*) total from film_list where harga_streaming<>"0" and status="Active"');
		foreach ($query->result() as $row){
		  $data['film_paid'] = $row->total;
		}

		$query = $this->db->query('select count(*) total from film_list where durasi between 0 and 35 and status="Active"');
		foreach ($query->result() as $row){
		  $data['film_durasi_0_35'] = $row->total;
		}

		$query = $this->db->query('select count(*) total from film_list where durasi between 35 and 45 and status="Active"');
		foreach ($query->result() as $row){
		  $data['film_durasi_35_45'] = $row->total;
		}

		$query = $this->db->query('select count(*) total from film_list where durasi between 45 and 60 and status="Active"');
		foreach ($query->result() as $row){
		  $data['film_durasi_45_60'] = $row->total;
		}

		$query = $this->db->query('select count(*) total from film_list where durasi > 60 and status="Active"');
		foreach ($query->result() as $row){
		  $data['film_durasi_60'] = $row->total;
		}

		getSkin($data);
	}

	function category($category="",$word=""){
		$data["content"] = "filminfo/category";

		$this->db->where('id', $category);
		$query = $this->db->get('film_category');
		foreach ($query->result() as $row)
		{
		  $data['category_name'] = $row->title;
		}

		$this->db->where('category_id', $category);
		//$this->db->where('title', $word, 'after');
		$this->db->order_by('tahun', 'desc');
		$data['listdata'] = $this->db->get('film_list', 12, 0);

		getSkin($data);
	}
}
