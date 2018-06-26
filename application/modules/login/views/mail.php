<img src="http://116.206.196.146/idfilm/public/uploads/images/idfc-logo.png" style="width: 100px;float:left">
<div style="text-align: center;padding: 20px 0;background-color: #711c11;color: white;border-top: 15px solid #dedbdb;">
	<a href="<?php echo base_url()?>/" style="padding: 0 10px;color: white;">HOME</a>
	<a href="<?php echo base_url()?>/watchfilms" style="padding: 0 10px;color: white;">WATCHFILMS</a>
	<a href="<?php echo base_url()?>/filminfo" style="padding: 0 10px;color: white;">FILMINFO</a>
	<a href="<?php echo base_url()?>/filmarchive" style="padding: 0 10px;color: white;">FILMARCHIVE</a>
	<a href="<?php echo base_url()?>/filmnews" style="padding: 0 10px;color: white;">FILMNEWS</a>
	<a href="<?php echo base_url()?>/filmblog" style="padding: 0 10px;color: white;">FILMBLOG</a>
</div>
<div style="text-align: center;padding: 10px 0;background-color: #8a2617;color: white;">
	<a href="https://www.facebook.com/IdFilmCenter/" style="padding: 0 10px;color: white;text-align: center;">
		<img src="http://116.206.196.146/idfilm/public/uploads/images/facebook.png" style="width: 30px;">
		IdFilmCenter
	</a>
	<a href="http://twitter.com/IdFilmCenter" style="padding: 0 10px;color: white;text-align: center;">
		<img src="http://116.206.196.146/idfilm/public/uploads/images/twitter.png" style="width: 30px;">
		@IdFilmCenter
	</a>
	<a href="https://www.instagram.com/idfilmcenter/" style="padding: 0 10px;color: white;text-align: center;">
		<img src="http://116.206.196.146/idfilm/public/uploads/images/instagram_1.png" style="width: 30px;">
		idfilmcenter
	</a>
</div>

<div style="text-align: right;padding: 8px 0;background-color: #8a2617;color: white;">
	<a style="padding: 0 10px;color: white;text-align: right;font-size: 16px;"><?php echo date('d F, Y', strtotime($date_post));;?></a>
</div>

<h4 style="color: #ea0606;font-size: 16px"><img src="http://116.206.196.146/idfilm/public/uploads/images/idfc-logo.png" style="width: 30px;"> Indonesian Film Center Newsletter</h4>
<?php
echo $content;
?>

<div style="padding:20px 0;">
	<a href="<?php echo base_url()?>/login/unsubscribe/<?php echo $email_unsub?>"> Unsubscribe </a>
</div>
