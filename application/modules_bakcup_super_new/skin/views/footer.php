<script>
wow = new WOW({
  boxClass:'wow',
  animateClass: 'animated',
  offset:100
});
wow.init();

<?php if(sessionValue('id') <> ''){ ?>
$(document).ready(function(){
  $.ajax({
    type : 'POST',
    url : '<?php echo site_url('detail/totalcart')?>',
    success:function(data){
      var tmp = eval('('+data+')');
      if (tmp.success){
        if(tmp.total > 0){
          $(".fa-shopping-cart").attr( "data-badge", tmp.total );
        }
      }
    }
  });

  $.ajax({
    type : 'POST',
    url : '<?php echo site_url('detail/checkorder')?>',
    success:function(data){
      var tmp = eval('('+data+')');
      console.log(tmp.success);
    }
  });

  $('.btn--xs, .btn-danger').click(function(){
    window.location = '<?php echo site_url('submitfilm')?>';
  });
});
<?php }else{ ?>
$(document).ready(function(){
  $('.btn--xs, .btn-danger').click(function(){
    alert('Silahkan Login terlebih dahulu untuk men-submit film.');
  });
});
<?php } ?>
</script>
<script src="http://vjs.zencdn.net/5.8.8/video.js"></script>

</body>
</html>
