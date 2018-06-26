<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class watchfilms extends CI_Controller{
	function watchfilms(){
		parent::__construct();
	}

	function index($text="0",$categories="C",$paid="P",$year="0-0",$length="L",$genre="G"){
		$data["content"] = "watchfilms/watchfilms";

		$data["text"] = str_replace('%20', ' ', $text);
		$data["categories"] = $categories;
		$data["paid"] = $paid;
		$data["year"] = $year;
		$data["length"] = $length;
		$data["genre"] = $genre;

		$data["feature_list"] = "show";
		$data["shortfilm_list"] = "show";
		$data["documentary_list"] = "show";
		$data["trailer_list"] = "show";
		$data["commercial_list"] = "show";
		$data["music_video_list"] = "show";
		$data["animation_list"] = "show";
		$data["archive_list"] = "show";
		$data["foreign_list"] = "show";

		if ($categories<>'C') {
			$pos = strpos($categories, 'all');
			if($pos === false){
				$data["feature_list"] = "hide";
				$data["shortfilm_list"] = "hide";
				$data["documentary_list"] = "hide";
				$data["trailer_list"] = "hide";
				$data["commercial_list"] = "hide";
				$data["music_video_list"] = "hide";
				$data["animation_list"] = "hide";
				$data["archive_list"] = "hide";
				$data["foreign_list"] = "hide";
				$cats = explode('-',$categories);
				foreach ($cats as $cat) {
					if($cat=='2'){
						$data["feature_list"] = "show";
					}else if ($cat=='7') {
						$data["shortfilm_list"] = "show";
					}else if ($cat=='9') {
						$data["documentary_list"] = "show";
					}else if ($cat=='10') {
						$data["trailer_list"] = "show";
					}else if ($cat=='8') {
						$data["commercial_list"] = "show";
					}else if ($cat=='6') {
						$data["music_video_list"] = "show";
					}else if ($cat=='1') {
						$data["animation_list"] = "show";
					}else if ($cat=='4') {
						$data["archive_list"] = "show";
					}else if ($cat=='3') {
						$data["foreign_list"] = "show";
					}
				}
			}
		}

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
						$where .= 'AND (SELECT price FROM film_shop WHERE film_id=film_list.id AND type="online streaming" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1) IS NULL ';
					}
					if($paid_data == 'paid'){
						$where .= 'AND (SELECT price FROM film_shop WHERE film_id=film_list.id AND type="online streaming" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1) > 0 ';
					}
					if($paid_data == '0.15'){
						$where .= 'AND (SELECT price FROM film_shop WHERE film_id=film_list.id AND type="online streaming" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1) BETWEEN 0 AND 15000 ';
					}
					if($paid_data == '15.50'){
						$where .= 'AND (SELECT price FROM film_shop WHERE film_id=film_list.id AND type="online streaming" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1) BETWEEN 15000 AND 50000 ';
					}
					if($paid_data == '50.100'){
						$where .= 'AND (SELECT price FROM film_shop WHERE film_id=film_list.id AND type="online streaming" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1) BETWEEN 50000 AND 100000 ';
					}
				}
			}
		}

		$data['year1'] = "";
		$data['year2'] = "";
		if ($year<>'0-0') {
			$years = explode('-',$year);
			$where .= "AND film_list.tahun BETWEEN ".$years[0]." AND ".$years[1]." ";
			$data['year1'] = $years[0];
			$data['year2'] = $years[1];
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

		$data['feature'] = $this->db->query('SELECT film_list.*,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="online streaming" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) streaming_price,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="dvd" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) dvd_price,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="vcd" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) vcd_price,(SELECT video FROM film_shop_movie WHERE film_id=film_list.id) fullmovie FROM film_list WHERE film_list.category_id=2 AND (SELECT video FROM film_shop_movie WHERE film_id=film_list.id) IS NOT NULL '.$where.' ORDER BY film_list.tahun DESC LIMIT 10');

		$data['shortfilm'] = $this->db->query('SELECT film_list.*,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="online streaming" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) streaming_price,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="dvd" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) dvd_price,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="vcd" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) vcd_price,(SELECT video FROM film_shop_movie WHERE film_id=film_list.id) fullmovie FROM film_list WHERE film_list.category_id=7 '.$where.' ORDER BY film_list.tahun DESC LIMIT 10');

		$data['documentary'] = $this->db->query('SELECT film_list.*,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="online streaming" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) streaming_price,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="dvd" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) dvd_price,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="vcd" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) vcd_price,(SELECT video FROM film_shop_movie WHERE film_id=film_list.id) fullmovie FROM film_list WHERE film_list.category_id=9 '.$where.' ORDER BY film_list.tahun DESC LIMIT 10');

		$data['trailer'] = $this->db->query('SELECT film_list.*,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="online streaming" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) streaming_price,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="dvd" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) dvd_price,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="vcd" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) vcd_price,(SELECT video FROM film_shop_movie WHERE film_id=film_list.id) fullmovie FROM film_list WHERE film_list.category_id=10 '.$where.' ORDER BY film_list.tahun DESC LIMIT 10');

		$data['commercial'] = $this->db->query('SELECT film_list.*,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="online streaming" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) streaming_price,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="dvd" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) dvd_price,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="vcd" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) vcd_price,(SELECT video FROM film_shop_movie WHERE film_id=film_list.id) fullmovie FROM film_list WHERE film_list.category_id=8 '.$where.' ORDER BY film_list.tahun DESC LIMIT 10');

		$data['music_video'] = $this->db->query('SELECT film_list.*,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="online streaming" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) streaming_price,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="dvd" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) dvd_price,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="vcd" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) vcd_price,(SELECT video FROM film_shop_movie WHERE film_id=film_list.id) fullmovie FROM film_list WHERE film_list.category_id=6 '.$where.' ORDER BY film_list.tahun DESC LIMIT 10');

		$data['animation'] = $this->db->query('SELECT film_list.*,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="online streaming" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) streaming_price,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="dvd" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) dvd_price,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="vcd" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) vcd_price,(SELECT video FROM film_shop_movie WHERE film_id=film_list.id) fullmovie FROM film_list WHERE film_list.tags LIKE "%Animation%" '.$where.' ORDER BY film_list.tahun DESC LIMIT 10');

		$data['archive'] = $this->db->query('SELECT film_list.*,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="online streaming" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) streaming_price,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="dvd" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) dvd_price,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="vcd" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) vcd_price,(SELECT video FROM film_shop_movie WHERE film_id=film_list.id) fullmovie FROM film_list WHERE film_list.category_id=4 '.$where.' ORDER BY film_list.tahun DESC LIMIT 10');

		$data['foreign'] = $this->db->query('SELECT film_list.*,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="online streaming" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) streaming_price,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="dvd" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) dvd_price,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="vcd" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) vcd_price,(SELECT video FROM film_shop_movie WHERE film_id=film_list.id) fullmovie FROM film_list WHERE film_list.category_id=3 '.$where.' ORDER BY film_list.tahun DESC LIMIT 10');

		$data['featured'] = $this->db->query('SELECT film_list.*,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="online streaming" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) streaming_price,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="dvd" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) dvd_price,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="vcd" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) vcd_price,(SELECT video FROM film_shop_movie WHERE film_id=film_list.id) fullmovie FROM film_list WHERE film_list.category_id=2 AND film_list.film_pilihan="YES" ORDER BY film_list.tahun DESC LIMIT 10');

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

	function category($category="",$word="0",$text="0",$paid="P",$year="0-0",$length="L",$genre="G",$other="O"){
		$data["content"] = "watchfilms/category";
		$data["category"] = $category;
		$data["word"] = $word;
		$data["text"] = $text;
		$data["paid"] = $paid;
		$data["year"] = $year;
		$data["length"] = $length;
		$data["genre"] = $genre;
		$data["other"] = $other;

		if($category=="2"){
			$data["height"] = "320px";
		}else{
			$data["height"] = "128px";
		}

		$this->db->where('id', $category);
		$query = $this->db->get('film_category');
		foreach ($query->result() as $row)
		{
		  $data['category_name'] = $row->title;
		}

		$where = "WHERE status='Active' ";
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

		$data['year1'] = "";
		$data['year2'] = "";
		if ($year<>'0-0') {
			$years = explode('-',$year);
			$where .= "AND tahun BETWEEN ".$years[0]." AND ".$years[1]." ";
			$data['year1'] = $years[0];
			$data['year2'] = $years[1];
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

		if($genre<>'G'){
			$pos = strpos($genre, 'all');
			if($pos === false){
				$genre = str_replace('G-','',$genre);
				$genre = str_replace('all-','',$genre);
				$genre = str_replace('-',',',$genre);
				$where .= "AND genre_id IN ($genre) ";
			}
		}

		$where .= 'AND category_id = "'.$category.'" ';
		if($word=="NO"){
			$array_string = "0,1,2,3,4,5,6,7,8,9";
			$array_like = explode(',', $array_string);
			foreach($array_like as $key => $value) {
			    if($key == 0) {
							$where .= 'AND title LIKE "'.$value.'%" ';
			    } else {
			        $where .= 'OR title LIKE "'.$value.'%" ';
			    }
			}
		}else if($word<>"0" and $word<>"#"){
			$where .= 'AND title LIKE "'.$word.'%" ';
		}

		$data['listdata1'] = $this->db->query('SELECT * FROM film_list '.$where.' ORDER BY tahun DESC LIMIT 0, 5');
		$data['listdata2'] = $this->db->query('SELECT * FROM film_list '.$where.' ORDER BY tahun DESC LIMIT 5, 5');
		$data['listdata3'] = $this->db->query('SELECT * FROM film_list '.$where.' ORDER BY tahun DESC LIMIT 10, 5');

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

	function filmdata($id=""){
		$query = $this->db->query('SELECT film_list.*,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="online streaming" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) streaming_price,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="dvd" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) dvd_price,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="vcd" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) vcd_price,(SELECT video FROM film_shop_movie WHERE film_id=film_list.id) fullmovie FROM film_list WHERE film_list.id='.$id);
		foreach ($query->result() as $film)
		{
			$thumb_trailer_final = 'http://116.206.196.146/'.$film->cover;
			if($film->category_id=='2' and $film->thumbnail_1!=''){
				$thumb_trailer_final = 'http://116.206.196.146/'.$film->thumbnail_1;
			}
			$trailer_path = 'http://116.206.196.146/'.$film->full_path_hd;
			$title = $film->title;
			$tahun = $film->tahun;
			$durasi = $film->durasi;
			// $informasi_dasar = implode(' ', array_slice(explode(' ', $film->informasi_dasar), 0, 20))."..";
			$informasi_dasar = $film->sort_detail;
			$harga_streaming = number_format($film->streaming_price, 0, ',', '.');
			$harga_dvd = number_format($film->dvd_price, 0, ',', '.');
			$harga_vcd = number_format($film->vcd_price, 0, ',', '.');

			$this->db->where('id', trim($film->director_id));
			$query_director = $this->db->get('film_director');
			if($query_director->num_rows() > 0){
				foreach ($query_director->result() as $row_director){
					$director_name = $row_director->title;
				}
			}else{
				$director_name = "";
			}

			$genre = "";
			$query_genre = $this->db->query("SELECT film_genre.title FROM film_list_genre INNER JOIN film_genre ON film_genre.id = film_list_genre.film_genre_id WHERE film_list_genre.film_list_id='".$film->id."' ORDER BY film_genre.title");
			if($query_genre->num_rows() > 0){
				foreach ($query_genre->result() as $row_genre){
					$genre = $genre.$row_genre->title.", ";
				}
			}
			$genre = rtrim($genre,', ');

			$desc = substr(strip_tags($film->briefsynopsis_ind),0,180)."...";
			$sort_detail = substr(strip_tags($film->sort_detail),0,180)."...";
			$link_detail = base_url().'detail/index/'.url_title(strtolower($film->title)).'/'.$film->id;
		}

		echo json_encode(array("thumbnail"=>$thumb_trailer_final,"video"=>$trailer_path, "title"=>$title, "tahun"=>$tahun, "durasi"=>$durasi, "informasi_dasar"=>$informasi_dasar, "harga_streaming"=>$harga_streaming, "harga_dvd"=>$harga_dvd, "harga_vcd"=>$harga_vcd, "director"=>$director_name, "genre"=>$genre, "desc"=>$desc, "sort_detail"=>$sort_detail, "link_detail"=>$link_detail));
	}
}
