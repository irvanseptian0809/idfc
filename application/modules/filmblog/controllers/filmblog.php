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
		$this->db->where('deleted_at', NULL);
		$this->db->order_by('article_date', 'DESC');
		$this->db->limit(5,0);
		$data['film_blog'] = $this->db->get();

		$this->db->select('*');
		$this->db->from('film_blog');
		$this->db->where('status', 'Active');
		$this->db->where('deleted_at', NULL);
		$this->db->order_by('article_date', 'DESC');
		$data['jum_film_blog'] = $this->db->get();
		$data['tags'] = $this->db->query("SELECT DISTINCT(TRIM(tag)) AS value,title FROM film_blog WHERE status='Active' AND deleted_at IS NULL order by article_date desc");
		$data['title'] = "Film Blog";
		getSkin($data);
	}

	function see_more(){
		if(isset($_POST["no"][0]) && !empty($_POST["no"][0])){
			$key_search = $_POST["no"][1];
			if($key_search != "none"){
				$jum_all = $this->db->query('SELECT count(*) as count FROM film_blog WHERE status="Active" AND deleted_at IS NULL AND (film_blog.title LIKE "%'.$key_search.'%" OR film_blog.short_desc LIKE "%'.$key_search.'%" OR film_blog.tag LIKE "%'.$key_search.'%"')->result()[0]->count;
			}else{
				$jum_all = $this->db->query('SELECT count(*) as count FROM film_blog WHERE status="Active" AND deleted_at IS NULL')->result()[0]->count;
			}
			$start = $_POST["no"][0];
			$limit = $_POST["no"][0] + 5;



			$this->db->select('*');
			$this->db->from('film_blog');
			$this->db->where('status', 'Active');
			$this->db->where('deleted_at', NULL);

			if($key_search != "none"){

				$this->db->or_like('film_blog.title',$key_search);
				$this->db->or_like('film_blog.short_desc',$key_search);
				$this->db->or_like('film_blog.tag',$key_search);
			}

			$this->db->order_by('article_date', 'DESC');
			$this->db->limit(5,$start);
			$film_blog = $this->db->get();

			foreach ($film_blog->result() as $row){
                                $type = '';
                                $icon = '';
                                if($row->type == 'Gallery'){
                                    $type = 'format-gallery';
                                    $icon = 'icon-multiple-image';
                                }else if($row->type == 'Text'){
                                    $type = 'format-image';
                                    $icon = 'fa fa-quote-left';
                                }else if($row->type == 'Link'){
                                    $type = 'format-video';
                                    $icon = 'fa fa-video-camera';
                                }

                                $this->db->where('film_blog_id', trim($row->id));
                                $query_comment = $this->db->get('film_blog_comments');
                                $comments = $query_comment->num_rows();
                        ?>

                        	<article class="post post-list <?php echo $type?>" style="margin-bottom:20px;">

	                                <div class="post-head">
	                                    <div class="post-head-left">
	                                        <div class="post-date"><?php echo date("d M Y", strtotime($row->article_date))?></div>
	                                        <div class="post-meta">
	                                            <a href="#"><i class="fa fa-comment"></i> <?php echo $comments?></a>
	                                            <?php if($row->tag != ''){ ?>
	                                            <a href="<?php echo site_url('filmblog/tag/'.$row->tag)?>" class="post-cat"><?php echo $row->tag?></a>
	                                            <?php } ?>
	                                        </div>
	                                        <span class="post-format-icon accent-bg"><i class="<?php echo $icon?>"></i></span>
	                                    </div>
	                                    <div class="post-head-right">
	                                        <h2 class="post-title">
	                                            <a href="<?php echo site_url('filmblog/detail/'.url_title(strtolower($row->title)).'/'.$row->id)?>">
	                                                <?php echo $row->title?>
	                                            </a>
	                                        </h2>
	                                    </div>
	                                </div>
	                                <div class="post-media">
	                                    <?php if($row->type == 'Gallery'){ ?>
	                                    <div class="flexslider galleryflex" data-autoplay="no" data-pagination="yes" data-arrows="yes" data-style="fade" data-pause="yes">
	                                        <ul class="slides">
	                                            <?php
	                                            $this->db->where('film_blog_id', trim($row->id));
                                            	$this->db->order_by('abs(urut)','asc');
	                                            $query_gallery = $this->db->get('film_blog_contents', 3);
	                                            foreach ($query_gallery->result() as $row_gallery){
	                                            ?>
	                                            <li>
	                                                <div class="col-md-12" style="height:470px;width:100%;background-color: #000;background-image:url('http://116.206.196.146/idfilm/public/<?php echo $row_gallery->image?>');background-repeat:no-repeat;background-position:top center;background-size:auto 100%;">&nbsp;</div>
	                                            </li>
	                                            <?php } ?>
	                                        </ul>
	                                    </div>
	                                    <?php }else if($row->type == 'Link'){ ?>
	                                    <div class="fw-video">
	                                        <?php
	                                        $this->db->where('film_blog_id', trim($row->id));

                                            $this->db->order_by('abs(urut)','asc');
                                            $this->db->where('link !=','');
	                                        $query_gallery = $this->db->get('film_blog_contents', 1);
	                                        foreach ($query_gallery->result() as $row_gallery){
	                                        ?>
	                                        <iframe width="560" height="315" src="<?php echo $row_gallery->link?>?rel=0" allowfullscreen></iframe>
	                                        <?php } ?>
	                                    </div>
	                                    <?php }else if($row->type == 'Text'){
	                                    if($row->cover != ''){ ?>
	                                    <a href="<?php echo site_url('filmblog/detail/'.url_title(strtolower($row->title)).'/'.$row->id)?>">
	                                        <img data-no-retina src="http://116.206.196.146/idfilm/public/<?php echo $row->cover?>" alt="">
	                                    </a>
	                                    <?php }
	                                    } ?>
	                                </div>
	                                <div class="post-entry" style="text-align:justify;">
	                                    <?php echo str_replace("a href","a style='color:#007eff;' href",$row->short_desc)?>
	                                </div>
	                                <div class="post-footer">
	                                    <ul class="social-icons pull-right">
	                                        <li>
	                                            <a href="http://www.facebook.com/sharer.php?u=<?php echo site_url('filmblog/detail/'.url_title(strtolower($row->title)).'/'.$row->id)?>" target="_blank">
	                                                <i class="fa fa-facebook"></i>
	                                            </a>
	                                        </li>
	                                        <li>
	                                            <a href="https://twitter.com/share?url=<?php echo site_url('filmblog/detail/'.url_title(strtolower($row->title)).'/'.$row->id)?>" target="_blank">
	                                                <i class="fa fa-twitter"></i>
	                                            </a>
	                                        </li>
	                                        <li>
	                                            <a href="https://plus.google.com/share?url=<?php echo site_url('filmblog/detail/'.url_title(strtolower($row->title)).'/'.$row->id)?>" target="_blank">
	                                                <i class="fa fa-google-plus"></i>
	                                            </a>
	                                        </li>
	                                        <li>
	                                            <a href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());" target="_blank">
	                                                <i class="fa fa-pinterest"></i>
	                                            </a>
	                                        </li>
	                                    </ul>
	                                    <a href="<?php echo site_url('filmblog/detail/'.url_title(strtolower($row->title)).'/'.$row->id)?>" class="btn btn-primary btn-more" style="padding-bottom:4px;padding-top:4px;border-radius:0px;font-size: 14px;">
	                                        Continue reading
	                                    </a>
	                                </div>
	                            </article>

	                            <script type="text/javascript">
	                            	$('.flexslider').flexslider({
				            	animation: "slide"
				        });
	                            </script>

                        <?php }

                        if($jum_all > $limit){ ?>
				<!--<div class="show_more_main" id="show_more_main<?php echo $limit; ?>">
					<div id="<?php echo $key_search?>" class="more_search"></div>
				        <span id="<?php echo $limit; ?>" class="show_more" title="Load more posts">Load More</span>
				        <span class="loding" style="display: none;"><span class="loding_txt">Loading…</span></span>
				</div>-->
                                <div class="show_more_main" id="show_more_main<?php echo $limit; ?>">
                                        <input id="<?php echo $key_search?>" type="hidden" class="more_search" value="<?php if(isset($hasil_pencarian) && $no == 1){
                                            echo $hasil_pencarian;
                                            }else{ echo 'none';}?>">
                                        <span id="<?php echo $limit; ?>" class="show_more" title="Load more posts">Load More</span>
                                        <span class="loding" style="display: none;"><span class="loding_txt">Loading…</span></span>
                                </div>
			<?php }
		}
	}

	function search(){
		$key = $_POST['key'];
		$data["content"] = "filmblog/filmblog";
		$data['title']  = "Search";

		$data['hasil_pencarian'] = $key;

        $jum_all = $this->db->query('SELECT * FROM film_blog WHERE status="Active" AND deleted_at IS NULL AND (film_blog.title LIKE "%'.$key.'%" OR film_blog.short_desc LIKE "%'.$key.'%" OR film_blog.tag LIKE "%'.$key.'%" ) order by article_date desc limit 5');

		#$this->db->select('film_blog.*,film_blog_categories.category');
		/*$this->db->select('*');
		$this->db->from('film_blog');
		#$this->db->join('film_blog_categories','film_blog_categories.film_blog_id=film_blog.id','left');
		$this->db->where('film_blog.status','Active');
		$this->db->where('film_blog.deleted_at', NULL);

		$this->db->like('film_blog.title',$key);
		$this->db->or_like('film_blog.short_desc',$key);
		$this->db->or_like('film_blog.tag',$key);
		#$this->db->or_like('film_blog_categoraies.category',$key);

		$this->db->order_by('article_date','DESC');
		$this->db->limit(5,0);
        #$data['film_blog'] = $this->db->get();*/
		$data['film_blog'] = $jum_all;

		#$this->db->select('film_blog.*,film_blog_categories.category');
		$this->db->select('film_blog.*');
		$this->db->from('film_blog');
		#$this->db->join('film_blog_categories','film_blog_categories.film_blog_id=film_blog.id','left');
		$this->db->where('film_blog.status','Active');
		$this->db->where('film_blog.deleted_at', NULL, FALSE);

		$this->db->or_like('film_blog.title',$key);
		$this->db->or_like('film_blog.short_desc',$key);
		$this->db->or_like('film_blog.tag',$key);
		#$this->db->or_like('film_blog_categoraies.category',$key);

		$this->db->order_by('article_date','DESC');
		$data['jum_film_blog'] = $this->db->get();

		$data['tags'] = $this->db->query("SELECT DISTINCT(TRIM(tag)) AS value FROM film_blog WHERE status='Active' AND deleted_at IS NULL order by article_date desc");

		getSkin($data);
	}

	function tag($value=""){
		$data["content"] = "filmblog/tag";
        $value = str_replace("%20", " ", $value);
		$data["tag"] = $value;
		$data['title'] = $value;

		/*$this->db->select('*');
		$this->db->from('film_blog');
		$this->db->where('status', 'Active');
		$this->db->where('deleted_at', NULL);
		$this->db->where('tag', $value);
		$this->db->order_by('article_date', 'DESC');
		$this->db->limit(5,0);
		#$data['film_blog'] = $this->db->get();*/
        $data['film_blog'] = $this->db->query("SELECT * FROM film_blog WHERE status = 'Active' AND tag = '".$value."' AND deleted_at IS NULL ORDER BY article_date DESC LIMIT 5");
        #$data['film_blog'] = $this->db->query("SELECT * FROM film_blog WHERE tag like '%".$value."'");
        #print_r($data['film_blog']->result());
        #exit();
		$data['tags'] = $this->db->query("SELECT DISTINCT(TRIM(tag)) AS value,title FROM film_blog WHERE status='Active' AND deleted_at IS NULL order by article_date desc");

		getSkin($data);
	}

	function detail($title='',$id=''){
		$data["idblog"] = $id;
		$data["content"] = "filmblog/detail";

		$this->db->select('*');
		$this->db->from('film_blog');
		$this->db->where('id', $id);
		$data['film_blog'] = $this->db->get();
		$x =$data['film_blog']->row();
		$data['title']  = $x->title;
		$data['short_desc']  = $x->title;
		
		$data['tags'] = $this->db->query("SELECT DISTINCT(TRIM(tag)) AS value,title FROM film_blog WHERE status='Active' AND deleted_at IS NULL order by article_date desc");

		getSkin($data);
	}

	function addcomment(){
		$film_blog_id = $_POST['blog_id'];
		$film_member_id = $_POST['film_member_id'];
		$comment = $_POST['comment'];
		$created_at = mysqldatetime();
		$showdate = date('M d, Y H:i:s', strtotime($created_at));

		$data_comment = array(
			'film_blog_id' => $film_blog_id,
			'film_member_id' => $film_member_id,
			'comment' => $comment,
			'created_at' => $created_at
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
																					<i class="fa fa-clock-o"></i> '.$showdate.'
																			</time>
																	</header>
																	<div class="comment-post">
																			<p style="text-align: justify;">'.$comment.'</p>
																	</div>
															</div>
													</div>
											</div>
									</article>';

			echo json_encode(array('success'=>'true','newdata'=>$newdata));
		}else{
			echo json_encode(array('success'=>'false','newdata'=>''));
		}
	}

	function deletecomment(){
		$this->db->where('id', $_POST['id']);
		$delete = $this->db->delete('film_blog_comments');
		if($delete){
			echo json_encode(array('success'=>'true'));
		}else{
			echo json_encode(array('success'=>'false'));
		}
	}

	function archive(){
		$items = array();
		$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

		// YEAR COUNT
		$this->db->distinct();
		$this->db->select("YEAR(article_date) AS value");
		$this->db->select("COUNT(id) AS total");
		$this->db->from("film_blog");
		$this->db->where('status', 'Active');
		$this->db->where('deleted_at', NULL, FALSE);
		$this->db->group_by('value');
		$this->db->order_by('article_date', 'DESC');
		$year = $this->db->get();
		$parent = 0;
		foreach($year->result() as $row){
			$tahun = $row->value;
			$items[$parent]['text'] = $tahun.' ('.$row->total.')';
			$items[$parent]['selectable'] = false;
			$items[$parent]['state']['expanded'] = false;
			$items[$parent]['nodes'] = array();

			// MONTH COUNT
			$this->db->distinct();
			$this->db->select("MONTH(article_date) AS value");
			$this->db->select("COUNT(id) AS total");
			$this->db->from("film_blog");
			$this->db->where('status', 'Active');
			$this->db->where('deleted_at', NULL, FALSE);
			$this->db->like('article_date', $tahun, 'after');
			$this->db->group_by('value');
			$this->db->order_by('article_date', 'DESC');
			$month = $this->db->get();
			$node = 0;
			foreach($month->result() as $row){
				$bulan = $row->value;
				$jml = strlen($bulan);
				if($jml == 1){
					$bln = '0'.$bulan;
				}else{
					$bln = $bulan;
				}
				$items[$parent]['nodes'][$node]['text'] = $BulanIndo[(int)$bulan-1].' ('.$row->total.')';
				$items[$parent]['nodes'][$node]['selectable'] = false;
				$items[$parent]['nodes'][$node]['state']['expanded'] = false;
				$items[$parent]['nodes'][$node]['nodes'] = array();

				// ARTICLE LIST
				$this->db->select("*");
				$this->db->from("film_blog");
				$this->db->where('status', 'Active');
				$this->db->where('deleted_at', NULL, FALSE);
				$this->db->like('article_date', $tahun.'-'.$bln, 'after');
				$this->db->order_by('article_date', 'DESC');
				$article = $this->db->get();
				$list = 0;
				foreach($article->result() as $row){
					$string = $row->title;
					//$link = base_url().'filmblog/detail/'.url_title(strtolower($row->title).'/'.$row->id;
					$link = base_url().'filmblog/detail/'.url_title(strtolower($row->title)).'/'.$row->id;
					$longtext = "";
					$arrexp = explode(' ', $string);
					$i=0;
					foreach ($arrexp as $word){
						if ($i < 2){
							$longtext .= $word.' ';
						}
						$i++;
					}
					#$items[$parent]['nodes'][$node]['nodes'][$list]['text'] = $longtext.'..';
					$items[$parent]['nodes'][$node]['nodes'][$list]['text'] = $string;
					$items[$parent]['nodes'][$node]['nodes'][$list]['selectable'] = true;
					//$items[$parent]['nodes'][$node]['nodes'][$list]['state']['selected'] = false;
					$items[$parent]['nodes'][$node]['nodes'][$list]['href'] = $link;

					//print_r($items);
					//exit();

					$list++;
				}

				$node++;
			}

			$parent++;
		}

		echo json_encode($items);
	}
}
