<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class detail extends CI_Controller{
	function detail(){
		parent::__construct();
	}

	function index($url="",$id=""){
		$data["content"] = "detail/detail";

		$this->db->select('*');
		$this->db->from('film_list');
		$this->db->where('id', $id);
		$data['filmdata'] = $this->db->get();

		$data["film_id"] = $id;
		$data["user_id"] = "";
		$row_film = $data['filmdata']->row();
		$data['title'] =  $row_film->title;
		$data['keyword'] =   $row_film->title.','.$row_film->tags;
		$data['deskripsi'] = substr( $row_film->briefsynopsis_ind, 0,150);

		$data['full_video'] = "";
		$data['full_subtitle'] = "";

		if (sessionValue("id")<>"") {
			$this->db->select('*');
			$this->db->from('film_order');
			$this->db->where('film_id', $id);
			$this->db->where('user_id', sessionValue("id"));
			$this->db->where('type', 'streaming');
			$this->db->where('status', 'PAID');
			$order = $this->db->get();
			if($order->num_rows() > 0){
				$data["status"] = "ordered";
				$this->db->select('*');
				$this->db->from('film_shop_movie');
				$this->db->where('film_id', $id);
				$full = $this->db->get();
				foreach ($full->result() as $rowfull){
					$data['full_video'] = $rowfull->video;

					$data['full_subtitle'] = " (".$rowfull->subtitle.")";
				}
			}else{
				$data["status"] = "";
			}
			$data["user_id"] = sessionValue("id");
		}else{
			$data["status"] = "";
		}

		$this->db->select('*');
		$this->db->from('film_list_stillincinema');
		$this->db->where('film_list_id', $id);
		$this->db->where('new','yes');
		$new = $this->db->get();
		$data['new'] = $new->num_rows();

		getSkin($data);
	}

	function totalcart(){
		$this->db->select('*');
		$this->db->from('film_order');
		$this->db->where('user_id', sessionValue('id'));
		$this->db->where('status', 'DRAFT');
		$ordertotal = $this->db->get();

		echo json_encode(array("success"=>"true","total"=>$ordertotal->num_rows()));
	}

	function watchfilm(){
		$id = $_POST['filmid'];
		$width = $_POST['width']-25;

		$this->db->select('*');
		$this->db->from('film_list');
		$this->db->where('id', $id);
		$filmquery = $this->db->get();
		foreach ($filmquery->result() as $film){
			$thumb_trailer1 = str_replace("mp4","jpg",$film->trailer_path);
			$thumb_trailer2 = str_replace("filmdata","http://www.indonesianfilmcenter.com",$thumb_trailer1);
			$thumb_trailer3 = str_replace("video","video/thumb",$thumb_trailer2);
			$thumb_trailer_final = str_replace("vidIdFC","smallthumb_vidIdFC",$thumb_trailer3);

			echo '<span class="title-desc-film">Full Film</span><br>
			<div class="col-md-12">
					<video width="'.$width.'" controls>
						<source src="'.base_url().$film->trailer_path.'" type="video/mp4">
						Your browser does not support HTML5 video.
					</video>
			</div>';
		}
	}

	function addtocart(){
		$filmid = $_POST['filmid'];
		$userid = $_POST['userid'];
		$type = $_POST['type'];

		$this->db->select('*');
		$this->db->from('film_order');
		$this->db->where('film_id', $filmid);
		$this->db->where('user_id', $userid);
		$this->db->where('type', $type);
		$this->db->where('status', 'DRAFT');
		$order = $this->db->get();
		if($order->num_rows() > 0){
			foreach ($order->result() as $row){
				$data_order = array(
				 'count' => $row->count + 1
				);
				$this->db->where('id', $row->id);
				$update = $this->db->update('film_order', $data_order);

				if($update){
					$this->db->select('*');
					$this->db->from('film_order');
					$this->db->where('user_id', $userid);
					$this->db->where('status', 'DRAFT');
					$ordertotal = $this->db->get();

					echo json_encode(array("success"=>"true","total"=>$ordertotal->num_rows()));
				}else{
					echo json_encode(array("success"=>"false"));
				}
			}
		}else{
			$kode = "0000";
			$prefix = "TRX";

			$this->db->select('*');
			$this->db->from('film_order');
			$this->db->where('user_id', $userid);
			$this->db->where('status', 'DRAFT');
			$order = $this->db->get();
			if($order->num_rows() > 0){
				foreach ($order->result() as $row){
					$transactionid = $row->transaction_id;
				}
			}else{
				$this->db->where('title', 'transaction_id');
				$this->db->where('date', date('Y-m-d'));
				$query = $this->db->get('film_parameter');
				if($query->num_rows() > 0){
					foreach ($query->result() as $row_parameter){
						$count_id = $row_parameter->value + 1;

						$data = array(
					   'value' => $count_id
						);
						$this->db->where('id', $row_parameter->id);
						$this->db->update('film_parameter', $data);
					}

					$count_last = strlen($kode)-strlen($count_id);
					$kode_last = substr($kode, 0, $count_last).$count_id;
					$transactionid = $prefix.date('Ymd').$kode_last;
				}else{
					$count_id = 1;

					$data = array(
				   'title' => 'transaction_id',
				   'date' => date('Y-m-d'),
				   'value' => $count_id
					);

					$this->db->insert('film_parameter', $data);
				}

				$count_last = strlen($kode)-strlen($count_id);
				$kode_last = substr($kode, 0, $count_last).$count_id;
				$transactionid = $prefix.date('Ymd').$kode_last;
			}

			$data = array(
			 'date' => date('Y-m-d'),
 			 'transaction_id' => $transactionid,
			 'user_id' => $userid,
			 'film_id' => $filmid,
			 'type' => $type,
			 'count' => '1',
			 'refund_type' => 'NO',
			 'status' => 'DRAFT',
			 'created_at' => mysqldatetime()
			);
			$insert = $this->db->insert('film_order', $data);

			if($insert){
				$this->db->select('*');
				$this->db->from('film_order');
				$this->db->where('user_id', $userid);
				$this->db->where('status', 'DRAFT');
				$ordertotal = $this->db->get();

				echo json_encode(array("success"=>"true","total"=>$ordertotal->num_rows()));
			}else{
				echo json_encode(array("success"=>"false"));
			}
		}
	}

	function checkorder(){
		$this->db->select('*');
		$this->db->from('film_order');
		$this->db->where('type', 'streaming');
		$this->db->where('status', 'PAID');
		$order = $this->db->get();
		foreach ($order->result() as $row){
			$now = new DateTime();
			$future_date = new DateTime($row->paid_at);
			$interval = $future_date->diff($now);
			$day = $interval->format("%a");
			$hour = $interval->format("%h");
			$mins = $interval->format("%i");
			//echo $hour.' >= 48 and '.$mins.' > 0';
			if($day == 0){
				if ($hour >= 48 and $mins > 0) {
					$data = array('status' => 'EXPIRED');
					$this->db->where('id', $row->id);
					$this->db->update('film_order', $data);
				}
			}else if($day > 0){
				$data = array('status' => 'EXPIRED');
				$this->db->where('id', $row->id);
				$this->db->update('film_order', $data);
			}
		}

		echo json_encode(array("success"=>"true"));
	}
}
