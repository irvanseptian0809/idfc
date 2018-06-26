<style media="screen">
.popover {
  position: absolute;
  top: 0;
  left: 0;
  z-index: 1060;
  display: none;
  max-width: 276px;
  padding: 1px;
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-size: 14px;
  font-style: normal;
  font-weight: normal;
  line-height: 1.42857143;
  text-align: left;
  text-align: start;
  text-decoration: none;
  text-shadow: none;
  text-transform: none;
  letter-spacing: normal;
  word-break: normal;
  word-spacing: normal;
  word-wrap: normal;
  white-space: normal;
  background-color: #fff;
  -webkit-background-clip: padding-box;
          background-clip: padding-box;
  border: 1px solid #ccc;
  border: 1px solid rgba(0, 0, 0, .2);
  border-radius: 6px;
  -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
          box-shadow: 0 5px 10px rgba(0, 0, 0, .2);

  line-break: auto;
}
.popover.top {
  margin-top: -10px;
}
.popover.right {
  margin-left: 10px;
}
.popover.bottom {
  margin-top: 10px;
}
.popover.left {
  margin-left: -10px;
}
.popover-title {
  padding: 8px 14px;
  margin: 0;
  font-size: 14px;
  background-color: #f7f7f7;
  border-bottom: 1px solid #ebebeb;
  border-radius: 5px 5px 0 0;
}
.popover-content {
  padding: 9px 14px;
}
.popover > .arrow,
.popover > .arrow:after {
  position: absolute;
  display: block;
  width: 0;
  height: 0;
  border-color: transparent;
  border-style: solid;
}
.popover > .arrow {
  border-width: 11px;
}
.popover > .arrow:after {
  content: "";
  border-width: 10px;
}
.popover.top > .arrow {
  bottom: -11px;
  left: 50%;
  margin-left: -11px;
  border-top-color: #999;
  border-top-color: rgba(0, 0, 0, .25);
  border-bottom-width: 0;
}
.popover.top > .arrow:after {
  bottom: 1px;
  margin-left: -10px;
  content: " ";
  border-top-color: #fff;
  border-bottom-width: 0;
}
.popover.right > .arrow {
  top: 50%;
  left: -11px;
  margin-top: -11px;
  border-right-color: #999;
  border-right-color: rgba(0, 0, 0, .25);
  border-left-width: 0;
}
.popover.right > .arrow:after {
  bottom: -10px;
  left: 1px;
  content: " ";
  border-right-color: #fff;
  border-left-width: 0;
}
.popover.bottom > .arrow {
  top: -11px;
  left: 50%;
  margin-left: -11px;
  border-top-width: 0;
  border-bottom-color: #999;
  border-bottom-color: rgba(0, 0, 0, .25);
}
.popover.bottom > .arrow:after {
  top: 1px;
  margin-left: -10px;
  content: " ";
  border-top-width: 0;
  border-bottom-color: #fff;
}
.popover.left > .arrow {
  top: 50%;
  right: -11px;
  margin-top: -11px;
  border-right-width: 0;
  border-left-color: #999;
  border-left-color: rgba(0, 0, 0, .25);
}
.popover.left > .arrow:after {
  right: 1px;
  bottom: -10px;
  content: " ";
  border-right-width: 0;
  border-left-color: #fff;
}
</style>
<body class="scroll-assist" data-reveal-selectors="section:not(.masonry):not(:first-of-type):not(.parallax)" data-reveal-timing="1000">
    <a id="top"></a>
    <div class="loader"></div>
    <nav class="transition--fade" id="nav2">
        <div class="nav-bar nav--absolute nav--fixed" data-fixed-at="200">
            <div class="nav-module logo-module left">
                <a href="<?php echo site_url()?>">
                    <img class="logo logo-dark" alt="logo" src="<?php echo base_url()?>img/idfc-logo-dark.png" />
                    <img class="logo logo-light" alt="logo" src="<?php echo base_url()?>img/idfc-logo.png" />
                </a>
            </div>
            <div class="nav-module menu-module left">
                <ul class="menu">
                    <li>
                        <a href="<?php echo base_url()?>watchfilms">
                            WatchFilms
                        </a>
                    </li>
                    <li class="active">
                        <a href="<?php echo base_url()?>filminfo">
                            FilmInfo
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url()?>filmarchive">
                            FilmArchive
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url()?>filmnews">
                            FilmNews
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url()?>filmblog">
                            FilmBlog
                        </a>
                    </li>
                </ul>
            </div>
            <div class="nav-module menu-module right">
                <ul class="menu">
                    <li>
                        <input type="search" placeholder="Search">
                    </li>
                    <li>
                        <a href="#">
                            EN
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            ID
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url()?>checkout">
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
                      <a href="<?php echo site_url('logout')?>" style="margin-right: 12px;">Logout</a>
                    </li>
                    <?php }else{ ?>
                    <li>
                        <a href="#" style="margin-right: 12px;" id="login-form">Login / Register</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <!--end nav module-->
            <!-- <div class="nav-module right search-area">
                 <input class="search-input" type="text" name="search" style="background-color: transparent; border: 1px white solid; height: 30px; padding: 15px; color: white; transition: 0.5s linear; opacity: 0;">
                <a href="#" class="nav-function">
                    <i class="interface-search icon icon--sm"></i>
                    <span>Search</span>
                </a>
            </div> -->
        </div>
        <!--end nav bar-->
        <div class="nav-mobile-toggle visible-sm visible-xs">
            <i class="icon-Align-Right icon icon--sm"></i>
        </div>
        <div class="search-area">
            <div class="title">Login</div>
            <div class="div-form">
                 <form action="<?php echo base_url()."login/member";?>" method="post">
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
    <?php
    foreach ($filmdata->result() as $film){
        $producer = "";
        $this->db->where('id', $film->producer_id);
        $query = $this->db->get('film_producer');
        foreach ($query->result() as $row){
            $producer = $row->title;
        }

        $company = "";
        $this->db->where('id', $film->company_id);
        $query = $this->db->get('film_company');
        foreach ($query->result() as $row){
            $company = $row->title;
        }

        $director = "";
        $this->db->where('id', $film->director_id);
        $query = $this->db->get('film_director');
        foreach ($query->result() as $row){
            $director = $row->title;
        }

        $genre = "";
        $this->db->select('film_genre.title');
            $this->db->from('film_list_genre');
            $this->db->join('film_genre', 'film_genre.id = film_list_genre.film_genre_id');
        $this->db->where('film_list_genre.film_list_id', $film->id);
        $query = $this->db->get();
        foreach ($query->result() as $row){
            $genre = $row->title.", ".$genre;
        }
        $genre = substr($genre, 0, -2);

        if($film->harga_streaming == '0'){
            $harga = "FREE";
        }else{
            $harga = number_format($film->harga_streaming,0,',','.');
        }
        ?>
        <div class="main-container transition--fade">
            <section class="project-single-process" id="detail">
                <div class="container filminfo-detail-container" style="width: 100%;">
                    <div class="row row-list" style="padding-top: 25px;">
                    <?php #if($film->category_id == '6' or $film->category_id == '8' or $film->category_id == '10'){ ?>
                    <?php if($film->category_id != '2'){ ?>
                    <!--<div class="col-md-12" style="padding-bottom: 10px;padding-left: 21px;">
                        <span class="title-detail-film"><?php echo $film->title?> (<?php echo $film->tahun?>) <?php if($film->harga_streaming==0){ echo '<font style="color:red;">FREE</font>'; }else if($status=="ordered"){ echo '<font style="color:blue;">PAID</font>'; } ?></span>
                    </div>-->
                    <?php } ?>
                    <?php #if($film->category_id <> '6' and $film->category_id <> '8' and $film->category_id <> '10'){ ?>
                    <?php if($film->category_id == '2'){ ?>
                        <div class="col-md-4" style="padding-bottom: 20px;padding-right: 0px;width:294px;">
                            <!-- COVER -->
                            <?php
                            $streaming = $this->db->select("*")->from("film_shop")->where("film_id",$film->id)->where("type","online streaming")->where("stock !=","Habis")->get()->result();
                            $dvd = $this->db->select("*")->from("film_shop")->where("film_id",$film->id)->where("type","dvd")->where("stock !=","Habis")->get()->result();
                            $vcd = $this->db->select("*")->from("film_shop")->where("film_id",$film->id)->where("type","vcd")->where("stock !=","Habis")->get()->result();
                            $cover = "http://116.206.196.146/".$film->cover."";
                            $cover = str_replace("filmdata/thumb","filmdata/images/thumb",$cover);
                            $cover = str_replace(' ', '%20', $cover);
                            $url=getimagesize($cover);
                            if(!is_array($url)){
                                 $cover = base_url()."img/not_available_image.png";
                            }
                            if(!empty($streaming)){?>
                                <div class="img-film" style="background:url('<?php echo 'http://116.206.196.146/'.$film->cover?>');background-size:100% auto;width:100%;height: 420px;margin-bottom: 10px;">
                                  <!--<div class="pull-right" style="background:url('<?php echo base_url()?>images/label-harga.png');background-size:100px;width:100%;height:100%;background-position:top right;background-repeat:no-repeat;font-weight:300;font-size:0.9em;">
                                      <span class="pull-right" style="-webkit-transform: rotate(47deg);-moz-transform: rotate(47deg);color:white;margin-top: 5%;width: 23%;text-align:center;">
                                          <?php echo number_format($streaming[0]->price,0);?>
                                      </span>
                                  </div>-->
                              </div>

                            <?php }else if(!empty($dvd)){ ?>
                                  <div class="img-film" style="background:url('<?php echo 'http://116.206.196.146/'.$film->cover?>');background-size:100% auto;width:100%;height: 420px;margin-bottom: 10px;">
                                    <!--<div class="pull-right" style="background:url('<?php echo base_url()?>images/label-harga.png');background-size:100px;width:100%;height:100%;background-position:top right;background-repeat:no-repeat;font-weight:300;font-size:0.9em;">
                                        <span class="pull-right" style="-webkit-transform: rotate(47deg);-moz-transform: rotate(47deg);color:white;margin-top: 5%;width: 23%;text-align:center;">
                                            <?php echo number_format($dvd[0]->price,0);?>
                                        </span>
                                    </div>-->
                                </div>
                            <?php }else if(!empty($vcd)){ ?>
                                <div class="img-film" style="background:url('<?php echo 'http://116.206.196.146/'.$film->cover?>');background-size:100% auto;width:100%;height: 420px;margin-bottom: 10px;">
                                    <!--<div class="pull-right" style="background:url('<?php echo base_url()?>images/label-harga.png');background-size:100px;width:100%;height:100%;background-position:top right;background-repeat:no-repeat;font-weight:300;font-size:0.9em;">
                                        <span class="pull-right" style="-webkit-transform: rotate(47deg);-moz-transform: rotate(47deg);color:white;margin-top: 5%;width: 23%;text-align:center;">
                                            <?php echo number_format($vcd[0]->price,0);?>
                                        </span>
                                    </div>-->
                                </div>
                            <?php }else if($new > 0){ ?>
                            <div class="img-film" style="background:url('<?php echo 'http://116.206.196.146/'.$film->cover?>');background-size:100% auto;width:100%;height: 420px;margin-bottom: 10px;">
                                <!--<div class="pull-right" style="background:url('<?php echo base_url()?>images/label-harga.png');background-size:100px;width:100%;height:100%;background-position:top right;background-repeat:no-repeat;font-weight:300;font-size:0.9em;">
                                    <span class="pull-right" style="-webkit-transform: rotate(47deg);-moz-transform: rotate(47deg);color:white;margin-top: 5%;width: 23%;text-align:center;">
                                        NEW
                                    </span>
                                </div>
                                -->
                            </div>
                            <?php }else{ ?>
                            <img src="<?php echo $cover?>" style="width:100%">
                            <?php } ?>

                            <?php
                              $gallery = $this->db->select('*')->from('film_gallery')->where('film_id',$film->id)->where('deleted_at',null)->limit(4)->get()->result();
                              foreach ($gallery as $key => $row) {
                              if(strpos($row->ori_image, 'filmdata') !== false) {
                                $ori_image = $row->ori_image;
                              }else if(strpos($row->ori_image, 'uploads') !== false){
                                $ori_image = $row->ori_image;
                              }else{
                                $ori_image = "uploads/".$row->ori_image;
                              }
                              ?>
                                <img src="<?php echo 'http://116.206.196.146/'?><?php echo $ori_image?>" style="margin-bottom: 10px;">
                              <?php
                              }
                              ?>

                            <!--
                            <?php if($film->thumbnail_1 <> ""){ ?>
                            <img src="<?php echo 'http://116.206.196.146/'?><?php echo $film->thumbnail_1?>" style="margin-bottom: 10px;">
                            <?php }else{ ?>
                            <div class="height:50px;width:124px;">&nbsp;</div>
                            <?php } ?>

                            <?php if($film->thumbnail_2 <> ""){ ?>
                            <img src="<?php echo 'http://116.206.196.146/'?><?php echo $film->thumbnail_2?>" style="margin-bottom: 10px;">
                            <?php }else{ ?>
                            <div class="height:50px;width:124px;">&nbsp;</div>
                            <?php } ?>

                            <?php if($film->thumbnail_3 <> ""){ ?>
                            <img src="<?php echo 'http://116.206.196.146/'?><?php echo $film->thumbnail_3?>" style="margin-bottom: 10px;">
                            <?php }else{ ?>
                            <div class="height:50px;width:124px;">&nbsp;</div>
                            <?php } ?>

                            <?php if($film->thumbnail_4 <> ""){ ?>
                            <img src="<?php echo 'http://116.206.196.146/'?><?php echo $film->thumbnail_4?>" style="margin-bottom: 10px;">
                            <?php }else{ ?>
                            <div class="height:50px;width:124px;">&nbsp;</div>
                            <?php } ?>

                            <?php if($film->thumbnail_5 <> ""){ ?>
                            <img src="<?php echo 'http://116.206.196.146/'?><?php echo $film->thumbnail_5?>" style="margin-bottom: 10px;">
                            <?php }else{ ?>
                            <div class="height:50px;width:124px;">&nbsp;</div>
                            <?php } ?>
                            -->
                        </div>
                    <?php } ?>
                        <div class="col-md-8 desc-filminfo-nav">
                            <?php #if($film->category_id <> '6' and $film->category_id <> '8' and $film->category_id <> '10'){ ?>
                            <?php if($film->category_id == '2'){ ?>
                            <div class="col-md-12" style="padding-bottom: 20px;">
                                <span class="title-detail-film"><?php echo $film->title?> (<?php echo $film->tahun?>)</span>
                            </div>
                            <div class="col-md-4" style="padding-left: 0px;/*width:297px;*/">
                                <span class="title-desc-film">Trailer</span><br>
                                <div class="col-md-12 bg-desc-film">
                                    <!--<span class="title-small-desc">The Raid 2: Berandal (2014) Official Trailer</span><br>
                                    <span class="col-md-12 play-btn-desc">
                                        <img src="images/play.png" style="width: 50px;">
                                    </span>-->
                                    <?php
                                    $title_cek = explode(' ',trim($film->title));
                                    $thumbnail = $this->db->select("*")->from("film_list")->where("id_full_film",$film->id)->where("cover is not null",null,false)->like("title",$title_cek[0])->limit(1)->get()->result();
                                    if(!empty($thumbnail)){
                                      $thumb_trailer_final = 'http://116.206.196.146/'.$thumbnail[0]->cover;
                                    }else{
                                      $thumb_trailer_final = 'http://116.206.196.146/'.$film->cover;
                                    }
                                    ?>
                                    <!-- <video id="my-video" class="video-js" controls controlsList="nodownload" preload="auto" width="293" height="182"
                                    poster="" data-setup="{}">
                                    <source src="<?php //echo 'http://116.206.196.146/'.$film->full_path_hd?>" type='video/mp4'>
                                    <p class="vjs-no-js">
                                        To view this video please enable JavaScript, and consider upgrading to a web browser that
                                        <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                                    </p>
                                    </video> -->

                                    <div style="width:100%;height:182px;background:url('<?php echo $thumb_trailer_final?>');background-size:auto 100%;background-position:top center;background-repeat:no-repeat;background-color:#000;">
                                        <div class="col-md-12 buy-film" style="mix-blend-mode: unset;">
                                            <div class="buy-button" title="Watch Full Film" style="margin-left: 35%;margin-top: 17%;">
                                                <a id="play-trailer" href="#" data-toggle="modal" data-target="#popup-trailer">
                                                    <i class="fa fa-play" style="padding-left:30px;color:#fff !important;"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <?php if(!empty($film->behindthescene_path_hd) || !empty($film->behindthescene_path_low)){ ?>
                            <div class="col-md-4" style="padding-left: 0px;/*width:297px;*/">
                                <span class="title-desc-film">Behind The Scene</span><br>
                                <div class="col-md-12 bg-desc-film">
                                    <?php
                                    $thumb_trailer_final = 'http://116.206.196.146/'.$film->thumbnail_2;
                                    ?>
                                    <video id="my-video" class="video-js" controls controlsList="nodownload" preload="auto" width="293" height="182"
                                    poster="" data-setup="{}">
                                    <source src="<?php echo 'http://116.206.196.146/'.$film->behindthescene_path_hd?>" type='video/mp4'>
                                    </video>

                                    <!--<div style="width:100%;height:182px;background:url('<?php echo $thumb_trailer_final?>');background-size:auto 100%;background-position:top center;background-repeat:no-repeat;background-color:#000;">
                                        <div class="col-md-12 buy-film" style="mix-blend-mode: unset;">
                                            <div class="buy-button" title="Watch Full Film" style="margin-left: 35%;margin-top: 17%;">
                                                <a id="play-behind" href="#" data-toggle="modal" data-target="#popup-behind">
                                                    <i class="fa fa-play" style="padding-left:30px;color:#fff !important;"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>-->
                                </div>
                            </div>
                            <?php } ?>

                            <?php

                            $cek_shop = $this->db->select("*")->from("film_shop")->where("film_id",$film->id)->where("stock !=","Habis")->where("deleted_at is null",null,false)->get()->result();
                            if(!empty($cek_shop)){

                            ?>

                            <div class="col-md-4" style="padding-left: 0px;/*width:297px;*/">
                               <?php
                               $streaming = $this->db->select("*")->from("film_shop")->where("film_id",$film->id)->where("type","online streaming")->where("stock !=","Habis")->get()->result();
                               $dvd = $this->db->select("*")->from("film_shop")->where("film_id",$film->id)->where("type","dvd")->where("stock !=","Habis")->get()->result();
                               $vcd = $this->db->select("*")->from("film_shop")->where("film_id",$film->id)->where("type","vcd")->where("stock !=","Habis")->get()->result();

                               if(!empty($streaming)){
                                  $harga = $streaming[0]->price;
                               }elseif(!empty($dvd)){
                                  $harga = $dvd[0]->price;
                               }elseif(!empty($vcd)){
                                  $harga = $vcd[0]->price;
                               }

                               ?>

                               <span class="title-desc-film">See Film</span>
                               <div class="col-md-12 buy-film" style="cursor:pointer;" id="buy-button">
                                    <div class="img-film" style="background:url('<?php echo 'http://116.206.196.146/'.$film->cover?>');background-size:100% auto;width:128px;height:100%;">
                                        <div class="pull-right" style="background:url('<?php echo base_url()?>images/label-harga.png');background-size:100px;width:100%;height:100%;background-position:top right;background-repeat:no-repeat;font-weight:300;font-size:0.9em;">
                                           <span class="pull-right" style="-webkit-transform: rotate(47deg);-moz-transform: rotate(47deg);color:white;margin-top: 16%;width: 46%;text-align:center;">
                                                <?php echo number_format($harga,0)?>
                                           </span>
                                           <span class="buy-button" title="Add To Cart" style="float:left;margin-top: 10%;">
                                                <a id="play-pay" href="#" data-toggle="modal" data-target="#popup-pay">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </a>
                                           </span>
                                        </div>
                                    </div>
                               </div>
                            </div>

                            <?php }?>

                            <div class="col-md-2" style="padding-left: 0px;">
                            <?php if(sessionValue("id")<>""){ ?>
                                <?php if($status=="ordered"){ ?>
                                <span class="title-desc-film">Watch Film (<font style="color:green;font-weight:300;">Paid</font>)</span>
                                <div class="col-md-12 buy-film" style="background-image:url('<?php echo 'http://116.206.196.146/'.$film->cover?>');">
                                    <div class="buy-button" title="Watch Full Film">
                                        <a id="play-full" href="#" data-toggle="modal" data-target="#popup-full">
                                            <i class="fa fa-play" style="padding-left:25px;"></i>
                                        </a>
                                    </div>
                                </div>
                                <?php }else{ ?>
                                <!--<span class="title-desc-film">See Film</span>
                                <div class="col-md-12 buy-film" style="cursor:pointer;" id="buy-button">
                                    <div class="img-film" style="background:url('<?php echo 'http://116.206.196.146/'.$film->cover?>');background-size:100% auto;width:100%;height:182px;">
                                        <div class="pull-right" style="background:url('<?php echo base_url()?>images/label-harga.png');background-size:100px;width:100%;height:100%;background-position:top right;background-repeat:no-repeat;font-weight:200;font-size:0.9em;">
                                            <span class="pull-right" style="-webkit-transform: rotate(47deg);-moz-transform: rotate(47deg);color:white;margin-top: 16%;width: 46%;text-align:center;">
                                                <?php echo $harga?>
                                            </span>
                                            <span class="buy-button" title="Add To Cart" style="float:left;margin-top: 10%;">
                                                <a id="play-pay" href="#" data-toggle="modal" data-target="#popup-pay">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>-->
                                <?php } ?>
                            <?php }else{ ?>
                              <?php if($status=="ordered"){ ?>
                                <span class="title-desc-film">See Film</span>
                                <div class="col-md-12 buy-film" style="cursor:pointer;" id="buy-button">
                                    <div class="img-film" style="background:url('<?php echo 'http://116.206.196.146/'.$film->cover?>');background-size:100% auto;width:100%;height:182px;">
                                        <div class="pull-right" style="background:url('<?php echo base_url()?>images/label-harga.png');background-size:100px;width:100%;height:100%;background-position:top right;background-repeat:no-repeat;font-weight:200;font-size:0.9em;">
                                            <span class="pull-right" style="-webkit-transform: rotate(47deg);-moz-transform: rotate(47deg);color:white;margin-top: 16%;width: 46%;text-align:center;">
                                                <?php echo $harga?>
                                            </span>
                                            <span class="buy-button" title="Add To Cart" style="float:left;margin-top: 10%;">
                                                <a id="play-pay" href="#" data-toggle="modal" data-target="#popup-pay">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                              <?php }?>

                            <?php } ?>
                            </div>
                            <?php }else{ ?>
                            <div class="col-md-12" style="padding-left: 0px;">
                                <div class="col-md-12">
                                <span class="title-detail-film"><?php echo $film->title?></span>
                                <?php
                                if($film->harga_streaming==0){
                                    $thumb_trailer_final = 'http://116.206.196.146/'.$film->thumbnail_1;
                                    ?>
                                    <video id="my-video" class="video-js" controls controlsList="nodownload" preload="auto" width="650" height="350"
                                    poster="" data-setup="{}">
                                    <source src="<?php echo 'http://116.206.196.146/'.$film->full_path_hd?>" type='video/mp4'>
                                    </video>

                                    <!--<div class="col-md-12 buy-film" style="background-image:url('<?php echo 'http://116.206.196.146/'.$film->cover?>');background-size: auto 100%;height: 450px;">
                                        <div class="buy-button" title="Watch Full Film" style="margin-left: 47%;margin-top: 25%;">
                                            <a id="play-trailer" href="#" data-toggle="modal" data-target="#popup-trailer">
                                                <i class="fa fa-play" style="padding-left:25px;"></i>
                                            </a>
                                        </div>
                                    </div>-->
                                <?php }else{ ?>
                                <?php if(sessionValue("id")<>""){ ?>
                                <?php if($status=="ordered"){ ?>
                                    <?php
                                    $thumb_trailer_final = 'http://116.206.196.146/'.$film->thumbnail_1;
                                    ?>
                                    <div class="col-md-12 buy-film" style="background-image:url('<?php echo 'http://116.206.196.146/'.$film->cover?>');background-size: auto 100%;height: 450px;">
                                        <div class="buy-button" title="Watch Full Film" style="margin-left: 47%;margin-top: 25%;">
                                            <a id="play-full" href="#" data-toggle="modal" data-target="#popup-full">
                                                <i class="fa fa-play" style="padding-left:25px;"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <?php }else{ ?>
                                    <div class="col-md-12 buy-film" style="background-image:url('<?php echo 'http://116.206.196.146/'.$film->cover?>');background-size: auto 100%;height: 450px;">
                                        <div class="buy-button" title="Watch Full Film" style="margin-left: 47%;margin-top: 25%;">
                                            <a id="play-pay" href="#" data-toggle="modal" data-target="#popup-pay">
                                                <i class="fa fa-shopping-cart" style="padding-left:25px;"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <?php }else{ ?>
                                    <div class="col-md-12 buy-film" style="background-image:url('<?php echo 'http://116.206.196.146/'.$film->cover?>');background-size: auto 100%;height: 450px;">
                                        <div class="buy-button" title="Watch Full Film" style="margin-left: 47%;margin-top: 25%;">
                                            <a id="play-pay" href="#" data-toggle="modal" data-target="#popup-pay">
                                                <i class="fa fa-shopping-cart" style="padding-left:25px;"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <?php } ?>
                                <?php } ?>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <?php #if($film->category_id <> '6' and $film->category_id <> '8' and $film->category_id <> '10'){ ?>
                        <?php if($film->category_id == '2'){ ?>
                        <div class="col-md-8 detail-desc-film">
                            <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
                                <div class="col-md-4" style="padding-left: 0px;">
                                    <span class="title-label-film">Durasi</span><br>
                                    <span class="title-desc-film"><?php echo $film->durasi?> Menit</span>
                                </div>
                                <div class="col-md-4" style="padding-left: 0px;">
                                    <span class="title-label-film">Produser</span><br>
                                    <span class="title-desc-film">
                                    <?php
                                    $i = 1;
                                    $this->db->select('film_castcrew.*,profiles.nama');
                                    $this->db->from('film_castcrew');
                                    $this->db->join('profiles', 'profiles.id = film_castcrew.profile_id');
                                    $this->db->where('film_castcrew.film_id', $film_id);
                                    $this->db->where('film_castcrew.film_castcrew_position_id', '68');
                                    $this->db->where('film_castcrew.deleted_at',null);
                                    #$this->db->where('film_castcrew.position_name','Producer');
                                    $crew = $this->db->get();
                                    foreach ($crew->result() as $cast){
                                    ?>
                                    <a href="<?php echo site_url('profil/index/director/'.$cast->profile_id)?>"><?php echo $cast->nama?></a>
                                    <?php if($i < $crew->num_rows()){ echo ", "; }
                                    $i++;
                                    }
                                    ?>
                                    </span>
                                </div>
                                <div class="col-md-4" style="padding-left: 0px;">
                                  <span class="title-label-film">Perusahaan Film</span><br>
                                    <span class="title-desc-film">
                                    <?php
                                      $cek_company = $this->db->select("*")->from("film_castcrew")->where("film_id",$film->id)->where("film_castcrew_position_id","85")->where('deleted_at',null)->get()->result();
                                      $company = $this->db->select("*")->from("film_company_filmography")->where("film_id",$film->id)->where('deleted_at',null)->get()->result();
                                      if(!empty($company)){
                                        foreach ($company as $value) {
                                          $company_id = $this->db->select("*")->from("film_company")->where("id",$value->company_id)->get()->result();
                                          if(!empty($company_id)){
                                          ?>
                                          <a href="<?php echo site_url('profil/index/company/'.$company_id[0]->id)?>"><?php echo $company_id[0]->title?></a>,
                                          <?php
                                          }
                                        }

                                      }else if(!empty($cek_company)){

                                        $company_id = $this->db->select("*")->from("film_company")->where("id",$cek_company[0]->company_id)->get()->result();
                                        if(!empty($company_id)){
                                        ?>
                                        <a href="<?php echo site_url('profil/index/company/'.$cek_company[0]->company_id)?>"><?php echo $company_id[0]->title?></a>

                                      <?php
                                        }
                                      }else if(filter_var($film->company_id, FILTER_VALIDATE_INT) === false){
                                      $company_id = $this->db->select("*")->from("film_company")->like("title",$film->company_id)->get()->result();
                                      if(!empty($company_id)){
                                      ?>
                                      <a href="<?php echo site_url('profil/index/company/'.$company_id[0]->id)?>"><?php echo $film->company_id?></a>
                                      <?php
                                      }else{
                                      echo $film->company_id;
                                      }
                                    }else if(filter_var($film->company_id, FILTER_VALIDATE_INT) === true || $film->company_id != 0){
                                      $company_id = $this->db->select("*")->from("film_company")->where("id",$film->company_id)->get()->result();
                                      if(!empty($company_id)){
                                      ?>
                                      <a href="<?php echo site_url('profil/index/company/'.$company_id[0]->id)?>"><?php echo $company_id[0]->title?></a>
                                      <?php
                                      }
                                    }
                                    ?>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-12" style="padding-top: 10px;padding-bottom: 10px;padding-left: 0px;">
                                <div class="col-md-4" style="padding-left: 0px;">
                                    <span class="title-label-film">Genre</span><br>
                                    <span class="title-desc-film"><?php echo $genre?></span>
                                </div>
                                <div class="col-md-4" style="padding-left: 0px;">
                                    <span class="title-label-film">Sutradara</span><br>
                                    <span class="title-desc-film">
                                    <?php
                                    $i = 1;
                                    $this->db->select('film_castcrew.*,profiles.nama');
                                    $this->db->from('film_castcrew');
                                    $this->db->join('profiles', 'profiles.id = film_castcrew.profile_id');
                                    $this->db->where('film_castcrew.film_id', $film_id);
                                    $this->db->where('film_castcrew.film_castcrew_position_id', '69');
                                    $this->db->where('film_castcrew.deleted_at',null);
                                    #$this->db->where('film_castcrew.position_name','Director');
                                    $crew = $this->db->get();
                                    foreach ($crew->result() as $cast){
                                    ?>
                                    <a href="<?php echo site_url('profil/index/director/'.$cast->profile_id)?>"><?php echo $cast->nama?></a>
                                    <?php if($i < $crew->num_rows()){ echo ", "; }
                                    $i++;
                                    }
                                    ?>
                                    </span>
                                </div>
                                <div class="col-md-4" style="padding-left: 0px;">
                                    <span class="title-label-film">Situs Resmi</span><br>
                                    <span class="title-desc-film"><a href="<?php echo $film->situs_resmi?>" target="_blank"><?php echo $film->situs_resmi?></a></span>
                                </div>
                            </div>
                        </div>
                        <?php }else{ ?>
                        <div class="col-md-4 detail-desc-film" style="margin-top:0px;height:100%;padding-bottom:30px;">
                            <div class="col-md-12" style="padding-left: 0px;padding-bottom: 25px;display: none;">
                                <span class="title-label-film">Durasi</span><br>
                                <span class="title-desc-film"><?php echo $film->durasi?> Menit</span>
                            </div>
                            <div class="col-md-12" style="padding-left: 0px;padding-bottom: 25px;">
                                <span class="title-label-film">Producer</span><br>
                                <span class="title-desc-film">
                                <?php

                                  $i = 1;
                                  $this->db->select('film_castcrew.*,profiles.nama');
                                  $this->db->from('film_castcrew');
                                  $this->db->join('profiles', 'profiles.id = film_castcrew.profile_id');
                                  $this->db->where('film_castcrew.film_id', $film_id);
                                  $this->db->where('film_castcrew.film_castcrew_position_id', '68');
                                  $this->db->where('film_castcrew.deleted_at',null);
                                  #$this->db->where('film_castcrew.position_name','Producer');
                                  $crew = $this->db->get();


                                if(!empty($crew->result())){
                                  foreach ($crew->result() as $cast){
                                  ?>
                                  <a href="<?php echo site_url('profil/index/director/'.$cast->profile_id)?>"><?php echo $cast->nama?></a>
                                  <?php if($i < $crew->num_rows()){ echo ", "; }
                                  $i++;
                                  }
                                }else if(filter_var($film->producer_id, FILTER_VALIDATE_INT) === false){
                                  echo $film->producer_id;
                                }else if(filter_var($film->producer_id, FILTER_VALIDATE_INT) === true || $film->producer_id > 0){
                                  $this->db->where('id', trim($film->producer_id));
                                  $query_director = $this->db->get('film_producer');
                                  if($query_director->num_rows() > 0){
                                    foreach ($query_director->result() as $row_director){
                                      echo $row_director->title;
                                    }
                                  }else{
                                    $director_name = "";
                                  }
                                }
                                ?>
                                </span>
                            </div>
                            <div class="col-md-12" style="padding-left: 0px;padding-bottom: 25px;">
                                <span class="title-label-film">Perusahaan film</span><br>
                                <span class="title-desc-film">
                                <?php
                                $cek_company = $this->db->select("*")->from("film_castcrew")->where("film_id",$film->id)->where("film_castcrew_position_id","85")->where('deleted_at',null)->get()->result();
                                $company = $this->db->select("*")->from("film_company_filmography")->where("film_id",$film->id)->where('deleted_at',null)->get()->result();
                                if(!empty($cek_company)){

                                  $company_id = $this->db->select("*")->from("film_company")->where("id",$cek_company[0]->company_id)->get()->result();
                                  if(!empty($company_id)){
                                  ?>
                                  <a href="<?php echo site_url('profil/index/company/'.$cek_company[0]->company_id)?>"><?php echo $company_id[0]->title?></a>

                                <?php
                                    }
                                  }else if(!empty($company)){

                                      foreach ($company as $value) {
                                        $company_id = $this->db->select("*")->from("film_company")->where("id",$value->company_id)->get()->result();
                                        if(!empty($company_id)){
                                        ?>
                                        <a href="<?php echo site_url('profil/index/company/'.$company_id[0]->id)?>"><?php echo $company_id[0]->title?></a>,
                                        <?php
                                        }
                                      }

                                  }else if(filter_var($film->company_id, FILTER_VALIDATE_INT) === false){
                                  $company_id = $this->db->select("*")->from("film_company")->like("title",$film->company_id)->get()->result();
                                  if(!empty($company_id)){
                                  ?>
                                  <a href="<?php echo site_url('profil/index/company/'.$company_id[0]->id)?>"><?php echo $film->company_id?></a>
                                  <?php
                                  }else{
                                  echo $film->company_id;
                                  }
                                }else if(filter_var($film->company_id, FILTER_VALIDATE_INT) === true || $film->company_id != 0){
                                  $company_id = $this->db->select("*")->from("film_company")->where("id",$film->company_id)->get()->result();
                                  if(!empty($company_id)){
                                  ?>
                                  <a href="<?php echo site_url('profil/index/company/'.$company_id[0]->id)?>"><?php echo $company_id[0]->title?></a>
                                  <?php
                                  }
                                }/*else{
                                  $company = $this->db->select("*")->form("film_company_filmography")->where("film_id",$film->id)->get()->result();
                                  if(!empty($company)){
                                    $company_id = $this->db->select("*")->from("film_company")->where("id",$company[0]->company_id)->get()->result();
                                    if(!empty($company_id)){
                                    ?>
                                    <a href="<?php echo site_url('profil/index/company/'.$company_id[0]->id)?>"><?php echo $company_id[0]->title?></a>
                                    <?php
                                    }
                                  }
                                }*/
                                ?>
                                </span>
                            </div>
                            <div class="col-md-12" style="padding-left: 0px;padding-bottom: 25px;">
                                <span class="title-label-film">Genre</span><br>
                                <span class="title-desc-film"><?php echo $genre?></span>
                            </div>
                            <div class="col-md-12" style="padding-left: 0px;padding-bottom: 25px;">
                                <span class="title-label-film">Sutradara</span><br>
                                <span class="title-desc-film">
                                <?php
                                /*if(!empty($film->director_id)){
                                  echo $film->director_id;
                                }else{
                                $i = 1;
                                $this->db->select('film_castcrew.*,profiles.nama');
                                $this->db->from('film_castcrew');
                                $this->db->join('profiles', 'profiles.id = film_castcrew.profile_id');
                                $this->db->where('film_castcrew.film_id', $film_id);
                                $this->db->where('film_castcrew.film_castcrew_position_id', '69');
                                #$this->db->where('film_castcrew.position_name','Director');
                                $crew = $this->db->get();
                                foreach ($crew->result() as $cast){
                                ?>
                                <a href="<?php echo site_url('profil/index/director/'.$cast->profile_id)?>"><?php echo $cast->nama?></a>
                                <?php if($i < $crew->num_rows()){ echo ", "; }
                                $i++;
                                }
                              }*/
                                ?>

                                <?php

                                  $i = 1;
                                  $this->db->select('film_castcrew.*,profiles.nama');
                                  $this->db->from('film_castcrew');
                                  $this->db->join('profiles', 'profiles.id = film_castcrew.profile_id');
                                  $this->db->where('film_castcrew.film_id', $film_id);
                                  $this->db->where('film_castcrew.film_castcrew_position_id', '69');
                                  $this->db->where('film_castcrew.deleted_at',null);
                                  #$this->db->where('film_castcrew.position_name','Producer');
                                  $crew = $this->db->get();
                                if(!empty($crew->result())){
                                  foreach ($crew->result() as $cast){
                                  ?>
                                  <a href="<?php echo site_url('profil/index/director/'.$cast->profile_id)?>"><?php echo $cast->nama?></a>
                                  <?php if($i < $crew->num_rows()){ echo ", "; }
                                  $i++;
                                  }
                                }else if(filter_var($film->director_id, FILTER_VALIDATE_INT) === false){
                                  echo $film->director_id;
                                }else if(filter_var($film->director_id, FILTER_VALIDATE_INT) === true || $film->director_id > 0){
                                  $this->db->where('id', trim($film->director_id));
                                  $query_director = $this->db->get('film_director');
                                  if($query_director->num_rows() > 0){
                                    foreach ($query_director->result() as $row_director){
                                      echo $row_director->title;
                                    }
                                  }else{
                                    $director_name = "";
                                  }
                                }
                                ?>
                                </span>
                            </div>
                            <div class="col-md-12" style="padding-left: 0px;padding-bottom: 25px;">
                                <span class="title-label-film">Situs Resmi</span><br>
                                <span class="title-desc-film">
                                <a href="<?php echo $film->situs_resmi?>" target="_blank"><?php echo $film->situs_resmi?></a>
                                </span>
                            </div>
                        </div>
                        <?php } ?>

                        <?php #if($film->category_id <> '6' and $film->category_id <> '8' and $film->category_id <> '10'){ ?>
                        <?php if($film->category_id == '2'){ ?>
                        <div class="col-md-8 accordion-filminfo" style="padding-top: 8px;">
                        <?php }else{ ?>
                        <div class="col-md-12 accordion-filminfo" style="padding-top: 8px;">
                        <?php } ?>
                            <div id="accordion" class="accordion red">
                                <div class="accordion-item" id="accordion-item1">
                                    <div class="accordion-header" id="accordion-link1">
                                        INFORMASI DASAR
                                        <span class="accordion-item-arrow"></span>
                                    </div>
                                    <div class="accordion-content" id="accordion-content1">
                                      <?php if($film->category_id == '2'){ ?>

                                        <?php if(!empty($film->title_international)){?>
                                        <span class="title-film">Judul Internasional : </span><br>
                                        <span class="desc-film"><?php echo nl2br($film->title_international)?></span>
                                        <br><br>
                                        <?php }?>

                                        <?php if(!empty($film->briefsynopsis_ind)){?>
                                        <span class="title-film">Sinopsis Singkat: </span><br>
                                        <span class="desc-film"><?php echo nl2br($film->briefsynopsis_ind)?></span>
                                        <br><br>
                                        <?php }?>

                                        <?php if(!empty($film->fullsynopsis_ind)){?>
                                        <span class="title-film">Sinopsis Lengkap: </span><br>
                                        <span class="desc-film"><?php echo nl2br($film->fullsynopsis_ind)?></span>
                                        <br><br>
                                        <?php }?>

                                        <?php
                                        $negarafilm = "Indonesia";
                                        if($film->country<>''){ $negarafilm=$film->country; }
                                        ?>

                                        <?php if(!empty($film->released_date)){?>
                                        <span class="title-film">Negara & Tanggal Rilis: </span>
                                        <span class="desc-film"><?php echo $negarafilm.", ".tanggal_indo(date('Y-m-d', strtotime($film->released_date)))?></span>
                                        </br></br>
                                        <?php }?>

                                        <?php if(!empty($film->classification_film_id)){?>
                                        <span class="title-film">Klasifikasi: </span>
                                        <span class="desc-film"><?php
                                        $klf = $this->db->select("*")->from("classification_film")->where("id",$film->classification_film_id)->get()->result();
                                        if(!empty($klf)){
                                          echo $klf[0]->rating;
                                        }
                                        ?></span>
                                        </br></br>
                                        <?php }?>
                                      <?php }else{?>

                                        <?php if(!empty($film->title_international)){?>
                                        <span class="title-film">Judul Internasional : </span><br>
                                        <span class="desc-film"><?php echo nl2br($film->title_international)?></span>
                                        <br><br>
                                        <?php }?>

                                        <?php if(!empty($film->sort_detail)){?>
                                        <span class="title-film">Deskripsi: </span><br>
                                        <span class="desc-film"><?php echo nl2br($film->sort_detail)?></span>
                                        <br><br>
                                        <?php }?>
                                      <?php }?>

                                        <?php if(!empty($film->language)){?>
                                        <span class="title-film">Bahasa: </span>
                                        <span class="desc-film"><?php echo $film->language?></span>
                                        </br></br>
                                        <?php }?>

                                        <?php if(!empty($film->color)){?>
                                        <span class="title-film">Warna: </span>
                                        <span class="desc-film"><?php
                                        if($film->color == "col"){
                                          echo "Warna";
                                        }else{
                                          echo "Hitam Putih";
                                        }
                                        ?></span>
                                        </br></br>
                                        <?php }?>

                                        <?php if(!empty($film->status_film_id)){?>
                                        <span class="title-film">Status: </span>
                                        <span class="desc-film"><?php
                                        $status = $this->db->select("*")->from("status_film")->where("id",$film->status_film_id)->get()->result();
                                        if(!empty($status)){
                                          echo $status[0]->status_ind;
                                        }
                                        ?></span>
                                        <?php }?>

                                    </div>
                                </div>


                                <div class="accordion-item" id="accordion-item2">
                                    <div class="accordion-header" id="accordion-link2">
                                        CAST AND CREW
                                        <span class="accordion-item-arrow"></span>
                                    </div>
                                    <div class="accordion-content" id="accordion-content2">
                                        <div class="col-md-6">
                                            <span class="title-film">Produser: </span><br>
                                            <?php
                                            $i = 1;
                                            $this->db->select('film_castcrew.*,profiles.nama');
                                            $this->db->from('film_castcrew');
                                            $this->db->join('profiles', 'profiles.id = film_castcrew.profile_id');
                                            $this->db->where('film_castcrew.film_id', $film_id);
                                            $this->db->where('film_castcrew.film_castcrew_position_id', '68');
                                            $this->db->where('film_castcrew.deleted_at',null);
                                            #$this->db->where('film_castcrew.position_name','Producer');
                                            $this->db->order_by("profiles.nama","asc");
                                            $crew = $this->db->get();
                                            foreach ($crew->result() as $cast){
                                            ?>
                                            <span class="desc-film">
                                            <a href="<?php echo site_url('profil/index/director/'.$cast->profile_id)?>"><?php echo $cast->nama?></a>
                                            </span></br>
                                            <?php }?>
                                        </div>

                                        <div class="col-md-6">
                                            <span class="title-film">Produser Pendamping: </span><br>
                                            <?php
                                            $i = 1;
                                            $this->db->select('film_castcrew.*,profiles.nama');
                                            $this->db->from('film_castcrew');
                                            $this->db->join('profiles', 'profiles.id = film_castcrew.profile_id');
                                            $this->db->where('film_castcrew.film_id', $film_id);
                                            $this->db->where('film_castcrew.film_castcrew_position_id', '67');
                                            $this->db->where('film_castcrew.deleted_at',null);
                                            #$this->db->where('film_castcrew.position_name','Co-producer');
                                            $this->db->order_by("profiles.nama","asc");
                                            $crew = $this->db->get();
                                            foreach ($crew->result() as $cast){
                                            ?>
                                            <span class="desc-film">
                                            <a href="<?php echo site_url('profil/index/director/'.$cast->profile_id)?>"><?php echo $cast->nama?></a>
                                            </span></br>
                                            <?php }?>
                                        </div>

                                        <div class="col-md-12"></br></div>

                                        <div class="col-md-6">
                                            <span class="title-film">Sutradara: </span><br>
                                            <?php
                                            $this->db->select('film_castcrew.*,profiles.nama');
                                            $this->db->from('film_castcrew');
                                            $this->db->join('profiles', 'profiles.id = film_castcrew.profile_id');
                                            $this->db->where('film_castcrew.film_id', $film_id);
                                            $this->db->where('film_castcrew.film_castcrew_position_id', '69');
                                            $this->db->where('film_castcrew.deleted_at',null);
                                            #$this->db->where('film_castcrew.position_name','Director');
                                            $this->db->order_by("profiles.nama","asc");
                                            $crew = $this->db->get();
                                            foreach ($crew->result() as $cast){
                                            ?>
                                            <span class="desc-film">
                                                <a href="<?php echo site_url('profil/index/director/'.$cast->profile_id)?>">
                                                    <?php echo $cast->nama?>
                                                </a>
                                            </span><br>
                                            <?php
                                            }
                                            ?>
                                        </div>

                                        <div class="col-md-6">
                                            <span class="title-film">Sutradara Pendamping: </span><br>
                                            <?php
                                            $this->db->select('film_castcrew.*,profiles.nama');
                                            $this->db->from('film_castcrew');
                                            $this->db->join('profiles', 'profiles.id = film_castcrew.profile_id');
                                            $this->db->where('film_castcrew.film_id', $film_id);
                                            $this->db->where('film_castcrew.film_castcrew_position_id', '73');
                                            $this->db->where('film_castcrew.deleted_at',null);
                                            #$this->db->where('film_castcrew.position_name','Co-director');
                                            $this->db->order_by("profiles.nama","asc");
                                            $crew = $this->db->get();
                                            foreach ($crew->result() as $cast){
                                            ?>
                                            <span class="desc-film">
                                                <a href="<?php echo site_url('profil/index/director/'.$cast->profile_id)?>">
                                                    <?php echo $cast->nama?>
                                                </a>
                                            </span><br>
                                            <?php
                                            }
                                            ?>
                                        </div>

                                        <div class="col-md-12"></br></div>

                                        <div class="col-md-12">
                                            <span class="title-film">Penulis Naskah: </span><br>

                                            <?php
                                            $i = 1;
                                            $this->db->select('film_castcrew.*,profiles.nama');
                                            $this->db->from('film_castcrew');
                                            $this->db->join('profiles', 'profiles.id = film_castcrew.profile_id');
                                            $this->db->where('film_castcrew.film_id', $film_id);
                                            $this->db->where('film_castcrew.film_castcrew_position_id', '66');
                                            $this->db->where('film_castcrew.deleted_at',null);
                                            #$this->db->where('film_castcrew.position_name','Scriptwriter');
                                            $this->db->order_by("profiles.nama","asc");
                                            $crew = $this->db->get();
                                            foreach ($crew->result() as $cast){
                                            ?>
                                            <span class="desc-film">
                                            <a href="<?php echo site_url('profil/index/director/'.$cast->profile_id)?>"><?php echo $cast->nama?></a>
                                            </span></br>
                                            <?php }?>
                                        </div>

                                        <div class="col-md-12"><br></div>
                                        <div class="col-md-12">
                                            <span class="title-film">Pemain : </span><br>
                                        </div>
                                        <div class="col-md-12"><br></div>

                                        <div class="col-md-12">
                                            <span class="title-film">Pemain Utama: </span><br>
                                            <?php
                                            $this->db->select('film_castcrew.*,profiles.nama');
                                            $this->db->from('film_castcrew');
                                            $this->db->join('profiles', 'profiles.id = film_castcrew.profile_id');
                                            $this->db->where('film_castcrew.film_id', $film_id);
                                            $this->db->where('film_castcrew.film_castcrew_position_id', '1');
                                            $this->db->where('film_castcrew.deleted_at',null);
                                            #$this->db->where('film_castcrew.position_name','Main Cast');
                                            $this->db->order_by("profiles.nama","asc");
                                            $crew = $this->db->get();
                                            foreach ($crew->result() as $cast){
                                            ?>
                                            <span class="desc-film">
                                                <a href="<?php echo site_url('profil/index/director/'.$cast->profile_id)?>">
                                                <?php
                                                if($cast->charactername<>'' and $cast->charactername<>'0') {
                                                ?>
                                                <div class="col-md-6">
                                                    <?php echo $cast->nama;?>
                                                </div>
                                                <div class="col-md-6">
                                                    <?php echo "Sebagai ".$cast->charactername;?>
                                                </div>
                                                <?php
                                                }else{
                                                    echo $cast->nama;
                                                }
                                                ?>
                                                </a>
                                            </span><br>
                                            <?php
                                            }
                                            ?>
                                        </div>

                                        <div class="col-md-12"></br></div>

                                        <div class="col-md-12">
                                            <span class="title-film">Pemain Pembantu: </span><br>
                                            <?php
                                            $this->db->select('film_castcrew.*,profiles.nama');
                                            $this->db->from('film_castcrew');
                                            $this->db->join('profiles', 'profiles.id = film_castcrew.profile_id');
                                            $this->db->where('film_castcrew.film_id', $film_id);
                                            $this->db->where('film_castcrew.film_castcrew_position_id', '2');
                                            $this->db->where('film_castcrew.deleted_at',null);
                                            #$this->db->where('film_castcrew.position_name','Supporting Cast');
                                            $this->db->order_by("profiles.nama","asc");
                                            $crew = $this->db->get();
                                            foreach ($crew->result() as $cast){
                                            ?>
                                            <span class="desc-film">
                                                <a href="<?php echo site_url('profil/index/director/'.$cast->profile_id)?>">
                                                <?php
                                                if($cast->charactername<>'' and $cast->charactername<>'0') {
                                                ?>
                                                <div class="col-md-6">
                                                    <?php echo $cast->nama;?>
                                                </div>
                                                <div class="col-md-6">
                                                    <?php echo "Sebagai ".$cast->charactername;?>
                                                </div>
                                                <?php
                                                }else{
                                                    echo $cast->nama;
                                                }
                                                ?>
                                                </a>
                                            </span><br>
                                            <?php
                                            }
                                            ?>
                                        </div>

                                        <div class="col-md-12"></br></div>

                                        <div class="col-md-12">
                                            <span class="title-film">Pemain : </span><br>
                                            <?php
                                            $this->db->select('film_castcrew.*,profiles.nama');
                                            $this->db->from('film_castcrew');
                                            $this->db->join('profiles', 'profiles.id = film_castcrew.profile_id');
                                            $this->db->where('film_castcrew.film_id', $film_id);
                                            $this->db->where('film_castcrew.film_castcrew_position_id', '26');
                                            $this->db->where('film_castcrew.deleted_at',null);
                                            #$this->db->where('film_castcrew.position_name','Cast');
                                            $this->db->order_by("profiles.nama","asc");
                                            $crew = $this->db->get();
                                            foreach ($crew->result() as $cast){
                                            ?>
                                            <span class="desc-film">
                                                <a href="<?php echo site_url('profil/index/director/'.$cast->profile_id)?>">
                                                <?php
                                                if($cast->charactername<>'' and $cast->charactername<>'0') {
                                                ?>
                                                <div class="col-md-6">
                                                    <?php echo $cast->nama;?>
                                                </div>
                                                <div class="col-md-6">
                                                    <?php echo "Sebagai ".$cast->charactername;?>
                                                </div>
                                                <?php
                                                }else{
                                                    echo $cast->nama;
                                                }
                                                ?>
                                                </a>
                                            </span><br>
                                            <?php
                                            }
                                            ?>
                                        </div>

                                        <div class="col-md-12"><br></div>
                                        <div class="col-md-12">
                                            <span class="title-film">Crew: </span><br>
                                            <?php
                                            $this->db->select('film_castcrew.*,profiles.nama,film_group_crew.id as id_group,film_group_crew.title_ind,film_group_crew.title_eng,film_castcrew_position.title as position_name');
                                            $this->db->from('film_castcrew');
                                            $this->db->join('profiles', 'profiles.id = film_castcrew.profile_id');
                                            $this->db->join('film_group_crew', 'film_castcrew.film_group_crew_id = film_group_crew.id');
                                            $this->db->join('film_castcrew_position', 'film_castcrew_position.id = film_castcrew.film_castcrew_position_id');
                                            $this->db->where('film_castcrew.film_id', $film_id);
                                            $this->db->where('film_castcrew.film_group_crew_id !=', 0);
                                            $this->db->where('film_castcrew.deleted_at',null);
                                            $this->db->order_by("film_group_crew.id","asc");
                                            $this->db->order_by("film_castcrew.film_castcrew_position_id","asc");
                                            $crew = $this->db->get();
                                            $cek = "0";
                                            foreach ($crew->result() as $cast){
                                            ?>
                                            <?php
                                            if($cast->id_group != $cek){
                                            $cek = $cast->id_group;
                                            ?>
                                            <br>
                                            <span class="title-film"><?php echo $cast->title_ind?>: </span><br>
                                            <?php }?>
                                            <span class="desc-film">
                                                <div class="col-md-6">
                                                    <?php echo $cast->position_name?>
                                                </div>
                                                <div class="col-md-6">
                                                    <a href="<?php echo site_url('profil/index/director/'.$cast->profile_id)?>"><?php echo $cast->nama?></a>
                                                </div>
                                            </span><br>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            $this->db->select('film_castcrew.*,film_company.title,film_group_crew.id as id_group,film_group_crew.title_ind,film_group_crew.title_eng,film_castcrew_position.title as position_name');
                                            $this->db->from('film_castcrew');
                                            $this->db->join('film_company', 'film_company.id = film_castcrew.company_id');
                                            $this->db->join('film_group_crew', 'film_castcrew.film_group_crew_id = film_group_crew.id');
                                            $this->db->join('film_castcrew_position', 'film_castcrew_position.id = film_castcrew.film_castcrew_position_id');
                                            $this->db->where('film_castcrew.film_id', $film_id);
                                            $this->db->where('film_castcrew.film_group_crew_id !=', 0);
                                            $this->db->order_by("film_group_crew.id","asc");
                                            $crew = $this->db->get();
                                            $cek = "0";
                                            foreach ($crew->result() as $cast){
                                            ?>
                                            <?php
                                            if($cast->id_group != $cek){
                                            $cek = $cast->id_group;
                                            ?>
                                            <br>
                                            <span class="title-film"><?php echo $cast->title_ind?>: </span><br>
                                            <?php }?>
                                            <span class="desc-film">
                                                <div class="col-md-6">
                                                    <?php echo $cast->position_name?>
                                                </div>
                                                <div class="col-md-6">
                                                    <a href="<?php echo site_url('profil/index/company/'.$cast->company_id)?>"><?php echo $cast->title?></a>
                                                </div>
                                            </span><br>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="accordion-item" id="accordion-item3">
                                    <div class="accordion-header" id="accordion-link3">
                                        MATERI DAN PROMOSI
                                        <span class="accordion-item-arrow"></span>
                                    </div>
                                    <div class="accordion-content" id="accordion-content3">
                                        <span class="title-film">Galeri Foto: </span><br>
                                        <span class="desc-film">
                                            <?php if($film->cover<>''){ ?>
                                            <a href="<?php echo 'http://116.206.196.146/'.$film->cover?>" rel="prettyPhoto[gallery_name]" style="text-decoration: none;">
                                                <img src="<?php echo 'http://116.206.196.146/'.$film->cover?>" height="100" style="padding-bottom:4px;" />
                                            </a>
                                            <?php } ?>
                                            <?php

                                            $gallery = $this->db->select('*')->from('film_gallery')->where('film_id',$film->id)->where('deleted_at',null)->get()->result();

                                            foreach ($gallery as $key => $row) {
                                              if (strpos($row->ori_image, 'filmdata') !== false) {
                                                $ori_image = $row->ori_image;
                                              }else if(strpos($row->ori_image, 'uploads') !== false){
                                                $ori_image = $row->ori_image;
                                              }else{
                                                $ori_image = "uploads/".$row->ori_image;
                                              }
                                            ?>
                                              <a href="<?php echo 'http://116.206.196.146/'.$ori_image?>" rel="prettyPhoto[gallery_name]" style="text-decoration: none;">
                                                  <img src="<?php echo 'http://116.206.196.146/'.$ori_image?>" height="100" style="padding-bottom:4px;" />
                                              </a>
                                            <?php
                                            }?>

                                        <br><br>
                                        <span class="title-film">Trailer Film: </span><br>
                                        <span class="desc-film">

                                            <?php $trailer = $this->db->select("*")->from("film_list")->where("category_id","10")->where("id_full_film",$film->id)->get()->result();

                                            foreach ($trailer as $row) {
                                            ?>
                                              <a href="<?php echo 'http://116.206.196.146/'.$row->full_path_hd.'?iframe=true'?>" rel="prettyPhoto[gallery_name]" style="text-decoration: none;">
                                                  <img src="<?php echo 'http://116.206.196.146/'.$row->cover?>" height="100" style="padding-bottom:4px;" />
                                              </a>
                                            <?php
                                            }

                                            ?>
                                            <!--
                                            <?php if($film->thumbnail_1<>''){ ?>
                                            <a href="<?php echo 'http://116.206.196.146/'.$film->thumbnail_1?>" rel="prettyPhoto[gallery_name]" style="text-decoration: none;">
                                                <img src="<?php echo 'http://116.206.196.146/'.$film->thumbnail_1?>" height="100" style="padding-bottom:4px;" />
                                            </a>
                                            <?php } ?>
                                            <?php if($film->thumbnail_2<>''){ ?>
                                            <a href="<?php echo 'http://116.206.196.146/'.$film->thumbnail_2?>" rel="prettyPhoto[gallery_name]" style="text-decoration: none;">
                                                <img src="<?php echo 'http://116.206.196.146/'.$film->thumbnail_2?>" height="100" style="padding-bottom:4px;" />
                                            </a>
                                            <?php } ?>
                                            <?php if($film->thumbnail_3<>''){ ?>
                                            <a href="<?php echo 'http://116.206.196.146/'.$film->thumbnail_3?>" rel="prettyPhoto[gallery_name]" style="text-decoration: none;">
                                                <img src="<?php echo 'http://116.206.196.146/'.$film->thumbnail_3?>" height="100" style="padding-bottom:4px;" />
                                            </a>
                                            <?php } ?>
                                            <?php if($film->thumbnail_4<>''){ ?>
                                            <a href="<?php echo 'http://116.206.196.146/'.$film->thumbnail_4?>" rel="prettyPhoto[gallery_name]" style="text-decoration: none;">
                                                <img src="<?php echo 'http://116.206.196.146/'.$film->thumbnail_4?>" height="100" style="padding-bottom:4px;" />
                                            </a>
                                            <?php } ?>
                                            <?php if($film->thumbnail_5<>''){ ?>
                                            <a href="<?php echo 'http://116.206.196.146/'.$film->thumbnail_5?>" rel="prettyPhoto[gallery_name]" style="text-decoration: none;">
                                                <img src="<?php echo 'http://116.206.196.146/'.$film->thumbnail_5?>" height="100" style="padding-bottom:4px;" />
                                            </a>
                                            <?php } ?>
                                            -->
                                        </span><br><br>
                                        <span class="title-film">Press Kit: </span><br>
                                        <?php
                                        $this->db->select('*');
                                        $this->db->from('film_presskit');
                                        $this->db->where('film_id', $film_id);
                                        $press = $this->db->get();
                                        if($press->num_rows() == 0){
                                            echo '<div class="col-md-12">Belum ada data</div>';
                                        }
                                        $no=0;
                                        foreach ($press->result() as $presskit){
                                        $no++;
                                        ?>
                                        <div class="col-md-1"><?php echo $no?>.</div>
                                        <div class="col-md-11">
                                            <a href="<?php echo 'http://116.206.196.146/'.$presskit->path?>" target="_blank"><?php echo $presskit->file?></a>
                                        </div>
                                        <?php } ?>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="accordion-item" id="accordion-item4">
                                    <div class="accordion-header" id="accordion-link4">
                                        FESTIVAL & PENGHARGAAN
                                        <span class="accordion-item-arrow"></span>
                                    </div>

                                    <div class="accordion-content" id="accordion-content4">
                                        <span class="title-film" style="font-size: unset;">
                                            <div class="col-md-2">Festival</div>
                                            <div class="col-md-3">Lokasi</div>
                                            <div class="col-md-1">Tahun</div>
                                            <div class="col-md-2">Penghargaan</div>
                                            <div class="col-md-2">Penerima</div>
                                            <div class="col-md-2">Hasil</div>
                                        </span>
                                        <span class="desc-film" style="font-size: unset;">

                                            <?php
                                            $this->db->select('film_award.*,profiles.nama as nama_profile');
                                            $this->db->from('film_award');
                                            $this->db->join('profiles','film_award.profiles_id = profiles.id');
                                            $this->db->where('film_id', $film_id);
                                            $awards = $this->db->get();
                                            if($awards->num_rows() == 0){
                                                echo '<div class="col-md-12">Belum ada data</div>';
                                            }
                                            $no = 0;
                                            foreach ($awards->result() as $award){

                                            if($no == 2){
                                              $no =0;
                                            }
                                            $no++;
                                            ?>

                                            <?php if($no == 2){?>
                                            <div class="row" style="border-bottom: 1px solid #f3f3f3;background: #f3f3f3;">
                                            <?php }else{?>
                                            <div class="row" style="border-bottom: 1px solid #f3f3f3;">
                                            <?php }?>

                                            <?php
                                            $d_loc = explode("|", $award->location);
                                            ?>

                                            <div class="col-md-2"><?php echo $award->festival?></div>
                                            <div class="col-md-3"><?php if(count($d_loc) > 1){echo $d_loc[1];}else{echo $d_loc[0];}?></div>
                                            <div class="col-md-1"><?php echo $award->year?></div>
                                            <div class="col-md-2"><?php echo $award->award?></div>
                                            <div class="col-md-2"><?php echo $award->nama_profile?></div>
                                            <div class="col-md-2"><?php echo $award->result?></div>

                                            </div>
                                            <?php } ?>
                                            <div class="clearfix"></div>
                                        </span>
                                    </div>
                                </div>
                                <div class="accordion-item" id="accordion-item5">
                                    <div class="accordion-header" id="accordion-link5">
                                        ULASAN
                                        <span class="accordion-item-arrow"></span>
                                    </div>
                                    <div class="accordion-content" id="accordion-content5">
                                        <?php
                                        $this->db->select('*');
                                        $this->db->from('film_review');
                                        $this->db->where('film_id', $film_id);
                                        $reviews = $this->db->get();
                                        if($reviews->num_rows() == 0){
                                            echo '<span class="desc-film">Belum ada data</span>';
                                        }
                                        foreach ($reviews->result() as $review){
                                        ?>
                                        <span class="desc-film">
                                            <a href="<?php echo $review->review?>" target="_blank"><?php echo $review->review?></a>
                                        </span>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="accordion-item" id="accordion-item6">
                                    <div class="accordion-header" id="accordion-link6">
                                        TRIVIA
                                        <span class="accordion-item-arrow"></span>
                                    </div>
                                    <div class="accordion-content" id="accordion-content6">
                                        <?php
                                        $this->db->select('*');
                                        $this->db->from('film_trivia');
                                        $this->db->where('film_id', $film_id);
                                        $this->db->where('deleted_at is null', null, false);
                                        $trivias = $this->db->get();
                                        if($trivias->num_rows() == 0){
                                            echo '<span class="desc-film">Belum ada data</span>';
                                        }
                                        foreach ($trivias->result() as $trivia){
                                        ?>
                                        <span class="desc-film">
                                          <div class="col-md-3">
                                            <b><?php echo $trivia->category?></b>
                                          </div>

                                          <div class="col-md-9">
                                            <?php echo $trivia->trivia?>
                                          </div>
                                        </span><br>
                                        <?php } ?>
                                    </div>
                                </div>
                                   <?php if(!empty($film->source)){?>
                                       <div style="font-weight:100;float:right">
                                            Sumber dari : <a href="<?php echo $film->link_source?>" target="_blank" style="color:blue"><?php echo $film->source?></a>
                                       </div>
                                   <?php }?>
                            </div>
                        </div>

                    <!--end of row-->
                    </div>
                </div>
            </section>

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
                            <p class="text-white" style="line-height: 20px;padding-right:30px;text-align:justify;"><?php
                            $des_footer = $this->db->where("param","deskripsi_footer")->get("settings")->result();
                            echo $des_footer[0]->value;
                            ?></p>

                            <span>Powered by</span>
                            <img src="<?php echo base_url()?>img/biznet.png" style="max-height: 60px;">
                        </div>
                        <div class="col-md-3">
                            <h4 class="text-white">Follow Us</h4>
                            <table width="100%">
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
                            <style type="text/css">
                              .back-youtube{
                                  background-color: red;
                              }
                            </style>
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

        </div>

        <!-- PopOver -->
        <div id="my-popover-container" style="display: none;width:200px;">
            <div>
                <span>Harga Streaming</span>
                <button type="button" class="butt butt-primary sharp" id="pop-harga-streaming" onclick="buyfilm('login','streaming')">Rp. 15.000,-</button>
            </div>
            <div>
                <span>Harga DVD</span>
                <button type="button" class="butt butt-primary sharp" id="pop-harga-dvd" onclick="buyfilm('login','dvd')">Rp. 15.000,-</button>
            </div>
            <div>
                <span>Harga VCD</span>
                <button type="button" class="butt butt-primary sharp" id="pop-harga-vcd" onclick="buyfilm('login','vcd')">Rp. 15.000,-</button>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="popup-trailer" role="dialog" style="width:700px;top:7%;left:27%;">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="title-popup-trailer">Trailer</h4>
                    </div>
                    <div class="modal-body">
                        <?php
                        if($film->trailer_path_hd <> ''){
                          $thumb_trailer_final = $film->cover;
                          $trailer_final = 'http://116.206.196.146/'.$film->trailer_path_hd;
                        ?>

                        <video id="trailer-video" class="video-js" controls controlsList="nodownload" preload="auto" width="597" height="420"
                        poster="<?php echo 'http://116.206.196.146/'.$thumb_trailer_final?>" data-setup="{}">
                        <source id="trailer-source" src="<?php echo $trailer_final?>" type='video/mp4'>
                        <p class="vjs-no-js">
                            To view this video please enable JavaScript, and consider upgrading to a web browser that
                            <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                        </p>
                        </video>
                        <?php }else if(!empty($thumbnail)){
                          $thumb_trailer_final = 'http://116.206.196.146/'.$thumbnail[0]->cover;
                          $trailer_final = 'http://116.206.196.146/'.$thumbnail[0]->full_path_hd;
                        ?>

                        <video id="trailer-video" class="video-js" controls controlsList="nodownload" preload="auto" width="597" height="420"
                        poster="<?php echo 'http://116.206.196.146/'.$thumb_trailer_final?>" data-setup="{}">
                        <source id="trailer-source" src="<?php echo $trailer_final?>" type='video/mp4'>
                        <p class="vjs-no-js">
                            To view this video please enable JavaScript, and consider upgrading to a web browser that
                            <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                        </p>
                        </video>

                        <?php }else{ ?>
                        <div style="width:597px;height:420px;background-color:white;color:#FC6363;text-align:center;padding-top: 30%;font-size:18px;font-weight:300;">
                            Video belum tersedia
                        </div>
                        <?php } ?>
                    </div>
                    <div class="modal-footer">
                        <div class="col-md-6" style="text-align:left !important;">
                            <button type="button" id="btn-trailer-high" class="butt butt-primary sharp active" style="font-size:12px !important;height:30px;width:100px;margin-bottom:2px;">High Quality</button>
                            <button type="button" id="btn-trailer-low" class="butt butt-primary sharp" style="font-size:12px !important;height:30px;width:100px;margin-bottom:2px;">Low Quality</button>
                        </div>
                        <div class="col-md-6">
                            <button id="stop-button" type="button" class="butt butt-primary sharp" data-dismiss="modal" style="font-size:12px !important;height:30px;width:100px;margin-bottom:2px;">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="popup-behind" role="dialog" style="width:700px;top:7%;left:27%;">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="title-popup-behind">Behind The Scene</h4>
                    </div>
                    <div class="modal-body">
                        <?php if($film->behindthescene_path_hd <> ''){ ?>
                        <video id="behind-video" class="video-js" controls controlsList="nodownload" preload="auto" width="597" height="420"
                        poster="<?php echo 'http://116.206.196.146/'.$film->thumbnail_2?>" data-setup="{}">
                        <source id="behind-source" src="<?php echo 'http://116.206.196.146/'.$film->behindthescene_path_hd?>" type='video/mp4'>
                        <p class="vjs-no-js">
                            To view this video please enable JavaScript, and consider upgrading to a web browser that
                            <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                        </p>
                        </video>
                        <?php }else{ ?>
                        <div style="width:597px;height:420px;background-color:white;color:#FC6363;text-align:center;padding-top: 30%;font-size:18px;font-weight:300;">
                            Video belum tersedia
                        </div>
                        <?php } ?>
                    </div>
                    <div class="modal-footer">
                        <div class="col-md-6" style="text-align:left !important;">
                            <button type="button" id="btn-behind-high" class="butt butt-primary sharp active" style="font-size:12px !important;height:30px;width:100px;margin-bottom:2px;">High Quality</button>
                            <button type="button" id="btn-behind-low" class="butt butt-primary sharp" style="font-size:12px !important;height:30px;width:100px;margin-bottom:2px;">Low Quality</button>
                        </div>
                        <div class="col-md-6">
                            <button id="stop-button" type="button" class="butt butt-primary sharp" data-dismiss="modal" style="font-size:12px !important;height:30px;width:100px;margin-bottom:2px;">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="popup-full" role="dialog" style="width:700px;top:7%;left:27%;">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="title-popup-full"><?php echo $film->title.$full_subtitle?></h4>
                    </div>
                    <div class="modal-body">
                        <?php if($full_video <> ''){ ?>
                        <video id="trailer-video" class="video-js" controls controlsList="nodownload" preload="auto" width="597" height="420"
                        poster="<?php echo 'http://116.206.196.146/'.$film->thumbnail_1?>" data-setup="{}">
                        <source id="trailer-source" src="<?php echo 'http://116.206.196.146/'.$full_video?>" type='video/mp4'>
                        <p class="vjs-no-js">
                            To view this video please enable JavaScript, and consider upgrading to a web browser that
                            <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                        </p>
                        </video>
                        <?php }else{ ?>
                        <div style="width:597px;height:420px;background-color:white;color:#FC6363;text-align:center;padding-top: 30%;font-size:18px;font-weight:300;">
                            Video belum tersedia
                        </div>
                        <?php } ?>
                    </div>
                    <div class="modal-footer">
                        <button id="stop-button" type="button" class="butt butt-primary sharp" data-dismiss="modal" style="font-size:12px !important;height:30px;width:100px;margin-bottom:2px;">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="popup-pay" role="dialog" style="width:1000px;top:20%;left:15%;">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content" style="width:120%;">
                    <div class="modal-header">
                        <h4 class="modal-title" id="title-popup-full">See Film</h4>
                    </div>
                    <div class="modal-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Type</th>
                                <th>Sub Ind</th>
                                <th>Sub Eng</th>
                                <th>Special</th>
                                <th>Price</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody style="font-weight:300;">
                            <?php
                            $this->db->select('*');
                            $this->db->from('film_shop');
                            $this->db->where('film_id', $film_id);
                            $this->db->where('status', 'Active');
                            $this->db->where('stock !=', 'Habis');
                            $shops = $this->db->get();
                            foreach ($shops->result() as $shop){
                                if($user_id<>""){
                                    $statbuy = "login";
                                }else{
                                    $statbuy = "nologin";
                                }

                                if($shop->type=="online streaming"){
                                    $typebuy = "streaming";
                                }else{
                                    $typebuy = $shop->type;
                                }
                            ?>
                            <tr>
                                <td><?php echo $typebuy?></td>
                                <td><?php echo $shop->subtitle?></td>
                                <td><?php echo $shop->subtitle_eng?></td>
                                <td><?php echo $shop->special_feature?></td>
                                <td><?php echo $shop->curency." ".$shop->price?></td>
                                <td>
                                    <button onclick="buyfilm('<?php echo $statbuy?>','<?php echo $typebuy?>')" type="button" class="butt butt-primary sharp" style="font-size:12px !important;height:30px;width:100px;margin-bottom:2px;">Buy</button>
                                </td>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button id="stop-button" type="button" class="butt butt-primary sharp" data-dismiss="modal" style="font-size:12px !important;height:30px;width:100px;margin-bottom:2px;">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="<?php echo base_url()?>js/jquery-2.1.4.min.js"></script>
        <script src="<?php echo base_url()?>js/isotope.min.js"></script>
        <script src="<?php echo base_url()?>js/ytplayer.min.js"></script>
        <script src="<?php echo base_url()?>js/owl.carousel.min.js"></script>
        <script src="<?php echo base_url()?>js/lightbox.min.js"></script>
        <script src="<?php echo base_url()?>js/twitterfetcher.min.js"></script>
        <script src="<?php echo base_url()?>js/smooth-scroll.min.js"></script>
        <script src="<?php echo base_url()?>js/scrollreveal.min.js"></script>
        <script src="<?php echo base_url()?>js/parallax.js"></script>
        <script src="<?php echo base_url()?>js/scripts.js"></script>
        <script src="<?php echo base_url()?>js/bootstrap.min.js"></script>
        <script src="<?php echo base_url()?>js/lightslider.min.js"></script>
        <script src="<?php echo base_url()?>js/accordion.js"></script>
        <script src="<?php echo base_url()?>js/wow.min.js"></script>
        <script src="<?php echo base_url()?>plugins/html5lightbox/html5lightbox.js"></script>
        <link href="<?php echo base_url()?>css/prettyPhoto.css" type="text/css" media="screen" charset="utf-8" rel="stylesheet" />
		<script src="<?php echo base_url()?>js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>


        <script type="text/javascript">
        /*$(document).ready(function(){
          $("#accordion-link4").click(function() {
            $('html, body').animate({
                  scrollTop: $("#accordion").offset().top
              },1000);
          });
        });*/
        </script>

        <script type="text/javascript">

        $("#accordion-content1").show();

        function buyfilm(status,type){
        //console.log(status);
        if(status=="nologin"){
            alert('Silahkan Login terlebih dahulu untuk membeli film.');
        }else{
            $.ajax({
            type : 'POST',
            url : '<?php echo site_url('detail/addtocart')?>',
            data : {
                filmid : '<?php echo $film_id?>',
                userid : '<?php echo $user_id?>',
                type : type
            },
            success:function(data){
                var tmp = eval('('+data+')');
                if (tmp.success){
                $(".fa-shopping-cart").attr( "data-badge", tmp.total );
                alert('Film sudah dimasukkan ke keranjang belanja anda, silahkan cek keranjang belanja dan lakukan pembayaran.');
                }else{
                alert("Gagal memasukkan ke keranjang belanja.");
                }
            }
            });
        }
        }

        function watchfilm(id){
            var width = $("#watchfullfilm").width();
            $.ajax({
                type : 'POST',
                url : '<?php echo site_url('detail/watchfilm')?>',
                data : {
                filmid : id,
                width : width
                },
                success:function(data){
                $("#watchfullfilm").html(data);
                $("#watchfullfilm").toggle();
                }
            });
        }

        $( window ).resize(function() {
            <?php //if($film->category_id <> '2'){ ?>
            // var videowidth = $('.desc-filminfo-nav').width();
            // $('.video-js').width(videowidth-25);
            <?php //} ?>

            var width = $(window).width();
            if(width <= 1280){
                $('#behindthescene').css("width","300");
            }else{
                $('#behindthescene').css("width","390");
            }
        });

        $(document).ready(function(){
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

            <?php //if($film->category_id <> '2'){ ?>
            // var videowidth = $('.desc-filminfo-nav').width();
            // $('.video-js').width(videowidth-25);
            <?php //} ?>

            var width = $(window).width();
            if(width <= 1280){
            $('#behindthescene').css("width","300");
            }else{
            $('#behindthescene').css("width","390");
            }

            // POPUP VIDEO
            $( "#play-trailer" ).click(function() {
                var myPlayer = videojs("trailer-video");
                myPlayer.load();
                myPlayer.play();
            });
            $( "#play-behind" ).click(function() {
                var myPlayer = videojs("behind-video");
                myPlayer.load();
                myPlayer.play();
            });
            $( "#stop-button" ).click(function() {
                <?php if($film->behindthescene_path_hd <> ''){ ?>
                var myPlayer1 = videojs("behind-video");
                myPlayer1.pause();
                <?php } ?>
                <?php if($film->full_path_hd <> ''){ ?>
                var myPlayer2 = videojs("trailer-video");
                myPlayer2.pause();
                <?php } ?>
            });
            $( "#btn-trailer-high" ).click(function() {

                <?php
                if(!empty($thumbnail)){
                  $trailer_final = 'http://116.206.196.146/'.$thumbnail[0]->full_path_hd;
                ?>

                  var video = videojs('trailer-video');
                  var source = document.getElementById('trailer-source');
                  video.pause();
                  source.setAttribute('src', '<?php echo $trailer_final?>');
                  video.load();
                  $(this).addClass( "active" );
                  $("#btn-trailer-low").removeClass( "active" );

                <?php }else if($film->full_path_hd<>''){ ?>

                  var video = videojs('trailer-video');
                  var source = document.getElementById('trailer-source');
                  video.pause();
                  source.setAttribute('src', '<?php echo 'http://116.206.196.146/'.$film->full_path_hd?>');
                  video.load();
                  $(this).addClass( "active" );
                  $("#btn-trailer-low").removeClass( "active" );

                <?php }else{ ?>

                  alert('Video belum tersedia');

                <?php } ?>
            });
            $( "#btn-trailer-low" ).click(function() {
                <?php
                if(!empty($thumbnail)){
                  $trailer_final = 'http://116.206.196.146/'.$thumbnail[0]->full_path_low;
                ?>

                  var video = videojs('trailer-video');
                  var source = document.getElementById('trailer-source');
                  video.pause();
                  source.setAttribute('src', "<?php echo $trailer_final?>");
                  video.load();
                  $(this).addClass( "active" );
                  $("#btn-trailer-low").removeClass( "active" );

                <?php }else if($film->full_path_low<>''){ ?>

                  var video = videojs('trailer-video');
                  var source = document.getElementById('trailer-source');
                  video.pause();
                  source.setAttribute('src', '<?php echo 'http://116.206.196.146/'.$film->full_path_low?>');
                  video.load();
                  $(this).addClass( "active" );
                  $("#btn-trailer-high").removeClass( "active" );

                <?php }else{ ?>

                  alert('Video belum tersedia');

                <?php } ?>
            });
            $( "#btn-behind-high" ).click(function() {
                <?php if($film->behindthescene_path_hd<>''){ ?>
                var video = videojs('behind-video');
                var source = document.getElementById('behind-source');
                video.pause();
                source.setAttribute('src', "<?php echo 'http://116.206.196.146/'.$film->behindthescene_path_hd?>");
                video.load();
                $(this).addClass( "active" );
                $("#btn-behind-low").removeClass( "active" );
                <?php }else{ ?>
                alert('Video belum tersedia');
                <?php } ?>
            });
            $( "#btn-behind-low" ).click(function() {
                <?php if($film->behindthescene_path_low<>''){ ?>
                var video = videojs('behind-video');
                var source = document.getElementById('behind-source');
                video.pause();
                source.setAttribute('src', "<?php echo 'http://116.206.196.146/'.$film->behindthescene_path_low?>");
                video.load();
                $(this).addClass( "active" );
                $("#btn-behind-high").removeClass( "active" );
                <?php }else{ ?>
                alert('Video belum tersedia');
                <?php } ?>
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

            //$("a[rel^='prettyPhoto']").prettyPhoto({social_tools:''});
            $(document).ready(function () {
                $("a[rel^='prettyPhoto']").prettyPhoto({
                    social_tools:'',
                    theme: 'facebook',
                    slideshow: 5000,
                    autoplay_slideshow: false
                });
            });

            $("#accordion-content1").show();
            $("#accordion-item1").addClass('active');
            $("#accordion-content2").hide();
            $("#accordion-content3").hide();
            $("#accordion-content4").hide();
            $("#accordion-content5").hide();
            $("#accordion-content6").hide();

            $("#accordion-link1").click(function() {
                $("#accordion-content1").toggle(650);
                if ($('#accordion-item1').hasClass('active')) {
                    $("#accordion-item1").removeClass('active');
                }else{
                    $("#accordion-item1").addClass('active');
                }

                $("#accordion-content2").hide(650);
                $("#accordion-content3").hide(650);
                $("#accordion-content4").hide(650);
                $("#accordion-content5").hide(650);
                $("#accordion-content6").hide(650);

                $("#accordion-item2").removeClass('active');
                $("#accordion-item3").removeClass('active');
                $("#accordion-item4").removeClass('active');
                $("#accordion-item5").removeClass('active');
                $("#accordion-item6").removeClass('active');

                $('html, body').animate({
                  scrollTop: $("#accordion").offset().top
              },1000);

            });
            $("#accordion-link2").click(function() {
                $("#accordion-content2").toggle(650);
                if ($('#accordion-item2').hasClass('active')) {
                    $("#accordion-item2").removeClass('active');
                }else{
                    $("#accordion-item2").addClass('active');
                }

                $("#accordion-content1").hide(650);
                $("#accordion-content3").hide(650);
                $("#accordion-content4").hide(650);
                $("#accordion-content5").hide(650);
                $("#accordion-content6").hide(650);

                $("#accordion-item1").removeClass('active');
                $("#accordion-item3").removeClass('active');
                $("#accordion-item4").removeClass('active');
                $("#accordion-item5").removeClass('active');
                $("#accordion-item6").removeClass('active');

                $('html, body').animate({
                  scrollTop: $("#accordion").offset().top
              },1000);

            });
            $("#accordion-link3").click(function() {
                $("#accordion-content3").toggle(650);
                if ($('#accordion-item3').hasClass('active')) {
                    $("#accordion-item3").removeClass('active');
                }else{
                    $("#accordion-item3").addClass('active');
                }

                $("#accordion-content1").hide(650);
                $("#accordion-content2").hide(650);
                $("#accordion-content4").hide(650);
                $("#accordion-content5").hide(650);
                $("#accordion-content6").hide(650);

                $("#accordion-item1").removeClass('active');
                $("#accordion-item2").removeClass('active');
                $("#accordion-item4").removeClass('active');
                $("#accordion-item5").removeClass('active');
                $("#accordion-item6").removeClass('active');

                $('html, body').animate({
                  scrollTop: $("#accordion").offset().top
              },1000);

            });
            $("#accordion-link4").click(function() {
                $("#accordion-content4").toggle(650);
                if ($('#accordion-item4').hasClass('active')) {
                    $("#accordion-item4").removeClass('active');
                }else{
                    $("#accordion-item4").addClass('active');
                }

                $("#accordion-content1").hide(650);
                $("#accordion-content2").hide(650);
                $("#accordion-content3").hide(650);
                $("#accordion-content5").hide(650);
                $("#accordion-content6").hide(650);

                $("#accordion-item1").removeClass('active');
                $("#accordion-item2").removeClass('active');
                $("#accordion-item3").removeClass('active');
                $("#accordion-item5").removeClass('active');
                $("#accordion-item6").removeClass('active');

                $('html, body').animate({
                  scrollTop: $("#accordion").offset().top
              },1000);

            });
            $("#accordion-link5").click(function() {
                $("#accordion-content5").toggle(650);
                if ($('#accordion-item5').hasClass('active')) {
                    $("#accordion-item5").removeClass('active');
                }else{
                    $("#accordion-item5").addClass('active');
                }

                $("#accordion-content1").hide(650);
                $("#accordion-content2").hide(650);
                $("#accordion-content3").hide(650);
                $("#accordion-content4").hide(650);
                $("#accordion-content6").hide(650);

                $("#accordion-item1").removeClass('active');
                $("#accordion-item2").removeClass('active');
                $("#accordion-item3").removeClass('active');
                $("#accordion-item4").removeClass('active');
                $("#accordion-item6").removeClass('active');

                $('html, body').animate({
                  scrollTop: $("#accordion").offset().top
              },1000);

            });
            $("#accordion-link6").click(function() {
                $("#accordion-content6").toggle(650);
                if ($('#accordion-item6').hasClass('active')) {
                    $("#accordion-item6").removeClass('active');
                }else{
                    $("#accordion-item6").addClass('active');
                }

                $("#accordion-content1").hide(650);
                $("#accordion-content2").hide(650);
                $("#accordion-content3").hide(650);
                $("#accordion-content4").hide(650);
                $("#accordion-content5").hide(650);

                $("#accordion-item1").removeClass('active');
                $("#accordion-item2").removeClass('active');
                $("#accordion-item3").removeClass('active');
                $("#accordion-item4").removeClass('active');
                $("#accordion-item5").removeClass('active');

                $('html, body').animate({
                  scrollTop: $("#accordion").offset().top
              },1000);

            });

            $("#accordion").accordion();
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
                var a = e.owl.owlItems.length - 4;
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
            var owl6 = $("#carousel6");
            var owl7 = $("#carousel7");
            var owl8 = $("#carousel8");
            var owl9 = $("#carousel9");
            var owl10 = $("#carousel10");
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
                items : 4,
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
            owl6.owlCarousel({
                items : 4,
                dots: false,
                autoplay: true,
                afterMove: function(){
                    $.fn.carMove(owl6.attr('id'), this);
                }
            });
            owl7.owlCarousel({
                items : 4,
                dots: false,
                autoplay: true,
                afterMove: function(){
                    $.fn.carMove(owl7.attr('id'), this);
                }
            });
            owl8.owlCarousel({
                items : 4,
                dots: false,
                autoplay: true,
                afterMove: function(){
                    $.fn.carMove(owl8.attr('id'), this);
                }
            });
            owl9.owlCarousel({
                items : 4,
                dots: false,
                margin: 100,
                autoplay: true,
                afterMove: function(){
                    $.fn.carMove(owl9.attr('id'), this);
                }
            });
            owl10.owlCarousel({
                items : 4,
                dots: false,
                margin: 100,
                autoplay: true,
                afterMove: function(){
                    $.fn.carMove(owl10.attr('id'), this);
                }
            });
            $.fn.togglePrev("carousel1",0);
            $.fn.togglePrev("carousel2",0);
            $.fn.togglePrev("carousel3",0);
            $.fn.togglePrev("carousel4",0);
            $.fn.togglePrev("carousel5",0);
            $.fn.togglePrev("carousel6",0);
            $.fn.togglePrev("carousel7",0);
            $.fn.togglePrev("carousel8",0);
            $.fn.togglePrev("carousel9",0);

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
                $("#mid-text").animate({opacity:"1"},1000);
                $("#main-head").html(mt[slidin]);
                $("#second-head").html(st[slidin]);
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

            $('.buy-button').click(function() {
            var idfilm = '<?php echo $film_id?>';

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

                $("#pop-harga-streaming").html(harga_streaming);
                $("#pop-harga-dvd").html(harga_dvd);
                $("#pop-harga-vcd").html(harga_vcd);
                }
            });
            })

        $('body').popover({
                selector: "[rel='popover']",
                placement: function (context, source) {
                    var position = $(source).position();

                    if (position.left > 515) {
                        return "left";
                    }

                    if (position.left < 515) {
                        return "right";
                    }

                    if (position.top < 110){
                        return "bottom";
                    }

                    return "top";
                },
                html: true,
                container: 'body',
                delay: {
                show: "500",
                hide: "100"
                },
                content: function() {
                return $('#my-popover-container').html();
                },

                // We specify a template in order to set a class (an ID is overwritten) to the popover for styling purposes
                template: '<div class="popover my-popover" role="tooltip"><div class="arrow"></div><div class="popover-content"></div></div>'
            });
        });
        </script>

    <?php } ?>
<style>
     .my-video-dimensions{
          width:auto !important;
     }
</style>
