<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class filmarchive extends CI_Controller{
	function filmarchive(){
		parent::__construct();
	}

	function index($category="all",$rangeyear="1941-1950",$text="0",$paid="P",$length="L"){
		$data["content"] = "filmarchive/filmarchive";

		$expyear = explode('-',$rangeyear);
		$data["firstyear"] = $expyear[0];
		$data["yearstart"] = 1901;
		$data["yeardefault"] = $expyear[0]-20;
		$data["yeardefault2"] = $expyear[0]-20;
		$data["rangeyear"] = $expyear[0]." - ".$expyear[1];
		$data["rangeyearnext"] = strval($expyear[0]+10)." - ".strval($expyear[1]+10);
		$data["rangeyearbefore"] = strval($expyear[1]-10)." - ".strval($expyear[0]-10);
		$data["rangedefault"] = $rangeyear;

		$data["text"] = $text;
		$data["category"] = $category;
		$data["paid"] = $paid;
		$data["length"] = $length;

		$query = $this->db->query('select count(*) total from film_list where status="Active" and category_id="4"');
		foreach ($query->result() as $row){
		  $data['film_total'] = $row->total;
		}

		$query = $this->db->query('select count(*) total from film_list where harga_streaming="0" and status="Active" and category_id="4"');
		foreach ($query->result() as $row){
		  $data['film_free'] = $row->total;
		}

		$query = $this->db->query('select count(*) total from film_list where harga_streaming<>"0" and status="Active" and category_id="4"');
		foreach ($query->result() as $row){
		  $data['film_paid'] = $row->total;
		}

		$query = $this->db->query('select count(*) total from film_list where durasi between 0 and 35 and status="Active" and category_id="4"');
		foreach ($query->result() as $row){
		  $data['film_durasi_0_35'] = $row->total;
		}

		$query = $this->db->query('select count(*) total from film_list where durasi between 35 and 45 and status="Active" and category_id="4"');
		foreach ($query->result() as $row){
		  $data['film_durasi_35_45'] = $row->total;
		}

		$query = $this->db->query('select count(*) total from film_list where durasi between 45 and 60 and status="Active" and category_id="4"');
		foreach ($query->result() as $row){
		  $data['film_durasi_45_60'] = $row->total;
		}

		$query = $this->db->query('select count(*) total from film_list where durasi > 60 and status="Active" and category_id="4"');
		foreach ($query->result() as $row){
		  $data['film_durasi_60'] = $row->total;
		}

		$where = "AND status='Active' ";
		if($text<>'0'){
			$where .= "AND title LIKE '%$text%' ";
		}

		if ($paid<>'P') {
			$pos = strpos($paid, 'all');
			if($pos === false){
				$paids = explode('-',$paid);
				foreach ($paids as $paid_data) {
					if($paid_data == 'free'){
						$where .= "AND harga_streaming = 0 ";
					}
					if($paid_data == 'paid'){
						$where .= "AND harga_streaming > 0 ";
					}
					if($paid_data == '0.15'){
						$where .= "AND harga_streaming BETWEEN 0 AND 15000 ";
					}
					if($paid_data == '15.50'){
						$where .= "AND harga_streaming BETWEEN 15000 AND 50000 ";
					}
					if($paid_data == '50.100'){
						$where .= "AND harga_streaming BETWEEN 50000 AND 100000 ";
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
						$where .= "AND durasi BETWEEN 0 AND 35 ";
					}
					if($length_data == '35.45'){
						$where .= "AND durasi BETWEEN 35 AND 45 ";
					}
					if($length_data == '45.60'){
						$where .= "AND durasi BETWEEN 45 AND 60 ";
					}
					if($length_data == '60'){
						$where .= "AND durasi > 60 ";
					}
				}
			}
		}

		getSkin($data);
	}
}
