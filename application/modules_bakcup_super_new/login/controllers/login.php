<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller{
	function Login(){
		parent::__construct();
	}

	function member(){
		$this->db->where('email', trim($_POST['email']));
		$this->db->where('password', md5(trim($_POST['password'])));
		$this->db->where('status', 'Active');
		$query = $this->db->get('film_member');
		if($query->num_rows() > 0){
			foreach ($query->result() as $row){
				$name = explode(" ",$row->nama);
				$firstname = $name[0];
				$data_member = array(
					'id' => $row->id,
				 	'email' => $row->email,
				 	'nama' => $firstname,
				 	'picture' => 'http://116.206.196.146/uploads/'.$row->picture,
				 	'alamat' => $row->alamat,
				 	'telepon' => $row->telepon,
					'login_idfc'=>"done"
				);

				setSession($data_member);
			}
			redirect('/');
			//echo json_encode(array("success"=>"true","redirect_url"=>str_replace('#', '', $_POST['redirect'])));
		}else{
			redirect('/');
			//echo json_encode(array("success"=>"false"));
		}
	}

	function login_facebook(){
		$data_member = array(
			'id_facebook' => $_POST['id'],
			'email' => $_POST['email'],
			'nama' => $_POST['first_name']." ".$_POST['last_name'],
			'picture' => $_POST['picture']['data']['url'],
			'alamat' => "",
			'telepon' => "",
			'status' => "Active"
		);

		$this->db->where('id_facebook', trim($_POST['id']));
		$query = $this->db->get('film_member');
		if($query->num_rows() > 0){
			foreach ($query->result() as $row){
				$name = explode(" ",$row->nama);
				$firstname = $name[0];
				if (strpos($row->picture, 'uploads') !== false) {
					$picture = 'http://116.206.196.146/'.$row->picture;
				}elseif(strpos($row->picture, 'filmdata') !== false){
					$picture = 'http://116.206.196.146/'.$row->picture;
				}else{
					$picture = $row->picture;
				}
				$data_member = array(
					'id' => $row->id,
					'email' => $row->email,
					'nama' => $firstname,
					'picture' => $picture,
					'alamat' => $row->alamat,
					'telepon' => $row->telepon,
					'login_idfc'=>"done"
				);

				setSession($data_member);
			}
		}else{
			$this->db->insert("film_member",$data_member);
			$data_member['login_idfc'] = "done";
			setSession($data_member);
		}

		echo json_encode(array("id"=>$_POST['id']));
	}

	function unsubscribe($email){
		$data["content"] = "login/unsubscribe";
		getSkin($data);
	}

	function blasts(){

		# ================================== EVENT ============================================
		$data_event =
				$this->db->select("*")
				->from('film_event')
				->where('status','Active')
				->order_by('created_at','desc')
				->get()->result();
		$event_html = "<a href='".base_url()."/filmnews' style='color:white;text-decoration:none'><div style='background-color: #8a2617;padding: 10px 5px;width:100%;color:white;'><b style='font-size: 18px;padding: 10px;'>Events</b></div></a>";
		foreach($data_event as $row) {
			$data_event_loc =
					$this->db->select("*")
					->from("film_event_location")
					->where('event_id',$row->id)
					->order_by('event_date','desc')
					->get()->result();

			$event_html .="<h3><b>".$row->title."</b></h3>";
			$isi = $row->isi_news;

			$event_html .="<p>".$isi."</p>";
			$event_html .= "<a href='".base_url()."/filmnews'>Selengkapnya</a>";
			$event_html .= "<div style='background-color:#b4b4b4;padding:0.5px;width:1000px;'></div>";
		}
		#$event_html .= "<div style='background-color:#b4b4b4;padding:0.5px;width:1000px;'>";

		# ============================================ FILMNEWS =======================================================

		$data_film =
				$this->db->select("*")
				->from("film_news")
				->order_by('created_at','desc')
				->where('deleted_at is null',null,false)
				->limit(5)
				->get()->result();

		$film_html = "<a href='".base_url()."/filmnews' style='color:white;text-decoration:none'><div style='background-color: #8a2617;padding: 10px 5px;width:100%;color:white;'><b style='font-size: 18px;padding: 10px;'>Film News</b></div></a>";
		$film_html .= "";
		foreach ($data_film as $value) {
			$film_html .= "
			<div style='min-height:165 !important;'>
				<h6><b>".$value->sumber."</b></h6>
				<h4><b>".$value->title_film_news."</b></h4>
				<table style='width:100%'>
				  <tr>
				    <th></th>
				    <th></th>
				  </tr>
				  <tr>
				    <td><a href='".$value->selengkapnya."' ><img src='http://116.206.196.146/".$value->cover."' style='width: 150px;float: left;padding-right: 20px;'></a></td>
				    <td style='vertical-align: top;'>
				    <p style=''>".$value->description."</p>
					<a href='".$value->selengkapnya."' style='
					color: white;
			    		text-decoration: none;
			    		background-color: red;
			    		padding: 7px 15px;
			    		vertical-align: top;
			    		border-radius: 7px;'>Lihat Selengkapnya</a></td>
				  </tr>
				</table>
				<div style='padding:0.5;background-color:#b4b4b4;'></div>
		    	</div>
			";

		}
		#$film_html .= "<div style='background-color:#b4b4b4;padding:0.5px;margin-bottom:5px;'></div>";

		# ===================================== VIDEO TERBARU =========================================
		$vterbaru = "";

		$data_vterbaru =
				$this->db->select("*")
				->from("film_list")
				->where('status','Active')
				->where('deleted_at is null',null,false)
				->where('category_id','7')
				->order_by('created_at','desc')
				->limit(5)
				->get()->result();

		$vterbaru .= "<a href='".base_url()."' style='color:white;text-decoration:none'><div style='background-color: #8a2617;padding: 10px 5px;width:100%;color:white;'><b style='font-size: 18px;padding: 10px;'>Video Terbaru</b></div></a>";
		$vterbaru .= "<table style='width:100%'><tr><th></th></tr><tr><td>";
		#$vterbaru .= "<div style='background-color:#b4b4b4;padding:0.5px;'></div>";
		foreach ($data_vterbaru as $row) {
			$link = base_url().'/detail/index/'.str_replace(" ", "-",strtolower($row->title)).'/'.$row->id;
			$vterbaru .= "
			<div style='float:left;'>
				<a href='".$link."'><h4 style='text-align:center;width:150px;min-height:40px;'><b>".$row->title."</b></h4></a>
				<a href='".$link."'><img src='http://116.206.196.146/".str_replace(' ', '%20', $row->cover)."' style='width: 150px;float: left;padding-right: 20px;'></a>
		    	</div>
			";
		}
		$vterbaru .= "</td></tr></table>";

		# =============================================================================================

		# ===================================== STILL IN CINEMA =========================================
		$cinema = "";

		$data_cinema =
				$this->db->select("*")
				->from("film_list_stillincinema")
				->join('film_list','film_list_stillincinema.film_list_id = film_list.id')
				->where('film_list.status','Active')
				->where('film_list_stillincinema.deleted_at is null',null,false)
				->where('film_list.category_id','2')
				->order_by('film_list_stillincinema.new','asc')
				->order_by('film_list_stillincinema.id','asc')
				#->limit(5)
				->get()->result();
		$cinema .= "<a href='".base_url()."/filminfo' style='color:white;text-decoration:none'><div style='background-color: #8a2617;padding: 10px 5px;width:100%;color:white;'><b style='font-size: 18px;padding: 10px;'>Minggu Ini Di Bioskop</b></div></a>";
		$cinema .= "<table style='width:100%'><tr><th></th></tr><tr><td>";

		foreach ($data_cinema as $row) {
			$link = ''.base_url().'/detail/index/'.str_replace(" ", "-",strtolower($row->title)).'/'.$row->film_list_id;
			$cinema .= "

			<div style='float:left; height: 400px;'>
				<a href='".$link."'><h4 style='text-align:center;width:150px;min-height:40px;'><b>".$row->title."</b></h4></a>
			";

			if($row->new == "yes"){
				$cinema .= "
				<div style='
				    background-color:  red;
				    margin-right: 20px;
				    padding: 7px;
				    text-align:  center;
				    color:  white;
				'>NEW</div>
				";
			}

			$cinema .="
				<a href='".$link."'><img src='http://116.206.196.146/".$row->cover."' style='width: 150px;float: left;padding-right: 20px;'></a>
		    	</div>

			";
		}
		$cinema .= "</td></tr></table>";
		# =============================================================================================

		# ===================================== PROMOSI =========================================
		$promosi = "";

		$data_promosi =
				$this->db->select("*")
				->from("film_list")
				#->distinct()
				->join('film_shop','film_shop.film_id = film_list.id')
				->where('film_list.category_id','2')
				->where('film_shop.qty >',0)
				->where('film_list.id <>',804)
				->where('film_list.deleted_at is null',null,false)
				->where('film_shop.deleted_at is null',null,false)
				->order_by('film_list.created_at','desc')
				->limit(5)
				->get()->result();

				$text="0";
				$categories="C";
				$paid="P";
				$year="0-0";
				$length="L";
				$genre="G";
				$data["text"] = str_replace('%20', ' ', $text);
				$data["categories"] = $categories;
				$data["paid"] = $paid;
				$data["year"] = $year;
				$data["length"] = $length;
				$data["genre"] = $genre;
				$where = "AND film_list.status='Active' AND film_list.deleted_at is null ";
				if($text<>'0'){
					$where .= "AND film_list.title LIKE '%".$data["text"]."%' ";
				}

				if ($paid<>'P') {
					$pos = strpos($paid, 'all');
					if($pos === false){
						$paids = explode('-',$paid);
						foreach ($paids as $paid_data) {
							if($paid_data == 'free'){
								#$where .= 'AND (SELECT price FROM film_shop WHERE film_id=film_list.id AND ( type="online streaming" or type="dvd" or type="vcd" ) AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1) IS NULL ';
								$where .= 'AND NOT EXISTS (SELECT id FROM film_shop WHERE film_id = film_list.id AND price > 0 AND qty > 0 LIMIT 1)';
							}
							if($paid_data == 'paid'){
								$where .= 'AND (SELECT price FROM film_shop WHERE film_id=film_list.id AND price > 0 AND qty > 0 /*AND stock != "Habis"*/  LIMIT 1) > 0 ';
							}
							if($paid_data == '0.15'){
								#$where .= 'AND (SELECT price FROM film_shop WHERE film_id=film_list.id AND ( type="online streaming" or type="dvd" or type="vcd" ) AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1) BETWEEN 0 AND 15000 ';
								$where .= 'AND (SELECT price FROM film_shop WHERE film_id=film_list.id AND price BETWEEN 0 AND 15000  AND qty > 0 /*AND stock != "Habis"*/  LIMIT 1) > 0 ';
							}
							if($paid_data == '15.50'){
								#$where .= 'AND (SELECT price FROM film_shop WHERE film_id=film_list.id AND ( type="online streaming" or type="dvd" or type="vcd" ) AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1) BETWEEN 15000 AND 50000 ';
								$where .= 'AND (SELECT price FROM film_shop WHERE film_id=film_list.id AND price BETWEEN 15000 AND 50000  AND qty > 0 /*AND stock != "Habis"*/  LIMIT 1) > 0 ';
							}
							if($paid_data == '50.100'){
								#$where .= 'AND (SELECT price FROM film_shop WHERE film_id=film_list.id AND ( type="online streaming" or type="dvd" or type="vcd" ) AND status="Active" AND deleted_at IS NOT NULL ORDER BY created_at DESC LIMIT 1) BETWEEN 50000 AND 100000 ';
								$where .= 'AND (SELECT price FROM film_shop WHERE film_id=film_list.id AND price BETWEEN 50000 AND 100000  AND qty > 0 /*AND stock != "Habis"*/  LIMIT 1) > 0 ';
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
								$where .= "AND ( film_list.durasi >= 60 OR LENGTH(film_list.durasi) = 7)";
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
						$where .= "AND film_list_genre.film_genre_id = $genre ";
						$joinya = " INNER JOIN film_list_genre ON film_list.id = film_list_genre.film_list_id";
					}
				}

				$where .= ' AND film_list.deleted_at IS NULL ';
				$join_dvd ="";
				$where_join_dvd = "
				AND film_list.id IN
				(SELECT film_shop.film_id
				FROM film_shop
				WHERE film_shop.qty > 0
						AND film_shop.deleted_at IS NULL
				       AND ( film_shop.type = 'dvd'
				              OR film_shop.type = 'vcd' )
				       GROUP BY film_shop. id
						HAVING COUNT(film_shop.id)=1
						)

				";
				$data_promosi = $this->db->query('SELECT film_list.*,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="online streaming" AND status="Active" AND deleted_at IS NULL AND qty > 0 ORDER BY created_at DESC LIMIT 1),0) streaming_price,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="dvd" AND status="Active" AND deleted_at IS NULL AND qty > 0 ORDER BY created_at DESC LIMIT 1),0) dvd_price,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="vcd" AND status="Active" AND deleted_at IS NULL AND qty > 0 ORDER BY created_at DESC LIMIT 1),0) vcd_price,(SELECT video FROM film_shop_movie WHERE film_id=film_list.id) fullmovie FROM film_list '.$joinya.' '.$join_dvd.'WHERE film_list.category_id=2 '.$where.' '.$where_join_dvd.' ORDER BY film_list.tahun DESC LIMIT 5')->result();


		$promosi .= "<a href='".base_url()."/watchfilms' style='color:white;text-decoration:none'><div style='background-color: #8a2617;padding: 10px 5px;width:100%;color:white;'><b style='font-size: 18px;padding: 10px;'>Paid Films</b></div></a>";
		$promosi .= "<table style='width:100%'><tr><th></th></tr><tr><td>";
		foreach ($data_promosi as $row) {
			$link = base_url().'/detail/index/'.str_replace(" ", "-",strtolower($row->title)).'/'.$row->id;
			#$link = '".base_url()."/watchfilm';
			$get_price = $this->db->query('SELECT film_list.*,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="online streaming" AND status="Active" AND deleted_at IS NULL ORDER BY created_at DESC LIMIT 1),0) streaming_price,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="dvd" AND status="Active" AND deleted_at IS NULL ORDER BY created_at DESC LIMIT 1),0) dvd_price,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="vcd" AND status="Active" AND deleted_at IS NULL ORDER BY created_at DESC LIMIT 1),0) vcd_price,(SELECT video FROM film_shop_movie WHERE film_id=film_list.id) fullmovie FROM film_list WHERE film_list.category_id=2 AND (SELECT video FROM film_shop_movie WHERE film_id=film_list.id) IS NOT NULL AND film_list.id='.$row->id.'');
			foreach($get_price->result() as $roow){

				if($roow->dvd_price == '0'){
					$harga = $roow->dvd_price;
				}else{
					$harga = number_format($roow->dvd_price,0,',','.');
				}
			}
			$promosi .= "

			<div style='float:left;'>
				<a href='".$link."'><h4 style='text-align:center;width:150px;min-height:40px;'><b>".$row->title."</b></h4></a>
				<div style='
				    background-color:  red;
				    margin-right: 20px;
				    padding: 7px;
				    text-align:  center;
				    color:  white;
				'>".number_format($row->dvd_price)."</div>
				<a href='".$link."'><img src='http://116.206.196.146/".str_replace(" ", "%20",$row->cover)."' style='width: 150px;float: left;padding-right: 20px;'></a>
		    	</div>

			";
		}
		$promosi .= "</td></tr></table>";

		# =============================================================================================

		# ===================================== ARCHIVE =========================================
		$archive = "";
		$data_archive =
				$this->db->select("*")
				->from("film_list")
				->where('film_list.status','Active')
				->where('film_list.category_id','4')
				->where('film_list.deleted_at is null',null,false)
				->order_by('film_list.created_at','desc')
				->limit(5)
				->get()->result();


		$archive .= "<a href='".base_url()."/filmarchive' style='color:white;text-decoration:none'><div style='background-color: #8a2617;padding: 10px 5px;width:100%;color:white;'><b style='font-size: 18px;padding: 10px;'>Film Archive Terbaru</b></div></a>";
		$archive .= "<table style='width:100%'><tr><th></th></tr><tr><td>";
		foreach ($data_archive as $row) {
			$title = str_replace(" ", "%20",strtolower($row->title));
			$title = preg_replace("/\([^)]+\)/","",$title);
			$link = base_url().'/filmarchive/search/all/1912-2019/'.$title.'/P/L';

			$archive .= "

			<div style='float:left;'>
				<a href='".$link."'><h4 style='text-align:center;width:150px;min-height:40px;'><b>".$row->title."</b></h4></a>

				<a href='".$link."'><img src='http://116.206.196.146/".$row->cover."' style='width: 150px;float: left;padding-right: 20px;'></a>
		    	</div>

			";
		}
		$archive .= "</td></tr></table>";
		# =============================================================================================

		$now = date('Y-m-d');
		$content =
			$this->db->select('*')
			->from("schedule_blast")
			->where('date =',$now)
			->where('sent is null',null,false)
			->get()->result();
		$email_template =
			$this->db->select("*")
			->from("cms_email_templates")
			->where('name =','Newsletter')
			->get()->result();

		foreach ($content as $content) {
			$isi_email = $email_template[0]->content;
			$this->db->where("id",$content->id)->update("schedule_blast",array("sent"=>1));

			$member =
				$this->db->select("*")
				->from("film_member")
				->get()->result();

			foreach ($member as $value) {
				#if($value->id > 368){

				#if($value->email != "orlow@idfilmcenter.com" && $value->email != "orlow.eos@gmail.com"){
				if(filter_var($value->email, FILTER_VALIDATE_EMAIL)) {
					$isi_emailnya = str_replace('[user_name]', $value->nama, $isi_email);
					#$isi_emailnya = str_replace('[user_name]', "Orlow Seunke", $isi_email);
					$isi_emailnya = str_replace('[filmnews]', $film_html, $isi_emailnya);
					$isi_emailnya = str_replace('[filmevent]', $event_html, $isi_emailnya);
					$isi_emailnya = str_replace('[filmpilihan]', $vterbaru, $isi_emailnya);
					$isi_emailnya = str_replace('[filmcinema]', $cinema, $isi_emailnya);
					$isi_emailnya = str_replace('[promosi]', $promosi, $isi_emailnya);
					$isi_emailnya = str_replace('[archive]', $archive, $isi_emailnya);

					$isi_emaill['content'] = $isi_emailnya;
					$isi_emaill['email_unsub'] = $value->email;
					$isi_emaill['date_post'] = $content->date;
					$email_message = $this->load->view("mail",$isi_emaill,TRUE);

					$this->load->library('email');
					$subject = "Indonesian Film Center Newsletter ".date('d F, Y', strtotime($isi_emaill['date_post']));
					$email_from = "info@idfilmcenter.com";

					$config['protocol'] = 'mail';
					$config['mailtype'] = 'html';
					$config['charset'] = 'utf-8';
					$config['wordwrap'] = TRUE;

					$this->email->initialize($config);

					$this->email->from($email_from, 'Indonesian Film Center');

					$this->email->to($value->email);
					// $this->email->to("irvanseptian80@gmail.com");
					$this->email->subject($subject);
					$this->email->message($email_message);
					$this->email->send();
					echo $value->id." == ".$value->email."<br>";
					}
					// exit;
						#}
					#}

			}

		}
	}

}
