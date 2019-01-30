<?php 
	global $variable;
	$imgSrc = "../img/ccc-cross-image.png";
?>

<?php $title = "CCC - Bible Studies" ?>
<?php include '../inc/preContent.php'?>

<div class="container">
  <h1>Bible Studies</h1>
  <p>Checkout the recordings of our Midweek Bible studies below.  You can join us in person on Wednesday evenings at 6:30.</p>
  <hr class="mb-4">
  
  <div class="col-12 p-0">
    <?php
      $num_of_lessons = 5;

      if (isset($_GET['lessons'])) {
        $num_of_lessons =  $_GET['lessons']; 
      }
      
      $json = file_get_contents('../data/midweekStudies.json');

      $json_data = json_decode($json,true);

      usort($json_data, function ($a, $b) {
         return strtotime($a['date']) < strtotime($b['date']);
      });

      for ($x = 0; $x < $num_of_lessons; $x++) {
        $token = 'HKsNrmeddiLspD4qKdqOjHGhUWVQE3HVQqCo0sCk';
        $passages = "";
        $text = "";

        foreach ($json_data[$x]["scriptures"] as $key2 => $value1) {
          $passages .= strToLower(str_replace(" ", "+", $json_data[$x]["scriptures"][$key2]));

          if( next( $json_data[$x]["scriptures"] ) ) {
            $passages .= ",";
          }
        }

        $url = 'https://bibles.org/v2/passages.js?q[]=' . $passages . '&version=eng-NASB';
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

        if($json && count($json->response->search->result->passages) > 0)  {
          foreach($json->response->search->result->passages as $key => $passage) {
            $text .= "<h1>" . (string) $passage->display . "</h1>";
            $text .= (string) $passage->text . "<br/>";
          }
        }
   ?>
      <h4><?php echo $json_data[$x]["title"]; ?></h4>
      <h6><strong>Taught By:</strong> <?php echo $json_data[$x]["teacher"]; ?></h6>
      <h6><strong>Date:</strong> <?php echo $json_data[$x]["date"]; ?></h6>
      
      <audio class="mt-3" controls controlsList="nodownload" preload="metadata">
         <source src="<?php echo $json_data[$x]["file"]; ?>" type="audio/mp3">
      </audio>
      
      <?php
         if($text <> "")  {
      ?>
         <button class="btn btn-secondary btn-sm collapsible mt-1" role="button">Scripture Text</button>
         <div class="content mt-2">
            <?php echo $text; ?>
         </div>
      <?php
         }
      ?>

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
      
      if ($num_of_lessons < count($json_data)) {
        ?>
        
          <div class="showMore col-3">
            <button role="button" class="btn btn-secondary btn-sm" style="margin-left: -35px;" onclick="changeNumberPerPage()">Show More <i class="fas fa-arrow-down"></i></button>
          </div>
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

		function changeNumberPerPage() {
      var numOfLessons = parseInt("<?php echo $num_of_lessons ?>") + 5

      numOfLessons = numOfLessons <= parseInt("<?php echo count($json_data) ?>") ? numOfLessons : parseInt("<?php echo count($json_data) ?>")
      
			window.location.href = window.location.pathname+"?" + $.param({ lessons: numOfLessons })
		}
</script>

<?php include '../inc/postContent.php'?>