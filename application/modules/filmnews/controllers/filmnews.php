<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class filmnews extends CI_Controller{
	function filmnews(){
		parent::__construct();
	}

	function index(){
		$data["content"] = "filmnews/filmnews";

		/*$this->db->select('*');
		$this->db->from('film_news');
		$this->db->where('status', 'Active');
		$this->db->order_by('news_date', 'DESC');
		$this->db->limit(10,0);
		$data['film_news'] = $this->db->get();*/

		$jum_all = $this->db->query('SELECT count(*) as count FROM film_news')->result()[0]->count; 
	        
		$data['film_news'] = $this->db->query('SELECT * FROM film_news WHERE deleted_at IS NULL ORDER BY created_at DESC LIMIT 0, 5');

		$this->db->select('*');
		$this->db->from('film_event');
		$this->db->where('status', 'Active');
              	$this->db->where('deleted_at is null', null,false);
		$this->db->order_by('created_at', 'DESC');
		$this->db->limit(10,0);
		$data['film_event'] = $this->db->get();
		$data['title'] = "Film News";

		getSkin($data);
	}

	function see_more(){
		if(isset($_POST["no"]) && !empty($_POST["no"])){
			$jum_all = $this->db->query('SELECT count(*) as count FROM film_news WHERE deleted_at IS NULL')->result()[0]->count;

			$start = $_POST["no"] + 0;
			$limit = $_POST["no"] + 5;

			$film_news = $this->db->query('SELECT * FROM film_news WHERE deleted_at IS NULL ORDER BY created_at DESC LIMIT '.$start.',5');

			foreach ($film_news->result() as $row) {?>
			<div class="box-news">
                		<div class="col-md-4" style="padding:5px;">
	                  		<?php 
	                    		if (strpos($row->cover, 'uploads/') !== false) {
	                    		?>
	                    		<img src="<?php echo "http://116.206.196.146/idfilm/public/".$row->cover?>" alt="" width="100%">
	                    		<?php }else{?>
	                    		<img src="<?php echo base_url()."images/filmnews/".$row->cover?>" alt="" width="100%">
	                  		<?php }?>
                		</div>
                		<div class="col-md-8">
                  			<div class="desc-news" style="color:black;line-height:20px !important;font-weight:250;">
                    			<?php //echo $exps[2]?>
                  			</div>
                  			<b><?php 
                  			if(!empty($row->selengkapnya)){

                    			$url_info = parse_url($row->selengkapnya);
                    			echo "<a href='https://".$url_info['host']."' target='_blank'  style='text-decoration:underline;color:#007eff;'>".$url_info['host']."</a>";
                  			}else{
                    			$url_info['host'] = "";
                  			}
                  			?>    
                  			</b>
                  			<div class="title-news"><?php echo str_replace("a href","a style='color:#007eff;' href",$row->title_film_news)?></div>
                  			<div class="date-news" style="color:black; <?php  
				                    if (strpos($row->title_film_news, '<p>') !== false) {
				                        echo 'margin-top: -22px;';
				                    } ?>"><?php
			                   	//echo date('d F Y', strtotime($row->news_date))
			                    	$tanggal = date('Y-m-d', strtotime($row->news_date));
			                    	$bulan = array (1 =>   'Januari',
		                                'Februari',
		                                'Maret',
		                                'April',
		                                'Mei',
		                                'Juni',
		                                'Juli',
		                                'Agustus',
		                                'September',
		                                'Oktober',
		                                'November',
		                                'Desember'
                            			);
                    				$split = explode('-', $tanggal);
                    				echo $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];

                  			?>
                  			</div>
                  			<div class="desc-news" style="color:black;line-height:20px !important;font-weight:200;font-family: arial !important;">
                  				<?php echo str_replace("a href","a style='color:#007eff;' href",$row->description)?>
                      
                  			</div>
                  			<div class="more-news" style="text-decoration:underline;color:#007eff !important;"><a 
                    				<?php if(!empty($row->selengkapnya)){?>
                        		href="<?php echo $row->selengkapnya;?>"
                    			<?php }?>
                   			target="_blank" style="color:#007eff !important;">Lihat Artikel Lengkap di <?php echo $url_info['host'];?></a></div>
                			</div>
                			<div class="clearfix"></div>
              			</div>
              			
			<?php }?>



			<?php if($jum_all > $_POST["no"]){ ?>
				<div class="box-news">
		                <div>
		                    <div class="img-banner">
		                        <?php $banner = $this->db->select('*')->from('banner')->where('categori','filmnews')->get()->result(); ?>
		                        <img src="http://116.206.196.146/idfilm/public/<?php echo $banner[0]->image?>" class="img-responsive">
		                    </div>
		                </div>
		                </div>
		                
				<div class="show_more_main" id="show_more_main<?php echo $limit; ?>">
				        <span id="<?php echo $limit; ?>" class="show_more" title="Load more posts">Load More</span>
				        <span class="loding" style="display: none;"><span class="loding_txt">Loading…</span></span>
				</div>
			<?php }

		}
	}
}
?>