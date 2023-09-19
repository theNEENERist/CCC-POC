<?php 
	global $variable;
	$imgSrc = "../img/ccc-cross-image.webp";
?>

<?php $title = "CCC - Our Story" ?>
<?php include 'inc/preContent.php'?>

<?php
 if(date("w") == 0) {
  $bulletin = "Bulletin " . date("mdY") . ".pdf";
 } else {
  $bulletin = "Bulletin " . date("mdY", strtotime("last Sunday")) . ".pdf";
 }
?>

<div class="container">  
  <p>The download should start shortly. If it doesn't, click
  <a data-auto-download href="../content/bulletin/<?php echo $bulletin?>">here</a>.</p>
</div>

<script>

$(function() {
  $('a[data-auto-download]').each(function(){
    var $this = $(this);
    setTimeout(function() {
      window.location = $this.attr('href');
    }, 2000);
  });
});

</script>

<?php include 'inc/postContent.php'?>