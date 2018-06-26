<style>
.menu .fa-shopping-cart[data-badge]:after {
    top: -12px;
    right: -12px;
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
                    <li class="active">
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
    <div class="main-container transition--fade" style="background-color:#efefef;">
        <!-- <section class="project-single-process" style="padding:0;">
            <div class="container" style="width: 100%;">
            <div class="row row-list" style="padding-left:55px;padding-right:55px;">
                <div class="col-md-12">
                <div class="box-blog">
                    <?php //foreach ($film_blog->result() as $row){ ?>
                    <div class="title-blog"><?php //echo $row->title?></div>
                    <div class="date-blog">Tanggal Posting, <?php //echo date('d F Y', strtotime($row->article_date))?></div>
                    <div class="col-md-6" style="padding-right:25px;"><div class="box-content-blog"></div></div>
                    <div class="col-md-6 text-content-blog"><?php //echo $row->short_desc?></div>
                    <?php //echo $row->description?>
                    <div class="col-md-12 text-content-blog">
                    <center><hr style="height: 1px;background: #757575;width:90%;"><center>
                    </div>

                    <div class="clearfix"></div><br><br>
                    <?php //} ?>
                </div>
                </div>
            </div>
            </div>
        </section> -->

        <div class="main" role="main">
            <div id="content" class="content full" style="padding-top:70px;padding-bottom:20px;">
                <div class="container" style="padding-left:20px;padding-right:20px;">

                    <div class="row">
                        <!-- Posts List -->
                        <div class="col-md-9" style="overflow-y:hidden;">
                            <!-- Post -->
                            <?php
                            foreach ($film_blog->result() as $row){
                                $type = '';
                                $icon = '';
                                if($row->type == 'Gallery'){
                                    $type = 'format-gallery';
                                    $icon = 'icon-multiple-image';
                                }else if($row->type == 'Text'){
                                    $type = 'format-image';
                                    $icon = 'fa fa-quote-left';
                                }else if($row->type == 'Link'){
                                    $type = 'format-video';
                                    $icon = 'fa fa-video-camera';
                                }

                                $this->db->where('film_blog_id', trim($row->id));
                                $query_comment = $this->db->get('film_blog_comments');
                                $comments = $query_comment->num_rows();
                            ?>
                            <article class="post post-list <?php echo $type?>" style="margin-bottom:20px;">
                                <div class="post-head">
                                    <div class="post-head-left">
                                        <div class="post-date"><?php echo date("d M Y", strtotime($row->article_date))?></div>
                                        <div class="post-meta">
                                            <a href="#comment-data"><i class="fa fa-comment"></i> <?php echo $comments?></a>
                                            <?php if($row->tag != ''){ ?>
                                            <a href="<?php echo site_url('filmblog/tag/'.$row->tag)?>" class="post-cat"><?php echo $row->tag?></a>
                                            <?php } ?>
                                        </div>
                                        <span class="post-format-icon accent-bg"><i class="<?php echo $icon?>"></i></span>
                                    </div>
                                    <div class="post-head-right">
                                        <h2 class="post-title">
                                            <a href="<?php echo site_url('filmblog/detail/'.url_title(strtolower($row->title)).'/'.$row->id)?>">
                                                <?php echo $row->title?>
                                            </a>
                                        </h2>
                                    </div>
                                </div>
                                <?php if($row->cover != ''){ ?>
                                <div class="post-media">
                                    <img data-no-retina src="http://116.206.196.146/idfilm/public/<?php echo $row->cover?>" alt="">
                                </div>
                                <?php } ?>
                                <div class="post-entry" style="text-align:justify;">
                                    <?php echo str_replace("a href","a style='color:#007eff;' href",$row->description)?>
                                    <br>
                                    <?php if($row->type == 'Gallery'){ ?>
                                    <h2>Photo Galleries</h2>
                                    <div class="images-grid images-grid-1">
                                        <div class="image-wrapper">
                                            <?php
                                            $this->db->where('film_blog_id', trim($row->id));
                                            $this->db->order_by('abs(urut)','desc');
                                            $query_gallery = $this->db->get('film_blog_contents');
                                            foreach ($query_gallery->result() as $row_gallery){
                                            ?>
                                            <!-- <a href="http://116.206.196.146/idfilm/public/<?php //echo $row_gallery->image?>" data-lightbox="galeries">
                                             class="image-thumb"-->
                                                <a href="http://116.206.196.146/idfilm/public/<?php echo $row_gallery->image?>" rel="prettyPhoto[gallery_name]" ><img src="http://116.206.196.146/idfilm/public/<?php echo $row_gallery->image?>" data="<?php echo $row_gallery->caption?>" style="max-height: 150px;padding: 10px;" /></a>
                                            <!-- </a> -->
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <?php }else if($row->type == 'Link'){ ?>
                                    <h2>Video</h2>
                                    <div class="fw-video">
                                        <?php
                                        $this->db->where('film_blog_id', trim($row->id));
                                        $query_gallery = $this->db->get('film_blog_contents', 1);
                                        foreach ($query_gallery->result() as $row_gallery){
                                        ?>
                                        <iframe width="100%" height="500" src="<?php echo $row_gallery->link?>?rel=0" allowfullscreen></iframe>
                                        <?php } ?>
                                    </div>
                                    <?php } ?>
                                </div>
                                <div id="comment-data" class="post-footer">
                                    <div class="col-md-6">
                                        <a href="<?php echo site_url('filmblog')?>" class="text-center" style="font-size:14px;line-height: 40px;">
                                            <i class="fa fa-chevron-left"></i> Back to Blog
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <ul class="social-icons pull-right">
                                            <li><a href="http://www.facebook.com/sharer.php?u=<?php echo current_url();?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="https://twitter.com/share?url=<?php echo current_url();?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="https://plus.google.com/share?url=<?php echo current_url();?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                            <li><a href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                                        </ul>
                                    </div>

                                </div>
                            </article>
                            <?php } ?>

                            <div class="clearfix"></div>
                            <!-- Pagination -->
                            <div class="col-md-12" style="background-color: #FFF;padding:20px;">
                                <h2 class="page-header" style="margin: 0;">Comments</h2>
                                <section class="comment-list">
                                    <?php
                                    foreach($query_comment->result() as $commentdata){
                                        $namemember = "";
                                        $picmember = "";
                                        $this->db->where('id', trim($commentdata->film_member_id));
                                        $query_member = $this->db->get('film_member');
                                        foreach($query_member->result() as $memberdata){
                                            $arr = explode(' ',trim($memberdata->nama));
                                            if(count($arr)>0){
                                                $namemember = $arr[0];
                                            }else{
                                                $namemember = $memberdata->nama;
                                            }
                                            $picmember = 'http://116.206.196.146/idfilm/public/'.$memberdata->picture;
                                        }
                                    ?>
                                    <article class="row" style="margin-bottom: 15px;border-bottom: 1px solid #eeeeee;padding-bottom: 15px;">
                                        <div class="col-md-1 col-sm-1 hidden-xs">
                                            <div class="thumbnail" style="padding-right: 10px;">
                                                <img class="img-responsive" src="<?php echo $picmember?>" />
                                            </div>
                                        </div>
                                        <div class="col-md-11 col-sm-11">
                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                    <header class="text-left">
                                                        <time class="comment-date" style="font-size:13px;">
                                                            <i class="fa fa-user"></i> <?php echo $namemember?><br>
                                                            <i class="fa fa-clock-o"></i> <?php echo date('M d, Y H:i:s', strtotime($commentdata->created_at))?>
                                                        </time>
                                                    </header>
                                                    <div class="comment-post">
                                                        <p style="text-align: justify;"><?php echo $commentdata->comment?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if(sessionValue('id') == $commentdata->film_member_id){ ?>
                                            <div style="position: absolute;top: 0;right: 0;">
                                                <a href="javascript:" onclick="deletecomment('<?php echo $commentdata->id?>')" style="font-size:13px;color:#FC7878;">
                                                    <i class="fa fa-trash" style="cursor:pointer;"></i> Hapus
                                                </a>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </article>
                                    <?php } ?>
                                </section>
                                <div class="col-md-12 col-sm-12">
                                    <div class="col-md-12 col-sm-12">
                                        <textarea name="newcomment" id="newcomment" rows="5" placeholder="Tulis komentarmu" style="border:1px solid #9AC4DE;"></textarea>
                                    </div>
                                    <div class="col-md-12 col-sm-12 text-right">
                                        <a class="btn btn-primary btn-more" id="sendcomment" style="height:32px;border-radius:0px;font-size: 14px;line-height: 14px;">Send</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Site Sidebar -->
                        <aside class="col-md-3 sidebar right-sidebar" style="padding-left:20px;position: sticky;top: 70px;">
                            <div class="widget sidebar-widget popular-post-widget">
                              <h3 class="widgettitle" style="margin-bottom: 20px;">Search Blog</h3>
                              <form action="<?php echo base_url()?>filmblog/search" method="post">
                                <div class="wrap">
                                  <div class="search">
                                    <input type="text" name="key" class="searchTerm" placeholder="What are you looking for?">
                                    <button type="submit" class="searchButton">
                                      <i class="fa fa-search"></i>
                                    </button>
                                  </div>
                                </div>
                              </form>
                            </div>
                            <div class="widget sidebar-widget widget_archive">
                                <h3 class="widgettitle">Archives</h3>
                                <div id="archive-data" class=""></div>
                            </div>
                            <div class="widget sidebar-widget tagcloud-widget" style="margin-bottom: 0px;">
                                <h3 class="widgettitle">Tags</h3>
                                <div class="tagcloud">
                                    <?php
                                    foreach ($tags->result() as $tag){
                                        if($tag->value != ''){
                                        ?>
                                        <a href="<?php echo site_url('filmblog/tag/'.$tag->value)?>"><?php echo $tag->value?></a>
                                        <?php
                                        }
                                    } ?>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
                <div class="list-featured-bottom" style="padding-top: 20px;padding-left: 20px;padding-right: 20px;">
                    <img src="<?php echo base_url().'images/banner-biznet.jpg'?>" width="100%">
                </div>
            </div>
        </div>

        <footer class="footer-2 text-center-xs bg--dark">
            <div class="container">
                <div class="row" style="vertical-align: middle;padding-top:15px;">
                    <img class="logo logo-light " alt="logo" src="<?php echo base_url()?>img/idfc-logo.png" style="border-right: 1px solid white; margin-bottom: 3px; margin-left: 10px;" /> <span class="text-white">All About Indonesian Film</span>
                    <div class="col-md-3 pull-right" style="padding-left: 8px;">
                        <div class="btn btn--xs btn-danger" style="font-weight: 300;">Submit Film</div>
                    </div>
                </div>
                <hr style="margin-top: 10px;">
                <div class="col-md-12">
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
                    <div class="col-md-2" style="font-weight: 100;">
                        <h4 class="text-white">Navigation</h4>
                        <div class="col-md-6" style="padding-left: 0;line-height: 25px;">
                            <a href="#">Home</a>
                            <a href="#">WatchFilm</a>
                            <a href="#">FilmInfo</a>
                            <a href="#">FilmArchive</a>
                        </div>
                        <div class="col-md-6" style="line-height: 25px;">
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
    <script src="<?php echo base_url()?>plugins/blog/js/bootstrap-treeview.min.js"></script>
    <script src="<?php echo base_url()?>plugins/blog/js/jquery.flexslider.js"></script>
    <script src="<?php echo base_url()?>plugins/blog/js/jquery.imagesGrid.js"></script>

    <link href="<?php echo base_url()?>css/prettyPhoto.css" type="text/css" media="screen" charset="utf-8" rel="stylesheet" />
        <script src="<?php echo base_url()?>js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>

    <style type="text/css">
        .pp_expand{
            display: none;
        }
    </style>

    <script type="text/javascript">
    $(document).ready(function(){

        $(document).ready(function () {
                $("a[rel^='prettyPhoto']").prettyPhoto({
                    social_tools:'',
                    theme: 'facebook',
                    slideshow: 5000,
                    autoplay_slideshow: false,
                    allow_resize:true,allow_expand:false
                });
            });

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

        $("#sendcomment").click(function(){
            var stat = '<?php echo sessionValue('id')?>';
            if(stat == ""){
                alert('Silahkan Login terlebih dahulu untuk berkomentar.');
            }else{
                var commentvalue = $('#newcomment').val();
                if(commentvalue == ''){
                    alert('Silahkan isi komentar anda..');
                }else{
                    $.ajax({
                        type : 'POST',
                        url : '<?php echo site_url('filmblog/addcomment')?>',
                        data : {
                            blog_id : '<?php echo $idblog?>',
                            film_member_id : '<?php echo sessionValue('id')?>',
                            comment : commentvalue
                        },
                        success:function(data){
                            var tmp = eval('('+data+')');
                            if (tmp.success){
                                $('#newcomment').val('');
                                $(".comment-list").append( tmp.newdata ).fadeIn('5000');
                            }else{
                                alert("Maaf, komentar anda gagal disimpan.");
                            }
                        }
                    });
                }
            }
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

        $('body').append('<div class="product-image-overlay"><span class="product-image-overlay-close">x</span><img src="" /><p id="text_value_title"></p></div>');
        var productImage = $('.image-thumb');
        var productOverlay = $('.product-image-overlay');
        var productOverlayImage = $('.product-image-overlay img');
        var productOverlayTitle = $('.product-image-overlay p');

        productImage.click(function () {
            var productImageSource = $(this).attr('src');
            var productImageTitle = $(this).attr('data');

            productOverlayImage.attr('src', productImageSource);

            document.getElementById("text_value_title").innerHTML = productImageTitle;

            productOverlay.fadeIn(100);
            $('body').css('overflow', 'hidden');

            $('.product-image-overlay-close').click(function () {
                productOverlay.fadeOut(100);
                $('body').css('overflow', 'auto');
            });
        });

    });
    </script>

    <style type="text/css">
        #text_value_title{
            padding-top: 25px;
            text-align: center;
            color: white;
            font-size: 20px;
        }
        .product-image-overlay img{
            height: 70%;
        }
    </style>

    <script type="text/javascript">
    $(".images-grid-1").imagesGrid();

    function deletecomment(id){
        $.ajax({
            type : 'POST',
            url : '<?php echo site_url('filmblog/deletecomment')?>',
            data : {
                id : id
            },
            success:function(data){
                var tmp = eval('('+data+')');
                if (tmp.success){
                    window.location.reload();
                }else{
                    alert("Maaf, komentar anda gagal dihapus.");
                }
            }
        });
    }
    </script>

    <script type="text/javascript">
        $('.flexslider').flexslider({
            animation: "slide"
        });

        var baseUrl = "<?php echo site_url('filmblog')?>";
        $(function() {

            $.ajax({
                type: "POST",
                url: "<?php echo site_url('filmblog/archive')?>",
                dataType: "json",
                success: function(response)
                {
                    $('#archive-data').treeview({
                        color: "#428bca",
                        showBorder: false,
                        enableLinks: true,
                        data: response
                    });
                }
            });

            $('#archive-data').on('nodeSelected', function(event, data) {
                console.log(data);
                alert(data.href)
            });
        });
        </script>



    <script type="text/javascript">

    $(document).ready(function(){
        $('.pp_expand').click(function() {
            $('.pp_pic_holder').css({
                'top': '0px',
                'left': '0px',
                'display': 'block',
                'width' : '100%'
            });

            $('.pp_content').css({
                'width' : '100% !important',
                'height' : '100% !important'
            });
            alert("Hello! I am an alert box!");
        });
    });

    </script>
