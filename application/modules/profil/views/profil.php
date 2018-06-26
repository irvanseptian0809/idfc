<style media="screen">
.popover {
  position: absolute;
  top: 0;
  left: 0;
  z-index: 1060;
  display: none;
  max-width: 276px;
  padding: 1px;
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-size: 14px;
  font-style: normal;
  font-weight: normal;
  line-height: 1.42857143;
  text-align: left;
  text-align: start;
  text-decoration: none;
  text-shadow: none;
  text-transform: none;
  letter-spacing: normal;
  word-break: normal;
  word-spacing: normal;
  word-wrap: normal;
  white-space: normal;
  background-color: #fff;
  -webkit-background-clip: padding-box;
          background-clip: padding-box;
  border: 1px solid #ccc;
  border: 1px solid rgba(0, 0, 0, .2);
  border-radius: 6px;
  -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
          box-shadow: 0 5px 10px rgba(0, 0, 0, .2);

  line-break: auto;
}
.popover.top {
  margin-top: -10px;
}
.popover.right {
  margin-left: 10px;
}
.popover.bottom {
  margin-top: 10px;
}
.popover.left {
  margin-left: -10px;
}
.popover-title {
  padding: 8px 14px;
  margin: 0;
  font-size: 14px;
  background-color: #f7f7f7;
  border-bottom: 1px solid #ebebeb;
  border-radius: 5px 5px 0 0;
}
.popover-content {
  padding: 9px 14px;
}
.popover > .arrow,
.popover > .arrow:after {
  position: absolute;
  display: block;
  width: 0;
  height: 0;
  border-color: transparent;
  border-style: solid;
}
.popover > .arrow {
  border-width: 11px;
}
.popover > .arrow:after {
  content: "";
  border-width: 10px;
}
.popover.top > .arrow {
  bottom: -11px;
  left: 50%;
  margin-left: -11px;
  border-top-color: #999;
  border-top-color: rgba(0, 0, 0, .25);
  border-bottom-width: 0;
}
.popover.top > .arrow:after {
  bottom: 1px;
  margin-left: -10px;
  content: " ";
  border-top-color: #fff;
  border-bottom-width: 0;
}
.popover.right > .arrow {
  top: 50%;
  left: -11px;
  margin-top: -11px;
  border-right-color: #999;
  border-right-color: rgba(0, 0, 0, .25);
  border-left-width: 0;
}
.popover.right > .arrow:after {
  bottom: -10px;
  left: 1px;
  content: " ";
  border-right-color: #fff;
  border-left-width: 0;
}
.popover.bottom > .arrow {
  top: -11px;
  left: 50%;
  margin-left: -11px;
  border-top-width: 0;
  border-bottom-color: #999;
  border-bottom-color: rgba(0, 0, 0, .25);
}
.popover.bottom > .arrow:after {
  top: 1px;
  margin-left: -10px;
  content: " ";
  border-top-width: 0;
  border-bottom-color: #fff;
}
.popover.left > .arrow {
  top: 50%;
  right: -11px;
  margin-top: -11px;
  border-right-width: 0;
  border-left-color: #999;
  border-left-color: rgba(0, 0, 0, .25);
}
.popover.left > .arrow:after {
  right: 1px;
  bottom: -10px;
  content: " ";
  border-right-width: 0;
  border-left-color: #fff;
}
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
    <?php
    foreach ($userdata as $row){
    ?>
    <div class="main-container transition--fade">
        <section class="project-single-process" id="watchfilms">
            <div class="container filminfo-detail-container" style="width: 100%;">
                <div class="row row-list" style="padding-top: 25px;">
                    <div class="col-md-12 desc-filminfo-nav">
                        <div class="col-md-12">
                          <div class="col-md-4 text-center" style="padding-bottom: 20px;">
                            <?php if($type == "company"){?>
                              <span class="title-detail-film"><?php echo $row['data']->title?></span>
                            <?php }else{?>
                              <span class="title-detail-film"><?php echo $row['data']->nama?></span>
                            <?php }?>
                          </div>
                          <div class="col-md-8" style="height: 55px;">&nbsp;</div>
                        </div>
                        <div class="col-md-4 text-center" style="padding-left: 0px;">

                        <?php if($type == "company"){?>
                            <img src="<?php
                            if(!empty($row['data']->logo)){
                              if(strpos($row['data']->logo, 'uploads/') !== false){
                                  echo 'http://116.206.196.146/'.$row['data']->logo;
                              }else if(strpos($row['data']->logo, 'filmdata/') !== false){
                                  echo 'http://116.206.196.146/'.$row['data']->logo;
                              }else{
                                  echo 'http://116.206.196.146/uploads/'.$row['data']->logo;
                              }
                            }else{
                            echo 'http://116.206.196.146/idfilm/public/uploads/images/profile/no-image.jpg';
                            }
                            ?>" style="width:70%;">

                            <?php
                            $this->db->where('company_id', $row['data']->id);
                            $query_gallery = $this->db->get('film_company_gallery');
                            foreach ($query_gallery->result() as $no => $row_gallery){
                            $no++;
                            if($no == 5)break;
                            ?>

                            <img src="http://116.206.196.146/idfilm/public/<?php echo $row_gallery->image?>" style="width:70%;">
                            <?php }?>
                        <?php }else{?>
                            <img src="<?php
                            if(!empty($row['data']->photo)){
                              if(strpos($row['data']->photo, 'uploads/') !== false){
                                  echo 'http://116.206.196.146/'.$row['data']->photo;
                              }else if(strpos($row['data']->photo, 'filmdata/') !== false){
                                  echo 'http://116.206.196.146/'.$row['data']->photo;
                              }else{
                                  echo 'http://116.206.196.146/uploads/'.$row['data']->photo;
                              }
                            }else{
                            echo 'http://116.206.196.146/idfilm/public/uploads/images/profile/no-image.jpg';
                            }
                            ?>" style="width:70%;">

                            <?php
                            $this->db->where('profiles_id', $row['data']->id);
                            $query_gallery = $this->db->get('profiles_gallery');
                            foreach ($query_gallery->result() as $no => $row_gallery){
                            $no++;
                            if($no == 5)break;

                            ?>

                            <img src="<?php
                              if(strpos($row_gallery->ori_image, 'uploads/') !== false){
                                  echo 'http://116.206.196.146/'.$row_gallery->ori_image;
                              }else if(strpos($row_gallery->ori_image, 'filmdata/') !== false){
                                  echo 'http://116.206.196.146/'.$row_gallery->ori_image;
                              }else{
                                  echo 'http://116.206.196.146/uploads/'.$row_gallery->ori_image;
                              }
                            ?>" style="width:70%;">

                            <?php }?>
                        <?php }?>

                        </div>
                        <div class="col-md-8 accordion-filminfo" style="padding-top: 8px;">
                            <div id="accordion" class="accordion red">
                                <div class="accordion-item" id="accordion-item2">
                                    <div class="accordion-header" id="accordion-link2">
                                        INFORMASI DASAR
                                        <span class="accordion-item-arrow"></span>
                                    </div>
                                    <div class="accordion-content" id="accordion-content2">

                                    <?php if($type == "company"){ ?>

                                      <?php
                                      $hari = "";
                                      $bulan = "";
                                      $tahun = "";
                                      $tgl = explode("/", $row['data']->build_on);
                                      if(count($tgl) == 3){
                                        $hari = $tgl[0];
                                        $bulan = $tgl[1];
                                        $tahun = $tgl[2];
                                      }

                                      if($bulan == 1){
                                        $bulan = "Januari";
                                      }else if($bulan == 2){
                                        $bulan = "Februari";
                                      }else if($bulan == 3){
                                        $bulan = "Maret";
                                      }else if($bulan == 4){
                                        $bulan = "April";
                                      }else if($bulan == 5){
                                        $bulan = "Mei";
                                      }else if($bulan == 6){
                                        $bulan = "Juni";
                                      }else if($bulan == 7){
                                        $bulan = "Juli";
                                      }else if($bulan == 8){
                                        $bulan = "Agustus";
                                      }else if($bulan == 9){
                                        $bulan = "September";
                                      }else if($bulan == 10){
                                        $bulan = "Oktober";
                                      }else if($bulan == 11){
                                        $bulan = "November";
                                      }else if($bulan == 12){
                                        $bulan = "Desember";
                                      }

                                      ?>

                                      <!-- =======   TANGGAL PENDIRIAN   ========= -->
                                      <?php if(!empty($row['data']->build_place) && !empty($row['data']->build_on)){?>
                                      <span class="desc-film">
                                        Tanggal Pendirian : <?php echo $row['data']->build_place.", ".$hari." ".$bulan." ".$tahun?>
                                      </span><br><br>
                                      <?php }?>

                                      <!-- =======   Pemilik   ========= -->
                                      <span class="desc-film">
                                        Pemilik/CEO : <?php echo $row['data']->title ?>
                                      </span><br><br>

                                      <!-- =======   Kontak   ========= -->
                                      <?php
                                      $kontak = $this->db->select('*')->from('film_company_contact')->where('company_id',$row['data']->id)->get()->result();
                                      if(count($kontak) > 1){
                                      ?>
                                      <span class="desc-film">
                                        Kontak : Lihat Kontak
                                        <?php
                                        $c_kontak = count($kontak);
                                        foreach($kontak as $noo => $value){
                                          $noo++;
                                          echo $value->person;
                                          if($c_kontak != $noo){
                                            echo ", ";
                                          }
                                        }
                                        ?>
                                      </span><br><br>
                                      <?php }?>

                                      <!-- =======   Site ====== -->

                                      <?php
                                      if(!empty($row['data']->site)){
                                        $site = $row['data']->site;
                                      ?>
                                        <span class="desc-film">
                                          Official Website : <a target="_blank" href="<?php echo $site?>"> <?php echo $row['data']->title?></a>
                                        </span><br><br>
                                      <?php
                                      }
                                      ?>

                                      <!-- =======   Dikenal Sebagai   ========= -->
                                      <?php if(!empty($row['data']->known_as)){?>
                                        <span class="desc-film">Juga dikenal sebagai <?php echo $row['data']->known_as;?></span><br><br>
                                      <?php }?>

                                    <?php }else{?>

                                      <?php if(!empty($row['data']->aka)){?>
                                        <span class="desc-film">Juga dikenal sebagai <?php echo $row['data']->aka;?></span><br><br>
                                      <?php }?>

                                      <?php
                                      if(!empty($row['data']->dob_place) && !empty($row['data']->dob_date) && !empty($row['data']->dob_month) && !empty($row['data']->dob_year)){
                                        $dob = explode("|", $row['data']->dob_place);
                                        if(count($dob) > 1){
                                          $dob = $dob[1];
                                        }else{
                                          $dob = $dob[0];
                                        }
                                      ?>
                                      <span class="desc-film">Tempat / Tanggal Lahir : <?php echo $dob.", ".$row['data']->dob_date.", ".$row['data']->dob_month.", ".$row['data']->dob_year?></span><br><br>

                                        <?php }else if(!empty($row['data']->dob_place) && !empty($row['data']->dob)){?>

                                          <?php
                                          $tgl = explode("-", $row['data']->dob);
                                        if(count($tgl) == 3){
                                          $hari = $tgl[2];
                                          $bulan = $tgl[1];
                                          $tahun = $tgl[0];
                                        }

                                        if($bulan == 1){
                                          $bulan = "Januari";
                                        }else if($bulan == 2){
                                          $bulan = "Februari";
                                        }else if($bulan == 3){
                                          $bulan = "Maret";
                                        }else if($bulan == 4){
                                          $bulan = "April";
                                        }else if($bulan == 5){
                                          $bulan = "Mei";
                                        }else if($bulan == 6){
                                          $bulan = "Juni";
                                        }else if($bulan == 7){
                                          $bulan = "Juli";
                                        }else if($bulan == 8){
                                          $bulan = "Agustus";
                                        }else if($bulan == 9){
                                          $bulan = "September";
                                        }else if($bulan == 10){
                                          $bulan = "Oktober";
                                        }else if($bulan == 11){
                                          $bulan = "November";
                                        }else if($bulan == 12){
                                          $bulan = "Desember";
                                        }

                                        $dob = explode("|", $row['data']->dob_place);
                                        if(count($dob) > 1){
                                          $dob = $dob[1];
                                        }else{
                                          $dob = $dob[0];
                                        }

                                        ?>

                                        <!-- =======   TANGGAL LAHIR   ========= -->
                                        <span class="desc-film">
                                          <span class="desc-film">Tempat / Tanggal Lahir : <?php echo $dob.", ".$hari.", ".$bulan.", ".$tahun?></span><br><br>
                                        </span><br><br>

                                      <?php }?>

                                    <?php }?>


                                        <span class="title-film">Biografi Singkat: </span><br>

                                        <?php if($type == "company"){?>

                                        <?php if(!empty($row['data']->brief_biography_id)){?>
                                        <span class="desc-film" id="desc-film"><?php echo nl2br($row['data']->brief_biography_id)?></span>
                                        <?php }else{?>
                                        <span class="desc-film">Belum Ada Informasi</span>
                                        <?php }?>
                                        </br></br>
                                        <span class="title-film">Biografi Lengkap: </span><br>
                                        <?php if(!empty($row['data']->biography_id)){?>
                                        <span class="desc-film"><?php echo nl2br($row['data']->biography_id)?></span>
                                        <?php }else{?>
                                        <span class="desc-film">Belum Ada Informasi</span>
                                        <?php }?>

                                        <?php }else{?>

                                        <?php if(!empty($row['data']->short_biography_ind)){?>
                                        <span class="desc-film"><?php echo nl2br($row['data']->short_biography_ind)?></span>
                                        <?php }else{?>
                                        <span class="desc-film">Belum Ada Informasi</span>
                                        <?php }?>
                                        </br></br>
                                        <span class="title-film">Biografi Lengkap: </span><br>
                                        <?php if(!empty($row['data']->full_biography_ind)){?>
                                        <span class="desc-film"><?php echo nl2br($row['data']->full_biography_ind)?></span>
                                        <?php }else{?>
                                        <span class="desc-film">Belum Ada Informasi</span>
                                        <?php }?>

                                        <?php }?>


                                        <!--<br><br>
                                        <span class="title-film">Sinopsis Lengkap: </span><br>
                                        <span class="desc-film"><?php //echo $row->situs_resmi?></span>-->
                                    </div>
                                </div>
                                <div class="accordion-item" id="accordion-item1">
                                    <div class="accordion-header" id="accordion-link1">
                                        FILMOGRAFI
                                        <span class="accordion-item-arrow"></span>
                                    </div>
                                    <div class="accordion-content" id="accordion-content1">
                                        <!--<span class="title-film">Sinopsis Singkat: </span><br>-->

                                        <span class="title-film">Filmografi :</span>
                                        <br><br>
                                        <?php if($type != "company"){?>

                                          <?php foreach($filmografi as $value){
                                            if($value->title != ""){
                                          ?>
                                          <div style="padding: 4px 0">
                                          	<p class="title-film" style="display: inline-block;"><a href="<?php echo base_url().'detail/index/'.url_title(strtolower($value->title)).'/'.$value->id;?>"><?php echo $value->title;?> ( <?php echo $value->tahun;?> )</a></p>
                                            <?php if(!empty($value->position)){?>
                                          	<p class="desc-film" style="display: inline-block;float: right;"><?php echo $value->position;?></p>
                                            <?php }else{?>
                                              <?php
                                              $position = $this->db->select("*")->from("film_list")->where("id",$value->id)->get()->result();
                                              $profile_id = $this->db->select("*")->from("profiles")->where("id",$value->profile_id)->get()->result();
                                              if(!empty($position)){
                                              ?>
                                                <p class="desc-film" style="display: inline-block;float: right;"><?php
                                                  if($position[0]->producer_id == $profile_id[0]->nama){
                                                    echo "Producer";
                                                  }else if($position[0]->director_id == $profile_id[0]->nama){
                                                    echo "Sutradara";
                                                  }
                                                ?></p>
                                              <?php }
                                              ?>
                                            <?php }?>
                                          </div>
                                          <?php }}?>

                                        <?php }else{?>

                                          <?php foreach($filmografi as $value){
                                            if($value->title != ""){
                                          ?>
                                          <div style="padding: 4px 0">
                                            <p class="title-film" style="display: inline-block;"><a href="<?php echo base_url().'detail/index/'.url_title(strtolower($value->title)).'/'.$value->id;?>"><?php echo $value->title;?> ( <?php echo $value->tahun;?> )</a></p>
                                          </div>
                                          <?php }}?>

                                        <?php }?>

                                    </div>
                                </div>
                                <div class="accordion-item" id="accordion-item3">
                                    <div class="accordion-header" id="accordion-link3">
                                        MATERI DAN PROMOSI
                                        <span class="accordion-item-arrow"></span>
                                    </div>
                                    <div class="accordion-content" id="accordion-content3">

          <div class="images-grid images-grid-1">
              <div class="image-wrapper">
                  <?php
                  if($type == "company"){
                    if(!empty($row['data']->logo)){
                      if (strpos($row['data']->logo, 'uploads') !== false || strpos($row['data']->logo, 'filmdata')) {
                        $first_photo = 'http://116.206.196.146/idfilm/public/'.$row['data']->logo.'';
                      }else{
                        $first_photo = 'http://116.206.196.146/idfilm/public/uploads/'.$row['data']->logo.'';
                      }
                    }else{
                      $first_photo = 'http://116.206.196.146/idfilm/public/uploads/images/profile/no-image.jpg';
                    }
                  }else{
                    if(!empty($row['data']->photo)){
                      if (strpos($row['data']->photo, 'uploads') !== false || strpos($row['data']->photo, 'filmdata')) {
                        $first_photo = 'http://116.206.196.146/idfilm/public/'.$row['data']->photo.'';
                      }else{
                        $first_photo = 'http://116.206.196.146/idfilm/public/uploads/'.$row['data']->photo.'';
                      }
                    }else{
                      $first_photo = 'http://116.206.196.146/idfilm/public/uploads/images/profile/no-image.jpg';
                    }
                  }
                  ?>

                      <a href="<?php echo $first_photo?>" rel="prettyPhoto[gallery_name]" ><img src="<?php echo $first_photo?>" data="" style="max-height: 150px;padding: 10px;" /></a>

                  <?php

                  if($type == "company"){
                    $this->db->where('company_id', $row['data']->id)->where('deleted_at',null);
                    $query_gallery = $this->db->get('film_company_gallery');
                  }else{
                    $this->db->where('profiles_id', $row['data']->id)->where('deleted_at',null);
                    $query_gallery = $this->db->get('profiles_gallery');
                  }
                  foreach ($query_gallery->result() as $row_gallery){
                  ?>
                  <!-- <a href="http://116.206.196.146/idfilm/public/<?php //echo $row_gallery->image?>" data-lightbox="galeries">
                   class="image-thumb"-->
                  <?php if($type == "company"){
                      if (strpos($row_gallery->image, 'uploads') !== false || strpos($row_gallery->image, 'filmdata')) {
                        $gallery_photo = 'http://116.206.196.146/idfilm/public/'.$row_gallery->image.'';
                      }else{
                        $gallery_photo = 'http://116.206.196.146/idfilm/public/uploads/'.$row_gallery->image.'';
                      }
                  ?>
                      <a href="<?php echo $gallery_photo?>" rel="prettyPhoto[gallery_name]" ><img src="<?php echo $gallery_photo?>" data="" style="max-height: 150px;padding: 10px;" /></a>
                  <!-- </a> -->
                  <?php }else{
                      if (strpos($row_gallery->ori_image, 'uploads') !== false || strpos($row_gallery->ori_image, 'filmdata')) {
                        $gallery_photo = 'http://116.206.196.146/idfilm/public/'.$row_gallery->ori_image.'';
                      }else{
                        $gallery_photo = 'http://116.206.196.146/idfilm/public/uploads/'.$row_gallery->ori_image.'';
                      }
                  ?>
                      <a href="<?php echo $gallery_photo?>" rel="prettyPhoto[gallery_name]" ><img src="<?php echo $gallery_photo?>" data="" style="max-height: 150px;padding: 10px;" /></a>
                  <?php }?>
                  <?php } ?>
              </div>
          </div>
                                    </div>
                                </div>
                                <div class="accordion-item" id="accordion-item4">
                                    <div class="accordion-header" id="accordion-link4">
                                        FESTIVAL & PENGHARGAAN
                                        <span class="accordion-item-arrow"></span>
                                    </div>
                                    <div class="accordion-content" id="accordion-content4">
                                        <?php if(!empty($row['award'])){ ?>
                                        <span class="title-film" style="font-size: unset;height:100px">
                                            <div class="col-md-2" style="height:40px">Festival</div>
                                            <div class="col-md-2" style="height:40px">Kota, Negara</div>
                                            <div class="col-md-2" style="height:40px">Tahun</div>
                                            <div class="col-md-2" style="height:40px">Judul Film</div>
                                            <div class="col-md-2" style="height:40px">Award</div>
                                            <div class="col-md-2" style="height:40px">Hasil</div>
                                        </span>
                                        <span class="desc-film" style="font-size: unset;">

                                            <?php
                                            $no = 0;
                                            foreach($row['award'] as $award){

                                            if($no == 2){
                                              $no =0;
                                            }
                                            $no++;
                                            ?>

                                            <?php if($no == 2){?>
                                            <div class="row" style="border-bottom: 1px solid #f3f3f3;background: #f3f3f3;">
                                            <?php }else{?>
                                            <div class="row" style="border-bottom: 1px solid #f3f3f3;">
                                            <?php }?>

                                            <?php
                                            $festival = explode('|', $award->festival);
                                            if(count($festival) > 1){
                                              $festival = $festival[1];
                                            }else{
                                              $festival = $festival[0];
                                            }

                                            $location = explode('|', $award->location);
                                            if(count($location) > 1){
                                              $location = $location[1];
                                            }else{
                                              $location = $location[0];
                                            }

                                            $penghargaan = explode('|', $award->award);
                                            if(count($penghargaan) > 1){
                                              $penghargaan = $penghargaan[1];
                                            }else{
                                              $penghargaan = $penghargaan[0];
                                            }
                                            ?>

                                            <div class="col-md-2"><?php echo $festival?></div>
                                            <div class="col-md-2"><?php echo $location?></div>
                                            <div class="col-md-2"><?php echo $award->year?></div>
                                            <div class="col-md-2"><?php echo $award->judul?></div>
                                            <div class="col-md-2"><?php echo $penghargaan?></div>
                                            <div class="col-md-2"><?php echo $award->result?></div>
                                            </div>
                                            <?php
                                              }
                                              ?>
                                            <div class="clearfix"></div>
                                        </span>
                                        <?php }else{?>
                                          <span class="desc-film">Belum Ada Informasi</span>
                                        <?php }?>
                                    </div>
                                </div>
                                <div class="accordion-item" id="accordion-item5">
                                    <div class="accordion-header" id="accordion-link5">
                                        ARTIKEL
                                        <span class="accordion-item-arrow"></span>
                                    </div>
                                    <div class="accordion-content" id="accordion-content5">
                                        <span class="desc-film"><?php echo "Belum Ada Informasi"?></span>
                                    </div>
                                </div>
                                <div class="accordion-item" id="accordion-item6">
                                    <div class="accordion-header" id="accordion-link6">
                                        TRIVIA
                                        <span class="accordion-item-arrow"></span>
                                    </div>
                                    <div class="accordion-content" id="accordion-content6">
                                        <span class="desc-film"><?php echo "Belum Ada Informasi"?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 list-item-gray" style="margin-top: 35px;">
                        <div class="col-md-12">
                            <div class="col-md-2">
                                <span class="col-md-12 item-left-head">FILM</span>
                                <span class="col-md-12 item-left-desc big-text">TERKAIT</span><br>
                                <!--<span class="col-md-12 item-left-seemore"><a href="<?php echo base_url()?>watchfilms/category/2" class="link_seemore">See More ></a></span>-->
                            </div>
                            <div class="col-md-10" style="padding-left: 0px;">
                                <div class="owl-theme owl-carousel" id="carousel1">
                                  <?php if(!empty($filmdata)){foreach ($filmdata->result() as $row){
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
                                      $link_open = '<a href="'.base_url().'detail/index/'.url_title(strtolower($row->title)).'/'.$row->id.'">';
                                      $link_close = '</a>';
                                      $popover = "rel='popover'";
                                      $link = base_url().'detail/index/'.url_title(strtolower($row->title)).'/'.$row->id;
                                    }
                                    ?>
                                    <div class="item">
                                      <?php echo $link_open?>
                                        <div class="hover-element hover-element-1 wow flipInX" <?php echo $popover?> data-wow-delay="0.4s" data-wow-duration="0.6s" data-title-position="top,left" style="cursor:pointer;" name="<?php echo $link?>">
                                            <div class="img-film hover-element__initial" style="background:url('<?php echo 'http://116.206.196.146/'.$row->cover?>');background-size:100% auto;width:100%;height:208px;">

                                              <?php if($harga != "FREE"){?>
                                              <div class="pull-right" style="background:url('<?php echo base_url()?>images/label-harga.png');background-size:100px;width:100%;height:100%;background-position:top right;background-repeat:no-repeat;">
                                                <span class="pull-right" style="-webkit-transform: rotate(47deg);-moz-transform: rotate(47deg);color:white;margin-top: 11%;width: 40%;text-align:center;">
                                                  <?php echo $harga?>
                                                </span>
                                              </div>
                                              <?php }?>

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
                                  <?php }} }?>
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

                <!--end of row-->
                </div>
            </div>
        </section>

        <div class="list-featured-bottom" style="padding: 35px 20px 45px 20px;">
            <img src="<?php echo base_url()?>images/banner-biznet.jpg" width="100%">
        </div>

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
                        <p class="text-white" style="line-height: 20px;">
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
    <div id="my-popover-container" style="display: none;width:200px;">
      <div>
        <span>Harga Streaming</span>
        <button type="button" class="butt butt-primary sharp" id="pop-harga-streaming" onclick="buyfilm('login','streaming')">Rp. 15.000,-</button>
      </div>
      <div>
        <span>Harga DVD</span>
        <button type="button" class="butt butt-primary sharp" id="pop-harga-dvd" onclick="buyfilm('login','dvd')">Rp. 15.000,-</button>
      </div>
      <div>
        <span>Harga VCD</span>
        <button type="button" class="butt butt-primary sharp" id="pop-harga-vcd" onclick="buyfilm('login','vcd')">Rp. 15.000,-</button>
      </div>
    </div>

    <?php } ?>

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
    <script src="https://rawgithub.com/jedfoster/Readmore.js/master/readmore.js"></script>

    <link href="<?php echo base_url()?>css/prettyPhoto.css" type="text/css" media="screen" charset="utf-8" rel="stylesheet" />
        <script src="<?php echo base_url()?>js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>

    <style type="text/css">
      .title-film{
        font-size: unset !important;
      }
    </style>

    <script type="text/javascript">
      $(".images-grid-1").imagesGrid();
    </script>

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

        $('input[type=search]').keypress(function (e) {
                if (e.which == 13) {
                    var val = $(this).val();
                    //alert(val);
                    if(val != ''){
                        window.location = '<?php echo base_url()?>search/index/'+val;
                    }
                }
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

        $("#accordion-content1").hide();
        $("#accordion-item2").addClass('active');
        $("#accordion-content2").show();
        $("#accordion-content3").hide();
        $("#accordion-content4").hide();
        $("#accordion-content5").hide();
        $("#accordion-content6").hide();

        $("#accordion-link1").click(function() {
            $("#accordion-content1").toggle(650);
            if ($('#accordion-item1').hasClass('active')) {
                $("#accordion-item1").removeClass('active');
            }else{
                $("#accordion-item1").addClass('active');
            }

            $("#accordion-content2").hide(650);
            $("#accordion-content3").hide(650);
            $("#accordion-content4").hide(650);
            $("#accordion-content5").hide(650);
            $("#accordion-content6").hide(650);

            $("#accordion-item2").removeClass('active');
            $("#accordion-item3").removeClass('active');
            $("#accordion-item4").removeClass('active');
            $("#accordion-item5").removeClass('active');
            $("#accordion-item6").removeClass('active');
        });
        $("#accordion-link2").click(function() {
            $("#accordion-content2").toggle(650);
            if ($('#accordion-item2').hasClass('active')) {
                $("#accordion-item2").removeClass('active');
            }else{
                $("#accordion-item2").addClass('active');
            }

            $("#accordion-content1").hide(650);
            $("#accordion-content3").hide(650);
            $("#accordion-content4").hide(650);
            $("#accordion-content5").hide(650);
            $("#accordion-content6").hide(650);

            $("#accordion-item1").removeClass('active');
            $("#accordion-item3").removeClass('active');
            $("#accordion-item4").removeClass('active');
            $("#accordion-item5").removeClass('active');
            $("#accordion-item6").removeClass('active');
        });
        $("#accordion-link3").click(function() {
            $("#accordion-content3").toggle(650);
            if ($('#accordion-item3').hasClass('active')) {
                $("#accordion-item3").removeClass('active');
            }else{
                $("#accordion-item3").addClass('active');
            }

            $("#accordion-content1").hide(650);
            $("#accordion-content2").hide(650);
            $("#accordion-content4").hide(650);
            $("#accordion-content5").hide(650);
            $("#accordion-content6").hide(650);

            $("#accordion-item1").removeClass('active');
            $("#accordion-item2").removeClass('active');
            $("#accordion-item4").removeClass('active');
            $("#accordion-item5").removeClass('active');
            $("#accordion-item6").removeClass('active');
        });
        $("#accordion-link4").click(function() {
            $("#accordion-content4").toggle(650);
            if ($('#accordion-item4').hasClass('active')) {
                $("#accordion-item4").removeClass('active');
            }else{
                $("#accordion-item4").addClass('active');
            }

            $("#accordion-content1").hide(650);
            $("#accordion-content2").hide(650);
            $("#accordion-content3").hide(650);
            $("#accordion-content5").hide(650);
            $("#accordion-content6").hide(650);

            $("#accordion-item1").removeClass('active');
            $("#accordion-item2").removeClass('active');
            $("#accordion-item3").removeClass('active');
            $("#accordion-item5").removeClass('active');
            $("#accordion-item6").removeClass('active');
        });
        $("#accordion-link5").click(function() {
            $("#accordion-content5").toggle(650);
            if ($('#accordion-item5').hasClass('active')) {
                $("#accordion-item5").removeClass('active');
            }else{
                $("#accordion-item5").addClass('active');
            }

            $("#accordion-content1").hide(650);
            $("#accordion-content2").hide(650);
            $("#accordion-content3").hide(650);
            $("#accordion-content4").hide(650);
            $("#accordion-content6").hide(650);

            $("#accordion-item1").removeClass('active');
            $("#accordion-item2").removeClass('active');
            $("#accordion-item3").removeClass('active');
            $("#accordion-item4").removeClass('active');
            $("#accordion-item6").removeClass('active');
        });
        $("#accordion-link6").click(function() {
            $("#accordion-content6").toggle(650);
            if ($('#accordion-item6').hasClass('active')) {
                $("#accordion-item6").removeClass('active');
            }else{
                $("#accordion-item6").addClass('active');
            }

            $("#accordion-content1").hide(650);
            $("#accordion-content2").hide(650);
            $("#accordion-content3").hide(650);
            $("#accordion-content4").hide(650);
            $("#accordion-content5").hide(650);

            $("#accordion-item1").removeClass('active');
            $("#accordion-item2").removeClass('active');
            $("#accordion-item3").removeClass('active');
            $("#accordion-item4").removeClass('active');
            $("#accordion-item5").removeClass('active');
        });

        $("#accordion").accordion();
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
        owl1.owlCarousel({
            items : 6,
            dots: false,
            autoplay: true,
            afterMove: function(){
                $.fn.carMove(owl1.attr('id'), this);
            }
        });
        $.fn.togglePrev("carousel1",0);

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

    <script>
     $('#desc-film').readmore({
          speed: 75,
          lessLink: '<a href="#">less</a>'
          moreLink: '<a href="#">...</a>'
          collapsedHeight: 54
     });
    </script>
