<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo (@$title?"$title - IdFilmCenter" : 'IdFilmCenter'); ?></title>
        <meta name="description" content="<?php echo (@$deskripsi?$deskripsi : 'IdFilmCenter'); ?>"/>
        <meta name="keywords" content="<?php echo (@$keyword?$keyword : 'IdFilmCenter'); ?>"/>
        <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
        <meta http-equiv="Cache-control" content="public">
        <meta name="viewport" content="width=1250">
        <link rel="icon" type="image/ico" href="<?php echo base_url()?>img/favicon.png"/>

        <!-- Global site tag (gtag.js) - Google Analytics -->
          <script async src="https://www.googletagmanager.com/gtag/js?id=UA-120368563-1"></script>
          <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-120368563-1');
          </script>


        <!-- Global site tag (gtag.js) - Google Analytics -->
          <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23867266-1"></script>
          <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-23867266-1');
          </script>


        <?php if($content=="home/home"){ ?>
        <link href="<?php echo base_url()?>css/bootstrap2.css" rel="stylesheet" />
        <!--<link href="<?php echo base_url()?>css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />-->
		<?php }else if($content=="watchfilms/watchfilms"){ ?>
		<link href="<?php echo base_url()?>css/fonts-core.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?php echo base_url()?>css/bootstrap2.css" rel="stylesheet" />
        <?php }else if($content=="filminfo/filminfo"){ ?>
		<link href="<?php echo base_url()?>css/fonts-core.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?php echo base_url()?>css/bootstrap2.css" rel="stylesheet" />
		<?php }else if($content=="filmnews/filmnews"){ ?>
		<link href="<?php echo base_url()?>css/fonts-core.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?php echo base_url()?>css/bootstrap2.css" rel="stylesheet" />
        <?php }else if($content=="filmarchive/filmarchive"){ ?>
        <link href="<?php echo base_url()?>css/fonts-core.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?php echo base_url()?>css/bootstrap2.css" rel="stylesheet" />
        <?php }else if($content=="filmarchive/search"){ ?>
        <link href="<?php echo base_url()?>css/fonts-core.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?php echo base_url()?>css/bootstrap2.css" rel="stylesheet" />
        <?php }else if($content=="search/search"){ ?>
        <link href="<?php echo base_url()?>css/fonts-core.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?php echo base_url()?>css/bootstrap2.css" rel="stylesheet" />
        <?php }else if($content=="detail/detail"){ ?>
		<link href="<?php echo base_url()?>css/fonts-core.css" rel="stylesheet" type="text/css" media="all" />
		<link href="<?php echo base_url()?>css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <?php }else if($content=="home/home"){ ?>
        <!--<link href="<?php echo base_url()?>css/bootstrap2.css" rel="stylesheet" type="text/css" media="all" />-->
        <?php }else{ ?>
		<link href="<?php echo base_url()?>css/fonts-core.css" rel="stylesheet" type="text/css" media="all" />
		<link href="<?php echo base_url()?>css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
		<?php } ?>
        <link href="<?php echo base_url()?>css/socicon.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?php echo base_url()?>css/iconsmind.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?php echo base_url()?>css/interface-icons.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?php echo base_url()?>css/owl.carousel.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?php echo base_url()?>css/lightbox.min.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?php echo base_url()?>css/theme.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?php echo base_url()?>css/font-awesome.css" rel="stylesheet">
        <link href="<?php echo base_url()?>css/animate.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?php echo base_url()?>css/custom.css" rel="stylesheet">
        <?php if($content=="detail/detail" or $content=="profil/profil"){ ?>
        <link href="<?php echo base_url()?>css/accordion.css" rel="stylesheet">
        <link href="<?php echo base_url()?>css/accordion-underline.css" rel="stylesheet">
        <?php }else if($content=="filmarchive/filmarchive"){ ?>
        <link href="<?php echo base_url()?>css/accordion.css" rel="stylesheet">
        <link href="<?php echo base_url()?>css/accordion-underline.css" rel="stylesheet">
        <link href="<?php echo base_url()?>css/timeline.css" rel="stylesheet">
        <?php }else if(strpos($content, 'filmblog') !== false){ ?>
        <link href="<?php echo base_url()?>plugins/blog/css/style.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url()?>plugins/blog/vendor/prettyphoto/css/prettyPhoto.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url()?>plugins/blog/vendor/owl-carousel/css/owl.carousel.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url()?>plugins/blog/vendor/owl-carousel/css/owl.theme.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url()?>plugins/blog/css/flexslider.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="<?php echo base_url()?>plugins/blog/css/custom.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url()?>plugins/blog/colors/color1.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url()?>plugins/blog/css/bootstrap-treeview.min.css" rel="stylesheet" type="text/css">
        <script src="<?php echo base_url()?>plugins/blog/js/modernizr.js"></script>
        <?php } ?>
        <!-- Plugin Movie -->
        <link href="<?php echo base_url()?>css/video-js.css" rel="stylesheet">
        <script src="<?php echo base_url()?>js/videojs-ie8.min.js"></script>
        <link href="<?php echo base_url()?>css/normalize.min.css" rel="stylesheet">
        <link href='<?php echo base_url()?>css/ionicons.min.css' rel='stylesheet prefetch'>

        <style type="text/css">p { font-size: 14px; }</style>
        <style type="text/css">
            ::-webkit-input-placeholder { /* Chrome */
              color: black !important;
            }
            :-ms-input-placeholder { /* IE 10+ */
              color: black !important;
            }
            ::-moz-placeholder { /* Firefox 19+ */
              color: black !important;
              opacity: 1;
            }
            :-moz-placeholder { /* Firefox 4 - 18 */
              color: black !important;
              opacity: 1;
            }
        </style>
        <script type="text/javascript">
            $('#popup-movie').modal('show');
            var video = videojs('path-movie');
            video.pause();
            video.load();

            $( "#stop-movie" ).click(function() {
                var myPlayer1 = videojs("path-movie");
                myPlayer1.pause();
            });
        </script>
        <style type="text/css">
            body{
                max-width:1300px;
                margin:auto;
                background-color: #387ab3;
            }
            .height-100{
                padding: 0 !important;
            }
        </style>
    </head>
