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
        <div class="nav-bar nav--absolute nav--fixed" data-fixed-at="200">
            <div class="nav-module logo-module left">
                <a href="<?php echo site_url()?>">
                    <img class="logo logo-dark" alt="logo" src="<?php echo base_url()?>img/idfc-logo-dark.png" />
                    <img class="logo logo-light" alt="logo" src="<?php echo base_url()?>img/idfc-logo.png" />
                </a>
            </div>
            <div class="nav-module menu-module left">
                <ul class="menu">
                    <li class="active">
                        <a href="<?php echo base_url()?>watchfilms">
                            WatchFilms
                        </a>
                    </li>
                    <li>
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
        <div class="col-md-12" style="padding:0;">
            <div class="owl-theme owl-carousel" id="carousel115">


            <?php
            $this->db->select("*");
            $this->db->from("banner");
            $this->db->where("categori","watchfilm");
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

        <section class="project-single-process" id="watchfilms" style="margin-bottom: -40px;">
            <div class="container" style="width: 100%;">
                <div class="row row-list" style="padding:0;">
					<!--kerjaan bayu-->
						<style type="text/css">
								@media (max-width: 767px){
									.list-item-gray {
										padding: 27px;
										background-color: #efefef;
										width: 100%;
									}
									.title-sort-input input[type="text"] {
											border-radius: 0px;
											padding-left: 0px;
											padding-right: 0px;
											width: 100%;
											display: block;
									}
								}
								@media (max-width: 1500px) and (min-width: 767px){
									.list-item-gray {
										padding: 27px;
										background-color: #efefef;
										width: 100%;
									}
								}

						</style>
					<!--batas kerjaan bayu-->
                    <div class="col-md-12 list-item-gray">
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
                                <div class="col-md-11" style="padding-left:0;padding-right:0;">
                                    <span style="font-size: 15px;"><?php if($lang == "en"){?>Search criteria : <?php }else{?>Kriteria Pencarian : <?php }?></span>
                                    <span>
                                        <?php if($lang == "en"){?>
                                        Categories:
                                        <?php }else{?>
                                        Kategori:
                                        <?php }?>
                                        <?php
                                        if ($categories<>'C') {
                                            $pos = strpos($categories, 'all');
                                            if($pos === false){
                                                $cats = explode('-',$categories);
                                                foreach ($cats as $cat) {
                                                    $this->db->select('*');
                                                    $this->db->from('film_category');
                                                    $this->db->where('id', $cat);
                                                    $catselect = $this->db->get();
                                                    foreach ($catselect->result() as $catsel){ ?>
                                                        <a href="#"><?php echo $catsel->title?></a>
                                                        <a href="#" onclick="uncheck('categories','<?php echo $cat?>')">
                                                            <i class="fa fa-close" aria-hidden="true"></i>
                                                        </a>
                                                    <?php }
                                                }
                                            }else{ ?>
                                            <a href="#"><?php if($lang == "en"){?>All<?php }else{?>Semua<?php }?></a> <a href="#" onclick="uncheck('categories','all')"><i class="fa fa-close" aria-hidden="true"></i></a>
                                            <?php }
                                        }else{ ?>
                                            <a href="#"><?php if($lang == "en"){?>All<?php }else{?>Semua<?php }?></a> <a href="#" onclick="uncheck('categories','all')"><i class="fa fa-close" aria-hidden="true"></i></a>
                                        <?php } ?>
                                    </span>
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
                                                <a href="#"><?php if($lang == "en"){?>All<?php }else{?>Semua<?php }?></a> <a href="#" onclick="uncheck('paid','all')"><i class="fa fa-close" aria-hidden="true"></i></a>
                                            <?php }
                                        }else{ ?>
                                            <a href="#"><?php if($lang == "en"){?>All<?php }else{?>Semua<?php }?></a> <a href="#" onclick="uncheck('paid','all')"><i class="fa fa-close" aria-hidden="true"></i></a>
                                        <?php } ?>
                                    </span>
                                    <span>
                                        <?php if($lang == "en"){?>
                                        Length:
                                        <?php }else{?>
                                        Panjang:
                                        <?php }?>
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
                                                <a href="#"><?php if($lang == "en"){?>All<?php }else{?>Semua<?php }?></a> <a href="#" onclick="uncheck('length','all')"><i class="fa fa-close" aria-hidden="true"></i></a>
                                            <?php }
                                        }else{ ?>
                                            <a href="#"><?php if($lang == "en"){?>All<?php }else{?>Semua<?php }?></a> <a href="#" onclick="uncheck('length','all')"><i class="fa fa-close" aria-hidden="true"></i></a>
                                        <?php } ?>
                                    </span>
                                </div>
                                <div class="col-md-1 pull-right">
                                    <input type="button" class="btn-advance-filter" value="Reset">
                                </div>
                                <div class="clearfix"></div>
                            </div>
							<!--kerjaan bayu-->
							<style type="text/css">
								@media (max-width: 767px){
									.advance-filter-body {
										color: black;
										font-size: 14px;
										background-color: #56c4c6;
										width: 100%;
										padding: 5px 10px 5px 10px;
									}
								}
							</style>
							<!--batas kerjaan bayu-->
                            <div class="text-left label-bold advance-filter-body" style="min-height: 420px;background-color: #56c4c6;">
                                <!-- <div class="col-md-2">
                                    <span style="font-style:italic;" class="label-bold">Type</span>
                                </div>
                                <div class="col-md-10" style="padding-bottom: 10px;">
                                    <div class="col-md-4">
                                        <input type="radio" name="type" value="film"> Film<br>
                                        <input type="radio" name="type" value="profile"> Profile
                                    </div>
                                    <div class="col-md-4">
                                        <input type="radio" name="type" value="perusahaan"> Perusahaan <br>
                                        <input type="radio" name="type" value="producer"> Producer
                                    </div>
                                    <div class="col-md-4">
                                        <input type="radio" name="type" value="director"> Director
                                    </div>
                                </div> -->
                                <div class="col-md-2" style="padding-left: 0px;"><!--kerjaan bayu-->
                                    <span style="font-style:italic;" class="label-bold"><?php if($lang == "en"){?>Categories<?php }else{?>Kategori<?php }?></span>
                                </div>
                                <div class="col-md-10" id="show-more-category" style="padding-left: 0px;"><!--kerjaan bayu-->
                                    <div class="col-md-4" style="padding-left: 0px;"><!--kerjaan bayu-->
                                    <?php
                                    $a = 1;

                                    $posall = strpos($categories,'all');
                                    if($posall){
                                      $checkedall = "checked='true'";
                                    }else{
                                      $checkedall = "";
                                    }
                                    echo '<input type="checkbox" class="search-advance" name="categories" value="all" '.$checkedall.'> All <br>';

                                    foreach ($category_less->result() as $row){
                                      $checked = "";
                                      if($checkedall == ''){
                                        $cats = explode('-',$categories);
                                        foreach ($cats as $cat) {
                                          if($cat==$row->id){
                                            $checked = 'checked="true"';
                                          }
                                        }
                                      }

                                      $a++;
                                      $amod = $a % 2;
                                      if($amod==0){
                                        echo '<input type="checkbox" class="search-advance" name="categories" value="'.$row->id.'" '.$checked.'> '.$row->title;
                                        echo '</div><div class="col-md-4" style="padding-left: 0px;">';/*--kerjaan bayu--*/
                                      }else{
                                        echo '<input type="checkbox" class="search-advance" name="categories" value="'.$row->id.'" '.$checked.'> '.$row->title.'<br>';
                                      }
                                    }
                                    ?>
                                    </div>
                                </div>
                                <div class="col-md-12 text-center" id="btn-show-more-category" style="padding-bottom: 10px;">
                                    <span style="cursor: pointer;color: red;font-size: 12px;font-weight: 200;"><?php echo $this->session->userdata('Show More');?><i class="fa fa-sort-down" aria-hidden="true"></i></span>
                                </div>
                                <div class="col-md-2" style="padding-left: 0px;"><!--kerjaan bayu-->
                                    <span style="font-style:italic;" class="label-bold"><?php if($lang == "en"){?>Free / Paid<?php }else{?>Gratis / Berbayar<?php }?></span>
                                </div>
                                <div class="col-md-10" style="padding-bottom: 10px;padding-left: 0px;"><!--kerjaan bayu-->
                                    <div class="col-md-4" style="padding-left: 0px;"><!--kerjaan bayu-->
                                        <input type="checkbox" class="search-advance" name="paid" value="all" <?php if(strpos($paid,'all') !== false){ echo "checked='true'"; }?>> All (<?php echo $film_total?>)<br>
                                        <input type="checkbox" class="search-advance" name="paid" value="free" <?php if(strpos($paid,'free') !== false){ echo "checked='true'"; }?>> Free Movies (<?php echo $film_free?>)
                                    </div>
                                    <div class="col-md-4" style="padding-left: 0px;"><!--kerjaan bayu-->
                                        <input type="checkbox" class="search-advance" name="paid" value="paid" <?php if(strpos($paid,'paid') !== false){ echo "checked='true'"; }?>> Paid Movies (<?php echo $film_paid?>) <br>
                                        <input type="checkbox" class="search-advance" name="paid" value="0.15" <?php if(strpos($paid,'0.15') !== false){ echo "checked='true'"; }?>> Paid 0 - 15.000
                                    </div>
                                    <div class="col-md-4" style="padding-left: 0px;"><!--kerjaan bayu-->
                                        <input type="checkbox" class="search-advance" name="paid" value="15.50" <?php if(strpos($paid,'15.50') !== false){ echo "checked='true'"; }?>> Paid 15.000 - 50.000 <br>
                                        <input type="checkbox" class="search-advance" name="paid" value="50.100" <?php if(strpos($paid,'50.100') !== false){ echo "checked='true'"; }?>> Paid 50.000 - 100.000
                                    </div>
                                </div>
                                <div class="col-md-2" style="padding-left: 0px;"><!--kerjaan bayu-->
                                    <span style="font-style:italic;" class="label-bold"><?php if($lang == "en"){?>Year<?php }else{?>Tahun<?php }?></span>
                                </div>
								<!--kerjaan bayu-->
									<style type="text/css">
										#year-start{
											padding:4px;
											border-radius:4px;
										}
										@media(max-width:992px){
											.from-till{
												margin-left: 15px;
											}
											.from-till .filter-year{
												margin-left: 25px;
											}
											#year-end{
												margin-left:38px;
											}
										}
										@media(min-width:992px){
											#year-start{
												margin-left: 25px;
											}
											.from-till{
												margin-left: 0px;
											}
										}

									</style>
								<!--batas kerjaan bayu-->
                                <div class="col-md-10 from-till" style="padding-bottom: 10px;padding-left: 0px;"><!--kerjaan bayu-->
                                    From
                                    <select name="year-start" id="year-start" class="filter-year search-advance" style=""><!--kerjaan bayu-->
                                      <option value="0">All</option>
                                      <?php
                                      for($i=date('Y'); $i>=1912; $i-=1){ ?>
                                        <option value="<?php echo $i?>" <?php if($year1==$i){ echo 'selected="true"'; } ?>><?php echo $i?></option><?php
                                      }
                                      ?>
                                    </select>
                                   <!--kerjaan bayu-->
										<style type="text/css">
											<!--@media(min-width:992px){
												#year-end{
													margin-left:38px;
												}
											}-->
											@media(max-width:1300px){
												#year-end{
													margin-left:39px;
												}
											}
										</style>
									<!--batas kerjaan bayu-->
									<br><br><!--kerjaan bayu-->
                                   <span style="margin-left: 2px;"> Till</span><!--kerjaan bayu-->
                                    <select name="year-end" id="year-end" class="filter-year search-advance" style="padding:4px;border-radius:4px;"><!--kerjaan bayu-->
                                      <option value="0">All</option>
                                      <?php
                                      for($i=date('Y'); $i>=1912; $i-=1){ ?>
                                        <option value="<?php echo $i?>" <?php if($year2==$i){ echo 'selected="true"'; } ?>><?php echo $i?></option><?php
                                      }
                                      ?>
                                    </select>
                                </div>
                                <div class="col-md-2" style="padding-left: 0px;"><!--kerjaan bayu-->
                                    <span style="font-style:italic;" class="label-bold"><?php if($lang == "en"){?>Length<?php }else{?>Pajang<?php }?></span>
                                </div>
                                <div class="col-md-10" style="padding-bottom: 10px;padding-left: 0px;"><!--kerjaan bayu-->
                                    <div class="col-md-4" style="padding-left: 0px;"><!--kerjaan bayu-->
                                        <input type="checkbox" class="search-advance" name="length" value="all" <?php if(strpos($length,'all') !== false){ echo "checked='true'"; }?>> All<br>
                                        <input type="checkbox" class="search-advance" name="length" value="0.35" <?php if(strpos($length,'0.35') !== false){ echo "checked='true'"; }?>> 0 - 35 (<?php echo $film_durasi_0_35?>)
                                    </div>
                                    <div class="col-md-4" style="padding-left: 0px;"><!--kerjaan bayu-->
                                        <input type="checkbox" class="search-advance" name="length" value="35.45" <?php if(strpos($length,'35.45') !== false){ echo "checked='true'"; }?>> 35 - 45 (<?php echo $film_durasi_35_45?>) <br>
                                        <input type="checkbox" class="search-advance" name="length" value="45.60" <?php if(strpos($length,'45.60') !== false){ echo "checked='true'"; }?>> 45 - 60 (<?php echo $film_durasi_45_60?>)
                                    </div>
                                    <div class="col-md-4" style="padding-left: 0px;"><!--kerjaan bayu-->
                                        <input type="checkbox" class="search-advance" name="length" value="60" <?php if(strpos($length,'60') !== false){ echo "checked='true'"; }?>> More than 60 (<?php echo $film_durasi_60?>)
                                    </div>
                                </div>
                                <div class="col-md-2" style="padding-left: 0px;"><!--kerjaan bayu-->
                                    <span style="font-style:italic;" class="label-bold">Genre</span>
                                </div>
                                <div class="col-md-10" id="show-more-genre" style="padding-left: 0px;"><!--kerjaan bayu-->
                                  <div class="col-md-3" style="padding-left: 0px;"><!--kerjaan bayu-->
                                  <?php
                                  $a = 1;

                                  $posall = strpos($genre,'all');
                                  if($posall){
                                    $checkedall2 = "checked='true'";
                                  }else{
                                    $checkedall2 = "";
                                  }
                                  echo '<input class="search-advance" type="checkbox" name="genre" value="all" '.$checkedall2.'> All <br>';
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
                                      echo '<input class="search-advance" type="checkbox" name="genre" value="'.$row->id.'" '.$checked2.'> '.$row->title;
                                      echo '</div><div class="col-md-3" style="padding-left: 0px;">';/*--kerjaan bayu--*/
                                    }else{
                                      echo '<input class="search-advance" type="checkbox" name="genre" value="'.$row->id.'" '.$checked2.'> '.$row->title.'<br>';
                                    }
                                  }
                                  ?>
                                  </div>
                                </div>
                                <div class="col-md-12 text-center" id="btn-show-more-genre" style="padding-bottom: 10px;">
                                    <span style="cursor: pointer;color: red;font-size: 12px;font-weight: 200;"><?php echo $this->session->userdata('Show More');?> <i class="fa fa-sort-down" aria-hidden="true"></i></span>
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
                                    <button class="btn-apply-filter"><?php echo $this->session->userdata('Apply Filters');?></button>
                                </div>
                                <div class="col-md-6 text-center" style="padding-bottom: 10px;">
                                    <button class="btn-clear-filter"><?php echo $this->session->userdata('Clear Filters');?></button>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        </center>
                    </div>

                    <?php $itemlist = 1; ?>

                    <!-- Feature Films -->
                    <?php if($shortfilm_list=="show"){
                      $itemlist++;
                      $item_mod = $itemlist % 2;
                      $style = "list-item-gray";
                      if($item_mod==0){
                        $style = "list-item";
                      }
                    ?>
                    <div class="col-md-12 <?php echo $style?>">
                        <div class="col-md-12">
                            <div class="col-md-2">
                                <span class="col-md-12 item-left-head">FILMS</span>
                                <span class="col-md-12 item-left-seemore"><a href="<?php echo base_url()?>watchfilms/category/22/<?php if($search_url!="0")echo $search_url;?>" class="link_seemore"><?php echo $this->session->userdata('see more');?> ></a></span>
                            </div>
                            <div class="col-md-10" style="padding-left: 0px;">
                                <div class="owl-theme owl-carousel" id="carousel12">
                                  <?php if(!empty($film_profile))foreach ($film_profile->result() as $row){
                                    if($row->title != ""){
                                    $this->db->where('id', trim($row->director_id));
                                    $query_director = $this->db->get('film_director');
                                    if($query_director->num_rows() > 0){
                                        foreach ($query_director->result() as $row_director){
                                            $director_name = $row_director->title;
                                        }
                                    }else{
                                        $director_name = "";
                                    }

                                    if($row->harga_streaming == '0'){
                                      $harga = "FREE";
                                      $link_open = '<a href="'.base_url().'detail/index/'.url_title(strtolower($row->title)).'/'.$row->id.'">';
                                      $link_close = '</a>';
                                      $popover = "";
                                      $link = base_url().'detail/index/'.url_title(strtolower($row->title)).'/'.$row->id;
                                    }else{
                                      $harga = number_format($row->harga_streaming,0,',','.');
                                      $link_open = '';
                                      $link_close = '';
                                      $popover = "rel='popover'";
                                      $link = base_url().'detail/index/'.url_title(strtolower($row->title)).'/'.$row->id;
                                    }
                                        $cover = "http://116.206.196.146/".$row->cover."";
                                        $cover = str_replace("filmdata/thumb","filmdata/images/thumb",$cover);
                                        $cover = str_replace(' ', '%20', $cover);
                                        $url=getimagesize($cover);
                                        if(!is_array($url)){
                                             $cover = base_url()."img/not_available_image.png";
                                        }
                                    ?>
                                    <div class="item" style="padding-right: 10px;">
                                      <?php echo $link_open?>
                                        <div class="hover-element hover-element-1 wow flipInX" <?php echo $popover?> data-wow-delay="0.4s" data-wow-duration="0.6s" data-title-position="top,left" style="cursor:pointer;" name="<?php echo $link?>">
                                            <div class="img-film hover-element__initial" style="background:url('<?php echo $cover?>');background-size:100% auto;width:100%;height:235px;">
                                              <?php if($harga <> 'FREE'){ ?>
                                              <div class="pull-right" style="background:url('<?php echo base_url()?>images/label-harga.png');background-size:100px;width:100%;height:100%;background-position:top right;background-repeat:no-repeat;font-weight:200;font-size:0.9em;">
                                                <span class="pull-right" style="-webkit-transform: rotate(47deg);-moz-transform: rotate(47deg);color:white;margin-top: 11%;width: 40%;text-align:center;">
                                                  <?php echo $harga?>
                                                </span>
                                              </div>
                                              <?php } ?>
                                            </div>
                                            <div class="hover-element__reveal" data-overlay="9">
                                                <div class="boxed" style="padding-top:20%;">
                                                  <h5 style="font-size:13px;"><?php echo $row->title?></h5>
                                                  <h6><?php echo $row->durasi?> Menit</h6>
                                                  <h6><?php echo $director_name?></h6>
                                                  <span>
                                                      <em><?php echo $row->tahun?></em>
                                                  </span>
                                                </div>
                                            </div>
                                        </div>
                                      <?php echo $link_close?>
                                    </div>
                                  <?php } }?>
                                </div>
                                <div class="costumNav2">
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
                    <?php } ?>

                     <div class="col-md-12">&nbsp;</div>

                    <!-- Profile -->
                    <?php if($foreign_list=="show"){
                      $itemlist++;
                      $item_mod = $itemlist % 2;
                      $style = "list-item-gray";
                      if($item_mod==0){
                        $style = "list-item";
                      }
                    ?>
                    <div class="col-md-12 <?php echo $style?>">
                        <div class="col-md-12">
                            <div class="col-md-2">
                                <span class="col-md-12 item-left-head" style="font-size:30px;">PROFILES</span>
                                <span class="col-md-12 item-left-seemore"><a href="<?php echo base_url()?>filminfo/index/<?php echo $text;?>/P/L/G?category=profile" class="link_seemore"><?php echo $this->session->userdata('see more');?> ></a></span>
                            </div>
                            <div class="col-md-10" style="padding-left: 0px;">
                                <div class="owl-theme owl-carousel" id="carousel10">
                                <?php foreach ($profile->result() as $row){?>
                                    <div class="item" style="padding:10px;">
                                    <?php //echo $link_open?>
                                    <a href="<?php echo site_url('profil/index/director/'.$row->id)?>">
                                        <div class="hover-element hover-element-1 text-center wow flipInX" <?php //echo $popover?> data-wow-delay="0.4s" data-wow-duration="0.6s" data-title-position="top,left" style="cursor:pointer;" name="<?php //echo $link?>">
                                            <div class="img-film hover-element__initial" rel='popover' style="background:url('<?php if(!empty($row->photo)){
                                                if(strpos($row->photo, 'uploads/') !== false){
                                                    echo 'http://116.206.196.146/'.$row->photo;
                                                }else if(strpos($row->photo, 'filmdata/') !== false){
                                                    echo 'http://116.206.196.146/'.$row->photo;
                                                }else{
                                                    echo 'http://116.206.196.146/uploads/'.$row->photo;
                                                }
                                            }else{echo 'http://116.206.196.146/idfilm/public/uploads/images/profile/no-image.jpg';}?>');background-size:100% auto;width:100%;height:115px;border-radius: 50%;">
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
                    <?php } ?>

                    <!-- Profile -->
                    <?php if($foreign_list=="show"){
                      $itemlist++;
                      $item_mod = $itemlist % 2;
                      $style = "list-item-gray";
                      if($item_mod==0){
                        $style = "list-item";
                      }
                    ?>
                    <div class="col-md-12 <?php echo $style?>">
                        <div class="col-md-12">
                            <div class="col-md-2">
                                <span class="col-md-12 item-left-head" style="font-size:30px;">COMPANIES</span>
                                <span class="col-md-12 item-left-seemore"><a href="<?php echo base_url()?>filminfo/index/<?php echo $text;?>/P/L/G?category=company" class="link_seemore"><?php echo $this->session->userdata('see more');?> ></a></span>
                            </div>
                            <div class="col-md-10" style="padding-left: 0px;">
                                <div class="owl-theme owl-carousel" id="carousel11">
                                <?php foreach ($company->result() as $row){?>
                                    <div class="item" style="padding:10px;">
                                    <?php //echo $link_open?>
                                    <a href="<?php echo site_url('profil/index/company/'.$row->id)?>">
                                        <div class="hover-element hover-element-1 text-center wow flipInX" <?php //echo $popover?> data-wow-delay="0.4s" data-wow-duration="0.6s" data-title-position="top,left" style="cursor:pointer;" name="<?php //echo $link?>">
                                            <div class="img-film hover-element__initial" rel='popover' style="background:url('<?php if(!empty($row->photo) || !empty($row->logo)){
                                                if(strpos($row->logo, 'filmdata/') !== false || strpos($row->logo, 'uploads/') != false){
                                                    echo 'http://116.206.196.146/'.$row->logo;
                                               }else if(strpos($row->logo, 'uploads/') !== false){
                                                    echo 'http://116.206.196.146/'.$row->logo;
                                                }else{
                                                    echo 'http://116.206.196.146/uploads/'.$row->logo;
                                                }
                                            }else{echo 'http://116.206.196.146/idfilm/public/uploads/images/profile/no-image.jpg';}?>');background-size:100% auto;width:100%;height:115px;border-radius: 50%;">
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
                    <?php } ?>

                    <div class="col-md-12">&nbsp;</div>

                    <!-- All FILMS -->

                    <?php

                    function left_title($id){
                        if($id == 2){
                            return "
                            <span class='col-md-12 item-left-head'>FEATURE</span>
                            <span class='col-md-12 item-left-desc big-text' style='padding-bottom:122px;'>FILMS</span><br>
                            ";
                        }
                    }

                    foreach ($all_film as $key => $value) {
                        $key++;
                        $itemlist++;
                        $item_mod = $itemlist % 2;
                        $style = "list-item-gray";
                        if($item_mod==0){
                            $style = "list-item";
                        }

                        if($value['id'] == 2){
                    ?>
                    <div class="col-md-12 <?php echo $style?>">
                        <div class="col-md-12">
                            <div class="col-md-2">
                                <!--<span class="col-md-12 item-left-head">FEATURE</span>-->
                                <?php if($lang == "en"){?>
                                <span class="col-md-12 item-left-head">FEATURE</span>
                                <span class="col-md-12 item-left-desc big-text" style="padding-bottom:122px;">FILMS</span><br>
                                <?php }else{?>
                                <span class="col-md-12 item-left-head">FILM</span>
                                <span class="col-md-12 item-left-desc big-text" style="padding-bottom:122px;font-size: 29px !important;">LAYAR LEBAR</span><br>
                                <?php }?>
                                <span class="col-md-12 item-left-seemore"><a href="<?php echo base_url()?>watchfilms/category/<?php echo $value['id']?><?php if($search_url!="0")echo $search_url;?>" class="link_seemore"><?php echo $this->session->userdata('see more');?> ></a></span>
                            </div>
                            <div class="col-md-10" style="padding-left: 0px;">
                                <div class="owl-theme owl-carousel" id="carousel<?php echo $key;?>">
                                  <?php
                                    foreach ($value['data'] as $row){
                                    $this->db->where('id', trim($row->director_id));
                                    $query_director = $this->db->get('film_director');
                                    if($query_director->num_rows() > 0){
                                        foreach ($query_director->result() as $row_director){
                                            $director_name = $row_director->title;
                                        }
                                    }else{
                                        $director_name = "";
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
                                      <?php //echo $link_open?>
                                      <a style="cursor: pointer;" onclick="openmovie('<?php echo $row->id?>','<?php echo $row->category_id?>','<?php echo $link?>')">
                                        <div class="hover-element hover-element-1 wow flipInX" <?php echo $popover?> data-wow-delay="0.4s" data-wow-duration="0.6s" data-title-position="top,left" style="cursor:pointer;" name="<?php echo $link?>">
                                            <div class="img-film hover-element__initial" style="background:url('<?php echo 'http://116.206.196.146/'.$row->cover?>');background-color:#000;background-size:auto 100%;width:100%;height:235px;background-position:top center;background-repeat:no-repeat;">
                                              <?php if($harga <> 'FREE'){ ?>
                                              <div class="pull-right" style="background:url('<?php echo base_url()?>images/label-harga.png');background-size:100px;width:100%;height:100%;background-position:top right;background-repeat:no-repeat;font-weight:200;font-size:0.9em;">
                                                <span class="pull-right" style="-webkit-transform: rotate(47deg);-moz-transform: rotate(47deg);color:white;margin-top: 11%;width: 40%;text-align:center;">
                                                  <?php echo $harga?>
                                                </span>
                                              </div>
                                              <?php } ?>
                                            </div>
                                            <div class="hover-element__reveal" data-overlay="9">
                                                <div class="boxed" style="padding-top:25%;font-weight:200 !important;">
                                                    <h5 style="font-weight:200 !important;"><?php if($lang == "en"){echo $row->title_eng;}else{echo $row->title;}?></h5>
                                                    <span>
                                                        <?php if ($row->durasi<>"" AND $row->durasi > 0) { ?>
                                                        <em><?php echo $row->durasi." Menit"?></em><br>
                                                        <?php } ?>
                                                        <?php if ($director_name <> "") { ?>
                                                        <?php echo $director_name?><br>
                                                        <?php } ?>
                                                        <?php if ($row->tahun<>"" AND $row->tahun > 0) { ?>
                                                        <em><?php echo $row->tahun?></em>
                                                        <?php } ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                      <?php //echo $link_close?>
                                      </a>
                                    </div>
                                  <?php } ?>
                                </div>
                                <div class="costumNav2">
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


                    <div class="col-md-12 <?php echo $style?>">
                        <div class="col-md-12">
                            <div class="col-md-2">
                                <!--<span class="col-md-12 item-left-head">FEATURE</span>-->
                                <?php if($lang == "en"){?>
                                <span class="col-md-12 item-left-head">DVD /</span>
                                <span class="col-md-12 item-left-desc big-text" style="padding-bottom:122px;"> VCD</span><br>
                                <?php }else{?>
                                <span class="col-md-12 item-left-head">DVD /</span>
                                <span class="col-md-12 item-left-desc big-text" style="padding-bottom:122px;"> VCD</span><br>
                                <?php }?>
                                <span class="col-md-12 item-left-seemore"><a href="<?php echo base_url()?>watchfilms/category/<?php echo "21";?><?php if($search_url!="0")echo $search_url;?>" class="link_seemore"><?php echo $this->session->userdata('see more');?> ></a></span>
                            </div>
                            <div class="col-md-10" style="padding-left: 0px;">
                                <div class="owl-theme owl-carousel" id="carousel21">
                                  <?php
                                    foreach ($dvdvcd as $row){
                                    $this->db->where('id', trim($row->director_id));
                                    $query_director = $this->db->get('film_director');
                                    if($query_director->num_rows() > 0){
                                        foreach ($query_director->result() as $row_director){
                                            $director_name = $row_director->title;
                                        }
                                    }else{
                                        $director_name = "";
                                    }

                                    //if($row->streaming_price == '0'){
                                        if($row->dvd_price == '0'){
                                            if($row->vcd_price == '0'){
                                                $harga = "FREE";
                                                $link_open = '<a href="'.base_url().'detail/index/'.url_title(strtolower($row->title)).'/'.$row->id.'">';
                                                $link_close = '</a>';
                                                $popover = "";
                                                $link = base_url().'detail/index/'.url_title(strtolower($row->title)).'/'.$row->id;
                                            }else{
                                            $harga = number_format($row->vcd_price,0,',','.');
                                            $link_open = '';
                                            $link_close = '';
                                            $popover = "rel='popover'";
                                            $link = base_url().'detail/index/'.url_title(strtolower($row->title)).'/'.$row->id;
                                            }
                                        }else{
                                            $harga = number_format($row->dvd_price,0,',','.');
                                            $link_open = '';
                                            $link_close = '';
                                            $popover = "rel='popover'";
                                            $link = base_url().'detail/index/'.url_title(strtolower($row->title)).'/'.$row->id;
                                        }
                                    /*}else{
                                      $harga = number_format($row->price,0,',','.');
                                      $link_open = '';
                                      $link_close = '';
                                      $popover = "rel='popover'";
                                      $link = base_url().'detail/index/'.url_title(strtolower($row->title)).'/'.$row->id;
                                    }*/
                                    ?>
                                    <div class="item">
                                      <?php //echo $link_open?>
                                      <a style="cursor: pointer;" onclick="openmovie('<?php echo $row->id?>','<?php echo $row->category_id?>','<?php echo $link?>')">
                                        <div class="hover-element hover-element-1 wow flipInX" <?php echo $popover?> data-wow-delay="0.4s" data-wow-duration="0.6s" data-title-position="top,left" style="cursor:pointer;" name="<?php echo $link?>">
                                            <div class="img-film hover-element__initial" style="background:url('<?php echo 'http://116.206.196.146/'.$row->cover?>');background-color:#000;background-size:auto 100%;width:100%;height:235px;background-position:top center;background-repeat:no-repeat;">
                                              <?php if($harga <> 'FREE'){ ?>
                                              <div class="pull-right" style="background:url('<?php echo base_url()?>images/label-harga.png');background-size:100px;width:100%;height:100%;background-position:top right;background-repeat:no-repeat;font-weight:200;font-size:0.9em;">
                                                <span class="pull-right" style="-webkit-transform: rotate(47deg);-moz-transform: rotate(47deg);color:white;margin-top: 11%;width: 40%;text-align:center;">
                                                  <?php echo $harga?>
                                                </span>
                                              </div>
                                              <?php } ?>
                                            </div>
                                            <div class="hover-element__reveal" data-overlay="9">
                                                <div class="boxed" style="padding-top:25%;font-weight:200 !important;">
                                                    <h5 style="font-weight:200 !important;"><?php if($lang == "en"){echo $row->title_eng;}else{echo $row->title;}?></h5>
                                                    <span>
                                                        <?php if ($row->durasi<>"" AND $row->durasi > 0) { ?>
                                                        <em><?php echo $row->durasi." Menit"?></em><br>
                                                        <?php } ?>
                                                        <?php if ($director_name <> "") { ?>
                                                        <?php echo $director_name?><br>
                                                        <?php } ?>
                                                        <?php if ($row->tahun<>"" AND $row->tahun > 0) { ?>
                                                        <em><?php echo $row->tahun?></em>
                                                        <?php } ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                      <?php //echo $link_close?>
                                      </a>
                                    </div>
                                  <?php } ?>
                                </div>
                                <div class="costumNav2">
                                    <span class="cnav2-item prev" data-carouselid="carousel21">
                                        <span class="fa fa-chevron-left"></span>
                                    </span>
                                    <span class="cnav2-item next" data-carouselid="carousel21">
                                        <span class="fa fa-chevron-right"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                        }elseif($value['id'] == 10){
                    ?>

                        <div class="col-md-12 <?php echo $style?>">
                            <div class="col-md-12">
                                <div class="col-md-2">
                                <?php if($lang == "en"){?>
                                    <span class="col-md-12 item3-left-head">FILM</span>
                                    <span class="col-md-12 item3-left-desc">TRAILERS</span><br>
                                <?php }else{?>
                                    <span class="col-md-12 item3-left-head">FILM</span>
                                    <span class="col-md-12 item3-left-desc">TRAILER</span><br>
                                <?php }?>
                                    <span class="col-md-12 item-left-seemore"><a href="<?php echo base_url()?>watchfilms/category/<?php echo $value['id']?><?php if($search_url!="0")echo $search_url;?>" class="link_seemore"><?php echo $this->session->userdata('see more');?> ></a></span>
                                </div>
                                <div class="col-md-10" style="padding-left: 0px;">
                                    <div class="owl-theme owl-carousel" id="carousel<?php echo $key;?>">


                                      <?php foreach ($value['data'] as $row){
                                        $this->db->where('id', trim($row->company_id));
                                        $query_company = $this->db->get('film_company');
                                        if($query_company->num_rows() > 0){
                                            foreach ($query_company->result() as $row_company){
                                                $company_name = $row_company->title;
                                            }
                                        }else{
                                            $company_name = "";
                                        }

                                        $full_film = $this->db->select("id_full_film")->from("film_list")->where("id",$row->id)->get()->result();

                                        #echo $row->id_full_film;

                                        if(empty($row->id_full_film)){
                                            $row->category_id = 6;
                                            $link = "";
                                        }else{
                                            $full_film = $this->db->select("*")->from("film_list")->where("id",$row->id_full_film)->get()->result();
                                            $link = base_url().'detail/index/'.url_title(strtolower($full_film[0]->title)).'/'.$full_film[0]->id;
                                        }
                                        #print_r($full_film[0]->id_full_film);
                                        #print_r($row->id_full_film);
                                        #print_r($link);
                                        #exit();

                                        if($row->streaming_price == '0'){
                                          $harga = "FREE";
                                          $link_open = '<a href="'.base_url().'detail/index/'.url_title(strtolower($row->title)).'/'.$row->id_full_film.'">';
                                          $link_close = '</a>';
                                          $popover = "";
                                        }else{
                                          $harga = number_format($row->streaming_price,0,',','.');
                                          $link_open = '';
                                          $link_close = '';
                                          $popover = "rel='popover'";
                                        }

                                        $cover = "http://116.206.196.146/".$row->cover."";
                                        $cover = str_replace("filmdata/thumb","filmdata/images/thumb",$cover);

                                        ?>
                                        <div class="item">
                                          <?php //echo $link_open?>
                                          <a style="cursor: pointer;" onclick="openmovie('<?php echo $row->id?>','<?php echo $row->category_id?>','<?php echo $link?>')">
                                            <div class="hover-element hover-element-1 wow flipInX" <?php echo $popover?> data-wow-delay="0.4s" data-wow-duration="0.6s" data-title-position="top,left" style="cursor:pointer;" name="<?php echo $link?>">
                                                <div class="img-film hover-element__initial" style="background:url('<?php echo $cover?>');background-size:auto 100%;width:100%;height:135px;background-position:top center;background-repeat:no-repeat;background-color:#000;">
                                                <?php if($harga <> 'FREE'){ ?>
                                                  <div class="pull-right" style="background:url('<?php echo base_url()?>images/label-harga.png');background-size:100px;width:100%;height:100%;background-position:top right;background-repeat:no-repeat;font-weight:200;font-size:0.9em;">
                                                    <span class="pull-right" style="-webkit-transform: rotate(47deg);-moz-transform: rotate(47deg);color:white;margin-top: 9%;width: 22%;text-align:center;">
                                                      <?php echo $harga?>
                                                    </span>
                                                  </div>
                                                <?php } ?>
                                                </div>
                                                <?php
                                                $this->db->select("title");
                                                $this->db->from("film_director");
                                                $this->db->where("id",$row->director_id);
                                                $sutradara = $this->db->get()->result();
                                                ?>
                                                <div class="hover-element__reveal" data-overlay="9">
                                                    <div class="boxed" style="padding-top:15%;">
                                                        <span>
                                                            <em><?php if(!empty($sutradara))echo $sutradara[0]->title?></em><br>
                                                            <em><?php echo $row->tahun;echo $full_film[0]->id_full_film;?></em>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bottom-caption" style="margin-top:5px;">
                                                <span class="title" style="font-size:16px;"><?php if($lang == "en"){echo $row->title_eng;}else{echo $row->title;}?></span><br>
                                                <span class="desc"><?php if (strlen($company_name) > 60){ echo substr($company_name, 0, 60).'...'; }else{ echo $company_name; }?></span>
                                            </div>
                                          <?php //echo $link_close?>
                                          </a>
                                        </div>
                                      <?php } ?>
                                    </div>
                                    <div class="costumNav3">
                                        <span class="cnav3-item prev" data-carouselid="carousel<?php echo $key;?>"><span class="fa fa-chevron-left"></span></span>
                                        <span class="cnav3-item next" data-carouselid="carousel<?php echo $key;?>"><span class="fa fa-chevron-right"></span></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php
                        }else{
                    ?>

                        <div class="col-md-12 <?php echo $style?>">
                            <div class="col-md-12">
                                <div class="col-md-2">
                                    <?php
                                    if($value['id'] == 7){
                                    ?>

                                        <?php if($lang == "en"){?>
                                        <span class="col-md-12 item-left-head">SHORT</span>
                                        <span class="col-md-12 item-left-desc big-text">FILMS</span><br>
                                        <?php }else{?>
                                        <span class="col-md-12 item-left-head">FILM</span>
                                        <span class="col-md-12 item-left-desc big-text">PENDEK</span><br>
                                        <?php }?>
                                    <?php
                                    }elseif($value['id'] == 9){
                                    ?>
                                        <?php if($lang == "en"){?>
                                        <span class="col-md-12 item2-left-head">DOCU<b>MENTARIES</b></span><br>
                                        <?php }else{?>
                                        <span class="col-md-12 item2-left-head">DOKU<b>MENTER</b></span><br>
                                        <?php }?>
                                    <?php
                                    }elseif($value['id'] == 8){
                                    ?>
                                        <?php if($lang == "en"){?>
                                        <span class="col-md-12 item2-left-head" style="font-size: 28px;">COMM<b>ERCIALS</b></span><br>
                                        <?php }else{?>
                                        <span class="col-md-12 item2-left-head" style="font-size: 28px;">KOM<b>ERSIAL</b></span><br>
                                        <?php }?>
                                    <?php
                                    }elseif($value['id'] == 6){
                                    ?>
                                        <?php if($lang == "en"){?>
                                        <span class="col-md-12 item3-left-head">MUSIC</span>
                                        <span class="col-md-12 item3-left-desc">VIDEOS</span><br>
                                        <?php }else{?>
                                        <span class="col-md-12 item3-left-head">VIDEO</span>
                                        <span class="col-md-12 item3-left-desc">MUSIK</span><br>
                                        <?php }?>
                                    <?php
                                    }elseif($value['id'] == 1){
                                    ?>
                                        <?php if($lang == "en"){?>
                                        <span class="col-md-12 item2-left-head" style="font-size: 33px;">ANIMA<b>TION</b></span><br>
                                        <?php }else{?>
                                        <span class="col-md-12 item2-left-head" style="font-size: 33px;">ANI<b>MASI</b></span><br>
                                        <?php }?>
                                    <?php
                                    }elseif($value['id'] == 4){
                                    ?>
                                        <?php if($lang == "en"){?>
                                        <span class="col-md-12 item-left-head">ARCHIVE</span>
                                        <span class="col-md-12 item-left-desc big-text2">MATERIALS</span><br>
                                        <?php }else{?>
                                        <span class="col-md-12 item-left-head">ARSIP</span>
                                        <span class="col-md-12 item-left-desc big-text2">MATERIAL</span><br>
                                        <?php }?>
                                    <?php
                                    }elseif($value['id'] == 3){
                                    ?>
                                        <?php if($lang == "en"){?>
                                        <span class="col-md-12 item-left-head">FOREIGN</span>
                                        <span class="col-md-12 item-left-desc">DOCUMENTARIES</span><br>
                                        <?php }else{?>
                                        <span class="col-md-12 item3-left-head" style="font-size: 28px">DOKUMENTER</span>
                                        <span class="col-md-12 item3-left-desc" style="font-size: 28px">ASING</span><br>
                                        <?php }?>
                                    <?php
                                    }else{
                                    ?>
                                        <span class="col-md-12 item-left-desc big-text" style="font-size: 22px !important"><?php echo $value['title']?></span><br>
                                    <?php
                                    }
                                    ?>
                                    <span class="col-md-12 item-left-seemore"><a href="<?php echo base_url()?>watchfilms/category/<?php echo $value['id']?><?php if($search_url!="0")echo $search_url;?>" class="link_seemore"><?php echo $this->session->userdata('see more');?> ></a></span>
                                </div>
                                <div class="col-md-10" style="padding-left: 0px;">
                                    <div class="owl-theme owl-carousel" id="carousel<?php echo $key;?>">


                                      <?php foreach ($value['data'] as $row){
                                        $this->db->where('id', trim($row->company_id));
                                        $query_company = $this->db->get('film_company');
                                        if($query_company->num_rows() > 0){
                                            foreach ($query_company->result() as $row_company){
                                                $company_name = $row_company->title;
                                            }
                                        }else{
                                            $company_name = "";
                                        }

                                        #print_r($row->id_full_film);
                                        #exit();

                                        $link = base_url().'detail/index/'.url_title(strtolower($row->title)).'/'.$row->id;

                                        if($row->streaming_price == '0'){
                                        if($row->dvd_price == '0'){
                                            if($row->vcd_price == '0'){
                                                $harga = "FREE";
                                                $link_open = '<a href="'.base_url().'detail/index/'.url_title(strtolower($row->title)).'/'.$row->id.'">';
                                                $link_close = '</a>';
                                                $popover = "";
                                                $link = base_url().'detail/index/'.url_title(strtolower($row->title)).'/'.$row->id;
                                            }else{
                                            $harga = number_format($row->streaming_price,0,',','.');
                                            $link_open = '';
                                            $link_close = '';
                                            $popover = "rel='popover'";
                                            $link = base_url().'detail/index/'.url_title(strtolower($row->title)).'/'.$row->id;
                                            }
                                        }else{
                                            $harga = number_format($row->streaming_price,0,',','.');
                                            $link_open = '';
                                            $link_close = '';
                                            $popover = "rel='popover'";
                                            $link = base_url().'detail/index/'.url_title(strtolower($row->title)).'/'.$row->id;
                                        }
                                    }else{
                                      $harga = number_format($row->streaming_price,0,',','.');
                                      $link_open = '';
                                      $link_close = '';
                                      $popover = "rel='popover'";
                                      $link = base_url().'detail/index/'.url_title(strtolower($row->title)).'/'.$row->id;
                                    }

                                        $cover = "http://116.206.196.146/".$row->cover."";
                                        $cover = str_replace("filmdata/thumb","filmdata/images/thumb",$cover);

                                     ?>
                                        <div class="item">
                                          <?php //echo $link_open?>
                                          <a style="cursor: pointer;" onclick="openmovie('<?php echo $row->id?>','<?php echo $row->category_id?>','<?php echo $link?>')">
                                            <div class="hover-element hover-element-1 wow flipInX" <?php echo $popover?> data-wow-delay="0.4s" data-wow-duration="0.6s" data-title-position="top,left" style="cursor:pointer;" name="<?php echo $link?>">
                                                <div class="img-film hover-element__initial" style="background:url('<?php echo $cover?>');background-size:auto 100%;width:100%;height:135px;background-position:top center;background-repeat:no-repeat;background-color:#000;">
                                                <?php if($harga <> 'FREE'){ ?>
                                                  <div class="pull-right" style="background:url('<?php echo base_url()?>images/label-harga.png');background-size:100px;width:100%;height:100%;background-position:top right;background-repeat:no-repeat;font-weight:200;font-size:0.9em;">
                                                    <span class="pull-right" style="-webkit-transform: rotate(47deg);-moz-transform: rotate(47deg);color:white;margin-top: 9%;width: 22%;text-align:center;">
                                                      <?php echo $harga?>
                                                    </span>
                                                  </div>
                                                <?php } ?>
                                                </div>
                                                <?php
                                                $this->db->select("title");
                                                $this->db->from("film_director");
                                                $this->db->where("id",$row->director_id);
                                                $sutradara = $this->db->get()->result();
                                                ?>
                                                <div class="hover-element__reveal" data-overlay="9">
                                                    <div class="boxed" style="padding-top:15%;">
                                                        <span>
                                                            <em><?php if(!empty($sutradara))echo $sutradara[0]->title?></em><br>
                                                            <em><?php echo $row->tahun;?></em>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bottom-caption" style="margin-top:5px;">
                                                <span class="title" style="font-size:16px;"><?php if($lang == "en"){echo $row->title_eng;}else{echo $row->title;}?></span><br>
                                                <span class="desc"><?php if (strlen($company_name) > 60){ echo substr($company_name, 0, 60).'...'; }else{ echo $company_name; }?></span>
                                            </div>
                                          <?php //echo $link_close?>
                                          </a>
                                        </div>
                                      <?php } ?>
                                    </div>
                                    <div class="costumNav3">
                                        <span class="cnav3-item prev" data-carouselid="carousel<?php echo $key;?>"><span class="fa fa-chevron-left"></span></span>
                                        <span class="cnav3-item next" data-carouselid="carousel<?php echo $key;?>"><span class="fa fa-chevron-right"></span></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php
                        }
                    }
                    ?>



                    <!-- ========= -->
                    <div class="col-md-12" style="padding: 50px"></div>
                    <!-- Featured
                    <div class="col-md-12 list-item-bottom">
                        <div class="col-md-12">
                            <?php if($lang == "en"){?>
                            <span class="item-bottom-head pull-left">FEATURED</span><br>
                            <?php }else{?>
                            <span class="item-bottom-head pull-left">FILM PILIHAN</span><br>
                            <?php }?>
                        </div>
                        <div class="list-featured-bottom owl-theme owl-carousel" id="carousel111">
                          <?php foreach ($featured->result() as $row){
                            $this->db->where('id', trim($row->director_id));
                            $query_director = $this->db->get('film_director');
                            if($query_director->num_rows() > 0){
                              foreach ($query_director->result() as $row_director){
                                $director_name = $row_director->title;
                              }
                            }else{
                              $director_name = "";
                            }

                            if($row->streaming_price == '0'){
                              $harga = "FREE";
                              $link_open = '<a href="'.base_url().'detail/index/'.url_title(strtolower($row->title)).'/'.$row->id.'">';
                              $link_close = '</a>';
                              $popover = "";
                              $link = base_url().'detail/index/'.url_title(strtolower($row->title)).'/'.$row->id;
                            }else{
                              $harga = number_format($row->streaming_price,0,',','.');
                              $link_open = '';
                              $link_close = '';
                              $popover = "rel='popover'";
                              $link = base_url().'detail/index/'.url_title(strtolower($row->title)).'/'.$row->id;
                            }

                            $cover = "http://116.206.196.146/".$row->cover."";
                            $cover = str_replace("filmdata/thumb","filmdata/images/thumb",$cover);

                            ?>
                            <div class="item">
                                <?php echo $link_open?>
                                  <div class="hover-element hover-element-1 wow flipInX" <?php echo $popover?> data-wow-delay="0.4s" data-wow-duration="0.6s" data-title-position="top,left" style="cursor:pointer;" name="<?php echo $link?>">
                                      <div class="img-film hover-element__initial" rel='popover' style="background:url('<?php echo $cover?>');background-size:auto 100%;width:100%;height:285px;background-position:top center;background-repeat:no-repeat;background-color:#000;">
                                      <?php if($harga <> 'FREE'){ ?>
                                        <div class="pull-right" style="background:url('<?php echo base_url()?>images/label-harga.png');background-size:100px;width:100%;height:100%;background-position:top right;background-repeat:no-repeat;font-weight:200;font-size:0.9em;">
                                          <span class="pull-right" style="-webkit-transform: rotate(47deg);-moz-transform: rotate(47deg);color:white;margin-top: 9%;width: 30%;text-align:center;">
                                            <?php echo $harga?>
                                          </span>
                                        </div>
                                      <?php } ?>
                                      </div>
                                      <div class="hover-element__reveal" data-overlay="9">
                                        <div class="boxed" style="padding-top:30%;">
                                            <h5><?php echo $row->title?></h5>
                                            <span>
                                              <?php if ($row->durasi<>"" AND $row->durasi > 0) { ?>
                                              <em><?php echo $row->durasi." Menit"?></em><br>
                                              <?php } ?>
                                              <?php if ($director_name <> "") { ?>
                                              <?php echo $director_name?><br>
                                              <?php } ?>
                                              <?php if ($row->tahun<>"" AND $row->tahun > 0) { ?>
                                              <em><?php echo $row->tahun?></em>
                                              <?php } ?>
                                            </span>
                                        </div>
                                      </div>
                                  </div>
                                <?php echo $link_close?>
                            </div>
                          <?php } ?>
                        </div>
                        <div class="costumNavBottom">
                            <span class="cnav-bottom-item prev" data-carouselid="carousel111">
                                <span class="fa fa-chevron-left"></span>
                            </span>
                            <span class="cnav-bottom-item next" data-carouselid="carousel111">
                                <span class="fa fa-chevron-right"></span>
                            </span>
                        </div>


                    </div>-->

                    <div class="list-featured-bottom" style="padding-top: 35px;padding-bottom: 45px;">
                            <img src="<?php echo base_url()?>images/banner-biznet.jpg" width="100%">
                        </div>

                <!--end of row-->
                </div>
            </div>
        </section>

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
                        <p class="text-white" style="line-height: 20px;text-align:justify;">
                             <?php
                             $des_footer = $this->db->where("param","deskripsi_footer")->get("settings")->result();
                             echo $des_footer[0]->value;
                             ?>
                        </p>

                        <span style="font-weight: 300;">Powered by</span>
                        <img src="<?php echo base_url()?>img/biznet.png" style="max-height: 60px;">
                    </div>
                    <div class="col-md-3" style="padding-left:0px;">
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
    <input type="hidden" id="filmid">

    <!-- PopOver -->
    <div id="my-popover-container" style="display: none;">
        <div class="popover-title-custom" id="pop-title">The Raid 2</div>
        <div class="popover-year" id="pop-year">2014</div>
        <div class="popover-genre" id="pop-genre">Action</div>
        <div class="popover-author" id="pop-director">Sutradara: Gareth Evans</div>
        <div class="popover-desc" id="pop-desc">Sebuah film yang mengenai Rama, lelaki muda yang setelah dibebaskan dari penjara, direkrut oleh keluarga mafia ...</div>
        <div class="popover-more"><a id="pop-detail">More Info</a></div>
        <?php
        if(sessionValue('id')<>''){
          $status = 'login';
        }else{
          $status = 'nologin';
        }
        ?>
        <div>
            <span>Harga <br>Streaming</span>
            <button type="button" class="butt butt-primary sharp" id="pop-harga-streaming" style="font-weight:normal;height:35px;font-size:14px !important;" onclick="buyfilm('<?php echo $status?>','streaming')">Rp. 15.000,-</button>
        </div>
        <div>
            <span>Harga <br>DVD</span>
            <button type="button" class="butt butt-primary sharp" id="pop-harga-dvd" style="font-weight:normal;height:35px;font-size:14px !important;" onclick="buyfilm('<?php echo $status?>','dvd')">Rp. 15.000,-</button>
        </div>
        <div>
            <span>Harga <br>VCD</span>
            <button type="button" class="butt butt-primary sharp" id="pop-harga-vcd" style="font-weight:normal;height:35px;font-size:14px !important;" onclick="buyfilm('<?php echo $status?>','vcd')">Rp. 15.000,-</button>
        </div>
    </div>

    <?php
    if(sessionValue('id')<>''){
        $status = 'login';
    }else{
        $status = 'nologin';
    }
    ?>
    <!-- Modal -->
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
        <div class="modal-dialog" style="">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="title-movie"></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                      <div class="col-sm-7">
                          <video id="path-movie" class="video-js" controls autoplay preload="auto" style="width:100%;"
                          poster="http://116.206.196.146/filmdata/covermovie.jpg" data-setup="{}">
                          <source id="source-movie" src="http://116.206.196.146/filmdata/2017-09/hvidIdFC_16082017_073903.mp4" type='video/mp4'>
                          <p class="vjs-no-js">
                              To view this video please enable JavaScript, and consider upgrading to a web browser that
                              <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                          </p>
                          </video>
                      </div>
                      <div class="col-sm-5">
                          <div class="col-md-12" style="text-align:left !important;padding: 0 10px;">
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

                          <div class="col-md-12" style="padding:10px 10px 10px 10px;">
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

                          <div class="col-md-12" style="text-align:left !important;">
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

                    <div class="row">

                      <div class="col-md-12">
                        <div id="foarch" style="padding:5px">
                          <span id="arc_sort_detail" style="font-size:12px;font-weight:200;color:black;"></span></br>
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
            $showless = '<div class="col-md-4" style="padding-left: 0px;">';/*--kerjaan  bayu--*/
            $a = 1;
            $posall = strpos($categories,'all');
            if($posall){
              $checkedall = "checked";
            }else{
              $checkedall = "";
            }

            $showless = $showless.'<input type="checkbox" name="categories" value="All" '.$checkedall.'> All <br>';
            foreach ($category_less->result() as $row){
              $checked = "";
              if($checkedall == ''){
                $cats = explode('-',$categories);
                foreach ($cats as $cat) {
                  if($cat==$row->id){
                    $checked = 'checked';
                  }
                }
              }

              $a++;
              $amod = $a % 2;
              if($amod==0){
                $showless = $showless.'<input type="checkbox" name="categories" value="'.$row->id.'" '.$checked.'> '.$row->title;
                $showless = $showless.'</div><div class="col-md-4" style="padding-left: 0px;">';/*--kerjaan bayu--*/
              }else{
                $showless = $showless.'<input type="checkbox" name="categories" value="'.$row->id.'" '.$checked.'> '.$row->title.'<br>';
              }
            }
            $showless = $showless.'</div>';

            $showmore = '<div class="col-md-4" style="padding-left: 0px;">';/*--kerjaan bayu--*/
            $b = 1;
            $showmore = $showmore.'<input type="checkbox" name="categories" value="All" '.$checkedall.'> All <br>';
            foreach ($category_more->result() as $row){
              $checked = "";
              if($checkedall == ''){
                $cats = explode('-',$categories);
                foreach ($cats as $cat) {
                  if($cat==$row->id){
                    $checked = 'checked';
                  }
                }
              }

              $b++;
              $bmod = $b % 4;
              if($row->title == "Foreign Documentaries"){
                $title_category = "Foreign Docus";
              }else{
                $title_category = $row->title;
              }

              if($bmod==0){
                $showmore = $showmore.'<input type="checkbox" name="categories" value="'.$row->id.'" '.$checked.'> '.$title_category;
                $showmore = $showmore.'</div><div class="col-md-4" style="padding-left: 0px;">';/*--kerjaan bayu--*/
              }else{
                $showmore = $showmore.'<input type="checkbox" name="categories" value="'.$row->id.'" '.$checked.'> '.$title_category.'<br>';
              }
            }
            $showmore = $showmore.'</div>';
            ?>

            var showless = '<?php echo $showless?>';
            var showmore = '<?php echo $showmore?>';
            var btnmore = '<span style="cursor: pointer;color: red;font-size: 12px;font-weight: 200;"><?php echo $this->session->userdata('Show More');?> <i class="fa fa-sort-down" aria-hidden="true"></i></a>';
            var btnless = '<span style="cursor: pointer;color: red;font-size: 12px;font-weight: 200;"><?php echo $this->session->userdata('Show Less');?> <i class="fa fa-sort-up" aria-hidden="true"></i></a>';

            var showmorecategory = 0;
            $("#btn-show-more-category").click(function() {
                if(showmorecategory==0){
                    $("#show-more-category").html(showmore);
                    $(this).html(btnless);

                    showmorecategory = 1;
                }else{
                    $("#show-more-category").html(showless);
                    $(this).html(btnmore);

                    showmorecategory = 0;
                }
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

            <?php
            $showless = '<div class="col-md-3" style="padding-left: 0px;">';/*--kerjaan bayu--*/
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
                $showless = $showless.'</div><div class="col-md-3" style="padding-left: 0px;">';/*--kerjaan bayu--*/
              }else{
                $showless = $showless.'<input type="checkbox" name="genre" value="'.$row->id.'" '.$checked2.'> '.$row->title.'<br>';
              }
            }
            $showless = $showless.'</div>';

            $showmore = '<div class="col-md-3" style="padding-left: 0px;">';/*--kerjaan bayu--*/
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
                $showmore = $showmore.'</div><div class="col-md-3" style="padding-left: 0px;">';/*--kerjaan bayu--*/
              }else{
                $showmore = $showmore.'<input type="checkbox" name="genre" value="'.$row->id.'" '.$checked2.'> '.$row->title.'<br>';
              }
            }
            $showmore = $showmore.'</div>';
            ?>

            var showless2 = '<?php echo $showless?>';
            var showmore2 = '<?php echo $showmore?>';
            var btnmore2 = '<span style="cursor: pointer;color: red;font-size: 12px;font-weight: 200;"><?php echo $this->session->userdata('Show More');?> <i class="fa fa-sort-down" aria-hidden="true"></i></span>';
            var btnless2 = '<span style="cursor: pointer;color: red;font-size: 12px;font-weight: 200;"><?php echo $this->session->userdata('Show Less');?> <i class="fa fa-sort-up" aria-hidden="true"></i></span>';

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

            $('.hover-element').click(function() {
              var data_full = $(this).attr('name');
              var exp_data = data_full.split('/');
              var idfilm = exp_data[7];

              $.ajax({
                type : 'POST',
                url : '<?php echo base_url()?>watchfilms/filmdata/'+idfilm,
                success:function(data){
                  var tmp = eval('('+data+')');

                  $("#pop-title").html(tmp.title);
                  $("#pop-year").html(tmp.tahun);
                  $("#pop-genre").html(tmp.genre);
                  $("#pop-director").html('Sutradara : '+tmp.director);
                  $("#pop-desc").html(tmp.desc);
                  $("#pop-detail").attr("href", data_full);
                  $("#pop-harga-streaming").html('Rp. '+tmp.harga_streaming);
                  $("#pop-harga-dvd").html('Rp. '+tmp.harga_dvd);
                  $("#pop-harga-vcd").html('Rp. '+tmp.harga_vcd);


                  if(tmp.harga_streaming == 0){
                    document.getElementById( 'streaming_div' ).style.display = 'block';
                  }else{
                    document.getElementById( 'streaming_div' ).style.display = 'block';
                  }
                  if(tmp.harga_dvd == 0){
                    document.getElementById( 'dvd_div' ).style.display = 'none';
                  }else{
                    document.getElementById( 'dvd_div' ).style.display = 'block';
                  }
                  if(tmp.harga_vcd == 0){
                    document.getElementById( 'vcd_div' ).style.display = 'none';
                  }else{
                    document.getElementById( 'vcd_div' ).style.display = 'block';
                  }
                  $("#filmid").val(idfilm);
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
                //content: function() {
                //  return $('#my-popover-container').html();
                //},

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
            var owl21 = $("#carousel21");
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
            var owl111 = $("#carousel111");
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
            owl21.owlCarousel({
                items : 6,
                dots: false,
                autoplay: true,
                afterMove: function(){
                    $.fn.carMove(owl21.attr('id'), this);
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
                items : 7,
                dots: false,
                margin: 100,
                autoplay: true,
                afterMove: function(){
                    $.fn.carMove(owl10.attr('id'), this);
                }
            });
            owl11.owlCarousel({
                items : 7,
                dots: false,
                margin: 100,
                autoplay: true,
                afterMove: function(){
                    $.fn.carMove(owl11.attr('id'), this);
                }
            });
            owl12.owlCarousel({
                items : 6,
                dots: false,
                margin: 100,
                autoplay: true,
                afterMove: function(){
                    $.fn.carMove(owl12.attr('id'), this);
                }
            });
            owl111.owlCarousel({
                items : 6,
                dots: false,
                autoplay: true,
                afterMove: function(){
                    $.fn.carMove(owl1.attr('id'), this);
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
            $.fn.togglePrev("carousel21",0);
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
            $.fn.togglePrev("carousel111",0);

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

              var url_search = '<?php echo base_url()?>search/index/'+text;
              window.location = url_search;
            });

            $(".text-search").on('keypress', function (e) {
                var keycode = (e.keyCode ? e.keyCode : e.which);
                if (keycode == '13') {
                    var text = $('.text-search').val();
                      if (text=='') {
                        text = '0';
                      }

                      var url_search = '<?php echo base_url()?>search/index/'+text;
                      window.location = url_search;
                }
            });

            $(".search-advance").on('keypress', function(e){
                var text = $('.text-search').val();
              if (text=='') {
                text = '0';
              }

              var checkboxes = document.getElementsByName('categories');
              var categories = "C";
              for (var i=0, n=checkboxes.length;i<n;i++)
              {
                  if (checkboxes[i].checked)
                  {
                      categories += "-"+checkboxes[i].value;
                  }
              }

              var year_start = $('#year-start').val();
              var year_end = $('#year-end').val();

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

              var url_search = '<?php echo base_url()?>watchfilms/index/'+text+'/'+categories+'/'+paid+'/'+year_start+'-'+year_end+'/'+length+'/'+genre;
              window.location = url_search;
            });

            $(".btn-apply-filter").click(function(){
              var text = $('.text-search').val();
              if (text=='') {
                text = '0';
              }

              var checkboxes = document.getElementsByName('categories');
              var categories = "C";
              for (var i=0, n=checkboxes.length;i<n;i++)
              {
                  if (checkboxes[i].checked)
                  {
                      categories += "-"+checkboxes[i].value;
                  }
              }

              var year_start = $('#year-start').val();
              var year_end = $('#year-end').val();

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

              var url_search = '<?php echo base_url()?>watchfilms/index/'+text+'/'+categories+'/'+paid+'/'+year_start+'-'+year_end+'/'+length+'/'+genre;
              window.location = url_search;
            });

            $(".btn-clear-filter").click(function(){
              window.location = '<?php echo base_url()?>watchfilms';
            });

            $(".btn-advance-filter").click(function(){
              window.location = '<?php echo base_url()?>watchfilms';
            });

            $( "#stop-movie" ).click(function() {
                var myPlayer1 = videojs("path-movie");
                myPlayer1.pause();
            });
        });

        function buyfilm(status,type){
          //console.log(status);
          if(status=="nologin"){
            alert('Silahkan Login terlebih dahulu untuk membeli film.');
          }else{
            var film_id = $('#filmid').val();
            $.ajax({
              type : 'POST',
              url : '<?php echo site_url('detail/addtocart')?>',
              data : {
                filmid : film_id,
                userid : '<?php echo sessionValue("id")?>',
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

        function uncheck(name,val){
            $("input[name='"+name+"'][value='"+val+"']").attr('checked', false);
            $(".btn-apply-filter").click();
        }

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
                    $("#embed").html(tmp.embed);

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
                  }else{
                    document.getElementById( 'streaming_div' ).style.display = 'block';
                  }
                  if(tmp.harga_dvd == 0){
                    document.getElementById( 'dvd_div' ).style.display = 'none';
                  }else{
                    document.getElementById( 'dvd_div' ).style.display = 'block';
                  }
                  if(tmp.harga_vcd == 0){
                    document.getElementById( 'vcd_div' ).style.display = 'none';
                  }else{
                    document.getElementById( 'vcd_div' ).style.display = 'block';
                  }

                    $("#filmid").val(idfilm);

                    <?php if($lang == "en"){?>
                    if(idcategory == '4'){
                      $("#arc_sort_detail").html(tmp.f_sort_detail_eng);
                      document.getElementById( 'noarch' ).style.display = 'none';
                      document.getElementById( 'foarch' ).style.display = 'block';
                    }else{
                      if(tmp.sort_detail_eng != ' ...'){
                          $("#sort_detail").html(tmp.sort_detail_eng);
                      }else if(tmp.desc_eng != ' ...'){
                          $("#sort_detail").html(tmp.desc_eng);
                      }else if(tmp.desc != ' ...'){
                          $("#sort_detail").html(tmp.desc);
                      }else if(tmp.sort_detail != ' ...'){
                          $("#sort_detail").html(tmp.sort_detail);
                      }
                      document.getElementById( 'noarch' ).style.display = 'block';
                      document.getElementById( 'foarch' ).style.display = 'none';
                    }
                    <?php }else{?>
                    if(idcategory == '4'){
                      $("#arc_sort_detail").html(tmp.f_sort_detail);
                      document.getElementById( 'noarch' ).style.display = 'none';
                      document.getElementById( 'foarch' ).style.display = 'block';
                    }else{
                      if(tmp.sort_detail != ' ...'){
                          $("#sort_detail").html(tmp.sort_detail);
                      }else if(tmp.desc != ' ...'){
                          $("#sort_detail").html(tmp.desc);
                      }else if(tmp.desc_eng != ' ...'){
                          $("#sort_detail").html(tmp.desc_eng);
                      }else if(tmp.sort_detail_eng != ' ...'){
                          $("#sort_detail").html(tmp.sort_detail_eng);
                      }
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

    <style type="text/css">
        @media (max-width: 1500px) and (min-width: 767px){
            #carousel21 .item {
                padding-right: 10px;
            }
        }
    </style>
