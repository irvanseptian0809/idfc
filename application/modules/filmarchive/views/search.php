
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
    <div class="main-container transition--fade">
        <section class="project-single-process" id="watchfilms" style="margin-bottom: -10px;">
            <div class="container genre-films" style="width: 100%;">
                <div class="row row-list">
                    <div class="col-md-12"><br>

                        <div class="col-md-12">

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

                            <div class="col-md-12 visible-md visible-lg">
                              <div class="col-md-12" style="margin-bottom: 22px;">
                                  <div class="title-sort-input">
                                    <input type="text" class="text-search" value="<?php if($text<>'0'){ echo $text; }?>" style="color:#333;line-height: 10px;" placeholder="Search Here">
                                    <i class="fa fa-search" aria-hidden="true" id="search" style="cursor:pointer;"></i>
                                    <span class="label-semi-bold" style="font-size: 17px;vertical-align: middle;padding-left: 5px;padding-right: 8px;">Advance Filters</span>
                                    <img src="<?php echo base_url()?>images/icon-advance-filter.png" id="btn-advance-filters" style="cursor: pointer;height: 40px;">
                                  </div>
                                  <center>
                                  <div id="advance-filter-content">
                                    <div class="text-left label-bold advance-filter-header">
                                            <div class="col-md-11" style="padding-left:0;padding-right:0;">
                                                <span style="font-size: 15px;">Search criteria:</span>
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
                            </div>
                        </div>

    <?php
    $now_url = base_url(uri_string());
    $see_more_now_url = str_replace("search","see_more",$now_url);
    $js_see_more = str_replace("search","js_see_more",$now_url);
    ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $(document).on('click','.show_more',function(){
            var ID = $(this).attr('id');
            $('.show_more').hide();
            $('.loding').show();

            $.ajax({
                type:'POST',
                url:'<?php echo $see_more_now_url;?>',
                data:'no='+ID,
                success:function(html){
                    $('#show_more_main'+ID).remove();
                    $('.tutorial_list').append(html);

                    $.ajax({
                        type:'POST',
                        url:'<?php echo $js_see_more;?>',
                        data:'no='+ID,
                        success:function(html){
                            $('.js_see_more').append(html);
                        }
                    });

                }
            });

        });
    });
    </script>

                    <div class="tutorial_list">

                        <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
                            <div class="owl-theme owl-carousel content" id="carousel2">
                              <?php
                              $break = 0;
                              foreach ($listdata1->result() as $row){
                                $break++;
                                if($break>5){break;}
                                $this->db->where('id', trim($row->company_id));
                                $query_company = $this->db->get('film_company');
                                if($query_company->num_rows() > 0){
                                  foreach ($query_company->result() as $row_company){
                                    $company_name = $row_company->title;
                                  }
                                }else{
                                  $company_name = "";
                                }

                                if($row->harga_streaming == '0'){
                                  $harga = "FREE";
                                }else{
                                  $harga = number_format($row->harga_streaming,0,',','.');
                                } ?>
                                <div class="item" rel="item1" name="<?php echo $row->id?>" style="padding-left: 0px;">
                                  <div class="img-film hover-element__initial" rel='popover' style="background:url('<?php echo 'http://116.206.196.146/'.$row->cover?>');background-size:100% auto;width:100%;height:128px;">
                                  <?php if($harga <> 'FREE'){ ?>
                                    <div class="pull-right" style="background:url('<?php echo base_url()?>images/label-harga.png');background-size:100px;width:100%;height:100%;background-position:top right;background-repeat:no-repeat;">
                                      <span class="pull-right" style="-webkit-transform: rotate(47deg);-moz-transform: rotate(47deg);color:white;margin-top: 9%;width: 26%;text-align:center;">
                                        <?php echo $harga?>
                                      </span>
                                    </div>
                                  <?php } ?>
                                  </div>
                                  <div class="bottom-caption">
                                    <span class="title" style="font-size:16px;"><?php echo $row->title?></span><br>
                                    <span class="desc"><?php echo $company_name?></span>
                                  </div>
                                </div>
                              <?php } ?>
                            </div>
                        </div>
                        <?php
                        if(sessionValue('id')<>''){
                          $status = 'login';
                        }else{
                          $status = 'nologin';
                        }
                        ?>
                        <div id="detail1">
                            <div class="col-md-12 arrow-up"></div>
                            <div class="col-md-12 content-film-genre">
                              <div class="col-md-6 content-left-genre">
                                <!--<img id="thumbnail-video1" style="width: 77%;">-->
                                <div class="modal-body" style="margin: 0 50px;">
                                        <video id="path-movie" class="video-js" controls autoplay preload="auto" width="597" height="350"
                                        poster="http://116.206.196.146/filmdata/covermovie.jpg" data-setup="{}">
                                        <source id="source-movie" src="http://116.206.196.146/filmdata/2017-09/hvidIdFC_16082017_073903.mp4" type='video/mp4'>
                                        <p class="vjs-no-js">
                                            To view this video please enable JavaScript, and consider upgrading to a web browser that
                                            <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                                        </p>
                                        </video>
                                    </div>
                              </div>
                              <div class="col-md-4 content-right-genre">
                                  <div style="float:right;cursor:pointer;">
                                    <i class="fa fa-close" style="font-size:25px;" id="close1"></i>
                                  </div>
                                  <div class="genre-detail-title" id="title-detail1">Battle of surabaya</div>
                                  <div class="genre-detail-year" id="tahun-detail1">(2014)</div>
                                  <div class="genre-detail-durasi" id="created_at1">Diunggah Pada: 11-02-2013</div>
                                  <div class="genre-detail-durasi" id="o_title1">Judul Asli: Autobedrijf Fuchs & Rens 1902 - 1927</div>
                                  <div class="genre-detail-durasi" id="tahun_produksi1">Tahun Produksi: 1927</div>
                                  <div class="genre-detail-durasi" id="negara_produksi1">Tahun Produksi: 1927</div>
                                  <div class="genre-detail-durasi" id="lokasi_produksi1">Lokasi Produksi: 1927</div>
                                  <div class="genre-detail-durasi" id="category-detail1">Durasi: 1927</div>
                                  <div class="genre-detail-durasi" id="durasi-detail1">Durasi: 1927</div><br>

                                  <div class="genre-detail-durasi" id="company-detail1">Company: </div>
                                  <div class="genre-detail-durasi" id="source-detail1">Source Name: </div>
                                  <div class="genre-detail-durasi" id="number-id1">Number ID: </div>
                                  <!--<div class="genre-detail-durasi" id="director-detail1">Director: AA</div>-->
                                <div id="disediakan1">
                                    <a class="difo">Disediakan Oleh:</br></a>
                                    <img id="dsd_image1" src="" style="width: 100px;"></br>
                                    <a class="difo">Tertarik dengan video ini?</br></a>
                                    <a class="difo" data-toggle="collapse" data-target="#detail_drop1" style="cursor: pointer;">Klik disini untuk informasi lebih lanjut!</a>
                                    <div id="detail_drop1" class="collapse" style="padding: 10px; background-color: #f4f4f4; border-radius: 5px;border:1px solid #b4b4b4;">
                                        <a class="difo" style="color:black;">Tentang video FilmArchive ini</a></br>
                                        <p style="font-size: 11px;
                                    line-height: 1.4;">
                                        Pemilik hak hukum video ini adalah <span id="dsd_company_name1"></span>.</br>
                                        Jika Anda ingin menggunakan video ini, silahkan hubungi:</br>
                                        Situs:</br>
                                        <span id="dsd_site1"></span></br>
                                        Anda tidak memiliki hak untuk menggunakan video ini tanpa izin dari pemilik hak-hak hukum!
                                        </p>
                                    </div>
                                </div>

                                  <div class="genre-detail-desc" id="informasi-detail1">Pertarungan sengit antara tukang koran dan penjajah. Dimana mereka harus semir sepatu untuk makan setiap abad.</div>
                                  <div class="genre-detail-share">
                                      Share This Movie:
                                      <i class="fa fa-facebook"></i>
                                      <i class="fa fa-twitter"></i>
                                      <i class="fa fa-google-plus"></i>
                                  </div>
                              </div>
                            </div>
                        </div>



                        <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
                            <div class="owl-theme owl-carousel content" id="carousel3">
                              <?php
                              foreach (array_slice($listdata1->result(),5) as $row){
                                $break++;
                                if($break>11){break;}
                                $this->db->where('id', trim($row->company_id));
                                $query_company = $this->db->get('film_company');
                                if($query_company->num_rows() > 0){
                                  foreach ($query_company->result() as $row_company){
                                    $company_name = $row_company->title;
                                  }
                                }else{
                                  $company_name = "";
                                }

                                if($row->harga_streaming == '0'){
                                  $harga = "FREE";
                                }else{
                                  $harga = number_format($row->harga_streaming,0,',','.');
                                } ?>
                                <div class="item" rel="item2" name="<?php echo $row->id?>" style="padding-left: 0px;">
                                  <div class="img-film hover-element__initial" rel='popover' style="background:url('<?php echo 'http://116.206.196.146/'.$row->cover?>');background-size:100% auto;width:100%;height:128px;">
                                  <?php if($harga <> 'FREE'){ ?>
                                    <div class="pull-right" style="background:url('<?php echo base_url()?>images/label-harga.png');background-size:100px;width:100%;height:100%;background-position:top right;background-repeat:no-repeat;">
                                      <span class="pull-right" style="-webkit-transform: rotate(47deg);-moz-transform: rotate(47deg);color:white;margin-top: 9%;width: 26%;text-align:center;">
                                        <?php echo $harga?>
                                      </span>
                                    </div>
                                  <?php } ?>
                                  </div>
                                  <div class="bottom-caption">
                                    <span class="title" style="font-size:16px;"><?php echo $row->title?></span><br>
                                    <span class="desc"><?php echo $company_name?></span>
                                  </div>
                                </div>
                              <?php } ?>
                            </div>
                        </div>
                        <div id="detail2">
                            <div class="col-md-12 arrow-up"></div>
                            <div class="col-md-12 content-film-genre">
                              <div class="col-md-6 content-left-genre">
                                <!--<img id="thumbnail-video2" style="width: 77%;">-->
                                <div class="modal-body" style="margin: 0 50px;">
                                    <video id="path-movie2" class="video-js" controls autoplay preload="auto" width="597" height="350"
                                    poster="http://116.206.196.146/filmdata/covermovie.jpg" data-setup="{}">
                                    <source id="source-movie2" src="http://116.206.196.146/filmdata/2017-09/hvidIdFC_16082017_073903.mp4" type='video/mp4'>
                                    <p class="vjs-no-js">
                                        To view this video please enable JavaScript, and consider upgrading to a web browser that
                                        <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                                    </p>
                                    </video>
                                </div>
                              </div>
                              <div class="col-md-4 content-right-genre">
                                  <div style="float:right;cursor:pointer;">
                                    <i class="fa fa-close" style="font-size:25px;" id="close2"></i>
                                  </div>
                                  <div class="genre-detail-title" id="title-detail2">Battle of surabaya</div>
                                  <div class="genre-detail-year" id="tahun-detail2">(2014)</div>
                                  <div class="genre-detail-durasi" id="created_at2">Diunggah Pada: 11-02-2013</div>
                                  <div class="genre-detail-durasi" id="o_title2">Judul Asli: Autobedrijf Fuchs & Rens 1902 - 1927</div>
                                  <div class="genre-detail-durasi" id="tahun_produksi2">Tahun Produksi: 1927</div>
                                  <div class="genre-detail-durasi" id="negara_produksi2">Tahun Produksi: 1927</div>
                                  <div class="genre-detail-durasi" id="lokasi_produksi2">Lokasi Produksi: 1927</div>
                                  <div class="genre-detail-durasi" id="category-detail2">Durasi: 1927</div>
                                  <div class="genre-detail-durasi" id="durasi-detail2">Durasi: 1927</div><br>

                                  <div class="genre-detail-durasi" id="company-detail2">Company: </div>
                                  <div class="genre-detail-durasi" id="source-detail2">Source Name: </div>
                                  <div class="genre-detail-durasi" id="number-id2">Number ID: </div>
                                  <!--<div class="genre-detail-durasi" id="director-detail1">Director: AA</div>-->
                                <div id="disediakan2">
                                    <a class="difo">Disediakan Oleh:</br></a>
                                    <img id="dsd_image2" src="" style="width: 100px;"></br>
                                    <a class="difo">Tertarik dengan video ini?</br></a>
                                    <a class="difo" data-toggle="collapse" data-target="#detail_drop2" style="cursor: pointer;">Klik disini untuk informasi lebih lanjut!</a>
                                    <div id="detail_drop2" class="collapse" style="padding: 10px; background-color: #f4f4f4; border-radius: 5px;border:1px solid #b4b4b4;">
                                        <a class="difo" style="color:black;">Tentang video FilmArchive ini</a></br>
                                        <p style="font-size: 11px;
                                    line-height: 1.4;">
                                        Pemilik hak hukum video ini adalah <span id="dsd_company_name2"></span>.</br>
                                        Jika Anda ingin menggunakan video ini, silahkan hubungi:</br>
                                        Situs:</br>
                                        <span id="dsd_site2"></span></br>
                                        Anda tidak memiliki hak untuk menggunakan video ini tanpa izin dari pemilik hak-hak hukum!
                                        </p>
                                    </div>
                                </div>

                                  <div class="genre-detail-desc" id="informasi-detail2">Pertarungan sengit antara tukang koran dan penjajah. Dimana mereka harus semir sepatu untuk makan setiap abad.</div>
                                  <div class="genre-detail-share">
                                      Share This Movie:
                                      <i class="fa fa-facebook"></i>
                                      <i class="fa fa-twitter"></i>
                                      <i class="fa fa-google-plus"></i>
                                  </div>
                              </div>
                            </div>
                        </div>
                        <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
                            <div class="owl-theme owl-carousel content" id="carousel4">
                              <?php foreach (array_slice($listdata1->result(),10) as $row){
                                $this->db->where('id', trim($row->company_id));
                                $query_company = $this->db->get('film_company');
                                if($query_company->num_rows() > 0){
                                  foreach ($query_company->result() as $row_company){
                                    $company_name = $row_company->title;
                                  }
                                }else{
                                  $company_name = "";
                                }

                                if($row->harga_streaming == '0'){
                                  $harga = "FREE";
                                }else{
                                  $harga = number_format($row->harga_streaming,0,',','.');
                                } ?>
                                <div class="item" rel="item3" name="<?php echo $row->id?>" style="padding-left: 0px;">
                                  <div class="img-film hover-element__initial" rel='popover' style="background:url('<?php echo 'http://116.206.196.146/'.$row->cover?>');background-size:100% auto;width:100%;height:128px;">
                                  <?php if($harga <> 'FREE'){ ?>
                                    <div class="pull-right" style="background:url('<?php echo base_url()?>images/label-harga.png');background-size:100px;width:100%;height:100%;background-position:top right;background-repeat:no-repeat;">
                                      <span class="pull-right" style="-webkit-transform: rotate(47deg);-moz-transform: rotate(47deg);color:white;margin-top: 9%;width: 26%;text-align:center;">
                                        <?php echo $harga?>
                                      </span>
                                    </div>
                                  <?php } ?>
                                  </div>
                                  <div class="bottom-caption">
                                    <span class="title" style="font-size:16px;"><?php echo $row->title?></span><br>
                                    <span class="desc"><?php echo $company_name?></span>
                                  </div>
                                </div>
                              <?php } ?>
                            </div>
                        </div>
                        <div id="detail3">
                            <div class="col-md-12 arrow-up"></div>
                            <div class="col-md-12 content-film-genre">
                                <div class="col-md-6 content-left-genre">
                                    <!--<img id="thumbnail-video3" style="width: 77%;">-->
                                <div class="modal-body" style="margin: 0 50px;">
                                    <video id="path-movie3" class="video-js" controls autoplay preload="auto" width="597" height="350"
                                    poster="http://116.206.196.146/filmdata/covermovie.jpg" data-setup="{}">
                                    <source id="source-movie3" src="http://116.206.196.146/filmdata/2017-09/hvidIdFC_16082017_073903.mp4" type='video/mp4'>
                                    <p class="vjs-no-js">
                                        To view this video please enable JavaScript, and consider upgrading to a web browser that
                                        <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                                    </p>
                                    </video>
                                </div>
                                </div>
                                <div class="col-md-4 content-right-genre">
                                  <div style="float:right;cursor:pointer;">
                                    <i class="fa fa-close" style="font-size:25px;" id="close3"></i>
                                  </div>
                                  <div class="genre-detail-title" id="title-detail3">Battle of surabaya</div>
                                  <div class="genre-detail-year" id="tahun-detail3">(2014)</div>
                                  <div class="genre-detail-durasi" id="created_at3">Diunggah Pada: 11-02-2013</div>
                                  <div class="genre-detail-durasi" id="o_title3">Judul Asli: Autobedrijf Fuchs & Rens 1902 - 1927</div>
                                  <div class="genre-detail-durasi" id="tahun_produksi3">Tahun Produksi: 1927</div>
                                  <div class="genre-detail-durasi" id="negara_produksi3">Tahun Produksi: 1927</div>
                                  <div class="genre-detail-durasi" id="lokasi_produksi3">Lokasi Produksi: 1927</div>
                                  <div class="genre-detail-durasi" id="category-detail3">Durasi: 1927</div>
                                  <div class="genre-detail-durasi" id="durasi-detail3">Durasi: 1927</div><br>

                                  <div class="genre-detail-durasi" id="company-detail3">Company: </div>
                                  <div class="genre-detail-durasi" id="source-detail3">Source Name: </div>
                                  <div class="genre-detail-durasi" id="number-id3">Number ID: </div>
                                  <!--<div class="genre-detail-durasi" id="director-detail1">Director: AA</div>-->
                                <div id="disediakan3">
                                    <a class="difo">Disediakan Oleh:</br></a>
                                    <img id="dsd_image3" src="" style="width: 100px;"></br>
                                    <a class="difo">Tertarik dengan video ini?</br></a>
                                    <a class="difo" data-toggle="collapse" data-target="#detail_drop3" style="cursor: pointer;">Klik disini untuk informasi lebih lanjut!</a>
                                    <div id="detail_drop3" class="collapse" style="padding: 10px; background-color: #f4f4f4; border-radius: 5px;border:1px solid #b4b4b4;">
                                        <a class="difo" style="color:black;">Tentang video FilmArchive ini</a></br>
                                        <p style="font-size: 11px;
                                    line-height: 1.4;">
                                        Pemilik hak hukum video ini adalah <span id="dsd_company_name3"></span>.</br>
                                        Jika Anda ingin menggunakan video ini, silahkan hubungi:</br>
                                        Situs:</br>
                                        <span id="dsd_site3"></span></br>
                                        Anda tidak memiliki hak untuk menggunakan video ini tanpa izin dari pemilik hak-hak hukum!
                                        </p>
                                    </div>
                                </div>

                                  <div class="genre-detail-desc" id="informasi-detail3">Pertarungan sengit antara tukang koran dan penjajah. Dimana mereka harus semir sepatu untuk makan setiap abad.</div>
                                  <div class="genre-detail-share">
                                      Share This Movie:
                                      <i class="fa fa-facebook"></i>
                                      <i class="fa fa-twitter"></i>
                                      <i class="fa fa-google-plus"></i>
                                  </div>
                              </div>
                            </div>
                        </div>

                        <div class="row"></div>

                        <?php if(count($listdata1->result())==15){ ?>
                        <div class="show_more_main" id="show_more_main15">
                            <span id="15" class="show_more" title="Load more posts">Load More</span>
                            <span class="loding" style="display: none;"><span class="loding_txt">Loading...</span></span>
                        </div>
                        <?php }?>

                    </div>


                    </div>

                <!--end of row-->
                </div>
            </div>
        </section>

        <style type="text/css">
                    .show_more_main {
                    margin: 15px 25px;
                    text-align: center;
                    }
                    .show_more {
                    background-color: #f8f8f8;
                    background-image: -webkit-linear-gradient(top,#fcfcfc 0,#f8f8f8 100%);
                    background-image: linear-gradient(top,#fcfcfc 0,#f8f8f8 100%);
                    border: 1px solid;
                    border-color: #d3d3d3;
                    color: #333;
                    font-size: 12px;
                    outline: 0;
                    }
                    .show_more {
                    cursor: pointer;
                    padding: 10px 50px;
                    text-align: center;
                    font-weight:bold;
                    }
                    .loding {
                    background-color: #e9e9e9;
                    border: 1px solid;
                    border-color: #c6c6c6;
                    color: #333;
                    font-size: 12px;
                    padding: 10px 50px;
                    outline: 0;
                    font-weight:bold;
                    }
                    .loding_txt {
                        background-image: url(loading_16.gif);
                        background-position: left;
                        background-repeat: no-repeat;
                        border: 0;
                        display: inline-block;
                        height: 16px;
                        padding-left: 20px;
                    }
                    .difo{
                        font-size: 12px;
                        color: white;
                    }
                    .difo:hover{
                        color: white;
                    }
                </style>

        <footer class="footer-2 text-center-xs bg--dark">
            <div class="container">
                <div class="row" style="vertical-align: middle;margin-left:0 !important;">
                    <img class="logo logo-light " alt="logo" src="<?php echo base_url()?>img/idfc-logo.png" style="border-right: 1px solid white; margin-bottom: 3px;" /> <span class="text-white">All About Indonesian Film</span>
                    <div class="col-md-3 pull-right" style="padding-left:0px;">
                        <div class="btn btn--xs btn-danger" id="submitfilm" style="font-weight:300 !important;">Submit Film</div>
                    </div>
                </div>
                <hr style="margin-top: 10px;">
                <div class="col-md-12" style="padding-left:0px;">
                    <div class="col-md-4">
                        <p class="text-white" style="line-height: 20px;padding-right: 20px;text-align:justify;">
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

            $("#detail1").hide();
            $("#detail2").hide();
            $("#detail3").hide();

            $("[rel='item1']").click(function() {
                var idfilm = $(this).attr('name');
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

                        $("#thumbnail-video1").attr("src",tmp.thumbnail);
                        //$("#source-video1").attr("src",tmp.video);
                        $("#title-detail1").html(tmp.title);
                        $("#tahun-detail1").html(tmp.tahun);
                        $("#director-detail1").html('Director : '+tmp.director);
                        $("#durasi-detail1").html('Durasi : '+tmp.durasi+' Menit');

                    <?php if($lang == "en"){?>
                    $("#o_title1").html('Original Title : '+tmp.title_ori);
                    <?php }else{?>
                    $("#o_title1").html('Original Title : '+tmp.title_ori);
                    <?php }?>

                    <?php if($lang == "en"){?>
                        $("#tahun_produksi1").html(' Production Year : '+tmp.tahun);
                    <?php }else{?>
                        $("#tahun_produksi1").html(' Tahun Produksi: '+tmp.tahun);
                    <?php }?>

                    $("#created_at1").html('Uploaded On : '+tmp.created_at);

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

                    $("#category-detail1").html('Category : '+category_archive);
                    $("#company-detail1").html('Company : '+tmp.company_id);
                    $("#source-detail1").html('Source Name : '+tmp.source);
                    $("#number-id1").html('Number ID : '+idfilm);
                    $("#negara_produksi1").html('Production country : '+tmp.country);
                    $("#lokasi_produksi1").html('Production location : '+tmp.location);

                    if(tmp.disediakan == "0"){
                        document.getElementById( 'disediakan1' ).style.display = 'none';
                    }else{
                        document.getElementById( 'disediakan1' ).style.display = 'block';
                        document.getElementById('dsd_image1').src=tmp.dsd_image;
                        $("#dsd_company_name1").html(tmp.company_name);
                        $("#dsd_site1").html(tmp.site);
                    }

                        $("#informasi-detail1").html(tmp.informasi_dasar);
                        $("#harga1-detail1").html(harga_streaming);
                        $("#harga2-detail1").html(harga_dvd);
                        $("#harga3-detail1").html(harga_vcd);
                        $("#link-detail1").attr("href", "<?php echo base_url()?>detail/index/"+tmp.title+"/"+idfilm);
                        $("#filmid").val(idfilm);

                        var pathmovie = document.getElementById('path-movie');
                        var source = document.getElementById('source-movie');

                        pathmovie.setAttribute('poster', tmp.thumbnail);
                        source.setAttribute('src', tmp.video);

                        $('#popup-movie').modal('show');
                        var video = videojs('path-movie');
                        var video2 = videojs('path-movie2');
                        var video3 = videojs('path-movie3');
                        video.pause();
                        video2.pause();
                        video3.pause();
                        video.load();

                        $('html, body').animate({
                            scrollTop: $("#detail1").offset().top
                        }, 1000);
          			}
          		});

                var paddingleft = $(this).offset().left + 10;
                $('.arrow-up').css({'margin-left' : paddingleft+'px'});
                $("#detail1").hide();
                $("#detail2").hide();
                $("#detail3").hide();

                $("#detail1").show(500);
            });

            $("[rel='item2']").click(function() {
                var idfilm = $(this).attr('name');
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

                        $("#thumbnail-video2").attr("src",tmp.thumbnail);
                        //$("#source-video2").attr("src",tmp.video);
                        $("#title-detail2").html(tmp.title);
                        $("#tahun-detail2").html(tmp.tahun);
                        $("#director-detail2").html('Director : '+tmp.director);
                        $("#durasi-detail2").html('Durasi : '+tmp.durasi+' Menit');

                    <?php if($lang == "en"){?>
                    $("#o_title2").html('Original Title : '+tmp.title_ori);
                    <?php }else{?>
                    $("#o_title2").html('Original Title : '+tmp.title_ori);
                    <?php }?>
                    $("#created_at2").html('Uploaded On : '+tmp.created_at);

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

                    $("#category-detail2").html('Category : '+category_archive);
                    $("#company-detail2").html('Company : '+tmp.company_id);
                    $("#source-detail2").html('Source Name : '+tmp.source);
                    $("#number-id2").html('Number ID : '+idfilm);
                    $("#negara_produksi2").html('Production country : '+tmp.country);
                    $("#lokasi_produksi2").html('Production location : '+tmp.location);

                    if(tmp.disediakan == "0"){
                        document.getElementById( 'disediakan2' ).style.display = 'none';
                    }else{
                        document.getElementById( 'disediakan2' ).style.display = 'block';
                        document.getElementById('dsd_image2').src=tmp.dsd_image;
                        $("#dsd_company_name2").html(tmp.company_name);
                        $("#dsd_site2").html(tmp.site);
                    }

                        $("#informasi-detail2").html(tmp.informasi_dasar);
                        $("#harga1-detail2").html(harga_streaming);
                        $("#harga2-detail2").html(harga_dvd);
                        $("#harga3-detail2").html(harga_vcd);
                        $("#link-detail2").attr("href", "<?php echo base_url()?>detail/index/"+tmp.title+"/"+idfilm);
                        $("#filmid").val(idfilm);

                        var pathmovie = document.getElementById('path-movie2');
                        var source = document.getElementById('source-movie2');

                        pathmovie.setAttribute('poster', tmp.thumbnail);
                        source.setAttribute('src', tmp.video);

                        $('#popup-movie').modal('show');
                        var video = videojs('path-movie');
                        var video2 = videojs('path-movie2');
                        var video3 = videojs('path-movie3');
                        video.pause();
                        video2.pause();
                        video3.pause();
                        video2.load();

                        $('html, body').animate({
                            scrollTop: $("#detail2").offset().top
                        }, 1000);
          			}
          		});

                var paddingleft = $(this).offset().left + 10;
                $('.arrow-up').css({'margin-left' : paddingleft+'px'});
                $("#detail1").hide();
                $("#detail2").hide();
                $("#detail3").hide();

                $("#detail2").show(500);
            });

            $("[rel='item3']").click(function() {
                var idfilm = $(this).attr('name');
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

                        $("#thumbnail-video3").attr("src",tmp.thumbnail);
                        //$("#source-video3").attr("src",tmp.video);
                        $("#title-detail3").html(tmp.title);
                        $("#tahun-detail3").html(tmp.tahun);
                        $("#director-detail3").html('Director : '+tmp.director);
                        $("#durasi-detail3").html('Durasi : '+tmp.durasi+' Menit');

                    <?php if($lang == "en"){?>
                    $("#o_title3").html('Original Title : '+tmp.title_ori);
                    <?php }else{?>
                    $("#o_title3").html('Original Title : '+tmp.title_ori);
                    <?php }?>
                    $("#created_at3").html('Uploaded On : '+tmp.created_at);

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

                    $("#category-detail3").html('Category : '+category_archive);
                    $("#company-detail3").html('Company : '+tmp.company_id);
                    $("#source-detail3").html('Source Name : '+tmp.source);
                    $("#number-id3").html('Number ID : '+idfilm);
                    $("#negara_produksi3").html('Production country : '+tmp.country);
                    $("#lokasi_produksi3").html('Production location : '+tmp.location);

                    if(tmp.disediakan == "0"){
                        document.getElementById( 'disediakan3' ).style.display = 'none';
                    }else{
                        document.getElementById( 'disediakan3' ).style.display = 'block';
                        document.getElementById('dsd_image3').src=tmp.dsd_image;
                        $("#dsd_company_name3").html(tmp.company_name);
                        $("#dsd_site3").html(tmp.site);
                    }

                        $("#informasi-detail3").html(tmp.informasi_dasar);
                        $("#harga1-detail3").html(harga_streaming);
                        $("#harga2-detail3").html(harga_dvd);
                        $("#harga3-detail3").html(harga_vcd);
                        $("#link-detail3").attr("href", "<?php echo base_url()?>detail/index/"+tmp.title+"/"+idfilm);
                        $("#filmid").val(idfilm);

                        var pathmovie = document.getElementById('path-movie3');
                        var source = document.getElementById('source-movie3');

                        pathmovie.setAttribute('poster', tmp.thumbnail);
                        source.setAttribute('src', tmp.video);

                        $('#popup-movie').modal('show');
                        var video = videojs('path-movie');
                        var video2 = videojs('path-movie2');
                        var video3 = videojs('path-movie3');
                        video.pause();
                        video2.pause();
                        video3.pause();
                        video3.load();

                        $('html, body').animate({
                            scrollTop: $("#detail3").offset().top
                        }, 1000);
          			}
                });

                var paddingleft = $(this).offset().left + 10;
                $('.arrow-up').css({'margin-left' : paddingleft+'px'});
                $("#detail1").hide();
                $("#detail2").hide();
                $("#detail3").hide();

                $("#detail3").show(500);
            });

            $("#close1").click(function() {
                var video = videojs('path-movie');
                video.pause();
              $("#detail1").hide(500);

              $('html, body').animate({
                    scrollTop: $("#carousel2").offset().top
                },);
            });

            $("#close2").click(function() {
                var video2 = videojs('path-movie2');
                video2.pause();
              $("#detail2").hide(500);
              $('html, body').animate({
                    scrollTop: $("#carousel3").offset().top
                },);
            });

            $("#close3").click(function() {
                var video3 = videojs('path-movie3');
                video3.pause();
              $("#detail3").hide(500);
              $('html, body').animate({
                    scrollTop: $("#carousel4").offset().top
                },);
            });

            $("#advance-filter-content").hide();

            $("#btn-advance-filters").click(function() {
              $("#advance-filter-content").slideToggle("slow");
            });

            <?php
            $showless = '<div class="col-md-3">';
            $a = 1;
            $showless = $showless.'</div>';

            $showmore = '<div class="col-md-3">';
            $b = 1;
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
                items : 5,
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
                items : 5,
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

            var url_search = '<?php echo base_url()?>filmarchive/search/'+cat+'/'+value+'/<?php echo $text?>/<?php echo $paid?>/<?php echo $length?>';
            window.location = url_search;
          });

          $('.title-sort a').click(function() {
              var a = $(this).html();
              if(a=='#'){
                a = 'NO';
              }else if(a=='ALL'){
                a = '0';
              }
              var cat = '<?php echo $category?>';
                var value = '<?php echo $this->uri->segment(4);?>';

              var url_search = '<?php echo base_url()?>filmarchive/search/'+cat+'/'+value+'/<?php echo $text?>/<?php echo $paid?>/<?php echo $length?>/'+a;
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
                var url_search = '<?php echo base_url()?>filmarchive/search/'+cat+'/'+year_start+'-'+year_end+'/'+text+'/'+paid+'/'+length+'/';
              }else{
                var url_search = '<?php echo base_url()?>filmarchive/search/<?php echo $category?>/'+year_start+'-'+year_end+'/'+text+'/'+paid+'/'+length+'/';
              }
              window.location = url_search;
            });

            $("#search").click(function(){
              var text = $('.text-search').val();
              if (text=='') {
                text = '0';
              }

              var year_start = $('#year-start').val();
              var year_end = $('#year-end').val();

              var url_search = '<?php echo base_url()?>filmarchive/search/<?php echo $category?>/'+year_start+'-'+year_end+'/'+text+'/<?php echo $paid?>/<?php echo $length?>';
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
    </script>

    <div class="js_see_more" style="height: 0px !important"></div>
