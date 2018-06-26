<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pages extends CI_Controller{
	function Login(){
		parent::__construct();
	}

	function index($page){
          $data['kostum'] = "no";
          $data['konten'] = $this->db->select("*")->from("settings")->where("param",$page)->get()->result();
          $data['param'] = $data['konten'][0]->param;
          $data['value'] = $data['konten'][0]->value;
          $data["content"] = "pages/pages";
		getSkin($data);
     }

     function konfirmasi($invoice){
          $this->db->where("transaction_id",$invoice)->update("film_payment",array("konfirmasi"=>"Sudah Melakukan Konfirmasi"));
          $data['kostum'] = "yes";
          $data['konten'] = "<h5>Anda sudah melakukan konfirmasi pembayaran, kami akan melakukan pengecekan dan memproses pesanan anda.</h5>";
          $data['param'] = "lucknut";
          $data['value'] = "Konfirmasi Pembayaran";
          $data["content"] = "pages/pages";
		getSkin($data);
     }

     function send_kontak(){
          $data['kategori'] = $this->input->post('kategori');
          $data['section'] = $this->input->post('section');
          $data['subject'] = $this->input->post('subject');
          $data['message'] = $this->input->post('message');
          $data['email'] = $this->input->post('email');
          $this->db->insert("kontak",$data);


          $data['kostum'] = "yes";
          $data['konten'] = "<h5>Pesan berhasil dikirim, admin kami akan mengevaluasi pesan anda. Terima Kasih.</h5>";
          $data['param'] = "lucknut";
          $data['value'] = "Pesan Berhasil Terkirim";
          $data["content"] = "pages/pages";
		getSkin($data);
     }

	function embed($id){
		$data = $this->db->select("full_path_hd")->from('film_list')->where('id',$id)->get()->result();
		$embed['path'] = $data[0]->full_path_hd;
		$this->load->view('embed',$embed);
	}

}
