<body class="scroll-assist" data-reveal-selectors="section:not(.masonry):not(:first-of-type):not(.parallax)" data-reveal-timing="1000">
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
                        <a href="checkout">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                    </li>
                    <?php if(sessionValue("id")<>""){ ?>
                    <li>
                        <a href="<?php echo site_url('transaksi')?>">
                          <img src="<?php echo 'http://116.206.196.146/'.sessionValue('picture')?>" height="25" style="border-radius:50%;">
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
    <div class="main-container transition--fade">
        <section class="cover cover-11 height-100 imagebg parallax" data-overlay="4">
            <div class="background-image-holder2" style="margin-top: 0px !important;">
                <div class="blackbox" style="position: absolute; width: 100%; height: 100%; background-color: #000; opacity: 0.5;">
                </div>
                <div class="background-image-holder" style="transition: background 1s ease-in-out;" >
                    <img class="img-src" alt="image" src="<?php echo base_url()?>img/1a.jpg" />
                    <img class="img-src" alt="image" src="<?php echo base_url()?>img/1b.jpg" />
                    <img class="img-src" alt="image" src="<?php echo base_url()?>img/1c.jpg" />
                    <img class="img-src" alt="image" src="<?php echo base_url()?>img/1b.jpg" />
                    <img class="img-src" alt="image" src="<?php echo base_url()?>img/1c.jpg" />
                    <img class="img-src" alt="image" src="<?php echo base_url()?>img/1a.jpg" />
                </div>
            </div>
            <div class="" style="display: none;">
                <ul>
                    <li class="main-text">Indonesian Film Center.</li>
                    <li class="main-text">WatchFilms</li>
                    <li class="main-text">FilmInfo</li>
                    <li class="main-text">FilmArchive</li>
                    <li class="main-text">FilmNews</li>
                    <li class="main-text">FilmBlog</li>
                </ul>
                <ul>
                    <li class="second-text">All about Indonesian Film</li>
                    <li class="second-text">Watch Indonesian shorts, docus, trailers, music videos, commercials and feature films.</li>
                    <li class="second-text">Find information about Indonesian films, be it fiction, short or documentary.</li>
                    <li class="second-text">Watch archive materials about Indonesia from 1912 to 1965.</li>
                    <li class="second-text">The latest news about Indonesian cinema and check upcoming events/festivals.</li>
                    <li class="second-text">Engage yourself in a topic about Indonesian film.</li>
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
            <div class="col-sm-12 pos-absolute pos-bottom" style="padding-bottom: 30px;">
                <div class="row">
                    <div class="col-sm-12 text-center">
                         <div class="modal-instance modal-video-1">
                            <div class="video-play-icon video-play-icon--sm modal-trigger wow fadeInDown" data-modal-index="0" style="visibility: visible; animation-name: fadeInDown;"></div>
                            <span class="h6 wow fadeInDown" style="visibility: visible; animation-name: fadeInDown;">Watch The Overview</span>
                            <!--end of modal-container-->
                        </div>
                        <ul class="social-list">
                            <li class="wow flipInY" data-wow-delay="1s">
                                <a href="#">
                                    <i class="socicon-twitter"></i>
                                </a>
                            </li>
                            <li class="wow flipInY" data-wow-delay="1.2s">
                                <a href="#">
                                    <i class="socicon-dribbble"></i>
                                </a>
                            </li>
                            <li class="wow flipInY" data-wow-delay="1.4s">
                                <a href="#">
                                    <i class="socicon-vimeo"></i>
                                </a>
                            </li>
                            <li class="wow flipInY" data-wow-delay="1.6s">
                                <a href="#">
                                    <i class="socicon-instagram"></i>
                                </a>
                            </li>
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
                <div class="pull-right" style="color: rgba(255,255,255,0.5);padding-right:10px;">
                    From Movie Abcd
                </div>
            </div>
            <!--end container-->
        </section>
        <section class="project-single-process" id="watchfilms">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 gapless">
                        <div class="col-md-2">
                            <a href="watchfilms" class="main-sec"><h3 class=" wow fadeInLeft text-left"><b>WATCH</b> FILMS</h3></a>
                            <p class="wow fadeIn"></p>
                        </div>
                        <div class="col-md-10">
                        <h4  style="margin-top: 5px;">Watch Indonesian shorts, documentaries, trailers, music videos, commercials and feature films.</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <h4 style="color: #3434;"><b>LATEST FEATURE</b><br> FILMS</h4>
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
                                ?>
                                <div class="item">
                                    <a href="<?php echo base_url().'detail/index/'.url_title(strtolower($row->title)).'/'.$row->id; ?>">
                                        <div class="hover-element hover-element-1 wow flipInX" data-wow-delay="0.4s" data-wow-duration="0.6s" data-title-position="top,left">
                                            <div class="hover-element__initial">
                                                <div style="width:100%;height:294px;background:url('http://116.206.196.146/<?php echo $row->cover?>');background-size:auto 100%;background-position:center top;background-repeat:no-repeat;background-color:black;">
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
                                <span class="cnav-item prev" data-carouselid="carousel1"><span class="fa fa-chevron-left"></span></span>
                                <span class="cnav-item next" data-carouselid="carousel1"><span class="fa fa-chevron-right"></span></span>
                            </div>
                        </div>
                        <div class="col-sm-12" style="margin-top: 20px;"></div>
                        <div class="col-md-2">
                            <h4 style="color: #3434;"><b>LATEST</b> VIDEOS</h4>
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
                                <a href="<?php echo base_url().'detail/index/'.url_title(strtolower($row->title)).'/'.$row->id; ?>">
                                  <div class="hover-element hover-element-1 wow flipInX" data-wow-delay="0.4s" data-wow-duration="0.6s" data-title-position="top,left">
                                      <div class="hover-element__initial">
                                        <div style="width:100%;height:165px;background:url('http://116.206.196.146/<?php echo $row->cover?>');background-size:auto 100%;background-position:center top;background-repeat:no-repeat;background-color:black;">
                                            &nbsp;
                                        </div>
                                      </div>
                                      <div class="hover-element__reveal" data-overlay="9">
                                          <div class="boxed" style="padding-top:18%;">
                                            <h5><?php echo $row->durasi." Menit"?></h5>
                                            <h5 style="font-style:italic;"><?php echo $director?></h5>
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
                              <span class="cnav-item prev" data-carouselid="carousel2"><span class="fa fa-chevron-left"></span></span>
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
                                <a href="#" class="main-sec"><h3 class=" wow fadeInLeft">FILM<b>INFO</b></h3></a>
                                <p class="wow fadeIn"></p>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <h4 class="" style="margin-top: 5px;">Find information about Indonesian films, be it fiction, short or documentary.</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <h4 style="color: #3434;"><b>STILL PLAYING</b> IN CINEMAS THIS WEEK</h4>
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
                                    <a href="<?php echo base_url().'detail/index/'.url_title(strtolower($row->title)).'/'.$row->id; ?>">
                                        <div class="hover-element hover-element-1 wow flipInX" data-wow-delay="0.4s" data-wow-duration="0.6s" data-title-position="top,left">
                                            <div class="hover-element__initial">
                                                <div style="width:100%;height:285px;background:url('http://116.206.196.146/<?php echo $row->cover?>');background-size:auto 100%;background-position:center top;background-repeat:no-repeat;background-color:black;">
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

                            <div class="costumNav">
                                <span class="cnav-item prev" data-carouselid="carousel3"><span class="fa fa-chevron-left"></span></span>
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

        <section class="project-single-process" id="filmarchive">
            <div class="container">
                <div class="img-banner">
                    <img src="http://placehold.it/1500x100?text=Space For Banner" class="img-responsive">
                </div>
            </div>
        </section>

        <section class="project-single-process">
            <div class="container">

                <div class="row">
                    <div class="row">
                        <div class="col-sm-12 col-md-2">
                            <a href="#" class="main-sec"><h3 class=" wow fadeInLeft">FILM <b>ARCHIVE</b></h3></a>
                            <p class="wow fadeIn">
                            </p>
                        </div>
                        <div class="col-md-10">
                            <h4 class="" style="margin-top: 5px;">Watch archive materials about Indonesia from 1912 to 1965. </h4>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-2">
                        <h4 style="color: #3434;"><b>FEATURED</b> VIDEOS</h4>
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
                            <a href="<?php echo base_url().'detail/index/'.url_title(strtolower($row->title)).'/'.$row->id; ?>">
                              <div class="hover-element hover-element-1 wow flipInX" data-wow-delay="0.4s" data-wow-duration="0.6s" data-title-position="top,left">
                                  <div class="hover-element__initial">
                                      <img src="http://116.206.196.146/<?php echo $row->cover?>">
                                  </div>
                                  <div class="hover-element__reveal" data-overlay="9">
                                      <div class="boxed" style="padding-top:25%;">
                                        <h5><?php echo $row->durasi." Menit"?></h5>
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
                          <span class="cnav-item prev" data-carouselid="carousel4"><span class="fa fa-chevron-left"></span></span>
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
                                <a href="#" class="main-sec"><h3 class=" wow fadeInLeft">FILM<b>NEWS</b></h3></a>
                            </div>
                        </div>
                        <div class="col-md-10" style="">
                            <h4 class="" style="margin-top: 5px; ">The latest news about Indonesian cinema and check upcoming events/festivals.</h4>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-2" >
                        <h4 style="color: #3434;"><b>THE LATEST</b> NEWS</h4>
                    </div>
                    <div class="col-md-10" style="padding-right: 0;">
                        <div class="row owl-theme owl-carousel" id="carousel5">
                          <?php foreach ($film_news->result() as $row){ ?>
                            <div class="item news">
                                <div class="img-thumb">
                                    <img src="<?php echo base_url()."images/filmnews/".$row->cover?>" height="170" width="100%">
                                </div>
                                <div class="news body">
                                    <a href="<?php echo site_url('filmnews')?>">
                                      <h5><?php echo $row->title?></h5>
                                    </a>
                                    <p><?php echo substr(strip_tags($row->description),0,180)."..."?></p>
                                </div>
                            </div>
                          <?php } ?>
                        </div>
                        <div class="costumNav" style="width: 97.2%;top:15% !important;">
                          <span class="cnav-item prev" data-carouselid="carousel5"><span class="fa fa-chevron-left"></span></span>
                          <span class="cnav-item next" data-carouselid="carousel5"><span class="fa fa-chevron-right"></span></span>
                        </div>
                    </div>
                    </div>
                <!--end of row-->
                </div>
            </div>
        </section>
        <section class="project-single-process" id="filmblog">
            <div class="container">

                <div class="row">
                    <div class="row">
                        <div class="col-sm-12 col-md-2">
                            <div>
                                <a href="#" class="main-sec"><h3 class=" wow fadeInLeft">FILM<b>BLOG</b></h3></a>
                                <p class="wow fadeIn">
                                </p>
                            </div>
                        </div>
                        <div class="col-md-10" style="">
                            <h4 class="" style="margin-top: 5px;">Engage yourself in a topic about Indonesian film.</h4>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-2">
                            <h4 style="color: #3434;"><b>THE LATEST</b> BLOG</h4>
                    </div>
                    <div class="col-md-10">
                      <?php foreach ($film_blog->result() as $row){ ?>
                        <div class="row" style="margin-bottom:18px;">
                        <div class="col-md-3">
                            <img src="http://placehold.it/600x400">
                        </div>
                        <div class="col-md-9" style="padding-left:8px;">
                            <a href="<?php echo site_url('filmblog')?>">
                              <h4 style="line-height: 0.7;"><?php echo $row->title?></h4>
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
                        <p class="text-white" style="line-height: 20px;padding-right:20px;text-align:justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur.</p>

                         <span>Powered by</span>
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
    <script src="<?php echo base_url()?>js/wow.min.js"></script>

    <script type="text/javascript">
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
            owl1.owlCarousel({
                items : 5,
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
                items : 5,
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
                    $.fn.carMove(owl4.attr('id'), this);
                }

            });
            $.fn.togglePrev("carousel1",0);
            $.fn.togglePrev("carousel2",0);
            $.fn.togglePrev("carousel3",0);
            $.fn.togglePrev("carousel4",0);

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
                //$(".background-image-holder2").hide();
                // $(".background-image-holder").animate({left: "-100%"},0);
                // $(".background-image-holder").css('background', "url('"+bgi[slidin]+"')");
                // $(".background-image-holder").animate({left: "0"},2000);

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
