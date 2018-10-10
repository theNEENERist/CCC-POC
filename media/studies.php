<?php 
	global $variable;
	$imgSrc = "../img/ccc-cross-image.png";
?>

<?php $title = "CCC - Bible Studies" ?>
<?php include '../inc/preContent.php'?>

<div class="container">
   <h1>Bible Studies</h1>
   <p>Checkout the recordings of our Midweek Bible studies below.  You can join us in person on Thursday evenings at 6:30 through November 15th.</p>
   <hr class="mb-4">
   
   <div class="col-12 p-0">

   <?php

      $json = file_get_contents('../data/midweekStudies.json');

      $json_data = json_decode($json,true);

      usort($json_data, function ($a, $b) {
         return strtotime($a['date']) < strtotime($b['date']);
      });

      foreach ($json_data as $key1 => $value1) {
   ?>
      <h4><?php echo $json_data[$key1]["title"]; ?></h4>
      <h6><strong>Taught By:</strong> <?php echo $json_data[$key1]["teacher"]; ?></h6>
      <h6><strong>Date:</strong> <?php echo $json_data[$key1]["date"]; ?></h6>
      
      <audio class="mt-3" controls controlsList="nodownload" preload="metadata">
         <source src="<?php echo $json_data[$key1]["file"]; ?>" type="audio/mp3">
      </audio>

      <?php
         if ($key1 < count($json_data) - 1) {
      ?>
         <hr class="mb-4">
      <?php
         }
      ?>
      
   <?php
      }
   ?>
   </div>
</div>
<?php include '../inc/postContent.php'?>