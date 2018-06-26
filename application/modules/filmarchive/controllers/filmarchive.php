<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class filmarchive extends CI_Controller{
	function filmarchive(){
		parent::__construct();
	}

	function index($category="all",$rangeyear="1941-1950",$text="0",$paid="P",$length="L",$year="0-0"){
		$data["content"] = "filmarchive/filmarchive";

		$text = str_replace("%20"," ",$text);

		$expyear = explode('-',$rangeyear);
		$data["firstyear"] = $expyear[0];
		$data["yearstart"] = 1901;
		if($expyear[0]<1921){
			$data["yeardefault"] = 1901;
			$data["yeardefault2"] = 1901;
		}else{
			$data["yeardefault"] = $expyear[0]-20;
			$data["yeardefault2"] = $expyear[0]-20;
		}

		$data["rangeyear"] = $expyear[0]." - ".$expyear[1];
		$data["rangeyearnext"] = strval($expyear[0]+10)." - ".strval($expyear[1]+10);
		$data["rangeyearbefore"] = strval($expyear[0]-10)." - ".strval($expyear[1]-10);
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
			$where .= "AND LOWER(title) LIKE '%".strtolower($text)."%' ";
		}

		if($category<>'all'){
			$where .= "AND archive_id = '$category' ";
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

		$data['year1'] = "";
		$data['year2'] = "";
		if ($rangeyear<>'0-0') {
			$rangeyear = explode('-',$rangeyear);
			$where .= "AND tahun BETWEEN ".$rangeyear[0]." AND ".$rangeyear[1]." ";
			$data['year1'] = $rangeyear[0];
			$data['year2'] = $rangeyear[1];
		}

		$data['where'] = $where;
		if($category== 1){
			$data['title'] = "Video Pribadi";
        }else if($category== 2){
			$data['title'] ="Budaya";
        }else if($category== 3){
			$data['title'] ="Pemerintahan";
        }else if($category== 4){
			$data['title'] = "Laporan";
        }else if($category== 5){
			$data['title'] = "Lain - Lain";
        }else{
			$data['title'] = "Film Archive";
        }



		getSkin($data);
	}

	function search($category="all",$rangeyear="1941-1950",$text="0",$paid="P",$length="L",$alphabet="0",$year="0-0"){
		$data["content"] = "filmarchive/search";
		$data['title']	= "Search";

		$text = str_replace("%20"," ",$text);

		$expyear = explode('-',$rangeyear);
		$data['word'] = $alphabet;
		$data["firstyear"] = $expyear[0];
		$data["yearstart"] = 1901;
		if($expyear[0]<1921){
			$data["yeardefault"] = 1901;
			$data["yeardefault2"] = 1901;
		}else{
			$data["yeardefault"] = $expyear[0]-20;
			$data["yeardefault2"] = $expyear[0]-20;
		}

		$data["rangeyear"] = $expyear[0]." - ".$expyear[1];
		$data["rangeyearnext"] = strval($expyear[0]+10)." - ".strval($expyear[1]+10);
		$data["rangeyearbefore"] = strval($expyear[0]-10)." - ".strval($expyear[1]-10);
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

		$query = $this->db->query('select count(*) total from film_list where ( durasi >= 60 OR LENGTH(durasi) = 7) and status="Active" and category_id="4"');
		foreach ($query->result() as $row){
		  $data['film_durasi_60'] = $row->total;
		}

		$where = "AND status='Active' ";
		if($text<>'0'){
			$where .= "AND LOWER(title) LIKE '%".strtolower($text)."%' ";
		}

		if($category<>'all'){
			$where .= "AND archive_id = '$category' ";
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
						$where .= "AND ( durasi > 60 OR LENGTH(durasi) = 7) ";
					}
				}
			}
		}

		$data['year1'] = "";
		$data['year2'] = "";
		if ($rangeyear<>'0-0') {
			$rangeyear = explode('-',$rangeyear);
			$where .= "AND tahun BETWEEN ".$rangeyear[0]." AND ".$rangeyear[1]." ";
			$data['year1'] = $rangeyear[0];
			$data['year2'] = $rangeyear[1];
		}

		if($alphabet=="NO"){
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
		}else if($alphabet<>"0" and $alphabet<>"#"){
			$where .= 'AND film_list.title LIKE "'.$alphabet.'%" order by title asc';
		}

		$jum_all = $this->db->query('SELECT count(*) as count FROM film_list WHERE category_id=4 '.$where.'')->result()[0]->count;
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

		$data['listdata1'] = $this->db->query('SELECT * FROM film_list WHERE category_id=4 '.$where.' LIMIT '.$start_from.', '.$limit.'');

		$data['where'] = $where;

		getSkin($data);
	}

	function see_more($category="all",$rangeyear="1941-1950",$text="0",$paid="P",$length="L",$alphabet="0",$year="0-0"){

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

		$height = "128px";

		$expyear = explode('-',$rangeyear);
		$data['word'] = $alphabet;
		$data["firstyear"] = $expyear[0];
		$data["yearstart"] = 1901;
		if($expyear[0]<1921){
			$data["yeardefault"] = 1901;
			$data["yeardefault2"] = 1901;
		}else{
			$data["yeardefault"] = $expyear[0]-20;
			$data["yeardefault2"] = $expyear[0]-20;
		}

		$data["rangeyear"] = $expyear[0]." - ".$expyear[1];
		$data["rangeyearnext"] = strval($expyear[0]+10)." - ".strval($expyear[1]+10);
		$data["rangeyearbefore"] = strval($expyear[0]-10)." - ".strval($expyear[1]-10);
		$data["rangedefault"] = $rangeyear;

		$data["text"] = $text;
		$data["category"] = $category;
		$data["paid"] = $paid;
		$data["length"] = $length;

		$where = "AND status='Active' ";
		if($text<>'0'){
			$where .= "AND LOWER(title) LIKE '%".strtolower($text)."%' ";
		}

		if($category<>'all'){
			$where .= "AND archive_id = '$category' ";
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

		$data['year1'] = "";
		$data['year2'] = "";
		if ($rangeyear<>'0-0') {
			$rangeyear = explode('-',$rangeyear);
			$where .= "AND tahun BETWEEN ".$rangeyear[0]." AND ".$rangeyear[1]." ";
			$data['year1'] = $rangeyear[0];
			$data['year2'] = $rangeyear[1];
		}

		if($alphabet=="NO"){
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
		}else if($alphabet<>"0" and $alphabet<>"#"){
			$where .= 'AND film_list.title LIKE "'.$alphabet.'%"';
		}

		if(isset($_POST["no"]) && !empty($_POST["no"])){
			$jum_all = $this->db->query('SELECT count(*) as count FROM film_list WHERE category_id=4 '.$where.'')->result()[0]->count;

			$start = $_POST["no"] + 1;
			$limit = $_POST["no"] + 15;

			$listdata1 = $this->db->query('SELECT * FROM film_list WHERE category_id=4 '.$where.' LIMIT '.$start.', 15');

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
                                        <source id="source-movie<?php echo $satu;?>" src="" type='video/mp4'>
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
                                  <div class="genre-detail-durasi" id="created_at<?php echo $satu;?>">Diunggah Pada: 11-02-2013</div>
                                  <div class="genre-detail-durasi" id="o_title<?php echo $satu;?>">Judul Asli: Autobedrijf Fuchs & Rens 1902 - 1927</div>
                                  <div class="genre-detail-durasi" id="tahun_produksi<?php echo $satu;?>">Tahun Produksi: 1927</div>
                                  <div class="genre-detail-durasi" id="negara_produksi<?php echo $satu;?>">Tahun Produksi: 1927</div>
                                  <div class="genre-detail-durasi" id="lokasi_produksi<?php echo $satu;?>">Lokasi Produksi: 1927</div>
                                  <div class="genre-detail-durasi" id="category-detail<?php echo $satu;?>">Durasi: 1927</div>
                                  <div class="genre-detail-durasi" id="durasi-detail<?php echo $satu;?>">Durasi: 1927</div><br>

                                  <div class="genre-detail-durasi" id="company-detail<?php echo $satu;?>">Company: </div>
                                  <div class="genre-detail-durasi" id="source-detail<?php echo $satu;?>">Source Name: </div>
                                  <div class="genre-detail-durasi" id="number-id<?php echo $satu;?>">Number ID: </div>
                                  <!--<div class="genre-detail-durasi" id="director-detail1">Director: AA</div>-->
                                <div id="disediakan<?php echo $satu;?>">
                                    <a class="difo">Disediakan Oleh:</br></a>
                                    <img id="dsd_image<?php echo $satu;?>" src="" style="width: 100px;"></br>
                                    <a class="difo">Tertarik dengan video ini?</br></a>
                                    <a class="difo" data-toggle="collapse" data-target="#detail_drop<?php echo $satu;?>" style="cursor: pointer;">Klik disini untuk informasi lebih lanjut!</a>
                                    <div id="detail_drop<?php echo $satu;?>" class="collapse" style="padding: 10px; background-color: #f4f4f4; border-radius: 5px;border:1px solid #b4b4b4;">
                                        <a class="difo" style="color:black;">Tentang video FilmArchive ini</a></br>
                                        <p style="font-size: 11px;
                                    line-height: 1.4;">
                                        Pemilik hak hukum video ini adalah <span id="dsd_company_name<?php echo $satu;?>"></span>.</br>
                                        Jika Anda ingin menggunakan video ini, silahkan hubungi:</br>
                                        Situs:</br>
                                        <span id="dsd_site<?php echo $satu;?>"></span></br>
                                        Anda tidak memiliki hak untuk menggunakan video ini tanpa izin dari pemilik hak-hak hukum!
                                        </p>
                                    </div>
                                </div>

                                  <div class="genre-detail-desc" id="informasi-detail<?php echo $satu;?>">Pertarungan sengit antara tukang koran dan penjajah. Dimana mereka harus semir sepatu untuk makan setiap abad.</div>
                                  <div class="genre-detail-share">
                                      Share This Movie:
                                      <i class="fa fa-facebook"></i>
                                      <i class="fa fa-twitter"></i>
                                      <i class="fa fa-google-plus"></i>
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
                                    <source id="source-movie<?php echo $dua;?>" src="" type='video/mp4'>
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
                                  <div class="genre-detail-durasi" id="created_at<?php echo $dua;?>">Diunggah Pada: 11-02-2013</div>
                                  <div class="genre-detail-durasi" id="o_title<?php echo $dua;?>">Judul Asli: Autobedrijf Fuchs & Rens 1902 - 1927</div>
                                  <div class="genre-detail-durasi" id="tahun_produksi<?php echo $dua;?>">Tahun Produksi: 1927</div>
                                  <div class="genre-detail-durasi" id="negara_produksi<?php echo $dua;?>">Tahun Produksi: 1927</div>
                                  <div class="genre-detail-durasi" id="lokasi_produksi<?php echo $dua;?>">Lokasi Produksi: 1927</div>
                                  <div class="genre-detail-durasi" id="category-detail<?php echo $dua;?>">Durasi: 1927</div>
                                  <div class="genre-detail-durasi" id="durasi-detail<?php echo $dua;?>">Durasi: 1927</div><br>

                                  <div class="genre-detail-durasi" id="company-detail<?php echo $dua;?>">Company: </div>
                                  <div class="genre-detail-durasi" id="source-detail<?php echo $dua;?>">Source Name: </div>
                                  <div class="genre-detail-durasi" id="number-id<?php echo $dua;?>">Number ID: </div>
                                  <!--<div class="genre-detail-durasi" id="director-detail1">Director: AA</div>-->
                                <div id="disediakan<?php echo $dua;?>">
                                    <a class="difo">Disediakan Oleh:</br></a>
                                    <img id="dsd_image<?php echo $dua;?>" src="" style="width: 100px;"></br>
                                    <a class="difo">Tertarik dengan video ini?</br></a>
                                    <a class="difo" data-toggle="collapse" data-target="#detail_drop<?php echo $dua;?>" style="cursor: pointer;">Klik disini untuk informasi lebih lanjut!</a>
                                    <div id="detail_drop<?php echo $dua;?>" class="collapse" style="padding: 10px; background-color: #f4f4f4; border-radius: 5px;border:1px solid #b4b4b4;">
                                        <a class="difo" style="color:black;">Tentang video FilmArchive ini</a></br>
                                        <p style="font-size: 11px;
                                    line-height: 1.4;">
                                        Pemilik hak hukum video ini adalah <span id="dsd_company_name<?php echo $dua;?>"></span>.</br>
                                        Jika Anda ingin menggunakan video ini, silahkan hubungi:</br>
                                        Situs:</br>
                                        <span id="dsd_site<?php echo $dua;?>"></span></br>
                                        Anda tidak memiliki hak untuk menggunakan video ini tanpa izin dari pemilik hak-hak hukum!
                                        </p>
                                    </div>
                                </div>

                                  <div class="genre-detail-desc" id="informasi-detail<?php echo $dua;?>">Pertarungan sengit antara tukang koran dan penjajah. Dimana mereka harus semir sepatu untuk makan setiap abad.</div>
                                  <div class="genre-detail-share">
                                      Share This Movie:
                                      <i class="fa fa-facebook"></i>
                                      <i class="fa fa-twitter"></i>
                                      <i class="fa fa-google-plus"></i>
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
                                    <source id="source-movie<?php echo $tiga;?>" src="" type='video/mp4'>
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
                                  <div class="genre-detail-durasi" id="created_at<?php echo $tiga;?>">Diunggah Pada: 11-02-2013</div>
                                  <div class="genre-detail-durasi" id="o_title<?php echo $tiga;?>">Judul Asli: Autobedrijf Fuchs & Rens 1902 - 1927</div>
                                  <div class="genre-detail-durasi" id="tahun_produksi<?php echo $tiga;?>">Tahun Produksi: 1927</div>
                                  <div class="genre-detail-durasi" id="negara_produksi<?php echo $tiga;?>">Tahun Produksi: 1927</div>
                                  <div class="genre-detail-durasi" id="lokasi_produksi<?php echo $tiga;?>">Lokasi Produksi: 1927</div>
                                  <div class="genre-detail-durasi" id="category-detail<?php echo $tiga;?>">Durasi: 1927</div>
                                  <div class="genre-detail-durasi" id="durasi-detail<?php echo $tiga;?>">Durasi: 1927</div><br>

                                  <div class="genre-detail-durasi" id="company-detail<?php echo $tiga;?>">Company: </div>
                                  <div class="genre-detail-durasi" id="source-detail<?php echo $tiga;?>">Source Name: </div>
                                  <div class="genre-detail-durasi" id="number-id<?php echo $tiga;?>">Number ID: </div>
                                  <!--<div class="genre-detail-durasi" id="director-detail1">Director: AA</div>-->
                                <div id="disediakan<?php echo $tiga;?>">
                                    <a class="difo">Disediakan Oleh:</br></a>
                                    <img id="dsd_image<?php echo $tiga;?>" src="" style="width: 100px;"></br>
                                    <a class="difo">Tertarik dengan video ini?</br></a>
                                    <a class="difo" data-toggle="collapse" data-target="#detail_drop<?php echo $tiga;?>" style="cursor: pointer;">Klik disini untuk informasi lebih lanjut!</a>
                                    <div id="detail_drop<?php echo $tiga;?>" class="collapse" style="padding: 10px; background-color: #f4f4f4; border-radius: 5px;border:1px solid #b4b4b4;">
                                        <a class="difo" style="color:black;">Tentang video FilmArchive ini</a></br>
                                        <p style="font-size: 11px;
                                    line-height: 1.4;">
                                        Pemilik hak hukum video ini adalah <span id="dsd_company_name<?php echo $tiga;?>"></span>.</br>
                                        Jika Anda ingin menggunakan video ini, silahkan hubungi:</br>
                                        Situs:</br>
                                        <span id="dsd_site<?php echo $tiga;?>"></span></br>
                                        Anda tidak memiliki hak untuk menggunakan video ini tanpa izin dari pemilik hak-hak hukum!
                                        </p>
                                    </div>
                                </div>

                                  <div class="genre-detail-desc" id="informasi-detail<?php echo $tiga;?>">Pertarungan sengit antara tukang koran dan penjajah. Dimana mereka harus semir sepatu untuk makan setiap abad.</div>
                                  <div class="genre-detail-share">
                                      Share This Movie:
                                      <i class="fa fa-facebook"></i>
                                      <i class="fa fa-twitter"></i>
                                      <i class="fa fa-google-plus"></i>
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

	function js_see_more($category="all",$rangeyear="1941-1950",$text="0",$paid="P",$length="L",$alphabet="0",$year="0-0"){

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

		$height = "128px";

		$expyear = explode('-',$rangeyear);
		$data['word'] = $alphabet;
		$data["firstyear"] = $expyear[0];
		$data["yearstart"] = 1901;
		if($expyear[0]<1921){
			$data["yeardefault"] = 1901;
			$data["yeardefault2"] = 1901;
		}else{
			$data["yeardefault"] = $expyear[0]-20;
			$data["yeardefault2"] = $expyear[0]-20;
		}

		$data["rangeyear"] = $expyear[0]." - ".$expyear[1];
		$data["rangeyearnext"] = strval($expyear[0]+10)." - ".strval($expyear[1]+10);
		$data["rangeyearbefore"] = strval($expyear[0]-10)." - ".strval($expyear[1]-10);
		$data["rangedefault"] = $rangeyear;

		$data["text"] = $text;
		$data["category"] = $category;
		$data["paid"] = $paid;
		$data["length"] = $length;

		$where = "AND status='Active' ";
		if($text<>'0'){
			$where .= "AND LOWER(title) LIKE '%".strtolower($text)."%' ";
		}

		if($category<>'all'){
			$where .= "AND archive_id = '$category' ";
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

		$data['year1'] = "";
		$data['year2'] = "";
		if ($rangeyear<>'0-0') {
			$rangeyear = explode('-',$rangeyear);
			$where .= "AND tahun BETWEEN ".$rangeyear[0]." AND ".$rangeyear[1]." ";
			$data['year1'] = $rangeyear[0];
			$data['year2'] = $rangeyear[1];
		}

		if($alphabet=="NO"){
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
		}else if($alphabet<>"0" and $alphabet<>"#"){
			$where .= 'AND film_list.title LIKE "'.$alphabet.'%"';
		}

		if(isset($_POST["no"]) && !empty($_POST["no"])){
			$jum_all = $this->db->query('SELECT count(*) as count FROM film_list WHERE category_id=4 '.$where.'')->result()[0]->count;

			$start = $_POST["no"] + 1;
			$limit = $_POST["no"] + 15;

			$data['listdata1'] = $this->db->query('SELECT * FROM film_list WHERE category_id=4 '.$where.' LIMIT '.$start.', 15');

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

                    <?php if($lang == "en"){?>
                    $("#o_title<?php echo $satu;?>").html('Original Title : '+tmp.title_ori);
                    <?php }else{?>
                    $("#o_title<?php echo $satu;?>").html('Original Title : '+tmp.title_ori);
                    <?php }?>
                    $("#created_at<?php echo $satu;?>").html('Uploaded On : '+tmp.created_at);

                    if(tmp.archive_id == 1){
                        var category_archive = "Video Pribadi";
                    }else if(tmp.archive_id == 2){
                        var category_archive ="Budaya";
                    }else if(tmp.archive_id == 3){
                        var category_archive ="Pemerintahan";
                    }else if(tmp.archive_id == 4){
                        var category_archive = "Laporan";
                    }else if(tmp.archive_id == 5){
                        var category_archive = "Lain - Lain";
                    }else{
                        var category_archive = "-";
                    }

                    $("#category-detail<?php echo $satu;?>").html('Category : '+category_archive);
                    $("#company-detail<?php echo $satu;?>").html('Company : '+tmp.company_id);
                    $("#source-detail<?php echo $satu;?>").html('Source Name : '+tmp.source);
                    $("#number-id<?php echo $satu;?>").html('Number ID : '+idfilm);
                    $("#negara_produksi<?php echo $satu;?>").html('Production country : '+tmp.country);
                    $("#lokasi_produksi<?php echo $satu;?>").html('Production location : '+tmp.location);

                    if(tmp.disediakan == "0"){
                        document.getElementById( 'disediakan<?php echo $satu;?>' ).style.display = 'none';
                    }else{
                        document.getElementById( 'disediakan<?php echo $satu;?>' ).style.display = 'block';
                        document.getElementById('dsd_image<?php echo $satu;?>').src=tmp.dsd_image;
                        $("#dsd_company_name<?php echo $satu;?>").html(tmp.company_name);
                        $("#dsd_site<?php echo $satu;?>").html(tmp.site);
                    }

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

                        <?php if($lang == "en"){?>
                    $("#o_title<?php echo $dua;?>").html('Original Title : '+tmp.title_ori);
                    <?php }else{?>
                    $("#o_title<?php echo $dua;?>").html('Original Title : '+tmp.title_ori);
                    <?php }?>
                    $("#created_at<?php echo $dua;?>").html('Uploaded On : '+tmp.created_at);

                    if(tmp.archive_id == 1){
                        var category_archive = "Video Pribadi";
                    }else if(tmp.archive_id == 2){
                        var category_archive ="Budaya";
                    }else if(tmp.archive_id == 3){
                        var category_archive ="Pemerintahan";
                    }else if(tmp.archive_id == 4){
                        var category_archive = "Laporan";
                    }else if(tmp.archive_id == 5){
                        var category_archive = "Lain - Lain";
                    }else{
                        var category_archive = "-";
                    }

                    $("#category-detail<?php echo $dua;?>").html('Category : '+category_archive);
                    $("#company-detail<?php echo $dua;?>").html('Company : '+tmp.company_id);
                    $("#source-detail<?php echo $dua;?>").html('Source Name : '+tmp.source);
                    $("#number-id<?php echo $dua;?>").html('Number ID : '+idfilm);
                    $("#negara_produksi<?php echo $dua;?>").html('Production country : '+tmp.country);
                    $("#lokasi_produksi<?php echo $dua;?>").html('Production location : '+tmp.location);

                    if(tmp.disediakan == "0"){
                        document.getElementById( 'disediakan<?php echo $dua;?>' ).style.display = 'none';
                    }else{
                        document.getElementById( 'disediakan<?php echo $dua;?>' ).style.display = 'block';
                        document.getElementById('dsd_image<?php echo $dua;?>').src=tmp.dsd_image;
                        $("#dsd_company_name<?php echo $dua;?>").html(tmp.company_name);
                        $("#dsd_site<?php echo $dua;?>").html(tmp.site);
                    }

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

                        <?php if($lang == "en"){?>
                    $("#o_title<?php echo $tiga;?>").html('Original Title : '+tmp.title_ori);
                    <?php }else{?>
                    $("#o_title<?php echo $tiga;?>").html('Original Title : '+tmp.title_ori);
                    <?php }?>
                    $("#created_at<?php echo $tiga;?>").html('Uploaded On : '+tmp.created_at);

                    if(tmp.archive_id == 1){
                        var category_archive = "Video Pribadi";
                    }else if(tmp.archive_id == 2){
                        var category_archive ="Budaya";
                    }else if(tmp.archive_id == 3){
                        var category_archive ="Pemerintahan";
                    }else if(tmp.archive_id == 4){
                        var category_archive = "Laporan";
                    }else if(tmp.archive_id == 5){
                        var category_archive = "Lain - Lain";
                    }else{
                        var category_archive = "-";
                    }

                    $("#category-detail<?php echo $tiga;?>").html('Category : '+category_archive);
                    $("#company-detail<?php echo $tiga;?>").html('Company : '+tmp.company_id);
                    $("#source-detail<?php echo $tiga;?>").html('Source Name : '+tmp.source);
                    $("#number-id<?php echo $tiga;?>").html('Number ID : '+idfilm);
                    $("#negara_produksi<?php echo $tiga;?>").html('Production country : '+tmp.country);
                    $("#lokasi_produksi<?php echo $tiga;?>").html('Production location : '+tmp.location);

                    if(tmp.disediakan == "0"){
                        document.getElementById( 'disediakan<?php echo $tiga;?>' ).style.display = 'none';
                    }else{
                        document.getElementById( 'disediakan<?php echo $tiga;?>' ).style.display = 'block';
                        document.getElementById('dsd_image<?php echo $tiga;?>').src=tmp.dsd_image;
                        $("#dsd_company_name<?php echo $tiga;?>").html(tmp.company_name);
                        $("#dsd_site<?php echo $tiga;?>").html(tmp.site);
                    }

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
