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

		if($text <> '0' || $paid <> 'P' || $length <> 'L' || $genre <> 'G' || isset($_GET['category']) <> '0'){
			$data['condition'] = 'search';
		}else{
			$data['condition'] = 'normal';
		}

		if(isset($_GET['category'])){
			if($_GET['category'] == "film"){
				redirect('watchfilms/category/22/0/'.$text.'/'.$paid.'/0-0/'.$length.'/'.$genre);
			}
		}

		$where = "AND film_list.status='Active' ";
		if($text<>'0'){
			$where .= "AND film_list.title LIKE '%".$data['text']."%' ";
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

		if($data["text"] == "0"){
			$pc_data = "L4IYA";
		}else{
			$pc_data = $data["text"];
		}

		if(isset($_GET['category']) == 'profile' || isset($_GET['category']) == 'company'){
			if($data["text"] == "0"){
				$pc_data = "";
			}
		}

		$w_alpb = "";
		$c_alpb = "";
		$data['word'] = "0";
		if(isset($_GET['alpb'])){
			if($_GET['alpb']=="NO"){
				$array_string = "0,1,2,3,4,5,6,7,8,9";
				$array_like = explode(',', $array_string);
				foreach($array_like as $key => $value) {
				    if($key == 0) {
								$w_alpb = ' ( nama LIKE "'.$value.'%" ';
								$c_alpb = ' ( title LIKE "'.$value.'%" ';
				    } else {
				        $w_alpb .= 'OR nama LIKE "'.$value.'%" ';
				        $c_alpb .= 'OR title LIKE "'.$value.'%" ';
				    }
				}
				$w_alpb .= ') AND ';
				$c_alpb .= ') AND ';
			}elseif ($_GET['alpb'] == "0") {
				$w_alpb = "";
				$c_alpb = "";
			}else{
				$w_alpb = " nama like '".$_GET['alpb']."%' AND ";
				$c_alpb = " title like '".$_GET['alpb']."%' AND ";
			}

			$data['word'] = $_GET['alpb'];
		}

		#$data['still_in_cinema'] = $this->db->query('SELECT DISTINCT film_list.*,film_list_stillincinema.new new FROM film_list_stillincinema INNER JOIN film_list ON film_list_stillincinema.film_list_id = film_list.id INNER JOIN film_list_genre ON film_list.id = film_list_genre.film_list_id '.$where);
		$data['still_in_cinema'] = $this->db->query('SELECT DISTINCT film_list.*,film_list_stillincinema.new new FROM film_list_stillincinema INNER JOIN film_list ON film_list_stillincinema.film_list_id = film_list.id '.$where.' and film_list_stillincinema.deleted_at is null order by new asc ');
		#$data['list_film'] = $this->db->query('SELECT DISTINCT film_list.* FROM film_list INNER JOIN film_list_genre ON film_list.id = film_list_genre.film_list_id where title like "%%" '.$where.' limit 10');
		$data['list_film'] = $this->db->query('SELECT DISTINCT film_list.* FROM film_list where title like "%%" and category_id = "2" '.$where.' limit 10');
		$data['profile'] = $this->db->query('SELECT * FROM profiles  WHERE '.$w_alpb.' nama like "%'.$pc_data.'%" and deleted_at is null ORDER BY nama ASC limit 18');
		$data['company'] = $this->db->query('SELECT * FROM film_company WHERE '.$c_alpb.' title like "%'.$pc_data.'%" and deleted_at is null ORDER BY title ASC LIMIT 18');
		#print_r($data['profile']->result());
		#exit();
		//print_r($data['company']->result());
		$director_terkait = array();
		$producer_terkait = array();
		$id_not_in = "";
		foreach ($data['still_in_cinema']->result() as $no => $row){
			$no++;
			$crew = $this->db->select("*")->from("film_castcrew")->where("film_castcrew_position_id","42")->where("film_id",$row->id)->get()->result();
			foreach($crew as $key => $value) {
				$no++;
				$director_terkait[$no] = $value->profile_id;
				#$id_terkait[$no] = $value->film_id;
			}

			$crew = $this->db->select("*")->from("film_castcrew")->where("film_castcrew_position_id","40")->where("film_id",$row->id)->get()->result();
			foreach($crew as $key => $value) {
				$no++;
				$producer_terkait[$no] = $value->profile_id;
				#$id_terkait[$no] = $value->film_id;
			}

			#$producer_terkait[$no] = $row->producer_id;
			#$id_not_in[$no] = $row->id;
			$id_not_in = $id_not_in.$row->id.",";
		}
		$id_not_in = substr($id_not_in, 0, -1);

		#$data['coming_soon'] = $this->db->query('SELECT DISTINCT film_list.* FROM film_list_comingsoon INNER JOIN film_list ON film_list_comingsoon.film_list_id = film_list.id INNER JOIN film_list_genre ON film_list.id = film_list_genre.film_list_id '.$where.'  AND film_list_comingsoon.deleted_at is NULL limit 10');
		$data['coming_soon'] = $this->db->query('SELECT DISTINCT film_list.* FROM film_list_comingsoon INNER JOIN film_list ON film_list_comingsoon.film_list_id = film_list.id '.$where.'  AND film_list_comingsoon.deleted_at is NULL');
		#$names = array($director_terkait);
		$ids = array($id_not_in);

		#print_r($director_terkait);
		#exit();

		$this->db->distinct();
		$this->db->select('film_list.*');
		$this->db->from('film_castcrew');
		$this->db->join('film_list','film_list.id = film_castcrew.film_id','inner');
		$this->db->where('film_list.category_id', '2');
		$this->db->where('film_castcrew.film_id !=','3');
		$this->db->where('film_castcrew.film_id !=',"1");
		/*foreach ($id_terkait as $key => $value) {
			$this->db->where("id",$value);
		}*/


		$no;
		foreach ($director_terkait as $no => $row) {
			$no++;
			if($no == 1){
				$this->db->or_where('film_castcrew.profile_id', $row);
			}else{
				$this->db->or_where('film_castcrew.profile_id', $row);
			}
		}
		foreach ($producer_terkait as $row) {
			$this->db->or_where('film_castcrew.profile_id', $row);
		}


		#$this->db->where_not_in('film_castcrew.film_id',$ids);

		$this->db->order_by('film_list.tahun', 'desc');
		$this->db->limit(20);
		$data['film_terkait'] = $this->db->get();

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


		// print_r($data);exit;

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

	function see_more($text="0",$paid="P",$length="L",$genre="G"){
		$data["text"] = str_replace('%20', ' ', $text);
		$data["paid"] = $paid;
		$data["length"] = $length;
		$data["genre"] = $genre;

		if(isset($_GET['category']) == 'profile' || isset($_GET['category']) == 'company'){
			if($data["text"] == "0"){
				$pc_data = "";
			}
		}

		$w_alpb = "";
		$data['word'] = "0";
		if(isset($_GET['alpb'])){
			if($_GET['alpb']=="NO"){
				$array_string = "0,1,2,3,4,5,6,7,8,9";
				$array_like = explode(',', $array_string);
				foreach($array_like as $key => $value) {
				    if($key == 0) {
								$w_alpb = ' ( nama LIKE "'.$value.'%" ';
				    } else {
				        $w_alpb .= 'OR nama LIKE "'.$value.'%" ';
				    }
				}
				$w_alpb .= ') AND ';
			}elseif ($_GET['alpb'] == "0") {
				$w_alpb = "";
			}else{
				$w_alpb = " nama like '".$_GET['alpb']."%' AND ";
			}

			$data['word'] = $_GET['alpb'];

		}
	}
}
