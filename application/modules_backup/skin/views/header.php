<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>IdFilmCenter</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" type="image/ico" href="<?php echo base_url()?>img/favicon.png"/>

				<?php if($content=="home/home"){ ?>
        <link href="<?php echo base_url()?>css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
				<?php }else if($content=="watchfilms/watchfilms"){ ?>
				<link href="<?php echo base_url()?>css/fonts-core.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?php echo base_url()?>css/bootstrap2.css" rel="stylesheet" />
        <?php }else if($content=="filminfo/filminfo"){ ?>
				<link href="<?php echo base_url()?>css/fonts-core.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?php echo base_url()?>css/bootstrap2.css" rel="stylesheet" />
				<?php }else if($content=="filmnews/filmnews"){ ?>
				<link href="<?php echo base_url()?>css/fonts-core.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?php echo base_url()?>css/bootstrap2.css" rel="stylesheet" />
        <?php }else if($content=="detail/detail"){ ?>
				<link href="<?php echo base_url()?>css/fonts-core.css" rel="stylesheet" type="text/css" media="all" />
				<link href="<?php echo base_url()?>css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
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
        <?php } ?>
        <!-- Plugin Movie -->
        <link href="http://vjs.zencdn.net/5.8.8/video-js.css" rel="stylesheet">
        <script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>

        <style type="text/css">p { font-size: 14px; }</style>
    </head>
