<body class="scroll-assist" style="background-color:#6B6B6B;" data-reveal-selectors="section:not(.masonry):not(:first-of-type):not(.parallax)" data-reveal-timing="1000">

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

    <style>
    ::placeholder {
        color: red;
        opacity: 1; /* Firefox */
    }

    :-ms-input-placeholder { /* Internet Explorer 10-11 */
       color: red;
    }

    ::-ms-input-placeholder { /* Microsoft Edge */
       color: red;
    }
    </style>

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
                        <input type="search" placeholder="<?php echo $this->session->userdata('search');?>">
                    </li>
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
            <div class="title"><?php echo $this->session->userdata('Login');?></div>
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
                                        <a href="<?php echo base_url().'filmarchive/index/all/'.$rangedefault.'/'.$text.'/'.$paid.'/'.$length?>" class="link-category <?php if($category=='all'){ echo 'active'; }?>"><?php if($lang == "en"){?>All Categories<?php }else{?>Semua Kategori<?php }?></a>
                                    </td>
                                    <td style="width:16.7%" class="div-choice-archive">
                                        <a href="<?php echo base_url().'filmarchive/index/1/'.$rangedefault.'/'.$text.'/'.$paid.'/'.$length?>">
                                          <img src="<?php echo base_url()?>images/archive/icon-archive1.png" class="img-choice-archive <?php if($category=='1'){ echo 'active'; }?>" style="margin-bottom:2px;">
                                        </a><br>
                                        <a href="<?php echo base_url().'filmarchive/index/1/'.$rangedefault.'/'.$text.'/'.$paid.'/'.$length?>" class="link-category <?php if($category=='1'){ echo 'active'; }?>"><?php if($lang == "en"){?>Private Videos<?php }else{?>Video Pribadi<?php }?></a>
                                    </td>
                                    <td style="width:16.7%" class="div-choice-archive">
                                        <a href="<?php echo base_url().'filmarchive/index/2/'.$rangedefault.'/'.$text.'/'.$paid.'/'.$length?>">
                                          <img src="<?php echo base_url()?>images/archive/icon-archive2.png" class="img-choice-archive <?php if($category=='2'){ echo 'active'; }?>" style="margin-bottom:2px;">
                                        </a><br>
                                        <a href="<?php echo base_url().'filmarchive/index/2/'.$rangedefault.'/'.$text.'/'.$paid.'/'.$length?>" class="link-category <?php if($category=='2'){ echo 'active'; }?>"><?php if($lang == "en"){?>Culture<?php }else{?>Budaya<?php }?></a>
                                    </td>
                                    <td style="width:16.7%" class="div-choice-archive">
                                        <a href="<?php echo base_url().'filmarchive/index/3/'.$rangedefault.'/'.$text.'/'.$paid.'/'.$length?>">
                                          <img src="<?php echo base_url()?>images/archive/icon-archive3.png" class="img-choice-archive <?php if($category=='3'){ echo 'active'; }?>" style="margin-bottom:2px;">
                                        </a><br>
                                        <a href="<?php echo base_url().'filmarchive/index/3/'.$rangedefault.'/'.$text.'/'.$paid.'/'.$length?>" class="link-category <?php if($category=='3'){ echo 'active'; }?>"><?php if($lang == "en"){?>Government<?php }else{?>Pemerintahan<?php }?></a>
                                    </td>
                                    <td style="width:16.7%" class="div-choice-archive">
                                        <a href="<?php echo base_url().'filmarchive/index/4/'.$rangedefault.'/'.$text.'/'.$paid.'/'.$length?>">
                                          <img src="<?php echo base_url()?>images/archive/icon-archive4.png" class="img-choice-archive <?php if($category=='4'){ echo 'active'; }?>" style="margin-bottom:2px;">
                                        </a><br>
                                        <a href="<?php echo base_url().'filmarchive/index/4/'.$rangedefault.'/'.$text.'/'.$paid.'/'.$length?>" class="link-category <?php if($category=='4'){ echo 'active'; }?>"><?php if($lang == "en"){?>Reportage<?php }else{?>Laporan<?php }?></a>
                                    </td>
                                    <td style="width:16.7%" class="div-choice-archive">
                                        <a href="<?php echo base_url().'filmarchive/index/5/'.$rangedefault.'/'.$text.'/'.$paid.'/'.$length?>">
                                          <img src="<?php echo base_url()?>images/archive/icon-archive5.png" class="img-choice-archive <?php if($category=='5'){ echo 'active'; }?>" style="margin-bottom:2px;">
                                        </a><br>
                                        <a href="<?php echo base_url().'filmarchive/index/5/'.$rangedefault.'/'.$text.'/'.$paid.'/'.$length?>" class="link-category <?php if($category=='5'){ echo 'active'; }?>"><?php if($lang == "en"){?>Others<?php }else{?>Lain - Lain<?php }?></a>
                                    </td>
                                </tr>
                            </table>
                            </center>
                        </div>
                    </div>

                    <div class="col-md-12" style="margin-bottom: 30px;">
                        <div class="title-sort-input">
                            <input type="text" class="text-search" value="<?php if($text<>'0'){ echo $text; }?>" placeholder="<?php echo $this->session->userdata('search here');?>">
                            <i class="fa fa-search" id="search" aria-hidden="true"></i>
                            <span class="label-semi-bold" style="font-size: 17px;vertical-align: middle;padding-left: 5px;padding-right: 8px;"><?php if($lang == "en"){?>
                          Advance Filters<?php }else{?>Filter Pencarian<?php }?></span>
                            <img src="<?php echo base_url()?>images/icon-advance-filter.png" id="btn-advance-filters" style="cursor: pointer;height: 40px;">
                        </div>
                        <center>
                        <div id="advance-filter-content">
                        <div class="text-left label-bold advance-filter-header">
                                <div class="col-md-11" style="padding-left:0;padding-right:0;">
                                    <span style="font-size: 15px;"><?php if($lang == "en"){?>Search criteria : <?php }else{?>Kriteria Pencarian : <?php }?></span>
                                    <!--<span>
                                        Category:
                                        <a href="#">Semua Kategori</a> <a href="#" onclick="uncheck('category','all')"><i class="fa fa-close" aria-hidden="true"></i></a>
                                        <a href="#">Video Pribadi</a> <a href="#" onclick="uncheck('category','1')"><i class="fa fa-close" aria-hidden="true"></i></a>
                                        <a href="#">Budaya</a> <a href="#" onclick="uncheck('category','2')"><i class="fa fa-close" aria-hidden="true"></i></a>
                                        <a href="#">Pemerintahan</a> <a href="#" onclick="uncheck('category','3')"><i class="fa fa-close" aria-hidden="true"></i></a>
                                        <a href="#">Laporan</a> <a href="#" onclick="uncheck('category','4')"><i class="fa fa-close" aria-hidden="true"></i></a>
                                        <a href="#">Lain - Lain</a> <a href="#" onclick="uncheck('category','5')"><i class="fa fa-close" aria-hidden="true"></i></a>
                                    </span>-->
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

                                        <!--<a href="#">Semua Kategori</a> <a href="#" onclick="uncheck('category','all')"><i class="fa fa-close" aria-hidden="true"></i></a>
                                        <a href="#">Video Pribadi</a> <a href="#" onclick="uncheck('category','1')"><i class="fa fa-close" aria-hidden="true"></i></a>
                                        <a href="#">Budaya</a> <a href="#" onclick="uncheck('category','2')"><i class="fa fa-close" aria-hidden="true"></i></a>
                                        <a href="#">Pemerintahan</a> <a href="#" onclick="uncheck('category','3')"><i class="fa fa-close" aria-hidden="true"></i></a>
                                        <a href="#">Laporan</a> <a href="#" onclick="uncheck('category','4')"><i class="fa fa-close" aria-hidden="true"></i></a>
                                        <a href="#">Lain - Lain</a> <a href="#" onclick="uncheck('category','5')"><i class="fa fa-close" aria-hidden="true"></i></a>
-->
                                <div class="col-md-2">
                                    <span style="font-style:italic;" class="label-bold">Category</span>
                                </div>
                                <div class="col-md-10" style="padding-bottom: 10px;">
                                  <div class="col-md-4">
                                      <input type="radio" name="category" value="all" <?php if(strpos($category,'all') !== false){ echo "checked='true'"; }?>> All Category<br>
                                      <input type="radio" name="category" value="1" <?php if(strpos($category,'1') !== false){ echo "checked='true'"; }?>> Video Pribadi
                                  </div>
                                  <div class="col-md-4">
                                      <input type="radio" name="category" value="2" <?php if(strpos($category,'2') !== false){ echo "checked='true'"; }?>> Budaya<br>
                                      <input type="radio" name="category" value="3" <?php if(strpos($category,'3') !== false){ echo "checked='true'"; }?>> Pemerintahan
                                  </div>
                                  <div class="col-md-4">
                                      <input type="radio" name="category" value="4" <?php if(strpos($category,'4') !== false){ echo "checked='true'"; }?>> Laporan<br>
                                      <input type="radio" name="category" value="5" <?php if(strpos($category,'5') !== false){ echo "checked='true'"; }?>> Lain - Lain
                                  </div>
                                </div>

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
                                    <span style="font-style:italic;" class="label-bold">Year</span>
                                </div>
                                <div class="col-md-10" style="padding-bottom: 10px;">
                                    From
                                    <select name="year-start" id="year-start" class="filter-year search-advance" style="padding:4px;border-radius:4px;">
                                      <option value="0">All</option>
                                      <?php
                                      for($i=date('Y'); $i>=1912; $i-=1){ ?>
                                        <option value="<?php echo $i?>" <?php if($year1==$i){ echo 'selected="true"'; } ?>><?php echo $i?></option><?php
                                      }
                                      ?>
                                    </select>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    Till
                                    <select name="year-end" id="year-end" class="filter-year search-advance" style="padding:4px;border-radius:4px;">
                                      <option value="0">All</option>
                                      <?php
                                      for($i=date('Y'); $i>=1912; $i-=1){ ?>
                                        <option value="<?php echo $i?>" <?php if($year2==$i){ echo 'selected="true"'; } ?>><?php echo $i?></option><?php
                                      }
                                      ?>
                                    </select>
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
                                    <span class="cd-date cd-first select-item-archive" id="rangeyear4"><?php echo $rangeyearnext?></span>
                                </div>
                            </div>
                            <div class="cd-timeline-block" style="padding: 0;margin: 0;"></div>
                            <div class="cd-timeline-block" style="min-height: 165px;">
                                <div class="cd-timeline-img cd-picture">&nbsp;</div>
                                <div class="cd-timeline-content">
                                    <div class="owl-theme owl-carousel" style="width:99.8%;height:192px;" id="carousel1">
                                      <?php
                                      $yearquery = $firstyear+9;
                                      $query = $this->db->query('SELECT * FROM film_list WHERE category_id=4 '.$where.' AND tahun='.$yearquery.' limit 7');
                                      foreach ($query->result() as $row){
                                      ?>
                                      <?php
                                      $link = base_url().'detail/index/'.url_title(strtolower($row->title)).'/'.$row->id;
                                      ?>
                                      <a href="#" onclick="openmovie('<?php echo $row->id?>','<?php echo $row->category_id?>','<?php echo $link?>')">
                                        <div class="item" style="padding:0px;padding-right: 7px;">
                                            <div class="hover-element hover-element-1 wow flipInX" data-wow-delay="0.4s" data-wow-duration="0.6s" data-title-position="top,left">
                                                <div class="hover-element__initial">
                                                    <img src="<?php echo 'http://116.206.196.146/'.$row->cover?>">
                                                </div>
                                                <div class="bottom-caption-archive">
                                                <?php if($lang == "en"){?>
                                                    <span class="timeline-film-title"><?php echo $row->title_eng?></span>
                                                <?php }else{?>
                                                    <span class="timeline-film-title"><?php echo $row->title?></span>
                                                <?php }?>
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
                                    <span class="cd-date"><a href="<?php echo base_url()."filmarchive/search/all/"?><?php echo $firstyear+9?>-<?php echo $firstyear+9?>/0/P/L" style="text-decoration: none;color: #767676;"><?php echo $firstyear+9; ?></a></span>
                                </div>
                            </div>
                            <div class="cd-timeline-block">
                                <div class="cd-timeline-img cd-picture">&nbsp;</div>
                                <div class="cd-timeline-content" style="min-height: 165px;">
                                    <div class="owl-theme owl-carousel" style="width:99.8%;height:192px;" id="carousel2">
                                      <?php
                                      $yearquery = $firstyear+8;
                                      $query = $this->db->query('SELECT * FROM film_list WHERE category_id=4 '.$where.' AND tahun='.$yearquery.' limit 7');
                                      foreach ($query->result() as $row){
                                      ?>
                                      <?php
                                      $link = base_url().'detail/index/'.url_title(strtolower($row->title)).'/'.$row->id;
                                      ?>
                                      <a href="#" onclick="openmovie('<?php echo $row->id?>','<?php echo $row->category_id?>','<?php echo $link?>')">
                                        <div class="item" style="padding:0px;padding-right: 7px;">
                                            <div class="hover-element hover-element-1 wow flipInX" data-wow-delay="0.4s" data-wow-duration="0.6s" data-title-position="top,left">
                                                <div class="hover-element__initial">
                                                    <img src="<?php echo 'http://116.206.196.146/'.$row->cover?>">
                                                </div>
                                                <div class="bottom-caption-archive">
                                                <?php if($lang == "en"){?>
                                                    <span class="timeline-film-title"><?php echo $row->title_eng?></span>
                                                <?php }else{?>
                                                    <span class="timeline-film-title"><?php echo $row->title?></span>
                                                <?php }?>
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
                                    <span class="cd-date"><a href="<?php echo base_url()."filmarchive/search/all/"?><?php echo $firstyear+8?>-<?php echo $firstyear+9?>/0/P/L" style="text-decoration: none;color: #767676;"><?php echo $firstyear+8; ?></a></span>
                                </div>
                            </div>
                            <div class="cd-timeline-block">
                                <div class="cd-timeline-img cd-picture">&nbsp;</div>
                                <div class="cd-timeline-content" style="min-height: 165px;">
                                    <div class="owl-theme owl-carousel" style="width:99.8%;height:192px;" id="carousel3">
                                      <?php
                                      $yearquery = $firstyear+7;
                                      $query = $this->db->query('SELECT * FROM film_list WHERE category_id=4 '.$where.' AND tahun='.$yearquery.' limit 7');
                                      foreach ($query->result() as $row){
                                      ?>
                                      <?php
                                      $link = base_url().'detail/index/'.url_title(strtolower($row->title)).'/'.$row->id;
                                      ?>
                                      <a href="#" onclick="openmovie('<?php echo $row->id?>','<?php echo $row->category_id?>','<?php echo $link?>')">
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
                                    <span class="cd-date"><a href="<?php echo base_url()."filmarchive/search/all/"?><?php echo $firstyear+7?>-<?php echo $firstyear+7?>/0/P/L" style="text-decoration: none;color: #767676;"><?php echo $firstyear+7; ?></a></span>
                                </div>
                            </div>
                            <div class="cd-timeline-block">
                                <div class="cd-timeline-img cd-picture">&nbsp;</div>
                                <div class="cd-timeline-content" style="min-height: 165px;">
                                    <div class="owl-theme owl-carousel" style="width:99.8%;height:192px;" id="carousel4">
                                      <?php
                                      $yearquery = $firstyear+6;
                                      $query = $this->db->query('SELECT * FROM film_list WHERE category_id=4 '.$where.' AND tahun='.$yearquery.' limit 7');
                                      foreach ($query->result() as $row){
                                      ?>
                                      <?php
                                      $link = base_url().'detail/index/'.url_title(strtolower($row->title)).'/'.$row->id;
                                      ?>
                                      <a href="#" onclick="openmovie('<?php echo $row->id?>','<?php echo $row->category_id?>','<?php echo $link?>')">
                                        <div class="item" style="padding:0px;padding-right: 7px;">
                                            <div class="hover-element hover-element-1 wow flipInX" data-wow-delay="0.4s" data-wow-duration="0.6s" data-title-position="top,left">
                                                <div class="hover-element__initial">
                                                    <img src="<?php echo 'http://116.206.196.146/'.$row->cover?>">
                                                </div>
                                                <div class="bottom-caption-archive">
                                                <?php if($lang == "en"){?>
                                                    <span class="timeline-film-title"><?php echo $row->title_eng?></span>
                                                <?php }else{?>
                                                    <span class="timeline-film-title"><?php echo $row->title?></span>
                                                <?php }?>
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
                                    <span class="cd-date"><a href="<?php echo base_url()."filmarchive/search/all/"?><?php echo $firstyear+6?>-<?php echo $firstyear+6?>/0/P/L" style="text-decoration: none;color: #767676;"><?php echo $firstyear+6; ?></a></span>
                                </div>
                            </div>
                            <div class="cd-timeline-block">
                                <div class="cd-timeline-img cd-picture">&nbsp;</div>
                                <div class="cd-timeline-content" style="min-height: 165px;">
                                    <div class="owl-theme owl-carousel" style="width:99.8%;height:192px;" id="carousel5">
                                      <?php
                                      $yearquery = $firstyear+5;
                                      $query = $this->db->query('SELECT * FROM film_list WHERE category_id=4 '.$where.' AND tahun='.$yearquery.' limit 7');
                                      foreach ($query->result() as $row){
                                      ?>
                                      <?php
                                      $link = base_url().'detail/index/'.url_title(strtolower($row->title)).'/'.$row->id;
                                      ?>
                                      <a href="#" onclick="openmovie('<?php echo $row->id?>','<?php echo $row->category_id?>','<?php echo $link?>')">
                                        <div class="item" style="padding:0px;padding-right: 7px;">
                                            <div class="hover-element hover-element-1 wow flipInX" data-wow-delay="0.4s" data-wow-duration="0.6s" data-title-position="top,left">
                                                <div class="hover-element__initial">
                                                    <img src="<?php echo 'http://116.206.196.146/'.$row->cover?>">
                                                </div>
                                                <div class="bottom-caption-archive">
                                                <?php if($lang == "en"){?>
                                                    <span class="timeline-film-title"><?php echo $row->title_eng?></span>
                                                <?php }else{?>
                                                    <span class="timeline-film-title"><?php echo $row->title?></span>
                                                <?php }?>
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
                                    <span class="cd-date"><a href="<?php echo base_url()."filmarchive/search/all/"?><?php echo $firstyear+5?>-<?php echo $firstyear+5?>/0/P/L" style="text-decoration: none;color: #767676;"><?php echo $firstyear+5; ?></a></span>
                                </div>
                            </div>
                            <div class="cd-timeline-block">
                                <div class="cd-timeline-img cd-picture">&nbsp;</div>
                                <div class="cd-timeline-content" style="min-height: 165px;">
                                    <div class="owl-theme owl-carousel" style="width:99.8%;height:192px;" id="carousel6">
                                      <?php
                                      $yearquery = $firstyear+4;
                                      $query = $this->db->query('SELECT * FROM film_list WHERE category_id=4 '.$where.' AND tahun='.$yearquery.' limit 7');
                                      foreach ($query->result() as $row){
                                      ?>
                                      <?php
                                      $link = base_url().'detail/index/'.url_title(strtolower($row->title)).'/'.$row->id;
                                      ?>
                                      <a href="#" onclick="openmovie('<?php echo $row->id?>','<?php echo $row->category_id?>','<?php echo $link?>')">
                                        <div class="item" style="padding:0px;padding-right: 7px;">
                                            <div class="hover-element hover-element-1 wow flipInX" data-wow-delay="0.4s" data-wow-duration="0.6s" data-title-position="top,left">
                                                <div class="hover-element__initial">
                                                    <img src="<?php echo 'http://116.206.196.146/'.$row->cover?>">
                                                </div>
                                                <div class="bottom-caption-archive">
                                                <?php if($lang == "en"){?>
                                                    <span class="timeline-film-title"><?php echo $row->title_eng?></span>
                                                <?php }else{?>
                                                    <span class="timeline-film-title"><?php echo $row->title?></span>
                                                <?php }?>
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
                                    <span class="cd-date"><a href="<?php echo base_url()."filmarchive/search/all/"?><?php echo $firstyear+4?>-<?php echo $firstyear+4?>/0/P/L" style="text-decoration: none;color: #767676;"><?php echo $firstyear+4; ?></a></span>
                                </div>
                            </div>
                            <div class="cd-timeline-block">
                                <div class="cd-timeline-img cd-picture">&nbsp;</div>
                                <div class="cd-timeline-content" style="min-height: 165px;">
                                    <div class="owl-theme owl-carousel" style="width:99.8%;height:192px;" id="carousel7">
                                      <?php
                                      $yearquery = $firstyear+3;
                                      $query = $this->db->query('SELECT * FROM film_list WHERE category_id=4 '.$where.' AND tahun='.$yearquery.' limit 7');
                                      foreach ($query->result() as $row){
                                      ?>
                                      <?php
                                      $link = base_url().'detail/index/'.url_title(strtolower($row->title)).'/'.$row->id;
                                      ?>
                                      <a href="#" onclick="openmovie('<?php echo $row->id?>','<?php echo $row->category_id?>','<?php echo $link?>')">
                                        <div class="item" style="padding:0px;padding-right: 7px;">
                                            <div class="hover-element hover-element-1 wow flipInX" data-wow-delay="0.4s" data-wow-duration="0.6s" data-title-position="top,left">
                                                <div class="hover-element__initial">
                                                    <img src="<?php echo 'http://116.206.196.146/'.$row->cover?>">
                                                </div>
                                                <div class="bottom-caption-archive">
                                                <?php if($lang == "en"){?>
                                                    <span class="timeline-film-title"><?php echo $row->title_eng?></span>
                                                <?php }else{?>
                                                    <span class="timeline-film-title"><?php echo $row->title?></span>
                                                <?php }?>
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
                                    <span class="cd-date"><a href="<?php echo base_url()."filmarchive/search/all/"?><?php echo $firstyear+3?>-<?php echo $firstyear+3?>/0/P/L" style="text-decoration: none;color: #767676;"><?php echo $firstyear+3; ?></a></span>
                                </div>
                            </div>
                            <div class="cd-timeline-block">
                                <div class="cd-timeline-img cd-picture">&nbsp;</div>
                                <div class="cd-timeline-content" style="min-height: 165px;">
                                    <div class="owl-theme owl-carousel" style="width:99.8%;height:192px;" id="carousel8">
                                      <?php
                                      $yearquery = $firstyear+2;
                                      $query = $this->db->query('SELECT * FROM film_list WHERE category_id=4 '.$where.' AND tahun='.$yearquery.' limit 7');
                                      foreach ($query->result() as $row){
                                      ?>
                                      <?php
                                      $link = base_url().'detail/index/'.url_title(strtolower($row->title)).'/'.$row->id;
                                      ?>
                                      <a href="#" onclick="openmovie('<?php echo $row->id?>','<?php echo $row->category_id?>','<?php echo $link?>')">
                                        <div class="item" style="padding:0px;padding-right: 7px;">
                                            <div class="hover-element hover-element-1 wow flipInX" data-wow-delay="0.4s" data-wow-duration="0.6s" data-title-position="top,left">
                                                <div class="hover-element__initial">
                                                    <img src="<?php echo 'http://116.206.196.146/'.$row->cover?>">
                                                </div>
                                                <div class="bottom-caption-archive">
                                                <?php if($lang == "en"){?>
                                                    <span class="timeline-film-title"><?php echo $row->title_eng?></span>
                                                <?php }else{?>
                                                    <span class="timeline-film-title"><?php echo $row->title?></span>
                                                <?php }?>
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
                                    <span class="cd-date"><a href="<?php echo base_url()."filmarchive/search/all/"?><?php echo $firstyear+2?>-<?php echo $firstyear+2?>/0/P/L" style="text-decoration: none;color: #767676;"><?php echo $firstyear+2; ?></a></span>
                                </div>
                            </div>
                            <div class="cd-timeline-block">
                                <div class="cd-timeline-img cd-picture">&nbsp;</div>
                                <div class="cd-timeline-content" style="min-height: 165px;">
                                    <div class="owl-theme owl-carousel" style="width:99.8%;height:192px;" id="carousel9">
                                      <?php
                                      $yearquery = $firstyear+1;
                                      $query = $this->db->query('SELECT * FROM film_list WHERE category_id=4 '.$where.' AND tahun='.$yearquery.' limit 7');
                                      foreach ($query->result() as $row){
                                      ?>
                                      <?php
                                      $link = base_url().'detail/index/'.url_title(strtolower($row->title)).'/'.$row->id;
                                      ?>
                                      <a href="#" onclick="openmovie('<?php echo $row->id?>','<?php echo $row->category_id?>','<?php echo $link?>')">
                                        <div class="item" style="padding:0px;padding-right: 7px;">
                                            <div class="hover-element hover-element-1 wow flipInX" data-wow-delay="0.4s" data-wow-duration="0.6s" data-title-position="top,left">
                                                <div class="hover-element__initial">
                                                    <img src="<?php echo 'http://116.206.196.146/'.$row->cover?>">
                                                </div>
                                                <div class="bottom-caption-archive">
                                                <?php if($lang == "en"){?>
                                                    <span class="timeline-film-title"><?php echo $row->title_eng?></span>
                                                <?php }else{?>
                                                    <span class="timeline-film-title"><?php echo $row->title?></span>
                                                <?php }?>
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
                                    <span class="cd-date"><a href="<?php echo base_url()."filmarchive/search/all/"?><?php echo $firstyear+1?>-<?php echo $firstyear+1?>/0/P/L" style="text-decoration: none;color: #767676;"><?php echo $firstyear+1; ?></a></span>
                                </div>
                            </div>
                            <div class="cd-timeline-block">
                                <div class="cd-timeline-img cd-picture">&nbsp;</div>
                                <div class="cd-timeline-content" style="min-height: 165px;">
                                    <div class="owl-theme owl-carousel" style="width:99.8%;height:192px;" id="carousel10">
                                      <?php
                                      $yearquery = $firstyear;
                                      $query = $this->db->query('SELECT * FROM film_list WHERE category_id=4 '.$where.' AND tahun='.$yearquery.' limit 7');
                                      foreach ($query->result() as $row){
                                      ?>
                                      <?php
                                      $link = base_url().'detail/index/'.url_title(strtolower($row->title)).'/'.$row->id;
                                      ?>
                                      <a href="#" onclick="openmovie('<?php echo $row->id?>','<?php echo $row->category_id?>','<?php echo $link?>')">
                                        <div class="item" style="padding:0px;padding-right: 7px;">
                                            <div class="hover-element hover-element-1 wow flipInX" data-wow-delay="0.4s" data-wow-duration="0.6s" data-title-position="top,left">
                                                <div class="hover-element__initial">
                                                    <img src="<?php echo 'http://116.206.196.146/'.$row->cover?>">
                                                </div>
                                                <div class="bottom-caption-archive">
                                                <?php if($lang == "en"){?>
                                                    <span class="timeline-film-title"><?php echo $row->title_eng?></span>
                                                <?php }else{?>
                                                    <span class="timeline-film-title"><?php echo $row->title?></span>
                                                <?php }?>
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
                                    <span class="cd-date"><a href="<?php echo base_url()."filmarchive/search/all/".$firstyear."-".$firstyear."/0/P/L";?>" style="text-decoration: none;color: #767676;"><?php echo $firstyear?></a></span>
                                </div>
                            </div>
                            <div class="cd-timeline-block">
                                <div class="cd-timeline-img cd-picture">&nbsp;</div>
                                <div class="cd-timeline-content">
                                    <span class="cd-date cd-first select-item-archive " id="rangeyear2"><?php echo $rangeyearbefore?></span>
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
                        <a href="<?php if(isset($row))echo base_url()."filmarchive/search/"?>">
                        <h2 class="film-update-title"><?php if($lang == "en"){?>Latest<?php }else{?>Terbaru<?php }?></h2>
                        </a>
                        <div class="owl-theme owl-carousel" style="width:99.8%;" id="carousel11">
                          <?php
                          $this->db->where('category_id', '4');
                          $this->db->where('status', 'ACTIVE');
                          $this->db->order_by('tahun', 'DESC');
                          $query = $this->db->get('film_list', 15, 0);
                          foreach ($query->result() as $row){
                          ?>
                          <?php
                          $link = base_url().'detail/index/'.url_title(strtolower($row->title)).'/'.$row->id;
                          ?>

                            <div class="item" style="padding:0px;padding-right: 7px;">
                                <a style="cursor: pointer;" onclick="openmovie('<?php echo $row->id?>','<?php echo $row->category_id?>','<?php echo $link?>')">
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
                                </a>
                                <a href="<?php echo base_url()."watchfilms/category/".$row->category_id?>">
                                <div class="bottom-caption-archive">
                                    <?php if($lang == "en"){?>
                                        <span class="timeline-film-title"><?php echo $row->title_eng?></span>
                                    <?php }else{?>
                                        <span class="timeline-film-title"><?php echo $row->title?></span>
                                    <?php }?>
                                </div>
                                </a>
                            </div>
                          <?php } ?>
                        </div>
                        <div class="costum-nav-archive2">
                            <span class="cnav3-item prev" data-carouselid="carousel11"><span class="fa fa-chevron-left"></span></span>
                            <span class="cnav3-item next" data-carouselid="carousel11"><span class="fa fa-chevron-right"></span></span>
                        </div>

                        <div class="list-featured-bottom" style="padding-top: 50px;padding-bottom: 50px;">
                            <img src="<?php echo base_url()?>images/banner-biznet.jpg" width="100%">
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

    <?php
    if(sessionValue('id')<>''){
        $status = 'login';
    }else{
        $status = 'nologin';
    }
    ?>
    <!-- Modal
    <div class="modal fade" id="popup-movie" role="dialog" style="width:800px;left:20%;overflow-y: hidden;">-->
    <div class="modal fade" id="popup-movie" role="dialog" style="width:1000px;top:7%;left:10%;overflow-y: hidden;">
        <div class="modal-dialog" style="width: 100%;margin: auto;">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button id="stop-movie" type="button" class="butt butt-primary sharp close" data-dismiss="modal" style="font-size:12px !important;height:30px;width:100px;margin-bottom:2px;background: #d30e0e;opacity: unset;">Close</button>
                    <h4 class="modal-title" id="title-movie"></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                    <div class="col-sm-7">
                        <video id="path-movie" class="video-js" controls autoplay preload="auto" width="597" height="350"
                        poster="http://116.206.196.146/filmdata/covermovie.jpg" data-setup="{}">
                        <source id="source-movie" src="http://116.206.196.146/filmdata/2017-09/hvidIdFC_16082017_073903.mp4" type='video/mp4'>
                        <p class="vjs-no-js">
                            To view this video please enable JavaScript, and consider upgrading to a web browser that
                            <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                        </p>
                        </video>

                        <div style="padding: 10px;">
                            <span id="sort_detail" style="font-size:12px;font-weight:200;color:black;"></span></br>
                            <!--<a href="#" id="link_detail" style="font-size:12px;font-weight:200;color:#D30E0E;"><?php echo $this->session->userdata('Read More');?></a></br>-->
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="col-md-12" style="text-align:left !important;padding: 0 30px;">


                            <a class="difo">Uploaded On : </a> <a id="created_at" class="difo"></a></br>
                            <a class="difo">Original Title : </a> <a id="o_title" class="difo"></a></br>
                            <a class="difo">Production year : </a> <a id="tahun" class="difo"></a></br>
                            <a class="difo">Production country : </a> <a id="country" class="difo"></a></br>
                            <a class="difo">Production location : </a> <a id="location" class="difo"></a></br>
                            <a class="difo">Category : </a> <a id="category_archive" class="difo"></a></br>
                            <a class="difo">Duration : </a> <a id="duration" class="difo"></a></br><br>

                            <a class="difo">Company : </a> <a id="company_archive" class="difo"></a></br>
                            <a class="difo">Source Name: </a> <a id="source_archive" class="difo"></a></br>
                            <a class="difo">Number ID : </a> <a id="number_id" class="difo"></a></br>
                        </div>

                        <div class="col-md-12" style="padding:10px 30px 10px 30px;">
                            <div id="disediakan">
                            <a class="difo">Disediakan Oleh:</br></a>
                            <img id="dsd_image" src="" style="width: 100px;"></br>
                            <a class="difo">Tertarik dengan video ini?</br></a>
                            <a class="difo" data-toggle="collapse" data-target="#detail" style="cursor: pointer;">Klik disini untuk informasi lebih lanjut!</a>
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
                        </div>

                        <div class="col-md-9" style="text-align:left !important;">
                            <div id="streaming_div" class="col-md-4 gapless" style="padding-right: 5px;text-align:center;">
                                <span style="font-size:12px;font-weight:200;color:black;">Harga Streaming</span>
                                <button type="button" id="streaming-movie" class="butt butt-primary sharp" style="font-size:12px !important;height:30px;width:100px;margin-bottom:2px;" onclick="buyfilm('<?php echo $status?>','streaming')">Rp 15.000</button>
                            </div>
                            <div id="dvd_div" class="col-md-4 gapless" style="padding-right: 5px;text-align:center;">
                                <span style="font-size:12px;font-weight:200;color:black;">Harga DVD</span>
                                <button type="button" id="dvd-movie" class="butt butt-primary sharp" style="font-size:12px !important;height:30px;width:100px;margin-bottom:2px;" onclick="buyfilm('<?php echo $status?>','dvd')">Rp 15.000</button>
                            </div>
                            <div id="vcd_div" class="col-md-4 gapless" style="padding-right: 5px;text-align:center;">
                                <span style="font-size:12px;font-weight:200;color:black;">Harga VCD</span>
                                <button type="button" id="vcd-movie" class="butt butt-primary sharp" style="font-size:12px !important;height:30px;width:100px;margin-bottom:2px;" onclick="buyfilm('<?php echo $status?>','vcd')">Rp 15.000</button>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col-md-12">
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

              var category = document.getElementsByName('category');
              var cat = "0";
              for (var i=0, n=category.length;i<n;i++)
              {
                  if (category[i].checked)
                  {
                      cat = category[i].value;
                  }
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

              var year_start = $('#year-start').val();
              var year_end = $('#year-end').val();

              var checkboxes3 = document.getElementsByName('length');
              var length = "L";
              for (var i=0, n=checkboxes3.length;i<n;i++)
              {
                  if (checkboxes3[i].checked)
                  {
                      length += "-"+checkboxes3[i].value;
                  }
              }
              if(cat != "0"){
                var url_search = '<?php echo base_url()?>filmarchive/search/'+cat+'/1912-3000/'+text+'/'+paid+'/'+length+'/0/'+year_start+'-'+year_end;
              }else{
                var url_search = '<?php echo base_url()?>filmarchive/search/<?php echo $category?>/1912-3000/'+text+'/'+paid+'/0/'+length+'/'+year_start+'-'+year_end;
              }
              window.location = url_search;
            });

            $(".text-search").on('keypress', function (e) {
                var keycode = (e.keyCode ? e.keyCode : e.which);
                if (keycode == '13') {
                    var text = $('.text-search').val();
                  if (text=='') {
                    text = '0';
                  }

                  var category = document.getElementsByName('category');
                  var cat = "0";
                  for (var i=0, n=category.length;i<n;i++)
                  {
                      if (category[i].checked)
                      {
                          cat = category[i].value;
                      }
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

                  var year_start = $('#year-start').val();
                  var year_end = $('#year-end').val();

                  var checkboxes3 = document.getElementsByName('length');
                  var length = "L";
                  for (var i=0, n=checkboxes3.length;i<n;i++)
                  {
                      if (checkboxes3[i].checked)
                      {
                          length += "-"+checkboxes3[i].value;
                      }
                  }
                  if(cat != "0"){
                    var url_search = '<?php echo base_url()?>filmarchive/search/'+cat+'/1912-3000/'+text+'/'+paid+'/'+length+'/'+year_start+'-'+year_end;
                  }else{
                    var url_search = '<?php echo base_url()?>filmarchive/search/<?php echo $category?>/1912-3000/'+text+'/'+paid+'/'+length+'/'+year_start+'-'+year_end;
                  }
                  window.location = url_search;
                }
            });

            $("#search").click(function(){
              var text = $('.text-search').val();
              if (text=='') {
                text = '0';
              }

              var url_search = '<?php echo base_url()?>filmarchive/search/<?php echo $category?>/1912-3000/'+text+'/<?php echo $paid?>/<?php echo $length?>';
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

                    if(tmp.archive_id == 1){
                        var category_archive = "Video Pribadi";
                    }else if(tmp.archive_id == 2){
                        var category_archive ="Budaya";
                    }else if(tmp.archive_id == 3){
                        var category_archive ="Pemerintahan";
                    }else if(tmp.archive_id == 4){
                        var category_archive = "Laporan";
                    }else if(tmp.archive_id == 5){
                        var category_archive = "Lain - Lain";
                    }else{
                        var category_archive = "-";
                    }

                    $("#category_archive").html(category_archive);
                    $("#company_archive").html(tmp.company_id);
                    $("#source_archive").html(tmp.source);
                    $("#number_id").html(idfilm);
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
                    //$("#sort_detail").html(tmp.desc);
                    <?php if($lang == "en"){?>
                    if(tmp.f_sort_detail_eng != ''){
                        $("#sort_detail").html(tmp.f_sort_detail_eng);
                    }else if(tmp.f_desc_eng != ''){
                        $("#sort_detail").html(tmp.f_desc_eng);
                    }else if(tmp.f_desc != ''){
                        $("#sort_detail").html(tmp.f_desc);
                    }else if(tmp.f_sort_detail != ''){
                        $("#sort_detail").html(tmp.f_sort_detail);
                    }
                    <?php }else{?>
                    if(tmp.f_sort_detail != ''){
                        $("#sort_detail").html(tmp.f_sort_detail);
                    }else if(tmp.f_desc != ''){
                        $("#sort_detail").html(tmp.f_desc);
                    }else if(tmp.f_desc_eng != ''){
                        $("#sort_detail").html(tmp.f_desc_eng);
                    }else if(tmp.f_sort_detail_eng != ''){
                        $("#sort_detail").html(tmp.f_sort_detail_eng);
                    }
                    <?php }?>

                    if(idcategory == '0'){
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

    <style type="text/css">
        .cd-date>a:hover{
            color: #EC2B2E !important;
        }
    </style>
