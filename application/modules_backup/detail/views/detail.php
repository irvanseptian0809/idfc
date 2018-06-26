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
                          <img src="<?php echo base_url().sessionValue('picture')?>" height="25" style="border-radius:50%;">
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
              <form class="form-login" method="post">
                <input class="input-form" type="text" id="email-login" placeholder="Email Pengguna" required="">
                <input class="input-form" type="password" id="password-login" placeholder="Kata Sandi" required="">
                <div class="col-md-12"><a href="#" class="link-form">Lupa kata sandi?</a></div>
                <div class="fb-connect">Atau langsung dengan: <img src="<?php echo base_url()?>images/fb-connect.png" style="height:60px;cursor:pointer;"></div>
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
            <section class="project-single-process" id="watchfilms">
                <div class="container filminfo-detail-container" style="width: 100%;">
                    <div class="row row-list" style="padding-top: 25px;">
                    <?php if($film->category_id == '2'){ ?>
                        <div class="col-md-4" style="padding-bottom: 20px;padding-right: 0px;width:294px;">
                            <img src="<?php echo base_url()?><?php echo $film->cover?>">

                            <?php if($film->thumbnail_1 <> ""){ ?>
                            <img src="<?php echo base_url()?><?php echo $film->thumbnail_1?>" style="margin-bottom: 10px;">
                            <?php }else{ ?>
                            <div class="height:50px;width:124px;">&nbsp;</div>
                            <?php } ?>

                            <?php if($film->thumbnail_2 <> ""){ ?>
                            <img src="<?php echo base_url()?><?php echo $film->thumbnail_2?>" style="margin-bottom: 10px;">
                            <?php }else{ ?>
                            <div class="height:50px;width:124px;">&nbsp;</div>
                            <?php } ?>

                            <?php if($film->thumbnail_3 <> ""){ ?>
                            <img src="<?php echo base_url()?><?php echo $film->thumbnail_3?>" style="margin-bottom: 10px;">
                            <?php }else{ ?>
                            <div class="height:50px;width:124px;">&nbsp;</div>
                            <?php } ?>

                            <?php if($film->thumbnail_4 <> ""){ ?>
                            <img src="<?php echo base_url()?><?php echo $film->thumbnail_4?>" style="margin-bottom: 10px;">
                            <?php }else{ ?>
                            <div class="height:50px;width:124px;">&nbsp;</div>
                            <?php } ?>

                            <?php if($film->thumbnail_5 <> ""){ ?>
                            <img src="<?php echo base_url()?><?php echo $film->thumbnail_5?>" style="margin-bottom: 10px;">
                            <?php }else{ ?>
                            <div class="height:50px;width:124px;">&nbsp;</div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                        <div class="col-md-8 desc-filminfo-nav">
                            <?php if($film->category_id == '2'){ ?>
                            <div class="col-md-12" style="padding-bottom: 20px;">
                                <span class="title-detail-film"><?php echo $film->title?> (<?php echo $film->tahun?>)</span>
                            </div>
                            <div class="col-md-5" style="padding-left: 0px;width:297px;">
                                <span class="title-desc-film">Trailer</span><br>
                                <div class="col-md-12 bg-desc-film">
                                    <!-- <span class="title-small-desc">The Raid 2: Berandal (2014) Official Trailer</span><br>
                                    <span class="col-md-12 play-btn-desc">
                                        <img src="images/play.png" style="width: 50px;">
                                    </span> -->
                                    <?php
                                    $thumb_trailer1 = str_replace("mp4","jpg",$film->trailer_path);
                                    $thumb_trailer2 = str_replace("filmdata","http://www.indonesianfilmcenter.com",$thumb_trailer1);
                                    $thumb_trailer3 = str_replace("video","video/thumb",$thumb_trailer2);
                                    $thumb_trailer_final = str_replace("vidIdFC","smallthumb_vidIdFC",$thumb_trailer3);
                                    ?>
                                    <video id="my-video" class="video-js" controls preload="auto" width="293" height="182"
                                    poster="<?php echo $thumb_trailer_final?>" data-setup="{}">
                                    <source src="<?php echo base_url().$film->trailer_path?>" type='video/mp4'>
                                    <p class="vjs-no-js">
                                        To view this video please enable JavaScript, and consider upgrading to a web browser that
                                        <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                                    </p>
                                    </video>
                                </div>
                            </div>
                            <?php if($film->behindthescene_path<>''){ ?>
                            <div class="col-md-5" style="padding-left: 0px;width:297px;">
                                <span class="title-desc-film">Trailer</span><br>
                                <div class="col-md-12 bg-desc-film">
                                <?php
                                $thumb_trailer1 = str_replace("mp4","jpg",$film->behindthescene_path);
                                $thumb_trailer2 = str_replace("filmdata","http://www.indonesianfilmcenter.com",$thumb_trailer1);
                                $thumb_trailer3 = str_replace("video","video/thumb",$thumb_trailer2);
                                $thumb_trailer_final = str_replace("vidIdFC","smallthumb_vidIdFC",$thumb_trailer3);
                                ?>
                                <video id="my-video" class="video-js" controls preload="auto" width="293" height="182"
                                poster="<?php echo $thumb_trailer_final?>" data-setup="{}">
                                    <source src="<?php echo base_url().$film->behindthescene_path?>" type='video/mp4'>
                                    <p class="vjs-no-js">
                                    To view this video please enable JavaScript, and consider upgrading to a web browser that
                                    <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                                    </p>
                                </video>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="col-md-2" style="padding-left: 0px;">
                            <?php if(sessionValue("id")<>""){ ?>
                                <?php if($status=="ordered"){ ?>
                                <span class="title-desc-film">Watch Film (<font style="color:green;font-weight:300;">Paid</font>)</span>
                                <div class="col-md-12 buy-film" style="background-image:url('<?php echo base_url().$film->cover?>');">
                                <div onclick="watchfilm('<?php echo $film->id?>')" class="buy-button" title="Watch Full Film">
                                    <i class="fa fa-play" style="padding-left:25px;"></i>
                                </div>
                                </div>
                                <?php }else{ ?>
                                <span class="title-desc-film">See Film</span>
                                <div class="col-md-12 buy-film" style="cursor:pointer;" id="buy-button">
                                    <div class="img-film" style="background:url('<?php echo base_url().$film->cover?>');background-size:100% auto;width:100%;height:182px;">
                                        <div class="pull-right" style="background:url('<?php echo base_url()?>images/label-harga.png');background-size:100px;width:100%;height:100%;background-position:top right;background-repeat:no-repeat;font-weight:200;font-size:0.9em;">
                                            <span class="pull-right" style="-webkit-transform: rotate(47deg);-moz-transform: rotate(47deg);color:white;margin-top: 16%;width: 46%;text-align:center;">
                                                <?php echo $harga?>
                                            </span>
                                            <span rel='popover' class="buy-button" title="Add To Cart" style="float:left;margin-top: 10%;">
                                                <i class="fa fa-shopping-cart"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            <?php }else{ ?>
                                <span class="title-desc-film">See Film</span>
                                <div class="col-md-12 buy-film" style="cursor:pointer;" id="buy-button">
                                    <div class="img-film" style="background:url('<?php echo base_url().$film->cover?>');background-size:100% auto;width:100%;height:182px;">
                                        <div class="pull-right" style="background:url('<?php echo base_url()?>images/label-harga.png');background-size:100px;width:100%;height:100%;background-position:top right;background-repeat:no-repeat;font-weight:200;font-size:0.9em;">
                                            <span class="pull-right" style="-webkit-transform: rotate(47deg);-moz-transform: rotate(47deg);color:white;margin-top: 16%;width: 46%;text-align:center;">
                                                <?php echo $harga?>
                                            </span>
                                            <span rel='popover' class="buy-button" title="Add To Cart" style="float:left;margin-top: 10%;">
                                                <i class="fa fa-shopping-cart"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            </div>
                            <div class="col-md-12" id="watchfullfilm" style="display:none;"></div>
                            <?php }else{ ?>
                            <div class="col-md-12" style="padding-bottom: 20px;">
                                <span class="title-detail-film"><?php echo $film->title?> (<?php echo $film->tahun?>) <?php if($film->harga_streaming==0){ echo '<font style="color:red;">FREE</font>'; }else if($status=="ordered"){ echo '<font style="color:blue;">PAID</font>'; } ?></span>
                            </div>
                            <div class="col-md-12" style="padding-left: 0px;">
                                <div class="col-md-12">
                                <?php
                                if($film->harga_streaming==0){
                                    $thumb_trailer1 = str_replace("mp4","jpg",$film->trailer_path);
                                    $thumb_trailer2 = str_replace("filmdata","http://www.indonesianfilmcenter.com",$thumb_trailer1);
                                    $thumb_trailer3 = str_replace("video","video/thumb",$thumb_trailer2);
                                    $thumb_trailer_final = str_replace("vidIdFC","smallthumb_vidIdFC",$thumb_trailer3);
                                    ?>
                                    <video id="my-video" class="video-js" controls preload="auto" width="800"
                                    poster="<?php echo $thumb_trailer_final?>" data-setup="{}">
                                    <source src="<?php echo $film->trailer_path?>" type='video/mp4'>
                                    <p class="vjs-no-js">
                                        To view this video please enable JavaScript, and consider upgrading to a web browser that
                                        <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                                    </p>
                                    </video>
                                <?php }else{ ?>
                                    <?php if(sessionValue("id")<>""){ ?>
                                    <?php if($status=="ordered"){ ?>
                                    <?php
                                    $thumb_trailer1 = str_replace("mp4","jpg",$film->trailer_path);
                                    $thumb_trailer2 = str_replace("filmdata","http://www.indonesianfilmcenter.com",$thumb_trailer1);
                                    $thumb_trailer3 = str_replace("video","video/thumb",$thumb_trailer2);
                                    $thumb_trailer_final = str_replace("vidIdFC","smallthumb_vidIdFC",$thumb_trailer3);
                                    ?>
                                    <video id="my-video" class="video-js" controls preload="auto" width="800"
                                    poster="<?php echo $thumb_trailer_final?>" data-setup="{}">
                                        <source src="<?php echo $film->trailer_path?>" type='video/mp4'>
                                        <p class="vjs-no-js">
                                        To view this video please enable JavaScript, and consider upgrading to a web browser that
                                        <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                                        </p>
                                    </video>
                                    <?php }else{ ?>
                                    <div class="col-md-12 buy-film" style="height:450px;background-image:url('<?php echo base_url().$film->cover?>');background-size:100% auto;opacity: 0.5;filter: alpha(opacity=50);">
                                        <div class="buy-button" title="Add To Cart" onclick="buyfilm('login','streaming')" style="margin-left: 45%;margin-top: 24%;">
                                        <i class="fa fa-shopping-cart"></i>
                                        <font style="color:white;font-weight:300;font-size:16px;">Rp. <?php echo number_format($film->harga_streaming,0,',','.')?></font>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <?php }else{ ?>
                                    <div class="col-md-12 buy-film" style="height:450px;background-image:url('<?php echo base_url().$film->cover?>');background-size:100% auto;opacity: 0.5;filter: alpha(opacity=50);">
                                    <div class="buy-button" title="Add To Cart" onclick="buyfilm('nologin','streaming')" style="margin-left: 45%;margin-top: 24%;">
                                        <i class="fa fa-shopping-cart"></i>
                                        <font style="color:white;font-weight:300;font-size:16px;">Rp. <?php echo number_format($film->harga_streaming,0,',','.')?></font>
                                    </div>
                                    </div>
                                    <?php } ?>
                                <?php } ?>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
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
                                    <a href="<?php echo site_url('profil/index/producer/'.$film->producer_id)?>">
                                        <?php echo $producer?>
                                    </a>
                                    </span>
                                </div>
                                <div class="col-md-4" style="padding-left: 0px;">
                                    <span class="title-label-film">Perusahaan film</span><br>
                                    <span class="title-desc-film">
                                    <a href="<?php echo site_url('profil/index/company/'.$film->company_id)?>">
                                        <?php echo $company?>
                                    </a>
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
                                    <a href="<?php echo site_url('profil/index/director/'.$film->director_id)?>">
                                        <?php echo $director?>
                                    </a>
                                    </span>
                                </div>
                                <div class="col-md-4" style="padding-left: 0px;">
                                    <span class="title-label-film">Situs Resmi</span><br>
                                    <span class="title-desc-film"><?php echo $film->situs_resmi?></span>
                                </div>
                            </div>
                        </div>
                        <?php }else{ ?>
                        <div class="col-md-4 detail-desc-film" style="margin-top:50px;height:100%;padding-bottom:30px;">
                            <div class="col-md-12" style="padding-left: 0px;padding-bottom: 25px;">
                                <span class="title-label-film">Durasi</span><br>
                                <span class="title-desc-film"><?php echo $film->durasi?> Menit</span>
                            </div>
                            <div class="col-md-12" style="padding-left: 0px;padding-bottom: 25px;">
                                <span class="title-label-film">Producer</span><br>
                                <span class="title-desc-film">
                                <a href="<?php echo site_url('profil/index/producer/'.$film->producer_id)?>"><?php echo $producer?></a>
                                </span>
                            </div>
                            <div class="col-md-12" style="padding-left: 0px;padding-bottom: 25px;">
                                <span class="title-label-film">Perusahaan film</span><br>
                                <span class="title-desc-film">
                                <a href="<?php echo site_url('profil/index/company/'.$film->company_id)?>"><?php echo $company?></a>
                                </span>
                            </div>
                            <div class="col-md-12" style="padding-left: 0px;padding-bottom: 25px;">
                                <span class="title-label-film">Genre</span><br>
                                <span class="title-desc-film"><?php echo $genre?></span>
                            </div>
                            <div class="col-md-12" style="padding-left: 0px;padding-bottom: 25px;">
                                <span class="title-label-film">Sutradara</span><br>
                                <span class="title-desc-film">
                                <a href="<?php echo site_url('profil/index/director/'.$film->director_id)?>"><?php echo $director?></a>
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
                                        <span class="title-film">Sinopsis Singkat: </span><br>
                                        <span class="desc-film"><?php echo $film->informasi_dasar?></span>
                                        <br><br>
                                        <span class="title-film">Sinopsis Lengkap: </span><br>
                                        <span class="desc-film"><?php echo $film->situs_resmi?></span>
                                    </div>
                                </div>
                                <div class="accordion-item" id="accordion-item2">
                                    <div class="accordion-header" id="accordion-link2">
                                        CAST AND CREW
                                        <span class="accordion-item-arrow"></span>
                                    </div>
                                    <div class="accordion-content" id="accordion-content2">
                                        <span class="title-film">Sinopsis Singkat: </span><br>
                                        <span class="desc-film"><?php echo $film->situs_resmi?></span>
                                        <br><br>
                                        <span class="title-film">Sinopsis Lengkap: </span><br>
                                        <span class="desc-film"><?php echo $film->situs_resmi?></span>
                                    </div>
                                </div>
                                <div class="accordion-item" id="accordion-item3">
                                    <div class="accordion-header" id="accordion-link3">
                                        MATERI DAN PROMOSI
                                        <span class="accordion-item-arrow"></span>
                                    </div>
                                    <div class="accordion-content" id="accordion-content3">
                                        <span class="title-film">Sinopsis Singkat: </span><br>
                                        <span class="desc-film"><?php echo $film->situs_resmi?></span>
                                        <br><br>
                                        <span class="title-film">Sinopsis Lengkap: </span><br>
                                        <span class="desc-film"><?php echo $film->situs_resmi?></span>
                                    </div>
                                </div>
                                <div class="accordion-item" id="accordion-item4">
                                    <div class="accordion-header" id="accordion-link4">
                                        FESTIVAL & PENGHARGAAN
                                        <span class="accordion-item-arrow"></span>
                                    </div>
                                    <div class="accordion-content" id="accordion-content4">
                                        <span class="title-film">Sinopsis Singkat: </span><br>
                                        <span class="desc-film"><?php echo $film->situs_resmi?></span>
                                        <br><br>
                                        <span class="title-film">Sinopsis Lengkap: </span><br>
                                        <span class="desc-film"><?php echo $film->situs_resmi?></span>
                                    </div>
                                </div>
                                <div class="accordion-item" id="accordion-item5">
                                    <div class="accordion-header" id="accordion-link5">
                                        ULASAN
                                        <span class="accordion-item-arrow"></span>
                                    </div>
                                    <div class="accordion-content" id="accordion-content5">
                                        <span class="title-film">Sinopsis Singkat: </span><br>
                                        <span class="desc-film"><?php echo $film->situs_resmi?></span>
                                        <br><br>
                                        <span class="title-film">Sinopsis Lengkap: </span><br>
                                        <span class="desc-film"><?php echo $film->situs_resmi?></span>
                                    </div>
                                </div>
                                <div class="accordion-item" id="accordion-item6">
                                    <div class="accordion-header" id="accordion-link6">
                                        TRIVIA
                                        <span class="accordion-item-arrow"></span>
                                    </div>
                                    <div class="accordion-content" id="accordion-content6">
                                        <span class="title-film">Sinopsis Singkat: </span><br>
                                        <span class="desc-film"><?php echo $film->situs_resmi?></span>
                                        <br><br>
                                        <span class="title-film">Sinopsis Lengkap: </span><br>
                                        <span class="desc-film"><?php echo $film->situs_resmi?></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <!--end of row-->
                    </div>
                </div>
            </section>

            <footer class="footer-2 text-center-xs bg--dark">
                <div class="container">
                    <div class="row" style="vertical-align: middle;">
                        <img class="logo logo-light " alt="logo" src="<?php echo base_url()?>img/idfc-logo.png" style="border-right: 1px solid white; margin-bottom: 3px; margin-left: 10px;" /> <span class="text-white">All About Indonesian Film</span>
                        <div class="col-md-3 pull-right" style="padding-left: 8px;">
                            <div class="btn btn--xs btn-danger" style="font-weight: 300;">Submit Film</div>
                        </div>
                    </div>
                    <hr style="margin-top: 10px;">
                    <div class="col-md-12">
                        <div class="col-md-4">
                            <p class="text-white" style="line-height: 20px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur.</p>

                            <span style="font-weight: 300;">Powered by</span>
                            <img src="<?php echo base_url()?>img/biznet.png" style="max-height: 60px;">
                        </div>
                        <div class="col-md-3">
                            <h4 class="text-white">Follow Us</h4>
                            <table width="100%">
                                <tr>
                                    <td>
                                        <a href="#" class="col-md-3 socround back-fb">
                                            <span class="socicon-facebook"></span>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#" class="col-md-3 socround back-twitter">
                                            <span class="socicon-twitter"></span>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#" class="col-md-3 socround back-gp">
                                            <span class="socicon-googleplus"></span>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#" class="col-md-3 socround back-instagram">
                                            <span class="socicon-instagram"></span>
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-2" style="font-weight: 100;">
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
                            <input type="" name="" class="form-control" placeholder="Your email">
                            <br>
                            <div class="col-md-6 gapless" style="margin-right: 5px;">
                                <div class="btn btn--xs btn-primary" style="font-weight: 300;">Subscribe</div>
                            </div>
                            <div class="col-md-5 gapless">
                                <div class="btn btn--xs btn-warning" style="font-weight: 300;">Donate</div>
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

    <?php } ?>

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

    <script type="text/javascript">
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
      <?php if($film->category_id <> '2'){ ?>
        var videowidth = $('.desc-filminfo-nav').width();
        $('.video-js').width(videowidth-25);
      <?php } ?>

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

      <?php if($film->category_id <> '2'){ ?>
        var videowidth = $('.desc-filminfo-nav').width();
        $('.video-js').width(videowidth-25);
      <?php } ?>

        var width = $(window).width();
        if(width <= 1280){
          $('#behindthescene').css("width","300");
        }else{
          $('#behindthescene').css("width","390");
        }

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
