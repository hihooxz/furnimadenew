<title>Furnimade</title>
	<link href="<?php echo base_url('asset/asset_yellow/asset_index/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Vollkorn|Roboto+Condensed" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/asset_yellow/asset_index/fa/css/font-awesome.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('asset/asset_yellow/asset_index/bootstrap/js/jquery.min.js')?>">
  	<link rel="stylesheet" href="<?php echo base_url('asset/asset_yellow/asset_index/bootstrap/js/bootstrap.min.js')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/asset_yellow/default.css')?>">
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script>
$(document).ready(function(){ 
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {
    if (this.hash !== "") {
      event.preventDefault();
      var hash = this.hash;
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
        window.location.hash = hash;
      });
    } // End if
  });
});
</script>	