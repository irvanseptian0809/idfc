<body class="scroll-assist" data-reveal-selectors="section:not(.masonry):not(:first-of-type):not(.parallax)" data-reveal-timing="1000">
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
      <section class="project-single-process">
        <div class="container" style="width: 100%;margin-top:50px;">
          <div class="row row-list text-center" style="padding-left:55px;padding-right:55px;">
            <div class="col-md-12 text-center">
              <div class="title-checkout">Daftar Transaksi</div>
              <div class="box-checkout">
                <table class="table-checkout">
                  <tr>
                    <th width="20%" class="head-table-checkout">Tanggal</th>
                    <th width="25%" class="head-table-checkout">Nama Barang</th>
                    <th width="10%" class="head-table-checkout">Status</th>
                    <th width="12%" class="head-table-checkout">Jenis</th>
                    <th width="13%" class="head-table-checkout">Harga</th>
                    <th width="10%" class="head-table-checkout">Qty</th>
                    <th width="10%" class="head-table-checkout">Jumlah</th>
                  </tr>
                  <tr>
                    <td colspan="7"><hr></td>
                  </tr>
                  <?php
                  $total = 0;
                  $trxid = "";
                  foreach ($order->result() as $orderdata){
                    if($orderdata->type == 'streaming'){
                      $harga = $orderdata->harga_streaming;
                      $plusminus = "hide";
                    }else if($orderdata->type == 'dvd'){
                      $harga = $orderdata->harga_dvd;
                      $plusminus = "show";
                    }else if($orderdata->type == 'vcd'){
                      $harga = $orderdata->harga_vcd;
                      $plusminus = "show";
                    }
                  ?>
                  <tr class="item">
                    <td><?php echo $orderdata->paid_at?></td>
                    <td><?php echo '<a href="'.base_url().'detail/index/'.url_title(strtolower($orderdata->title)).'/'.$orderdata->film_id.'">'.$orderdata->title.'</a>'; ?></td>
                    <td><?php echo $orderdata->status?></td>
                    <td><?php echo strtoupper($orderdata->type)?></td>
                    <td>Rp <?php echo number_format($harga,0,",",".")?></td>
                    <td><?php echo $orderdata->count?></td>
                    <td>Rp <?php echo number_format($harga*$orderdata->count,0,",",".")?></td>
                  </tr>
                  <?php
                  $total = $total+($harga*$orderdata->count);
                  $trxid = $orderdata->transaction_id;
                  }
                  ?>
                  <tr>
                    <td colspan="7" style="">&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="7" class="text-center"><hr></td>
                  </tr>
                </table>

                <br>

                <table class="table-checkout">
                  <tr>
                    <th width="20%" class="head-table-checkout">Tanggal</th>
                    <th width="25%" class="head-table-checkout">Nama Barang</th>
                    <th width="10%" class="head-table-checkout">Status</th>
                    <th width="12%" class="head-table-checkout">Jenis</th>
                    <th width="13%" class="head-table-checkout">Harga</th>
                    <th width="10%" class="head-table-checkout">Qty</th>
                    <th width="10%" class="head-table-checkout">Jumlah</th>
                  </tr>
                  <tr>
                    <td colspan="7"><hr></td>
                  </tr>
                  <?php
                  $trxid = "";
                  foreach ($order_expired->result() as $orderdata){
                    if($orderdata->type == 'streaming'){
                      $harga = $orderdata->harga_streaming;
                      $plusminus = "hide";
                    }else if($orderdata->type == 'dvd'){
                      $harga = $orderdata->harga_dvd;
                      $plusminus = "show";
                    }else if($orderdata->type == 'vcd'){
                      $harga = $orderdata->harga_vcd;
                      $plusminus = "show";
                    }
                  ?>
                  <tr class="item">
                    <td><?php echo $orderdata->paid_at?></td>
                    <td><?php echo '<a href="'.base_url().'detail/index/'.url_title(strtolower($orderdata->title)).'/'.$orderdata->film_id.'">'.$orderdata->title.'</a>'; ?></td>
                    <td><?php echo $orderdata->status?></td>
                    <td><?php echo strtoupper($orderdata->type)?></td>
                    <td>Rp <?php echo number_format($harga,0,",",".")?></td>
                    <td><?php echo $orderdata->count?></td>
                    <td>Rp <?php echo number_format($harga*$orderdata->count,0,",",".")?></td>
                  </tr>
                  <?php
                  $total = $total+($harga*$orderdata->count);
                  $trxid = $orderdata->transaction_id;
                  }
                  ?>
                  <tr>
                    <td colspan="7" style="">&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="7" class="text-center"><hr></td>
                  </tr>
                  <tr>
                    <td colspan="7" style="">&nbsp;</td>
                  </tr>
                  <tr>
                    <th colspan="5" class="text-footer text-right">Total :</th>
                    <th colspan="2" class="total-footer text-right" style="padding-right: 20px !important;">Rp <?php echo number_format($total,0,",",".")?></th>
                  </tr>
                </table>
              </div>
            </div>

            <div class="col-md-12 text-center">
              <div class="title-checkout">Daftar Penjualan</div>
              <div class="box-checkout">
                <table class="table-checkout">
                  <tr>
                    <th width="20%" class="head-table-checkout">Tanggal</th>
                    <th width="25%" class="head-table-checkout">Nama Barang</th>
                    <th width="10%" class="head-table-checkout">Status</th>
                    <th width="12%" class="head-table-checkout">Jenis</th>
                    <th width="13%" class="head-table-checkout">Harga</th>
                    <th width="10%" class="head-table-checkout">Qty</th>
                    <th width="10%" class="head-table-checkout">Jumlah</th>
                  </tr>
                  <tr>
                    <td colspan="7"><hr></td>
                  </tr>
                  <?php
                  $total = 0;
                  $trxid = "";
                  foreach ($order->result() as $orderdata){
                    if($orderdata->type == 'streaming'){
                      $harga = $orderdata->harga_streaming;
                      $plusminus = "hide";
                    }else if($orderdata->type == 'dvd'){
                      $harga = $orderdata->harga_dvd;
                      $plusminus = "show";
                    }else if($orderdata->type == 'vcd'){
                      $harga = $orderdata->harga_vcd;
                      $plusminus = "show";
                    }
                  ?>
                  <tr class="item">
                    <td><?php echo $orderdata->paid_at?></td>
                    <td><?php echo '<a href="'.base_url().'detail/index/'.url_title(strtolower($orderdata->title)).'/'.$orderdata->film_id.'">'.$orderdata->title.'</a>'; ?></td>
                    <td><?php echo $orderdata->status?></td>
                    <td><?php echo strtoupper($orderdata->type)?></td>
                    <td>Rp <?php echo number_format($harga,0,",",".")?></td>
                    <td><?php echo $orderdata->count?></td>
                    <td>Rp <?php echo number_format($harga*$orderdata->count,0,",",".")?></td>
                  </tr>
                  <?php
                  $total = $total+($harga*$orderdata->count);
                  $trxid = $orderdata->transaction_id;
                  }
                  ?>
                  <tr>
                    <td colspan="7" style="">&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="7" class="text-center"><hr></td>
                  </tr>
                  <tr>
                    <td colspan="7" style="">&nbsp;</td>
                  </tr>
                  <tr>
                    <th colspan="5" class="text-footer text-right">Total :</th>
                    <th colspan="2" class="total-footer text-right" style="padding-right: 20px !important;">Rp <?php echo number_format($total,0,",",".")?></th>
                  </tr>
                </table>
              </div>
            </div>
            <div class="col-md-12">
              <div class="col-md-10">&nbsp;</div>
              <div class="col-md-2">
                <a href="<?php echo site_url('profile')?>">
                  <button type="button" class="butt butt-primary sharp" style="font-size:16px !important;width:150px;height:60px;">My Prolife</button>
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>

        <div class="list-featured-bottom" style="padding: 35px 20px 45px 20px;">
            <img src="<?php echo base_url()?>images/banner-biznet.jpg" width="100%">
        </div>

        <footer class="footer-2 text-center-xs bg--dark">
            <div class="container">
                <div class="row" style="vertical-align: middle;">
                    <img class="logo logo-light " alt="logo" src="img/idfc-logo.png" style="border-right: 1px solid white; margin-bottom: 3px; margin-left: 10px;" /> <span class="text-white">All About Indonesian Film</span>
                    <div class="col-md-3 pull-right" style="padding-left: 8px;">
                        <div class="btn btn--xs btn-danger" style="font-weight: 300;">Submit Film</div>
                    </div>
                </div>
                <hr style="margin-top: 10px;">
                <div class="col-md-12">
                    <div class="col-md-4">
                        <p class="text-white" style="line-height: 20px;">
                             <?php
                             $des_footer = $this->db->where("param","deskripsi_footer")->get("settings")->result();
                             echo $des_footer[0]->value;
                             ?>
                        </p>

                        <span style="font-weight: 300;">Powered by</span>
                        <img src="img/biznet.png" style="max-height: 60px;">
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
        function changecount(param,id){
          $.ajax({
            type : 'POST',
            url : '<?php echo site_url('checkout/changecount')?>',
            data : {
              param : param,
              id : id
            },
            success:function(data){
              var tmp = eval('('+data+')');
              if (tmp.success){
                location.reload();
              }else{
                alert("Failed");
              }
            }
          });
        }

        function deletecart(id){
          var conf = confirm("Apakah kamu yakin akan menghapus data ini ?");
          if (conf == true) {
            $.ajax({
              type : 'POST',
              url : '<?php echo site_url('checkout/deletecart')?>',
              data : {
                id : id
              },
              success:function(data){
                var tmp = eval('('+data+')');
                if (tmp.success){
                  location.reload();
                }else{
                  alert("Failed");
                }
              }
            });
          }
        }

        function bayar(trxid){
          $.ajax({
            type : 'POST',
            url : '<?php echo site_url('checkout/setpayment')?>',
            data : {
              trxid : trxid
            },
            success:function(data){
              var tmp = eval('('+data+')');
              if (tmp.success){
                window.location = "<?php echo site_url('checkout/payment')?>/"+tmp.id;
              }else{
                alert("Failed");
              }
            }
          });
        }

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

        });
    </script>
