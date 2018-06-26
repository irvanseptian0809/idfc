<?php
//kerjaan bayu
	$this->load->library('user_agent');
	$browser = $this->agent->browser();
//batas kerjaan bayu
?>
<style type="text/css">
@media(max-width:1025px){
	.row{
		margin-right: 0px;
		margin-left: 0px;
	}
}
@media (min-width:1025px){
	.row{
		margin-right: -15px;
		margin-left: -15px;
	}
}
.scroll-assist{
	background-color:#9c1e1f;
}
</style>
<body class="scroll-assist" data-reveal-selectors="section:not(.masonry):not(:first-of-type):not(.parallax)" data-reveal-timing="1000">

<?php
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

?>

    <a id="top"></a>
    <!-- <div class="loader"></div> -->
    <nav class="transition--fade" id="nav2">
        <div class="nav-bar nav--absolute nav--transparent" data-fixed-at="200">
            <div class="nav-module logo-module left">
                <a href="<?php echo site_url()?>">
                    <img class="logo logo-dark" alt="logo" src="<?php echo base_url()?>img/idfc-logo-dark.png" />
                    <img class="logo logo-light" alt="logo" src="<?php echo base_url()?>img/idfc-logo.png" />
                </a>
            </div>
            <div class="nav-module menu-module left">
                <ul class="menu" id="menu-field">
                    <li>
                        <a href="watchfilms">
                            WatchFilms
                        </a>
                    </li>
                    <li>
                        <a href="filminfo">
                            FilmInfo
                        </a>
                    </li>
                    <li>
                        <a href="filmarchive">
                            FilmArchive
                        </a>
                    </li>
                    <li>
                        <a href="filmnews">
                            FilmNews
                        </a>
                    </li>
                    <li>
                        <a href="filmblog">
                            FilmBlog
                        </a>
                    </li>
                </ul>
            </div>
            <div class="nav-module menu-module right">
                <ul class="menu">
                    <li>
                        <input type="search" placeholder="<?php echo $this->session->userdata('search');?>" style="background-color: white!important;color:black;">
                    </li>
                    <style type="text/css">
                            type[search]::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
                            color: black;
                            opacity: 1; /* Firefox */
                        }
                    </style>
                    <li>
                        <a href="<?php echo base_url()."home/language/en"?>">
                            EN
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url()."home/language/id"?>">
                            ID
                        </a>
                    </li>
                    <li>
                        <a href="checkout">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                    </li>
                    <?php if(sessionValue("id")<>""){ ?>
                    <li>
                        <a href="<?php echo site_url('transaksi')?>">
                          <img src="<?php echo sessionValue('picture')?>" height="25" style="border-radius:50%;">
                          <?php echo sessionValue('nama')?>
                        </a>
                    </li>
                    <li>
                      <a href="<?php echo site_url('logout')?>" style="margin-right: 12px;"><?php echo $this->session->userdata('Logout');?></a>
                    </li>
                    <?php }else{ ?>
                    <li>
                        <a href="#" style="margin-right: 12px;" id="login-form"><?php echo $this->session->userdata('Login');?> / <?php echo $this->session->userdata('Register');?></a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <!--end nav bar-->
        <div class="nav-mobile-toggle visible-sm visible-xs">
            <i class="icon-Align-Right icon icon--sm"></i>
        </div>
        <div class="search-area">
            <div class="title">Login</div>
            <div class="div-form">
              <form action="<?php echo base_url()."login/member"?>" method="post">
                <input class="input-form" type="text" name="email" id="email-login" placeholder="Email Pengguna" required="">
                <input class="input-form" type="password" name="password" id="password-login" placeholder="Kata Sandi" required="">
                <div class="col-md-12"><a href="#" class="link-form">Lupa kata sandi?</a></div>
                <a href="javascript:void(0);" onclick="fbLogin()" id="fbLink"> <div class="fb-connect">Atau langsung dengan:  <img src="<?php echo base_url()?>images/fb-connect.png" style="height:60px;cursor:pointer;"></div></a>
                <div class="col-md-6" style="padding-top:35px;">
                  <a href="<?php echo site_url('register')?>" class="register">Belum daftar?</a>
                </div>
                <div class="col-md-6" style="padding-top:35px;text-align:right;padding-right:15px;">
                  <button type="submit" id="bayar" class="butt butt-primary sharp" style="font-size:12px !important;height:30px;width:100px;">Login</button>
                </div>
              </form>
            </div>
        </div>
    </nav>
    <!--end of modal-container-->
    <div class="main-container transition--fade">
        <section class="cover cover-11 height-100 imagebg parallax" data-overlay="4">
            <div class="background-image-holder2" style="margin-top: 0px !important;"><!--Tambahan Bayu -webkit-transition:none;-->
                <div class="blackbox" style="position: absolute; width: 100%; height: 100%; /*background-color: #000; opacity: 0.5;">
                </div>
                <div class="background-image-holder" style="transition: background 1s ease-in-out;"><!--Tambahan bayu programmer lama : transition: background 1s ease-in-out; programmer baru(bayu) : -webkit-transition:none;-->

                    <?php
                    $this->db->select("*");
                    $this->db->from("sliders");
                    $this->db->where("deleted_at",NULL);
                    $this->db->order_by("created_at","DESC");
                    $sliders = $this->db->get()->result();

                    foreach ($sliders as $value) {
                    $useragent=$_SERVER['HTTP_USER_AGENT'];
                    if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))){


                    ?>

                    <img class="img-src" alt="image" src="http://116.206.196.146/idfilm/public/<?php echo $value->picture_mobile?>" />
                    <?php }else{?>
                    <img class="img-src" alt="image" src="http://116.206.196.146/idfilm/public/<?php echo $value->picture?>" />
                    <?php }?>

                    <?php
                    }
                    ?>
                </div>
            </div>

            <div class="" style="display: none;">
                <ul>
                    <?php foreach($sliders as $value){?>
                    <li class="main-text"><?php echo $value->title?></li>
                    <?php }?>
                </ul>
                <ul>
                    <?php foreach($sliders as $value){?>
                    <li class="second-text"><?php echo $value->description?></li>
                    <?php }?>
                </ul>
                <ul>
                    <?php foreach($sliders as $value){?>
                    <li class="footer-text"><?php echo $value->footer?></li>
                    <?php }?>
                </ul>
            </div>
            <div class="container pos-vertical-center" id="mid-text">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 text-center">
                        <div class="text-center " style="color:white;">
                            <a href="watchfilms"><span class="btn btn--sm text-white">WatchFilms</span></a>
                            <a href="filminfo"><span class="btn btn--sm text-white">FilmInfo</span></a>
                            <a href="filmarchive"><span class="btn btn--sm text-white">FilmArchive</span></a>
                            <a href="filmnews"><span class="btn btn--sm text-white">FilmNews</span></a>
                            <a href="filmblog"><span class="btn btn--sm text-white">FilmBlog</span></a>
                        </div>
                        <br>
                        <h1 class="wow pulse" id="main-head">
                          <em>Indonesian</em> Film Center.
                        </h1>
                        <p class="lead wow fadeInUp" id="second-head">
                          A movie portal that is specifically dedicated to Indonesia Movie.
                        </p>
                        <!--end of modal instance-->
                    </div>
                </div>
                <!--end row-->
            </div>
            <?php
            $this->db->select("value");
            $this->db->from("settings");
            $this->db->where("param","slider_overview");
            $slider_overview = $this->db->get()->result();
            ?>
            <div class="col-sm-12 pos-absolute pos-bottom" style="padding-bottom: 30px;">
                <div class="row">
                    <div class="col-sm-12 text-center">
                         <div class="modal-instance modal-video-1">
                            <a href="#" class="video-play-icon video-play-icon--sm wow fadeInDown" data-toggle="modal" data-target="#popup_video" style="visibility: visible; animation-name: fadeInDown;"></a>
                            <span class="h6 wow fadeInDown" data-toggle="modal" data-target="#popup_video" style="visibility: visible; animation-name: fadeInDown;"><?php echo $slider_overview[0]->value?></span>
                            <!--end of modal-container-->
                        </div>
                        <ul class="social-list">
                            <?php
                            $this->db->select("param,value");
                            $this->db->from("settings");
                            $this->db->like("param","sosmed_");
                            $sosmed = $this->db->get()->result();
                            #print_r($sosmed);

                            foreach ($sosmed as $value) {
                                if($value->param == "sosmed_facebook"){
                            ?>
                                <li class="wow flipInY" data-wow-delay="1s">
                                    <a href="<?php echo $value->value?>" target="_blank">
                                        <i class="socicon-facebook"></i>
                                    </a>
                                </li>
                            <?php
                                }elseif($value->param == "sosmed_twitter"){
                            ?>
                                <li class="wow flipInY" data-wow-delay="1.2s">
                                    <a href="<?php echo $value->value?>" target="_blank">
                                        <i class="socicon-twitter"></i>
                                    </a>
                                </li>
                            <?php
                                }elseif($value->param == "sosmed_youtube"){
                            ?>
                                <li class="wow flipInY" data-wow-delay="1.4s">
                                    <a href="<?php echo $value->value?>" target="_blank">
                                        <i class="socicon-youtube"></i>
                                    </a>
                                </li>
                            <?php
                                }elseif($value->param == "sosmed_instagram"){
                            ?>
                                <li class="wow flipInY" data-wow-delay="1.6s">
                                    <a href="<?php echo $value->value?>" target="_blank">
                                        <i class="socicon-instagram"></i>
                                    </a>
                                </li>
                            <?php
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <center>
            <div class="col-sm-12 col-xs-12 pos-absolute pos-bottom" style="margin-top: 20px;">
                <div class="dot-wrap"></div>
            </div>
            </center>
            <div class="col-sm-12 pos-bottom pos-absolute">
                <div class="pull-right" id="footer-head" style="color: rgba(255,255,255,0.5);padding-right:10px;">
                    asd
                </div>
            </div>
            <!--end container-->
        </section>
        <section class="project-single-process" id="watchfilms">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 gapless">
                        <div class="col-md-2">
                            <?php if($lang == "en"){?>
                            <a href="watchfilms" class="main-sec"><h3 class=" wow fadeInLeft text-left"><b>WATCH</b> FILMS</h3></a>
                            <?php }elseif($lang == "id"){?>
                            <a href="watchfilms" class="main-sec"><h3 class=" wow fadeInLeft text-left"><b>TONTON</b> FILM</h3></a>
                            <?php }?>
                            <p class="wow fadeIn"></p>
                        </div>
                        <div class="col-md-10">
                        <h4  style="margin-top: 5px;"><?php echo $this->session->userdata('watch home');?></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <?php if($lang == "en"){?>
                            <h4 style="color: #000;"><b>LATEST FEATURE</b><br> FILMS</h4>
                            <?php }elseif($lang == "id"){?>
                            <h4 style="color: #000;"><b>FILM LAYAR</b><br> LEBAR TERBARU</h4>
                            <?php }?>
                        </div>
                        <div class="col-md-10" >
                            <div class="row owl-carousel owl-theme" id="carousel1">
                              <?php
                              foreach ($latest_feature->result() as $row){
                                $director = "";

                                $sqldirector = "SELECT * FROM film_director WHERE id='".$row->director_id."'";
                                $rowsdirector = $this->db->query($sqldirector);
                                foreach ($rowsdirector->result() as $rowdirector){
                                  $director = $rowdirector->title;
                                }

                                $get_price = $this->db->query('SELECT film_list.*,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="online streaming" AND status="Active" AND deleted_at IS NULL ORDER BY created_at DESC LIMIT 1),0) streaming_price,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="dvd" AND status="Active" AND deleted_at IS NULL ORDER BY created_at DESC LIMIT 1),0) dvd_price,IFNULL((SELECT price FROM film_shop WHERE film_id=film_list.id AND type="vcd" AND status="Active" AND deleted_at IS NULL ORDER BY created_at DESC LIMIT 1),0) vcd_price,(SELECT video FROM film_shop_movie WHERE film_id=film_list.id) fullmovie FROM film_list WHERE film_list.category_id=2 AND (SELECT video FROM film_shop_movie WHERE film_id=film_list.id) IS NOT NULL AND film_list.id='.$row->id.'');
                                foreach($get_price->result() as $roow){

                                if($roow->streaming_price == '0'){


                                                $harga = "FREE";
                                                $link_open = '<a href="'.base_url().'detail/index/'.url_title(strtolower($roow->title)).'/'.$roow->id.'">';
                                                $link_close = '</a>';
                                                $popover = "";
                                                $link = base_url().'detail/index/'.url_title(strtolower($roow->title)).'/'.$roow->id;

                                    }else{
                                      $harga = number_format($roow->streaming_price,0,',','.');
                                      $link_open = '';
                                      $link_close = '';
                                      $popover = "rel='popover'";
                                      $link = base_url().'detail/index/'.url_title(strtolower($roow->title)).'/'.$roow->id;
                                    }
                                }
                                ?>
                                <div class="item">
                                    <?php
                                    $link = base_url().'detail/index/'.url_title(strtolower($row->title)).'/'.$row->id;
                                    ?>
                                    <a style="cursor: pointer;" onclick="openmovie('<?php echo $row->id?>','<?php echo $row->category_id?>','<?php echo $link?>')">
                                        <div class="hover-element hover-element-1 wow flipInX" data-wow-delay="0.4s" data-wow-duration="0.6s" data-title-position="top,left">
                                            <div class="hover-element__initial">
                                                <div style="width:100%;height:235px;background:url('http://116.206.196.146/<?php echo $row->cover?>');background-size:auto 100%;background-position:center top;background-repeat:no-repeat;background-color:black;">

                                                    <?php if($harga <> 'FREE'){ ?>
                                              <div class="pull-right" style="background:url('<?php echo base_url()?>images/label-harga.png');background-size:100px;width:100%;height:100%;background-position:top right;background-repeat:no-repeat;font-weight:200;font-size:0.9em;">
                                                <span class="pull-right" style="-webkit-transform: rotate(47deg);-moz-transform: rotate(47deg);color:white;margin-top:25px;text-align:center;font-size:18px;"><!--kerjaan bayu-->
                                                  <?php echo $harga?>
                                                </span>
                                              </div>
                                              <?php } ?>
                                                    &nbsp;
                                                </div>
                                            </div>
                                            <div class="hover-element__reveal" data-overlay="9">
                                                <div class="boxed">
                                                    <h5><?php echo $row->title?></h5>
                                                    <span>
                                                      <?php if ($row->durasi<>"" AND $row->durasi > 0) { ?>
                                                      <em><?php echo $row->durasi." Menit"?></em><br>
                                                      <?php } ?>
                                                      <?php if ($director <> "") { ?>
                                                      <?php echo $director?><br>
                                                      <?php } ?>
                                                      <?php if ($row->tahun<>"" AND $row->tahun > 0) { ?>
                                                      <em><?php echo $row->tahun?></em>
                                                      <?php } ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end hover element-->
                                    </a>
                                </div>
                              <?php } ?>
                            </div>
                            <!-- <div class="col-md-12 gapless" style="padding-right: 7px; margin-top: -30px;">
                                <div class="link-right pull-right">
                                    <a href="<?php //echo site_url('watchfilms')?>">See All</a>
                                </div>
                            </div> -->
                            <div class="costumNav">
                                <span class="cnav-item prev prev-text" data-carouselid="carousel1"><span class="fa fa-chevron-left"></span></span><!--kerjaan bayu-->
                                <span class="cnav-item next" data-carouselid="carousel1"><span class="fa fa-chevron-right"></span></span>
                            </div>
                        </div>
                        <div class="col-sm-12" style="margin-top: 20px;"></div>
                        <div class="col-md-2">
                            <?php if($lang == "en"){?>
                            <h4 style="color: #000;"><b>LATEST </b><br> VIDEOS</h4>
                            <?php }elseif($lang == "id"){?>
                            <h4 style="color: #000;"><b>VIDEO</b><br> TERBARU</h4>
                            <?php }?>
                        </div>
                        <div class="col-md-10">
                            <div class="row owl-theme owl-carousel " id="carousel2">
                              <?php
                              foreach ($latest_video->result() as $row){
                                $director = "";

                                $sqldirector = "SELECT * FROM film_director WHERE id='".$row->director_id."'";
                                $rowsdirector = $this->db->query($sqldirector);
                                foreach ($rowsdirector->result() as $rowdirector){
                                    $director = $rowdirector->title;
                                }

                                $this->db->where('id', trim($row->company_id));
                              	$query_company = $this->db->get('film_company');
                              	if($query_company->num_rows() > 0){
                              		foreach ($query_company->result() as $row_company){
                              			$company_name = $row_company->title;
                              		}
                              	}else{
                              		$company_name = "";
                              	}
                              ?>
                              <div class="item">
                                    <?php
                                    if($row->category_id == 10){
                                        $link = base_url().'detail/index/'.url_title(strtolower($row->title)).'/'.$row->id_full_film;
                                    }else{
                                        $link = base_url().'detail/index/'.url_title(strtolower($row->title)).'/'.$row->id;
                                    }

                                    $cover = "http://116.206.196.146/".$row->cover."";
                                    $cover = str_replace("filmdata/thumb","filmdata/images/thumb",$cover);
                                    ?>
                                    <a style="cursor: pointer;" onclick="openmovie('<?php echo $row->id?>','<?php echo $row->category_id?>','<?php echo $link?>')">
                                  <div class="hover-element hover-element-1 wow flipInX" data-wow-delay="0.4s" data-wow-duration="0.6s" data-title-position="top,left">
                                      <div class="hover-element__initial">
                                        <div style="width:100%;height:165px;background:url('<?php echo $cover?>');background-size:auto 100%;background-position:center top;background-repeat:no-repeat;background-color:black;">

                                            &nbsp;
                                        </div>
                                      </div>
                                      <div class="hover-element__reveal" data-overlay="9">
                                          <div class="boxed" style="padding-top:18%;">
                                            <h5><?php echo $row->durasi." Menit"?></h5>
                                            <h5 style="font-style:italic;"><?php echo $row->director_id?></h5>
                                            <h5><?php echo $row->tahun?></h5>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="bottom-capt" style="line-height: 20px; margin-top: 5px;">
                                      <span style="font-size: 15px;"><b><?php echo $row->title?></b></span><br>
                                      <span><?php echo $company_name?></span>
                                  </div>
                                </a>
                              </div>
                              <?php } ?>
                            </div>
                            <div class="costumNav" style="top:30% !important;">
                              <span class="cnav-item prev prev-text" data-carouselid="carousel2"><span class="fa fa-chevron-left"></span></span><!--kerjaan bayu-->
                              <span class="cnav-item next" data-carouselid="carousel2"><span class="fa fa-chevron-right"></span></span>
                            </div>
                            <div class="col-md-12 gapless" style="padding-right: 30px;"></div>
                        </div>
                    </div>
                <!--end of row-->
            </div>
            </div>
        </section>
        <section class="project-single-process" id="filminfo">
            <div class="container">
                <div class="row">
                    <div class="row gapless">
                        <div class="col-md-2">
                            <div>
                                <a href="<?php echo base_url()."filminfo"?>" class="main-sec"><h3 class=" wow fadeInLeft">FILM<b>INFO</b></h3></a>
                                <p class="wow fadeIn"></p>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <h4 class="" style="margin-top: 5px;"><?php echo $this->session->userdata('filminfo home');?></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <?php if($lang == "en"){?>
                            <h4 style="color: #000;"><b>PLAYING</b> IN CINEMAS THIS WEEK</h4>
                            <?php }elseif($lang == "id"){?>
                            <h4 style="color: #000;"><b>TAYANG</b> DI BIOSKOP MINGGU INI</h4>
                            <?php }?>
                        </div>
                        <div class="col-md-10">
                            <div class="row owl-theme owl-carousel" id="carousel3">
                              <?php foreach ($still_in_cinema->result() as $row){
                                $director = "";

                                $sqldirector = "SELECT * FROM film_director WHERE id='".$row->director_id."'";
                                $rowsdirector = $this->db->query($sqldirector);
                                foreach ($rowsdirector->result() as $rowdirector){
                                  $director = $rowdirector->title;
                                } ?>
                                <div class="item">
                                    <?php
                                    $link = base_url().'detail/index/'.url_title(strtolower($row->title)).'/'.$row->id;
                                    ?>
                                    <a href="<?php echo $link?>">
										<!--kerjaan bayu-->
											<style type="text/css">
												<!--@media (min-width:280px){
													.height-tayang-dibioskop{
														background-size: 100% 100%;
													}
												}-->
											</style>
										<!--batas kerjaan bayu-->
                                        <div class="hover-element hover-element-1 wow flipInX" data-wow-delay="0.4s" data-wow-duration="0.6s" data-title-position="top,left">
                                            <div class="img-film hover-element__initial height-tayang-dibioskop" rel='popover' style="background:url('<?php echo 'http://116.206.196.146/'.$row->cover?>');background-size:100% auto;width:100%;height:235px;background-position: center center;background-repeat: no-repeat;background-size: 100% 100%;"><!--kerjaan bayu background-size: cover-->
                                                    <?php if($row->new == 'yes'){ ?>
                                                    <div class="pull-right" style="background:url('<?php echo base_url()?>images/label-harga.png');background-size:100px;width:100%;height:100%;background-position:top right;background-repeat:no-repeat;font-weight:200;font-size:0.9em;">
                                                        <span class="pull-right" style="-webkit-transform: rotate(47deg);-moz-transform: rotate(47deg);color:white;margin-top:25px;text-align:center;font-size:18px;">
                                                        NEW
                                                        </span>
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                            <div class="hover-element__reveal" data-overlay="9">
                                                <div class="boxed">
                                                    <h5><?php echo $row->title?></h5>
                                                    <span>
                                                      <?php if ($row->durasi<>"" AND $row->durasi > 0) { ?>
                                                      <em><?php echo $row->durasi." Menit"?></em><br>
                                                      <?php } ?>
                                                      <?php if ($director <> "") { ?>
                                                      <?php echo $director?><br>
                                                      <?php } ?>
                                                      <?php if ($row->tahun<>"" AND $row->tahun > 0) { ?>
                                                      <em><?php echo $row->tahun?></em>
                                                      <?php } ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end hover element-->
                                    </a>
                                </div>
                              <?php } ?>
                            </div>

                            <div class="costumNav">
                                <span class="cnav-item prev prev-text" data-carouselid="carousel3"><span class="fa fa-chevron-left"></span></span><!--kerjaan bayu-->
                                <span class="cnav-item next" data-carouselid="carousel3"><span class="fa fa-chevron-right"></span></span>
                            </div>
                            <!-- <div class="col-md-12 gapless" style="padding-right: 7px; color: black;">
                              <div class="link-right pull-right">
                                <a href="<?php //echo site_url('watchfilms')?>">See All</a>
                              </div>
                            </div> -->
                        </div>

                    </div>
                </div>
                <!--end of row-->
            </div>
        </section>

        <!--
        <section class="project-single-process" id="filmarchive">
            <div class="container">
                <div class="img-banner">
                    <img src="http://placehold.it/1500x100?text=Space For Banner" class="img-responsive">
                </div>
            </div>
        </section>
        -->

        <section class="project-single-process">
            <div class="container">

                <div class="row">
                    <div class="row">
                        <div class="col-sm-12 col-md-2">
                            <a href="<?php echo base_url()."filmarchive"?>" class="main-sec"><h3 class=" wow fadeInLeft">FILM <b>ARCHIVE</b></h3></a>
                            <p class="wow fadeIn">
                            </p>
                        </div>
                        <div class="col-md-10">
                            <h4 class="" style="margin-top: 5px;"><?php echo $this->session->userdata('filmarchive home');?> </h4>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-2">
                        <?php if($lang == "en"){?>
                        <h4 style="color: #000;"><b>FEATURED</b> VIDEOS</h4>
                        <?php }elseif($lang == "id"){?>
                        <h4 style="color: #000;"><b>VIDEO</b> PILIHAN</h4>
                        <?php }?>
                    </div>
                    <div class="col-md-10" style="padding-right: 0;">
                        <div class="row owl-theme owl-carousel " id="carousel4">
                          <?php foreach ($film_archive->result() as $row){
                            $this->db->where('id', trim($row->company_id));
                            $query_company = $this->db->get('film_company');
                            if($query_company->num_rows() > 0){
                              foreach ($query_company->result() as $row_company){
                                $company_name = " - ".$row_company->title;
                              }
                            }else{
                              $company_name = "";
                            } ?>
                          <div class="item">
                            <?php
                            $link = base_url().'detail/index/'.url_title(strtolower($row->title)).'/'.$row->id;
                            ?>
                            <a style="cursor: pointer;" onclick="openmovie('<?php echo $row->id?>','<?php echo $row->category_id?>','<?php echo $link?>')">
                              <div class="hover-element hover-element-1 wow flipInX" data-wow-delay="0.4s" data-wow-duration="0.6s" data-title-position="top,left">
                                  <div class="hover-element__initial">
                                      <img src="http://116.206.196.146/<?php echo $row->cover?>">
                                  </div>
                                  <div class="hover-element__reveal" data-overlay="9">
                                      <div class="boxed" style="padding-top:25%;">
                                        <?php
                                            $this->db->select("title");
                                            $this->db->from("film_director");
                                            $this->db->where("id",$row->director_id);
                                            $sutradara = $this->db->get()->result();
                                        ?>
                                        <h5><?php if(!empty($sutradara))echo $sutradara[0]->title?></h5>
                                        <h5><?php echo $row->tahun?></h5>
                                      </div>
                                  </div>
                              </div>
                              <div class="bottom-capt" style="line-height: 20px; margin-top: 5px;">
                                  <span style="font-size: 15px;"><b><?php echo $row->title?></b></span><br>
                                  <span><?php echo $row->tahun.$company_name?></span>
                              </div>
                            </a>
                          </div>
                          <?php } ?>
                        </div>
                        <div class="costumNav" style="width: 97.2%;top:30% !important;">
                          <span class="cnav-item prev prev-text" data-carouselid="carousel4"><span class="fa fa-chevron-left"></span></span><!--kerjaan bayu-->
                          <span class="cnav-item next" data-carouselid="carousel4"><span class="fa fa-chevron-right"></span></span>
                        </div>
                    </div>
                    </div>
                <!--end of row-->

                </div>
            </div>
        </section>

        <section class="project-single-process" id="filmnews">
            <div class="container">

                <div class="row">
                    <div class="row">
                        <div class="col-sm-12 col-md-2">
                            <div>
                                <a href="<?php echo base_url()."filmnews"?>" class="main-sec"><h3 class=" wow fadeInLeft">FILM<b>NEWS</b></h3></a>
                            </div>
                        </div>
                        <div class="col-md-10" style="">
                            <h4 class="" style="margin-top: 5px; "><?php echo $this->session->userdata('filmnews home');?></h4>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-2" >
                        <?php if($lang == "en"){?>
                        <h4 style="color: #000;"><b>THE LATEST</b> NEWS</h4>
                        <?php }elseif($lang == "id"){?>
                        <h4 style="color: #000;"><b>BERITA</b> TERBARU</h4>
                        <?php }?>
                    </div>
                    <div class="col-md-10" style="padding-right: 0;">
                        <div class="row owl-theme owl-carousel" id="carousel5">
                          <?php foreach ($film_news->result() as $row){ ?>
                            <div class="item news">
                                <div class="img-thumb">


                                    <?php
                                    if (strpos($row->cover, 'uploads/') !== false) {
                                    ?>

                                    <a href="<?php echo base_url()."filmnews"?>" target="_blank">

                                    <img src="<?php echo "http://116.206.196.146/idfilm/public/".$row->cover?>"width="100%">
                                    <?php }else{?>
                                    <img src="<?php echo base_url()."images/filmnews/".$row->cover?>" width="100%">

                                    </a>

                                    <?php }?>
                                </div>
                                <div class="news body">
                                    <b><?php
                                  if(!empty($row->selengkapnya)){

                                    $url_info = parse_url($row->selengkapnya);
                                    echo "<a href='https://".$url_info['host']."' target='_blank' style='text-decoration:underline;color:#007eff;'>".$url_info['host']."</a>";
                                  }else{
                                    $url_info['host'] = "";
                                  }
                                  ?>
                                  </b>

                                    <a
                                    <?php if(!empty($row->selengkapnya)){?>
                                    href="<?php echo base_url()."filmnews"?>"
                                    <?php }?> target="_blank" style="text-decoration: none;"
                                    >
                                      <h5 style="font-size: 18px; font-family: &quot;Arial Black&quot;, sans-serif;background-image: initial;background-position: initial;background-size: initial;background-repeat: initial;background-attachment: initial;background-origin: initial;background-clip: initial;"><?php echo $row->title_film_news?></h5>
                                    </a>

                                    <div class="date-news" style="color:black; <?php
                                    if (strpos($row->title_film_news, '<p>') !== false) {
                                        echo 'margin-top: -22px;';
                                    } ?>
                                    "><?php
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

                                  ?></div>

                                  <!--<p><?php echo substr(strip_tags($row->description),0,180)."..."?></p>
                                  <p><?php echo substr(strip_tags($row->description,"<a>"),0,strpos($row->description, '0p0oi'))."..."?></p>-->
                                    <p><?php echo substr(strip_tags($row->description,"<a>"),0,900000)."..."?></p>

                                  <!--
                                    <?php
                                    if (strpos(strip_tags($row->description,"<a>"), '<a href') !== false) {
                                    ?>
                                      <p><?php echo substr(strip_tags($row->description,"<a>"),0,250)."..."?></p>
                                    <?php
                                    }else{
                                    ?>
                                      <p><?php echo substr(strip_tags($row->description,"<a>"),0,500)."..."?></p>
                                    <?php } ?>

                                  -->

                                    <a
                                    <?php if(!empty($row->selengkapnya)){?>
                                    href="<?php echo $row->selengkapnya;?>"
                                    <?php }?> target="_blank"
                                    >Selengkapnya</a>
                                </div>
                            </div>
                          <?php } ?>
                        </div>
                        <div class="costumNav" style="width: 97.2%;top:7% !important;"><!--kerjaan bayu-->
                          <span class="cnav-item prev prev-text" data-carouselid="carousel5"><span class="fa fa-chevron-left"></span></span><!--kerjaan bayu-->
                          <span class="cnav-item next" data-carouselid="carousel5"><span class="fa fa-chevron-right"></span></span>
                        </div>
                    </div>
                    </div>
                <!--end of row-->
                </div>
            </div>
        </section>

        <style type="text/css">
            h5>p{
                font-size: 18px !important;
            }
        </style>

        <section class="project-single-process" id="filmblog">
            <div class="container">

                <div class="row">
                    <div class="row">
                        <div class="col-sm-12 col-md-2">
                            <div>
                                <a href="<?php echo base_url()."filmblog"?>" class="main-sec"><h3 class=" wow fadeInLeft">FILM<b>BLOG</b></h3></a>
                                <p class="wow fadeIn">
                                </p>
                            </div>
                        </div>
                        <div class="col-md-10" style="">
                            <h4 class="" style="margin-top: 5px;"><?php echo $this->session->userdata('filmblog home');?></h4>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-2">
                        <?php if($lang == "en"){?>
                            <h4 style="color: #000;"><b>THE LATEST</b> BLOG</h4>
                        <?php }elseif($lang == "id"){?>
                            <h4 style="color: #000;"><b>ARTIKEL</b> TERBARU</h4>
                        <?php }?>
                    </div>
                    <div class="col-md-10">
                      <?php foreach ($film_blog->result() as $no => $row){ $no++;?>
                        <div class="row" style="margin-bottom:18px;">
                        <div class="col-md-4">
                            <?php
                            $data_image = $this->db->select("image,link")->from("film_blog_contents")->where("film_blog_id",$row->id)->get()->result();

                            if($row->type == 'Gallery'){
                                if(empty($data_image[0]->image)){
                            ?>
                                <!--<img src="http://placehold.it/600x400">-->
                            <?php }else{?>
                                <!--<img src="http://116.206.196.146/idfilm/public/<?php echo $data_image[0]->image?>">-->
                                <img src="http://116.206.196.146/idfilm/public/<?php echo $row->cover?>">
                            <?php }?>
                            <?php }elseif($row->type == 'Link'){?>
                                <img src="http://116.206.196.146/idfilm/public/<?php echo $row->cover?>">
                                <!---->
                            <?php }elseif($row->type == 'Text'){?>
                                <img src="http://116.206.196.146/idfilm/public/<?php echo $row->cover?>">
                            <?php }?>
                        </div>
						<!--kerjaan bayu-->
						<style type="text/css">
							@media (min-width:280px){
								.artikel-terbaru{
									margin-top:10px;
								}
							}
							@media (min-width:992px){
								.artikel-terbaru{
									margin-top:-5px;
								}
							}
							@media (min-width:1025px){
								.artikel-terbaru{
									margin-top:-7px;
								}
							}
						</style>
						<!--batas kerjaan bayu-->
                        <div class="col-md-8 artikel-terbaru"><!--keerjaan bayu style="padding-left:8px;"-->
                            <a href="<?php echo site_url('filmblog/detail/'.url_title(strtolower($row->title)).'/'.$row->id)?>">
                              <h4><?php echo $row->title?></h4><!--kerjaan bayu-->
                            </a>
                            <p><?php echo substr(strip_tags($row->short_desc),0,550)."..."?></p>
                        </div>
                        </div>

                      <?php } ?>
                    </div>
                   </div>
                <!--end of row-->
                </div>
            </div>
        </section>

        <style type="text/css">
            .video-container {
                position:relative;
                padding-bottom:56.25%;
                padding-top:30px;
                height:0;
                overflow:hidden;
            }

            .video-container iframe, .video-container object, .video-container embed {
                position:absolute;
                top:0;
                left:0;
                width:100%;
                height:100%;
            }
        </style>

        <div class="list-featured-bottom" style="padding: 35px 20px 45px 20px;">
            <img src="<?php echo base_url()?>images/banner-biznet.jpg" width="100%">
        </div>

        <footer class="footer-2 text-center-xs bg--dark">
            <div class="container">
                <div class="row" style="vertical-align: middle;">
                    <img class="logo logo-light " alt="logo" src="<?php echo base_url()?>img/idfc-logo.png" style="border-right: 1px solid white; margin-bottom: 3px;" /> <span class="text-white">All About Indonesian Film</span>
                    <div class="col-md-3 pull-right">
                        <div class="btn btn--xs btn-danger" id="submitfilm">Submit Film</div>
                    </div>
                </div>
                <hr style="margin-top: 10px;">
                <div class="col-md-12">
                    <div class="col-md-4">
                        <p class="text-white" style="line-height: 20px;padding-right:20px;text-align:justify;">
                             <?php
                             $des_footer = $this->db->where("param","deskripsi_footer")->get("settings")->result();
                             echo $des_footer[0]->value;
                             ?>
                        </p>

                         <span>Powered by</span>
                        <img src="<?php echo base_url()?>img/biznet.png" style="max-height: 60px;">
                    </div>
                    <div class="col-md-3">
                        <h4 class="text-white">Follow Us</h4>
                        <table width="100%" style="margin-left:-20px;"><!--kerjaan bayu-->
                            <tr>

                                <?php
                                $this->db->select("param,value");
                                $this->db->from("settings");
                                $this->db->like("param","sosmed_");
                                $sosmed = $this->db->get()->result();
                                #print_r($sosmed);

                                foreach ($sosmed as $value) {
                                    if($value->param == "sosmed_facebook"){
                                ?>
                                    <td>
                                        <a href="<?php echo $value->value?>" target="_blank" class="col-md-3 socround back-fb">
                                            <span class="socicon-facebook"></span>
                                        </a>
                                    </td>
                                <?php
                                    }elseif($value->param == "sosmed_twitter"){
                                ?>
                                    <td>
                                        <a href="<?php echo $value->value?>" target="_blank" class="col-md-3 socround back-twitter">
                                            <span class="socicon-twitter"></span>
                                        </a>
                                    </td>
                                <?php
                                    }elseif($value->param == "sosmed_youtube"){
                                ?>
                                    <td>
                                        <a href="<?php echo $value->value?>" target="_blank" class="col-md-3 socround back-youtube">
                                            <span class="socicon-youtube"></span>
                                        </a>
                                    </td>
                                <?php
                                    }elseif($value->param == "sosmed_instagram"){
                                ?>
                                    <td>
                                        <a href="<?php echo $value->value?>" target="_blank" class="col-md-3 socround back-instagram">
                                            <span class="socicon-instagram"></span>
                                        </a>
                                    </td>
                                <?php
                                    }
                                }
                                ?>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-2">
                        <h4 class="text-white">Navigation</h4>
                        <div class="col-md-6" style="padding-left: 0;">
                            <a href="#">Home</a>
                            <a href="#">WatchFilm</a>
                            <a href="#">FilmInfo</a>
                            <a href="#">FilmArchive</a>
                        </div>
                        <div class="col-md-6">
                            <a href="#">FilmNews</a>
                            <a href="#">FilmBlog</a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <h4 class="text-white">Email Newsletters</h4>
                        <input type="text" name="email-newsletter" class="form-control" placeholder="Your email" style="margin-bottom:10px;">
                        <div class="col-md-6 gapless">
                            <div class="btn btn--xs btn-primary">Subscribe</div>
                        </div>
                        <div class="col-md-6 gapless">
                            <div class="btn btn--xs btn-warning">Donate</div>
                        </div>
                    </div>
                </div>
            </div>

            <!--end container-->
        </footer>
		<!--kerjaan bayu-->
			<style type="text/css">
				@media(min-width:992px){
					.modal-dialog-header{
						width: 600px !important;
						margin: 30px auto !important;
					}
				}
			</style>
		<!--batas kerjaan bayu-->

        <div class="modal fade" id="popup_video" role="dialog">
            <div class="modal-dialog modal-dialog-header"><!--kerjaan bayu-->

              <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                         <?php echo $slider_overview[0]->value?>
                    </div>
                    <div class="modal-body">
                        <p>
                            <div class="videoWrapper">
                                <!-- Copy & Pasted from YouTube -->
                                <?php
                                $this->db->select("value");
                                $this->db->from("settings");
                                $this->db->where("param","slider_overview_video");
                                $video_popup = $this->db->get()->result();
                                if($video_popup){
                                ?>
                                     <video id="path-watch" style="width:100%;" controls>
                                       <source src="<?php echo "http://116.206.196.146/".$video_popup[0]->value?>" type="video/mp4">
                                     Your browser does not support the video tag.
                                     </video>
                                <?php }?>
                            </div>
                        </p>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="close" id="close-watch" data-dismiss="modal">Close</a>
                    </div>
                </div>

            </div>
        </div>

        <style type="text/css">
            .close{
                padding: 7px 12px;
                background-color: #e25353;
                border-radius: 15px;
                color: white;
            }
            .close:hover{
                background-color: white;
                color: #e25353;
                border:1px solid #e25353;
            }
        </style>

    </div>

    <?php
    if(sessionValue('id')<>''){
        $status = 'login';
    }else{
        $status = 'nologin';
    }
    ?>
    <!-- Modal -->
	<style type="text/css">
		<!--modal dialog buat kotak modal-->
			@media (min-width: 768px) {
				.modal-dialog {
					width: 600px;
					margin: 30px auto;
				}
			}
			@media (min-width: 992px) {
				.modal-dialog {
					width: 950px;
					margin: 30px auto;
				}
			}
		<!--batas modal dialog buat kotak modal-->
		<!--buat button harga input[type=search]-->
			<!--@min-width: 992px) {-->
				div#vcd_div button#vcd-movie {
					margin-top:100px;
				}
			<!--}-->
		<!--batas buat button harga-->
		@media (min-width: 992px) {
			.modal-dialog {
				width: 950px;
				margin: 30px auto;
			}
		}
		@media (min-width: 768px) {
			#path-movie {
				height:250px;
			}
		}
		@media (min-width: 992px) {
			#path-movie {
				height:350px;
			}
		}
		@media (min-width: 280px) {
			#path-movie {
				height:200px;
			}
		}
		@media (min-width: 400px) {
			#path-movie {
				height:350px;
			}
		}
		@media (min-width: 992px) {
			#streaming_div {
				margin-right: 20px;
			}
		}
	</style>
	<!--batas kodingan bayu-->
    <div class="modal fade" id="popup-movie" role="dialog" style="left:0;right:0;padding-top:30px;height:100%;">
        <div class="modal-dialog" style=""><!--kerjaan bayu-->
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="title-movie" style="float:left"></h4><!--kerjaan bayu-->
					<!--kerjaan bayu-->
						<?php
							if($browser == 'Firefox'){
						?>
						<style type="text/css">
							@media (min-width:768px){
								.stop-movie-close-x{
									margin-right:0px !important;
								}
							}
						</style>
						<?php
							}
						?>
					<!--batas kerjaan bayu-->
					<!--kerjaan bayu stop-movie-close-x-->
                    <button id="stop-movie" type="button" class="butt butt-primary sharp stop-movie-close-x" data-dismiss="modal" style="font-size:12px !important;height:30px;width:30px;margin-bottom:2px;float:right"><i class="fa fa-times" style="font-size:20px;"></i></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                      <div class="col-sm-7">
                          <!--<video id="path-movie" class="video-js" controls autoplay preload="auto" width="597" height="350" poster="http://116.206.196.146/filmdata/covermovie.jpg" data-setup="{}">-->
                          <video id="path-movie" class="video-js" controls style="width:100%;" poster="#" data-setup="{}">
                          <source id="source-movie" src="http://116.206.196.146/filmdata/2017-09/hvidIdFC_16082017_073903.mp4" type='video/mp4'>
                          <p class="vjs-no-js">
                              To view this video please enable JavaScript, and consider upgrading to a web browser that
                              <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                          </p>
                          </video>
                      </div>
                      <div class="col-sm-5">
                          <div class="col-md-12" style="text-align:left !important;padding: 0 22px;">
                            <div id="noarch">
                              <span id="sort_detail" style="font-size:12px;font-weight:200;color:black;"></span></br>

                              <a href="#" id="link_detail" style="font-size:12px;font-weight:200;color:#D30E0E;"><?php echo $this->session->userdata('Read More');?></a></br>
                            </div>

                              <a class="difo">Uploaded On : </a> <a id="created_at" class="difo"></a></br>
                              <a class="difo">Original Title : </a> <a id="o_title" class="difo"></a></br>
                              <a class="difo">Production year : </a> <a id="tahun" class="difo"></a></br>
                              <a class="difo">Production country : </a> <a id="country" class="difo"></a></br>
                              <a class="difo">Production location : </a> <a id="location" class="difo"></a></br>
                              <a class="difo">Duration : </a> <a id="duration" class="difo"></a></br>
                          </div>

                          <div class="col-md-12" style="padding:10px 22px 10px 22px;">
                              <div id="disediakan">
                              <a class="difo">Disediakan Oleh:</br></a>
                              <img id="dsd_image" src="" style="width: 100px;"></br>
                              <a class="difo">Tertarik dengan video ini?</br></a>
                              <a class="difo" data-toggle="collapse" data-target="#detail">Klik disini untuk informasi lebih lanjut!</a>
                              <div id="detail" class="collapse" style="padding: 10px; background-color: #f4f4f4; border-radius: 5px;border:1px solid #b4b4b4;">
                                  <a class="difo" >Tentang video FilmArchive ini</a></br>
                                  <p style="font-size: 11px;
      line-height: 1.4;">
                                  Pemilik hak hukum video ini adalah <span id="dsd_company_name"></span>.</br>
                                  Jika Anda ingin menggunakan video ini, silahkan hubungi:</br>
                                  Situs:</br>
                                  <span id="dsd_site"></span></br>
                                  Anda tidak memiliki hak untuk menggunakan video ini tanpa izin dari pemilik hak-hak hukum!
                                  </p>
                              </div>
                              </div>

                              <button class="butt butt-primary" data-toggle="collapse" data-target="#embed" style="font-size:12px !important; height:25px;margin:7px 0;padding:0 10px;">Embed</button>
                              <textarea id="embed" class="collapse" style="height:25px;width:100%"/></textarea>
                          </div>
						  <!--kerjaan bayu-->
							<style type="text/css">
									@media (min-width:280px) {
										#vcd_div #vcd-movie{
											margin-left:32px;
										}
										.button-modal{
											padding-right: 0px;
											padding-left: 0px;
											margin-left: 25px;
										}
										#streaming_div{
											padding-right: 0px;
											padding-left: 0px;
											padding-right: 5px;
											text-align:center;
										}
										#vcd_div{
											padding-right: 0px;
											padding-left: 0px;
										}
									}
									@media(min-width:768px){
										.button-modal{
											padding-right: 0px;
											padding-left: 0px;
											margin-left: 0px;
										}
										#streaming_div{
											padding-right: 3px;
										}
									}
									@media (min-width:992px) {
										#vcd_div #vcd-movie{
											margin-left:0px;
											margin-top:23px;
										}
									}
									@media (min-width:1025px) {
										#vcd_div #vcd-movie{
											margin-left:0px;
											margin-top:26.5px;
										}
										.button-modal{
											padding-right: 0px;
											padding-left: 0px;
											margin-left: 0px;
											padding-right: 0px;
											padding-left: 25px;
											margin-left: -15px;
										}

									}
							</style>
							<?php
								if($browser == 'Chrome'){
							?>
									<style type="text/css">
										@media (min-width:280px){
											#streaming_div #streaming-movie{
												margin-left: 3px;
											}
										}
									</style>
								<?php
									}
								?>
								<!--kerjaan bayu-->
								<?php
									if($browser == 'Firefox'){
								?>
									<style type="text/css">
										@media(min-width:768px){
											#vcd_div{
												margin-left: 2px;
											}
										}
									</style>
								<?php
									}
								?>
							<!--batas kerjaan bayu-->
                          <div class="col-md-9 button-modal" style="text-align:left !important;"><!--kerjaan bayu-->
                              <div id="streaming_div" class="col-md-4 gapless" style=""><!--kerjaan bayu-->
                                  <span style="font-size:12px;font-weight:200;color:black;">Harga Streaming</span>
                                  <button type="button" id="streaming-movie" class="butt butt-primary sharp" style="font-size:12px !important;height:30px;width:100px;margin-bottom:2px;" onclick="buyfilm('<?php echo $status?>','streaming')">Rp 15.000</button>
                              </div>
                              <div id="dvd_div" class="col-md-4 gapless" style="padding-right: 5px;text-align:center;">
                                  <span style="font-size:12px;font-weight:200;color:black;">Harga DVD</span>
                                  <button type="button" id="dvd-movie" class="butt butt-primary sharp" style="font-size:12px !important;height:30px;width:100px;margin-bottom:2px;" onclick="buyfilm('<?php echo $status?>','dvd')">Rp 15.000</button>
                              </div>
                              <div id="vcd_div" class="col-md-4 gapless" style="padding-right: 5px;text-align:center;">
                                  <span style="font-size:12px;font-weight:200;color:black;"> Harga VCD</span>
                                  <button type="button" id="vcd-movie" class="butt butt-primary sharp" style="font-size:12px !important;height:30px;width:100px;margin-bottom:2px;" onclick="buyfilm('<?php echo $status?>','vcd')">Rp 15.000</button>
                              </div>
                          </div>
                      </div>
                    </div>

                    <div class="row">

                      <div class="col-md-12">
						<!--kerjaan bayu-->
							<style type="text/css">
									#stop-movie{
										font-size:12px !important;
										height:30px;
										width:100px;
										margin-bottom:2px;
									}
									@media (min-width:280px) {
										button#stop-movie{
											margin-right: -7px;
										}
									}
									@media (min-width:768px) {
										button#stop-movie{
											margin-right:-13px;
										}
									}
							</style>
								<?php
									if($browser == 'Chrome'){
								?>
										<style type="text/css">
											@media (min-width:280px){
												button#stop-movie{
													margin-right: -7px;
												}
											}
											@media (min-width:768px){
												#vcd_div button#vcd-movie{
													margin-right:-2px;
												}
											}
											@media (min-width:768px){
												button#stop-movie{
													margin-right: 2px;
												}
											}
										</style>
								<?php
									}
								?>
                        <div id="foarch" style="padding:5px">
                          <span id="arc_sort_detail" style="font-size:12px;font-weight:200;color:black;"></span></br>
                        </div>
                      </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col-md-12">
						<!--kerjaan bayu-->
							<?php
								if($browser == 'Firefox'){
							?>
								<style type="text/css">
									@media (min-width:768px){
										#stop-movie{
											margin-left: 2px;
											margin-right: 1px !important;
										}
									}
								</style>
							<?php
								}
							?>
						<!--batas kerjaan bayu-->
                        <button id="stop-movie" type="button" class="butt butt-primary sharp" data-dismiss="modal" style="font-size:12px !important;height:30px;width:100px;margin-bottom:2px;">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style type="text/css">
        .difo{
            font-size: 12px;
        }
    </style>

    <?php foreach ($film_blog->result() as $no => $row){ $no++;
    $data_image = $this->db->select("image,link")->from("film_blog_contents")->where("film_blog_id",$row->id)->get()->result();
    ?>
    <div id="myModal<?php echo $no;?>" class="modal fade" role="dialog">
        <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo $row->title?></h4>
            </div>

            <div class="modal-body">
            <?php if($row->type == "link"){?>
                <div class="video-container"><iframe src="<?php echo $data_image[0]->link?>?rel=0" allowfullscreen></iframe></div>
            <?php }?>
                <p style="padding: 10px;"><?php echo substr(strip_tags($row->short_desc),0,250)."..."?></p>
                <a style="padding: 10px; color: red" href="<?php echo site_url('filmblog')?>">Selengkapnya</a>
            </div>

            <div class="modal-footer">
                <button id="stop-movie" type="button" class="butt butt-primary sharp" data-dismiss="modal" style="font-size:12px !important;height:30px;width:100px;margin-bottom:2px;">Keluar</button>
            </div>
        </div>

        </div>
    </div>

    <?php }?>

    <script src="<?php echo base_url()?>js/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url()?>js/bootstrap2.min.js"></script>
    <script src="<?php echo base_url()?>js/isotope.min.js"></script>
    <script src="<?php echo base_url()?>js/ytplayer.min.js"></script>
    <script src="<?php echo base_url()?>js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url()?>js/lightbox.min.js"></script>
    <script src="<?php echo base_url()?>js/twitterfetcher.min.js"></script>
    <script src="<?php echo base_url()?>js/smooth-scroll.min.js"></script>
    <script src="<?php echo base_url()?>js/scrollreveal.min.js"></script>
    <script src="<?php echo base_url()?>js/parallax.js"></script>
    <script src="<?php echo base_url()?>js/scripts.js"></script>
    <script src="<?php echo base_url()?>js/lightslider.min.js"></script>
    <script src="<?php echo base_url()?>js/wow.min.js"></script>
    <script src="<?php echo base_url()?>plugins/html5lightbox/html5lightbox.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){

               $( "#close-watch" ).click(function() {
                    var vid = document.getElementById("path-watch");
                   vid.pause();
               });

          $(".form-login").trigger("reset");
          $(".form-login").on('submit',function(e){
            var email = $("#email-login").val();
            var password = $("#password-login").val();
            var url = window.location.href;
        		$.ajax({
        			type : 'POST',
        			url : '<?php echo site_url('login/member')?>',
        			data : {
                email : email,
                password : password,
                redirect : url
              },
        			success:function(data){
        				var tmp = eval('('+data+')');
        				if (tmp.success){
                  location.href = tmp.redirect_url;
        				}else{
        					alert("failed");
        				}
        			}
        		});
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
                //var a = e.owl.owlItems.length - 4;/*--kerjaan bayu kodingan lama--*/
				var a = e.owl.owlItems.length - e.options.items; /*--kerjaan bayu--*/
                if(e.owl.currentItem == a)
                {
                    $.fn.toggleNext(''+id,0);
                }
                else{
                    $.fn.toggleNext(''+id,1);
                }
            }
            var owl1 = $("#carousel1");
            var owl2 = $("#carousel2");
            var owl3 = $("#carousel3");
            var owl4 = $("#carousel4");
            var owl5 = $("#carousel5");
            owl1.owlCarousel({
                items : 6,
                dots: false,
                autoplay: true,
                afterMove: function(){
                    $.fn.carMove(owl1.attr('id'), this);
                }
            });
            owl2.owlCarousel({
                items : 4,
                dots: false,
                autoplay: true,
                afterMove: function(){
                    $.fn.carMove(owl2.attr('id'), this);
                }
            });
            owl3.owlCarousel({
                items : 6,
                dots: false,
                autoplay: true,
                afterMove: function(){
                    $.fn.carMove(owl3.attr('id'), this);
                }
            });
            owl4.owlCarousel({
                items : 4,
                dots: false,
                autoplay: true,
                afterMove: function(){
                    $.fn.carMove(owl4.attr('id'), this);
                }
            });
            owl5.owlCarousel({
                items : 4,
                dots: false,
                margin: 100,
                autoplay: true,
                afterMove: function(){
                    $.fn.carMove(owl5.attr('id'), this);
                }

            });
            $.fn.togglePrev("carousel1",0);
            $.fn.togglePrev("carousel2",0);
            $.fn.togglePrev("carousel3",0);
            $.fn.togglePrev("carousel4",0);
            $.fn.togglePrev("carousel5",0);

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
            var cout = 1;
            var slidin = 0;
            var slidinb = 0;
            var maxslid = 0;
            var bgi = [];
            var mt = [];
            var st = [];
            var ft = [];
            var ival;
            $.fn.sliderInit = function(){
                $(".background-image-holder").hide();
                $(".background-image-holder2").css('background', "url('"+bgi[slidinb]+"')");
                $(".background-image-holder3").css('background', "transparent");
                $(".dot-wrap").empty();
                $(".img-src").each(function(e){
                    bgi.push($(this).attr('src'));
                    var dott = "<div class='dots' data-id='"+maxslid+"''></div>";
                    maxslid += 1;

                    $(".dot-wrap").append(dott)
                });
                $(".main-text").each(function(e){
                    mt.push($(this).html());
                });
                $(".second-text").each(function(e){
                    st.push($(this).html());
                });
                $(".footer-text").each(function(e){
                    ft.push($(this).html());
                });


            };
            $(".search-area").hover(
            function(){
                $(".search-input").css("opacity", "1");
            },
            function(){
                $(".search-input").css("opacity", "0");
            });
            $.fn.changeSlide = function(){


                $(".background-image-holder2").css('background', "url('"+bgi[slidin]+"')");
                $("#mid-text").animate({opacity: "0"},0);
                //$(".background-image-holder2").hide();
                // $(".background-image-holder").animate({left: "-100%"},0);
                // $(".background-image-holder").css('background', "url('"+bgi[slidin]+"')");
                // $(".background-image-holder").animate({left: "0"},2000);

                $("#mid-text").animate({opacity:"1"},1000);
                $("#main-head").html(mt[slidin]);
                $("#second-head").html(st[slidin]);
                $("#footer-head").html(ft[slidin]);
                $(".dots").each(function(e){
                    if($(this).data('id') === slidin)
                    {
                        $(this).addClass('active');
                    }
                    else
                    {
                        $(this).removeClass('active');
                    }
                });
                slidinb = slidin;
                slidin += 1;


                if(slidin === maxslid)
                {
                    slidin = 0;
                }
                clearTimeout(ival);
                ival = setTimeout(function(){
                    $.fn.changeSlide();
                },
                7000);

            };
            $.fn.sliderInit();
            $.fn.changeSlide();
            $(".dots").click(function(){
                var id = $(this).data('id');
                slidin = id;
                $.fn.changeSlide();
            });

            $("#login-form").click(function(){
              $(".search-area").fadeToggle();
            });

            $('input[type=search]').keypress(function (e) {
                if (e.which == 13) {
                    var val = $(this).val();
                    //alert(val);
                    if(val != ''){
                        window.location = '<?php echo base_url()?>search/index/'+val;
                    }
                }
            });
        });
    </script>
    <style type="text/css">
        .back-youtube{
            background-color: red;
        }
    </style>

    <script type="text/javascript">
        function openmovie(idfilm,idcategory,full_film){
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

                    <?php if($lang == "en"){?>
                    $("#title-movie").html(tmp.title_eng+' ('+tmp.tahun+')');
                    <?php }else{?>
                    $("#title-movie").html(tmp.title+' ('+tmp.tahun+')');
                    <?php }?>
                    $("#streaming-movie").html(harga_streaming);
                    $("#dvd-movie").html(harga_dvd);
                    $("#vcd-movie").html(harga_vcd);

                    <?php if($lang == "en"){?>
                    $("#o_title").html(tmp.title_ori);
                    <?php }else{?>
                    $("#o_title").html(tmp.title_ori);
                    <?php }?>

                    $("#created_at").html(tmp.created_at);
                    $("#tahun").html(tmp.tahun);
                    $("#duration").html(tmp.durasi+' Minute');
                    $("#country").html(tmp.country);
                    $("#location").html(tmp.location);

                    if(tmp.disediakan == "0"){
                        document.getElementById( 'disediakan' ).style.display = 'none';
                    }else{
                        document.getElementById( 'disediakan' ).style.display = 'block';
                        document.getElementById('dsd_image').src=tmp.dsd_image;
                        $("#dsd_company_name").html(tmp.company_name);
                        $("#dsd_site").html(tmp.site);
                    }

                    $("#title-movie").html(tmp.title+' ('+tmp.tahun+')');
                    $("#streaming-movie").html(harga_streaming);
                    $("#dvd-movie").html(harga_dvd);
                    $("#vcd-movie").html(harga_vcd);

                    if(tmp.harga_streaming == 0){
                        document.getElementById( 'streaming_div' ).style.display = 'none';
                    }
                    if(tmp.harga_dvd == 0){
                        document.getElementById( 'dvd_div' ).style.display = 'none';
                    }
                    if(tmp.harga_vcd == 0){
                        document.getElementById( 'vcd_div' ).style.display = 'none';
                    }

                    $("#filmid").val(idfilm);

                    <?php if($lang == "en"){?>
                    if(tmp.category_id == '4'){
                      $("#arc_sort_detail").html(tmp.f_sort_detail_eng);
                      document.getElementById( 'noarch' ).style.display = 'none';
                      document.getElementById( 'foarch' ).style.display = 'block';
                    }else{
                      $("#sort_detail").html(tmp.sort_detail_eng);
                      document.getElementById( 'noarch' ).style.display = 'block';
                      document.getElementById( 'foarch' ).style.display = 'none';
                    }
                    <?php }else{?>
                    if(tmp.category_id == '4'){
                      $("#arc_sort_detail").html(tmp.f_sort_detail);
                      document.getElementById( 'noarch' ).style.display = 'none';
                      document.getElementById( 'foarch' ).style.display = 'block';
                    }else{
                      $("#sort_detail").html(tmp.sort_detail);
                      document.getElementById( 'noarch' ).style.display = 'block';
                      document.getElementById( 'foarch' ).style.display = 'none';
                    }
                    <?php }?>

                    if(idcategory == '6' || idcategory == '8' || idcategory == '4'){
                        $("#link_detail").attr('style','display:none');
                    }else{
                        $("#link_detail").attr('href', full_film);
                        $("#link_detail").attr('style','display:block;font-size:12px;font-weight:200;color:#D30E0E;');
                    }

                    var pathmovie = document.getElementById('path-movie');
                    var source = document.getElementById('source-movie');

                    pathmovie.setAttribute('poster', tmp.thumbnail);
                    source.setAttribute('src', tmp.video);

                    $('#popup-movie').modal('show');
                    var video = videojs('path-movie');
                    video.pause();
                    video.load();

                    $( "#stop-movie" ).click(function() {
                        var myPlayer1 = videojs("path-movie");
                        myPlayer1.pause();
                    });
                }
            });
        }
    </script>

    <!-- ============  LOGIN FACEBOOK  ============ -->

    <script>
    window.fbAsyncInit = function() {
        // FB JavaScript SDK configuration and setup
        FB.init({
          appId      : '836173633259361', // FB App ID
          cookie     : true,  // enable cookies to allow the server to access the session
          xfbml      : true,  // parse social plugins on this page
          version    : 'v2.8' // use graph api version 2.8
        });

        // Check whether the user already logged in
        FB.getLoginStatus(function(response) {
           if (response.status === 'connected') {
                //display user data
                getFbUserData();
           }
        });
    };

    // Load the JavaScript SDK asynchronously
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    // Facebook login with JavaScript SDK
    function fbLogin() {
        FB.login(function (response) {
           if (response.authResponse) {
                // Get and display the user profile data
                getFbUserData();
           } else {
                document.getElementById('status').innerHTML = 'User cancelled login or did not fully authorize.';
           }
        }, {scope: 'email'});
    }

    // Fetch the user profile data from facebook
    function getFbUserData(){
        FB.api('/me', {locale: 'en_US', fields: 'id,first_name,last_name,email,link,gender,locale,picture'},
        function (response) {
             alert(response.id);
                    $.ajax({
                         type : 'POST',
                         url : '<?php echo site_url('login/login_facebook')?>',
                         data : {
                              id : response.id,
                              first_name : response.first_name,
                              last_name : response.last_name,
                              email : response.email,
                              link : response.link,
                              picture : response.picture
                         },

                         success:function(data){
                              var tmp = eval('('+data+')');
                              if (response.id = tmp.id){
                                   //window.location = "<?php echo base_url()?>";
                                   fbLogout();
                              }else{
                                   fbLogout();
                              }
                         }
                    });

        });
    }

    // Save user data to the database
    function saveUserData(userData){
        $.post('userData.php', {oauth_provider:'facebook',userData: JSON.stringify(userData)}, function(data){ return true; });
    }

    // Logout from facebook
    function fbLogout() {
        FB.logout(function() {
           document.getElementById('fbLink').setAttribute("onclick","fbLogin()");
           document.getElementById('fbLink').innerHTML = '<img src="fblogin.png"/>';
           document.getElementById('userData').innerHTML = '';
           document.getElementById('status').innerHTML = 'You have successfully logout from Facebook.';
        });
    }
    </script>
