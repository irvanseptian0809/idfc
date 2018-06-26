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
                        <a href="<?php echo base_url()?>/watchfilms">
                            WatchFilms
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url()?>/filminfo">
                            FilmInfo
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url()?>/filmarchive">
                            FilmArchive
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url()?>/filmnews">
                            FilmNews
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url()?>/filmblog">
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
                    <li class="active">
                        <a href="<?php echo base_url()?>/checkout">
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
    <style media="screen">
    .form-register .input-field {
        width: 95% !important;
    }
    .form-register .input-field.full-width {
        width: 97.5% !important;
    }
    </style>
    <div class="main-container transition--fade" style="background-color:#efefef;">
      <section class="project-single-process">
        <div class="container" style="width: 100%;margin-top:50px;">
          <div class="row row-list text-center" style="padding-left:155px;padding-right:155px;">
            <div class="title-payment" style="padding-top:20px;">Pembayaran</div>
            <div class="col-md-12 text-center">
              <div class="box-checkout" style="height:750px;">
                <div class="col-md-12">
                  <form class="form-register" method="post" style="margin:0;">
                    <input type="hidden" name="payment_id" id="payment_id" value="<?php echo $payment_id?>">
                    <div class="col-md-12">
                        <input class="input-field full-width" type="text" name="nama" id="nama" placeholder="Nama tujuan kirim" required="">
                    </div>
                    <div class="col-md-12">
                        <textarea class="input-field full-width" name="alamat" id="alamat" placeholder="Alamat Tujuan Kirim" required="" rows="5"></textarea>
                    </div>
                    <div class="col-md-6">
                        <input class="input-field" type="text" name="kota" id="kota" placeholder="Kota" required="">
                    </div>
                    <div class="col-md-6">
                        <input class="input-field" type="text" name="propinsi" id="propinsi" placeholder="Propinsi" required="">
                    </div>
                    <div class="col-md-6">
                        <input class="input-field" type="text" name="kodepos" id="kodepos" placeholder="Kode Pos" required="">
                    </div>
                    <div class="col-md-6">
                        <input class="input-field" type="text" name="negara" id="negara" placeholder="Negara" required="">
                    </div>
                    <div class="col-md-6">
                        <input class="input-field" type="text" name="phone" id="phone" placeholder="Handphone" required="">
                    </div>
                    <div class="col-md-6">
                        <img src="<?php echo base_url()?>images/list-bank.png" alt="">
                    </div>
                    <div class="col-md-12" style="text-align:right;padding-top:25px;padding-right:40px;">
                      <button type="submit" id="bayar" class="butt butt-primary sharp" style="font-size:16px !important;width:150px;height:60px;">Bayar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
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

          $(".form-register").on('submit',function(e){
            e.preventDefault();
            var formatData = new FormData($(this)[0]);
            $.ajax({
              type : 'POST',
              url : '<?php echo site_url('checkout/submitpayment')?>',
              data : formatData,
              async: false,
              cache: false,
              contentType: false,
              processData: false,
              success:function(data){
                var tmp = eval('('+data+')');
                if (tmp.success){
                  alert("Terima kasih telah membeli Original Film di IdFilmCenter(Indonesian Film Center), silahkan melakukan transfer pembayaran ke rekening IdFilmCenter yang sudah dikirimkan ke email anda.");
                  window.location = "<?php echo site_url('checkout')?>";
                }else{
                  alert("Failed");
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

        });
    </script>
