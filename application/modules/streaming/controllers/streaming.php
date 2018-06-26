<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class streaming extends CI_Controller{
     function index(){

		$data["content"] = "streaming/streaming";

		getSkin($data);
	}

     function video($id){
          $data["content"] = "streaming/video";
          $get = $this->db->select("id_film,waktu,invoice")->from("film_streaming")->where("code",$id)->get()->result();
          if(!empty($get)){
               $data['film'] = $this->db->select("*")->from("film_list")->where("id",$get[0]->id_film)->get()->result();
               $data['invoice'] = $get[0]->invoice;
               $data['waktu'] = $get[0]->waktu;
               $get_film = $this->db->select("video")->from("film_shop_movie")->where("film_id",$get[0]->id_film)->get()->result();
               $data['video'] = $get_film[0]->video;
          }
		getSkin($data);
     }

     function code(){
          if($this->input->post('kode') != ""){
               $kode = $this->input->post('kode');
               redirect('/streaming/video/'.$kode);
          }
     }

     function update_waktu($invoice,$waktu){
          $data = array("waktu"=>$waktu);
          $this->db->where("invoice",$invoice)->update("film_streaming",$data);
          echo json_encode(array("success"=>"true"));
     }
}
?>
