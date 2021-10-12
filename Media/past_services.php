<?php 
	global $variable;
	$imgSrc = "../img/ccc-cross-image.webp";
?>

<?php $title = "CCC - Sermons & Worship" ?>
<?php include '../inc/preContent.php'?>
<div class="container">
		<h1>Past Services</h1>
        <p>Check out our last 5 Sunday Service streams below!  For more videos, head over to our <a target="_blank" id="youtubeStream" href="https://www.youtube.com/channel/UC7z_cEyyFvQ0VMAKDm7y9_w">YouTube</a> channel for services, special music, and more.</p>
	<?php
        require_once '../vendor/autoload.php';
        
        $API_KEY = 'AIzaSyD1EcCt1yL5hA0CGjDpfe5x29IQnl5R3pE';
		$ChannelID = 'UC7z_cEyyFvQ0VMAKDm7y9_w';
		
		$client = new Google_Client();
		$client->setDeveloperKey($API_KEY);

		// Define an object that will be used to make all API requests.
		$youtube = new Google_Service_YouTube($client);


		try {
			// Call the search.list method to retrieve results matching the specified
			// query term.
			$searchResponse = $youtube->search->listSearch('id,snippet', array(
			  'eventType' =>  'completed',
			  'maxResults' => '5',
			  'type' => 'video',
			  'channelId' => $ChannelID,
			  'order' => 'date'
			));
		} catch (Google_Service_Exception $e) {
			$htmlBody .= sprintf('<p>A service error occurred: <code>%s</code></p>',
			htmlspecialchars($e->getMessage()));
		} catch (Google_Exception $e) {
			$htmlBody .= sprintf('<p>An client error occurred: <code>%s</code></p>',
			htmlspecialchars($e->getMessage()));
		}
		
		// $ChannelInfo = 'https://www.googleapis.com/youtube/v3/search?part=snippet&channelId='.$ChannelID.'&type=video&eventType=completed&key='.$API_KEY.'&maxResults=25';
		
		// $searchResponse = file_get_contents($channelInfo);
		
		foreach ($searchResponse['items'] as $searchResult) {
		  // echo $searchResult['snippet']['title'];
		
    
	?>
	<hr>
	
	<div class="container" style="overflow: hidden;">
		<div>
			<h3>
				<?php
					echo $searchResult['snippet']['title'];		
				?>
			</h3>
		</div>
		<div class="col-sm-3 col-md-6 col-lg-4 media-col">
			<!--<hr style="margin-top:0;">-->
			<strong>
			<?php
				$date = new DateTime($searchResult['snippet']['publishedAt']);
				echo $date->format('F d, Y');
			?>
			</strong>
			<br/>
			
			<?php
				echo $searchResult['snippet']['description'];
				//echo 'this is livestream content description text.  i hope this works and contains enough text. Rachael is awesome and deserves ice cream.';
				
				$videoURL = 'https://www.youtube.com/embed/'.$searchResult['id']['videoId'].'?autoplay=0&origin=http://calvarychristianchurch.com';
			?>
		</div>
		
		<div class="col-sm-3 col-md-6 col-lg-8 media-col">
			<div class="embed-responsive embed-responsive-16by9 ytp-cued-thumbnail-overlay">
				<iframe class="embed-responsive-item" allowFullScreen='allowFullScreen' src="<?php echo $videoURL; ?>" frameborder="0"></iframe>
			</div>
		</div>
		
	</div>
	<?php } ?>
</div>
<?php include '../inc/postContent.php'?>