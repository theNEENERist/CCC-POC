<?php 
	global $variable;
	$imgSrc = "./img/ccc-cross-image.png";
?>

<?php $title = "CCC - Classes" ?>
<?php include './inc/preContent.php'?>

<div class="container">
  <h1>Classes</h1>
  <p>Check out the classes we offer.</p>
  <hr class="mb-4">
  
  <div class="col-12 p-0">
    <?php
      $json = file_get_contents('./data/classes.json');

      $json_data = json_decode($json,true);

      usort($json_data, function ($a, $b) {
         return strtotime($a['date']) < strtotime($b['date']);
      });

      for ($x = 0; $x < 1; $x++) {
   ?>
      <h4><?php echo $json_data[$x]["subject"]; ?></h4>
      <h6><strong>Taught By:</strong> <?php echo $json_data[$x]["teacher"]; ?></h6>
      <h6><strong>Date:</strong> <?php echo $json_data[$x]["when"]; ?></h6>
      
      <?php
      
        if ($x < count($json_data) - 1) {

      ?>
        <hr class="mb-4">
      <?php          
        }
      ?>
      <span></span>
   <?php
      }
   ?>
   </div>
</div>

<?php include './inc/postContent.php'?>