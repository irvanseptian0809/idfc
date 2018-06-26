<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class profil extends CI_Controller{
	function profil(){
		parent::__construct();
	}

	function index($type="",$id=""){
		$data["content"] = "profil/profil";

		$data["id"] = $id;
		$data["type"] = $type;

		if($data['type'] == "director"){
			$this->db->select('*');
			$this->db->from('profiles');
			$this->db->where('id', $id);
			$hasil = $this->db->get()->result();
			$data_profile = array();
			foreach ($hasil as $no => $hasil) {
				$no++;

				$award = $this->db->select("film_award.*,film_list.title as judul")->join('film_list','film_list.id = film_award.film_id')->from("film_award")->like("profiles_id",$id)->get()->result();

				$data_profile[$no-1]['data'] = $hasil;
				$data_profile[$no-1]['award'] = $award;
			}
			$data['userdata'] = $data_profile;

			$this->db->select('*');
			$this->db->from('film_list');
			$this->db->where('director_id', $id);
			$data['filmdata'] = $this->db->get();
			#print_r($data['userdata']);
			#exit();

		}elseif($data['type'] == "company"){
			$this->db->select('*');
			$this->db->from('film_'.$type);
			$this->db->where('id', $id);
			$hasil = $this->db->get()->result();
			$data_profile = array();
			foreach ($hasil as $no => $hasil) {
				$no++;

				//$award = $this->db->select("*")->from("tbl_imdb_award")->like("recipient",$hasil->nama)->get()->result();

				$data_profile[$no-1]['data'] = $hasil;
				$data_profile[$no-1]['award'] = "";
			}
			$data['userdata'] = $data_profile;

			$this->db->select('*');
			$this->db->from('film_list');
			$this->db->where('company_id', $id);
			$data['filmdata'] = $this->db->get();
			//$data['userdata'] = $this->db->get();
		}else{
			$this->db->select('*');
			$this->db->from('profiles');
			$this->db->where('id', $id);
			$hasil = $this->db->get()->result();
			$data_profile = array();
			foreach ($hasil as $no => $hasil) {
				$no++;

				$award = $this->db->select("*")->from("tbl_imdb_award")->like("recipient",$hasil->nama)->get()->result();

				$data_profile[$no-1]['data'] = $hasil;
				$data_profile[$no-1]['award'] = $award;
			}
			$data['userdata'] = $data_profile;

			$this->db->select('*');
			$this->db->from('film_list');
			$this->db->where('company_id', $id);
			$data['filmdata'] = "";
		}

		if($data['type'] != "company"){
	    		$data['filmografi'] = $this->db->select('fcp.title as position,fl.category_id,fl.id_full_film,fl.title,fl.tahun,fl.id,fc.profile_id')->from('film_castcrew fc')->join('film_list fl','fl.id = fc.film_id', 'left')->join('film_castcrew_position fcp','fc.film_castcrew_position_id = fcp.id','left')->where('fc.profile_id',$id)->where('fc.deleted_at',null)->order_by('fl.tahun','desc')->get()->result();

	    		$this->db->distinct();
			$this->db->select('film_list.*');
			$this->db->from('film_list');
			$this->db->join('film_castcrew','film_list.id = film_castcrew.film_id','right');
			$this->db->where('film_castcrew.profile_id', $id);
			$this->db->where('film_list.category_id', '2');
			#$this->db->where('film_list.category_id','2');
			$data['filmdata'] = $this->db->get();
		}else{
			$data['filmografi'] = $this->db->select('fl.title,fl.category_id,fl.id_full_film,fl.tahun,fl.id')->from('film_company_filmography fc')->join('film_list fl','fl.id = fc.film_id', 'left')->where('fc.company_id',$id)->where('fc.deleted_at',null)->order_by('fl.tahun','desc')->get()->result();

	    		$this->db->distinct();
			$this->db->select('film_list.*');
			$this->db->from('film_list');
			$this->db->join('film_company_filmography','film_list.id = film_company_filmography.film_id','right');
			$this->db->where('film_company_filmography.company_id', $id);
			$this->db->where('film_list.category_id', '2');
			$this->db->order_by('film_list.tahun','desc');
			#$this->db->where('film_list.category_id','2');
			$data['filmdata'] = $this->db->get();
		}

		getSkin($data);
	}
}
