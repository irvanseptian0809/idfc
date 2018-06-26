<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class checkout extends CI_Controller{

	function __construct()
	{
		parent::__construct();

		// Load helpers
		$this->load->helper('url');

		// Load session library
		$this->load->library('session');
	        $this->load->library('form_validation');

		$this->load->library('paypal_lib');
	}

	function checkout(){
		parent::__construct();
	}

	function code($length = 10) {
	    	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    	$charactersLength = strlen($characters);
	    	$randomString = '';
	    	for ($i = 0; $i < $length; $i++) {
	        	$randomString .= $characters[rand(0, $charactersLength - 1)];
	    	}
	    return $randomString;
	}

	function corder_approve(){
		$get_streaming = $this->db->select("*")->from("film_payment")->where("status","APPROVE")->where("check_mail",null)->get()->result();
		if(!empty($get_streaming)){
		foreach ($get_streaming as $get_streaming) {
			$check_dvd = $this->db->select("*")->from("film_order")->where("transaction_id",$get_streaming->transaction_id)->where("type","dvd")->or_where("type","vcd")->get()->result();
			if(!empty($check_dvd)){
				$subject = "Payment Verification";
				$email_from = "info@idfilmcenter.com";
				$email_message = '
				<div><p><em>See  below for English version</em></p>
				<p>Salam  dari IdFC,</p>
				<p>Terima  kasih.<br>
				Kami  telah menerima pembayaran Anda untuk transaksi dengan no. invoice '.$get_streaming->transaction_id.' sejumlah IDR '.$get_streaming->jumlah_pembayaran.', melalui '.$get_streaming->bank_pembayaran.' pada  tanggal '.$get_streaming->tanggal_pembayaran.'.</p>
				<p>Saat  ini, kami sedang memproses pengiriman pesanan Anda.</p>
				<p>Kami  akan menghubungi Anda bilamana ada keraguan bagian pengiriman, keterangan  alamat kurang lengkap atau hal lainnya. </p>
				<p>Bila Anda  mempunyai pertanyaan, silakan meninggalkan pesan Anda pada halaman <a href="'.base_url().'pages/index/kontak" target="_blank"> Kontak Kami </a> dan kami  akan mengirimkan jawaban secepatnya.</p>
				<p>Terimakasih  telah berbelanja di <a href="'.base_url().'watchfilms" target="_blank">FilmShop - IdFC</a>.</p><br>
				<p>Salam,</p>Admin IdFC
				<p>==============================<wbr>==============================<wbr>======================</p>
				<p>Greetings from IdFC,<br><br>
				Thank you. <br>
				We have  received your payment for the invoice '.$get_streaming->transaction_id.' in the amount of IDR '.$get_streaming->jumlah_pembayaran.', via '.$get_streaming->bank_pembayaran.' on '.$get_streaming->tanggal_pembayaran.'.</p>
				<p>We  are currently processing the delivery of your order.</p>
				<p>We  will contact you if there is a query on shipping details, incomplete shipping  address, etc.</p>
				<p>Should you have  any questions or problems, please leave a message via our <a href="'.base_url().'pages/index/kontak" target="_blank"> Contact Us </a> page and  we will respond to it as soon as possible.</p>
				<p>Thank you for  shopping at <a href="'.base_url().'watchfilms" target="_blank" ">FilmShop - IdFC</a>.</p><br>
				<p>Regards,</p>
				IdFC  Administrator</div>
				';
				$this->load->library('email');

				$config['protocol'] = 'mail';
				$config['mailtype'] = 'html';
				$config['charset'] = 'utf-8';
				$config['wordwrap'] = TRUE;

				$this->email->initialize($config);

				$this->email->from($email_from, 'IdFilmCenter');
				$this->email->to($get_streaming->email);
				$this->email->subject($subject);
				$this->email->message($email_message);
				$this->email->send();
			}

			$check_streaming = $this->db->select("*")->from("film_order")->where("transaction_id",$get_streaming->transaction_id)->where("type","streaming")->get()->result();

			if(!empty($check_streaming)){
				foreach ($check_streaming as $row) {
					$insert = array(
						"invoice" => $get_streaming->transaction_id,
						"code" => $this->code(),
						"id_film" => $row->film_id,
						"waktu" => "5400"
					);
				}
					$this->db->insert("film_streaming",$insert);

					$code_streaming = $this->db->select("*")->from("film_streaming")->where("invoice",$get_streaming->transaction_id)->get()->result();

					$subject = "Online Streaming";
					$email_from = "info@idfilmcenter.com";
					$email_message = '
					<div><p><em>See  below for English version</em></p>
					<p>Salam  dari <span class="il">IdFC</span>,</p>
					<p>Terimakasih.<br>Anda  memesan (beberapa) film dalam bentuk online streaming di FilmShop, sesuai  dengan invoice nomor '.$get_streaming->transaction_id.'.</p>
					<p>Anda  dapat menonton film yang Anda pesan melalui online streaming dengan mengakses  link yang diberikan dalam tabel di bawah ini.<br>
					  Silakan  buka halaman tersebut dan masukkan kode akses yang diberikan di sini.<br>
					  Halaman  tersebut akan berlaku untuk kode akses tersebut selama 48 jam setelah akses  pertama kalinya.</p>
					<table border="1" cellspacing="0" cellpadding="3" width="100%">
					  <tbody><tr bgcolor="#DDDDDD">
						<th width="43">No</th>
						<th width="155" align="left">Judul Film</th>
						<th align="left">Link Online Streaming</th>
						<th width="126">Kode Akses</th>
					  </tr>
					  ';

					  foreach ($code_streaming as $no => $value) {
						  $no++;
					  	$get_film = $this->db->select("title,tahun")->from("film_list")->where("id",$value->id_film)->get()->result();
						$email_message .= '
							<tr>
								<td align="center">'.$no.'</td>
								<td>'.$get_film[0]->title.' ( '.$get_film[0]->tahun.' )</td>
								<td><a href="'.base_url().'streaming" target="_blank" data-saferedirecturl="'.base_url().'streaming"><wbr>'.base_url().'streaming</a></td>
								<td align="center">'.$value->code.'</td>
							</tr>
						';
					  }

					$email_message .= '
					</tbody></table>
					<p>&nbsp;</p>
					<p>Bila Anda  mempunyai pertanyaan, silakan meninggalkan pesan Anda pada halaman <a href="'.base_url().'pages/index/kontak" target="_blank"> Kontak Kami </a> dan kami  akan mengirimkan jawaban secepatnya.</p>
					<p>Terimakasih  telah berbelanja di <a href="'.base_url().'watchfilms" target="_blank" ">FilmShop - IdFC</a>.</p>
					<p>Salam,<br>
					  Admin <span class="il">IdFC</span></p>
					<p>==============================<wbr>==============================<wbr>======================<br>
					  Greetings from <span class="il">IdFC</span>,<br>
					  <br>
					  Thank you.<br>
					  You ordered  film(s) in online streaming format on FilmShop, with the invoice number '.$get_streaming->transaction_id.'.</p>
					<p>You can watch  this/these film(s) via online streaming by accessing the link(s) listed in the  table below.<br>
					  Please open  the webpage and enter your access code, noted in the table below.<br>
					  This webpage  will be available with the designated access code for 48 hours after your first  access.</p>
					<table border="1" cellspacing="0" cellpadding="3" width="100%">
					  <tbody><tr bgcolor="#DDDDDD">
						<th width="43">No</th>
						<th width="155" align="left">Film Title</th>
						<th align="left">Online Streaming Link</th>
						<th width="126">Access Code</th>
					  </tr>
					  ';

					  foreach ($code_streaming as $no => $value) {
						  $no++;
					  	$get_film = $this->db->select("title,tahun")->from("film_list")->where("id",$value->id_film)->get()->result();
						$email_message .= '
							<tr>
								<td align="center">'.$no.'</td>
								<td>'.$get_film[0]->title.' ( '.$get_film[0]->tahun.' )</td>
								<td><a href="'.base_url().'streaming" target="_blank" data-saferedirecturl="'.base_url().'streaming"><wbr>'.base_url().'streaming</a></td>
								<td align="center">'.$value->code.'</td>
							</tr>
						';
					  }

					$email_message .='
					</tbody></table>
					<p>&nbsp;</p>
					<p>Should you  have any questions or problems, please leave a message via our <a href="'.base_url().'pages/index/kontak" target="_blank"> Contact Us </a> page and  we will respond to it as soon as possible.</p>
					<p>Thank you for  shopping at <a href="'.base_url().'watchfilms" target="_blank" ">FilmShop - IdFC</a>.</p>
					<p>Regards,</p>
					<span class="il">IdFC</span>  Administrator</div>
					';

					echo $get_streaming->email;

					$this->load->library('email');

					$config['protocol'] = 'mail';
					$config['mailtype'] = 'html';
					$config['charset'] = 'utf-8';
					$config['wordwrap'] = TRUE;

					$this->email->initialize($config);

					$this->email->from($email_from, 'IdFilmCenter');
					$this->email->to($get_streaming->email);
					$this->email->subject($subject);
					$this->email->message($email_message);
					$this->email->send();

			}
			$update = array(
				"check_mail" => 1
			);
			$this->db->where("transaction_id",$get_streaming->transaction_id)->update("film_payment",$update);
		}
		}
		echo $this->code();
	}

	function pemesanan_selesai(){
		$data["content"] = "checkout/pemesanan_selesai";
		getSkin($data);
	}

	function get_courier_name($id,$total_harga,$kurs){
		$get = $this->db->select("courier.*,film_shipping.courier as courier")->from("courier")->join("film_shipping","courier.id_courier=film_shipping.id")->where("courier.id",$id)->get()->result();

		if(!empty($get)){
			if($get[0]->kota == null || $get[0]->kota == ""){
				$kota = "0";
			}else{
				$kota = $get[0]->kota;
			}

			if($get[0]->negara == "indonesia" || $get[0]->negara == ""){
				$total_kurs = round(($total_harga + $get[0]->harga) / $kurs,2);
				$total = $total_harga + $get[0]->harga;
				$total_tampil = number_format($total_harga + $get[0]->harga);

				$total_show = ":&nbsp&nbsp&nbsp&nbsp&nbsp IDR ".$total_tampil." ( USD ".$total_kurs." )";
			}else{
				$total_kurs = round(($total_harga / $kurs) + $get[0]->harga,2);
				$total = $total_harga + $get[0]->harga;
				$total_tampil = round($total_kurs,2);

				$total_show = ":&nbsp&nbsp&nbsp&nbsp&nbsp USD ".$total_tampil."";
			}

			$data_nih = array(
				"id" => $get[0]->id,
				"id_courier" => $get[0]->id_courier,
				"kota" => $kota,
				"negara" => $get[0]->negara,
				"courier" => $get[0]->courier,
				"mata_uang" => $get[0]->mata_uang,
				"harga" => $get[0]->harga,
				"total"=> $total,
				"total_kurs"=> $total_kurs,
				"total_show" => $total_show,
				"success" => "true"
			);
		}else{
			$data_nih = array(
				"success" => "false"
			);
		}
		echo json_encode($data_nih);
	}

	function shipping($payment_id,$kota = null,$propinsi = null,$negara = null){
		if($kota != "0" || $propinsi != "0" || $negara != "0"){
			$kota = str_replace("%20"," ",$kota);
			$propinsi = str_replace("%20"," ",$propinsi);
			$negara = str_replace("%20"," ",$negara);
			$weight = 0;
			$get_order = $this->db->select("*")->from("film_order")->where("id",$payment_id)->get()->result();
			if(!empty($get_order)){
				$order_dvd = $this->db->select("*")->from("film_order")->where("transaction_id",$get_order[0]->transaction_id)->where("type","dvd")->get()->result();
				$order_vcd = $this->db->select("*")->from("film_order")->where("transaction_id",$get_order[0]->transaction_id)->where("type","vcd")->get()->result();

				if(!empty($order_dvd)){
					foreach($order_dvd as $row) {
						$berat = $row->count * 0.14;
						$weight = $weight + $berat;
					}
				}elseif(!empty($order_vcd)){
					foreach($order_vcd as $row) {
						$berat = $row->count * 0.14;
						$weight = $weight + $berat;
					}
				}
			}

			if($negara == "indonesia" || $negara == "Indonesia"){
				$get = $this->db->select("courier.*,film_shipping.courier")->from("courier")->join("film_shipping","courier.id_courier = film_shipping.id")->like("kota",$kota)->like("provinsi",$propinsi)->get()->result();

				if(!empty($get)){
					$isi = "";
					foreach ($get as $row) {
						$tujuan = "";

						if(!empty($row->provinsi)){
							$tujuan .=  $row->provinsi.", ";
						}

						if(!empty($row->kota)){
							$tujuan .= $row->kota;
						}
						$isi .="<tr>";
						$isi .="<td>".$row->courier."</td>";
						$isi .="<td>".$tujuan."</td>";
						$isi .="<td>0</td>";
						$isi .="<td>".$row->harga."</td>";
						$isi .="<td>".$row->estimasi."</td>";
						$isi .="<td><a class='pilihlahaku' onclick='pilihlah(".$row->id.")'>Pilih</a></td>";
					}
				}else{
					$isi = "Shipping tidak ditemukan";
				}
			}else{
				$get = $this->db->select("courier.*,film_shipping.courier")
				->from("courier")
				->join("film_shipping","courier.id_courier = film_shipping.id")
				->where("courier.weight >=",$weight)
				->where("courier.weight <=",$weight+0.5)
				->like("courier.negara",$negara)
				->get()->result();

				if(!empty($get)){
					$isi = "";
					foreach ($get as $row) {
						$isi .="<tr>";
						$isi .="<td>".$row->courier."</td>";
						$isi .="<td>".$row->negara."</td>";
						$isi .="<td>".$weight."</td>";
						$isi .="<td>".$row->harga."</td>";
						$isi .="<td>".$row->estimasi."</td>";
						$isi .="<td><a class='pilihlahaku' onclick='pilihlah(".$row->id.")'>Pilih</a></td>";
					}
				}else{
					$isi = "Shipping tidak ditemukan";
				}
			}
			echo json_encode(array("success"=>"true","isi"=>$isi,"weight"=>$weight,"payment_id"=>$payment_id,"kota"=>$kota));
		}
	}

	function index(){

		$data["content"] = "checkout/checkout";

		if(sessionValue("id")<>""){
			$this->db->select('film_order.*,film_list.title,film_list.harga_streaming,film_list.harga_dvd,film_list.harga_vcd');
			$this->db->from('film_order');
			#$this->db->join('film_shop','film_shop.film_id = film_order.film_id','LEFT');
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

		$get_transaction = $this->db->select("*")->from("film_payment")->where("id",$id)->get()->result();
		if(!empty($get_transaction)){

			$cek_dvd = $this->db->select("*")->from("film_order")->where("transaction_id",$get_transaction[0]->transaction_id)->where("type !=","streaming")->get()->result();
			if(!empty($cek_dvd)){
				$data['cek_form'] ="ada";
			}else{
				$data['cek_form'] ="tidak";
			}

			$data['invoice'] = $get_transaction[0]->transaction_id;

			$get_detail_film = $this->db->select("*,film_order.type as tipe")
			->from("film_order")
			->join("film_list","film_order.film_id = film_list.id")
			->where("film_order.transaction_id",$data['invoice'])
			->get()->result();
			$data['film'] = $get_detail_film;
		}

		$link = "http://apilayer.net/api/live?access_key=7058418ef5a41f26461296d51573529d&currencies=IDR&format=1";
		#$kurs = json_decode($link,true);
		$data_link = file_get_contents($link);
		$result = json_decode($data_link);
		$kurs = $result->quotes->USDIDR;

		$data['kurs'] = $kurs;

		getSkin($data);
	}

	function payment_detail($id){
		$this->db->select('fp.destination_name,fp.destination_address,fp.kota,fp.propinsi,fp.kodepos,fp.negara,fp.phone');
		$this->db->from('film_order fo');
		$this->db->join('film_payment fp','fp.transaction_id = fo.transaction_id','LEFT');
		$this->db->where('fp.id',$id);
		$query = $this->db->get();
		$data = $query->result();

		$data["content"] = "checkout/payment_detail";
		$data['data'] = $data;
		$data['id'] = $id;

		getSkin($data);
	}

	function submitpayment(){
		$data_payment = array(
			#'id_paymeny' => $_POST['payment_id'],
			'destination_name' => $_POST['nama'],
			'destination_address' => $_POST['alamat'],
		 	'email' => $_POST['email'],
		 	'kota' => $_POST['kota'],
		 	'propinsi' => $_POST['propinsi'],
		 	'kodepos' => $_POST['kodepos'],
		 	'negara' => $_POST['negara'],
		 	'phone' => $_POST['phone'],
			'status' => 'ORDER'
		);

		if($_POST['metode_pembayaran'] == "transfer"){
			$data_payment['type'] = "Transfer";
			$get_transaction = $this->db->select("*")->from("film_payment")->where("id",$_POST['payment_id'])->get()->result();
			if(!empty($get_transaction)){
				$data['invoice'] = $get_transaction[0]->transaction_id;

				$get_detail_film = $this->db->select("*,film_order.type as tipe")
				->from("film_order")
				->join("film_list","film_order.film_id = film_list.id")
				->where("film_order.transaction_id",$data['invoice'])
				->get()->result();
				$data['film'] = $get_detail_film;
			}
			$total_harga = 0;
			$get_courier = $this->db->select("courier.*,film_shipping.courier as courier")->from("courier")->join("film_shipping","courier.id_courier=film_shipping.id")->where("courier.id",$_POST['shipping_select'])->get()->result();
			if(!empty($get_courier)){
				if($get_courier[0]->negara == "indonesia" || $get_courier[0]->negara == ""){
					$kurir = $get_courier[0]->courier." ( ".$get_courier[0]->kota." )";
					$harga_kurir = $get_courier[0]->harga;
				}else{
					$kurir = $get_courier[0]->courier." ( ".$get_courier[0]->negara." )";
					$harga_kurir = $get_courier[0]->harga;
				}

				$total_harga = $harga_kurir;
			}

			# ==========================================================================================================================
			# ==================================================  EMAIL INVOICE ========================================================
			# ==========================================================================================================================

			$subject = "Invoice";
			$email_from = "info@idfilmcenter.com";

			$email_message = "<i>See below for English version</i><br><br>";
			$email_message .= "Salam dari IdFilmCenter.<br><br>";
			$email_message .= "<b>Berikut adalah invoice dari pembelanjaan Anda.</b><br>";
			$email_message .= "Invoice ini belum berlaku sebagai bukti pembayaran dan hanya akan menjadi sah apabila Anda telah melakukan pembayaran atas invoice ini<br><br>";
			$email_message .= '
			<table width="100%" border="0" cellpadding="0" cellspacing="3" style="color:#252525;margin-top:10px">
				<tbody><tr>
					<td width="150" align="left"><strong>No. invoice</strong></td>
		            	<td width="3" align="center"><strong>:</strong></td>
					<td align="left">'.$data['invoice'].'</td>
				</tr>
		        	<tr>
					<td width="150" align="left"><strong>Tanggal pemesanan</strong></td>
		            	<td width="3" align="center"><strong>:</strong></td>
					<td align="left">'.date('Y-m-d H:i:s').'</td>
				</tr>
		        	<tr>
					<td width="150" align="left"><strong>Nama pemesan</strong></td>
		            	<td width="3" align="center"><strong>:</strong></td>
					<td align="left">'.$_POST['nama'].'</td>
				</tr>
		        	<tr>
					<td width="150" align="left"><strong>No. telepon</strong></td>
		            	<td width="3" align="center"><strong>:</strong></td>
					<td align="left">'.$_POST['phone'].'</td>
				</tr>
		        	<tr>
					<td width="150" align="left"><strong>Alamat e-mail</strong></td>
		            	<td width="3" align="center"><strong>:</strong></td>
					<td align="left"><a href="mailto:'.$_POST['email'].'" target="_blank">'.$_POST['email'].'</a></td>
				</tr>

				<tr valign="top">
						<td width="150" align="left"><strong>Alamat pengiriman</strong></td>
						<td width="3" align="center"><strong>:</strong></td>
						<td align="left">'.$_POST['alamat'].', '.$_POST['kodepos'].', '.$_POST['kota'].', '.$_POST['kota'].'</td>
					</tr>
				</tbody>
			</table>
			';

			$email_message .= '
			<table width="100%" border="1" cellpadding="3" cellspacing="0" style="color:#252525;margin-top:10px">
	        		<tbody>
					<tr>
	            			<th width="40">No</th>
	                		<th>Detil Produk</th>
	                		<th width="60">Qty</th>
	                		<th width="130">Harga (IDR)</th>
	                		<th width="130">Subtotal (IDR)</th>
	            		</tr>
			';

			$order_item = '
			<table width="100%" border="1" cellpadding="3" cellspacing="0" style="color:#252525;margin-top:10px">
	        		<tbody>
					<tr>
	            			<th width="40">No</th>
	                		<th>Detil Produk</th>
	                		<th width="60">Qty</th>
	                		<th width="130">Harga (IDR)</th>
	                		<th width="130">Subtotal (IDR)</th>
	            		</tr>
			';
			foreach ($get_detail_film as $no => $row) {
				$no++;

				if($row->tipe == "streaming"){
					$type = "online streaming";
				}else{
					$type = $row->tipe;
				}

				$get_price = $this->db->select("price")
				->from("film_shop")
				->where("film_id",$row->film_id)
				->where("type",$type)
				->where("deleted_at",null)
				->where("qty >",0)->get()->result();

				$total_harga = $total_harga + ($get_price[0]->price*$row->count);

				$email_message .= '
				<tr>
					<td align="center">'.$no.'</td>
					<td align="left">'.$row->title.' ('.$row->type.')</td>
					<td align="center">'.$row->count.'</td>
					<td align="right">'.number_format($get_price[0]->price).'</td>
					<td align="right">'.number_format($get_price[0]->price*$row->count).'</td>
				</tr>
				';

				$order_item .= '
				<tr>
					<td align="center">'.$no.'</td>
					<td align="left">'.$row->title.' ('.$row->type.')</td>
					<td align="center">'.$row->count.'</td>
					<td align="right">'.number_format($get_price[0]->price).'</td>
					<td align="right">'.number_format($get_price[0]->price*$row->count).'</td>
				</tr>
				';

			}
			if(!empty($get_courier)){
				$email_message .= '
						<tr>
							<td colspan="4" align="left"><strong>Pengiriman dengan</strong> '.$kurir.' - </td>
							<td align="right">'.number_format($harga_kurir).'</td>
						</tr>
				';
			}

			$email_message .= '
					<tr>
						<td colspan="4" align="right"><strong>Total</strong></td>
						<td align="right"><strong>'.number_format($total_harga).'</strong></td>
					</tr>
	        		</tbody>
			</table>
			';
			if(!empty($get_courier)){
				$order_item .= '
						<tr>
							<td colspan="4" align="left"><strong>Pengiriman dengan</strong> '.$kurir.' - </td>
							<td align="right">'.number_format($harga_kurir).'</td>
						</tr>
				';
			}
			$order_item .= '
						<tr>
							<td colspan="4" align="right"><strong>Total</strong></td>
							<td align="right"><strong>'.number_format($total_harga).'</strong></td>
						</tr>
					</tbody>
				</table>
			';

			$email_message .='<br>
			Anda telah memilih untuk melakukan pembayaran lewat transfer bank.<br>
			Silakan melakukan pembayaran ke rekening berikut:<br>';

			$get_bank = $this->db->select("*")->from("master_bank")->where("deleted_at",null)->get()->result();
			foreach ($get_bank as $row) {

				$email_message .='
				<table width="100%" border="0" cellpadding="2" cellspacing="0" style="color:#252525;margin-top:5px">
					<tbody>
						<tr>
							<td width="150" align="left">Nama Bank</td>
							<td width="3" align="center">:</td>
							<td align="left">'.$row->bank.'</td>
						</tr>

						<tr>
							<td width="150" align="left">Kantor Cabang</td>
							<td width="3" align="center">:</td>
							<td align="left">'.$row->branch.'</td>
						</tr>
						<tr>
							<td width="150" align="left">Nama Rekening</td>
							<td width="3" align="center">:</td>
							<td align="left">'.$row->name.'</td>
						</tr>
						<tr>
							<td width="150" align="left">No. Rekening</td>
							<td width="3" align="center">:</td>
							<td align="left">'.$row->no.'</td>
						</tr>
					</tbody>
				</table>
				';

			}

			$email_message .= '<div style="color:red">Harap cantumkan nomor invoice Anda ketika melakukan transfer supaya kami bisa memproses pesanan Anda.</div>';
			$email_message .= 'Dengan melakukan transfer, berarti Anda telah membaca dan menyetujui seluruh <a href="'.base_url().'pages/index/ketentuan_layanan" target="_blank"> syarat dan kondisi </a> yang berlaku di FilmShop - IdFilmCenter.<br>';
			$email_message .= 'Silakan konfirmasikan pembayaran Anda setelah melakukan transfer agar kami dapat memproses pengiriman pesanan Anda.<br><br>';
			$email_message .= 'Anda dapat melakukan konfirmasi lewat link berikut:<br><br>';
			$email_message .= '<a href="'.base_url().'pages/konfirmasi/'.$data['invoice'].'">'.base_url().'pages/konfirmasi/'.$data['invoice'].'</a><br><br>';

			$email_message .=
			'
			Bila Anda mempunyai pertanyaan, silakan meninggalkan pesan Anda pada halaman <a href="'.base_url().'pages/index/kontak" target="_blank"> Kontak Kami </a> dan kami akan mengirimkan jawaban secepatnya.<br><br>
			Terimakasih telah berbelanja di <a href="'.base_url().'watchfilms" target="_blank"> FilmShop - IdFilmCenter </a>.<br><br><br>
			Salam,<br><br>
			Admin IdFilmCenter
			';

			$email_message .= '<br><br><br><br> ==================================================================================== <br><br><br><br>';

			$email_message .= "Greetings from IdFilmCenter,<br><br>";
			$email_message .= "<b>Here is the invoice from your order.</b><br>";
			$email_message .= "This invoice is not valid as a proof of purchase until you have finalized your payment of this invoice.<br><br>";
			$email_message .= '
			<table width="100%" border="0" cellpadding="0" cellspacing="3" style="color:#252525;margin-top:10px">
				<tbody><tr>
					<td width="150" align="left"><strong>Invoice number</strong></td>
		            	<td width="3" align="center"><strong>:</strong></td>
					<td align="left">'.$data['invoice'].'</td>
				</tr>
		        	<tr>
					<td width="150" align="left"><strong>Order date</strong></td>
		            	<td width="3" align="center"><strong>:</strong></td>
					<td align="left">'.date('Y-m-d H:i:s').'</td>
				</tr>
		        	<tr>
					<td width="150" align="left"><strong>Name</strong></td>
		            	<td width="3" align="center"><strong>:</strong></td>
					<td align="left">'.$_POST['nama'].' </td>
				</tr>
		        	<tr>
					<td width="150" align="left"><strong>Phone number</strong></td>
		            	<td width="3" align="center"><strong>:</strong></td>
					<td align="left">'.$_POST['phone'].'</td>
				</tr>
		        	<tr>
					<td width="150" align="left"><strong>E-mail address</strong></td>
		            	<td width="3" align="center"><strong>:</strong></td>
					<td align="left"><a href="mailto:'.$_POST['email'].'" target="_blank">'.$_POST['email'].'</a></td>
				</tr>

				<tr valign="top">
						<td width="150" align="left"><strong>Shipping Address</strong></td>
						<td width="3" align="center"><strong>:</strong></td>
						<td align="left">'.$_POST['alamat'].'</td>
					</tr>
				</tbody>
			</table>
			';

			$email_message .= '
			<table width="100%" border="1" cellpadding="3" cellspacing="0" style="color:#252525;margin-top:10px">
	        		<tbody>
					<tr>
	            			<th width="40">No</th>
	                		<th>Detil Product Details</th>
	                		<th width="60">Qty</th>
	                		<th width="130">Price (IDR)</th>
	                		<th width="130">Subtotal (IDR)</th>
	            		</tr>
			';
			foreach ($get_detail_film as $no => $row) {
				$no++;

				if($row->tipe == "streaming"){
					$type = "online streaming";
				}else{
					$type = $row->tipe;
				}

				$get_price = $this->db->select("price")
				->from("film_shop")
				->where("film_id",$row->film_id)
				->where("type",$type)
				->where("deleted_at",null)
				->where("qty >",0)->get()->result();

				$email_message .= '
				<tr>
					<td align="center">'.$no.'</td>
					<td align="left">'.$row->title.' ('.$row->type.')</td>
					<td align="center">'.$row->count.'</td>
					<td align="right">'.number_format($get_price[0]->price).'</td>
					<td align="right">'.number_format($get_price[0]->price*$row->count).'</td>
				</tr>
				';

			}
			if(!empty($get_courier)){
				$email_message .= '
						<tr>
							<td colspan="4" align="left"><strong>Shipping option</strong> '.$kurir.' - </td>
							<td align="right">'.number_format($harga_kurir).'</td>
						</tr>
				';
			}

			$email_message .= '
					<tr>
						<td colspan="4" align="right"><strong>Total</strong></td>
						<td align="right"><strong>'.number_format($total_harga).'</strong></td>
					</tr>
				</tbody>
			</table>
			';

			$email_message .='<br>
			You have chosen to make your payment via bank transfer.<br>
			Please transfer your payment to the following account:<br>';

			$get_bank = $this->db->select("*")->from("master_bank")->where("deleted_at",null)->get()->result();
			foreach ($get_bank as $row) {

				$email_message .='
				<table width="100%" border="0" cellpadding="2" cellspacing="0" style="color:#252525;margin-top:5px">
					<tbody>
						<tr>
							<td width="150" align="left">Bank Name</td>
							<td width="3" align="center">:</td>
							<td align="left">'.$row->bank.'</td>
						</tr>

						<tr>
							<td width="150" align="left">Branch Office</td>
							<td width="3" align="center">:</td>
							<td align="left">'.$row->branch.'</td>
						</tr>
						<tr>
							<td width="150" align="left">Account Name</td>
							<td width="3" align="center">:</td>
							<td align="left">'.$row->name.'</td>
						</tr>
						<tr>
							<td width="150" align="left">Account Number</td>
							<td width="3" align="center">:</td>
							<td align="left">'.$row->no.'</td>
						</tr>
					</tbody>
				</table>
				';

			}

			$email_message .= '<div style="color:red">Please make sure to include the invoice number with your transfer, otherwise we can not process your order.</div>';
			$email_message .= 'By transferring, you have read and agreed to the <a href="'.base_url().'pages/index/ketentuan_layanan_eng" target="_blank"> terms and conditions </a> of FilmShop - IdFilmCenter.<br>';
			$email_message .= 'You should confirm your payment after the transfer, so we can proceed with the delivery of your order.<br><br>';
			$email_message .= 'You can confirm your payment through this link:<br><br>';
			$email_message .= '<a href="'.base_url().'pages/konfirmasi/'.$data['invoice'].'">'.base_url().'pages/konfirmasi/'.$data['invoice'].'</a><br><br>';

			$email_message .=
			'
			Should you have any questions or problems, please leave a message via our <a href="'.base_url().'pages/index/kontak_eng" target="_blank"> Contact Us </a> page and we will respond to it as soon as possible.<br><br>
			Thank you for shopping at <a href="'.base_url().'watchfilms" target="_blank"> FilmShop - IdFilmCenter </a>.<br><br><br>
			Regards,<br><br>
			IdFilmCenter Administrator
			';

			$this->load->library('email');

			$config['protocol'] = 'mail';
			$config['mailtype'] = 'html';
			$config['charset'] = 'utf-8';
			$config['wordwrap'] = TRUE;

			$this->email->initialize($config);

			$this->email->from($email_from, 'IdFilmCenter');
			$this->email->to($_POST['email']);
			$this->email->cc('lestari.defi@idfilmcenter.com');
			$this->email->subject($subject);
			$this->email->message($email_message);
			$this->email->send();

			$redirect = base_url()."checkout/pemesanan_selesai";

			# ==========================================================================================================================
			# ================================================== SELESAI EMAIL INVOICE =================================================
			# ==========================================================================================================================

		}else{
			if($_POST['shipping_select'] != ""){
				$redirect = base_url()."checkout/payment_paypal/".$_POST['payment_id']."/".$_POST['shipping_select'];
			}else{
				$redirect = base_url()."checkout/payment_paypal/".$_POST['payment_id'];
			}
		}

		$data_payment['order_item'] = $order_item;

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
			echo json_encode(array("success"=>"true","redirect"=>$redirect));
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
				$insertid = $row_payment->id;
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
			echo json_encode(array("success"=>"false","apa"=>$insertid));
		}
	}

	function payment_methode($id){
		$this->form_validation->set_rules('metode', 'Metode Pembayaran', 'required');
		if($this->form_validation->run() == true){
			$metode = $this->input->post('metode');
			if ($metode == 1) {
				# Transfer
			}elseif($metode == 2){
				redirect('checkout/payment_paypal/'.$id);
			}
		}
	}

	function payment_paypal($id,$shipping = 0){
		$this->db->select('fp.destination_name,fp.destination_address,fp.kota,fp.propinsi,fp.kodepos,fp.negara,fp.phone,fo.film_id,fs.price,fl.title,fo.transaction_id');
		$this->db->from('film_order fo');
		$this->db->join('film_payment fp','fp.transaction_id = fo.transaction_id','LEFT');
		$this->db->join('film_shop fs','fs.film_id = fo.film_id','LEFT');
		$this->db->join('film_list fl','fl.id = fo.film_id','LEFT');
		$this->db->where('fp.id',$id);
		$this->db->limit(1);
		$query = $this->db->get();
		$data = $query->result();

		$total_harga = 0;
		$get_courier = $this->db->select("courier.*,film_shipping.courier as courier")->from("courier")->join("film_shipping","courier.id_courier=film_shipping.id")->where("courier.id",$shipping)->get()->result();
		if(!empty($get_courier)){
			if($get_courier[0]->negara == "indonesia" || $get_courier[0]->negara == ""){
				$kurir = $get_courier[0]->courier." ( ".$get_courier[0]->kota." )";
				$harga_kurir = $get_courier[0]->harga;
			}else{
				$kurir = $get_courier[0]->courier." ( ".$get_courier[0]->negara." )";
				$harga_kurir = $get_courier[0]->harga;
			}

			$total_harga = $harga_kurir;
		}

		$get_detail_film = $this->db->select("*,film_order.type as tipe")
		->from("film_order")
		->join("film_list","film_order.film_id = film_list.id")
		->where("film_order.transaction_id",$data[0]->transaction_id)
		->get()->result();

		//Set variables for paypal form
		$returnURL = base_url().'checkout/success/'.$id; //payment success url
		$cancelURL = base_url().'checkout/cancel'; //payment cancel url
		$notifyURL = base_url().'checkout/ipn'; //ipn url

		$link = "http://apilayer.net/api/live?access_key=7058418ef5a41f26461296d51573529d&currencies=IDR&format=1";
		#$kurs = json_decode($link,true);
		$data_link = file_get_contents($link);
		$result = json_decode($data_link);
		$kurs = $result->quotes->USDIDR;

		foreach ($get_detail_film as $no => $row) {
			$no++;

			if($row->tipe == "streaming"){
				$type = "online streaming";
			}else{
				$type = $row->tipe;
			}

			$get_price = $this->db->select("price")
			->from("film_shop")
			->where("film_id",$row->film_id)
			->where("type",$type)
			->where("deleted_at",null)
			->where("qty >",0)->get()->result();

			$total_harga = $total_harga + (($get_price[0]->price*$row->count) / $kurs);
		}

		#$grand_total_usd = round($data[0]->price/$kurs, 2);
		$grand_total_usd = round($total_harga, 2);

		$userID = 1; //current user id
		$logo = "http://116.206.197.44/img/idfc-logo-paypal.png";

		$this->paypal_lib->add_field('return', $returnURL);
		$this->paypal_lib->add_field('cancel_return', $cancelURL);
		$this->paypal_lib->add_field('notify_url', $notifyURL);
		$this->paypal_lib->add_field('item_name', "Pembelian film IdFilmCenter");
		$this->paypal_lib->add_field('custom', $userID);
		$this->paypal_lib->add_field('item_number',  $data[0]->transaction_id);
		$this->paypal_lib->add_field('amount',  $grand_total_usd);
		$this->paypal_lib->image($logo);

		$this->paypal_lib->paypal_auto_form();

	}

	function success($id)
	{

		$this->db->select('fp.destination_name,fp.destination_address,fp.kota,fp.propinsi,fp.kodepos,fp.negara,fp.phone,fo.film_id,fs.price,fl.title,fo.transaction_id');
		$this->db->from('film_order fo');
		$this->db->join('film_payment fp','fp.transaction_id = fo.transaction_id','LEFT');
		$this->db->join('film_shop fs','fs.film_id = fo.film_id','LEFT');
		$this->db->join('film_list fl','fl.id = fo.film_id','LEFT');
		$this->db->where('fp.id',$id);
		$this->db->limit(1);
		$query = $this->db->get();
		$alamat = $query->result();

		$data_order = array(
			'status' => 'ORDER',
			'paid_at' => mysqldatetime()
		);
		$this->db->where('transaction_id', $alamat[0]->transaction_id);
		$update = $this->db->update('film_payment', $data_order);

		$this->db->select('film_order.*,film_list.title,film_shop.price');
		$this->db->from('film_order');
		$this->db->join('film_payment','film_payment.transaction_id = film_order.transaction_id');
		$this->db->join('film_shop','film_shop.film_id = film_order.film_id','LEFT');
		$this->db->join('film_list', 'film_list.id = film_order.film_id');
		//$this->db->where('film_order.user_id', sessionValue("id"));
		$this->db->where('film_order.status', 'ORDER');
		$this->db->where('film_payment.id',$id);
		$query = $this->db->get();
		$pembelian = $query->result();

		$data['alamat'] = $alamat;
		$data['pembelian'] = $pembelian;
		$data['item_number'] = $hasil[0]->transaction_id;
		$data['txn_id'] = $paypalInfo["tx"];
		$data['payment_amt'] = $paypalInfo["amt"];
		$data['currency_code'] = $paypalInfo["cc"];
		$data['status'] = $paypalInfo["st"];

		$data["content"] = "checkout/payment_complete";
		getSkin($data);
	}

	function cancel()
	{
		$this->session->unset_userdata('PayPalResult');
		$this->session->unset_userdata('shopping_cart');

		$data["content"] = "checkout/paypal_error";

		getSkin($data);
	}

	function courier(){
		$get_kurir = $this->db->select("
		tbl_courier.id as id_kurir,
		tbl_courier.courier,
		tbl_courier_field.courierid,
		tbl_courier_field.field,
		tbl_courier_detail.fieldid,
		tbl_courier_detail.dep,
		tbl_courier_detail.value
		")
		->from("tbl_courier")
		->join('tbl_courier_field','tbl_courier.id = tbl_courier_field.courierid')
		->join('tbl_courier_detail','tbl_courier_detail.fieldid = tbl_courier_field.id')
		#->where('tbl_courier.id',23)
		->get()
		->result();



		echo "
		<style>
		table, th, td {
    			border: 1px solid black;
		}
		</style>";
		echo "

		<table style='width:100%'>
		  <tr>
		    <th>Kurir</th>
		    <th>Field</th>
				<th>Value</th>
				<th>Dep</th>
		  </tr>
		";
		foreach ($get_kurir as $row) {
			$cek_dep = $this->db->select("*")->from("courier")->where("dep",$row->dep)->get()->result();
			$insert = "";
			if(count($cek_dep) == 0){
				$insert['id_courier'] = $row->id_kurir;
				$insert['dep'] = $row->dep;

				if($row->fieldid == 85){
					$insert['harga'] = $row->value;
					if (strpos($row->field, 'IDR') !== false) {
					  $insert['mata_uang'] = "IDR";
					}else{
						$insert['mata_uang'] = 'USD';
					}
				}elseif ($row->fieldid == 90) {
					$insert['kota'] = $row->value;
				}elseif ($row->fieldid == 84) {
					$insert['kota'] = $row->value;
				}elseif ($row->fieldid == 83) {
					$insert['provinsi'] = $row->value;
				}elseif ($row->fieldid == 89){
					$insert['provinsi'] = $row->value;
				}elseif ($row->fieldid == 81){
					$insert['harga'] = $row->value;
					if (strpos($row->field, 'IDR') !== false) {
					  $insert['mata_uang'] = "IDR";
					}else{
						$insert['mata_uang'] = 'USD';
					}
				}elseif ($row->fieldid == 91){
					$insert['harga'] = $row->value;
					if (strpos($row->field, 'IDR') !== false) {
					  $insert['mata_uang'] = "IDR";
					}else{
						$insert['mata_uang'] = 'USD';
					}
				}elseif ($row->fieldid == 79){
					$insert['weight'] = $row->value;
				}elseif ($row->fieldid == 78){
					$insert['negara'] = $row->value;
				}elseif ($row->fieldid == 82){
					$insert['estimasi'] = $row->value;
				}elseif ($row->fieldid == 92){
					$insert['estimasi'] = $row->value;
				}elseif ($row->fieldid == 93){
					$insert['kabupaten'] = $row->value;
				}elseif ($row->fieldid == 94){
					$insert['negara'] = $row->value;
				}elseif ($row->fieldid == 95){
					$insert['weight'] = $row->value;
				}elseif ($row->fieldid == 96){
					$insert['harga'] = $row->value;
					if (strpos($row->field, 'IDR') !== false) {
					  $insert['mata_uang'] = "IDR";
					}else{
						$insert['mata_uang'] = 'USD';
					}
				}elseif ($row->fieldid == 97){
					$insert['estimasi'] = $row->value;
				}elseif ($row->fieldid == 98){
					$insert['negara'] = $row->value;
				}elseif ($row->fieldid == 99){
					$insert['first_price'] = $row->value;
				}elseif ($row->fieldid == 100){
					$insert['next_price'] = $row->value;
				}elseif ($row->fieldid == 101){
					$insert['kota'] = $row->value;
				}elseif ($row->fieldid == 102){
					$insert['provinsi'] = $row->value;
				}elseif ($row->fieldid == 103){
					$insert['harga'] = $row->value;
					if (strpos($row->field, 'IDR') !== false) {
					  $insert['mata_uang'] = "IDR";
					}else{
						$insert['mata_uang'] = 'USD';
					}
				}elseif ($row->fieldid == 104){
					$insert['estimasi'] = $row->value;
				}elseif ($row->fieldid == 105){
					$insert['kabupaten'] = $row->value;
				}

				$this->db->insert('courier',$insert);

			}else{

				if($row->fieldid == 85){
					$insert['harga'] = $row->value;
					if (strpos($row->field, 'IDR') !== false) {
					  $insert['mata_uang'] = "IDR";
					}else{
						$insert['mata_uang'] = 'USD';
					}
				}elseif ($row->fieldid == 90) {
					$insert['kota'] = $row->value;
				}elseif ($row->fieldid == 84) {
					$insert['kota'] = $row->value;
				}elseif ($row->fieldid == 83) {
					$insert['provinsi'] = $row->value;
				}elseif ($row->fieldid == 89){
					$insert['provinsi'] = $row->value;
				}elseif ($row->fieldid == 81){
					$insert['harga'] = $row->value;
					if (strpos($row->field, 'IDR') !== false) {
					  $insert['mata_uang'] = "IDR";
					}else{
						$insert['mata_uang'] = 'USD';
					}
				}elseif ($row->fieldid == 91){
					$insert['harga'] = $row->value;
					if (strpos($row->field, 'IDR') !== false) {
					  $insert['mata_uang'] = "IDR";
					}else{
						$insert['mata_uang'] = 'USD';
					}
				}elseif ($row->fieldid == 79){
					$insert['weight'] = $row->value;
				}elseif ($row->fieldid == 78){
					$insert['negara'] = $row->value;
				}elseif ($row->fieldid == 82){
					$insert['estimasi'] = $row->value;
				}elseif ($row->fieldid == 92){
					$insert['estimasi'] = $row->value;
				}elseif ($row->fieldid == 93){
					$insert['kabupaten'] = $row->value;
				}elseif ($row->fieldid == 94){
					$insert['negara'] = $row->value;
				}elseif ($row->fieldid == 95){
					$insert['weight'] = $row->value;
				}elseif ($row->fieldid == 96){
					$insert['harga'] = $row->value;
					if (strpos($row->field, 'IDR') !== false) {
					  $insert['mata_uang'] = "IDR";
					}else{
						$insert['mata_uang'] = 'USD';
					}
				}elseif ($row->fieldid == 97){
					$insert['estimasi'] = $row->value;
				}elseif ($row->fieldid == 98){
					$insert['negara'] = $row->value;
				}elseif ($row->fieldid == 99){
					$insert['first_price'] = $row->value;
				}elseif ($row->fieldid == 100){
					$insert['next_price'] = $row->value;
				}elseif ($row->fieldid == 101){
					$insert['kota'] = $row->value;
				}elseif ($row->fieldid == 102){
					$insert['provinsi'] = $row->value;
				}elseif ($row->fieldid == 103){
					$insert['harga'] = $row->value;
					if (strpos($row->field, 'IDR') !== false) {
					  $insert['mata_uang'] = "IDR";
					}else{
						$insert['mata_uang'] = 'USD';
					}
				}elseif ($row->fieldid == 104){
					$insert['estimasi'] = $row->value;
				}elseif ($row->fieldid == 105){
					$insert['kabupaten'] = $row->value;
				}

				$this->db->where("dep",$row->dep)->update("courier",$insert);

			}

			echo "
			<tr>
			    <td>".$row->courier."</td>
			    <td>".$row->field."</td>
					<td>".$row->value."</td>
					<td>".$row->dep."</td>
			</tr>
			";
		}


		echo "</table>";

	}

}
