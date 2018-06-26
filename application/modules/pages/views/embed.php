<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>IdFilmCenter</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="viewport" content="width=1250">
          <link href="<?php echo base_url()?>css/video-js.css" rel="stylesheet">
          <script src="<?php echo base_url()?>js/videojs-ie8.min.js"></script>
     </head>

     <body style="width:100%;height:315px;margin:0;background:black">
          <video id="path-movie" class="video-js" controls style="width:100%;" poster="http://116.206.196.146/filmdata/covermovie.jpg" data-setup="{}">
          <source id="source-movie" src="http://116.206.196.146/<?php echo $path;?>" type='video/mp4'>
          <p class="vjs-no-js">
             To view this video please enable JavaScript, and consider upgrading to a web browser that
             <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
          </p>
          </video>

          <script src="<?php echo base_url()?>js/jquery-2.1.4.min.js"></script>
          <script src="http://vjs.zencdn.net/5.8.8/video.js"></script>
          <style>
               .video-js{
                    position: unset !important;
                    height: unset !important;
               }

               .path-movie-dimensions{
                    height: unset !important;
               }
          </style>
     </body>
</html>
