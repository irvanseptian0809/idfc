<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class checkout extends CI_Controller{
	function checkout(){
		parent::__construct();
	}

	function index(){
		$data["content"] = "checkout/checkout";

		if(sessionValue("id")<>""){
			$this->db->select('film_order.*,film_list.title,film_list.harga_streaming,film_list.harga_dvd,film_list.harga_vcd');
			$this->db->from('film_order');
			$this->db->join('film_list', 'film_list.id = film_order.film_id');
			$this->db->where('film_order.user_id', sessionValue("id"));
			$this->db->where('film_order.status', 'DRAFT');
			$data['order'] = $this->db->get();

			getSkin($data);
		}else{
			redirect(base_url());
		}
	}

	function payment($id){
		$data["content"] = "checkout/payment";
		$data['payment_id'] = $id;

		getSkin($data);
	}

	function submitpayment(){
		$data_payment = array(
			'destination_name' => $_POST['nama'],
		 	'destination_address' => $_POST['alamat'],
		 	'kota' => $_POST['kota'],
		 	'propinsi' => $_POST['propinsi'],
		 	'kodepos' => $_POST['kodepos'],
		 	'negara' => $_POST['negara'],
		 	'phone' => $_POST['phone'],
			'status' => 'PAID'
		);
		$this->db->where('id', $_POST['payment_id']);
		$this->db->update('film_payment', $data_payment);

		$this->db->where('id', $_POST['payment_id']);
		$query = $this->db->get('film_payment');
		foreach ($query->result() as $row_payment){
			$trxid = $row_payment->transaction_id;
		}

		$data_order = array(
			'status' => 'PAID',
			'paid_at' => mysqldatetime()
		);
		$this->db->where('transaction_id', $trxid);
		$update = $this->db->update('film_order', $data_order);

		if($update){
			echo json_encode(array("success"=>"true"));
		}else{
			echo json_encode(array("success"=>"false"));
		}
	}

	function changecount(){
		$id = $_POST['id'];
		$param = $_POST['param'];

		$this->db->where('id', $id);
		$query = $this->db->get('film_order');
		foreach ($query->result() as $row_order){
			$count_first = $row_order->count;
		}

		if ($param=="minus") {
			$count_last = $count_first - 1;
		}else{
			$count_last = $count_first + 1;
		}

		if($count_last > 0){
			$data = array(
			 'count' => $count_last
			);
			$this->db->where('id', $id);
			$change = $this->db->update('film_order', $data);
		}else{
			$data = array(
			 'status' => 'DELETED'
			);
			$this->db->where('id', $id);
			$change = $this->db->update('film_order', $data);
		}

		if($change){
			echo json_encode(array("success"=>"true"));
		}else{
			echo json_encode(array("success"=>"false"));
		}
	}

	function deletecart(){
		$id = $_POST['id'];

		$data = array(
		 'status' => 'DELETED'
		);
		$this->db->where('id', $id);
		$change = $this->db->update('film_order', $data);

		if($change){
			echo json_encode(array("success"=>"true"));
		}else{
			echo json_encode(array("success"=>"false"));
		}
	}

	function setpayment(){
		$trxid = $_POST['trxid'];

		$this->db->where('transaction_id', $trxid);
		$this->db->where('status', 'DRAFT');
		$query = $this->db->get('film_payment');
		if($query->num_rows() > 0){
			foreach ($query->result() as $row_payment){
				$insert_id = $row_payment->id;
			}
		}else{
			$data = array(
				'transaction_id' => $trxid,
			 	'status' => 'DRAFT',
				'created_at' => mysqldatetime()
			);
			$this->db->insert('film_payment', $data);
			$insertid = $this->db->insert_id();
		}

		if($insertid <> ''){
			echo json_encode(array("success"=>"true","id"=>$insertid));
		}else{
			echo json_encode(array("success"=>"false"));
		}
	}
}
