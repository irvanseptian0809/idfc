<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class filmblog extends CI_Controller{
	function filmblog(){
		parent::__construct();
	}

	function index(){
		$data["content"] = "filmblog/filmblog";

		$this->db->select('*');
		$this->db->from('film_blog');
		$this->db->where('status', 'Active');
		$this->db->order_by('created_at', 'DESC');
		$this->db->limit(5,0);
		$data['film_blog'] = $this->db->get();

		getSkin($data);
	}

	function detail($title='',$id=''){
		$data["idblog"] = $id;
		$data["content"] = "filmblog/detail";

		$this->db->select('*');
		$this->db->from('film_blog');
		$this->db->where('id', $id);
		$data['film_blog'] = $this->db->get();

		getSkin($data);
	}

	function addcomment(){
		$film_blog_id = $_POST['blog_id'];
		$film_member_id = $_POST['film_member_id'];
		$comment = $_POST['comment'];

		$data_comment = array(
			'film_blog_id' => $film_blog_id,
			'film_member_id' => $film_member_id,
			'comment' => $comment,
			'created_at' => mysqldatetime()
		);
	 
		$insert = $this->db->insert('film_blog_comments', $data_comment);
		 
		if($insert){
			$namemember = "";
			$picmember = "";
			$this->db->where('id', trim($film_member_id));
			$query_member = $this->db->get('film_member');
			foreach($query_member->result() as $memberdata){
					$arr = explode(' ',trim($memberdata->nama));
					if(count($arr)>0){
							$namemember = $arr[0];
					}else{
							$namemember = $memberdata->nama;
					}
					$picmember = 'http://116.206.196.146/idfilm/public/'.$memberdata->picture;
			}

			$newdata = '<article class="row" style="margin-bottom: 15px;border-bottom: 1px solid #eeeeee;padding-bottom: 15px;">
											<div class="col-md-1 col-sm-1 hidden-xs">
													<div class="thumbnail" style="padding-right: 10px;">
															<img class="img-responsive" src="'.$picmember.'" />
													</div>
											</div>
											<div class="col-md-11 col-sm-11">
													<div class="panel panel-default">
															<div class="panel-body">
																	<header class="text-left">
																			<time class="comment-date" style="font-size:13px;">
																					<i class="fa fa-user"></i> '.$namemember.'<br>
																					<i class="fa fa-clock-o"></i> '.date('M d, Y H:i:s', strtotime(mysqldatetime())).'
																			</time>
																	</header>
																	<div class="comment-post">
																			<p style="text-align: justify;">'.$comment.'</p>
																	</div>
															</div>
													</div>
											</div>
									</article>';

			echo json_encode(array("success"=>"true","newdata"=>$newdata));
		}else{
			echo json_encode(array("success"=>"false"));
		}
	}
}
