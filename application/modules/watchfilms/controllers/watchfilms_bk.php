<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class watchfilms extends CI_Controller{
	function watchfilms(){
		parent::__construct();
	}

	function auto_cover(){
		// Full path to ffmpeg (make sure this binary has execute permission for PHP)  
		$ffmpeg = "/usr/include/ffmpeg";  
		// Full path to the video file  
		$videoFile = "http://116.206.196.146/filmdata/2018-01/He is Watching - A Short Horror Film by Josh Rafael Gultom (Indonesia) - YouTube.mp4";  
		// Full path to output image file (make sure the containing folder has write permissions!)  
		$imgOut = "/var/www/idfc/uploads/auto_thumb/frame.jpg";  
		// Number of seconds into the video to extract the frame  
		$second = 0;  
		// Setup the command to get the frame image  
		$cmd = $ffmpeg." -i \"".$videoFile."\" -an -ss ".$second.".001 -y -f mjpeg \"".$imgOut."\" 2>&1";  
		// Get any feedback from the command  
		$feedback = `$cmd`;  
		// Use $imgOut (the extracted frame) however you need to   
		// ... 
		echo $feedback;
	}

	function index($text="0",$categories="C",$paid="P",$year="0-0",$length="L",$genre="G"){
		$data["content"] = "watchfilms/watchfilms";

		$data["text"] = str_replace('%20', ' ', $text);
		$data["categories"] = $categories;
		$data["paid"] = $paid;
		$data["year"] = $year;
		$data["length"] = $length;
		$data["genre"] = $genre;

		if($text!="0"||$categories!="C"||$paid!="P"||$year!="0-0"||$length!="L"||$genre!="G"){
			$data['search_url'] = "/".$text."/0/".$paid."/".$year."/".$length."/".$genre;
		}else{
			$data['search_url'] = "0";
		}

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

		$where = "AND film_list.status='Active' AND film_list.deleted_at is null ";
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
		$joinya = "";
		if($genre<>'G'){
			$pos = strpos($genre, 'all');
			if($pos === false){
				$genre = str_replace('G-','',$genre);
				$genre = str_replace('all-','',$genre);
				$genre = str_replace('-',',',$genre);
				$where .= "AND film_list_genre.film_genre_id IN ($genre) ";
				$joinya = "INNER JOIN film_list_genre ON film_list.id = film_list_genre.film_list_id";
			}
		}

		$join_streaming = " INNER JOIN film_shop ON film_list.id = film_shop.film_id ";
		$where_join_streaming = " AND film_shop.type = 'online streaming' and film_shop.price > 0 and film_shop.deleted_at IS NULL and film_shop.qty > 0";

		$join_dvd = " INNER JOIN film_shop ON film_list.id = film_shop.film_id ";
		$where_join_dvd = " and (film_shop.qty > 0 AND film_shop.type = 'dvd') or film_shop.type = 'vcd' and film_shop.price > 0 and film_shop.deleted_at IS NULL and film_shop.qty > 0";

		$data['feature'] = $this->db->query('SELECT film_list.*,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="online streaming" AND status="Active" AND deleted_at IS NULL ORDER BY created_at DESC LIMIT 1),0) streaming_price,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="dvd" AND status="Active" AND deleted_at IS NULL ORDER BY created_at DESC LIMIT 1),0) dvd_price,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="vcd" AND status="Active" AND deleted_at IS NULL ORDER BY created_at DESC LIMIT 1),0) vcd_price,(SELECT video FROM film_shop_movie WHERE film_id=film_list.id) fullmovie FROM film_list '.$joinya.' WHERE film_list.category_id=2 AND (SELECT video FROM film_shop_movie WHERE film_id=film_list.id) IS NOT NULL '.$where.' ORDER BY film_list.tahun DESC LIMIT 10');

		$this->db->select("*");
		$this->db->from("film_category fc");
		#$this->db->join("film_list fl","fl.category_id=fc.id","LEFT");
		#$this->db->join("film_shop fs","fs.film_id=fl.id","LEFT");
		#$this->db->join("film_shop_movie fsm","fsm.film_id=fl.id","LEFT");
		$this->db->where("fc.status","Active");
		$this->db->order_by("order","ASC");
		$film = $this->db->get()->result();
		
		foreach ($film as $key => $film) {
			$key++;
			$data_film[$key-1]['id'] = $film->id;
			$data_film[$key-1]['title'] = $film->title;

			if($film->id == 1){

			$data_film_get = $this->db->query('SELECT film_list.*,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="online streaming" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) streaming_price,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="dvd" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) dvd_price,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="vcd" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) vcd_price,(SELECT video FROM film_shop_movie WHERE film_id=film_list.id) fullmovie FROM film_list '.$joinya.' WHERE film_list.tags LIKE "%Animation%" '.$where.' ORDER BY film_list.tahun DESC LIMIT 10');

			}elseif($film->id == 2) {
				
			$data_film_get = $this->db->query('SELECT film_list.*,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="online streaming" AND status="Active" AND deleted_at IS NULL ORDER BY created_at DESC LIMIT 1),0) streaming_price,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="dvd" AND status="Active" AND deleted_at IS NULL ORDER BY created_at DESC LIMIT 1),0) dvd_price,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="vcd" AND status="Active" AND deleted_at IS NULL ORDER BY created_at DESC LIMIT 1),0) vcd_price,(SELECT video FROM film_shop_movie WHERE film_id=film_list.id) fullmovie FROM film_list '.$joinya.' WHERE film_list.category_id=2 AND (SELECT video FROM film_shop_movie WHERE film_id=film_list.id) IS NOT NULL '.$where.' ORDER BY film_list.tahun DESC LIMIT 10');

			$data['dvdvcd'] = $this->db->query('SELECT film_list.*,film_shop.price,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="online streaming" AND status="Active" AND deleted_at IS NULL ORDER BY created_at DESC LIMIT 1),0) streaming_price,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="dvd" AND status="Active" AND deleted_at IS NULL ORDER BY created_at DESC LIMIT 1),0) dvd_price,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="vcd" AND status="Active" AND deleted_at IS NULL ORDER BY created_at DESC LIMIT 1),0) vcd_price,(SELECT video FROM film_shop_movie WHERE film_id=film_list.id) fullmovie FROM film_list '.$joinya.' '.$join_dvd.'WHERE film_list.category_id=2 '.$where.' '.$where_join_dvd.' ORDER BY film_list.tahun DESC LIMIT 10')->result();
				#AND (SELECT video FROM film_shop_movie WHERE film_id=film_list.id) IS NOT NULL
			}else{

			$data_film_get = $this->db->query('SELECT film_list.*,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="online streaming" AND status="Active" AND deleted_at IS NULL ORDER BY created_at DESC LIMIT 1),0) streaming_price,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="dvd" AND status="Active" AND deleted_at IS NULL ORDER BY created_at DESC LIMIT 1),0) dvd_price,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="vcd" AND status="Active" AND deleted_at IS NULL ORDER BY created_at DESC LIMIT 1),0) vcd_price,(SELECT video FROM film_shop_movie WHERE film_id=film_list.id) fullmovie FROM film_list '.$joinya.' WHERE film_list.category_id='.$film->id.' '.$where.' ORDER BY film_list.tahun DESC LIMIT 10');
			
			}

			$data_film[$key-1]['data'] = $data_film_get->result();
			
		}
		#	print_r($data['dvdvcd']);
		#exit();
		#print_r($data_film);
		#exit();
		#print_r($data_film);
		#exit();
		
		#print_r($film);

		$data['all_film'] = $data_film;

		$data['shortfilm'] = $this->db->query('SELECT film_list.*,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="online streaming" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) streaming_price,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="dvd" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) dvd_price,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="vcd" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) vcd_price,(SELECT video FROM film_shop_movie WHERE film_id=film_list.id) fullmovie FROM film_list '.$joinya.' WHERE film_list.category_id=7 '.$where.' ORDER BY film_list.tahun DESC LIMIT 10');

		$data['documentary'] = $this->db->query('SELECT film_list.*,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="online streaming" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) streaming_price,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="dvd" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) dvd_price,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="vcd" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) vcd_price,(SELECT video FROM film_shop_movie WHERE film_id=film_list.id) fullmovie FROM film_list '.$joinya.' WHERE film_list.category_id=9 '.$where.' ORDER BY film_list.tahun DESC LIMIT 10');

		$data['trailer'] = $this->db->query('SELECT film_list.*,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="online streaming" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) streaming_price,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="dvd" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) dvd_price,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="vcd" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) vcd_price,(SELECT video FROM film_shop_movie WHERE film_id=film_list.id) fullmovie FROM film_list '.$joinya.' WHERE film_list.category_id=10 '.$where.' ORDER BY film_list.tahun DESC LIMIT 10');

		$data['commercial'] = $this->db->query('SELECT film_list.*,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="online streaming" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) streaming_price,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="dvd" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) dvd_price,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="vcd" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) vcd_price,(SELECT video FROM film_shop_movie WHERE film_id=film_list.id) fullmovie FROM film_list '.$joinya.' WHERE film_list.category_id=8 '.$where.' ORDER BY film_list.tahun DESC LIMIT 10');

		$data['music_video'] = $this->db->query('SELECT film_list.*,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="online streaming" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) streaming_price,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="dvd" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) dvd_price,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="vcd" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) vcd_price,(SELECT video FROM film_shop_movie WHERE film_id=film_list.id) fullmovie FROM film_list '.$joinya.' WHERE film_list.category_id=6 '.$where.' ORDER BY film_list.tahun DESC LIMIT 10');

		$data['animation'] = $this->db->query('SELECT film_list.*,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="online streaming" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) streaming_price,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="dvd" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) dvd_price,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="vcd" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) vcd_price,(SELECT video FROM film_shop_movie WHERE film_id=film_list.id) fullmovie FROM film_list '.$joinya.' WHERE film_list.tags LIKE "%Animation%" '.$where.' ORDER BY film_list.tahun DESC LIMIT 10');

		$data['archive'] = $this->db->query('SELECT film_list.*,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="online streaming" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) streaming_price,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="dvd" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) dvd_price,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="vcd" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) vcd_price,(SELECT video FROM film_shop_movie WHERE film_id=film_list.id) fullmovie FROM film_list '.$joinya.' WHERE film_list.category_id=4 '.$where.' ORDER BY film_list.tahun DESC LIMIT 10');

		$data['foreign'] = $this->db->query('SELECT film_list.*,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="online streaming" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) streaming_price,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="dvd" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) dvd_price,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="vcd" AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1),0) vcd_price,(SELECT video FROM film_shop_movie WHERE film_id=film_list.id) fullmovie FROM film_list '.$joinya.' WHERE film_list.category_id=3 '.$where.' ORDER BY film_list.tahun DESC LIMIT 10');

		$data['featured'] = $this->db->query('SELECT film_list.*,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="online streaming" AND status="Active" AND deleted_at IS NULL ORDER BY created_at DESC LIMIT 1),0) streaming_price,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="dvd" AND status="Active" AND deleted_at IS NULL ORDER BY created_at DESC LIMIT 1),0) dvd_price,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="vcd" AND status="Active" AND deleted_at IS NULL ORDER BY created_at DESC LIMIT 1),0) vcd_price,(SELECT video FROM film_shop_movie WHERE film_id=film_list.id) fullmovie FROM film_list WHERE film_list.category_id=2 AND film_list.film_pilihan="YES" ORDER BY film_list.tahun DESC LIMIT 10');

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

		$data["text"] = str_replace('%20', ' ', $text);

		$data["category"] = $category;
		$data["word"] = $word;
		$data["paid"] = $paid;
		$data["year"] = $year;
		$data["length"] = $length;
		$data["genre"] = $genre;
		$data["other"] = $other;

		if($category == "21"){
			$category = "2";
			$real_category = "21";
		}elseif($category == "2"){
			$real_category = "2";
		}

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

		$where = "WHERE film_list.status='Active' ";
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

		$where .= "AND film_list.category_id = ".$category." ";
		if($word=="NO"){
			$array_string = "0,1,2,3,4,5,6,7,8,9";
			$array_like = explode(',', $array_string);
			foreach($array_like as $key => $value) {
			    if($key == 0) {
							$where .= 'AND ( tfilm_list.itle LIKE "'.$value.'%" ';
			    } else {
			        $where .= 'OR film_list.title LIKE "'.$value.'%" ';
			    }
			}
			$where .= ')';
		}else if($word<>"0" and $word<>"#"){
			$where .= 'AND film_list.title LIKE "'.$word.'%"';
		}

		$where .= '';

		$join = "";
		$where_join = "";
		$select_as = "";

		if(isset($real_category )){
		if($real_category == "2"){
			$join = " INNER JOIN film_shop ON film_list.id = film_shop.film_id ";
			$where_join = " AND film_shop.type = 'online streaming' and film_shop.price > 0 and film_shop.deleted_at is null and film_shop.qty > 0";
			$select_as = ",film_shop.price";
		}elseif($real_category == "21"){
			$join = " INNER JOIN film_shop ON film_list.id = film_shop.film_id ";
			$where_join = " AND (film_shop.type = 'dvd' or film_shop.type = 'vcd') and film_shop.price > 0 and film_shop.deleted_at is null and film_shop.qty > 0";
			$select_as = ",film_shop.price";
		}
		}

		$this->load->library('pagination');
		
	        $jum_all = $this->db->query('SELECT count(*) as count FROM film_list '.$where.'')->result()[0]->count;
	        #$data["listdata1"] = $this->db->query('SELECT * FROM film_list '.$where.' ORDER BY tahun DESC LIMIT '.$config["per_page"].', '.$data['page'].'');
	        $data['pagingini'] = array();
		$limit = 15;
		$total_page = ceil($jum_all/$limit);
		$data['total_page'] = $total_page;
		if($total_page > 6) {
			if(isset($_GET['l'])){
				if($_GET['l'] < 4){
					for($i=1;$i<=6;$i++){
						$data['pagingini'][$i] = $i;
					}
				}elseif($_GET['l'] > $total_page - 4){
					for($i=$total_page-7;$i<=$total_page;$i++){
						$data['pagingini'][$i] = $i;
					}
				}else{
					for($i=$_GET['l']-3;$i<=$_GET['l']+3;$i++){
						$data['pagingini'][$i] = $i;
					}
				}
			}else{
				for($i=1;$i<=6;$i++){
					$data['pagingini'][$i] = $i;
				}
				#print_r($data['pagingini']);exit();
			}
		}else{
			for($i=1;$i<=$total_page;$i++){
				$data['pagingini'][$i] = $i;
			}
		}

		if(isset($_GET['l'])) {
			$page = $_GET['l'];
		}else{
			$page = 1;
		}
		$data['page'] = $page;
		$start_from = ($page-1) * $limit;

		if($word == "0"){
			$data['listdata1'] = $this->db->query('SELECT film_list.*'.$select_as.' FROM film_list '.$join.' '.$where.' '.$where_join.' ORDER BY tahun desc LIMIT '.$start_from.', '.$limit.'');
		}else{
			$data['listdata1'] = $this->db->query('SELECT film_list.*'.$select_as.' FROM film_list '.$join.' '.$where.' '.$where_join.' ORDER BY title asc LIMIT '.$start_from.', '.$limit.'');	
		}
		
		//$data['listdata1'] = $this->db->query('SELECT * FROM film_list '.$where.' ORDER BY title asc LIMIT '.$start_from.', '.$limit.'');
		#$data['listdata2'] = $this->db->query('SELECT * FROM film_list '.$where.' ORDER BY tahun DESC LIMIT 5, 5');
		#$data['listdata3'] = $this->db->query('SELECT * FROM film_list '.$where.' ORDER BY tahun DESC LIMIT 10, 5');
		

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

		$query = $this->db->query('select count(*) total from film_list '.$where.'');
		foreach ($query->result() as $row){
		  $data['film_total'] = $row->total;
		}

		$query = $this->db->query('select count(*) total from film_list '.$where.' and harga_streaming="0"');
		foreach ($query->result() as $row){
		  $data['film_free'] = $row->total;
		}

		$query = $this->db->query('select count(*) total from film_list '.$where.' and harga_streaming<>"0"');
		foreach ($query->result() as $row){
		  $data['film_paid'] = $row->total;
		}

		$query = $this->db->query('select count(*) total from film_list '.$where.' and durasi between 0 and 35');
		foreach ($query->result() as $row){
		  $data['film_durasi_0_35'] = $row->total;
		}

		$query = $this->db->query('select count(*) total from film_list '.$where.' and durasi between 35 and 45');
		foreach ($query->result() as $row){
		  $data['film_durasi_35_45'] = $row->total;
		}

		$query = $this->db->query('select count(*) total from film_list '.$where.' and durasi between 45 and 60');
		foreach ($query->result() as $row){
		  $data['film_durasi_45_60'] = $row->total;
		}

		$query = $this->db->query('select count(*) total from film_list '.$where.' and durasi > 60');
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

			if($film->category_id == '4'){
				$disediakan = $film->id;
				$profile = $this->db->select('*')->from('film_company')->where('title',$film->source)->get()->result();
				if(!empty($profile)) {
					$dsd_image = 'http://116.206.196.146/'.$profile[0]->logo;
					$company_name = $profile[0]->title;
					$full_name = $profile[0]->full_name;
					$site = $profile[0]->site;
				}else{
					$dsd_image = "0";
					$company_name = "-";
					$full_name = "-";
					$site = "-";
				}
				
			}else{
				$disediakan = "0";
				$dsd_image = "0";
				$company_name = "0";
				$full_name = "0";
				$site = "0";
			}

			if($film->category_id == '2'){
				$trailer_path = 'http://116.206.196.146/'.$film->trailer_path_hd;
			}else{
				$trailer_path = 'http://116.206.196.146/'.$film->full_path_hd;
			}
			$title_ori = $film->title_ori;
			$created_at = $film->created_at;
			$title = $film->title;
			$title_eng = $film->title_eng;
			$tahun = $film->tahun;
			$country = $film->country;
			$location = $film->location;
			$durasi = $film->durasi;
			$category_id = $film->category_id;
			//// $informasi_dasar = implode(' ', array_slice(explode(' ', $film->informasi_dasar), 0, 20))."..";
			$informasi_dasar = $film->sort_detail;

			$streaming_price = $this->db->select("*")->from("film_shop")->where("film_id",$id)->where("type","online streaming")->where("qty !=",0,false)->get()->result();

			if(!empty($streaming_price)){
				$streaming_price = $streaming_price[0]->price;
			}else{
				$streaming_price = 0;
			}

			$dvd_price = $this->db->select("*")->from("film_shop")->where("film_id",$id)->where("type","dvd")->where("qty !=",0,false)->get()->result();

			if(!empty($dvd_price)){
				$dvd_price = $dvd_price[0]->price;
			}else{
				$dvd_price = 0;
			}

			$vcd_price = $this->db->select("*")->from("film_shop")->where("film_id",$id)->where("type","vcd")->where("qty !=",0,false)->get()->result();

			if(!empty($vcd_price)){
				$vcd_price = $vcd_price[0]->price;
			}else{
				$vcd_price = 0;
			}

			$harga_streaming = number_format($streaming_price, 0, ',', '.');
			$harga_dvd = number_format($dvd_price, 0, ',', '.');
			$harga_vcd = number_format($vcd_price, 0, ',', '.');

			

			if(filter_var($film->director_id, FILTER_VALIDATE_INT) === false){
				$director_name = $film->director_id;
			}else{
				$this->db->where('id', trim($film->director_id));
				$query_director = $this->db->get('film_director');
				if($query_director->num_rows() > 0){
					foreach ($query_director->result() as $row_director){
						$director_name = $row_director->title;
					}
				}else{
					$director_name = "";
				}
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
			$desc_eng = substr(strip_tags($film->briefsynopsis_eng),0,180)."...";
			$sort_detail = substr(strip_tags($film->sort_detail),0,180)."...";
			$sort_detail_eng = substr(strip_tags($film->sort_detail_eng),0,180)."...";
			$link_detail = base_url().'detail/index/'.url_title(strtolower($film->title)).'/'.$film->id;
			$id_full_film = $film->id_full_film;

			if($id_full_film > 0){
				$data_ff = $this->db->select("*")->from("film_list")->where("id",$id_full_film)->get()->result();
				if(!empty($data_ff)) {
					$title_trailer = $data_ff[0]->title;
					$id_trailer = $data_ff[0]->id;
				}else{
					$title_trailer = $title;
					$id_trailer = $id;
				}
			}else{
				$title_trailer = $title;
				$id_trailer = $id;
			}

		}

		echo json_encode(array("thumbnail"=>$thumb_trailer_final,"video"=>$trailer_path, "title"=>$title, "title_eng"=>$title_eng, "title_ori"=>$title_ori, "created_at"=>$created_at, "tahun"=>$tahun, "durasi"=>$durasi, "country"=>$country, "location"=>$location, "informasi_dasar"=>$informasi_dasar, "harga_streaming"=>$harga_streaming, "harga_dvd"=>$harga_dvd, "harga_vcd"=>$harga_vcd, "director"=>$director_name, "genre"=>$genre, "desc"=>$desc, "desc_eng"=>$desc_eng, "sort_detail"=>$sort_detail, "sort_detail_eng"=>$sort_detail_eng, "link_detail"=>$link_detail, "disediakan"=>$disediakan, "dsd_image"=>$dsd_image, "company_name"=>$company_name, "full_name"=>$full_name, "site"=>$site, "id_full_film"=>$id_full_film, "title_trailer"=>$title_trailer, "id_trailer"=>$id_trailer, "category_id"=>$category_id,"streaming_price"=>$streaming_price,"dvd_price"=>$dvd_price,"vcd_price"=>$vcd_price));
	}

	function see_more($category="",$word="0",$text="0",$paid="P",$year="0-0",$length="L",$genre="G",$other="O"){

$this->load->library('session');
$lang = $this->session->userdata('lang');
if(isset($lang) && $lang == "en"){
    $lang = $this->session->userdata('lang');
}else{
    $language = array('lang'=>"id");
    $hasil = $this->db->select("*")->from("language")->get()->result();
    foreach($hasil as $row){
        $language[$row->content] = $row->ind;
    }
    $this->session->set_userdata($language);
    $lang = $this->session->userdata('lang');
}

		if($category == "21"){
			$category = "2";
			$real_category = "21";
		}elseif($category == "2"){
			$real_category = "2";
		}

		if($category=="2"){
			$height = "320px";
		}else{
			$height = "128px";
		}

		$this->db->where('id', $category);
		$query = $this->db->get('film_category');
		foreach ($query->result() as $row)
		{
		  $data['category_name'] = $row->title;
		}

		$where = "WHERE film_list.status='Active' ";
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

		$where .= "AND category_id = ".$category." ";
		if($word=="NO"){
			$array_string = "0,1,2,3,4,5,6,7,8,9";
			$array_like = explode(',', $array_string);
			foreach($array_like as $key => $value) {
			    if($key == 0) {
							$where .= 'AND ( title LIKE "'.$value.'%" ';
			    } else {
			        $where .= 'OR title LIKE "'.$value.'%" ';
			    }
			}
			$where .= ')';
		}else if($word<>"0" and $word<>"#"){
			$where .= 'AND title LIKE "'.$word.'%"';
		}

		$join = "";
		$where_join = "";
		$select_as = "";

		if(isset($real_category )){
			if($real_category == "2"){
				$join = " INNER JOIN film_shop ON film_list.id = film_shop.film_id ";
				$where_join = " AND film_shop.type = 'online streaming' and film_shop.price > 0 and film_shop.deleted_at is null and film_shop.qty > 0";
				$select_as = ",film_shop.price";
			}elseif($real_category == "21"){
				$join = " INNER JOIN film_shop ON film_list.id = film_shop.film_id ";
				$where_join = " AND (film_shop.type = 'dvd' or film_shop.type = 'vcd') and film_shop.price > 0 and film_shop.deleted_at is null and film_shop.qty > 0";
				$select_as = ",film_shop.price";
			}
		}

		
		if(isset($_POST["no"]) && !empty($_POST["no"])){
			$jum_all = $this->db->query('SELECT count(*) as count FROM film_list '.$where.'')->result()[0]->count;

			$start = $_POST["no"] + 1;
			$limit = $_POST["no"] + 15;
			
			if($word == "0"){
				$listdata1 = $this->db->query('SELECT film_list.*'.$select_as.' FROM film_list '.$join.' '.$where.' '.$where_join.' ORDER BY tahun desc LIMIT '.$start.', '.$limit.'');
			}else{
				$listdata1 = $this->db->query('SELECT film_list.*'.$select_as.' FROM film_list '.$join.' '.$where.' '.$where_join.' ORDER BY title asc LIMIT '.$start.', '.$limit.'');	
			}



			$satu = $_POST['no'] + 3;
			$dua = $_POST['no'] + 6;
			$tiga = $_POST['no'] + 9;

			?>

			<div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
                            <div class="owl-theme owl-carousel content" id="carousel<?php echo $satu;?>">
                              <?php 
                              $break = 0;
                              foreach ($listdata1->result() as $row){
                                $break++;
                                if($break>5){break;}
                                $this->db->where('id', trim($row->company_id));
                                $query_company = $this->db->get('film_company');
                                if($query_company->num_rows() > 0){
                                  foreach ($query_company->result() as $row_company){
                                    $company_name = $row_company->title;
                                  }
                                }else{
                                  $company_name = "";
                                }

                                if($row->harga_streaming == '0'){
                                  $harga = "FREE";
                                }else{
                                  $harga = number_format($row->harga_streaming,0,',','.');
                                } ?>
                                <div class="item" rel="item<?php echo $satu;?>" name="<?php echo $row->id?>" style="padding-left: 0px;padding-right: 10px;">
                                  <div class="img-film hover-element__initial" rel='popover' style="background:url('<?php echo 'http://116.206.196.146/'.$row->cover?>');background-size:100% auto;width:100%;height:<?php echo $height?>;">
                                  <?php if($harga <> 'FREE'){ ?>
                                    <div class="pull-right" style="background:url('<?php echo base_url()?>images/label-harga.png');background-size:100px;width:100%;height:100%;background-position:top right;background-repeat:no-repeat;">
                                      <span class="pull-right" style="-webkit-transform: rotate(47deg);-moz-transform: rotate(47deg);color:white;margin-top: 9%;width: 26%;text-align:center;">
                                        <?php echo $harga?>
                                      </span>
                                    </div>
                                  <?php } ?>
                                  </div>
                                  <div class="bottom-caption">
                                    <span class="title" style="font-size:16px;"><?php echo $row->title?></span><br>
                                    <span class="desc"><?php echo $company_name?></span>
                                  </div>
                                </div>
                              <?php } ?>
                            </div>
                        </div>
                        <?php
                        if(sessionValue('id')<>''){
                          $status = 'login';
                        }else{
                          $status = 'nologin';
                        }
                        ?>
                        <div id="detail<?php echo $satu;?>" class="detailin">
                            <div class="col-md-12 arrow-up"></div>
                            <div class="col-md-12 content-film-genre">
                              <div class="col-md-6 content-left-genre">
                                <!--<img id="thumbnail-video1" style="width: 77%;">-->
                                <div class="modal-body" style="margin: 0 50px;">
                                        <video id="path-movie<?php echo $satu;?>" class="video-js" controls autoplay preload="auto" width="597" height="350"
                                        poster="http://116.206.196.146/filmdata/covermovie.jpg" data-setup="{}">
                                        <source id="source-movie<?php echo $satu;?>" src="http://116.206.196.146/filmdata/2017-09/hvidIdFC_16082017_073903.mp4" type='video/mp4'>
                                        <p class="vjs-no-js">
                                            To view this video please enable JavaScript, and consider upgrading to a web browser that
                                            <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                                        </p>
                                        </video>
                                    </div>
                              </div>
                              <div class="col-md-4 content-right-genre">
                                  <div style="float:right;cursor:pointer;">
                                    <i class="fa fa-close" style="font-size:25px;" id="close<?php echo $satu;?>"></i>
                                  </div>
                                  <div class="genre-detail-title" id="title-detail<?php echo $satu;?>">Battle of surabaya</div>
                                  <div class="genre-detail-year" id="tahun-detail<?php echo $satu;?>">(2014)</div>
                                  <div class="genre-detail-durasi" id="director-detail<?php echo $satu;?>">Director: AA</div>
                                  <div class="genre-detail-durasi" id="durasi-detail<?php echo $satu;?>">Durasi: 240 Menit</div>
                                  <div class="genre-detail-desc" id="informasi-detail<?php echo $satu;?>">Pertarungan sengit antara tukang koran dan penjajah. Dimana mereka harus semir sepatu untuk makan setiap abad.</div>
                                  <div class="genre-detail-share">
                                      Share This Movie:
                                      <i class="fa fa-facebook"></i>
                                      <i class="fa fa-twitter"></i>
                                      <i class="fa fa-google-plus"></i>
                                  </div>
                                  <div class="genre-detail-button">
                                      <div class="col-md-4 gapless" style="padding-right: 5px;">
                                          <span style="font-size:12px;font-weight:100;color:white;">Harga Streaming</span>
                                          <button type="button" class="btn-genre btn-white-grey" id="harga1-detail<?php echo $satu;?>" onclick="buyfilm('<?php echo $status?>','streaming')">Rp 15.000</button>
                                      </div>
                                      <div class="col-md-4 gapless" style="padding-right: 5px;">
                                          <span style="font-size:12px;font-weight:100;color:white;">Harga DVD</span>
                                          <button type="button" class="btn-genre btn-white-grey" id="harga2-detail<?php echo $satu;?>" onclick="buyfilm('<?php echo $status?>','dvd')">Rp 15.000</button>
                                      </div>
                                      <div class="col-md-4 gapless" style="padding-right: 5px;">
                                          <span style="font-size:12px;font-weight:100;color:white;">Harga VCD</span>
                                          <button type="button" class="btn-genre btn-white-grey" id="harga3-detail<?php echo $satu;?>" onclick="buyfilm('<?php echo $status?>','vcd')">Rp 15.000</button>
                                      </div>
                                      <div class="col-md-12 gapless">
                                          <a id="link-detail<?php echo $satu;?>">
                                            <button type="button" class="btn-genre btn-white-null"><?php echo $this->session->userdata('Read More');?></button>
                                          </a>
                                      </div>
                                  </div>
                              </div>
                            </div>
                        </div>



                        <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
                            <div class="owl-theme owl-carousel content" id="carousel<?php echo $dua;?>">
                              <?php 
                              foreach (array_slice($listdata1->result(),5) as $row){
                                $break++;
                                if($break>11){break;}
                                $this->db->where('id', trim($row->company_id));
                                $query_company = $this->db->get('film_company');
                                if($query_company->num_rows() > 0){
                                  foreach ($query_company->result() as $row_company){
                                    $company_name = $row_company->title;
                                  }
                                }else{
                                  $company_name = "";
                                }

                                if($row->harga_streaming == '0'){
                                  $harga = "FREE";
                                }else{
                                  $harga = number_format($row->harga_streaming,0,',','.');
                                } ?>
                                <div class="item" rel="item<?php echo $dua;?>" name="<?php echo $row->id?>" style="padding-left: 0px;padding-right: 10px;">
                                  <div class="img-film hover-element__initial" rel='popover' style="background:url('<?php echo 'http://116.206.196.146/'.$row->cover?>');background-size:100% auto;width:100%;height:<?php echo $height?>;">
                                  <?php if($harga <> 'FREE'){ ?>
                                    <div class="pull-right" style="background:url('<?php echo base_url()?>images/label-harga.png');background-size:100px;width:100%;height:100%;background-position:top right;background-repeat:no-repeat;">
                                      <span class="pull-right" style="-webkit-transform: rotate(47deg);-moz-transform: rotate(47deg);color:white;margin-top: 9%;width: 26%;text-align:center;">
                                        <?php echo $harga?>
                                      </span>
                                    </div>
                                  <?php } ?>
                                  </div>
                                  <div class="bottom-caption">
                                    <span class="title" style="font-size:16px;"><?php echo $row->title?></span><br>
                                    <span class="desc"><?php echo $company_name?></span>
                                  </div>
                                </div>
                              <?php } ?>
                            </div>
                        </div>
                        <div id="detail<?php echo $dua;?>" class="detailin">
                            <div class="col-md-12 arrow-up"></div>
                            <div class="col-md-12 content-film-genre">
                              <div class="col-md-6 content-left-genre">
                                <!--<img id="thumbnail-video2" style="width: 77%;">-->
                                <div class="modal-body" style="margin: 0 50px;">
                                    <video id="path-movie<?php echo $dua;?>" class="video-js" controls autoplay preload="auto" width="597" height="350"
                                    poster="http://116.206.196.146/filmdata/covermovie.jpg" data-setup="{}">
                                    <source id="source-movie<?php echo $dua;?>" src="http://116.206.196.146/filmdata/2017-09/hvidIdFC_16082017_073903.mp4" type='video/mp4'>
                                    <p class="vjs-no-js">
                                        To view this video please enable JavaScript, and consider upgrading to a web browser that
                                        <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                                    </p>
                                    </video>
                                </div>
                              </div>
                              <div class="col-md-4 content-right-genre">
                                  <div style="float:right;cursor:pointer;">
                                    <i class="fa fa-close" style="font-size:25px;" id="close<?php echo $dua;?>"></i>
                                  </div>
                                  <div class="genre-detail-title" id="title-detail<?php echo $dua;?>">Battle of surabaya</div>
                                  <div class="genre-detail-year" id="tahun-detail<?php echo $dua;?>">(2014)</div>
                                  <div class="genre-detail-durasi" id="director-detail<?php echo $dua;?>">Director: AA</div>
                                  <div class="genre-detail-durasi" id="durasi-detail<?php echo $dua;?>">Durasi: 240 Menit</div>
                                  <div class="genre-detail-desc" id="informasi-detail<?php echo $dua;?>">Pertarungan sengit antara tukang koran dan penjajah. Dimana mereka harus semir sepatu untuk makan setiap abad.</div>
                                  <div class="genre-detail-share">
                                      Share This Movie:
                                      <i class="fa fa-facebook"></i>
                                      <i class="fa fa-twitter"></i>
                                      <i class="fa fa-google-plus"></i>
                                  </div>
                                  <div class="genre-detail-button">
                                      <div class="col-md-4 gapless" style="padding-right: 5px;">
                                          <span style="font-size:12px;font-weight:100;color:white;">Harga Streaming</span>
                                          <button type="button" class="btn-genre btn-white-grey" id="harga1-detail<?php echo $dua;?>" onclick="buyfilm('<?php echo $status?>','streaming')">Rp 15.000</button>
                                      </div>
                                      <div class="col-md-4 gapless" style="padding-right: 5px;">
                                          <span style="font-size:12px;font-weight:100;color:white;">Harga DVD</span>
                                          <button type="button" class="btn-genre btn-white-grey" id="harga2-detail<?php echo $dua;?>" onclick="buyfilm('<?php echo $status?>','dvd')">Rp 15.000</button>
                                      </div>
                                      <div class="col-md-4 gapless" style="padding-right: 5px;">
                                          <span style="font-size:12px;font-weight:100;color:white;">Harga VCD</span>
                                          <button type="button" class="btn-genre btn-white-grey" id="harga3-detail<?php echo $dua;?>" onclick="buyfilm('<?php echo $status?>','vcd')">Rp 15.000</button>
                                      </div>
                                      <div class="col-md-12 gapless">
                                          <a id="link-detail<?php echo $dua;?>">
                                            <button type="button" class="btn-genre btn-white-null">Selengkapnya</button>
                                          </a>
                                      </div>
                                  </div>
                              </div>
                            </div>
                        </div>

                        <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
                            <div class="owl-theme owl-carousel content" id="carousel<?php echo $tiga;?>">
                              <?php foreach (array_slice($listdata1->result(),10) as $row){
                                $this->db->where('id', trim($row->company_id));
                                $query_company = $this->db->get('film_company');
                                if($query_company->num_rows() > 0){
                                  foreach ($query_company->result() as $row_company){
                                    $company_name = $row_company->title;
                                  }
                                }else{
                                  $company_name = "";
                                }

                                if($row->harga_streaming == '0'){
                                  $harga = "FREE";
                                }else{
                                  $harga = number_format($row->harga_streaming,0,',','.');
                                } ?>
                                <div class="item" rel="item<?php echo $tiga;?>" name="<?php echo $row->id?>" style="padding-left: 0px;padding-right: 10px;">
                                  <div class="img-film hover-element__initial" rel='popover' style="background:url('<?php echo 'http://116.206.196.146/'.$row->cover?>');background-size:100% auto;width:100%;height:<?php echo $height?>;">
                                  <?php if($harga <> 'FREE'){ ?>
                                    <div class="pull-right" style="background:url('<?php echo base_url()?>images/label-harga.png');background-size:100px;width:100%;height:100%;background-position:top right;background-repeat:no-repeat;">
                                      <span class="pull-right" style="-webkit-transform: rotate(47deg);-moz-transform: rotate(47deg);color:white;margin-top: 9%;width: 26%;text-align:center;">
                                        <?php echo $harga?>
                                      </span>
                                    </div>
                                  <?php } ?>
                                  </div>
                                  <div class="bottom-caption">
                                    <span class="title" style="font-size:16px;"><?php echo $row->title?></span><br>
                                    <span class="desc"><?php echo $company_name?></span>
                                  </div>
                                </div>
                              <?php } ?>
                            </div>
                        </div>

                        <div id="detail<?php echo $tiga;?>" class="detailin">
                            <div class="col-md-12 arrow-up"></div>
                            <div class="col-md-12 content-film-genre">
                                <div class="col-md-6 content-left-genre">
                                    <!--<img id="thumbnail-video3" style="width: 77%;">-->
                                <div class="modal-body" style="margin: 0 50px;">
                                    <video id="path-movie<?php echo $tiga;?>" class="video-js" controls autoplay preload="auto" width="597" height="350"
                                    poster="http://116.206.196.146/filmdata/covermovie.jpg" data-setup="{}">
                                    <source id="source-movie<?php echo $tiga;?>" src="http://116.206.196.146/filmdata/2017-09/hvidIdFC_16082017_073903.mp4" type='video/mp4'>
                                    <p class="vjs-no-js">
                                        To view this video please enable JavaScript, and consider upgrading to a web browser that
                                        <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                                    </p>
                                    </video>
                                </div>
                                </div>
                                <div class="col-md-4 content-right-genre">
                                    <div style="float:right;cursor:pointer;">
                                      <i class="fa fa-close" style="font-size:25px;" id="close<?php echo $tiga;?>"></i>
                                    </div>
                                    <div class="genre-detail-title" id="title-detail<?php echo $tiga;?>">Battle of surabaya</div>
                                    <div class="genre-detail-year" id="tahun-detail<?php echo $tiga;?>">(2014)</div>
                                    <div class="genre-detail-durasi" id="director-detail<?php echo $tiga;?>">Director: AA</div>
                                    <div class="genre-detail-durasi" id="durasi-detail<?php echo $tiga;?>">Durasi: 240 Menit</div>
                                    <div class="genre-detail-desc" id="informasi-detail<?php echo $tiga;?>">Pertarungan sengit antara tukang koran dan penjajah. Dimana mereka harus semir sepatu untuk makan setiap abad.</div>
                                    <div class="genre-detail-share">
                                        Share This Movie:
                                        <i class="fa fa-facebook"></i>
                                        <i class="fa fa-twitter"></i>
                                        <i class="fa fa-google-plus"></i>
                                    </div>
                                    <div class="genre-detail-button">
                                        <div class="col-md-4 gapless" style="padding-right: 5px;">
                                            <span style="font-size:12px;font-weight:100;color:white;">Harga Streaming</span>
                                            <button type="button" class="btn-genre btn-white-grey" id="harga1-detail<?php echo $tiga;?>" onclick="buyfilm('<?php echo $status?>','streaming')">Rp 15.000</button>
                                        </div>
                                        <div class="col-md-4 gapless" style="padding-right: 5px;">
                                            <span style="font-size:12px;font-weight:100;color:white;">Harga DVD</span>
                                            <button type="button" class="btn-genre btn-white-grey" id="harga2-detail<?php echo $tiga;?>" onclick="buyfilm('<?php echo $status?>','dvd')">Rp 15.000</button>
                                        </div>
                                        <div class="col-md-4 gapless" style="padding-right: 5px;">
                                            <span style="font-size:12px;font-weight:100;color:white;">Harga VCD</span>
                                            <button type="button" class="btn-genre btn-white-grey" id="harga3-detail<?php echo $tiga;?>" onclick="buyfilm('<?php echo $status?>','vcd')">Rp 15.000</button>
                                        </div>
                                        <div class="col-md-12 gapless">
                                            <a id="link-detail<?php echo $tiga;?>">
                                              <button type="button" class="btn-genre btn-white-null">Selengkapnya</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
              		
              		<div class="row"></div>



			<?php if($jum_all > $limit){ ?>
		                
				<div class="show_more_main" id="show_more_main<?php echo $limit; ?>">
				        <span id="<?php echo $limit; ?>" class="show_more" title="Load more posts">Load More</span>
				        <span class="loding" style="display: none;"><span class="loding_txt">Loading…</span></span>
				</div>
			<?php }?>

			<script type="text/javascript">
				$("#detail<?php echo $satu;?>").hide();
		            	$("#detail<?php echo $dua;?>").hide();
		            	$("#detail<?php echo $tiga;?>").hide();
			</script>

			<?php

		}
	}


	function js_see_more($category="",$word="0",$text="0",$paid="P",$year="0-0",$length="L",$genre="G",$other="O"){

		if($category=="2"){
			$height = "320px";
		}else{
			$height = "128px";
		}

		$this->db->where('id', $category);
		$query = $this->db->get('film_category');
		foreach ($query->result() as $row)
		{
		  $data['category_name'] = $row->title;
		}

		$where = "WHERE film_list.status='Active' ";
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

		$where .= "AND category_id = ".$category." ";
		if($word=="NO"){
			$array_string = "0,1,2,3,4,5,6,7,8,9";
			$array_like = explode(',', $array_string);
			foreach($array_like as $key => $value) {
			    if($key == 0) {
							$where .= 'AND ( title LIKE "'.$value.'%" ';
			    } else {
			        $where .= 'OR title LIKE "'.$value.'%" ';
			    }
			}
			$where .= ')';
		}else if($word<>"0" and $word<>"#"){
			$where .= 'AND title LIKE "'.$word.'%"';
		}

		
		if(isset($_POST["no"]) && !empty($_POST["no"])){
			$jum_all = $this->db->query('SELECT count(*) as count FROM film_list '.$where.'')->result()[0]->count;

			$start = $_POST["no"] + 1;
			$limit = $_POST["no"] + 15;

			$satu = $_POST['no'] + 3;
			$dua = $_POST['no'] + 6;
			$tiga = $_POST['no'] + 9;
		?>	
			
    <script src="<?php echo base_url()?>js/owl.carousel.min.js"></script>
		<script type="text/javascript">
        $(document).ready(function(){

            $("[rel='item<?php echo $satu;?>']").click(function() {
                var idfilm = $(this).attr('name');
                $.ajax({
          			type : 'POST',
          			url : '<?php echo base_url()?>watchfilms/filmdata/'+idfilm,
          			success:function(data){
          				var tmp = eval('('+data+')');

                        var harga_streaming = tmp.harga_streaming;
                        var category_id = tmp.category_id;
                        if(harga_streaming=='0'){
                            harga_streaming = "FREE";
                        }else{
                            harga_streaming = 'Rp. '+harga_streaming;
                        }

                        var harga_dvd = tmp.harga_dvd;
                        if(harga_dvd=='0'){
                            harga_dvd = "FREE";
                        }else{
                            harga_dvd = 'Rp. '+harga_dvd;
                        }

                        var harga_vcd = tmp.harga_vcd;
                        if(harga_vcd=='0'){
                            harga_vcd = "FREE";
                        }else{
                            harga_vcd = 'Rp. '+harga_vcd;
                        }

                        $("#thumbnail-video<?php echo $satu;?>").attr("src",tmp.thumbnail);
                        //$("#source-video1").attr("src",tmp.video);
                        $("#title-detail<?php echo $satu;?>").html(tmp.title);
                        $("#tahun-detail<?php echo $satu;?>").html(tmp.tahun);
                        $("#director-detail<?php echo $satu;?>").html('Director : '+tmp.director);
                        $("#durasi-detail<?php echo $satu;?>").html('Durasi : '+tmp.durasi+' Menit');
                        $("#informasi-detail<?php echo $satu;?>").html(tmp.informasi_dasar);
                        $("#harga1-detail<?php echo $satu;?>").html(harga_streaming);
                        $("#harga2-detail<?php echo $satu;?>").html(harga_dvd);
                        $("#harga3-detail<?php echo $satu;?>").html(harga_vcd);
                        $("#link-detail<?php echo $satu;?>").attr("href", "<?php echo base_url()?>detail/index/"+tmp.title+"/"+idfilm);
                        $("#filmid").val(idfilm);

                        var pathmovie = document.getElementById('path-movie<?php echo $satu;?>');
                        var source = document.getElementById('source-movie<?php echo $satu;?>');
                        
                        pathmovie.setAttribute('poster', tmp.thumbnail);
                        source.setAttribute('src', tmp.video);

                        $('#popup-movie').modal('show');
                        var video<?php echo $satu;?> = videojs('path-movie<?php echo $satu;?>');
                        var video<?php echo $dua;?> = videojs('path-movie<?php echo $dua;?>');
                        var video<?php echo $tiga;?> = videojs('path-movie<?php echo $tiga;?>');
                        video<?php echo $satu;?>.pause();
                        video<?php echo $dua;?>.pause();
                        video<?php echo $tiga;?>.pause();
                        video<?php echo $satu;?>.load();

                        $('html, body').animate({
                            scrollTop: $("#detail<?php echo $satu;?>").offset().top
                        }, 1000);
          			}
          		});

                var paddingleft = $(this).offset().left + 10;
                $('.arrow-up').css({'margin-left' : paddingleft+'px'});
                $("#detail<?php echo $satu;?>").hide();
                $("#detail<?php echo $dua;?>").hide();
                $("#detail<?php echo $tiga;?>").hide();
                $(".detailin").hide();

                $("#detail<?php echo $satu;?>").show(500);
            });

            $("[rel='item<?php echo $dua;?>']").click(function() {
                var idfilm = $(this).attr('name');
                $.ajax({
          			type : 'POST',
          			url : '<?php echo base_url()?>watchfilms/filmdata/'+idfilm,
          			success:function(data){
          				var tmp = eval('('+data+')');

                        var harga_streaming = tmp.harga_streaming;
                        if(harga_streaming=='0'){
                            harga_streaming = "FREE";
                        }else{
                            harga_streaming = 'Rp. '+harga_streaming;
                        }

                        var harga_dvd = tmp.harga_dvd;
                        if(harga_dvd=='0'){
                            harga_dvd = "FREE";
                        }else{
                            harga_dvd = 'Rp. '+harga_dvd;
                        }

                        var harga_vcd = tmp.harga_vcd;
                        if(harga_vcd=='0'){
                            harga_vcd = "FREE";
                        }else{
                            harga_vcd = 'Rp. '+harga_vcd;
                        }

                        $("#thumbnail-video<?php echo $dua;?>").attr("src",tmp.thumbnail);
                        //$("#source-video2").attr("src",tmp.video);
                        $("#title-detail<?php echo $dua;?>").html(tmp.title);
                        $("#tahun-detail<?php echo $dua;?>").html(tmp.tahun);
                        $("#director-detail<?php echo $dua;?>").html('Director : '+tmp.director);
                        $("#durasi-detail<?php echo $dua;?>").html('Durasi : '+tmp.durasi+' Menit');
                        $("#informasi-detail<?php echo $dua;?>").html(tmp.informasi_dasar);
                        $("#harga1-detail<?php echo $dua;?>").html(harga_streaming);
                        $("#harga2-detail<?php echo $dua;?>").html(harga_dvd);
                        $("#harga3-detail<?php echo $dua;?>").html(harga_vcd);
                        $("#link-detail<?php echo $dua;?>").attr("href", "<?php echo base_url()?>detail/index/"+tmp.title+"/"+idfilm);
                        $("#filmid").val(idfilm);

                        var pathmovie = document.getElementById('path-movie<?php echo $dua;?>');
                        var source = document.getElementById('source-movie<?php echo $dua;?>');
                        
                        pathmovie.setAttribute('poster', tmp.thumbnail);
                        source.setAttribute('src', tmp.video);

                        $('#popup-movie').modal('show');
                        var video<?php echo $satu;?> = videojs('path-movie<?php echo $satu;?>');
                        var video<?php echo $dua;?> = videojs('path-movie<?php echo $dua;?>');
                        var video<?php echo $tiga;?> = videojs('path-movie<?php echo $tiga;?>');
                        video<?php echo $satu;?>.pause();
                        video<?php echo $dua;?>.pause();
                        video<?php echo $tiga;?>.pause();
                        video<?php echo $dua;?>.load();

                        $('html, body').animate({
                            scrollTop: $("#detail<?php echo $dua;?>").offset().top
                        }, 1000);
          			}
          		});

                var paddingleft = $(this).offset().left + 10;
                $('.arrow-up').css({'margin-left' : paddingleft+'px'});
                $("#detail<?php echo $satu;?>").hide();
                $("#detail<?php echo $dua;?>").hide();
                $("#detail<?php echo $tiga;?>").hide();
                $(".detailin").hide();

                $("#detail<?php echo $dua;?>").show(500);
            });

            $("[rel='item<?php echo $tiga;?>']").click(function() {
                var idfilm = $(this).attr('name');
                $.ajax({
          			type : 'POST',
          			url : '<?php echo base_url()?>watchfilms/filmdata/'+idfilm,
          			success:function(data){
          				var tmp = eval('('+data+')');

                        var harga_streaming = tmp.harga_streaming;
                        if(harga_streaming=='0'){
                            harga_streaming = "FREE";
                        }else{
                            harga_streaming = 'Rp. '+harga_streaming;
                        }

                        var harga_dvd = tmp.harga_dvd;
                        if(harga_dvd=='0'){
                            harga_dvd = "FREE";
                        }else{
                            harga_dvd = 'Rp. '+harga_dvd;
                        }

                        var harga_vcd = tmp.harga_vcd;
                        if(harga_vcd=='0'){
                            harga_vcd = "FREE";
                        }else{
                            harga_vcd = 'Rp. '+harga_vcd;
                        }

                        $("#thumbnail-video<?php echo $tiga;?>").attr("src",tmp.thumbnail);
                        //$("#source-video3").attr("src",tmp.video);
                        $("#title-detail<?php echo $tiga;?>").html(tmp.title);
                        $("#tahun-detail<?php echo $tiga;?>").html(tmp.tahun);
                        $("#director-detail<?php echo $tiga;?>").html('Director : '+tmp.director);
                        $("#durasi-detail<?php echo $tiga;?>").html('Durasi : '+tmp.durasi+' Menit');
                        $("#informasi-detail<?php echo $tiga;?>").html(tmp.informasi_dasar);
                        $("#harga1-detail<?php echo $tiga;?>").html(harga_streaming);
                        $("#harga2-detail<?php echo $tiga;?>").html(harga_dvd);
                        $("#harga3-detail<?php echo $tiga;?>").html(harga_vcd);
                        $("#link-detail<?php echo $tiga;?>").attr("href", "<?php echo base_url()?>detail/index/"+tmp.title+"/"+idfilm);
                        $("#filmid").val(idfilm);

                        var pathmovie = document.getElementById('path-movie<?php echo $tiga;?>');
                        var source = document.getElementById('source-movie<?php echo $tiga;?>');
                        
                        pathmovie.setAttribute('poster', tmp.thumbnail);
                        source.setAttribute('src', tmp.video);

                        $('#popup-movie').modal('show');
                        var video<?php echo $satu;?> = videojs('path-movie<?php echo $satu;?>');
                        var video<?php echo $dua;?> = videojs('path-movie<?php echo $dua;?>');
                        var video<?php echo $tiga;?> = videojs('path-movie<?php echo $tiga;?>');
                        video<?php echo $satu;?>.pause();
                        video<?php echo $dua;?>.pause();
                        video<?php echo $tiga;?>.pause();
                        video<?php echo $tiga;?>.load();

                        $('html, body').animate({
                            scrollTop: $("#detail<?php echo $tiga;?>").offset().top
                        }, 1000);
          			}
                });

                var paddingleft = $(this).offset().left + 10;
                $('.arrow-up').css({'margin-left' : paddingleft+'px'});
                $("#detail<?php echo $satu;?>").hide();
                $("#detail<?php echo $dua;?>").hide();
                $("#detail<?php echo $tiga;?>").hide();
                $(".detailin").hide();

                $("#detail<?php echo $tiga;?>").show(500);
            });

            $("#close<?php echo $satu;?>").click(function() {
                var video = videojs('path-movie');
                video.pause();
              $("#detail<?php echo $satu;?>").hide(500);

              $('html, body').animate({
                    scrollTop: $("#carousel<?php echo $satu;?>").offset().top
                },);
            });

            $("#close<?php echo $dua;?>").click(function() {
                var video2 = videojs('path-movie<?php echo $dua;?>');
                video2.pause();
              $("#detail<?php echo $dua;?>").hide(500);
              $('html, body').animate({
                    scrollTop: $("#carousel<?php echo $dua;?>").offset().top
                },);
            });

            $("#close<?php echo $tiga;?>").click(function() {
                var video3 = videojs('path-movie<?php echo $tiga;?>');
                video3.pause();
              $("#detail<?php echo $tiga;?>").hide(500);
              $('html, body').animate({
                    scrollTop: $("#carousel<?php echo $tiga;?>").offset().top
                },);
            });

            
            $(".baloon").hide();
            $("#donation-btn").hover(function(){
                $(".baloon").show(500);
            },function(){
                $(".baloon").hide(500);
            });
            $(function() {
              $('a[href*="#"]:not([href="#"])').click(function() {
                if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
                  var target = $(this.hash);
                  target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                  if (target.length) {
                    $('html, body').animate({
                      scrollTop: target.offset().top-50
                    }, 1000);
                    return false;
                  }
                }
              });
            });
            $.fn.togglePrev = function(data,toggle){
                $(".prev").each(function(){
                    if($(this).data('carouselid') === data)
                    {
                        if(toggle == 0)
                        {
                            $(this).hide(500);
                        }
                        else
                        {
                            $(this).show(500);
                        }

                    }
                });
            }
            $.fn.toggleNext = function(data,toggle){
                $(".next").each(function(){
                    if($(this).data('carouselid') === data)
                    {
                        if(toggle == 0)
                        {
                            $(this).hide(500);
                        }
                        else
                        {
                            $(this).show(500);
                        }

                    }
                });
            }
            $.fn.carMove = function(id, e){
                if(e.owl.currentItem == 0)
                {
                    $.fn.togglePrev(''+id,0);
                }
                else
                {
                    $.fn.togglePrev(''+id,1);
                }
                var a = e.owl.owlItems.length - 4;
                if(e.owl.currentItem == a)
                {
                    $.fn.toggleNext(''+id,0);
                }
                else{
                    $.fn.toggleNext(''+id,1);
                }
            }
            var owl<?php echo $satu;?> = $("#carousel<?php echo $satu;?>");
            var owl<?php echo $dua;?> = $("#carousel<?php echo $dua;?>");
            var owl<?php echo $tiga;?> = $("#carousel<?php echo $tiga;?>");
            owl<?php echo $satu;?>.owlCarousel({
                items : 5,
                dots: false,
                autoplay: true,
                afterMove: function(){
                    $.fn.carMove(owl<?php echo $satu;?>.attr('id'), this);
                }
            });
            owl<?php echo $dua;?>.owlCarousel({
                items : 5,
                dots: false,
                autoplay: true,
                afterMove: function(){
                    $.fn.carMove(owl<?php echo $dua;?>.attr('id'), this);
                }
            });
            owl<?php echo $tiga;?>.owlCarousel({
                items : 5,
                dots: false,
                autoplay: true,
                afterMove: function(){
                    $.fn.carMove(owl<?php echo $tiga;?>.attr('id'), this);
                }
            });

            $.fn.togglePrev("carousel<?php echo $satu;?>",0);
            $.fn.togglePrev("carousel<?php echo $dua;?>",0);
            $.fn.togglePrev("carousel<?php echo $tiga;?>",0);

            $(".prev").click(function(){
                var carid = $(this).data('carouselid');
                var car = $("#"+carid);
                car.trigger("owl.prev");
            });
            $(".next").click(function(){
                var carid = $(this).data('carouselid');
                var car = $("#"+carid);
                car.trigger('owl.next');
            });
            $(".background-image-holder2").height($(".background-image-holder").height());
            $('#responsive').lightSlider({
                loop: true,
                keyPress: true,
            });
            
        });

    </script>

		<?php
		}
	}

}
