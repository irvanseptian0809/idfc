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
              <form class="form-login" method="post">
                <input class="input-form" type="text" id="email-login" placeholder="<?php echo $this->session->userdata('Email User');?>" required="">
                <input class="input-form" type="password" id="password-login" placeholder="<?php echo $this->session->userdata('Password');?>" required="">
                <div class="col-md-12"><a href="#" class="link-form"><?php echo $this->session->userdata('Forgot Password?');?></a></div>
                <div class="fb-connect"><?php echo $this->session->userdata('Or Login With:');?> <img src="<?php echo base_url()?>images/fb-connect.png" style="height:60px;cursor:pointer;"></div>
                <div class="col-md-6" style="padding-top:35px;">
                  <a href="<?php echo site_url('register')?>" class="register"><?php echo $this->session->userdata('Not Yet Registered?');?></a>
                </div>
                <div class="col-md-6" style="padding-top:35px;text-align:right;padding-right:15px;">
                  <button type="submit" id="bayar" class="butt butt-primary sharp" style="font-size:12px !important;height:30px;width:100px;"><?php echo $this->session->userdata('Login');?></button>
                </div>
              </form>
            </div>
        </div>
    </nav>
    <!--end of modal-container-->
    <div class="main-container transition--fade">

        <div class="col-md-12" style="padding:0;">
            <div class="owl-theme owl-carousel" id="carousel115">


            <?php 
            $this->db->select("*");
            $this->db->from("banner");
            $this->db->where("categori","filminfo");
            $this->db->where("deleted_at",null);
            $banner = $this->db->get()->result();
            foreach ($banner as $banner) {
            ?>
                <div class="item">
                    <div class="img-src" style="background-image: url('<?php echo 'http://116.206.196.146/idfilm/public/'.$banner->image;?>');background-size:100% auto;">&nbsp;</div>
                </div>
            <?php
            }
            ?>
            </div>
            <div class="slider-nav">
                <span class="slider-nav-item prev" data-carouselid="carousel115"><span class="fa fa-angle-left"></span></span>
                <span class="slider-nav-item next" data-carouselid="carousel115"><span class="fa fa-angle-right"></span></span>
            </div>
        </div>

        <section class="project-single-process" id="watchfilms" style="margin-top:35px;">
            <div class="container" style="width: 100%;padding-left:0px;padding-right:0px;">
            <?php if(isset($_GET['category']) == "profile"){?>
                <div class="row"></div>
                <div class="title-sort">
                                <a href="#" <?php if($word=="0"){ echo 'class="active"'; }?>>ALL</a>
                                <a href="#" <?php if($word=="NO"){ echo 'class="active"'; }?>>#</a>
                                <a href="#" <?php if($word=="A"){ echo 'class="active"'; }?>>A</a>
                                <a href="#" <?php if($word=="B"){ echo 'class="active"'; }?>>B</a>
                                <a href="#" <?php if($word=="C"){ echo 'class="active"'; }?>>C</a>
                                <a href="#" <?php if($word=="D"){ echo 'class="active"'; }?>>D</a>
                                <a href="#" <?php if($word=="E"){ echo 'class="active"'; }?>>E</a>
                                <a href="#" <?php if($word=="F"){ echo 'class="active"'; }?>>F</a>
                                <a href="#" <?php if($word=="G"){ echo 'class="active"'; }?>>G</a>
                                <a href="#" <?php if($word=="H"){ echo 'class="active"'; }?>>H</a>
                                <a href="#" <?php if($word=="I"){ echo 'class="active"'; }?>>I</a>
                                <a href="#" <?php if($word=="J"){ echo 'class="active"'; }?>>J</a>
                                <a href="#" <?php if($word=="K"){ echo 'class="active"'; }?>>K</a>
                                <a href="#" <?php if($word=="L"){ echo 'class="active"'; }?>>L</a>
                                <a href="#" <?php if($word=="M"){ echo 'class="active"'; }?>>M</a>
                                <a href="#" <?php if($word=="N"){ echo 'class="active"'; }?>>N</a>
                                <a href="#" <?php if($word=="O"){ echo 'class="active"'; }?>>O</a>
                                <a href="#" <?php if($word=="P"){ echo 'class="active"'; }?>>P</a>
                                <a href="#" <?php if($word=="Q"){ echo 'class="active"'; }?>>Q</a>
                                <a href="#" <?php if($word=="R"){ echo 'class="active"'; }?>>R</a>
                                <a href="#" <?php if($word=="S"){ echo 'class="active"'; }?>>S</a>
                                <a href="#" <?php if($word=="T"){ echo 'class="active"'; }?>>T</a>
                                <a href="#" <?php if($word=="U"){ echo 'class="active"'; }?>>U</a>
                                <a href="#" <?php if($word=="V"){ echo 'class="active"'; }?>>V</a>
                                <a href="#" <?php if($word=="W"){ echo 'class="active"'; }?>>W</a>
                                <a href="#" <?php if($word=="X"){ echo 'class="active"'; }?>>X</a>
                                <a href="#" <?php if($word=="Y"){ echo 'class="active"'; }?>>Y</a>
                                <a href="#" <?php if($word=="Z"){ echo 'class="active"'; }?>>Z</a>
                            </div>
            <?php }?>
                <div class="row row-list" style="padding-left:0px;padding-right:0px;padding-bottom:10px;">
                    <div class="col-md-12 list-item-gray" style="margin-bottom: 30px;">
                        <div class="title-sort-input" style="background-color:white;border-bottom: 2px solid #EC2B2E;">
                          <input type="text" class="text-search" value="<?php if($text<>'0'){ echo $text; }?>" style="color:#333;line-height: 10px;" placeholder="<?php echo $this->session->userdata('search here');?>">
                          <i class="fa fa-search" aria-hidden="true" id="search" style="cursor:pointer;"></i>
                          <span class="label-semi-bold" style="font-size: 17px;vertical-align: middle;padding-left: 5px;padding-right: 8px;"><?php if($lang == "en"){?>
                          Advance Filters<?php }else{?>Filter Pencarian<?php }?></span>
                          <img src="<?php echo base_url()?>images/icon-advance-filter.png" id="btn-advance-filters" style="cursor: pointer;height: 40px;">
                        </div>
                        <center>
                        <div id="advance-filter-content">
                            <div class="text-left label-bold advance-filter-header">
                                <div class="col-md-11" style="padding-left: 24px;padding-right: 0;padding-top: 3px;">
                                    <span style="font-size: 15px;"><?php if($lang == "en"){?>Search criteria : <?php }else{?>Kriteria Pencarian : <?php }?></span>
                                    <!-- <span>
                                        Categories:
                                        <a href="#">Animation <i class="fa fa-close" aria-hidden="true"></i></a>
                                    </span> -->
                                    <span>
                                        <?php if($lang == "en"){?>
                                        Free / Paid:
                                        <?php }else{?>
                                        Gratis / Berbayar:
                                        <?php }?>
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
                                <div class="col-md-1 pull-right" style="padding-top: 3px;">
                                    <input type="button" class="btn-advance-filter" value="Reset">
                                </div>
                            </div> 
                            <div class="text-left label-bold advance-filter-body" style="min-height: 280px;background-color: #56c4c6;">
                                <!-- <div class="col-md-2">
                                    <span style="font-style:italic;" class="label-bold">Type</span>
                                </div>
                                <div class="col-md-10" style="padding-bottom: 10px;">
                                    <div class="col-md-4">
                                        <input type="radio" name="type" value="film"> Film<br>
                                        <input type="radio" name="type" value="profile"> Profile
                                    </div>
                                    <div class="col-md-4">
                                        <input type="radio" name="type" value="perusahaan"> Company <br>
                                        <input type="radio" name="type" value="producer"> Producer
                                    </div>
                                    <div class="col-md-4">
                                        <input type="radio" name="type" value="director"> Director
                                    </div>
                                </div> -->
                                <div class="col-md-2">
                                    <span style="font-style:italic;" class="label-bold">Category</span>
                                </div>
                                <div class="col-md-10" style="padding-bottom: 10px;">
                                  <div class="col-md-4">
                                      <input type="radio" name="category" value="film" <?php if(strpos(isset($_GET['category']),'film') !== false){ echo "checked='true'"; }?>> Film
                                  </div>
                                  <div class="col-md-4">
                                      <input type="radio" name="category" value="profile" <?php if(strpos(isset($_GET['category']),'profile') !== false){ echo "checked='true'"; }?>> Profiles
                                  </div>
                                  <div class="col-md-4">
                                      <input type="radio" name="category" value="company" <?php if(strpos(isset($_GET['category']),'company') !== false){ echo "checked='true'"; }?>> Companies
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
                                <div class="col-md-2">
                                    <span style="font-style:italic;" class="label-bold">Genre</span>
                                </div>
                                <div class="col-md-10" id="show-more-genre">
                                  <div class="col-md-3">
                                  <?php
                                  $a = 1;

                                  $posall = strpos($genre,'all');
                                  if($posall){
                                    $checkedall2 = "checked='true'";
                                  }else{
                                    $checkedall2 = "";
                                  }
                                  echo '<input type="checkbox" name="genre" value="all" '.$checkedall2.'> All <br>';
                                  foreach ($genre_less->result() as $row){
                                    $checked2 = "";
                                    if($checkedall2 == ''){
                                      $gens = explode('-',$genre);
                                      foreach ($gens as $gen) {
                                        if($gen==$row->id){
                                          $checked2 = 'checked="true"';
                                        }
                                      }
                                    }

                                    $a++;
                                    $amod = $a % 2;
                                    if($amod==0){
                                      echo '<input type="checkbox" name="genre" value="'.$row->id.'" '.$checked2.'> '.$row->title;
                                      echo '</div><div class="col-md-3">';
                                    }else{
                                      echo '<input type="checkbox" name="genre" value="'.$row->id.'" '.$checked2.'> '.$row->title.'<br>';
                                    }
                                  }
                                  ?>
                                  </div>
                                </div>
                                <div class="col-md-12 text-center" id="btn-show-more-genre" style="padding-bottom: 10px;">
                                    <span style="cursor: pointer;color: red;font-size: 12px;font-weight: 200;">Show More <i class="fa fa-sort-down" aria-hidden="true"></i></span>
                                </div>
                                <!-- <div class="col-md-2">
                                    <span style="font-style:italic;" class="label-bold">Other</span>
                                </div>
                                <div class="col-md-10" style="padding-bottom: 10px;">
                                    <div class="col-md-4">
                                        <input type="checkbox" name="other" value="black" <?php //if(strpos($other,'black') !== false){ echo "checked='true'"; }?>> Black
                                    </div>
                                    <div class="col-md-4">
                                        <input type="checkbox" name="other" value="colour" <?php //if(strpos($other,'colour') !== false){ echo "checked='true'"; }?>> Colour
                                    </div>
                                    <div class="col-md-4">
                                        <input type="checkbox" name="other" value="subtitle" <?php //if(strpos($other,'subtitle') !== false){ echo "checked='true'"; }?>> Subtitle
                                    </div>
                                </div> -->
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
<?php if($condition == 'normal'){?>
                    <!-- Feature Films -->
                    
                    <div class="col-md-12">
                        <div class="col-md-12" style="padding-left:170px;padding-right:180px;">
                            <div class="col-md-3">
                                <?php if($lang == "en"){?>
                                    <span class="col-md-12 item-left-head" style="font-size:28px;padding-bottom:6px;">THIS WEEK AT</span>
                                    <span class="col-md-12 item-left-desc big-text" style="font-size:34px !important;padding-bottom:120px;">THE CINEMAS</span>
                                <?php }else{?>
                                    <span class="col-md-12 item-left-head" style="font-size:28px;padding-bottom:6px;">MINGGU INI</span>
                                    <span class="col-md-12 item-left-desc big-text" style="font-size:34px !important;padding-bottom:120px;">DI BIOSKOP</span>
                                <?php }?>
                            </div>
                            <div class="col-md-9">
                                <div class="owl-theme owl-carousel" id="carousel1">
                                  <?php foreach ($still_in_cinema->result() as $row){
                                    $this->db->where('id', trim($row->director_id));
                                    $query_director = $this->db->get('film_director');
                                    if($query_director->num_rows() > 0){
                                      foreach ($query_director->result() as $row_director){
                                        $director_name = $row_director->title;
                                      }
                                    }else{
                                      $director_name = "";
                                    } ?>
                                    <div class="item">
                                        <a href="<?php echo base_url().'detail/index/'.url_title(strtolower($row->title)).'/'.$row->id; ?>">
                                            <div class="hover-element hover-element-1 wow flipInX" data-wow-delay="0.4s" data-wow-duration="0.6s" data-title-position="top,left" style="cursor:pointer;">
                                                <div class="img-film hover-element__initial" rel='popover' style="background:url('<?php echo 'http://116.206.196.146/'.$row->cover?>');background-size:100% auto;width:100%;height:200px;background-position: center center;background-repeat: no-repeat;background-size: cover;">
                                                    <?php if($row->new == 'yes'){ ?>
                                                    <div class="pull-right" style="background:url('<?php echo base_url()?>images/label-harga.png');background-size:100px;width:100%;height:100%;background-position:top right;background-repeat:no-repeat;font-weight:200;font-size:0.9em;">
                                                        <span class="pull-right" style="-webkit-transform: rotate(47deg);-moz-transform: rotate(47deg);color:white;margin-top: 21%;width: 38%;text-align:center;">
                                                        NEW
                                                        </span>
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                                <!--<div class="hover-element__initial" rel='popover'>
                                                    <img alt="Pic" src="<?php echo 'http://116.206.196.146/'.$row->cover?>" />
                                                </div>-->
                                                <div class="hover-element__reveal" data-overlay="9">
                                                    <div class="boxed" style="font-size: 12px">
                                                        <span><?php echo $row->title?></span>
                                                        <span>
                                                            <?php if ($row->durasi<>"" AND $row->durasi > 0) { ?>
                                                            <em><?php echo $row->durasi." Menit"?></em><br>
                                                            <?php } ?>
                                                            <?php if ($director_name <> "") { ?>
                                                            <em><?php echo $director_name?></em><br>
                                                            <?php } ?>
                                                            <?php if ($row->tahun<>"" AND $row->tahun > 0) { ?>
                                                            <em><?php echo $row->tahun?></em>
                                                            <?php } ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                  <?php } ?>
                                </div>
                                <div class="costumNav2" style="width:97.5% !important;">
                                    <span class="cnav2-item prev" data-carouselid="carousel1">
                                        <span class="fa fa-chevron-left"></span>
                                    </span>
                                    <span class="cnav2-item next" data-carouselid="carousel1">
                                        <span class="fa fa-chevron-right"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 list-item-gray" style="margin-top:25px;margin-bottom:25px;">
                        <div class="col-md-12" style="padding-left:170px;padding-right:180px;">
                            <div class="col-md-3">
                                <?php if($lang == "en"){?>
                                <span class="col-md-12 item-left-desc" style="font-size:30px;padding-bottom:6px;">COMING</span>
                                <span class="col-md-12 item-left-head big-text" style="font-size:34px !important;padding-bottom:120px;">SOON</span>
                                <?php }else{?>
                                <span class="col-md-12 item-left-desc" style="font-size:30px;padding-bottom:6px;">SEGERA</span>
                                <span class="col-md-12 item-left-head big-text" style="font-size:34px !important;padding-bottom:120px;">TAYANG</span>
                                <?php }?>
                            </div>
                            <div class="col-md-9">
                                <div class="owl-theme owl-carousel" id="carousel2">
                                  <?php 

                                  $jum = count($coming_soon->result());
                                  #echo $jum;
                                  $no = 0;
                                  while($jum <= 5){
                                  foreach ($coming_soon->result() as $row){
                                    $no= $no + 1;
                                    if($no > 5){
                                        break;
                                    }
                                    $this->db->where('id', trim($row->director_id));
                                    $query_director = $this->db->get('film_director');
                                    if($query_director->num_rows() > 0){
                                      foreach ($query_director->result() as $row_director){
                                        $director_name = $row_director->title;
                                      }
                                    }else{
                                      $director_name = "";
                                    } ?>
                                    <div class="item">
                                        <a href="<?php echo base_url().'detail/index/'.url_title(strtolower($row->title)).'/'.$row->id; ?>">
                                          <div class="hover-element hover-element-1 wow flipInX" data-wow-delay="0.4s" data-wow-duration="0.6s" data-title-position="top,left">
                                              <div class="hover-element__initial" rel='popover'>
                                                  <img alt="Pic" src="<?php echo 'http://116.206.196.146/'.$row->cover?>" />
                                              </div>
                                              <div class="hover-element__reveal" data-overlay="9">
                                                  <div class="boxed"  style="font-size: 12px">
                                                      <span><?php echo $row->title?></span>
                                                      <span>
                                                        <?php if ($row->durasi<>"" AND $row->durasi > 0) { ?>
                                                        <em><?php echo $row->durasi." Menit"?></em><br>
                                                        <?php } ?>
                                                        <?php if ($director_name <> "") { ?>
                                                        <em><?php echo $director_name?></em><br>
                                                        <?php } ?>
                                                        <?php if ($row->tahun<>"" AND $row->tahun > 0) { ?>
                                                        <em><?php echo $row->tahun?></em>
                                                        <?php } ?>
                                                      </span>
                                                  </div>
                                              </div>
                                          </div>
                                        </a>
                                    </div>
                                  <?php } 

                                    if($no > 5){
                                        break;
                                    }

                                    }

                                  ?>
                                </div>
                                <div class="costumNav2" style="width:97.5% !important;">
                                    <span class="cnav2-item prev" data-carouselid="carousel2">
                                        <span class="fa fa-chevron-left"></span>
                                    </span>
                                    <span class="cnav2-item next" data-carouselid="carousel2">
                                        <span class="fa fa-chevron-right"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-12" style="padding-left:170px;padding-right:180px;">
                            <div class="col-md-3">
                                <?php if($lang == "en"){?>
                                <span class="col-md-12 item-left-desc" style="font-size:30px;padding-bottom:6px;">RELATED</span>
                                <span class="col-md-12 item-left-head big-text" style="font-size:34px !important;padding-bottom:120px;">FILMS</span>
                                <?php }else{?>
                                <span class="col-md-12 item-left-desc" style="font-size:30px;padding-bottom:6px;">FILM</span>
                                <span class="col-md-12 item-left-head big-text" style="font-size:34px !important;padding-bottom:120px;">TERKAIT</span>
                                <?php }?>
                            </div>
                            <div class="col-md-9">
                                <div class="owl-theme owl-carousel" id="carousel3">
                                  <!-- DIRECTOR TERKAIT -->
                                  <?php foreach ($film_terkait->result() as $row){
                                    $this->db->where('id', trim($row->director_id));
                                    $query_director = $this->db->get('film_director');
                                    if($query_director->num_rows() > 0){
                                      foreach ($query_director->result() as $row_director){
                                        $director_name = $row_director->title;
                                      }
                                    }else{
                                      $director_name = "";
                                    } ?>
                                    <div class="item">
                                        <a href="<?php echo base_url().'detail/index/'.url_title(strtolower($row->title)).'/'.$row->id; ?>">
                                          <div class="hover-element hover-element-1 wow flipInX" data-wow-delay="0.4s" data-wow-duration="0.6s" data-title-position="top,left">
                                              <div class="hover-element__initial" rel='popover'>
                                                  <img alt="Pic" src="<?php echo 'http://116.206.196.146/'.$row->cover?>" />
                                              </div>
                                              <div class="hover-element__reveal" data-overlay="9">
                                                  <div class="boxed" style="font-size: 12px">
                                                      <span><?php echo $row->title?></span>
                                                      <span>
                                                        <?php if ($row->durasi<>"" AND $row->durasi > 0) { ?>
                                                        <em><?php echo $row->durasi." Menit"?></em><br>
                                                        <?php } ?>
                                                        <?php if ($director_name <> "") { ?>
                                                        <em><?php echo $director_name?></em><br>
                                                        <?php } ?>
                                                        <?php if ($row->tahun<>"" AND $row->tahun > 0) { ?>
                                                        <em><?php echo $row->tahun?></em>
                                                        <?php } ?>
                                                      </span>
                                                  </div>
                                              </div>
                                          </div>
                                        </a>
                                    </div>
                                  <?php } ?>
                                  <!-- FILM PILIHAN 
                                  <?php /*foreach ($film_pilihan->result() as $row){
                                    $this->db->where('id', trim($row->director_id));
                                    $query_director = $this->db->get('film_director');
                                    if($query_director->num_rows() > 0){
                                      foreach ($query_director->result() as $row_director){
                                        $director_name = $row_director->title;
                                      }
                                    }else{
                                      $director_name = "";
                                    } ?>
                                    <div class="item">
                                        <a href="<?php echo base_url().'detail/index/'.url_title(strtolower($row->title)).'/'.$row->id; ?>">
                                          <div class="hover-element hover-element-1 wow flipInX" data-wow-delay="0.4s" data-wow-duration="0.6s" data-title-position="top,left">
                                              <div class="hover-element__initial" rel='popover'>
                                                  <img alt="Pic" src="<?php echo 'http://116.206.196.146/'.$row->cover?>" />
                                              </div>
                                              <div class="hover-element__reveal" data-overlay="9">
                                                  <div class="boxed">
                                                      <h5><?php echo $row->title?></h5>
                                                      <span>
                                                        <?php if ($row->durasi<>"" AND $row->durasi > 0) { ?>
                                                        <em><?php echo $row->durasi." Menit"?></em><br>
                                                        <?php } ?>
                                                        <?php if ($director_name <> "") { ?>
                                                        <em><?php echo $director_name?></em><br>
                                                        <?php } ?>
                                                        <?php if ($row->tahun<>"" AND $row->tahun > 0) { ?>
                                                        <em><?php echo $row->tahun?></em>
                                                        <?php } ?>
                                                      </span>
                                                  </div>
                                              </div>
                                          </div>
                                        </a>
                                    </div>
                                  <?php } */?>
                                  -->
                                </div>
                                <div class="costumNav2" style="width:97.5% !important;">
                                    <span class="cnav2-item prev" data-carouselid="carousel3">
                                        <span class="fa fa-chevron-left"></span>
                                    </span>
                                    <span class="cnav2-item next" data-carouselid="carousel3">
                                        <span class="fa fa-chevron-right"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
<?php }elseif($condition == 'search'){?>
<?php $getcategory = "0"; if(isset($_GET['category'])){ $getcategory = $_GET['category'];}?>
<?php if($getcategory == "film" || $getcategory == "0"){?>
                    <!-- Feature Films -->
                    <div class="col-md-12 list-item"  >
                        <div class="col-md-12" style="padding-left:170px;padding-right:180px;">
                            <div class="col-md-3">
                                <span class="col-md-12 item-left-head" style="font-size:30px;padding-bottom:6px;">FILMS</span>
                                <!--<span class="col-md-12 item-left-desc big-text" style="font-size:34px !important;padding-bottom:120px;">DI BIOSKOP</span>-->
                            </div>
                            <div class="col-md-9">
                                <div class="owl-theme owl-carousel" id="carousel12">
                                  <?php foreach ($list_film->result() as $row){
                                    $this->db->where('id', trim($row->director_id));
                                    $query_director = $this->db->get('film_director');
                                    if($query_director->num_rows() > 0){
                                      foreach ($query_director->result() as $row_director){
                                        $director_name = $row_director->title;
                                      }
                                    }else{
                                      $director_name = "";
                                    } ?>
                                    <div class="item">
                                        <a href="<?php echo base_url().'detail/index/'.url_title(strtolower($row->title)).'/'.$row->id; ?>">
                                            <div class="hover-element hover-element-1 wow flipInX" data-wow-delay="0.4s" data-wow-duration="0.6s" data-title-position="top,left" style="cursor:pointer;">
                                                <!--<div class="img-film hover-element__initial" rel='popover' style="background:url('<?php echo 'http://116.206.196.146/'.$row->cover?>');background-size:100% auto;width:100%;height:235px;">
                                                    <?php if($row->new == 'yes'){ ?>
                                                    <div class="pull-right" style="background:url('<?php echo base_url()?>images/label-harga.png');background-size:100px;width:100%;height:100%;background-position:top right;background-repeat:no-repeat;font-weight:200;font-size:0.9em;">
                                                        <span class="pull-right" style="-webkit-transform: rotate(47deg);-moz-transform: rotate(47deg);color:white;margin-top: 11%;width: 38%;text-align:center;">
                                                        NEW
                                                        </span>
                                                    </div>
                                                    <?php } ?>
                                                </div>-->
                                                <div class="hover-element__initial" rel='popover'>
                                                    <img alt="Pic" src="<?php echo 'http://116.206.196.146/'.$row->cover?>" />
                                                </div>
                                                <div class="hover-element__reveal" data-overlay="9">
                                                    <div class="boxed" style="font-size: 12px">
                                                        <h5><?php echo $row->title?></h5>
                                                        <span>
                                                            <?php if ($row->durasi<>"" AND $row->durasi > 0) { ?>
                                                            <em><?php echo $row->durasi." Menit"?></em><br>
                                                            <?php } ?>
                                                            <?php if ($director_name <> "") { ?>
                                                            <em><?php echo $director_name?></em><br>
                                                            <?php } ?>
                                                            <?php if ($row->tahun<>"" AND $row->tahun > 0) { ?>
                                                            <em><?php echo $row->tahun?></em>
                                                            <?php } ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                  <?php } ?>
                                </div>
                                <div class="costumNav2" style="width:97.5% !important;">
                                    <span class="cnav2-item prev" data-carouselid="carousel12">
                                        <span class="fa fa-chevron-left"></span>
                                    </span>
                                    <span class="cnav2-item next" data-carouselid="carousel12">
                                        <span class="fa fa-chevron-right"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
<?php }?>
<?php if($getcategory == "profile"){?>
                    <div class="col-md-12 list-item-gray">
                        <div class="col-md-12" style="padding-left:170px;padding-right:180px;">
                            <div class="col-md-12">
                                <span class="col-md-12 item-left-head" style="font-size:30px;">PROFILES</span>
                            </div>

                            <div class="col-md-12" style="padding-left: 0px;">
                                <div class="owl-theme owl-carousel" id="carousel110">
                                <?php 
                                $break = 0;
                                foreach ($profile->result() as $row){
                                $break++;
                                if($break>6){break;}
                                ?>
                                    <div class="item" style="padding:10px;">
                                    <?php //echo $link_open?>
                                    <a href="<?php echo site_url('profil/index/director/'.$row->id)?>">
                                        <div class="hover-element hover-element-1 wow flipInX text-center" <?php //echo $popover?> data-wow-delay="0.4s" data-wow-duration="0.6s" data-title-position="top,left" style="cursor:pointer;" name="<?php //echo $link?>">
                                            <div class="img-film hover-element__initial" style="background:url('<?php if(!empty($row->photo)){echo 'http://116.206.196.146/'.$row->photo;}else{echo 'http://116.206.197.44/img/user-demo.png';}?>');background-size:100% auto;width:100%;height:115px;border-radius: 50%;">
                                            </div>
                                        </div>
                                        <div class="bottom-caption text-center" style="margin-top:5px;">
                                            <span class="title" style="font-size:16px;"><?php echo $row->nama?></span><br>
                                            <span class="desc"><?php echo $row->dob_date." ".$row->dob_month." ".$row->dob_year?></span>
                                        </div>
                                    <?php //echo $link_close?>
                                    </a>
                                    </div>
                                <?php } ?>
                                </div>
                                <div class="costumNav3">
                                    <span class="cnav3-item prev" data-carouselid="carousel110"><span class="fa fa-chevron-left"></span></span>
                                    <span class="cnav3-item next" data-carouselid="carousel110"><span class="fa fa-chevron-right"></span></span>
                                </div>
                            </div>

                            <div class="col-md-12" style="padding-left: 0px;">
                                <div class="owl-theme owl-carousel" id="carousel111">
                                <?php 
                                foreach (array_slice($profile->result(),6) as $row){
                                $break++;
                                if($break>13){break;}
                                ?>
                                    <div class="item" style="padding:10px;">
                                    <?php //echo $link_open?>
                                    <a href="<?php echo site_url('profil/index/director/'.$row->id)?>">
                                        <div class="hover-element hover-element-1 wow flipInX text-center" <?php //echo $popover?> data-wow-delay="0.4s" data-wow-duration="0.6s" data-title-position="top,left" style="cursor:pointer;" name="<?php //echo $link?>">
                                            <div class="img-film hover-element__initial" style="background:url('<?php if(!empty($row->photo)){echo 'http://116.206.196.146/'.$row->photo;}else{echo 'http://116.206.197.44/img/user-demo.png';}?>');background-size:100% auto;width:100%;height:115px;border-radius: 50%;">
                                            </div>
                                        </div>
                                        <div class="bottom-caption text-center" style="margin-top:5px;">
                                            <span class="title" style="font-size:16px;"><?php echo $row->nama?></span><br>
                                            <span class="desc"><?php echo $row->dob_date." ".$row->dob_month." ".$row->dob_year?></span>
                                        </div>
                                    <?php //echo $link_close?>
                                    </a>
                                    </div>
                                <?php } ?>
                                </div>
                                <div class="costumNav3">
                                    <span class="cnav3-item prev" data-carouselid="carousel111"><span class="fa fa-chevron-left"></span></span>
                                    <span class="cnav3-item next" data-carouselid="carousel111"><span class="fa fa-chevron-right"></span></span>
                                </div>
                            </div>

                            <div class="col-md-12" style="padding-left: 0px;">
                                <div class="owl-theme owl-carousel" id="carousel112">
                                <?php 
                                foreach (array_slice($profile->result(),13) as $row){
                                $break++;
                                if($break>20){break;}
                                ?>
                                    <div class="item" style="padding:10px;">
                                    <?php //echo $link_open?>
                                    <a href="<?php echo site_url('profil/index/director/'.$row->id)?>">
                                        <div class="hover-element hover-element-1 wow flipInX text-center" <?php //echo $popover?> data-wow-delay="0.4s" data-wow-duration="0.6s" data-title-position="top,left" style="cursor:pointer;" name="<?php //echo $link?>">
                                            <div class="img-film hover-element__initial" style="background:url('<?php if(!empty($row->photo)){echo 'http://116.206.196.146/'.$row->photo;}else{echo 'http://116.206.197.44/img/user-demo.png';}?>');background-size:100% auto;width:100%;height:115px;border-radius: 50%;">
                                            </div>
                                        </div>
                                        <div class="bottom-caption text-center" style="margin-top:5px;">
                                            <span class="title" style="font-size:16px;"><?php echo $row->nama?></span><br>
                                            <span class="desc"><?php echo $row->dob_date." ".$row->dob_month." ".$row->dob_year?></span>
                                        </div>
                                    <?php //echo $link_close?>
                                    </a>
                                    </div>
                                <?php } ?>
                                </div>
                                <div class="costumNav3">
                                    <span class="cnav3-item prev" data-carouselid="carousel112"><span class="fa fa-chevron-left"></span></span>
                                    <span class="cnav3-item next" data-carouselid="carousel112"><span class="fa fa-chevron-right"></span></span>
                                </div>
                            </div>



                        </div>
                    </div>
<?php }?>
<?php if($getcategory == "0"){?>
                    <div class="col-md-12 list-item-gray">
                        <div class="col-md-12" style="padding-left:170px;padding-right:180px;">
                            <div class="col-md-3">
                                <span class="col-md-12 item-left-head" style="font-size:30px;">PROFILES</span>
                            </div>
                            <div class="col-md-9" style="padding-left: 0px;">
                                <div class="owl-theme owl-carousel" id="carousel10">
                                <?php foreach ($profile->result() as $row){?>
                                    <div class="item" style="padding:10px;">
                                    <?php //echo $link_open?>
                                    <a href="<?php echo site_url('profil/index/director/'.$row->id)?>">
                                        <div class="hover-element hover-element-1 wow flipInX text-center" <?php //echo $popover?> data-wow-delay="0.4s" data-wow-duration="0.6s" data-title-position="top,left" style="cursor:pointer;" name="<?php //echo $link?>">
                                            <div class="img-film hover-element__initial" style="background:url('<?php if(!empty($row->photo)){echo 'http://116.206.196.146/'.$row->photo;}else{echo 'http://116.206.197.44/img/user-demo.png';}?>');background-size:100% auto;width:100%;height:115px;border-radius: 50%;">
                                            </div>
                                        </div>
                                        <div class="bottom-caption text-center" style="margin-top:5px;">
                                            <span class="title" style="font-size:16px;"><?php echo $row->nama?></span><br>
                                            <span class="desc"><?php echo $row->dob_date." ".$row->dob_month." ".$row->dob_year?></span>
                                        </div>
                                    <?php //echo $link_close?>
                                    </a>
                                    </div>
                                <?php } ?>
                                </div>
                                <div class="costumNav3">
                                    <span class="cnav3-item prev" data-carouselid="carousel10"><span class="fa fa-chevron-left"></span></span>
                                    <span class="cnav3-item next" data-carouselid="carousel10"><span class="fa fa-chevron-right"></span></span>
                                </div>
                            </div>
                        </div>
                    </div>
<?php }?>
<?php if($getcategory == "company" || $getcategory == "0"){?>
                    <div class="col-md-12 list-item">
                        <div class="col-md-12" style="padding-left:170px;padding-right:180px;">
                            <div class="col-md-3">
                                <span class="col-md-12 item-left-head" style="font-size:30px;">COMPANIES</span>
                            </div>
                            <div class="col-md-9" style="padding-left: 0px;">
                                <div class="owl-theme owl-carousel" id="carousel11">
                                <?php foreach ($company->result() as $row){?>
                                    <div class="item" style="padding:10px;">
                                    <?php //echo $link_open?>
                                    <a href="<?php echo site_url('profil/index/company/'.$row->id)?>">
                                        <div class="hover-element hover-element-1 text-center wow flipInX" <?php //echo $popover?> data-wow-delay="0.4s" data-wow-duration="0.6s" data-title-position="top,left" style="cursor:pointer;" name="<?php //echo $link?>">
                                            <div class="img-film hover-element__initial" style="background:url('<?php if(!empty($row->photo)){echo 'http://116.206.196.146/'.$row->photo;}else{echo 'http://116.206.197.44/img/user-demo.png';}?>');background-size:100% auto;width:100%;height:115px;border-radius: 50%;">
                                            </div>
                                        </div>
                                        <div class="bottom-caption text-center" style="margin-top:5px;">
                                            <span class="title" style="font-size:16px;"><?php echo $row->title?></span><br>
                                            <span class="desc"><?php //echo "DKI Jakarta"?></span>
                                        </div>
                                    <?php //echo $link_close?>
                                    </a>
                                    </div>
                                <?php } ?>
                                </div>
                                <div class="costumNav3">
                                    <span class="cnav3-item prev" data-carouselid="carousel11"><span class="fa fa-chevron-left"></span></span>
                                    <span class="cnav3-item next" data-carouselid="carousel11"><span class="fa fa-chevron-right"></span></span>
                                </div>
                            </div>
                        </div>
                    </div>
<?php }?>
<?php }?>

                <!--end of row-->
                </div>
            </div>
        </section>
        
        <div class="list-featured-bottom" style="padding: 35px 20px 45px 20px;">
            <img src="<?php echo base_url()?>images/banner-biznet.jpg" width="100%">
        </div>

        <footer class="footer-2 text-center-xs bg--dark">
            <div class="container">
                <div class="row" style="vertical-align: middle;margin-left:0 !important;">
                    <img class="logo logo-light " alt="logo" src="<?php echo base_url()?>img/idfc-logo.png" style="border-right: 1px solid white; margin-bottom: 3px;" /> <span class="text-white">All About Indonesian Film</span>
                    <div class="col-md-3 pull-right" style="padding-left:0px;margin-right: 22px !important;">
                        <div class="btn btn--xs btn-danger" id="submitfilm" style="font-weight:300 !important;">Submit Film</div>
                    </div>
                </div>
                <hr style="margin-top: 10px;">
                <div class="col-md-12" style="padding-left:0px;">
                    <div class="col-md-4">
                        <p class="text-white" style="line-height: 20px;text-align:justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
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
                                            <span class="socicon-linkedin"></span>
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
                    <div class="col-md-2" style="padding-left:0px;">
                        <h4 class="text-white">Navigation</h4>
                        <div class="col-md-6" style="padding-left: 0;">
                            <a href="#" style="font-weight: 300 !important;">Home</a>
                            <a href="#" style="font-weight: 300 !important;">WatchFilm</a>
                            <a href="#" style="font-weight: 300 !important;">FilmInfo</a>
                            <a href="#" style="font-weight: 300 !important;">FilmArchive</a>
                        </div>
                        <div class="col-md-6">
                            <a href="#" style="font-weight: 300 !important;">FilmNews</a>
                            <a href="#" style="font-weight: 300 !important;">FilmBlog</a>
                        </div>
                    </div>
                    <div class="col-md-3" style="padding-left:0px;">
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
    <div id="my-popover-container" style="display: none;">
        <div class="popover-title-custom">The Raid 2</div>
        <div class="popover-year">2014</div>
        <div class="popover-genre">Action</div>
        <div class="popover-author">Sutradara: Gareth Evans</div>
        <div class="popover-desc">Sebuah film yang mengenai Rama, lelaki muda yang setelah dibebaskan dari penjara, direkrut oleh keluarga mafia ...</div>
        <div class="popover-more">More Info</div>
        <div>
            <button type="button" class="butt butt-primary sharp">Rp. 15.000,-</button>
        </div>
        <div>
            <button type="button" class="butt butt-null sharp">Tambah Keinginan</button>
        </div>
    </div>

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

            <?php
            $showless = '<div class="col-md-3">';
            $a = 1;
            $posall = strpos($genre,'all');
            if($posall){
              $checkedall2 = "checked";
            }else{
              $checkedall2 = "";
            }
            $showless = $showless.'<input type="checkbox" name="genre" value="All" '.$checkedall2.'> All <br>';
            foreach ($genre_less->result() as $row){
              $checked2 = "";
              if($checkedall2 == ''){
                $gens = explode('-',$genre);
                foreach ($gens as $gen) {
                  if($gen==$row->id){
                    $checked2 = 'checked';
                  }
                }
              }

              $a++;
              $amod = $a % 2;
              if($amod==0){
                $showless = $showless.'<input type="checkbox" name="genre" value="'.$row->id.'" '.$checked2.'> '.$row->title;
                $showless = $showless.'</div><div class="col-md-3">';
              }else{
                $showless = $showless.'<input type="checkbox" name="genre" value="'.$row->id.'" '.$checked2.'> '.$row->title.'<br>';
              }
            }
            $showless = $showless.'</div>';

            $showmore = '<div class="col-md-3">';
            $b = 1;
            $showmore = $showmore.'<input type="checkbox" name="genre" value="All" '.$checkedall2.'> All <br>';
            foreach ($genre_more->result() as $row){
              $checked2 = "";
              if($checkedall2 == ''){
                $gens = explode('-',$genre);
                foreach ($gens as $gen) {
                  if($gen==$row->id){
                    $checked2 = 'checked';
                  }
                }
              }

              $b++;
              $bmod = $b % 5;
              if($bmod==0){
                $showmore = $showmore.'<input type="checkbox" name="genre" value="'.$row->id.'" '.$checked2.'> '.$row->title;
                $showmore = $showmore.'</div><div class="col-md-3">';
              }else{
                $showmore = $showmore.'<input type="checkbox" name="genre" value="'.$row->id.'" '.$checked2.'> '.$row->title.'<br>';
              }
            }
            $showmore = $showmore.'</div>';
            ?>

            var showless2 = '<?php echo $showless?>';
            var showmore2 = '<?php echo $showmore?>';
            var btnmore2 = '<span style="cursor: pointer;color: red;font-size: 12px;font-weight: 200;">Show More <i class="fa fa-sort-down" aria-hidden="true"></i></span>';
            var btnless2 = '<span style="cursor: pointer;color: red;font-size: 12px;font-weight: 200;">Show Less <i class="fa fa-sort-up" aria-hidden="true"></i></span>';

            var showmoregenre = 0;
            $("#btn-show-more-genre").click(function() {
                if(showmoregenre==0){
                    $("#show-more-genre").html(showmore2);
                    $(this).html(btnless2);

                    showmoregenre = 1;
                }else{
                    $("#show-more-genre").html(showless2);
                    $(this).html(btnmore2);

                    showmoregenre = 0;
                }
            });

           $('body').popover({
                selector: "[rel='popover']",
                placement: 'right',
                html: true,
                container: 'body',
                content: function() {
                    return $('#my-popover-container').html();
                },

                // We specify a template in order to set a class (an ID is overwritten) to the popover for styling purposes
                template: '<div class="popover my-popover" role="tooltip"><div class="arrow"></div><div class="popover-content"></div></div>'
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
            var owl12 = $("#carousel12");
            var owl115 = $("#carousel115");
            owl1.owlCarousel({
                items : 4,
                dots: false,
                autoplay: true,
                afterMove: function(){
                    $.fn.carMove(owl1.attr('id'), this);
                }
            });
            owl12.owlCarousel({
                items : 4,
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
                items : 6,
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
            owl115.owlCarousel({
                items : 1,
                dots: false,
                margin: 100,
                autoplay: true,
                afterMove: function(){
                    $.fn.carMove(owl115.attr('id'), this);
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
            $.fn.togglePrev("carousel12",0);
            $.fn.togglePrev("carousel115",0);

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

            $("#search").click(function(){
              var text = $('.text-search').val();
              if (text=='') {
                text = '0';
              }

              var url_search = '<?php echo base_url()?>filminfo/index/'+text;
              window.location = url_search;
            });

            $(".text-search").on('keypress', function (e) {
                var keycode = (e.keyCode ? e.keyCode : e.which);
                if (keycode == '13') {
                    var text = $('.text-search').val();
                      if (text=='') {
                        text = '0';
                      }

                      var url_search = '<?php echo base_url()?>filminfo/index/'+text;
                      window.location = url_search;
                }
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

              var checkboxes3 = document.getElementsByName('length');
              var length = "L";
              for (var i=0, n=checkboxes3.length;i<n;i++)
              {
                  if (checkboxes3[i].checked)
                  {
                      length += "-"+checkboxes3[i].value;
                  }
              }

              var checkboxes4 = document.getElementsByName('genre');
              var genre = "G";
              for (var i=0, n=checkboxes4.length;i<n;i++)
              {
                  if (checkboxes4[i].checked)
                  {
                      genre += "-"+checkboxes4[i].value;
                  }
              }

              var url_search = '<?php echo base_url()?>filminfo/index/'+text+'/'+paid+'/'+length+'/'+genre+'?category='+cat;
              window.location = url_search;
            });

            $('.title-sort a').click(function() {
              var a = $(this).html();
              if(a=='#'){
                a = 'NO';
              }else if(a=='ALL'){
                a = '0';
              }

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

              var checkboxes3 = document.getElementsByName('length');
              var length = "L";
              for (var i=0, n=checkboxes3.length;i<n;i++)
              {
                  if (checkboxes3[i].checked)
                  {
                      length += "-"+checkboxes3[i].value;
                  }
              }

              var checkboxes4 = document.getElementsByName('genre');
              var genre = "G";
              for (var i=0, n=checkboxes4.length;i<n;i++)
              {
                  if (checkboxes4[i].checked)
                  {
                      genre += "-"+checkboxes4[i].value;
                  }
              }

              var url_search = '<?php echo base_url()?>filminfo/index/'+text+'/'+paid+'/'+length+'/'+genre+'?category=profile&alpb='+a;

              window.location = url_search;
            });

            $(".btn-clear-filter").click(function(){
              window.location = '<?php echo base_url()?>filminfo';
            });

            $(".btn-advance-filter").click(function(){
              window.location = '<?php echo base_url()?>filminfo';
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

    <div id="blabla">
        <script type="text/javascript">
            $(document).ready(function(){
                var owl110 = $("#carousel110");
                var owl111 = $("#carousel111");
                var owl112 = $("#carousel112");
                owl110.owlCarousel({
                    items : 6,
                    dots: false,
                    margin: 100,
                    autoplay: true,
                    afterMove: function(){
                        $.fn.carMove(owl110.attr('id'), this);
                    }
                });
                owl111.owlCarousel({
                    items : 6,
                    dots: false,
                    margin: 100,
                    autoplay: true,
                    afterMove: function(){
                        $.fn.carMove(owl111.attr('id'), this);
                    }
                });
                owl112.owlCarousel({
                    items : 6,
                    dots: false,
                    margin: 100,
                    autoplay: true,
                    afterMove: function(){
                        $.fn.carMove(owl112.attr('id'), this);
                    }
                });
                $.fn.togglePrev("carousel110",0);
                $.fn.togglePrev("carousel111",0);
                $.fn.togglePrev("carousel112",0);
            });
        </script>
    </div>

    <style type="text/css">
        .col-md-9>.owl-theme>.owl-wrapper-outer>.owl-wrapper>.owl-item{
            width: 135px !important;
        }
    </style>