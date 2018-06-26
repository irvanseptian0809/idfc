<body class="scroll-assist" style="background-color:#fef552;" data-reveal-selectors="section:not(.masonry):not(:first-of-type):not(.parallax)" data-reveal-timing="1000">
    <a id="top"></a>
    <div class="loader"></div>
    <nav class="transition--fade" id="nav2">
        <div class="nav-bar nav--absolute nav--fixed" data-fixed-at="200">
            <div class="nav-module logo-module left">
                <a href="<?php echo site_url()?>">
                    <img class="logo logo-dark" alt="logo" src="img/idfc-logo-dark.png" />
                    <img class="logo logo-light" alt="logo" src="img/idfc-logo.png" />
                </a>
            </div>
            <div class="nav-module menu-module left">
                <ul class="menu">
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
                    <li class="active">
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $(document).on('click','.show_more',function(){
            var ID = $(this).attr('id');
            $('.show_more').hide();
            $('.loding').show();
            $.ajax({
                type:'POST',
                url:'<?php echo base_url()."filmnews/see_more"?>',
                data:'no='+ID,
                success:function(html){
                    $('#show_more_main'+ID).remove();
                    $('.tutorial_list').append(html);
                }
            });

        });
    });
    </script>

    <div class="main-container transition--fade" style="background-color:#efefef;">
      <section class="project-single-process" style="padding:0;margin-bottom:50px;">
        <div class="container" style="width: 100%;">
          <div class="row row-list" style="padding-left:55px;padding-right:55px;">
            <div class="col-md-9" style="margin-top: 100px;">
                <div class="tutorial_list">
              <?php foreach ($film_news->result() as $row){?>
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
                    echo "<a href='https://".$url_info['host']."' target='_blank' style='text-decoration:underline;color:#007eff;'>".$url_info['host']."</a>";
                  }else{
                    $url_info['host'] = "";
                  }
                  ?>
                  </b>
                  <div class="title-news"><?php echo str_replace("a href","a style='color:#007eff;' href",$row->title_film_news)?></div>
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
              <?php //if($mod==0){ ?>
                <?php //}
                }?>


                <div class="box-news">
                <div>
                    <div class="img-banner">
                        <?php $banner = $this->db->select('*')->from('banner')->where('categori','filmnews')->get()->result(); ?>
                        <img src="http://116.206.196.146/idfilm/public/<?php echo $banner[0]->image?>" class="img-responsive">
                    </div>
                </div>
                </div>

                <div class="show_more_main" id="show_more_main5">
                    <span id="5" class="show_more" title="Load more posts">Load More</span>
                    <span class="loding" style="display: none;"><span class="loding_txt">Loading...</span></span>
                </div>

                <style type="text/css">
                    .show_more_main {
                    margin: 15px 25px;
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
                    display: block;
                    padding: 10px 0;
                    text-align: center;
                    font-weight:bold;
                    }
                    .loding {
                    background-color: #e9e9e9;
                    border: 1px solid;
                    border-color: #c6c6c6;
                    color: #333;
                    font-size: 12px;
                    display: block;
                    text-align: center;
                    padding: 10px 0;
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
                    .desc-news>h5{
                        line-height: normal; color: rgb(0, 0, 0); margin-bottom: 7.5pt;
                        font-size: unset !important;
                    }
                </style>
                </div>
            </div>
            <div class="col-md-3" style="margin-top:100px;">
              <div class="title-agenda">Agenda:</div>
              <?php foreach ($film_event->result() as $event){ ?>
              <div class="list-title-agenda"><?php echo $event->title?></div>

              <div class="desc-agenda" style="color:black;">
                <?php echo $event->isi?>
              </div>
              <?php
              }
              ?>
            </div>
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
                    <p class="text-white" style="line-height: 20px;text-align:justify;">
                         <?php
                         $des_footer = $this->db->where("param","deskripsi_footer")->get("settings")->result();
                         echo $des_footer[0]->value;
                         ?>
                    </p>

                    <span style="font-weight: 300;">Powered by</span>
                    <img src="<?php echo base_url()?>img/biznet.png" style="max-height: 60px;">
                </div>
                <div class="col-md-3" >
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

    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap2.min.js"></script>
    <script src="js/isotope.min.js"></script>
    <script src="js/ytplayer.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/lightbox.min.js"></script>
    <script src="js/twitterfetcher.min.js"></script>
    <script src="js/smooth-scroll.min.js"></script>
    <script src="js/scrollreveal.min.js"></script>
    <script src="js/parallax.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/lightslider.min.js"></script>
    <script src="js/wow.min.js"></script>

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

            var showless = '<div class="col-md-4">'+
                            '<input type="checkbox" name="categories"> All <br>'+
                            '<input type="checkbox" name="categories"> Animation'+
                        '</div>'+
                        '<div class="col-md-4">'+
                            '<input type="checkbox" name="categories"> Archive Materials <br>'+
                            '<input type="checkbox" name="categories"> Channels'+
                        '</div>'+
                        '<div class="col-md-4">'+
                            '<input type="checkbox" name="categories"> Commercials <br>'+
                            '<input type="checkbox" name="categories"> Documentaries'+
                        '</div>';

            var showmore = '<div class="col-md-4">'+
                            '<input type="checkbox" name="categories"> All <br>'+
                            '<input type="checkbox" name="categories"> Animation <br>'+
                            '<input type="checkbox" name="categories"> Feature Films <br>'+
                            '<input type="checkbox" name="categories"> Foreign Documentaries'+
                        '</div>'+
                        '<div class="col-md-4">'+
                            '<input type="checkbox" name="categories"> Archive Materials <br>'+
                            '<input type="checkbox" name="categories"> Channels <br>'+
                            '<input type="checkbox" name="categories"> Music Videos <br>'+
                            '<input type="checkbox" name="categories"> Short Films'+
                        '</div>'+
                        '<div class="col-md-4">'+
                            '<input type="checkbox" name="categories"> Commercials <br>'+
                            '<input type="checkbox" name="categories"> Documentaries <br>'+
                            '<input type="checkbox" name="categories"> Trailers'+
                        '</div>';

            var btnmore = '<span style="cursor: pointer;color: red;font-size: 12px;font-weight: 200;">Show More <i class="fa fa-sort-down" aria-hidden="true"></i></a>';

            var btnless = '<span style="cursor: pointer;color: red;font-size: 12px;font-weight: 200;">Show Less <i class="fa fa-sort-up" aria-hidden="true"></i></a>';

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

            var showless2 = '<div class="col-md-3">'+
                            '<input type="checkbox" name="genre"> All <br>'+
                            '<input type="checkbox" name="genre"> Action'+
                        '</div>'+
                        '<div class="col-md-3">'+
                            '<input type="checkbox" name="genre"> Adventure <br>'+
                            '<input type="checkbox" name="genre"> Animation'+
                        '</div>'+
                        '<div class="col-md-3">'+
                            '<input type="checkbox" name="genre"> Biografy <br>'+
                            '<input type="checkbox" name="genre"> Children'+
                        '</div>'+
                        '<div class="col-md-3">'+
                            '<input type="checkbox" name="genre"> Comedy <br>'+
                            '<input type="checkbox" name="genre"> Crime'+
                        '</div>';

            var showmore2 = '<div class="col-md-3">'+
                            '<input type="checkbox" name="genre"> All <br>'+
                            '<input type="checkbox" name="genre"> Action <br>'+
                            '<input type="checkbox" name="genre"> Documentary <br>'+
                            '<input type="checkbox" name="genre"> Drama <br>'+
                            '<input type="checkbox" name="genre"> Family'+
                        '</div>'+
                        '<div class="col-md-3">'+
                            '<input type="checkbox" name="genre"> Adventure <br>'+
                            '<input type="checkbox" name="genre"> Animation <br>'+
                            '<input type="checkbox" name="genre"> Fantasy <br>'+
                            '<input type="checkbox" name="genre"> History <br>'+
                            '<input type="checkbox" name="genre"> Horror'+
                        '</div>'+
                        '<div class="col-md-3">'+
                            '<input type="checkbox" name="genre"> Biografy <br>'+
                            '<input type="checkbox" name="genre"> Children <br>'+
                            '<input type="checkbox" name="genre"> Musicals <br>'+
                            '<input type="checkbox" name="genre"> Mystery <br>'+
                            '<input type="checkbox" name="genre"> Romance'+
                        '</div>'+
                        '<div class="col-md-3">'+
                            '<input type="checkbox" name="genre"> Comedy <br>'+
                            '<input type="checkbox" name="genre"> Crime <br>'+
                            '<input type="checkbox" name="genre"> Sci-Fi <br>'+
                            '<input type="checkbox" name="genre"> Sport <br>'+
                            '<input type="checkbox" name="genre"> Thriller'+
                        '</div>';

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
                items : 6,
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
    .title{
        margin:unset !important;
        line-height: unset !important;
    }
</style>
