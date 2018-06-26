<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class syncdata extends CI_Controller{
	function syncdata(){
		parent::__construct();
	}

	function index(){
		echo "Services Syncronize Data, is ready for your request.<br><br>";
		echo "List Ready Function (Params) :<br>";
		echo "<ol>";
		echo "<li>Function <b>filmbox</b> (<b>no params</b>)</li>";
		echo "<li>Function <b>filmfeature</b> (<b>no params</b>)</li>";
		echo "</ol>";
	}

	function testmail(){
		$this->load->library('email');

		$this->email->from('IdFilmCenter.com', 'IdFilmCenter');
		$this->email->to('sahrul.mustakim@gmail.com');

		$this->email->subject('Email Test');
		$this->email->message('Testing the email class.');

		if($this->email->send()){
			echo "Success";
		}else{
			echo "Error Sending Mail";
		}
	}

	function testkode(){
		$count_id = "1";
		$kode = "0000";
		$prefix = "TRX";

		$count_last = strlen($kode)-strlen($count_id);
		$kode_last = substr($kode, 0, $count_last).$count_id;

		$trxid = $prefix.date('Ymd').$kode_last;

		echo $trxid;
	}

	function testftp(){
		$ftp_server = "example.com"; 
		$conn_id = ftp_ssl_connect($ftp_server); 
		
		// login with username and password 
		$ftp_user_name = "myuser"; 
		$ftp_user_pass = "mypass"; 
		$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass); 
		ftp_pasv($conn_id, true); 
		// check connection 
		if ((!$conn_id) || (!$login_result)) { 
				echo "FTP connection has failed!"; 
				echo "Attempted to connect to $ftp_server for user $ftp_user_name"; 
				exit; 
			} else { 
				echo "Connected to $ftp_server, for user $ftp_user_name"; 
			} 
		
		$buff = ftp_rawlist($conn_id, '.'); 
		var_dump($buff); 
		ftp_close($conn_id);
	}

	function filmanimation(){
		$this->db->select('*');
		$this->db->from('tbl_filmbox');
		$this->db->where('id >', $indexsync);
		$this->db->order_by('id', 'ASC');
		$this->db->limit($limitsync);
		$query = $this->db->get();
		foreach ($query->result() as $row){

			if($row->catid == '2'){
				$category_id = '9';
				$archive_id = '0';
			}else if($row->catid == '3'){
				$category_id = '10';
				$archive_id = '0';
			}else if($row->catid == '12'){
				$category_id = '7';
				$archive_id = '0';
			}else if($row->catid == '14'){
				$category_id = '8';
				$archive_id = '0';
			}else if($row->catid == '15'){
				$category_id = '6';
				$archive_id = '0';
			}else if($row->catid == '18'){
				$category_id = '4';
				if($row->archive_cat_id == '6'){
					$category_id = '3';
					$archive_id = '0';
				}else{
					$archive_id = $row->archive_cat_id;
				}
			}

			//SAVE THE COVER
			$cover = "";
			if($row->cover <> ''){
				$url = 'http://www.indonesianfilmcenter.com/'.$row->video_path.$row->cover;
				$last = end(explode('/', $row->cover));
				$img = 'filmdata/'.date('Y-m').'/'.$last;
				$savefile = file_put_contents($img, file_get_contents($url));
				if($savefile){
					$cover = $img;
				}
			}

			//SAVE THE VIDEO
			$full_path_hd = "";
			$full_path_low = "";
			if($row->android_low <> ''){
				$url = 'http://www.indonesianfilmcenter.com/'.$row->video_path.$row->android_low;
				$last = end(explode('/', $row->android_low));
				$img = 'filmdata/'.date('Y-m').'/'.$last;
				$savefile = file_put_contents($img, file_get_contents($url));
				if($savefile){
					$full_path_low = $img;
				}
			}
			if($row->android_high <> ''){
				$url = 'http://www.indonesianfilmcenter.com/'.$row->video_path.$row->android_high;
				$last = end(explode('/', $row->android_high));
				$img = 'filmdata/'.date('Y-m').'/'.$last;
				$savefile = file_put_contents($img, file_get_contents($url));
				if($savefile){
					$full_path_hd = $img;
				}
			}
			
			$company_id = "0";
			$producer_id = "0";
			$director_id = "0";
			$editor_id = "0";
			$writer_id = "0";

			//COMPANY
			if ($row->company <> '') {
				$this->db->where('title', trim($row->company));
				$query_company = $this->db->get('film_company');
				if($query_company->num_rows() > 0){
					foreach ($query_company->result() as $row_company){
						$company_id = $row_company->id;
					}
				}else{
					$data = array(
						'title' => $row->company,
						'status' => 'Active',
						'created_at' => mysqldatetime()
					);

					$this->db->insert('film_company', $data);
					$company_id = $this->db->insert_id();
				}
			}

			//PRODUCER
			if ($row->producer <> '') {
				$this->db->where('title', trim($row->producer));
				$query_producer = $this->db->get('film_producer');
				if($query_producer->num_rows() > 0){
					foreach ($query_producer->result() as $row_producer){
						$producer_id = $row_producer->id;
					}
				}else{
					$data = array(
						'title' => $row->producer,
						'status' => 'Active',
						'created_at' => mysqldatetime()
					);

					$this->db->insert('film_producer', $data);
					$producer_id = $this->db->insert_id();
				}
			}

			//DIRECTOR
			if ($row->director <> '') {
				$this->db->where('title', trim($row->director));
				$query_director = $this->db->get('film_director');
				if($query_director->num_rows() > 0){
					foreach ($query_director->result() as $row_director){
						$director_id = $row_director->id;
					}
				}else{
					$data = array(
						'title' => $row->director,
						'status' => 'Active',
						'created_at' => mysqldatetime()
					);

					$this->db->insert('film_director', $data);
					$director_id = $this->db->insert_id();
				}
			}
			
			//EDITOR
			if ($row->editor <> '') {
				$this->db->where('title', trim($row->editor));
				$query_editor = $this->db->get('film_editor');
				if($query_editor->num_rows() > 0){
					foreach ($query_editor->result() as $row_editor){
						$editor_id = $row_editor->id;
					}
				}else{
					$data = array(
						'title' => $row->editor,
						'status' => 'Active',
						'created_at' => mysqldatetime()
					);

					$this->db->insert('film_editor', $data);
					$editor_id = $this->db->insert_id();
				}
			}

			//WRITER
			if ($row->writer <> '') {
				$this->db->where('title', trim($row->writer));
				$query_writer = $this->db->get('film_writer');
				if($query_writer->num_rows() > 0){
					foreach ($query_writer->result() as $row_writer){
						$writer_id = $row_writer->id;
					}
				}else{
					$data = array(
						'title' => $row->writer,
						'status' => 'Active',
						'created_at' => mysqldatetime()
					);

					$this->db->insert('film_writer', $data);
					$writer_id = $this->db->insert_id();
				}
			}

			//DATA IMDB
			$title_international = "";
			$tahun = $row->year;
			$durasi = "0";
			$situs_resmi = "";
			$color = "";
			$briefsynopsis_ind = "";
			$briefsynopsis_eng = "";
			$fullsynopsis_ind = "";
			$fullsynopsis_eng = "";
			$movieid = "";

			$this->db->select('tbl_imdb.*');
			$this->db->from('tbl_imdb_triller');
			$this->db->join('tbl_filmbox', 'tbl_imdb_triller.filmboxid = tbl_filmbox.id');
			$this->db->join('tbl_imdb', 'tbl_imdb_triller.movieid = tbl_imdb.unique_id');
			$this->db->where('tbl_imdb_triller.filmboxid', $row->id);
			$this->db->where('tbl_imdb_triller.mainvideo', 'yes');
			$query_imdb = $this->db->get();
			if($query_imdb->num_rows() > 0){
				foreach ($query_imdb->result() as $row_imdb){
					$tahun = $row_imdb->year_prod;
					$durasi = $row_imdb->duration;
					$situs_resmi = $row_imdb->official_site;
					$color = $row_imdb->color;
					$briefsynopsis_ind = $row_imdb->briefsynopsis_ind;
					$briefsynopsis_eng = $row_imdb->briefsynopsis_eng;
					$fullsynopsis_ind = $row_imdb->fullsynopsis_ind;
					$fullsynopsis_eng = $row_imdb->fullsynopsis_eng;

					$movieid = $row_imdb->unique_id;
				}
			}

			$this->db->select('*');
			$this->db->from('film_list');
			$this->db->where('title', trim($row->title));
			$querycek = $this->db->get();
			if($querycek->num_rows() == 0){
				//INSERT DATA
				$data = array(
					'title_ori' => $row->title_ori,
					'title' => $row->title,
					'title_eng' => $row->title_eng,
					'country' => $row->country,
					'location' => $row->location,
					'location_eng' => $row->location_eng,
					'sort_detail' => $row->sort_detail,
					'sort_detail_eng' => $row->sort_detail_eng,
					'tags' => $row->tags,
					'rights' => $row->rights,
					'cover' => $cover,
					'full_path_hd' => $full_path_hd,
					'full_path_low' => $full_path_low,
					'durasi' => $durasi,
					'producer_id' => $producer_id,
					'company_id' => $company_id,
					'category_id' => $category_id,
					'director_id' => $director_id,
					'editor_id' => $editor_id,
					'writer_id' => $writer_id,
					'archive_id' => $archive_id,
					'source' => $row->source,
					'situs_resmi' => $situs_resmi,
					'tahun' => $tahun,
					'color' => $color,
					'briefsynopsis_ind' => $briefsynopsis_ind,
					'briefsynopsis_eng' => $briefsynopsis_eng,
					'fullsynopsis_ind' => $fullsynopsis_ind,
					'fullsynopsis_eng' => $fullsynopsis_eng,
					'status' => 'Active',
					'created_at' => mysqldatetime()
				);

				$this->db->insert('film_list', $data);
				$filmlistid = $this->db->insert_id();
			}else{
				foreach ($querycek->result() as $rowcek){
					$filmlistid = $rowcek->id;
				}

				//UPDATE DATA
				$data = array(
					'title_ori' => $row->title_ori,
					'title' => $row->title,
					'title_eng' => $row->title_eng,
					'country' => $row->country,
					'location' => $row->location,
					'location_eng' => $row->location_eng,
					'sort_detail' => $row->sort_detail,
					'sort_detail_eng' => $row->sort_detail_eng,
					'tags' => $row->tags,
					'rights' => $row->rights,
					'cover' => $cover,
					'full_path_hd' => $full_path_hd,
					'full_path_low' => $full_path_low,
					'durasi' => $durasi,
					'producer_id' => $producer_id,
					'company_id' => $company_id,
					'category_id' => $category_id,
					'director_id' => $director_id,
					'editor_id' => $editor_id,
					'writer_id' => $writer_id,
					'archive_id' => $archive_id,
					'source' => $row->source,
					'situs_resmi' => $situs_resmi,
					'tahun' => $tahun,
					'color' => $color,
					'briefsynopsis_ind' => $briefsynopsis_ind,
					'briefsynopsis_eng' => $briefsynopsis_eng,
					'fullsynopsis_ind' => $fullsynopsis_ind,
					'fullsynopsis_eng' => $fullsynopsis_eng
				);
				$this->db->where('id', $filmlistid);
				$this->db->update('film_list', $data);
			}

			//GENRE
			if($movieid<>''){
				$this->db->where('movieid', trim($movieid));
				$query_genre = $this->db->get('tbl_imdb_genre');
				foreach ($query_genre->result() as $row_genre){
					$genre = $row_genre->genrename;
					if($genre<>""){
						$query_genre_new = $this->db->get('film_genre');
						foreach ($query_genre_new->result() as $row_genre_new){
							$pos = strpos(trim($genre), trim($row_genre_new->title));
							if ($pos !== false) {
								$data = array(
									'film_list_id' => $filmlistid,
									'film_genre_id' => $row_genre_new->id,
									'created_at' => mysqldatetime()
								);
	
								$this->db->insert('film_list_genre', $data);
							}
						}
					}
				}
			}

			$data_index = array("sync_index" => $row->id);
			$this->db->where('desc', 'filmbox');
			$this->db->update('syncdata', $data_index);

    		echo $row->id." : ".$row->title." (SUCCESS at ".date('Y-m-d H:i:s').")"."\n";
		}
	}

	function filmbox(){
		ini_set('memory_limit', '-1');
		// FILMBOX
		$this->db->select('*');
		$this->db->from('syncdata');
		$this->db->where('desc', 'filmbox');
		$sync = $this->db->get();
		foreach ($sync->result() as $syncdata){
			$indexsync = $syncdata->sync_index;
			$limitsync = $syncdata->get_count;
		}

		$this->db->select('*');
		$this->db->from('tbl_filmbox');
		$this->db->where('id >', $indexsync);
		$this->db->order_by('id', 'ASC');
		$this->db->limit($limitsync);
		$query = $this->db->get();
		foreach ($query->result() as $row){

			if($row->catid == '2'){
				$category_id = '9';
				$archive_id = '0';
			}else if($row->catid == '3'){
				$category_id = '10';
				$archive_id = '0';
			}else if($row->catid == '12'){
				$category_id = '7';
				$archive_id = '0';
			}else if($row->catid == '14'){
				$category_id = '8';
				$archive_id = '0';
			}else if($row->catid == '15'){
				$category_id = '6';
				$archive_id = '0';
			}else if($row->catid == '18'){
				$category_id = '4';
				if($row->archive_cat_id == '6'){
					$category_id = '3';
					$archive_id = '0';
				}else{
					$archive_id = $row->archive_cat_id;
				}
			}

			//SAVE THE COVER
			$cover = "";
			if($row->cover <> ''){
				$url = 'http://www.indonesianfilmcenter.com/'.$row->video_path.$row->cover;
				$last = end(explode('/', $row->cover));
				$img = 'filmdata/'.date('Y-m').'/'.$last;
				$savefile = file_put_contents($img, file_get_contents($url));
				if($savefile){
					$cover = $img;
				}
			}

			//SAVE THE VIDEO
			$full_path_hd = "";
			$full_path_low = "";
			if($row->android_low <> ''){
				$url = 'http://www.indonesianfilmcenter.com/'.$row->video_path.$row->android_low;
				$last = end(explode('/', $row->android_low));
				$img = 'filmdata/'.date('Y-m').'/'.$last;
				$savefile = file_put_contents($img, file_get_contents($url));
				if($savefile){
					$full_path_low = $img;
				}
			}
			if($row->android_high <> ''){
				$url = 'http://www.indonesianfilmcenter.com/'.$row->video_path.$row->android_high;
				$last = end(explode('/', $row->android_high));
				$img = 'filmdata/'.date('Y-m').'/'.$last;
				$savefile = file_put_contents($img, file_get_contents($url));
				if($savefile){
					$full_path_hd = $img;
				}
			}
			
			$company_id = "0";
			$producer_id = "0";
			$director_id = "0";
			$editor_id = "0";
			$writer_id = "0";

			//COMPANY
			if ($row->company <> '') {
				$this->db->where('title', trim($row->company));
				$query_company = $this->db->get('film_company');
				if($query_company->num_rows() > 0){
					foreach ($query_company->result() as $row_company){
						$company_id = $row_company->id;
					}
				}else{
					$data = array(
						'title' => $row->company,
						'status' => 'Active',
						'created_at' => mysqldatetime()
					);

					$this->db->insert('film_company', $data);
					$company_id = $this->db->insert_id();
				}
			}

			//PRODUCER
			if ($row->producer <> '') {
				$this->db->where('title', trim($row->producer));
				$query_producer = $this->db->get('film_producer');
				if($query_producer->num_rows() > 0){
					foreach ($query_producer->result() as $row_producer){
						$producer_id = $row_producer->id;
					}
				}else{
					$data = array(
						'title' => $row->producer,
						'status' => 'Active',
						'created_at' => mysqldatetime()
					);

					$this->db->insert('film_producer', $data);
					$producer_id = $this->db->insert_id();
				}
			}

			//DIRECTOR
			if ($row->director <> '') {
				$this->db->where('title', trim($row->director));
				$query_director = $this->db->get('film_director');
				if($query_director->num_rows() > 0){
					foreach ($query_director->result() as $row_director){
						$director_id = $row_director->id;
					}
				}else{
					$data = array(
						'title' => $row->director,
						'status' => 'Active',
						'created_at' => mysqldatetime()
					);

					$this->db->insert('film_director', $data);
					$director_id = $this->db->insert_id();
				}
			}
			
			//EDITOR
			if ($row->editor <> '') {
				$this->db->where('title', trim($row->editor));
				$query_editor = $this->db->get('film_editor');
				if($query_editor->num_rows() > 0){
					foreach ($query_editor->result() as $row_editor){
						$editor_id = $row_editor->id;
					}
				}else{
					$data = array(
						'title' => $row->editor,
						'status' => 'Active',
						'created_at' => mysqldatetime()
					);

					$this->db->insert('film_editor', $data);
					$editor_id = $this->db->insert_id();
				}
			}

			//WRITER
			if ($row->writer <> '') {
				$this->db->where('title', trim($row->writer));
				$query_writer = $this->db->get('film_writer');
				if($query_writer->num_rows() > 0){
					foreach ($query_writer->result() as $row_writer){
						$writer_id = $row_writer->id;
					}
				}else{
					$data = array(
						'title' => $row->writer,
						'status' => 'Active',
						'created_at' => mysqldatetime()
					);

					$this->db->insert('film_writer', $data);
					$writer_id = $this->db->insert_id();
				}
			}

			//DATA IMDB
			$title_international = "";
			$tahun = $row->year;
			$durasi = "0";
			$situs_resmi = "";
			$color = "";
			$briefsynopsis_ind = "";
			$briefsynopsis_eng = "";
			$fullsynopsis_ind = "";
			$fullsynopsis_eng = "";
			$movieid = "";

			$this->db->select('tbl_imdb.*');
			$this->db->from('tbl_imdb_triller');
			$this->db->join('tbl_filmbox', 'tbl_imdb_triller.filmboxid = tbl_filmbox.id');
			$this->db->join('tbl_imdb', 'tbl_imdb_triller.movieid = tbl_imdb.unique_id');
			$this->db->where('tbl_imdb_triller.filmboxid', $row->id);
			$this->db->where('tbl_imdb_triller.mainvideo', 'yes');
			$query_imdb = $this->db->get();
			if($query_imdb->num_rows() > 0){
				foreach ($query_imdb->result() as $row_imdb){
					$tahun = $row_imdb->year_prod;
					$durasi = $row_imdb->duration;
					$situs_resmi = $row_imdb->official_site;
					$color = $row_imdb->color;
					$briefsynopsis_ind = $row_imdb->briefsynopsis_ind;
					$briefsynopsis_eng = $row_imdb->briefsynopsis_eng;
					$fullsynopsis_ind = $row_imdb->fullsynopsis_ind;
					$fullsynopsis_eng = $row_imdb->fullsynopsis_eng;

					$movieid = $row_imdb->unique_id;
				}
			}

			$this->db->select('*');
			$this->db->from('film_list');
			$this->db->where('title', trim($row->title));
			$querycek = $this->db->get();
			if($querycek->num_rows() == 0){
				//INSERT DATA
				$data = array(
					'title_ori' => $row->title_ori,
					'title' => $row->title,
					'title_eng' => $row->title_eng,
					'country' => $row->country,
					'location' => $row->location,
					'location_eng' => $row->location_eng,
					'sort_detail' => $row->sort_detail,
					'sort_detail_eng' => $row->sort_detail_eng,
					'tags' => $row->tags,
					'rights' => $row->rights,
					'cover' => $cover,
					'full_path_hd' => $full_path_hd,
					'full_path_low' => $full_path_low,
					'durasi' => $durasi,
					'producer_id' => $producer_id,
					'company_id' => $company_id,
					'category_id' => $category_id,
					'director_id' => $director_id,
					'editor_id' => $editor_id,
					'writer_id' => $writer_id,
					'archive_id' => $archive_id,
					'source' => $row->source,
					'situs_resmi' => $situs_resmi,
					'tahun' => $tahun,
					'color' => $color,
					'briefsynopsis_ind' => $briefsynopsis_ind,
					'briefsynopsis_eng' => $briefsynopsis_eng,
					'fullsynopsis_ind' => $fullsynopsis_ind,
					'fullsynopsis_eng' => $fullsynopsis_eng,
					'status' => 'Active',
					'created_at' => mysqldatetime()
				);

				$this->db->insert('film_list', $data);
				$filmlistid = $this->db->insert_id();
			}else{
				foreach ($querycek->result() as $rowcek){
					$filmlistid = $rowcek->id;
				}

				//UPDATE DATA
				$data = array(
					'title_ori' => $row->title_ori,
					'title' => $row->title,
					'title_eng' => $row->title_eng,
					'country' => $row->country,
					'location' => $row->location,
					'location_eng' => $row->location_eng,
					'sort_detail' => $row->sort_detail,
					'sort_detail_eng' => $row->sort_detail_eng,
					'tags' => $row->tags,
					'rights' => $row->rights,
					'cover' => $cover,
					'full_path_hd' => $full_path_hd,
					'full_path_low' => $full_path_low,
					'durasi' => $durasi,
					'producer_id' => $producer_id,
					'company_id' => $company_id,
					'category_id' => $category_id,
					'director_id' => $director_id,
					'editor_id' => $editor_id,
					'writer_id' => $writer_id,
					'archive_id' => $archive_id,
					'source' => $row->source,
					'situs_resmi' => $situs_resmi,
					'tahun' => $tahun,
					'color' => $color,
					'briefsynopsis_ind' => $briefsynopsis_ind,
					'briefsynopsis_eng' => $briefsynopsis_eng,
					'fullsynopsis_ind' => $fullsynopsis_ind,
					'fullsynopsis_eng' => $fullsynopsis_eng
				);
				$this->db->where('id', $filmlistid);
				$this->db->update('film_list', $data);
			}

			//GENRE
			if($movieid<>''){
				$this->db->where('movieid', trim($movieid));
				$query_genre = $this->db->get('tbl_imdb_genre');
				foreach ($query_genre->result() as $row_genre){
					$genre = $row_genre->genrename;
					if($genre<>""){
						$query_genre_new = $this->db->get('film_genre');
						foreach ($query_genre_new->result() as $row_genre_new){
							$pos = strpos(trim($genre), trim($row_genre_new->title));
							if ($pos !== false) {
								$data = array(
									'film_list_id' => $filmlistid,
									'film_genre_id' => $row_genre_new->id,
									'created_at' => mysqldatetime()
								);
	
								$this->db->insert('film_list_genre', $data);
							}
						}
					}
				}
			}

			$data_index = array("sync_index" => $row->id);
			$this->db->where('desc', 'filmbox');
			$this->db->update('syncdata', $data_index);

    		echo $row->id." : ".$row->title." (SUCCESS at ".date('Y-m-d H:i:s').")"."\n";
		}
	}

	function filmfeature(){
		ini_set('memory_limit', '-1');
		// FILMFEATURE
		$this->db->select('*');
		$this->db->from('syncdata');
		$this->db->where('desc', 'filmfeature');
		$sync = $this->db->get();
		foreach ($sync->result() as $syncdata){
			$indexsync = $syncdata->sync_index;
			$limitsync = $syncdata->get_count;
		}

		$this->db->select('*');
		$this->db->from('tbl_imdb');
		$this->db->order_by('postdate', 'ASC');
		$this->db->limit($limitsync, $indexsync);
		$query = $this->db->get();
		foreach ($query->result() as $row){
			$this->db->select('*');
			$this->db->from('film_list');
			$this->db->where('title', trim($row->title));
			$querycek = $this->db->get();
			if($querycek->num_rows() > 0){
				$category_id = '2';
				$archive_id = '0';
				
				//SAVE THE COVER
				$cover = "";
				if($row->imdb_url <> ''){
					$url = 'http://www.indonesianfilmcenter.com/'.str_replace(' ', '%20', $row->imdb_url);
					$last = end(explode('/', $row->imdb_url));
					$img = 'filmdata/'.date('Y-m').'/'.$last;
					$savefile = file_put_contents($img, file_get_contents($url));
					if($savefile){
						$cover = $img;
					}
				}

				//GALLERY
				$thumb[1] = "";
				$thumb[2] = "";
				$thumb[3] = "";
				$thumb[4] = "";
				$thumb[5] = "";
				$this->db->where('movieid', trim($row->unique_id));
				$query_gallery = $this->db->get('tbl_imdb_filmgallery',5,0);
				$gal = 1;
				foreach ($query_gallery->result() as $row_gallery){
					$url = 'http://www.indonesianfilmcenter.com/'.$row_gallery->ori_image;
					$last = end(explode('/', $row_gallery->ori_image));
					$img = 'filmdata/'.date('Y-m').'/'.$last;
					$savefile = file_put_contents($img, file_get_contents($url));
					if($savefile){
						$thumb[$gal] = $img;
					}
					$gal++;
				}

				foreach ($querycek->result() as $rowcek){
					$filmlistid = $rowcek->id;
				}

				//UPDATE DATA
				$data = array(
					'cover' => $cover,
					'thumbnail_1' => $thumb[1],
					'thumbnail_2' => $thumb[2],
					'thumbnail_3' => $thumb[3],
					'thumbnail_4' => $thumb[4],
					'thumbnail_5' => $thumb[5],
					'category_id' => $category_id,
					'archive_id' => $archive_id
				);
				$this->db->where('id', $filmlistid);
				$this->db->update('film_list', $data);

				//FILMSHOP
				$this->db->where('movieid', trim($row->unique_id));
				$query_shop = $this->db->get('tbl_filmshop_available');
				foreach ($query_shop->result() as $row_shop){
					if($row_shop->available == 'online streaming'){
						$this->db->where('connect_to', trim($row_shop->id));
						$query_movie = $this->db->get('tbl_filmshop');
						foreach ($query_movie->result() as $row_movie){
							//SAVE THE MOVIE
							$movie = "";
							if($row_movie->video <> ''){
								//$url = 'http://www.indonesianfilmcenter.com/video/'.$row_movie->video;
								$last = end(explode('/', $row_movie->video));
								$mov = 'filmdata/'.date('Y-m').'/'.$last;
								//$savefile = file_put_contents($mov, file_get_contents($url));
								//if($savefile){
									$movie = $mov;
								//}
							}

							//INSERT DATA
							$data_movie_save = array(
								'film_id' => $filmlistid,
								'video' => $movie,
								'subtitle' => $row_movie->subtitle
							);

							$this->db->insert('film_shop_movie', $data_movie_save);
						}
					}

					//INSERT DATA
					$data_shop = array(
						'film_id' => $filmlistid,
						'type' => $row_shop->available,
						'price' => $row_shop->price,
						'curency' => $row_shop->curency,
						'qty' => $row_shop->qty,
						'stock' => $row_shop->stock,
						'subtitle' => $row_shop->subtitle,
						'subtitle_eng' => $row_shop->subtitle_eng,
						'special_feature' => $row_shop->special_feature,
						'status' => 'Active',
						'created_at' => mysqldatetime()
					);

					$this->db->insert('film_shop', $data_shop);
				}

				//CASTCREW
				$this->db->where('movieid', trim($row->unique_id));
				$query_cast = $this->db->get('tbl_imdb_filmography');
				foreach ($query_cast->result() as $row_cast){
					$profilesid = "0";
					$this->db->where('uniqueid', trim($row_cast->profileid));
					$query_profile = $this->db->get('tbl_profiles');
					foreach ($query_profile->result() as $row_profile){
						$this->db->select('*');
						$this->db->from('profiles');
						$this->db->where('nama', trim($row_profile->nama));
						$querycekprofile = $this->db->get();
						if($querycekprofile->num_rows() == 0){
							//GET PHOTO
							$photo_profile = "";
							if($row_profile->photo <> ''){
								$url = 'http://www.indonesianfilmcenter.com/'.str_replace(' ', '%20', $row_profile->photo);
								$last = end(explode('/', $row_profile->photo));
								$photoprof = 'filmdata/'.date('Y-m').'/'.$last;
								$savefile = file_put_contents($photoprof, file_get_contents($url));
								if($savefile){
									$photo_profile = $photoprof;
								}
							}

							//INSERT DATA PROFILE
							$dataprofiles = array(
								'nama' => $row_profile->nama,
								'nama_lengkap' => $row_profile->nama_lengkap,
								'aka' => $row_profile->aka,
								'dob' => $row_profile->dob,
								'dob_place' => $row_profile->dob_place,
								'dob_date' => $row_profile->dob_date,
								'dob_month' => $row_profile->dob_month,
								'dob_year' => $row_profile->dob_year,
								'die_place' => $row_profile->die_place,
								'die_date' => $row_profile->die_date,
								'die_month' => $row_profile->die_month,
								'die_year' => $row_profile->die_year,
								'photo' => $photo_profile,
								'situs' => $row_profile->situs,
								'info' => $row_profile->info,
								'short_biography_ind' => $row_profile->short_biography_ind,
								'short_biography_eng' => $row_profile->short_biography_eng,
								'full_biography_ind' => $row_profile->full_biography_ind,
								'full_biography_eng' => $row_profile->full_biography_eng,
								'alamat_surat' => $row_profile->alamat_surat,
								'email' => $row_profile->email,
								'phone' => $row_profile->phone,
								'fax' => $row_profile->fax,
								'created_at' => mysqldatetime()
							);
			
							$this->db->insert('profiles', $dataprofiles);
							$profilesid = $this->db->insert_id();
						}else{
							foreach ($querycekprofile->result() as $rowcekprof){
								$profilesid = $rowcekprof->id;
							}
						}
					}

					//INSERT DATA
					$data_cast = array(
						'film_id' => $filmlistid,
						'profile_id' => $profilesid,
						'position' => $row_cast->position,
						'position_name' => $row_cast->position_name,
						'post_type' => $row_cast->post_type,
						'credited' => $row_cast->credited,
						'charactername' => $row_cast->charactername,
						'created_at' => mysqldatetime()
					);
					$this->db->insert('film_castcrew', $data_cast);
				}

				//PRESSKIT
				$this->db->where('movieid', trim($row->unique_id));
				$query_press = $this->db->get('tbl_imdb_presskit');
				foreach ($query_press->result() as $row_press){
					//GET FILES
					$file_press = "";
					if($row_press->path <> ''){
						$url = 'http://www.indonesianfilmcenter.com/'.str_replace(' ', '%20', $row_press->path);
						$last = end(explode('/', $row_press->path));
						$filepress = 'filmdata/'.date('Y-m').'/'.$last;
						$savefile = file_put_contents($filepress, file_get_contents($url));
						if($savefile){
							$file_press = $filepress;
						}
					}

					//INSERT DATA PRESSKIT
					$datapress = array(
						'film_id' => $filmlistid,
						'file' => $row_press->file,
						'path' => $file_press,
						'posted' => $row_press->posted
					);
					$this->db->insert('film_presskit', $datapress);
				}

				//AWARD
				$this->db->where('movieid', trim($row->unique_id));
				$query_award = $this->db->get('tbl_imdb_award');
				foreach ($query_award->result() as $row_award){
					//INSERT DATA
					$dataaward = array(
						'film_id' => $filmlistid,
						'festival' => $row_award->festival,
						'location' => $row_award->location,
						'award' => $row_award->award,
						'recipient' => $row_award->recipient
					);
					$this->db->insert('film_award', $dataaward);
				}

				//REVIEW
				$this->db->where('movieid', trim($row->unique_id));
				$query_review = $this->db->get('tbl_imdb_review');
				foreach ($query_review->result() as $row_review){
					//INSERT DATA
					$datareview = array(
						'film_id' => $filmlistid,
						'review' => $row_review->review,
						'label' => $row_review->label,
						'types' => $row_review->types,
						'posted' => $row_review->posted
					);
					$this->db->insert('film_review', $datareview);
				}

				//TRIVIA
				$this->db->where('movieid', trim($row->unique_id));
				$query_trivia = $this->db->get('tbl_imdb_trivia');
				foreach ($query_trivia->result() as $row_trivia){
					//INSERT DATA
					$datatrivia = array(
						'film_id' => $filmlistid,
						'category' => $row_trivia->category,
						'trivia' => $row_trivia->trivia,
						'trivia_eng' => $row_trivia->trivia_eng
					);
					$this->db->insert('film_trivia', $datatrivia);
				}
			}

			$indexsync = $indexsync+1;
			$data_index = array("sync_index" => $indexsync);
			$this->db->where('desc', 'filmfeature');
			$this->db->update('syncdata', $data_index);

			echo $row->unique_id." : ".$row->title." (SUCCESS at ".date('Y-m-d H:i:s').")"."\n";
		}
	}

	function filmstillincinema(){
		$this->db->select('*');
		$this->db->from('tbl_list_stillincinema');
		$query = $this->db->get();
		foreach ($query->result() as $row){
			$this->db->select('*');
			$this->db->from('tbl_imdb');
			$this->db->where('unique_id', $row->movieid);
			$querymovie = $this->db->get();
			foreach ($querymovie->result() as $rowmovie){
				$this->db->select('*');
				$this->db->from('film_list');
				$this->db->where('LOWER(title)', strtolower(trim($rowmovie->title)));
				$querycek = $this->db->get();
				if($querycek->num_rows() > 0){
					foreach ($querycek->result() as $rowfilm){
						//INSERT DATA
						$data = array(
							'film_list_id' => $rowfilm->id,
							'created_at' => mysqldatetime()
						);
						$this->db->insert('film_list_stillincinema', $data);

						echo $rowfilm->id." : ".$rowfilm->title." (SUCCESS at ".date('Y-m-d H:i:s').")"."\n";
					}
				}
			}
		}
	}

	function filmcomingsoon(){
		$this->db->select('*');
		$this->db->from('tbl_list_comingsoon');
		$query = $this->db->get();
		foreach ($query->result() as $row){
			$this->db->select('*');
			$this->db->from('tbl_imdb');
			$this->db->where('unique_id', $row->movieid);
			$querymovie = $this->db->get();
			foreach ($querymovie->result() as $rowmovie){
				$this->db->select('*');
				$this->db->from('film_list');
				$this->db->where('LOWER(title)', strtolower(trim($rowmovie->title)));
				$querycek = $this->db->get();
				if($querycek->num_rows() > 0){
					foreach ($querycek->result() as $rowfilm){
						//INSERT DATA
						$data = array(
							'film_list_id' => $rowfilm->id,
							'created_at' => mysqldatetime()
						);
						$this->db->insert('film_list_comingsoon', $data);

						echo $rowfilm->id." : ".$rowfilm->title." (SUCCESS at ".date('Y-m-d H:i:s').")"."\n";
					}
				}
			}
		}
	}
}
