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
         $token = 'HKsNrmeddiLspD4qKdqOjHGhUWVQE3HVQqCo0sCk';
         $url = 'https://bibles.org/v2/passages.js?q[]=' . strToLower(str_replace(" ", "+", $json_data[$key1]["title"])) . '&version=eng-KJVA';
         
         $ch = curl_init();
         curl_setopt($ch, CURLOPT_URL, $url);
         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
         curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
         curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
         curl_setopt($ch, CURLOPT_USERPWD, "$token:X");

         $response = curl_exec($ch);
         curl_close($ch);

         $json = json_decode($response);
   ?>
      <h4><?php echo $json_data[$key1]["title"]; ?></h4>
      <h6><strong>Taught By:</strong> <?php echo $json_data[$key1]["teacher"]; ?></h6>
      <h6><strong>Date:</strong> <?php echo $json_data[$key1]["date"]; ?></h6>
      
      <audio class="mt-3" controls controlsList="nodownload" preload="metadata">
         <source src="<?php echo $json_data[$key1]["file"]; ?>" type="audio/mp3">
      </audio>
      
      <?php
         if(count($json->response->search->result->passages) > 0)  {
      ?>
         <button class="btn btn-secondary btn-sm collapsible mt-1" role="button">Scripture Text</button>
         <div class="content mt-2">
            <h1><?php echo((string) $json->response->search->result->passages[0]->display); ?></h1>
            <?php echo((string) $json->response->search->result->passages[0]->text); ?>
         </div>
      <?php
         }
      ?>

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

  <script type="text/javascript">
   var coll = document.getElementsByClassName("collapsible");
   var i;

   for (i = 0; i < coll.length; i++) {
      coll[i].addEventListener("click", function() {
         this.classList.toggle("active");
         var content = this.nextElementSibling;
         if (content.classList.contains("transition-display")) {
            content.classList.remove("transition-display")
            content.classList.add("transition-hide")
         } else {
            content.classList.remove("transition-hide")
            content.classList.add("transition-display")
         }
      });
   }
</script>
<?php include '../inc/postContent.php'?>