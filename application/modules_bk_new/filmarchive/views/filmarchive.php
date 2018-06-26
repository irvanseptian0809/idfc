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
                    <li>
                        <a href="<?php echo base_url()?>filminfo">
                            FilmInfo
                        </a>
                    </li>
                    <li class="active">
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
                        <a href="checkout">
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
    <div class="main-container transition--fade">
        <section class="project-single-process" id="watchfilms">
            <div class="container div_archive" style="width: 100%;">
                <div class="row row-list row-archive">

                    <div class="col-md-12">
                        <div class="col-md-12 row-choice-archive">
                            <center>
                            <table class="text-center table-choice-archive">
                                <tr>
                                    <td style="width:16.7%" class="div-choice-archive">
                                        <a href="<?php echo base_url().'filmarchive/index/all/'.$rangedefault.'/'.$text.'/'.$paid.'/'.$length?>">
                                          <img src="<?php echo base_url()?>images/archive/icon-archive5.png" class="img-choice-archive <?php if($category=='all'){ echo 'active'; }?>" style="margin-bottom:2px;">
                                        </a><br>
                                        <a href="<?php echo base_url().'filmarchive/index/all/'.$rangedefault.'/'.$text.'/'.$paid.'/'.$length?>" class="link-category <?php if($category=='all'){ echo 'active'; }?>">Semua Kategori</a>
                                    </td>
                                    <td style="width:16.7%" class="div-choice-archive">
                                        <a href="<?php echo base_url().'filmarchive/index/1/'.$rangedefault.'/'.$text.'/'.$paid.'/'.$length?>">
                                          <img src="<?php echo base_url()?>images/archive/icon-archive1.png" class="img-choice-archive <?php if($category=='1'){ echo 'active'; }?>" style="margin-bottom:2px;">
                                        </a><br>
                                        <a href="<?php echo base_url().'filmarchive/index/1/'.$rangedefault.'/'.$text.'/'.$paid.'/'.$length?>" class="link-category <?php if($category=='1'){ echo 'active'; }?>">Video Pribadi</a>
                                    </td>
                                    <td style="width:16.7%" class="div-choice-archive">
                                        <a href="<?php echo base_url().'filmarchive/index/2/'.$rangedefault.'/'.$text.'/'.$paid.'/'.$length?>">
                                          <img src="<?php echo base_url()?>images/archive/icon-archive2.png" class="img-choice-archive <?php if($category=='2'){ echo 'active'; }?>" style="margin-bottom:2px;">
                                        </a><br>
                                        <a href="<?php echo base_url().'filmarchive/index/2/'.$rangedefault.'/'.$text.'/'.$paid.'/'.$length?>" class="link-category <?php if($category=='2'){ echo 'active'; }?>">Budaya</a>
                                    </td>
                                    <td style="width:16.7%" class="div-choice-archive">
                                        <a href="<?php echo base_url().'filmarchive/index/3/'.$rangedefault.'/'.$text.'/'.$paid.'/'.$length?>">
                                          <img src="<?php echo base_url()?>images/archive/icon-archive3.png" class="img-choice-archive <?php if($category=='3'){ echo 'active'; }?>" style="margin-bottom:2px;">
                                        </a><br>
                                        <a href="<?php echo base_url().'filmarchive/index/3/'.$rangedefault.'/'.$text.'/'.$paid.'/'.$length?>" class="link-category <?php if($category=='3'){ echo 'active'; }?>">Pemerintahan</a>
                                    </td>
                                    <td style="width:16.7%" class="div-choice-archive">
                                        <a href="<?php echo base_url().'filmarchive/index/4/'.$rangedefault.'/'.$text.'/'.$paid.'/'.$length?>">
                                          <img src="<?php echo base_url()?>images/archive/icon-archive4.png" class="img-choice-archive <?php if($category=='4'){ echo 'active'; }?>" style="margin-bottom:2px;">
                                        </a><br>
                                        <a href="<?php echo base_url().'filmarchive/index/4/'.$rangedefault.'/'.$text.'/'.$paid.'/'.$length?>" class="link-category <?php if($category=='4'){ echo 'active'; }?>">Laporan</a>
                                    </td>
                                    <td style="width:16.7%" class="div-choice-archive">
                                        <a href="<?php echo base_url().'filmarchive/index/5/'.$rangedefault.'/'.$text.'/'.$paid.'/'.$length?>">
                                          <img src="<?php echo base_url()?>images/archive/icon-archive5.png" class="img-choice-archive <?php if($category=='5'){ echo 'active'; }?>" style="margin-bottom:2px;">
                                        </a><br>
                                        <a href="<?php echo base_url().'filmarchive/index/5/'.$rangedefault.'/'.$text.'/'.$paid.'/'.$length?>" class="link-category <?php if($category=='5'){ echo 'active'; }?>">Lain - Lain</a>
                                    </td>
                                </tr>
                            </table>
                            </center>
                        </div>
                    </div>

                    <div class="col-md-12" style="margin-bottom: 30px;">
                        <div class="title-sort-input">
                            <input type="text" class="text-search" value="<?php if($text<>'0'){ echo $text; }?>" placeholder="Search Here">
                            <i class="fa fa-search" id="search" aria-hidden="true"></i>
                            <span class="label-semi-bold" style="font-size: 17px;vertical-align: middle;padding-left: 5px;padding-right: 8px;">Advance Filters</span>
                            <img src="<?php echo base_url()?>images/icon-advance-filter.png" id="btn-advance-filters" style="cursor: pointer;height: 40px;">
                        </div>
                        <center>
                        <div id="advance-filter-content">
                        <div class="text-left label-bold advance-filter-header">
                                <div class="col-md-11" style="padding-left:0;padding-right:0;">
                                    <span style="font-size: 15px;">Search criteria:</span>
                                    <span>
                                        Free / Paid:
                                        <?php
                                        if ($paid<>'P') {
                                            $pos = strpos($paid, 'all');
                                            if($pos === false){
                                                $paids = explode('-',$paid);
                                                foreach ($paids as $paid_data) {
                                                    if($paid_data == 'free'){ ?>
                                                        <a href="#">Free</a> <a href="#" onclick="uncheck('paid','free')"><i class="fa fa-close" aria-hidden="true"></i></a>
                                                    <?php }
                                                    if($paid_data == 'paid'){ ?>
                                                        <a href="#">Paid</a> <a href="#" onclick="uncheck('paid','paid')"><i class="fa fa-close" aria-hidden="true"></i></a>
                                                    <?php }
                                                    if($paid_data == '0.15'){ ?>
                                                        <a href="#">0 - 15.000</a> <a href="#" onclick="uncheck('paid','0.15')"><i class="fa fa-close" aria-hidden="true"></i></a>
                                                    <?php }
                                                    if($paid_data == '15.50'){ ?>
                                                        <a href="#">15.000 - 50.000</a> <a href="#" onclick="uncheck('paid','15.50')"><i class="fa fa-close" aria-hidden="true"></i></a>
                                                    <?php }
                                                    if($paid_data == '50.100'){ ?>
                                                        <a href="#">50.000 - 100.000</a> <a href="#" onclick="uncheck('paid','50.100')"><i class="fa fa-close" aria-hidden="true"></i></a>
                                                    <?php }
                                                }
                                            }else{ ?>
                                                <a href="#">All</a> <a href="#" onclick="uncheck('paid','all')"><i class="fa fa-close" aria-hidden="true"></i></a>
                                            <?php }
                                        }else{ ?>
                                            <a href="#">All</a> <a href="#" onclick="uncheck('paid','all')"><i class="fa fa-close" aria-hidden="true"></i></a>
                                        <?php } ?>
                                    </span>
                                    <span>
                                        Length:
                                        <?php
                                        if ($length<>'L') {
                                            $pos = strpos($length, 'all');
                                            if($pos === false){
                                                $lengths = explode('-',$length);
                                                foreach ($lengths as $length_data) {
                                                    if($length_data == '0.35'){ ?>
                                                        <a href="#">0 - 35</a> <a href="#" onclick="uncheck('length','0.35')"><i class="fa fa-close" aria-hidden="true"></i></a>
                                                    <?php }
                                                    if($length_data == '35.45'){ ?>
                                                        <a href="#">35 - 45</a> <a href="#" onclick="uncheck('length','35.45')"><i class="fa fa-close" aria-hidden="true"></i></a>
                                                    <?php }
                                                    if($length_data == '45.60'){ ?>
                                                        <a href="#">45 - 60</a> <a href="#" onclick="uncheck('length','45.60')"><i class="fa fa-close" aria-hidden="true"></i></a>
                                                    <?php }
                                                    if($length_data == '60'){ ?>
                                                        <a href="#">> 60</a> <a href="#" onclick="uncheck('length','60')"><i class="fa fa-close" aria-hidden="true"></i></a>
                                                    <?php }
                                                }
                                            }else{ ?>
                                                <a href="#">All</a> <a href="#" onclick="uncheck('length','all')"><i class="fa fa-close" aria-hidden="true"></i></a>
                                            <?php }
                                        }else{ ?>
                                            <a href="#">All</a> <a href="#" onclick="uncheck('length','all')"><i class="fa fa-close" aria-hidden="true"></i></a>
                                        <?php } ?>
                                    </span>
                                </div>
                                <div class="col-md-1 pull-right">
                                    <input type="button" class="btn-advance-filter" value="Reset">
                                </div>
                                <div class="clearfix"></div>
                            </div> 
                            <!-- <div class="text-left label-bold advance-filter-header">
                                <span style="font-size: 15px;">Search criteria:</span>
                                <span>
                                    Categories:
                                    <a href="#">Animation <i class="fa fa-close" aria-hidden="true"></i></a>
                                </span>
                                <span>
                                    Free / Paid:
                                    <a href="#">Free Movies <i class="fa fa-close" aria-hidden="true"></i></a>
                                </span>
                                <span>
                                    Length:
                                    <a href="#">30 - 45 <i class="fa fa-close" aria-hidden="true"></i></a>
                                </span>
                                <input type="button" class="btn-advance-filter" value="Reset">
                            </div> -->
                            <div class="text-left label-bold advance-filter-body" style="min-height: 185px;background-color: #56c4c6;">
                                <div class="col-md-2">
                                    <span style="font-style:italic;" class="label-bold">Free / Paid</span>
                                </div>
                                <div class="col-md-10" style="padding-bottom: 10px;">
                                  <div class="col-md-4">
                                      <input type="checkbox" name="paid" value="all" <?php if(strpos($paid,'all') !== false){ echo "checked='true'"; }?>> All (<?php echo $film_total?>)<br>
                                      <input type="checkbox" name="paid" value="free" <?php if(strpos($paid,'free') !== false){ echo "checked='true'"; }?>> Free Movies (<?php echo $film_free?>)
                                  </div>
                                  <div class="col-md-4">
                                      <input type="checkbox" name="paid" value="paid" <?php if(strpos($paid,'paid') !== false){ echo "checked='true'"; }?>> Paid Movies (<?php echo $film_paid?>) <br>
                                      <input type="checkbox" name="paid" value="0.15" <?php if(strpos($paid,'0.15') !== false){ echo "checked='true'"; }?>> Paid 0 - 15.000
                                  </div>
                                  <div class="col-md-4">
                                      <input type="checkbox" name="paid" value="15.50" <?php if(strpos($paid,'15.50') !== false){ echo "checked='true'"; }?>> Paid 15.000 - 50.000 <br>
                                      <input type="checkbox" name="paid" value="50.100" <?php if(strpos($paid,'50.100') !== false){ echo "checked='true'"; }?>> Paid 50.000 - 100.000
                                  </div>
                                </div>
                                <div class="col-md-2">
                                    <span style="font-style:italic;" class="label-bold">Length</span>
                                </div>
                                <div class="col-md-10" style="padding-bottom: 10px;">
                                  <div class="col-md-4">
                                      <input type="checkbox" name="length" value="all" <?php if(strpos($length,'all') !== false){ echo "checked='true'"; }?>> All<br>
                                      <input type="checkbox" name="length" value="0.35" <?php if(strpos($length,'0.35') !== false){ echo "checked='true'"; }?>> 0 - 35 (<?php echo $film_durasi_0_35?>)
                                  </div>
                                  <div class="col-md-4">
                                      <input type="checkbox" name="length" value="35.45" <?php if(strpos($length,'35.45') !== false){ echo "checked='true'"; }?>> 35 - 45 (<?php echo $film_durasi_35_45?>) <br>
                                      <input type="checkbox" name="length" value="45.60" <?php if(strpos($length,'45.60') !== false){ echo "checked='true'"; }?>> 45 - 60 (<?php echo $film_durasi_45_60?>)
                                  </div>
                                  <div class="col-md-4">
                                      <input type="checkbox" name="length" value="60" <?php if(strpos($length,'60') !== false){ echo "checked='true'"; }?>> More than 60 (<?php echo $film_durasi_60?>)
                                  </div>
                                </div>
                                <div class="col-md-6 text-center">
                                    <button class="btn-apply-filter">Apply Filters</button>
                                </div>
                                <div class="col-md-6 text-center" style="padding-bottom: 10px;">
                                    <button class="btn-clear-filter">Clear Filters</button>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        </center>
                    </div>

                    <input type="hidden" id="yeardefault" value="<?php echo $yeardefault?>">
                    <div class="col-md-12 select-archive">
                        <div class="col-xs-1" style="width:auto;">
                            <i class="fa fa-backward" aria-hidden="true" style="vertical-align:middle;"></i>
                            <i class="fa fa-caret-left" aria-hidden="true" style="font-size: 26px;vertical-align:middle;padding-left: 10px;"></i>
                        </div>
                        <div class="col-xs-11 item-list-select" style="width:88%;">
                          <?php
                          $xrange = 9;
                          for ($a=1;$a<=5;$a++) {
                            $range = strval($yeardefault).' - '.strval($yeardefault+$xrange);
                            $yeardefault = $yeardefault+$xrange+1; ?>
                            <span class="select-item-archive <?php if($range == $rangeyear){ echo 'active'; }?>" id="rangeyear<?php echo $a?>"><?php echo $range?></span>
                            <?php if($a<5){ ?>
                            <i class="fa fa-circle" aria-hidden="true"></i>
                            <?php } ?>
                          <?php } ?>
                        </div>
                        <div class="col-xs-1" style="width:auto;">
                          <i class="fa fa-caret-right" aria-hidden="true" style="font-size: 26px;vertical-align:middle;padding-right: 10px;"></i>
                          <i class="fa fa-forward" aria-hidden="true" style="vertical-align:middle;"></i>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <!-- main timeline section -->
                        <section id="cd-timeline" class="cd-container cssanimations">
                            <!-- single timeline event -->
                            <div class="cd-timeline-block" style="min-height: 50px;">
                                <div class="cd-timeline-img cd-picture">&nbsp;</div>
                                <div class="cd-timeline-content">
                                    <span class="cd-date cd-first"><?php echo $rangeyearnext?></span>
                                </div>
                            </div>
                            <div class="cd-timeline-block" style="padding: 0;margin: 0;"></div>
                            <div class="cd-timeline-block" style="min-height: 165px;">
                                <div class="cd-timeline-img cd-picture">&nbsp;</div>
                                <div class="cd-timeline-content">
                                    <div class="owl-theme owl-carousel" style="width:99.8%;height:192px;" id="carousel1">
                                      <?php
                                      $yearquery = $firstyear+9;
                                      $query = $this->db->query('SELECT * FROM film_list WHERE category_id=4 '.$where.' AND tahun='.$yearquery);
                                      foreach ($query->result() as $row){
                                      ?>
                                      <a href="<?php echo base_url().'detail/index/'.url_title(strtolower($row->title)).'/'.$row->id; ?>">
                                        <div class="item" style="padding:0px;padding-right: 7px;">
                                            <div class="hover-element hover-element-1 wow flipInX" data-wow-delay="0.4s" data-wow-duration="0.6s" data-title-position="top,left">
                                                <div class="hover-element__initial">
                                                    <img src="<?php echo 'http://116.206.196.146/'.$row->cover?>">
                                                </div>
                                                <div class="bottom-caption-archive">
                                                    <span class="timeline-film-title"><?php echo $row->title?></span>
                                                </div>
                                            </div>
                                        </div>
                                      </a>
                                      <?php } ?>
                                    </div>
                                    <div class="costum-nav-archive">
                                        <span class="cnav3-item prev" data-carouselid="carousel1"><span class="fa fa-chevron-left"></span></span>
                                        <span class="cnav3-item next" data-carouselid="carousel1"><span class="fa fa-chevron-right"></span></span>
                                    </div>
                                    <span class="cd-date"><?php echo $firstyear+9; ?></span>
                                </div>
                            </div>
                            <div class="cd-timeline-block">
                                <div class="cd-timeline-img cd-picture">&nbsp;</div>
                                <div class="cd-timeline-content" style="min-height: 165px;">
                                    <div class="owl-theme owl-carousel" style="width:99.8%;height:192px;" id="carousel2">
                                      <?php
                                      $yearquery = $firstyear+8;
                                      $query = $this->db->query('SELECT * FROM film_list WHERE category_id=4 '.$where.' AND tahun='.$yearquery);
                                      foreach ($query->result() as $row){
                                      ?>
                                      <a href="<?php echo base_url().'detail/index/'.url_title(strtolower($row->title)).'/'.$row->id; ?>">
                                        <div class="item" style="padding:0px;padding-right: 7px;">
                                            <div class="hover-element hover-element-1 wow flipInX" data-wow-delay="0.4s" data-wow-duration="0.6s" data-title-position="top,left">
                                                <div class="hover-element__initial">
                                                    <img src="<?php echo 'http://116.206.196.146/'.$row->cover?>">
                                                </div>
                                                <div class="bottom-caption-archive">
                                                    <span class="timeline-film-title"><?php echo $row->title?></span>
                                                </div>
                                            </div>
                                        </div>
                                      </a>
                                      <?php } ?>
                                    </div>
                                    <div class="costum-nav-archive">
                                        <span class="cnav3-item prev" data-carouselid="carousel2"><span class="fa fa-chevron-left"></span></span>
                                        <span class="cnav3-item next" data-carouselid="carousel2"><span class="fa fa-chevron-right"></span></span>
                                    </div>
                                    <span class="cd-date"><?php echo $firstyear+8; ?></span>
                                </div>
                            </div>
                            <div class="cd-timeline-block">
                                <div class="cd-timeline-img cd-picture">&nbsp;</div>
                                <div class="cd-timeline-content" style="min-height: 165px;">
                                    <div class="owl-theme owl-carousel" style="width:99.8%;height:192px;" id="carousel3">
                                      <?php
                                      $yearquery = $firstyear+7;
                                      $query = $this->db->query('SELECT * FROM film_list WHERE category_id=4 '.$where.' AND tahun='.$yearquery);
                                      foreach ($query->result() as $row){
                                      ?>
                                      <a href="<?php echo base_url().'detail/index/'.url_title(strtolower($row->title)).'/'.$row->id; ?>">
                                        <div class="item" style="padding:0px;padding-right: 7px;">
                                            <div class="hover-element hover-element-1 wow flipInX" data-wow-delay="0.4s" data-wow-duration="0.6s" data-title-position="top,left">
                                                <div class="hover-element__initial">
                                                    <img src="<?php echo 'http://116.206.196.146/'.$row->cover?>">
                                                </div>
                                                <div class="bottom-caption-archive">
                                                    <span class="timeline-film-title"><?php echo $row->title?></span>
                                                </div>
                                            </div>
                                        </div>
                                      </a>
                                      <?php } ?>
                                    </div>
                                    <div class="costum-nav-archive">
                                        <span class="cnav3-item prev" data-carouselid="carousel3"><span class="fa fa-chevron-left"></span></span>
                                        <span class="cnav3-item next" data-carouselid="carousel3"><span class="fa fa-chevron-right"></span></span>
                                    </div>
                                    <span class="cd-date"><?php echo $firstyear+7; ?></span>
                                </div>
                            </div>
                            <div class="cd-timeline-block">
                                <div class="cd-timeline-img cd-picture">&nbsp;</div>
                                <div class="cd-timeline-content" style="min-height: 165px;">
                                    <div class="owl-theme owl-carousel" style="width:99.8%;height:192px;" id="carousel4">
                                      <?php
                                      $yearquery = $firstyear+6;
                                      $query = $this->db->query('SELECT * FROM film_list WHERE category_id=4 '.$where.' AND tahun='.$yearquery);
                                      foreach ($query->result() as $row){
                                      ?>
                                      <a href="<?php echo base_url().'detail/index/'.url_title(strtolower($row->title)).'/'.$row->id; ?>">
                                        <div class="item" style="padding:0px;padding-right: 7px;">
                                            <div class="hover-element hover-element-1 wow flipInX" data-wow-delay="0.4s" data-wow-duration="0.6s" data-title-position="top,left">
                                                <div class="hover-element__initial">
                                                    <img src="<?php echo 'http://116.206.196.146/'.$row->cover?>">
                                                </div>
                                                <div class="bottom-caption-archive">
                                                    <span class="timeline-film-title"><?php echo $row->title?></span>
                                                </div>
                                            </div>
                                        </div>
                                      </a>
                                      <?php } ?>
                                    </div>
                                    <div class="costum-nav-archive">
                                        <span class="cnav3-item prev" data-carouselid="carousel4"><span class="fa fa-chevron-left"></span></span>
                                        <span class="cnav3-item next" data-carouselid="carousel4"><span class="fa fa-chevron-right"></span></span>
                                    </div>
                                    <span class="cd-date"><?php echo $firstyear+6; ?></span>
                                </div>
                            </div>
                            <div class="cd-timeline-block">
                                <div class="cd-timeline-img cd-picture">&nbsp;</div>
                                <div class="cd-timeline-content" style="min-height: 165px;">
                                    <div class="owl-theme owl-carousel" style="width:99.8%;height:192px;" id="carousel5">
                                      <?php
                                      $yearquery = $firstyear+5;
                                      $query = $this->db->query('SELECT * FROM film_list WHERE category_id=4 '.$where.' AND tahun='.$yearquery);
                                      foreach ($query->result() as $row){
                                      ?>
                                      <a href="<?php echo base_url().'detail/index/'.url_title(strtolower($row->title)).'/'.$row->id; ?>">
                                        <div class="item" style="padding:0px;padding-right: 7px;">
                                            <div class="hover-element hover-element-1 wow flipInX" data-wow-delay="0.4s" data-wow-duration="0.6s" data-title-position="top,left">
                                                <div class="hover-element__initial">
                                                    <img src="<?php echo 'http://116.206.196.146/'.$row->cover?>">
                                                </div>
                                                <div class="bottom-caption-archive">
                                                    <span class="timeline-film-title"><?php echo $row->title?></span>
                                                </div>
                                            </div>
                                        </div>
                                      </a>
                                      <?php } ?>
                                    </div>
                                    <div class="costum-nav-archive">
                                        <span class="cnav3-item prev" data-carouselid="carousel5"><span class="fa fa-chevron-left"></span></span>
                                        <span class="cnav3-item next" data-carouselid="carousel5"><span class="fa fa-chevron-right"></span></span>
                                    </div>
                                    <span class="cd-date"><?php echo $firstyear+5; ?></span>
                                </div>
                            </div>
                            <div class="cd-timeline-block">
                                <div class="cd-timeline-img cd-picture">&nbsp;</div>
                                <div class="cd-timeline-content" style="min-height: 165px;">
                                    <div class="owl-theme owl-carousel" style="width:99.8%;height:192px;" id="carousel6">
                                      <?php
                                      $yearquery = $firstyear+4;
                                      $query = $this->db->query('SELECT * FROM film_list WHERE category_id=4 '.$where.' AND tahun='.$yearquery);
                                      foreach ($query->result() as $row){
                                      ?>
                                      <a href="<?php echo base_url().'detail/index/'.url_title(strtolower($row->title)).'/'.$row->id; ?>">
                                        <div class="item" style="padding:0px;padding-right: 7px;">
                                            <div class="hover-element hover-element-1 wow flipInX" data-wow-delay="0.4s" data-wow-duration="0.6s" data-title-position="top,left">
                                                <div class="hover-element__initial">
                                                    <img src="<?php echo 'http://116.206.196.146/'.$row->cover?>">
                                                </div>
                                                <div class="bottom-caption-archive">
                                                    <span class="timeline-film-title"><?php echo $row->title?></span>
                                                </div>
                                            </div>
                                        </div>
                                      </a>
                                      <?php } ?>
                                    </div>
                                    <div class="costum-nav-archive">
                                        <span class="cnav3-item prev" data-carouselid="carousel6"><span class="fa fa-chevron-left"></span></span>
                                        <span class="cnav3-item next" data-carouselid="carousel6"><span class="fa fa-chevron-right"></span></span>
                                    </div>
                                    <span class="cd-date"><?php echo $firstyear+4; ?></span>
                                </div>
                            </div>
                            <div class="cd-timeline-block">
                                <div class="cd-timeline-img cd-picture">&nbsp;</div>
                                <div class="cd-timeline-content" style="min-height: 165px;">
                                    <div class="owl-theme owl-carousel" style="width:99.8%;height:192px;" id="carousel7">
                                      <?php
                                      $yearquery = $firstyear+3;
                                      $query = $this->db->query('SELECT * FROM film_list WHERE category_id=4 '.$where.' AND tahun='.$yearquery);
                                      foreach ($query->result() as $row){
                                      ?>
                                      <a href="<?php echo base_url().'detail/index/'.url_title(strtolower($row->title)).'/'.$row->id; ?>">
                                        <div class="item" style="padding:0px;padding-right: 7px;">
                                            <div class="hover-element hover-element-1 wow flipInX" data-wow-delay="0.4s" data-wow-duration="0.6s" data-title-position="top,left">
                                                <div class="hover-element__initial">
                                                    <img src="<?php echo 'http://116.206.196.146/'.$row->cover?>">
                                                </div>
                                                <div class="bottom-caption-archive">
                                                    <span class="timeline-film-title"><?php echo $row->title?></span>
                                                </div>
                                            </div>
                                        </div>
                                      </a>
                                      <?php } ?>
                                    </div>
                                    <div class="costum-nav-archive">
                                        <span class="cnav3-item prev" data-carouselid="carousel7"><span class="fa fa-chevron-left"></span></span>
                                        <span class="cnav3-item next" data-carouselid="carousel7"><span class="fa fa-chevron-right"></span></span>
                                    </div>
                                    <span class="cd-date"><?php echo $firstyear+3; ?></span>
                                </div>
                            </div>
                            <div class="cd-timeline-block">
                                <div class="cd-timeline-img cd-picture">&nbsp;</div>
                                <div class="cd-timeline-content" style="min-height: 165px;">
                                    <div class="owl-theme owl-carousel" style="width:99.8%;height:192px;" id="carousel8">
                                      <?php
                                      $yearquery = $firstyear+2;
                                      $query = $this->db->query('SELECT * FROM film_list WHERE category_id=4 '.$where.' AND tahun='.$yearquery);
                                      foreach ($query->result() as $row){
                                      ?>
                                      <a href="<?php echo base_url().'detail/index/'.url_title(strtolower($row->title)).'/'.$row->id; ?>">
                                        <div class="item" style="padding:0px;padding-right: 7px;">
                                            <div class="hover-element hover-element-1 wow flipInX" data-wow-delay="0.4s" data-wow-duration="0.6s" data-title-position="top,left">
                                                <div class="hover-element__initial">
                                                    <img src="<?php echo 'http://116.206.196.146/'.$row->cover?>">
                                                </div>
                                                <div class="bottom-caption-archive">
                                                    <span class="timeline-film-title"><?php echo $row->title?></span>
                                                </div>
                                            </div>
                                        </div>
                                      </a>
                                      <?php } ?>
                                    </div>
                                    <div class="costum-nav-archive">
                                        <span class="cnav3-item prev" data-carouselid="carousel8"><span class="fa fa-chevron-left"></span></span>
                                        <span class="cnav3-item next" data-carouselid="carousel8"><span class="fa fa-chevron-right"></span></span>
                                    </div>
                                    <span class="cd-date"><?php echo $firstyear+2; ?></span>
                                </div>
                            </div>
                            <div class="cd-timeline-block">
                                <div class="cd-timeline-img cd-picture">&nbsp;</div>
                                <div class="cd-timeline-content" style="min-height: 165px;">
                                    <div class="owl-theme owl-carousel" style="width:99.8%;height:192px;" id="carousel9">
                                      <?php
                                      $yearquery = $firstyear+1;
                                      $query = $this->db->query('SELECT * FROM film_list WHERE category_id=4 '.$where.' AND tahun='.$yearquery);
                                      foreach ($query->result() as $row){
                                      ?>
                                      <a href="<?php echo base_url().'detail/index/'.url_title(strtolower($row->title)).'/'.$row->id; ?>">
                                        <div class="item" style="padding:0px;padding-right: 7px;">
                                            <div class="hover-element hover-element-1 wow flipInX" data-wow-delay="0.4s" data-wow-duration="0.6s" data-title-position="top,left">
                                                <div class="hover-element__initial">
                                                    <img src="<?php echo 'http://116.206.196.146/'.$row->cover?>">
                                                </div>
                                                <div class="bottom-caption-archive">
                                                    <span class="timeline-film-title"><?php echo $row->title?></span>
                                                </div>
                                            </div>
                                        </div>
                                      </a>
                                      <?php } ?>
                                    </div>
                                    <div class="costum-nav-archive">
                                        <span class="cnav3-item prev" data-carouselid="carousel9"><span class="fa fa-chevron-left"></span></span>
                                        <span class="cnav3-item next" data-carouselid="carousel9"><span class="fa fa-chevron-right"></span></span>
                                    </div>
                                    <span class="cd-date"><?php echo $firstyear+1; ?></span>
                                </div>
                            </div>
                            <div class="cd-timeline-block">
                                <div class="cd-timeline-img cd-picture">&nbsp;</div>
                                <div class="cd-timeline-content" style="min-height: 165px;">
                                    <div class="owl-theme owl-carousel" style="width:99.8%;height:192px;" id="carousel10">
                                      <?php
                                      $yearquery = $firstyear;
                                      $query = $this->db->query('SELECT * FROM film_list WHERE category_id=4 '.$where.' AND tahun='.$yearquery);
                                      foreach ($query->result() as $row){
                                      ?>
                                      <a href="<?php echo base_url().'detail/index/'.url_title(strtolower($row->title)).'/'.$row->id; ?>">
                                        <div class="item" style="padding:0px;padding-right: 7px;">
                                            <div class="hover-element hover-element-1 wow flipInX" data-wow-delay="0.4s" data-wow-duration="0.6s" data-title-position="top,left">
                                                <div class="hover-element__initial">
                                                    <img src="<?php echo 'http://116.206.196.146/'.$row->cover?>">
                                                </div>
                                                <div class="bottom-caption-archive">
                                                    <span class="timeline-film-title"><?php echo $row->title?></span>
                                                </div>
                                            </div>
                                        </div>
                                      </a>
                                      <?php } ?>
                                    </div>
                                    <div class="costum-nav-archive">
                                        <span class="cnav3-item prev" data-carouselid="carousel10"><span class="fa fa-chevron-left"></span></span>
                                        <span class="cnav3-item next" data-carouselid="carousel10"><span class="fa fa-chevron-right"></span></span>
                                    </div>
                                    <span class="cd-date"><?php echo $firstyear?></span>
                                </div>
                            </div>
                            <div class="cd-timeline-block">
                                <div class="cd-timeline-img cd-picture">&nbsp;</div>
                                <div class="cd-timeline-content">
                                    <span class="cd-date cd-first"><?php echo $rangeyearbefore?></span>
                                </div>
                            </div>
                        </section>
                    </div>

                    <div class="col-md-12 select-archive">
                      <div class="col-xs-1" style="width:auto;">
                          <i class="fa fa-backward" aria-hidden="true" style="vertical-align:middle;"></i>
                          <i class="fa fa-caret-left" aria-hidden="true" style="font-size: 26px;vertical-align:middle;padding-left: 10px;"></i>
                      </div>
                      <div class="col-xs-11 item-list-select" style="width:88%;">
                        <?php
                        $xrange = 9;
                        for ($a=1;$a<=5;$a++) {
                          $range = strval($yeardefault2).' - '.strval($yeardefault2+$xrange);
                          $yeardefault2 = $yeardefault2+$xrange+1; ?>
                          <span class="select-item-archive <?php if($range == $rangeyear){ echo 'active'; }?>" id="range2year<?php echo $a?>"><?php echo $range?></span>
                          <?php if($a<5){ ?>
                          <i class="fa fa-circle" aria-hidden="true"></i>
                          <?php } ?>
                        <?php } ?>
                      </div>
                      <div class="col-xs-1" style="width:auto;">
                        <i class="fa fa-caret-right" aria-hidden="true" style="font-size: 26px;vertical-align:middle;padding-right: 10px;"></i>
                        <i class="fa fa-forward" aria-hidden="true" style="vertical-align:middle;"></i>
                      </div>
                    </div>

                    <div class="col-md-12">
                        <h2 class="film-update-title">Update Terbaru</h2>
                        <div class="owl-theme owl-carousel" style="width:99.8%;" id="carousel11">
                          <?php
                          $this->db->where('category_id', '4');
                          $this->db->where('status', 'ACTIVE');
                          $this->db->order_by('tahun', 'DESC');
                          $query = $this->db->get('film_list', 15, 0);
                          foreach ($query->result() as $row){
                          ?>
                          <a href="<?php echo base_url().'detail/index/'.url_title(strtolower($row->title)).'/'.$row->id; ?>">
                            <div class="item" style="padding:0px;padding-right: 7px;">
                                <div class="hover-element hover-element-1 wow flipInX" data-wow-delay="0.4s" data-wow-duration="0.6s" data-title-position="top,left">
                                    <div class="hover-element__initial">
                                        <img src="<?php echo 'http://116.206.196.146/'.$row->cover?>">
                                    </div>
                                    <div class="hover-element__reveal" data-overlay="9">
                                        <div class="boxed" style="padding-top:25%;">
                                          <span>
                                            <em><?php echo $row->durasi." Menit"?></em><br>
                                            <em><?php echo $row->tahun?></em>
                                          </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="bottom-caption-archive">
                                    <span class="timeline-film-title"><?php echo $row->title?></span>
                                </div>
                            </div>
                          </a>
                          <?php } ?>
                        </div>
                        <div class="costum-nav-archive2">
                            <span class="cnav3-item prev" data-carouselid="carousel11"><span class="fa fa-chevron-left"></span></span>
                            <span class="cnav3-item next" data-carouselid="carousel11"><span class="fa fa-chevron-right"></span></span>
                        </div>

                        <div class="list-featured-bottom" style="padding-top: 50px;padding-bottom: 50px;">
                            <img src="<?php echo base_url()?>images/footer-img.jpg" width="100%">
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
    <script src="<?php echo base_url()?>js/accordion.js"></script>
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

          $("#advance-filter-content").hide();

          $("#btn-advance-filters").click(function() {
            $("#advance-filter-content").slideToggle("slow");
          });

          $(".btn-clear-filter").click(function(){
            window.location = '<?php echo base_url()?>filmarchive';
          });

          $(".btn-advance-filter").click(function(){
            window.location = '<?php echo base_url()?>filmarchive';
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
          var owl6 = $("#carousel6");
          var owl7 = $("#carousel7");
          var owl8 = $("#carousel8");
          var owl9 = $("#carousel9");
          var owl10 = $("#carousel10");
          var owl11 = $("#carousel11");
          owl1.owlCarousel({
              items : 3,
              dots: false,
              autoplay: true,
              afterMove: function(){
                  $.fn.carMove(owl1.attr('id'), this);
              }
          });
          owl2.owlCarousel({
              items : 3,
              dots: false,
              autoplay: true,
              afterMove: function(){
                  $.fn.carMove(owl2.attr('id'), this);
              }
          });
          owl3.owlCarousel({
              items : 3,
              dots: false,
              autoplay: true,
              afterMove: function(){
                  $.fn.carMove(owl3.attr('id'), this);
              }
          });
          owl4.owlCarousel({
              items : 3,
              dots: false,
              autoplay: true,
              afterMove: function(){
                  $.fn.carMove(owl4.attr('id'), this);
              }
          });
          owl5.owlCarousel({
              items : 3,
              dots: false,
              margin: 100,
              autoplay: true,
              afterMove: function(){
                  $.fn.carMove(owl5.attr('id'), this);
              }
          });
          owl6.owlCarousel({
              items : 3,
              dots: false,
              autoplay: true,
              afterMove: function(){
                  $.fn.carMove(owl6.attr('id'), this);
              }
          });
          owl7.owlCarousel({
              items : 3,
              dots: false,
              autoplay: true,
              afterMove: function(){
                  $.fn.carMove(owl7.attr('id'), this);
              }
          });
          owl8.owlCarousel({
              items : 3,
              dots: false,
              autoplay: true,
              afterMove: function(){
                  $.fn.carMove(owl8.attr('id'), this);
              }
          });
          owl9.owlCarousel({
              items : 3,
              dots: false,
              margin: 100,
              autoplay: true,
              afterMove: function(){
                  $.fn.carMove(owl9.attr('id'), this);
              }
          });
          owl10.owlCarousel({
              items : 3,
              dots: false,
              margin: 100,
              autoplay: true,
              afterMove: function(){
                  $.fn.carMove(owl10.attr('id'), this);
              }
          });
          owl11.owlCarousel({
              items : 6,
              dots: false,
              margin: 100,
              autoplay: true,
              afterMove: function(){
                  $.fn.carMove(owl11.attr('id'), this);
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
          $.fn.togglePrev("carousel10",0);
          $.fn.togglePrev("carousel11",0);

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

          jQuery("#accordion").accordion();

          $(window).on('scroll', function(){
              $('.cd-timeline-block').each(function(){
                  if( $(this).offset().top <= $(window).scrollTop()+$(window).height()*0.75 && $(this).find('.cd-timeline-img').hasClass('is-hidden') ) {
                      $(this).find('.cd-timeline-img, .cd-timeline-content').removeClass('is-hidden').addClass('bounce-in');
                  }
              });
          });

          $("#login-form").click(function(){
            $(".search-area").fadeToggle();
          });

          $(".fa-caret-left").click(function(){
            var yeardefault = $('#yeardefault').val();
            if(yeardefault > parseInt('<?php echo $yearstart?>')){
              var xrange = 9;
              var rangefirst = parseInt(yeardefault)-(xrange+1);
              $('#yeardefault').val(rangefirst);
              for (var a=1;a<=5;a++) {
                var rangelast = rangefirst+xrange;
                var range = rangefirst.toString()+' - '+rangelast.toString();
                rangefirst = rangelast+1;
                // console.log(range+' = <?php //echo $rangeyear?>');

                $('#rangeyear'+a).html(range);
                $('#range2year'+a).html(range);
                if(range == '<?php echo $rangeyear?>'){
                  $('#rangeyear'+a).addClass("active");
                  $('#range2year'+a).addClass("active");
                }else{
                  $('#rangeyear'+a).removeClass("active");
                  $('#range2year'+a).removeClass("active");
                }
              }
            }
          });

          $(".fa-caret-right").click(function(){
            var yeardefault = $('#yeardefault').val();
            if(yeardefault <= parseInt('<?php echo date('Y')-50; ?>')){
              var xrange = 9;
              var rangefirst = parseInt(yeardefault)+(xrange+1);
              $('#yeardefault').val(rangefirst);
              for (var a=1;a<=5;a++) {
                var rangelast = rangefirst+xrange;
                var range = rangefirst.toString()+' - '+rangelast.toString();
                rangefirst = rangelast+1;
                // console.log(range+' = <?php //echo $rangeyear?>');

                $('#rangeyear'+a).html(range);
                $('#range2year'+a).html(range);
                if(range == '<?php echo $rangeyear?>'){
                  $('#rangeyear'+a).addClass("active");
                  $('#range2year'+a).addClass("active");
                }else{
                  $('#rangeyear'+a).removeClass("active");
                  $('#range2year'+a).removeClass("active");
                }
              }
            }
          });

          $(".fa-backward").click(function(){
            var xrange = 9;
            var rangefirst = parseInt('<?php echo $yearstart?>');
            $('#yeardefault').val(rangefirst);
            for (var a=1;a<=5;a++) {
              var rangelast = rangefirst+xrange;
              var range = rangefirst.toString()+' - '+rangelast.toString();
              rangefirst = rangelast+1;
              // console.log(range+' = <?php //echo $rangeyear?>');

              $('#rangeyear'+a).html(range);
              $('#range2year'+a).html(range);
              if(range == '<?php echo $rangeyear?>'){
                $('#rangeyear'+a).addClass("active");
                $('#range2year'+a).addClass("active");
              }else{
                $('#rangeyear'+a).removeClass("active");
                $('#range2year'+a).removeClass("active");
              }
            }
          });

          $(".fa-forward").click(function(){
            <?php
            $sel = 0;
            $wlyear = substr(date('Y'),-1);
            if($wlyear <> '0'){
              $sel = 10-$wlyear;
            }
            $startfrom = date('Y')+$sel+1;
            ?>
            var xrange = 9;
            var rangefirst = parseInt('<?php echo $startfrom-50?>');
            //console.log(rangefirst);
            $('#yeardefault').val(rangefirst);
            for (var a=1;a<=5;a++) {
              var rangelast = rangefirst+xrange;
              var range = rangefirst.toString()+' - '+rangelast.toString();
              rangefirst = rangelast+1;
              // console.log(range+' = <?php //echo $rangeyear?>');

              $('#rangeyear'+a).html(range);
              $('#range2year'+a).html(range);
              if(range == '<?php echo $rangeyear?>'){
                $('#rangeyear'+a).addClass("active");
                $('#range2year'+a).addClass("active");
              }else{
                $('#rangeyear'+a).removeClass("active");
                $('#range2year'+a).removeClass("active");
              }
            }
          });

          $(".select-item-archive").click(function(){
            var cat = '<?php echo $category?>';
            var rangeyear = $(this).html();
            var value = rangeyear.replace(/ /g, '');

            var url_search = '<?php echo base_url()?>filmarchive/index/'+cat+'/'+value+'/<?php echo $text?>/<?php echo $paid?>/<?php echo $length?>';
            window.location = url_search;
          });

          $(".btn-apply-filter").click(function(){
              var text = $('.text-search').val();
              if (text=='') {
                text = '0';
              }

              var checkboxes2 = document.getElementsByName('paid');
              var paid = "P";
              for (var i=0, n=checkboxes2.length;i<n;i++)
              {
                  if (checkboxes2[i].checked)
                  {
                      paid += "-"+checkboxes2[i].value;
                  }
              }

              var checkboxes3 = document.getElementsByName('length');
              var length = "L";
              for (var i=0, n=checkboxes3.length;i<n;i++)
              {
                  if (checkboxes3[i].checked)
                  {
                      length += "-"+checkboxes3[i].value;
                  }
              }

              var url_search = '<?php echo base_url()?>filmarchive/index/<?php echo $category?>/<?php echo $rangedefault?>/'+text+'/'+paid+'/'+length;
              window.location = url_search;
            });

            $("#search").click(function(){
              var text = $('.text-search').val();
              if (text=='') {
                text = '0';
              }

              var url_search = '<?php echo base_url()?>filmarchive/index/<?php echo $category?>/<?php echo $rangedefault?>/'+text+'/<?php echo $paid?>/<?php echo $length?>';
              window.location = url_search;
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

        function uncheck(name,val){
            $("input[name='"+name+"'][value='"+val+"']").attr('checked', false);
            $(".btn-apply-filter").click();
        }
    </script>
